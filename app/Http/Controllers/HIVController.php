<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HIV;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\BloodSerology;
use App\Models\Hematology;
use App\Models\EmployeeLog;

class HIVController extends Controller
{
    //
    public function edit_hiv(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = HIV::select(
                'examlab_hiv.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_hiv.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_hiv.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $physicians = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Physician%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Physician%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            $med_techs = User::where('position', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            return view('HIV.edit-hiv', compact('exam', 'patient', 'admission', 'physicians', 'med_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_hiv(Request $request)
    {   
        try {
           
            $id = $request->id;
            $exam = HIV::where('id', $id)->first();
            $exam->exam = $request->exam;
            $exam->others = $request->others;
            $exam->result = $request->result;
            $exam->result_cov = $request->result_cov;
            $exam->result_pv = $request->result_pv;
            $exam->expiry_date = $request->expiry_date;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $exam->technician3_id = $request->technician3_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Update HIV from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'HIV updated');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function add_hiv()
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
            $physicians = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Physician%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Physician%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            $med_techs = User::where('position', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();

            return view('HIV.add-hiv', compact('admission', 'physicians', 'med_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_hiv(Request $request)
    {   
        try {
            $exam = new HIV();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->exam = $request->exam;
            $exam->others = $request->others;
            $exam->result = $request->result;
            $exam->result_cov = $request->result_cov;
            $exam->result_pv = $request->result_pv;
            $exam->expiry_date = $request->expiry_date;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $exam->technician3_id = $request->technician3_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Add HIV from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'HIV added')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab22;tabVerticalLeft22');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}