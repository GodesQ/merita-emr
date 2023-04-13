<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\Agency;
use App\Models\User;

class ForgetPasswordController extends Controller
{
    //
    public function view_password_forget_form() {
        return view('Auth.forgot_password');
    }

    public function view_agency_password_forget_form() {
        return view('Auth.agency_forgot_password');
    }

    public function submit_forget_form(Request $request) {

        $AGENCY_WORD = 'agency';
        if($request->classification == $AGENCY_WORD) {
            $request->validate([
                "email" => "required|email|exists:mast_agency"
            ]);
        } else {
            $request->validate([
                "email" => "required|email|exists:mast_patient"
            ]);
        }


        $token = Str::random(64);

        DB::table('forget_passwords')->insert([
            'email' => $request->email,
            'token' => $token,
            'classification' => $request->classification,
            'date' => date("Y-m-d")
          ]);

        Mail::to($request->email)->send(new ForgetPassword($token, $request->classification, $request->email));
        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function view_password_reset_form() {
        $token = $_GET['verify_token'];
        $classification = $_GET['classification'];
        return view('Auth.reset-password', compact('token', 'classification'));
    }

    public function submit_reset_form(Request $request) {

        $AGENCY_WORD = 'agency';
        if($request->classification == $AGENCY_WORD) {
            $request->validate([
                'email' => 'required|email|exists:mast_agency',
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password',
            ]);
        } else {
            $request->validate([
                'email' => 'required|email|exists:mast_patient',
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password',
            ]);
        }

        $exist_email_and_token = DB::table('forget_passwords')->where(['email' => $request->email, 'token' => $request->verify_token])->first();

        if($exist_email_and_token) {
            if($request->classification == "patient") {
                $patient = Patient::where('email', $request->email)->update(['password' => Hash::make($request->password), 'isVerify' => 1]);
                DB::table('forget_passwords')->where(['email'=> $request->email])->delete();
                return redirect('/login')->with('success', 'Your password has been changed!');
            }

            if($request->classification == "agency") {
                $agency = Agency::where('email', $request->email)->first();
                $save_password = $agency->update(['password' => Hash::make($request->password)]);
                DB::table('forget_passwords')->where(['email'=> $request->email])->delete();
                if($save_password) return redirect('/agency-login')->with('success', 'Your password has been changed!');
            }

        }else {
            return back()->with('fail', 'Invalid Token');
        }
    }
}
