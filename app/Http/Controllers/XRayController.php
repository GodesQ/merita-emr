<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\XRay;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class XRayController extends Controller
{
    //
    public function edit_xray(Request $request)
    {
        try {
            $id = $request->id;
            $exam = XRay::select(
                'exam_xray.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_xray.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_xray.admission_id'
                )
                ->latest('id')
                ->first();
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $radiologists = User::where('position', 'LIKE', '%Radiologist%')->get();
            // dd($exam);
            return view('XRay.edit-xray', compact('exam', 'patient', 'admission', 'radiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_xray(Request $request)
    {
        try {
            $id = $request->id;
            $exam = XRay::where('id', $id)->first();
            $exam->trans_date = $request->trans_date;
            $exam->xray_no = $request->xray_no;
            $exam->exam = $request->exam;
            $exam->exam_type = $request->exam_type;
            $exam->exam_view = $request->exam_view;
            $exam->findings = $request->findings;
            $exam->impression = $request->impression;
            $exam->chest_remarks_status = $request->chest_remarks_status;
            $exam->chest_findings = $request->chest_findings;
            $exam->chest_recommendations = $request->chest_recommendations;
            $exam->lumbosacral_remarks_status = $request->lumbosacral_remarks_status;
            $exam->lumbosacral_findings = $request->lumbosacral_findings;
            $exam->lumbosacral_recommendations = $request->lumbosacral_recommendations;
            $exam->knees_remarks_status = $request->knees_remarks_status;
            $exam->knees_findings = $request->knees_findings;
            $exam->knees_recommendations = $request->knees_recommendations;
            $exam->skull_remark_status = $request->skull_remark_status;
            $exam->skull_findings = $request->skull_findings;
            $exam->skull_recommendations = $request->skull_recommendations;
            $exam->nasal_remarks_status = $request->nasal_remarks_status;
            $exam->nasal_findings = $request->nasal_findings;
            $exam->nasal_recommendations = $request->nasal_recommendations;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Update Xray from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Xray updated!!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_xray(Request $request)
    {
        try {
            $id = $request->id;
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

            $radiologists = User::where('position', 'LIKE', '%Radiologist%')->get();
            return view('XRay.add-xray', compact('admission', 'radiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_xray(Request $request)
    {
        try {
            $exam = new XRay();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->xray_no = $request->xray_no;
            $exam->exam = $request->exam;
            $exam->exam_type = $request->exam_type;
            $exam->exam_view = $request->exam_view;
            $exam->findings = $request->findings;
            $exam->impression = $request->impression;
            $exam->chest_remarks_status = $request->chest_remarks_status;
            $exam->chest_findings = $request->chest_findings;
            $exam->chest_recommendations = $request->chest_recommendations;
            $exam->lumbosacral_remarks_status = $request->lumbosacral_remarks_status;
            $exam->chest_findings = $request->chest_findings;
            $exam->chest_recommendations = $request->chest_recommendations;
            $exam->knees_remarks_status = $request->knees_remarks_status;
            $exam->knees_findings = $request->knees_findings;
            $exam->knees_recommendations = $request->knees_recommendations;
            $exam->skull_remark_status = $request->skull_remark_status;
            $exam->skull_findings = $request->skull_findings;
            $exam->skull_recommendations = $request->skull_recommendations;
            $exam->nasal_remarks_status = $request->nasal_remarks_status;
            $exam->nasal_findings = $request->nasal_findings;
            $exam->nasal_recommendations = $request->nasal_recommendations;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Add Xray from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Xray added!!')->with('redirect', 'basic-exam;tabIcon35;child-basic-tab;child-basic-component;baseVerticalLeft1-tab17;tabVerticalLeft17');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}
