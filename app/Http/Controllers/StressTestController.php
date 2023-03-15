<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\StressTest;
use App\Models\Admission;
use App\Models\EmployeeLog;
use App\Models\User;

class StressTestController extends Controller
{
    //
    public function edit_stresstest(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = StressTest::select(
                'exam_stresstest.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_stresstest.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_stresstest.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $patient->admission_id)->first();
           $cardiologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Cardiologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Cardiologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            return view('StressTest.edit-stresstest', compact('exam', 'patient', 'admission', 'cardiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_stresstest(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = StressTest::findOrFail($id);
            $exam->indication = $request->indication;
            $exam->medication = $request->medication;
            $exam->exercise_speed = $request->exercise_speed;
            $exam->exercise_grade = $request->exercise_grade;
            $exam->exercise_mets = $request->exercise_mets;
            $exam->exercise_bp = $request->exercise_bp;
            $exam->exercise_hr = $request->exercise_hr;
            $exam->exercise_remarks = $request->exercise_remarks;
            $exam->stage1_speed = $request->stage1_speed;
            $exam->stage1_grade = $request->stage1_grade;
            $exam->stage1_mets = $request->stage1_mets;
            $exam->stage1_bp = $request->stage1_bp;
            $exam->stage1_hr = $request->stage1_hr;
            $exam->stage1_remarks = $request->stage1_remarks;
            $exam->stage2_speed = $request->stage2_speed;
            $exam->stage2_grade = $request->stage2_grade;
            $exam->stage2_mets = $request->stage2_mets;
            $exam->stage2_bp = $request->stage2_bp;
            $exam->stage2_hr = $request->stage2_hr;
            $exam->stage2_remarks = $request->stage2_remarks;
            $exam->stage3_speed = $request->stage3_speed;
            $exam->stage3_grade = $request->stage3_grade;
            $exam->stage3_mets = $request->stage3_mets;
            $exam->stage3_bp = $request->stage3_bp;
            $exam->stage3_hr = $request->stage3_hr;
            $exam->stage3_remarks = $request->stage3_remarks;
            $exam->stage4_speed = $request->stage4_speed;
            $exam->stage4_grade = $request->stage4_grade;
            $exam->stage4_mets = $request->stage4_mets;
            $exam->stage4_bp = $request->stage4_bp;
            $exam->stage4_hr = $request->stage4_hr;
            $exam->stage4_remarks = $request->stage4_remarks;
            $exam->stage5_speed = $request->stage5_speed;
            $exam->stage5_grade = $request->stage5_grade;
            $exam->stage5_mets = $request->stage5_mets;
            $exam->stage5_bp = $request->stage5_bp;
            $exam->stage5_hr = $request->stage5_hr;
            $exam->stage5_remarks = $request->stage5_remarks;
            $exam->stage6_speed = $request->stage6_speed;
            $exam->stage6_grade = $request->stage6_grade;
            $exam->stage6_mets = $request->stage6_mets;
            $exam->stage6_bp = $request->stage6_bp;
            $exam->stage6_hr = $request->stage6_hr;
            $exam->stage6_remarks = $request->stage6_remarks;
            $exam->stage7_speed = $request->stage7_speed;
            $exam->stage7_grade = $request->stage7_grade;
            $exam->stage7_mets = $request->stage7_mets;
            $exam->stage7_bp = $request->stage7_bp;
            $exam->stage7_hr = $request->stage7_hr;
            $exam->stage7_remarks = $request->stage7_remarks;
            $exam->bp_after = $request->bp_after;
            $exam->hr_after = $request->hr_after;
            $exam->bp_1min = $request->bp_1min;
            $exam->hr_1min = $request->hr_1min;
            $exam->bp_3mins = $request->bp_3mins;
            $exam->hr_3min = $request->hr_3min;
            $exam->bp_5mins = $request->bp_5mins;
            $exam->hr_5min = $request->hr_5min;
            $exam->bp_8mins = $request->bp_8mins;
            $exam->hr_8min = $request->hr_8min;
            $exam->resting_ecg = $request->resting_ecg;
            $exam->symptoms = $request->symptoms;
            $exam->response = $request->response;
            $exam->exercise_type = $request->exercise_type;
            $exam->reach_min = $request->reach_min;
            $exam->reach_sec = $request->reach_sec;
            $exam->stage = $request->stage;
            $exam->mets = $request->mets;
            $exam->heart_rate = $request->heart_rate;
            $exam->max_heartrate = $request->max_heartrate;
            $exam->bpm_equiv = $request->bpm_equiv;
            $exam->starting_bp = $request->starting_bp;
            $exam->max_bp = $request->max_bp;
            $exam->double_prod = $request->double_prod;
            $exam->ecg = $request->ecg;
            $exam->capacity = $request->capacity;
            $exam->arrhythmias = $request->arrhythmias;
            $exam->conclusion = $request->conclusion;
            $exam->suggestion = $request->suggestion;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update StressTest from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'StressTest updated.');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
    public function add_stresstest(Request $request)
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
                $cardiologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
                ->where('mast_employee.position', 'LIKE', '%Cardiologist%')
                ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Cardiologist%')
                ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
                ->get();
            return view('StressTest.add-stresstest', compact('admission', 'cardiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_stresstest(Request $request)
    {   
        try {
            $exam = new StressTest();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->indication = $request->indication;
            $exam->medication = $request->medication;
            $exam->exercise_speed = $request->exercise_speed;
            $exam->exercise_grade = $request->exercise_grade;
            $exam->exercise_mets = $request->exercise_mets;
            $exam->exercise_bp = $request->exercise_bp;
            $exam->exercise_hr = $request->exercise_hr;
            $exam->exercise_remarks = $request->exercise_remarks;
            $exam->stage1_speed = $request->stage1_speed;
            $exam->stage1_grade = $request->stage1_grade;
            $exam->stage1_mets = $request->stage1_mets;
            $exam->stage1_bp = $request->stage1_bp;
            $exam->stage1_hr = $request->stage1_hr;
            $exam->stage1_remarks = $request->stage1_remarks;
            $exam->stage2_speed = $request->stage2_speed;
            $exam->stage2_grade = $request->stage2_grade;
            $exam->stage2_mets = $request->stage2_mets;
            $exam->stage2_bp = $request->stage2_bp;
            $exam->stage2_hr = $request->stage2_hr;
            $exam->stage2_remarks = $request->stage2_remarks;
            $exam->stage3_speed = $request->stage3_speed;
            $exam->stage3_grade = $request->stage3_grade;
            $exam->stage3_mets = $request->stage3_mets;
            $exam->stage3_bp = $request->stage3_bp;
            $exam->stage3_hr = $request->stage3_hr;
            $exam->stage3_remarks = $request->stage3_remarks;
            $exam->stage4_speed = $request->stage4_speed;
            $exam->stage4_grade = $request->stage4_grade;
            $exam->stage4_mets = $request->stage4_mets;
            $exam->stage4_bp = $request->stage4_bp;
            $exam->stage4_hr = $request->stage4_hr;
            $exam->stage4_remarks = $request->stage4_remarks;
            $exam->stage5_speed = $request->stage5_speed;
            $exam->stage5_grade = $request->stage5_grade;
            $exam->stage5_mets = $request->stage5_mets;
            $exam->stage5_bp = $request->stage5_bp;
            $exam->stage5_hr = $request->stage5_hr;
            $exam->stage5_remarks = $request->stage5_remarks;
            $exam->stage6_speed = $request->stage6_speed;
            $exam->stage6_grade = $request->stage6_grade;
            $exam->stage6_mets = $request->stage6_mets;
            $exam->stage6_bp = $request->stage6_bp;
            $exam->stage6_hr = $request->stage6_hr;
            $exam->stage6_remarks = $request->stage6_remarks;
            $exam->stage7_speed = $request->stage7_speed;
            $exam->stage7_grade = $request->stage7_grade;
            $exam->stage7_mets = $request->stage7_mets;
            $exam->stage7_bp = $request->stage7_bp;
            $exam->stage7_hr = $request->stage7_hr;
            $exam->stage7_remarks = $request->stage7_remarks;
            $exam->bp_after = $request->bp_after;
            $exam->hr_after = $request->hr_after;
            $exam->bp_1min = $request->bp_1min;
            $exam->hr_1min = $request->hr_1min;
            $exam->bp_3mins = $request->bp_3mins;
            $exam->hr_3min = $request->hr_3min;
            $exam->bp_5mins = $request->bp_5mins;
            $exam->hr_5min = $request->hr_5min;
            $exam->bp_8mins = $request->bp_8mins;
            $exam->hr_8min = $request->hr_8min;
            $exam->resting_ecg = $request->resting_ecg;
            $exam->symptoms = $request->symptoms;
            $exam->response = $request->response;
            $exam->exercise_type = $request->exercise_type;
            $exam->reach_min = $request->reach_min;
            $exam->reach_sec = $request->reach_sec;
            $exam->stage = $request->stage;
            $exam->mets = $request->mets;
            $exam->heart_rate = $request->heart_rate;
            $exam->max_heartrate = $request->max_heartrate;
            $exam->bpm_equiv = $request->bpm_equiv;
            $exam->starting_bp = $request->starting_bp;
            $exam->max_bp = $request->max_bp;
            $exam->double_prod = $request->double_prod;
            $exam->ecg = $request->ecg;
            $exam->capacity = $request->capacity;
            $exam->arrhythmias = $request->arrhythmias;
            $exam->conclusion = $request->conclusion;
            $exam->suggestion = $request->suggestion;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add StressTest from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'StressTest added.')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab13;tabVerticalLeft13');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}