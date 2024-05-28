<form class="form" method="POST" id="referrals/store">
    @csrf
    <h4 class="form-section"><i class="feather icon-user"></i> Crew General
        Information</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="lastname">Lastname <span class="danger">*</span></label>
                <input type="text" id="lastname" class="form-control lastname" placeholder="Lastname"
                    name="lastname">
                <span class="text-danger danger" error-name="lastname"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="firstname">Firstname <span class="danger">*</span></label>
                <input type="text" id="firstname" class="form-control" placeholder="Firstname" name="firstname">
                <span class="text-danger danger" error-name="firstname"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="middlename">Middlename</label>
                <input type="text" id="middlename" class="form-control" placeholder="Middlename" name="middlename">
                <span class="text-danger danger" error-name="middlename"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Address of Employee <span class="danger">*</span></label>
                <input type="text" name="address" id="address" class="form-control" />
                <span class="text-danger danger" error-name="address"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email_employee">Email of Employee <span class="danger">*</span></label>
                <input type="email" id="email_employee" class="form-control" placeholder="Email of Employee"
                    name="email_employee">
                <span class="text-danger danger" error-name="email_employee"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="birthplace">Birthplace <span class="danger">*</span></label>
                <input type="text" id="birthplace" name="birthplace" class="form-control" />
                <span class="text-danger danger" error-name="birthplace"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="birthdate">Birthdate <span class="danger">*</span></label>
                <input type="date" onchange="getAge(this)" id="birthdate" name="birthdate" class="form-control" />
                <span class="text-danger danger" error-name="birthdate"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="age">Age <span class="danger">*</span></label>
                <input type="text" id="age" name="age" readonly class="form-control" />
                <span class="text-danger danger" error-name="age"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="passport">Passport No. <span class="danger">*</span></label>
                <input type="text" name="passport" id="passport" class="form-control" />
                <span class="text-danger danger" error-name="passport"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="passport_expdate">Passport Expiry Date <span class="danger">*</span></label>
                <input type="date" name="passport_expdate" id="passport_expdate" class="form-control" />
                <span class="text-danger danger" error-name="passport_expdate"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="ssrb">SIRB No <span class="danger">*</span></label>
                <input type="text" name="ssrb" id="ssrb" class="form-control" />
                <span class="text-danger danger" error-name="ssrb"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="ssrb_expdate">SIRB Expiry Date <span class="danger">*</span></label>
                <input type="date" name="ssrb_expdate" id="ssrb_expdate" class="form-control" />
                <span class="text-danger danger" error-name="ssrb_expdate"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" id="nationality" class="form-control">
                <span class="text-danger danger" error-name="nationality"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="civil_status">Civil Status</label>
                <select name="civil_status" id="civil_status" class="form-control">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                </select>
                <span class="text-danger danger" error-name="civil_status"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <span class="text-danger danger" error-name="gender"></span>
            </div>
        </div>
    </div>
    <h4 class="form-section"><i class="feather icon-user"></i> Crew Agency
        Information
    </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="employer">Name of Employer <span class="danger">*</span></label>
                <input type="hidden" id="employer" class="form-control" name="employer" value="">
                <select name="agency_id" id="agency_id" class="select2">
                    <option value="">--- SELECT AGENCY ---</option>
                    @foreach ($agencies as $agency)
                        <option value="{{ $agency->id }}">{{ $agency->agencyname }}</option>
                    @endforeach
                </select>
                <span class="text-danger danger" error-name="employer"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="agency_address">Address of Agency <span class="danger">*</span></label>
                <input type="text" id="agency_address" class="form-control" placeholder="Address of Agency"
                    name="agency_address" readonly value="{{ session()->get('address') }}">
                <span class="text-danger danger" error-name="agency_address"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="package_id">Medical Package <span class="danger">*</span></label>
                <select required name="package_id" id="package_id" class="select2">
                    <option value=" ">-- SELECT PACKAGE --</option>
                </select>
                <span class="text-danger danger" error-name="package_id"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="country_destination">Country of Destination <span class="danger">*</span></label>
                <input type="text" id="country_destination" class="form-control"
                    placeholder="Country of Destination" name="country_destination" value="WORLDWIDE">
                <span class="text-danger danger" error-name="country_destination"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="position_applied">Position Applied For <span class="danger">*</span></label>
                <input type="text" id="position_applied" class="form-control" placeholder="Position Applied"
                    name="position_applied">
                <span class="text-danger danger" error-name="position_applied"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="vessel">Vessel <span class="danger">*</span></label>
                <input type="text" name="vessel" id="vessel" class="form-control">
                {{-- @if (count($vessels) > 0)
                    <select name="vessel" id="vessel"
                        class="form-select">
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
                    name="other_vessel" id="other-vessel"
                    placeholder="Vessel"> --}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="principal" class="form-label">Principal <span class="text-danger danger">*</span></label>
                <input type="text" name="principal" id="principal" class="form-control">
                {{-- @if (count($principals) > 0)
                    <select name="principal" id="principal"
                        class="form-select">
                        @foreach ($principals as $principal)
                            <option value="{{ $principal->principal_name }}">
                                {{ $principal->principal_name }}</option>
                        @endforeach
                        <option value="other">--- OTHER PRINCIPAL ---</option>
                    </select>
                @else
                    <input type="text" id="projectinput4"
                        class="form-control" placeholder="Principal"
                        name="principal">
                @endif
                <input type="text" class="form-control my-1 d-none"
                    name="other_principal" id="other-principal"
                    placeholder="Principal"> --}}
            </div>
        </div>
    </div>
    <h4 class="form-section"><i class="feather icon-user"></i> Additional
        Information</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-bold-600" for="projectinput2">Admission
                    Type</label>
                <div class="container-fluid ">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="admission_type1"
                            name="admission_type" value="Normal" checked>
                        <label class="custom-control-label" for="admission_type1">Regular
                            Patient</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="admission_type2"
                            name="admission_type" value="Rush">
                        <label class="custom-control-label" for="admission_type2">Rush
                            Patient</label>
                    </div>
                </div>
                <span class="text-danger danger" error-name="admission_type"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-bold-600" for="projectinput2">Payment Type
                    <span class="danger">*</span></label>
                <div class="container-fluid ">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" name="payment_type" id="payment_type1"
                            value="Applicant Paid">
                        <label class="custom-control-label" for="payment_type1">Applicant
                            Paid</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input type="radio" class="custom-control-input" id="payment_type2" name="payment_type"
                            value="Billed" checked>
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
                    <label for="requestor">Name of Requestor <span class="danger">*</span></label><br>
                    <input type="text" class="form-control" name="requestor" id="requestor">
                    <span class="text-danger danger" error-name="requestor"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="created_date">Date</label>
                <input type="text" id="created_date" class="form-control" placeholder="Agency / Company"
                    name="created_date" value="{{ date('Y-m-d') }}" readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="">Additional Certficates</label>
            <div class="row">
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="SKULD"
                            id="skuld">
                        <label class="custom-control-label" for="skuld">SKULD</label>
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
                        <label class="custom-control-label" for="woe">WEST OF
                            ENGLAND</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="woe_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="West of England Quantity" name="woe_qty">
                    </div>
                </fieldset>
                </fieldset>
                <fieldset class="col-md-6 my-50">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate[]" value="CAYMAN"
                            id="cayman">
                        <label class="custom-control-label" for="cayman">Cayman</label>
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
                        <label class="custom-control-label" for="liberian">Liberian</label>
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
                        <label class="custom-control-label" for="croatian">Croatian</label>
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
                        <label class="custom-control-label" for="danish">Danish</label>
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
                        <label class="custom-control-label" for="diamlemos">Diamlemos</label>
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
                        <label class="custom-control-label" for="marshall">Marshall</label>
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
                        <label class="custom-control-label" for="malta">Malta</label>
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
                        <label class="custom-control-label" for="dominican">Dominican</label>
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
                        <label class="custom-control-label" for="bahamas">Bahamas</label>
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
                        <label class="custom-control-label" for="bermuda">Bermuda</label>
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
                        <label class="custom-control-label" for="mlc">MLC</label>
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
                        <label class="custom-control-label" for="mer">MER</label>
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
                        <label class="custom-control-label" for="bahia">BAHIA</label>
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
                        <label class="custom-control-label" for="panama">PANAMA</label>
                    </div>
                    <div class="input-group mt-50 d-none" id="panama_qty">
                        <input type="number" min="1" max="5" class="form-control"
                            placeholder="PANAMA Quantity" name="panama_qty">
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput4">Signature of Requestor <span class="danger">*</span></label><br>
                <div class=" my-2">
                    <canvas class="signature" width="320" height="95"></canvas>
                    <br>
                    <button type='button' class="btn btn-solid btn-primary clear-signature">Clear</button>
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

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../app-assets/js/scripts/signature_pad-master/js/signature_pad.js"></script>
    <script>
        const canvas = document.querySelector(".signature");
        const signaturePad = new SignaturePad(canvas, {
            penColour: '#fff',
            penWidth: 2,
        });

        document.querySelector('.clear-signature').addEventListener('click', () => {
            signaturePad.clear();
        });
        
        $('#agency_id').change(function(e) {
            let agency_id = e.target.value;
            $.ajax({
                method: 'GET',
                url: '/agencies/' + agency_id + '/details',
                success: function(response) {
                    $('#employer').val(response.agency.agencyname);
                    $('#agency_address').val(response.agency.address);

                    let medical_packages_select = document.querySelector('#package_id');
                    medical_packages_select.innerHTML = '';
                    response.agency.packages.forEach(package => {
                        var option = document.createElement("option");
                        option.value = package.id;
                        option.text = package.packagename;
                        medical_packages_select.appendChild(option);
                    });
                }
            })
        })
    </script>
@endpush
