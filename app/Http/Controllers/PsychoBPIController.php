<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\PsychoBPI;
use App\Models\Admission;
use App\Models\EmployeeLog;

class PsychoBPIController extends Controller
{
    //
    public function edit_psychobpi(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = PsychoBPI::select(
                'exam_psychobpi.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_psychobpi.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_psychobpi.admission_id'
                )
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $patient->admission_id)->first();
            return view('PsychoBPI.edit-psychobpi', compact('exam', 'patient', 'admission'));
        }  catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
    public function update_psychobpi(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = PsychoBPI::findOrFail($id);
            $exam->hypochondriasis_rs = $request->hypochondriasis_rs;
            $exam->hypochondriasis_ss = $request->hypochondriasis_ss;
            $exam->depression_rs = $request->depression_rs;
            $exam->depression_ss = $request->depression_ss;
            $exam->denial_rs = $request->denial_rs;
            $exam->denial_ss = $request->denial_ss;
            $exam->problem_rs = $request->problem_rs;
            $exam->problem_ss = $request->problem_ss;
            $exam->allenation_rs = $request->allenation_rs;
            $exam->allenation_ss = $request->allenation_ss;
            $exam->ideas_rs = $request->ideas_rs;
            $exam->ideas_ss = $request->hypochondriasis_rs;
            $exam->anxiety_rs = $request->hypochondriasis_rs;
            $exam->anxiety_ss = $request->anxiety_ss;
            $exam->thinking_rs = $request->thinking_rs;
            $exam->thinking_ss = $request->thinking_ss;
            $exam->impulse_rs = $request->impulse_rs;
            $exam->impulse_ss = $request->impulse_ss;
            $exam->social_rs = $request->social_rs;
            $exam->social_ss = $request->social_ss;
            $exam->self_rs = $request->self_rs;
            $exam->self_ss = $request->self_ss;
            $exam->deviation_rs = $request->deviation_rs;
            $exam->deviation_ss = $request->deviation_ss;
            $exam->hypochondriasis_scores = $request->hypochondriasis_scores;
            $exam->depression_scores = $request->depression_scores;
            $exam->problem_scores = $request->problem_scores;
            $exam->allenation_scores = $request->allenation_scores;
            $exam->ideas_scores = $request->ideas_scores;
            $exam->anxiety_scores = $request->anxiety_scores;
            $exam->thinking_scores = $request->thinking_scores;
            $exam->impulse_scores = $request->impulse_scores;
            $exam->social_scores = $request->social_scores;
            $exam->self_scores = $request->self_scores;
            $exam->deviation_scores = $request->deviation_scores;
            $exam->conclusion = $request->conclusion;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Psyco BPI from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'Psycho BPI updated!');
            }
        }  catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_psychobpi()
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
            return view('PsychoBPI.add-psychobpi', compact('admission'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_psychobpi(Request $request)
    {   
        try {
            $exam = new PsychoBPI();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->hypochondriasis_rs = $request->hypochondriasis_rs;
            $exam->hypochondriasis_ss = $request->hypochondriasis_ss;
            $exam->depression_rs = $request->depression_rs;
            $exam->depression_ss = $request->depression_ss;
            $exam->denial_rs = $request->denial_rs;
            $exam->denial_ss = $request->denial_ss;
            $exam->problem_rs = $request->problem_rs;
            $exam->problem_ss = $request->problem_ss;
            $exam->allenation_rs = $request->allenation_rs;
            $exam->allenation_ss = $request->allenation_ss;
            $exam->ideas_rs = $request->ideas_rs;
            $exam->ideas_ss = $request->hypochondriasis_rs;
            $exam->anxiety_rs = $request->hypochondriasis_rs;
            $exam->anxiety_ss = $request->anxiety_ss;
            $exam->thinking_rs = $request->thinking_rs;
            $exam->thinking_ss = $request->thinking_ss;
            $exam->impulse_rs = $request->impulse_rs;
            $exam->impulse_ss = $request->impulse_ss;
            $exam->social_rs = $request->social_rs;
            $exam->social_ss = $request->social_ss;
            $exam->self_rs = $request->self_rs;
            $exam->self_ss = $request->self_ss;
            $exam->deviation_rs = $request->deviation_rs;
            $exam->deviation_ss = $request->deviation_ss;
            $exam->hypochondriasis_scores = $request->hypochondriasis_scores;
            $exam->depression_scores = $request->depression_scores;
            $exam->problem_scores = $request->problem_scores;
            $exam->allenation_scores = $request->allenation_scores;
            $exam->ideas_scores = $request->ideas_scores;
            $exam->anxiety_scores = $request->anxiety_scores;
            $exam->thinking_scores = $request->thinking_scores;
            $exam->impulse_scores = $request->impulse_scores;
            $exam->social_scores = $request->social_scores;
            $exam->self_scores = $request->self_scores;
            $exam->deviation_scores = $request->deviation_scores;
            $exam->conclusion = $request->conclusion;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Psyco BPI from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Psycho BPI added!')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab11;tabVerticalLeft11');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}