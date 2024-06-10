@extends('layouts.agency-layout')

@section('name')
    {{ $data['agencyName'] }}
@endsection

@section('content')
    <style>
        .search-list {
            width: 97%;
            background-color: white;
            position: absolute;
            margin-top: 0.5rem;
            padding-left: 0;
            z-index: 100 !important;
            display: none;
            border: 1px solid lightgray;
            border-radius: 5px;
        }
        .search-list li {
            cursor: pointer;
            width: 100%;
            padding: .5rem 1rem;
            background: white;
            border-bottom: 1px solid lightgray;
            z-index: 100 !important;
        }

        .search-list li:hover {
            background: whitesmoke;
        }
    </style>
    <div class="app-content content">
        <div class="main-loader">
            <div class="loader">
                <span class="loader-span"><img src="../../../app-assets/images/icons/output-onlinegiftools.gif"
                        alt="Loading"></span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-1">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body position-relative">
                                <h5 class="mb-2">Search Crew</h5>
                                <fieldset>
                                    <div class="input-group">
                                        <input type="text" id="search-bar" class="form-control" placeholder="Search your crew here..." aria-describedby="button-addon2">
                                        <div class="input-group-append" id="button-addon2">
                                            <button class="btn btn-primary" id="search-btn" type="button">Search</button>
                                        </div>
                                    </div>
                                </fieldset>
                                <ul class="search-list"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="alert alert-danger alert-dismissible mb-2 d-none" id="error" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="error-message"></span>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Add Referral Slip</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" method="POST" id="store_refferal">
                                    @csrf
                                    <h4 class="form-section"><i class="feather icon-user"></i> Crew General Information</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lastname">Lastname <span class="danger">*</span></label>
                                                <input type="text" id="lastname" class="form-control lastname"
                                                    placeholder="Lastname" name="lastname">
                                                <span class="text-danger danger" error-name="lastname"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="firstname">Firstname <span class="danger">*</span></label>
                                                <input type="text" id="firstname" class="form-control"
                                                    placeholder="Firstname" name="firstname">
                                                <span class="text-danger danger" error-name="firstname"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middlename">Middlename</label>
                                                <input type="text" id="middlename" class="form-control"
                                                    placeholder="Middlename" name="middlename">
                                                <span class="text-danger danger" error-name="middlename"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address of Employee <span
                                                        class="danger">*</span></label>
                                                <input type="text" name="address" id="address" class="form-control" />
                                                <span class="text-danger danger" error-name="address"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email_employee">Email of Employee <span
                                                        class="danger">*</span></label>
                                                <input type="email" id="email_employee" class="form-control"
                                                    placeholder="Email of Employee" name="email_employee">
                                                <span class="text-danger danger" error-name="email_employee"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birthplace">Birthplace <span class="danger">*</span></label>
                                                <input type="text" id="birthplace" name="birthplace"
                                                    class="form-control" />
                                                <span class="text-danger danger" error-name="birthplace"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birthdate">Birthdate <span class="danger">*</span></label>
                                                <input type="date" onchange="getAge(this)" id="birthdate"
                                                    name="birthdate" class="form-control" />
                                                <span class="text-danger danger" error-name="birthdate"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="age">Age <span class="danger">*</span></label>
                                                <input type="text" id="age" name="age" readonly
                                                    class="form-control" />
                                                <span class="text-danger danger" error-name="age"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="passport">Passport No. <span class="danger">*</span></label>
                                                <input type="text" name="passport" id="passport"
                                                    class="form-control" />
                                                <span class="text-danger danger" error-name="passport"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="passport_expdate">Passport Expiry Date <span
                                                        class="danger">*</span></label>
                                                <input type="date" name="passport_expdate" id="passport_expdate"
                                                    class="form-control" />
                                                <span class="text-danger danger" error-name="passport_expdate"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ssrb">SIRB No <span class="danger">*</span></label>
                                                <input type="text" name="ssrb" id="ssrb"
                                                    class="form-control" />
                                                <span class="text-danger danger" error-name="ssrb"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ssrb_expdate">SIRB Expiry Date <span
                                                        class="danger">*</span></label>
                                                <input type="date" name="ssrb_expdate" id="ssrb_expdate"
                                                    class="form-control" />
                                                <span class="text-danger danger" error-name="ssrb_expdate"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nationality">Nationality</label>
                                                <input type="text" name="nationality" id="nationality"
                                                    class="form-control">
                                                <span class="text-danger danger" error-name="nationality"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="civil_status">Civil Status</label>
                                                <select name="civil_status" id="civil_status" class="form-select">
                                                    <option value="SINGLE">Single</option>
                                                    <option value="MARRIED">Married</option>
                                                    <option value="WIDOWED">Widowed</option>
                                                    <option value="DIVORCED">Divorced</option>
                                                    <option value="SEPARATED">Separated</option>
                                                </select>
                                                <span class="text-danger danger" error-name="civil_status"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select name="gender" id="gender" class="form-select">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <span class="text-danger danger" error-name="gender"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section"><i class="feather icon-user"></i> Crew Agency Information
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="employer">Name of Employer <span
                                                        class="danger">*</span></label>
                                                <input type="text" id="employer" class="form-control"
                                                    placeholder="Name of Employer" name="employer" readonly
                                                    value="{{ session()->get('agencyName') }}">
                                                <span class="text-danger danger" error-name="employer"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agency_address">Address of Agency <span
                                                        class="danger">*</span></label>
                                                <input type="text" id="agency_address" class="form-control"
                                                    placeholder="Address of Agency" name="agency_address" readonly
                                                    value="{{ session()->get('address') }}">
                                                <span class="text-danger danger" error-name="agency_address"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="package_id">Medical Package <span
                                                        class="danger">*</span></label>
                                                <select required name="package_id" id="package_id" class="select2">
                                                    <option value=" ">-- SELECT PACKAGE --</option>
                                                    @foreach ($packages as $package)
                                                        <option value="{{ $package->id }}">{{ $package->packagename }}
                                                            ({{ $package->agencyname }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger danger" error-name="package_id"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country_destination">Country of Destination <span
                                                        class="danger">*</span></label>
                                                <input type="text" id="country_destination" class="form-control"
                                                    placeholder="Country of Destination" name="country_destination"
                                                    value="WORLDWIDE">
                                                <span class="text-danger danger" error-name="country_destination"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="position_applied">Position Applied For <span
                                                        class="danger">*</span></label>
                                                <input type="text" id="position_applied" class="form-control"
                                                    placeholder="Position Applied" name="position_applied">
                                                <span class="text-danger danger" error-name="position_applied"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="vessel">Vessel <span class="danger">*</span></label>
                                                @if (count($vessels) > 0)
                                                    <select name="vessel" id="vessel" class="form-select">
                                                        @foreach ($vessels as $vessel)
                                                            <option value="{{ $vessel->vesselname }}">
                                                                {{ $vessel->vesselname }}</option>
                                                        @endforeach
                                                        <option value="other">--- OTHER VESSEL ---</option>
                                                    </select>
                                                @else
                                                    <input type="text" id="vessel" class="form-control"
                                                        placeholder="Vessel" name="vessel">
                                                @endif
                                                <input type="text" class="form-control my-1 d-none"
                                                    name="other_vessel" id="other-vessel" placeholder="Vessel">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="principal" class="form-label">Principal <span
                                                        class="text-danger danger">*</span></label>
                                                @if (count($principals) > 0)
                                                    <select name="principal" id="principal" class="form-select">
                                                        @foreach ($principals as $principal)
                                                            <option value="{{ $principal->principal_name }}">
                                                                {{ $principal->principal_name }}</option>
                                                        @endforeach
                                                        <option value="other">--- OTHER PRINCIPAL ---</option>
                                                    </select>
                                                @else
                                                    <input type="text" id="projectinput4" class="form-control"
                                                        placeholder="Principal" name="principal">
                                                @endif
                                                <input type="text" class="form-control my-1 d-none"
                                                    name="other_principal" id="other-principal" placeholder="Principal">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section"><i class="feather icon-user"></i> Additional Information</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-bold-600" for="employment_type">Employment Type</label>
                                                <div class="container-fluid ">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" class="custom-control-input"
                                                            id="employment_type1" name="employment_type"
                                                            value="New Crew">
                                                        <label class="custom-control-label" for="employment_type1">New
                                                            Crew</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" class="custom-control-input"
                                                            id="employment_type2" name="employment_type" value="Old Crew"
                                                            checked>
                                                        <label class="custom-control-label" for="employment_type2">Old
                                                            Crew</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-bold-600" for="projectinput2">Admission Type</label>
                                                <div class="container-fluid ">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" class="custom-control-input"
                                                            id="admission_type1" name="admission_type" value="Normal"
                                                            checked>
                                                        <label class="custom-control-label" for="admission_type1">Regular
                                                            Patient</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" class="custom-control-input"
                                                            id="admission_type2" name="admission_type" value="Rush">
                                                        <label class="custom-control-label" for="admission_type2">Rush
                                                            Patient</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger danger" error-name="admission_type"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-bold-600" for="projectinput2">Payment Type <span
                                                        class="danger">*</span></label>
                                                <div class="container-fluid ">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" class="custom-control-input"
                                                            name="payment_type" id="payment_type1"
                                                            value="Applicant Paid">
                                                        <label class="custom-control-label" for="payment_type1">Applicant
                                                            Paid</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" class="custom-control-input"
                                                            id="payment_type2" name="payment_type" value="Billed"
                                                            checked>
                                                        <label class="custom-control-label" for="payment_type2">Billed to
                                                            Agency</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger danger" error-name="payment_type"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Custom Request</label>
                                                <textarea name="custom_request" class="form-control" cols="30" rows="7"></textarea>
                                                <span class="text-danger danger" error-name="custom_request"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group my-1">
                                                    <label for="requestor">Name of Requestor <span
                                                            class="danger">*</span></label><br>
                                                    <input type="text" class="form-control" name="requestor"
                                                        id="requestor">
                                                    <span class="text-danger danger" error-name="requestor"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="created_date">Date</label>
                                                <input type="text" id="created_date" class="form-control"
                                                    placeholder="Agency / Company" name="created_date"
                                                    value="{{ date('Y-m-d') }}" readonly />
                                            </div>
                                            <div class="form-group d-none">
                                                <label for="agencyname">Agency</label>
                                                <input required type="text" id="agencyname" class="form-control"
                                                    placeholder="Agency / Company"
                                                    value="{{ session()->get('agencyName') }}" readonly>
                                                <input type="hidden" id="agency_id" class="form-control" name="agency_id"
                                                    value="{{ session()->get('agencyId') }}" readonly>
                                                <span class="text-danger danger" error-name="agency_id"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Additional Certficates</label>
                                            <div class="row">
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="SKULD" id="skuld">
                                                        <label class="custom-control-label" for="skuld">SKULD</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="skuld_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Skuld Quantity"
                                                            name="skuld_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="WEST OF ENGLAND" id="woe">
                                                        <label class="custom-control-label" for="woe">WEST OF
                                                            ENGLAND</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="woe_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="West of England Quantity"
                                                            name="woe_qty">
                                                    </div>
                                                </fieldset>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="CAYMAN" id="cayman">
                                                        <label class="custom-control-label" for="cayman">Cayman</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="cayman_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Cayman Quantity"
                                                            name="cayman_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="LIBERIAN" id="liberian">
                                                        <label class="custom-control-label"
                                                            for="liberian">Liberian</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="liberian_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Liberian Quantity"
                                                            name="liberian_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="CROATIAN" id="croatian">
                                                        <label class="custom-control-label"
                                                            for="croatian">Croatian</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="croatian_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Croatian Quantity"
                                                            name="croatian_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="DANISH" id="danish">
                                                        <label class="custom-control-label" for="danish">Danish</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="danish_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Danish Quantity"
                                                            name="danish_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="DIAMLEMOS" id="diamlemos">
                                                        <label class="custom-control-label"
                                                            for="diamlemos">Diamlemos</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="diamlemos_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Diamlemos Quantity"
                                                            name="diamlemos_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="MARSHALL" id="marshall">
                                                        <label class="custom-control-label"
                                                            for="marshall">Marshall</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="marshall_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Marshall Quantity"
                                                            name="marshall_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="MALTA" id="malta">
                                                        <label class="custom-control-label" for="malta">Malta</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="malta_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Malta Quantity"
                                                            name="malta_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="DOMINICAN" id="dominican">
                                                        <label class="custom-control-label"
                                                            for="dominican">Dominican</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="dominican_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Dominican Quantity"
                                                            name="dominican_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="BAHAMAS" id="bahamas">
                                                        <label class="custom-control-label" for="bahamas">Bahamas</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="bahamas_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Bahamas Quantity"
                                                            name="bahamas_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="BERMUDA" id="bermuda">
                                                        <label class="custom-control-label" for="bermuda">Bermuda</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="bermuda_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="Bermuda Quantity"
                                                            name="bermuda_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="MLC" id="mlc">
                                                        <label class="custom-control-label" for="mlc">MLC</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="mlc_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="MLC Quantity"
                                                            name="mlc_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="MER" id="mer">
                                                        <label class="custom-control-label" for="mer">MER</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="mer_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="MER Quantity"
                                                            name="mer_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="BAHIA" id="bahia">
                                                        <label class="custom-control-label" for="bahia">BAHIA</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="bahia_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="BAHIA Quantity"
                                                            name="bahia_qty">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="col-md-6 my-50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="certificate[]" value="PANAMA" id="panama">
                                                        <label class="custom-control-label" for="panama">PANAMA</label>
                                                    </div>
                                                    <div class="input-group mt-50 d-none" id="panama_qty">
                                                        <input type="number" min="1" max="5"
                                                            class="form-control" placeholder="PANAMA Quantity"
                                                            name="panama_qty">
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput4">Signature of Requestor <span
                                                        class="danger">*</span></label><br>
                                                <div class=" my-2">
                                                    <canvas class="signature" width="320" height="95"></canvas>
                                                    <br>
                                                    <button type='button'
                                                        class="btn btn-solid btn-primary clear-signature">Clear</button>
                                                </div>
                                                <input type="hidden" name="signature" class="signature-data">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <a href="/agency_dashboard" type="reset" class="btn btn-warning mr-1">
                                            <i class="feather icon-x"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <script>
        $("#passport_expdate").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: 'today',
        });

        $("#ssrb_expdate").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: 'today',
        });

        $("#birthdate").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            maxDate: 'today',
        });
    </script>

    <script>
        const canvas = document.querySelector(".signature");
        const signaturePad = new SignaturePad(canvas, {
            penColour: '#fff',
            penWidth: 2,
        });

        document.querySelector('.clear-signature').addEventListener('click', () => {
            signaturePad.clear();
        });

        signaturePad.addEventListener("endStroke", () => {
            let signatureData = signaturePad.toDataURL();
            let signatureInput = document.querySelector('.signature-data');
            signatureInput.value = signatureData;
        });

        $("#store_refferal").submit(function(e) {
            e.preventDefault();
            if (signaturePad._isEmpty) {
                Swal.fire(
                    'Warning!',
                    'Signature is required!',
                    'warning'
                )
            } else {
                let signatureData = signaturePad.toDataURL();
                let signatureInput = document.querySelector('.signature-data');
                signatureInput.value = signatureData;
                if (signatureInput != "") {
                    const fd = new FormData(this);
                    $(".main-loader").css("display", "block");
                    $.ajax({
                        url: '/store_refferal',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                Swal.fire(
                                    'Added!',
                                    'Refferal Slip Added Successfully!',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = '/referral_slips';
                                    }
                                })
                            } else {
                                console.log(response)
                            }
                        },
                        error: function(response) {
                            let errors = response.responseJSON.errors;
                            for (const key in errors) {
                                const element = document.querySelector(`span[error-name="${key}"]`);
                                if (element) element.innerText = errors[key];
                            }
                            $(".main-loader").css("display", "none");
                            toastr.error("Invalid Fields.", 'Fail');
                        }
                    }).done(function(data) {
                        $(".main-loader").css("display", "none");
                    });
                }
            }
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

        // show quantity if certificate has check
        let certificateButtons = document.querySelectorAll("input[name='certificate[]']");

        for (let index = 0; index < certificateButtons.length; index++) {
            const element = certificateButtons[index];
            element.addEventListener("change", (e) => {
                showQuantity(element.id);
            })
        }

        function showQuantity(id) {
            if (document.querySelector(`#${id}`).checked) {
                $(`#${id}_qty`).removeClass("d-none");
            } else {
                $(`#${id}_qty`).addClass("d-none");
            }
        }

        $('#vessel').change(function(e) {
            if (e.target.value === 'other') {
                $('#other-vessel').removeClass('d-none');
                $('#other-vessel').focus();
            } else {
                $('#other-vessel').addClass('d-none');
            }
        });

        $('#principal').change(function(e) {
            if (e.target.value === 'other') {
                $('#other-principal').removeClass('d-none');
                $('#other-principal').focus();
            } else {
                $('#other-principal').addClass('d-none');
            }
        });


        $('#search-btn').click(function(e) {
            let query = $('#search-bar').val();
            
            if(query.length < 3) return $('.search-list').css('display', 'none');

            $('.search-list').css('display', 'block');
            
            let agency_id = $('#agency_id').val();

            $.ajax({
                method: 'GET',
                url: `/patients/search?agency_id=${agency_id}&query=${query}`,
                success: function (data) {
                    $list = '';

                    if(data[0].length > 0) {
                        data[0].forEach(patient => {
                            $list += `<li data-id="${patient.id}">${patient.firstname} ${patient.lastname}</li>`
                        });
                    } else {
                        data[0].forEach(patient => {
                            $list += `<li>No Crew Found.</li>`
                        });
                    }
                    

                    $('ul.search-list').html($list);

                    // Add the onclick event to the newly created li elements
                    $('ul.search-list li').on('click', function() {
                        const patientId = $(this).data('id');
                        getPatientInfo(patientId);
                    });
                }
            })
        })

        function getPatientInfo(patientId) {
            $('.search-list').css('display', 'none');

            $.ajax({
                url: `/patients/show/${patientId}`,
                method: 'GET',
                success: function (data) {
                    $('#firstname').val(data.patient.firstname);
                    $('#lastname').val(data.patient.lastname);
                    $('#middlename').val(data.patient.middlename);
                    $('#address').val(data.patient.patientinfo.address);
                    $('#email_employee').val(data.patient.email);
                    $('#birthplace').val(data.patient.patientinfo.birthplace);
                    $('#birthdate').val(data.patient.patientinfo.birthdate);
                    $('#age').val(data.patient.age);
                    $('#passport').val(data.patient.patientinfo.passportno);
                    $('#ssrb').val(data.patient.patientinfo.srbno);
                    $('#nationality').val(data.patient.patientinfo.nationality);
                    $('#civil_status').val(data.patient.patientinfo.maritalstatus);
                    $('#gender').val(data.patient.gender);

                }
            })
        }
    </script>
@endpush
