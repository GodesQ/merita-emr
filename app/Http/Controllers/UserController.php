<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Department;
use App\Models\Agency;
use App\Models\Patient;
use App\Models\EmployeeLog;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{


    public function user_profile() {
        $id = $_GET['id'];

        if($id == session()->get('employeeId')) {
            $data = session()->all();
            $id = $_GET['id'];
            $departments = Department::all();
            $employee = User::select(
                'mast_employee.*',
                'main_dept.dept as dept_name',
                'mast_employeeinfo.address as address',
                'mast_employeeinfo.contactno as contactno',
                'mast_employeeinfo.religion as religion',
                'mast_employeeinfo.gender as gender',
                'mast_employeeinfo.maritalstatus as maritalstatus',
                'mast_employeeinfo.birthdate as birthdate',
                'mast_employeeinfo.birthplace as birthplace',
                'mast_employeeinfo.otherposition as otherposition'
            )
                ->where('mast_employee.id', $id)
                ->leftJoin(
                    'main_dept',
                    'main_dept.id',
                    '=',
                    'mast_employee.dept_id'
                )
                ->leftJoin(
                    'mast_employeeinfo',
                    'mast_employeeinfo.main_id',
                    'mast_employee.id'
                )
                ->first();
            return view(
                'Employee.user-employee',
                compact('employee', 'departments', 'data')
            );
        }
        return redirect('/dashboard')->with('fail', "You cannot access other profile.");
    }

    public function update_profile(Request $request) {

        // dd($request->all());
        if ($request->old_image === $request->employee_image) {
            $name = $request->old_image;
        } else {
            $name =
                time() .
                '.' .
                explode(
                    '/',
                    explode(
                        ':',
                        substr(
                            $request->employee_image,
                            0,
                            strpos($request->employee_image, ';')
                        )
                    )[1]
                )[1];
            Image::make($request->employee_image)->save(
                public_path('app-assets/images/employees/') . $name
            );

            $userOldPhoto =
                public_path('app-assets/images/employees/') .
                $request->old_image;
            // remove old image
            @unlink($userOldPhoto);
        }

        $employee = User::where('id', $request->id)->first();
        $employee->employeecode = $request->employeecode;
        $employee->employee_image = $name;
        $employee->signature = $request->signature;
        $employee->lastname = $request->lastname;
        $employee->firstname = $request->firstname;
        $employee->middlename = $request->middlename;
        $employee->email = $request->email;
        $employee->username = $request->username;
        $employee->title = $request->title;
        $employee->position = $request->position;
        $employee->license_no = $request->license_no;
        $employee->updated_date = date('Y-m-d');
        $save = $employee->save();

        $employee_info = DB::update(
            'update mast_employeeinfo set address = ?, contactno = ?, religion = ?, gender = ?, otherposition = ?, maritalstatus = ?, birthdate = ?, birthplace = ? where main_id = ?',
            [
                $request->address,
                $request->contactno,
                $request->religion,
                $request->gender,
                $request->otherposition,
                $request->maritalstatus,
                $request->birthdate,
                $request->birthplace,
                $request->id,
            ]
        );

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Profile of ' . $request->employeecode;
        $log->date = date('Y-m-d');
        $log->save();

        // return back()->with('success', 'Update Successfully');

        return response()->json([
            "status" => 200
        ]);
    }

    public function employee_change_password(Request $request) {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password',
        ]);

        $user = User::where('id', $request->id)->first();
        $user->password = Hash::make($request->password);
        $save = $user->save();
        return back()->with('success', 'Change Password Successfully');
    }

    public function employee_logout() {
        if (session()->has(['classification'])) {
            session()->flush();
            return redirect('/employee-login')->with(
                'success_logout',
                'You are successfully logout.'
            );
        }
    }

    public function agency_logout() {
        if (session()->has(['classification'])) {
            session()->flush();
            return redirect('/agency-login')->with(
                'success_logout',
                'You are successfully logout.'
            );
        }
    }



}
