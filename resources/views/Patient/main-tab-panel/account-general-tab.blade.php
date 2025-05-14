<div role="tabpanel" class="tab-pane active" id="account-general" aria-labelledby="account-pill-general"
    aria-expanded="true">
    <section class="users-view">
        <!-- users view media object start -->
        <div class="row bg-white p-2">
            @if (Session::get('status'))
                @push('scripts')
                    <script>
                        toastr.success('{{ Session::get('status') }}', 'Success');
                    </script>
                @endpush
            @endif
            @if (Session::get('fail'))
                @push('scripts')
                    <script>
                        toastr.error('{{ Session::get('fail') }}', 'Failed');
                    </script>
                @endpush
            @endif
            <div class="col-md-10">
                <h3>Medical Records</h3>
                <div class="d-flex flex-wrap">
                    @foreach ($patientRecords as $record)
                        <div class="my-50">
                            @if ($patient->created_date != $record->created_date ? 'active' : null && session()->get('dept_id') == '1')
                                <button type="button" class="btn btn-danger remove-patient-record-btn"
                                    id="{{ $record->id }}">Remove</button>
                            @endif
                            <button
                                onclick="location.href = 'patient_edit?id={{ $record->id }}&patientcode={{ $record->patientcode }}'"
                                class="btn btn-outline-secondary mr-1 {{ $patient->created_date == $record->created_date ? 'active' : null }}">
                                {{ date_format(new DateTime($record->created_date), 'F d, Y h:i A') }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-2">
                @if ($admissionPatient)
                    <h3
                        class="font-bold badge p-1 float-right {{ $admissionPatient->admit_type == 'Normal' ? 'badge-secondary' : 'badge-warning' }}">
                        {{ $admissionPatient->admit_type }} Patient</h3>
                @endif
            </div>
        </div>
        @yield('content')
        <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel18" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel18"><i class="fa fa-camera"></i>
                            Take Picture
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <div class="camera"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-primary" onclick="snapShot()">Save
                            Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-linetriangle" role="tablist">
                            <li class="nav-item main-tab">
                                <a class="nav-link @php echo session()->get('dept_id') == " 1"
                                                            || session()->get('dept_id') == "17"
                                                            ? "active" : "" @endphp"
                                    id="baseIcon-tab31" data-toggle="tab" aria-controls="tabIcon31" href="#tabIcon31"
                                    role="tab"><i class="fa fa-user"></i>User
                                    Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main-tab" id="baseIcon-tab32" data-toggle="tab"
                                    aria-controls="tabIcon32" href="#tabIcon32" role="tab"><i
                                        class="fa fa-globe"></i>
                                    Agency Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main-tab" id="baseIcon-tab33" data-toggle="tab"
                                    aria-controls="tabIcon33" href="#tabIcon33" role="tab"><i
                                        class="fa fa-list-alt"></i>Medical History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main-tab" id="baseIcon-tab34" data-toggle="tab"
                                    aria-controls="tabIcon34" href="#tabIcon34" role="tab"><i
                                        class="fa fa-bars"></i>Declaration Form</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main-tab {{ session()->get('dept_id') != ' 1' ? 'active' : '' }}"
                                    id="baseIcon-tab35" data-toggle="tab" aria-controls="tabIcon35" href="#tabIcon35"
                                    role="tab"><i class="fa fa-file"></i>Basic & Special
                                    Exams</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main-tab" id="baseIcon-tab36" data-toggle="tab"
                                    aria-controls="tabIcon36" href="#tabIcon36" role="tab"><i
                                        class="fa fa-file"></i>Lab Exams</a>
                            </li>
                        </ul>
                        <div class="tab-content px-1 pt-1">
                            <div class="tab-pane main-content @php echo session()->get('dept_id') == " 1" ? "active" : "" @endphp"
                                id="tabIcon31" role="tabpanel" aria-labelledby="baseIcon-tab31">
                                @include('Patient.edit-patient-form.edit-patient-general')
                            </div>
                            <div class="tab-pane main-content" id="tabIcon32" role="tabpanel"
                                aria-labelledby="baseIcon-tab32">
                                @include('Patient.edit-patient-form.edit-patient-agency')
                            </div>
                            <div class="tab-pane main-content" id="tabIcon33" role="tabpanel"
                                aria-labelledby="baseIcon-tab33">
                                @include('Patient.medical_history')
                            </div>
                            <div class="tab-pane main-content" id="tabIcon34" role="tabpanel"
                                aria-labelledby="baseIcon-tab34">
                                @if ($patient->declaration_form == null)
                                    <h3 class="text-center font-weight-regular my-2">No Record Found</h3>
                                @else
                                    @include('Patient.edit-patient-form.edit-patient-dec')
                                @endif
                            </div>
                            <div class="tab-pane main-content @php echo session()->get('dept_id') != " 1" &&
                                                        session()->get('dept_id') != "17" && session()->get('dept_id') != "8" ? "active" : "" @endphp"
                                id="tabIcon35" role="tabpanel" aria-labelledby="baseIcon-tab35">
                                <div class="col-12">
                                    @if (!$admissionPatient)
                                        <div
                                            class="container d-flex justify-content-center align-items-center flex-column">
                                            <h3 class="text-center font-weight-regular my-2">
                                                Before entering this section, the patient needs
                                                to
                                                admit.
                                            </h3>
                                            <button id="admission-btn"
                                                class="btn btn-solid btn-primary text-center">Admit
                                                Now</button>
                                        </div>
                                    @else
                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-left nav-border-left" id="child-basic-tabs"
                                                role="tablist">
                                                <h4 class="font-weight-bold">Basic Exams</h4>
                                                @if (session()->get('dept_id') == '7' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_physical ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab9" data-toggle="tab"
                                                            href="#tabVerticalLeft9">Physical Exam
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '14' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_visacuity ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab16" data-toggle="tab"
                                                            href="#tabVerticalLeft16">Visual Acuity
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '9' || session()->get('dept_id') == '1' || session()->get('dept_id') == '8')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_dental ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab4" data-toggle="tab"
                                                            href="#tabVerticalLeft4">Dental</a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '5' || session()->get('dept_id') == '1' || session()->get('dept_id') == '8')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_psycho ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab10" data-toggle="tab"
                                                            href="#tabVerticalLeft10">Psychological</a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '15' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '6' ||
                                                        session()->get('dept_id') == '8')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_audio ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab1" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft1"
                                                            href="#tabVerticalLeft1">Audiometry</a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '14' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_ishihara ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab8" data-toggle="tab"
                                                            href="#tabVerticalLeft8">Ishihara</a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '4' || session()->get('dept_id') == '1' || session()->get('dept_id') == '8')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_xray ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab18" data-toggle="tab"
                                                            href="#tabVerticalLeft18">X-Ray
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '16' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '6' ||
                                                        session()->get('dept_id') == '8')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_ecg ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab5" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft5"
                                                            href="#tabVerticalLeft5">ECG
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '16' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6' ||
                                                        session()->get('dept_id') == '7')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_ppd ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab17" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft17"
                                                            href="#tabVerticalLeft17">PPD TEST
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (session()->get('dept_id') == '16' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6' ||
                                                        session()->get('dept_id') == '7')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_crf ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab2" data-toggle="tab"
                                                            href="#tabVerticalLeft2">Cardiac Risk Factor / <br>
                                                            Spirometry </a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_cardio ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab3" data-toggle="tab"
                                                            href="#tabVerticalLeft3">Cardiovascular</a>
                                                    </li>
                                                @endif

                                                <h4 class="font-weight-bold">Special Exams</h4>

                                                @if (session()->get('dept_id') == '16' ||
                                                        session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6' ||
                                                        session()->get('dept_id') == '6' ||
                                                        session()->get('dept_id') == '7')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_echodoppler ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab6" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft6" href="#tabVerticalLeft6">
                                                            2D Echo Doppler
                                                        </a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_echoplain ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab7" data-toggle="tab"
                                                            href="#tabVerticalLeft7">
                                                            2D Echo Plain
                                                        </a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_stressecho ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab12" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft12"
                                                            href="#tabVerticalLeft12">Stress
                                                            Echo </a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_stresstest ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab13" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft13"
                                                            href="#tabVerticalLeft13">Stress
                                                            Test </a>
                                                    </li>
                                                @endif

                                                <li class="nav-item vertical-tab-border d-none">
                                                    <a class="nav-link child-basic-tab nav-link-width {{ $exam_psychobpi ? 'exam-done' : null }}"
                                                        id="baseVerticalLeft1-tab11" data-toggle="tab"
                                                        aria-controls="tabVerticalLeft11" href="#tabVerticalLeft11"
                                                        role="tab" aria-selected="false">BPI
                                                        Psycho </a>
                                                </li>


                                                @if (session()->get('dept_id') == '4' || session()->get('dept_id') == '1' || session()->get('dept_id') == '8')
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-basic-tab nav-link-width {{ $exam_ultrasound ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab14" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft14"
                                                            href="#tabVerticalLeft14">Ultrasound</a>
                                                    </li>
                                                @endif

                                            </ul>
                                            <div class="tab-content px-1">
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft1"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab1">
                                                    @if (!$exam_audio)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_audiometry?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('Audiometry.view-audiometry', [
                                                            $exam_audio,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft2"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab2">
                                                    <div class="row">
                                                        @if (!$exam_crf)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient
                                                                        has
                                                                        no
                                                                        record
                                                                        in
                                                                        this exam. Do you want
                                                                        to add a
                                                                        record?
                                                                    </h2>
                                                                    <a href="/add_crf?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('CardiacRiskFactor.view-crf', [
                                                                $exam_crf,
                                                            ])
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft3"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab3">
                                                    @if (!$exam_cardio)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_cardiovascular?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('CardioVascular.view-cardiovascular', [
                                                            $exam_cardio,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft4"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab4">
                                                    @if (!$exam_dental)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_dental?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('Dental.view-dental', [$exam_dental])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft5"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab5">
                                                    @if (!$exam_ecg)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_ecg?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('ECG.view-ecg', [$exam_ecg])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft17"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab17">
                                                    @if (!$exam_ppd)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_ppd?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('PPD.view-ppd', [$exam_ppd])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft6"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab6">
                                                    @if (!$exam_echodoppler)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_echodoppler?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('EchoDoppler.view-echodoppler', [
                                                            $exam_echodoppler,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft7"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab7">
                                                    @if (!$exam_echoplain)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_echoplain?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('EchoPlain.view-echoplain', [
                                                            $exam_echoplain,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft8"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab8">
                                                    @if (!$exam_ishihara)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_ishihara?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('Ishihara.view-ishihara', [
                                                            $exam_ishihara,
                                                        ])
                                                    @endif
                                                </div>
                                                @if (session()->get('dept_id') == '1' ||
                                                        session()->get('dept_id') == '7' ||
                                                        session()->get('dept_id') == '8' ||
                                                        session()->get('dept_id') == '6')
                                                    <div class="tab-pane child-basic-content my-1"
                                                        id="tabVerticalLeft9" role="tabpanel"
                                                        aria-labelledby="baseVerticalLeft1-tab9">
                                                        @if (!$exam_physical)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_physical?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Physical.view-physical', [
                                                                $exam_physical,
                                                            ])
                                                        @endif
                                                    </div>
                                                @endif
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft10"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab10">
                                                    @if (!$exam_psycho)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_psycho?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('Psychological.view-psycho', [
                                                            $exam_psycho,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft11"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab11">
                                                    @if (!$exam_psychobpi)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_psychobpi?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('PsychoBPI.view-psychobpi', [
                                                            $exam_psychobpi,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft12"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab12">
                                                    @if (!$exam_stressecho)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_stressecho?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('StressEcho.view-stressecho', [
                                                            $exam_stressecho,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft13"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab13">
                                                    @if (!$exam_stresstest)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_stresstest?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('StressTest.view-stresstest', [
                                                            $exam_stresstest,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content @php echo session()->get('dept_id') == "
                                                                        4" ? "active" : "" @endphp"
                                                    id="tabVerticalLeft14" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft1-tab14">
                                                    @if (!$exam_ultrasound)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_ultrasound?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('Ultrasound.view-ultrasound', [
                                                            $exam_ultrasound,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft16"
                                                    role="tabpanel" varia-labelledby="baseVerticalLeft1-tab16">
                                                    @if (!$exam_visacuity)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_visacuity?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('Visacuity.view-visacuity', [
                                                            $exam_visacuity,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="tab-pane child-basic-content" id="tabVerticalLeft18"
                                                    role="tabpanel" aria-labelledby="baseVerticalLeft1-tab18">
                                                    @if (!$exam_xray)
                                                        <div class="container">
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                <h2 class="text-center">This
                                                                    patient has
                                                                    no
                                                                    record in
                                                                    this
                                                                    exam. Do you want to add a
                                                                    record?
                                                                </h2>
                                                                <a href="/add_xray?id={{ $admissionPatient->id }}"
                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @include('XRay.view-xray', [$exam_xray])
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane main-content" id="tabIcon36" role="tabpanel"
                                aria-labelledby="baseIcon-tab36">
                                <div class="col-md-12">
                                    @if ($admissionPatient == null)
                                        <div
                                            class="container d-flex justify-content-center align-items-center flex-column">
                                            <h3 class="text-center font-weight-regular my-2">
                                                Before entering this section, the patient needs
                                                to
                                                admit.
                                            </h3>
                                            <a href="create_admission?id={{ $patient->id }}&patientcode={{ $patient->patientcode }}"
                                                class="btn btn-solid btn-primary text-center">Admit
                                                Now</a>
                                        </div>
                                    @else
                                        <div class="nav-vertical">
                                            @if (session()->get('dept_id') == '3' || session()->get('dept_id') == '1' || session()->get('dept_id') == '8')
                                                <ul class="nav nav-tabs nav-left nav-border-left" role="tablist">
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_hema ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab25" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft25"
                                                            href="#tabVerticalLeft25">Hematology
                                                        </a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_urin ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab28" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft28"
                                                            href="#tabVerticalLeft28">Urinalysis</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_pregnancy ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab27" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft27"
                                                            href="#tabVerticalLeft27">Pregnancy</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_feca ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab24" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft24"
                                                            href="#tabVerticalLeft24">Fecalysis</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width  {{ $exam_blood_serology ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab21" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft21"
                                                            href="#tabVerticalLeft21" role="tab"
                                                            aria-selected="true">Blood
                                                            Chemistry</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_hepa ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab26" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft26"
                                                            href="#tabVerticalLeft26">Serology</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_hiv ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab22" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft22"
                                                            href="#tabVerticalLeft22">HIV</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_drug ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab23" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft23"
                                                            href="#tabVerticalLeft23">Drug
                                                            Test</a>
                                                    </li>
                                                    <li class="nav-item vertical-tab-border">
                                                        <a class="nav-link child-lab-tab nav-link-width {{ $examlab_misc ? 'exam-done' : null }}"
                                                            id="baseVerticalLeft1-tab29" data-toggle="tab"
                                                            aria-controls="tabVerticalLeft29"
                                                            href="#tabVerticalLeft29">Miscellaneous</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content px-1">
                                                    <div class="tab-pane" id="tabVerticalLeft21"
                                                        role="tabpanel child-lab-content"
                                                        aria-labelledby="baseVerticalLeft1-tab21">
                                                        @if (!$exam_blood_serology)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_bloodsero?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Blood_Serology.view-bloodserology')
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft22"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab22">
                                                        @if (!$examlab_hiv)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_hiv?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('HIV.view-hiv', [$examlab_hiv])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft23"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab23">
                                                        @if (!$examlab_drug)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_drug?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Drug.view-drug', [$examlab_drug])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft24"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab24">
                                                        @if (!$examlab_feca)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_fecalysis?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Fecalysis.view-fecalysis', [
                                                                $examlab_feca,
                                                            ])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft25"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab25">
                                                        @if (!$examlab_hema)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_hematology?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Hematology.view-hematology', [
                                                                $examlab_hema,
                                                            ])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft26"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab26">
                                                        @if (!$examlab_hepa)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_hepatitis?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Hepatitis.view-hepatitis', [
                                                                $examlab_hepa,
                                                            ])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft27"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab27">
                                                        @if (!$examlab_pregnancy)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_pregnancy?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Pregnancy.view-pregnancy', [
                                                                $examlab_pregnancy,
                                                            ])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft28"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab28">
                                                        @if (!$examlab_urin)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_urinalysis?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Urinalysis.view-urinalysis', [
                                                                $examlab_urin,
                                                            ])
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft29"
                                                        role="tabpanel" aria-labelledby="baseVerticalLeft1-tab29">
                                                        @if (!$examlab_misc)
                                                            <div class="container">
                                                                <div
                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                    <h2 class="text-center">
                                                                        This patient has
                                                                        no
                                                                        record in
                                                                        this
                                                                        exam. Do you want to add
                                                                        a record?
                                                                    </h2>
                                                                    <a href="/add_misc?id={{ $admissionPatient->id }}"
                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @include('Miscellaneous.view-misc', [
                                                                $examlab_misc,
                                                            ])
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
