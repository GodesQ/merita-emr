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
        <div class="container bg-white shadow-sm p-2 m-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-title">
                        <h3>Upload Files</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach ($errors->all() as $error)
                    @push('scripts')
                    <script>
                    let toaster = toastr.error('{{$error}}', 'Error');
                    </script>
                    @endpush
                    @endforeach
                    <form action="/upload_dental" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" name="patient_id" value="{{$exam->id}}">
                                <input required type="file" class="form-control" id="upload_files"
                                    name="upload_files[]" multiple />
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-solid btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @if ($dental_uploads)
                @foreach ($dental_uploads as $dental_upload)
                    @if (pathinfo($dental_upload->file, PATHINFO_EXTENSION) == "pdf")
                        <div class="col-md-2">
                            <div class="upload-con">
                                <img src="../../../app-assets/images/pdf.png" alt="">
                                <div class="upload-btn-div">
                                    <button type="button"
                                        onclick="window.open('/app-assets/images/dental_files/{{$dental_upload->file}}')"
                                        class="btn-print">View</button>
                                </div>
                            </div>
                        </div>
                @else
                    <div class="col-md-2">
                        <div class="upload-con">
                            <img src="../../../app-assets/images/dental_files/{{$dental_upload->file}}"
                                alt="">
                            <div class="upload-btn-div">
                                <button type="button"
                                    onclick="window.open('../../../app-assets/images/dental_files/{{$dental_upload->file}}')"
                                    class="btn-print">View</button>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Dental</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_dental_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_dental" role="form">
                            @if(Session::get('status'))
                            @push('scripts')
                            <script>
                             toastr.success('{{ Session::get("status")}}', 'Success');
                            </script>
                            @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247"><input name="peme_date" type="text" id="peme_date"
                                                value="{{ $admission->trans_date }}" class="form-control" readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control input-sm pull-left" placeholder="Admission No."
                                                    readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control" readonly=""></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td><input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" readonly=""></td>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="1" cellspacing="0" class="table table-border">
                                <tbody>
                                    <tr>
                                        <td colspan="7" align="center"><b><u>SHORT MEDICAL HISTORY</u></b></td>
                                    </tr>
                                    <tr>
                                        <td width="181" height="27"><b>ORAL HYGIENE </b></td>
                                        <td colspan="2"><input name="hygiene" type="radio" id="radio" value="Good" @php
                                                echo $exam->hygiene == 'Good' ? "checked" : "" @endphp>
                                            Good</td>
                                        <td width="134"><input name="hygiene" type="radio" id="radio2" value="Fair" @php
                                                echo $exam->hygiene == 'Fair' ? "checked" : "" @endphp>
                                            Fair </td>
                                        <td width="342" colspan="3"><input name="hygiene" type="radio" id="radio3"
                                                value="Bad" @php echo $exam->hygiene == 'Bad' ? "checked" : "" @endphp>
                                            Bad </td>
                                    </tr>
                                    <tr>
                                        <td height="29"><b>GINGIVA CONSISTENCY</b></td>
                                        <td colspan="2"><input name="gingiva" type="radio" id="radio4" value="Firm" @php
                                                echo $exam->gingiva == 'Firm' ? "checked" : "" @endphp>
                                            Firm</td>
                                        <td><input name="gingiva" type="radio" id="radio5" value="Hyper Plastic" @php
                                                echo $exam->gingiva == 'Hyper Plastic' ? "checked" : "" @endphp>
                                            Hyper Plastic </td>
                                        <td colspan="3"><input name="gingiva" type="radio" id="radio6" value="Smooth" @php echo $exam->gingiva == 'Smooth' ? "checked" : "" @endphp>
                                            Smooth </td>
                                    </tr>
                                    <tr>
                                        <td height="27"><b>COLOR</b></td>
                                        <td colspan="2"><input name="color" type="radio" id="radio7" value="Pink" @php
                                                echo $exam->color == 'Pink' ? "checked" : "" @endphp>
                                            Pink</td>
                                        <td><input name="color" type="radio" id="radio8" value="Bright Red" @php echo
                                                $exam->color == 'Bright Red' ? "checked" : "" @endphp>
                                            Bright Red </td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="27"><b>TONGUE</b></td>
                                        <td colspan="2"><input name="tongue" type="radio" id="radio9" value="Normal" @php echo $exam->tongue == 'Normal' ? "checked" : "" @endphp>
                                            Normal</td>
                                        <td><input name="tongue" type="radio" id="radio10" value="Coated" @php echo
                                                $exam->tongue == 'Coated' ? "checked" : "" @endphp>
                                            Coated </td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row m-1 shadow-sm p-50">
                                <div class="col-md-6 " style="color: blue;">
                                    <h5>BLUE INK - Shade location of the restoration</h5>
                                    <div class="row">
                                        <button type="button" onclick="changeLegend('PJC', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">PJC - Plastic/Porcelain Jacket Crown</button>
                                        <button type="button" onclick="changeLegend('MC', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">MC - Metal Crown</button>
                                        <button type="button" onclick="changeLegend('Se', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Se -  Sealant</button>
                                        <button type="button" onclick="changeLegend('GIC', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">GIC - Glass Ionomer</button>
                                        <button type="button" onclick="changeLegend('3/4 Cr', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">3/4 Cr - Three Quarter Crown</button>
                                        <button type="button" onclick="changeLegend('In', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">In - Inlay</button>
                                        <button type="button" onclick="changeLegend('On', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">On	 - Onlay</button>
                                        <button type="button" onclick="changeLegend('Abt', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Abt - Abutment</button>
                                        <button type="button" onclick="changeLegend('GC', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">GC - Gold Crown</button>
                                        <button type="button" onclick="changeLegend('', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Clear</button>
                                        <button type="button" onclick="changeLegend('Am', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Am - Amalgam Filling</button>
                                        <button type="button" onclick="changeLegend('CD', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">CD	 - Complete Denture</button>
                                        <button type="button" onclick="changeLegend('P', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">P - Pontic</button>
                                        <button type="button" onclick="changeLegend('Co', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">Co	- Composite</button>
                                        <button type="button" onclick="changeLegend('M', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-blue btn-darken-1  m-lg-50 m-sm-25">M	 - Missing</button>

                                    </div>
                                </div>
                                <div class="col-md-6 align-self-end" style="color: rgb(255, 0, 0);">
                                    <h5>RED INK - Shade location of abnormality</h5>
                                    <div class="row align-items-end">
                                        <div clas="col">
                                            <button type="button" onclick="changeLegend('C', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">C - Carries/Cavity</button>
                                            <button type="button" onclick="changeLegend('TF', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">TF	-  Temporary Filling</button>
                                            <button type="button" onclick="changeLegend('X', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">X - For extraction</button>
                                            <button type="button" onclick="changeLegend('RF', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">RF - Root Fragments</button>
                                            <button type="button" onclick="changeLegend('UN', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">UN - Unerupted</button>
                                            <button type="button" onclick="changeLegend('Ab', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">Ab -  Abrasion</button>
                                           <button type="button" onclick="changeLegend('Imp', this)" class="dental-btn col-md-5 btn btn-sm p-75 font-bold btn-outline-danger btn-darken-2  m-lg-50 m-sm-25">Imp -  Impacted</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right my-1">
                                <button class="btn btn-solid btn-primary" type="button" onclick="unCheckUpper()">Upper CD</button>
                                <button class="btn btn-solid btn-primary" type="button" onclick="unCheckLower()">Lower CD</button>
                            </div>
                            <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0"
                                style="font-size: 10px;" class="my-2" class="table">
                                <tbody>
                                    <tr>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition18')" class="upper-input" name="tooth18" type="text" id="tooth18"
                                                value="{{ $exam->tooth18 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition17')" class="upper-input" name="tooth17" type="text" id="tooth17"
                                                value="{{ $exam->tooth17 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition16')" class="upper-input" name="tooth16" type="text" id="tooth16"
                                                value="{{ $exam->tooth16 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition15')" class="upper-input" name="tooth15" type="text" id="tooth15"
                                                value="{{ $exam->tooth15 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition14')" class="upper-input" name="tooth14" type="text" id="tooth14"
                                                value="{{ $exam->tooth14 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition13')" class="upper-input" name="tooth13" type="text" id="tooth13"
                                                value="{{ $exam->tooth13 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition12')" class="upper-input" name="tooth12" type="text" id="tooth12"
                                                value="{{ $exam->tooth12 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition11')" class="upper-input" name="tooth11" type="text" id="tooth11"
                                                value="{{ $exam->tooth11 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition21')" class="upper-input" name="tooth21" type="text" id="tooth21"
                                                value="{{ $exam->tooth21 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition22')" class="upper-input" name="tooth22" type="text" id="tooth22"
                                                value="{{ $exam->tooth22 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition23')" class="upper-input" name="tooth23" type="text" id="tooth23"
                                                value="{{ $exam->tooth23 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition24')" class="upper-input" name="tooth24" type="text" id="tooth24"
                                                value="{{ $exam->tooth24 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition25')" class="upper-input" name="tooth25" type="text" id="tooth25"
                                                value="{{ $exam->tooth25 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition26')" class="upper-input" name="tooth26" type="text" id="tooth21"
                                                value="{{ $exam->tooth26 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition27')" class="upper-input" name="tooth27" type="text" id="tooth21"
                                                value="{{ $exam->tooth27 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition28')" class="upper-input" name="tooth28" type="text" id="tooth21"
                                                value="{{ $exam->tooth28 }}" style="width: 40px; font-size: 12px; font-weight: 600;"></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno18.jpg" width="26"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno17.jpg" width="29"
                                                height="120" alt=""></td>
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
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno11.jpg" width="33"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno21.jpg" width="24"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno22.jpg" width="32"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno23.jpg" width="29"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno24.jpg" width="29"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno25.jpg" width="32"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno26.jpg" width="26"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno27.jpg" width="30"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno28.jpg" width="32"
                                                height="120" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle"> 18
                                            <input class="upper" name="dentition18" type="checkbox" id="dentition18"
                                                value="dentition18" @php echo $exam->dentition18 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle"> 17
                                            <input class="upper" name="dentition17" type="checkbox" id="dentition17"
                                                value="dentition17" @php echo $exam->dentition17 != "" ? "checked=''" :
                                            "" @endphp >
                                        </td>
                                        <td align="center" valign="middle">16
                                            <input class="upper" name="dentition16" type="checkbox" id="dentition16"
                                                value="dentition16" @php echo $exam->dentition16 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">15
                                            <input class="upper" name="dentition15" type="checkbox" id="dentition15"
                                                value="dentition15" @php echo $exam->dentition15 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">14
                                            <input class="upper" name="dentition14" type="checkbox" id="dentition14"
                                                value="dentition14" @php echo $exam->dentition14 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">13
                                            <input class="upper" name="dentition13" type="checkbox" id="dentition13"
                                                value="dentition13" @php echo $exam->dentition13 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">12
                                            <input class="upper" name="dentition12" type="checkbox" id="dentition12"
                                                value="dentition12" @php echo $exam->dentition12 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">11
                                            <input class="upper" name="dentition11" type="checkbox" id="dentition11"
                                                value="dentition11" @php echo $exam->dentition11 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">21
                                            <input class="upper" name="dentition21" type="checkbox" id="dentition21"
                                                value="dentition21" @php echo $exam->dentition21 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">22
                                            <input class="upper" name="dentition22" type="checkbox" id="dentition22"
                                                value="dentition22" @php echo $exam->dentition22 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">23
                                            <input class="upper" name="dentition23" type="checkbox" id="dentition23"
                                                value="dentition23" @php echo $exam->dentition23 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">24
                                            <input class="upper" name="dentition24" type="checkbox" id="dentition24"
                                                value="dentition24" @php echo $exam->dentition24 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">25
                                            <input class="upper" name="dentition25" type="checkbox" id="dentition25"
                                                value="dentition25" @php echo $exam->dentition25 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">26
                                            <input class="upper" name="dentition26" type="checkbox" id="dentition26"
                                                value="dentition26" @php echo $exam->dentition26 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">27
                                            <input class="upper" name="dentition27" type="checkbox" id="dentition27"
                                                value="dentition27" @php echo $exam->dentition27 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">28
                                            <input class="upper" name="dentition28" type="checkbox" id="dentition28"
                                                value="dentition28" @php echo $exam->dentition28 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle"> 48
                                            <input class="lower" name="dentition48" type="checkbox" id="dentition48"
                                                value="dentition48" @php echo $exam->dentition48 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">47
                                            <input class="lower" name="dentition47" type="checkbox" id="dentition47"
                                                value="dentition47" @php echo $exam->dentition47 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">46
                                            <input class="lower" name="dentition46" type="checkbox" id="dentition46"
                                                value="dentition46" @php echo $exam->dentition46 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">45
                                            <input class="lower" name="dentition45" type="checkbox" id="dentition45"
                                                value="dentition45" @php echo $exam->dentition45 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">44
                                            <input class="lower" name="dentition44" type="checkbox" id="dentition44"
                                                value="dentition44" @php echo $exam->dentition44 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">43
                                            <input class="lower" name="dentition43" type="checkbox" id="dentition43"
                                                value="dentition43" @php echo $exam->dentition43 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">42
                                            <input class="lower" name="dentition42" type="checkbox" id="dentition42"
                                                value="dentition42" @php echo $exam->dentition42 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">41
                                            <input class="lower" name="dentition41" type="checkbox" id="dentition41"
                                                value="dentition41" @php echo $exam->dentition41 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">31
                                            <input class="lower" name="dentition31" type="checkbox" id="dentition31"
                                                value="dentition31" @php echo $exam->dentition31 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">32
                                            <input class="lower" name="dentition32" type="checkbox" id="dentition32"
                                                value="dentition32" @php echo $exam->dentition32 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">33
                                            <input class="lower" name="dentition33" type="checkbox" id="dentition33"
                                                value="dentition33" @php echo $exam->dentition33 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">34
                                            <input class="lower" name="dentition34" type="checkbox" id="dentition34"
                                                value="dentition34" @php echo $exam->dentition34 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">35
                                            <input class="lower" name="dentition35" type="checkbox" id="dentition35"
                                                value="dentition35" @php echo $exam->dentition35 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">36
                                            <input class="lower" name="dentition36" type="checkbox" id="dentition36"
                                                value="dentition36" @php echo $exam->dentition36 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">37
                                            <input class="lower" name="dentition37" type="checkbox" id="dentition37"
                                                value="dentition37" @php echo $exam->dentition37 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                        <td align="center" valign="middle">38
                                            <input class="lower" name="dentition38" type="checkbox" id="dentition38"
                                                value="dentition38" @php echo $exam->dentition38 != "" ? "checked=''" :
                                            "" @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno48.jpg" width="33"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno47.jpg" width="30"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno46.jpg" width="33"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno45.jpg" width="28"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno44.jpg" width="32"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno43.jpg" width="30"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno42.jpg" width="24"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno41.jpg" width="31"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno31.jpg" width="28"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno32.jpg" width="33"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno33.jpg" width="31"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno34.jpg" width="30"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno35.jpg" width="33"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno36.jpg" width="27"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno37.jpg" width="29"
                                                height="120" alt=""></td>
                                        <td align="center" valign="top"><img
                                                src="../../../app-assets/images/dental/tno38.jpg" width="34"
                                                height="120" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition48')" class="lower-input" name="tooth48" type="text" id="tooth21"
                                                value="{{ $exam->tooth48 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition47')" class="lower-input" name="tooth47" type="text" id="tooth21"
                                                value="{{ $exam->tooth47 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition46')" class="lower-input" name="tooth46" type="text" id="tooth21"
                                                value="{{ $exam->tooth46 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition45')" class="lower-input" name="tooth45" type="text" id="tooth21"
                                                value="{{ $exam->tooth45 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition44')" class="lower-input" name="tooth44" type="text" id="tooth21"
                                                value="{{ $exam->tooth44 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition43')" class="lower-input" name="tooth43" type="text" id="tooth21"
                                                value="{{ $exam->tooth43 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition42')" class="lower-input" name="tooth42" type="text" id="tooth21"
                                                value="{{ $exam->tooth42 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition41')" class="lower-input" name="tooth41" type="text" id="tooth21"
                                                value="{{ $exam->tooth41 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition31')" class="lower-input" name="tooth31" type="text" id="tooth21"
                                                value="{{ $exam->tooth31 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition32')" class="lower-input" name="tooth32" type="text" id="tooth21"
                                                value="{{ $exam->tooth32 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition33')" class="lower-input" name="tooth33" type="text" id="tooth21"
                                                value="{{ $exam->tooth33 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition34')" class="lower-input" name="tooth34" type="text" id="tooth21"
                                                value="{{ $exam->tooth34 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition35')" class="lower-input" name="tooth35" type="text" id="tooth21"
                                                value="{{ $exam->tooth35 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition36')" class="lower-input" name="tooth36" type="text" id="tooth21"
                                                value="{{ $exam->tooth36 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition37')" class="lower-input" name="tooth37" type="text" id="tooth21"
                                                value="{{ $exam->tooth37 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                        <td align="center"><input readonly onfocus="makeInput(this, 'dentition38')" class="lower-input" name="tooth38" type="text" id="tooth21"
                                                value="{{ $exam->tooth38 }}" style="width: 30px; font-size: 12px; font-weight: 600;"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="myRepeatingFields" class="m-2">
                                @if(count($dental_services) > 0)
                                    @foreach($dental_services as $dental_service)
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
                                                                <input type="date" name="dates[]" id="" value="{{$dental_service->date}}" class="form-control">
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="services[]">
                                                                    <option {{$dental_service->service == 'OP' ? 'selected' : null}} value="OP">OP</option>
                                                                    <option {{$dental_service->service == 'restoration' ? 'selected' : null}} value="restoration">restoration</option>
                                                                    <option {{$dental_service->service == 'extraction' ? 'selected' : null}} value="extraction">extraction</option>
                                                                    <option {{$dental_service->service == 'RCT' ? 'selected' : null}} value="RCT">RCT</option>
                                                                    <option {{$dental_service->service == 'denture' ? 'selected' : null}} value="denture">denture</option>
                                                                    <option {{$dental_service->service == 'crown' ? 'selected' : null}} value="crown">crown</option>
                                                                    <option {{$dental_service->service == 'X-Ray' ? 'selected' : null}} value="X-Ray">X-Ray</option>
                                                                    <option {{$dental_service->service == 'Temporary Restoration' ? 'selected' : null}} value="Temporary Restoration">Temporary Restoration</option>
                                                                    <option {{$dental_service->service == 'Cementation' ? 'selected' : null}} value="Cementation">Cementation</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" value="{{$dental_service->teeth}}" name="teeth[]">
                                                            </td>
                                                            <td>
                                                                <span class="input-group-btn">
                                                                    <button type="button"
                                                                        class="btn btn-success btn-add">
                                                                        <span class="fa fa-plus"
                                                                            aria-hidden="true"></span>
                                                                    </button>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
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
                                                            <input type="date" name="dates[]" id="" class="form-control">
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
                                                                <option value="Temporary Restoration">Temporary Restoration</option>
                                                                <option value="Cementation">Cementation</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="teeth[]">
                                                        </td>
                                                        <td>
                                                            <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-success btn-add">
                                                                    <span class="fa fa-plus"
                                                                        aria-hidden="true"></span>
                                                                </button>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
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
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal" {{ $exam->remarks_status == "normal" ? 'checked' : null }}>Normal
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" {{ $exam->remarks_status == "findings" ? 'checked' : null }}>With Findings
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Findings</label>
                                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                                    id="" cols="30" rows="6">{{ $exam->remarks }}</textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                                    id="" cols="30" rows="6">{{ $exam->recommendation }}</textarea>
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
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($dentists as $dentist)
                                                                    <option value={{$dentist->id}}>{{$dentist->firstname}}  {{$dentist->lastname}}</option>
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
                        </form>
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
