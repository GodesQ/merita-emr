<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSchedAppointment\StoreRequest;
use App\Mail\RequestSchedAppointmentMail;
use App\Models\Patient;
use App\Models\RequestSchedAppointment;
use App\Models\SchedulePatient;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class RequestSchedAppointmentController extends Controller
{
    public function index(Request $request)
    {
        try {

            if ($request->ajax()) {
                $searchValue = $request->search['value'];
                $data = RequestSchedAppointment::query();

                if (session()->get('classification') == 'agency') {
                    $data = $data->where('agency_id', session()->get('agencyId'));
                }

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('patient', function ($row) {
                        return $row->patient->firstname . ' ' . $row->patient->lastname;
                    })
                    ->editColumn('schedule_date', function ($row) {
                        return Carbon::parse($row->schedule_date)->format('F d, Y');
                    })
                    ->editColumn('agency_id', function ($row) {
                        return $row->agency->agencyname;
                    })
                    ->addColumn('action', function ($row) {
                        if (!in_array($row->status, ['approved', 'declined'])) {
                            return '<button data-id="' . $row->id . '" id="approved-btn" class="btn btn-primary btn-sm"> <i class="fa fa-check"></i></button>
                                    <button data-id="' . $row->id . '" id="decline-btn" class="btn btn-warning btn-sm"> <i class="fa fa-close"></i></button>';
                        }
                        return 'The status was ' . $row->status . '.';
                    })
                    ->filterColumn('patient', function ($query, $searchValue) {
                        $query->whereHas('patient', function ($q) use ($searchValue) {
                            $q->whereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", ["%{$searchValue}%"])
                                ->orWhereRaw("CONCAT(lastname, ' ', firstname) LIKE ?", ["%{$searchValue}%"]);
                        });
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            if (session()->get('classification') == 'agency') {
                return view('RequestSchedAppointment.agency-index');
            }

            return view('RequestSchedAppointment.index');

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function upsert(StoreRequest $request)
    {
        try {
            abort_if(!session()->get('patientId'), 403);
            $patientId = session()->get('patientId');

            $data = $request->validated();

            $patient = Patient::where('id', session()->get('patientId'))->with('patientinfo')->first();

            if (!$patient || !$patient->patientinfo)
                throw new Exception("Patient doesn't exists.");

            $requestData = array_merge($data, [
                'patient_id' => $patientId,
                'agency_id' => $patient->patientinfo->agency_id,
                'status' => 'pending'
            ]);

            // Use updateOrCreate for cleaner and more concise code
            $request_schedule = RequestSchedAppointment::updateOrCreate(
                ['patient_id' => $patientId],
                $requestData
            );

            if (!$request_schedule->patient->patientinfo->agency->email)
                throw new Exception("The email of agency doesn't exists.");

            Mail::to($request_schedule->patient->patientinfo->agency->email)->send(new RequestSchedAppointmentMail($request_schedule));

            return back()->withSuccess("Request submitted successfully.");

        } catch (Exception $e) {
            $request_schedule->delete();
            return back()->with('error', $e->getMessage());
        }
    }

    public function approve(Request $request)
    {
        try {
            $appointment = RequestSchedAppointment::where('id', $request->id)->first();

            if (!$appointment)
                throw new Exception("Request Schedule doesn't exist.");

            SchedulePatient::updateOrCreate(
                ['patient_id' => $appointment->patient_id],
                [
                    'patientcode' => $appointment->patient->patientcode,
                    'date' => $appointment->schedule_date
                ]
            );

            $appointment->update([
                'status' => 'approved',
            ]);

            return response([
                'status' => 'success',
                'message' => 'Request schedule successfully approved.'
            ]);

        } catch (Exception $e) {
            return response([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function decline(Request $request) {
        try {
            $appointment = RequestSchedAppointment::where('id', $request->id)->first();

            if (!$appointment)
                throw new Exception("Request Schedule doesn't exist.");
            
            $appointment->update([
                'status' => 'declined',
            ]);

            return response([
                'status' => 'success',
                'message' => 'Request schedule successfully declined.'
            ]);

        } catch (Exception $e) {
            return response([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}