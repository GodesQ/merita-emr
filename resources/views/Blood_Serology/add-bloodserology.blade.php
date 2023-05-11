@extends('layouts.admin-layout')

@section('content')
    <style>
        .form-control {
            padding: 0.2rem;
        }

        .table th,
        .table td {
            padding: 0.5rem;
        }
    </style>
    <div class="app-content content bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Add Blood Serology</h3>
                                <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $admission->patientcode }}"
                                    class="float-right btn btn-primary">Back to Patient</a>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/store_bloodsero" role="form">
                                @if (Session::get('status'))
                                    <div class="success alert-success p-2 my-2">
                                        {{ Session::get('status') }}
                                    </div>
                                @endif
                                @csrf
                                <input required type="hidden" name="admission_id" value="{{ $admission->id }}">
                                <input type="hidden" name="patient_id" value="{{ $admission->patient->id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="92"><b>PEME Date</b></td>
                                            <td width="247">
                                                <input required name="peme_date" type="text" id="peme_date"
                                                    value="{{ $admission->trans_date }}" class="form-control"
                                                    readonly="">
                                            </td>
                                            <td width="113"><b>Admission No.</b></td>
                                            <td width="322">
                                                <div class="col-md-10" style="margin-left: -14px">
                                                    <input required name="admission_id" type="text" id="admission_id"
                                                        value="{{ $admission->id }}"
                                                        class="form-control input required required-sm pull-left"
                                                        placeholder="Admission No." readonly="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Exam Date</b></td>
                                            <td><input required name="trans_date" type="text" id="trans_date"
                                                    value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly=""></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>Patient</b></td>
                                            <td>
                                                <input required name="patientname" id="patientname" type="text"
                                                    value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                    class="form-control" readonly="">
                                            </td>
                                            <td><b>Patient Code</b></td>
                                            <td><input required name="patientcode" id="patientcode" type="text"
                                                    value="{{ $admission->patientcode }}" class="form-control"
                                                    readonly="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                    class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <h4><b>BLOOD CHEMISTRY</b></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>EXAMINATION</b></td>
                                            <td> <b>RESULTS</b></td>
                                            <td><b>NORMAL VALUE</b></td>
                                            {{-- <td width="40%"><b>FINDINGS</b></td> --}}
                                            <td width="40%"><b>RECOMMENDATIONS</b></td>
                                        </tr>
                                        @include('Blood_Serology.sub_exams.sub_exams')
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                    <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <div class="form-group">
                                                    <label for=""><b>Remarks</b></label>
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1"
                                                        id="remarks_status_0" value="normal">Normal
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1"
                                                        id="remarks_status_1" value="findings">With Findings
                                                </div>
                                                <div class="form-group">
                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="remarks" cols="30" rows="6"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                    <tbody>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="23%"><b>Medical Technologist: </b></td>
                                                            <td width="77%">
                                                                <div class="col-md-8">
                                                                    <select name="technician_id" id="technician_id"
                                                                        class="form-control">
                                                                        @foreach ($medical_techs as $med_tech)
                                                                            <option value={{ $med_tech->id }}
                                                                                {{ $med_tech->id == '55' ? 'selected' : null }}>
                                                                                {{ $med_tech->firstname }}
                                                                                {{ $med_tech->lastname }},
                                                                                {{ $med_tech->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Pathologist: </b></td>
                                                            <td>
                                                                <div class="col-md-8">
                                                                    <select name="technician2_id" id="technician2_id"
                                                                        class="form-control">
                                                                        @foreach ($pathologists as $pathologist)
                                                                            <option value={{ $pathologist->id }}
                                                                                {{ $pathologist->id == '55' ? 'selected' : null }}>
                                                                                {{ $pathologist->firstname }}
                                                                                {{ $pathologist->lastname }},
                                                                                {{ $pathologist->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="box-footer">
                                    <button name="action" id="btnSave" value="save" type="submit"
                                        class="btn btn-primary" onclick="return chkAdmission();">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('keydown', handleInputFocusTransfer);

        function handleInputFocusTransfer(e) {

            const focusableInputElements = document.querySelectorAll(`input`);

            //Creating an array from the node list
            const focusable = [...focusableInputElements];

            //get the index of current item
            const index = focusable.indexOf(document.activeElement);

            // Create a variable to store the idex of next item to be focussed
            let nextIndex = 0;

            if (e.keyCode === 37) {
                // up arrow
                e.preventDefault();
                nextIndex = index > 0 ? index - 1 : 0;
                focusableInputElements[nextIndex].focus();
            } else if (e.keyCode === 39) {
                // down arrow
                e.preventDefault();
                nextIndex = index + 1 < focusable.length ? index + 1 : index;
                focusableInputElements[nextIndex].focus();
            }
        }
    </script>
    <script>
        let past_value = '';
        let past_status = '';

        function getBloodRemarks(e, message, minNumber, maxNumber) {
            let remarks = document.querySelector('#remarks').value;
            if (e.value == "") {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
            } else if (e.value < parseFloat(minNumber)) {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} L\n`;
                past_status = "L";
                past_value = e.value;
            } else if (e.value > parseFloat(maxNumber)) {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} H\n`;
                past_status = "H";
                past_value = e.value;
            } else {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
            }
        }

        let pass_sero_value = '';

        function getSerologyRemarks(title, e) {
            let remarks = document.querySelector('#remarks').value;
            if (e.value == "Reactive" || e.value == "Positive") {
                document.getElementById("remarks").innerHTML += `${title} - ${e.value}\n`;
                pass_sero_value = e.value;
            } else {
                var find = `${title} - ${pass_sero_value}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
            }
        }
    </script>
@endpush
