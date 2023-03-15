<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\VisualAcuity;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class VisacuityController extends Controller
{
    //
    public function edit_visacuity(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = VisualAcuity::select(
                'exam_visacuity.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_visacuity.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_visacuity.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
           $admission = Admission::where('id', $exam->admission_id)->first();
            $optometrists = User::where('position', 'LIKE', '%Optometrist%')->get();
            $medical_directors = User::where('position', 'Medical Director')->get();
            
            return view('Visacuity.edit-visacuity', compact('exam', 'patient', 'admission', 'optometrists', 'medical_directors'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_visacuity(Request $request)
    {   
        try {
            // dd($request->all());
            $id = $request->id;
            $exam = VisualAcuity::where('id', $id)->first();
            $exam->ufvod = $request->ufvod;
            $exam->ufvos = $request->ufvos;
            $exam->unvodj = $request->unvodj;
            $exam->unvosj = $request->unvosj;
            $exam->cfvod = $request->cfvod;
            $exam->cfvos = $request->cfvos;
            $exam->cnvodj = $request->cnvodj;
            $exam->cnvosj = $request->cnvosj;
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
                'Update Visual Acuity from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'Visual Acuity updated!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_visacuity()
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
                 $optometrists = User::where('position', 'LIKE', '%Optometrist%')->get();
                 $medical_directors = User::where('position', 'Medical Director')->get();
            return view('Visacuity.add-visacuity', compact('admission', 'optometrists', 'medical_directors'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_visacuity(Request $request)
    {   
        try {
            $exam = new VisualAcuity();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->ufvod = $request->ufvod;
            $exam->ufvos = $request->ufvos;
            $exam->unvodj = $request->unvodj;
            $exam->unvosj = $request->unvosj;
            $exam->cfvod = $request->cfvod;
            $exam->cfvos = $request->cfvos;
            $exam->cnvodj = $request->cnvodj;
            $exam->cnvosj = $request->cnvosj;
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
                'Add Visual Acuity from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
                
            if ($save) {
                return redirect($path)->with('status', 'Visual Acuity added!')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab16;tabVerticalLeft16');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}