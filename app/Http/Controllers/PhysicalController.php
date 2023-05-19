<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PhysicalExam;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\MedicalHistory;
use App\Models\User;
use App\Models\XRay;
use App\Models\ECG;
use App\Models\Hematology;
use App\Models\Urinalysis;
use App\Models\Fecalysis;
use App\Models\BloodSerology;
use App\Models\CardioVascular;
use App\Models\HIV;
use App\Models\Psychological;
use App\Models\EmployeeLog;

class PhysicalController extends Controller
{
    //
    public function edit_physical(Request $request)
    {
        try {
            $id = $_GET['id'];
            $exam = PhysicalExam::select(
                'exam_physical.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_physical.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_physical.admission_id'
                )
                ->latest('id')
                ->first();

            $exam_xray = XRay::where('admission_id', $id)->latest('id')->first();
            $exam_ecg = ECG::where('admission_id', $id)->latest('id')->first();
            $exam_hema = Hematology::where('admission_id', $id)->latest('id')->first();
            $exam_urin = Urinalysis::where('admission_id', $id)->latest('id')->first();
            $exam_feca = Fecalysis::where('admission_id', $id)->latest('id')->first();
            $exam_bloodsero = BloodSerology::where('admission_id', $id)->latest('id')->first();
            $exam_hiv = HIV::where('admission_id', $id)->latest('id')->first();
            $exam_psycho = Psychological::where('admission_id', $id)->latest('id')->first();
            $exam_cardio = CardioVascular::where('admission_id', $id)->latest('id')->first();

            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $medical_history = MedicalHistory::where('main_id', optional($patient)->id)->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $physicians = User::where('position', 'LIKE', '%Physician%')->get();
            return view('Physical.edit-physical', compact('exam', 'patient', 'medical_history', 'admission', 'physicians', 'exam_xray', 'exam_ecg', 'exam_hema', 'exam_urin', 'exam_feca', 'exam_bloodsero', 'exam_hiv', 'exam_psycho', 'exam_cardio'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_physical(Request $request)
    {
        $id = $request->id;
        $data = $request->except('_token', 'action', 'patient_id', 'patientname', 'patientcode');

        $physical = PhysicalExam::find($id);

        $attributes = $physical->getAttributes();

        $final_data = array_merge(array_fill_keys(array_keys($attributes), null), $data);

        $physical->fill($final_data);
        $physical->save();

        PhysicalExam::where('id', $id)->update([
            "a1" => $request->has('a1') ? 'Yes' : null,
            "a2" => $request->has('a2') ? 'Yes' : null,
            "a3" => $request->has('a3') ? 'Yes' : null,
            "a4" => $request->has('a4') ? 'Yes' : null,
            "a5" => $request->has('a5') ? 'Yes' : null,
            "a6" => $request->has('a6') ? 'Yes' : null,
            "a7" => $request->has('a7') ? 'Yes' : null,
            "b1" => $request->has('b1') ? 'Yes' : null,
            "b2" => $request->has('b2') ? 'Yes' : null,
            "b3" => $request->has('b3') ? 'Yes' : null,
            "b4" => $request->has('b4') ? 'Yes' : null,
            "b5" => $request->has('b5') ? 'Yes' : null,
            "b6" => $request->has('b6') ? 'Yes' : null,
            "b7" => $request->has('b7') ? 'Yes' : null,
            "c1" => $request->has('c1') ? 'Yes' : null,
            "c2" => $request->has('c2') ? 'Yes' : null,
            "c3" => $request->has('c3') ? 'Yes' : null,
            "c4" => $request->has('c4') ? 'Yes' : null,
            "c5" => $request->has('c5') ? 'Yes' : null,
            "c6" => $request->has('c6') ? 'Yes' : null

        ]);

        Cardiovascular::where('admission_id', $request->admission_id)->update([
            "height" => $request->height,
            "weight" => $request->weight,
            "bmi" => $request->bmi,
        ]);

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description =
            'Update PhysicalExam from Patient ' . $request->patientcode;
        $log->date = date('Y-m-d');
        $log->save();

        if ($physical) {
            return back()->with('status', 'Physical Exam updated.');
        } else {
            return back()->with('status', 'Physical Exam not update.');
        }
    }

    public function add_physical() {
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

        $exam_xray = XRay::where('admission_id', $admission->id)->latest('id')->first();
        $exam_ecg = ECG::where('admission_id', $admission->id)->latest('id')->first();
        $exam_hema = Hematology::where('admission_id', $admission->id)->latest('id')->first();
        $exam_urin = Urinalysis::where('admission_id', $admission->id)->latest('id')->first();
        $exam_feca = Fecalysis::where('admission_id', $admission->id)->latest('id')->first();
        $exam_bloodsero = BloodSerology::where('admission_id', $admission->id)->latest('id')->first();
        $exam_hiv = HIV::where('admission_id', $admission->id)->latest('id')->first();
        $exam_psycho = Psychological::where('admission_id', $admission->id)->latest('id')->first();
        $exam_cardio = CardioVascular::where('admission_id', $admission->id)->latest('id')->first();

        $patient = Patient::where('patientcode', $admission->patientcode)->latest('id')->first();
        $medical_history = MedicalHistory::where('main_id', optional($admission->patient)->id)->first();
        $physicians = User::where('position', 'LIKE', '%Physician%')->get();


        return view('Physical.add-physical', compact('admission', 'medical_history', 'physicians', 'exam_xray', 'exam_ecg', 'exam_hema', 'exam_urin', 'exam_feca', 'exam_bloodsero', 'exam_hiv', 'exam_psycho', 'exam_cardio'));
    }

    public function store_physical(Request $request) {
        $data = $request->except('_token', 'action', 'patient_id', 'patientname', 'patientcode', 'peme_date', 'id');
        $save = DB::table('exam_physical')->insert($data);

        Cardiovascular::where('admission_id', $request->admission_id)->update([
            "height" => $request->height,
            "weight" => $request->weight,
            "bmi" => $request->bmi,
        ]);

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description =
            'Add PhysicalExam from Patient ' . $request->patientcode;
        $log->date = date('Y-m-d');
        $log->save();

        $path =
        'patient_edit?id=' .
        $request->patient_id .
        '&patientcode=' .
        $request->patientcode;

         if($save) {
            return redirect($path)->with('status', 'Physical Exam added.')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab9;tabVerticalLeft9');
        }
    }
}
