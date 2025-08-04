<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\PatientMedicalResult;
use App\Models\PhysicalExam;
use Illuminate\Http\Request;

class PatientMedicalResultController extends Controller
{
  public function getMedicalResult(Request $request)
  {
    $medical_result = PatientMedicalResult::where("id", $request->id)->first();

    if ($medical_result) {
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

  public function deleteMedicalResult(Request $request)
  {
    $medicalResult = PatientMedicalResult::find($request->id);

    if (!$medicalResult) {
      return response()->json([
        'status' => 'failed',
        'message' => 'Medical Result not found',
      ], 404);
    }

    $admission = Admission::find($request->admission_id);

    if (!$admission) {
      return response()->json([
        'status' => 'failed',
        'message' => 'Admission not found',
      ], 404);
    }

    // Delete the target medical result first
    $medicalResult->delete();

    // Fetch the latest (newest) remaining medical result after deletion
    $latestResult = PatientMedicalResult::where('admission_id', $admission->id)
      ->orderByDesc('generate_at')
      ->first();

    // Update admission status based on the latest result
    $admission->lab_status = $latestResult ? $latestResult->status : null;
    $admission->save();

    if ($latestResult) {
      if ($latestResult->status == 1) {
        PhysicalExam::where('admission_id', $request->admission_id)
          ->update(['fit' => 'Pending']);
      } else if ($latestResult->status == 2) {
        PhysicalExam::where('admission_id', $request->admission_id)
          ->update(['fit' => 'Fit']);
      } else if ($latestResult->status == 3) {
        PhysicalExam::where('admission_id', $request->admission_id)
          ->update(['fit' => 'Unfit']);
      } else if ($latestResult->status == 4) {
        PhysicalExam::where('admission_id', $request->admission_id)
          ->update(['fit' => 'Unfit_temp']);
      }
    }

    return response()->json([
      'status' => 'success',
      'message' => 'Medical Result deleted successfully',
    ]);
  }

}
