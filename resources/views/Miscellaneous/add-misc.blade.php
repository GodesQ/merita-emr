@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Miscellaneous</h3>
                            <a href="patient_edit?id={{$admission->patient_id}}&patientcode={{$admission->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_misc" role="form">
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
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr>
                                        <td align="left"><b>EXAM</b></td>
                                        <td>
                                            <input name="exam" id="exam" type="text" value="" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="12%" align="left"><b>RESULT</b></td>
                                        <td width="88%"><textarea name="result" id="result" cols="50" rows="4"
                                                class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="4">
                                                <tbody>
                                                    <tr>
                                                        <td width="34%"><b>COLUMN1</b></td>
                                                        <td width="34%"><b>COLUMN2</b></td>
                                                        <td width="32%"><b>COLUMN3</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><textarea name="col1" id="result2" cols="38" rows="4"
                                                                class="form-control"></textarea></td>
                                                        <td><textarea name="col2" id="col" cols="38" rows="4"
                                                                class="form-control"></textarea></td>
                                                        <td><textarea name="col3" id="col2" cols="38" rows="4"
                                                                class="form-control"></textarea></td>
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
                                            <td colspan="4">
                                            <div class="form-group">
                                                    <label for=""><b>Remarks</b></label>
                                                    <input name="remarks_status" type="radio" class="m-1"
                                                    id="remarks_status_0" value="normal">Normal
                                                    <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings">With Findings
                                            </div>
                                            <div class="form-group">
                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="" cols="30" rows="6"></textarea>
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
@endsection