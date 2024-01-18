<div class="tab-pane fade" id="account-followup" role="tabpanel" aria-labelledby="account-pill-followup"
    aria-expanded="false">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">
                Follow Up Form
            </div>
            <div>
                <a class="btn btn-secondary text-white" id="account-pill-connections"data-toggle="pill"
                    onclick="window.open('/default_follow_up_print?id={{ $patient->id }}&admission_id={{ $admissionPatient->id }}&action=print')"
                    aria-expanded="false">
                    <i class="fa fa-print"></i>
                    Print Default Follow Up Form
                </a>
                <a class="btn btn-secondary text-white" id="account-pill-connections"data-toggle="pill"
                    onclick="window.open('/follow_up_print?id={{ $patient->id }}&admission_id={{ $admissionPatient->id }}&action=print')"
                    aria-expanded="false">
                    <i class="fa fa-print"></i>
                    Print Follow Up Form
                </a>

                <a onclick="window.open('/follow_up_print?id={{ $patient->id }}&admission_id={{ $admissionPatient->id }}&action=download')"
                    class="btn btn-secondary text-white"><i class="fa fa-download"></i>
                    Download Follow Up Form</a>
            </div>
        </div>  
        <hr>
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                @if (count($followup_records) > 0)
                    @foreach ($followup_records as $key => $followup_record)
                        @if ($loop->first)
                            <li class="nav-item">
                                <a class="nav-link" id="{{ $key }}" data-toggle="tab"
                                    aria-controls="fl{{ $key }}" href="#fl{{ $key }}" role="tab"
                                    aria-selected="true">{{ date_format(new DateTime($admissionPatient->trans_date), 'F d, Y') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" id="{{ $key }}" data-toggle="tab"
                                    aria-controls="fl{{ $key }}" href="#fl{{ $key }}" role="tab"
                                    aria-selected="true">{{ date_format(new DateTime($followup_record->date), 'F d, Y') }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
                <li class="nav-item">
                    <a class="nav-link active" id="new_followup" data-toggle="tab" aria-controls="new_followup1"
                        href="#new_followup1" role="tab" aria-selected="true">New Follow Up</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                @forelse($followup_records as $key => $followup_record)
                    <div class="tab-pane" id="fl{{ $key }}" role="tabpanel"
                        aria-labelledby="{{ $key }}">
                        <?php
                            $findings = explode(';', $followup_record->findings);
                            $recommendations = explode(';', $followup_record->remarks);
                        ?>
                        <div class="my-1">
                            <button type="button" class="btn btn-danger delete-followup"
                                id="{{ $followup_record->id }}"><i class="fa fa-trash"></i> Delete This Record</button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="p-1 border">
                                    <h3 class="font-weight-bold">Findings</h3>
                                    <div class="row">
                                        @foreach ($findings as $finding)
                                            <div class="col-md-6 my-50">
                                                <?php echo nl2br($finding) ?>
                                            </div>
                                        @endforeach
                                        @if ($exam_ecg)
                                            @if ($exam_ecg->ecg == 'Significant Findings')
                                                <div class="col-md-6 my-50">
                                                    ECG: <?php echo nl2br($exam_ecg->remarks) ?>
                                                </div>
                                            @endif
                                        @endif
                                        @if ($exam_xray)
                                            @if ($exam_xray->chest_remarks_status == 'findings')
                                                <div class="col-md-6 my-50">
                                                    Chest Xray: <?php echo nl2br($exam_xray->chest_findings) ?>
                                                </div>
                                            @endif
                                        @endif

                                        @if ($exam_xray)
                                            @if ($exam_xray->lumbosacral_remarks_status == 'findings')
                                                <div class="col-md-6 my-50">
                                                    Lumbosacral Xray: <?php echo nl2br($exam_xray->lumbosacral_findings) ?>
                                                </div>
                                            @endif
                                        @endif

                                        @if ($exam_xray)
                                            @if ($exam_xray->knees_remarks_status == 'findings')
                                                <div class="col-md-6 my-50">
                                                    Knees Xray
                                                    <?php echo nl2br($exam_xray->knees_findings) ?>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-1 border">
                                    <h3 class="font-weight-bold">Recommendations</h3>
                                    <div class="row">
                                        @foreach ($recommendations as $recommendation)
                                            <div class="col-md-6 my-50">
                                                @php echo nl2br($recommendation) @endphp
                                            </div>
                                        @endforeach
                                        @if ($exam_ecg)
                                            @if ($exam_ecg->ecg == 'Significant Findings')
                                                <div class="col-md-6 my-50">
                                                    ECG: @php echo nl2br($exam_ecg->recommendation) @endphp
                                                </div>
                                            @endif
                                        @endif
                                        @if ($exam_xray)
                                            @if ($exam_xray->chest_remarks_status == 'findings')
                                                <div class="col-md-6 my-50">
                                                    Chest Xray: @php echo nl2br($exam_xray->chest_recommendations) @endphp
                                                </div>
                                            @endif
                                        @endif

                                        @if ($exam_xray)
                                            @if ($exam_xray->lumbosacral_remarks_status == 'findings')
                                                <div class="col-md-6 my-50">
                                                    Lumbosacral Xray: @php echo nl2br($exam_xray->lumbosacral_recommendations) @endphp
                                                </div>
                                            @endif
                                        @endif

                                        @if ($exam_xray)
                                            @if ($exam_xray->knees_remarks_status == 'findings')
                                                <div class="col-md-6 my-50">
                                                    Knees Xray
                                                    @php echo nl2br($exam_xray->knees_recommendations) @endphp
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <div class="tab-pane active" id="new_followup1" role="tabpanel" aria-labelledby="new_followup">
                    <form action="/create_followup" method="post">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        <input type="hidden" name="admission_id" value="{{ $admissionPatient->id }}">
                        <div class="row p-1">
                            <div class="col-md-12 col-lg-8">
                                <div class="nav-vertical">
                                    <ul class="nav nav-tabs nav-left nav-border-left" id="child-basic-tabs"
                                        role="tablist">
                                        <li class="nav-item vertical-tab-border">
                                            <a class="nav-link child-basic-tab nav-link-width active"
                                                id="patient-findings32" data-toggle="tab"
                                                aria-controls="patient-findings" href="#patient-findings"
                                                role="tab" aria-selected="false">Findings</a>
                                        </li>
                                        <li class="nav-item vertical-tab-border">
                                            <a class="nav-link child-basic-tab nav-link-width"
                                                id="patient-recommendations32" data-toggle="tab"
                                                aria-controls="patient-recommendations"
                                                href="#patient-recommendations" role="tab"
                                                aria-selected="false">Reccomendation</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1">
                                        <div class="tab-pane active in" id="patient-findings"
                                            aria-labelledby="patient-findings32" role="tabpanel">
                                            @include('Patient.patient_findings', [
                                                $exam_audio,
                                                $exam_cardio,
                                                $exam_ecg,
                                                $exam_echodoppler,
                                                $exam_echoplain,
                                                $exam_ishihara,
                                                $exam_psycho,
                                                $exam_ppd,
                                                $exam_physical,
                                                $exam_psychobpi,
                                                $exam_stressecho,
                                                $exam_stresstest,
                                                $exam_ultrasound,
                                                $exam_dental,
                                                $exam_xray,
                                                $exam_blood_serology,
                                                $examlab_hiv,
                                                $examlab_drug,
                                                $examlab_feca,
                                                $examlab_hema,
                                                $examlab_hepa,
                                                $examlab_urin,
                                                $examlab_pregnancy,
                                                $examlab_misc,
                                            ])
                                        </div>
                                        <div class="tab-pane" id="patient-recommendations"
                                            aria-labelledby="patient-recommendations32" role="tabpanel">
                                            @include('Patient.patient_recommendations', [
                                                $exam_audio,
                                                $exam_cardio,
                                                $exam_ecg,
                                                $exam_echodoppler,
                                                $exam_echoplain,
                                                $exam_ishihara,
                                                $exam_psycho,
                                                $exam_ppd,
                                                $exam_physical,
                                                $exam_psychobpi,
                                                $exam_stressecho,
                                                $exam_stresstest,
                                                $exam_ultrasound,
                                                $exam_dental,
                                                $exam_xray,
                                                $exam_blood_serology,
                                                $examlab_hiv,
                                                $examlab_drug,
                                                $examlab_feca,
                                                $examlab_hema,
                                                $examlab_hepa,
                                                $examlab_urin,
                                                $examlab_pregnancy,
                                                $examlab_misc,
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="container-fluid my-1">
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Full Name</label>
                                        <input type="text" name="" id="" readonly
                                            value="{{ $patient->lastname }}, {{ $patient->firstname }} {{ $patient->middlename }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Patient Code</label>
                                        <input type="text" name="" id="" readonly
                                            value="{{ $patient->patientcode }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Date</label>
                                        <input type="date" name="date" id=""
                                            value="{{ date('Y-m-d') }}" class="form-control">
                                    </div>
                                    <button class="btn btn-primary float-right">Create
                                        Follow Up</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
