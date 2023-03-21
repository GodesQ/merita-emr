@extends('layouts.admin-layout')

@section('name')
{{$data['employeeFirstname'] . " " . $data['employeeLastname']}}
@endsection

@section('employee_image')
@if($data['employee_image'] != null || $data['employee_image'] != "")
<img src="../../../app-assets/images/employees/{{$data['employee_image']}}" alt="avatar">
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
        color : #156f29 !important;
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
            @if(Session::get('yellow_card_success'))
                <script>
                    window.open('/yellow_card_print?id={{$patient->id}}','wp','width=1000,height=800');
                </script>
            @endif
            <div class="row">
                <div class="col-xl-9 order-lg-2 order-xl-1 order-sm-2 order-xs-2 col-lg-12">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                            aria-labelledby="account-pill-general" aria-expanded="true">
                            <section class="users-view">
                                <!-- users view media object start -->
                                <div class="row bg-white p-2">
                                    @if(Session::get('status'))
                                    @push('scripts')
                                        <script>
                                        toastr.success('{{Session::get("status")}}', 'Success');
                                        </script>
                                    @endpush
                                    @endif
                                    @if(Session::get('fail'))
                                    @push('scripts')
                                        <script>
                                        toastr.error('{{Session::get("fail")}}', 'Failed');
                                        </script>
                                    @endpush
                                    @endif
                                    <div class="col-md-10">
                                        <h3>Medical Records</h3>
                                        @foreach ($patientRecords as $record)
                                        <button
                                            onclick="location.href = 'patient_edit?id={{$record->id}}&patientcode={{$record->patientcode}}'"
                                            class="btn btn-outline-secondary mr-1 {{$patient->created_date == $record->created_date ? 'active' : null}}"> {{date_format(new DateTime($record->created_date), "F d, Y h:i A")}}</button>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2">
                                        @if($patientCode)
                                            <h3 class="font-bold badge p-1 float-right {{$patientCode->admit_type == 'Normal' ? 'badge-secondary' : 'badge-warning' }}">{{$patientCode->admit_type}} Patient</h3>
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
                                                    Take
                                                    Picture
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center align-items-center">
                                                <div class="camera"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-outline-primary" onclick="snapShot()">Save Changes</button>
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
                                                            ? "active" : "" @endphp" id="baseIcon-tab31"
                                                            data-toggle="tab" aria-controls="tabIcon31"
                                                            href="#tabIcon31" role="tab"><i class="fa fa-user"></i>User
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
                                                        <a class="nav-link main-tab {{ session()->get('dept_id') != " 1" ? "active" : "" }}" id="baseIcon-tab35"
                                                            data-toggle="tab" aria-controls="tabIcon35"
                                                            href="#tabIcon35" role="tab"><i class="fa fa-file"></i>Basic & Special Exams</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link main-tab" id="baseIcon-tab36" data-toggle="tab"
                                                            aria-controls="tabIcon36" href="#tabIcon36" role="tab"><i
                                                                class="fa fa-file"></i>Lab Exams</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content px-1 pt-1">
                                                    <div class="tab-pane main-content @php echo session()->get('dept_id') == " 1" ||
                                                        session()->get('dept_id') == "17"
                                                        ? "active" : "" @endphp" id="tabIcon31" role="tabpanel"
                                                        aria-labelledby="baseIcon-tab31">
                                                        <fieldset class="my-2">
                                                            <form action="#" id="update_patient_basic" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="old_signature"
                                                                    id="old_signature"
                                                                    value="{{$patient->patient_signature}}">
                                                                <input type="hidden" name="signature"
                                                                    id="signature_data">
                                                                <input type="hidden" name="main_id"
                                                                    value="{{$patient->id}}">
                                                                <input type="hidden" name="old_image"
                                                                    value="{{$patient->patient_image}}">
                                                                <input type="hidden" name="patientcode"
                                                                    value="{{$patient->patientcode}}">
                                                                <input type="hidden" class="patient-image"
                                                                    name="patient_image"
                                                                    value="{{$patient->patient_image}}">
                                                                <div
                                                                    class="col-md-8 d-flex justify-content align-items-center">
                                                                    <img class=" image-taken"
                                                                        src="../../../app-assets/images/profiles/profilepic.jpg" />
                                                                    <div class="d-flex flex-column my-2 mx-4">
                                                                        <canvas class="signature" width="320" height="95"></canvas>
                                                                        <button type='button'
                                                                            class="btn btn-solid btn-primary clear-signature">Clear</button>
                                                                    </div>
                                                                </div>
                                                                <div class=" row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="firstName3">
                                                                                First Name :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control to_upper" id="firstName3"
                                                                                name="firstName"
                                                                                value="{{$patient->firstname}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="lastName3">
                                                                                Last Name :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control lastname to_upper"
                                                                                id="lastName3" name="lastName"
                                                                                value="{{$patient->lastname}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="lastName3">
                                                                                Middle Name :
                                                                            </label>
                                                                            <input type="text" class="form-control to_upper"
                                                                                name="middleName" value="{{$patient->middlename}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="lastName3">
                                                                                Suffix :
                                                                            </label>
                                                                            <input type="text" class="form-control to_upper"
                                                                                name="suffix"
                                                                                value="{{$patient->suffix}}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Permanent Home Address :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control to_upper" name="homeAddress"
                                                                                value="{{$patientInfo->address}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Email :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control" name="email"
                                                                                value="{{$patient->email}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Birthdate :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="date" max="2050-12-31"
                                                                                class="form-control" name="birthdate"
                                                                                value="{{$patientInfo->birthdate}}" onchange="getAge(this)">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Age :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="number"
                                                                                class="form-control" min="18" max="100" id="age" name="age" value="{{ $patient->age }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Birthplace :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control" name="birthplace"
                                                                                value="{{$patientInfo->birthplace}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Civil Status :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select class="form-control"
                                                                                name="civilStatus">
                                                                                <option
                                                                                    value="{{$patientInfo->maritalstatus}}">
                                                                                    {{$patientInfo->maritalstatus}}
                                                                                </option>
                                                                                <option value="SINGLE">SINGLE</option>
                                                                                <option value="MARRIED">MARRIED</option>
                                                                                <option value="WIDOWED">WIDOWED</option>
                                                                                <option value="DIVORCED">DIVORCED
                                                                                </option>
                                                                                <option value="DOMESTIC RELATIONSHIP">
                                                                                    DOMESTIC RELATIONSHIP</option>
                                                                                <option value="SEPARATED">SEPARATED</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Occupation :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select required class="form-control" name="occupation" id="occupation" onchange="selectOccupation(this)">
                                                                                <option value="">Select Occupation</option>
                                                                                <option {{ $patientInfo->occupation == 'SEAMAN' ? 'selected' : null }} value="SEAMAN">SEAMAN</option>
                                                                                <option {{ $patientInfo->occupation == 'SEAWOMAN' ? 'selected' : null }} value="SEAWOMAN">SEAWOMAN</option>
                                                                                <option {{ $patientInfo->occupation == 'OTHER' ? 'selected' : null }} value="OTHER">OTHER</option>
                                                                            </select>
                                                                            <br>
                                                                            <div class="form-group occupation_other_container" style="display: none;">
                                                                                <label for="">Please Specify</label>
                                                                                <input type="text" placeholder="Plese Specify" name="occupation_other" id="occupation_other" class="form-control" value="{{ $patientInfo->occupation_other }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Gender :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select class="form-control"
                                                                                name="gender">
                                                                                <option value="Male" {{$patient->gender == 'Male' ? 'selected' : null}}>MALE</option>
                                                                                <option value="Female" {{$patient->gender == 'Female' ? 'selected' : null}}>FEMALE</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Nationality :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control" name="nationality"
                                                                                value="{{$patientInfo->nationality}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Religion :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select name="religion" id="religion" class="form-control" onchange="selectReligion(this)">
                                                                                <option {{$patientInfo->religion == 'ROMAN CATHOLIC' ? 'selected' : null }} value="ROMAN CATHOLIC">ROMAN CATHOLIC</option>
                                                                                <option {{$patientInfo->religion == 'IGLESIA NI CRISTO' ? 'selected' : null }} value="IGLESIA NI CRISTO">IGLESIA NI CRISTO</option>
                                                                                <option {{$patientInfo->religion == 'EVANGELICALS' ? 'selected' : null }} value="EVANGELICALS">EVANGELICALS</option>
                                                                                <option {{$patientInfo->religion == 'SEVENTH DAY ADVENTIST' ? 'selected' : null }} value="SEVENTH DAY ADVENTIST">SEVENTH DAY ADVENTIST</option>
                                                                                <option {{$patientInfo->religion == 'ISLAM' ? 'selected' : null }} value="ISLAM">ISLAM</option>
                                                                                <option {{$patientInfo->religion == 'UECFI' ? 'selected' : null }} value="UECFI">UECFI</option>
                                                                                <option {{$patientInfo->religion == 'OTHERS' ? 'selected' : null }} value="OTHERS">OTHERS</option>
                                                                            </select>
                                                                            <br>
                                                                            <div class="form-group religion_other_container" style="display: none;">
                                                                                <label for="">Religion : <span style="font-size: 12px;">Please Specify</span></label>
                                                                                <input type="text" placeholder="Plese Specify" name="religion_other" id="religion_other" class="form-control" value="{{ $patientInfo->religion_other }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Phone Number :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="tel" maxlength="11"
                                                                                class="form-control" name="phoneNumber"
                                                                                value="{{$patientInfo->contactno}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Registered Date :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input type="datetime-local"
                                                                                class="form-control" name="created_date"
                                                                                value="{{$patient->created_date}}">
                                                                        </div>
                                                                    </div>
                                                                    <input type="date" max="2050-12-31" name="date" id="" hidden value="<?php echo date('Y-m-d'); ?>">
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-solid btn-primary">Submit</button>
                                                                    </div>
                                                                </fieldset>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane main-content" id="tabIcon32" role="tabpanel"
                                                        aria-labelledby="baseIcon-tab32">
                                                        <form id="update_patient_agency" method="post">
                                                            @csrf
                                                            <input type="hidden" name="main_id"
                                                                value="{{$patient->id}}">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName3">
                                                                                Name of Agency :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select onchange="getPackages(this)" id="agency" class="form-control select2"
                                                                                name="agency_id">
                                                                                @if($patient_agency)
                                                                                <option value="{{$patient_agency->id}}">
                                                                                    {{$patient_agency->agencyname}}
                                                                                </option>
                                                                                @endif
                                                                                @foreach($agencies as $row)
                                                                                <option value="{{$row->id}}">
                                                                                    {{$row->agencyname}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName3">
                                                                                Address of Agency :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input
                                                                                id="address_of_agency"
                                                                                type="text"
                                                                                class="form-control"
                                                                                name="address_of_agency"
                                                                                value="{{$patientInfo->agency_address}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="lastName3">
                                                                                Country of Destination :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input required type="text"
                                                                                class="form-control"
                                                                                name="countryDestination"
                                                                                value="{{$patientInfo->country_destination}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group natural-vessel">
                                                                            <label for="">
                                                                                Vessel :
                                                                                <span class="primary h6">(If not applicable, please
                                                                                    write N/A)</span>
                                                                            </label>
                                                                            <input type="text" class="form-control to_upper"
                                                                                name="vessel" value="{{$patientInfo->vessel}}">
                                                                        </div>
                                                                        <div class="form-group bahia-vessel remove">
                                                                            <label for="">
                                                                                Bahia Vessel
                                                                            </label>
                                                                            <select name="bahia_vessel" id="" class="select2 form-control bahia-select-vessels">
                                                                                <option value="{{$patientInfo->vessel}}">{{$patientInfo->vessel}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Passport :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input required type="text"
                                                                                value="{{$patientInfo->passportno}}"
                                                                                class="form-control" name="passportNo">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Passport Expiration Date :
                                                                            </label>
                                                                            <input type="date" max="2050-12-31"
                                                                                value="{{$patientInfo->passport_expdate}}"
                                                                                class="form-control"
                                                                                name="passport_expdate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                SSRB # :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input required type="text"
                                                                                value="{{$patientInfo->srbno}}"
                                                                                class="form-control" name="ssrb">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                SSRB Expiration Date :
                                                                            </label>
                                                                            <input type="date" max="2050-12-31"
                                                                                value="{{$patientInfo->srb_expdate}}"
                                                                                class="form-control" name="srb_expdate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Medical Package Test :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select name="medicalPackage" id="packages"
                                                                                class="form-control select2">
                                                                                @if($patient_package)
                                                                                <option value="{{$patient_package->id}}"
                                                                                    selected>
                                                                                    {{$patient_package->packagename}}
                                                                                </option>
                                                                                @endif
                                                                                @foreach($packages as $package)
                                                                                <option value="{{$package->id}}">
                                                                                    {{$package->packagename}}
                                                                                    ({{$package->agencyname}})</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Position Applied for :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input required type="text"
                                                                                class="form-control to_upper"
                                                                                name="positionApplied"
                                                                                value="{{$patient->position_applied}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Category :
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <select id="projectInput6" name="category"
                                                                                class="form-control">
                                                                                <option value="none" selected=""
                                                                                    disabled="">Select
                                                                                    Category
                                                                                </option>
                                                                                <option value="DECK SERVICES" @php echo
                                                                                    $patientInfo->
                                                                                    category == "DECK SERVICES" ?
                                                                                    "selected" : null
                                                                                    @endphp>DECK SERVICES</option>
                                                                                <option value="ENGINE SERVICES" @php
                                                                                    echo $patientInfo->
                                                                                    category == "ENGINE SERVICES" ?
                                                                                    "selected" : null
                                                                                    @endphp>ENGINE SERVICES</option>
                                                                                <option value="CATERING SERVICES" @php
                                                                                    echo $patientInfo->category ==
                                                                                    "CATERING SERVICES" ?
                                                                                    "selected" : null @endphp>CATERING
                                                                                    SERVICES</option>
                                                                                <option value="OTHER SERVICES" @php echo
                                                                                    $patientInfo->
                                                                                    category == "OTHER SERVICES" ?
                                                                                    "selected" : null
                                                                                    @endphp>OTHER SERVICES</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="text-bold-600"
                                                                                for="projectinput2">Admission
                                                                                Type</label>
                                                                            <div class="container-fluid ">
                                                                                <div
                                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="admit_type3"
                                                                                        name="admit_type" value="Normal"
                                                                                        @php echo
                                                                                        $patientInfo->admission_type ==
                                                                                    "Normal" || $patientInfo->admission_type == 'NORMAL' ? "checked" : "" @endphp>
                                                                                    <label class="custom-control-label"
                                                                                        for="admit_type3">REGULAR
                                                                                        PATIENT</label>
                                                                                </div>
                                                                                <div
                                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="admit_type4"
                                                                                        name="admit_type" value="Rush"
                                                                                        @php echo
                                                                                        $patientInfo->admission_type ==
                                                                                    "Rush" || $patientInfo->admission_type == 'RUSH' ? "checked" : "" @endphp>
                                                                                    <label class="custom-control-label"
                                                                                        for="admit_type4">RUSH PATIENT</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="text-bold-600"
                                                                                for="projectinput2">Payment
                                                                                Type <span
                                                                                    class="danger">*</span></label>
                                                                            <div class="container-fluid ">
                                                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio"
                                                                                        class="custom-control-input"
                                                                                        name="payment_type"
                                                                                        id="payment_type1"
                                                                                        value="Applicant Paid" @php echo
                                                                                        $patientInfo->payment_type ==
                                                                                    "Applicant Paid" ? "checked" : ""
                                                                                    @endphp>
                                                                                    <label class="custom-control-label"
                                                                                        for="payment_type1">Applicant
                                                                                        Paid
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="payment_type2"
                                                                                        name="payment_type"
                                                                                        value="Billed" @php echo
                                                                                        $patientInfo->payment_type ==
                                                                                    "Billed" ? "checked" : "" @endphp>
                                                                                    <label class="custom-control-label"
                                                                                        for="payment_type2">Billed to
                                                                                        Agency</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group natural-principal">
                                                                            <label for="">
                                                                                Principal :
                                                                                <span class="primary h6">(If not applicable, please
                                                                                    write N/A)</span>
                                                                            </label>
                                                                            <input type="text" class="form-control to_upper"
                                                                                name="principal" value="{{$patientInfo->principal}}">
                                                                        </div>
                                                                        <div class="form-group hartmann-principal remove">
                                                                            <label for="">
                                                                                Hartmann Principal :
                                                                                <span class="primary h6">(If not applicable, please
                                                                                    write N/A)</span>
                                                                                <select name="hartmann_principal" id="" class="select2 form-control hartmann-select-principals">
                                                                                    <option value="{{$patientInfo->principal}}">{{$patientInfo->principal}}</option>
                                                                                </select>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Referral :
                                                                            </label>
                                                                            <input type="text" class="form-control to_upper"
                                                                                name="referral" value="{{$patientInfo->referral}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-solid btn-primary">Submit</button>
                                                                    </div>
                                                                </div>

                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane main-content" id="tabIcon33" role="tabpanel"
                                                        aria-labelledby="baseIcon-tab33">
                                                         @include('Patient.medical_history', [$medicalHistory])
                                                    </div>
                                                    <div class="tab-pane main-content" id="tabIcon34" role="tabpanel"
                                                        aria-labelledby="baseIcon-tab34">
                                                        @if($declarationForm == null)
                                                        <h3 class="text-center font-weight-regular my-2">
                                                            No Record Found
                                                        </h3>
                                                        @else
                                                        <fieldset>
                                                            <form id="update_patient_declaration_form" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="main_id" value="{{$patient->id}}">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Have you travelled abroad recently?
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        class="custom-control-input required"
                                                                                        name="travelled_abroad_recently"
                                                                                        id="travelled_abroad_recently1"
                                                                                        value="1" {{$declarationForm->travelled_abroad_recently == "1" ? "checked" : null}}
                                                                                        onchange="isTravelAbroadRecently(this)">
                                                                                    <label class="custom-control-label"
                                                                                        for="travelled_abroad_recently1">YES</label>
                                                                                </div>
                                                                            </fieldset>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="0"
                                                                                        class="custom-control-input required"
                                                                                        name="travelled_abroad_recently"
                                                                                        id="travelled_abroad_recently2" {{$declarationForm->travelled_abroad_recently == "0" ? "checked" : null}}
                                                                                        onchange="isTravelAbroadRecently(this)">
                                                                                    <label class="custom-control-label"
                                                                                        for="travelled_abroad_recently2">No</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 travel isTravel">
                                                                        <div class="form-group">
                                                                            <label for="">Name of the area(s) visited
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <fieldset>
                                                                                <input name="area_visited" type="text"
                                                                                    id=""
                                                                                    placeholder="Country, State, City"
                                                                                    class="form-control"
                                                                                    value="{{$declarationForm->area_visited}}" />
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 travel isTravel">
                                                                        <div class="form-group ">
                                                                            <label for="">Date of travel
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="font-weight-bold"
                                                                                        for="">Arrival</label>
                                                                                    <input name="travel_arrival_date"
                                                                                        id="" placeholder=""
                                                                                        class="form-control" type="date" max="2050-12-31"
                                                                                        value="{{$declarationForm->travel_arrival}}" />
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="font-weight-bold"
                                                                                        for="">Return</label>
                                                                                    <input name="travel_return_date"
                                                                                        id="" placeholder=""
                                                                                        class="form-control" type="date" max="2050-12-31"
                                                                                        value="{{$declarationForm->travel_return}}"
                                                                                        s />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </hr>
                                                                    <div class="col-md-12 mt-2">
                                                                        <div class="form-group">
                                                                            <label for="">
                                                                                Have you been in contact with people
                                                                                being
                                                                                infected,
                                                                                suspected or diagnosed with COVID-19?
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="1"
                                                                                        class="custom-control-input required"
                                                                                        name="contact_with_people_being_infected_suspected_or_diagnosed_with_covid"
                                                                                        id="contact_with_people_being_infected_suspected_or_diagnosed_with_covid1"
                                                                                        {{$declarationForm->contact_with_people_being_infected_suspected_diagnose_with_cov == "1" ? "checked" : null}}
                                                                                        onchange="hasContactWithPeopleInfected(this)">
                                                                                    <label class="custom-control-label"
                                                                                        for="contact_with_people_being_infected_suspected_or_diagnosed_with_covid1">YES</label>
                                                                                </div>
                                                                            </fieldset>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="0"
                                                                                        class="custom-control-input required"
                                                                                        name="contact_with_people_being_infected_suspected_or_diagnosed_with_covid"
                                                                                        {{$declarationForm->contact_with_people_being_infected_suspected_diagnose_with_cov == "0" ? "checked" : null}}
                                                                                        id="contact_with_people_being_infected_suspected_or_diagnosed_with_covid2"
                                                                                        onchange="hasContactWithPeopleInfected(this)">
                                                                                    <label class=" custom-control-label"
                                                                                        for="contact_with_people_being_infected_suspected_or_diagnosed_with_covid2">No</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-2 show-if-contact hide">
                                                                        <div class="form-group">
                                                                            <label for="">Your relationship with the
                                                                                people
                                                                                and
                                                                                your
                                                                                last contact date with them
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="font-weight-bold"
                                                                                        for="">Relationship</label>
                                                                                    <input
                                                                                        name="relationship_with_last_people"
                                                                                        id="" placeholder=""
                                                                                        class="form-control" type="text"
                                                                                        value="{{$declarationForm->relationship_with_last_people}}" />
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="font-weight-bold"
                                                                                        for="">Last
                                                                                        contact
                                                                                        date</label>
                                                                                    <input name="last_contact_date"
                                                                                        id="" placeholder=""
                                                                                        class="form-control" type="date" max="2050-12-31"
                                                                                        value="{{$declarationForm->last_contact_date}}" />

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-2">
                                                                        <div class="form-group">
                                                                            <label for="">Please state whether you've
                                                                                experienced/are
                                                                                experiencing the following
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <div class="row">
                                                                                <table class="table table-striped ml-1">
                                                                                    <tr>
                                                                                        <th>Fever</th>
                                                                                        <td>
                                                                                            <fieldset>

                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="1"
                                                                                                        class="custom-control-input required"
                                                                                                        name="fever"
                                                                                                        id="fever1" @php
                                                                                                        echo
                                                                                                        $declarationForm->fever
                                                                                                    == 1
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="fever1">YES</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="0"
                                                                                                        class="custom-control-input required"
                                                                                                        name="fever"
                                                                                                        id="fever2" @php
                                                                                                        echo
                                                                                                        $declarationForm->fever
                                                                                                    == 0
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="fever2">NO</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Cough</th>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="1"
                                                                                                        class="custom-control-input required"
                                                                                                        name="cough"
                                                                                                        id="cough1" @php
                                                                                                        echo
                                                                                                        $declarationForm->cough
                                                                                                    == 1
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="cough1">YES</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="0"
                                                                                                        class="custom-control-input required"
                                                                                                        name="cough"
                                                                                                        id="cough2" @php
                                                                                                        echo
                                                                                                        $declarationForm->cough
                                                                                                    == 0
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="cough2">NO</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Shortness of Breath</th>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="1"
                                                                                                        class="custom-control-input required"
                                                                                                        name="shortness_of_breath"
                                                                                                        id="shortness_of_breath1"
                                                                                                        @php echo
                                                                                                        $declarationForm->shortness_of_breath
                                                                                                    == 1
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="shortness_of_breath1">YES</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="0"
                                                                                                        class="custom-control-input required"
                                                                                                        name="shortness_of_breath"
                                                                                                        id="shortness_of_breath2"
                                                                                                        @php echo
                                                                                                        $declarationForm->shortness_of_breath
                                                                                                    == 0
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="shortness_of_breath2">NO</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Persistent Pain in the Chest
                                                                                        </th>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="1"
                                                                                                        class="custom-control-input required"
                                                                                                        name="persistent_pain_in_the_chest"
                                                                                                        id="persistent_pain_in_the_chest1"
                                                                                                        @php echo
                                                                                                        $declarationForm->persistent_pain_in_chest
                                                                                                    == 1
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="persistent_pain_in_the_chest1">YES</label>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </td>
                                                                                        <td>
                                                                                            <fieldset>
                                                                                                <div
                                                                                                    class="custom-control custom-radio">
                                                                                                    <input required
                                                                                                        type="radio"
                                                                                                        value="0"
                                                                                                        class="custom-control-input required"
                                                                                                        name="persistent_pain_in_the_chest"
                                                                                                        id="persistent_pain_in_the_chest2"
                                                                                                        @php echo
                                                                                                        $declarationForm->persistent_pain_in_chest
                                                                                                    == 0
                                                                                                    ? "checked" : ""
                                                                                                    @endphp>
                                                                                                    <label
                                                                                                        class="custom-control-label"
                                                                                                        for="persistent_pain_in_the_chest2">NO</label>
                                                                                                </div>
                                                                                            </fieldset>

                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-2">
                                                                                <button type="submit"
                                                                                    class="btn btn-solid btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </fieldset>
                                                        @endif

                                                    </div>
                                                    <div class="tab-pane main-content @php echo session()->get('dept_id') != " 1" &&
                                                        session()->get('dept_id') != "17" && session()->get('dept_id')
                                                        != "8"
                                                        ? "active" : "" @endphp" id="tabIcon35" role="tabpanel"
                                                        aria-labelledby="baseIcon-tab35">
                                                        <div class="col-12">
                                                            @if($patientCode == null)
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center flex-column">
                                                                <h3 class="text-center font-weight-regular my-2">
                                                                    Before entering this section, the patient needs to
                                                                    admit.
                                                                </h3>
                                                                <button id="admission-btn" class="btn btn-solid btn-primary text-center">Admit Now</button>
                                                            </div>
                                                            @else
                                                            <div class="nav-vertical">
                                                                <ul class="nav nav-tabs nav-left nav-border-left" id="child-basic-tabs"
                                                                    role="tablist">
                                                                    <h4 class="font-weight-bold">Basic Exams</h4>

                                                                    @if (session()->get('dept_id') == "7" || session()->get('dept_id') == "1" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6" )
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_physical ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab9"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft9"
                                                                            href="#tabVerticalLeft9" role="tab"
                                                                            aria-selected="false">Physical Exam </a>
                                                                    </li>
                                                                    @endif

                                                                    @if (session()->get('dept_id') == "14" ||
                                                                    session()->get('dept_id') == "1" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_visacuity ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab16"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft16"
                                                                            href="#tabVerticalLeft16" role="tab"
                                                                            aria-selected="false">Visual
                                                                            Acuity </a>
                                                                    </li>
                                                                    @endif

                                                                    @if(session()->get('dept_id') == "9" ||
                                                                    session()->get('dept_id') ==
                                                                    "1" || session()->get('dept_id') == "8")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_dental ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab4"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft4"
                                                                            href="#tabVerticalLeft4" role="tab"
                                                                            aria-selected="false">Dental</a>
                                                                    </li>
                                                                    @endif

                                                                    @if (session()->get('dept_id') == "5" ||
                                                                    session()->get('dept_id')
                                                                    ==
                                                                    "1" || session()->get('dept_id') == "8")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_psycho ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab10"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft10"
                                                                            href="#tabVerticalLeft10" role="tab"
                                                                            aria-selected="false">Psychological</a>
                                                                    </li>
                                                                    @endif

                                                                    @if(session()->get('dept_id') == "15" ||session()->get('dept_id') == "1" || session()->get('dept_id') == "6" || session()->get('dept_id') == "8")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_audio ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab1"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft1"
                                                                            href="#tabVerticalLeft1" role="tab"
                                                                            aria-selected="false">Audiometry</a>
                                                                    </li>
                                                                    @endif

                                                                    @if (session()->get('dept_id') == "14" ||
                                                                    session()->get('dept_id') == "1" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_ishihara ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab8"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft8"
                                                                            href="#tabVerticalLeft8" role="tab"
                                                                            aria-selected="false">Ishihara</a>
                                                                    </li>
                                                                    @endif

                                                                    @if (session()->get('dept_id') == "4" || session()->get('dept_id') == "1" || session()->get('dept_id') == "8")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_xray ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab18"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft18"
                                                                            href="#tabVerticalLeft18" role="tab"
                                                                            aria-selected="false">X-Ray
                                                                        </a>
                                                                    </li>
                                                                    @endif

                                                                    @if(session()->get('dept_id') == "16" || session()->get('dept_id') == "1" ||session()->get('dept_id') == "6" || session()->get('dept_id') == "8")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_ecg ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab5"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft5"
                                                                            href="#tabVerticalLeft5" role="tab"
                                                                            aria-selected="false">ECG
                                                                        </a>
                                                                    </li>
                                                                    @endif

                                                                    @if (session()->get('dept_id') == "16" ||  session()->get('dept_id') == "1" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6" || session()->get('dept_id') == "7")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_ppd ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab17"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft17"
                                                                            href="#tabVerticalLeft17" role="tab"
                                                                            aria-selected="false">PPD TEST
                                                                        </a>
                                                                    </li>
                                                                    @endif

                                                                    @if (session()->get('dept_id') == "16" ||  session()->get('dept_id') == "1" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6" || session()->get('dept_id') == "7")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_crf ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab2"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft2"
                                                                            href="#tabVerticalLeft2" role="tab"
                                                                            aria-selected="false">Cardiac
                                                                            Risk Factor </a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_cardio ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab3"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft3"
                                                                            href="#tabVerticalLeft3" role="tab"
                                                                            aria-selected="false">Cardiovascular</a>
                                                                    </li>
                                                                    @endif

                                                                    <h4 class="font-weight-bold">Special Exams</h4>

                                                                    @if(session()->get('dept_id') == "16" || session()->get('dept_id') == "1" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6" ||
                                                                    session()->get('dept_id') == "6" || session()->get('dept_id') == "7")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_echodoppler ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab6"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft6"
                                                                            href="#tabVerticalLeft6" role="tab"
                                                                            aria-selected="false">2D
                                                                            Echo Doppler </a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_echoplain ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab7 "
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft7"
                                                                            href="#tabVerticalLeft7" role="tab"
                                                                            aria-selected="false">2D
                                                                            Echo Plain </a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_stressecho ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab12"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft12"
                                                                            href="#tabVerticalLeft12" role="tab"
                                                                            aria-selected="false">Stress
                                                                            Echo </a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_stresstest ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab13"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft13"
                                                                            href="#tabVerticalLeft13" role="tab"
                                                                            aria-selected="false">Stress
                                                                            Test </a>
                                                                    </li>
                                                                    @endif

                                                                    <li class="nav-item vertical-tab-border d-none">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_psychobpi ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab11"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft11"
                                                                            href="#tabVerticalLeft11" role="tab"
                                                                            aria-selected="false">BPI
                                                                            Psycho </a>
                                                                    </li>


                                                                    @if (session()->get('dept_id') == "4" || session()->get('dept_id') == "1" || session()->get('dept_id') == "8")
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-basic-tab nav-link-width {{$exam_ultrasound ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab14"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft14"
                                                                            href="#tabVerticalLeft14" role="tab"
                                                                            aria-selected="false">Ultrasound</a>
                                                                    </li>

                                                                    @endif



                                                                </ul>
                                                                <div class="tab-content px-1">
                                                                    <div class="tab-pane child-basic-content"
                                                                        id="tabVerticalLeft1" role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab1">
                                                                        @if(!$exam_audio)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_audiometry?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Audiometry.view-audiometry', [$exam_audio])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft2"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab2">
                                                                        <div class="row">
                                                                            @if(!$exam_crf)
                                                                            <div class="container">
                                                                                <div
                                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                    <h2 class="text-center">This patient
                                                                                        has
                                                                                        no
                                                                                        record
                                                                                        in
                                                                                        this exam. Do you want to add a
                                                                                        record?
                                                                                    </h2>
                                                                                    <a href="/add_crf?id={{$patientCode->id}}"
                                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                                @include('CardiacRiskFactor.view-crf', [$exam_crf])
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft3"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab3">
                                                                        @if(!$exam_cardio)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_cardiovascular?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('CardioVascular.view-cardiovascular', [$exam_cardio])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content"
                                                                        id="tabVerticalLeft4" role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab4">
                                                                        @if (!$exam_dental)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_dental?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Dental.view-dental', [$exam_dental])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content"
                                                                        id="tabVerticalLeft5" role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab5">
                                                                        @if(!$exam_ecg)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_ecg?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('ECG.view-ecg', [$exam_ecg])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content"
                                                                        id="tabVerticalLeft17" role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab17">
                                                                        @if(!$exam_ppd)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_ppd?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('PPD.view-ppd', [$exam_ppd])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft6"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab6">
                                                                        @if(!$exam_echodoppler)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_echodoppler?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('EchoDoppler.view-echodoppler', [$exam_echodoppler])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft7"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab7">
                                                                        @if(!$exam_echoplain)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_echoplain?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('EchoPlain.view-echoplain', [$exam_echoplain])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft8"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab8">
                                                                        @if(!$exam_ishihara)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_ishihara?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Ishihara.view-ishihara', [$exam_ishihara])
                                                                        @endif
                                                                    </div>
                                                                    @if (session()->get('dept_id') == "1" || session()->get('dept_id') == "7" || session()->get('dept_id') == "8" || session()->get('dept_id') == "6")
                                                                    <div class="tab-pane child-basic-content my-1" id="tabVerticalLeft9"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab9">
                                                                        @if(!$exam_physical)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_physical?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Physical.view-physical', [$exam_physical])
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft10" role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab10">
                                                                        @if(!$exam_psycho)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_psycho?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Psychological.view-psycho', [$exam_psycho])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft11"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab11">
                                                                        @if(!$exam_psychobpi)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_psychobpi?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('PsychoBPI.view-psychobpi', [$exam_psychobpi])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft12"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab12">
                                                                        @if(!$exam_stressecho)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_stressecho?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('StressEcho.view-stressecho', [$exam_stressecho])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft13"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab13">
                                                                        @if(!$exam_stresstest)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_stresstest?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('StressTest.view-stresstest', [$exam_stresstest])
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
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_ultrasound?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Ultrasound.view-ultrasound', [$exam_ultrasound])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft16"
                                                                        role="tabpanel"
                                                                        varia-labelledby="baseVerticalLeft1-tab16">
                                                                        @if (!$exam_visacuity)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_visacuity?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Visacuity.view-visacuity', [$exam_visacuity])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-basic-content" id="tabVerticalLeft18"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab18">
                                                                        @if (!$exam_xray)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_xray?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('XRay.view-xray', [$exam_xray])
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane main-content" id="tabIcon36" role="tabpanel"
                                                        aria-labelledby="baseIcon-tab36">
                                                        <div class="col-md-12">
                                                            @if($patientCode == null)
                                                            <div
                                                                class="container d-flex justify-content-center align-items-center flex-column">
                                                                <h3 class="text-center font-weight-regular my-2">
                                                                    Before entering this section, the patient needs to
                                                                    admit.
                                                                </h3>
                                                                <a href="create_admission?id={{$patient->id}}&patientcode={{$patient->patientcode}}"
                                                                    class="btn btn-solid btn-primary text-center">Admit
                                                                    Now</a>
                                                            </div>
                                                            @else
                                                            <div class="nav-vertical">
                                                                @if (session()->get('dept_id') == "3" ||
                                                                session()->get('dept_id') ==
                                                                "1" || session()->get('dept_id') == "8")
                                                                <ul class="nav nav-tabs nav-left nav-border-left"
                                                                    role="tablist">
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_hema ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab25"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft25"
                                                                            href="#tabVerticalLeft25" role="tab"
                                                                            aria-selected="false">Hematology
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_urin ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab28"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft28"
                                                                            href="#tabVerticalLeft28" role="tab"
                                                                            aria-selected="false">Urinalysis</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_pregnancy ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab27"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft27"
                                                                            href="#tabVerticalLeft27" role="tab"
                                                                            aria-selected="false">Pregnancy</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_feca ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab24"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft24"
                                                                            href="#tabVerticalLeft24" role="tab"
                                                                            aria-selected="false">Fecalysis</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width  {{$exam_blood_serology ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab21"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft21"
                                                                            href="#tabVerticalLeft21" role="tab"
                                                                            aria-selected="true">Blood Chemistry</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_hepa ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab26"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft26"
                                                                            href="#tabVerticalLeft26" role="tab"
                                                                            aria-selected="false">Serology</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_hiv ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab22"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft22"
                                                                            href="#tabVerticalLeft22" role="tab"
                                                                            aria-selected="false">HIV</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_drug ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab23"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft23"
                                                                            href="#tabVerticalLeft23" role="tab"
                                                                            aria-selected="false">Drug
                                                                            Test</a>
                                                                    </li>
                                                                    <li class="nav-item vertical-tab-border">
                                                                        <a class="nav-link child-lab-tab nav-link-width {{$examlab_misc ? 'exam-done' : null}}"
                                                                            id="baseVerticalLeft1-tab29"
                                                                            data-toggle="tab"
                                                                            aria-controls="tabVerticalLeft29"
                                                                            href="#tabVerticalLeft29" role="tab"
                                                                            aria-selected="false">Miscellaneous</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content px-1">
                                                                    <div class="tab-pane" id="tabVerticalLeft21"
                                                                        role="tabpanel child-lab-content" aria-labelledby="baseVerticalLeft1-tab21">
                                                                        @if (!$exam_blood_serology)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_bloodsero?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Blood_Serology.view-bloodserology', [$exam_xray])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft22"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab22">
                                                                        @if (!$examlab_hiv)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_hiv?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('HIV.view-hiv', [$examlab_hiv])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft23"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab23">
                                                                        @if (!$examlab_drug)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_drug?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Drug.view-drug', [$examlab_drug])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft24"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab24">
                                                                        @if (!$examlab_feca)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_fecalysis?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Fecalysis.view-fecalysis', [$examlab_feca])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft25"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab25">
                                                                        @if (!$examlab_hema)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_hematology?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Hematology.view-hematology', [$examlab_hema])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft26"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab26">
                                                                        @if (!$examlab_hepa)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_hepatitis?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Hepatitis.view-hepatitis', [$examlab_hepa])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft27"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab27">
                                                                        @if (!$examlab_pregnancy)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_pregnancy?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Pregnancy.view-pregnancy', [$examlab_pregnancy])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft28"
                                                                        role="tabpanel"
                                                                        aria-labelledby="baseVerticalLeft1-tab28">
                                                                        @if (!$examlab_urin)
                                                                        <div class="container">
                                                                            <div
                                                                                class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                <h2 class="text-center">This patient has
                                                                                    no
                                                                                    record in
                                                                                    this
                                                                                    exam. Do you want to add a record?
                                                                                </h2>
                                                                                <a href="/add_urinalysis?id={{$patientCode->id}}"
                                                                                    class="btn btn-solid btn-primary te">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            @include('Urinalysis.view-urinalysis', [$examlab_urin])
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane child-lab-content" id="tabVerticalLeft29" role="tabpanel" aria-labelledby="baseVerticalLeft1-tab29">
                                                                        @if (!$examlab_misc)
                                                                            <div class="container">
                                                                                <div
                                                                                    class="container d-flex justify-content-center align-items-center my-3 flex-column">
                                                                                    <h2 class="text-center">This patient has
                                                                                        no
                                                                                        record in
                                                                                        this
                                                                                        exam. Do you want to add a record?
                                                                                    </h2>
                                                                                    <a href="/add_misc?id={{$patientCode->id}}"
                                                                                        class="btn btn-solid btn-primary te">Add</a>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @include('Miscellaneous.view-misc', [$examlab_misc])
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="account-invoice" role="tabpanel" aria-labelledby="account-pill-invoice" aria-expanded="false">
                            <div class="card">
                                @if($patient_or)
                                    @include('Patient.edit-patient-invoice', [$patient, $patientInfo, $exam_groups, $patient_package, $patient_or])
                                @else
                                    @include('Patient.add-patient-invoice', [$patient, $patientInfo, $exam_groups, $patient_package, $patientCode])
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                            aria-labelledby="account-pill-password" aria-expanded="false">
                            <div class="card">
                                <div class="card-body">
                                    @if ($latest_schedule)
                                    <form action='/update_schedule' method="POST">
                                        @csrf
                                        <h4 class="form-section"><i class="feather icon-user"></i>Re Schedule</h4>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <input type="hidden" name="patient_id"
                                                    value="{{$latest_schedule->patient_id}}">
                                                <input type="hidden" name="patientcode"
                                                    value="{{$latest_schedule->patientcode}}">
                                                <input type="hidden" name="id" value="{{$latest_schedule->id}}">
                                                <input type="date" max="2050-12-31" class="form-control"
                                                    value="{{$latest_schedule->date}}" name="schedule_date">
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes</button>
                                        </div>
                                        <input type="hidden" name="action" value="admin_update">
                                    </form>
                                    @else
                                    <form action='/store_schedule' method="POST">
                                        @csrf
                                        <h4 class="form-section"><i class="feather icon-user"></i>Add Schedule</h4>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                                <input type="hidden" name="patientcode" value="{{$patient->patientcode}}">

                                                <input type="date" max="2050-12-31" class="form-control" value="" name="schedule_date">
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes</button>
                                        </div>
                                        <input type="hidden" name="action" value="admin_store">
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($patientCode)
                        <div class="tab-pane fade" id="account-vertical-follow" role="tabpanel"
                            aria-labelledby="account-pill-follow" aria-expanded="false">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="card-title">
                                        Follow Up Form
                                    </div>
                                    <div>
                                        <a class="btn btn-secondary text-white" id="account-pill-connections"data-toggle="pill"
                                            onclick="window.open('/follow_up_print?id={{$patient->id}}&admission_id={{$patientCode->id}}&action=print')"
                                            aria-expanded="false">
                                            <i class="fa fa-print"></i>
                                            Print Follow Up Form
                                        </a>
                                        <a onclick="window.open('/follow_up_print?id={{$patient->id}}&admission_id={{$patientCode->id}}&action=download')" class="btn btn-secondary text-white"><i class="fa fa-download"></i> Download Follow Up Form</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        @forelse($followup_records as $key => $followup_record)
                                            <li class="nav-item">
                                                <a class="nav-link" id="{{ $key }}" data-toggle="tab" aria-controls="fl{{ $key }}" href="#fl{{ $key }}" role="tab" aria-selected="true">{{date_format(new DateTime($followup_record->date), "F d, Y")}}</a>
                                            </li>
                                        @empty
                                        @endforelse
                                            <li class="nav-item">
                                                <a class="nav-link active" id="new_followup" data-toggle="tab" aria-controls="new_followup1" href="#new_followup1" role="tab" aria-selected="true">New Follow Up</a>
                                            </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        @forelse($followup_records as $key => $followup_record)
                                            <div class="tab-pane" id="fl{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}">
                                                @php
                                                    $findings = explode(";", $followup_record->findings);
                                                    $recommendations = explode(";", $followup_record->remarks);
                                                @endphp
                                                <div class="my-1">
                                                    <button type="button" class="btn btn-danger delete-followup" id="{{ $followup_record->id }}"><i class="fa fa-trash"></i> Delete This Record</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="p-1 border">
                                                            <h3 class="font-weight-bold">Findings</h3>
                                                            <div class="row">
                                                                @foreach($findings as $finding)
                                                                    <div class="col-md-6 my-50">
                                                                        @php echo nl2br($finding) @endphp
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="p-1 border">
                                                            <h3 class="font-weight-bold">Recommendations</h3>
                                                            <div class="row">
                                                                @foreach($recommendations as $recommendation)
                                                                    <div class="col-md-6 my-50">
                                                                        @php echo nl2br($recommendation) @endphp
                                                                    </div>
                                                                @endforeach
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
                                                <input type="hidden" name="admission_id" value="{{ $patientCode->id }}">
                                                <div class="row p-1">
                                                    <div class="col-md-12 col-lg-8">
                                                        <div class="nav-vertical">
                                                            <ul class="nav nav-tabs nav-left nav-border-left" id="child-basic-tabs"
                                                                role="tablist">
                                                                <li class="nav-item vertical-tab-border">
                                                                    <a class="nav-link child-basic-tab nav-link-width active"
                                                                        id="patient-findings32"
                                                                        data-toggle="tab"
                                                                        aria-controls="patient-findings"
                                                                        href="#patient-findings" role="tab"
                                                                        aria-selected="false">Findings</a>
                                                                </li>
                                                                <li class="nav-item vertical-tab-border">
                                                                    <a class="nav-link child-basic-tab nav-link-width"
                                                                        id="patient-recommendations32"
                                                                        data-toggle="tab"
                                                                        aria-controls="patient-recommendations"
                                                                        href="#patient-recommendations" role="tab"
                                                                        aria-selected="false">Reccomendation</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content px-1">
                                                                <div class="tab-pane active in" id="patient-findings" aria-labelledby="patient-findings32" role="tabpanel">
                                                                    @include('Patient.patient_findings',
                                                                        [
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
                                                                            $examlab_misc
                                                                        ]
                                                                    )
                                                                </div>
                                                                <div class="tab-pane" id="patient-recommendations" aria-labelledby="patient-recommendations32" role="tabpanel">
                                                                    @include('Patient.patient_recommendations',
                                                                        [
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
                                                                            $examlab_misc
                                                                        ]
                                                                    )
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-4">
                                                        <!-- <div class="container-fluid">
                                                            <a href="" class="btn btn-solid btn-secondary">May 22, 2022</a>
                                                            <a href="" class="btn btn-solid btn-secondary">May 22, 2022</a>
                                                            <a href="" class="btn btn-solid btn-secondary">May 22, 2022</a>
                                                        </div> -->
                                                        <div class="container-fluid my-1">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bold">Full Name</label>
                                                                <input type="text" name="" id="" readonly value="{{ $patient->lastname }}, {{ $patient->firstname }} {{ $patient->middlename }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bold">Patient Code</label>
                                                                <input type="text" name="" id="" readonly value="{{ $patient->patientcode }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bold">Date</label>
                                                                <input type="date" name="date" id="" value="{{ date('Y-m-d') }}" class="form-control">
                                                            </div>
                                                            <button class="btn btn-primary float-right">Create Follow Up</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="base-tab3">
                                            <p>Biscuit ice cream halvah candy canes bear claw ice cream cake chocolate bar donut. Toffee cotton candy liquorice. Oat cake lemon drops gingerbread dessert caramels. Sweet dessert jujubes powder sweet sesame snaps.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        @if($patientCode)
                        <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                            aria-labelledby="account-pill-social" aria-expanded="false">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="card-title">
                                                <h3>Uploaded Files</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            @foreach ($errors->all() as $error)
                                            @push('scripts')
                                            <script>
                                            let toaster = toastr.error('{{$error}}', 'Error');
                                            </script>
                                            @endpush
                                            @endforeach
                                            <form action="/store_patient_files" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                                        <input type="file" class="form-control" id="upload_files"
                                                            name="upload_files[]" multiple />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-solid btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if ($patient_upload_files)
                                        @foreach ($patient_upload_files as $patient_upload_file)
                                        @if (pathinfo($patient_upload_file->file_name, PATHINFO_EXTENSION) == "pdf")
                                        <div class="col-md-2">
                                            <div class="upload-con">
                                                <img src="../../../app-assets/images/pdf.png" alt="">
                                                <div class="upload-btn-div">
                                                    <button type="button"
                                                        onclick="window.open('/app-assets/files/{{$patient_upload_file->file_name}}')"
                                                        class="btn-print">View</button>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-md-2">
                                            <div class="upload-con">
                                                <img src="../../../app-assets/files/{{$patient_upload_file->file_name}}"
                                                    alt="">
                                                <div class="upload-btn-div">
                                                    <button type="button"
                                                        onclick="window.open('/app-assets/files/{{$patient_upload_file->file_name}}')"
                                                        class="btn-print">View</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4><b>CERTIFICATES</b></h4>
                                    <div class="row container my-1">
                                        <div class="col-lg-4 col-xl-3 col-sm-6 ">
                                            <div class="print-con">
                                                <img src="../../../app-assets/images/gallery/mlc.png" alt="">
                                                <div class="print-btn-div">
                                                    <button type="button"
                                                        onclick="window.open('/mlc_print?id={{$patientCode->id}}','wp','width=1000,height=800').print();"
                                                        class="btn-print">Print MLC</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-3 col-sm-6 ">
                                            <div class="print-con">
                                                <img src="../../../app-assets/images/gallery/bahia.png" alt="">
                                                <div class="print-btn-div">
                                                    <button type="button"
                                                        onclick="window.open('/peme_bahia_print?id={{$patientCode->id}}','wp','width=1000,height=800').print();"
                                                        class="btn-print">Print PEME BAHIA</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-3 col-sm-6 ">
                                            <div class="print-con">
                                                <img src="../../../app-assets/images/gallery/mer.png" alt="">
                                                <div class="print-btn-div">
                                                    <button type="button"
                                                        onclick="window.open('/mer_print?id={{$patientCode->id}}','wp','width=1000,height=800').print();"
                                                        class="btn-print">Print MER</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><b>MEDICAL CERTIFICATE</b></h4>
                                    @include('PrintPanel.print-panel')
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                            aria-labelledby="account-pill-info" aria-expanded="false">
                            @if ($patientCode)
                                @include('Admission.edit-admission')
                            @else
                                @include('Admission.add-admission', [$patient, $patientInfo, $list_exams])
                            @endif
                        </div>
                        <div class="tab-pane fade" id="account-vaccination-record" role="tabpanel"  aria-labelledby="account-vaccination-record" aria-expanded="false">
                            @include('Patient.yellow_card', [$yellow_card_records])
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 order-lg-1 order-xl-2 order-sm-1 order-xs-1 col-lg-12 position-relative">
                    <div class="row p-50 rounded" style="background: #091a3b">
                        <div class="col-lg-3 col-md-4 col-xl-12">
                            <div class="row my-1">
                                <div
                                    class="col-md-12 col-xl-5 col-lg-12 d-xl-flex align-items-center justify-content-center">
                                    <button class="btn btn-solid p-0 open-camera" onclick="openCamera()">
                                        @if($patient->patient_image == null || $patient->patient_image == "" || !file_exists(public_path('app-assets/images/profiles/') . $patient->patient_image))
                                        <img src="../../../app-assets/images/profiles/profilepic.jpg" alt="Profile Picture" data-toggle="modal" data-target="#defaultSize" class="users-avatar-shadow rounded" height="110" width="110">
                                        @else
                                        <img src="../../../app-assets/images/profiles/{{$patient->patient_image . '?' . $patient->updated_date}}"
                                            data-toggle="modal" data-target="#defaultSize" alt="Profile Picture"
                                            class="users-avatar-shadow" height="110" width="110">
                                        @endif
                                    </button>
                                </div>
                                <div class="col-md-12 col-xl-6 col-lg-12 mx-50">
                                    <div class="pt-25">
                                        <div class="d-flex justify-content-start align-items-end my-25">
                                            @if($patient->patient_signature)
                                                <img src="@php echo base64_decode($patient->patient_signature) @endphp" class="signature-taken" style="position: relative !important;"/>
                                            @elseif ($patient->signature)
                                                <img src="data:image/jpeg;base64,{{$patient->signature}}" class="signature-taken"/>
                                            @else
                                                <div style="width: 150px;height: 40px;" class="bg-white rounded"></div>
                                            @endif
                                        </div>
                                        <div class="mb-50">
                                            <a href="/patient_edit/crop_signature?patient_id={{$patient->id}}" style="" class="btn btn-primary btn-sm">
                                                Edit Signature <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div> <span class="text-white font-weight-bold">
                                                {{$patient->firstname . ' ' . $patient->lastname}}
                                            </span>
                                        </div>
                                        <div class="users-view-id text-white">PATIENT ID: {{$patient->patientcode}}
                                        </div>
                                        <div class="text-white">ADMISSION ID: @php echo $patientCode ?
                                            $patientCode->id : "N /
                                            A" @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-12 mt-sm-2">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white active" id="account-pill-general"
                                        data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe"></i>
                                        General Info
                                    </a>
                                </li>
                                @if($patientCode)
                                    <li class="nav-item">
                                        <a class="nav-link d-flex text-white" id="account-pill-invoice"
                                            data-toggle="pill" href="#account-invoice" aria-expanded="true">
                                            <i class="fa fa-money"></i>
                                            {{$patient_or ? "Edit Payment" : "Generate Payment"}}
                                        </a>
                                    </li>
                                @endif
                                @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '17')
                                    @if ($latest_schedule)
                                        <li class="nav-item">
                                            <a class="nav-link d-flex text-white" id="account-pill-password" data-toggle="pill"
                                                href="#account-vertical-password" aria-expanded="false">
                                                <i class="feather icon-calendar"></i>
                                                Re Schedule
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link d-flex text-white" id="account-pill-password" data-toggle="pill"
                                                href="#account-vertical-password" aria-expanded="false">
                                                <i class="feather icon-calendar"></i>
                                                Add Schedule
                                            </a>
                                        </li>
                                    @endif
                                @endif
                                @if($patientCode)
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-pill-info" data-toggle="pill"
                                        aria-expanded="false" href="#account-vertical-info">
                                        <i class="feather icon-edit"></i>
                                        Edit Admission
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-pill-info" data-toggle="pill"
                                        aria-expanded="false" href="#account-vertical-info">
                                        <i class="feather icon-edit"></i>
                                        Add Admission
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-vaccination-record" data-toggle="pill"
                                        aria-expanded="false" href="#account-vaccination-record">
                                        <i class="feather icon-edit"></i>
                                        Yellow Card
                                    </a>
                                </li>
                                @if($patientCode)
                                    @if(session()->get('dept_id') == '1' || session()->get('dept_id') == '8')
                                        <li class="nav-item">
                                            <a class="nav-link d-flex text-white" id="account-pill-follow" data-toggle="pill"
                                                href="#account-vertical-follow" aria-expanded="false">
                                                <i class="fa fa-arrow-circle-left"></i>
                                                Follow Up Form
                                            </a>
                                        </li>
                                    @endif
                                @endif
                                @if($patientCode)
                                    @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '17')
                                    <li class="nav-item">
                                        <a class="nav-link d-flex text-white" id="account-pill-social" data-toggle="pill"
                                            href="#account-vertical-social" aria-expanded="false">
                                            <i class="fa fa-print"></i>
                                            Print Panel
                                        </a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link d-flex text-white" id="account-pill-connections"
                                            data-toggle="pill"
                                            onclick="window.open('/admission_print?id={{$patientCode->id}}').print()"
                                            aria-expanded="false">
                                            <i class="fa fa-print"></i>
                                            Print Routing Slip
                                        </a>
                                    </li>
                                @endif
                                @if (session()->get('dept_id') == '1')
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-pill-connections"
                                        data-toggle="pill"
                                        onclick="window.open('/referral_pdf?email={{$patient->email}}').print()"
                                        aria-expanded="false">
                                        <i class="fa fa-print"></i>
                                        Print Referral Slip
                                    </a>
                                </li>
                                @endif
                                @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '17' || session()->get('dept_id') == '8')
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-pill-connections"
                                        data-toggle="pill"
                                        onclick="window.open('/requests_print?id={{$patientInfo->medical_package}}&patient_id={{$patient->id}}').print()"
                                        aria-expanded="false">
                                        <i class="fa fa-print"></i>
                                        Print Requests
                                    </a>
                                </li>
                                @endif
                                @if($patientCode && session()->get('dept_id') == '1' || session()->get('dept_id') == '3' || session()->get('dept_id') == '8')
                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-pill-connections"
                                        data-toggle="pill"
                                        onclick="window.open('/lab_result?id={{$patientCode ? $patientCode->id : 0}}','wp','width=1000,height=800').print();"
                                        aria-expanded="false">
                                        <i class="fa fa-print"></i>
                                        Print Lab Result
                                    </a>
                                </li>
                                @endif

                                @if($patientCode)
                                    <li class="nav-item">
                                        <a class="nav-link d-flex text-white" id="account-pill-connections"
                                            data-toggle="pill"
                                            onclick="window.open('/medical_record?id={{$patientCode ? $patientCode->id : 0}}&patient_id={{$patient->id}}','wp','width=1000,height=800').print();"
                                            aria-expanded="false">
                                            <i class="fa fa-print"></i>
                                            Print Medical History
                                        </a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link d-flex text-white" id="account-pill-connections"
                                        data-toggle="pill"
                                        onclick="window.open('/data_privacy_print?id={{$patient->id}}').print()"
                                        aria-expanded="false">
                                        <i class="fa fa-print"></i>
                                        Print Data Privacy Form
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @if($patientCode)
                        <div class="col-lg-5 col-md-4 col-xl-12 my-1">
                            <h5 class="text-white">MEDICAL STATUS:
                                <span><b>
                                        @if ($patientCode->lab_status == 2)
                                            <b><u>FIT TO WORK</u></b>
                                        @elseif ($patientCode->lab_status == 1)
                                            <b><u>FINDINGS / RE ASSESSMENT</u></b>
                                        @elseif ($patientCode->lab_status == 3)
                                            <b><u>UNFIT TO WORK</u></b>
                                        @elseif ($patientCode->lab_status == 4)
                                            <b><u>UNFIT TEMPORARILY</u></b>
                                        @endif
                                    </b></span>
                            </h5>
                            <div class="my-1">
                                <button type="button" class="btn btn-sm p-75 m-25 text-white btn-outline-primary {{$patientCode->lab_status == 1 ? 'active' : null}}" data-toggle="modal" data-target="#pendingModal">
                                    PENDING
                                </button>
                                <button data-toggle="modal" data-target="#fitModal" type="button" class="btn btn-sm p-75 m-25 text-white btn-outline-success {{$patientCode->lab_status == 2 ? 'active' : null}}" id="done-btn">FIT</button>
                                <button type="button" class="btn btn-sm p-75 m-25 text-white btn-outline-primary {{$patientCode->lab_status == 3 ? 'active' : null}}" data-toggle="modal" data-target="#unfitModal">
                                    UNFIT
                                </button>
                                <button data-toggle="modal" data-target="#unfitTempModal" type="button" class="btn btn-sm p-75 text-white m-25 btn-outline-info {{$patientCode->lab_status == 4 ? 'active' : null}}"
                                    id="done-btn">UNFIT TEMP</button>
                            </div>
                            <div class="modal fade" id="fitModal" tabindex="-1" role="dialog" aria-lablledby="done-btn" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <div class="modal-title font-weight-bold">
                                                FIT
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-right">
                                                <button type="button" class="btn btn-primary" onclick="showMeds(this)">Show Meds</button>
                                            </div>
                                            <form action="#" method="POST" id="update_lab_result_fit">
                                                @csrf
                                                <input type="hidden" name="lab_status" value="2">
                                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                                <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                                                <input type="hidden" name="id" value="@php echo $patientCode ? $patientCode->id : null @endphp">
                                                <div class="form-group my-1">
                                                    <input type="text" class="form-control" name="" value="FIT" readonly />
                                                </div>
                                                <div class="prescription-group">
                                                    <div class="form-group">
                                                        <label>Prescription</label>
                                                        <textarea class="form-control" rows="10" cols="30" name="prescription" id="prescription">{{ $patientCode ? $patientCode->prescription : null }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Doctor Prescription</label>
                                                        <select required name="doctor_prescription" id="" class="select2">
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{$doctor->id}}">
                                                                    {{$doctor->firstname. " " . $doctor->lastname . " " . "($doctor->position)"}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-footer text-center">
                                                    <button class="submit-fit btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel18">
                                                PENDING
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="update_lab_result_pending" action="#" method="POST">
                                                @csrf
                                                <input type="hidden" name="lab_status" value="1">
                                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                                <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                                                <input type="hidden" name="id" value="@php echo $patientCode ? $patientCode->id : null @endphp">
                                                <div class="form-group">
                                                    <label>Re Schedule</label>
                                                    <input class="form-control" type="date" name="schedule" id="schedule" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Remarks/Recommendations:</label>
                                                    <textarea name="remarks" id="" cols="30" rows="10"
                                                        class="form-control">@php echo $patientCode ? $patientCode->remarks : null @endphp</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Prescription:</label>
                                                    <textarea name="prescription" id="" cols="30" rows="10"
                                                        class="form-control">@php echo $patientCode ? $patientCode->prescription : null @endphp</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Doctor Prescription</label>
                                                    <select required name="doctor_prescription" id="" class="select2">
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{$doctor->id}}">
                                                                {{$doctor->firstname. " " . $doctor->lastname . " " . "($doctor->position)"}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                                                    <button {{session()->get('dept_id') == 1 ? null : "disabled"}} type='submit' class='submit-pending btn btn-primary btn-lg'>Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="unfitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel18">
                                                UNFIT TO WORK
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="update_lab_result_unfit" action="#" method="POST">
                                                @csrf
                                                <input type="hidden" name="lab_status" value="3">
                                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                                <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                                                <input type="hidden" name="id" value="@php echo $patientCode ? $patientCode->id : null @endphp">
                                                <div class="form-group">
                                                    <label>Unfit Date</label>
                                                    <input class="form-control" value="{{$patient->unfit_to_work_date}}" type="date" name="unfit_date" id="unfit_date" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Cause of Unfit:</label>
                                                    <textarea name="cause_of_unfit" id="" cols="30" rows="10"
                                                        class="form-control">@php echo $patientCode ? nl2br($patientCode->cause_of_unfit) : null; @endphp</textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                                                    <button {{session()->get('dept_id') == 1 ? null : "disabled"}} type='submit' class='submit-unfit btn btn-primary btn-lg'>Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="unfitTempModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel18">
                                                UNFIT TEMPORARILY
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="update_lab_result_unfittemp" action="#" method="POST">
                                                @csrf
                                                <input type="hidden" name="lab_status" value="4">
                                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                                <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                                                <input type="hidden" name="id" value="@php echo $patientCode ? $patientCode->id : null @endphp">
                                                <div class="form-group">
                                                    <label>Re Schedule</label>
                                                    <input class="form-control" type="date" name="schedule" id="schedule" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Remarks/Recommendations:</label>
                                                    <textarea name="remarks" id="" cols="30" rows="10"
                                                        class="form-control">@php echo $patientCode ? $patientCode->remarks : null @endphp</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Prescription:</label>
                                                    <textarea name="prescription" id="" cols="30" rows="10"
                                                        class="form-control">@php echo $patientCode ? $patientCode->prescription : null @endphp</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Doctor Prescription</label>
                                                    <select required name="doctor_prescription" id="" class="select2">
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{$doctor->id}}">
                                                                {{$doctor->firstname. " " . $doctor->lastname . " " . "($doctor->position)"}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                                                    <button {{session()->get('dept_id') == 1 ? null : "disabled"}} type='submit' class='submit-unfittemp btn btn-primary btn-lg'>Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <label class="modal-title text-text-bold-600" id="myModalLabel33">Laboratory
                                                Result</label>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="update_lab_result_reassessment" action="#" method="POST">
                                            @csrf
                                            @include('Patient.patient_findings',
                                                [
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
                                                    $examlab_misc
                                                ]
                                            )
                                            <div class="modal-body">
                                                <input type="hidden" name="lab_status" value="1">
                                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                                <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                                                <input type="hidden" name="id" value="@php echo $patientCode ? $patientCode->id : null @endphp">
                                                <input type="hidden" name="schedule_id" value="@php echo $latest_schedule ? $latest_schedule->id : null @endphp">
                                                <div class="form-group">
                                                    <label for="">Remarks/Recommendations:</label>
                                                    <textarea name="remarks" id="" cols="30" rows="10"
                                                        class="form-control">@php echo $patientCode ? $patientCode->remarks : null @endphp</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Next Schedule Date: </label>
                                                    <input type="date" max="2050-12-31" name="schedule" class="form-control"
                                                        value="{{$latest_schedule ? $latest_schedule->date : null}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Doctor Prescription</label>
                                                    <select required name="doctor_prescription" id="" class="select2">
                                                        @foreach ($doctors as $doctor)
                                                        <option value="{{$doctor->id}}">
                                                            {{$doctor->firstname. " " . $doctor->lastname . " " . "($doctor->position)"}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Prescription</label>
                                                    <textarea name="prescription" id="" cols="30" rows="7"
                                                        class="form-control">{{$patientCode ? $patientCode->prescription : ""}}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="reset" class="btn btn-outline-secondary btn-lg"
                                                    data-dismiss="modal" value="close">
                                                <button {{session()->get('dept_id') == 1 ? null : "disabled"}} type='submit'
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
                                        <a class="nav-link primary" id="profile-tab1" data-toggle="tab" href="#profile1"
                                            aria-controls="profile1" role="tab" aria-selected="false">On Going Exams</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane active" id="home1" aria-labelledby="home-tab1" role="tabpanel">
                                        <div class="row">
                                            @if ($completed_exams)
                                                @foreach ($completed_exams as $key => $patient_exam)
                                                    <div class="col-md-6 col-xl-12 my-50">
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="customCheck" id="customCheck1" checked disabled>
                                                                <label class="custom-control-label text-white"
                                                                    for="customCheck1">{{$key}}</label>
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
                                                            for="customCheck1">{{$key}}</label>
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
<script src="../../../app-assets/js/scripts/custom.js"></script>

<script>
let agency = document.querySelector('#agency');
let bahia_ids = [55, 57, 58, 59, 3];
let vessels_one = ['BLUETERN', 'BOLDTERN', 'BRAVETERN'];
let vessels_two = ['BALMORAL', 'BOREALIS', 'MS BALMORAL', 'MS BOREALIS'];
let vessel_three = ['BOLETTE', 'BRAEMAR', 'MS BOLETTE', 'MS BRAEMAR'];
let all_vessel = [...vessels_one, ...vessels_two, ...vessel_three];

let hartmann_principals = ['DONNELLY TANKER MANAGEMENT LTD', 'INTERNSHIP NAVIGATION CO. LTD', 'HARTMANN GAS CARRIER GERMANY GMBH & CO. KG.', 'SEAGIANT SHIPMANAGEMENT LTD.'];

function selectOccupation(e) {
    if(e.value == 'OTHER' || e == 'OTHER') {
        $('.occupation_other_container').css('display', 'block');
    } else {
        $('.occupation_other_container').css('display', 'none');
    }
}

function selectReligion(e) {
    if(e.value == 'OTHERS' || e == 'OTHERS') {
        $('.religion_other_container').css('display', 'block');
    } else {
        $('.religion_other_container').css('display', 'none');
    }
}

function showMeds(e) {
    let prescriptionGroup = document.querySelector('.prescription-group');
    if(prescriptionGroup.classList.contains('show-med')) {
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
        url: '{{route("agencies.select")}}',
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
            if(bahia_ids.includes(response[1].id)) {
                getBahiaVessels(response[1], false);
            } else {
                $('.bahia-vessel').addClass('remove');
                $('.natural-vessel').removeClass('remove');
            }

            if(response[1].id == 9) {
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

   if('{{Session::get("redirect")}}' != '') {
       let baseString = '{{Session::get("redirect")}}';
       let directions = baseString.split(";");

       if(directions[0] == 'basic-exam') {
            document.querySelector('#baseIcon-tab35').click();
            document.querySelector(`#${directions[3]}`).click();
       }else {
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
    if(isFirst) {
        hartmann_principals.forEach(principal => {
            if(selected_principal == principal) {
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

    let selected_vessel = '{{$patientInfo->vessel}}';

    $('.bahia-select-vessels option').remove();

    if(info.id == 55) {
        if(isFirst) {
            vessel_three.forEach(vessel => {
                if(selected_vessel == vessel) {
                    $(`<option selected value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                } else {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                }
            });
        } else {
            vessel_three.forEach(vessel => {
                $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
            });
        }
    }

    if(info.id == 57) {
        if(isFirst) {
            vessels_two.forEach(vessel => {
                if(selected_vessel == vessel) {
                    $(`<option selected value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                } else {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                }
            });
        } else {
            vessels_two.forEach(vessel => {
                $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
            });
        }
    }

    if(info.id == 58) {
        if(isFirst) {
            vessels_one.forEach(vessel => {
                if(selected_vessel == vessel) {
                    $(`<option selected value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                } else {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                }
            });
        } else {
            vessels_one.forEach(vessel => {
                $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
            });
        }
    }

    if(info.id == 3) {
        if(isFirst) {
            all_vessel.forEach(vessel => {
                if(selected_vessel == vessel) {
                    $(`<option selected value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                } else {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
                }
            });
        } else {
            all_vessel.forEach(vessel => {
                $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '.bahia-select-vessels');
            });
        }
    }
}

$(".delete-followup").click(function() {
    let id = $(this).attr('id');
    let csrf = '{{ csrf_token()}}';
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
                    "<button type='button' class='btn btn-solid btn-success'>FIT TO WORK</button>"
                )
            });
        }
    })
})

$(".medical-done").click(function() {
    let id = "@php echo $patientCode ? $patientCode->id : null @endphp";
    let csrf = '{{ csrf_token()}}';
    Swal.fire({
        title: 'Are you sure you want to change it?',
        text: "",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).html(
                "<button type='button' class='btn btn-solid btn-success'><i class='fa fa-refresh spinner'></i>FIT TO WORK</button>"
            );
            $.ajax({
                url: '/update_lab_result',
                method: 'POST',
                data: {
                    id: id,
                    lab_status: 2,
                    remarks: "Cleared",
                    agency_id: '{{$patientInfo->agency_id}}',
                    _token: csrf
                },
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
                    "<button type='button' class='btn btn-solid btn-success'>FIT TO WORK</button>"
                )
            });
        }
    })
})

$("#update_lab_result_reassessment").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $(".submit-reassessment").html("<button type='submit' class='submit-reassessment btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>");
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
    }).done(function (data) {
        $(this).html("<input type='submit' class='submit-reassessment btn btn-primary btn-lg' value='Submit'>")
    });
})

$("#update_lab_result_unfit").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $(".submit-unfit").html("<button type='submit' class='submit-unfit btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>");
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
    }).done(function (data) {
        $(this).html("<input type='submit' class='submit-unfit btn btn-primary btn-lg' value='Submit'>")
    });
})

$("#update_lab_result_pending").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $(".submit-pending").html("<button type='submit' class='submit-pending btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>");
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
    }).done(function (data) {
        $(this).html("<input type='submit' class='submit-unfit btn btn-primary btn-lg' value='Submit'>")
    });
})

