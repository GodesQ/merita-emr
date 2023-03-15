<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Audiometry;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class AudiometryController extends Controller
{
    //
    public function add_audiometry()
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
            
            $audiometricians = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Audiometrician%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Audiometrician%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            $otolaries = User::where('position', 'LIKE', '%Otolaryngologist%')->get();
            
            return view('Audiometry.add-audiometry', compact('admission', 'audiometricians', 'otolaries'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_audiometry(Request $request)
    {   
        try {
            $data = $request->except('_token', 'action', 'patient_id', 'patientname', 'patientcode', 'peme_date', 'id');
            $save = DB::table('exam_audio')->insert($data);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Audiometry from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;

            return redirect($path)->with('status', 'Audiometry added.')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab1;tabVerticalLeft1');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_audiometry()
    {   
        try {
            $id = $_GET['id'];
            $exam = Audiometry::select(
                'exam_audio.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_audio.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_audio.admission_id'
                )
                ->latest('id')
                ->first();

            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->with('exam_audio')->first();
            
            $audiometricians = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Audiometrician%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Audiometrician%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            $otolaries = User::where('position', 'LIKE', '%Otolaryngologist%')->get();
            return view('Audiometry.edit-audiometry', compact('exam', 'patient', 'admission', 'audiometricians', 'otolaries'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_audiometry(Request $request)
    {   
        try {
            $id = $request->id;
            $data = $request->except('_token', 'action', 'patient_id', 'patientname', 'patientcode', 'peme_date', 'id', 'admission_id', 'trans_date');
            $save = DB::table('exam_audio')->where('id', $id)->update($data);
            //  dd($save);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Audiometry from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            return back()->with('status', 'Audiometry updated.');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}