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
                            <h3>Add Drug Test</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_drug" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input required required required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input required required required name="peme_date" type="text"
                                                id="peme_date" value="{{$admission->trans_date}}" class="form-control"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required required required name="admission_id" type="text"
                                                    id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input required required-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input  required name="trans_date" type="date" id="trans_date" value="<?php echo date('Y-m-d'); ?>" class="form-control"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input required required required name="patientname" id="patientname"
                                                type="text"
                                                value="{{$admission->lastname . ", " . $admission->firstname}}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input required required required name="patientcode" id="patientcode"
                                                type="text" value="{{$admission->patientcode}}" class="form-control"
                                                readonly=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="right"><b>Report No.</b></td>
                                        <td><input name="reportno" id="reportno" type="text" value=""
                                                class="form-control"></td>
                                        <td align="right">&nbsp;</td>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="19%" align="right"><b>Purpose</b></td>
                                        <td width="31%">
                                            <select type="menu" name="purpose" id="purpose" class="form-control">
                                                <option value="">--SELECT--</option>
                                                <option value="Not Required">Not Required</option>
                                                <option value="Pre-Employment" selected>Pre-Employment</option>
                                                <option value="Student">Student</option>
                                                <option value="Licensing">Licensing</option>
                                                <option value="Random Drug Testing">Random Drug Testing</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </td>
                                        <td width="18%" align="right"><b>Method</b></td>
                                        <td width="32%" align="right">
                                            <select type="menu" name="method" id="method" class="form-control">
                                                <option value="">--SELECT--</option>
                                                <option value="Not Required">Not Required</option>
                                                <option value="Instrumented">Instrumented</option>
                                                <option value="Test Kit" selected="">Test Kit</option>
                                                <option value="Random Drug Test">Random Drug Test</option>
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
                                            <input name="methamphetamine" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                id="methamphetamine_0" value="Negative" onchange="addRemarks('Methamphetamine', this)">
                                            Negative
                                            <input name="methamphetamine" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                id="methamphetamine_1" value="Positive" onchange="addRemarks('Methamphetamine', this)">
                                            Positive
                                            <input name="methamphetamine" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                id="methamphetamine_1" value="" onchange="addRemarks('Methamphetamine', this)">
                                            Reset
                                        </td>
                                        <td align="right"><b>Barbiturates</b></td>
                                        <td>
                                            <input name="barbiturates" type="radio" style="width: 20px; height: 20px;" class="m-1" id="barbiturates_0"
                                                value="Negative" onchange="addRemarks('Barbiturates', this)">
                                            Negative
                                            <input name="barbiturates" type="radio" style="width: 20px; height: 20px;" class="m-1" id="barbiturates_1"
                                                value="Positive" onchange="addRemarks('Barbiturates', this)">
                                            Positive
                                            <input name="barbiturates" type="radio" style="width: 20px; height: 20px;" class="m-1" id="barbiturates_1"
                                                value="" onchange="addRemarks('Barbiturates', this)">
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Tetrahydrocannabinol</b></td>
                                        <td><input name="tetrahydrocannabinol" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                id="tetrahydrocannabinol_0" value="Negative" onchange="addRemarks('Tetrahydrocannabinol', this)">
                                            Negative
                                            <input name="tetrahydrocannabinol" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                id="tetrahydrocannabinol_1" value="Positive" onchange="addRemarks('Tetrahydrocannabinol', this)">
                                            Positive
                                            <input name="tetrahydrocannabinol" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                id="tetrahydrocannabinol_1" value="" onchange="addRemarks('Tetrahydrocannabinol', this)">
                                            Reset
                                        </td>
                                        <td align="right"><b>Ecstacy(MDMA)</b></td>
                                        <td>
                                            <input name="ecstacy" type="radio" style="width: 20px; height: 20px;" class="m-1" id="ecstacy_0"
                                                value="Negative"  onchange="addRemarks('Ecstacy', this)">
                                            Negative
                                            <input name="ecstacy" type="radio" style="width: 20px; height: 20px;" class="m-1" id="ecstacy_1"
                                                value="Positive"  onchange="addRemarks('Ecstacy', this)">
                                            Positive
                                            <input name="ecstacy" type="radio" style="width: 20px; height: 20px;" class="m-1" id="ecstacy_1" value=""  onchange="addRemarks('Ecstacy', this)">
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Morphine / Opiates</b></td>
                                        <td>
                                            <input name="morphine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="morphine_0"
                                                value="Negative" onchange="addRemarks('Morphine', this)">
                                            Negative
                                            <input name="morphine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="morphine_1"
                                                value="Positive" onchange="addRemarks('Morphine', this)">
                                            Positive
                                            <input name="morphine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="morphine_1" value="" onchange="addRemarks('Morphine', this)">
                                            Reset
                                        </td>
                                        <td width="18%" colspan="-2" align="right"><b> Benzodiazepine </b></td>
                                        <td width="32%" colspan="-2">
                                            <input name="benzodiazepine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="benzodiazepine_0"
                                                value="Negative" onchange="addRemarks('Benzodiazepine', this)">
                                            Negative
                                            <input name="benzodiazepine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="benzodiazepine_1"
                                                value="Positive" onchange="addRemarks('Benzodiazepine', this)">
                                            Positive
                                            <input name="benzodiazepine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="benzodiazepine_1"
                                                value="" onchange="addRemarks('Benzodiazepine', this)">
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Cocaine</b></td>
                                        <td>
                                            <input name="cocaine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="cocaine_0"
                                                value="Negative" onchange="addRemarks('Cocaine', this)">
                                            Negative
                                            <input name="cocaine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="cocaine_1"
                                                value="Positive" onchange="addRemarks('Cocaine', this)">
                                            Positive
                                            <input name="cocaine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="cocaine_1" value="" onchange="addRemarks('Cocaine', this)">
                                            Reset
                                        </td>
                                        <td align="right"><b>Propoxyphene</b></td>
                                        <td>
                                            <input name="propoxyphene" type="radio" style="width: 20px; height: 20px;" class="m-1" id="propoxyphene_0"
                                                value="Negative" onchange="addRemarks('Propoxyphene', this)">
                                            Negative
                                            <input name="propoxyphene" type="radio" style="width: 20px; height: 20px;" class="m-1" id="propoxyphene_1" onchange="addRemarks('Propoxyphene', this)"
                                                value="Positive">
                                            Positive
                                            <input name="propoxyphene" type="radio" style="width: 20px; height: 20px;" class="m-1" id="propoxyphene_1"
                                                value="" onchange="addRemarks('Propoxyphene', this)">
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="-2" align="right"><b> Phencyclidine</b></td>
                                        <td colspan="-2">
                                            <input name="phencyclidine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="phencyclidine_0"
                                                value="Negative" onchange="addRemarks('Phencyclidine', this)">
                                            Negative
                                            <input name="phencyclidine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="phencyclidine_1"
                                                value="Positive" onchange="addRemarks('Phencyclidine', this)">
                                            Positive
                                            <input name="phencyclidine" type="radio" style="width: 20px; height: 20px;" class="m-1" id="phencyclidine_1"
                                                value="" onchange="addRemarks('Phencyclidine', this)">
                                            Reset
                                        </td>
                                        <td width="18%" colspan="-2" align="right"><b>Methadone</b></td>
                                        <td width="32%" colspan="-2">
                                            <input name="methadone" type="radio" style="width: 20px; height: 20px;" class="m-1" id="methadone_0"
                                                value="Negative" onchange="addRemarks('Methadone', this)">
                                            Negative
                                            <input name="methadone" type="radio" style="width: 20px; height: 20px;" class="m-1" id="methadone_1"
                                                value="Positive" onchange="addRemarks('Methadone', this)">
                                            Positive
                                            <input name="methadone" type="radio" style="width: 20px; height: 20px;" class="m-1" id="methadone_1" onchange="addRemarks('Methadone', this)">
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Alcohol</b></td>
                                        <td><input name="alcohol" type="radio" style="width: 20px; height: 20px;" class="m-1" id="alcohol_0"
                                                value="Negative" onchange="addRemarks('Alcohol', this)">
                                            Negative
                                            <input name="alcohol" type="radio" style="width: 20px; height: 20px;" class="m-1" id="alcohol_1"
                                                value="Positive" onchange="addRemarks('Alcohol', this)">
                                            Positive
                                            <input name="alcohol" type="radio" style="width: 20px; height: 20px;" class="m-1" id="alcohol_1" onchange="addRemarks('Alcohol', this)">
                                            Reset
                                        </td>
                                        <td width="18%" colspan="-2" align="right"><b> Metaqualone</b></td>
                                        <td width="32%" colspan="-2">
                                            <input name="metaqualone" type="radio" style="width: 20px; height: 20px;" class="m-1" id="metaqualone_0"
                                                value="Negative" onchange="addRemarks('Metaqualone', this)">
                                            Negative
                                            <input name="metaqualone" type="radio" style="width: 20px; height: 20px;" class="m-1" id="metaqualone_1" onchange="addRemarks('Metaqualone', this)"
                                                value="Positive">
                                            Positive
                                            <input name="metaqualone" type="radio" style="width: 20px; height: 20px;" class="m-1" id="metaqualone_1" onchange="addRemarks('Metaqualone', this)">
                                            Reset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Opium</b></td>
                                        <td><input name="opium" type="radio" style="width: 20px; height: 20px;" class="m-1" id="opium_0"
                                                value="Negative" onchange="addRemarks('Opium', this)">
                                            Negative
                                            <input name="opium" type="radio" style="width: 20px; height: 20px;" class="m-1" id="opium_1"
                                                value="Positive" onchange="addRemarks('Opium', this)">
                                            Positive
                                            <input name="opium" type="radio" style="width: 20px; height: 20px;" class="m-1" id="opium_1" onchange="addRemarks('Opium', this)">
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
                                                <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                    id="remarks_status_0" value="normal">Normal
                                                <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                    id="remarks_status_1" value="findings">With Findings
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Findings</label>
                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                    id="" cols="30" rows="6"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Recommendation</label>
                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                    id="" cols="30" rows="6"></textarea>
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
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($medical_techs as $med_tech)
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == "70" ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}, {{$med_tech->title}}</option>
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
                                                                    @foreach($pathologists as $pathologist)
                                                                        <option value={{$pathologist->id}} {{$pathologist->id == "55" ? "selected" : null}}>{{$pathologist->firstname}} {{$pathologist->lastname}}, {{$pathologist->title}}</option>
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
                        <!--<div class="form-group">-->
                        <!--    <label for=""><b>Remarks</b></label>-->
                        <!--    <input name="sample" type="radio" style="width: 20px; height: 20px;" class="m-1"-->
                        <!--        id="sample_1" onchange="addRemarks('', this)" value="normal">Normal-->
                        <!--    <input name="sample" type="radio" style="width: 20px; height: 20px;" class="m-1"-->
                        <!--        id="sample_2" onchange="addRemarks('Findings Remarks', this)" value="findings">With Findings-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
@endsection
