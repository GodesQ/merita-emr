<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EchoDoppler;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class EchoDopplerController extends Controller
{
    //
    public function edit_echodoppler(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = EchoDoppler::select(
                'exam_echodoppler.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_echodoppler.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_echodoppler.admission_id'
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
            
            return view('EchoDoppler.edit-echodoppler', compact('exam', 'patient', 'admission', 'cardiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_echodoppler(Request $request)
    {   
        try {
            $id = $request->id;
            $exam = EchoDoppler::findOrFail($id);
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
            $exam->lvmi = $request->lvmi;
            $exam->rwt = $request->rwt;
            $exam->lav = $request->lav;
            $exam->aortic_mv = $request->aortic_mv;
            $exam->aortic_pg = $request->aortic_pg;
            $exam->aortic_oa = $request->aortic_oa;
            $exam->aortic_vti = $request->aortic_vti;
            $exam->aortic_rr = $request->aortic_rr;
            $exam->aortic_rja = $request->aortic_rja;
            $exam->aortic_rg = $request->aortic_rg;
            $exam->mitral_mv = $request->mitral_mv;
            $exam->mitral_pg = $request->mitral_pg;
            $exam->mitral_oa = $request->mitral_oa;
            $exam->mitral_vti = $request->mitral_vti;
            $exam->mitral_rr = $request->mitral_rr;
            $exam->mitral_rja = $request->mitral_rja;
            $exam->mitral_rg = $request->mitral_rg;
            $exam->tri_mv = $request->tri_mv;
            $exam->tri_pg = $request->tri_pg;
            $exam->tri_oa = $request->tri_oa;
            $exam->tri_vti = $request->tri_vti;
            $exam->tri_rr = $request->tri_rr;
            $exam->tri_rja = $request->tri_rja;
            $exam->tri_rg = $request->tri_rg;
            $exam->pul_mv = $request->pul_mv;
            $exam->pul_pg = $request->pul_pg;
            $exam->pul_oa = $request->pul_oa;
            $exam->pul_vti = $request->pul_vti;
            $exam->pul_rr = $request->pul_rr;
            $exam->pul_rja = $request->pul_rja;
            $exam->pul_rg = $request->pul_rg;
            $exam->pp_mv = $request->pp_mv;
            $exam->pp_pg = $request->pp_pg;
            $exam->pp_oa = $request->pp_oa;
            $exam->pp_vti = $request->pp_vti;
            $exam->pp_rr = $request->pp_rr;
            $exam->pp_rja = $request->pp_rja;
            $exam->pp_rg = $request->pp_rg;
            $exam->interpretation = $request->interpretation;
            $exam->doppler = $request->doppler;
            $exam->conclusion = $request->conclusion;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();
    
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Echo Doppler from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            if ($save) {
                return back()->with('status', 'Echo Doppler updated.');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_echodoppler(Request $request)
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
            return view('EchoDoppler.add-echodoppler', compact('admission', 'cardiologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_echodoppler(Request $request)
    {   
        try {
            $exam = new EchoDoppler();
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
            $exam->lvmi = $request->lvmi;
            $exam->rwt = $request->rwt;
            $exam->lav = $request->lav;
            $exam->aortic_mv = $request->aortic_mv;
            $exam->aortic_pg = $request->aortic_pg;
            $exam->aortic_oa = $request->aortic_oa;
            $exam->aortic_vti = $request->aortic_vti;
            $exam->aortic_rr = $request->aortic_rr;
            $exam->aortic_rja = $request->aortic_rja;
            $exam->aortic_rg = $request->aortic_rg;
            $exam->mitral_mv = $request->mitral_mv;
            $exam->mitral_pg = $request->mitral_pg;
            $exam->mitral_oa = $request->mitral_oa;
            $exam->mitral_vti = $request->mitral_vti;
            $exam->mitral_rr = $request->mitral_rr;
            $exam->mitral_rja = $request->mitral_rja;
            $exam->mitral_rg = $request->mitral_rg;
            $exam->tri_mv = $request->tri_mv;
            $exam->tri_pg = $request->tri_pg;
            $exam->tri_oa = $request->tri_oa;
            $exam->tri_vti = $request->tri_vti;
            $exam->tri_rr = $request->tri_rr;
            $exam->tri_rja = $request->tri_rja;
            $exam->tri_rg = $request->tri_rg;
            $exam->pul_mv = $request->pul_mv;
            $exam->pul_pg = $request->pul_pg;
            $exam->pul_oa = $request->pul_oa;
            $exam->pul_vti = $request->pul_vti;
            $exam->pul_rr = $request->pul_rr;
            $exam->pul_rja = $request->pul_rja;
            $exam->pul_rg = $request->pul_rg;
            $exam->pp_mv = $request->pp_mv;
            $exam->pp_pg = $request->pp_pg;
            $exam->pp_oa = $request->pp_oa;
            $exam->pp_vti = $request->pp_vti;
            $exam->pp_rr = $request->pp_rr;
            $exam->pp_rja = $request->pp_rja;
            $exam->pp_rg = $request->pp_rg;
            $exam->interpretation = $request->interpretation;
            $exam->doppler = $request->doppler;
            $exam->conclusion = $request->conclusion;
            $exam->remarks = $request->remarks;
            $exam->remarks_status = $request->remarks_status;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Echo Doppler from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Echo Doppler added.')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab6;tabVerticalLeft6');;
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}