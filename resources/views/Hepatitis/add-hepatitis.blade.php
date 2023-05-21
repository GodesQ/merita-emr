@extends('layouts.admin-layout')

@section('content')
<style>
    .table th, .table td {
        padding: 0.7rem !important;
        font-size: 12px;
    }
</style>
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Hepatitis</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_hepatitis" role="form">
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
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="left" class="brdBtm"><b>Examination</b></td>
                                        <td align="left" class="brdBtm"><b><b>Result</b></b></td>
                                        <td align="left" class="brdLeftBtm">
                                            <p><b>Cut-Off Value</b></p>
                                        </td>
                                        <td align="left" class="brdBtm"><b>Patient Count</b></td>
                                        <td align="left" class="brdBtm"><b>Findings</b></td>
                                        <td align="left" class="brdBtm"><b>Recommendation</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">VDRL/RPR</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                                <input name="vdrl_result" type="radio" class="m-50" id="vdrl_result_0" value="Non Reactive" {{$exam_bloodsero->vdrl_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                                <input name="vdrl_result" type="radio" class="m-50" id="vdrl_result_1" value="Reactive" {{$exam_bloodsero->vdrl_result == "Reactive" ? "checked" : null}}>Reactive
                                                <input name="vdrl_result" type="radio" class="m-50" id="vdrl_result_2" value="" {{$exam_bloodsero->vdrl_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="vdrl_result" type="radio" class="m-50" id="vdrl_result_0" value="Non Reactive">Non Reactive
                                            <input name="vdrl_result" type="radio" class="m-50" id="vdrl_result_1" value="Reactive">Reactive
                                            <input name="vdrl_result" type="radio" class="m-50" id="vdrl_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft"></td>
                                        <td class="brdLeft"></td>
                                        <td><input name="vdrl_findings" type="text" class="form-control" style="width:280px"
                                            id="vdrl_findings" value=""></td>
                                        <td><input name="vdrl_recommendation" type="text" class="form-control" style="width:280px"
                                                id="vdrl_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">HBsAg</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                                <input name="hbsag_result" type="radio" class="m-50" id="hbsag_result_0" value="Non Reactive" {{$exam_bloodsero->hbsag_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                                <input name="hbsag_result" type="radio" class="m-50" id="hbsag_result_1" value="Reactive" {{$exam_bloodsero->hbsag_result == "Reactive" ? "checked" : null}}>Reactive
                                                <input name="hbsag_result" type="radio" class="m-50" id="hbsag_result_2" value="" {{$exam_bloodsero->hbsag_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="hbsag_result" type="radio" class="m-50" id="hbsag_result_0" value="Non Reactive">Non Reactive
                                            <input name="hbsag_result" type="radio" class="m-50" id="hbsag_result_1" value="Reactive">Reactive
                                            <input name="hbsag_result" type="radio" class="m-50" id="hbsag_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="hbsag_cutoff" style="width:70px" type="text" class="form-control" id="hbsag_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->hbsag_cov : null}}"></td>
                                        <td class="brdLeft"><input name="hbsag_value" style="width:70px" type="text" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->hbsag_pv : null}}"></td>
                                        <td><input name="hbsag_findings" type="text" class="form-control" style="width:280px"
                                            id="hbsag_findings" value=""></td>
                                        <td><input name="hbsag_recommendation" type="text" class="form-control" style="width:280px"
                                                id="hbsag_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HCV </td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihcv_result" type="radio" class="m-50" id="antihcv_result_0" value="Non Reactive" {{$exam_bloodsero->antihcv_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihcv_result" type="radio" class="m-50" id="antihcv_result_1" value="Reactive" {{$exam_bloodsero->antihcv_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihcv_result" type="radio" class="m-50" id="antihcv_result_2" value="" {{$exam_bloodsero->antihcv_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihcv_result" type="radio" class="m-50" id="antihcv_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihcv_result" type="radio" class="m-50" id="antihcv_result_1" value="Reactive">Reactive
                                            <input name="antihcv_result" type="radio" class="m-50" id="antihcv_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihcv_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihavigg_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihcv_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihavigg_pv : null}}">
                                        </td>
                                        <td><input name="antihcv_findings" type="text" class="form-control" style="width:280px"
                                            id="antihcv_findings" value=""></td>
                                        <td><input name="antihcv_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihcv_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HAV (lgM)</td>
                                         <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihavlgm_result" type="radio" class="m-50" id="antihavlgm_result_0" value="Non Reactive" {{$exam_bloodsero->antihavlgm_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihavlgm_result" type="radio" class="m-50" id="antihavlgm_result_1" value="Reactive" {{$exam_bloodsero->antihavlgm_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihavlgm_result" type="radio" class="m-50" id="antihavlgm_result_2" value="" {{$exam_bloodsero->antihavlgm_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihavlgm_result" type="radio" class="m-50" id="antihavlgm_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihavlgm_result" type="radio" class="m-50" id="antihavlgm_result_1" value="Reactive">Reactive
                                            <input name="antihavlgm_result" type="radio" class="m-50" id="antihavlgm_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihavlgm_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihavigm_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihavlgm_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihavigm_pv : null}}">
                                        </td>
                                        <td><input name="antihavlgm_findings" type="text" class="form-control" style="width:280px"
                                            id="antihavlgm_findings" value=""></td>
                                        <td><input name="antihavlgm_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihavlgm_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HAV (lgG)</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihavlgg_result" type="radio" class="m-50" id="antihavlgg_result_0" value="Non Reactive" {{$exam_bloodsero->antihavlgg_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihavlgg_result" type="radio" class="m-50" id="antihavlgg_result_1" value="Reactive" {{$exam_bloodsero->antihavlgg_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihavlgg_result" type="radio" class="m-50" id="antihavlgg_result_2" value="" {{$exam_bloodsero->antihavlgg_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihavlgg_result" type="radio" class="m-50" id="antihavlgg_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihavlgg_result" type="radio" class="m-50" id="antihavlgg_result_1" value="Reactive">Reactive
                                            <input name="antihavlgg_result" type="radio" class="m-50" id="antihavlgg_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihavlgg_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihavigg_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihavlgg_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihavigg_pv : null}}">
                                        </td>
                                        <td><input name="antihavlgg_findings" type="text" class="form-control" style="width:280px"
                                            id="antihavlgg_findings" value=""></td>
                                        <td><input name="antihavlgg_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihavlgg_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">TPHA</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                                <input name="tpha_result" type="radio" class="m-50" id="tpha_result_0" value="Non Reactive" {{$exam_bloodsero->tpha_result == "Non Reactive" ? "checked" : null}}>Negative
                                                <input name="tpha_result" type="radio" class="m-50" id="tpha_result_1" value="Reactive" {{$exam_bloodsero->tpha_result == "Reactive" ? "checked" : null}}>Positive
                                                <input name="tpha_result" type="radio" class="m-50" id="tpha_result_2" value="" {{$exam_bloodsero->tpha_result == "" ? "checked" : null}}>Reset
                                            @else
                                                <input name="tpha_result" type="radio" class="m-50" id="tpha_result_0" value="Non Reactive">Negative
                                                <input name="tpha_result" type="radio" class="m-50" id="tpha_result_1" value="Reactive">Positive
                                                <input name="tpha_result" type="radio" class="m-50" id="tpha_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft"></td>
                                        <td class="brdLeft"></td>
                                        <td><input name="tpha_findings" type="text" class="form-control" style="width:280px"
                                            id="tpha_findings" value=""></td>
                                        <td><input name="tpha_recommendation" type="text" class="form-control" style="width:280px"
                                                id="tpha_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBs</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihbs_result" type="radio" class="m-50" id="antihbs_result_0" value="Non Reactive" {{$exam_bloodsero->antihbs_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihbs_result" type="radio" class="m-50" id="antihbs_result_1" value="Reactive" {{$exam_bloodsero->antihbs_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihbs_result" type="radio" class="m-50" id="antihbs_result_2" value="" {{$exam_bloodsero->antihbs_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihbs_result" type="radio" class="m-50" id="antihbs_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihbs_result" type="radio" class="m-50" id="antihbs_result_1" value="Reactive">Reactive
                                            <input name="antihbs_result" type="radio" class="m-50" id="antihbs_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbs_cutoff" type="text" style="width:70px" class="form-control" id="hbsag_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihbs_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbs_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihbs_pv : null}}">
                                        </td>
                                        <td><input name="antihbs_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbs_findings" value=""></td>
                                        <td><input name="antihbs_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbs_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">HBeAg</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="hbeag_result" type="radio" class="m-50" id="hbeag_result_0" value="Non Reactive" {{$exam_bloodsero->hbeag_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="hbeag_result" type="radio" class="m-50" id="hbeag_result_1" value="Reactive" {{$exam_bloodsero->hbeag_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="hbeag_result" type="radio" class="m-50" id="hbeag_result_2" value="" {{$exam_bloodsero->hbeag_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="hbeag_result" type="radio" class="m-50" id="hbeag_result_0" value="Non Reactive">Non Reactive
                                            <input name="hbeag_result" type="radio" class="m-50" id="hbeag_result_1" value="Reactive">Reactive
                                            <input name="hbeag_result" type="radio" class="m-50" id="hbeag_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="hbeag_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->hbeag_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="hbeag_value" type="text" style="width:70px" class="form-control" id="antihbs_value" value="{{$exam_bloodsero ? $exam_bloodsero->hbeag_pv : null}}">
                                        </td>
                                        <td><input name="hbeag_findings" type="text" class="form-control" style="width:280px"
                                            id="hbeag_findings" value=""></td>
                                        <td><input name="hbeag_recommendation" type="text" class="form-control" style="width:280px"
                                                id="hbeag_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBe</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihbe_result" type="radio" class="m-50" id="antihbe_result_0" value="Non Reactive" {{$exam_bloodsero->antihbe_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihbe_result" type="radio" class="m-50" id="antihbe_result_1" value="Reactive" {{$exam_bloodsero->antihbe_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihbe_result" type="radio" class="m-50" id="antihbe_result_2" value="" {{$exam_bloodsero->antihbe_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihbe_result" type="radio" class="m-50" id="antihbe_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihbe_result" type="radio" class="m-50" id="antihbe_result_1" value="Reactive">Reactive
                                            <input name="antihbe_result" type="radio" class="m-50" id="antihbe_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbe_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihbe_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbe_value" type="text" style="width:70px" class="form-control" id="antihbs_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihbe_pv : null}}">
                                        </td>
                                        <td><input name="antihbe_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbe_findings" value=""></td>
                                        <td><input name="antihbe_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbe_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBc (lgM):</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihbclgm_result" type="radio" class="m-50" id="antihbclgm_result_0" value="Non Reactive" {{$exam_bloodsero->antihbclgm_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihbclgm_result" type="radio" class="m-50" id="antihbclgm_result_1" value="Reactive" {{$exam_bloodsero->antihbclgm_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihbclgm_result" type="radio" class="m-50" id="antihbclgm_result_2" value="" {{$exam_bloodsero->antihbclgm_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihbclgm_result" type="radio" class="m-50" id="antihbclgm_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihbclgm_result" type="radio" class="m-50" id="antihbclgm_result_1" value="Reactive">Reactive
                                            <input name="antihbclgm_result" type="radio" class="m-50" id="antihbclgm_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgm_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihbclgm_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgm_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihbclgm_pv : null}}">
                                        </td>
                                        <td><input name="antihbclgm_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbclgm_findings" value=""></td>
                                        <td><input name="antihbclgm_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbclgm_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBc (lgG)</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="antihbclgg_result" type="radio" class="m-50" id="antihbclgg_result_0" value="Non Reactive" {{$exam_bloodsero->antihbclgg_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="antihbclgg_result" type="radio" class="m-50" id="antihbclgg_result_1" value="Reactive" {{$exam_bloodsero->antihbclgg_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="antihbclgg_result" type="radio" class="m-50" id="antihbclgg_result_2" value="" {{$exam_bloodsero->antihbclgg_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="antihbclgg_result" type="radio" class="m-50" id="antihbclgg_result_0" value="Non Reactive">Non Reactive
                                            <input name="antihbclgg_result" type="radio" class="m-50" id="antihbclgg_result_1" value="Reactive">Reactive
                                            <input name="antihbclgg_result" type="radio" class="m-50" id="antihbclgg_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgg_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->antihbclgg_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgg_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->antihbclgg_pv : null}}">
                                        </td>
                                        <td><input name="antihbclgg_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbclgg_findings" value=""></td>
                                        <td><input name="antihbclgg_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbclgg_recommendation" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Others</td>
                                        <td class="brdLeft">
                                            @if($exam_bloodsero)
                                            <input name="others_result" type="radio" class="m-50" id="antihcv_result_0" value="Non Reactive" {{$exam_bloodsero->sothers_result == "Non Reactive" ? "checked" : null}}>Non Reactive
                                            <input name="others_result" type="radio" class="m-50" id="antihcv_result_1" value="Reactive" {{$exam_bloodsero->sothers_result == "Reactive" ? "checked" : null}}>Reactive
                                            <input name="others_result" type="radio" class="m-50" id="antihcv_result_2" value="" {{$exam_bloodsero->sothers_result == "" ? "checked" : null}}>Reset
                                            @else
                                            <input name="others_result" type="radio" class="m-50" id="antihcv_result_0" value="Non Reactive">Non Reactive
                                            <input name="others_result" type="radio" class="m-50" id="antihcv_result_1" value="Reactive">Reactive
                                            <input name="others_result" type="radio" class="m-50" id="antihcv_result_2" value="">Reset
                                            @endif
                                        </td>
                                        <td class="brdLeft">
                                            <input name="others_cutoff" type="text" style="width:70px" class="form-control" id="antihbs_cutoff" value="{{$exam_bloodsero ? $exam_bloodsero->sothers_cov : null}}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="others_value" type="text" style="width:70px" class="form-control" id="hbsag_value" value="{{$exam_bloodsero ? $exam_bloodsero->sothers_pv : null}}">
                                        </td>
                                        <td><input name="others_findings" type="text" class="form-control" style="width:280px"
                                            id="others_findings" value=""></td>
                                        <td><input name="others_recommendation" type="text" class="form-control" style="width:280px"
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
