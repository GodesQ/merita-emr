<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Psychological;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class PsychologicalController extends Controller
{
    //
    public function edit_psycho(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Psychological::select(
                'exam_psycho.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_psycho.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_psycho.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
           $admission = Admission::where('id', $exam->admission_id)->first();
            $psychometricians = User::where('position', 'LIKE', '%Psychometrician%')->get();
            $psychologists = User::where('position', 'LIKE', '%Psychologist%')->get();
            return view('Psychological.edit-psycho', compact('exam', 'patient', 'admission', 'psychometricians', 'psychologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_psycho(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = Psychological::where('id', $id)->latest('id')->first();
            $exam->test_administered = 'Intelligence Test (IQ)';
            $exam->others = $request->others;
            $exam->intellectual = $request->intellectual;
            $exam->responsibility1 = $request->responsibility1;
            $exam->responsibility2 = $request->responsibility2;
            $exam->responsibility3 = $request->responsibility3;
            $exam->responsibility4 = $request->responsibility4;
            $exam->responsibility5 = $request->responsibility5;
            $exam->stability1 = $request->stability1;
            $exam->stability2 = $request->stability2;
            $exam->stability3 = $request->stability3;
            $exam->stability4 = $request->stability4;
            $exam->stability5 = $request->stability5;
            $exam->objectivity1 = $request->objectivity1;
            $exam->objectivity2 = $request->objectivity2;
            $exam->objectivity3 = $request->objectivity3;
            $exam->motivation1 = $request->motivation1;
            $exam->motivation2 = $request->motivation2;
            $exam->motivation3 = $request->motivation3;
            $exam->adjustment1 = $request->adjustment1;
            $exam->adjustment2 = $request->adjustment2;
            $exam->adjustment3 = $request->adjustment3;
            $exam->adjustment4 = $request->adjustment4;
            $exam->goal1 = $request->goal1;
            $exam->conclusion = $request->conclusion;
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
                'Update Psychological from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'Psychological updated!!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_psycho()
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
            $psychometricians = User::where('position', 'LIKE', '%Psychometrician%')->get();
            $psychologists = User::where('position', 'LIKE', '%Psychologist%')->get();
            return view('Psychological.add-psychological', compact('admission', 'psychometricians', 'psychologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_psycho(Request $request)
    {   
        try {
            $exam = new Psychological();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->test_administered = 'Intelligence Test (IQ)';
            $exam->others = $request->others;
            $exam->intellectual = $request->intellectual;
            $exam->responsibility1 = $request->responsibility1;
            $exam->responsibility2 = $request->responsibility2;
            $exam->responsibility3 = $request->responsibility3;
            $exam->responsibility4 = $request->responsibility4;
            $exam->responsibility5 = $request->responsibility5;
            $exam->stability1 = $request->stability1;
            $exam->stability2 = $request->stability2;
            $exam->stability3 = $request->stability3;
            $exam->stability4 = $request->stability4;
            $exam->stability5 = $request->stability5;
            $exam->objectivity1 = $request->objectivity1;
            $exam->objectivity2 = $request->objectivity2;
            $exam->objectivity3 = $request->objectivity3;
            $exam->motivation1 = $request->motivation1;
            $exam->motivation2 = $request->motivation2;
            $exam->motivation3 = $request->motivation3;
            $exam->adjustment1 = $request->adjustment1;
            $exam->adjustment2 = $request->adjustment2;
            $exam->adjustment3 = $request->adjustment3;
            $exam->adjustment4 = $request->adjustment4;
            $exam->goal1 = $request->goal1;
            $exam->conclusion = $request->conclusion;
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
                'Add Psychological from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Psychological added!!')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab10;tabVerticalLeft10');;
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}