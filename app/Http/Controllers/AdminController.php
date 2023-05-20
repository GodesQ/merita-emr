<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PatientController;
use App\Mail\ForgetPassword;
use App\Mail\Support;
use Illuminate\Support\Str;
use App\Mail\AgencyPassword;
use App\Models\User;
use App\Models\Patient;
use App\Models\MedicalHistory;
use App\Models\Agency;
use App\Models\ChartAccount;
use App\Models\ListSection;
use App\Models\ListExam;
use App\Models\ListPackage;
use App\Models\Department;
use App\Models\Admission;
use App\Models\CashierOR;
use App\Models\SchedulePatient;
use App\Models\EmployeeLog;
use App\Models\FollowUpResult;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function migrate_patients(Request $request) {
        // $patients = DB::table('mast_patient')
        //     ->select(DB::raw('*, CONCAT_WS(" ", firstname, middlename, lastname) AS name'))
        //     ->groupBy('name')
        //     ->havingRaw('COUNT(*) > 1')
        //     ->get();

        // foreach ($patients as $patient) {
        //     // Find the first registered record based on the created_date in each group
        //     $firstRecord = DB::table('mast_patient')
        //         ->where('firstname', $patient->firstname)
        //         ->where('middlename', $patient->middlename)
        //         ->where('lastname', $patient->lastname)
        //         ->orderBy('created_date', 'ASC')
        //         ->first();

        //     // Update the patientcode value for all other records in the group
        //     DB::table('mast_patient')
        //         ->where('firstname', $patient->firstname)
        //         ->where('middlename', $patient->middlename)
        //         ->where('lastname', $patient->lastname)
        //         ->where('id', '<>', $firstRecord->id)
        //         ->update(['registered_patientcode' => DB::raw('patientcode'), 'patientcode' => $firstRecord->patientcode]);
        // }

        // echo 'success';

        // $patients = Patient::where('patientcode', 'P19-000010')->update([
        //     'patientcode' => DB::raw('registered_patientcode')
        // ]);

        DB::table('mast_patient')
            ->where('firstname', null)
            ->where('middlename', null)
            ->where('lastname', null)
            ->delete();
    }

    public function followup_results(Request $request) {
        $reassessmentData = DB::table('reassessment')->get();

        foreach ($reassessmentData as $data) {

            $prefix_to_remove = [
               ['Dental: ', 'dental', 'Dental'],
                ['PE: ', 'pe', 'PE'],
                ['Visual Acuity: ', 'visual_acuity', 'Visual Acuity'],
                ['Psychological: ', 'psychological', 'Psychological'],
                ['Audiometry: ', 'audiometry', 'Audiometry'],
                ['Ishihara: ', 'ishihara', 'Ishihara'],
                ['Cardiac Risk Factor: ', 'crf', 'Cardiac Risk Factor'],
                ['Cardiovascular: ', 'cardio', 'Cardiovascular'],
                ['Stress Test: ', 'stress_test', 'Stress Test'],
                ['2D Echo Plain: ', 'echo_plain', '2D Echo Plain'],
                ['2D Echo Doppler: ', 'echo_doppler', '2D Echo Doppler'],
                ['PPD: ', 'ppd', 'PPD'],
                ['Stress Echo: ', 'stress_echo', 'Stress Echo'],
                ['KUB Exam: ', 'kub', 'KUB Exam'],
                ['HBT Exam: ', 'hbt', 'HBT Exam'],
                ['THYROID Exam: ', 'thyroid', 'THYROID Exam'],
                ['BREAST Exam: ', 'breast', 'BREAST Exam'],
                ['Reflexes: ','whole_abdomen', 'WHOLE ABDOMEN'],
                ['GENITALS Exam: ', 'genitals', 'GENITALS'],
                ['Psycho BPI: ', 'psycho_bpi', 'Psycho BPI'],
                ['Hematology: ', 'hematology', 'Hematology'],
                ['Urinalysis: ', 'urinalysis', 'Urinalysis'],
                ['Pregnancy: ', 'pregnancy', 'Pregnancy'],
                ['Fecalysis: ', 'fecalysis', 'Fecalysis'],
                ['Hepatitis: ', 'hepatitis', 'Hepatitis'],
                ['HIV: ', 'hiv', 'HIV'],
                ['Drug Test: ', 'drug_test', 'Drug Test'],
                ['Skin: ', 'skin', 'Skin'],
                ['Neck, Lymph Node,Thyroid: : ', 'neck_lymphnode_thyroid: ', 'Neck, Lymph Node,Thyroid'],
                ['Head, Neck, Scalp: ', 'head_neck_scalp', 'Head, Neck, Scalp'],
                ['Neurology: ', 'neurology', 'Neurology'],
                ['Eyes(external): ', 'eyes_external', 'Eyes(external)'],
                ['Breast,Axilla: ', 'breast_axilla', 'Breast,Axilla'],
                ['Pupils: ', 'pupils', 'Pupils'],
                ['Chest and Lungs: ', 'chest_lungs', 'Chest and Lungs'],
                ['Ears: ', 'cardio', 'Ears'],
                ['Heart: ', 'heart', 'Heart'],
                ['Nose,Sinuses: ', 'nose_sinuses', 'Nose,Sinuses'],
                ['Abdomen,Liver,Spleen: ', 'abdomen_liver_spleen', 'Abdomen,Liver,Spleen'],
                ['Mouth,Throat: ', 'mouth_throat', 'Mouth,Throat'],
                ['Back: ', 'back', 'Back'],
                ['Anus-Rectum: ', 'anus_rectum', 'Anus-Rectum'],
                ['Genito-Urinary System: ', 'genito_urinary', 'Genito-Urinary System'],
                ['Inguinals,Genitals: ', 'thyroid', 'Inguinals,Genitals'],
                ['Extremities: ', 'breast', 'Extremities'],
                ['Reflexes: ','whole_abdomen', 'Reflexes'],
                ['Dental(Teeth/Gums): ', 'dentals_teeth_gums', 'Dental(Teeth/Gums)'],
                ['HBA1C: ', 'psycho_bpi', 'HBA1C'],
                ['PPBG: ', 'ppbg', 'PPBG'],
                ['FBS: ', 'fbs', 'FBS'],
                ['BUN: ', 'bun', 'BUN'],
                ['CREATININE: ', 'creatinine', 'CREATININE'],
                ['CHOLESTEROL: ', 'cholesterol', 'CHOLESTEROL'],
                ['TRIGLYCERIDES: ', 'triglycerides', 'TRIGLYCERIDES'],
                ['HDL Chole: ', 'hdl_chole', 'HDL Chole'],
                ['LDL Chole: ', 'ldl_chole', 'LDL Chole'],
                ['VLDL Chole: ', 'vldl_chole', 'VLDL Chole'],
                ['URIC ACID: ', 'uric_acid', 'URIC ACID'],
                ['SGOT (AST): ', 'sgot_ast', 'SGOT (AST)'],
                ['SGPT (ALT): ', 'sgpt_alt', 'SGPT (ALT)'],
                ['GGT: ', 'ggt', 'GGT'],
                ['ALK. PHOS.: ', 'alk_phos', 'ALK. PHOS.'],
                ['TOTAL BILIRUBIN: ', 'total_bilirubin', 'TOTAL BILIRUBIN'],
                ['DIRECT BILIRUBIN: ', 'direct_bilirubin', 'DIRECT BILIRUBIN'],
                ['INDIRECT BILIRUBIN: ', 'indirect_bilirubin', 'INDIRECT BILIRUBIN'],
                ['TOTAL PROTEIN: ', 'total_protein', 'TOTAL PROTEIN'],
                ['ALBUMIN: ', 'albumin', 'ALBUMIN'],
                ['GLOBULIN: ', 'globulin', 'GLOBULIN'],
                ['SODIUM: ', 'sodium', 'SODIUM'],
                ['POTASSIUM: ', 'potassium', 'POTASSIUM'],
                ['CHLORIDE: ', 'chloride', 'CHLORIDE'],
                ['CALCIUM: ', 'calcium', 'CALCIUM'],
                ['A/G RATIO: ', 'ag_ratio', 'A/G RATIO'],
                ['Hemoglobin: ', 'hemoglobin', 'Hemoglobin'],
                ['Hematocrit: ', 'hematocrit', 'Hematocrit'],
                ['RBC: ', 'rbc', 'RBC'],
                ['WBC: ', 'wbc', 'WBC'],
                ['Neutrophil: ', 'neutrophil', 'Neutrophil'],
                ['Lymphocyte: ', 'lymphocyte', 'Lymphocyte'],
                ['Eosinophil: ', 'eosinophil', 'Eosinophil'],
                ['Monocyte: ', 'monocyte', 'Monocyte'],
                ['Basophil: ', 'basophil', 'Basophil'],
                ['Platelet: ', 'platelet', 'Platelet'],
                ['Bleeding Time: ', 'bleeding_time', 'Bleeding Time'],
                ['Clotting Time: ', 'clotting_time', 'Clotting Time'],
                ['ESR: ', 'esr', 'ESR'],
                ['MCV: ', 'mcv', 'MCV'],
                ['MCH: ', 'mch', 'MCH'],
                ['MCHC: ', 'mchc', 'MCHC'],
                ['VDRL: ', 'vdrl', 'VDRL'],
                ['TPHA: ', 'tpha', 'TPHA'],
                ['HBSAG: ', 'hbsag', 'HBSAG'],
                ['Anti-HBs: ', 'anti_hbs', 'Anti-HBs'],
                ['Anti-HBc (lgM): ', 'anti_hbc_lgm', 'Anti-HBc (lgM)'],
                ['Anti-HBc (lgG): ', 'anti_hbc_lgg', 'Anti-HBc (lgG)'],
                ['Anti-HAV (lgM): ', 'anti_hav_lgm', 'Anti-HAV (lgM)'],
                ['Anti-HAV (lgG): ', 'anti_hav_lgg', 'Anti-HAV (lgG)'],
                ['Anti-HCV: ', 'anti_hcv', 'Anti-HCV'],
                ['SKIN: ', 'skin', 'SKIN'],
                ['Neck, Lymph Node,Thyroid :', 'neck_lymph_node_thyroid', 'Neck, Lymph Node,Thyroid'],
                ['Neurology :', 'neurology', 'Neurology'],
                ['Eyes(external) :', 'eyes_external', 'Eyes(external)'],
                ['Breast,Axilla :', 'breast_axilla', 'Breast,Axilla'],
                ['Pupils :', 'pupils', 'Pupils'],
                ['Chest and Lungs :', 'chest_lungs', 'Chest and Lungs'],
                ['Ears :', 'ears', 'Ears'],
                ['Heart :', 'heart', 'Heart'],
                ['Nose,Sinuses :', 'nose_sinuses', 'Nose,Sinuses'],
                ['Abdomen,Liver,Spleen :', 'abdomen_liver_spleen', 'Abdomen,Liver,Spleen'],
                ['Mouth,Throat :', 'mouth_throat', 'Mouth,Throat'],
                ['Back :', 'back', 'Back'],
                ['Anus-Rectum :', 'anus_rectum', 'Anus-Rectum'],
                ['Genito-Urinary System :', 'genito_urinary_system', 'Genito-Urinary System'],
                ['Inguinals,Genitals :', 'inguinals_genitals', 'Inguinals,Genitals'],
                ['Extremities :', 'extremities', 'Extremities'],
                ['Reflexes :', 'reflexes', 'Reflexes'],
                ['Dental(Teeth/Gums) :', 'dental_teeth_gums', 'Dental(Teeth/Gums)'],
            ];

            $findings = [];
            $recommendations = [];

            foreach ($prefix_to_remove as $key => $prefix) {
                if (strpos($data->findings, $prefix[0]) !== false) {
                    $finding_pos = strpos($data->findings, $prefix[0]);
                    $result_findings = substr($data->findings, $finding_pos, strpos($data->findings, ";", $finding_pos) - $finding_pos);
                    if(!$result_findings) {
                        $result_findings = substr($data->findings, $finding_pos, strlen($data->findings));
                    }
                    $result_findings_value = substr($result_findings, strlen($prefix[0]));
                    array_push($findings, ['value' =>  $result_findings_value, 'title' => $prefix[2],'type' => $prefix[1]]);
                }

                if (strpos($data->remarks, $prefix[0]) !== false) {
                    $recommendation_pos = strpos($data->remarks, $prefix[0]);
                    $result_recommendations = substr($data->remarks, $recommendation_pos, strpos($data->remarks, ";", $recommendation_pos) - $recommendation_pos);
                    if(!$result_recommendations) {
                        $result_recommendations = substr($data->remarks, $recommendation_pos, strlen($data->remarks));
                    }
                    $result_recommendations_value = substr($result_recommendations, strlen($prefix[0]));
                    array_push($recommendations, ['value' =>  $result_recommendations_value,'title' => $prefix[2], 'type' => $prefix[1]]);
                }
            }

            foreach ($findings as $key => $finding) {
                FollowUpResult::updateOrCreate(
                    ['admission_id' => $data->admission_id, 'patient_id' => $data->patient_id, 'followup_date' => $data->date, 'exam_type' => $finding['type']],
                    ['findings' => $finding['value'], 'exam_title' => $finding['title']]
                );
            }

            foreach ($recommendations as $key => $recommendation) {
                FollowUpResult::updateOrCreate(
                    ['admission_id' => $data->admission_id, 'patient_id' => $data->patient_id, 'followup_date' => $data->date, 'exam_type' => $finding['type']],
                    ['recommendations' => $recommendation['value'], 'exam_title' => $finding['title']]
                );
            }
        }
    }

    public function today_patients(Request $request)
    {
        $data = session()->all();
        $today = session()->get('request_date');
        if ($request->ajax()) {
            $schedule_patients = SchedulePatient::select('sched_patients.patientcode', DB::raw('MAX(patient_id) as patient_id'), DB::raw('MAX(date) as date'))
                ->where('sched_patients.date', '=', $today)
                ->with('patient')
                ->groupBy('sched_patients.patientcode')
                ->get();

            return DataTables::of($schedule_patients)
                ->addIndexColumn()
                ->addColumn('patient_image', function ($row) {
                    if (optional($row->patient)->patient_image) {
                        $patient_image = '<img height="50" width="50" src="../../../app-assets/images/profiles/' . optional($row->patient)->patient_image . '?' . $row->updated_date . '"/>';
                    } else {
                        $patient_image = '<img height="50" width="50"  src="../../../app-assets/images/profiles/profilepic.jpg"/>';
                    }
                    return $patient_image;
                })
                ->addColumn('patientname', function ($row) {
                    $patientname = '<a href="patient_edit?id=' . $row->patient_id . '&patientcode=' . $row->patientcode . '" class="font-weight-bold secondary">' . optional($row->patient)->lastname . ', ' . optional($row->patient)->firstname . '</a>';
                    return $patientname;
                })
                ->addColumn('package', function ($row) {
                    if($row->patient()->exists()) {
                        return optional($row->patient)->patientinfo->package ? optional($row->patient)->patientinfo->package->packagename : null;
                    } else {
                        return null;
                    }
                })
                ->addColumn('agency', function ($row) {
                    if($row->patient()->exists()) {
                        return optional($row->patient)->patientinfo->agency ? optional($row->patient)->patientinfo->agency->agencyname : null;
                    } else {
                        return null;
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="patient_edit?id=' . $row->patient_id . '&patientcode=' . $row->patientcode . '"  class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'patient_image', 'patientname'])
                ->toJson();
        }
    }

    public function today_medical_packages(Request $request) {
        $today = session()->get('request_date');

        if($request->ajax()) {

            $patientCounts = Patient::select('mast_patientinfo.medical_package', DB::raw('count(*) as count'))
                ->join('mast_patientinfo', 'mast_patient.id', '=', 'mast_patientinfo.main_id')
                ->join('sched_patients', function ($join) use ($today) {
                    $join->on('mast_patient.id', '=', 'sched_patients.patient_id')
                         ->where('sched_patients.date', '=', $today);
                })
                ->groupBy('mast_patientinfo.medical_package')
                ->get();

            $packages = ListPackage::select('id', 'packagename', 'agency_id')
                ->with('agency')
                ->whereIn('id', function($query) use ($patientCounts, $today) {
                    $query->select('mast_patientinfo.medical_package')
                        ->from('mast_patientinfo')
                        ->join('mast_patient', 'mast_patient.id', '=', 'mast_patientinfo.main_id')
                        ->join('sched_patients', function ($join) use ($today) {
                            $join->on('mast_patient.id', '=', 'sched_patients.patient_id')
                                 ->where('sched_patients.date', '=', $today);
                        })
                        ->whereIn('mast_patientinfo.medical_package', $patientCounts->pluck('medical_package')->toArray())
                        ->groupBy('mast_patientinfo.medical_package')
                        ->havingRaw('count(*) >= ?', [1])
                        ->get();
                })
                ->get()
                ->map(function($row) use ($patientCounts) {
                    $row->total = $patientCounts->where('medical_package', $row->id)->first()->count ?? 0;
                    $row->packagename = $row->packagename . ' ' . '(' . optional($row->agency)->agencyname . ')';
                    return $row;
                })
                ->filter(function($row) {
                    return $row->total > 0;
                });

            return DataTables::of($packages)
                ->addIndexColumn()
                ->toJson();

        }
    }

    // RETURN TO DASHBOARD PAGE
    public function view_dashboard(Request $request)
    {
        isset($_GET['request_date']) ? session()->put('request_date', $_GET['request_date']) : null;
        $data = session()->all();
        $today = $data['request_date'];

        // return view('layouts.dashboard', compact('data', 'ongoing_patients', 'completed_patients', 'pending_patients', 'queue_patients', 'fit_patients'));

        if(session()->get('dept_id') == 1) {

            $agencies = Agency::all();

            $total_fit = SchedulePatient::where('date', $today)->whereHas('patient.admission', function ($q) {
                    return $q->where('lab_status', 2);
            })->count();

            $total_unfit = SchedulePatient::where('date', $today)->whereHas('patient.admission', function ($q) {
                    return $q->where('lab_status', 3);
            })->count();

            $total_pending = SchedulePatient::where('date', $today)->whereHas('patient.admission', function ($q) {
                return $q->where('lab_status', 1);
            })->count();

            return view('layouts.admin-dashboard', compact('agencies', 'total_fit', 'total_unfit', 'total_pending'));
        } else {

            $patients = Patient::limit(5)
                ->latest('id')
                ->get();

            $schedule_patients_status = SchedulePatient::select('sched_patients.patientcode', DB::raw('MAX(patient_id) as patient_id'), DB::raw('MAX(date) as date'))
                ->where('sched_patients.date', '=', $today)
                ->with('patient')
                ->groupBy('sched_patients.patientcode')
                ->get();

            // dd($schedule_patients_status);

            $completed_patients = [];
            $ongoing_patients = [];
            $pending_patients = [];
            $queue_patients = [];
            $fit_patients = [];

            foreach ($schedule_patients_status as $key => $patient) {
                if ($patient->patient) {
                    $admission = Admission::where('id', $patient->patient->admission_id)->first();
                } else {
                    $admission = null;
                }

                $patient_exams = DB::table('list_packagedtl')
                    ->select('list_packagedtl.*', 'list_exam.examname as examname', 'list_exam.category as category', 'list_exam.section_id', 'list_section.sectionname')
                    ->where('main_id', $patient->patient->patientinfo->medical_package)
                    ->leftJoin('list_exam', 'list_exam.id', 'list_packagedtl.exam_id')
                    ->leftJoin('list_section', 'list_section.id', 'list_exam.section_id')
                    ->get();

                if (!$patient_exams) {
                    $patient_exams = DB::table('list_packagedtl')
                        ->select('list_packagedtl.*', 'list_exam.examname as examname', 'list_exam.category as category', 'list_exam.section_id', 'list_section.sectionname')
                        ->where('main_id', $patient->patient->admission->package_id)
                        ->leftJoin('list_exam', 'list_exam.id', 'list_packagedtl.exam_id')
                        ->leftJoin('list_section', 'list_section.id', 'list_exam.section_id')
                        ->get();
                }

                $patient_status = (new PatientController())->patientStatus($patient->patient->admission_id, $patient_exams);

                $exam_audio = $patient_status['exam_audio'];
                $exam_crf = $patient_status['exam_crf'];
                $exam_cardio = $patient_status['exam_cardio'];
                $exam_dental = $patient_status['exam_dental'];
                $exam_ecg = $patient_status['exam_ecg'];
                $exam_echodoppler = $patient_status['exam_echodoppler'];
                $exam_echoplain = $patient_status['exam_echoplain'];
                $exam_ishihara = $patient_status['exam_ishihara'];
                $exam_physical = $patient_status['exam_physical'];
                $exam_psycho = $patient_status['exam_psycho'];
                $exam_psychobpi = $patient_status['exam_psychobpi'];
                $exam_stressecho = $patient_status['exam_stressecho'];
                $exam_stresstest = $patient_status['exam_stresstest'];
                $exam_ultrasound = $patient_status['exam_ultrasound'];
                $exam_visacuity = $patient_status['exam_visacuity'];
                $exam_xray = $patient_status['exam_xray'];
                $exam_blood_serology = $patient_status['exam_blood_serology'];
                $examlab_hiv = $patient_status['examlab_hiv'];
                $examlab_feca = $patient_status['examlab_feca'];
                $examlab_drug = $patient_status['examlab_drug'];
                $examlab_hema = $patient_status['examlab_hema'];
                $examlab_hepa = $patient_status['examlab_hepa'];
                $examlab_pregnancy = $patient_status['examlab_pregnancy'];
                $examlab_urin = $patient_status['examlab_urin'];
                $examlab_misc = $patient_status['examlab_misc'];

                $exams = $patient_status['exams'];

                if ($exams) {
                    $completed_exams = array_filter($exams, function ($exam) {
                        return $exam == 'completed';
                    });

                    $on_going_exams = array_filter($exams, function ($exam) {
                        return $exam == '';
                    });
                } else {
                    $completed_exams = [];
                    $on_going_exams = [];
                }

                if (!$admission) {
                    array_push($queue_patients, $patient);
                } elseif ($admission->lab_status == 2) {
                    array_push($fit_patients, $patient);
                } else {
                    if ($exam_audio == null && $exam_crf == null && $exam_cardio == null && $exam_dental == null && $exam_ecg == null && $exam_echodoppler == null && $exam_echoplain == null && $exam_ishihara == null && $exam_psycho == null && $exam_psychobpi == null && $exam_stressecho == null && $exam_stresstest == null && $exam_ultrasound == null && $exam_visacuity == null && $exam_xray == null && $exam_blood_serology == null && $examlab_hiv == null && $examlab_drug == null && $examlab_feca == null && $examlab_feca == null && $examlab_hepa == null && $examlab_pregnancy == null && $examlab_urin == null && $examlab_misc == null) {
                        array_push($pending_patients, $patient);
                    } else {
                        if (count($on_going_exams)) {
                            array_push($ongoing_patients, $patient);
                        }
                    }
                    if (count($completed_exams)) {
                        if (count($completed_exams) == count($patient_exams)) {
                            array_push($completed_patients, $patient);
                        }
                    }
                }
            }

            return view('layouts.dashboard', compact('data', 'ongoing_patients', 'completed_patients', 'pending_patients', 'queue_patients', 'fit_patients'));
        }
    }

    public function today_fit_patients() {
        $today = session()->get('request_date');
        $fit_patients = SchedulePatient::where('date', $today)->whereHas('patient.admission', function ($q) {
                return $q->where('lab_status', 2);
        })->with('patient.patientinfo.agency', 'patient.patientinfo.package')->get();

        return response()->json($fit_patients);
    }

    public function today_unfit_patients() {
        $today = session()->get('request_date');
        $unfit_patients = SchedulePatient::where('date', $today)->whereHas('patient.admission', function ($q) {
                return $q->where('lab_status', 3);
        })->with('patient.patientinfo.agency', 'patient.patientinfo.package')->get();

        return response()->json($unfit_patients);
    }

    public function today_pending_patients() {
        $today = session()->get('request_date');
        $pending_patients = SchedulePatient::where('date', $today)->whereHas('patient.admission', function ($q) {
                return $q->where('lab_status', 1);
        })->with('patient.patientinfo.agency', 'patient.patientinfo.package')->get();

        return response()->json($pending_patients);
    }

    public function month_scheduled_patients(Request $request)
    {
        $scheduled_month_patients = DB::table('sched_patients')
            ->select('sched_patients.patientcode', DB::raw('MAX(sched_patients.patient_id) as patient_id'), DB::raw('MAX(sched_patients.date) as date'), DB::raw('MAX(mast_patient.lastname) as lastname'), DB::raw('MAX(mast_patient.firstname) as firstname'), DB::raw('MAX(mast_patient.patient_image) as patient_image'), DB::raw('MAX(mast_patient.admission_id) as admission_id'), DB::raw('MAX(mast_patientinfo.medical_package) as medical_package'), DB::raw('MAX(tran_admission.package_id) as package_id'), DB::raw('MAX(tran_admission.lab_status) as lab_status'), DB::raw('MAX(list_package.packagename) as packagename'), DB::raw('MAX(mast_agency.agencyname) as agencyname'))
            ->whereBetween('sched_patients.date', [date('Y-m-t'), date('Y-m-t')])
            ->leftJoin('mast_patient', 'mast_patient.id', 'sched_patients.patient_id')
            ->leftJoin('mast_patientinfo', 'mast_patientinfo.main_id', 'sched_patients.patient_id')
            ->leftJoin('tran_admission', 'tran_admission.id', 'mast_patient.admission_id')
            ->leftJoin('list_package', 'list_package.id', 'mast_patientinfo.medical_package')
            ->leftJoin('mast_agency', 'mast_agency.id', 'mast_patientinfo.agency_id')
            ->groupBy('sched_patients.patientcode')
            ->get();

        // dd($scheduled_month_patients);
        $data = [];
        foreach ($scheduled_month_patients as $key => $scheduled_month_patient) {
            $patient = [
                'title' => $scheduled_month_patient->firstname . ' ' . $scheduled_month_patient->lastname,
                'start' => $scheduled_month_patient->date,
                'url' => url('') . '/' . 'patient_edit?id=' . $scheduled_month_patient->patient_id . '&patientcode=' . $scheduled_month_patient->patientcode . '',
            ];
            array_push($data, $patient);
        }
        return response()->json($data);
    }

    public function scheduled_patients()
    {
        $data = session()->all();
        return view('scheduled_patients', compact('data'));
    }

    public function logs()
    {
        $data = session()->all();
        return view('Logs.logs', compact('data'));
    }

    public function logs_table(Request $request)
    {
        if ($request->ajax()) {
            $data = EmployeeLog::select('employee_logs.*', 'mast_employee.firstname as firstname', 'mast_employee.lastname as lastname', 'mast_employee.dept_id as dept_id', 'mast_employee.employeecode as employeecode', 'main_dept.dept as dept')
                ->leftJoin('mast_employee', 'mast_employee.id', 'employee_logs.employee_id')
                ->leftJoin('main_dept', 'main_dept.id', 'mast_employee.dept_id');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('employeecode', function ($row) {
                    $employeecode = $row->employeecode;
                    return $employeecode;
                })
                ->addColumn('employeename', function ($row) {
                    $employee = $row->lastname . ', ' . $row->firstname;
                    return $employee;
                })
                ->addColumn('department', function ($row) {
                    $department = $row->dept;
                    return $department;
                })
                ->make(true);
        }
    }

    // -------------------------------------------------------------------- START: EMPLOYEES (CRUD) -------------------------------------------------------------------- //
    public function view_employees(Request $request)
    {
        $data = session()->all();
        return view('Employee.employees', compact('data'));
    }

    public function get_employees(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row) {
                    if($row->ynactive) {
                        return $badge = '<div class="badge badge-success">Active</div>';
                    } else {
                        return $badge = '<div class="badge badge-danger">Inactive</div>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if($row->ynactive) {
                        $actionBtn ='<a href="edit_employees?id=' . $row['id'] . '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" id="' . $row['id'] . '" class="delete-employee btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                        <button class="btn btn-sm btn-danger" data-id="'.$row->id.'" onclick="updateStatus(0, this)"><i class="fa fa-user-times"></i></button>';
                    } else {
                        $actionBtn ='<a href="edit_employees?id=' . $row['id'] . '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" id="' . $row['id'] . '" class="delete-employee btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                        <button class="btn btn-sm btn-success" data-id="'.$row->id.'" onclick="updateStatus(1, this)"><i class="fa fa-user-plus"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status'])
                ->toJson();
        }
    }

    public function delete_employee(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = User::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Employee ' . $data->employeecode;
        $log->date = date('Y-m-d');
        $log->save();
        $res = User::find($id)->delete();
    }

    public function add_employees()
    {
        $data = session()->all();
        $latestEmployee = User::select('*')
            ->latest('employeecode')
            ->first();
        $lastEmployeeCode = substr($latestEmployee->employeecode, 4);
        $latestEmployeeCode = $lastEmployeeCode + 1;
        $employeeCode = 'E' . date('y') . '-0000' . $latestEmployeeCode;
        $departments = Department::all();
        return view('Employee.add-employee', compact('employeeCode', 'departments', 'data'));
    }

    public function store_employees(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:mast_employee',
        ]);

        $name = null;

        if ($request->employee_image) {
            $name = time() . '.' . explode('/', explode(':', substr($request->employee_image, 0, strpos($request->employee_image, ';')))[1])[1];
            Image::make($request->employee_image)->save(public_path('app-assets/images/employees/') . $name);
        }

        $employee = User::create([
            'employeecode' => $request->employeecode,
            'employee_image' => $name,
            'signature' => $request->signature,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'email' => $request->email,
            'username' => $request->middlename,
            'password' => Hash::make($request->password),
            'title' => $request->title,
            'position' => $request->position,
            'dept_id' => $request->dept,
            'license_no' => $request->license_no,
            'license_expdate' => $request->license_expdate,
            'created_date' => date('Y-m-d'),
        ]);

        $employee_info = DB::table('mast_employeeinfo')->insert([
            'main_id' => $employee->id,
            'address' => $request->address,
            'contactno' => $request->contactno,
            'gender' => $request->gender,
            'maritalstatus' => $request->maritalstatus,
            'otherposition' => $request->otherposition,
            'religion' => $request->religion,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
        ]);

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Employee ' . $request->employeecode;
        $log->date = date('Y-m-d');
        $log->save();

        if ($employee && $employee_info) {
            return redirect('/employees')->with('status', 'Employee added successfully.');
        }
    }

    public function edit_employees()
    {
        $data = session()->all();
        $id = $_GET['id'];
        $departments = Department::all();
        $employee = User::select('mast_employee.*', 'main_dept.dept as dept_name', 'mast_employeeinfo.address as address', 'mast_employeeinfo.contactno as contactno', 'mast_employeeinfo.religion as religion', 'mast_employeeinfo.gender as gender', 'mast_employeeinfo.maritalstatus as maritalstatus', 'mast_employeeinfo.birthdate as birthdate', 'mast_employeeinfo.birthplace as birthplace', 'mast_employeeinfo.otherposition as otherposition')
            ->where('mast_employee.id', $id)
            ->leftJoin('main_dept', 'main_dept.id', '=', 'mast_employee.dept_id')
            ->leftJoin('mast_employeeinfo', 'mast_employeeinfo.main_id', 'mast_employee.id')
            ->first();
        return view('Employee.edit-employee', compact('employee', 'departments', 'data'));
    }

    public function update_employees(Request $request)
    {
        // dd($request->all());
        if ($request->old_image === $request->employee_image) {
            $name = $request->old_image;
        } else {
            $name = time() . '.' . explode('/', explode(':', substr($request->employee_image, 0, strpos($request->employee_image, ';')))[1])[1];
            Image::make($request->employee_image)->save(public_path('app-assets/images/employees/') . $name);
            $userOldPhoto = public_path('app-assets/images/employees/') . $request->old_image;
            // remove old image
            @unlink($userOldPhoto);
        }

        $employee = User::where('id', $request->id)->first();
        $employee->employeecode = $request->employeecode;
        $employee->employee_image = $name;
        $employee->signature = $request->signature;
        $employee->lastname = $request->lastname;
        $employee->firstname = $request->firstname;
        $employee->middlename = $request->middlename;
        $employee->email = $request->email;
        $employee->username = $request->username;
        $employee->title = $request->title;
        $employee->position = $request->position;
        $employee->dept_id = $request->dept;
        $employee->license_no = $request->license_no;
        $employee->license_expdate = $request->license_expdate;
        $employee->updated_date = date('Y-m-d');
        $save = $employee->save();

        $employee_info = DB::table('mast_employeeinfo')
            ->where('main_id', $request->id)
            ->update([
                'address' => $request->address,
                'contactno' => $request->contactno,
                'religion' => $request->religion,
                'gender' => $request->gender,
                'otherposition' => $request->otherposition,
                'maritalstatus' => $request->maritalstatus,
                'birthdate' => $request->birthdate,
                'birthplace' => $request->birthplace,
                'gender' => $request->gender,
            ]);

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Employee ' . $request->employeecode;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return response()->json(['status' => 200]);
        }
    }

    public function update_status(Request $request) {
        $id = $request->id;
        $employee = User::where('id', $id)->first();
        $employee->ynactive = $request->status;
        $save = $employee->save();


        if($save) return response()->json(['status' => true, 'message' => 'Update Successfully']);
    }

    // -------------------------------------------------------------------- START: DEPARTMENT (CRUD) -------------------------------------------------------------------- //

    public function view_departments()
    {
        $data = session()->all();
        return view('Department.list-department', compact('data'));
    }

    public function department_tables(Request $request)
    {
        $data = Department::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn =
                    '<a href="/edit_department?id=' .
                    $row['id'] .
                    '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
<a href="#" id="' .
                    $row['id'] .
                    '" class="delete-department btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_department(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = Department::where('id', '=', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Department ' . $data->dept;
        $log->date = date('Y-m-d');
        $save = $log->save();
        $res = Department::find($id)->delete();
    }

    public function add_department()
    {
        $data = session()->all();
        return view('Department.add-department', compact('data'));
    }

    public function store_department(Request $request)
    {
        $department = new Department();
        $department->dept = $request->dept;
        $save = $department->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Department ' . $request->dept;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return redirect('/list_department');
        }
    }

    public function edit_department()
    {
        $data = session()->all();
        $id = $_GET['id'];
        $department = Department::where('id', $id)->first();
        $employees = User::where('dept_id', $id)->get();
        return view('Department.edit-department', compact('department', 'data', 'employees'));
    }
    public function update_department(Request $request)
    {
        $id = $request->id;
        $department = Department::where('id', $id)->first();
        $department->dept = $request->dept;
        $save = $department->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Department ' . $request->dept;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return redirect('/list_department');
        }
    }

    // -------------------------------------------------------------------- END: DEPARTMENT (CRUD) -------------------------------------------------------------------- //

    public function view_cashier_or(Request $request)
    {
        return view('CashierOR.cashier-or');
    }

    public function get_cashier_or(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = CashierOR::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" id="' . $row['id'] . '" class="delete-cashier-or btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'patientname'])
                ->toJson();
        }
    }

    public function add_cashier_or()
    {
        $data = session()->all();
        return view('CashierOR.add-cashier-or', compact('data'));
    }

    public function store_cashier_or(Request $request)
    {
        // dd($request->all());
        $latestRecord = CashierOR::latest('serial_no')->first();
        // create serial no
        $serial = $latestRecord->serial_no + 1;
        $serial_no = str_pad($serial, 5, '0', STR_PAD_LEFT);
        // create or number
        $or = substr($latestRecord->trans_no, 6, 7);
        $num = $or + 1;
        $trans_no = 'OR' . date('y') . '-' . str_pad($num, 6, '0', STR_PAD_LEFT);

        $save = CashierOR::insert([
            'serial_no' => $serial_no,
            'trans_no' => $trans_no,
            'admission_id' => $request->admission_id,
            'agency_id' => $request->agency_id,
            'payor' => $request->payor,
            'payment_user' => $request->payment_user,
            'paying_type' => $request->payment_type,
            'particulars' => $request->particulars,
            'tin_no' => $request->tin_no,
            'amount_due' => $request->amount_due,
            'discount' => $request->discount,
            'amount' => $request->amount,
            'status' => $request->status,
            'trans_date' => $request->trans_date,
        ]);
        return back()->with('status', 'Generate Payment Sucessfully');
    }

    public function update_cashier_or(Request $request)
    {
        $save = CashierOR::where('id', $request->id)->update([
            'admission_id' => $request->admission_id,
            'agency_id' => $request->agency_id,
            'payor' => $request->payor,
            'payment_user' => $request->payment_user,
            'paying_type' => $request->payment_type,
            'particulars' => $request->particulars,
            'tin_no' => $request->tin_no,
            'amount_due' => $request->amount_due,
            'discount' => $request->discount,
            'amount' => $request->amount,
            'status' => $request->status,
            'trans_date' => $request->trans_date,
        ]);
        return back()->with('status', 'Update Payment Sucessfully');
    }

    public function delete_cashier_or(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = CashierOR::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete CashierOR ' . $data->trans_no;
        $log->date = date('Y-m-d');
        $log->save();
        $res = CashierOR::find($id)->delete();
    }

    public function admission_selects()
    {
        $admissions = Admission::select('tran_admission.*', 'mast_patient.lastname as lastname', 'mast_patient.firstname as firstname')
            ->leftJoin('mast_patient', 'mast_patient.patientcode', '=', 'tran_admission.patientcode')
            ->get();

        $admission_list = '';
        $admission_list .= '<input list="patient" name="browser" id="browser" class="form-control admission-input">';
        $admission_list .= '<datalist id="patient">';

        foreach ($admissions as $admission) {
            $admission_list .= '<option value="' . $admission->id . '">' . $admission->lastname . '' . ', ' . ' ' . $admission->firstname . '</option>';
        }

        $admission_list .= '</datalist>';

        echo $admission_list;
    }

    public function support()
    {
        $data = session()->all();
        return view('Support.support', compact('data'));
    }

    public function store_support(Request $request)
    {
        $this->validate($request, [
            'ss_issue' => 'required',
            'ss_issue.*' => 'mimes:pdf,jpg,png,jpeg',
        ]);
        if ($request->hasFile('ss_issue')) {
            $file_name = $request->file('ss_issue')->getClientOriginalName();
            $save_ss = $request->file('ss_issue')->move(public_path() . '/app-assets/images/support/', $file_name);
            if ($save_ss) {
                $save = DB::table('support')->insert([
                    'role' => $request->role,
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'issue' => $request->issue,
                    'ss_issue' => $file_name,
                ]);

                $data = [
                    'role' => $request->role,
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'issue' => $request->issue,
                    'ss_issue' => $file_name,
                ];

                Mail::to(env('DEVELOPER_EMAIL'))->send(new Support($data));

                if ($request->role == 'employee') {
                    return redirect('/dashboard')->with('success_support', 'Successfully Sent');
                } elseif ($request->role == 'patient') {
                    return redirect('/patient_info')->with('success_support', 'Successfully Sent');
                } else {
                    return redirect('/agency_dashboard')->with('success_support', 'Successfully Sent');
                }
            }
        }
    }
}
