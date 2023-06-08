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

            $patients_deck_count = Patient::with('patientinfo', 'admission')->whereHas('admission', function($q) use ($agencyId) {
                return $q->where('agency_id', $agencyId)->where('category', 'DECK SERVICES');
            })->count();

            $patients_engine_count = Patient::with('patientinfo', 'admission')->whereHas('admission', function($q) use ($agencyId) {
                return $q->where('agency_id', $agencyId)->where('category', 'ENGINE SERVICES');
            })->count();

            $patients_catering_count = Patient::with('patientinfo', 'admission')->whereHas('admission', function($q) use ($agencyId) {
                return $q->where('agency_id', $agencyId)->where('category', 'CATERING SERVICES');
            })->count();

            $patients_other_count = Patient::with('patientinfo', 'admission')->whereHas('admission', function($q) use ($agencyId) {
                return $q->where('agency_id', $agencyId)->where('category', 'OTHER SERVICES');
            })->count();

            // $deck_counts = Admission::where('agency_id', $data['agencyId'])->where('category', 'DECK SERVICES')->count();

            // $engine_counts = Admission::where('agency_id', $data['agencyId'])->where('category', 'ENGINE SERVICES')->count();

            // $catering_counts = Admission::where('agency_id', $data['agencyId'])->where('category', 'CATERING SERVICES')->count();

            // $other_counts = Admission::where('agency_id', $data['agencyId'])->where('category', 'OTHER SERVICES')->count();

            $category_count = [
                'deck' => $patients_deck_count,
                'engine' => $patients_engine_count,
                'catering' => $patients_catering_count,
                'other' => $patients_other_count,
            ];

            return view('layouts.agency-dashboard', compact('data', 'category_count'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function agency_patient_table(Request $request)
    {
        try {
            $data = session()->all();
            if ($request->ajax()) {
                $session = session()->all();

                $agencyId = session()->get('agencyId');

                $patients = Patient::select('*')->whereHas('patientinfo', function ($q) use ($agencyId) {
                    $agency_ids = [59, 58, 57, 55];

                    $vessels = [];

                    if ($agencyId == 58) {
                        $vessels = ['BLUE TERN', 'BLUETERN', 'BOLDTERN', 'BOLD TERN', 'BRAVETERN', 'BRAVE TERN'];
                    } elseif ($agencyId == 55) {
                        $vessels = ['MS BOLETTE', 'BOLETTE', 'MS BRAEMAR', 'BRAEMAR'];
                    } elseif ($agencyId == 57) {
                        $vessels = ['BALMORAL', 'BOREALIS', 'MS BALMORAL', 'MS BOREALIS'];
                    }

                    if (in_array($agencyId, $agency_ids)) {
                        $q->whereIn(DB::raw('upper(vessel)'), array_map('strtoupper', $vessels))->orWhere('agency_id', $agencyId);
                    } else {
                        $q->where('agency_id', $agencyId);
                    }
                });

                if ($data['start_date'] && $data['end_date']) {
                    $patients = $patients->whereHas('admission', function ($q) use ($data) {
                        return $q->whereBetween('trans_date', [$data['start_date'], $data['end_date']]);
                    });
                }

                return Datatables::of($patients)
                    ->addIndexColumn()
                    ->addColumn('medical_package', function ($row) {
                        if ($row->admission) {
                            return $package = $row->admission->package ? $row->admission->package->packagename : 'NO PACKAGE';
                        } else {
                            return $package = $row->patientinfo->package ? $row->patientinfo->package->packagename : 'NO PACKAGE';
                        }
                    })
                    ->addColumn('passportno', function ($row) {
                        return $row->patientinfo->passportno;
                    })
                    ->addColumn('ssrbno', function ($row) {
                        return $row->patientinfo->srbno;
                    })
                    ->addColumn('category', function ($row) {
                        return $row->admission ? $row->admission->category : $row->patientinfo->category;
                    })
                    ->addColumn('status', function ($row) {
                        $patientInfo = $row->patientinfo;
                        $completed_patients = '';
                        $ongoing_patients = '';
                        $pending_patients = '';
                        $queue_patients = '';

                        if ($row->admission) {
                            if (!$row->admission->package) {
                                return '<div class="badge mx-1 p-1 bg-info">NO EXAMS</div>';
                            }
                            $patient_package = $row->admission->package;
                        } else {
                            if (!$row->patientinfo->package) {
                                return '<div class="badge mx-1 p-1 bg-info">NO EXAMS</div>';
                            }
                            $patient_package = $row->patientinfo->package;
                        }

                        $patient_exams = DB::table('list_packagedtl')
                            ->select('list_packagedtl.*', 'list_exam.examname as examname', 'list_exam.category as category', 'list_exam.section_id')
                            ->where('main_id', $patient_package->id)
                            ->leftJoin('list_exam', 'list_exam.id', 'list_packagedtl.exam_id')
                            ->get();

                        return $row->admission ? $row->admission->getStatusExams($patient_exams) : '<div class="badge mx-1 p-1 bg-info">REGISTERED</div>';
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="agency_emp?id=' . $row['id'] . '" class="btn btn-secondary btn-sm"><i class="feather icon-eye"></i></a>';
                        return $actionBtn;
                    })
                    ->filter(function ($instance) use ($request) {
                        # filter for register
                        if ($request->status == 1) {
                            $instance->where('admission_id', null)->whereHas('patientinfo', function ($q) {
                                $q->whereNotNull('medical_package');
                            });
                        }

                        # filter for admitted
                        if ($request->status == 2) {
                            $instance->whereNotNull('admission_id')->whereHas('admission', function ($q) {
                                $q->where('lab_status', null)->whereNotNull('package_id');
                            });
                        }

                        # filter for reassessment
                        if ($request->status == 3) {
                            $instance->whereHas('admission', function ($q) {
                                $q->where('lab_status', 1)->whereNotNull('package_id');
                            });
                        }

                        # filter for fit to work
                        if ($request->status == 4) {
                            // $instance->where('lab_status', 2)->latest('id');
                            $instance->whereHas('admission', function ($q) {
                                $q->where('lab_status', 2)->whereNotNull('package_id');
                            });
                        }

                        # filter for unfit to work
                        if ($request->status == 5) {
                            $instance->whereHas('admission', function ($q) {
                                $q->where('lab_status', 3)->whereNotNull('package_id');
                            });
                        }

                        # filter for unfit to work temporarily
                        if ($request->status == 6) {
                            $instance->whereHas('admission', function ($q) {
                                $q->where('lab_status', 4)->whereNotNull('package_id');
                            });
                        }

                        # if the user search
                        if (!empty($request->get('search'))) {
                            $query = $request->get('search');
                            $instance
                                ->where('firstname', 'LIKE', '%' . $query . '%')
                                ->orWhere('lastname', 'LIKE', '%' . $query . '%')
                                ->orWhere('patientcode', 'LIKE', '%' . $query . '%')
                                ->orWhere(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $query . '%')
                                ->whereHas('admission', function ($q) {
                                    return $q->where('agency_id', session()->get('agencyId'));
                                });
                        }
                    }, true)
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
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
            $patient = Patient::where('id', $id)
                ->with('patientinfo', 'admission')
                ->first();
            // dd($patient);

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

            $password = bin2hex(random_bytes(10));
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
            $agency = Agency::where('id', '=', $id)->first();
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
}
