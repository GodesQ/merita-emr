<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListPackage;
use App\Models\EmployeeLog;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ListExam;
use App\Models\Agency;
use App\Models\Requests;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    //
    public function view_list_package(Request $request)
    {
        $data = session()->all();
        return view('Package.list-package', compact('data'));
    }

    public function get_list_package(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = ListPackage::select('list_package.*', 'mast_agency.agencyname')->leftJoin('mast_agency', 'mast_agency.id', 'list_package.agency_id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('agency', function ($row) {
                    $agency = Agency::where(
                        'id',
                        '=',
                        $row['agency_id']
                    )->first();
                    $agencyName;
                    if (!$agency) {
                        $agencyName = null;
                    } else {
                        $agencyName = $agency->agencyname;
                    }
                    return $agencyName;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="edit_package?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
<a href="#" id="' .
                        $row['id'] .
                        '" class="delete-package btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('price', function ($row) {
                    if($row->dollar_price) {
                        return '$ ' . $row->dollar_price;
                    }else {
                        return '&#8369; ' . $row->peso_price;
                    }
                })
                 ->filter(function ($instance) use ($request) {
                     
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                              $search = $request->get('search');
                              $w->orWhere('list_package.packagename', 'LIKE', "%$search%")
                              ->orWhere('list_package.id', 'LIKE', "%$search%")
                              ->orWhere('list_package.peso_price', 'LIKE', "%$search%")
                              ->orWhere('list_package.dollar_price', 'LIKE', "%$search%")
                              ->orWhere('mast_agency.agencyname', 'LIKE', "%$search%");
                          });
                      }
                        
                })
                ->rawColumns(['action', 'agency', 'price'])
                ->toJson();
        }
    }

    public function add_package()
    {
        $data = session()->all();
        $exams = ListExam::all();
        $agencies = Agency::all();
        $requests = Requests::all();
        return view(
            'Package.add-package',
            compact('exams', 'agencies', 'data', 'requests')
        );
    }

    public function store_package(Request $request)
    {   
        $request->validate([
            'package_name' => 'required',
            'peso_price' => 'nullable|numeric|min:100',
            'dollar_price' => 'nullable|numeric|min:100',
        ]);
        
        $package = new ListPackage();
        $package->packagename = $request->package_name;
        $package->peso_price = $request->peso_price;
        $package->dollar_price = $request->dollar_price;
        $package->remarks = $request->remarks;
        $package->agency_id = $request->agency;
        $save = $package->save();
        $package_id = $package->id;

        foreach ($request->exams as $exam) {
            $save_package_exam = DB::insert(
                'insert into list_packagedtl(main_id,exam_id) values(?, ?)',
                [$package_id, $exam]
            );
        }

        foreach ($request->requests as $req) {
            $save_package_exam = DB::insert(
                'insert into list_package_request(main_id,request_id, created_date) values(?, ?, ?)',
                [$package_id, $req, date("Y-m-d")]
            );
        }

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Package ' . $request->package_name;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save_package_exam) {
            return redirect('/list_package');
        }
    }

    public function edit_package(Request $request)
    {
        $data = session()->all();
        $id = $_GET['id'];
        $agencies = Agency::all();
        $exams = ListExam::all();
        $requests = Requests::all();
        $package = ListPackage::select(
            'list_package.id',
            'list_package.packagename',
            'list_package.peso_price',
            'list_package.dollar_price',
            'list_package.agency_id',
            'list_package.remarks',
            'mast_agency.agencyname as agencyname'
        )
            ->where('list_package.id', '=', $id)
            ->leftJoin(
                'mast_agency',
                'mast_agency.id',
                '=',
                'list_package.agency_id'
            )
            ->first();

        $selected_exams = DB::table('list_packagedtl')
            ->where('list_packagedtl.main_id', '=', $id)
            ->leftJoin(
                'list_exam',
                'list_exam.id',
                '=',
                'list_packagedtl.exam_id'
            )
            ->get();

            $selected_requests= DB::table('list_package_request')
            ->select('list_package_request.*', 'requests.title', 'requests.id as request_id')
            ->where('list_package_request.main_id', '=', $id)
            ->leftJoin(
                'requests',
                'requests.id',
                '=',
                'list_package_request.request_id'
            )
            ->get();
        

        return view(
            'Package.edit-package',
            compact('agencies', 'exams', 'package', 'selected_exams', 'data', 'selected_requests', 'requests')
        );
    }

    public function update_package(Request $request)
    {   
        $package_exam_delete = DB::table('list_packagedtl')
            ->where('main_id', $request->id)
            ->delete();
        
        foreach ($request->exams as $exam) {
            $save_package_exam = DB::insert(
                'insert into list_packagedtl(main_id,exam_id) values(?, ?)',
                [$request->id, $exam]
            );
        } 
        
        if(isset($request->requests)) {
            $package_request = DB::table('list_package_request')
            ->where('main_id', $request->id)
            ->delete();
            
            foreach ($request->requests as $req) {
                $save_package_requests = DB::insert(
                    'insert into list_package_request(main_id, request_id, created_date) values(?, ?, ?)',
                    [$request->id, $req, date("Y-m-d")]
                );
            }
        }
        
        $package = ListPackage::where('id', $request->id)->first();
        $package->packagename = $request->package_name;
        $package->peso_price = $request->peso_price;
        $package->dollar_price = $request->dollar_price;
        $package->remarks = $request->remarks;
        $package->agency_id = $request->agency;
        $save = $package->save();
        $package_id = $package->id;

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Package ' . $request->package_name;
        $log->date = date('Y-m-d');
        $log->save();

        return response()->json([
            'status' => 200,
        ]);
        
    }

    public function delete_list_package(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = ListPackage::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Package ' . $data->packagename;
        $log->date = date('Y-m-d');
        $save = $log->save();
        $res = ListPackage::find($id)->delete();
        $list_exam_package = DB::table('list_packagedtl')
            ->where('main_id', $id)
            ->delete();
    }
    
    public function get_exams(Request $request) {
    }
}