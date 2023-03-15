<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeLog;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ListSection;

class SectionController extends Controller
{
    //
    public function view_list_section(Request $request)
    {
        $data = session()->all();
        return view('Section.list-section', compact('data'));
    }

    public function get_list_section(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = ListSection::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="/edit_section?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" id="' .
                        $row['id'] .
                        '" class="delete-section btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function add_section()
    {
        $data = session()->all();
        return view('Section.add-section', compact('data'));
    }

    public function store_section(Request $request)
    {
        $section = new ListSection();
        $section->sectionname = $request->sectionname;
        $section->floor = $request->floor;
        $section->created_date = $request->created_at;
        $save = $section->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Section ' . $request->sectionname;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return redirect('/list_section')->with(
                'status',
                'Section Added Successfully'
            );
        }
    }

    public function edit_section()
    {
        $data = session()->all();
        $id = $_GET['id'];
        $section = ListSection::where('id', '=', $id)->first();
        return view('Section.edit-section', compact('section', 'data'));
    }

    public function update_section(Request $request)
    {
        $section = ListSection::where('id', '=', $request->id)->first();
        $section->sectionname = $request->sectionname;
        $section->floor = $request->floor;
        $section->updated_date = $request->updated_at;
        $save = $section->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Section ' . $request->sectionname;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function delete_list_section(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = ListSection::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Section ' . $data->sectionname;
        $log->date = date('Y-m-d');
        $log->save();
        $res = ListSection::find($id)->delete();
    }
}