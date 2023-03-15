@extends('layouts.app')


@section('content')
<!-- BEGIN: Content-->
<div class="container">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Patient Registration Form</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Patient</a>
                                </li>
                                <li class="breadcrumb-item active">Registration Form
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with step validation section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="/save-info" class="steps-validation wizard-circle"
                                            id="patient-form" method="POST">
                                            <!-- Step 1 -->
                                            <h6>Personal Info</h6>
                                            <!-- <hr> -->
                                            <fieldset>
                                                @csrf
                                                <h4 class="form-section"><i class="feather icon-user"></i> Personal
                                                    Info
                                                </h4>
                                                <input required type="hidden" value="{{$data['patientId']}}"
                                                    name="main_id">
                                                <input type="hidden" name="patientcode"
                                                    value="{{$data['patientCode']}}">
                                                <input type="hidden" name="patient_image" id="patient_image">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <!-- Button trigger modal -->
                                                            <button type="button"
                                                                class="btn btn-outline-primary block btn-lg take-picture"
                                                                data-toggle="modal" onclick="openCamera()"
                                                                data-target="#default">
                                                                Take a Picture
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade text-left" id="default" tabindex="-1"
                                                                role="dialog" aria-labelledby="myModalLabel1"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div
                                                                        class="modal-content d-flex justify-content-center align-items-center">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="myModalLabel1">
                                                                                Take a Picture</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="camera"></div>
                                                                        <button type="button"
                                                                            class="btn btn-solid btn-primary my-2"
                                                                            onclick="saveImage()">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="image-taken"></div>
                                                    </div>
                                                </div>
                                                <div class=" row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="firstName3">
                                                                First Name :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                id="firstName3" name="firstName">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="lastName3">
                                                                Last Name :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                id="lastName3" name="lastName">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="lastName3">
                                                                Middle Name :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" name="middleName">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Home Address (Street, Municipality) :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="homeAdress">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Age :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="number" class="form-control"
                                                                name="age">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Birthdate :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="date" class="form-control"
                                                                name="birthdate">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Birthplace :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="birthplace">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Civil Status :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <select required class="form-control" name="civilStatus">
                                                                <option value="">Select Civil Status</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Widowed">Widowed</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Domestic Relationship">Domestic
                                                                    Relationship</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Occupation :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="occupation">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Gender :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <select required class="form-control" name="gender">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Nationality :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="nationality">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Religion :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="religion">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Phone Number :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="tel" class="form-control"
                                                                name="phoneNumber">
                                                        </div>
                                                    </div>
                                                    <input type="date" name="date" id="" hidden value="<?php echo date(
                                                        'Y-m-d'
                                                    ); ?>">
                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6>Agency Info</h6>
                                            <fieldset>
                                                <h4 class="form-section"><i class="feather icon-user"></i>Agency Info
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstName3">
                                                                Name of Agency :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <select class="form-control select2" name="agencyName">
                                                                <option value=""> </option>
                                                                @foreach($agencies as $row)
                                                                <option value="{{$row->agencyname}}">
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
                                                            <input required type="text" class="form-control"
                                                                name="address_of_agency">
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
                                                            <input required type="text" class="form-control"
                                                                name="countryDestination">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Vessel :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="vessel">
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
                                                            <input required type="text" class="form-control"
                                                                name="passportNo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                SSRB # :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="ssrb">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Medical Package Test :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="medicalPackage">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Position Applied for :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input required type="text" class="form-control"
                                                                name="positionApplied">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 3 -->
                                            <h6>Medical History</h6>
                                            <fieldset>
                                                <h4 class="form-section"><i class="feather icon-user"></i> Medical
                                                    History
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped medical-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Head and Neck Injury</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="head_and_neck_injury"
                                                                                    id="head_and_neck_injury1">
                                                                                <label class="custom-control-label"
                                                                                    for="head_and_neck_injury1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="head_and_neck_injury"
                                                                                    id="head_and_neck_injury2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="head_and_neck_injury2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Frequent Headache</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="frequent_head_ache"
                                                                                    id="frequent_head_ache1">
                                                                                <label class="custom-control-label"
                                                                                    for="frequent_head_ache1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="frequent_head_ache"
                                                                                    id="frequent_head_ache2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="frequent_head_ache2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Frequent Dizziness</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="frequent_dizziness"
                                                                                    id="frequent_dizziness1">
                                                                                <label class="custom-control-label"
                                                                                    for="frequent_dizziness1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="frequent_dizziness"
                                                                                    id="frequent_dizziness2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="frequent_dizziness2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Fainting Spells, Fits</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="fainting_spells"
                                                                                    id="fainting_spells1">
                                                                                <label class="custom-control-label"
                                                                                    for="fainting_spells1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="fainting_spells"
                                                                                    id="fainting_spells2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="fainting_spells2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Seizures</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="seizures" id="seizures1">
                                                                                <label class="custom-control-label"
                                                                                    for="seizures1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="seizures" id="seizures2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="seizures2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Other neurological disorders</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="other_neurological_disorders"
                                                                                    id="other_neurological_disorders1">
                                                                                <label class="custom-control-label"
                                                                                    for="other_neurological_disorders1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="other_neurological_disorders"
                                                                                    id="other_neurological_disorders2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="other_neurological_disorders2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Insomia or Sleep disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="insomia_or_sleep_disorder"
                                                                                    id="insomia_or_sleep_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="insomia_or_sleep_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="insomia_or_sleep_disorder"
                                                                                    id="insomia_or_sleep_disorder2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="insomia_or_sleep_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Depression, other mental disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="depression_or_other_mental_disorder"
                                                                                    id="depression_or_other_mental_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="depression_or_other_mental_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="depression_or_other_mental_disorder"
                                                                                    id="depression_or_other_mental_disorder2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="depression_or_other_mental_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Eye problems / Error of refraction</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="eye_problems_or_error_of_refraction"
                                                                                    id="eye_problems_or_error_of_refraction1">
                                                                                <label class="custom-control-label"
                                                                                    for="eye_problems_or_error_of_refraction1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="eye_problems_or_error_of_refraction"
                                                                                    id="eye_problems_or_error_of_refraction2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="eye_problems_or_error_of_refraction2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Deafness / Ear disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="deafness_or_ear_disorder"
                                                                                    id="deafness_or_ear_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="deafness_or_ear_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="deafness_or_ear_disorder"
                                                                                    id="deafness_or_ear_disorder2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="deafness_or_ear_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nose or Throat disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="nose_or_throat_disorder"
                                                                                    id="nose_or_throat_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="nose_or_throat_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="nose_or_throat_disorder"
                                                                                    id="nose_or_throat_disorder2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="nose_or_throat_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tuberculosis</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="tuberculosis"
                                                                                    id="tuberculosis1">
                                                                                <label class="custom-control-label"
                                                                                    for="tuberculosis1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="tuberculosis"
                                                                                    id="tuberculosis2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="tuberculosis2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Signed off as sick</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="signed_off_as_sick"
                                                                                    id="signed_off_as_sick1">
                                                                                <label class="custom-control-label"
                                                                                    for="signed_off_as_sick1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="signed_off_as_sick"
                                                                                    id="signed_off_as_sick2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="signed_off_as_sick2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Repatriation form ship</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="repatriation_form_ship"
                                                                                    id="repatriation_form_ship1">
                                                                                <label class="custom-control-label"
                                                                                    for="repatriation_form_ship1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="repatriation_form_ship"
                                                                                    id="repatriation_form_ship2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="repatriation_form_ship2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Declared Unfit for sea duty</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="declared_unfit_for_sea_duty"
                                                                                    id="declared_unfit_for_sea_duty1">
                                                                                <label class="custom-control-label"
                                                                                    for="declared_unfit_for_sea_duty1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="declared_unfit_for_sea_duty"
                                                                                    id="declared_unfit_for_sea_duty2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="declared_unfit_for_sea_duty2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Previous Hospitalization</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="previous_hospitalization"
                                                                                    id="previous_hospitalization1">
                                                                                <label class="custom-control-label"
                                                                                    for="previous_hospitalization1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="previous_hospitalization"
                                                                                    id="previous_hospitalization2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="previous_hospitalization2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Do you feel healthy /<br>Fit to perform
                                                                        duties of <br> designed position</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="feel_healthy"
                                                                                    id="feel_healthy1">
                                                                                <label class="custom-control-label"
                                                                                    for="feel_healthy1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="feel_healthy"
                                                                                    id="feel_healthy2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="feel_healthy2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped col-md-12  medical-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Other Lung disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="other_lung_disorder"
                                                                                    id="other_lung_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="other_lung_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="other_lung_disorder"
                                                                                    id="other_lung_disorder2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="other_lung_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>High Blood Pressure</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="high_blood_pressure"
                                                                                    id="high_blood_pressure1" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="high_blood_pressure1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="high_blood_pressure"
                                                                                    id="high_blood_pressure2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="high_blood_pressure2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Heart Disease / Vascular</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="heart_disease_or_vascular"
                                                                                    id="heart_disease_or_vascular1">
                                                                                <label class="custom-control-label"
                                                                                    for="heart_disease_or_vascular1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="heart_disease_or_vascular"
                                                                                    id="heart_disease_or_vascular2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="heart_disease_or_vascular2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Chest pain</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="chest_pain" id="chest_pain1">
                                                                                <label class="custom-control-label"
                                                                                    for="chest_pain1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="chest_pain" id="chest_pain2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="chest_pain2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Rheumatic Fever</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="rheumatic_fever"
                                                                                    id="rheumatic_fever1">
                                                                                <label class="custom-control-label"
                                                                                    for="rheumatic_fever1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="rheumatic_fever"
                                                                                    id="rheumatic_fever2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="rheumatic_fever2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diabetes Mellitus</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="diabetes_mellitus"
                                                                                    id="diabetes_mellitus1">
                                                                                <label class="custom-control-label"
                                                                                    for="diabetes_mellitus1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="diabetes_mellitus"
                                                                                    id="diabetes_mellitus2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="diabetes_mellitus2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Endocrine disorders (goiter)</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="endocrine_disorders"
                                                                                    id="endocrine_disorders1">
                                                                                <label class="custom-control-label"
                                                                                    for="endocrine_disorders1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="endocrine_disorders"
                                                                                    id="endocrine_disorders2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="endocrine_disorders2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Cancer or Tumor</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="cancer_or_tumor"
                                                                                    id="cancer_or_tumor1" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="cancer_or_tumor1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="cancer_or_tumor"
                                                                                    id="cancer_or_tumor2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="cancer_or_tumor2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Blood disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="blood_disorder"
                                                                                    id="blood_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="blood_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="blood_disorder"
                                                                                    id="blood_disorder2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="blood_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Stomach pain, Gastritis</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="stomach_pain_or_gastritis"
                                                                                    id="stomach_pain_or_gastritis1">
                                                                                <label class="custom-control-label"
                                                                                    for="stomach_pain_or_gastritis1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="stomach_pain_or_gastritis"
                                                                                    id="stomach_pain_or_gastritis2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="stomach_pain_or_gastritis2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Ulcer</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="ulcer" id="ulcer1">
                                                                                <label class="custom-control-label"
                                                                                    for="ulcer1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="ulcer" id="ulcer2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="ulcer2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Other Abdominal Disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="other_abdominal_disorder"
                                                                                    id="other_abdominal_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="other_abdominal_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="other_abdominal_disorder"
                                                                                    id="other_abdominal_disorder2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="other_abdominal_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Medical certificate restricted</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="medical_certificate_restricted"
                                                                                    id="medical_certificate_restricted1">
                                                                                <label class="custom-control-label"
                                                                                    for="medical_certificate_restricted1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="medical_certificate_restricted"
                                                                                    id="medical_certificate_restricted2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="medical_certificate_restricted2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Medical certificate revoked</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="medical_certificate_revoked"
                                                                                    id="medical_certificate_revoked1">
                                                                                <label class="custom-control-label"
                                                                                    for="medical_certificate_revoked1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="medical_certificate_revoked"
                                                                                    id="medical_certificate_revoked2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="medical_certificate_revoked2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Aware of any medical problems</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="aware_of_medical_problems"
                                                                                    id="aware_of_medical_problems1">
                                                                                <label class="custom-control-label"
                                                                                    for="aware_of_medical_problems1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="aware_of_medical_problems"
                                                                                    id="aware_of_medical_problems2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="aware_of_medical_problems2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Aware of any disease / illness</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="aware_of_any_disease_or_illness"
                                                                                    id="aware_of_any_disease_or_illness1">
                                                                                <label class="custom-control-label"
                                                                                    for="aware_of_any_disease_or_illness1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="aware_of_any_disease_or_illness"
                                                                                    id="aware_of_any_disease_or_illness2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="aware_of_any_disease_or_illness2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Operation(s)</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="operation" id="operation1">
                                                                                <label class="custom-control-label"
                                                                                    for="operation1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="operation" id="operation2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="operation2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped col-md-12 medical-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Gynecological Disorders</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="gynecological_disorder"
                                                                                    id="gynecological_disorders1">
                                                                                <label class="custom-control-label"
                                                                                    for="gynecological_disorders1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="gynecological_disorder"
                                                                                    id="gynecological_disorders2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="gynecological_disorders2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Last Menstrual Period</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="last_menstrual_period"
                                                                                    id="last_menstrual_period1">
                                                                                <label class="custom-control-label"
                                                                                    for="last_menstrual_period1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="last_menstrual_period"
                                                                                    id="last_menstrual_period2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="last_menstrual_period2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pregnancy</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="pregnancy" id="pregnancy1">
                                                                                <label class="custom-control-label"
                                                                                    for="pregnancy1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="pregnancy" id="pregnancy2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="pregnancy2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kidney or Bladder Disorder</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="kidney_or_bladder_disorder"
                                                                                    id="kidney_or_bladder_disorder1">
                                                                                <label class="custom-control-label"
                                                                                    for="kidney_or_bladder_disorder1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="kidney_or_bladder_disorder"
                                                                                    id="kidney_or_bladder_disorder2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="kidney_or_bladder_disorder2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Back Injury / Joint pain</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="back_injury_or_joint_pain"
                                                                                    id="back_injury_or_joint_pain1">
                                                                                <label class="custom-control-label"
                                                                                    for="back_injury_or_joint_pain1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="back_injury_or_joint_pain"
                                                                                    id="back_injury_or_joint_pain2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="back_injury_or_joint_pain2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Arthritis</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="arthritis" id="arthritis1">
                                                                                <label class="custom-control-label"
                                                                                    for="arthritis1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="arthritis" id="arthritis2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="arthritis2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Genetic, Heredity or Familial Dis.</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="genetic_or_heredity_or_familial_dis"
                                                                                    id="genetic_or_heredity_or_familial_dis1">
                                                                                <label class="custom-control-label"
                                                                                    for="genetic_or_heredity_or_familial_dis1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="genetic_or_heredity_or_familial_dis"
                                                                                    id="genetic_or_heredity_or_familial_dis2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="genetic_or_heredity_or_familial_dis2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sexually Transmitted Disease (Syphilis)</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="sexually_transmitted_disease"
                                                                                    id="sexually_transmitted_disease1">
                                                                                <label class="custom-control-label"
                                                                                    for="sexually_transmitted_disease1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="sexually_transmitted_disease"
                                                                                    id="sexually_transmitted_disease2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="sexually_transmitted_disease2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tropical Disease - Malaria</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="tropical_disease"
                                                                                    id="tropical_disease1">
                                                                                <label class="custom-control-label"
                                                                                    for="tropical_disease1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="tropical_disease"
                                                                                    id="tropical_disease2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="tropical_disease2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Thypoid Fever</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="thypoid_fever"
                                                                                    id="thypoid_fever1">
                                                                                <label class="custom-control-label"
                                                                                    for="thypoid_fever1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="thypoid_fever"
                                                                                    id="thypoid_fever2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="thypoid_fever2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Schistosomiasis</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="schistosomiasis"
                                                                                    id="schistosomiasis1">
                                                                                <label class="custom-control-label"
                                                                                    for="schistosomiasis1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="schistosomiasis"
                                                                                    id="schistosomiasis2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="schistosomiasis2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Asthma</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="asthma" id="asthma1">
                                                                                <label class="custom-control-label"
                                                                                    for="asthma1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="asthma" id="asthma2" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="asthma2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Allergies</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="allergies" id="allergies1">
                                                                                <label class="custom-control-label"
                                                                                    for="allergies1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="allergies" id="allergies2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="allergies2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Smoking</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="smoking" id="smoking1">
                                                                                <label class="custom-control-label"
                                                                                    for="smoking1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="smoking" id="smoking2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="smoking2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Taking medication for Hypertension</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="taking_medication_for_hypertension"
                                                                                    id="taking_medication_for_hypertension1">
                                                                                <label class="custom-control-label"
                                                                                    for="taking_medication_for_hypertension1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="taking_medication_for_hypertension"
                                                                                    id="taking_medication_for_hypertension2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="taking_medication_for_hypertension2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Taking medication for Diabetes</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="taking_medication_for_diabetes"
                                                                                    id="taking_medication_for_diabetes1">
                                                                                <label class="custom-control-label"
                                                                                    for="taking_medication_for_diabetes1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="taking_medication_for_diabetes"
                                                                                    id="taking_medication_for_diabetes2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="taking_medication_for_diabetes2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Vaccination</th>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="1"
                                                                                    class="custom-control-input required"
                                                                                    name="vaccination"
                                                                                    id="vaccination1">
                                                                                <label class="custom-control-label"
                                                                                    for="vaccination1">YES</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset>
                                                                            <div class="custom-control custom-radio">
                                                                                <input required type="radio" value="0"
                                                                                    class="custom-control-input required"
                                                                                    name="vaccination" id="vaccination2"
                                                                                    checked>
                                                                                <label class="custom-control-label"
                                                                                    for="vaccination2">NO</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 4 -->
                                            <h6>Declaration Form</h6>
                                            <fieldset>
                                                <h4 class="form-section"><i class="feather icon-user"></i>Declaration
                                                    Form (Covid-19)
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Have you travelled abroad recently?
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input required type="radio"
                                                                        class="custom-control-input required"
                                                                        name="travelled_abroad_recently"
                                                                        id="travelled_abroad_recently1" value="1"
                                                                        onchange="isTravelAbroadRecently(this)">
                                                                    <label class="custom-control-label"
                                                                        for="travelled_abroad_recently1">YES</label>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input required type="radio" value="0"
                                                                        class="custom-control-input required"
                                                                        name="travelled_abroad_recently"
                                                                        id="travelled_abroad_recently2"
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
                                                                <input name="area_visited" type="text" id=""
                                                                    placeholder="Country, State, City"
                                                                    class="form-control" />
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
                                                                    <input name="travel_arrival_date" id=""
                                                                        placeholder="" class="form-control"
                                                                        type="date" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="font-weight-bold"
                                                                        for="">Return</label>
                                                                    <input name="travel_return_date" id=""
                                                                        placeholder="" class="form-control"
                                                                        type="date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </hr>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="form-group">
                                                            <label for="">
                                                                Have you been in contact with people being infected,
                                                                suspected or diagnosed with COVID-19?
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input required type="radio" value="1"
                                                                        class="custom-control-input required"
                                                                        name="contact_with_people_being_infected_suspected_or_diagnosed_with_covid"
                                                                        id="contact_with_people_being_infected_suspected_or_diagnosed_with_covid1"
                                                                        onchange="hasContactWithPeopleInfected(this)">
                                                                    <label class="custom-control-label"
                                                                        for="contact_with_people_being_infected_suspected_or_diagnosed_with_covid1">YES</label>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input required type="radio" value="0"
                                                                        class="custom-control-input required"
                                                                        name="contact_with_people_being_infected_suspected_or_diagnosed_with_covid"
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
                                                            <label for="">Your relationship with the people and your
                                                                last contact date with them
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="font-weight-bold"
                                                                        for="">Relationship</label>
                                                                    <input name="relationship_last_contact_people" id=""
                                                                        placeholder="" class="form-control"
                                                                        type="text" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="font-weight-bold" for="">Last contact
                                                                        date</label>
                                                                    <input name="last_contact_date" id="" placeholder=""
                                                                        class="form-control" type="date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="form-group">
                                                            <label for="">Please state whether you've experienced/are
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
                                                                                    <input required type="radio"
                                                                                        value="1"
                                                                                        class="custom-control-input required"
                                                                                        name="fever" id="fever1">
                                                                                    <label class="custom-control-label"
                                                                                        for="fever1">YES</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="0"
                                                                                        class="custom-control-input required"
                                                                                        name="fever" id="fever2">
                                                                                    <label class="custom-control-label"
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
                                                                                    <input required type="radio"
                                                                                        value="1"
                                                                                        class="custom-control-input required"
                                                                                        name="cough" id="cough1">
                                                                                    <label class="custom-control-label"
                                                                                        for="cough1">YES</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="0"
                                                                                        class="custom-control-input required"
                                                                                        name="cough" id="cough2">
                                                                                    <label class="custom-control-label"
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
                                                                                    <input required type="radio"
                                                                                        value="1"
                                                                                        class="custom-control-input required"
                                                                                        name="shortness_of_breath"
                                                                                        id="shortness_of_breath1">
                                                                                    <label class="custom-control-label"
                                                                                        for="shortness_of_breath1">YES</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="0"
                                                                                        class="custom-control-input required"
                                                                                        name="shortness_of_breath"
                                                                                        id="shortness_of_breath2">
                                                                                    <label class="custom-control-label"
                                                                                        for="shortness_of_breath2">NO</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Persistent Pain in the Chest</th>
                                                                        <td>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="1"
                                                                                        class="custom-control-input required"
                                                                                        name="persistent_pain_in_the_chest"
                                                                                        id="persistent_pain_in_the_chest1">
                                                                                    <label class="custom-control-label"
                                                                                        for="persistent_pain_in_the_chest1">YES</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td>
                                                                            <fieldset>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input required type="radio"
                                                                                        value="0"
                                                                                        class="custom-control-input required"
                                                                                        name="persistent_pain_in_the_chest"
                                                                                        id="persistent_pain_in_the_chest2">
                                                                                    <label class="custom-control-label"
                                                                                        for="persistent_pain_in_the_chest2">NO</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with step validation section end -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script>
function openCamera() {
    Webcam.set({
        width: 250,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 100
    });

    Webcam.attach('.camera');
}

function saveImage() {
    document.querySelector('.close').click();
    Webcam.snap(function(data_uri) {
        $("#patient_image").val(data_uri);
        document.querySelector('.image-taken').innerHTML = '<img src="' + data_uri + '" />';
        document.querySelector('.take-picture').innerHTML = 'Recapture';
    });
}

function isTravelAbroadRecently(e) {
    if (e.value == 1) {
        let isTravelElement = document.querySelectorAll('.travel');
        for (let index = 0; index < isTravelElement.length; index++) {
            const element = isTravelElement[index];
            element.style.display = 'block';
        }
    } else {
        let isTravelElement = document.querySelectorAll('.travel');
        for (let
                index = 0; index < isTravelElement.length; index++) {
            const element = isTravelElement[index];
            element.style.display = 'none';
        }
    }
}

function hasContactWithPeopleInfected(e) {
    let
        element = document.querySelector('.show-if-contact');
    if (e.value == 1) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}
</script>

<!-- END: Content-->
@endsection