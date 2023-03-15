<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Miscellaneous;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class MiscellaneousController extends Controller
{
    //
    public function edit_misc(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Miscellaneous::select(
                'examlab_misc.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_misc.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_misc.admission_id'
                )
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $patient->admission_id)->first();
            
            $medical_techs = User::where('position', '=', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            return view('Miscellaneous.edit-misc', compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_misc(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = Miscellaneous::findOrFail($id);
            $exam->exam = $request->exam;
            $exam->result = $request->result;
            $exam->col1 = $request->col1;
            $exam->col2 = $request->col2;
            $exam->col3 = $request->col3;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Miscellaneous from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'Miscellaneous updated.');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function add_misc()
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
            
            $medical_techs = User::where('position', '=', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            return view('Miscellaneous.add-misc', compact('admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_misc(Request $request)
    {   
        try {
            $exam = new Miscellaneous();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->exam = $request->exam;
            $exam->result = $request->result;
            $exam->col1 = $request->col1;
            $exam->col2 = $request->col2;
            $exam->col3 = $request->col3;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Miscellaneous from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Miscellaneous added.')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab29;tabVerticalLeft29');
            }
        }  catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}