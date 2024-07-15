<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransmittalController extends Controller
{
    public function index(Request $request)
    {
        $agencies = Agency::orderBy('agencyname', 'asc')->get();
        return view('Transmittal.transmittal', compact('agencies'));
    }

    public function print(Request $request)
    {
        $from_date = $request->input('date_from');
        $to_date = $request->input('date_to');
        $agency_id = $request->input('agency_id');
        $patientstatus = $request->input('patientstatus');
        $bahia_vessel = $request->input('bahia_vessel');
        $hartmann_principal = $request->input('hartmann_principal');

        if (empty($agency_id)) {
            $patients = $this->patientStatus($patientstatus, $from_date, $to_date);
        } else {
            $patients = $this->patientAgencyStatus($patientstatus, $from_date, $to_date, $agency_id, $bahia_vessel, $hartmann_principal);
        }

        $additional_columns = $request->additional_columns ? $request->additional_columns : [];

        $agency = Agency::where('id', $agency_id)->first();

        return view('PrintTemplates.transmittal_print', compact('patients', 'from_date', 'to_date', 'patientstatus', 'agency', 'additional_columns'));
    }

    public function patientStatus($patientstatus, $from_date, $to_date)
    {
        $patients = Admission::whereBetween('trans_date', [$from_date, $to_date])
            ->when($patientstatus, function ($query) use ($patientstatus) {
                $query->whereHas('exam_physical', function ($query) use ($patientstatus) {
                    $query->where('fit', $patientstatus);
                });
            })->get();

        return $patients;
    }

    public function patientAgencyStatus($patientstatus, $from_date, $to_date, $agency_id, $bahia_vessel, $hartmann_principal)
    {
        $patients = Admission::whereDate('trans_date', '>=', $from_date)
            ->whereDate('trans_date', '<=', $to_date)
            ->where(function ($q) use ($agency_id) {
                $bahia_ids = ['55', '57', '58', '59'];
                if ($agency_id == 3) {
                    return $q->where('agency_id', $agency_id);
                } else if (in_array($agency_id, $bahia_ids)) {
                    return $q->where('agency_id', $agency_id)->orWhere('agency_id', 3);
                } else {
                    return $q->where('agency_id', $agency_id);
                }
            })
            ->when($bahia_vessel, function ($q) use ($bahia_vessel, $agency_id) {
                $q->where(function ($q) use ($bahia_vessel, $agency_id) {
                    $ternVessels = ['BOLD TERN', 'BLUE TERN', 'BRAVE TERN', 'BOLDTERN', 'BLUETERN', 'BRAVETERN'];
                    $lettemarVessels = ['BOLETTE', 'BRAEMAR', 'MS BOLETTE', 'MS BRAEMAR'];
                    $rallisVessels = ['BALMORAL', 'BOREALIS', 'MS BALMORAL', 'MS BOREALIS'];

                    $vesselGroups = [
                        'BLUETERN/BOLDTERN/BRAVETERN' => $ternVessels,
                        'BOLETTE/BRAEMAR' => $lettemarVessels,
                        'BALMORAL/BOREALIS' => $rallisVessels
                    ];

                    $validAgencies = [
                        3 => ['BLUETERN/BOLDTERN/BRAVETERN', 'BOLETTE/BRAEMAR', 'BALMORAL/BOREALIS'],
                        55 => ['BOLETTE/BRAEMAR'],
                        57 => ['BALMORAL/BOREALIS'],
                        58 => ['BLUETERN/BOLDTERN/BRAVETERN']
                    ];

                    if (isset($validAgencies[$agency_id]) && in_array($bahia_vessel, $validAgencies[$agency_id])) {
                        return $q->whereIn(DB::raw('upper(vesselname)'), array_map('strtoupper', $vesselGroups[$bahia_vessel]));
                    }
                });
            })
            ->where(function ($q) use ($hartmann_principal, $agency_id) {
                if ($agency_id == 9 && $hartmann_principal != "all") {
                    return $q->where(DB::raw('upper(principal)'), strtoupper($hartmann_principal));
                }
            })
            ->when($patientstatus, function ($query) use ($patientstatus) {
                $query->whereHas('exam_physical', function ($query) use ($patientstatus) {
                    $query->where('fit', $patientstatus);
                });
            })
            ->get();

        return $patients;
    }
}
