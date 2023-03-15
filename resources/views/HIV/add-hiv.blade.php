@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add HIV</h3>
                            <a href="patient_edit?id={{$admission->patient_id}}&patientcode={{$admission->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_hiv" role="form">
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
                                        <td><input required required required name="trans_date" type="text"
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
                            <table width="100%" border="0" class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="3"><b>EXAMINATION DONE:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input name="exam" type="radio" class="m-1" id="exam_2" value="enzyme"
                                                checked="">
                                            EIA/CMIA/ELFA
                                            <input name="exam" type="radio" class="m-1" id="exam_0" value="rapid">
                                            RAPID
                                            <input name="exam" type="radio" class="m-1" id="exam_1" value="particle">
                                            Particle Agglutination
                                            <input name="exam" type="radio" class="m-1" id="exam_3" value="others">
                                            OTHERS
                                        </td>
                                        <td width="45%">
                                            <input name="others" type="text" id="others" value="" class="form-control"
                                                style="width:200px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><b>Result</b></td>
                                        <td colspan="2">
                                            <input name="result" type="radio" class="m-1" id="result_0" value="Non Reactive" checked>Non Reactive
                                            <input name="result" type="radio" class="m-1" id="result_1" value="Reactive">Reactive
                                            <input name="result" type="radio" class="m-1" id="result_2" value="">Reset
                                        </td>
                                        <td width="45%">
                                            <div class="d-flex align-center">
                                                <div class="form-group">
                                                    <label><b>COV</b></label>
                                                    <input name="result_cov" type="text" id="result_cov" value="" class="form-control" style="width:200px">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>PV</b></label>
                                                    <input name="result_pv" type="text" id="result_pv" value="" class="form-control" style="width:200px">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>HIV Proficiency Cert. <br>
                                                Expiry Date</b></td>
                                        <td colspan="2"><input name="expiry_date" type="date" max="2050-12-31" id="expiry_date" value="2024-12-31"
                                                class="form-control" style="width:160px">
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
                                                    <input name="remarks_status" type="radio" class="m-1"
                                                    id="remarks_status_0" value="normal">Normal
                                                    <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings">With Findings
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Findings</label>
                                                <textarea  class="form-control" name="remarks"
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
                                                        <td><b>Physician: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select name="technician3_id" id="technician3_id"
                                                                    class="form-control">
                                                                    
                                                                    @foreach($physicians as $physician)
                                                                        <option value={{$physician->id}} >{{$physician->firstname}} {{$physician->lastname}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="23%"><b>Medical Technologist: </b></td>
                                                        <td width="77%">
                                                            <div class="col-md-8">
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                   @foreach($med_techs as $med_tech)
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == 64 ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}</option>
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
                                                                        <option value={{$pathologist->id}}>{{$pathologist->firstname}} {{$pathologist->lastname}}</option>
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