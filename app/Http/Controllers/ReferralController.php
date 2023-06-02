<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
use PDF;

class ReferralController extends Controller
{
    public function referrals() {
        $data = session()->all();
        return view('Referral.referral', compact('data'));
    }

    public function referral_list(Request $request) {
        abort_if(!$request->ajax(), 404);

        $referrals = Refferal::select('*')->with('patient', 'package', 'agency');

        if(session()->get('classification') == 'agency') {
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
                    if($row->is_hold) {
                        return '<div class="badge badge-danger">Hold</div>';
                    } else {
                        return '<div class="badge badge-success">Activated</div>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if($row->is_hold == 0) {
                        $actionBtn = '<a class="btn btn-secondary btn-sm" href="/referral?id=' . $row->id . '"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-danger btn-sm hold-btn" id="'. $row->id . '" title="Hold Employee" "><i class="fa fa-user-times"></i></button>
                                    <a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' .  $row->email_employee . '" target="_blank"><i class="fa fa-print"></i></a>';
                            return $actionBtn;
                   } else {
                        $actionBtn = '<a class="btn btn-secondary btn-sm" href="/referral?id=' .  $row->id . '"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-success btn-sm activate-btn" id="'. $row->id . ' title="Activate Employee""><i class="fa fa-user-plus "></i></button>
                            <a class="btn btn-secondary btn-sm" href="/referral_pdf?email=' .  $row->email_employee . '" target="_blank"><i class="fa fa-print"></i></a>';
                            return $actionBtn;
                   }
                })
                ->rawColumns(['packagename', 'action', 'is_hold'])
                ->toJson();
    }

    public function hold_employee(Request $request) {
        try {
            $id = $request->id;
            $referral = Refferal::where('id', $id)->first();
            $to_emails = [$referral->email_employee, env('APP_EMAIL')];

            $referral->is_hold = 1;
            $save = $referral->save();

            if($save) {
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

    public function activate_employee(Request $request) {
        try {
            $id = $request->id;
            $referral = Refferal::where('id', $id)->first();
            $to_emails = [$referral->email_employee, env('APP_EMAIL')];
            $referral->is_hold = 0;
            $save = $referral->save();
            if($save) {
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
            $packages = ListPackage::select(
                'list_package.id',
                'list_package.packagename',
                'list_package.agency_id',
                'mast_agency.agencyname as agencyname'
            )->where('list_package.agency_id', $data['agencyId'])
            ->leftJoin('mast_agency','mast_agency.id', '=', 'list_package.agency_id')->get();

            return view('Referral.add-refferal-slip', compact('packages', 'data'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_refferal(Request $request)
    {
        try {
            $request->validate([
                'email_employee' => 'required|email',
            ]);

            $existing_referral = Refferal::where('email_employee', $request->email_employee)->latest('id')->first();

            if($existing_referral) {
                if($existing_referral->created_date == date('Y-m-d')) {
                    return back()->with('fail', "You can't create new referral on the same date.");
                }
            }

            $birthdate = strtotime($request->birthdate);
            $new_birthdate = date('Y-m-d', $birthdate);
            $ssrb_expdate = strtotime($request->ssrb_expdate);
            $new_ssrb_expdate = date('Y-m-d', $ssrb_expdate);
            $passport_expdate = strtotime($request->passport_expdate);
            $new_passport_expdate = date('Y-m-d', $passport_expdate);

            $signature = base64_encode($request->signature);
            $refferal = new Refferal();
            $refferal->agency_id = $request->agency_id;
            $refferal->package_id = $request->package_id;
            $refferal->employer = $request->employer;
            $refferal->agency_address = $request->agency_address;
            $refferal->country_destination = $request->country_destination;
            $refferal->lastname = $request->lastname;
            $refferal->firstname = $request->firstname;
            $refferal->middlename = $request->middlename;
            $refferal->address = $request->address;
            $refferal->contactno = $request->contactno;
            $refferal->birthdate = $new_birthdate;
            $refferal->age = $request->age;
            $refferal->position_applied = $request->position_applied;
            $refferal->vessel = $request->vessel;
            $refferal->passport = $request->passport;
            $refferal->ssrb = $request->ssrb;
            $refferal->passport_expdate = $new_passport_expdate;
            $refferal->ssrb_expdate = $new_ssrb_expdate;
            $refferal->payment_type = $request->payment_type;
            $refferal->admission_type = $request->admission_type;
            $refferal->custom_request = $request->custom_request;
            $refferal->requestor = $request->requestor;
            $refferal->certificate = implode(", ",$request->certificate);
            $refferal->skuld_qty = $request->skuld_qty;
            $refferal->woe_qty = $request->woe_qty;
            $refferal->cayman_qty = $request->cayman_qty;
            $refferal->liberian_qty = $request->liberian_qty;
            $refferal->croatian_qty = $request->croatian_qty;
            $refferal->danish_qty = $request->danish_qty;
            $refferal->diamlemos_qty = $request->diamlemos_qty;
            $refferal->marshall_qty = $request->marshall_qty;
            $refferal->malta_qty = $request->malta_qty;
            $refferal->dominican_qty = $request->dominican_qty;
            $refferal->bahamas_qty = $request->bahamas_qty;
            $refferal->bermuda_qty = $request->bermuda_qty;
            $refferal->mlc_qty = $request->mlc_qty;
            $refferal->mer_qty = $request->mer_qty;
            $refferal->bahia_qty = $request->bahia_qty;
            $refferal->signature = $signature;
            $refferal->email_employee = $request->email_employee;
            $refferal->created_date = date('Y-m-d');
            $save = $refferal->save();

            $to_emails = [$request->email_employee, env('APP_EMAIL'), 'mdcinc2019@gmail.com', 'meritadiagnosticclinic@yahoo.com', session()->get('email'), env('RECEPTION_EMAIL')];

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


            if ($save) {
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

            $request->validate([
                'email_employee' => 'required|email|unique:refferal'
            ]);

            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_referral(Request $request) {
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
