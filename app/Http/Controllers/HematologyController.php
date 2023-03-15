<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hematology;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class HematologyController extends Controller
{
    //
    public function edit_hematology(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Hematology::select(
                'examlab_hema.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_hema.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_hema.admission_id'
                )
                ->latest('id')
                ->first();
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            
            $medical_techs = User::where('position', '=', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            return view('Hematology.edit-hematology', compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function update_hematology(Request $request)
    {   try {
            $data = $request->except('_token', 'peme_date', 'patientname', 'patientcode', 'action', 'id');
            $id = $request->id;
            $save = Hematology::where('id', $id)->update($data);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Hematology from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Hematology updated.');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function add_hematology()
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
            
            
            
            
            return view('Hematology.add-hematology', compact('admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function store_hematology(Request $request)
    {   
        try {
            $data = $request->except('_token', 'id', 'peme_date', 'patientname', 'patientcode', 'action', 'patient_id');

            $save = Hematology::insert($data);
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Hematology from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Hematology added.')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab25;tabVerticalLeft25');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}

// ALTER TABLE `examlab_hema` ADD 
// `hemoglobin_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `others_result`, ADD `hematocrit_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `hemoglobin_recommendation`, 
// ADD `rbc_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `hematocrit_recommendation`, ADD `wbc_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `rbc_recommendation`,
//  ADD `neuthrophils_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `wbc_recommendation`, ADD `lymphocytes_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `neuthrophils_recommendation`, 
//  ADD `eosinophils_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `lymphocytes_recommendation`, ADD `monophils_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `eosinophils_recommendation`,
//   ADD `baspophils_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `monophils_recommendation`, ADD `stabs_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `baspophils_recommendation`, ADD `blood_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `stabs_recommendation`, ADD `rhfactor_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `blood_recommendation`, ADD `platelet_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `rhfactor_recommendation`, ADD `bleeding_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `platelet_recommendation`, ADD `clotting_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `bleeding_recommendation`, ADD `esr_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `clotting_recommendation`, ADD `mcv_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `esr_recommendation`, ADD `mch_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `mcv_recommendation`, 
// ADD `mchc_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `mch_recommendation`, ADD `others_recommendation` LONGTEXT NULL DEFAULT NULL AFTER `mchc_recommendation`;