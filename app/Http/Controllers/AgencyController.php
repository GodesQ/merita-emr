<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgencyPrincipal;
use App\Models\AgencyVessel;
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
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\EmployeeLog;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\ListPackage;
use App\Models\Refferal;
use PDF;

class AgencyController extends Controller
{
    public function filter_agency_employee(Request $request)
    {
        if ($request->action == 'filter') {
            session()->put([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        } else {
            session()->put([
                'start_date' => null,
                'end_date' => null,
            ]);
        }
        return back();
    }

    public function view_dashboard()
    {
        try {
            $data = session()->all();
            $category_count = [];

            $agencyId = session()->get('agencyId');
            return view('layouts.agency-dashboard', compact('data'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function view_agency_emp(Request $request)
    {
        try {
            $data = session()->all();
            $id = $request->id;
            $patient = Patient::where('id', $id)->with('patientinfo', 'admission.medical_results')->firstOrFail();

            return view('Agency.agency-emp', compact('patient', 'data'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function select_agencies(Request $request)
    {
        try {
            $id = $request->id;
            $packages = ListPackage::select('list_package.id', 'list_package.packagename', 'list_package.agency_id', 'mast_agency.agencyname as agencyname')
                ->where('list_package.agency_id', $id)
                ->leftJoin('mast_agency', 'mast_agency.id', '=', 'list_package.agency_id')
                ->get();
            $agency = Agency::where('id', $id)->first();

            return response()->json([$packages, $agency]);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function view_agencies(Request $request)
    {
        try {
            $data = session()->all();
            return view('Agency.agencies', compact('data'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function get_agencies(Request $request)
    {
        try {
            $sessions = session()->all();
            if ($request->ajax()) {
                $data = Agency::select('*');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn =
                            '<a href="edit_agency?id=' . $row['id'] .'" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                            <a href="#" id="' . $row['id'] . '" class="delete-agency btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->toJson();
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_agency()
    {
        try {
            return view('Agency.add-agency');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_agency(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:mast_agency',
            ]);

            $latestData = DB::table('mast_agency')
                ->latest('agencycode')
                ->first();

            $lastAgencyCode = substr($latestData->agencycode, 4);
            // new row code
            $addAgencyCode = $lastAgencyCode + 1;
            $agencyCode = 'A' . date('y') . '-0000' . $addAgencyCode;

            $password = '123456789';
            $agency = new Agency();
            $agency->agencycode = $agencyCode;
            $agency->agencyname = $request->agencyname;
            $agency->password = Hash::make($password);
            $agency->address = $request->address;
            $agency->principal = $request->principal;
            $agency->telno = $request->telno;
            $agency->faxno = $request->faxno;
            $agency->email = $request->email;
            $agency->remarks = $request->remarks;
            $agency->contactperson = $request->contact_person;
            $agency->arrangement_type = $request->arrangement_type;
            $agency->commission = $request->commission;
            $agency->created_date = $request->registered_at;
            $save = $agency->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Add Agency ' . $request->agency_code;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                $bodyMessage = '';

                $details = [
                    'title' => 'Verification Email From Merita',
                    'body' => $bodyMessage,
                    'email' => $request->email,
                    'password' => $password,
                ];
                Mail::to($request->email)->send(new AgencyPassword($details));
                return redirect('/agencies')->with('status', 'Agency Added Successfully');
            } else {
                return redirect('/login')->with('fail', 'Something went wrong. Try Again later.');
            }
        } catch (\Exception $exception) {
            $request->validate([
                'commission' => 'numeric|required',
                'email' => 'required|email|unique:mast_agency',
            ]);

            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_agency()
    {
        try {
            $id = $_GET['id'];
            $agency = Agency::where('id', $id)->with('vessels', 'principals')->first();
            return view('Agency.edit-agency', compact('agency'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_agency(Request $request)
    {
        try {
            $agency = Agency::where('id', '=', $request->id)->first();
            $agency->agencyname = $request->agencyname;
            $agency->address = $request->address;
            $agency->principal = $request->principal;
            $agency->telno = $request->telno;
            $agency->faxno = $request->faxno;
            $agency->email = $request->email;
            $agency->remarks = $request->remarks;
            $agency->contactperson = $request->contact_person;
            $agency->arrangement_type = $request->arrangement_type;
            $agency->commission = $request->commission;
            $save = $agency->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Update Agency ' . $agency->agencycode;
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

    public function delete_agency(Request $request)
    {
        try {
            $employeeInfo = session()->all();
            $id = $request->id;
            $data = Agency::where('id', $id)->first();

            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Delete Agency ' . $data->agencycode;
            $log->date = date('Y-m-d');
            $log->save();
            $res = Agency::find($id)->delete();
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function submit_agency_password_form(Request $request)
    {
        try {
            Mail::to($request->email)->send(new AgencyResetPassword($request->email, $request->id));
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function submit_agency_default_password(Request $request) {
        $agency = Agency::where('id', $request->id)->first();
        
        $new_password = Str::random(8);

        $agency->update([
            'password' => Hash::make($new_password),
        ]);

        $details = [
            'email' => $agency->email,
            'password' => $new_password,
        ];

        Mail::to($agency->email)->send(new AgencyPassword($details));

        return response()->json([
            'status' => true,
            'message' => 'The default password successfully sent.'
        ]);
        
    }

    public function get_agency_vessel_datatable(Request $request) {
        if($request->ajax()) {
            $data = AgencyVessel::get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row) {
                        return '<a href="#" id="' .$row->id. '" class="edit-vessel btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                <button id="' . $row->id . '" class="delete-vessel btn btn-danger btn-sm"><i class="feather icon-trash"></i></button>';
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function store_agency_vessel(Request $request) {
        $data = $request->all();
        $agency_vessel = AgencyVessel::create($data);

        if($agency_vessel) {
            return response([
                'status' => TRUE,
                'message' => 'Agency Vessel Created Successfully'
            ], 201);
        }
    }

    public function show_agency_vessel(Request $request) {
        $agency_vessel = AgencyVessel::find($request->id);

        return response([
            'status' => TRUE,
            'agency_vessel' => $agency_vessel
        ]);
    }

    public function update_agency_vessel(Request $request) {
        $data = $request->except('_token', 'id');
        $agency_vessel = AgencyVessel::where('id', $request->id)->update($data);

        if($agency_vessel) {
            return response([
                'status' => TRUE,
                'message' => 'Agency Vessel Updated Successfully'
            ], 200);
        }
    }

    public function destroy_agency_vessel(Request $request) {
        $agency_vessel = AgencyVessel::find($request->id);

        $delete = $agency_vessel->delete();
        if($delete) {
            return response([
                'status' => TRUE,
                'message' => 'Agency Vessel Deleted Successfully'
            ]);
        }
    }

    public function get_agency_principal_datatable (Request $request) {
        if($request->ajax()) {
            $data = AgencyPrincipal::get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row) {
                        return '<a href="#" id="' .$row->id. '" class="edit-principal btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                <button id="' . $row->id . '" class="delete-principal btn btn-danger btn-sm"><i class="feather icon-trash"></i></button>';
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function store_agency_principal(Request $request) {
        $data = $request->all();
        $agency_principal = AgencyPrincipal::create($data);

        if($agency_principal) {
            return response([
                'status' => TRUE,
                'message' => 'Agency Principal Created Successfully'
            ], 201);
        }
    }

    public function show_agency_principal(Request $request) {
        $agency_vessel = AgencyPrincipal::find($request->id);

        return response([
            'status' => TRUE,
            'agency_vessel' => $agency_vessel
        ]);
    }

    public function update_agency_principal(Request $request) {
        $data = $request->except('_token', 'id');
        $agency_principal = AgencyPrincipal::where('id', $request->id)->update($data);

        if($agency_principal) {
            return response([
                'status' => TRUE,
                'message' => 'Agency Principal Updated Successfully'
            ], 200);
        }
    }

    public function destroy_agency_principal(Request $request) {
        $agency_principal = AgencyPrincipal::find($request->id);

        $delete = $agency_principal->delete();
        if($delete) {
            return response([
                'status' => TRUE,
                'message' => 'Agency Principal Deleted Successfully'
            ]);
        }
    }
}
