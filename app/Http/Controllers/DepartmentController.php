<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmployeeLog;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data = session()->all();
        return view('Department.list-department', compact('data'));
    }

    public function datatable(Request $request)
    {
        $data = Department::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn =
                    '<a href="/edit_department?id=' .
                    $row['id'] .
                    '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
<a href="#" id="' .
                    $row['id'] .
                    '" class="delete-department btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $data = session()->all();
        return view('Department.add-department', compact('data'));
    }

    public function store(Request $request)
    {
        $department = new Department();
        $department->dept = $request->dept;
        $save = $department->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add Department ' . $request->dept;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return redirect('/list_department');
        }
    }

    public function edit(Request $request)
    {
        $data = session()->all();
        $id = $_GET['id'];
        $department = Department::where('id', $id)->first();
        $employees = User::where('dept_id', $id)->get();
        return view('Department.edit-department', compact('department', 'data', 'employees'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $department = Department::where('id', $id)->first();
        $department->dept = $request->dept;
        $save = $department->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update Department ' . $request->dept;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return redirect('/list_department');
        }
    }

    public function destroy(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $department = Department::find($id);

        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete Department ' . $department->dept;
        $log->date = date('Y-m-d');
        $log->save();

        $department->delete();

        return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully'
        ]);
    }
}
