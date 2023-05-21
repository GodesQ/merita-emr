@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Urinalysis</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_urinalysis" role="form">
                            @if(Session::get('status'))
                                <div class="success alert-success p-2 my-2">
                                    {{Session::get('status')}}
                                </div>
                            @endif
                            @csrf
                            <input required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input required name="peme_date" type="text"
                                                id="peme_date" value="{{$admission->trans_date}}" class="form-control" readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required name="admission_id" type="text" id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input required name="trans_date" type="text"
                                                id="trans_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly=""></td>
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
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="186"><b>MACROSCOPIC</b></td>
                                        <td width="387"><span class="brdBtm"><b>RESULTS</b></span></td>
                                        <td width="207">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top" class="brdAll">Color</td>
                                        <td>
                                            <select name="color" id="color" class="form-control move">
                                                <option value="">--SELECT--</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Light Yellow">Light Yellow</option>
                                                <option value="Dark Yellow">Dark Yellow</option>
                                            </select>
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top" class="brdAll">Transparency</td>
                                        <td>
                                            <select name="transparency" id="transparency" class="form-control move">
                                                <option value="">--SELECT--</option>
                                                <option value="Clear">Clear</option>
                                                <option value="Sl. Turbid">Sl. Turbid</option>
                                                <option value="Turbid">Turbid</option>
                                            </select>
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top" class="brdAll">pH</td>
                                        <td>
                                            <select name="ph" id="ph" class="form-control move">
                                                <option value="">--SELECT--</option>
                                                <option value="5.0">5.0</option>
                                                <option value="5.5">5.5</option>
                                                <option value="6.0">6.0</option>
                                                <option value="6.5">6.5</option>
                                                <option value="7.0">7.0</option>
                                                <option value="7.5">7.5</option>
                                                <option value="8.0">8.0</option>
                                            </select>
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top" class="brdAll">Specific Gravity</td>
                                        <td>
                                            <select name="spgravity" id="spgravity" class="form-control move">
                                                <option value="">--SELECT--</option>
                                                <option value="1.000">1.000</option>
                                                <option value="1.005">1.005</option>
                                                <option value="1.010">1.010</option>
                                                <option value="1.015">1.015</option>
                                                <option value="1.020">1.020</option>
                                                <option value="1.025">1.025</option>
                                                <option value="1.030">1.030</option>
                                            </select>
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Sugar</td>
                                        <td>
                                            <input name="sugar" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="sugar_0" value="Negative"
                                                checked="">Negative<input name="sugar" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="sugar_1" value="+1">+1<input name="sugar" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="sugar_2" value="+2">+2<input name="sugar" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="sugar_3" value="+3">+3<input name="sugar" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="sugar_4" value="+4">+4<input name="sugar" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="sugar_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Protein/Albumin</td>
                                        <td>
                                            <input name="albumin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="albumin_0" value="Negative" checked="">Negative
                                            <input name="albumin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="albumin_1" value="+1">+1
                                            <input name="albumin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="albumin_2" value="+2">+2
                                            <input name="albumin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="albumin_3" value="+3">+3
                                            <input name="albumin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="albumin_4" value="+4">+4
                                            <input name="albumin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="albumin_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Ketone</td>
                                        <td>
                                            <input name="ketone" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="ketone_0" value="Negative"
                                                checked="">Negative<input name="ketone" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="ketone_1" value="+1">+1<input name="ketone" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="ketone_2" value="+2">+2<input name="ketone" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="ketone_3" value="+3">+3<input name="ketone" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="ketone_4" value="+4">+4<input name="ketone" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="ketone_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Urobilinogen</td>
                                        <td>
                                           <input name="urobilinogen" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="urobilinogen_0" value="Normal" checked="">Normal
                                            <input name="urobilinogen" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="urobilinogen_1" value="+1">+1
                                            <input name="urobilinogen" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="urobilinogen_2" value="+2">+2
                                            <input name="urobilinogen" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="urobilinogen_3" value="+3">+3
                                            <input name="urobilinogen" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="urobilinogen_4" value="+4">+4
                                            <input name="urobilinogen" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="urobilinogen_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Bilirubin</td>
                                        <td>
                                            <input name="bilirubin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bilirubin_0" value="Negative" checked="">Negative
                                            <input name="bilirubin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bilirubin_1" value="+1">+1
                                            <input name="bilirubin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bilirubin_2" value="+2">+2
                                            <input name="bilirubin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bilirubin_3" value="+3">+3
                                            <input name="bilirubin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bilirubin_4" value="+4">+4
                                            <input name="bilirubin" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bilirubin_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Nitrite</td>
                                        <td>
                                            <input name="nitrite" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="nitrite_0" value="Negative" checked="">Negative
                                            <input name="nitrite" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="nitrite_1" value="+1">+1
                                            <input name="nitrite" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="nitrite_2" value="+2">+2
                                            <input name="nitrite" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="nitrite_3" value="+3">+3
                                            <input name="nitrite" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="nitrite_4" value="+4">+4
                                            <input name="nitrite" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="nitrite_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Leukocyte</td>
                                        <td>
                                            <input name="leukocyte" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="leukocyte_0" value="Negative" checked="">Negative
                                            <input name="leukocyte" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="leukocyte_1" value="+1">+1
                                            <input name="leukocyte" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="leukocyte_2" value="+2">+2
                                            <input name="leukocyte" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="leukocyte_3" value="+3">+3
                                            <input name="leukocyte" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="leukocyte_4" value="+4">+4
                                            <input name="leukocyte" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="leukocyte_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdAll">Blood Cell</td>
                                        <td>
                                            <input name="blood" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="blood_0" value="Negative"
                                                checked="">Negative<input name="blood" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="blood_1" value="+1">+1<input name="blood" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="blood_2" value="+2">+2<input name="blood" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="blood_3" value="+3">+3<input name="blood" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="blood_4" value="+4">+4<input name="blood" type="radio" style="width: 20px; height: 20px;" class="m-1 move"
                                                id="blood_5" value="">Reset
                                        </td>
                                        <td align="left" valign="top" class="brdAll">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="24%"><b>MICROSCOPIC</b></td>
                                        <td><span class="brdLeftBtm"><b>RESULTS</b></span></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top" class="brdLeft">Pus Cells</td>
                                        <td>
                                            <input name="pus" type="text" class="form-control move" id="pus" value="/hpf">
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top" class="brdLeft">RBC</td>
                                        <td width="49%">
                                            <input name="rbc" type="text" class="form-control move" id="rbc" value="/hpf">
                                        </td>
                                        <td width="27%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdLeft">Epithelial Cells</td>
                                        <td>
                                            <input name="epithelial" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0" value="Occassional">Occassional
                                            <input name="epithelial" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
                                            <input name="epithelial" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
                                            <input name="epithelial" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
                                            <input name="epithelial" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdLeft">Amorphous Urates</td>
                                        <td>
                                            <input name="urates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0" value="Occassional">Occassional
                                            <input name="urates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
                                            <input name="urates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
                                            <input name="urates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
                                            <input name="urates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdLeft">Amorphous Phosphates</td>
                                        <td>
                                            <input name="phosphates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0" value="Occassional">Occassional
                                            <input name="phosphates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
                                            <input name="phosphates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
                                            <input name="phosphates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
                                            <input name="phosphates" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
                                        </td>

                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdLeft">Mucus Threads</td>
                                        <td>
                                            <input name="mucus" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0" value="Occassional">Occassional
                                            <input name="mucus" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
                                            <input name="mucus" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
                                            <input name="mucus" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
                                            <input name="mucus" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="30" align="right" valign="top" class="brdLeft">Bacteria</td>
                                        <td>
                                            <input name="bacteria" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0" value="Occassional">Occassional
                                            <input name="bacteria" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
                                            <input name="bacteria" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
                                            <input name="bacteria" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
                                            <input name="bacteria" type="radio" style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="brdLeft">Others</td>
                                        <td colspan="2"><input name="others" type="text" class="form-control move"
                                                id="others" value=""></td>
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
                                                <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="findings">With Findings
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Findings</label>
                                            <textarea class="form-control" name="remarks"
                                                id="" cols="30" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Recommendation</label>
                                            <textarea class="form-control" name="recommendation"
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
<script>
    document.addEventListener('keydown',handleInputFocusTransfer);

    function handleInputFocusTransfer(e){

      const focusableInputElements= document.querySelectorAll(`.move`);

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
