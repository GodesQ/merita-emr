<h6>Crew Information</h6>
<fieldset class="text-secondary">
    <h4 class="form-section text-bold-600 text-secondary"><i class="feather icon-user"></i> Crew General
        Information</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="lastname">Lastname: <span class="danger">*</span></label>
                <input type="text" id="lastname" class="form-control lastname" placeholder="Lastname"
                    name="lastname">
                <span class="text-danger danger" error-name="lastname"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="firstname">Firstname: <span class="danger">*</span></label>
                <input type="text" id="firstname" class="form-control" placeholder="Firstname" name="firstname">
                <span class="text-danger danger" error-name="firstname"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="middlename">Middlename: <span
                        class="italic">(Optional)</span></label>
                <input type="text" id="middlename" class="form-control" placeholder="Middlename" name="middlename">
                <span class="text-danger danger" error-name="middlename"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="birthplace">Birthplace: <span class="danger">*</span></label>
                <input type="text" id="birthplace" name="birthplace" class="form-control" />
                <span class="text-danger danger" error-name="birthplace"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="birthdate">Birthdate: <span class="danger">*</span></label>
                <input type="date" onchange="getAge(this)" id="birthdate" name="birthdate" class="form-control" />
                <span class="text-danger danger" error-name="birthdate"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="age">Age: <span class="danger">*</span></label>
                <input type="text" id="age" name="age" readonly class="form-control" />
                <span class="text-danger danger" error-name="age"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="address">Address of Employee: <span class="danger">*</span></label>
                <input type="text" name="address" id="address" class="form-control"
                    placeholder="Ex: 123 St. Sampaloc, Manila" />
                <span class="text-danger danger" error-name="address"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="email_employee">Email of Employee: <span
                        class="danger">*</span></label>
                <input type="email" id="email_employee" class="form-control" placeholder="Email of Employee"
                    name="email_employee">
                <span class="text-danger danger" error-name="email_employee"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="passport">Passport: <span class="danger">*</span></label>
                <input type="text" name="passport" id="passport" class="form-control" />
                <span class="text-danger danger" error-name="passport"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="passport_expdate">Passport Expiry Date: <span
                        class="danger">*</span></label>
                <input type="date" name="passport_expdate" id="passport_expdate" class="form-control" />
                <span class="text-danger danger" error-name="passport_expdate"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="ssrb">SIRB: <span class="danger">*</span></label>
                <input type="text" name="ssrb" id="ssrb" class="form-control" />
                <span class="text-danger danger" error-name="ssrb"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="ssrb_expdate">SIRB Expiry Date: <span
                        class="danger">*</span></label>
                <input type="date" name="ssrb_expdate" id="ssrb_expdate" class="form-control" />
                <span class="text-danger danger" error-name="ssrb_expdate"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="nationality">Nationality: <span class="danger">*</span></label>
                <input type="text" name="nationality" id="nationality" class="form-control">
                <span class="text-danger danger" error-name="nationality"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="civil_status">Civil Status: <span class="danger">*</span></label>
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
                <label class="text-uppercase" for="gender">Gender: <span class="danger">*</span></label>
                <div class="container-fluid ">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="gender1" name="gender"
                            value="Male" checked>
                        <label class="custom-control-label cursor-pointer" for="gender1">Male</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="gender2" name="gender"
                            value="Female">
                        <label class="custom-control-label cursor-pointer" for="gender2">Female</label>
                    </div>
                </div>
                <span class="text-danger danger" error-name="gender"></span>
            </div>
        </div>
    </div>
    <h4 class="form-section text-secondary text-bold-600"><i class="feather icon-user"></i> Crew Agency Information
    </h4>
    <div class="row d-none">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="employer">Name of Employer <span class="danger">*</span></label>
                <input type="text" id="employer" class="form-control" placeholder="Name of Employer"
                    name="employer" readonly value="{{ session()->get('agencyName') }}">
                <span class="text-danger danger" error-name="employer"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase" for="agency_address">Address of Agency <span
                        class="danger">*</span></label>
                <input type="text" id="agency_address" class="form-control" placeholder="Address of Agency"
                    name="agency_address" readonly value="{{ session()->get('address') }}">
                <span class="text-danger danger" error-name="agency_address"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label class="text-uppercase" for="agency_id">Agency <span class="danger">*</span></label>
                <select required name="agency_id" id="agency_id">
                    @foreach ($agencies as $agency)
                        <option value="{{ $agency->id }}"
                            {{ session()->get('agencyId') == $agency->id ? 'selected' : null }}>
                            {{ $agency->agencyname }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger danger" error-name="agency_id"></span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="text-uppercase" for="package_id">Medical Package <span class="danger">*</span></label>
                <select required name="package_id" id="package_id">
                    <option value=" ">-- SELECT PACKAGE --</option>
                </select>
                <span class="text-danger danger" error-name="package_id"></span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="text-uppercase" for="country_destination">Country of Destination <span
                        class="danger">*</span></label>
                <input type="text" id="country_destination" class="form-control"
                    placeholder="Country of Destination" name="country_destination" value="WORLDWIDE">
                <span class="text-danger danger" error-name="country_destination"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="position_applied">Position Applied For <span
                        class="danger">*</span></label>
                <input type="text" id="position_applied" class="form-control" placeholder="Position Applied"
                    name="position_applied">
                <span class="text-danger danger" error-name="position_applied"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="vessel">Vessel <span class="danger">*</span></label>
                <input type="text" id="vessel" class="form-control" placeholder="Vessel" name="vessel">
                {{-- <input type="text" class="form-control my-1 d-none" name="other_vessel" id="other-vessel"
                    placeholder="Vessel"> --}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="principal" class="form-label">Principal <span
                        class="text-danger danger">*</span></label>
                <input type="text" id="projectinput4" class="form-control" placeholder="Principal"
                    name="principal">
            </div>
        </div>
    </div>
    <h4 class="form-section text-secondary text-bold-600"><i class="feather icon-user"></i> Additional Information
    </h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="employment_type">Employment Type</label>
                <div class="container-fluid ">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="employment_type1"
                            name="employment_type" value="New Crew">
                        <label class="custom-control-label text-uppercase" for="employment_type1">New
                            Crew</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="employment_type2"
                            name="employment_type" value="Old Crew" checked>
                        <label class="custom-control-label text-uppercase" for="employment_type2">Old
                            Crew</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="projectinput2">Admission Type</label>
                <div class="container-fluid ">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="admission_type1"
                            name="admission_type" value="Normal" checked>
                        <label class="custom-control-label text-uppercase" for="admission_type1">Regular
                            Patient</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="admission_type2"
                            name="admission_type" value="Rush">
                        <label class="custom-control-label text-uppercase" for="admission_type2">Rush
                            Patient</label>
                    </div>
                </div>
                <span class="text-danger danger" error-name="admission_type"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase" for="projectinput2">Payment Type <span class="danger">*</span></label>
                <div class="container-fluid ">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" name="payment_type" id="payment_type1"
                            value="Applicant Paid">
                        <label class="custom-control-label text-uppercase" for="payment_type1">Applicant
                            Paid</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="payment_type2" name="payment_type"
                            value="Billed" checked>
                        <label class="custom-control-label text-uppercase" for="payment_type2">Billed to
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
                <label class="text-uppercase" for="">Custom Request</label>
                <textarea name="custom_request" class="form-control" cols="30" rows="10"></textarea>
                <span class="text-danger danger" error-name="custom_request"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group my-1">
                    <label class="text-uppercase" for="requestor">Name of Requestor <span
                            class="danger">*</span></label><br>
                    <input type="text" class="form-control" name="requestor" id="requestor">
                    <span class="text-danger danger" error-name="requestor"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="projectinput4">Signature of Requestor <span
                        class="danger">*</span></label><br>
                <div>
                    <canvas class="signature" width="320" height="95"></canvas>
                    <br>
                    <button type='button' style="width: 320px !important;"
                        class="btn btn-solid btn-primary btn-block clear-signature">Clear</button>
                </div>
                <input type="hidden" name="signature" class="signature-data">
            </div>
            <div class="form-group d-none">
                <label for="created_date">Date</label>
                <input type="text" id="created_date" class="form-control" placeholder="Agency / Company"
                    name="created_date" value="{{ date('Y-m-d') }}" readonly />
            </div>
            <div class="form-group d-none">
                <label for="agencyname">Agency</label>
                <input required type="text" id="agencyname" class="form-control" placeholder="Agency / Company"
                    value="{{ session()->get('agencyName') }}" readonly>
                {{-- <input type="hidden" id="agency_id" class="form-control" name="agency_id"
                    value="{{ session()->get('agencyId') }}" readonly> --}}
                <span class="text-danger danger" error-name="agency_id"></span>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label class="text-uppercase" for="">Additional Certficates</label>
            <div class="row">
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="SKULD"
                            id="skuld">
                        <label class="custom-control-label text-uppercase" for="skuld">SKULD</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="skuld_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Skuld Quantity" name="skuld_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]"
                            value="WEST OF ENGLAND" id="woe">
                        <label class="custom-control-label text-uppercase" for="woe">WEST OF
                            ENGLAND</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="woe_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="West of England Quantity" name="woe_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="CAYMAN"
                            id="cayman">
                        <label class="custom-control-label text-uppercase" for="cayman">Cayman</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="cayman_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Cayman Quantity" name="cayman_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="LIBERIAN"
                            id="liberian">
                        <label class="custom-control-label text-uppercase" for="liberian">Liberian</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="liberian_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Liberian Quantity" name="liberian_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="CROATIAN"
                            id="croatian">
                        <label class="custom-control-label text-uppercase" for="croatian">Croatian</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="croatian_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Croatian Quantity" name="croatian_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="DANISH"
                            id="danish">
                        <label class="custom-control-label text-uppercase" for="danish">Danish</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="danish_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Danish Quantity" name="danish_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="DIAMLEMOS"
                            id="diamlemos">
                        <label class="custom-control-label text-uppercase" for="diamlemos">Diamlemos</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="diamlemos_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Diamlemos Quantity" name="diamlemos_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="MARSHALL"
                            id="marshall">
                        <label class="custom-control-label text-uppercase" for="marshall">Marshall</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="marshall_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Marshall Quantity" name="marshall_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="MALTA"
                            id="malta">
                        <label class="custom-control-label text-uppercase" for="malta">Malta</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="malta_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Malta Quantity" name="malta_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="DOMINICAN"
                            id="dominican">
                        <label class="custom-control-label text-uppercase" for="dominican">Dominican</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="dominican_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Dominican Quantity" name="dominican_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="BAHAMAS"
                            id="bahamas">
                        <label class="custom-control-label text-uppercase" for="bahamas">Bahamas</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="bahamas_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Bahamas Quantity" name="bahamas_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="BERMUDA"
                            id="bermuda">
                        <label class="custom-control-label text-uppercase" for="bermuda">Bermuda</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="bermuda_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="Bermuda Quantity" name="bermuda_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="MLC"
                            id="mlc">
                        <label class="custom-control-label text-uppercase" for="mlc">MLC</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="mlc_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="MLC Quantity" name="mlc_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="MER"
                            id="mer">
                        <label class="custom-control-label text-uppercase" for="mer">MER</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="mer_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="MER Quantity" name="mer_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="BAHIA"
                            id="bahia">
                        <label class="custom-control-label text-uppercase" for="bahia">BAHIA</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="bahia_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="BAHIA Quantity" name="bahia_qty">
                    </div>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="PANAMA"
                            id="panama">
                        <label class="custom-control-label text-uppercase" for="panama">PANAMA</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="panama_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="PANAMA Quantity" name="panama_qty">
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</fieldset>

@push('scripts')
    <script>
        

        $(document).ready(function() {
            let agency_id = $('#agency_id').val();
            getAgencyDetails(agency_id);

            $("#package_id, #civil_status, #agency_id").select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%'
            });

            $("#passport_expdate, #ssrb_expdate, #schedule_date").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                minDate: 'today',
            });

            $("#birthdate").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                maxDate: 'today',
            });
        });

        $('#agency_id').change(function(e) {
            getAgencyDetails(e.target.id);
        })

        function getAgencyDetails(agency_id) {
            $.ajax({
                method: "GET",
                url: `/agencies/${agency_id}/details`,
                success: function(response) {
                    $.each(response.agency.packages, function(i, item) {
                        $('#package_id').append($('<option>', {
                            value: item.id,
                            text: item.packagename
                        }));
                    });
                }
            })
        }
    </script>
@endpush
