<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use DB;

use App\Models\Patient;

class AgencyDashboardController extends Controller
{   

    public function agencyCrewList(Request $request) {
        ini_set('max_execution_time', 240); //4 minutes

        try {
            $patients = Patient::with('admission', 'patientinfo')->latest('id')
                        ->when(!empty($request->get('search')), function ($query) use ($request) {
                            $searchData = $request->get('search');

                            $query->where(function ($subQuery) use ($searchData) {
                                $subQuery->orWhere(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $searchData . '%')
                                    ->whereHas('admission', function ($admissionQuery) {
                                        $admissionQuery->where('agency_id', 3)->orWhere('agency_id', session()->get('agencyId'));
                                    });
                            });
                        })
                        ->when(!empty($request->start_date) && !empty($request->end_date), function ($query) use ($request) {
                            $query->whereHas('admission', function ($q) use ($request) {
                                return $q->whereBetween('trans_date', [$request->start_date, $request->end_date]);
                            });
                        })
                        ->when(!empty($request->get('status')), function ($query) use ($request) {
                            $statusData = $request->get('status');

                            switch ($statusData) {
                                case 1:
                                    $query->where('admission_id', null)->whereHas('patientinfo', function ($q) {
                                        $q->whereNotNull('medical_package');
                                    });
                                    break;
                                case 2:
                                    $query->whereNotNull('admission_id')->whereHas('admission', function ($q) {
                                        $q->where('lab_status', null)->whereNotNull('package_id');
                                    });
                                    break;
                                case 3:
                                    $query->whereHas('admission', function ($q) {
                                        $q->where('lab_status', 1)->whereNotNull('package_id');
                                    });
                                    break;
                                case 4:
                                    $query->whereHas('admission', function ($q) {
                                        $q->where('lab_status', 2)->whereNotNull('package_id');
                                    });
                                    break;
                                case 5:
                                    $query->whereHas('admission', function ($q) {
                                        $q->where('lab_status', 3)->whereNotNull('package_id');
                                    });
                                    break;
                                case 6:
                                    $query->whereHas('admission', function ($q) {
                                        $q->where('lab_status', 4)->whereNotNull('package_id');
                                    });
                                    break;
                            }
                        })
                        ->whereHas('patientinfo', function ($q) {
                            $bahia_agency_ids = [59, 58, 57, 55, 68];
                            $agencyId = session()->get('agencyId');

                            if (in_array($agencyId, $bahia_agency_ids)) {
                                $vessels = $this->getBahiaVessel($agencyId);
                                $q->whereIn(DB::raw('upper(vessel)'), array_map('strtoupper', $vessels))->orWhere('agency_id', $agencyId);
                            } else {
                                $q->where('agency_id', $agencyId);
                            }
                        });
            
            return DataTables::of($patients)
                    ->addIndexColumn()
                    ->addColumn('vessel', function ($row) {
                        return optional($row->patientinfo)->vessel;
                    })
                    ->addColumn('medical_package', function ($row) {
                        if ($row->admission) {
                            return $package = $row->admission->package ? $row->admission->package->packagename : 'NO PACKAGE';
                        } else {
                            return $package = $row->patientinfo->package ? $row->patientinfo->package->packagename : 'NO PACKAGE';
                        }
                    })
                    ->addColumn('passportno', function ($row) {
                        return optional($row->patientinfo)->passportno;
                    })
                    ->addColumn('ssrbno', function ($row) {
                        return optional($row->patientinfo)->srbno;
                    })
                    ->addColumn('category', function ($row) {
                        return $row->admission ? $row->admission->category : optional($row->patientinfo)->category;
                    })
                    ->addColumn('status', function ($row) {
                        $patientInfo = $row->patientinfo;

                        // get patient package
                        if ($row->admission && $row->admission->package) {
                            $patient_package = $row->admission->package;
                        } elseif ($row->patientinfo && $row->patientinfo->package) {
                            $patient_package = $row->patientinfo->package;
                        } else {
                            return '<div class="badge mx-1 p-1 bg-info">NO EXAMS</div>';
                        }

                        $patient_exams = DB::table('list_packagedtl')
                            ->select('list_packagedtl.*', 'list_exam.examname', 'list_exam.category', 'list_exam.section_id')
                            ->where('main_id', $patient_package->id)
                            ->leftJoin('list_exam', 'list_exam.id', 'list_packagedtl.exam_id')
                            ->get();

                        return $row->admission ? $row->admission->getStatusExams($patient_exams) : '<div class="badge mx-1 p-1 bg-info">REGISTERED</div>';
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="agency_emp?id=' . $row['id'] . '" class="btn btn-secondary btn-sm"><i class="feather icon-eye"></i></a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    private function getBahiaVessel($agencyId) {
        switch ($agencyId) {
            case 58:
                $vessels = ['BLUE TERN', 'BLUETERN', 'BOLDTERN', 'BOLD TERN', 'BRAVETERN', 'BRAVE TERN'];
                break;
            case 55:
                $vessels = ['MS BOLETTE', 'BOLETTE', 'MS BRAEMAR', 'BRAEMAR'];
                break;
            case 57:
                $vessels = ['BALMORAL', 'MS BALMORAL'];
                break;
            case 68:
                $vessels = ['BOREALIS', 'MS BOREALIS'];
                break;
            case 59:
                $vessels = ['BLUE TERN', 'BLUETERN', 'BOLDTERN', 'BOLD TERN', 'BRAVETERN', 'BRAVE TERN', 'MS BOLETTE', 'BOLETTE', 'MS BRAEMAR', 'BRAEMAR', 'BALMORAL', 'MS BALMORAL', 'BOREALIS', 'MS BOREALIS'];
                break;
            default:
                $vessels = [];
                break;
        }

        return $vessels;
    }
}
