<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CashierOR;
use App\Models\Audiometry;
use App\Models\CardiacRiskFactor;
use App\Models\CardioVascular;
use App\Models\Dental;
use App\Models\ECG;
use App\Models\EchoDoppler;
use App\Models\EchoPlain;
use App\Models\Ishihara;
use App\Models\PhysicalExam;
use App\Models\Psychological;
use App\Models\PsychoBPI;
use App\Models\StressEcho;
use App\Models\StressTest;
use App\Models\UltraSound;
use App\Models\VisualAcuity;
use App\Models\XRay;
use App\Models\PPD;
use App\Models\BloodSerology;
use App\Models\HIV;
use App\Models\DrugTest;
use App\Models\Fecalysis;
use App\Models\Hematology;
use App\Models\Hepatitis;
use App\Models\Pregnancy;
use App\Models\Miscellaneous;
use App\Models\Urinalysis;
use App\Models\Refferal;
use App\Models\Admission;
use App\Models\ListPackage;
use App\Models\Agency;
use App\Models\Patient;

class PrintController extends Controller
{
    //
    public function exam_audiometry(Request $request)
    {
        $id = $_GET['id'];

        $exam = Audiometry::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
        )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        return view(
            'PrintTemplates.exam_audio_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_audio_graphright()
    {
        return view('Audiometry.exam_audio_graphright');
    }

    public function exam_audio_graphleft()
    {
        return view('Audiometry.exam_audio_graphleft');
    }

    public function exam_crf(Request $request)
    {
        $id = $_GET['id'];
        $exam = CardiacRiskFactor::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        return view(
            'PrintTemplates.exam_crf_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_cardiovascular(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = CardioVascular::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        return view(
            'PrintTemplates.exam_cardiovascular_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_dental(Request $request)
    {
        $id = $_GET['id'];

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = Dental::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_services = DB::table('exam_dental_services')->where('main_id', $exam->id)->get();
        $technician1 = User::where('id', $exam->technician_id)->first();
        return view(
            'PrintTemplates.exam_dental_print',
            compact('exam', 'admission', 'technician1', 'exam_services')
        );
    }

    public function exam_ecg(Request $request)
    {
        $id = $_GET['id'];
        $exam = ECG::where('admission_id', '=', $id)
            ->latest('id')
            ->first();
        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        return view(
            'PrintTemplates.exam_ecg_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_echodoppler(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();
        $exam = EchoDoppler::where('admission_id', '=', $id)
            ->latest('id')
            ->first();
        $technician1 = User::where('id', $exam->technician_id)->first();
        return view(
            'PrintTemplates.exam_echodoppler_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_echoplain(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = EchoPlain::where('admission_id', '=', $id)
            ->latest('id')
            ->first();
        $technician1 = User::where('id', $exam->technician_id)->first();

        return view(
            'PrintTemplates.exam_echoplain_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_ishihara(Request $request)
    {
        $id = $_GET['id'];

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = Ishihara::where('admission_id', '=', $id)->first();
        $technician1 = User::where('id', $exam->technician_id)->first();

        return view(
            'PrintTemplates.exam_ishihara_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_physical() {
        $id = $_GET['id'];

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.patient_image as patient_image',
            'mast_patient.patient_signature as patient_signature',
            'mast_patient.signature as signature',
            'mast_patient.position_applied as position_applied',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = PhysicalExam::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->select('mast_patientinfo.*', 'mast_agency.agencyname')
            ->where('mast_patientinfo.main_id', $admission->patient_id)
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'mast_patientinfo.agency_id'
            )
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')->where('admission_id', $id)->first();
        $exam_xray = DB::table('exam_xray')->where('admission_id', $id)->first();
        $examlab_feca = DB::table('examlab_feca')->where('admission_id', $id)->first();
        $examlab_hiv = DB::table('examlab_hiv')->where('admission_id', $id)->first();
        $examlab_hepa = DB::table('examlab_hepa')->where('admission_id', $id)->first();
        $exam_ecg = DB::table('exam_ecg')->where('admission_id', $id)->first();
        $exam_psycho = DB::table('exam_psycho')->where('admission_id', $id)->first();
        $technician1 = User::where('id', $exam->technician_id)->first();
        $medical_director = User::where('position', "LIKE", '%Medical Director%')->first();

        return view(
            'PrintTemplates.exam_physical_print',
            compact('exam', 'admission', 'technician1', 'patientInfo', 'exam_ishihara', 'exam_xray', 'examlab_feca', 'examlab_hepa', 'examlab_hiv', 'exam_ecg', 'exam_psycho', 'medical_director')
        );
    }

    public function exam_psycho(Request $request)
    {
        $id = $_GET['id'];

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();
        $exam = Psychological::where('admission_id', '=', $id)
            ->latest('id')
            ->first();
        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.exam_psycho_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_psychobpi(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = PsychoBPI::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.exam_psychobpi_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_stress_echo(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();
        $exam = StressEcho::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();

        return view(
            'PrintTemplates.exam_stress_echo_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_stresstest(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();
        $exam = StressTest::select('exam_stresstest.*')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        return view(
            'PrintTemplates.exam_stresstest_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_ultrasound(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = UltraSound::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();

        return view(
            'PrintTemplates.exam_ultrasound_print',
            compact('exam', 'admission', 'technician1')
        );
    }

    public function exam_visacuity(Request $request)
    {

        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->first();

        $exam = VisualAcuity::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.exam_visacuity_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_xray(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();
        $exam = XRay::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.exam_xray_print',
            compact('exam', 'admission', 'technician1', 'technician2')
        );
    }

    public function exam_ppd(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $exam = PPD::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientinfo =  DB::table('mast_patientinfo')->where('main_id', $admission->patient_id)->first();
        // dd($patientinfo);

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.exam_ppd_print',
            compact('exam', 'admission', 'technician1', 'technician2', 'patientinfo')
        );
    }

    public function exam_bloodsero(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();


        $exam_blood = BloodSerology::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_sero = Hepatitis::where('admission_id', '=', $id)
        ->latest('id')
        ->first();

        $type = $request->type;

        if($type == 'blood') {
            $technician1 = User::where('id', $exam_blood->technician_id)->first();
            $technician2 = User::where('id', $exam_blood->technician2_id)->first();
        }

        if($type == 'serology') {
            $technician1 = User::where('id', $exam_sero->technician_id)->first();
            $technician2 = User::where('id', $exam_sero->technician2_id)->first();
        }

        if($type == 'both' && $exam_blood) {
            $technician1 = User::where('id', $exam_blood->technician_id)->first();
            $technician2 = User::where('id', $exam_blood->technician2_id)->first();
        }

        if($type == 'both' && $exam_sero) {
            $technician1 = User::where('id', $exam_sero->technician_id)->first();
            $technician2 = User::where('id', $exam_sero->technician2_id)->first();
        }

        return view(
            'PrintTemplates.examlab_bloodsero_print',
            compact('exam_blood', 'exam_sero', 'admission', 'technician1', 'technician2', 'type')
        );
    }

    public function exam_hiv(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*'
            )
            ->where('tran_admission.id', '=', $id)
            ->with('patient', 'agency')
            ->latest('id')
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient->id)
            ->first();

        $exam = HIV::where('admission_id', '=', $admission->id)
            ->latest('id')
            ->first();


        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();
        $technician3 = User::where('id', $exam->technician3_id)->first();

        return view(
            'PrintTemplates.examlab_hiv_print',
            compact('exam', 'admission', 'gen_info', 'technician1', 'technician2', 'technician3')
        );
    }

    public function exam_drug(Request $request)
    {
        $id = $request->id;
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.patient_image as patient_image',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                '=',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = DrugTest::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $agency = Agency::where('id', '=', $admission->agency_id)->first();

        $technician1 = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')->where('mast_employee.id', 70)->leftJoin('mast_employeeinfo', 'mast_employeeinfo.main_id', 'mast_employee.id')->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();


        // dd($technician1)
        return view(
            'PrintTemplates.examlab_drug_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'agency',
                'technician1',
                'technician2'
            )
        );
    }

    public function exam_fecalysis(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = Fecalysis::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.examlab_fecalysis_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'technician1',
                'technician2'
            )
        );
    }

    public function exam_hematology(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = Hematology::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.examlab_hematology_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'technician1',
                'technician2'
            )
        );
    }

    public function exam_hepatitis(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = Hepatitis::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.examlab_hepatitis_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'technician1',
                'technician2'
            )
        );
    }

    public function exam_pregnancy(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = Pregnancy::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.examlab_pregnancy_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'technician1',
                'technician2'
            )
        );
    }

    public function exam_urinalysis(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = Urinalysis::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.examlab_urinalysis_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'technician1',
                'technician2'
            )
        );
    }

    public function exam_misc(Request $request)
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.lastname as lastname',
            'mast_patient.firstname as firstname',
            'mast_patient.middlename as middlename',
            'mast_patient.suffix as suffix',
            'mast_patient.patientcode as patientcode',
            'mast_patient.gender as gender',
            'mast_patient.age as age',
            'mast_patient.age as age',
            'mast_patient.id as patient_id',
            'mast_agency.agencyname as agencyname'
            )
            ->where('tran_admission.id', '=', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.patientcode',
                '=',
                'tran_admission.patientcode'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'tran_admission.agency_id'
            )
            ->first();

        $gen_info = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $exam = Miscellaneous::where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $technician1 = User::where('id', $exam->technician_id)->first();
        $technician2 = User::where('id', $exam->technician2_id)->first();

        return view(
            'PrintTemplates.examlab_mis_print',
            compact(
                'exam',
                'admission',
                'gen_info',
                'technician1',
                'technician2'
            )
        );
    }

    public function admission_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.lastname',
            'mast_patient.firstname',
            'mast_patient.middlename',
            'mast_patient.suffix',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_patient.signature',
            'mast_patient.updated_date',
            'mast_patient.patient_image'
            )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->select(
                'mast_patientinfo.*',
                'mast_agency.agencyname',
                'list_package.packagename'
            )
            ->where('main_id', $admission->patient_id)
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'mast_patientinfo.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'mast_patientinfo.medical_package'
            )
            ->first();

        // $requests = DB::table('list_package_request')
        // ->select('list_package_request.*', 'requests.title')
        // ->where('main_id', $patientInfo->medical_package)
        // ->leftJoin('requests', 'requests.id', 'list_package_request.request_id')
        // ->get();

        // $exams = [];

        // foreach ($requests as $key => $req) {
        //     $requests_exams = DB::table('requests_exam')
        //     ->select('list_exam.examname','requests_exam.exam_id')
        //     ->where('requests_exam.main_id', $req->request_id)
        //     ->leftJoin('list_exam', 'list_exam.id', 'requests_exam.exam_id')
        //     ->get();
        //     array_push($exams, $requests_exams);
        // }

        // $exam_names = [];

        // foreach ($exams as $key => $exam) {
        //    foreach ($exam as $key => $ex) {
        //        array_push($exam_names, $ex->examname);
        //    }
        // }

        // // dd($exam_names);

        $patient_exams = DB::table('list_packagedtl')
                ->select(
                    'list_packagedtl.*',
                    'list_exam.examname as examname',
                    'list_exam.category as category',
                    'list_exam.section_id',
                    'list_section.sectionname'
                )
                ->where('main_id', $patientInfo->medical_package)
                ->leftJoin(
                    'list_exam',
                    'list_exam.id',
                    'list_packagedtl.exam_id'
                )
                ->leftJoin(
                    'list_section',
                    'list_section.id',
                    'list_exam.section_id'
                )
                ->get();

        $additional_exams = DB::table('tran_admissiondtl')
                ->select(
                    'tran_admissiondtl.*',
                    'list_exam.examname as examname',
                    'list_exam.category as category',
                    'list_exam.section_id',
                    'list_section.sectionname'
                )
                ->where('main_id', $admission->id)
                ->leftJoin(
                    'list_exam',
                    'list_exam.id',
                    'tran_admissiondtl.exam_id'
                )
                ->leftJoin(
                    'list_section',
                    'list_section.id',
                    'list_exam.section_id'
                )
                ->get();

        $add_exams = [];
        $exams = [];

        foreach ($patient_exams as $key => $patient_exam) {
            array_push($exams, $patient_exam->examname);
        }

        foreach ($additional_exams as $key => $additional_exam) {
            array_push($add_exams, $additional_exam->examname);
        }

        $additional = implode(', ', $add_exams);

        // dd($additional);

        return view(
            'PrintTemplates.routing_slip_print',
            compact('admission', 'patientInfo', 'exams', 'additional')
        );
    }

    public function referral_pdf() {
        $email = $_GET['email'];

        $referral = Refferal::where('email_employee', $email)->latest('id')->with('package', 'agency')->first();

        // if($referral) {
        //     $referral = Patient::select(
        //         'mast_patient.*',
        //         'mast_patientinfo.address',
        //         'mast_patientinfo.birthdate',
        //         'mast_patientinfo.passportno',
        //         'mast_patientinfo.srbno',
        //         'mast_patientinfo.contactno',
        //         'mast_patientinfo.vessel',
        //         'mast_patientinfo.payment_type',
        //         'mast_patientinfo.country_destination',
        //         'tran_admission.trans_date',
        //         'list_package.packagename',
        //         'mast_agency.agencyname'
        //     )->where('mast_patient.email', $email)
        //     ->leftJoin('mast_patientinfo', 'mast_patientinfo.main_id', 'mast_patient.id')
        //     ->leftJoin('tran_admission', 'tran_admission.id', 'mast_patient.admission_id')
        //     ->leftJoin('list_package', 'list_package.id', 'mast_patientinfo.medical_package')
        //     ->leftJoin('mast_agency', 'mast_agency.id', 'mast_patientinfo.agency_id')->latest('mast_patient.id')->first();
        // }

        return view("PrintTemplates.referral_pdf_print", compact('referral'));
    }

    public function transmittal_print(Request $request) {

        $from_date = $request->input('date_from');
        $to_date = $request->input('date_to');
        $agency_id = $request->input('agency_id');
        $patientstatus = $request->input('patientstatus');
        $bahia_vessel = $request->input('bahia_vessel');
        $hartmann_principal = $request->input('hartmann_principal');

        if($agency_id == "") {
            $patients = $this->patientStatus($patientstatus, $from_date, $to_date);
        } else {
            $patients = $this->patientAgencyStatus($patientstatus, $from_date, $to_date, $agency_id, $bahia_vessel, $hartmann_principal);
        }

        $additional_columns = $request->additional_columns ? $request->additional_columns : [];

        $agency = Agency::where('id', $agency_id)->first();


        return view('PrintTemplates.transmittal_print', compact('patients', 'from_date', 'to_date', 'patientstatus', 'agency', 'additional_columns'));
    }

    public function requests_print() {
        $id = $_GET['id'];
        $patient_id = $_GET['patient_id'];
        $package_requests = DB::table('list_package_request')
        ->select('list_package_request.request_id', 'requests.title')
        ->where('list_package_request.main_id', $id)
        ->leftJoin('requests', 'requests.id', 'list_package_request.request_id')
        ->get();

        $patient = Patient::where('id', $patient_id)->first();

        $patientInfo = DB::table('mast_patientinfo')
        ->select('mast_patientinfo.*', 'mast_agency.agencyname')
        ->where('mast_patientinfo.main_id', $patient_id)
        ->leftJoin('mast_agency', 'mast_agency.id', 'mast_patientinfo.agency_id')
        ->first();


        $requests = [];

        foreach ($package_requests as $key => $package_request) {
            $request_exam = DB::table('requests_exam')
            ->select('requests_exam.exam_id', 'list_exam.examname')
            ->where('requests_exam.main_id', $package_request->request_id)
            ->leftJoin('list_exam', 'list_exam.id', 'requests_exam.exam_id')
            ->get();

            $request = [
                "title" => $package_request->title,
                "exams" => $request_exam
            ];
            array_push($requests, $request);
        }

        return view("PrintTemplates.requests_print", compact('requests', 'patient', 'patientInfo'));
    }

    public function yellow_card_print(Request $request)
    {
        $id = $_GET['id'];

        $patient = Patient::select('mast_patient.*', 'mast_patientinfo.birthdate', 'mast_patientinfo.nationality')
        ->leftJoin('mast_patientinfo', 'mast_patientinfo.main_id', 'mast_patient.id')
        ->where('mast_patient.id', $id)
        ->first();

        $records =  DB::table('yellow_card')->where('patient_id', $id)->orderBy('count')->get();
        // dd($records);
        return view("PrintTemplates.yellow_card_print", compact('patient', 'records'));
    }

    public function patientStatus($patientstatus, $from_date, $to_date) {
            if($patientstatus == "") {
                $patients = Admission::whereDate('trans_date', '>=', $from_date)
            ->whereDate('trans_date', '<=', $to_date)
                ->with('exam_audio',
                        'exam_ecg',
                        'exam_physical',
                        'exam_visacuity',
                        'exam_bloodsero',
                        'patient',
                        'exam_crf',
                        'exam_cardio',
                        'exam_dental',
                        'exam_drug',
                        'exam_echodoppler',
                        'exam_echoplain',
                        'exam_feca',
                        'exam_hema',
                        'exam_hepa',
                        'exam_hiv',
                        'exam_ishihara',
                        'exam_misc',
                        'exam_pregnancy',
                        'exam_psychobpi',
                        'exam_psycho',
                        'exam_stressecho',
                        'exam_stresstest',
                        'exam_ultrasound',
                        'exam_xray',
                        'package',
                        'agency',
                        'followup'
                        )->get();

            } else {
               $patients = Admission::whereDate('trans_date', '>=', $from_date)
                    ->whereDate('trans_date', '<=', $to_date)
                    ->with('exam_audio',
                    'exam_ecg',
                    'exam_physical',
                    'exam_visacuity',
                    'exam_bloodsero',
                    'patient',
                    'exam_crf',
                    'exam_cardio',
                    'exam_dental',
                    'exam_drug',
                    'exam_echodoppler',
                    'exam_echoplain',
                    'exam_feca',
                    'exam_hema',
                    'exam_hepa',
                    'exam_hiv',
                    'exam_ishihara',
                    'exam_misc',
                    'exam_pregnancy',
                    'exam_psychobpi',
                    'exam_psycho',
                    'exam_stressecho',
                    'exam_stresstest',
                    'exam_ultrasound',
                    'exam_xray',
                    'package',
                    'agency',
                    'followup'
                    )->whereHas('exam_physical', function ($query) use ($patientstatus) {
                        $query->where('fit', $patientstatus);
                    })->get();
            }


            return $patients;
    }

    public function patientAgencyStatus($patientstatus, $from_date, $to_date, $agency_id, $bahia_vessel, $hartmann_principal) {
        if($patientstatus == "") {
                $patients = Admission::whereDate('trans_date', '>=', $from_date)
                ->whereDate('trans_date', '<=', $to_date)
                ->where(function ($q) use ($agency_id) {
                    $bahia_ids = ['55', '57', '58', '59'];
                    if($agency_id == 3) {
                        return $q->where('agency_id', $agency_id);
                    } else if(in_array($agency_id, $bahia_ids)){
                        return $q->where('agency_id', $agency_id)->orWhere('agency_id', 3);
                    } else {
                        return $q->where('agency_id', $agency_id);
                    }
                })
                ->where(function ($q) use ($bahia_vessel, $agency_id) {
                    if($agency_id == 3) {
                        if($bahia_vessel == 'BLUETERN/BOLDTERN/BRAVETERN') {
                            // dd($bahia_vessel);
                            return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLD TERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUE TERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVE TERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOLDTERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUETERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVETERN'));
                        }

                        if($bahia_vessel == 'BOLETTE/BRAEMAR') {
                            return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLETTE'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAEMAR'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOLETTE'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BRAEMAR'));
                        }

                        if($bahia_vessel == 'BALMORAL/BOREALIS') {
                            return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BALMORAL'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOREALIS'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BALMORAL'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOREALIS'));
                        }

                    }

                    if($agency_id == 55) {
                        if($bahia_vessel == 'BOLETTE/BRAEMAR') {
                            return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLETTE'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAEMAR'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOLETTE'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BRAEMAR'));
                        }
                    }

                    if($agency_id == 57) {
                        if($bahia_vessel == 'BALMORAL/BOREALIS') {
                            return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BALMORAL'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOREALIS'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BALMORAL'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOREALIS'));
                        }
                    }

                    if($agency_id == 58) {
                        if($bahia_vessel == 'BLUETERN/BOLDTERN/BRAVETERN') {
                            return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLD TERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUE TERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVE TERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOLDTERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUETERN'))
                            ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVETERN'));
                        }
                    }
                })
                ->where(function ($q) use ($hartmann_principal, $agency_id) {
                    if($agency_id == 9) {
                        return $q->where(DB::raw('upper(principal)'),  strtoupper($hartmann_principal));
                    }
                })
                ->with('exam_audio',
                        'exam_ecg',
                        'exam_physical',
                        'exam_visacuity',
                        'exam_bloodsero',
                        'patient',
                        'exam_crf',
                        'exam_cardio',
                        'exam_dental',
                        'exam_drug',
                        'exam_echodoppler',
                        'exam_echoplain',
                        'exam_feca',
                        'exam_hema',
                        'exam_hepa',
                        'exam_hiv',
                        'exam_ishihara',
                        'exam_misc',
                        'exam_pregnancy',
                        'exam_psychobpi',
                        'exam_psycho',
                        'exam_stressecho',
                        'exam_stresstest',
                        'exam_ultrasound',
                        'exam_xray',
                        'package',
                        'agency',
                        'followup'
                        )
                        ->get();
                    // dd($patients);
        } else {
                $patients = Admission::whereDate('trans_date', '>=', $from_date)
                    ->whereDate('trans_date', '<=', $to_date)
                    ->whereHas('exam_physical', function ($query) use ($patientstatus) {
                        $query->where('fit','=', $patientstatus);
                    })
                    ->where(function ($q) use ($agency_id) {
                        $bahia_ids = ['55', '57', '58', '59'];
                        if($agency_id == 3) {
                            return $q->where('agency_id', $agency_id);
                        } else if(in_array($agency_id, $bahia_ids)){
                            return $q->where('agency_id', $agency_id)->orWhere('agency_id', 3);
                        } else {
                            return $q->where('agency_id', $agency_id);
                        }
                    })
                    ->where(function ($q) use ($bahia_vessel, $agency_id) {
                        if($agency_id == 3) {
                            if($bahia_vessel == 'BLUETERN/BOLDTERN/BRAVETERN') {
                                // dd($bahia_vessel);
                                return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLD TERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUE TERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVE TERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOLDTERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUETERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVETERN'));
                            }

                            if($bahia_vessel == 'BOLETTE/BRAEMAR') {
                                return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLETTE'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAEMAR'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOLETTE'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BRAEMAR'));
                            }

                            if($bahia_vessel == 'BALMORAL/BOREALIS') {
                                return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BALMORAL'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOREALIS'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BALMORAL'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOREALIS'));
                            }

                        }

                        if($agency_id == 55) {
                            if($bahia_vessel == 'BOLETTE/BRAEMAR') {
                                return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLETTE'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAEMAR'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOLETTE'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BRAEMAR'));
                            }
                        }

                        if($agency_id == 57) {
                            if($bahia_vessel == 'BALMORAL/BOREALIS') {
                                return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BALMORAL'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOREALIS'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BALMORAL'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('MS BOREALIS'));
                            }
                        }

                        if($agency_id == 58) {
                            if($bahia_vessel == 'BLUETERN/BOLDTERN/BRAVETERN') {
                                return $q->where(DB::raw('upper(vesselname)'),  strtoupper('BOLD TERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUE TERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVE TERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BOLDTERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BLUETERN'))
                                ->orWhere(DB::raw('upper(vesselname)'),  strtoupper('BRAVETERN'));
                            }
                        }
                    })
                    ->with('exam_audio',
                    'exam_ecg',
                    'exam_physical',
                    'exam_visacuity',
                    'exam_bloodsero',
                    'patient',
                    'exam_crf',
                    'exam_cardio',
                    'exam_dental',
                    'exam_drug',
                    'exam_echodoppler',
                    'exam_echoplain',
                    'exam_feca',
                    'exam_hema',
                    'exam_hepa',
                    'exam_hiv',
                    'exam_ishihara',
                    'exam_misc',
                    'exam_pregnancy',
                    'exam_psychobpi',
                    'exam_psycho',
                    'exam_stressecho',
                    'exam_stresstest',
                    'exam_ultrasound',
                    'exam_xray',
                    'package',
                    'agency',
                    'followup'
                    )
                     ->get();
        }
        return $patients;
    }

    public function data_privacy_print() {
        $id = $_GET['id'];
        $patient = Patient::where('id', $id)->first();

        return view('PrintTemplates.data_privacy_form', compact('patient'));
    }

    public function cashier_or_print(Request $request) {
        $data = session()->all();
        $id = $request->id;
        $account = CashierOR::select('actgtran_or.*', 'mast_agency.agencyname')
        ->where('actgtran_or.id', $id)
        ->leftJoin('mast_agency', 'mast_agency.id', 'actgtran_or.agency_id')
        ->with('admission')
        ->first();

        $print_by = User::where('id', $data['employeeId'])->first();
        $admission = Admission::where('id', $account->admission_id)->first();
        $patient_package = ListPackage::where('id', $admission->package_id)->first();
        $items = [];

        if($account->paying_type == "exams") {

            if($account->payment_user == 'agency') {
                $admission_exams = DB::table('tran_admissiondtl')
                ->select('tran_admissiondtl.*', 'list_exam.examname', 'list_exam.price')
                ->where('main_id', $account->admission_id)
                ->where('tran_admissiondtl.charge', 'package')
                ->leftJoin('list_exam', 'list_exam.id', 'tran_admissiondtl.exam_id')
                ->get();
            } else {
                $admission_exams = DB::table('tran_admissiondtl')
                ->select('tran_admissiondtl.*', 'list_exam.examname', 'list_exam.price')
                ->where('main_id', $account->admission_id)
                ->where('tran_admissiondtl.charge', 'applicant_paid')
                ->leftJoin('list_exam', 'list_exam.id', 'tran_admissiondtl.exam_id')
                ->get();
            }

            foreach ($admission_exams as $key => $exam) {
                $item_data = [
                    'itemname' => $exam->examname,
                    'date' => $exam->updated_date,
                    'price' => $exam->price,
                    'description' => 'Exams'
                ];
                array_push($items, $item_data);
            }
        } else if($account->paying_type == 'package') {
            $item_data = [
                'itemname' => $patient_package->packagename,
                'date' => $admission->trans_date,
                'price' => $patient_package->price,
                'description' => 'Medical Package'
            ];
            array_push($items, $item_data);
        } else {
            $item_data = [
                'itemname' => $account->particulars,
                'date' => $admission->trans_date,
                'price' => $account->amount_due,
                'description' => $account->paying_type
            ];
             array_push($items, $item_data);
        }

        return view('PrintTemplates.cashier_or_print', compact('account', 'print_by', 'items'));
    }

}
