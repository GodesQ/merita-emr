<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeLog;
use App\Models\Agency;
use App\Models\Admission;
use App\Models\AdmissionExam;

class SOAController extends Controller
{
    public function index()
    {
        $data = session()->all();
        $agencies = Agency::all();
        return view('SOA.soa', compact('data', 'agencies'));
    }

    public function soa_print(Request $request)
    {
        $agency_id = $request->input('agency_id');
        $bahia_vessel = $request->input('bahia_vessel');
        $additional_columns = $request->additional_columns ? $request->additional_columns : [];
        $include_examination = $request->include ? $request->include : [];
        $package_id = $request->package_id;
        $currency = $request->currency;
        $exchange_rate = $request->exchange_rate;
        $prepared_by = $request->prepared_by;
        $approved_by = $request->approved_by;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $tax = $request->tax;

        $patients = Admission::whereDate('trans_date', '>=', $request->date_from)
            ->whereDate('trans_date', '<=', $request->date_to)
            ->where(function ($q) use ($bahia_vessel, $agency_id) {
                $agency_ids = [3, 58, 57, 55];
                if (in_array($agency_id, $agency_ids)) {
                    if ($bahia_vessel == 'BLUETERN') {
                        return $q->whereIn('agency_id', [3, 58])->where(DB::raw('upper(vesselname)'), strtoupper('BLUETERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BLUE TERN'));
                    }

                    if ($bahia_vessel == 'BOLDTERN') {
                        return $q->whereIn('agency_id', [3, 58])->where(DB::raw('upper(vesselname)'), strtoupper('BOLDTERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLD TERN'));
                    }

                    if ($bahia_vessel == 'BRAVETERN') {
                        return $q->whereIn('agency_id', [3, 58])->where(DB::raw('upper(vesselname)'), strtoupper('BRAVETERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAVE TERN'));
                    }

                    if ($bahia_vessel == 'BALMORAL') {
                        return $q->whereIn('agency_id', [3, 57])->where(DB::raw('upper(vesselname)'), strtoupper('BALMORAL'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BALMORAL'));
                    }

                    if ($bahia_vessel == 'BOREALIS') {
                        return $q->whereIn('agency_id', [3, 57])->where(DB::raw('upper(vesselname)'), strtoupper('BOREALIS'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BOREALIS'));
                    }

                    if ($bahia_vessel == 'BOLETTE') {
                        return $q->whereIn('agency_id', [3, 55])->where(DB::raw('upper(vesselname)'), strtoupper('BOLETTE'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BOLETTE'));
                    }

                    if ($bahia_vessel == 'BRAEMAR') {
                        return $q->whereIn('agency_id', [3, 55])->where(DB::raw('upper(vesselname)'), strtoupper('BRAEMAR'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BRAEMAR'));
                    }
                }
                return $q->where('agency_id', $agency_id);
            })
            ->where(function ($q) use ($package_id) {
                if ($package_id != 'all') {
                    return $q->where('package_id', $package_id);
                }
            })
            ->where('payment_type', 'Billed')
            ->with('patient', 'admission_exams', 'package')
            ->join('mast_patient', 'tran_admission.id', '=', 'mast_patient.admission_id')
            ->select('tran_admission.*', 'mast_patient.admission_id', 'mast_patient.lastname');

        if ($request->arrange_by == 'name') {
            $patients = $patients->orderBy('mast_patient.lastname')->get();
        } else {
            $patients = $patients->orderBy('tran_admission.trans_date')->get();
        }

        $agency = Agency::where('id', $request->agency_id)->first();

        if ($agency->id == 22) {
            $collected_patients = collect($patients)->chunk(15);
        } elseif ($agency->id == 9 && $request->package_id == 1) {
            $collected_patients = collect($patients)->chunk(15);
        } elseif ($agency->id == 3 && $request->package_id == 3) {
            $collected_patients = collect($patients)->chunk(25);
        } else {
            if (in_array('include_additional_exams', $include_examination)) {
                if ($agency->id == 64) {
                    $collected_patients = collect($patients)->chunk(20);
                } else {
                    $collected_patients = collect($patients)->chunk(15);
                }
            } else {
                $collected_patients = collect($patients)->chunk(25);
            }
        }

        $invoice_number = $request->invoice_number;
        $soa_date = $request->soa_date ? date_format(date_create_from_format('Y-m-d', $request->soa_date), 'F d, Y') : date('F d, Y');
        $terms_date = $request->terms_date ? date_format(date_create_from_format('Y-m-d', $request->terms_date), 'F d, Y') : date('F d, Y');

        if ($request->template == 'Template 2') {
            return view('SOA.hartmann_soa', compact('collected_patients', 'agency', 'currency', 'exchange_rate', 'invoice_number', 'soa_date', 'prepared_by', 'approved_by', 'terms_date', 'include_examination'));
        }
        return view('SOA.soa_print', compact('collected_patients', 'agency', 'currency', 'exchange_rate', 'invoice_number', 'soa_date', 'prepared_by', 'approved_by', 'terms_date', 'bahia_vessel', 'additional_columns', 'date_from', 'date_to', 'include_examination', 'tax'));
    }

    public function panama(Request $request)
    {
        $data = session()->all();
        $agencies = Agency::all();
        return view('PanamaBilling.panama_billing', compact('data', 'agencies'));
    }

    public function panama_print(Request $request)
    {
        $agency_id = $request->input('agency_id');
        $bahia_vessel = $request->input('bahia_vessel');

        $patients = Admission::whereDate('trans_date', '>=', $request->date_from)
            ->whereDate('trans_date', '<=', $request->date_to)
            ->where(function ($q) use ($bahia_vessel, $agency_id) {
                if ($bahia_vessel == 'ALL VESSELS') {
                    $bahia_ids = ['55', '57', '58', '59', '3'];
                    return $q->whereIn('agency_id', $bahia_ids);
                } else {
                    if ($agency_id != 'All') {
                        return $q->where('agency_id', $agency_id);
                    }
                }
            })
            ->where(function ($q) use ($bahia_vessel, $agency_id) {
                if ($agency_id == 3) {
                    if ($bahia_vessel == 'ALL VESSELS') {
                        return;
                    }

                    if ($bahia_vessel == 'BLUETERN') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('BLUE TERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BLUETERN'));
                    }

                    if ($bahia_vessel == 'BOLDTERN') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLD TERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLDTERN'));
                    }

                    if ($bahia_vessel == 'BRAVETERN') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAVE TERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAVETERN'));
                    }

                    if ($bahia_vessel == 'BALMORAL') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BALMORAL'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BALMORAL'));
                    }

                    if ($bahia_vessel == 'BOREALIS') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BOREALIS'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOREALIS'));
                    }

                    if ($bahia_vessel == 'BOLETTE') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BOLETTE'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLETTE'));
                    }

                    if ($bahia_vessel == 'BRAEMAR') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BRAEMAR'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAEMAR'));
                    }
                }
            })
            ->where('have_panama', 1)
            ->with('patient')
            ->get();

        $agency = Agency::where('id', $request->agency_id)->first();

        $collected_patients = collect($patients)->chunk(25);

        $prepared_by = $request->prepared_by;
        $approved_by = $request->approved_by;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $tax = $request->tax;
        $soa_date = $request->soa_date;
        $invoice_number = $request->invoice_number;
        $currency = $request->currency;
        $exchange_rate = $request->exchange_rate;

        return view('PanamaBilling.panama_print', compact('patients', 'prepared_by', 'approved_by', 'date_from', 'date_to', 'tax', 'bahia_vessel', 'collected_patients', 'agency', 'soa_date', 'invoice_number', 'exchange_rate', 'currency'));
    }

    public function liberian_billing()
    {
        $data = session()->all();
        $agencies = Agency::all();
        return view('LiberianBilling.liberian_billing', compact('data', 'agencies'));
    }

    public function liberian_billing_print(Request $request)
    {
        $agency_id = $request->input('agency_id');
        $bahia_vessel = $request->input('bahia_vessel');

        $patients = Admission::whereDate('trans_date', '>=', $request->date_from)
            ->whereDate('trans_date', '<=', $request->date_to)
            ->where(function ($q) use ($bahia_vessel, $agency_id) {
                if ($bahia_vessel == 'ALL VESSELS') {
                    $bahia_ids = ['55', '57', '58', '59', '3'];
                    return $q->whereIn('agency_id', $bahia_ids);
                } else {
                    if ($agency_id != 'All') {
                        return $q->where('agency_id', $agency_id);
                    }
                }
            })
            ->where(function ($q) use ($bahia_vessel, $agency_id) {
                if ($agency_id == 3) {
                    if ($bahia_vessel == 'ALL VESSELS') {
                        return;
                    }

                    if ($bahia_vessel == 'BLUETERN') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('BLUE TERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BLUETERN'));
                    }

                    if ($bahia_vessel == 'BOLDTERN') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLD TERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLDTERN'));
                    }

                    if ($bahia_vessel == 'BRAVETERN') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAVE TERN'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAVETERN'));
                    }

                    if ($bahia_vessel == 'BALMORAL') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BALMORAL'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BALMORAL'));
                    }

                    if ($bahia_vessel == 'BOREALIS') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BOREALIS'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOREALIS'));
                    }

                    if ($bahia_vessel == 'BOLETTE') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BOLETTE'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BOLETTE'));
                    }

                    if ($bahia_vessel == 'BRAEMAR') {
                        return $q->orWhere(DB::raw('upper(vesselname)'), strtoupper('MS BRAEMAR'))->orWhere(DB::raw('upper(vesselname)'), strtoupper('BRAEMAR'));
                    }
                }
            })
            ->where('have_liberian', 1)
            ->with('patient', 'exam_physical')
            ->get();

        $agency = Agency::where('id', $request->agency_id)->first();

        $collected_patients = collect($patients)->chunk(25);

        $prepared_by = $request->prepared_by;
        $approved_by = $request->approved_by;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $tax = $request->tax;
        $soa_date = $request->soa_date;
        $invoice_number = $request->invoice_number;
        $currency = $request->currency;
        $exchange_rate = $request->exchange_rate;

        return view('LiberianBilling.liberian_print', compact('patients', 'prepared_by', 'approved_by', 'date_from', 'date_to', 'tax', 'bahia_vessel', 'collected_patients', 'agency', 'soa_date', 'invoice_number', 'exchange_rate', 'currency'));
    }
}

?>