$("#update_lab_result_fit").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $(".submit-fit").html("<button type='submit' class='submit-fit btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>");
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
    }).done(function (data) {
        $(this).html("<input type='submit' class='submit-fit btn btn-primary btn-lg' value='Submit'>")
    });
})

$("#update_lab_result_unfittemp").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $(".submit-unfittemp").html("<button type='submit' class='submit-unfittemp btn btn-primary btn-lg'><i class='fa fa-refresh spinner'></i> Submit</button>");
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
    }).done(function (data) {
        $(this).html("<input type='submit' class='submit-unfittemp btn btn-primary btn-lg' value='Submit'>")
    });
})

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
    if(e.value === 'OTHER SERVICES') {
        con.style.display = 'block';
    } else {
        con.style.display = 'none';
    }
}

window.addEventListener('load', () => {
    if(bahia_ids.includes(Number(agency.value))) {
        getBahiaVessels({id: agency.value}, true);
    } else {
        $('.bahia-vessel').addClass('remove');
        $('.natural-vessel').removeClass('remove');
    }
    if(agency.value == 9) {
        getHartmannPrincipals(true);
    }
})

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
                                    <option value="{{$exam->id}}">
                                        {{$exam->examname}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="quantity-container col-md-3 text-center">
                            <input class="mx-1" name="charge[${count3++}]" id="charge" type="checkbox" placeholder="Charge" value="package" />
                        </div>
                        <div class="col-md-3 text-center">
                            {{date('Y-m-d')}}
                        </div>
                        <div class="col-md-3 text-center">
                            <button type="button" onclick="onDeleteItem(this)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>`;
  itemForms.appendChild(addForm);
  $('.select2').select2();
})

function onDeleteItem(e){
  return e.parentElement.parentElement.remove();
}

</script>
@endpush
