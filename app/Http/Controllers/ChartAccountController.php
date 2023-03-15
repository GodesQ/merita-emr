<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeLog;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ChartAccount;
use Illuminate\Support\Facades\DB;

class ChartAccountController extends Controller
{
    //
    public function view_chart_accounts(Request $request)
    {
        $data = session()->all();
        return view('ChartAccount.chart-account', compact('data'));
    }

    public function get_coa(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = ChartAccount::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="/edit_coa?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
<a href="#" id="' .
                        $row['id'] .
                        '" class="delete-coa btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function create_coa()
    {
        $data = session()->all();
        $coa = ChartAccount::orderBy('id', 'desc')->get();
        $latestCoa = DB::table('actgmast_coa')
            ->latest('id', 'desc')
            ->first();
        $latestCoa = $latestCoa->account_code + 1;
        return view(
            'ChartAccount.add-chart-account',
            compact('coa', 'latestCoa', 'data')
        );
    }

    public function store_coa(Request $request)
    {
        $coa = new ChartAccount();
        $coa->account_code = $request->account_code;
        $coa->parent_code = $request->parent_code;
        $coa->account_title = $request->account_title;
        $save = $coa->save();

        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Add ChartAccount ' . $request->account_code;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function edit_coa()
    {
        $data = session()->all();
        $id = $_GET['id'];
        $allCoa = ChartAccount::orderBy('id', 'desc')->get();
        $coa = ChartAccount::where('id', '=', $id)->first();
        return view(
            'ChartAccount.edit-chart-account',
            compact('coa', 'allCoa', 'data')
        );
    }

    public function update_coa(Request $request)
    {
        $coa = ChartAccount::where(
            'account_code',
            '=',
            $request->account_code
        )->first();
        $coa->account_code = $request->account_code;
        $coa->parent_code = $request->parent_code;
        $coa->account_title = $request->account_title;
        $save = $coa->save();
        $employeeInfo = session()->all();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Update ChartAccount ' . $request->account_code;
        $log->date = date('Y-m-d');
        $log->save();

        if ($save) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function delete_chart_account(Request $request)
    {
        $employeeInfo = session()->all();
        $id = $request->id;
        $data = ChartAccount::where('id', $id)->first();
        $log = new EmployeeLog();
        $log->employee_id = $employeeInfo['employeeId'];
        $log->description = 'Delete ChartAccount ' . $data->account_code;
        $log->date = date('Y-m-d');
        $log->save();
        $res = ChartAccount::find($id)->delete();
    }
}