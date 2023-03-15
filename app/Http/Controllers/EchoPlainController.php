<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EchoPlain;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class EchoPlainController extends Controller
{
    //
    public function edit_echoplain(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = EchoPlain::select(
                'exam_echoplain.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_echoplain.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_echoplain.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $patient->admission_id)->first();
            $cardiologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Cardiologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Cardiologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            return view('EchoPlain.edit-echoplain', compact('exam', 'patient', 'admission', 'cardiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_echoplain(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = EchoPlain::findOrFail($id);
            $exam->referring_md = $request->referring_md;
            $exam->clinical_diagnostic = $request->clinical_diagnostic;
            $exam->height = $request->height;
            $exam->weight = $request->weight;
            $exam->bp = $request->bp;
            $exam->study_no = $request->study_no;
            $exam->dvd_no = $request->dvd_no;
            $exam->rhythm = $request->rhythm;
            $exam->hr = $request->hr;
            $exam->lved = $request->lved;
            $exam->lves = $request->lves;
            $exam->ivsed = $request->ivsed;
            $exam->ivses = $request->ivses;
            $exam->lvpwed = $request->lvpwed;
            $exam->lvpwes = $request->lvpwes;
            $exam->aorta = $request->aorta;
            $exam->laap = $request->laap;
            $exam->mpa = $request->mpa;
            $exam->lvet = $request->lvet;
            $exam->epss = $request->epss;
            $exam->lvot = $request->lvot;
            $exam->rv = $request->rv;
            $exam->ra = $request->ra;
            $exam->mva = $request->mva;
            $exam->tva = $request->tva;
            $exam->lvedv = $request->lvedv;
            $exam->lvedv_simp = $request->lvedv_simp;
            $exam->lvesv = $request->lvesv;
            $exam->lvesv_simp = $request->lvesv_simp;
            $exam->sv = $request->sv;
            $exam->sv_simp = $request->sv_simp;
            $exam->co = $request->co;
            $exam->co_simp = $request->co_simp;
            $exam->ef = $request->ef;
            $exam->ef_simp = $request->ef_simp;
            $exam->fs = $request->fs;
            $exam->fs_simp = $request->fs_simp;
            $exam->vcf = $request->vcf;
            $exam->vcf_simp = $request->vcf_simp;
            $exam->lmv = $request->lmv;
            $exam->lmv_simp = $request->lmv_simp;
            $exam->dt = $request->dt;
            $exam->ivrt = $request->ivrt;
            $exam->pvf = $request->pvf;
            $exam->pve = $request->pve;
            $exam->pva = $request->pva;
            $exam->pvar = $request->pvar;
            $exam->l1 = $request->l1;
            $exam->l2 = $request->l2;
            $exam->a1 = $request->a1;
            $exam->a2 = $request->a2;
            $exam->lav = $request->lav;
            $exam->lvmi = $request->lvmi;
            $exam->rwt = $request->rwt;
            $exam->tapse = $request->tapse;
            $exam->interpretation = $request->interpretation;
            $exam->conclusion = $request->conclusion;
            $exam->remarks = $request->remarks;
            $exam->findings = $request->findings;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Echo Plain from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Echo Plain updated!!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_echoplain(Request $request)
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
            return view('EchoPlain.add-echoplain', compact('admission', 'cardiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            dd($exception);
        }
    }

    public function store_echoplain(Request $request)
    {   
        try {
            $exam = new EchoPlain();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->referring_md = $request->referring_md;
            $exam->clinical_diagnostic = $request->clinical_diagnostic;
            $exam->height = $request->height;
            $exam->weight = $request->weight;
            $exam->bp = $request->bp;
            $exam->study_no = $request->study_no;
            $exam->dvd_no = $request->dvd_no;
            $exam->rhythm = $request->rhythm;
            $exam->hr = $request->hr;
            $exam->lved = $request->lved;
            $exam->lves = $request->lves;
            $exam->ivsed = $request->ivsed;
            $exam->ivses = $request->ivses;
            $exam->lvpwed = $request->lvpwed;
            $exam->lvpwes = $request->lvpwes;
            $exam->aorta = $request->aorta;
            $exam->laap = $request->laap;
            $exam->mpa = $request->mpa;
            $exam->lvet = $request->lvet;
            $exam->epss = $request->epss;
            $exam->lvot = $request->lvot;
            $exam->rv = $request->rv;
            $exam->ra = $request->ra;
            $exam->mva = $request->mva;
            $exam->tva = $request->tva;
            $exam->lvedv = $request->lvedv;
            $exam->lvedv_simp = $request->lvedv_simp;
            $exam->lvesv = $request->lvesv;
            $exam->lvesv_simp = $request->lvesv_simp;
            $exam->sv = $request->sv;
            $exam->sv_simp = $request->sv_simp;
            $exam->co = $request->co;
            $exam->co_simp = $request->co_simp;
            $exam->ef = $request->ef;
            $exam->ef_simp = $request->ef_simp;
            $exam->fs = $request->fs;
            $exam->fs_simp = $request->fs_simp;
            $exam->vcf = $request->vcf;
            $exam->vcf_simp = $request->vcf_simp;
            $exam->lmv = $request->lmv;
            $exam->lmv_simp = $request->lmv_simp;
            $exam->dt = $request->dt;
            $exam->ivrt = $request->ivrt;
            $exam->pvf = $request->pvf;
            $exam->pve = $request->pve;
            $exam->pva = $request->pva;
            $exam->pvar = $request->pvar;
            $exam->l1 = $request->l1;
            $exam->l2 = $request->l2;
            $exam->a1 = $request->a1;
            $exam->a2 = $request->a2;
            $exam->lav = $request->lav;
            $exam->lvmi = $request->lvmi;
            $exam->rwt = $request->rwt;
            $exam->tapse = $request->tapse;
            $exam->interpretation = $request->interpretation;
            $exam->conclusion = $request->conclusion;
            $exam->remarks = $request->remarks;
            $exam->findings = $request->findings;
            $exam->remarks_status = $request->remarks_status;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Echo Plain from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Echo Plain added!!');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}