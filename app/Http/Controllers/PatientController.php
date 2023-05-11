<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Patient;
use App\Models\MedicalHistory;
use App\Models\ListPackage;
use App\Models\ListExam;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\EmployeeLog;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Agency;
use App\Models\Admission;
use App\Models\CashierOR;
use App\Models\ReassessmentFindings;
use App\Http\Controllers\AdmissionController;
use App\Models\Audiometry;
use App\Models\Refferal;
use App\Models\PatientInfo;
use App\Models\DeclarationForm;

class PatientController extends Controller
{

    public function progress_info(Request $request)
    {
        try {
            $agencies = Agency::all();

            $patientInfo = PatientInfo::where('main_id', session()->get('patientId'))->first();

            $patient_email = session()->has('email') ? session()->get('email') : null;

            $referral = Refferal::where('email_employee', $patient_email)->first();

            // if the user completed the registration, it will redirect into dashboard.
            if ($patientInfo)  return redirect('/patient_info');

            return view('ProgressInfo.progress-info', compact('agencies', 'referral'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function patient_info(Request $request)
    {
        $patient = Patient::where('id', '=', session()->get('patientId'))
            ->with('patientinfo', 'medical_history', 'declaration_form', 'admission')
            ->latest('created_date')
            ->first();

        // if the user is not fully registered, it will redirect to step by step registration.
        if (!$patient->patientinfo) return redirect('/progress-patient-info')->with('fail', 'Please complete the registration before continuing in the dashboard.');

        $patientRecords = Patient::where('patientcode', session()->get('patientCode'))->get();

        $patient_package = ListPackage::where('id', $patient->patientinfo->medical_package)->first();

        $patientAdmission = Admission::where('id', $patient->admission_id)->first();

        $latest_schedule = DB::table('sched_patients')
            ->where('patientcode', $patient->patientcode)
            ->latest('date')
            ->first();

        return view('ProgressInfo.patient-info', compact('patient', 'patientRecords', 'latest_schedule', 'patientAdmission'));
    }

    public function see_record(Request $request)
    {
        try {
            $created_date = $request->created;
            $patientInfo = Patient::where('created_date', $created_date)->first();
            $request->session()->put('patientId', $patientInfo->id);
            return back();
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function remedical(Request $request)
    {
        try {
            $patientcode = $request->patientcode;
            $agencies = Agency::all();
            $data = session()->all();
            $patient = Patient::where('patientcode', $patientcode)->first();
            $patientInfo = DB::table('mast_patientinfo')
                ->where('main_id', $data['patientId'])
                ->first();
            $medicalHistory = MedicalHistory::where('main_id', '=', $data['patientId'])->first();

            $declarationForm = DB::table('declaration_form')
                ->where('main_id', $data['patientId'])
                ->first();

            $packages = ListPackage::select('list_package.id', 'list_package.packagename', 'list_package.agency_id', 'mast_agency.agencyname as agencyname')
                ->leftJoin('mast_agency', 'mast_agency.id', '=', 'list_package.agency_id')
                ->get();
            return view('ProgressInfo.remedical', compact('patientInfo', 'medicalHistory', 'declarationForm', 'patient', 'data', 'agencies', 'packages'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_remedical(Request $request)
    {
        try {

            $current_patient = Patient::where('patientcode', $request->patientcode)->latest('id')->first();

            $date = date('Y-m-d h:i:s');
            $mast_patient = new Patient();
            $mast_patient->patientcode = $request->patientcode;
            $mast_patient->patient_signature = $request->patient_signature;
            $mast_patient->email = $request->email;
            $mast_patient->password = $current_patient->password;
            $mast_patient->lastname = strtoupper($request->lastName);
            $mast_patient->middlename = strtoupper($request->middleName);
            $mast_patient->firstname = strtoupper($request->firstName);
            $mast_patient->suffix = strtoupper($request->suffix);
            $mast_patient->gender = $request->gender;
            $mast_patient->age = $request->age;
            $mast_patient->position_applied = $request->positionApplied;
            $mast_patient->isVerify = 1;
            $mast_patient->created_date = $date;
            $mast_patient_save = $mast_patient->save();

            $patient_vessel = $request->agencyName == 3 || $request->agencyName == 57 || $request->agencyName == 58 || $request->agencyName == 55 ? $request->bahia_vessel : $request->vessel;

            $save_patient_info = PatientInfo::create([
                'main_id' => $mast_patient->id,
                'patientcode' => $request->patientcode,
                'address' => strtoupper($request->address),
                'contactno' => $request->phoneNumber,
                'occupation' => strtoupper($request->occupation),
                'occupation_other' => $request->occupation == 'OTHER' ? strtoupper($request->occupation_other) : null,
                'category' => $request->category,
                'referral' => strtoupper($request->referral),
                'payment_type' => $request->payment_type,
                'admission_type' => strtoupper($request->admit_type),
                'nationality' => strtoupper($request->nationality),
                'religion' => $request->religion,
                'religion_other' => $request->religion == 'OTHERS' ? strtoupper($request->religion_other) : null,
                'maritalstatus' => strtoupper($request->civilStatus),
                'agency_id' => $request->agency_id,
                'principal' => strtoupper($request->principal),
                'agency_address' => strtoupper($request->address_of_agency),
                'country_destination' => strtoupper($request->countryDestination),
                'medical_package' => $request->medicalPackage,
                'vessel' => strtoupper($patient_vessel),
                'passportno' => strtoupper($request->passportNo),
                'passport_expdate' => $request->passport_expdate,
                'srbno' => strtoupper($request->ssrb),
                'srb_expdate' => $request->srb_expdate,
                'birthdate' => $request->birthdate,
                'birthplace' => $request->birthplace,
            ]);

            // INSERT MEDICAL HISTORY
            $save_medical_history = $this->action_med_history($request->all(), 'store', 'patient', $mast_patient->id);

            // INSERT DATA TO DECLARATION FORM TABLE
             $save_declaration_form = DeclarationForm::create([
                'main_id' => $mast_patient->id,
                'travelled_abroad_recently' => $request->travelled_abroad_recently,
                'area_visited' => $request->area_visited,
                'contact_with_people_being_infected_suspected_diagnose_with_cov' => $request->contact_with_people_being_infected_suspected_or_diagnosed_with_covid,
                'travel_arrival' => $request->travel_arrival_date,
                'travel_return' => $request->travel_return_date,
                'relationship_with_last_people' => $request->relationship_last_contact_people,
                'last_contact_date' => $request->last_contact_date,
                'fever' =>  $request->fever,
                'cough' => $request->cough,
                'shortness_of_breath' => $request->shortness_of_breath,
                'persistent_pain_in_chest' => $request->persistent_pain_in_the_chest
            ]);

            if (!$mast_patient_save && !$save_patient_info && !$save_medical_history && !$save_declaration_form) return back()->with('status', 'Failed to Submit Data');

            $request->session()->put('patientId', $mast_patient->id);

            if ($request->fever == 1 && $request->cough == 1 && $request->shortness_of_breath == 1 && $request->persistent_pain_in_the_chest == 1 && $request->travelled_abroad_recently == 1) {
                return redirect('/patient_info')->with('status', 'Test Message');
            }

            if ($request->admit_type == 'Normal') {
                return redirect('/schedule_appointment');
            } else {
                return redirect('/patient_info')->with('success', 'Register Successfully');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_patient_info()
    {
        try {
            $id = $_GET['id'];
            $data = session()->all();
            $agencies = DB::select('select * from mast_agency');
            $data = session()->all();
            $patient = Patient::where('id', $data['patientId'])->first();
            $patientInfo = DB::table('mast_patientinfo')
                ->select('mast_patientinfo.*', 'mast_agency.agencyname', 'list_package.packagename')
                ->where('mast_patientinfo.main_id', $id)
                ->leftJoin('mast_agency', 'mast_agency.id', 'mast_patientinfo.agency_id')
                ->leftJoin('list_package', 'list_package.id', 'mast_patientinfo.medical_package')
                ->first();

            $medicalHistory = MedicalHistory::where('main_id', '=', $data['patientId'])->first();

            $declarationForm = DB::table('declaration_form')
                ->where('main_id', $data['patientId'])
                ->first();

            $packages = ListPackage::select('list_package.id', 'list_package.packagename', 'list_package.agency_id', 'mast_agency.agencyname as agencyname')
                ->leftJoin('mast_agency', 'mast_agency.id', '=', 'list_package.agency_id')
                ->get();

            return view('ProgressInfo.edit-progress-info', compact('patientInfo', 'medicalHistory', 'declarationForm', 'patient', 'data', 'agencies', 'packages'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function save_progress_info(Request $request)
    {
        try {
            $mast_patient = Patient::where('id', '=', $request->main_id)->first();
            $mast_patient->firstname = strtoupper($request->firstName);
            $mast_patient->lastname = strtoupper($request->lastName);
            $mast_patient->middlename = strtoupper($request->middleName);
            $mast_patient->suffix = strtoupper($request->suffix);
            $mast_patient->gender = $request->gender;
            $mast_patient->age = $request->age;
            $mast_patient->position_applied = strtoupper($request->positionApplied);
            $mast_patient->created_date = date('Y-m-d h:i:s');
            $mast_patient_save = $mast_patient->save();
            $patient_vessel = $request->agencyName == 3 || $request->agencyName == 57 || $request->agencyName == 58 || $request->agencyName == 55 ? $request->bahia_vessel : $request->vessel;

            $save_patient_info = PatientInfo::create([
                'main_id' => $request->main_id,
                'patientcode' => $request->patientcode,
                'address' => strtoupper($request->address),
                'contactno' => $request->phoneNumber,
                'occupation' => strtoupper($request->occupation),
                'occupation_other' => $request->occupation == 'OTHER' ? strtoupper($request->occupation_other) : null,
                'category' => $request->category,
                'referral' => strtoupper($request->referral),
                'payment_type' => $request->payment_type,
                'admission_type' => strtoupper($request->admit_type),
                'nationality' => strtoupper($request->nationality),
                'religion' => $request->religion,
                'religion_other' => $request->religion == 'OTHERS' ? strtoupper($request->religion_other) : null,
                'maritalstatus' => strtoupper($request->civilStatus),
                'agency_id' => $request->agency_id,
                'principal' => strtoupper($request->principal),
                'agency_address' => strtoupper($request->address_of_agency),
                'country_destination' => strtoupper($request->countryDestination),
                'medical_package' => $request->medicalPackage,
                'vessel' => strtoupper($patient_vessel),
                'passportno' => strtoupper($request->passportNo),
                'passport_expdate' => $request->passport_expdate,
                'srbno' => strtoupper($request->ssrb),
                'srb_expdate' => $request->srb_expdate,
                'birthdate' => $request->birthdate,
                'birthplace' => $request->birthplace,
            ]);

            $save_medical_history = $this->action_med_history($request->all(), 'store', 'patient', $request->main_id);

            $save_declaration_form = DB::table('declaration_form')->insert([
                'main_id' => $request->main_id,
                'travelled_abroad_recently' => $request->travelled_abroad_recently,
                'area_visited' => $request->area_visited,
                'contact_with_people_being_infected_suspected_diagnose_with_cov' => $request->contact_with_people_being_infected_suspected_or_diagnosed_with_covid,
                'travel_arrival' => $request->travel_arrival_date,
                'travel_return' => $request->travel_return_date,
                'relationship_with_last_people' => $request->relationship_last_contact_people,
                'last_contact_date' => $request->last_contact_date,
                'fever' => $request->fever,
                'cough' => $request->cough,
                'shortness_of_breath' => $request->shortness_of_breath,
                'persistent_pain_in_chest' => $request->persistent_pain_in_chest,
            ]);

            if (!$mast_patient_save && !$save_patient_info && !$save_medical_history && !$save_declaration_form) {
                return back()->with('status', 'Failed to Submit Data. Please check all of your information and try again.');
            }

            if ($request->fever == 1 && $request->cough == 1 && $request->shortness_of_breath == 1 && $request->persistent_pain_in_the_chest == 1 && $request->travelled_abroad_recently == 1) {
                $request->session()->put([
                    'classification' => 'patient',
                    'patientCode' => $mast_patient->patientcode,
                    'patientId' => $mast_patient->id,
                    'admissionId' => $mast_patient->admission_id,
                    'patient_image' => $mast_patient->patient_image,
                    'created_date' => $mast_patient->created_date,
                    'firstname' => $mast_patient->firstname,
                    'lastname' => $mast_patient->lastname,
                ]);
                return redirect('/patient_info')->with('status', "Oops! Looks like you're not ready to go in clinic. Please Stay atleast 7 days to continue in medical clinic.");
            }

            if ($request->admit_type == 'Normal') {
                $request->session()->put([
                    'classification' => 'patient',
                    'patientCode' => $mast_patient->patientcode,
                    'patientId' => $mast_patient->id,
                    'admissionId' => $mast_patient->admission_id,
                    'patient_image' => $mast_patient->patient_image,
                    'created_date' => $mast_patient->created_date,
                    'firstname' => $mast_patient->firstname,
                    'lastname' => $mast_patient->lastname,
                ]);
                return redirect('/schedule_appointment')->with('success', 'Register Successfully');
            } else {
                return redirect('/patient_info')->with('success', 'Register Successfully');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function schedule_appointment()
    {
        try {
            $data = session()->all();
            $today_date = date('Y-m-d');

            $schedules = DB::table('sched_patients')
                ->where('patientcode', $data['patientCode'])
                ->get();

            $scheduled_patients = DB::table('sched_patients')
                ->where('date', $today_date)
                ->get();

            $latest_schedule = DB::table('sched_patients')
                ->where('patientcode', $data['patientCode'])
                ->latest('date')
                ->first();

            $patient = Patient::where('id', session()->get('patientId'))
                ->with('patientinfo')
                ->first();

            if (!$patient->patientinfo) {
                return redirect('/progress-patient-info')->with('fail', 'Please complete the registration before continuing in the dashboard.');
            }

            return view('ProgressInfo.schedule', compact('data', 'schedules', 'latest_schedule', 'scheduled_patients'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_schedule(Request $request)
    {
        try {
            $action = isset($request->action) ? $request->action : null;
            $data = session()->all();

            $path = 'patient_edit?id=' . $request->patient_id . '&patientcode=' . $request->patientcode;

            if ($action) {
                $schedule = DB::table('sched_patients')->insert(['patient_id' => $request->patient_id, 'patientcode' => $request->patientcode, 'date' => $request->schedule_date]);
                return redirect($path)->with('status', 'Add schedule of patient.');
            }
            $save = DB::insert('insert into sched_patients(patient_id, patientcode, date) values(?, ?, ?)', [$data['patientId'], $data['patientCode'], $request->schedule_date]);
            if ($save) return redirect('/patient_info')->with('success', 'Schedule Appointment Successfully');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_schedule()
    {
        try {
            $data = session()->all();
            $schedules = DB::table('sched_patients')
                ->where('patientcode', $data['patientCode'])
                ->get();
            $latest_schedule = DB::table('sched_patients')
                ->where('patientcode', $data['patientCode'])
                ->latest('date')
                ->first();
            if (!$latest_schedule) {
                return redirect('/patient_info')->with('fail', "Don't have any schedule");
            }
            return view('ProgressInfo.edit-schedule', compact('data', 'schedules', 'latest_schedule'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_schedule(Request $request)
    {
        try {
            $action = $request->action ? $request->action : null;
            $schedule = DB::table('sched_patients')
                ->where('id', $request->id)
                ->update(['date' => $request->schedule_date]);
            $path = 'patient_edit?id=' . $request->patient_id . '&patientcode=' . $request->patientcode;

            // if admin is updating re-schedule
            if ($action) {
                return redirect($path)->with('status', 'Update schedule of patient.');
            }
            // if patient is updating re-schedule
            return redirect('/patient_info')->with('status_schedule', 'Edit Schedule Successfully');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_patient_info(Request $request)
    {
        try {
            $data = session()->all();
            $mast_patient = Patient::where('id', '=', $request->main_id)->first();
            $mast_patient->firstname = strtoupper($request->firstName);
            $mast_patient->lastname = strtoupper($request->lastName);
            $mast_patient->middlename = strtoupper($request->middleName);
            $mast_patient->suffix = strtoupper($request->suffix);
            $mast_patient->gender = $request->gender;
            $mast_patient->age = $request->age;
            $mast_patient->position_applied = strtoupper($request->positionApplied);
            $mast_patient_save = $mast_patient->save();

            // UPDATE MAST PATIENT INFO
            $save_patient_info = PatientInfo::where('main_id', $request->main_id)->update([
                'address' => strtoupper($request->address),
                'contactno' => $request->contactno,
                'occupation' => $request->occupation,
                'principal' => strtoupper($request->principal),
                'referral' => strtoupper($request->referral),
                'category' => $request->category,
                'payment_type' => $request->payment_type,
                'admission_type' => $request->admit_type,
                'nationality' => strtoupper($request->nationality),
                'religion' => strtoupper($request->religion),
                'maritalstatus' => $request->civilStatus,
                'agency_id' => $request->agencyName,
                'agency_address' => $request->address_of_agency,
                'country_destination' => $request->countryDestination,
                'medical_package' => $request->medicalPackage,
                'vessel' => strtoupper($request->vessel),
                'passportno' => $request->passportNo,
                'passport_expdate' => $request->passport_expdate,
                'srbno' => $request->ssrb,
                'srb_expdate' => $request->srb_expdate,
                'birthdate' => $request->birthdate,
                'birthplace' => $request->birthplace,
            ]);

            //UPDATE MEDICAL HISTORY
            $save_medical_history = $this->action_med_history($request->all(), 'update', 'patient', $request->main_id);

            // UPDATE DECLARATION FORM
            $save_declaration_form = DB::update('update declaration_form set travelled_abroad_recently = ?, area_visited = ?, contact_with_people_being_infected_suspected_diagnose_with_cov = ?, travel_arrival = ?, travel_return = ?, relationship_with_last_people = ?, last_contact_date = ?, fever = ?, cough = ?, shortness_of_breath = ?, persistent_pain_in_chest = ? where main_id = ?', [$request->travelled_abroad_recently, $request->area_visited, $request->contact_with_people_being_infected_suspected_or_diagnosed_with_covid, $request->travel_arrival_date, $request->travel_return_date, $request->relationship_last_contact_people, $request->last_contact_date, $request->fever, $request->cough, $request->shortness_of_breath, $request->persistent_pain_in_the_chest, $request->main_id]);

            if ($request->fever == 0 && $request->cough == 0 && $request->shortness_of_breath == 0 && $request->persistent_pain_in_the_chest == 0 && $request->travelled_abroad_recently == 0) {
                return redirect('/edit_schedule')->with('success', 'Patient Information Update Successfully');
            } else {
                return redirect('/patient_info')->with('status', 'Warning: Test Message');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function view_laboratory()
    {
        try {
            $data = session()->all();
            $patientAdmission = Admission::where('id', $data['admissionId'])->first();
            return view('ProgressInfo.laboratory_result', compact('data', 'patientAdmission'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function view_patients(Request $request)
    {
        $data = session()->all();
        try {
            return view('Patient.patients', compact('data'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function get_patients(Request $request)
    {
        try {
            $data = Patient::select('patientcode', DB::raw('MAX(created_date) as created_date'), DB::raw('MAX(id) as id'), DB::raw('MAX(email) as email'), DB::raw('MAX(lastname) as lastname'), DB::raw('MAX(firstname) as firstname'), DB::raw('MAX(gender) as gender'))
                ->whereNotNull('firstname')
                ->where('yndelete', '0')
                ->with('patientinfo', 'admission')
                ->groupBy('patientcode');

            $sessions = session()->all();
            if ($request->ajax()) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('agency', function ($row) {
                        $patientInfo = $row->patientinfo;
                        if ($patientInfo) {
                            if (!$patientInfo->agency_id) {
                                return 'NO AGENCY';
                            } else {
                                $agency = $patientInfo->agency;
                                return $agency ? $agency->agencyname : 'NO AGENCY';
                            }
                        }
                    })
                    ->addColumn('medical_package', function ($row) {
                        $patientInfo = $row->patientinfo;
                        if ($patientInfo) {
                            if (!$patientInfo->medical_package) {
                                return 'NO PACKAGE';
                            } else {
                                $package = $patientInfo->package;
                                return $package ? $package->packagename : 'NO PACKAGE';
                            }
                        }
                    })
                    ->addColumn('action', function ($row) {
                        $patient = Patient::where('id', $row['id'])->first();
                        $actionBtn =
                            '<a href="/patient_edit?id=' .
                            $row['id'] .
                            '&patientcode=' .
                            $row['patientcode'] .
                            '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                <a href="#" id="' .
                            $row['id'] .
                            '" class="delete-patient btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action', 'contactno', 'agency', 'medical_package'])
                    ->toJson();
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_patient()
    {
        try {
            $agencies = Agency::all();
            $data = session()->all();
            return view('Patient.add-patient', compact('agencies', 'data'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_patient(Request $request)
    {
        try {
            $request->validate([
                'patient_image.*' => 'mimes:jpg,png,jpeg',
                'agency' => 'required',
            ]);

            $latest_patientcode = DB::table('mast_patient')
                ->latest('patientcode')
                ->first();

            $lastPatientCode = substr($latest_patientcode->patientcode, 4);
            // dd($lastPatientCode);
            // new patient code
            $addPatientCode = $lastPatientCode + 1;
            if ($addPatientCode > 9999) {
                $patientCode = 'P' . date('y') . '-0' . $addPatientCode;
            } else {
                $patientCode = 'P' . date('y') . '-00' . $addPatientCode;
            }

            if ($request->hasFile('patient_image')) {
                $oldFileName = $request->file('patient_image')->getClientOriginalName();
                $extension = pathinfo($oldFileName, PATHINFO_EXTENSION);
                $newFileName = $patientCode . '.' . $extension;
                $userExistPhoto = public_path('app-assets/images/profiles/') . $newFileName;
                $remove = @unlink($userExistPhoto);
                $save_file = $request->file('patient_image')->move(public_path() . '/app-assets/images/profiles/', $newFileName);
            }

            $patient = new Patient();
            $patient->patientcode = $patientCode;
            $patient->patient_image = $request->hasFile('patient_image') ? $newFileName : null;
            $patient->lastname = $request->lastname;
            $patient->firstname = $request->firstname;
            $patient->middlename = $request->middlename;
            $patient->gender = $request->gender;
            $patient->age = $request->age;
            $patient->email = $request->email;
            $patient->position_applied = $request->position_applied;
            $patient->created_date = date('Y-m-d H:i:s');
            $save = $patient->save();

            $insert_other_patient_info = DB::table('mast_patientinfo')->insert([
                'main_id' => $patient->id,
                'patientcode' => $patientCode,
                'address' => $request->address,
                'contactno' => $request->contactno,
                'occupation' => $request->occupation,
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                'maritalstatus' => $request->maritalstatus,
                'agency_id' => $request->agency,
                'country_destination' => $request->country_destination,
                'passportno' => $request->passportno,
                'passport_expdate' => $request->passport_expdate,
                'srbno' => $request->srbno,
                'srb_expdate' => $request->srb_expdate,
                'medical_package' => $request->medical_package,
                'birthdate' => $request->birthdate,
                'birthplace' => $request->birthplace,
            ]);

            return redirect('/patients')->with('status', 'Patient Added Successfully');
        } catch (\Exception $exception) {
            $request->validate([
                'patient_image.*' => 'mimes:jpg,png,jpeg',
                'agency' => 'required',
            ]);

            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function delete_patient(Request $request)
    {
        try {
            $employeeInfo = session()->all();
            $id = $request->id;
            $patient = Patient::where('id', $id)->first();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Delete Patient ' . $patient->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $res = Patient::where('id', $id)->first();
            $res->yndelete = true;
            $res->save();
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_patient(Request $request)
    {
        try {
            if (isset($_GET['payment_type'])) {
                session()->put('payment_type', $_GET['payment_type']);
            }

            $data = session()->all();
            $employeeInfo = session()->all();
            // dd($employeeInfo);
            $id = $request->id;
            $patientcode = $request->patientcode;

            $patient = Patient::where('id', '=', $id)->with('patientinfo')->first();

            $agencies = Agency::all();
            $patientInfo = DB::table('mast_patientinfo')->where('mast_patientinfo.main_id', $id)->first();

            $medicalHistory = MedicalHistory::where('main_id', '=', $id)->first();

            if (!$medicalHistory) {
                $medicalHistory = null;
            }
            $declarationForm = DB::table('declaration_form')
                ->where('main_id', $id)
                ->first();
            if (!$declarationForm) {
                $declarationForm = null;
            }
            $patientCode = Admission::where('id', '=', $patient->admission_id)
                ->latest('id')
                ->first();

            $patientRecords = Patient::where('patientcode', '=', $patientcode)
                ->latest('id')
                ->get();

            $latestRecord = Patient::where('patientcode', '=', $patientcode)
                ->latest('id')
                ->first();

            $patient_agency = Agency::where('id', '=', $patientInfo->agency_id)->first();

            $patient_package = ListPackage::where('id', $patientInfo->medical_package)->first();

            $list_exams = ListExam::all();

            $yellow_card_records = DB::table('yellow_card')
                ->where('patient_id', $id)
                ->orderBy('count')
                ->get();

            if ($patient_package) {
                $patient_exams = DB::table('list_packagedtl')
                    ->select('list_packagedtl.*', 'list_exam.examname as examname', 'list_exam.category as category', 'list_exam.section_id', 'list_section.sectionname')
                    ->where('main_id', $patient_package->id)
                    ->leftJoin('list_exam', 'list_exam.id', 'list_packagedtl.exam_id')
                    ->leftJoin('list_section', 'list_section.id', 'list_exam.section_id')
                    ->get();
            } else {
                $patient_exams = null;
            }

            $additional_exams = null;

            if ($patientCode) {
                if (!$patient_agency) {
                    $patient_agency = Agency::where('id', '=', $patientCode->agency_id)->first();
                }

                if (!$patient_package) {
                    $patient_package = ListPackage::where('id', '=', $patientInfo->medical_package)->first();
                }

                if ($patient_package) {
                    $patient_exams = DB::table('list_packagedtl')
                        ->select('list_packagedtl.*', 'list_exam.examname as examname', 'list_exam.category as category', 'list_exam.section_id', 'list_section.sectionname')
                        ->where('main_id', $patient_package->id)
                        ->leftJoin('list_exam', 'list_exam.id', 'list_packagedtl.exam_id')
                        ->leftJoin('list_section', 'list_section.id', 'list_exam.section_id')
                        ->get();
                } else {
                    $patient_exams = null;
                }
            }

            $patientRecords = Patient::where('patientcode', '=', $patientcode)->get();

            $packages = ListPackage::select('list_package.id', 'list_package.packagename', 'list_package.agency_id', 'mast_agency.agencyname as agencyname')
                ->leftJoin('mast_agency', 'mast_agency.id', '=', 'list_package.agency_id')
                ->get();

            $patient_status = $patientCode ? $this->patientStatus($patientCode->id, $patient_exams) : $this->patientStatus(null, $patient_exams);

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

            if ($patientCode) {
                $exam_ppd = DB::table('exam_ppd')
                    ->where('admission_id', '=', $patientCode->id)
                    ->latest('id')
                    ->first();
            } else {
                $exam_ppd = null;
            }

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

            $complete_patient = false;
            if ($patient_exams) {
                if (count($completed_exams) == count($patient_exams)) {
                    $complete_patient = true;
                    $patient = Patient::where('id', $id)->first();
                    if (!$patient->medical_done_date) {
                        $medical_done_update = Patient::where('id', $id)->update([
                            'medical_done_date' => date('Y-m-d h:i:s'),
                        ]);
                    }
                }
            }

            $patient_or = null;

            if ($patientCode) {
                $patient_or = CashierOR::where('admission_id', $patientCode->id)->first();
            }

            $latest_schedule = DB::table('sched_patients')
                ->where('patientcode', $patient->patientcode)
                ->latest('date')
                ->first();

            $patient_upload_files = DB::table('mast_patient_files')
                ->where('main_id', $patient->id)
                ->get();

            $doctors = DB::table('mast_employee')
                ->where('position', 'like', '%Medical Director%')
                ->get();

            $admission_exams = DB::table('tran_admissiondtl')
                ->select('tran_admissiondtl.*', 'list_exam.examname', 'list_exam.price')
                ->where('main_id', $patient->admission_id)
                ->leftJoin('list_exam', 'list_exam.id', 'tran_admissiondtl.exam_id')
                ->get();

            $additional_exams = [];

            foreach ($admission_exams as $key => $exam) {
                $exam_data = [
                    'exam_id' => $exam->exam_id,
                    'examname' => $exam->examname,
                    'charge' => $exam->charge,
                    'date' => $exam->updated_date,
                    'price' => $exam->price,
                ];
                array_push($additional_exams, $exam_data);
            }

            if ($patientCode) {
                $followup_records = ReassessmentFindings::where('admission_id', $patientCode->id)->get();
            } else {
                $followup_records = [];
            }

            $exam_groups = $patientCode ? (new AdmissionController())->group_by('date', $additional_exams, $patientCode->trans_date) : (new AdmissionController())->group_by('date', $additional_exams, null);
            return view('Patient.edit-patient', compact('patient', 'patientInfo', 'agencies', 'medicalHistory', 'declarationForm', 'patientCode', 'patient_agency', 'patient_package', 'packages', 'exam_audio', 'exam_crf', 'exam_cardio', 'exam_dental', 'exam_ecg', 'exam_echodoppler', 'exam_echoplain', 'exam_ishihara', 'exam_physical', 'exam_psycho', 'exam_psychobpi', 'exam_stressecho', 'exam_stresstest', 'patient_or', 'exam_ultrasound', 'exam_visacuity', 'exam_xray', 'exam_ppd', 'exam_blood_serology', 'examlab_hiv', 'examlab_drug', 'examlab_feca', 'examlab_hema', 'examlab_hepa', 'examlab_pregnancy', 'examlab_urin', 'examlab_misc', 'employeeInfo', 'patientRecords', 'patient_exams', 'completed_exams', 'on_going_exams', 'data', 'latest_schedule', 'patientRecords', 'latestRecord', 'list_exams', 'additional_exams', 'complete_patient', 'doctors', 'patient_upload_files', 'yellow_card_records', 'exam_groups', 'followup_records'));

        } catch (\Exception $exception) {
            dd($exception);
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function crop_signature(Request $request)
    {
        $data = session()->all();
        $patient = Patient::where('id', $request->patient_id)->firstOrFail();
        return view('Patient.crop-image', compact('data', 'patient'));
    }

    public function save_crop_signature(Request $request)
    {
        $patient = Patient::where('id', $request->id)->first();

        if (!$patient->default_signature) {
            $patient->default_signature = $patient->patient_signature;
        }

        $patient->patient_signature = base64_encode($request->image);
        $save = $patient->save();

        $redirect_url = '/patient_edit?id=' . $patient->id . '&patientcode=' . $patient->patientcode . '';

        if ($save) {
            return response()->json([
                'status' => 201,
                'message' => 'Crop Signature Successfully',
                'redirect_url' => $redirect_url
            ]);
        }
    }

    public function return_default_signature(Request $request)
    {
        $patient = Patient::where('id', $request->id)->first();
        if ($patient->default_signature) {
            $patient->patient_signature = $patient->default_signature;
            $patient->save();
            return response()->json([
                'status' => '201',
                'message' => 'Save Signature Successfully',
            ]);
        }

        return response()->json([
            'status' => '201',
            'message' => 'No Default Signature Found',
        ]);
    }

    public function update_patient_signature(Request $request) {
        if ($request->old_signature == $request->signature) {
            $signature = $request->old_signature;
        } else {
            if (preg_match('/^data:image\/png;base64,/', $request->signature)) {
                $sign = $request->signature;
                $signature = base64_encode($sign);
            } else {
                $sign = 'data:image/png;base64,' . $request->signature;
                $signature = base64_encode($sign);
            }
        }

        $mast_patient = Patient::where('id', $request->id)->first();
        $mast_patient->patient_signature = $signature;
        $save = $mast_patient->save();

        if($save) return response()->json(['status' => true, 'message' => 'Signature updated successfully.'], 200);
    }

    public function update_patient_basic(Request $request)
    {
        try {
            $name = $request->old_image;
            if ($request->patient_image == $request->old_image) {
                $name = $request->old_image;
            } else {
                $userOldPhoto = public_path('app-assets/images/profiles/') . $request->old_image;
                $remove = @unlink($userOldPhoto);
                $name = $request->patientcode . '.' . explode('/', explode(':', substr($request->patient_image, 0, strpos($request->patient_image, ';')))[1])[1];
                Image::make($request->patient_image)->save(public_path('app-assets/images/profiles/') . $name);
            }

            // if ($request->old_signature == $request->signature) {
            //     $signature = $request->old_signature;
            // } else {
            //     $sign = 'data:image/png;base64,' . $request->signature;
            //     $signature = base64_encode($sign);
            // }

            $mast_patient = Patient::where('id', $request->main_id)->first();
            $mast_patient->patient_image = $name;
            $mast_patient->firstname = strtoupper($request->firstName);
            $mast_patient->lastname = strtoupper($request->lastName);
            $mast_patient->suffix = strtoupper($request->suffix);
            $mast_patient->email = $request->email;
            $mast_patient->middlename = strtoupper($request->middleName);
            $mast_patient->gender = $request->gender;
            $mast_patient->age = $request->age;
            $mast_patient->created_date = $request->created_date;
            $mast_patient->updated_date = date('Y-m-d h:i:s');
            $mast_patient_save = $mast_patient->save();

            // UPDATE MAST PATIENT INFO
            $save_patient_info = DB::table('mast_patientinfo')
                ->where('main_id', $request->main_id)
                ->update([
                    'address' => strtoupper($request->homeAddress),
                    'contactno' => $request->phoneNumber,
                    'occupation' => strtoupper($request->occupation),
                    'occupation_other' => $request->occupation == 'OTHER' ? strtoupper($request->occupation_other) : null,
                    'nationality' => strtoupper($request->nationality),
                    'religion' => strtoupper($request->religion),
                    'religion_other' => $request->religion == 'OTHERS' ? strtoupper($request->religion_other) : null,
                    'maritalstatus' => strtoupper($request->civilStatus),
                    'birthdate' => $request->birthdate,
                    'birthplace' => $request->birthplace,
                ]);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Edit General Info of Patient ' . $mast_patient->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($mast_patient_save) {
                return response()->json([
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'status' => 204,
                ]);
            }

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_patient_agency(Request $request)
    {
        try {
            $patient_vessel = $request->agency_id == 3 || $request->agency_id == 57 || $request->agency_id == 58 || $request->agency_id == 55 ? $request->bahia_vessel : $request->vessel;
            $patient_principal = $request->agency_id == 9 ? $request->hartmann_principal : $request->principal;
            $patient = Patient::where('id', $request->main_id)->first();
            Patient::where('id', $request->main_id)->update([
                'position_applied' => $request->positionApplied,
            ]);

            $save_patient_info = DB::table('mast_patientinfo')
                ->where('main_id', $request->main_id)
                ->update([
                    'agency_id' => $request->agency_id,
                    'agency_address' => strtoupper($request->address_of_agency),
                    'category' => $request->category,
                    'payment_type' => $request->payment_type,
                    'admission_type' => strtoupper($request->admit_type),
                    'medical_package' => $request->medicalPackage,
                    'country_destination' => strtoupper($request->countryDestination),
                    'vessel' => strtoupper($patient_vessel),
                    'passportno' => strtoupper($request->passportNo),
                    'passport_expdate' => $request->passport_expdate,
                    'srbno' => strtoupper($request->ssrb),
                    'srb_expdate' => $request->srb_expdate,
                    'principal' => strtoupper($patient_principal),
                    'referral' => strtoupper($request->referral),
                ]);

            if ($patient->admission_id) {
                Admission::where('id', $patient->admission_id)->update([
                    'agency_id' => $request->agency_id,
                    'position' => $request->positionApplied,
                    'package_id' => $request->medicalPackage,
                    'vesselname' => strtoupper($request->vessel),
                ]);
            }

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Edit agency info of patient ' . $patient->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_patient_medical_history(Request $request)
    {
        try {
            // INSERT MEDICAL HISTORY
            $save = $this->action_med_history($request->all(), 'update', 'admin', $request->main_id);

            $employeeInfo = session()->all();
            $patient = Patient::where('id', $request->main_id)->first();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Edit medical history of patient ' . $patient->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return response()->json([
                    'status' => 200,
                ]);
            }

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_patient_declaration_form(Request $request)
    {
        try {
            $save_declaration_form = DB::table('declaration_form')
                ->where('main_id', $request->main_id)
                ->update([
                    'travelled_abroad_recently' => $request->travelled_abroad_recently,
                    'area_visited' => $request->area_visited,
                    'contact_with_people_being_infected_suspected_diagnose_with_cov' => $request->contact_with_people_being_infected_suspected_or_diagnosed_with_covid,
                    'travel_arrival' => $request->travelled_abroad_recently,
                    'travel_return' => $request->travel_arrival_date,
                    'relationship_with_last_people' => $request->relationship_with_last_people,
                    'last_contact_date' => $request->last_contact_date,
                    'fever' => $request->fever,
                    'cough' => $request->cough,
                    'shortness_of_breath' => $request->shortness_of_breath,
                    'persistent_pain_in_chest' => $request->persistent_pain_in_the_chest,
                ]);

            $employeeInfo = session()->all();
            $patient = Patient::where('id', $request->main_id)->first();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Edit declaration form of patient ' . $patient->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            return response()->json([
                'status' => 200
            ]);

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function search(Request $request)
    {
        try {
            $query = $_GET['query'];
            $patients = Patient::select('patientcode', DB::raw('MAX(created_date) as created_date'), DB::raw('MAX(id) as id'), DB::raw('MAX(email) as email'), DB::raw('MAX(lastname) as lastname'), DB::raw('MAX(firstname) as firstname'), DB::raw('MAX(gender) as gender'))
                ->where('firstname', 'LIKE', '%' . $query . '%')
                ->orWhere('lastname', 'LIKE', '%' . $query . '%')
                ->orWhere('patientcode', 'LIKE', '%' . $query . '%')
                ->orWhere(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $query . '%')
                ->orWhere(DB::raw("concat(lastname, ' ', firstname)"), 'LIKE', '%' . $query . '%')
                ->groupBy('patientcode')
                ->latest('id')
                ->get();

            return response()->json([$patients]);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_patient_files(Request $request)
    {
        try {
            $this->validate($request, [
                'upload_files' => 'required',
                'upload_files.*' => 'mimes:pdf,jpg,png,jpeg',
            ]);

            if ($request->hasFile('upload_files')) {
                foreach ($request->file('upload_files') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/app-assets/files/', $name);

                    $save_file = DB::table('mast_patient_files')->insert([
                        'main_id' => $request->patient_id,
                        'file_name' => $name,
                        'created_date' => date('Y-m-d'),
                    ]);
                }

                if ($save_file) {
                    return back()->with('status', 'Upload Successfully');
                }
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function action_med_history($request, $action, $user, $id)
    {
        try {
            $request_user = $user == 'admin' ? $request['main_id'] : $id;
            $medical_history = $action == 'store' ? new MedicalHistory() : MedicalHistory::where('main_id', $request_user)->first();
            $medical_history->main_id = $request_user;
            $medical_history->head_and_neck_injury = $request['head_and_neck_injury'];
            $medical_history->frequent_headache = $request['frequent_head_ache'];
            $medical_history->frequent_dizziness = $request['frequent_dizziness'];
            $medical_history->fainting_spells_fits = $request['fainting_spells'];
            $medical_history->seizures = $request['seizures'];
            $medical_history->other_neurological_disorders = $request['other_neurological_disorders'];
            $medical_history->insomia_or_sleep_disorder = $request['insomia_or_sleep_disorder'];
            $medical_history->depression_other_mental_disorder = $request['depression_or_other_mental_disorder'];
            $medical_history->eye_problems_or_error_refraction = $request['eye_problems_or_error_of_refraction'];
            $medical_history->deafness_or_ear_disorder = $request['deafness_or_ear_disorder'];
            $medical_history->nose_or_throat_disorder = $request['nose_or_throat_disorder'];
            $medical_history->tuberculosis = $request['tuberculosis'];
            $medical_history->signed_off_as_sick = $request['signed_off_as_sick'];
            $medical_history->repatriation_form_ship = $request['repatriation_form_ship'];
            $medical_history->declared_unfit_for_sea_duty = $request['declared_unfit_for_sea_duty'];
            $medical_history->previous_hospitalization = $request['previous_hospitalization'];
            $medical_history->feel_healthy = $request['feel_healthy'];
            $medical_history->other_lung_disorder = $request['other_lung_disorder'];
            $medical_history->high_blood_pressure = $request['high_blood_pressure'];
            $medical_history->heart_disease_or_vascular = $request['heart_disease_or_vascular'];
            $medical_history->chest_pain = $request['chest_pain'];
            $medical_history->rheumatic_fever = $request['rheumatic_fever'];
            $medical_history->diabetes_mellitus = $request['diabetes_mellitus'];
            $medical_history->endocrine_disorders = $request['endocrine_disorders'];
            $medical_history->cancer_or_tumor = $request['cancer_or_tumor'];
            $medical_history->blood_disorder = $request['blood_disorder'];
            $medical_history->stomach_pain_or_gastritis = $request['stomach_pain_or_gastritis'];
            $medical_history->ulcer = $request['ulcer'];
            $medical_history->other_abdominal_disorder = $request['other_abdominal_disorder'];
            $medical_history->medical_certificate_restricted = $request['medical_certificate_restricted'];
            $medical_history->medical_certificate_revoked = $request['medical_certificate_revoked'];
            $medical_history->aware_of_any_medical_problems = $request['aware_of_medical_problems'];
            $medical_history->aware_of_any_disease_or_illness = $request['aware_of_any_disease_or_illness'];
            $medical_history->illness_other = $request['illness_other'];
            $medical_history->operations = $request['operation'];
            $medical_history->gynecological_disorder = $request['gynecological_disorder'];
            $medical_history->last_menstrual_period = $request['last_menstrual_period'];
            $medical_history->pregnancy = $request['pregnancy'];
            $medical_history->kidney_or_bladder_disorder = $request['kidney_or_bladder_disorder'];
            $medical_history->back_injury_or_joint_pain = $request['back_injury_or_joint_pain'];
            $medical_history->arthritis = $request['arthritis'];
            $medical_history->genetic_heredity_or_familial_dis = $request['genetic_or_heredity_or_familial_dis'];
            $medical_history->sexually_transmitted_disease = $request['sexually_transmitted_disease'];
            $medical_history->tropical_disease_or_malaria = $request['tropical_disease'];
            $medical_history->thypoid_fever = $request['thypoid_fever'];
            $medical_history->schistosomiasis = $request['schistosomiasis'];
            $medical_history->asthma = $request['asthma'];
            $medical_history->allergies = $request['allergies'];
            $medical_history->smoking = $request['smoking'];
            $medical_history->smoking_other = $request['smoking_other'];
            $medical_history->taking_medication_for_hypertension = $request['taking_medication_for_hypertension'];
            $medical_history->taking_medication_for_diabetes = $request['taking_medication_for_diabetes'];
            $medical_history->vaccination = $request['vaccination'];
            $save = $medical_history->save();

            return $save;
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            dd($message);
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function patientStatus($admission_id, $patient_exams)
    {
        if ($admission_id) {
            $exam_audio = DB::table('exam_audio')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_crf = DB::table('exam_crf')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_cardio = DB::table('exam_cardio')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_dental = DB::table('exam_dental')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_ecg = DB::table('exam_ecg')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_echodoppler = DB::table('exam_echodoppler')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_echoplain = DB::table('exam_echoplain')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_ishihara = DB::table('exam_ishihara')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_physical = DB::table('exam_physical')
                ->select('exam_physical.*', 'list_tier2.choices as tier2_choice', 'list_tier3.choices as tier3_choice', 'list_tier4.choices as tier4_choice')
                ->where('exam_physical.admission_id', '=', $admission_id)
                ->leftJoin('list_tier2', 'list_tier2.id', 'exam_physical.tier2_id')
                ->leftJoin('list_tier3', 'list_tier3.id', 'exam_physical.tier3_id')
                ->leftJoin('list_tier4', 'list_tier4.id', 'exam_physical.tier4_id')
                ->latest('id')
                ->first();

            $exam_psycho = DB::table('exam_psycho')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_psychobpi = DB::table('exam_psychobpi')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_stressecho = DB::table('exam_stressecho')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_stresstest = DB::table('exam_stresstest')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_ultrasound = DB::table('exam_ultrasound')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_visacuity = DB::table('exam_visacuity')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_xray = DB::table('exam_xray')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $exam_blood_serology = DB::table('examlab_bloodsero')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_hiv = DB::table('examlab_hiv')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_drug = DB::table('examlab_drug')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_feca = DB::table('examlab_feca')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_hema = DB::table('examlab_hema')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_hepa = DB::table('examlab_hepa')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_pregnancy = DB::table('examlab_pregnancy')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_urin = DB::table('examlab_urin')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();

            $examlab_misc = DB::table('examlab_misc')
                ->where('admission_id', '=', $admission_id)
                ->latest('id')
                ->first();
        } else {
            // set all exam value to null if the patient doesn't have a admission id
            $exam_audio = $exam_cardio = $exam_crf = $exam_ecg = $exam_dental = $exam_echodoppler = $exam_echoplain = $exam_ishihara = $exam_physical = $exam_psycho = $exam_psychobpi = $exam_stressecho = $exam_stresstest = $exam_ultrasound = $exam_visacuity = $exam_xray = $exam_blood_serology = $examlab_hiv = $examlab_drug = $examlab_feca = $examlab_hema = $examlab_pregnancy = $examlab_hepa = $examlab_urin = $examlab_misc = null;
        }

        $exams = [];

        if ($patient_exams) {
            foreach ($patient_exams as $key => $exam) {
                $exams[$exam->examname] = 'completed';
                if (preg_match('/audiometry/i', $exam->examname)) {
                    if (!$exam_audio) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/cardiac/i', $exam->examname) || preg_match('/Spirometry/i', $exam->examname)) {
                    if (!$exam_crf) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/cardio/i', $exam->examname)) {
                    if (!$exam_cardio) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/dental/i', $exam->examname)) {
                    if (!$exam_dental) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/ecg/i', $exam->examname)) {
                    if (!$exam_ecg) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/doppler/i', $exam->examname)) {
                    if (!$exam_echodoppler) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/plain/i', $exam->examname)) {
                    if (!$exam_echoplain) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/ishihara/i', $exam->examname)) {
                    if (!$exam_ishihara) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/Complete PE and Medical History/i', $exam->examname) || preg_match('/STOOL/i', $exam->examname)) {
                    if (!$exam_physical) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/pyschological/i', $exam->examname) || preg_match('/Psychometric/i', $exam->examname)) {
                    if (!$exam_psycho) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/STRESS ECHO/i', $exam->examname)) {
                    if (!$exam_stressecho) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Treadmill/i', $exam->examname)) {
                    if (!$exam_stresstest) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Acuity/i', $exam->examname)) {
                    if (!$exam_visacuity) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Ultrasound/i', $exam->category)) {
                    if (!$exam_ultrasound) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Xray/i', $exam->category)) {
                    if (!$exam_xray) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/Serology/i', $exam->category) || preg_match('/Chemistry/i', $exam->category) || preg_match('/Enzymes/i', $exam->category) || preg_match('/SGPT/i', $exam->examname) || preg_match('/BLOOD/i', $exam->examname) || preg_match('/Anti HBe/i', $exam->examname) || preg_match('/Anti HAV/i', $exam->examname) || preg_match('/Anti HBc/i', $exam->examname) || preg_match('/Anti HCV/i', $exam->examname) || preg_match('/Anti HCV/i', $exam->examname) || preg_match('/HepaB/i', $exam->examname) || preg_match('/TPHA/i', $exam->examname) || preg_match('/Electrolytes/i', $exam->category) || preg_match('/Sodium/i', $exam->examname) || preg_match('/Potassium/i', $exam->examname) || preg_match('/Calcium/i', $exam->examname) || preg_match('/Albumin/i', $exam->examname) || preg_match('/Creatinine/i', $exam->examname) || preg_match('/Uric Acid/i', $exam->examname) || preg_match('/Anti HBs/i', $exam->examname)) {
                    if (!$exam_blood_serology) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/HIV/i', $exam->examname)) {
                    if (!$examlab_hiv) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/drug/i', $exam->examname) || preg_match('/Drug/i', $exam->category)) {
                    if (!$examlab_drug) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Fecalysis/i', $exam->examname)) {
                    if (!$examlab_feca) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Hematology/i', $exam->category) || preg_match('/CBC/i', $exam->examname)) {
                    if (!$examlab_hema) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Hepatitis Profile/i', $exam->examname)) {
                    if (!$examlab_hepa) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Pregnancy/i', $exam->examname)) {
                    if (!$examlab_pregnancy) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Urinalysis/i', $exam->examname)) {
                    if (!$examlab_urin) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Miscellaneous/i', $exam->examname)) {
                    if (!$examlab_misc) {
                        $exams[$exam->examname] = '';
                    }
                }
            }
        } else {
            $exams = null;
        }

        // set all data to access in different uses
        $data = [
            'exam_audio' => $exam_audio,
            'exam_dental' => $exam_dental,
            'exam_echodoppler' => $exam_echodoppler,
            'exam_echoplain' => $exam_echoplain,
            'exam_ecg' => $exam_ecg,
            'exam_stressecho' => $exam_stressecho,
            'exam_stresstest' => $exam_stresstest,
            'exam_ishihara' => $exam_ishihara,
            'exam_visacuity' => $exam_visacuity,
            'exam_psycho' => $exam_psycho,
            'exam_psychobpi' => $exam_psychobpi,
            'exam_ultrasound' => $exam_ultrasound,
            'exam_xray' => $exam_xray,
            'exam_cardio' => $exam_cardio,
            'exam_crf' => $exam_crf,
            'exam_physical' => $exam_physical,
            'exam_blood_serology' => $exam_blood_serology,
            'examlab_hiv' => $examlab_hiv,
            'examlab_drug' => $examlab_drug,
            'examlab_feca' => $examlab_feca,
            'examlab_hema' => $examlab_hema,
            'examlab_hepa' => $examlab_hepa,
            'examlab_pregnancy' => $examlab_pregnancy,
            'examlab_urin' => $examlab_urin,
            'examlab_misc' => $examlab_misc,
            'exams' => $exams,
        ];

        return $data;
    }
}
