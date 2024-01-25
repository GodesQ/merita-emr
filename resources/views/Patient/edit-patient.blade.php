@extends('layouts.admin-layout')

@section('name')
    {{ $data['employeeFirstname'] . ' ' . $data['employeeLastname'] }}
@endsection

@section('employee_image')
    @if ($data['employee_image'] != null || $data['employee_image'] != '')
        <img src="../../../app-assets/images/employees/{{ $data['employee_image'] }}" alt="avatar">
    @else
        <img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
    @endif
@endsection

@section('content')
    <style>
        .table td {
            font-size: 11px;
        }

        .table th,
        .table td {
            padding: 0.5rem;
        }

        .exam-done {
            color: #156f29 !important;
            font-weight: 600 !important;
        }

        .other-specify-con {
            display: none;
        }

        .to_upper {
            text-transform: uppercase;
        }

        .remove {
            display: none;
        }

        .prescription-group {
            display: none;
        }

        .show-med {
            display: block !important;
        }
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- users view start -->
                @if (Session::get('yellow_card_success'))
                    <script>
                        window.open('/yellow_card_print?id={{ $patient->id }}', 'wp', 'width=1000,height=800');
                    </script>
                @endif
                <div class="row">
                    <div class="col-xl-9 order-lg-2 order-xl-1 order-sm-2 order-xs-2 col-lg-12">
                        <div class="tab-content">
                            @include('Patient.main-tab-panel.account-general-tab')

                            @include('Patient.main-tab-panel.account-referral-tab')

                            @include('Patient.main-tab-panel.account-invoice-tab')

                            @include('Patient.main-tab-panel.account-reschedule-tab')

                            @if ($admissionPatient)
                                @include('Patient.main-tab-panel.account-followup-tab')
                            @endif

                            @if ($admissionPatient)
                                @include('Patient.main-tab-panel.account-print-panel-tab')
                            @endif

                            @include('Patient.main-tab-panel.account-admission-tab')

                            @include('Patient.main-tab-panel.account-vaccination-record-tab')
                        </div>
                    </div>
                    <div class="col-xl-3 order-lg-1 order-xl-2 order-sm-1 order-xs-1 col-lg-12 position-relative">
                        <div class="row p-50 rounded" style="background: #091a3b">
                            <div class="col-lg-3 col-md-4 col-xl-12">
                                <div class="row my-1">
                                    <div
                                        class="col-md-12 col-xl-5 col-lg-12 d-xl-flex align-items-center justify-content-center">
                                        <button class="btn btn-solid p-0 open-camera" onclick="openCamera()">
                                            @if (
                                                $patient->patient_image == null ||
                                                    $patient->patient_image == '' ||
                                                    !file_exists(public_path('app-assets/images/profiles/') . $patient->patient_image))
                                                <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                    alt="Profile Picture" data-toggle="modal" data-target="#defaultSize"
                                                    class="users-avatar-shadow rounded" height="110" width="110">
                                            @else
                                                <img src="../../../app-assets/images/profiles/{{ $patient->patient_image . '?' . $patient->updated_date }}"
                                                    data-toggle="modal" data-target="#defaultSize" alt="Profile Picture"
                                                    class="users-avatar-shadow" height="110" width="110">
                                            @endif
                                        </button>
                                    </div>
                                    <div class="col-md-12 col-xl-6 col-lg-12 mx-50">
                                        <div class="pt-25">
                                            <div class="d-flex justify-content-start align-items-end my-25">
                                                @if ($patient->patient_signature)
                                                    <img src="@php echo base64_decode($patient->patient_signature) @endphp"
                                                        class="signature-taken" style="position: relative !important;" />
                                                @elseif ($patient->signature)
                                                    <img src="data:image/jpeg;base64,{{ $patient->signature }}"
                                                        class="signature-taken" />
                                                @else
                                                    <div style="width: 150px;height: 40px;" class="bg-white rounded">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-50">
                                                <a href="/patient_edit/crop_signature?patient_id={{ $patient->id }}"
                                                    style="" class="btn btn-primary btn-sm">
                                                    Edit Signature <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div> <span class="text-white font-weight-bold">
                                                    {{ $patient->firstname . ' ' . $patient->lastname }}
                                                </span>
                                            </div>
                                            <div class="users-view-id text-white">PATIENT ID: {{ $patient->patientcode }}
                                            </div>
                                            <div class="text-white">ADMISSION ID:
                                                {{ $admissionPatient ? $admissionPatient->id : 'N / A' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xl-12 mt-sm-2">
                                @include('Patient.main-pill-panel')
                            </div>
                            @if ($admissionPatient)
                                <div class="col-lg-5 col-md-4 col-xl-12 my-1">
                                    <h5 class="text-white">MEDICAL STATUS:
                                        <span><b>
                                                @if ($admissionPatient->lab_status == 2)
                                                    <b><u>FIT TO WORK</u></b>
                                                @elseif ($admissionPatient->lab_status == 1)
                                                    <b><u>FINDINGS / RE ASSESSMENT</u></b>
                                                @elseif ($admissionPatient->lab_status == 3)
                                                    <b><u>UNFIT TO WORK</u></b>
                                                @elseif ($admissionPatient->lab_status == 4)
                                                    <b><u>UNFIT TEMPORARILY</u></b>
                                                @endif
                                            </b></span>
                                    </h5>
                                    <div class="my-1">
                                        <button type="button"
                                            class="medical-status-btn btn btn-sm p-75 m-25 text-white btn-outline-primary {{ $admissionPatient->lab_status == 1 ? 'active' : null }}"
                                            data-toggle="modal" data-target="#medicalStatusModal"
                                            id="pending_medical_status_btn" data-status="pending">
                                            PENDING
                                        </button>
                                        <button type="button"
                                            class="medical-status-btn btn btn-sm p-75 m-25 text-white btn-outline-primary {{ $admissionPatient->lab_status == 2 ? 'active' : null }}"
                                            data-toggle="modal" data-target="#medicalStatusModal"
                                            id="fit_medical_status_btn" data-status="fit">
                                            FIT
                                        </button>
                                        <button type="button"
                                            class="medical-status-btn btn btn-sm p-75 m-25 text-white btn-outline-primary {{ $admissionPatient->lab_status == 3 ? 'active' : null }}"
                                            data-toggle="modal" data-target="#medicalStatusModal"
                                            id="unfit_medical_status_btn" data-status="unfit">
                                            UNFIT
                                        </button>
                                        <button type="button"
                                            class="medical-status-btn btn btn-sm p-75 m-25 text-white btn-outline-primary {{ $admissionPatient->lab_status == 4 ? 'active' : null }}"
                                            data-toggle="modal" data-target="#medicalStatusModal"
                                            id="unfit_temp_medical_status_btn" data-status="unfit_temp">
                                            UNFIT TEMP
                                        </button>
                                        @if ($admissionPatient->lab_status)
                                            <button class="btn btn-outline-warning medical-status-btn"
                                                id="reset-medical-status-btn">Reset</button>
                                        @endif
                                    </div>
                                    <div class="modal fade text-left" id="medicalStatusModal" role="dialog"
                                        aria-labelledby="modalStatusFormLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modalStatusFormLabel">
                                                        Medical Status
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <button class="btn btn-primary add_new_medical_result_btn">Add New
                                                            Medical Result</button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="d-flex justify-content-center align-items-center flex-column"
                                                                style="gap: 10px;">
                                                                @if (count($patient_medical_results) > 0)
                                                                    @foreach ($patient_medical_results as $medical_result)
                                                                        <div>
                                                                            <button
                                                                                class="btn btn-outline-primary medical_result_btn"
                                                                                id="{{ $medical_result->id }}">
                                                                                {{ date_format(new DateTime($medical_result->generate_at), 'M d, Y') }}
                                                                                <br>
                                                                                @if ($medical_result->status == 2)
                                                                                    (FIT TO WORK)
                                                                                @elseif ($medical_result->status == 1)
                                                                                    (RE ASSESSMENT)
                                                                                @elseif ($medical_result->status == 3)
                                                                                    (UNFIT TO WORK)
                                                                                @elseif ($medical_result->status == 4)
                                                                                    (UNFIT TEMPORARILY)
                                                                                @endif
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-sm btn-danger btn-block remove_medical_result_btn"
                                                                                data-id="{{ $medical_result->id }}">Remove</button>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <h6>No Medical Result</h6>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <form id="update_lab_result_pending" action="#"
                                                                method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="form-label">Lab Status Name</label>
                                                                    <input type="text" name="lab_status_name"
                                                                        class="form-control" id="lab_status_name"
                                                                        readonly>
                                                                </div>
                                                                <input type="hidden" name="lab_status" value="1"
                                                                    id="lab_status">
                                                                <input type="hidden" name="patientId"
                                                                    value="{{ $patient->id }}">
                                                                <input type="hidden" name="medical_result_id"
                                                                    id="medical_result_id">
                                                                <input type="hidden" name="agency_id"
                                                                    value="{{ $patientInfo->agency_id }}">
                                                                <input type="hidden" name="id"
                                                                    value="@php echo $admissionPatient ? $admissionPatient->id : null @endphp">
                                                                <div class="form-group">
                                                                    <label for="">Generate at:
                                                                        <span style="font-size: 12px;"
                                                                            class="primary">This is the date when you
                                                                            submitted this form. </span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="generate_at"
                                                                        id="medical_result_generate_at">
                                                                </div>
                                                                <div class="form-group schedule_group">
                                                                    <label>Re Schedule</label>
                                                                    <input class="form-control" type="date"
                                                                        name="schedule" id="schedule" />
                                                                </div>
                                                                {{-- <div class="form-group unfit_date_group">
                                                                    <label>Unfit Date</label>
                                                                    <input class="form-control"
                                                                        value="{{ $patient->unfit_to_work_date }}"
                                                                        type="date" name="unfit_date" id="unfit_date" />
                                                                </div> --}}
                                                                <div class="form-group medical_result_remarks_group">
                                                                    <label for="medical_result_remarks"
                                                                        id="remarks-label">Remarks:</label>
                                                                    <textarea name="remarks" id="medical_result_remarks" cols="30" rows="10" class="form-control">{{ $patient->admission->remarks ?? null }}</textarea>
                                                                </div>
                                                                <div class="form-group medical_result_prescription_group">
                                                                    <label
                                                                        for="medical_result_prescription">Prescription:</label>
                                                                    <textarea name="prescription" id="medical_result_prescription" cols="30" rows="10" class="form-control">{{ $patient->admission->prescription ?? null }}</textarea>
                                                                </div>
                                                                <div class="form-group doctor_prescription_group">
                                                                    <label for="doctor_prescription">Doctor
                                                                        Prescription</label>
                                                                    <select required name="doctor_prescription"
                                                                        id="doctor_prescription" class="select2">
                                                                        @foreach ($doctors as $doctor)
                                                                            <option value="{{ $doctor->id }}">
                                                                                {{ $doctor->firstname . ' ' . $doctor->lastname . ' ' . "($doctor->position)" }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="reset"
                                                                        class="btn btn-outline-secondary btn-lg"
                                                                        data-dismiss="modal" value="close">
                                                                    <button
                                                                        {{ session()->get('dept_id') == 1 ? null : 'disabled' }}
                                                                        type='submit'
                                                                        class='submit-pending btn btn-primary btn-lg'>Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <label class="modal-title text-text-bold-600"
                                                        id="myModalLabel33">Laboratory Result</label>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="update_lab_result_reassessment" action="#" method="POST">
                                                    @csrf
                                                    @include('Patient.patient_findings', [
                                                        $exam_audio,
                                                        $exam_cardio,
                                                        $exam_ecg,
                                                        $exam_echodoppler,
                                                        $exam_echoplain,
                                                        $exam_ishihara,
                                                        $exam_psycho,
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
                                                    <div class="modal-body">
                                                        <input type="hidden" name="lab_status" value="1">
                                                        <input type="hidden" name="patientId"
                                                            value="{{ $patient->id }}">
                                                        <input type="hidden" name="agency_id"
                                                            value="{{ $patientInfo->agency_id }}">
                                                        <input type="hidden" name="id"
                                                            value="@php echo $admissionPatient ? $admissionPatient->id : null @endphp">
                                                        <input type="hidden" name="schedule_id"
                                                            value="@php echo $latest_schedule ? $latest_schedule->id : null @endphp">
                                                        <div class="form-group">
                                                            <label for="">Remarks/Recommendations:</label>
                                                            <textarea name="remarks" id="" cols="30" rows="10" class="form-control">@php echo $admissionPatient ? $admissionPatient->remarks : null @endphp</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Next Schedule Date: </label>
                                                            <input type="date" max="2050-12-31" name="schedule"
                                                                class="form-control"
                                                                value="{{ $latest_schedule ? $latest_schedule->date : null }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Doctor Prescription</label>
                                                            <select required name="doctor_prescription" id=""
                                                                class="select2">
                                                                @foreach ($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}">
                                                                        {{ $doctor->firstname . ' ' . $doctor->lastname . ' ' . "($doctor->position)" }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Prescription</label>
                                                            <textarea name="prescription" id="" cols="30" rows="7" class="form-control">{{ $admissionPatient ? $admissionPatient->prescription : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="reset" class="btn btn-outline-secondary btn-lg"
                                                            data-dismiss="modal" value="close">
                                                        <button {{ session()->get('dept_id') == 1 ? null : 'disabled' }}
                                                            type='submit'
                                                            class='submit-reassessment btn btn-primary btn-lg'>Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12 col-xl-12 my-1">
                                <div class="container-fluid">
                                    <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link primary active" id="home-tab1" data-toggle="tab"
                                                href="#home1" aria-controls="home1" role="tab"
                                                aria-selected="true">Completed Exams</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link primary" id="profile-tab1" data-toggle="tab"
                                                href="#profile1" aria-controls="profile1" role="tab"
                                                aria-selected="false">On Going Exams</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        <div class="tab-pane active" id="home1" aria-labelledby="home-tab1"
                                            role="tabpanel">
                                            <div class="row">
                                                @if ($completed_exams)
                                                    @foreach ($completed_exams as $key => $patient_exam)
                                                        <div class="col-md-6 col-xl-12 my-50">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        name="customCheck" id="customCheck1" checked
                                                                        disabled>
                                                                    <label class="custom-control-label text-white"
                                                                        for="customCheck1">{{ $key }}</label>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="white">No Exams Found</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane in" id="profile1" aria-labelledby="profile-tab1"
                                            role="tabpanel">
                                            <div class="row">
                                                @if ($on_going_exams)
                                                    @foreach ($on_going_exams as $key => $patient_exam)
                                                        <div class="col-md-6 col-xl-12 my-50">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox ">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        name="customCheck" id="customCheck1" disabled>
                                                                    <label class="custom-control-label text-white"
                                                                        style="word-break: break-all;"
                                                                        for="customCheck1">{{ $key }}</label>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="white">No Exams Found</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#admission-btn').addEventListener('click', () => {
            document.querySelector('#account-pill-info').click();
        })
    </script>

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <script src="../../../app-assets/js/scripts/signature_pad-master/js/signature_pad.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script type="text/javascript" src="https://www.sigplusweb.com/SigWebTablet.js"></script>
    <script src="../../../app-assets/js/scripts/custom.js"></script>

    <script>
        let agency = document.querySelector('#agency');
        let bahia_ids = [55, 57, 58, 59, 3];
        let vessels = {
            55: ['BOLETTE', 'BRAEMAR', 'MS BOLETTE', 'MS BRAEMAR'],
            57: ['BALMORAL', 'BOREALIS', 'MS BALMORAL', 'MS BOREALIS'],
            58: ['BLUETERN', 'BOLDTERN', 'BRAVETERN'],
            3: ['BLUETERN', 'BOLDTERN', 'BRAVETERN', 'BALMORAL', 'BOREALIS', 'MS BALMORAL', 'MS BOREALIS', 'BOLETTE',
                'BRAEMAR', 'MS BOLETTE', 'MS BRAEMAR'
            ]
        };

        let hartmann_principals = ['DONNELLY TANKER MANAGEMENT LTD', 'INTERNSHIP NAVIGATION CO. LTD',
            'HARTMANN GAS CARRIER GERMANY GMBH & CO. KG.', 'SEAGIANT SHIPMANAGEMENT LTD.'
        ];

        function selectOccupation(e) {
            if (e.value == 'OTHER' || e == 'OTHER') {
                $('.occupation_other_container').css('display', 'block');
            } else {
                $('.occupation_other_container').css('display', 'none');
            }
        }

        function selectReligion(e) {
            if (e.value == 'OTHERS' || e == 'OTHERS') {
                $('.religion_other_container').css('display', 'block');
            } else {
                $('.religion_other_container').css('display', 'none');
            }
        }

        function showMeds(e) {
            let prescriptionGroup = document.querySelector('.prescription-group');
            if (prescriptionGroup.classList.contains('show-med')) {
                e.innerHTML = 'Show Med';
                prescriptionGroup.classList.remove('show-med');
            } else {
                e.innerHTML = 'Hide Med';
                prescriptionGroup.classList.add('show-med');
            }
        }

        function getPackages(e) {
            let csrf = '{{ csrf_token() }}';
            $.ajax({
                url: '{{ route('agencies.select') }}',
                method: 'post',
                data: {
                    id: e.value,
                    _token: csrf
                },
                success: function(response) {
                    $('#address_of_agency').val(response[1].address);
                    $('#packages option').remove();
                    response[0].forEach(element => {
                        $(`<option value=${element.id}>${element.packagename}</option>`).appendTo(
                            '#packages');
                    });
                    if (bahia_ids.includes(response[1].id)) {
                        getBahiaVessels(response[1], false);
                    } else {
                        $('.bahia-vessel').addClass('remove');
                        $('.natural-vessel').removeClass('remove');
                    }

                    if (response[1].id == 9) {
                        getHartmannPrincipals(false);
                    } else {
                        $('.hartmann-principal').addClass('remove');
                        $('.natural-principal').removeClass('remove');
                    }
                }
            });
        }

        window.addEventListener('load', () => {
            selectOccupation('{{ $patientInfo->occupation }}');
            selectReligion('{{ $patientInfo->religion }}');
            let category = document.querySelector('#admission_category');
            isOtherServices(category);

            if ('{{ Session::get('redirect') }}' != '') {
                let baseString = '{{ Session::get('redirect') }}';
                let directions = baseString.split(";");

                if (directions[0] == 'basic-exam') {
                    document.querySelector('#baseIcon-tab35').click();
                    document.querySelector(`#${directions[3]}`).click();
                } else {
                    document.querySelector('#baseIcon-tab36').click();
                    document.querySelector(`#${directions[3]}`).click();
                }

            }
        });

        function getHartmannPrincipals(isFirst) {
            $('.hartmann-principal').removeClass('remove');
            $('.natural-principal').addClass('remove');
            let selected_principal = $('.hartmann-select-principals').val();
            $('.hartmann-select-principals option').remove();
            console.log(selected_principal);
            if (isFirst) {
                hartmann_principals.forEach(principal => {
                    if (selected_principal == principal) {
                        console.log('same');
                        $(`<option selected value='${principal}'>${principal}</option>`).appendTo(
                            '.hartmann-select-principals');
                    } else {
                        $(`<option value='${principal}'>${principal}</option>`).appendTo(
                            '.hartmann-select-principals');
                    }
                });
            } else {
                hartmann_principals.forEach(principal => {
                    $(`<option value='${principal}'>${principal}</option>`).appendTo(
                        '.hartmann-select-principals');
                });
            }
        }

        function getBahiaVessels(info, isFirst) {
            $('.bahia-vessel').removeClass('remove');
            $('.natural-vessel').addClass('remove');
            let selected_vessel = '{{ $patientInfo->vessel }}';
            $('.bahia-select-vessels option').remove();

            let currentVessels = vessels[info.id] || [];

            currentVessels.forEach(vessel => {
                let isSelected = isFirst && selected_vessel == vessel;
                $(`<option ${isSelected ? 'selected' : ''} value='${vessel}'>${vessel}</option>`).appendTo(
                    '.bahia-select-vessels');
            });
        }

        $('.remove-patient-record-btn').click(function(e) {
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure you want to delete it?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete_patient_record',
                        method: 'DELETE',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            if (response.status) {
                                Swal.fire(
                                    'Deleted!',
                                    'Record has been deleted.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })
        });

        $(".delete-followup").click(function() {
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure you want to delete it?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/destroy_followup',
                        method: 'POST',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            if (response.status == 201) {
                                Swal.fire(
                                    'Deleted!',
                                    'Record has been deleted.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    }).done(function(data) {
                        $(this).html(
                            "<button type='button' class='btn btn-solid btn-success'>FIT TO WORK</button>"
                        )
                    });
                }
            })
        });

        $("#update_lab_result_pending").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $(".submit-pending").html(
                "<button type='submit' class='submit-pending btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>"
            );
            $.ajax({
                url: '/update_lab_result',
                method: "POST",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Record has been updated.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire(
                            'Error Occured!',
                            'Internal Server Error.',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                }
            }).done(function(data) {
                $(this).html(
                    "<input type='submit' class='submit-unfit btn btn-primary btn-lg' value='Submit'>")
            });
        })

        $('.medical-status-btn').click(function(e) {
            $('.add_new_medical_result_btn').click();

            let data_status = e.target.getAttribute('data-status');
            switch (data_status) {
                case 'pending':
                    $('#lab_status_name').val('Pending');
                    $('#lab_status').val(1);
                    $('.unfit_date_group').hide();
                    $('.schedule_group').show();
                    $('.medical_result_prescription_group').show();
                    $('.doctor_prescription_group').show();
                    break;

                case 'fit':
                    $('#lab_status_name').val('Fit');
                    $('#lab_status').val(2);
                    $('.unfit_date_group').hide();
                    $('.schedule_group').hide();
                    $('.medical_result_prescription_group').show();
                    $('.doctor_prescription_group').show();
                    break;

                case 'unfit':
                    $('#lab_status_name').val('Unfit');
                    $('#lab_status').val(3);
                    $('.unfit_date_group').show();
                    $('.schedule_group').hide();
                    $('.medical_result_prescription_group').hide();
                    $('.doctor_prescription_group').hide();
                    break;

                case 'unfit_temp':
                    $('#lab_status_name').val('Unfit Temporarily');
                    $('#lab_status').val(4);
                    $('.unfit_date_group').hide();
                    $('.schedule_group').show();
                    $('.medical_result_prescription_group').show();
                    $('.doctor_prescription_group').show();
                    break;

                default:
                    break;
            }
        });

        $('#reset-medical-status-btn').click(function(e) {
            e.preventDefault();
            $("#reset-medical-status-btn").html(
                "<button type='button' class='btn btn-warning'><i class='fa fa-refresh spinner'></i> Reset</button>"
            );

            $.ajax({
                url: '/update_lab_result',
                method: "POST",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "id": '{{ $patient->admission_id }}',
                    "lab_status": 0
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Record has been updated.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire(
                            'Error Occured!',
                            'Internal Server Error.',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                }
            }).done(function(data) {
                $(this).html(
                    "<input type='submit' class='submit-fit btn btn-primary btn-lg' value='Submit'>")
            });
        })

        $("#update_lab_result_unfittemp").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $(".submit-unfittemp").html(
                "<button type='submit' class='submit-unfittemp btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>"
            );
            $.ajax({
                url: '/update_lab_result',
                method: "POST",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Record has been updated.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire(
                            'Error Occured!',
                            'Internal Server Error.',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                }
            }).done(function(data) {
                $(this).html(
                    "<input type='submit' class='submit-unfittemp btn btn-primary btn-lg' value='Submit'>"
                )
            });
        });

        let medical_result_btns = document.querySelectorAll('.medical_result_btn');

        medical_result_btns.forEach(medical_result_btn => {
            medical_result_btn.addEventListener('click', function(e) {
                let id = e.target.getAttribute('id');
                let clickedButton = $(e.target); // Wrap e.target in a jQuery object

                // clickedButton.innerHTML = clickedButton;
                if (id) {
                    let spinner = $(" <i class='fa fa-refresh spinner'></i>");
                    clickedButton.append(spinner);
                    clickedButton.prop("disabled", true);
                    $.ajax({
                        url: `/get_patient_medical_result/${id}`,
                        method: "GET",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                $('#medical_result_remarks').val(response.medical_result
                                    .remarks);
                                $('#medical_result_prescription').val(response.medical_result
                                    .prescription);
                                $('#medical_result_id').val(response.medical_result.id);
                                $('#medical_result_generate_at').val(response.medical_result
                                    .generate_at);
                                e.target.setAttribute('id', response.medical_result.id);
                                // Remove the classes from all buttons
                                $('.medical_result_btn').removeClass('btn-primary').addClass(
                                    'btn-outline-primary');

                                const statusMapping = {
                                    '1': {
                                        name: 'Pending',
                                        value: 1,
                                        unfitDate: false,
                                        schedule: true,
                                        medicalPrescription: true,
                                        doctorPrescription: true
                                    },
                                    '2': {
                                        name: 'Fit',
                                        value: 2,
                                        unfitDate: false,
                                        schedule: false,
                                        medicalPrescription: true,
                                        doctorPrescription: true
                                    },
                                    '3': {
                                        name: 'Unfit',
                                        value: 3,
                                        unfitDate: true,
                                        schedule: false,
                                        medicalPrescription: false,
                                        doctorPrescription: false
                                    },
                                    '4': {
                                        name: 'Unfit Temporarily',
                                        value: 4,
                                        unfitDate: false,
                                        schedule: true,
                                        medicalPrescription: true,
                                        doctorPrescription: true
                                    },
                                };

                                const result = response.medical_result;
                                const mapping = statusMapping[result.status] || {};

                                $('#lab_status_name').val(mapping.name || '');
                                $('#lab_status').val(mapping.value || 0);

                                $('.unfit_date_group').toggle(mapping.unfitDate);
                                $('.schedule_group').toggle(mapping.schedule);
                                $('.medical_result_prescription_group').toggle(mapping
                                    .medicalPrescription);
                                $('.doctor_prescription_group').toggle(mapping
                                    .doctorPrescription);

                                // Add the class to the clicked button
                                clickedButton.removeClass('btn-outline-primary').addClass(
                                    'btn-primary');
                            } else {
                                Swal.fire('Not Found!', 'No Medical Result Found', 'error');
                            }
                        }
                    }).done(function(data) {
                        spinner.remove();
                        clickedButton.prop("disabled", false);
                    });
                }
            });
        });

        $('.remove_medical_result_btn').click(function(e) {
            let id = e.target.getAttribute('data-id');
            let csrf = '{{ csrf_token() }}';

            Swal.fire({
                title: 'Are you sure?',
                text: "Remove medical result",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00b5b8',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/delete_patient_medical_result`,
                        method: "DELETE",
                        data: {
                            _token: csrf,
                            id: id
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Success!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }
                        }
                    })
                }
            })
        });


        // Wait for the page to load
        $(document).ready(function() {
            $('.add_new_medical_result_btn').click(function(e) {
                $('#medical_result_remarks').val('');
                $('#medical_result_prescription').val('');
                $('#medical_result_id').val('');
                $('#medical_result_generate_at').val('');
            });
        });

        function getAge(e) {
            var today = new Date();
            var birthDate = new Date(e.value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            const ageInput = document.querySelector("#age");
            ageInput.value = age;
        }

        function isOtherServices(e) {
            let con = document.querySelector(".other-specify-con");
            if (e.value === 'OTHER SERVICES') {
                con.style.display = 'block';
            } else {
                con.style.display = 'none';
            }
        }

        window.addEventListener('load', () => {
            if (bahia_ids.includes(Number(agency.value))) {
                getBahiaVessels({
                    id: agency.value
                }, true);
            } else {
                $('.bahia-vessel').addClass('remove');
                $('.natural-vessel').removeClass('remove');
            }
            if (agency.value == 9) {
                getHartmannPrincipals(true);
            }

            let lastMenstrualPeriodYes = document.querySelector('#last_menstrual_period1');
            let pregnancyYes = document.querySelector('#pregnancy1');
            if (lastMenstrualPeriodYes.checked) {
                document.querySelector('#last_menstrual_other').style.display = 'block';
            }

            if (pregnancyYes.checked) {
                document.querySelector('#pregnancy_other').style.display = 'block';
            }
        })

        function selectLastMenstrualPeriod(e) {
            if (e.value == 1) {
                document.querySelector('#last_menstrual_other').style.display = 'block';
            } else {
                document.querySelector('#last_menstrual_other').style.display = 'none';
            }
        }

        function selectPregnancy(e) {
            if (e.value == 1) {
                document.querySelector('#pregnancy_other').style.display = 'block';
            } else {
                document.querySelector('#pregnancy_other').style.display = 'none';
            }
        }

        // add Item Table
        let item = document.querySelector('.add-item');
        let itemForms = document.querySelector('.items-form');
        let count3 = 0;
        let count4 = 20;
        item.addEventListener('click', () => {
            const addForm = document.createElement('div');
            addForm.classList.add('item-form-container', 'row', 'border', 'p-1');
            addForm.innerHTML = `<div class="item-name-container col-md-3">
                            <select name="exam[]" class="select2 form-control">
                                <optgroup label="Exams">
                                    <option value="">Select Exam</option>
                                    @foreach ($list_exams as $exam)
                                    <option value="{{ $exam->id }}">
                                        {{ $exam->examname }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="quantity-container col-md-3 text-center">
                            <input class="mx-1" name="charge[${count3++}]" id="charge" type="checkbox" placeholder="Charge" value="package" />
                        </div>
                        <div class="col-md-3 text-center">
                            {{ date('Y-m-d') }}
                        </div>
                        <div class="col-md-3 text-center">
                            <button type="button" onclick="onDeleteItem(this)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>`;
            itemForms.appendChild(addForm);
            $('.select2').select2();
        })

        function onDeleteItem(e) {
            return e.parentElement.parentElement.remove();
        }
    </script>
@endpush
