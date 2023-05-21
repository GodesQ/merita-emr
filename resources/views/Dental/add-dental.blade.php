@extends('layouts.admin-layout')

@section('content')
    <style>
        input[type=checkbox] {
            width: 25px;
            height: 25px;

        }

        .active {
            background: black !important;
            color: white !important;
        }
    </style>
    <div class="app-content content bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Add Dental</h3>
                                <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $admission->patientcode }}"
                                    class="float-right btn btn-primary">Back to Patient</a>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/store_dental" role="form">
                                @if (Session::get('status'))
                                    <div class="success alert-success p-2 my-2">
                                        {{ Session::get('status') }}
                                    </div>
                                @endif
                                @csrf
                                <input type="hidden" name="id" value="{{ $admission->id }}">
                                <input type="hidden" name="patient_id" value="{{ $admission->patient_id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr>
                                            <td width="92"><b>PEME Date</b></td>
                                            <td width="247">
                                                <input name="peme_date" type="text" id="peme_date"
                                                    value="{{ $admission->trans_date }}" class="form-control"
                                                    readonly="">
                                            </td>
                                            <td width="113"><b>Admission No.</b></td>
                                            <td width="322">
                                                <div class="col-md-10" style="margin-left: -14px">
                                                    <input name="admission_id" type="text" id="admission_id"
                                                        value="{{ $admission->id }}"
                                                        class="form-control input required-sm pull-left"
                                                        placeholder="Admission No." readonly="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Exam Date</b></td>
                                            <td><input name="trans_date" type="text" id="trans_date"
                                                    value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly=""></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>Patient</b></td>
                                            <td>
                                                <input name="patientname" id="patientname" type="text"
                                                    value="{{ $admission->lastname . ', ' . $admission->firstname }}"
                                                    class="form-control" readonly="">
                                            </td>
                                            <td><b>Patient Code</b></td>
                                            <td><input name="patientcode" id="patientcode" type="text"
                                                    value="{{ $admission->patientcode }}" class="form-control"
                                                    readonly="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellpadding="1" cellspacing="0"
                                    class="table table-border">
                                    <tbody>
                                        <tr>
                                            <td colspan="7" align="center"><b><u>SHORT MEDICAL HISTORY</u></b></td>
                                        </tr>
                                        <tr>
                                            <td width="181" height="27"><b>ORAL HYGIENE </b></td>
                                            <td colspan="2"><input name="hygiene" type="radio" id="radio"
                                                    value="Good">
                                                Good</td>
                                            <td width="134"><input name="hygiene" type="radio" id="radio2"
                                                    value="Fair">
                                                Fair </td>
                                            <td width="342" colspan="3"><input name="hygiene" type="radio"
                                                    id="radio3" value="Bad">
                                                Bad </td>
                                        </tr>
                                        <tr>
                                            <td height="29"><b>GINGIVA CONSISTENCY</b></td>
                                            <td colspan="2"><input name="gingiva" type="radio" id="radio4"
                                                    value="Firm">
                                                Firm</td>
                                            <td><input name="gingiva" type="radio" id="radio5" value="Hyper Plastic">
                                                Hyper Plastic </td>
                                            <td colspan="3"><input name="gingiva" type="radio" id="radio6"
                                                    value="Smooth">
                                                Smooth </td>
                                        </tr>
                                        <tr>
                                            <td height="27"><b>COLOR</b></td>
                                            <td colspan="2"><input name="color" type="radio" id="radio7"
                                                    value="Pink">
                                                Pink</td>
                                            <td><input name="color" type="radio" id="radio8" value="Bright Red">
                                                Bright Red </td>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="27"><b>TONGUE</b></td>
                                            <td colspan="2"><input name="tongue" type="radio" id="radio9"
                                                    value="Normal">
                                                Normal</td>
                                            <td><input name="tongue" type="radio" id="radio10" value="Coated">
                                                Coated </td>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row m-1 shadow-sm p-50">
                                    <div class="col-md-6 " style="color: blue;">
                                        <h5>BLUE INK - Shade location of the restoration</h5>
                                        <div class="row">
                                            <button type="button" onclick="changeLegend('PJC', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">PJC
                                                - Plastic/Porcelain Jacket Crown</button>
                                            <button type="button" onclick="changeLegend('MC', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">MC
                                                - Metal Crown</button>
                                            <button type="button" onclick="changeLegend('Se', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Se
                                                - Sealant</button>
                                            <button type="button" onclick="changeLegend('GIC', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">GIC
                                                - Glass Ionomer</button>
                                            <button type="button" onclick="changeLegend('3/4 Cr', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">3/4
                                                Cr - Three Quarter Crown</button>
                                            <button type="button" onclick="changeLegend('In', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">In
                                                - Inlay</button>
                                            <button type="button" onclick="changeLegend('On', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">On
                                                - Onlay</button>
                                            <button type="button" onclick="changeLegend('Abt', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Abt
                                                - Abutment</button>
                                            <button type="button" onclick="changeLegend('GC', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">GC
                                                - Gold Crown</button>
                                            <button type="button" onclick="changeLegend('', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Clear</button>
                                            <button type="button" onclick="changeLegend('Am', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Am
                                                - Amalgam Filling</button>
                                            <button type="button" onclick="changeLegend('CD', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">CD
                                                - Complete Denture</button>
                                            <button type="button" onclick="changeLegend('P', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">P
                                                - Pontic</button>
                                            <button type="button" onclick="changeLegend('Co', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Co
                                                - Composite</button>
                                            <button type="button" onclick="changeLegend('M', this)"
                                                class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">M
                                                - Missing</button>

                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-end" style="color: rgb(255, 0, 0);">
                                        <h5>RED INK - Shade location of abnormality</h5>
                                        <div class="row">
                                            <div clas="col">
                                                <button type="button" onclick="changeLegend('C', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">C
                                                    - Carries/Cavity</button>
                                                <button type="button" onclick="changeLegend('TF', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">TF
                                                    - Temporary Filling</button>
                                                <button type="button" onclick="changeLegend('X', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">X
                                                    - For extraction</button>
                                                <button type="button" onclick="changeLegend('RF', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">RF
                                                    - Root Fragments</button>
                                                <button type="button" onclick="changeLegend('UN', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">UN
                                                    - Unerupted</button>
                                                <button type="button" onclick="changeLegend('Ab', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">Ab
                                                    - Abrasion</button>
                                                <button type="button" onclick="changeLegend('Imp', this)"
                                                    class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">Imp
                                                    - Impacted</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right my-1 float-right">
                                    <button class="btn btn-solid btn-primary" type="button"
                                        onclick="unCheckUpper()">Upper CD</button>
                                    <button class="btn btn-solid btn-primary" type="button"
                                        onclick="unCheckLower()">Lower CD</button>
                                </div>
                                <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0"
                                    style="font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition18')"
                                                    class="upper-input" name="tooth18" type="text" id="tooth18"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition17')"
                                                    class="upper-input" name="tooth17" type="text" id="tooth17"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition16')"
                                                    class="upper-input" name="tooth16" type="text" id="tooth16"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition15')"
                                                    class="upper-input" name="tooth15" type="text" id="tooth15"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition14')"
                                                    class="upper-input" name="tooth14" type="text" id="tooth14"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition13')"
                                                    class="upper-input" name="tooth13" type="text" id="tooth13"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition12')"
                                                    class="upper-input" name="tooth12" type="text" id="tooth12"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition11')"
                                                    class="upper-input" name="tooth11" type="text" id="tooth11"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition21')"
                                                    class="upper-input" name="tooth21" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition22')"
                                                    class="upper-input" name="tooth22" type="text" id="tooth22"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition23')"
                                                    class="upper-input" name="tooth23" type="text" id="tooth23"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition24')"
                                                    class="upper-input" name="tooth24" type="text" id="tooth24"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition25')"
                                                    class="upper-input" name="tooth25" type="text" id="tooth25"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition26')"
                                                    class="upper-input" name="tooth26" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition27')"
                                                    class="upper-input" name="tooth27" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition28')"
                                                    class="upper-input" name="tooth28" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno18.jpg" width="26"
                                                    height="115" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno17.jpg" width="29"
                                                    height="110" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno26.jpg" width="26"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno15.jpg" width="32"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno14.jpg" width="28"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno13.jpg" width="30"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno12.jpg" width="25"
                                                    height="136" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno11.jpg" width="33"
                                                    height="134" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno21.jpg" width="24"
                                                    height="125" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno22.jpg" width="32"
                                                    height="125" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno23.jpg" width="29"
                                                    height="116" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno24.jpg" width="29"
                                                    height="112" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno25.jpg" width="32"
                                                    height="115" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno26.jpg" width="26"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno27.jpg" width="30"
                                                    height="117" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno28.jpg" width="32"
                                                    height="120" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle"> 18
                                                <input class="upper" name="dentition18" type="checkbox"
                                                    id="dentition18" value="dentition18" checked="">
                                            </td>
                                            <td align="center" valign="middle"> 17
                                                <input class="upper" name="dentition17" type="checkbox"
                                                    id="dentition17" value="dentition17" checked="">
                                            </td>
                                            <td align="center" valign="middle">16
                                                <input class="upper" name="dentition16" type="checkbox"
                                                    id="dentition16" value="dentition16" checked="">
                                            </td>
                                            <td align="center" valign="middle">15
                                                <input class="upper" name="dentition15" type="checkbox"
                                                    id="dentition15" value="dentition15" checked="">
                                            </td>
                                            <td align="center" valign="middle">14
                                                <input class="upper" name="dentition14" type="checkbox"
                                                    id="dentition14" value="dentition14" checked="">
                                            </td>
                                            <td align="center" valign="middle">13
                                                <input class="upper" name="dentition13" type="checkbox"
                                                    id="dentition13" value="dentition13" checked="">
                                            </td>
                                            <td align="center" valign="middle">12
                                                <input class="upper" name="dentition12" type="checkbox"
                                                    id="dentition12" value="dentition12" checked="">
                                            </td>
                                            <td align="center" valign="middle">11
                                                <input class="upper" name="dentition11" type="checkbox"
                                                    id="dentition11" value="dentition11" checked="">
                                            </td>
                                            <td align="center" valign="middle">21
                                                <input class="upper" name="dentition21" type="checkbox"
                                                    id="dentition21" value="dentition21" checked="">
                                            </td>
                                            <td align="center" valign="middle">22
                                                <input class="upper" name="dentition22" type="checkbox"
                                                    id="dentition22" value="dentition22" checked="">
                                            </td>
                                            <td align="center" valign="middle">23
                                                <input class="upper" name="dentition23" type="checkbox"
                                                    id="dentition23" value="dentition23" checked="">
                                            </td>
                                            <td align="center" valign="middle">24
                                                <input class="upper" name="dentition24" type="checkbox"
                                                    id="dentition24" value="dentition24" checked="">
                                            </td>
                                            <td align="center" valign="middle">25
                                                <input class="upper" name="dentition25" type="checkbox"
                                                    id="dentition25" value="dentition25" checked="">
                                            </td>
                                            <td align="center" valign="middle">26
                                                <input class="upper" name="dentition26" type="checkbox"
                                                    id="dentition26" value="dentition26" checked="">
                                            </td>
                                            <td align="center" valign="middle">27
                                                <input class="upper" name="dentition27" type="checkbox"
                                                    id="dentition27" value="dentition27" checked="">
                                            </td>
                                            <td align="center" valign="middle">28
                                                <input class="upper" name="dentition28" type="checkbox"
                                                    id="dentition28" value="dentition28" checked="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle"> 48
                                                <input class="lower" name="dentition48" type="checkbox"
                                                    id="dentition48" value="dentition48" checked="">
                                            </td>
                                            <td align="center" valign="middle">47
                                                <input class="lower" name="dentition47" type="checkbox"
                                                    id="dentition47" value="dentition47" checked="">
                                            </td>
                                            <td align="center" valign="middle">46
                                                <input class="lower" name="dentition46" type="checkbox"
                                                    id="dentition46" value="dentition46" checked="">
                                            </td>
                                            <td align="center" valign="middle">45
                                                <input class="lower" name="dentition45" type="checkbox"
                                                    id="dentition45" value="dentition45" checked="">
                                            </td>
                                            <td align="center" valign="middle">44
                                                <input class="lower" name="dentition44" type="checkbox"
                                                    id="dentition44" value="dentition44" checked="">
                                            </td>
                                            <td align="center" valign="middle">43
                                                <input class="lower" name="dentition43" type="checkbox"
                                                    id="dentition43" value="dentition43" checked="">
                                            </td>
                                            <td align="center" valign="middle">42
                                                <input class="lower" name="dentition42" type="checkbox"
                                                    id="dentition42" value="dentition42" checked="">
                                            </td>
                                            <td align="center" valign="middle">41
                                                <input class="lower" name="dentition41" type="checkbox"
                                                    id="dentition41" value="dentition41" checked="">
                                            </td>
                                            <td align="center" valign="middle">31
                                                <input class="lower" name="dentition31" type="checkbox"
                                                    id="dentition31" value="dentition31" checked="">
                                            </td>
                                            <td align="center" valign="middle">32
                                                <input class="lower" name="dentition32" type="checkbox"
                                                    id="dentition32" value="dentition32" checked="">
                                            </td>
                                            <td align="center" valign="middle">33
                                                <input class="lower" name="dentition33" type="checkbox"
                                                    id="dentition33" value="dentition33" checked="">
                                            </td>
                                            <td align="center" valign="middle">34
                                                <input class="lower" name="dentition34" type="checkbox"
                                                    id="dentition34" value="dentition34" checked="">
                                            </td>
                                            <td align="center" valign="middle">35
                                                <input class="lower" name="dentition35" type="checkbox"
                                                    id="dentition35" value="dentition35" checked="">
                                            </td>
                                            <td align="center" valign="middle">36
                                                <input class="lower" name="dentition36" type="checkbox"
                                                    id="dentition36" value="dentition36" checked="">
                                            </td>
                                            <td align="center" valign="middle">37
                                                <input class="lower" name="dentition37" type="checkbox"
                                                    id="dentition37" value="dentition37" checked="">
                                            </td>
                                            <td align="center" valign="middle">38
                                                <input class="lower" name="dentition38" type="checkbox"
                                                    id="dentition38" value="dentition38" checked="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno48.jpg" width="33"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno47.jpg" width="30"
                                                    height="100" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno46.jpg" width="33"
                                                    height="100" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno45.jpg" width="28"
                                                    height="100" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno44.jpg" width="32"
                                                    height="100" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno43.jpg" width="30"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno42.jpg" width="24"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno41.jpg" width="31"
                                                    height="121" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno31.jpg" width="28"
                                                    height="125" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno32.jpg" width="33"
                                                    height="125" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno33.jpg" width="31"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno34.jpg" width="30"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno35.jpg" width="33"
                                                    height="121" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno36.jpg" width="27"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno37.jpg" width="29"
                                                    height="120" alt=""></td>
                                            <td align="center" valign="top"><img
                                                    src="../../../app-assets/images/dental/tno38.jpg" width="34"
                                                    height="121" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition48')"
                                                    class="lower-input" name="tooth48" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition47')"
                                                    class="lower-input" name="tooth47" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition46')"
                                                    class="lower-input" name="tooth46" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition45')"
                                                    class="lower-input" name="tooth45" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition44')"
                                                    class="lower-input" name="tooth44" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition43')"
                                                    class="lower-input" name="tooth43" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition42')"
                                                    class="lower-input" name="tooth42" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition41')"
                                                    class="lower-input" name="tooth41" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition31')"
                                                    class="lower-input" name="tooth31" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition32')"
                                                    class="lower-input" name="tooth32" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition33')"
                                                    class="lower-input" name="tooth33" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition34')"
                                                    class="lower-input" name="tooth34" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition35')"
                                                    class="lower-input" name="tooth35" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition36')"
                                                    class="lower-input" name="tooth36" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition37')"
                                                    class="lower-input" name="tooth37" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                            <td align="center"><input readonly onfocus="makeInput(this, 'dentition38')"
                                                    class="lower-input" name="tooth38" type="text" id="tooth21"
                                                    value=""
                                                    style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="myRepeatingFields" class="my-3">
                                    <div class="entry input-group row">
                                        <div class="row table">
                                            <table class="table">
                                                <thead>
                                                    <th>Date</th>
                                                    <th>SERVICE RENDERED</th>
                                                    <th>Tooth No.</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="date" id="date" name="dates[]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="services[]">
                                                                <option value="OP">OP</option>
                                                                <option value="restoration">restoration</option>
                                                                <option value="extraction">extraction</option>
                                                                <option value="RCT">RCT</option>
                                                                <option value="denture">denture</option>
                                                                <option value="crown">crown</option>
                                                                <option value="X-Ray">X-Ray</option>
                                                                <option value="Temporary Restoration">Temporary Restoration
                                                                </option>
                                                                <option value="Cementation">Cementation</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="teeth[]">
                                                        </td>
                                                        <td>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-success btn-add">
                                                                    <span class="fa fa-plus" aria-hidden="true"></span>
                                                                </button>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
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
                                                                    <input name="remarks_status" type="radio"
                                                                        class="m-1" id="remarks_status_0"
                                                                        value="normal">Normal
                                                                    <input name="remarks_status" type="radio"
                                                                        class="m-1" id="remarks_status_1"
                                                                        value="findings">With Findings
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Findings</label>
                                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="" cols="30" rows="6"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Recommendation</label>
                                                                    <textarea placeholder="Recommendation" class="form-control" name="recommendation" id="" cols="30"
                                                                        rows="6"></textarea>
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
                                                            <td width="14%"><b>Dentist: </b></td>
                                                            <td width="86%">
                                                                <div class="col-md-8">
                                                                    <select required name="technician_id"
                                                                        id="technician_id" class="form-control">
                                                                        @foreach ($dentists as $dentist)
                                                                            <option value={{ $dentist->id }}>
                                                                                {{ $dentist->firstname }}
                                                                                {{ $dentist->lastname }}</option>
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
                                        class="btn btn-primary" onclick="return chkAdmission();">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

