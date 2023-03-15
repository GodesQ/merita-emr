<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urinalysis;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class UrinalysisController extends Controller
{
    //
    public function edit_urinalysis(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Urinalysis::select(
                'examlab_urin.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_urin.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_urin.admission_id'
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
            
            return view('Urinalysis.edit-urinalysis', compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_urinalysis(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = Urinalysis::findOrFail($id);
            $exam->color = $request->color;
            $exam->transparency = $request->transparency;
            $exam->ph = $request->ph;
            $exam->spgravity = $request->spgravity;
            $exam->sugar = $request->sugar;
            $exam->albumin = $request->albumin;
            $exam->ketone = $request->ketone;
            $exam->urobilinogen = $request->urobilinogen;
            $exam->bilirubin = $request->bilirubin;
            $exam->nitrite = $request->nitrite;
            $exam->leukocyte = $request->leukocyte;
            $exam->blood = $request->blood;
            $exam->pus = $request->pus;
            $exam->rbc = $request->rbc;
            $exam->epithelial = $request->epithelial;
            $exam->urates = $request->urates;
            $exam->phosphates = $request->phosphates;
            $exam->mucus = $request->mucus;
            $exam->bacteria = $request->bacteria;
            $exam->others = $request->others;
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
                'Update Urinalysis from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'Urinalysis updated.');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_urinalysis()
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
            
            return view('Urinalysis.add-urinalysis', compact('admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_urinalysis(Request $request)
    {   
        try {
            $exam = new Urinalysis();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->color = $request->color;
            $exam->transparency = $request->transparency;
            $exam->ph = $request->ph;
            $exam->spgravity = $request->spgravity;
            $exam->sugar = $request->sugar;
            $exam->albumin = $request->albumin;
            $exam->ketone = $request->ketone;
            $exam->urobilinogen = $request->urobilinogen;
            $exam->bilirubin = $request->bilirubin;
            $exam->nitrite = $request->nitrite;
            $exam->leukocyte = $request->leukocyte;
            $exam->blood = $request->blood;
            $exam->pus = $request->pus;
            $exam->rbc = $request->rbc;
            $exam->epithelial = $request->epithelial;
            $exam->urates = $request->urates;
            $exam->phosphates = $request->phosphates;
            $exam->mucus = $request->mucus;
            $exam->bacteria = $request->bacteria;
            $exam->others = $request->others;
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
                'Add Urinalysis from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Urinalysis added.')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab28;tabVerticalLeft28');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}