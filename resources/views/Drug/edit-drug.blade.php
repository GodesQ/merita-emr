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
    input[type="radio"] {
        width: 20px;
        height: 20px;
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
                                    <h3>Edit Drug</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/examlab_drug_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_drug" role="form">
                            @if(Session::get('status'))
                            @push('scripts')
                            <script>
                            let toaster = toastr.success(
                                '{{ Session::get("status") }}', 'Success');
                            </script>
                            @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
                                                value="{{ $admission->trans_date }}" class="form-control" readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control input-sm pull-left" placeholder="Admission No."
                                                    readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="date" id="trans_date" value="{{ $exam->trans_date }}" class="form-control"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" readonly="">
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="right"><b>Report No.</b></td>
                                        <td><input name="reportno" id="reportno" type="text"
                                                value="{{ $exam->reportno }}" class="form-control"></td>
                                        <td align="right">&nbsp;</td>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="19%" align="right"><b>Purpose</b></td>
                                        <td width="31%">
                                            <select type="menu" name="purpose" id="purpose" class="form-control">
                                                <option value="" {{ $exam->purpose == "" ? "selected" : "" }}>--SELECT--</option>
                                                <option value="Not Required" {{ $exam->purpose == "Not Required" ? "selected" : "" }}>Not Required</option>
                                                <option value="Pre-Employment" {{ $exam->purpose == "Pre-Employment" || $exam->purpose == "Pre-Employement" ? "selected" : "" }}>Pre-Employment
                                                </option>
                                                <option value="Student"{{ $exam->purpose == "Student" ? "selected" : "" }}>Student</option>
                                                <option value="Licensing"{{ $exam->purpose == "Licensing" ? "selected" : "" }}>Licensing</option>
                                                <option value="Random Drug Testing"{{ $exam->purpose == "Random Drug Testing" ? "selected" : "" }}>Random Drug Testing
                                                </option>
                                                <option value="Others"{{ $exam->purpose == "Others" ? "selected" : "" }}>Others</option>
                                            </select>
                                        </td>
                                        <td width="18%" align="right"><b>Method</b></td>
                                        <td width="32%" align="right">
                                            <select type="menu" name="method" id="method" class="form-control">
                                                <option value="" {{ $exam->method == "" ? "selected" : "" }}>--SELECT--</option>
                                                <option value="Not Required" {{ $exam->method == "Not Required" ? "selected" : "" }}>Not Required</option>
                                                <option value="Instrumented" {{ $exam->method == "Instrumented" ? "selected" : "" }}>Instrumented</option>
                                                <option value="Test Kit" {{ $exam->method == "Test Kit" ? "selected" : "" }}>Test Kit</option>
                                                <option value="Random Drug Test" {{ $exam->method == "Random Drug Test" ? "selected" : "" }}>Random Drug Test</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                        <td align="right">&nbsp;</td>
                                        <td align="right">&nbsp;</td>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Methamphetamine / Amphetamines</b></td>
                                        <td>
                                            <input name="methamphetamine" type="radio" class="m-75"
                                            {{ $exam->methamphetamine == "Negative" ? "checked" : "" }} id="methamphetamine_0"
                                            value="Negative" onchange="addRemarks('Methamphetamine', this)">Negative

                                            <input name="methamphetamine" type="radio" class="m-75"
                                            {{ $exam->methamphetamine == "Positive" ? "checked" : "" }} id="methamphetamine_1"
                                             value="Positive" onchange="addRemarks('Methamphetamine', this)">Positive

                                            <input name="methamphetamine" type="radio" class="m-75"
                                            {{ $exam->methamphetamine == "" ? "checked" : "" }} id="methamphetamine_2"
                                            value="" onchange="addRemarks('Methamphetamine', this)">Reset
                                        </td>
                                        <td align="right"><b>Barbiturates</b></td>
                                        <td>
                                            <input name="barbiturates" type="radio" class="m-75" id="barbiturates_0"
                                            value="Negative" onchange="addRemarks('Barbiturates', this)"
                                            {{ $exam->barbiturates == "Negative" ? "checked" : "" }}>Negative

                                            <input name="barbiturates" type="radio" class="m-75" id="barbiturates_1"
                                            value="Positive" onchange="addRemarks('Barbiturates', this)"
                                            {{ $exam->barbiturates == "Positive" ? "checked" : "" }}>Positive

                                            <input name="barbiturates" type="radio" class="m-75" id="barbiturates_2"
                                            value="" onchange="addRemarks('Barbiturates', this)"
                                            {{ $exam->barbiturates == "" ? "checked" : "" }}>Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Tetrahydrocannabinol</b></td>
                                        <td>
                                            <input name="tetrahydrocannabinol" type="radio" class="m-75"
                                                id="tetrahydrocannabinol_0" value="Negative" onchange="addRemarks('Tetrahydrocannabinol', this)"
                                                {{ $exam->tetrahydrocannabinol == "Negative" ? "checked" : "" }}>Negative

                                            <input name="tetrahydrocannabinol" type="radio" class="m-75"
                                                id="tetrahydrocannabinol_1" value="Positive" onchange="addRemarks('Tetrahydrocannabinol', this)"
                                                {{ $exam->tetrahydrocannabinol == "Positive" ? "checked" : "" }}>Positive

                                            <input name="tetrahydrocannabinol" type="radio" class="m-75"
                                                id="tetrahydrocannabinol_1" value="" onchange="addRemarks('Tetrahydrocannabinol', this)" {{
                                                $exam->tetrahydrocannabinol == "" ? "checked" : "" }}> Reset
                                        </td>
                                        <td align="right"><b>Ecstacy(MDMA)</b></td>
                                        <td>
                                            <input name="ecstacy" type="radio" class="m-75" id="ecstacy_0"
                                                value="Negative" onchange="addRemarks('Ecstacy', this)" @php echo $exam->ecstacy == "Negative" ? "checked" : ""
                                            @endphp>
                                            Negative
                                            <input name="ecstacy" type="radio" class="m-75" id="ecstacy_1"
                                                value="Positive" onchange="addRemarks('Ecstacy', this)" @php echo $exam->ecstacy == "Positive" ? "checked" : ""
                                            @endphp>
                                            Positive
                                            <input name="ecstacy" type="radio" class="m-75" id="ecstacy_1" value=""
                                                onchange="addRemarks('Ecstacy', this)" @php echo $exam->ecstacy == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Morphine / Opiates</b></td>
                                        <td>
                                            <input name="morphine" type="radio" class="m-75" id="morphine_0"
                                                value="Negative" onchange="addRemarks('Morphine', this)" @php echo $exam->morphine == "Negative" ? "checked" :
                                            "" @endphp>
                                            Negative
                                            <input name="morphine" type="radio" class="m-75" id="morphine_1"
                                                value="Positive" onchange="addRemarks('Morphine', this)" @php echo $exam->morphine == "Positive" ? "checked" :
                                            "" @endphp>
                                            Positive
                                            <input name="morphine" type="radio" class="m-75" id="morphine_1" value=""
                                               onchange="addRemarks('Morphine', this)" @php echo $exam->morphine == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                        <td width="18%" colspan="-2" align="right"><b> Benzodiazepine </b></td>
                                        <td width="32%" colspan="-2">
                                            <input name="benzodiazepine" type="radio" class="m-75" id="benzodiazepine_0"
                                                value="Negative" onchange="addRemarks('Benzodiazepine', this)" @php echo $exam->benzodiazepine == "Negative" ?
                                            "checked" : "" @endphp>
                                            Negative
                                            <input name="benzodiazepine" type="radio" class="m-75" id="benzodiazepine_1"
                                                value="Positive" onchange="addRemarks('Benzodiazepine', this)" @php echo $exam->benzodiazepine == "Positive" ?
                                            "checked" : "" @endphp>
                                            Positive
                                            <input name="benzodiazepine" type="radio" class="m-75" id="benzodiazepine_1"
                                                value="" onchange="addRemarks('Benzodiazepine', this)" @php echo $exam->benzodiazepine == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Cocaine</b></td>
                                        <td>
                                            <input name="cocaine" type="radio" class="m-75" id="cocaine_0"
                                                value="Negative" onchange="addRemarks('Cocaine', this)" @php echo $exam->cocaine == "Negative" ? "checked" : ""
                                            @endphp>
                                            Negative
                                            <input name="cocaine" type="radio" class="m-75" id="cocaine_1"
                                                value="Positive" onchange="addRemarks('Cocaine', this)" @php echo $exam->cocaine == "Positive" ? "checked" : ""
                                            @endphp>
                                            Positive
                                            <input name="cocaine" type="radio" onchange="addRemarks('Cocaine', this)" class="m-75" id="cocaine_1" value="" @php
                                                echo $exam->cocaine == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                        <td align="right"><b>Propoxyphene</b></td>
                                        <td>
                                            <input name="propoxyphene" type="radio" class="m-1" id="propoxyphene_0"
                                                value="Negative" @php echo $exam->propoxyphene == "Negative" ? "checked" : null @endphp onchange="addRemarks('Propoxyphene', this)">
                                            Negative
                                            <input name="propoxyphene" type="radio" class="m-1" id="propoxyphene_1" onchange="addRemarks('Propoxyphene', this)"
                                                value="Positive" @php echo $exam->propoxyphene == "Positive" ? "checked" : null @endphp>
                                            Positive
                                            <input name="propoxyphene" type="radio" class="m-1" id="propoxyphene_1"
                                                value="" onchange="addRemarks('Propoxyphene', this)" @php echo $exam->propoxyphene == "" ? "checked" : null @endphp>
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="-2" align="right"><b> Phencyclidine</b></td>
                                        <td colspan="-2">
                                            <input name="phencyclidine" type="radio" class="m-75" id="phencyclidine_0"
                                                value="Negative" onchange="addRemarks('Phencyclidine', this)" @php echo $exam->phencyclidine == "Negative" ?
                                            "checked" : "" @endphp>
                                            Negative
                                            <input name="phencyclidine" type="radio" class="m-75" id="phencyclidine_1"
                                                value="Positive" onchange="addRemarks('Phencyclidine', this)" @php echo $exam->phencyclidine == "Positive" ?
                                            "checked" : "" @endphp>
                                            Positive
                                            <input name="phencyclidine" type="radio" onchange="addRemarks('Phencyclidine', this)" class="m-75" id="phencyclidine_1"
                                                value="" @php echo $exam->phencyclidine == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                        <td width="18%" colspan="-2" align="right"><b>Methadone</b></td>
                                        <td width="32%" colspan="-2">
                                            <input name="methadone" type="radio" onchange="addRemarks('Methadone', this)" class="m-75" id="methadone_0"
                                                value="Negative" @php echo $exam->methadone == "Negative" ? "checked" :
                                            "" @endphp>
                                            Negative
                                            <input name="methadone" type="radio" onchange="addRemarks('Methadone', this)" class="m-75" id="methadone_1"
                                                value="Positive" @php echo $exam->methadone == "Positive" ? "checked" :
                                            "" @endphp>
                                            Positive
                                            <input name="methadone" type="radio" onchange="addRemarks('Methadone', this)" class="m-75" id="methadone_1" value=""@php echo $exam->methadone == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Alcohol</b></td>
                                        <td><input name="alcohol" type="radio" onchange="addRemarks('Alcohol', this)" class="m-75" id="alcohol_0"
                                                value="Negative" @php echo $exam->alcohol == "Negative" ? "checked" : ""
                                            @endphp>
                                            Negative
                                            <input name="alcohol" type="radio" onchange="addRemarks('Alcohol', this)" class="m-75" id="alcohol_1"
                                                value="Positive" @php echo $exam->alcohol == "Positive" ? "checked" : ""
                                            @endphp>
                                            Positive
                                            <input name="alcohol" type="radio" onchange="addRemarks('Alcohol', this)" class="m-75" id="alcohol_1" value="" @php
                                                echo $exam->alcohol == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                        <td width="18%" colspan="-2" align="right"><b> Metaqualone</b></td>
                                        <td width="32%" colspan="-2">
                                            <input name="metaqualone" type="radio" onchange="addRemarks('Metaqualone', this)" class="m-75" id="metaqualone_0"
                                                value="Negative" @php echo $exam->metaqualone == "Negative" ? "checked"
                                            : "" @endphp>
                                            Negative
                                            <input name="metaqualone" type="radio" onchange="addRemarks('Metaqualone', this)" class="m-75" id="metaqualone_1"
                                                value="Positive" @php echo $exam->metaqualone == "Positive" ? "checked"
                                            : "" @endphp>
                                            Positive
                                            <input name="metaqualone" type="radio" onchange="addRemarks('Metaqualone', this)" class="m-75" id="metaqualone_1"
                                                value="" @php echo $exam->metaqualone == "" ? "checked" : "" @endphp>
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Opium</b></td>
                                        <td><input name="opium" type="radio" class="m-1" id="opium_0"
                                                value="Negative" @php echo $exam->opium == "Negative" ? "checked" : null @endphp onchange="addRemarks('Opium', this)">
                                            Negative
                                            <input name="opium" type="radio" class="m-1" id="opium_1"
                                                value="Positive" @php echo $exam->opium == "Positive" ? "checked" : null @endphp onchange="addRemarks('Opium', this)">
                                            Positive
                                            <input value="" name="opium" @php echo $exam->opium == "" ? "checked" : null @endphp type="radio" class="m-1" id="opium_1" onchange="addRemarks('Opium', this)">
                                            Reset
                                        </td>
                                        <td align="right"><b></b></td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <div class="form-group">
                                                <label for=""><b>Remarks</b></label>
                                                <input name="remarks_status" type="radio" class="m-75"
                                                    id="remarks_status_0" value="normal" @php echo $exam->remarks_status
                                                == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-75"
                                                    id="remarks_status_1" value="findings" @php echo
                                                    $exam->remarks_status == "findings" ? "checked" : null @endphp>With
                                                Findings
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Findings</label>
                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                    id="" cols="30" rows="6">{{$exam->remarks}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Recommendation</label>
                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                    id="" cols="30" rows="6">{{$exam->recommendation}}</textarea>
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
                                                        <td width="23%"><b>Medical Technologist: </b></td>
                                                        <td width="77%">
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($medical_techs as $med_tech)
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == $exam->technician_id ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}, {{$med_tech->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pathologist: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    @foreach($pathologists as $pathologist)
                                                                        <option value={{$pathologist->id}} {{$pathologist->id == $exam->technician2_id ? "selected" : null}}>{{$pathologist->firstname}} {{$pathologist->lastname}}, {{$pathologist->title}}</option>
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
                                <button name="action" id="btnSave" value="save" type="submit" class="btn btn-primary"
                                    onclick="return chkAdmission();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function addRemarks(message, e) {
        let remarks = document.querySelector('#remarks').value;
        if(e.value == "Positive") {
            document.getElementById("remarks").innerHTML += `${message} Positive\n`;
        }else {
              var find = `${message} Positive\n`;
              console.log(find);
              var replace = '';
              var numreplace = new RegExp(find, 'g');
              var resultString = remarks.replace(numreplace, replace);
              document.getElementById("remarks").innerHTML = resultString;
        }
    }

</script>
<script>
    document.addEventListener('keydown',handleInputFocusTransfer);

    function handleInputFocusTransfer(e){

      const focusableInputElements= document.querySelectorAll(`input`);

      //Creating an array from the node list
      const focusable= [...focusableInputElements];

      //get the index of current item
      const index = focusable.indexOf(document.activeElement);

      // Create a variable to store the idex of next item to be focussed
      let nextIndex = 0;

      if (e.keyCode === 37) {
        // up arrow
        e.preventDefault();
        nextIndex= index > 0 ? index-1 : 0;
        focusableInputElements[nextIndex].focus();
      }
      else if (e.keyCode === 39) {
        // down arrow
        e.preventDefault();
        nextIndex= index+1 < focusable.length ? index+1 : index;
        focusableInputElements[nextIndex].focus();
      }
    }
</script>
@endsection
