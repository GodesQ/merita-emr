    <!-- public function view_audiometry(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Audiometry::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    $patient = Patient::where(
                        'patientcode',
                        '=',
                        $admission->patientcode
                    )->first();
                    $patientName =
                        $patient->lastname . ', ' . $patient->firstname;
                    return $patientName;
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    $agency = Agency::where(
                        'id',
                        '=',
                        $admission->agency_id
                    )->first();
                    $patientName = $agency->agencyname;
                    return $patientName;
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('audiometry');
    }

    public function view_cardiac_risk_factor(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = CardiacRiskFactor::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        $agencyName = $agency->agencyname;
                        return $agencyName;
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('cardiac-risk-factor');
    }

    public function view_cardiovascular(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = CardioVascular::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        $agencyName = $agency->agencyname;
                        return $agencyName;
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('cardiovascular');
    }

    public function view_dental(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Dental::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        $agencyName = $agency->agencyname;
                        return $agencyName;
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('dental');
    }

    public function view_ecg(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = ECG::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('ecg');
    }

    public function view_echo_doppler(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = EchoDoppler::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('echo-doppler');
    }

    public function view_echo_plain(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = EchoPlain::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('echo-plain');
    }

    public function view_ishihara(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Ishihara::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('ishihara');
    }

    public function view_physical_exam(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = PhysicalExam::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('physical-exam');
    }

    public function view_psychological(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Psychological::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('psychological');
    }

    public function view_psycho_bpi(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = PsychoBPI::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('psycho-bpi');
    }

    public function view_stress_echo(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = StressEcho::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('stress-echo');
    }

    public function view_stress_test(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = StressTest::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('stress-test');
    }

    public function view_ultrasound(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = UltraSound::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('ultrasound');
    }

    public function view_visual_acuity(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = VisualAcuity::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('visual-acuity');
    }

    public function view_xray(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = XRay::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('xray');
    }

    public function view_blood_serology(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = BloodSerology::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('blood-serology');
    }

    public function view_hiv(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = HIV::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('hiv');
    }

    public function view_drug_test(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = DrugTest::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('drug-test');
    }

    public function view_fecalysis(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Fecalysis::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('fecalysis');
    }

    public function view_hematology(Request $request)
    {
        $sessions = session()->all();
        if ($request->ajax()) {
            $data = Fecalysis::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('patientname', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();

                    if (!$admission) {
                        $patientName = null;
                        return $patientName;
                    } else {
                        $patient = Patient::where(
                            'patientcode',
                            '=',
                            $admission->patientcode
                        )->first();
                        $patientName =
                            $patient->lastname . ', ' . $patient->firstname;
                        return $patientName;
                    }
                })
                ->addColumn('agency', function ($row) {
                    $admission = Admission::where(
                        'id',
                        '=',
                        $row['admission_id']
                    )->first();
                    if (!$admission) {
                        $agencyName = null;
                        return $agencyName;
                    } else {
                        $agency = Agency::where(
                            'id',
                            '=',
                            $admission->agency_id
                        )->first();
                        if (!$agency) {
                            $agencyName = null;
                            return $agencyName;
                        } else {
                            $agencyName = $agency->agencyname;
                            return $agencyName;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/patient_edit?id=' .
                        $row['id'] .
                        '" class="edit btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="/audiometry_delete?id=' .
                        $row['id'] .
                        '" class="edit btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'patientname', 'agency'])
                ->make(true);
        }
        return view('fecalysis');
    } -->

    <!-- View Menu -->
    <!-- <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title"
                            data-i18n="Layouts">Basic Exams</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="dashboard-analytics.html" data-i18n="Analytics">Basic Exam
                                Panel</a>
                        </li>
                        <li><a class="menu-item" href="/audiometry" data-i18n="Fitness">Audiometry</a>
                        </li>
                        <li><a class="menu-item" href="/cardiac_risk_factor" data-i18n="CRM">Cardiac Risk Factor</a>
                        </li>
                        <li><a class="menu-item" href="/cardiovascular" data-i18n="CRM">Cardiovascular</a>
                        </li>
                        <li><a class="menu-item" href="/dental" data-i18n="Analytics">Dental</a>
                        </li>
                        <li><a class="menu-item" href="/ecg" data-i18n="Fitness">ECG</a>
                        </li>
                        <li><a class="menu-item" href="/echo_doppler" data-i18n="CRM">2D Echo Doppler</a>
                        </li>
                        <li><a class="menu-item" href="/echo_plain" data-i18n="CRM">2D Echo Plain</a>
                        </li>
                        <li><a class="menu-item" href="/ishihara" data-i18n="Fitness">Ishihara</a>
                        </li>
                        <li><a class="menu-item" href="/physical_exam" data-i18n="CRM">Physical Exam</a>
                        </li>
                        <li><a class="menu-item" href="/psychological" data-i18n="CRM">Physchological</a>
                        </li>
                        <li><a class="menu-item" href="/psycho_bpi" data-i18n="Fitness">BPI Physcho</a>
                        </li>
                        <li><a class="menu-item" href="/stress_echo" data-i18n="CRM">Stress Echo</a>
                        </li>
                        <li><a class="menu-item" href="/stress_test" data-i18n="CRM">Stress Test</a>
                        </li>
                        <li><a class="menu-item" href="/ultrasound" data-i18n="Fitness">Ultrasound</a>
                        </li>
                        <li><a class="menu-item" href="/visual_acuity" data-i18n="CRM">Visual Acuity</a>
                        </li>
                        <li><a class="menu-item" href="/xray" data-i18n="CRM">X-Ray</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title"
                            data-i18n="Layouts">Lab Exams</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="dashboard-analytics.html" data-i18n="Analytics">Lab Exam
                                Panel</a>
                        </li>
                        <li><a class="menu-item" href="/blood_serology" data-i18n="Fitness">Blood/Serology</a>
                        </li>
                        <li><a class="menu-item" href="/hiv" data-i18n="CRM">HIV</a>
                        </li>
                        <li><a class="menu-item" href="/drug_test" data-i18n="Analytics">Drug Test</a>
                        </li>
                        <li><a class="menu-item" href="/fecalysis" data-i18n="Fitness">Fecalysis</a>
                        </li>
                        <li><a class="menu-item" href="/hematology" data-i18n="CRM">Hematology</a>
                        </li>
                        <li><a class="menu-item" href="dashboard-crm.html" data-i18n="CRM">Hepatitis</a>
                        </li>
                        <li><a class="menu-item" href="dashboard-fitness.html" data-i18n="Fitness">Pregnancy</a>
                        </li>
                        <li><a class="menu-item" href="dashboard-crm.html" data-i18n="CRM">Urinalysis</a>
                        </li>
                        <li><a class="menu-item" href="dashboard-crm.html" data-i18n="CRM">Miscellaneous</a>
                        </li>
                    </ul>
                </li> -->


    <html>

    <head>
        <title>Skuld</title>
        <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
        <style>
        body,
        table,
        tr,
        td {
            font-family: constantia;
            font-size: 9px;
        }

        .fontBoldLrg {
            font: bold 15px constantia;
        }

        .fontMed {
            font: normal 12px constantia;
        }
        </style>
    </head>

    <body>
        <center>
            <table width="680" border="0" cellpadding="2" cellspacing="0">
                <tr>
                    <td height="100" colspan="3" align="center" valign="bottom" class="lblReport">
                        <table width="680" border="0" cellpacing="0" cellpadding="2">
                            <tr>
                                <td class="brdAll">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="2"
                                        style="border: 3px solid black">
                                        <tr>
                                            <td>
                                                <table width="100%" border="0" cellpadding="2" cellspacing="0"
                                                    class="brdAll">
                                                    <tr>
                                                        <td align="center"> <span class="lblReport"><u>MEDICAL
                                                                    CERTIFICATE
                                                                    FOR SERVICE AT SEA</u></span><br>
                                                            <b><i>Approved by the Department of Health (DOH) and the
                                                                    Maritime Industry Authority (MARINA) of the <br>
                                                                    Republic of the Philippines Issued in Compliance
                                                                    with
                                                                    STCW Convention, 1978 as amended <br>
                                                                    Section A-1/9 Paragraph 7 and the Maritime Labour
                                                                    Convention, 2006</i></b>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" valign="top">
                        <table width="680" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                                <td align="center">
                                    <table width="680" border="0" cellpadding="3" cellspacing="0" class="brdMLC">
                                        <tr>
                                            <td colspan="2" valign="top">
                                                SURNAME/LAST NAME:<br>
                                                <span class="fontBoldLrg">{{$admission->lastname}}</span>
                                            </td>
                                            <td colspan="2" valign="top">
                                                GIVEN NAME:<br>
                                                <span class="fontBoldLrg">{{$admission->firstname}}</span>
                                            </td>
                                            <td width="255" valign="top">
                                                MIDDLE NAME:<br>
                                                <span class="fontBoldLrg">{{$admission->middlename}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="91" valign="top">
                                                AGE:<br>
                                                <span class="fontMed">{{$admission->age}}</span>
                                            </td>
                                            <td colspan="2" valign="top">
                                                DATE OF BIRTH: (YEAR/MONTH/DAY)<br>
                                                <span class="fontMed">{{$patientInfo->birthdate}}</span>
                                            </td>
                                            <td width="163" valign="top">
                                                PLACE OF BIRTH:<br>
                                                <span class="fontMed">{{$patientInfo->birthplace}}</span>
                                            </td>
                                            <td valign="top">
                                                NATIONALITY:<br>
                                                <span class="fontMed">{{$patientInfo->nationality}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="top">
                                                GENDER:&nbsp;&nbsp;{{$admission->gender}} </td>
                                            <td colspan="2" valign="top">
                                                CIVIL STATUS:&nbsp;&nbsp;{{$patientInfo->maritalstatus}}</td>
                                            <td valign="top">
                                                RELIGION:&nbsp;&nbsp;{{$patientInfo->religion}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" valign="top">
                                                ADDRESS:<br>
                                                <span class="fontMed">{{$patientInfo->address}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" valign="top">
                                                PASSPORT NO.:<br>
                                                <span class="fontMed">{{$patientInfo->passportno}}</span>
                                            </td>
                                            <td valign="top">SIRB:<br>
                                                <span class="fontMed">
                                                    {{$patientInfo->srbno}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" valign="top">
                                                POSITION APPLIED FOR:<br>
                                                <b>DECK</b>&nbsp;&nbsp;&nbsp;
                                                @if($admission->category == "DECK SERVICES")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                <b>ENGINE</b>&nbsp;&nbsp;&nbsp;
                                                @if($admission->category == "ENGINE SERVICES")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                <b>CATERING&nbsp;&nbsp;&nbsp;</b>
                                                @if($admission->category == "CATERING SERVICES")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif&nbsp;&nbsp;&nbsp;
                                                <b>OTHER</b>
                                                @if($admission->category == "OTHER SERVICES")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                SPECIFY: {{$admission->other_position}}
                                            </td>
                                            <td valign="top">COMPANY:<br>
                                                <span class="fontMed">
                                                    {{$admission->agencyname}}</span>
                                                <b> </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><b>DECLARATION OF THE AUTHORIZED PHYSICIAN</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">CONFIRMATION THAT IDENTIFICATION
                                                            DOCUMENTS WERE CHECKED AT THE POINT OF EXAMINATION:</td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <!-- check if the remarks in patient exam_audio is normal -->
                                                        <td width="87%" valign="middle">HEARING MEETS THE STANDARDS IN
                                                            STCW
                                                            CODE, SECTION A-1/9?</td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_audio)
                                                            @if (preg_match('/Normal/i',
                                                            $exam_audio->remarks))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_audio)
                                                            @if (!preg_match('/Normal/i',
                                                            $exam_audio->remarks))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">UNAIDED HEARING SATISFACTORY?
                                                        </td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_audio)
                                                            @if (preg_match('/unaided/i',
                                                            $exam_audio->hearing))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_audio)
                                                            @if (!preg_match('/aided/i',
                                                            $exam_audio->hearing))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">VISUAL ACUITY MEETS STANDARDS IN
                                                            STCW CODE, SECTION A-1/9?</td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_visacuity)
                                                            @if (preg_match('/Normal/i',
                                                            $exam_visacuity->remarks))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif

                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_visacuity)
                                                            @if (!preg_match('/Normal/i',
                                                            $exam_visacuity->remarks))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" valign="top">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">COLOUR VISION MEETS STANDARDS IN
                                                            STCW CODE, SECTION A-1/9? <br>
                                                            Date of last colour vision test:
                                                            {{$exam_ishihara ? date_format(new DateTime($admission->trans_date), "F d, Y") : null}}
                                                        </td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_ishihara)
                                                            @if (preg_match('/Normal/i',
                                                            $exam_ishihara->remarks))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif

                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_ishihara)
                                                            @if (!preg_match('/Normal/i',
                                                            $exam_ishihara->remarks))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="32%" valign="middle">VISUAL AIDS (tick if worn) </td>
                                                        <td width="11%" align="right" valign="middle">
                                                            SPECTACLES&nbsp;&nbsp;
                                                        </td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_physical)
                                                            @if (preg_match('/Spectacle/i',
                                                            $exam_physical->visual_required))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                        <td width="14%" align="right" valign="middle">CONTACT
                                                            LENSES&nbsp;&nbsp; </td>
                                                        <td width="40%" valign="middle">
                                                            @if ($exam_physical)
                                                            @if (preg_match('/Contact Lenses/i',
                                                            $exam_physical->visual_required))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">FIT FOR LOOKOUT DUTIES: </td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_physical)
                                                            @if (preg_match('/Fit/i',
                                                            $exam_physical->duty))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_physical)
                                                            @if (!preg_match('/Fit/i',
                                                            $exam_physical->duty))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">NO LIMITATIONS OR RESTRICTIONS
                                                            ON
                                                            FITNESS? <br>
                                                            If “NO” specify limitations or restrictions: </td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_physical)
                                                            @if (preg_match('/Without Restriction/i',
                                                            $exam_physical->restriction))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            @if ($exam_physical)
                                                            @if (!preg_match('/Without Restriction/i',
                                                            $exam_physical->restriction))
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                            @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="tblNoneRightNew">
                                                    <tr>
                                                        <td width="87%" valign="middle">IS APPLICANT SUFFERING FROM ANY
                                                            MEDICAL CONDITION LIKELY TO BE AGGRAVATED BY SERVICE AT SEA
                                                            OR
                                                            <br>
                                                            TO RENDER THE SEAFARER UNFIT FOR SUCH SERVICE OR TO ENDANGER
                                                            THE
                                                            HEALTH OF OTHER PERSONS ON BOARD?
                                                        </td>
                                                        <td width="4%" valign="middle">YES</td>
                                                        <td width="3%" valign="middle">
                                                            <img src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10">
                                                        </td>
                                                        <td width="3%" valign="middle">NO</td>
                                                        <td width="3%" valign="middle">
                                                            <img src="../../../app-assets/images/icoCheck.gif"
                                                                width="10">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table width="678" border="0" cellpadding="0" cellspacing="0" class="brdAll">
                                        <tr>
                                            <td>
                                                <table width="678" border="0" cellpadding="3" cellspacing="0">
                                                    <tr>
                                                        <td width="178" align="center" valign="middle" class="brdBtm"
                                                            style="padding-top:20px;">
                                                            @if($admission->patient_image)
                                                            <img src="../../../app-assets/images/profiles/{{$admission->patient_image}}"
                                                                alt="Patient Picture" width="140" height="140"
                                                                class="brdAll">
                                                            @else
                                                            <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                                alt="Patient Picture" width="140" height="140"
                                                                class="brdAll">
                                                            @endif<br>
                                                            <span class="fontMed"></span>
                                                        </td>
                                                        <td width="500" class="brdLeftBtm">
                                                            <table width="500" border="0" cellpadding="0"
                                                                cellspacing="0" class="size10">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">THIS IS TO CERTIFY
                                                                            THAT A MEDICAL AND PHYSICAL
                                                                            EXAMINATION WAS GIVEN TO: <br>
                                                                            <span
                                                                                class="fontBoldLrg"><u>{{$admission->lastname . ", " . $admission->firstname . " " . $admission->middlename}}</u></span><br>
                                                                            <span style="margin-left:20px">NAME
                                                                                OF SEAFARER</span><br>
                                                                            <span class="fontMed"><i>In
                                                                                    Accordance with the
                                                                                    <font color="red">SKULD
                                                                                        P&amp;I CLUB</font>
                                                                                </i></span><br>
                                                                            <img src="../../../app-assets/images/logo/logoSKULD.jpg"
                                                                                width="154" height="43"
                                                                                style="float:right">
                                                                            <span class="fontMed">RESULT:<br>
                                                                                FIT FOR SEA DUTY
                                                                                @if ($exam_physical)
                                                                                @if (preg_match('/Fit/i',
                                                                                $exam_physical->fit))
                                                                                <img src="../../../app-assets/images/icoCheck.gif"
                                                                                    width="10">
                                                                                @else
                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                    width="10">
                                                                                @endif
                                                                                @else
                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                    width="10">
                                                                                @endif
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UNFIT
                                                                                FOR SEA DUTY
                                                                                @if ($exam_physical)
                                                                                @if (!preg_match('/Fit/i',
                                                                                $exam_physical->fit))
                                                                                <img src="../../../app-assets/images/icoCheck.gif"
                                                                                    width="10">
                                                                                @else
                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                    width="10">
                                                                                @endif
                                                                                @else
                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                    width="10">
                                                                                @endif
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" valign="bottom" class="">
                                                                            <br><br><br>
                                                                            NAME AND SIGNATURE OF
                                                                            EXAMINING/AUTHORIZED PHYSICIAN
                                                                            <br>
                                                                            DATE OF EXAMINATION:
                                                                            {{date_format(new DateTime($admission->trans_date), "F d, Y")}}<br><br>
                                                                            APPROVED BY:<br><br><br>
                                                                            <br>
                                                                            MEDICAL DIRECTOR
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="120" align="center" class="brdRight">&nbsp;</td>
                                                        <td valign="top" class="brdLeft">
                                                            <table width="100%" border="0" cellspacing="0"
                                                                cellpadding="0">
                                                                <tr>
                                                                    <td valign="top">NAME OF ISSUING AUTHORITY: TERESITA
                                                                        F.
                                                                        GONZALES, MD <br>
                                                                        ADDRESS: 5th & 6th Flr Jettac Bldg., 920 Quirino
                                                                        Ave. Cor. San Antonio St. Malate Manila <br>
                                                                        <br>
                                                                        PHYSICIAN’S CERTIFYING AUTHORITY: PROFESSIONAL
                                                                        REGULATION COMMISSION <br>
                                                                        PHYSICIAN’S LICENSE NUMBER:
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table width="680" border="0" cellpadding="2" cellspacing="0" class="brdMLC">
                                        <tr>
                                            <td colspan="7">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    id="brdNone">
                                                    <tr>
                                                        <td colspan="4">I HAVE READ AND UNDERSTOOD AND WAS INFORMED OF
                                                            THE
                                                            CONTENTS OF THE CERTIFICATE AND OF THE RIGHT TO A REVIEW IN
                                                            ACCORDANCE WITH PARAGRAPH 6 OF SECTION A-1/9 OF THE STCW
                                                            CODE.
                                                        </td>
                                                    </tr>
                                                    <style>
                                                    #divImage {
                                                        width: 100%;
                                                        height: 35px;
                                                        overflow: hidden;
                                                        position: relative;
                                                    }

                                                    #divImage img {
                                                        position: absolute;
                                                        width: 100px;
                                                        height: 50px;
                                                        top: 1%;
                                                        left: 35%;
                                                    }
                                                    </style>
                                                    <tr>
                                                        <td width="27%">&nbsp;</td>
                                                        <td width="48%" align="center">
                                                            <div id="divImage"></div>
                                                        </td>
                                                        <td width="6%">&nbsp;</td>
                                                        <td width="19%">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="27%">SEAFARER’S NAME AND SIGNATURE:</td>
                                                        <td width="48%" align="center"
                                                            style="border-bottom:solid 1px black">
                                                            <b>{{$admission->lastname}},
                                                                {{$admission->firstname}}
                                                                {{$admission->middlename}}</b>
                                                        </td>
                                                        <td width="6%">DATE:</td>
                                                        <td width="19%" style="border-bottom:solid 1px black">
                                                            {{$exam_physical ? $exam_physical->date_examination : null}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">(THIS SIGNATURE SHOULD BE AFFIXED IN THE
                                                            PRESENCE OF
                                                            THE EXAMINING PHYSICIAN)</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="100%" cellpadding="2" cellspacing="0" class="brdMLC"
                                        style="margin-top:1px">
                                        <tr>
                                            <td colspan="6" style="font-size:12px"> <b>DATE OF ISSUANCE: </b>
                                                {{$exam_physical ? $exam_physical->trans_date : null}} </td>
                                            <td width="51%" style="font-size:12px"> <b>DATE OF EXPIRATION: </b>
                                                {{$exam_physical ? $exam_physical->date_expiration : null}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" valign="top"> <span class="lblForm" style="font-size:8px">FORM NO.41 / REV. 00 /
                            20-02-2018</span> </td>
                </tr>
            </table>
        </center>
    </body>

    </html>