<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AgencyPassword;


class AgencyAuthController extends Controller
{
    public function login() {
        return view('Auth.agency-login');
    }

    public function save_login(Request $request) {
        $agency = Agency::where('email', '=', $request->email)->first();

        if (!$agency) return back()->with('fail', 'The email you entered is incorrect. Please check and try again.');

        if (Hash::check($request->password, $agency->password) || Hash::check($request->password, $agency->ad_password)) {
            $request->session()->put([
                'classification' => 'agency',
                'agencyCode' => $agency->agencycode,
                'agencyId' => $agency->id,
                'agencyName' => $agency->agencyname,
                'address' => $agency->address,
                'email' => $agency->email,
                'start_date' => null,
                'end_date' => null,
            ]);

            if ($agency->not_first == 0) return redirect('/change_password');
            return redirect('/agency_dashboard');
        }

        return back()->with('fail', 'The password you entered is incorrect. Please check and try again.');
    }

    public function change_password()
    {
        try {
            return view('Agency.change-password');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_password(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password',
            ]);

            $data = session()->all();
            $agency = Agency::where('id', $data['agencyId'])->first();
            $agency->password = Hash::make($request->password);
            $agency->not_first = 1;
            $save = $agency->save();

            if ($save) return redirect('agency_dashboard');
        } catch (\Exception $exception) {

            $request->validate([
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password',
            ]);

            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function change_agency_password(Request $request) {
        $email = $request->email;
        $id = $request->agency_id;
        return view('Agency.agency-reset-form', compact('email', 'id'));
    }

    public function update_agency_password(Request $request) {
        try {

            $request->validate([
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password',
            ]);

            $data = session()->all();
            $agency = Agency::where('id', $request->agency_id)->first();
            $agency->password = Hash::make($request->password);
            $agency->not_first = 1;
            $save = $agency->save();

            if ($save) {
                return redirect('/agency-login')->with('success', 'Success! You can now login with your new password');
            }

        } catch (\Exception $exception) {

            $request->validate([
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password',
            ]);

            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }


        return back();
    }


}
