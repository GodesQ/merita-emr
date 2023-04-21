<style>
    .patient-signature {
        border: 1px solid black;
    }
</style>

<fieldset class="my-2">
    <form action="#" id="patient-signature-form" method="post">
        @csrf
        <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient->id }}">
        <input type="hidden" name="old_signature" id="old_signature" value="{{ $patient->patient_signature }}">
        <input type="hidden" name="signature" id="signature_data">
    </form>
    <div class="col-md-8 d-flex justify-content align-items-center">
        <img class=" image-taken" src="../../../app-assets/images/profiles/profilepic.jpg" />
        <div class="d-flex flex-column my-2 mx-4">
            <canvas class="signature" width="320" height="95"></canvas>
            <div class="btn-group">
                <button type='button' class="btn btn-solid btn-primary clear-signature" onclick="javascript:onClear()">Clear</button>
                <button type='button' class="btn btn-solid btn-success" onclick="javascript:onDone()">Save</button>
            </div>

        </div>
    </div>

    <form action="#" id="update_patient_basic" method="POST">
        @csrf
        <input type="hidden" name="main_id" value="{{ $patient->id }}">
        <input type="hidden" name="old_image" value="{{ $patient->patient_image }}">
        <input type="hidden" name="patientcode" value="{{ $patient->patientcode }}">
        <input type="hidden" class="patient-image" name="patient_image" value="{{ $patient->patient_image }}">
        <div class=" row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="firstName3">First Name :<span class="danger">*</span></label>
                    <input type="text" class="form-control to_upper" id="firstName3" name="firstName" value="{{ $patient->firstname }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="lastName3">
                        Last Name :
                        <span class="danger">*</span>
                    </label>
                    <input type="text" class="form-control lastname to_upper" id="lastName3" name="lastName" value="{{ $patient->lastname }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="lastName3">
                        Middle Name :
                    </label>
                    <input type="text" class="form-control to_upper" name="middleName"
                        value="{{ $patient->middlename }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="lastName3">
                        Suffix :
                    </label>
                    <input type="text" class="form-control to_upper" name="suffix" value="{{ $patient->suffix }}">
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
                    <input type="text" class="form-control to_upper" name="homeAddress"
                        value="{{ $patientInfo->address }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Email : <span class="danger">*</span></label>
                    <input type="text" class="form-control" name="email" value="{{ $patient->email }}">
                </div>
            </div>
            <div class=" col-md-4">
                <div class="form-group">
                    <label for="">
                        Birthdate :
                        <span class="danger">*</span>
                    </label>
                    <input type="date" max="2050-12-31" class="form-control" name="birthdate"
                        value="{{ $patientInfo->birthdate }}" onchange="getAge(this)">
                </div>
            </div>
            <div class=" col-md-4">
                <div class="form-group">
                    <label for="">
                        Age :
                        <span class="danger">*</span>
                    </label>
                    <input type="number" class="form-control" min="18" max="100" id="age"
                        name="age" value="{{ $patient->age }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Birthplace : <span class="danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="birthplace"
                        value="{{ $patientInfo->birthplace }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Civil Status : <span class="danger">*</span></label>
                    <select class="form-control" name="civilStatus">
                        <option value="{{ $patientInfo->maritalstatus }}">
                            {{ $patientInfo->maritalstatus }}
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
                    <select required class="form-control" name="occupation" id="occupation"
                        onchange="selectOccupation(this)">
                        <option value="">Select Occupation</option>
                        <option {{ $patientInfo->occupation == 'SEAMAN' ? 'selected' : null }} value="SEAMAN">SEAMAN
                        </option>
                        <option {{ $patientInfo->occupation == 'SEAWOMAN' ? 'selected' : null }} value="SEAWOMAN">
                            SEAWOMAN</option>
                        <option {{ $patientInfo->occupation == 'OTHER' ? 'selected' : null }} value="OTHER">OTHER
                        </option>
                    </select>
                    <br>
                    <div class="form-group occupation_other_container" style="display: none;">
                        <label for="">Please Specify</label>
                        <input type="text" placeholder="Plese Specify" name="occupation_other"
                            id="occupation_other" class="form-control" value="{{ $patientInfo->occupation_other }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Gender : <span class="danger">*</span>
                    </label>
                    <select class="form-control" name="gender">
                        <option value="Male" {{ $patient->gender == 'Male' ? 'selected' : null }}>MALE</option>
                        <option value="Female" {{ $patient->gender == 'Female' ? 'selected' : null }}>FEMALE</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> Nationality :
                        <span class="danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nationality"
                        value="{{ $patientInfo->nationality }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Religion :
                        <span class="danger">*</span>
                    </label>
                    <select name="religion" id="religion" class="form-control" onchange="selectReligion(this)">
                        <option {{ $patientInfo->religion == 'ROMAN CATHOLIC' ? 'selected' : null }}
                            value="ROMAN CATHOLIC">ROMAN CATHOLIC</option>
                        <option {{ $patientInfo->religion == 'IGLESIA NI CRISTO' ? 'selected' : null }}
                            value="IGLESIA NI CRISTO">IGLESIA NI CRISTO</option>
                        <option {{ $patientInfo->religion == 'EVANGELICALS' ? 'selected' : null }} value="EVANGELICALS">EVANGELICALS</option>
                        <option {{ $patientInfo->religion == 'SEVENTH DAY ADVENTIST' ? 'selected' : null }} value="SEVENTH DAY ADVENTIST">SEVENTH DAY ADVENTIST</option>
                        <option {{ $patientInfo->religion == 'ISLAM' ? 'selected' : null }} value="ISLAM">ISLAM</option>
                        <option {{ $patientInfo->religion == 'UECFI' ? 'selected' : null }} value="UECFI">UECFI</option>
                        <option {{ $patientInfo->religion == 'OTHERS' ? 'selected' : null }} value="OTHERS">OTHERS</option>
                    </select>
                    <br>
                    <div class="form-group religion_other_container" style="display: none;">
                        <label for="">Religion : <span style="font-size: 12px;">Please Specify</span></label>
                        <input type="text" placeholder="Plese Specify" name="religion_other" id="religion_other"
                            class="form-control" value="{{ $patientInfo->religion_other }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Phone Number :
                        <span class="danger">*</span>
                    </label>
                    <input type="tel" maxlength="11" class="form-control" name="phoneNumber"
                        value="{{ $patientInfo->contactno }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Registered Date :
                        <span class="danger">*</span>
                    </label>
                    <input type="datetime-local" class="form-control" name="created_date"
                        value="{{ $patient->created_date }}">
                </div>
            </div>
            <input type="date" max="2050-12-31" name="date" id="" hidden
                value="<?php echo date('Y-m-d'); ?>">
            <div class="col-12">
                <button type="submit" class="btn btn-solid btn-primary">Submit</button>
            </div>
    </form>
</fieldset>
