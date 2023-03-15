<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodSerology;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class BloodSerologyController extends Controller
{
    //
    public function add_bloodsero()
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
            
            return view('Blood_Serology.add-bloodserology', compact('admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_bloodsero(Request $request)
    {   
        try {
            $data = $request->except('_token', 'patient_id', 'peme_date', 'patientname', 'patientcode', 'action', 'id');
            $save = BloodSerology::create($data);
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Blood/Serology from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
                return redirect($path)->with('status', 'Blood Serology added.')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab21;tabVerticalLeft21');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_bloodsero()
    {   
        try {
            $id = $_GET['id'];
            $exam = BloodSerology::select(
                'examlab_bloodsero.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_bloodsero.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_bloodsero.admission_id'
                )
                ->latest('id')
                ->first();

            $patient = Patient::where('patientcode', $exam->patientcode)->first();
            $admission = Admission::where('id', $exam->admission_id)->with('patient')->first();
            
            $medical_techs = User::where('position', '=', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            return view(
                'Blood_Serology.edit-bloodserology',
                compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists')
            );
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_bloodsero(Request $request)
    {   
        try {
            $data = $request->except('_token', 'peme_date', 'patientname', 'patientcode', 'action', 'id');
            $id = $request->id;
            $blood_sero = BloodSerology::where('id', $id)->latest('id')->update($data);
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Blood/Serology from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
            return back()->with('status', 'Blood Serology updated.');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}