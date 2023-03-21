<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ECG;
use App\Models\Patient;
use App\Models\EmployeeLog;
use App\Models\User;
use App\Models\Admission;

class ECGController extends Controller
{
    //
    public function edit_ecg(Request $request)
    {
        try {
            $id = $_GET['id'];
            $exam = ECG::select('exam_ecg.*', 'tran_admission.patientcode as patientcode')
                ->where('exam_ecg.admission_id', $id)
                ->leftJoin('tran_admission', 'tran_admission.id', 'exam_ecg.admission_id')
                ->latest('id')
                ->first();

            $patient = Patient::where('patientcode', $exam->patientcode)
                ->latest('id')
                ->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $nurses = User::where('position', 'LIKE', '%Nurse%')->get();
            $physicians = User::where('position', 'LIKE', '%Physician%')->get();
            return view('ECG.edit-ecg', compact('exam', 'patient', 'admission', 'nurses', 'physicians'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_ecg(Request $request)
    {
        try {
            $id = $request->id;
            $exam = ECG::findOrFail($id);
            $exam->otoscopy = $request->otoscopy;
            $exam->heart = $request->heart;
            $exam->lung = $request->lung;
            $exam->ecg = $request->ecg;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->findings = $request->findings;
            $exam->recommendation = $request->recommendation;
            $exam->practioner_comment = $request->practioner_comment;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $exam->updated_date = date('Y-m-d');
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Update ECG from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log_save = $log->save();

            if ($save && $log_save) return back()->with('status', 'ECG Updated');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_ecg()
    {
        try {
            $id = $_GET['id'];
            $admission = Admission::select('tran_admission.*', 'mast_patient.firstname as firstname', 'mast_patient.lastname as lastname', 'mast_patient.id as patient_id')
                ->where('tran_admission.id', $id)
                ->leftJoin('mast_patient', 'mast_patient.patientcode', 'tran_admission.patientcode')
                ->latest('mast_patient.id')
                ->first();
            $nurses = User::where('position', 'LIKE', '%Nurse%')->get();
            $physicians = User::where('position', 'LIKE', '%Physician%')->get();
            return view('ECG.add-ecg', compact('admission', 'nurses', 'physicians'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_ecg(Request $request)
    {
        try {
                $exam = new ECG();
                $exam->trans_date = $request->trans_date;
                $exam->admission_id = $request->admission_id;
                $exam->otoscopy = $request->otoscopy;
                $exam->heart = $request->heart;
                $exam->lung = $request->lung;
                $exam->ecg = $request->ecg;
                $exam->remarks = $request->remarks;
                $exam->remarks_status = $request->remarks_status;
                $exam->findings = $request->findings;
                $exam->recommendation = $request->recommendation;
                $exam->practioner_comment = $request->practioner_comment;
                $exam->technician_id = $request->technician_id;
                $exam->technician2_id = $request->technician2_id;
                $save = $exam->save();

                $employeeInfo = session()->all();
                $log = new EmployeeLog();
                $log->employee_id = $employeeInfo['employeeId'];
                $log->description = 'Add ECG from Patient ' . $request->patientcode;
                $log->date = date('Y-m-d');
                $log_save = $log->save();

                $path = 'patient_edit?id=' . $request->patient_id . '&patientcode=' . $request->patientcode;

                if ($save && $log_save) {
                    return redirect($path)->with('status', 'ECG added')
                        ->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab5;tabVerticalLeft5');
                }

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}
