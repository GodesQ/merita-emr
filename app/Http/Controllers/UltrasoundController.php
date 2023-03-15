<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\UltraSound;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class UltrasoundController extends Controller
{
    //
    public function add_ultrasound()
    {
        try {
            $id = $_GET['id'];
            $admission = Admission::select(
                'tran_admission.*',
                'mast_patient.firstname as firstname',
                'mast_patient.lastname as lastname',
                'mast_patient.id as patient_id'
            )->where('tran_admission.id', $id)
                ->leftJoin(
                    'mast_patient',
                    'mast_patient.patientcode',
                    'tran_admission.patientcode'
                )->first();

            $sonologists = User::where('position', 'LIKE', '%Sonologist%')->get();
            return view('Ultrasound.add-ultrasound', compact('admission', 'sonologists'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_ultrasound(Request $request)
    {
        try {
            $exam = new UltraSound();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->exam_type = $request->exam_type;
            $exam->kidney = $request->kidney;
            $exam->urinary_bladder = $request->urinary_bladder;
            $exam->liver = $request->liver;
            $exam->gall_bladder = $request->gall_bladder;
            $exam->pancreas = $request->pancreas;
            $exam->thyroid = $request->thyroid;
            $exam->breast = $request->breast;
            $exam->abdomen = $request->abdomen;
            $exam->genitals = $request->genitals;
            $exam->kidney_status = $request->kidney_status;
            $exam->urinary_bladder_status = $request->urinary_bladder_status;
            $exam->liver_status = $request->liver_status;
            $exam->gall_bladder_status = $request->gall_bladder_status;
            $exam->pancreas_status = $request->pancreas_status;
            $exam->thyroid_status = $request->thyroid_status;
            $exam->breast_status = $request->breast_status;
            $exam->abdomen_status = $request->abdomen_status;
            $exam->genitals_status = $request->genitals_status;
            $exam->impression = $request->impression;
            $exam->kub_exam_status = $request->kub_exam_status;
            $exam->kub_exam_findings = $request->kub_exam_findings;
            $exam->kub_exam_recommendation = $request->kub_exam_recommendation;
            $exam->hbt_exam_status = $request->hbt_exam_status;
            $exam->hbt_exam_findings = $request->hbt_exam_findings;
            $exam->hbt_exam_recommendation = $request->hbt_exam_recommendation;
            $exam->thyroid_exam_status = $request->thyroid_exam_status;
            $exam->thyroid_exam_findings = $request->thyroid_exam_findings;
            $exam->thyroid_exam_recommendation = $request->thyroid_exam_recommendation;
            $exam->breast_exam_status = $request->breast_exam_status;
            $exam->breast_exam_findings = $request->breast_exam_findings;
            $exam->breast_exam_recommendation = $request->breast_exam_recommendation;
            $exam->whole_abdomen_status = $request->whole_abdomen_status;
            $exam->whole_abdomen_findings = $request->whole_abdomen_findings;
            $exam->whole_abdomen_recommendation = $request->whole_abdomen_recommendation;
            $exam->genitals_exam_status = $request->genitals_exam_status;
            $exam->genitals_exam_findings = $request->genitals_exam_findings;
            $exam->genitals_exam_recommendation = $request->genitals_exam_recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Ultrasound from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path = 'patient_edit?id=' .  $request->patient_id . '&patientcode=' . $request->patientcode;

            if ($save) {
                return redirect($path)->with('status', 'Ultrasound added');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_ultrasound()
    {
        try {
            $id = $_GET['id'];
            $exam = UltraSound::select(
                'exam_ultrasound.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_ultrasound.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_ultrasound.admission_id'
                )
                ->latest('id')
                ->first();

            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $sonologists = User::where('position', 'LIKE', '%Sonologist%')->get();
            // dd($sonologists);
            return view('Ultrasound.edit-ultrasound', compact('exam', 'patient', 'admission', 'sonologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_ultrasound(Request $request)
    {
        try {
            $id = $request->id;
            $exam = UltraSound::where('id', $id)->first();
            $exam->exam_type = $request->exam_type;
            $exam->kidney = $request->kidney;
            $exam->urinary_bladder = $request->urinary_bladder;
            $exam->liver = $request->liver;
            $exam->gall_bladder = $request->gall_bladder;
            $exam->pancreas = $request->pancreas;
            $exam->thyroid = $request->thyroid;
            $exam->breast = $request->breast;
            $exam->abdomen = $request->abdomen;
            $exam->genitals = $request->genitals;
            $exam->kidney_status = $request->kidney_status;
            $exam->urinary_bladder_status = $request->urinary_bladder_status;
            $exam->liver_status = $request->liver_status;
            $exam->gall_bladder_status = $request->gall_bladder_status;
            $exam->pancreas_status = $request->pancreas_status;
            $exam->thyroid_status = $request->thyroid_status;
            $exam->breast_status = $request->breast_status;
            $exam->abdomen_status = $request->abdomen_status;
            $exam->genitals_status = $request->genitals_status;
            $exam->impression = $request->impression;
            $exam->kub_exam_status = $request->kub_exam_status;
            $exam->kub_exam_findings = $request->kub_exam_findings;
            $exam->kub_exam_recommendation = $request->kub_exam_recommendation;
            $exam->hbt_exam_status = $request->hbt_exam_status;
            $exam->hbt_exam_findings = $request->hbt_exam_findings;
            $exam->hbt_exam_recommendation = $request->hbt_exam_recommendation;
            $exam->thyroid_exam_status = $request->thyroid_exam_status;
            $exam->thyroid_exam_findings = $request->thyroid_exam_findings;
            $exam->thyroid_exam_recommendation = $request->thyroid_exam_recommendation;
            $exam->breast_exam_status = $request->breast_exam_status;
            $exam->breast_exam_findings = $request->breast_exam_findings;
            $exam->breast_exam_recommendation = $request->breast_exam_recommendation;
            $exam->whole_abdomen_status = $request->whole_abdomen_status;
            $exam->whole_abdomen_findings = $request->whole_abdomen_findings;
            $exam->whole_abdomen_recommendation = $request->whole_abdomen_recommendation;
            $exam->genitals_exam_status = $request->genitals_exam_status;
            $exam->genitals_exam_findings = $request->genitals_exam_findings;
            $exam->genitals_exam_recommendation = $request->genitals_exam_recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Ultrasound from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Ultrasound updated')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab14;tabVerticalLeft14');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}
