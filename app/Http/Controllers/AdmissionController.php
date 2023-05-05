<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Admission;
use App\Models\Patient;
use App\Models\ListExam;
use App\Models\Agency;
use App\Models\PhysicalExam;
use App\Models\User;
use App\Models\ReassessmentFindings;
use App\Mail\ResetLabStatus;
use App\Mail\FitToWork;
use App\Mail\UnfitToWork;
use App\Mail\UnfitTempToWork;
use App\Mail\ReAssessment;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class AdmissionController extends Controller
{
    //
    public function select_admission(Request $request)
    {
        if ($request->ajax()) {
            $data = Admission::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $patient = Patient::where('patientcode', '=', $row['patientcode'])->first();
                    $patient_name = null;
                    if ($patient) {
                        $patient_name = $patient->lastname . ', ' . $patient->firstname;
                    }
                    return $patient_name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id=' . $row['id'] . ' class="btn btn-secondary btn-sm select-admission" title="Routing Slip"><i class="fa fa-hand-o-left"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'patientname'])
                ->toJson();
        }

        return view('Admission.select_admission');
    }
    public function view_admissions(Request $request)
    {
        $data = session()->all();
        return view('Admission.admissions', compact('data'));
    }

    public function get_admission(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Admission::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $patient = Patient::where('patientcode', '=', $row['patientcode'])->first();
                    $patient_name = null;
                    if ($patient) {
                        $patient_name = $patient->lastname . ', ' . $patient->firstname;
                    }
                    return $patient_name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<button id=' .
                        $row['id'] .
                        ' class="btn btn-secondary btn-sm route-print" title="Routing Slip"><i class="fa fa-print"></i></button>
                        <a href="#" id="' .
                        $row['id'] .
                        '" class="delete-admission btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'patientname'])
                ->toJson();
        }
    }

    public function create_admission()
    {
        $data = session()->all();
        $id = $_GET['id'];
        $patient = Patient::where('id', '=', $id)->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $id)
            ->first();

        $latestAdmission = DB::table('tran_admission')
            ->latest('id', 'desc')
            ->first();

        $exams = ListExam::all();

        return view('Admission.add-admission', compact('patient', 'patientInfo', 'latestAdmission', 'exams', 'data'));
    }

    public function store_admission(Request $request)
    {
        // dd($request->all());
        $admission = new Admission();
        $admission->patientcode = $request->patientcode;
        $admission->trans_date = date('Y-m-d h:i:s');
        $admission->package_id = $request->package_id;
        $admission->agency_id = $request->agency_id;
        $admission->principal = $request->principal;
        $admission->referral = $request->referral;
        $admission->vesselname = $request->vessel;
        $admission->country_destination = $request->country_destination;
        $admission->employment = $request->employment;
        $admission->emp_status = $request->emp_status;
        $admission->admit_type = $request->admit_type;
        $admission->category = $request->category;
        $admission->other_specify = $request->other_specify;
        $admission->position = $request->position;
        $admission->payment_type = $request->payment_type;
        $admission->last_medical = $request->last_medical;
        $admission->have_panama = $request->have_panama;
        $admission->have_liberian = $request->have_liberian;
        $admission->panama_certno = $request->panama_certno;
        $admission->liberian_certno = $request->liberian_certno;
        $admission->created_date = date('Y-m-d h:i:s');
        $save_admission = $admission->save();

        $patient = Patient::where('id', $request->patient_id)->first();
        $patient->admission_id = $admission->id;
        $patient->save();

        if (isset($request->exam)) {
            if (isset($request->charge)) {
                foreach ($request->exam as $key => $exam) {
                    $save_exams = DB::table('tran_admissiondtl')->insert([
                        'main_id' => $admission->id,
                        'exam_id' => $exam,
                        'charge' => isset($request->charge[$key]) ? $request->charge[$key] : 'applicant_paid',
                        'updated_date' => date('Y-m-d'),
                    ]);
                }
            } else {
                foreach ($request->exam as $key => $exam) {
                    $save_exams = DB::table('tran_admissiondtl')->insert([
                        'main_id' => $admission->id,
                        'exam_id' => $exam,
                        'charge' => 'applicant_paid',
                        'updated_date' => date('Y-m-d'),
                    ]);
                }
            }
        }

        $tran_exams = $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Admission ' . $request->patientcode;
        $log->date = date('Y-m-d');
        $log->save();

        $path = 'patient_edit?id=' . $request->patient_id . '&patientcode=' . $request->patientcode;

        if ($save_admission) {
            return redirect($path)->with('status', 'New Patient Added Successfully');
        }
    }

    public function edit_admission()
    {
        $data = session()->all();
        $id = $_GET['id'];
        $patient = $patient = Patient::where('id', '=', $id)->first();

        $patientInfo = DB::table('mast_patientinfo')
            ->where('main_id', $id)
            ->first();

        $latestAdmission = DB::table('tran_admission')
            ->latest('id', 'desc')
            ->first();

        $exams = ListExam::all();

        $admission = Admission::where('id', $patient->admission_id)->first();
        $admission_exams = DB::table('tran_admissiondtl')
            ->select('tran_admissiondtl.*', 'list_exam.examname')
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
            ];

            array_push($additional_exams, $exam_data);
        }

        $exam_groups = $this->group_by('date', $additional_exams, $admission->trans_date);

        return view('Admission.edit-admission', compact('patient', 'patientInfo', 'admission', 'additional_exams', 'exams', 'data', 'exam_groups'));
    }

    public function group_by($key, $data, $date)
    {
        $result = [];

        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key] ? $val[$key] : $date][] = $val;
            } else {
                $result[$date][] = $date;
            }
        }
        return $result;
    }

    public function update_admission(Request $request)
    {
        $admission = Admission::where('id', $request->main_id)->first();
        $admission->trans_date = $request->trans_date;
        $admission->agency_id = $request->agency_id;
        $admission->package_id = $request->package_id;
        $admission->employment = $request->employment;
        $admission->emp_status = $request->emp_status;
        $admission->admit_type = $request->admit_type;
        $admission->category = $request->category;
        $admission->referral = $request->referral;
        $admission->other_specify = $request->other_specify;
        $admission->principal = $request->principal;
        $admission->position = $request->position;
        $admission->payment_type = $request->payment_type;
        $admission->last_medical = $request->last_medical;
        $admission->have_panama = $request->have_panama;
        $admission->have_liberian = $request->have_liberian;
        $admission->panama_certno = $request->panama_certno;
        $admission->liberian_certno = $request->liberian_certno;
        $save = $admission->save();

        if (isset($request->exam)) {
            if (isset($request->charge)) {
                foreach ($request->exam as $key => $exam) {
                    $save_exams = DB::table('tran_admissiondtl')->insert([
                        'main_id' => $admission->id,
                        'exam_id' => $exam,
                        'charge' => isset($request->charge[$key]) ? $request->charge[$key] : 'applicant_paid',
                        'updated_date' => date('Y-m-d'),
                    ]);
                }
            } else {
                foreach ($request->exam as $key => $exam) {
                    $save_exams = DB::table('tran_admissiondtl')->insert([
                        'main_id' => $admission->id,
                        'exam_id' => $exam,
                        'charge' => 'applicant_paid',
                        'updated_date' => date('Y-m-d'),
                    ]);
                }
            }
        }

        $tran_exams = $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Admission ' . $request->patientcode;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return back()->with('status', 'Admission Edit Successfully');
        }
    }

    public function delete_admission(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = Admission::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Admission of Patient ' . $data->patientcode;
        $log->date = date('Y-m-d');
        $log->save();
        $res = Admission::find($id)->delete();
    }

    public function reset_lab_result(Request $request) {
        $admission = Admission::where('id', $request->id)->first();
    }

    public function update_lab_result(Request $request)
    {
        $admission = Admission::where('id', $request->id)->first();
        $admission->lab_status = $request->lab_status != 0 ? $request->lab_status : null;
        $admission->remarks = isset($request->remarks) ? $request->remarks : null;
        $admission->doctor_prescription = isset($request->doctor_prescription) ? $request->doctor_prescription : null;
        $admission->prescription = isset($request->prescription) ? $request->prescription : null;
        $admission->prescription_date = $request->lab_status == 1 ? date('Y-m-d') : null;
        $admission->cause_of_unfit = isset($request->cause_of_unfit) ? $request->cause_of_unfit : null;
        $save = $admission->save();

        if (isset($request->schedule)) {
            $schedule = DB::table('sched_patients')
                ->where('id', $request->schedule_id)
                ->update(['date' => $request->schedule]);
        }

        $patient = Patient::select('mast_patient.*', 'mast_patientinfo.address', 'mast_agency.agencyname')
            ->where('mast_patient.admission_id', $admission->id)
            ->leftJoin('mast_patientinfo', 'mast_patientinfo.main_id', 'mast_patient.id')
            ->leftJoin('mast_agency', 'mast_agency.id', 'mast_patientinfo.agency_id')
            ->first();

        $agency = Agency::where('id', $admission->agency_id)->first();

        $recipients = [$agency->email, $patient->email, 'noreply@meritaclinic.ph', 'processing@meritaclinic.ph'];

        $doctor = User::where('id', $request->doctor_prescription)->first();


        if($request->lab_status == 0) {
            PhysicalExam::where('admission_id', $request->id)->update(['fit' => null]);
            foreach ($recipients as $key => $recipient) {
                Mail::to($recipient)->send(new ResetLabStatus($patient, $agency, $admission));
            }
        }

        if ($request->lab_status == 2) {
            PhysicalExam::where('admission_id', $request->id)->update(['fit' => 'Fit']);

            if ($request->prescription != null || $request->prescription != '') {
                $pdf = PDF::loadView('emails.prescription-pdf', [
                    'data' => $admission,
                    'patient' => $patient,
                    'doctor' => $doctor,
                ])->setOptions(['defaultFont' => 'serif']);
            } else {
                $pdf = null;
            }

            Patient::where('admission_id', $admission->id)->update([
                'fit_to_work_date' => date('Y-m-d'),
            ]);
            // ReassessmentFindings::where('admission_id', $admission->id)->delete();
            foreach ($recipients as $key => $recipient) {
                Mail::to($recipient)->send(new FitToWork($patient, $agency, $admission, $pdf));
            }
        }

        if ($request->lab_status == 3) {
            PhysicalExam::where('admission_id', $request->id)->update([
                'fit' => 'Unfit',
            ]);

            Patient::where('admission_id', $admission->id)->update([
                'unfit_to_work_date' => $request->unfit_date,
            ]);

            // ReassessmentFindings::where('admission_id', $admission->id)->delete();
            foreach ($recipients as $key => $recipient) {
                Mail::to($recipient)->send(new UnfitToWork($patient, $agency, $admission));
            }
        }

        if ($request->lab_status == 4) {
            PhysicalExam::where('admission_id', $request->id)->update([
                'fit' => 'Unfit_temp',
            ]);

            if ($request->prescription != null || $request->prescription != '') {
                $pdf = PDF::loadView('emails.prescription-pdf', [
                    'data' => $admission,
                    'patient' => $patient,
                    'doctor' => $doctor,
                ])->setOptions([
                    'defaultFont' => 'serif',
                ]);
            } else {
                $pdf = null;
            }

            // ReassessmentFindings::where('admission_id', $admission->id)->delete();
            foreach ($recipients as $key => $recipient) {
                Mail::to($recipient)->send(new UnfitTempToWork($patient, $agency, $admission, $pdf));
            }
        }

        if ($request->lab_status == 1) {
            PhysicalExam::where('admission_id', $request->id)->update([
                'fit' => 'Pending',
            ]);

            if ($request->prescription != null || $request->prescription != '') {
                $pdf = PDF::loadView('emails.prescription-pdf', ['data' => $admission, 'patient' => $patient, 'doctor' => $doctor])->setOptions([
                    'defaultFont' => 'serif',
                ]);
            } else {
                $pdf = null;
            }

            foreach ($recipients as $key => $recipient) {
                Mail::to($recipient)->send(new ReAssessment($admission, $patient, $request->schedule, $pdf));
            }
        }

        return response()->json([
            'status' => 200,
        ]);
    }

    public function create_followup(Request $request)
    {
        if (!$request->findings) {
            return back()->with('fail', 'No Significant Findings Found. Failed to Submit');
        }
        $findings = implode(';', $request->findings);
        $recommendations = $request->recommendation ? implode(';', $request->recommendation) : null;

        ReassessmentFindings::insert([
            'admission_id' => $request->admission_id,
            'patient_id' => $request->patient_id,
            'findings' => $findings,
            'remarks' => $recommendations,
            'date' => $request->date,
        ]);

        return back()->with('status', 'Follow Up Created Successfully');
    }

    public function destroy_followup(Request $request)
    {
        $record = ReassessmentFindings::where('id', $request->id)->first();
        $delete = $record->delete();
        if ($delete) {
            return response()->json([
                'status' => 201,
                'message' => 'Follow Up Record Deleted Successfully',
            ]);
        }
    }
}
