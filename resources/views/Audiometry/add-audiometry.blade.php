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
                                <h3>Add Audiometry</h3>
                                <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $admission->patientcode }}"
                                    class="float-right btn btn-primary">Back to Patient</a>
                            </div>
                        </div>
                        <div class="card-content p-2 table-responsive">
                            <form name="frm" method="post" action="/store_audiometry" role="form">
                                @if (Session::get('status'))
                                    <div class="success alert-success p-2 my-2">
                                        {{ Session::get('status') }}
                                    </div>
                                @endif
                                @csrf
                                <input required type="hidden" name="id" value="{{ $admission->id }}">
                                <input type="hidden" name="patient_id" value="{{ $admission->patient->id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr>
                                            <td width="92"><b>PEME Date</b></td>
                                            <td width="247">
                                                <input required name="peme_date" type="text" id="peme_date"
                                                    value="{{ $admission->trans_date }}" class="form-control"
                                                    readonly="">
                                            </td>
                                            <td width="113"><b>Admission No.</b></td>
                                            <td width="322">
                                                <div class="col-md-10" style="margin-left: -14px">
                                                    <input required name="admission_id" type="text" id="admission_id"
                                                        value="{{ $admission->id }}"
                                                        class="form-control input required required-sm pull-left"
                                                        placeholder="Admission No." readonly="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Exam Date</b></td>
                                            <td><input required required required name="trans_date" type="text"
                                                    id="trans_date" value="<?php echo date('Y-m-d'); ?>" class="form-control"
                                                    readonly=""></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>Patient</b></td>
                                            <td>
                                                <input required required required name="patientname" id="patientname"
                                                    type="text"
                                                    value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                    class="form-control" readonly="">
                                            </td>
                                            <td><b>Patient Code</b></td>
                                            <td><input required required required name="patientcode" id="patientcode"
                                                    type="text" value="{{ $admission->patientcode }}"
                                                    class="form-control" readonly=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2"
                                    class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="10%"><b><u>AIR</u></b></td>
                                            <td width="10%" align="center"><b>250</b></td>
                                            <td width="10%" align="center"><b>500</b></td>
                                            <td width="10%" align="center"><b>750</b></td>
                                            <td width="10%" align="center"><b>1000</b></td>
                                            <td width="10%" align="center"><b>2000</b></td>
                                            <td width="10%" align="center"><b>3000</b></td>
                                            <td width="10%" align="center"><b>4000</b></td>
                                            <td width="10%" align="center"><b>6000</b></td>
                                            <td width="10%" align="center"><b>8000 </b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Right Ear:</b></td>
                                            <td align="center"><input name="air_right1" type="number" max="999"
                                                    class="form-control" id="air_right1" value="" size="5"></td>
                                            <td align="center"><input name="air_right2" type="number" max="999"
                                                    class="form-control" id="air_right2" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right3" type="number" max="999"
                                                    class="form-control" id="air_right3" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right4" type="number" max="999"
                                                    class="form-control" id="air_right4" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right5" type="number" max="999"
                                                    class="form-control" id="air_right5" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right6" type="number" max="999"
                                                    class="form-control" id="air_right6" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right7" type="number" max="999"
                                                    class="form-control" id="air_right7" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right8" type="number" max="999"
                                                    class="form-control" id="air_right8" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_right9" type="number" max="999"
                                                    class="form-control" id="air_right9" value="" size="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Left Ear:</b></td>
                                            <td align="center"><input name="air_left1" type="number" max="999"
                                                    class="form-control" id="air_left1" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left2" type="number" max="999"
                                                    class="form-control" id="air_left2" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left3" type="number" max="999"
                                                    class="form-control" id="air_left3" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left4" type="number" max="999"
                                                    class="form-control" id="air_left4" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left5" type="number" max="999"
                                                    class="form-control" id="air_left5" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left6" type="number" max="999"
                                                    class="form-control" id="air_left6" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left7" type="number" max="999"
                                                    class="form-control" id="air_left7" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left8" type="number" max="999"
                                                    class="form-control" id="air_left8" value="" size="5">
                                            </td>
                                            <td align="center"><input name="air_left9" type="number" max="999"
                                                    class="form-control" id="air_left9" value="" size="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"><b><u>BONE</u></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Right Ear:</b></td>
                                            <td align="center"><input name="bone_right1" type="number" max="999"
                                                    class="form-control" id="bone_right1" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right2" type="number" max="999"
                                                    class="form-control" id="bone_right2" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right3" type="number" max="999"
                                                    class="form-control" id="bone_right3" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right4" type="number" max="999"
                                                    class="form-control" id="bone_right4" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right5" type="number" max="999"
                                                    class="form-control" id="bone_right5" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right6" type="number" max="999"
                                                    class="form-control" id="bone_right6" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right7" type="number" max="999"
                                                    class="form-control" id="bone_right7" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right8" type="number" max="999"
                                                    class="form-control" id="bone_right8" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_right9" type="number" max="999"
                                                    class="form-control" id="bone_right9" value="" size="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Left Ear:</b></td>
                                            <td align="center"><input name="bone_left1" type="number" max="999"
                                                    class="form-control" id="bone_left1" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left2" type="number" max="999"
                                                    class="form-control" id="bone_left2" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left3" type="number" max="999"
                                                    class="form-control" id="bone_left3" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left4" type="number" max="999"
                                                    class="form-control" id="bone_left4" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left5" type="number" max="999"
                                                    class="form-control" id="bone_left5" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left6" type="number" max="999"
                                                    class="form-control" id="bone_left6" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left7" type="number" max="999"
                                                    class="form-control" id="bone_left7" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left8" type="number" max="999"
                                                    class="form-control" id="bone_left8" value="" size="5">
                                            </td>
                                            <td align="center"><input name="bone_left9" type="number" max="999"
                                                    class="form-control" id="bone_left9" value="" size="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b><u>FREE FIELD</u></b></td>
                                            <td align="center"><input name="free_field1" type="number" max="999"
                                                    class="form-control" id="free_field1" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field2" type="number" max="999"
                                                    class="form-control" id="free_field2" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field3" type="number" max="999"
                                                    class="form-control" id="free_field3" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field4" type="number" max="999"
                                                    class="form-control" id="free_field4" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field5" type="number" max="999"
                                                    class="form-control" id="free_field5" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field6" type="number" max="999"
                                                    class="form-control" id="free_field6" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field7" type="number" max="999"
                                                    class="form-control" id="free_field7" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field8" type="number" max="999"
                                                    class="form-control" id="free_field8" value="" size="5">
                                            </td>
                                            <td align="center"><input name="free_field9" type="number" max="999"
                                                    class="form-control" id="free_field9" value="" size="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"><b><u>Aided</u></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Right Ear:</b></td>
                                            <td align="center"><input name='aided_right1' type="number" max="999"
                                                    class="form-control" id="aided_right1" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right2" type="number" max="999"
                                                    class="form-control" id="aided_right2" value=""
                                                    size="5">
                                            </td>
                                            <td align="center"><input name="aided_right3" type="number" max="999"
                                                    class="form-control" id="aided_right3" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right4" type="number" max="999"
                                                    class="form-control" id="aided_right4" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right5" type="number" max="999"
                                                    class="form-control" id="aided_right5" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right6" type="number" max="999"
                                                    class="form-control" id="aided_right6" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right7" type="number" max="999"
                                                    class="form-control" id="aided_right7" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right8" type="number" max="999"
                                                    class="form-control" id="aided_right8" value=""
                                                    size="5"></td>
                                            <td align="center"><input name="aided_right9" type="number" max="999"
                                                    class="form-control" id="aided_right9" value=""
                                                    size="5"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Left Ear:</b></td>
                                            <td align="center"><input name="aided_left1" type="number" max="999"
                                                    class="form-control" id="aided_left1" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left2" type="number" max="999"
                                                    class="form-control" id="aided_left2" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left3" type="number" max="999"
                                                    class="form-control" id="aided_left3" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left4" type="number" max="999"
                                                    class="form-control" id="aided_left4" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left5" type="number" max="999"
                                                    class="form-control" id="aided_left5" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left6" type="number" max="999"
                                                    class="form-control" id="aided_left6" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left7" type="number" max="999"
                                                    class="form-control" id="aided_left7" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left8" type="number" max="999"
                                                    class="form-control" id="aided_left8" value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_left9" type="number" max="999"
                                                    class="form-control" id="aided_left9" value="" size="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b><u>FREE FIELD</u></b></td>
                                            <td align="center"><input name="aided_free_field1" type="number"
                                                    max="999" class="form-control" id="aided_free_field1"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field2" type="number"
                                                    max="999" class="form-control" id="aided_free_field2"
                                                    value="" size="5">
                                            </td>
                                            <td align="center"><input name="aided_free_field3" type="number"
                                                    max="999" class="form-control" id="aided_free_field3"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field4" type="number"
                                                    max="999" class="form-control" id="aided_free_field4"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field5" type="number"
                                                    max="999" class="form-control" id="aided_free_field5"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field6" type="number"
                                                    max="999" class="form-control" id="aided_free_field6"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field7" type="number"
                                                    max="999" class="form-control" id="aided_free_field7"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field8" type="number"
                                                    max="999" class="form-control" id="aided_free_field8"
                                                    value="" size="5"></td>
                                            <td align="center"><input name="aided_free_field9" type="number"
                                                    max="999" class="form-control" id="aided_free_field9"
                                                    value="" size="5"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2" class="table">
                                    <tbody>
                                        <tr>
                                            <td width="50%" align="center">
                                                <table width="80%" border="0" cellpadding="2" cellspacing="0"
                                                    class="">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4" align="center"><b>SPEECH AUDIOMETRY</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="68">&nbsp;</td>
                                                            <td width="72" align="center">RIGHT</td>
                                                            <td width="73" align="center">LEFT</td>
                                                            <td width="71" align="center">FF</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">SRT</td>
                                                            <td align="right"><input name="srt_right" type="number"
                                                                    max="999" class="form-control" id="srt_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="srt_left" type="number"
                                                                    max="999" class="form-control" id="srt_left"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="srt_ff" type="number"
                                                                    max="999" class="form-control" id="srt_ff"
                                                                    value="" size="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">SD</td>
                                                            <td align="right"><input name="sd_right" type="number"
                                                                    max="999" class="form-control" id="sd_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="sd_left" type="number"
                                                                    max="999" class="form-control" id="sd_left"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="sd_ff" type="number"
                                                                    max="999" class="form-control" id="sd_ff"
                                                                    value="" size="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">MCL</td>
                                                            <td align="right"><input name="mcl_right" type="number"
                                                                    max="999" class="form-control" id="mcl_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="mcl_left" type="number"
                                                                    max="999" class="form-control" id="mcl_left"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="mcl_ff" type="number"
                                                                    max="999" class="form-control" id="mcl_ff"
                                                                    value="" size="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">TOL</td>
                                                            <td align="right"><input name="tol_right" type="number"
                                                                    max="999" class="form-control" id="tol_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="tol_left" type="number"
                                                                    max="999" class="form-control" id="tol_left"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="tol_ff" type="number"
                                                                    max="999" class="form-control" id="tol_ff"
                                                                    value="" size="5"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="50%" align="center">
                                                <table width="80%" border="0" cellpadding="2" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" align="center"><b>TYMPANOMETRY TEST</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="68">&nbsp;</td>
                                                            <td width="72" align="center">RIGHT</td>
                                                            <td width="73" align="center">LEFT</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">TYPE</td>
                                                            <td align="right"><input name="type_right" type="number"
                                                                    max="999" class="form-control" id="type_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="type_left" type="number"
                                                                    max="999" class="form-control" id="type_left"
                                                                    value="" size="5">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">ECV</td>
                                                            <td align="right"><input name="ecv_right" type="number"
                                                                    max="999" class="form-control" id="ecv_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="ecv_left" type="number"
                                                                    max="999" class="form-control" id="ecv_left"
                                                                    value="" size="5">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">COMPLIANCE</td>
                                                            <td align="right"><input name="comp_right" type="number"
                                                                    max="999" class="form-control" id="comp_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="comp_left" type="number"
                                                                    max="999" class="form-control" id="comp_left"
                                                                    value="" size="5">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">PRESSURE</td>
                                                            <td align="right"><input name="press_right" type="number"
                                                                    max="999" class="form-control" id="press_right"
                                                                    value="" size="5">
                                                            </td>
                                                            <td align="right"><input name="press_left" type="number"
                                                                    max="999" class="form-control" id="press_left"
                                                                    value="" size="5">
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
                                            <td>
                                                <div class="form-group">
                                                    <input name="hearing" type="radio" class="m-1" id="hearing_0"
                                                        value="aided">Aided
                                                    <input name="hearing" type="radio" class="m-1" id="hearing_1"
                                                        value="unaided">Unaided
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Right Ear Result</label>
                                                    <input name="left_ear_result" type="radio" class="m-1"
                                                        id="left_ear_result_1" value="Adequate">Adequate
                                                    <input name="left_ear_result" type="radio" class="m-1"
                                                        id="left_ear_result_0" value="Inadequate">Inadequate
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Left Ear Result</label>
                                                    <input name="right_ear_result" type="radio" class="m-1"
                                                        id="right_ear_result_1" value="Adequate">Adequate
                                                    <input name="right_ear_result" type="radio" class="m-1"
                                                        id="right_ear_result_0" value="Inadequate">Inadequate
                                                </div>
                                            </td>
                                        </tr>
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
                                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="" cols="30" rows="6">PURETONE AUDIOMETRY RESULTS SUGGEST NORMAL BILATERAL HEARING ACUITY</textarea>
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
                                                            <td width="16%"><b>Audiometrician: </b></td>
                                                            <td width="84%">
                                                                <div class="col-md-8">
                                                                    <select name="technician_id" id="technician_id"
                                                                        class="form-control">
                                                                        @foreach ($audiometricians as $audiometrician)
                                                                            <option value={{ $audiometrician->id }}>
                                                                                {{ $audiometrician->lastname }},
                                                                                {{ $audiometrician->firstname }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b><span class="brdTop">Otolaryngologist</span>: </b></td>
                                                            <td>
                                                                <div class="col-md-8">
                                                                    <select name="technician2_id" id="technician2_id" class="form-control">
                                                                            @foreach ($otolaries as $otolary)
                                                                                <option value={{ $otolary->id }}> {{ $otolary->lastname }}, {{ $otolary->firstname }}</option>
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
                                    <button name="action" id="btnSave" value="save" type="submit"
                                        class="btn btn-primary" onclick="return chkAdmission();">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    </div>
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
@endsection
