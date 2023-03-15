@extends('layouts.app')


@section('content')
<!-- BEGIN: Content-->
<div class="container">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-11 col-12 mb-2">
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
                <div class="col-md-1 col-12">
                    <a class="btn btn-solid bg-success bg-darken-2 text-white" href="/edit-patient-info">Edit</a>
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
                                        <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                                            href="#account-vertical-password" aria-expanded="false">
                                            <i class="feather icon-globe"></i>
                                            Agency Information
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
                                                    <div class="media">
                                                        <a href="javascript: void(0);">
                                                            <img src="../../../app-assets/images/profiles/{{$patient->patient_image}}"
                                                                class="rounded mr-75 mt-1" alt="profile image"
                                                                height="64" width="64">
                                                        </a>
                                                        <div class="media-body mt-75">
                                                            <div
                                                                class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <h2>{{$patient->firstname}} {{$patient->lastname}}</h2>
                                                            </div>
                                                            <h4>{{$patient->patientcode}}</h4>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <form novalidate>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-username">Firstname</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-username"
                                                                            value="{{$patient->firstname}}" required
                                                                            data-validation-required-message="This username field is required">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-name">Lastname</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-name"
                                                                            value="{{$patient->lastname}}" required
                                                                            data-validation-required-message="This name field is required">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="">Middle Name</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="" value="{{$patient->middlename}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="account-company">Username</label>
                                                                    <input disabled type="text" class="form-control"
                                                                        id="account-company" placeholder="Company name"
                                                                        value="{{$patient->username}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="">Email
                                                                            Address</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="" value="{{$patient->email}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Home Address</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->address}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Age</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patient->age}}" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Birthdate</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->birthdate}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Birth Place</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->birthplace}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Civil Status</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->maritalstatus}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Occupation</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->occupation}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Gender</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patient->gender}}" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Nationality</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->nationality}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Religion</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->religion}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-e-mail">Phone Number</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-e-mail"
                                                                            value="{{$patientInfo->contactno}}"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade " id="account-vertical-password"
                                                    role="tabpanel" aria-labelledby="account-pill-password"
                                                    aria-expanded="false">
                                                    <form novalidate>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-old-password">Name of
                                                                            Agency</label>
                                                                        <input disabled type="text" class="form-control"
                                                                            id="account-old-password" required
                                                                            placeholder=""
                                                                            value="{{$patientInfo->agency}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-new-password">Address of
                                                                            Agency</label>
                                                                        <input disabled type="text" name="password"
                                                                            id="account-new-password"
                                                                            class="form-control"
                                                                            placeholder="New Password" required
                                                                            value="{{$patientInfo->agency_address}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-retype-new-password">
                                                                            Country of Destination</label>
                                                                        <input disabled type="text" name="con-password"
                                                                            class="form-control" required
                                                                            id="account-retype-new-password"
                                                                            value="{{$patientInfo->country_destination}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-retype-new-password">
                                                                            Vessel</label>
                                                                        <input disabled type="text" name="con-password"
                                                                            class="form-control" required
                                                                            id="account-retype-new-password"
                                                                            value="{{$patientInfo->vessel}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label
                                                                            for="account-retype-new-password">Passport
                                                                        </label>
                                                                        <input disabled type="text" name="con-password"
                                                                            class="form-control" required
                                                                            id="account-retype-new-password"
                                                                            value="{{$patientInfo->passportno}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-retype-new-password">SSRB #
                                                                        </label>
                                                                        <input disabled type="text" name="con-password"
                                                                            class="form-control" required
                                                                            id="account-retype-new-password"
                                                                            value="{{$patientInfo->srbno}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-retype-new-password">Medical
                                                                            Package Test
                                                                        </label>
                                                                        <input disabled type="text" name="con-password"
                                                                            class="form-control" required
                                                                            id="account-retype-new-password"
                                                                            value="{{$patientInfo->medical_package}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label
                                                                            for="account-retype-new-password">Position
                                                                            Applied for
                                                                        </label>
                                                                        <input disabled type="text" name="con-password"
                                                                            class="form-control" required
                                                                            id="account-retype-new-password"
                                                                            value="{{$patient->position_applied}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-connections"
                                                    role="tabpanel" aria-labelledby="account-pill-connections"
                                                    aria-expanded="false">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-6">
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
                                                                            Depression, other mental disorder
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
                                                                            Eye problems / Error of refraction
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
                                                                            Do you feel healthy /<br>Fit to perform
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
                                                        <div class="col-md-12  col-lg-6">
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
                                                                            Operation(s)
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
                                                        <div class="col-md-12 col-lg-6">
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
                                                                            Genetic, Heredity or Familial Dis. </td>
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
                                                                            Sexually Transmitted Disease (Syphilis)
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
                                                                            Allergies </td>
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
                                                                            Taking medication for Hypertension </td>
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
                                                                            Taking medication for Diabetes </td>
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
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-notifications"
                                                    role="tabpanel" aria-labelledby="account-pill-notifications"
                                                    aria-expanded="false">
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
                                                                <h4>Have you been in contact with people being infected,
                                                                    suspected or diagnosed with COVID-19?</h4>
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
                                                                        <td class="col-12 h4">Shortness of Breath</td>
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
                                                                        <td class="col-12 h4">Persistent Pain in the
                                                                            Chest</td>
                                                                        <td>
                                                                            @if($declarationForm->persistent_pain_in_chess
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
</script>
@endsection