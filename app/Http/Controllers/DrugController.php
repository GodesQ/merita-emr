<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DrugTest;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\EmployeeLog;
use App\Models\User;
use App\Models\Drug;

class DrugController extends Controller
{
    //
    public function edit_drug(Request $request)
    {
        try {
            $id = $_GET['id'];
            $exam = DrugTest::select(
                'examlab_drug.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_drug.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_drug.admission_id'
                )
                ->latest('id')
                ->first();
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();

            $medical_techs = User::where('position', 'Medical Technologist')->get();

            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();

            return view('Drug.edit-drug', compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists'));

        }  catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function update_drug(Request $request)
    {
        try {
            // dd($request->all());
            $id = $request->id;
            $exam = DrugTest::find($id);
             $exam->trans_date = $request->trans_date;
            $exam->reportno = $request->reportno;
            $exam->purpose = $request->purpose;
            $exam->purpose_other = $request->purpose_other;
            $exam->method = $request->method;
            $exam->methamphetamine = $request->methamphetamine;
            $exam->tetrahydrocannabinol = $request->tetrahydrocannabinol;
            $exam->morphine = $request->morphine;
            $exam->cocaine = $request->cocaine;
            $exam->phencyclidine = $request->phencyclidine;
            $exam->alcohol = $request->alcohol;
            $exam->barbiturates = $request->barbiturates;
            $exam->ecstacy = $request->ecstacy;
            $exam->benzodiazepine = $request->benzodiazepine;
            $exam->methadone = $request->methadone;
            $exam->metaqualone = $request->metaqualone;
            $exam->propoxyphene = $request->propoxyphene;
            $exam->opium = $request->opium;
            $exam->remarks = $request->remarks;
            $exam->recommendation = $request->recommendation;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Drug Test from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Drugtest updated');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_drug()
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

            return view('Drug.add-drug', compact('admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_drug(Request $request)
    {
        try {
            $exam = new DrugTest();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->reportno = $request->reportno;
            $exam->purpose = $request->purpose;
            $exam->purpose_other = $request->purpose_other;
            $exam->method = $request->method;
            $exam->methamphetamine = $request->methamphetamine;
            $exam->tetrahydrocannabinol = $request->tetrahydrocannabinol;
            $exam->morphine = $request->morphine;
            $exam->cocaine = $request->cocaine;
            $exam->phencyclidine = $request->phencyclidine;
            $exam->alcohol = $request->alcohol;
            $exam->barbiturates = $request->barbiturates;
            $exam->ecstacy = $request->ecstacy;
            $exam->benzodiazepine = $request->benzodiazepine;
            $exam->methadone = $request->methadone;
            $exam->metaqualone = $request->metaqualone;
            $exam->propoxyphene = $request->propoxyphene;
            $exam->opium = $request->opium;
            $exam->remarks = $request->remarks;
            $exam->recommendation = $request->recommendation;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $exam->technician2_id = $request->technician2_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Drug Test from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Drugtest added')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab23;tabVerticalLeft23');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}
