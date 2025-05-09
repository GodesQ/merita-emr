<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Patient;
use App\Models\Refferal;


class PatientAuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function save_login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Fetch latest patient by email
        $patient = Patient::where('email', $credentials['email'])->latest('id')->first();

        // Validate patient existence
        if (!$patient) {
            return back()->with('fail', 'Invalid email. Please try again.');
        }

        // Validate password
        if (!Hash::check($credentials['password'], $patient->password)) {
            return back()->with('fail', 'Incorrect password. Please try again.');
        }

        // Check if email is verified
        if (!$patient->isVerify) {
            return back()->with('fail', 'Please verify your email address to continue.');
        }

        // Store session data
        session([
            'classification' => 'patient',
            'email' => $patient->email,
            'patientCode' => $patient->patientcode,
            'patientId' => $patient->id,
            'admissionId' => $patient->admission_id,
            'patient_image' => $patient->patient_image,
            'created_date' => $patient->created_date,
            'firstname' => $patient->firstname,
            'lastname' => $patient->lastname,
        ]);

        // Redirect based on patient info existence
        $redirectRoute = $patient->patientinfo ? '/patient_info' : '/progress-patient-info';

        return redirect($redirectRoute)->with('success', 'Login successfully.');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function save_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:mast_patient',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password',
        ]);

        $referral = Refferal::where('email_employee', $request->email)->first();

        if ($referral) {
            if ($referral->is_hold) {
                return back()->with('fail', 'You are currently hold. Please contact your agency before register.');
            }
        }

        if (!$request->has('terms_conditions'))
            return back()->with('fail', 'Please confirm if you agree to the terms and conditions');
        if (!$request->has('data_privacy'))
            return back()->with('fail', 'Please confirm if you agree in Data Privacy');

        $latestPatientCodeData = DB::table('mast_patient')->latest('patientcode')->first();

        $latestPatientCode = substr($latestPatientCodeData->patientcode, 4);

        // generate patient code
        $addPatientCode = $latestPatientCode + 1;
        if ($addPatientCode > 9999) {
            $patientcode = 'P' . date('y') . '-0' . $addPatientCode;
        } else {
            $patientcode = 'P' . date('y') . '-00' . $addPatientCode;
        }

        $patient = Patient::create([
            'patientcode' => $patientcode,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isVerify' => false,
            'yndelete' => false,
            'created_date' => date('Y-m-d h:i:s')
        ]);

        if ($patient) {
            $details = [
                'title' => 'Verification email from merita',
                'email' => $request->email,
            ];

            Mail::to($request->email)->send(new VerificationMail($details));
            return redirect('/verify-message');
        }

        return back()->with('fail', 'Something went wrong. Try Again later.');
    }

    public function verify(Request $request)
    {
        $patient = Patient::where('email', '=', $request->verify_email)->first();
        $patient->isVerify = true;
        $save = $patient->save();
        if ($save)
            return redirect('/login')->with('success', 'Your Email Address was successfully verified.');
    }

    public function logout()
    {
        if (session()->has(['classification'])) {
            session()->flush();
            return redirect('/login')->with('success_logout', 'You are successfully logout.');
        }
    }
}
