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
                            <h3>Add Stress Test</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_stresstest" role="form">
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
                            <table width="100%" class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="94" align="left"><b>Medications: </b></td>
                                        <td width="246" align="left">
                                            <input name="medication" type="text" id="medication" value="" size="30"
                                                class="form-control">
                                        </td>
                                        <td width="119" align="left"><b>Indication:</b></td>
                                        <td width="321" align="left">
                                            <input name="indication" type="text" id="indication" value="" size="20"
                                                class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td colspan="12" align="center"></td>
                                    </tr>
                                    <tr>
                                        <td width="9%" align="center"><b>Stage Number</b></td>
                                        <td width="8%" align="center"><b>Time (min:sec)</b></td>
                                        <td width="10%" align="center"><b>Speed (km/h)</b></td>
                                        <td width="7%" align="center"><b>Grade (%)</b></td>
                                        <td width="9%" align="center"><b>Workload (METs)</b></td>
                                        <td width="7%" align="center"><b>HR (bpm)</b></td>
                                        <td width="7%" align="center"><b>BP (mmHg)</b></td>
                                        <td width="7%" align="center"><b>RPP (*100)</b></td>
                                        <td width="7%" align="center"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                                        <td width="7%" align="center"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                                        <td width="7%" align="center"><b>ST II (mm)</b></td>
                                        <td width="15%" align="center"><b>Comment</b></td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Pre-Exercise</b></td>
                                        <td width="8%" align="center">
                                            <input name="exercise_speed" type="text" id="exercise_speed" value=""
                                                size="5" class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="exercise_speed" type="text" id="exercise_speed" value=""
                                                size="5" class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_grade" type="text" id="exercise_grade" value=""
                                                size="5" class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="exercise_mets" type="text" id="exercise_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_hr" type="text" id="exercise_hr" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="exercise_remarks" type="text" id="exercise_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 1</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage1_speed" type="text" id="stage1_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage1_speed" type="text" id="stage1_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_grade" type="text" id="stage1_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage1_mets" type="text" id="stage1_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_hr" type="text" id="stage1_hr" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage1_remarks" type="text" id="stage1_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 2</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage2_speed" type="text" id="stage2_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage2_speed" type="text" id="stage2_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_grade" type="text" id="stage2_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage2_mets" type="text" id="stage2_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_hr" type="text" id="stage2_hr" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage2_remarks" type="text" id="stage2_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 3</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage3_speed" type="text" id="stage3_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage3_speed" type="text" id="stage3_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_grade" type="text" id="stage3_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage3_mets" type="text" id="stage3_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_hr" type="text" id="stage3_hr" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage3_remarks" type="text" id="stage3_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 4</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage4_speed" type="text" id="stage4_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage4_speed" type="text" id="stage4_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_grade" type="text" id="stage4_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage4_remarks" type="text" id="stage4_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 5</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage5_speed" type="text" id="stage5_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage5_speed" type="text" id="stage5_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_grade" type="text" id="stage5_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                l="" class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage5_remarks" type="text" id="stage5_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 6</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage6_speed" type="text" id="stage6_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage6_speed" type="text" id="stage6_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_grade" type="text" id="stage6_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage6_remarks" type="text" id="stage6_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 7</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage7_speed" type="text" id="stage7_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage7_speed" type="text" id="stage7_speed" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage7_grade" type="text" id="stage7_grade" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage7_mets" type="text" id="stage7_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage7_mets" type="text" id="stage7_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage7_mets" type="text" id="stage7_mets" value="" size="5"
                                                class="form-control">
                                        </td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="15%" align="center">
                                            <input name="stage7_remarks" type="text" id="stage7_remarks" value=""
                                                size="10" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="105%" border="0" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td colspan="6"><b>RECOVERY/POST EXERCISE</b></td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="center"><b>Stage Number</b></td>
                                        <td width="20%" align="center"><b>Immediately After</b></td>
                                        <td width="15%" align="center"><b>1 minute</b></td>
                                        <td width="15%" align="center"><b>3 minutes</b></td>
                                        <td width="15%" align="center"><b>5 minutes</b></td>
                                        <td width="15%" align="center"><b>8 minutes</b></td>
                                    </tr>
                                    <tr>
                                        <td height="30" colspan="0" align="center"><b>BP</b></td>
                                        <td align="center">
                                            <input name="bp_after" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="bp_1min" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="bp_3mins" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="bp_5mins" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="bp_8mins" type="text" class="form-control" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="22" colspan="0" align="center"><b>HR</b></td>
                                        <td align="center">
                                            <input name="hr_after" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="hr_1min" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="hr_3min" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="hr_5min" type="text" class="form-control" value="">
                                        </td>
                                        <td align="center">
                                            <input name="hr_8min" type="text" class="form-control" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" height="27" align="center">
                                            <p><b><u>RESTING ECG:</u></b></p>
                                        </td>
                                        <td colspan="5">
                                            <textarea name="resting_ecg" cols="50" rows="2" maxlength=""
                                                class="form-control"
                                                id="resting_ecg">                          </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="27" colspan="6">
                                            <p><u><b>Response Exercise:</b></u></p>
                                            <input class="my-50" name="symptoms" type="text" id="symptoms" value="" size="15">
                                            -limited treadmill exercise test was performed using the
                                            <input class="my-50" name="exercise_type" type="text" id="exercise_type" value=""
                                                size="15">
                                            Patient <br> reached
                                            <input class="my-50" name="reach_min" type="text" id="reach_min" value="" size="3">
                                            min(s)
                                            <input class="my-50" name="reach_sec" type="text" id="reach_sec" value="" size="3">
                                            sec(s) of stage
                                            <input class="my-50" name="stage" type="text" id="stage" value="" size="2">
                                            equivalent to
                                            <input class="my-50" name="mets" type="text" id="mets" value="" size="3">
                                            mets. Baseline <br> heart rate was
                                            <input class="my-50" name="heart_rate" type="text" id="heart_rate" value="" size="3">
                                            BPM and the patient attained a maximum heart rate of
                                            <input class="my-50" name="max_heartrate" type="text" id="max_heartrate" value=""
                                                size="3">
                                            bpm which was
                                            <input class="my-50" name="bpm_equiv" type="text" id="bpm_equiv" value="" size="1">
                                            %
                                            of that predicted <br> for maximal heart rate for the patient's age. Starting BP
                                            was
                                            <input class="my-50" name="starting_bp" type="text" id="starting_bp" value="" size="5">
                                            and maximum BP during exercise <br> was
                                            <input class="my-50" name="max_bp" type="text" id="max_bp" value="" size="5">
                                            Double product is equal to
                                            <input class="my-50" name="double_prod" type="text" id="double_prod" value="" size="5">
                                            . ECG response to exercise showed
                                            <input class="my-50" name="ecg" type="text" id="ecg" value="" size="5">
                                            Exercise <br> capacity was
                                            <input class="my-50" name="capacity" type="text" id="capacity" value="" size="10">
                                            .
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
                            <tbody>
                                <tr>
                                    <td align="left">
                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td width="16%"><b>Cardiologist: </b></td>
                                                    <td width="84%">
                                                        <div class="col-md-8">
                                                            <select name="technician_id" id="technician_id"
                                                                class="form-control">
                                                                @foreach($cardiologists as $cardiologist)
                                                                        <option value={{$cardiologist->id}}>{{$cardiologist->firstname}} {{$cardiologist->lastname}} {{$cardiologist->title}}</option>
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
