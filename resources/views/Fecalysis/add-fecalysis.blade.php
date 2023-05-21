@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Fecalysis</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_fecalysis" role="form">
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
                                                id="peme_date" value="{{$admission->trans_date}}" class="form-control"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required name="admission_id" type="text"
                                                    id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input required-sm pull-left"
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
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="left"><b>MACROSCOPIC FINDINGS:</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Color</b></td>
                                        <td width="76%">
                                            <select name="color" class="form-control move">
                                                <option value="Brown">Brown</option>
                                                <option value="Light Brown">Light Brown</option>
                                                <option value="Dark Brown">Dark Brown</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Green">Green</option>
                                                <option value="Red">Red</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Consistency</b></td>
                                        <td>
                                            <select name="consistency" class="form-control move">
                                                <option value="Formed">Formed</option>
                                                <option value="Semi Formed">Semi Formed</option>
                                                <option value="Mucold">Mucold</option>
                                                <option value="Soft">Soft</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Bacteria</b></td>
                                        <td>
                                            <select name="bacteria" class="form-control move">
                                                <option value="RARE">RARE</option>
                                                <option value="FEW">FEW</option>
                                                <option value="MODERATE">MODERATE</option>
                                                <option value="MANY">MANY</option>
                                                <option value="None">None</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="left"><b>MICROSCOPIC FINDINGS:</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Pus Cells</b></td>
                                        <td><input name="pus" type="text" class="form-control move" id="pus" value="/hpf"></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>RBC</b></td>
                                        <td><input name="rbc" type="text" class="form-control move" id="rbc" value="/hpf"></td>
                                    </tr>
                                    <tr>
                                        <td width="5%" align="left">&nbsp;</td>
                                        <td width="19%" align="left"><b>Yeast Cells</b></td>
                                        <td><input name="yeast" type="text" class="form-control move" id="yeast" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><strong>Mucus Threads</strong></td>
                                        <td><input name="mucus" type="text" class="form-control move" id="mucus" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Epithelial Cells</b></td>
                                        <td><input name="epithelial" type="text" class="form-control move" id="epithelial"
                                                value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Ova / Parasite</b></td>
                                        <td><input name="ova" type="ova" class="form-control move" id="ova"
                                                value="No intestinal parasite seen."></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>Stool Culture</b></td>
                                        <td valign="center">
                                            <input name="stool_status" type="radio" class="m-1 move" id="stool_status_0" value="normal">Normal
                                            <input name="stool_status" type="radio" class="m-1 move" id="stool_status_1" value="findings">Findings
                                            <input name="stool_status" type="radio" class="m-1 move" id="stool_status_2" value="">Reset
                                        </td>
                                        <td align="left" valign="center">
                                            <input name="stool_culture" type="text" class="form-control move" id="stool_culture" value="No Salmonella, Shigella and Cholera isolated.">
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
                                                        <input name="remarks_status" type="radio" class="m-1 move"
                                                        id="remarks_status_0" value="normal">Normal
                                                        <input name="remarks_status" type="radio" class="m-1 move" id="remarks_status_1" value="findings">With Findings
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Findings</label>
                                                    <textarea placeholder="Remarks" class="form-control move" name="remarks"
                                                        id="" cols="30" rows="6"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Recommendation</label>
                                                    <textarea placeholder="Recommendation" class="form-control move" name="recommendation"
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
