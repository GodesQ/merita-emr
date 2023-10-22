<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PatientMedicalResult;
use Illuminate\Http\Request;

class PatientMedicalResultController extends Controller
{
    public function getMedicalResult(Request $request) {
        $medical_result = PatientMedicalResult::where("id", $request->id)->first();

        if($medical_result) {
            return response()->json([
                'status' => 'success',
                'medical_result' => $medical_result
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'medical_result' => null
        ]);
    }
}
