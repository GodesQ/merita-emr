<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\Refferal;
use Exception;
use Illuminate\Http\Request;

class PatientService
{
    public function __construct()
    {

    }

    public static function searchPatientByReferral(Request $request)
    {
        try {
            $referral = Refferal::where('id', $request->query('referral_id'))->first();

            $users = Patient::query();

            $users = $users->where('email', $referral->email_employee)
                ->whereNull('referral_id')
                ->whereHas('patientinfo', function ($q) use ($referral) {
                    $q->orWhere('srbno', $referral->ssrb)
                        ->orWhere('passportno', $referral->passport);
                });

            $users = $users->with('patientinfo')->latest('created_date')->get();

            return response()->json([
                'status' => TRUE,
                'referral' => $referral,
                'users' => $users,
            ]);

        } catch (Exception $e) {
            return response([
                'status' => FALSE,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}