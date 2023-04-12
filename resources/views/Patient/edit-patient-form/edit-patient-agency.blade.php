<form id="update_patient_agency" method="post">
    @csrf
    <input type="hidden" name="main_id" value="{{ $patient->id }}">
    <fieldset>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName3">
                        Name of Agency : <span class="danger">*</span>
                    </label>
                    <select onchange="getPackages(this)" id="agency" class="form-control select2" name="agency_id">
                        @if ($patient_agency)
                            <option value="{{ $patient_agency->id }}">
                                {{ $patient_agency->agencyname }}
                            </option>
                        @endif
                        @foreach ($agencies as $row)
                            <option value="{{ $row->id }}">{{ $row->agencyname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName3">Address of Agency :<span class="danger">*</span></label>
                    <input id="address_of_agency" type="text" class="form-control" name="address_of_agency"
                        value="{{ $patientInfo->agency_address }}">
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
                    <input required type="text" class="form-control" name="countryDestination"
                        value="{{ $patientInfo->country_destination }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group natural-vessel">
                    <label for="">Vessel : <span class="primary h6">(If not applicable, please write N/A)</span>
                    </label>
                    <input type="text" class="form-control to_upper" name="vessel"
                        value="{{ $patientInfo->vessel }}">
                </div>
                <div class="form-group bahia-vessel remove">
                    <label for="">
                        Bahia Vessel
                    </label>
                    <select name="bahia_vessel" id="" class="select2 form-control bahia-select-vessels">
                        <option value="{{ $patientInfo->vessel }}">{{ $patientInfo->vessel }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> Passport : <span class="danger">*</span></label>
                    <input required type="text" value="{{ $patientInfo->passportno }}" class="form-control"
                        name="passportNo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Passport Expiration Date :</label>
                    <input type="date" max="2050-12-31" value="{{ $patientInfo->passport_expdate }}"
                        class="form-control" name="passport_expdate">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        SSRB # :
                        <span class="danger">*</span>
                    </label>
                    <input required type="text" value="{{ $patientInfo->srbno }}" class="form-control"
                        name="ssrb">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        SSRB Expiration Date :
                    </label>
                    <input type="date" max="2050-12-31" value="{{ $patientInfo->srb_expdate }}" class="form-control"
                        name="srb_expdate">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Medical Package Test :
                        <span class="danger">*</span>
                    </label>
                    <select name="medicalPackage" id="packages" class="form-control select2">
                        @if ($patient_package)
                            <option value="{{ $patient_package->id }}" selected>
                                {{ $patient_package->packagename }}
                            </option>
                        @endif
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}">
                                {{ $package->packagename }}
                                ({{ $package->agencyname }})
                            </option>
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
                    <input required type="text" class="form-control to_upper" name="positionApplied"
                        value="{{ $patient->position_applied }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Category :
                        <span class="danger">*</span>
                    </label>
                    <select id="projectInput6" name="category" class="form-control">
                        <option value="none" selected="" disabled="">Select
                            Category
                        </option>
                        <option value="DECK SERVICES"
                            @php echo
                            $patientInfo->
                            category == "DECK SERVICES" ?
                            "selected" : null @endphp>
                            DECK SERVICES</option>
                        <option value="ENGINE SERVICES"
                            @php
echo $patientInfo->
                            category == "ENGINE SERVICES" ?
                            "selected" : null @endphp>
                            ENGINE SERVICES</option>
                        <option value="CATERING SERVICES"
                            @php
echo $patientInfo->category ==
                            "CATERING SERVICES" ?
                            "selected" : null @endphp>
                            CATERING
                            SERVICES</option>
                        <option value="OTHER SERVICES"
                            @php echo
                            $patientInfo->
                            category == "OTHER SERVICES" ?
                            "selected" : null @endphp>
                            OTHER SERVICES</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-bold-600" for="projectinput2">Admission
                        Type</label>
                    <div class="container-fluid ">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input type="radio" class="custom-control-input" id="admit_type3" name="admit_type"
                                value="Normal"
                                @php echo
                                $patientInfo->admission_type == "Normal" || $patientInfo->admission_type == 'NORMAL' ? "checked" : "" @endphp>
                            <label class="custom-control-label" for="admit_type3">REGULAR PATIENT</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input type="radio" class="custom-control-input" id="admit_type4" name="admit_type"
                                value="Rush"
                                @php echo
                                $patientInfo->admission_type ==
                            "Rush" || $patientInfo->admission_type == 'RUSH' ? "checked" : "" @endphp>
                            <label class="custom-control-label" for="admit_type4">RUSH PATIENT</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-bold-600" for="projectinput2">Payment
                        Type <span class="danger">*</span></label>
                    <div class="container-fluid ">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input type="radio" class="custom-control-input" name="payment_type"
                                id="payment_type1" value="Applicant Paid"
                                @php echo
                                $patientInfo->payment_type ==
                            "Applicant Paid" ? "checked" : "" @endphp>
                            <label class="custom-control-label" for="payment_type1">Applicant
                                Paid
                            </label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input type="radio" class="custom-control-input" id="payment_type2"
                                name="payment_type" value="Billed"
                                @php echo
                                $patientInfo->payment_type ==
                            "Billed" ? "checked" : "" @endphp>
                            <label class="custom-control-label" for="payment_type2">Billed to
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
                    <input type="text" class="form-control to_upper" name="principal"
                        value="{{ $patientInfo->principal }}">
                </div>
                <div class="form-group hartmann-principal remove">
                    <label for="">
                        Hartmann Principal :
                        <span class="primary h6">(If not applicable, please write N/A)</span>
                        <select name="hartmann_principal" id=""
                            class="select2 form-control hartmann-select-principals">
                            <option value="{{ $patientInfo->principal }}">{{ $patientInfo->principal }}</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">
                        Referral :
                    </label>
                    <input type="text" class="form-control to_upper" name="referral"
                        value="{{ $patientInfo->referral }}">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-solid btn-primary">Submit</button>
            </div>
        </div>

    </fieldset>
</form>
