<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\Refferal;
use Exception;
use Illuminate\Http\Request;

class ReferralService
{
    public function list()
    {

    }

    public function create()
    {

    }

    public static function searchReferralByPatient(Request $request)
    {
        try {
            $patient = Patient::where('id', $request->query('patient_id'))->with('patientinfo')->first();

            if(!$patient && !$patient->patientinfo) 
                throw new Exception("Patient Information Not Found.");

            $referrals = Refferal::query();

            $referrals = $referrals->where('email_employee', $patient->email)
                ->where('firstname', 'LIKE', "%" . $patient->firstname . "%")
                ->where('lastname', 'LIKE', "%" . $patient->lastname . "%")
                ->orWhere('ssrb', $patient->patientinfo->srbno)
                ->orWhere('passport', $patient->patientinfo->passportno);

            $referrals = $referrals->latest('created_date')->get();

            return response([
                'status' => TRUE,
                'referrals' => $referrals,
            ]);
            
        } catch (Exception $e) {
            return response([
                'status' => FALSE,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}