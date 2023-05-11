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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Edit Blood Serology</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="patient_edit?id={{ $exam->admission->patient->id }}&patientcode={{ $exam->admission->patientcode }}"
                                            class="btn btn-primary">Back to Patient</a>
                                        <button
                                            onclick='window.open("/examlab_bloodsero_print?id={{ $exam->admission_id }}&type=both", "width=800,height=650").print()'
                                            class="btn btn-dark btn-solid" title="Print">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/update_bloodsero" role="form">
                                @if (Session::get('status'))
                                    @push('scripts')
                                        <script>
                                            let toaster = toastr.success('{{ Session::get('status') }}', 'Success');
                                        </script>
                                    @endpush
                                @endif
                                @csrf
                                <input type="hidden" name="id" value="{{ $exam->id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
                                                value="{{ $exam->admission->trans_date ? $exam->admission->trans_date : null }}"
                                                class="form-control" readonly />
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control input-sm pull-left" placeholder="Admission No."
                                                    readonly />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control" readonly /></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $exam->admission->patient->lastname . ', ' . $exam->admission->patient->firstname }}"
                                                class="form-control" readonly />
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->admission->patientcode }}" class="form-control" readonly /></td>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td colspan="3">
                                            <h4><b>BLOOD CHEMISTRY</b></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>EXAMINATION</b></td>
                                        <td width="10%"> <b>RESULTS</b></td>
                                        <td width="10%"><b>NORMAL VALUE</b></td>
                                        <td width="70%"><b>RECOMMENDATION</b></td>
                                    </tr>
                                    @include('Blood_Serology.sub_exams.sub_exams')
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                    <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <div class="form-group">
                                                    <label for=""><b>Remarks</b></label>
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1 serology"
                                                        id="remarks_status_0" value="normal"
                                                        @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1 serology"
                                                        id="remarks_status_1" value="findings"
                                                        @php echo $exam->remarks_status == "findings" ? "checked" : null @endphp>With
                                                    Findings
                                                </div>
                                                <div class="form-group">
                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="remarks" cols="30"
                                                        rows="6">{{ $exam->remarks }} </textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2"
                                    class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <table width="100%" border="0" cellspacing="2"
                                                    cellpadding="2">
                                                    <tbody>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="23%"><b>Medical Technologist: </b></td>
                                                            <td width="77%">
                                                                <div class="col-md-8">
                                                                    <select required name="technician_id"
                                                                        id="technician_id" class="form-control">
                                                                        @foreach ($medical_techs as $med_tech)
                                                                            <option value={{ $med_tech->id }}
                                                                                {{ $med_tech->id == $exam->technician_id ? 'selected' : null }}>
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
                                                                    <select required name="technician2_id"
                                                                        id="technician2_id" class="form-control">
                                                                        @foreach ($pathologists as $pathologist)
                                                                            <option value={{ $pathologist->id }}
                                                                                {{ $pathologist->id == $exam->technician2_id ? 'selected' : null }}>
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
        let isFirst = true;
        let remarks_value = document.querySelector('#remarks').value;
        console.log(remarks_value.split('\n'));

        function getBloodRemarks(e, message, minNumber, maxNumber, current_value) {
            let remarks = document.querySelector('#remarks').value;

            if (isFirst) {
                past_value = current_value;
                if (current_value > parseFloat(maxNumber)) {
                    past_status = 'H';
                } else if (current_value < parseFloat(minNumber)) {
                    past_status = 'L';
                } else {
                    past_status = '';
                }
            }

            if (e.value == "") {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                isFirst = false;
            } else if (e.value < parseFloat(minNumber)) {
                console.log(past_value);
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} L\n`;
                past_status = "L";
                past_value = e.value;
                isFirst = false;
            } else if (e.value > parseFloat(maxNumber)) {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} H\n`;
                past_status = "H";
                past_value = e.value;
                isFirst = false;
            } else {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                isFirst = false;
            }
        }



        let past_sero_value = 'React';

        function getSerologyRemarks(title, e, current_value) {
            let remarks = document.querySelector('#remarks').value;

            if (e.value == "Reactive" || e.value == "Positive") {
                document.getElementById("remarks").innerHTML += `${title} - ${e.value}\n`;
                past_sero_value = e.value;
            } else {
                past_sero_value = title == "TPHA" ? "Positive" : "Reactive";
                var find = `${title} - ${past_sero_value}`;
                console.log(find);
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                console.log(resultString);
                document.getElementById("remarks").innerHTML = resultString;
            }
        }
    </script>
@endpush
