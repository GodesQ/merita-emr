<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fecalysis;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class FecalysisController extends Controller
{
    //
    public function edit_fecalysis(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Fecalysis::select(
                'examlab_feca.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_feca.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_feca.admission_id'
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
            
            return view('Fecalysis.edit-fecalysis', compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_fecalysis(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = Fecalysis::findOrFail($id);
            $exam->color = $request->color;
            $exam->consistency = $request->consistency;
            $exam->pus = $request->pus;
            $exam->rbc = $request->rbc;
            $exam->yeast = $request->yeast;
            $exam->mucus = $request->mucus;
            $exam->ova = $request->ova;
            $exam->bacteria = $request->bacteria;
            $exam->stool_culture = $request->stool_culture;
            $exam->stool_status = $request->stool_status;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $exam->epithelial = $request->epithelial;

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Fecalysis from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $save = $exam->save();
            if ($save) {
                return back()->with('status', 'Fecaslysis updated.');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
    public function add_fecalysis()
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
            
            return view('Fecalysis.add-fecalysis', compact('admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_fecalysis(Request $request)
    {   
        try {
            $exam = new Fecalysis();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->color = $request->color;
            $exam->consistency = $request->consistency;
            $exam->pus = $request->pus;
            $exam->rbc = $request->rbc;
            $exam->yeast = $request->yeast;
            $exam->mucus = $request->mucus;
            $exam->ova = $request->ova;
            $exam->bacteria = $request->bacteria;
            $exam->stool_culture = $request->stool_culture;
            $exam->stool_status = $request->stool_status;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $exam->epithelial = $request->epithelial;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Fecalysis from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Fecaslysis added.')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab24;tabVerticalLeft24');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }
}