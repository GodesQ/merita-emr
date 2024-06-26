<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Referral\StoreRequest;
use App\Services\LoggerService;
use App\Services\ReferralService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use App\Models\Agency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PatientController;
use App\Mail\AgencyPassword;
use App\Mail\ReferralSlip;
use App\Mail\Hold;
use App\Mail\AgencyResetPassword;
use App\Mail\Activate;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\EmployeeLog;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\ListPackage;
use App\Models\Refferal;
use App\Models\AgencyVessel;
use App\Models\AgencyPrincipal;
use PDF;

class ReferralController extends Controller
{
    public function referrals()
    {
        $data = session()->all();
        return view('Referral.referral', compact('data'));
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $referrals = Refferal::query();

            if (session()->get('classification') == 'agency') {
                $referrals = $referrals->where('agency_id', session()->get('agencyId'));
            }

            return DataTables::of($referrals)
                ->addIndexColumn()
                ->addColumn('agencyname', function ($row) {
                    return $row->agency->agencyname ?? null;
                })
                ->addColumn('packagename', function ($row) {
                    return $row->package->packagename ?? null;
                })
                ->addColumn('lastname', function ($row) {
                    return optional($row)->lastname;
                })
                ->addColumn('firstname', function ($row) {
                    return optional($row)->firstname;
                })
                ->addColumn('position_applied', function ($row) {
                    return $row->position_applied;
                })
                ->addColumn('is_hold', function ($row) {
                    if ($row->is_hold) {
                        return '<div class="badge badge-danger">Hold</div>';
                    } else {
                        return '<div class="badge badge-success">Activated</div>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $buttons = [
                        '<a class="btn btn-secondary btn-sm" href="/referral?id=' . $row->id . '">
                            <i class="fa fa-eye"></i>
                        </a>',
                        '<a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' . $row->email_employee . '" target="_blank">
                            <i class="fa fa-print"></i>
                        </a>'
                    ];


                    if (!$row->patient_id) {
                        $buttons[] = '<button class="btn btn-primary btn-sm hold-btn" id="sync-btn" data-id="' . $row->id . '" title="Sync Referral" data-toggle="modal" data-target="#sync-modal">
                                        <img src="' . asset('app-assets/images/icons/data-transfer.png') . '" style="width: 14px; height: 14px;" />
                                    </button>';
                    }

                    if ($row->is_hold == 0) {
                        $buttons[] = '<button class="btn btn-danger btn-sm hold-btn" id="' . $row->id . '" title="Hold Employee"><i class="fa fa-user-times"></i></button>';
                    } else {
                        $buttons[] = '<button class="btn btn-success btn-sm activate-btn" id="' . $row->id . '" title="Activate Employee"><i class="fa fa-user-plus"></i></button>';
                    }

                    return implode(' ', $buttons);
                })
                ->filter(function ($query) use ($request) {
                    $searchValue = $request->search['value'];
                    if ($searchValue) {
                        $query->where('firstname', 'LIKE', "%" . $searchValue . "%")
                            ->orWhere('lastname', 'LIKE', "%" . $searchValue . "%")
                            ->orWhere('employer', 'LIKE', "%" . $searchValue . "%")
                            ->orWhere(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $searchValue . '%')
                            ->orWhere(DB::raw("concat(lastname, ' ', firstname)"), 'LIKE', '%' . $searchValue . '%');
                    }
                })
                ->rawColumns(['packagename', 'action', 'is_hold'])
                ->toJson();
        }

        if (session()->get('classification') == 'agency') {
            return view('Referral.agency.index');
        }

