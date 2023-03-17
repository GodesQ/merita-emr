@extends('layouts.app')

@section('name')
{{$data['firstname'] . " " . $data['lastname']}}
@endsection

@section('patient_image')
@if($data['patient_image'] != null || $data['patient_image'] != "")
<img src="../../../app-assets/images/profiles/{{$data['patient_image']}}" alt="avatar">
@else
<img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
@endif
@endsection

@section('content')
<style>
    .table th, .table td {
        padding: 1rem 0.5rem;
    }
</style>
<!-- BEGIN: Content-->
<div class="container-lg container-fluid">
    @if(Session::get('status'))
    <div class="warning alert-warning p-2 my-2 rounded">
        {{Session::get('status')}}
    </div>
    @endif
    @if(Session::get('status_schedule'))
    <div class="success alert-success p-2 my-2 rounded">
        {{Session::get('status_schedule')}}
    </div>
    @endif

    @if(Session::get('success'))
    <div class="success alert-success p-2 my-2 rounded">
        {{Session::get('success')}}
    </div>
    @push('scripts')
    <script>
        document.querySelector("#open-instruction").click();
        toastr.success('{{ Session::get('success') }}', 'Failed');
    </script>
    @endpush
    @endif

    @if(Session::get('success_support'))
    @push('scripts')
        <script>
            toastr.success('{{Session::get("success_support")}}', 'Success');
        </script>
    @endpush
    @endif

    @section('latest_schedule')
    @if($latest_schedule)
    {{$latest_schedule->date}}
    @endif
    @endsection

    @if(Session::get('fail'))
        <div class="danger alert-danger p-2 my-2 rounded">
            {{Session::get('fail')}}
        </div>
    @endif

    @section('remedical')
        <div class="mx-1 my-25">
            <a href="/remedical?patientcode={{session()->get('patientCode')}}" class="text-white btn btn-primary"><i class="fa fa-pencil"></i>
                Re Medical</a>
        </div>
    @endsection

    @section('patient_info')
    <div class="row">
        <div class="col-md-12 my-25">
            Patient Name : <b>{{$patient->firstname}} {{$patient->lastname}}</b>
        </div>
        <div class="col-md-12 my-25">
            Patient Code : <b>{{$patient->patientcode}} </b>
        </div>
        <div class="col-md-12 my-25">
            Agency : <b>{{$patientInfo->agencyname ? $patientInfo->agencyname : null}}</b>
        </div>
        <div class="col-md-12 my-25">
            Medical Package : <b>{{$patientInfo->packagename ? $patientInfo->packagename : null}} </b>
        </div>
    </div>
    @endsection

    <div class="app-content content">
        <div class="container border p-1 my-1">
            <h6 class="primary float-lg-right">(Screenshot this as proof of schedule)</h6>
            <h6>You are now scheduled on : <b>{{$latest_schedule ? $latest_schedule->date : null}}</b></h6>
            <div class="row">
                <div class="col-md-12 my-25">
                    Patient Name : <b>{{$patient->firstname}} {{$patient->lastname}}</b>
                </div>
                <div class="col-md-12 my-25">
                    Patient Code : <b>{{$patient->patientcode}} </b>
                </div>
                <div class="col-md-12 my-25">
                    Agency : <b>{{$patientInfo->agencyname ? $patientInfo->agencyname : null}}</b>
                </div>
                <div class="col-md-12 my-25">
                    Medical Package : <b>{{$patientInfo->packagename ? $patientInfo->packagename : null}} </b>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @if ($latest_schedule)
                    You are scheduled on: <strong>{{$latest_schedule->date}}</strong><a href="/edit_schedule"
                        class="alert-link ml-1 float-lg-right">Do you want to
                        re-schedule?</a>
                    @else
                    <span>No record of schedule</span>
                    @endif
                </div>
            </div>
            <div class="col-md-2"></div>
            @if($patientAdmission)
            <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    Your Laboratory Result Status:
                    <strong>
                        @if ($patientAdmission->lab_status == 2)
                        <b><u>FIT TO WORK</u></b>
                        @elseif ($patientAdmission->lab_status == 1)
                        <b><u>RE ASSESSMENT</u></b>
                        @endif
                    </strong>
                    <a href="/laboratory_result" class="alert-link ml-1 float-lg-right">View Result</a>
                </div>
            </div>
            @else
            <div class="col-sm-12">
                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>You are not admitted</strong></a>.
                </div>
            </div>
            @endif
        </div>

        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-lg-10 mb-2">
                    <h3 class="content-header-title mb-0">Patient Information</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/progress-patient-info">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Patient</a>
                                </li>
                                <li class="breadcrumb-item active">Patient Information
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-lg-2 text-right">
                    <a class="btn btn-solid bg-success bg-darken-2 text-white"
                        href="/edit-patient-info?id={{$patient->id}}">Edit</a>
                </div>
            </div>
            <div class="content-body">
                <div class="content-body">
                    <!-- account setting page start -->
                    <section id="page-account-settings">
                        <div class="row">
                            <!-- left menu section -->
                            <div class="col-md-3 mb-2 mb-md-0">
                                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
                                            href="#account-vertical-general" aria-expanded="true">
                                            <i class="feather icon-info"></i>
                                            Personal Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill"
                                            href="#account-vertical-connections" aria-expanded="false">
                                            <i class="feather icon-feather"></i>
                                            Medical History
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex" id="account-pill-notifications" data-toggle="pill"
                                            href="#account-vertical-notifications" aria-expanded="false">
                                            <i class="feather icon-book"></i>
                                            Declaration Form
                                        </a>
                                    </li>
                                </ul>
                                <div class="col-md-12 my-1">
                                    <h3>Medical Records <span class="primary h6">(DD/MM/YYYY)</span></h3>
                                    <ul class="list-group">
                                        @foreach ($patientRecords as $patientRecord)
                                        <li class="list-group-item @php echo session()->get('patientId') == $patientRecord->id ? "
                                            active" : " " @endphp"><a
                                                class="@php echo session()->get('patientId') == $patientRecord->id ? "
                                                text-white" : " " @endphp"
                                                href="/see_record?created={{$patientRecord->created_date}}">{{date_format(new DateTime($patientRecord->created_date), "d-m-Y")}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- right content section -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active"
                                                    id="account-vertical-general" aria-labelledby="account-pill-general"
                                                    aria-expanded="true">
                                                    <div class="col-lg-8 col-md-10 col-md-12">
                                                        <h3 class="mt-1"><i class="feather icon-info"></i>
                                                            Personal Info</h3>
                                                        <table class="table table-borderless table-responsive">
                                                            <tbody>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Firstname:
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patient->firstname}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Lastname:
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patient->lastname}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Middlename:
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patient->middlename}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Contact No :
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->contactno}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Email:</td>
                                                                    <td class="col-sm-2">{{$patient->email}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Address:</td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->address}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Gender:</td>
                                                                    <td class="col-sm-2">{{$patient->gender}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Age:</td>
                                                                    <td class="col-sm-2">{{$patient->age}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Occupation:
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->occupation}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Nationality:
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->nationality}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Religion:
                                                                    </td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->religion}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Marital
                                                                        Status:</td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->maritalstatus}}
                                                                    </td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Admission Type:</td>
                                                                    <td class="col-sm-2">
                                                                        {{$patientInfo->admission_type}}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-8 col-md-10 col-md-12 my-3">
                                                        <h3 class="mb-1"><i class="feather icon-globe"></i>
                                                            Agency Info</h3>
                                                        <table class="table table-borderless table-responsive">
                                                            <tbody>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Agency Name:
                                                                    </td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->agencyname ? $patientInfo->agencyname : null}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Agency
                                                                        Address:</td>
                                                                    <td class="users-view-name col-sm-2">
                                                                        {{$patientInfo->agency_address}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Country
                                                                        Destination:</td>
                                                                    <td class="users-view-email col-sm-2">
                                                                        {{$patientInfo->country_destination}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Medical
                                                                        Package:</td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->packagename ? $patientInfo->packagename : null}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Vessel:</td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->vessel}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Passport NO:
                                                                    </td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->passportno}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">SRB NO:</td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->srbno}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Principal:</td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->principal}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td class="col-md-6 col-lg-4 col-sm-6">Referral:</td>
                                                                    <td class="users-view-username col-sm-2">
                                                                        {{$patientInfo->referral}}</td>
                                                                </tr>
                                                                <tr class="col-12">
                                                                    <td colspan="2">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <h6><b>Remarks for Passport Expiration Date ({{$patientInfo->passport_expdate ? $patientInfo->passport_expdate : "No Record"}})</b></h6>
                                                                                <p id="remarks-passport"></p>
                                                                            </div>
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <h6><b>Remarks for SSRB Expiration Date ({{$patientInfo->srb_expdate ? $patientInfo->srb_expdate : "No Record"}})</b></h6>
                                                                                <p id="remarks-srb"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-connections"
                                                    role="tabpanel" aria-labelledby="account-pill-connections"
                                                    aria-expanded="false">
                                                    @if($medicalHistory)
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-4">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Head and Neck Injury
                                                                        </td>
                                                                        <td>@if($medicalHistory->head_and_neck_injury
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Frequent Headache
                                                                        </td>
                                                                        <td>@if($medicalHistory->frequent_headache
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Frequent Dizziness
                                                                        </td>
                                                                        <td>@if($medicalHistory->frequent_dizziness
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Fainting Spells, Fits
                                                                        </td>
                                                                        <td>@if($medicalHistory->fainting_spells_fits
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Seizures
                                                                        </td>
                                                                        <td>@if($medicalHistory->seizures
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Other neurological disorders
                                                                        </td>
                                                                        <td>@if($medicalHistory->other_neurological_disorders
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Insomia or Sleep disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->insomia_or_sleep_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Depression, other mental
                                                                            disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->depression_other_mental_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Eye problems / Error of
                                                                            refraction
                                                                        </td>
                                                                        <td>@if($medicalHistory->eye_problems_or_error_refraction
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Deafness / Ear disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->deafness_or_ear_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Nose or Throat disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->nose_or_throat_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Tuberculosis </td>
                                                                        <td>@if($medicalHistory->tuberculosis
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Signed off as sick
                                                                        </td>
                                                                        <td>@if($medicalHistory->signed_off_as_sick
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Repatriation form ship
                                                                        </td>
                                                                        <td>@if($medicalHistory->repatriation_form_ship
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Declared Unfit for sea duty
                                                                        </td>
                                                                        <td>@if($medicalHistory->declared_unfit_for_sea_duty
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Previous Hospitalization
                                                                        </td>
                                                                        <td>@if($medicalHistory->previous_hospitalization
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Do you feel healthy /<br>Fit to
                                                                            perform
                                                                            duties of <br> designed position
                                                                        </td>
                                                                        <td>@if($medicalHistory->feel_healthy
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <!-- SECOND TABLE -->
                                                        <div class="col-md-12  col-lg-4">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Other Lung disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->other_lung_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            High Blood Pressure
                                                                        </td>
                                                                        <td>@if($medicalHistory->high_blood_pressure
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Heart Disease / Vascular
                                                                        </td>
                                                                        <td>@if($medicalHistory->heart_disease_or_vascular
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Chest pain
                                                                        </td>
                                                                        <td>@if($medicalHistory->chest_pain
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Rheumatic Fever
                                                                        </td>
                                                                        <td>@if($medicalHistory->rheumatic_fever
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Diabetes Mellitus
                                                                        </td>
                                                                        <td>@if($medicalHistory->diabetes_mellitus
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Endocrine disorders (goiter)
                                                                        </td>
                                                                        <td>@if($medicalHistory->endocrine_disorders
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Cancer or Tumor
                                                                        </td>
                                                                        <td>@if($medicalHistory->cancer_or_tumor
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Blood disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->blood_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Stomach pain, Gastritis
                                                                        </td>
                                                                        <td>@if($medicalHistory->stomach_pain_or_gastritis
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Ulcer
                                                                        </td>
                                                                        <td>@if($medicalHistory->ulcer
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Other Abdominal Disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->other_abdominal_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Medical certificate restricted
                                                                        </td>
                                                                        <td>@if($medicalHistory->medical_certificate_restricted
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Medical certificate revoked
                                                                        </td>
                                                                        <td>@if($medicalHistory->medical_certificate_revoked
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Aware of any medical problems
                                                                        </td>
                                                                        <td>@if($medicalHistory->aware_of_any_medical_problems
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Aware of any disease / illness
                                                                        </td>
                                                                        <td>@if($medicalHistory->aware_of_any_disease_or_illness
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Operation(s) <br>
                                                                            <b><u>{{$medicalHistory->operation_other}}</u></b>
                                                                        </td>
                                                                        <td>@if($medicalHistory->operations
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- THIRD TABLE -->
                                                        <div class="col-md-12 col-lg-4">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Gynecological Disorders
                                                                        </td>
                                                                        <td>@if($medicalHistory->gynecological_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Last Menstrual Period
                                                                        </td>
                                                                        <td>@if($medicalHistory->last_menstrual_period
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Pregnancy
                                                                        </td>
                                                                        <td>@if($medicalHistory->pregnancy
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Kidney or Bladder Disorder
                                                                        </td>
                                                                        <td>@if($medicalHistory->kidney_or_bladder_disorder
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Back Injury / Joint pain
                                                                        </td>
                                                                        <td>@if($medicalHistory->back_injury_or_joint_pain
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Arthritis </td>
                                                                        <td>@if($medicalHistory->arthritis
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Genetic, Heredity or Familial
                                                                            Dis. </td>
                                                                        <td>@if($medicalHistory->genetic_heredity_or_familial_dis
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Sexually Transmitted Disease
                                                                            (Syphilis)
                                                                        </td>
                                                                        <td>@if($medicalHistory->sexually_transmitted_disease
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Tropical Disease - Malaria
                                                                        </td>
                                                                        <td>@if($medicalHistory->tropical_disease_or_malaria
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Thypoid Fever
                                                                        </td>
                                                                        <td>@if($medicalHistory->thypoid_fever
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Schistosomiasis
                                                                        </td>
                                                                        <td>@if($medicalHistory->schistosomiasis
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Asthma
                                                                        </td>
                                                                        <td>@if($medicalHistory->asthma
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Allergies <br>
                                                                            <b><u>{{$medicalHistory->allergies_other}}</u></b>
                                                                        </td>
                                                                        <td>@if($medicalHistory->allergies
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Smoking </td>
                                                                        <td>@if($medicalHistory->smoking
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Taking medication for
                                                                            Hypertension </td>
                                                                        <td>@if($medicalHistory->taking_medication_for_hypertension
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Taking medication for Diabetes
                                                                        </td>
                                                                        <td>@if($medicalHistory->taking_medication_for_diabetes
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12">
                                                                            Vaccination </td>
                                                                        <td>@if($medicalHistory->vaccination
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="tab-pane fade" id="account-vertical-notifications"
                                                    role="tabpanel" aria-labelledby="account-pill-notifications"
                                                    aria-expanded="false">
                                                    @if($declarationForm)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <h4>Have you travelled abroad recently?</h4>
                                                            </div>
                                                            <div class="col-md-4 mt-1">
                                                                @if($declarationForm->travelled_abroad_recently
                                                                == 0)
                                                                <span
                                                                    class="btn btn-solid btn-warning isTravelAbroad">No</span>
                                                                @else
                                                                <span
                                                                    class="btn btn-solid btn-success isTravelAbroad">Yes</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 travel mt-2">
                                                            <div class="form-group">
                                                                <label for="">Name of the area(s) visited
                                                                    <span class="danger">*</span>
                                                                </label>
                                                                <fieldset>
                                                                    <input disabled name="area_visited" type="text"
                                                                        id="" placeholder="Country, State, City"
                                                                        class="form-control"
                                                                        value="{{$declarationForm->area_visited}}" />
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 travel">
                                                            <div class="form-group ">
                                                                <label for="">Date of travel
                                                                    <span class="danger">*</span>
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="font-weight-bold"
                                                                            for="">Arrival</label>
                                                                        <input disabled name="travel_arrival_date" id=""
                                                                            placeholder="" class="form-control"
                                                                            type="text"
                                                                            value="{{$declarationForm->travel_arrival}}" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="font-weight-bold"
                                                                            for="">Return</label>
                                                                        <input disabled name="travel_return_date" id=""
                                                                            placeholder="" class="form-control"
                                                                            type="text"
                                                                            value="{{$declarationForm->travel_return}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="col-md-12">
                                                                <h4>Have you been in contact with people
                                                                    being infected,
                                                                    suspected or diagnosed with COVID-19?
                                                                </h4>
                                                            </div>
                                                            <div class="col-md-4 mt-1">
                                                                @if($declarationForm->contact_with_people_being_infected__suspected_diagnose_with_cov
                                                                == 0)
                                                                <span
                                                                    class="btn btn-solid btn-warning contact-with-cov">No</span>
                                                                @else
                                                                <span
                                                                    class="btn btn-solid btn-success contact-with-cov">Yes</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 show-if-contact">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="font-weight-bold"
                                                                            for="">Relationship</label>
                                                                        <input disabled
                                                                            name="relationship_last_contact_people"
                                                                            id="" placeholder="" class="form-control"
                                                                            type="text"
                                                                            value="{{$declarationForm->relationship_with_last_people}}" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="font-weight-bold" for="">Last
                                                                            contact
                                                                            date</label>
                                                                        <input disabled name="last_contact_date" id=""
                                                                            placeholder="" class="form-control"
                                                                            type="text"
                                                                            value="{{$declarationForm->last_contact_date}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 my-2">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-12 h4">Fever</td>
                                                                        <td>
                                                                            @if($declarationForm->fever
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12 h4">Cough</td>
                                                                        <td> @if($declarationForm->cough
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12 h4">Shortness of
                                                                            Breath</td>
                                                                        <td>
                                                                            @if($declarationForm->shortness_of_breath
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-12 h4">Persistent
                                                                            Pain in the
                                                                            Chest</td>
                                                                        <td>
                                                                            @if($declarationForm->persistent_pain_in_chest
                                                                            == 0)
                                                                            <span
                                                                                class="btn btn-solid btn-warning">No</span>
                                                                            @else
                                                                            <span
                                                                                class="btn btn-solid btn-success">Yes</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
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
            </section>
            <!-- account setting page end -->
        </div>
    </div>
</div>
</div>
</div>
<script>
function hasTravelAbroad() {
    let isTravelAbroad = document.querySelectorAll('.isTravelAbroad');
    let travelElement = document.querySelectorAll('.travel');
    for (let index = 0; index < isTravelAbroad.length; index++) {
        const element = isTravelAbroad[index];
        if (element.innerHTML == "No") {
            travelElement[0].style.display = "none";
            travelElement[1].style.display = "none";
        } else {
            travelElement[0].style.display = "block";
            travelElement[1].style.display = "block";
        }
    }
}

function hasContactWithCovid() {
    let isContactWithCov = document.querySelectorAll('.contact-with-cov');
    let showIfContact = document.querySelector('.show-if-contact');
    for (let index = 0; index < isContactWithCov.length; index++) {
        const element = isContactWithCov[index];
        if (element.innerHTML == "No") {
            showIfContact.style.display = "none";
        } else {
            showIfContact.style.display = "block";
        }
    }
}
hasTravelAbroad();
hasContactWithCovid();

const getRemarksPassport = () => {
    let months;
    let d1 = new Date('{{$patientInfo->passport_expdate}}');
    let d2 = new Date();
    let remarksPassport = document.querySelector("#remarks-passport");
    months = (d1.getFullYear() - d2.getFullYear()) * 12;

    months -= d2.getMonth();
    months += d1.getMonth();

    if (months < 0) {
        console.log(months);
    }

    if(months < 0) {
        remarksPassport.textContent = "Passport is already expired.";
        remarksPassport.classList.add('danger');
    } else if(d1 == 'Invalid Date') {
        remarksPassport.textContent = "No Record";
        remarksPassport.classList.add('warning');
    } else if(months < 6) {
        remarksPassport.textContent = "Passport will expire in less than six (6) months";
        remarksPassport.classList.add('warning');
    } else {
        remarksPassport.textContent = "Passport will not expire within six (6) months.";
        remarksPassport.classList.add('success');
    }

}

const getRemarksSRB = () => {
    let months;
    let d1 = new Date('{{$patientInfo->srb_expdate}}');
    let d2 = new Date();
    let remarksSRB = document.querySelector("#remarks-srb");
    months = (d1.getFullYear() - d2.getFullYear()) * 12;

    months -= d2.getMonth();
    months += d1.getMonth();

    if(months < 0) {
        remarksSRB.textContent = "SSRB is already expired.";
        remarksSRB.classList.add('danger');
    } else if(d1 == 'Invalid Date') {
        remarksSRB.textContent = "No Record";
        remarksSRB.classList.add('warning');
    } else if(months < 6) {
        remarksSRB.textContent = "SSRB will expire in less than six (6) months";
        remarksSRB.classList.add('warning');
    } else {
        remarksSRB.textContent = "SSRB will not expire within six (6) months.";
        remarksSRB.classList.add('success');
    }
}

getRemarksPassport();
getRemarksSRB();


</script>
@endsection
