<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admission;
use App\Models\Agency;
use App\Models\ReassessmentFindings;
use App\Models\Patient;
use App\Models\User;
use App\Models\MedicalHistory;


class PrintPanelController extends Controller
{
    //
    public function print_panel()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

            if(!$admission) {
                $pathPhoto = null;
            } else {
                $pathPhoto = file_exists(public_path('app-assets/images/profiles/') . $admission->patient_image);
            }
        return view('PrintPanel.print-panel', compact('admission', 'data', 'pathPhoto'));
    }

    public function skuld_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_patient.fit_to_work_date',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_physical = DB::table('exam_physical')
            ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.signature as physician_signature', 'mast_employee.lastname as physician_lastname', 'mast_employee.firstname as physician_firstname', 'mast_employee.middlename as physician_middlename', 'mast_employee.signature as physician_signature', 'mast_employee.license_no as physician_licenseno')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.skuld', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity', 'medical_director'));
    }

    public function west_england_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.signature  as tech1_signature', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.west_england', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity', 'medical_director'));
    }

    public function bermuda_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.signature  as tech1_signature', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ecg = DB::table('exam_ecg')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        // dd($exam_physical)

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.bermuda', compact('admission', 'patientInfo', 'exam_physical', 'exam_ishihara', 'exam_audio', 'exam_visacuity', 'exam_urin', 'medical_director'));
    }

    public function cayman_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ecg = DB::table('exam_ecg')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        return view('PrintPanel.cayman', compact('admission', 'patientInfo', 'exam_physical', 'exam_xray', 'exam_audio', 'exam_ecg'));
    }

    public function croatian_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.croatian', compact('admission', 'patientInfo', 'exam_physical', 'exam_ishihara', 'exam_audio', 'exam_visacuity', 'exam_urin', 'medical_director'));
    }

    public function danish_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.danish', compact('admission', 'patientInfo', 'exam_physical', 'exam_ishihara', 'exam_audio', 'exam_visacuity', 'exam_urin', 'medical_director'));
    }

    public function bahamas_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
        ->where('exam_physical.admission_id', '=', $id)
        ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
        ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
        ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
        ->latest('id')
        ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ecg = DB::table('exam_ecg')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        // dd($exam_physical)

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.bahamas', compact('admission', 'patientInfo', 'exam_physical', 'exam_urin', 'exam_xray', 'medical_director', 'exam_audio', 'exam_visacuity', 'exam_ishihara', 'exam_ecg'));
    }

    public function liberian_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
        ->where('exam_physical.admission_id', '=', $id)
        ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
        ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
        ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->select('exam_ishihara.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title')
        ->where('exam_ishihara.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_ishihara.technician_id')
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.liberian', compact('admission', 'patientInfo', 'exam_physical', 'exam_ishihara', 'medical_director', 'exam_visacuity'));
    }

    public function diamlemos_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        return view('PrintPanel.diamlemos', compact('admission', 'patientInfo'));
    }

    public function marshall_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.signature  as tech1_signature', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ecg = DB::table('exam_ecg')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        // dd($exam_physical)

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.marshall', compact('admission', 'patientInfo', 'exam_physical', 'exam_urin', 'exam_xray', 'medical_director', 'exam_audio', 'exam_visacuity', 'exam_ishihara', 'exam_ecg'));
    }

    public function dominican_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
        ->where('exam_physical.admission_id', '=', $id)
        ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
        ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
        ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
        ->latest('id')
        ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        // dd($exam_physical)

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();

        return view('PrintPanel.dominican', compact('admission', 'patientInfo', 'exam_physical', 'exam_urin', 'exam_xray', 'medical_director', 'exam_audio', 'exam_visacuity', 'exam_ishihara'));
    }

    public function singapore_flag_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
        ->where('exam_physical.admission_id', '=', $id)
        ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
        ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
        ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
        ->latest('id')
        ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_xray = DB::table('exam_xray')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_ecg = DB::table('exam_ecg')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::where('position', 'Medical Director')->first();
        return view('PrintPanel.singapore', compact('admission', 'patientInfo', 'exam_physical', 'exam_xray', 'exam_ecg', 'exam_visacuity', 'exam_ishihara', 'exam_audio', 'exam_urin'));
    }

    public function malta_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_patient.signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
        ->where('exam_physical.admission_id', '=', $id)
        ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
        ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
        ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->select('exam_visacuity.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_visacuity.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_visacuity.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_visacuity.technician2_id')
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->select('exam_ishihara.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title')
        ->where('exam_ishihara.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_ishihara.technician_id')
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->select('exam_audio.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_audio.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_audio.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_audio.technician2_id')
        ->latest('id')
        ->first();

         $exam_xray = DB::table('exam_xray')
        ->select('exam_xray.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_xray.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_xray.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_xray.technician2_id')
        ->latest('id')
        ->first();

        $exam_ecg = DB::table('exam_ecg')
        ->select('exam_ecg.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_ecg.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_ecg.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_ecg.technician2_id')
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        return view('PrintPanel.malta', compact('admission', 'patientInfo', 'exam_physical', 'exam_ishihara', 'exam_audio', 'exam_visacuity', 'exam_xray', 'exam_ecg'));
    }

    public function mer_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_patient.signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
        ->where('exam_physical.admission_id', '=', $id)
        ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
        ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
        ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
        ->latest('id')
        ->first();

        $exam_visacuity = DB::table('exam_visacuity')
        ->select('exam_visacuity.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_visacuity.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_visacuity.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_visacuity.technician2_id')
        ->latest('id')
        ->first();

        $exam_ishihara = DB::table('exam_ishihara')
        ->select('exam_ishihara.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', )
        ->where('exam_ishihara.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_ishihara.technician_id')
        ->latest('id')
        ->first();

        $exam_blood = DB::table('examlab_bloodsero')
        ->select('examlab_bloodsero.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', )
        ->where('examlab_bloodsero.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'examlab_bloodsero.technician_id')
        ->latest('id')
        ->first();

        $exam_drug = DB::table('examlab_drug')
        ->select('examlab_drug.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', )
        ->where('examlab_drug.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'examlab_drug.technician_id')
        ->latest('id')
        ->first();

        $exam_audio = DB::table('exam_audio')
        ->select('exam_audio.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_audio.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_audio.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_audio.technician2_id')
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();

        $medical_director = User::select('mast_employee.*', 'mast_employeeinfo.address')->where('mast_employee.position', 'Medical Director')->leftJoin('mast_employeeinfo', 'mast_employeeinfo.main_id', 'mast_employee.id')->first();
        return view('PrintPanel.mer', compact('admission', 'patientInfo', 'exam_physical', 'exam_drug', 'exam_blood', 'exam_visacuity', 'exam_ishihara', 'exam_audio', 'medical_director'));
    }

    public function mlc_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.signature',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();


        $exam_physical = DB::table('exam_physical')
            ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.lastname as physician_lastname', 'mast_employee.firstname as physician_firstname', 'mast_employee.middlename as physician_middlename', 'mast_employee.signature as physician_signature', 'mast_employee.license_no as physician_licenseno', 'mast_employee.title as physician_title')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

            // dd($exam_physical);

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        return view('PrintPanel.mlc', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity'));
    }

    public function peme_bahia_print()
    {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_physical = DB::table('exam_physical')
        ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.signature  as tech1_signature', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_bloodsero = DB::table('examlab_bloodsero')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_drug = DB::table('examlab_drug')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_feca = DB::table('examlab_feca')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_hema = DB::table('examlab_hema')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_hepa = DB::table('examlab_hepa')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_dental = DB::table('exam_dental')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_cardio = DB::table('exam_cardio')
            ->select('exam_cardio.*', 'mast_employee.signature  as tech1_signature', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_cardio.admission_id', '=', $id)
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_cardio.technician_id')
            ->latest('id')
            ->first();


        $exam_audio = DB::table('exam_audio')
            ->select('exam_audio.*', 'mast_employee.signature  as tech1_signature', 'mast_employee.firstname  as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee.license_no')
            ->where('exam_audio.admission_id', '=', $id)
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_audio.technician_id')
            ->latest('id')
            ->first();

        $exam_ecg = DB::table('exam_ecg')
            ->select('exam_ecg.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
            ->where('exam_ecg.admission_id', '=', $id)
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_ecg.technician_id')
            ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_ecg.technician2_id')
            ->latest('id')
            ->first();

        $exam_crf = DB::table('exam_crf')
        ->select('exam_crf.*', 'mast_employee.firstname as tech1_firstname', 'mast_employee.lastname  as tech1_lastname', 'mast_employee.middlename  as tech1_middlename', 'mast_employee.title  as tech1_title', 'mast_employee2.firstname as tech2_firstname', 'mast_employee2.lastname  as tech2_lastname', 'mast_employee2.middlename  as tech2_middlename', 'mast_employee2.title  as tech2_title')
        ->where('exam_crf.admission_id', '=', $id)
        ->leftJoin('mast_employee', 'mast_employee.id', 'exam_crf.technician_id')
        ->leftJoin('mast_employee as mast_employee2', 'mast_employee2.id', 'exam_crf.technician2_id')
        ->latest('id')
        ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        return view('PrintPanel.peme-bahia', compact('admission', 'patientInfo', 'exam_physical', 'exam_audio', 'exam_ecg', 'exam_crf', 'exam_bloodsero', 'exam_drug', 'exam_feca', 'exam_hema', 'exam_hepa', 'exam_urin', 'exam_dental', 'exam_cardio'));
    }

    public function transmittal() {
        $agencies = Agency::all();
        return view('Transmittal.transmittal', compact('agencies'));
    }


    public function daily_patient() {
        $from_date = $_GET['date_from'];
        $to_date = $_GET['date_to'];
        $today_patients = Admission::select(
            "patientcode",
            DB::raw('MAX(tran_admission.id) as id'),
            DB::raw('MAX(tran_admission.agency_id) as agency_id'),
            DB::raw('MAX(tran_admission.package_id) as package_id'),
            DB::raw('MAX(tran_admission.payment_type) as payment_type'),
            DB::raw('MAX(tran_admission.position) as position'),
            DB::raw('MAX(tran_admission.principal) as principal'),
            DB::raw('MAX(tran_admission.trans_date) as trans_date'),
            DB::raw('MAX(tran_admission.vesselname) as vessel'),
            DB::raw('MAX(tran_admission.last_medical) as last_medical'),
        )->whereDate('tran_admission.trans_date', '>=', $from_date)
        ->whereDate('tran_admission.trans_date', '<=', $to_date)
        ->with('patient', 'agency', 'package')
         ->groupBy('patientcode')
         ->get();

        //  dd($today_patients);

         $patients = [];

         foreach($today_patients as $key => $patient) {
             $additional_exams =  DB::table('tran_admissiondtl')
                                ->select(
                                    'tran_admissiondtl.*',
                                    'list_exam.examname as examname',
                                    'list_exam.category as category',
                                    'list_exam.section_id',
                                    'list_section.sectionname'
                                )
                                ->where('main_id', $patient->admission_id)
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

                $additional_tests = [];

                foreach($additional_exams as $exam) {
                    array_push($additional_tests, $exam->examname);
                }

            $patient_data = [
                "patient_lastname" => $patient->patient ? $patient->patient->lastname : null,
                "patient_firstname" => $patient->patient ? $patient->patient->firstname : null,
                "patient_middlename" => $patient->patient ? $patient->patient->middlename : null,
                "trans_date" => $patient->trans_date,
                "patient_email" => $patient->patient ? $patient->patient->email : null,
                "birthdate" => $patient->patient ? $patient->patient->patientinfo->birthdate : null,
                "patient_gender" => $patient->patient ? $patient->patient->gender : null,
                "patient_age" => $patient->patient ? $patient->patient->age : null,
                "principal" => $patient->principal,
                "agencyname" => $patient->agency ? $patient->agency->agencyname : null,
                "packagename" => $patient->package ? $patient->package->packagename : null,
                "patient_id" => $patient->patient ? $patient->patient->id : null,
                "created_date" => $patient->patient ? $patient->patient->created_date : null,
                "last_medical" => $patient->last_medical,
                "vessel" => $patient->vessel,
                "requestor" => $patient->requestor,
                "position" => $patient->position,
                "patientcode" => $patient->patientcode,
                "payment_type" => $patient->payment_type,
                "admission_id" => $patient->id,
                "additional_tests" => $additional_tests
            ];
            array_push($patients, $patient_data);
         }

        return view("PrintTemplates.daily_patient_print", compact("patients", "from_date", "to_date"));
    }

    public function store_yellow_card(Request $request) {
        // dd($request->all());
        $path = '/yellow_card_print?id=' . $request->patient_id;
        if ($request->action == 'store') {
            foreach ($request->vaccine as $key => $vaccine) {
                DB::table('yellow_card')->insert([
                    'count' => $request->count[$key],
                    'patient_id' => $request->patient_id,
                    'vaccine' => $vaccine,
                    'date' => $request->date[$key],
                    'manufacturer' => $request->manufacturer[$key],
                    'cert_valid' => $request->cert_valid[$key],
                    'official_stamp' => $request->official_stamp[$key],
                ]);
            }
            return back()->with('yellow_card_success', "Yellow Card Success");
        } else {
            DB::table('yellow_card')->where('patient_id', $request->patient_id)->delete();
            foreach ($request->vaccine as $key => $vaccine) {
                DB::table('yellow_card')->insert([
                    'count' => $request->count[$key],
                    'patient_id' => $request->patient_id,
                    'vaccine' => $vaccine,
                    'date' => $request->date[$key],
                    'manufacturer' => $request->manufacturer[$key],
                    'cert_valid' => $request->cert_valid[$key],
                    'official_stamp' => $request->official_stamp[$key],
                ]);
            }
            return back()->with('yellow_card_success', "Yellow Card Success");
        }
    }

    public function daily_patient_form() {
        $data = session()->all();
        return view('PrintPanel.daily_patient_form', compact('data'));
    }

    public function follow_up_print() {
        $id = $_GET['id'];
        $admission_id = $_GET['admission_id'];
        $patient = Patient::select('mast_patient.*', 'mast_agency.agencyname')
        ->where('mast_patient.id', $id)
        ->leftJoin('mast_patientinfo', 'mast_patientinfo.main_id', 'mast_patient.id')
        ->leftJoin('mast_agency', 'mast_agency.id', 'mast_patientinfo.agency_id')
        ->first();

        $admission = Admission::where('id', $admission_id)->latest('id')->with('exam_physical', 'exam_ecg', 'exam_xray')->first();
        // dd($admission);

        $records = ReassessmentFindings::where('admission_id', $admission_id)->get();

        return view('PrintPanel.follow_up_print', compact(
                    'patient',
                    'admission',
                    'records'
            ));
    }

    public function lab_result(Request $request) {
        $id = $request->id;

        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_bloodsero = DB::table('examlab_bloodsero')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_drug = DB::table('examlab_drug')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_feca = DB::table('examlab_feca')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_pregnancy = DB::table('examlab_pregnancy')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_hema = DB::table('examlab_hema')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_hepa = DB::table('examlab_hepa')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_hiv = DB::table('examlab_hiv')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

        $exam_urin = DB::table('examlab_urin')
        ->where('admission_id', $id)
        ->latest('id')
        ->first();

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

        foreach ($additional_exams as $key => $additional_exam) {
            array_push($add_exams, $additional_exam->examname);
        }

        $additional = implode(', ', $add_exams);

        return view('PrintPanel.lab_result', compact('admission', 'exam_hema', 'exam_hiv', 'exam_bloodsero', 'exam_drug', 'exam_feca', 'exam_hepa', 'exam_urin', 'exam_pregnancy', 'additional'));
    }

    public function land_based_print(Request $request) {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.signature',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_psycho = DB::table('exam_psycho')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();


        $exam_physical = DB::table('exam_physical')
            ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.lastname as physician_lastname', 'mast_employee.firstname as physician_firstname', 'mast_employee.middlename as physician_middlename', 'mast_employee.signature as physician_signature', 'mast_employee.license_no as physician_licenseno')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

            // dd($exam_physical);

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        return view('PrintPanel.land_base', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity', 'exam_psycho'));
    }

    public function north_england_print(Request $request) {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.signature',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();


        $exam_physical = DB::table('exam_physical')
            ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.lastname as physician_lastname', 'mast_employee.firstname as physician_firstname', 'mast_employee.middlename as physician_middlename', 'mast_employee.signature as physician_signature', 'mast_employee.license_no as physician_licenseno')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        return view('PrintPanel.north_england', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity'));
    }

    public function standard_club_print(Request $request) {
        $id = $_GET['id'];
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.signature',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();


        $exam_physical = DB::table('exam_physical')
            ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.lastname as physician_lastname', 'mast_employee.firstname as physician_firstname', 'mast_employee.middlename as physician_middlename', 'mast_employee.signature as physician_signature', 'mast_employee.license_no as physician_licenseno')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        return view('PrintPanel.standard_club', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity'));
    }

    public function medical_record(Request $request) {
        $patient_id = $_GET['patient_id'];
        $id = $_GET['id'];
        $medical_history = MedicalHistory::where('main_id', $patient_id)->first();
        $admission = Admission::select(
            'tran_admission.*',
            'mast_patient.id as patient_id',
            'mast_patient.firstname',
            'mast_patient.lastname',
            'mast_patient.middlename',
            'mast_patient.patient_image',
            'mast_patient.signature',
            'mast_patient.age',
            'mast_patient.gender',
            'mast_patient.position_applied',
            'mast_patient.patient_signature',
            'mast_agency.agencyname',
            'list_package.packagename'
        )
            ->where('tran_admission.id', $id)
            ->leftJoin(
                'mast_patient',
                'mast_patient.admission_id',
                'tran_admission.id'
            )
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                'tran_admission.agency_id'
            )
            ->leftJoin(
                'list_package',
                'list_package.id',
                'tran_admission.package_id'
            )
            ->first();

        $exam_audio = DB::table('exam_audio')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $exam_ishihara = DB::table('exam_ishihara')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();


        $exam_physical = DB::table('exam_physical')
            ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice', 'mast_employee.lastname as physician_lastname', 'mast_employee.firstname as physician_firstname', 'mast_employee.middlename as physician_middlename', 'mast_employee.signature as physician_signature', 'mast_employee.license_no as physician_licenseno')
            ->where('exam_physical.admission_id', '=', $id)
            ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
            ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
            ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
            ->leftJoin('mast_employee', 'mast_employee.id', 'exam_physical.technician_id')
            ->latest('id')
            ->first();

        $exam_visacuity = DB::table('exam_visacuity')
            ->where('admission_id', '=', $id)
            ->latest('id')
            ->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $admission->patient_id)
            ->first();
        // dd($medical_history);
        return view('PrintPanel.medical-history', compact('admission', 'patientInfo', 'exam_audio', 'exam_physical', 'exam_ishihara', 'exam_visacuity', 'medical_history'));
    }

}
