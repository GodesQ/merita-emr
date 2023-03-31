<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

class AdminAuthController extends Controller
{
    public function login() {
        return view('Auth.employee-login');
    }

    public function save_login(Request $request) {
        //VALIDATE REQUEST
        $request->validate([
            'password' => 'required',
        ]);

        $employee = User::where('username', '=', $request->username)->first();

        if(!$employee) return back()->with('fail', 'The username you entered is incorrect. Please check and try again.');
        if (!Hash::check($request->password, $employee->password)) return back()->with('fail', 'The password you entered is incorrect. Please check and try again.');
        if(!$employee->ynactive) return back()->with('fail', 'This account is inactive. Please contact your system administrator to configure.');

        $request->session()->put([
            'classification' => 'employee',
            'employeeCode' => $employee->employeecode,
            'employeeId' => $employee->id,
            'employeeFirstname' => $employee->firstname,
            'employeeLastname' => $employee->lastname,
            'dept_id' => $employee->dept_id,
            'employee_image' => $employee->employee_image,
            'payment_type' => 'package',
            'request_date' => date("Y-m-d")
        ]);

        return redirect('/dashboard')->with('success', 'Login Successfully');
    }

    public function logout() {
        if (session()->has(['classification'])) {
            session()->flush();
            return redirect('/employee-login')->with('success_logout', 'You are successfully logout.');
        }
    }
}