        return view('Referral.admin.index');
    }

    public function create(Request $request)
    {   
        $agencies = Agency::when(session()->get('classification') == 'agency', function($q) {
            $q->where('id', session()->get('agencyId'));
        })->get();

            // $vessels = AgencyVessel::where('main_id', $data['agencyId'])->get();
            // $principals = AgencyPrincipal::where('main_id', $data['agencyId'])->get();

        if(session()->get('classification') == 'agency') {
            return view('Referral.agency.create', compact('agencies'));
        }

        return view('Referral.admin.create', compact('agencies'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $signature = base64_encode($request->signature);

        $referral = Refferal::create(array_merge($data, [
            'signature' => $signature,
            'created_date' => date('Y-m-d'),
            'certificate' => is_array($request->certificate) ? implode(", ", $request->certificate) : null,
            'vessel' => $request->vessel == 'other' ? $request->other_vessel : $request->vessel,
            'principal' => $request->principal == 'other' ? $request->other_principal : $request->principal,
        ]));

        $referral->load('package', 'agency');

        if (session()->get('email') == 'james@godesq.com' || $request->employer == 'James Agency') {
            $to_emails = [$request->email_employee];
        } else {
            $to_emails = [$request->email_employee, env('APP_EMAIL'), 'mdcinc2019@gmail.com', 'meritadiagnosticclinic@yahoo.com', session()->get('email'), env('RECEPTION_EMAIL')];
        }

        if ($referral) {
            $pdf = PDF::loadView('emails.referral-pdf', [
                'data' => $referral->toArray(),
            ])->setOptions([
                        'defaultFont' => 'sans-serif',
                    ]);

            foreach ($to_emails as $to_email) {
                Mail::to($to_email)->send(new ReferralSlip($referral->toArray(), $pdf));
            }

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function show(Request $request, $id)
    {

    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }

    public function generateFromPatient(Request $request)
    {
        try {
            $patient = Patient::where('id', $request->patient_id)->with('patientinfo')->first();

            if (!$patient && !$patient->patientinfo)
                throw new Exception('Patient not found');

            $referral = Refferal::create([
                'agency_id' => $patient->patientinfo->agency_id,
                'package_id' => $patient->patientinfo->medical_package,
                'patient_id' => $patient->id,
                'email_employee' => $patient->email,
                'employer' => $patient->patientinfo->agency->agencyname ?? null,
                'agency_address' => $patient->patientinfo->agency->address ?? null,
                'country_destination' => $patient->patientinfo->country_destination,
                'lastname' => $patient->lastname,
                'firstname' => $patient->firstname,
                'middlename' => $patient->middlename,
                'address' => $patient->patientinfo->address,
                'contactno' => $patient->patientinfo->contactno,
                'birthplace' => $patient->patientinfo->birthplace,
                'birthdate' => $patient->patientinfo->birthdate,
                'age' => $patient->age,
                'civil_status' => $patient->patientinfo->maritalstatus,
                'nationality' => $patient->patientinfo->nationality,
                'gender' => $patient->gender,
                'position_applied' => $patient->position_applied,
                'payment_type' => $patient->patientinfo->payment_type,
                'admission_type' => $patient->patientinfo->admission_type,
                'vessel' => $patient->patientinfo->vessel,
                'principal' => $patient->patientinfo->principal,
                'passport' => $patient->patientinfo->passportno,
                'ssrb' => $patient->patientinfo->srbno,
                'passport_expdate' => $patient->patientinfo->passport_expdate,
                'ssrb_expdate' => $patient->patientinfo->srb_expdate,
                'created_date' => $patient->created_date,
            ]);

            LoggerService::log('generate', Refferal::class, ['changes' => $referral->toArray()]);

            return response([
                'status' => TRUE,
                'message' => 'Referral generated successfully.'
            ]);

        } catch (Exception $e) {
            return response([
                'status' => FALSE,
                'message' => $e->getMessage()
            ], 400);
        }

    }

    public function updateFromPatient(Request $request)
    {
        try {
            $referral = Refferal::where('id', $request->referral_id)->first();
            if(!$referral) throw new Exception("Referral Not Found.");

            $patient = Patient::where('id', $request->user_id)->first();
            if(!$patient) throw new Exception("Patient Not Found.");

            $referral->update([
                'patient_id' => $patient->id,
                'country_destination' => $patient->patientinfo->country_destination,
                'lastname' => $patient->lastname,
                'firstname' => $patient->firstname,
                'middlename' => $patient->middlename,
                'address' => $patient->patientinfo->address,
                'contactno' => $patient->patientinfo->contactno,
                'birthplace' => $patient->patientinfo->birthplace,
                'birthdate' => $patient->patientinfo->birthdate,
                'age' => $patient->age,
                'civil_status' => $patient->patientinfo->maritalstatus,
                'nationality' => $patient->patientinfo->nationality,
                'gender' => $patient->gender,
                'position_applied' => $patient->position_applied,
                'payment_type' => $patient->patientinfo->payment_type,
                'admission_type' => $patient->patientinfo->admission_type,
                'vessel' => $patient->patientinfo->vessel,
                'passport' => $patient->patientinfo->passportno,
                'ssrb' => $patient->patientinfo->srbno,
                'passport_expdate' => $patient->patientinfo->passport_expdate,
                'ssrb_expdate' => $patient->patientinfo->srb_expdate,
            ]);

            $patient->update([
                'referral_id' => $referral->id,
            ]);

            LoggerService::log('sync', Refferal::class, ['changes' => $referral->getChanges()]);

            return response([
                'status' => TRUE,
                'message' => 'Referral synced successfully.'
            ]);
        } catch (Exception $e) {
            return response([
                'status' => FALSE,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function search(Request $request)
    {
        if ($request->query('search-patient')) {
            return ReferralService::searchReferralByPatient($request);
        }
    }

    public function hold_employee(Request $request)
    {
        try {
            $id = $request->id;
            $referral = Refferal::where('id', $id)->first();
            $to_emails = [$referral->email_employee, env('APP_EMAIL')];

            $referral->is_hold = 1;
            $save = $referral->save();

            if ($save) {
                foreach ($to_emails as $to_email) {
                    Mail::to($to_email)->send(new Hold($referral));
                }
                return response()->json([
                    "status" => 200
                ]);
            } else {
                return response()->json([
                    "status" => 500
                ]);
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function activate_employee(Request $request)
    {
        try {
            $id = $request->id;
            $referral = Refferal::where('id', $id)->first();
            $to_emails = [$referral->email_employee, env('APP_EMAIL')];
            $referral->is_hold = 0;
            $save = $referral->save();
            if ($save) {
                foreach ($to_emails as $to_email) {
                    Mail::to($to_email)->send(new Activate($referral));
                }
                return response()->json([
                    "status" => 200
                ]);
            } else {
                return response()->json([
                    "status" => 500
                ]);
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_refferal_slip()
    {
        return redirect('/referral-slips/create');
    }

    public function store_refferal(StoreRequest $request)
    {
        try {

            $existing_referral = Refferal::where('email_employee', $request->email_employee)->latest('id')->first();

            if ($existing_referral) {
                if ($existing_referral->created_date == date('Y-m-d')) {
                    return back()->with('fail', "You can't create new referral on the same date.");
                }
            }

            $data = $request->validated();

            $birthdate = strtotime($request->birthdate);
            $new_birthdate = date('Y-m-d', $birthdate);
            $ssrb_expdate = strtotime($request->ssrb_expdate);
            $new_ssrb_expdate = date('Y-m-d', $ssrb_expdate);
            $passport_expdate = strtotime($request->passport_expdate);
            $new_passport_expdate = date('Y-m-d', $passport_expdate);

            $signature = base64_encode($request->signature);

            $refferal = Refferal::create(array_merge($data, [
                'signature' => $signature,
                'birthdate' => $new_birthdate,
                'passport_expdate' => $new_passport_expdate,
                'ssrb_expdate' => $new_ssrb_expdate,
                'created_date' => Carbon::now(),
                'certificate' => is_array($request->certificate) ? implode(", ", $request->certificate) : null,
                'vessel' => $request->vessel == 'other' ? $request->other_vessel : $request->vessel,
                'principal' => $request->principal == 'other' ? $request->other_principal : $request->principal
            ]));

            if (session()->get('email') == 'james@godesq.com') {
                $to_emails = [$request->email_employee];
            } else {
                $to_emails = [$request->email_employee, env('APP_EMAIL'), 'mdcinc2019@gmail.com', 'meritadiagnosticclinic@yahoo.com', session()->get('email'), env('RECEPTION_EMAIL')];
            }

            $refferal_data = DB::table('refferal')
                ->select(
                    'refferal.*',
                    'list_package.packagename',
                    'mast_agency.agencyname'
                )
                ->where('refferal.id', $refferal->id)
                ->leftJoin('list_package', 'list_package.id', 'refferal.package_id')
                ->leftJoin('mast_agency', 'mast_agency.id', 'refferal.agency_id')
                ->get();

            $data = $refferal_data;


            if ($refferal) {
                $pdf = PDF::loadView('emails.refferal-pdf', [
                    'data' => $data,
                ])->setOptions([
                            'defaultFont' => 'sans-serif',
                        ]);

                foreach ($to_emails as $to_email) {
                    Mail::to($to_email)->send(new ReferralSlip($data, $pdf));
                }

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

    public function edit_referral(Request $request)
    {
        $id = $request->id;

        $data = session()->all();

        $packages = ListPackage::select(
            'list_package.id',
            'list_package.packagename',
            'list_package.agency_id',
            'mast_agency.agencyname as agencyname'
        )->where('list_package.agency_id', $data['agencyId'])
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'list_package.agency_id'
            )
            ->get();

        $referral = Refferal::where('id', $id)->first();
        return view('Referral.edit_referral_slip', compact('data', 'packages', 'referral'));

    }

    public function view_referral()
    {
        try {
            $data = session()->all();
            $id = $_GET['id'];
            $referral = Refferal::where('id', $id)->with('package', 'agency')->first();

            $crew_referrals = Refferal::where('id', $id)->get();
            return view('Referral.view-refferal', compact('referral', 'data', 'crew_referrals'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }


}
