@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Cardiovascular</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_cardiovascular" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input  type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input  name="peme_date" type="text" id="peme_date"
                                                value="{{$admission->trans_date}}" class="form-control" readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input  name="admission_id" type="text"
                                                    id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input required-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input  name="trans_date" type="text" id="trans_date"
                                                value="<?php echo date(
                                    'Y-m-d'
                                ); ?>" class="form-control" readonly=""></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input  name="patientname" id="patientname" type="text"
                                                value="{{$admission->lastname . ", " . $admission->firstname}}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input  name="patientcode" id="patientcode" type="text"
                                                value="{{$admission->patientcode}}" class="form-control" readonly="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="21%" align="left"><b>Past Medical History</b></td>
                                        <td colspan="6"><textarea  name="pasthistory" id="pasthistory" cols="50"
                                                rows="2" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td width="21%" align="left"><b>Medications/Maintenance</b></td>
                                        <td colspan="6"><textarea  name="medmaint" id="medmaint" cols="50"
                                                rows="2" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>Smoking History</b></td>
                                        <td colspan="6"><input  name="smoking" id="smoking" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>Alcohol Intake</b></td>
                                        <td colspan="6"><input  name="alcohol" id="alcohol" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>VITAL SIGNS</b></td>
                                        <td colspan="6">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Height (cm)</b></td>
                                        <td><input  onkeyup="computeBMI();" name="height" type="text" id="height" value="{{$exam_physical ? $exam_physical->height : null}}"
                                                class="form-control"></td>
                                        <td><b>Weight
                                                (kg) </b></td>
                                        <td><input  name="weight" type="text" id="weight" value="{{$exam_physical ? $exam_physical->weight : null}}"
                                                class="form-control" onkeyup="computeBMI();"></td>
                                        <td><b>BMI</b></td>
                                        <td><input  name="bmi" readonly type="text" id="bmi" value="{{$exam_physical ? $exam_physical->bmi : null}}"
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td width="13%"><b>Resting BP</b></td>
                                        <td width="17%"><input  name="bp" type="text" id="bp" value="" size="15"
                                                class="form-control"></td>
                                        <td><b>Respiratory Rate</b></td>
                                        <td><input  name="rhythm" type="text" id="rhythm" value="" size="15"
                                                class="form-control"></td>
                                        <td><b>Heart Rate</b></td>
                                        <td><input  name="hr" type="text" id="hr" value="" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>HEENT</b></td>
                                        <td colspan="6"><input  name="heent" id="heent" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Cardiac Findings</b></td>
                                        <td colspan="6"><input  name="cardiac" id="cardiac" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Lung Findings</b></td>
                                        <td colspan="6"><input  name="lung" id="lung" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Other Findings</b></td>
                                        <td colspan="6"><input  name="other" id="other" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>12 LEAD ECG</b></td>
                                        <td colspan="6"><input  name="egc" id="egc" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>2D Echocardiogram</b></td>
                                        <td colspan="6"><input  name="echo" id="echo" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Stress Test</b></td>
                                        <td colspan="6"><input  name="stress" id="stress" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>TSE</b></td>
                                        <td colspan="6"><input  name="tse" id="tse" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Other Test/s</b></td>
                                        <td colspan="6"><input  name="othertest" id="othertest" type="text"
                                                value="" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Cardiac Risk Factor</b></td>
                                        <td colspan="6"><input  name="crf" id="crf" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Impression</b></td>
                                        <td colspan="6"><textarea  name="impression" id="impression" cols="50"
                                                rows="2" class="form-control"></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="table-responsive">
                                            <table width="100%" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold">For Follow Up Form</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal">Normal
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings">With Findings
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Findings</label>
                                                                <textarea placeholder="Remarks" class="form-control" name="remarks" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                                        <td width="15%"><b>Cardiologist</b></td>
                                                        <td width="85%">
                                                            <div class="col-md-12">
                                                                <select  name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($cardiologists as $cardiologist)
                                                                        <option value={{$cardiologist->id}}>{{$cardiologist->firstname}} {{$cardiologist->lastname}}</option>
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
                            <div class="box-footer my-2">
                                <button name="action" id="btnSave" value="save" type="submit" class="btn btn-primary"
                                    onclick="return chkAdmission();">Save</button>
                            </div>
                        </form>
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
@endsection
@push('scripts')
<script>
window.addEventListener('load', () => {
    computeBMI();
})

    function computeBMI() {
    let frm = document.querySelector('form');
    if (frm.height.value != '' && frm.weight.value != '') {
        var num = frm.weight.value / ((frm.height.value / 100) * (frm.height.value / 100));
        if (num < 18.4)
            bmi_desc = 'Underweight';
        else if (num >= 18.5 && num <= 22.9)
            bmi_desc = 'Normal';
        else if (num >= 23.0 && num <= 24.9)
            bmi_desc = 'Overweight';
        else if (num >= 25.0 && num <= 29.9)
            bmi_desc = 'Overweight II';
        else if (num >= 30.0 && num <= 34.9)
            bmi_desc = 'Obese';
        else if (num >= 35.0)
            bmi_desc = 'Obese II';
        frm.bmi.value = num.toFixed(2) + ' - ' + bmi_desc;
    }
}
</script>
@endpush