@push('scripts')
    <script>
        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();
                var controlForm = $('#myRepeatingFields:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fa fa-trash"></i>');
            }).on('click', '.btn-remove', function(e) {
                e.preventDefault();
                $(this).parents('.entry:first').remove();
                return false;
            });
        });

        function unCheckUpper() {
            let upperCheckBoxes = document.querySelectorAll('.upper');
            let upperInput = document.querySelectorAll('.upper-input');
            for (let index = 0; index < upperCheckBoxes.length; index++) {
                const element = upperCheckBoxes[index];
                element.checked = false;
                upperInput[index].value = "CD";
            }
        }

        function unCheckLower() {
            let lowerCheckBoxes = document.querySelectorAll('.lower');
            let lowerInput = document.querySelectorAll('.lower-input');
            for (let index = 0; index < lowerCheckBoxes.length; index++) {
                const element = lowerCheckBoxes[index];
                element.checked = false;
                lowerInput[index].value = "CD";
            }
        }

        let legendInput = '';

        function changeLegend(legend, e) {
            legendInput = legend;
            $(".dental-btn").removeClass("active");
            e.classList.add('active');
        }

        function makeInput(e, id) {
            e.value = legendInput;
            document.querySelector(`input[name='${id}']`).checked = false;
        }
    </script>
@endpush
