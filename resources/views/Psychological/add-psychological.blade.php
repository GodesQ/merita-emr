@extends('layouts.admin-layout')

@section('content')
<style>
    .table th,
    .table td {
            padding: 0.1rem;
    }
</style>
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Psychological</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" class="table-responsive" action="/store_psycho" role="form">
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
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="19%"><b>Test Administered</b></td>
                                        <td width="25%">
                                            <input name="checkbox" type="checkbox" disabled="" id="checkbox"
                                                value="Intelligence Test (IQ)" checked="checked">Intelligence Test (IQ)
                                        </td>
                                        <td width="21%"><input name="checkbox" type="checkbox" disabled="" id="checkbox"
                                                value="Personality Test" checked="checked">Personality Test </td>
                                        <td width="13%"><input name="test_administered" type="radio"
                                                id="test_administered" value="Others">
                                            Others: </td>
                                        <td width="22%"><input name="others" id="others" type="text" value=""
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Intellectual Level</b></td>
                                        <td colspan="4">
                                            <div class="col-md-8">
                                                <select type="menu" name="intellectual" id="intellectual"
                                                    class="form-control">
                                                    <option value="" selected="">--SELECT--</option>
                                                    <option value="Very Superior">Very Superior</option>
                                                    <option value="Superior">Superior</option>
                                                    <option value="Above Average">Above Average</option>
                                                    <option value="Average">Average</option>
                                                    <option value="Below Average">Below Average</option>
                                                    <option value="Borderline">Borderline</option>
                                                    <option value="Mentally Deficient">Mentally Deficient</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="321" border="0" align="center" cellpadding="5" cellspacing="2"
                                style="border: 2px black solid;">
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="center"><b>LEGEND </b></td>
                                    </tr>
                                    <tr>
                                        <td width="37">&nbsp;</td>
                                        <td width="130" valign="top">1-Very Low<br>
                                            2-Low<br>
                                            3-Low Average<br>
                                            4-Average<br></td>
                                        <td width="112" valign="top">5-High Average<br>
                                            6-High<br>
                                            7-Very High</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Sense of Responsibility</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Perseverance</td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Obedience</td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Self-discipline / Orderly</td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Enthusiasm</td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Initiative</td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Emotional Stability</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Can withstand boredom and work alone</td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Tolerance to stress, <br> pressure and inconveniences</td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Faces reality</td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Confidence</td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Relaxed</td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Objectivity</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Tough-mindedness	</td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Adaptability</td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Practicality</td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Motivation</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Assertiveness</td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Independence</td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Resourcefulness</td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Interpersonal and Personal Adjustment</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Relationship with Peers <br> and Co-workers (Teamsmanship)</td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Relationship with Superiors, <br> Employers and Authority Figures (Deference)</td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Self-esteem</td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Aggressive tendencies</td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Goal Orientation</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Directs one's effort towards clear cut objective	</td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4" checked>
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table">
                                <tbody>
                                    <tr>
                                        <td width="13%"><b>Conclusion:</b></td>
                                        <td>
                                            <select type="menu" name="conclusion" id="conclusion" class="form-control">
                                                <option value="">--SELECT--</option>
                                                <option value="RECOMMENDED">RECOMMENDED</option>
                                                <option value="FOR FURTHER EVALUATION">FOR FURTHER EVALUATION</option>
                                            </select>
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
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td><b><span class="brdTop">Psychometrician</span>: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($psychometricians as $psychometrician)
                                                                        <option value={{$psychometrician->id}}>{{$psychometrician->firstname}} {{$psychometrician->lastname}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="16%"><b>Psychologist: </b></td>
                                                        <td width="84%">
                                                            <div class="col-md-8">
                                                                <select name="technician2_id" id="technician2_id"
                                                                    class="form-control">
                                                                    @foreach($psychologists as $psychologist)
                                                                        <option value={{$psychologist->id}}>{{$psychologist->firstname}} {{$psychologist->lastname}}</option>
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
