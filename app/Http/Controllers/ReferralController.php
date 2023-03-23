<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Refferal;
use App\Models\Patient;

use Yajra\DataTables\Facades\DataTables;

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
                    return optional($row->patient)->lastname;
                })
                ->addColumn('firstname', function ($row) {
                    return optional($row->patient)->firstname;
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
                ->rawColumns(['packagename', 'action'])
                ->toJson();
    }
}
