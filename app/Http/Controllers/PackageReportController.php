<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Agency;
use App\Models\ListPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageReportController extends Controller
{
    public function index(Request $request) {
        $agencies = Agency::orderBy('agencyname', 'asc')->get();
        $packages = ListPackage::select('packagename', DB::raw('MAX(id) as id'))->groupBy('packagename')->orderBy('packagename', 'asc')->get();
        return view('PackagesReport.packages_report', compact('agencies', 'packages'));
    }

    public function print(Request $request) {
        $from_date = Carbon::parse($request->from_date);
        $to_date = Carbon::parse($request->to_date);

        $from_month = $from_date->format('F');
        $from_year = $from_date->format('Y');

        $to_month = $to_date->format('F');
        $to_year = $to_date->format('Y');

        if ($from_month === $to_month && $from_year === $to_year) {
            // Dates are in the same month and year
            $month = $from_month . ' ' . $from_year;
        } else {
            // Dates span multiple months or years
            $month = $from_month . ' - ' . $to_month . ' ' . $from_year;
        }

        $patients = Admission::whereDate('trans_date', '>=', $request->from_date)
                    ->whereDate('trans_date', '<=', $request->to_date)
                    ->with('agency', 'package', 'exam_physical', 'patient')
                    ->whereHas('package', function($query) use ($request) {
                        $query->where('packagename', $request->package);
                    })->latest('trans_date')->get();

        return view('PrintPanel.packages_report_print', compact('patients', 'month'));
    }
}
