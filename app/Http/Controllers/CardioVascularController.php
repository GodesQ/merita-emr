<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\CardioVascular;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;
use App\Models\PhysicalExam;

class CardioVascularController extends Controller
{
    public function edit_cardiovascular(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = CardioVascular::select(
                'exam_cardio.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_cardio.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_cardio.admission_id'
                )
                ->latest('id')
                ->first();

            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $cardiologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Cardiologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Cardiologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            $exam_physical = PhysicalExam::where('admission_id', $admission->id)->latest('id')->first();
            return view(
                'CardioVascular.edit-cardiovascular',
                compact('exam', 'patient', 'admission', 'cardiologists', 'exam_physical')
            );
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_cardiovascular(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = CardioVascular::findOrFail($id);
            $exam->pasthistory = $request->pasthistory;
            $exam->medmaint = $request->medmaint;
            $exam->smoking = $request->smoking;
            $exam->alcohol = $request->alcohol;
            $exam->bp = $request->bp;
            $exam->hr = $request->hr;
            $exam->rhythm = $request->rhythm;
            $exam->height = $request->height;
            $exam->weight = $request->weight;
            $exam->bmi = $request->bmi;
            $exam->heent = $request->heent;
            $exam->cardiac = $request->cardiac;
            $exam->lung = $request->lung;
            $exam->other = $request->other;
            $exam->egc = $request->egc;
            $exam->echo = $request->echo;
            $exam->stress = $request->stress;
            $exam->tse = $request->tse;
            $exam->othertest = $request->othertest;
            $exam->crf = $request->crf;
            $exam->impression = $request->impression;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $exam->updated_date = date("Y-m-d");
            $save = $exam->save();
            
            PhysicalExam::where('admission_id', $request->admission_id)->update([
            "height" => $request->height,
            "weight" => $request->weight,
            "bmi" => $request->bmi,
            ]);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Cardiovascular from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Cardiovascular updated!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_cardiovascular(Request $request)
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
            $exam_physical = PhysicalExam::where('admission_id', $admission->id)->latest('id')->first();
            // dd($cardiologists);
            return view('CardioVascular.add-cardiovascular', compact('admission', 'cardiologists', 'exam_physical'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_cardiovascular(Request $request)
    {   
        try {
            $exam = new CardioVascular();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->pasthistory = $request->pasthistory;
            $exam->medmaint = $request->medmaint;
            $exam->smoking = $request->smoking;
            $exam->alcohol = $request->alcohol;
            $exam->bp = $request->bp;
            $exam->hr = $request->hr;
            $exam->rhythm = $request->rhythm;
            $exam->height = $request->height;
            $exam->weight = $request->weight;
            $exam->bmi = $request->bmi;
            $exam->heent = $request->heent;
            $exam->cardiac = $request->cardiac;
            $exam->lung = $request->lung;
            $exam->other = $request->other;
            $exam->egc = $request->egc;
            $exam->echo = $request->echo;
            $exam->stress = $request->stress;
            $exam->tse = $request->tse;
            $exam->othertest = $request->othertest;
            $exam->crf = $request->crf;
            $exam->impression = $request->impression;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Cardiovascular from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Cardiovascular added!')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab3;tabVerticalLeft3');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}