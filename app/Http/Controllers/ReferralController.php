<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Referral\StoreRequest;
use Carbon\Carbon;
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

            if(session()->get('classification') == 'agency') {
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
                ->addColumn('vessel', function ($row) {
                    return $row->vessel;
                })
                ->addColumn('ssrb', function ($row) {
                    return $row->ssrb;
                })
                ->addColumn('is_hold', function ($row) {
                    if ($row->is_hold) {
                        return '<div class="badge badge-danger">Hold</div>';
                    } else {
                        return '<div class="badge badge-success">Activated</div>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if ($row->is_hold == 0) {
                        $actionBtn = '<a class="btn btn-secondary btn-sm" href="/referral?id=' . $row->id . '"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-danger btn-sm hold-btn" id="' . $row->id . '" title="Hold Employee" "><i class="fa fa-user-times"></i></button>
                                    <a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' . $row->email_employee . '" target="_blank"><i class="fa fa-print"></i></a>';
                        return $actionBtn;
                    } else {
                        $actionBtn = '<a class="btn btn-secondary btn-sm" href="/referral?id=' . $row->id . '"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-success btn-sm activate-btn" id="' . $row->id . ' title="Activate Employee""><i class="fa fa-user-plus "></i></button>
                            <a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' . $row->email_employee . '" target="_blank"><i class="fa fa-print"></i></a>';
                        return $actionBtn;
                    }
                })
                ->rawColumns(['packagename', 'action', 'is_hold'])
                ->toJson();
        }

        if(session()->get('classification') == 'agency') {
            return view('Referral.agency-index');
        }

        return view('Referral.index');
    }

    public function create(Request $request)
    {
        $agencies = Agency::get();
        return view('Referral.create', compact('agencies'));
    }

    public function store(StoreRequest $request)
    {
        $existing_referral = Refferal::where('email_employee', $request->email_employee)->latest('id')->first();

        if ($existing_referral) {
            if ($existing_referral->created_date == date('Y-m-d')) {
                return back()->with('fail', "You can't create new referral on the same date.");
            }
        }

        $data = $request->validated();
        $signature = base64_encode($request->signature);

        $referral = Refferal::create(array_merge($data, [
            'signature' => $signature,
            'created_date' => date('Y-m-d'),
            'certificate' => implode(", ", $request->certificate),
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

    public function referral_list(Request $request)
    {
        abort_if(!$request->ajax(), 404);

        $referrals = Refferal::select('*')->with('patient', 'package', 'agency');

        if (session()->get('classification') == 'agency') {
            $referrals->where('agency_id', session()->get('agencyId'));
        }

        return DataTables::of($referrals)
            ->addIndexColumn()
            ->addColumn('packagename', function ($row) {
                return $row->package->packagename;
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
            ->addColumn('vessel', function ($row) {
                return $row->vessel;
            })
            ->addColumn('ssrb', function ($row) {
                return $row->ssrb;
            })
            ->addColumn('is_hold', function ($row) {
                if ($row->is_hold) {
                    return '<div class="badge badge-danger">Hold</div>';
                } else {
                    return '<div class="badge badge-success">Activated</div>';
                }
            })
            ->addColumn('action', function ($row) {
                if ($row->is_hold == 0) {
                    $actionBtn = '<a class="btn btn-secondary btn-sm" href="/referral?id=' . $row->id . '"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-danger btn-sm hold-btn" id="' . $row->id . '" title="Hold Employee" "><i class="fa fa-user-times"></i></button>
                                    <a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' . $row->email_employee . '" target="_blank"><i class="fa fa-print"></i></a>';
                    return $actionBtn;
                } else {
                    $actionBtn = '<a class="btn btn-secondary btn-sm" href="/referral?id=' . $row->id . '"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-success btn-sm activate-btn" id="' . $row->id . ' title="Activate Employee""><i class="fa fa-user-plus "></i></button>
                            <a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' . $row->email_employee . '" target="_blank"><i class="fa fa-print"></i></a>';
                    return $actionBtn;
                }
            })
            ->rawColumns(['packagename', 'action', 'is_hold'])
            ->toJson();
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
        try {
            $data = session()->all();
            $packages = ListPackage::select('list_package.id', 'list_package.packagename', 'list_package.agency_id', 'mast_agency.agencyname as agencyname')
                ->where('list_package.agency_id', $data['agencyId'])
                ->leftJoin('mast_agency', 'mast_agency.id', '=', 'list_package.agency_id')->get();

            $vessels = AgencyVessel::where('main_id', $data['agencyId'])->get();
            $principals = AgencyPrincipal::where('main_id', $data['agencyId'])->get();

            return view('Referral.add-refferal-slip', compact('packages', 'data', 'vessels', 'principals'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
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
