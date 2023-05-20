@extends('layouts.admin-layout')

@section('content')
<style>
    .table th, .table td {
        padding: 0.8rem !important;
    }
</style>
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Hematology</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_hematology" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input required required required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input required name="peme_date" type="text"
                                                id="peme_date" value="{{$admission->trans_date}}" class="form-control"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required name="admission_id" type="text"
                                                    id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input required required-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input required name="trans_date" type="text"
                                                id="trans_date" value="<?php echo date(
                                    'Y-m-d'
                                ); ?>" class="form-control" readonly=""></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input required name="patientname" id="patientname"
                                                type="text"
                                                value="{{$admission->lastname . ", " . $admission->firstname}}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input required name="patientcode" id="patientcode"
                                                type="text" value="{{$admission->patientcode}}" class="form-control"
                                                readonly=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table no-border table-responsive">
                                <tbody>
                                    <tr class="brdAll">
                                        <td colspan="2" width="15%" class="brdBtm"><b>EXAMINATION</b></td>
                                        <td width="10%" class="brdBtm"><b>RESULTS</b></td>
                                        <td width="15%" class="brdBtm">NORMAL VALUES</td>
                                        <td width="5%" class="brdBtm"><b>FINDINGS</b></td>
                                        <td width="60%" class="brdBtm"><b>RECOMMENDATION</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%" colspan="2" align="left" valign="top" class="brdAll">
                                            <p>Hemoglobin</p>
                                        </td>
                                        <td width="10%" align="left" valign="top" class="brdAll"><input name="hemoglobin" type="text" class="form-control move" id="hemoglobin" value=""></td>
                                        <td width="15%">120 - 170 g/L</td>
                                        <td width="25%"><input name="hemoglobin_findings" type="text" class="form-control move" style="width:150px"
                                                id="hemoglobin_findings" value=""></td>
                                        <td width="25%"><input name="hemoglobin_recommendation" type="text" class="form-control move" style="width:350px"
                                                id="hemoglobin_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Hematocrit </td>
                                        <td align="left" valign="top" class="brdAll"><input name="hematocrit"
                                                type="text" class="form-control move" id="hematocrit" value=""></td>
                                        <td width="15%">0.40 - 0.54</td>
                                        <td><input name="hematocrit_findings" type="text" class="form-control move" style="width:150px"
                                                id="hematocrit_findings" value=""></td>
                                        <td><input name="hematocrit_recommendation" type="text" class="form-control move" style="width:350px"
                                                id="hematocrit_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">WBC</td>
                                        <td align="left" valign="top" class="brdAll"><input name="wbc" type="text"
                                                class="form-control move" id="wbc" value=""></td>
                                        <td width="15%">5 - 10 x 10<sup>9</sup> /L</td>
                                        <td><input name="wbc_findings" type="text" class="form-control move" style="width:150px"
                                                id="wbc_findings" value=""></td>
                                        <td><input name="wbc_recommendation" type="text" class="form-control move" style="width:350px"
                                                id="wbc_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">RBC</td>
                                        <td align="left" valign="top" class="brdAll"><input name="rbc" type="text"
                                                class="form-control" id="rbc" value=""></td>
                                        <td>3.5 - 5.5 10<sup>12</sup> /L</td>
                                        <td><input name="rbc_findings" type="text" class="form-control" style="width:150px"
                                                id="rbc_findings" value=""></td>
                                        <td><input name="rbc_recommendation" type="text" class="form-control" style="width:350px"
                                                id="rbc_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Neutrophil<br>
                                            </p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="neuthrophils"
                                                type="text" class="form-control" id="neuthrophils" value=""></td>
                                        <td>0.50 - 0.70</td>
                                        <td><input name="neuthrophils_findings" type="text" class="form-control" style="width:150px"
                                                id="neuthrophils_findings" value=""></td>
                                        <td><input name="neuthrophils_recommendation" type="text" class="form-control" style="width:350px"
                                                id="neuthrophils_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Lymphocyte</p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="lymphocytes"
                                                type="text" class="form-control" id="lymphocytes" value=""></td>
                                        <td>0.20 - 0.40</td>
                                        <td><input name="lymphocytes_findings" type="text" class="form-control" style="width:150px"
                                                id="lymphocytes_findings" value=""></td>
                                        <td><input name="lymphocytes_recommendation" type="text" class="form-control" style="width:350px"
                                                id="lymphocytes_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Monocyte</td>
                                        <td align="left" valign="top" class="brdAll"><input name="monophils" type="text"
                                                class="form-control" id="monophils" value=""></td>
                                        <td>0.00 - 0.10</td>
                                        <td><input name="monophils_findings" type="text" class="form-control" style="width:150px"
                                                id="monophils_findings" value=""></td>
                                        <td><input name="monophils_recommendation" type="text" class="form-control" style="width:350px"
                                                id="monophils_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Eosinophil</p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="eosinophils"
                                                type="text" class="form-control" id="eosinophils" value=""></td>
                                        <td>0.00 - 0.05</td>
                                        <td><input name="eosinophils_findings" type="text" class="form-control" style="width:150px"
                                                id="eosinophils_findings" value=""></td>
                                        <td><input name="eosinophils_recommendation" type="text" class="form-control" style="width:350px"
                                                id="eosinophils_recommendation" value=""></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Basophil</td>
                                        <td align="left" valign="top" class="brdAll"><input name="baspophils"
                                                type="text" class="form-control" id="baspophils" value=""></td>
                                        <td>0.00 - 0.01</td>
                                        <td><input name="baspophils_findings" type="text" class="form-control" style="width:150px"
                                                id="baspophils_findings" value=""></td>
                                        <td><input name="baspophils_recommendation" type="text" class="form-control" style="width:350px"
                                                id="baspophils_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Platelet</td>
                                        <td align="left" valign="top" class="brdAll"><input name="platelet" type="text"
                                                class="form-control" id="platelet" value=""></td>
                                        <td>150 - 450 X 10<sup>9</sup> /L</td>
                                        <td><input name="platelet_findings" type="text" class="form-control" style="width:150px"
                                                id="platelet_findings" value=""></td>
                                        <td><input name="platelet_recommendation" type="text" class="form-control" style="width:350px"
                                                id="platelet_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Blood Type</td>
                                        <td align="left" valign="top" class="brdAll">
                                            <input name="blood" type="radio" class="m-75" id="blood_0" value="A">A<input
                                                name="blood" type="radio" class="m-75" id="blood_1" value="B">B<input
                                                name="blood" type="radio" class="m-75" id="blood_2" value="AB"> AB <br><input
                                                name="blood" type="radio" class="m-75" id="blood_3" value="O">O<input
                                                name="blood" type="radio" class="m-75" id="blood_4" value="">Reset
                                        </td>
                                        <td></td>
                                        <td><input name="blood_findings" type="text" class="form-control" style="width:150px"
                                                id="blood_findings" value=""></td>
                                        <td><input name="blood_recommendation" type="text" class="form-control" style="width:350px"
                                                id="blood_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Rh Factor</td>
                                        <td align="left" valign="top" class="brdAll">
                                            <input name="rhfactor" type="radio" class="m-75" id="rhfactor_0"
                                                value="+">+<input name="rhfactor" type="radio" class="m-75"
                                                id="rhfactor_1" value="-">- <input name="rhfactor" type="radio"
                                                class="m-75" id="rhfactor_2" value="">Reset
                                        </td>
                                        <td></td>
                                        <td><input name="rhfactor_findings" type="text" class="form-control" style="width:150px"
                                                id="rhfactor_findings" value=""></td>
                                        <td><input name="rhfactor_recommendation" type="text" class="form-control" style="width:350px"
                                                id="rhfactor_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">ESR</td>
                                        <td align="left" valign="top" class="brdAll"><input name="esr" type="text"
                                                class="form-control" id="esr" value=""></td>
                                        <td>
                                            <?php echo $admission->gender == 'Male' ? '0 - 10 mm/hr' : '0 - 20 mm/hr' ?>
                                        </td>
                                        <td><input name="esr_findings" type="text" class="form-control" style="width:150px"
                                                id="esr_findings" value=""></td>
                                        <td><input name="esr_recommendation" type="text" class="form-control" style="width:350px"
                                                id="esr_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Bleeding Time</td>
                                        <td align="left" valign="top" class="brdAll"><input name="bleeding" type="text"
                                                class="form-control" id="bleeding" value=""></td>
                                        <td>1-7 Minutes</td>
                                        <td><input name="bleeding_findings" type="text" class="form-control" style="width:150px"
                                                id="bleeding_findings" value=""></td>
                                        <td><input name="bleeding_recommendation" type="text" class="form-control" style="width:350px"
                                                id="bleeding_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Clotting Time</td>
                                        <td align="left" valign="top" class="brdAll"><input name="clotting" type="text"
                                                class="form-control" id="clotting" value=""></td>
                                        <td>5-15 Minutes</td>
                                        <td><input name="clotting_findings" type="text" class="form-control" style="width:150px"
                                                id="clotting_findings" value=""></td>
                                        <td><input name="clotting_recommendation" type="text" class="form-control" style="width:350px"
                                                id="clotting_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">MCV</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mcv" type="text"
                                                class="form-control" id="mch" value=""></td>
                                        <td>80 - 100 fL5</td>
                                        <td><input name="mcv_findings" type="text" class="form-control" style="width:150px"
                                                id="mcv_findings" value=""></td>
                                        <td><input name="mcv_recommendation" type="text" class="form-control" style="width:350px"
                                                id="mcv_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">MCH</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mch" type="text"
                                                class="form-control" id="mch" value=""></td>
                                        <td>27 - 34 pg</td>
                                        <td><input name="mch_findings" type="text" class="form-control" style="width:150px"
                                                id="mch_findings" value=""></td>
                                        <td><input name="mch_recommendation" type="text" class="form-control" style="width:350px"
                                                id="mch_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">MCHC</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mchc" type="text"
                                                class="form-control" id="mchc" value=""></td>
                                        <td>320 - 360 g/L</td>
                                        <td><input name="mchc_findings" type="text" class="form-control" style="width:150px"
                                                id="mchc_findings" value=""></td>
                                        <td><input name="mchc_recommendation" type="text" class="form-control" style="width:350px"
                                                id="mchc_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">OTHERS:
                                            <textarea name="others" col="10" row="5" class="form-control" id="others"></textarea>
                                        </td>
                                        <th align="left" valign="bottom" class="brdAll">
                                            <input name="others_result" type="text" class="form-control"
                                                id="others_result" value="">
                                        </th>
                                        <td></td>
                                        <td><input name="others_findings" type="text" class="form-control" style="width:150px"
                                                id="others_findings" value=""></td>
                                        <td><input name="others_recommendation" type="text" class="form-control" style="width:350px"
                                                id="others_recommendation" value=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                        <tr>
                                            <td colspan="4">
                                            <div class="form-group">
                                                    <label for=""><b>Remarks</b></label>
                                                    <input name="remarks_status" type="radio" class="m-1"
                                                    id="remarks_status_0" value="normal">Normal
                                                    <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings">With Findings
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="font-weight-bold">Findings</label>
                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                    id="" cols="30" rows="6"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Recommendation</label>
                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                    id="" cols="30" rows="6"></textarea>
                                            </div> -->
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
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == "55" ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}, {{$med_tech->title}}</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('scripts')
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
@endpush --}}
