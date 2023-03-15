<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListExam;
use App\Models\Agency;
use App\Models\ListSection;
use App\Models\EmployeeLog;
use Yajra\DataTables\Facades\DataTables;

class ExamController extends Controller
{
    //
    public function view_list_exam(Request $request)
    {
        $data = session()->all();
        return view('Exam.list-exam', compact('data'));
    }

    public function get_list_exam(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = ListExam::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('section', function ($row) {
                    $section = ListSection::where(
                        'id',
                        '=',
                        $row['section_id']
                    )->first();
                    $sectionName = $section->sectionname;
                    return $sectionName;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="edit_exam?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" id="' .
                        $row['id'] .
                        '" class="delete-exam btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'section', 'agency'])
                ->toJson();
        }
    }

    public function add_exam()
    {
        $data = session()->all();
        $sections = ListSection::all();
        return view('Exam.add-exam', compact('sections', 'data'));
    }

    public function store_exam(Request $request)
    {
        $exam = new ListExam();
        $exam->examname = $request->examname;
        $exam->price = $request->price;
        $exam->category = $request->category;
        $exam->section_id = $request->section;
        $exam->created_date = $request->created_at;
        $save = $exam->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Exam ' . $request->examname;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return redirect('/list_exam')->with(
                'status',
                'Exam Added Successfully'
            );
        }
    }

    public function edit_exam(Request $request)
    {
        $data = session()->all();
        $id = $_GET['id'];
        $sections = ListSection::all();
        $exam = ListExam::where('id', '=', $id)->first();
        return view('Exam.edit-exam', compact('sections', 'exam', 'data'));
    }

    public function update_exam(Request $request)
    {
        $exam = ListExam::where('id', '=', $request->id)->first();
        $exam->examname = $request->examname;
        $exam->price = $request->price;
        $exam->category = $request->category;
        $exam->section_id = $request->section;
        $exam->updated_date = $request->updated_at;
        $save = $exam->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Exam ' . $request->examname;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function delete_list_exam(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = ListExam::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Exam ' . $data->examname;
        $log->date = date('Y-m-d');
        $log->save();
        $res = ListExam::find($id)->delete();
    }
}