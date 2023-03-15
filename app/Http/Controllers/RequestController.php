<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\ListExam;
use App\Models\EmployeeLog;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
    //
    public function view_requests() {
        $data = session()->all();
        return view('Requests.requests', compact('data'));
    }

    public function request_tables(Request $request) {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Requests::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="/edit_request?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" id="' .
                        $row['id'] .
                        '" class="delete-request btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function add_request() {
        $data = session()->all();
        $exams = ListExam::all();
        return view('Requests.add-requests', compact('data', 'exams'));
    }

    public function store_request(Request $request) {
        // dd($request->all());
        $requests = new Requests();
        $requests->title = $request->title;
        $requests->created_date = date("Y-m-d");
        $save = $requests->save();
        $request_id = $requests->id;

        foreach ($request->exams as $exam) {
            $save_request_exam = DB::table('requests_exam')->insert([
                "main_id" => $request_id,
                "exam_id" => $exam,
                "created_date" => date("Y-m-d")
            ]);
        }

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Requests ' . $request->title;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save_request_exam) {
            return redirect('/list_request')->with('status', 'Request Added Successfully');
        }
    }

    public function edit_request() {
        $id = $_GET['id'];
        $data = session()->all();
        $exams = ListExam::all();
        $request = Requests::where('id', $id)->first();
        $selected_exams = DB::table('requests_exam')
            ->where('requests_exam.main_id', '=', $id)
            ->leftJoin(
                'list_exam',
                'list_exam.id',
                '=',
                'requests_exam.exam_id'
            )
            ->get();
       return view("Requests.edit-requests", compact('exams', 'request', 'selected_exams', 'data'));
    }

    public function update_request(Request $request) {
        $request_exam_delete = DB::table('requests_exam')
            ->where('main_id', $request->id)
            ->delete();
            
        if ($request_exam_delete) {
            foreach ($request->exams as $exam) {
                $save_package_exam = DB::insert(
                    'insert into requests_exam(main_id, exam_id, created_date) values(?, ?, ?)',
                    [$request->id, $exam, date("Y-m-d")]
                );
            }

            $requests = Requests::where('id', $request->id)->first();
            $requests->title = $request->title;
            $requests->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Update Request ' . $request->title;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save_package_exam) {
                return response()->json([
                    'status' => 200,
                ]);
            }
        }
    }


    public function delete_request(Request $request) {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = Requests::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Request ' . $data->title;
        $log->date = date('Y-m-d');
        $save = $log->save();
        $res = Requests::find($id)->delete();
        $list_request_package = DB::table('requests_exam')
            ->where('main_id', $id)
            ->delete();
    }
    
}