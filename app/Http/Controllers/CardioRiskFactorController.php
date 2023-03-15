<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardiacRiskFactor;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class CardioRiskFactorController extends Controller
{
    //
    public function edit_crf()
    {   
        try {
            $id = $_GET['id'];
            $exam = CardiacRiskFactor::select(
                'exam_crf.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_crf.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_crf.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $patient->admission_id)->first();
            $nurses = User::where('position', "LIKE", '%Nurse%')->get();
            return view('CardiacRiskFactor.edit-crf', compact('exam', 'patient', 'admission', 'nurses'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_crf(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = CardiacRiskFactor::findOrFail($id);
            $exam->age_result = $request->age_result;
            $exam->age_points = $request->age_points;
            $exam->hdl_result = $request->hdl_result;
            $exam->hdl_points = $request->hdl_points;
            $exam->total_result = $request->total_result;
            $exam->total_points = $request->total_points;
            $exam->sbp_result = $request->sbp_result;
            $exam->sbp_points = $request->sbp_points;
            $exam->smoker_result = $request->smoker_result;
            $exam->smoker_points = $request->smoker_points;
            $exam->diabetes_result = $request->diabetes_result;
            $exam->diabetes_points = $request->diabetes_points;
            $exam->ecg_result = $request->ecg_result;
            $exam->ecg_points = $request->ecg_points;
            $exam->probability = $request->probability;
            $exam->fev1_predicted = $request->fev1_predicted;
            $exam->fev1_actual = $request->fev1_actual;
            $exam->fev1_perc = $request->fev1_perc;
            $exam->fvc_predicted = $request->fvc_predicted;
            $exam->fvc_actual = $request->fvc_actual;
            $exam->fvc_perc = $request->fvc_perc;
            $exam->fev1fvc_predicted = $request->fev1fvc_predicted;
            $exam->fev1fvc_actual = $request->fev1fvc_actual;
            $exam->fev1fvc_perc = $request->fev1fvc_perc;
            $exam->result = $request->result;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $exam->updated_date = date("Y-m-d");
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Cardiac Risk Factor from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Cardio Risk Factor updated!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_crf(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $admission = Admission::select(
                'tran_admission.*',
                'mast_patient.firstname as firstname',
                'mast_patient.lastname as lastname',
                'mast_patient.id as patient_id'
            )
                ->where('tran_admission.id', $id)
                ->leftJoin(
                    'mast_patient',
                    'mast_patient.patientcode',
                    'tran_admission.patientcode'
                )
                ->latest('mast_patient.id')
                ->first();
                $nurses = User::where('position', "LIKE", '%Nurse%')->get();
            return view('CardiacRiskFactor.add-crf', compact('admission', 'nurses'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_crf(Request $request)
    {   
        try {
            $exam = new CardiacRiskFactor();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->age_result = $request->age_result;
            $exam->age_points = $request->age_points;
            $exam->hdl_result = $request->hdl_result;
            $exam->hdl_points = $request->hdl_points;
            $exam->total_result = $request->total_result;
            $exam->total_points = $request->total_points;
            $exam->sbp_result = $request->sbp_result;
            $exam->sbp_points = $request->sbp_points;
            $exam->smoker_result = $request->smoker_result;
            $exam->smoker_points = $request->smoker_points;
            $exam->diabetes_result = $request->diabetes_result;
            $exam->diabetes_points = $request->diabetes_points;
            $exam->ecg_result = $request->ecg_result;
            $exam->ecg_points = $request->ecg_points;
            $exam->probability = $request->probability;
            $exam->fev1_predicted = $request->fev1_predicted;
            $exam->fev1_actual = $request->fev1_actual;
            $exam->fev1_perc = $request->fev1_perc;
            $exam->fvc_predicted = $request->fvc_predicted;
            $exam->fvc_actual = $request->fvc_actual;
            $exam->fvc_perc = $request->fvc_perc;
            $exam->fev1fvc_predicted = $request->fev1fvc_predicted;
            $exam->fev1fvc_actual = $request->fev1fvc_actual;
            $exam->fev1fvc_perc = $request->fev1fvc_perc;
            $exam->result = $request->result;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Cardiac Risk Factor from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Cardio Risk Factor added!')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab2;tabVerticalLeft2');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}