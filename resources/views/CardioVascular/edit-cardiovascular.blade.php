@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Cardiovascular</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_cardiovascular_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_cardiovascular" role="form">
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
                            <table class="table table-responsive table-bordered" id="tblExam" width="100%"
                                cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
                                                value="{{ $admission->trans_date }}" class="form-control my-1"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control my-1 input-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control my-1" readonly="">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td colspan="3">
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control my-1" readonly="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control my-1" readonly="">
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-responsive" width="100%" border="0" cellpadding="2"
                                cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td width="21%" align="left"><b>Past Medical History</b></td>
                                        <td colspan="6"><textarea name="pasthistory" id="pasthistory" cols="50" rows="4"
                                                class="form-control my-1">{{ $exam->pasthistory }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td width="21%" align="left"><b>Medications/Maintenance</b></td>
                                        <td colspan="6"><textarea name="medmaint" id="medmaint" cols="50" rows="2"
                                                class="form-control my-1">{{ $exam->medmaint }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>Smoking History</b></td>
                                        <td colspan="6"><input name="smoking" id="smoking" type="text"
                                                value="{{ $exam->smoking }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>Alcohol Intake</b></td>
                                        <td colspan="6"><input name="alcohol" id="alcohol" type="text"
                                                value="{{ $exam->alcohol }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>VITAL SIGNS</b></td>
                                        <td colspan="6">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Height (cm)</b></td>
                                        <td><input onkeyup="computeBMI();" name="height" type="text" id="height" value="{{$exam_physical ? $exam_physical->height : null}}"
                                                class="form-control"></td>
                                        <td><b>Weight
                                                (kg) </b></td>
                                        <td><input name="weight" type="text" id="weight" value="{{$exam_physical ? $exam_physical->weight : null}}"
                                                class="form-control" onkeyup="computeBMI();"></td>
                                        <td><b>BMI</b></td>
                                        <td><input name="bmi" readonly type="text" id="bmi" value="{{$exam_physical ? $exam_physical->bmi : null}}"
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Resting BP</b></td>
                                        <td><input name="bp" type="text" id="bp" value="{{ $exam->bp }}"
                                                size="15" class="form-control my-1"></td>
                                        <td><b>Respiratory Rate</b></td>
                                        <td><input name="rhythm" type="text" id="rhythm" value="{{ $exam->rhythm }}"
                                                size="15" class="form-control my-1"></td>
                                        <td><b>Heart Rate</b></td>
                                        <td><input name="hr" type="text" id="hr" value="{{ $exam->hr }}"
                                                class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>HEENT</b></td>
                                        <td colspan="6"><input name="heent" id="heent" type="text"
                                                value="{{ $exam->heent }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Cardiac Findings</b></td>
                                        <td colspan="6"><input name="cardiac" id="cardiac" type="text"
                                                value="{{ $exam->cardiac }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Lung Findings</b></td>
                                        <td colspan="6"><input name="lung" id="lung" type="text"
                                                value="{{ $exam->lung }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Other Findings</b></td>
                                        <td colspan="6"><input name="other" id="other" type="text"
                                                value="{{ $exam->other }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>12 LEAD ECG</b></td>
                                        <td colspan="6"><input name="egc" id="egc" type="text" value="{{ $exam->egc }}"
                                                class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>2D Echocardiogram</b></td>
                                        <td colspan="6"><input name="echo" id="echo" type="text"
                                                value="{{ $exam->echo }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Stress Test</b></td>
                                        <td colspan="6"><input name="stress" id="stress" type="text"
                                                value="{{ $exam->stress }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>TSE</b></td>
                                        <td colspan="6"><input name="tse" id="tse" type="text" value="{{ $exam->tse }}"
                                                class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Other Test/s</b></td>
                                        <td colspan="6"><input name="othertest" id="othertest" type="text"
                                                value="{{ $exam->othertest }}" class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Cardiac Risk Factor</b></td>
                                        <td colspan="6"><input name="crf" id="crf" type="text" value="{{ $exam->crf }}"
                                                class="form-control my-1"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Impression</b></td>
                                        <td colspan="6"><textarea name="impression" id="impression" cols="50" rows="3"
                                                class="form-control my-1">{{ $exam->impression }}</textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table" width="100%" border="0" cellspacing="2" cellpadding="2">
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
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal" {{ $exam->remarks_status == "normal" ? 'checked' : null }}>Normal
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" {{ $exam->remarks_status == "findings" ? 'checked' : null }}>With Findings
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Findings</label>
                                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                                    id="" cols="30" rows="6">{{ $exam->remarks }}</textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                                    id="" cols="30" rows="6">{{ $exam->recommendation }}</textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table" width="100%" border="0" cellspacing="2"
                                cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <table class="table" width="100%" border="0" cellspacing="2"
                                                cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%"><b>Cardiologist</b></td>
                                                        <td width="85%">
                                                            <div class="col-md-12">
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control my-1">
                                                                    @foreach($cardiologists as $cardiologist)
                                                                        <option value={{$cardiologist->id}} {{$cardiologist->id == $exam->technician_id ? 'selected' : null}}>{{$cardiologist->firstname}} {{$cardiologist->lastname}}</option>
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
                                    class="btn btn-primary">Save</button>
                                <input name="table" id="table" type="hidden" value="exam_cardio">
                                <input name="uid" id="uid" type="hidden" value="3250">
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
