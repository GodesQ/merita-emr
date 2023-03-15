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
                                <h3>Add Blood Serology</h3>
                                <a href="patient_edit?id={{ $admission->patient_id }}&patientcode={{ $admission->patientcode }}"
                                    class="float-right btn btn-primary">Back to Patient</a>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/store_bloodsero" role="form">
                                @if (Session::get('status'))
                                    <div class="success alert-success p-2 my-2">
                                        {{ Session::get('status') }}
                                    </div>
                                @endif
                                @csrf
                                <input required type="hidden" name="admission_id" value="{{ $admission->id }}">
                                <input type="hidden" name="patient_id" value="{{ $admission->patient_id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
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
                                            <td><input required name="trans_date" type="text" id="trans_date"
                                                    value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly=""></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>Patient</b></td>
                                            <td>
                                                <input required name="patientname" id="patientname" type="text"
                                                    value="{{ $admission->lastname . ', ' . $admission->firstname }}"
                                                    class="form-control" readonly="">
                                            </td>
                                            <td><b>Patient Code</b></td>
                                            <td><input required name="patientcode" id="patientcode" type="text"
                                                    value="{{ $admission->patientcode }}" class="form-control"
                                                    readonly="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                    class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <h4><b>BLOOD CHEMISTRY</b></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>EXAMINATION</b></td>
                                            <td> <b>RESULTS</b></td>
                                            <td><b>NORMAL VALUE</b></td>
                                            <td width="40%"><b>FINDINGS</b></td>
                                            <td width="40%"><b>RECOMMENDATIONS</b></td>
                                        </tr>
                                        <tr>
                                            <td>HBA1C</td>
                                            <td>
                                                <input oninput="getBloodRemarks(this, 'HBA1C', '4.0', '6.4')" name="hba1c"
                                                    type="text" class="form-control" id="hba1c" value="">
                                            </td>
                                            <td class="">4.0-6.4%</td>
                                            <td><input name="hba1c_findings" type="text" class="form-control"
                                                    style="width:350px" id="hba1c_findings" value=""></td>
                                            <td><input name="hba1c_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="hba1c_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>2hrs. PPBG</td>
                                            <td>
                                                <input oninput="getBloodRemarks(this, 'PPBG', '', '200')" name="ppbg"
                                                    type="text" class="form-control" id="ppbg" value="">
                                            </td>
                                            <td class=""> &lt; 200 mg/dL</td>
                                            <td><input name="ppbg_findings" type="text" class="form-control"
                                                    style="width:350px" id="ppbg_findings" value=""></td>
                                            <td><input name="ppbg_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="ppbg_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>FBS</td>
                                            <td>
                                                <input name="fbs" oninput="getBloodRemarks(this, 'FBS', '70', '110')"
                                                    type="text" class="form-control" id="fbs" value="">
                                            </td>
                                            <td class=""> 70-110 mg/dL </td>
                                            <td><input name="fbs_findings" type="text" class="form-control"
                                                    style="width:350px" id="fbs_findings" value=""></td>
                                            <td><input name="fbs_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="fbs_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>BUN</td>
                                            <td>
                                                <input name="bun" oninput="getBloodRemarks(this, 'BUN', '5', '20')"
                                                    type="text" class="form-control" id="bun" value="">
                                            </td>
                                            <td class=""> 5-20 mg/dL </td>
                                            <td><input name="bun_findings" type="text" class="form-control"
                                                    style="width:350px" id="bun_findings" value=""></td>
                                            <td><input name="bun_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="bun_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>CREATININE</td>
                                            <td>
                                                <input name="creatinine" type="text"
                                                    oninput="getBloodRemarks(this, 'CREATININE', '0.8', '1.2')"
                                                    class="form-control" id="creatinine" value="">
                                            </td>
                                            <td class=""> 0.8-1.2 mg/dL </td>
                                            <td><input name="creatinine_findings" type="text" class="form-control"
                                                    style="width:350px" id="creatinine_findings" value=""></td>
                                            <td><input name="creatinine_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="creatinine_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>CHOLESTEROL</td>
                                            <td>
                                                <input name="cholesterol" type="text"
                                                    oninput="getBloodRemarks(this, 'CHOLESTEROL', '125', '200')"
                                                    class="form-control" id="cholesterol" value="">
                                            </td>
                                            <td class=""> 125-200 mg/dL </td>
                                            <td><input name="cholesterol_findings" type="text" class="form-control"
                                                    style="width:350px" id="cholesterol_findings" value=""></td>
                                            <td><input name="cholesterol_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="cholesterol_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>TRIGLYCERIDES</td>
                                            <td>
                                                <input name="triglycerides" type="text"
                                                    oninput="getBloodRemarks(this, 'TRIGLYCERIDES', '35', '160')"
                                                    class="form-control" id="triglycerides" value="">
                                            </td>
                                            <td class=""> M:40-160 F:35-130 </td>
                                            <td><input name="triglycerides_findings" type="text" class="form-control"
                                                    style="width:350px" id="triglycerides_findings" value=""></td>
                                            <td><input name="triglycerides_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="triglycerides_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>HDL Chole</td>
                                            <td>
                                                <input name="hdl" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'HDL Chole', '40', '')" id="hdl"
                                                    value="">
                                            </td>
                                            <td class=""> &gt;40 mg/dL </td>
                                            <td><input name="hdl_findings" type="text" class="form-control"
                                                    style="width:350px" id="hdl_findings" value=""></td>
                                            <td><input name="hdl_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="hdl_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>LDL Chole</td>
                                            <td>
                                                <input name="ldl" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'LDL Chole', '', '100')" id="ldl"
                                                    value="">
                                            </td>
                                            <td class=""> &lt;100 mg/dL </td>
                                            <td><input name="ldl_findings" type="text" class="form-control"
                                                    style="width:350px" id="ldl_findings" value=""></td>
                                            <td><input name="ldl_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="ldl_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>VLDL Chole</td>
                                            <td>
                                                <input name="vldl" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'VLDL Chole', '7', '32')"
                                                    id="vldl" value="">
                                            </td>
                                            <td class=""> M:8-32 F:7-26 </td>
                                            <td><input name="vldl_findings" type="text" class="form-control"
                                                    style="width:350px" id="vldl_findings" value=""></td>
                                            <td><input name="vldl_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="vldl_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>URIC ACID</td>
                                            <td>
                                                <input name="uricacid" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'URIC ACID', '140', '430')"
                                                    id="uricacid" value="">
                                            </td>
                                            <td class=""> 140-430 umol/L </td>
                                            <td><input name="uricacid_findings" type="text" class="form-control"
                                                    style="width:350px" id="uricacid_findings" value=""></td>
                                            <td><input name="uricacid_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="uricacid_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>SGOT (AST)</td>
                                            <td>
                                                <input name="sgot" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'SGOT', '0', '40')" id="sgot"
                                                    value="">
                                            </td>
                                            <td class=""> 0-40 u/L </td>
                                            <td><input name="sgot_findings" type="text" class="form-control"
                                                    style="width:350px" id="sgot_findings" value=""></td>
                                            <td><input name="sgot_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="sgot_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>SGPT (ALT)</td>
                                            <td>
                                                <input name="sgpt" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'SGPT', '0', '41')" id="sgpt"
                                                    value="">
                                            </td>
                                            <td class="">0-41 u/L</td>
                                            <td><input name="sgpt_findings" type="text" class="form-control"
                                                    style="width:350px" id="sgpt_findings" value=""></td>
                                            <td><input name="sgpt_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="sgpt_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>GGT</td>
                                            <td>
                                                <input name="ggt" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'GGT', '0', '55')" id="ggt"
                                                    value="">
                                            </td>
                                            <td class=""> 0-55 u/L </td>
                                            <td><input name="ggt_findings" type="text" class="form-control"
                                                    style="width:350px" id="ggt_findings" value=""></td>
                                            <td><input name="ggt_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="ggt_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>ALK. PHOS.</td>
                                            <td>
                                                <input name="alkphos" type="text" class="form-control"
                                                    oninput="getBloodRemarks(this, 'ALK. PHOS.', '35', '129')"
                                                    id="alkphos" value="">
                                            </td>
                                            <td class=""> 35-129 u/L </td>
                                            <td><input name="alkphos_findings" type="text" class="form-control"
                                                    style="width:350px" id="alkphos_findings" value=""></td>
                                            <td><input name="alkphos_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="alkphos_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL BILIRUBIN</td>
                                            <td>
                                                <input name="ttlbilirubin" type="text" class="form-control"
                                                    id="ttlbilirubin" value=""
                                                    oninput="getBloodRemarks(this, 'TOTAL BILIRUBIN', '5', '21')">
                                            </td>
                                            <td class="">5-21 umol/L</td>
                                            <td><input name="ttlbilirubin_findings" type="text" class="form-control"
                                                    style="width:350px" id="ttlbilirubin_findings" value=""></td>
                                            <td><input name="ttlbilirubin_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="ttlbilirubin_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>DIRECT BILIRUBIN</td>
                                            <td>
                                                <input name="dirbilirubin" type="text" class="form-control"
                                                    id="dirbilirubin" value=""
                                                    oninput="getBloodRemarks(this, 'DIRECT BILIRUBIN', '0', '5.1')">
                                            </td>
                                            <td class=""> 0-5.1 umol/L </td>
                                            <td><input name="dirbilirubin_findings" type="text" class="form-control"
                                                    style="width:350px" id="dirbilirubin_findings" value=""></td>
                                            <td><input name="dirbilirubin_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="dirbilirubin_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>INDIRECT BILIRUBIN</td>
                                            <td>
                                                <input name="indbilirubin" type="text" class="form-control"
                                                    id="indbilirubin" value=""
                                                    oninput="getBloodRemarks(this, 'INDIRECT BILIRUBIN', '0', '16')">
                                            </td>
                                            <td class=""> 0-16 umol/L </td>
                                            <td><input name="indbilirubin_findings" type="text" class="form-control"
                                                    style="width:350px" id="indbilirubin_findings" value=""></td>
                                            <td><input name="indbilirubin_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="indbilirubin_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL PROTEIN</td>
                                            <td>
                                                <input name="ttlprotein" type="text" class="form-control"
                                                    id="ttlprotein"
                                                    oninput="getBloodRemarks(this, 'TOTAL PROTEIN', '66', '87')"
                                                    value="">
                                            </td>
                                            <td class=""> 66-87 g/L </td>
                                            <td><input name="ttlprotein_findings" type="text" class="form-control"
                                                    style="width:350px" id="ttlprotein_findings" value=""></td>
                                            <td><input name="ttlprotein_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="ttlprotein_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td width="24%">ALBUMIN</td>
                                            <td>
                                                <input name="albumin" type="text" class="form-control" id="albumin"
                                                    oninput="getBloodRemarks(this, 'ALBUMIN', '35', '52')" value="">
                                            </td>
                                            <td width="50%" class=""> 35-52 g/L </td>
                                            <td><input name="albumin_findings" type="text" class="form-control"
                                                    style="width:350px" id="albumin_findings" value=""></td>
                                            <td><input name="albumin_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="albumin_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>GLOBULIN</td>
                                            <td>
                                                <input name="globulin" type="text" class="form-control"
                                                    id="globulin" oninput="getBloodRemarks(this, 'GLOBULIN', '31', '35')"
                                                    value="">
                                            </td>
                                            <td class=""> 31-35 g/L </td>
                                            <td><input name="globulin_findings" type="text" class="form-control"
                                                    style="width:350px" id="globulin_findings" value=""></td>
                                            <td><input name="globulin_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="globulin_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>SODIUM</td>
                                            <td>
                                                <input name="sodium" type="text" class="form-control" id="sodium"
                                                    value=""
                                                    oninput="getBloodRemarks(this, 'SODIUM', '135', '148')">
                                            </td>
                                            <td class="">135.0-148 mmol/L</td>
                                            <td><input name="sodium_findings" type="text" class="form-control"
                                                    style="width:350px" id="sodium_findings" value=""></td>
                                            <td><input name="sodium_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="sodium_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>POTASSIUM</td>
                                            <td>
                                                <input name="potassium" type="text" class="form-control"
                                                    id="potassium"
                                                    oninput="getBloodRemarks(this, 'POTASSIUM', '3.5', '5.3')"
                                                    value="">
                                            </td>
                                            <td class="">3.5-5.3 mmol/L</td>
                                            <td><input name="potassium_findings" type="text" class="form-control"
                                                    style="width:350px" id="potassium_findings" value=""></td>
                                            <td><input name="potassium_recommendation" type="text"
                                                    class="form-control" style="width:350px"
                                                    id="potassium_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>CHLORIDE</td>
                                            <td>
                                                <input name="chloride" type="text" class="form-control"
                                                    id="chloride"
                                                    oninput="getBloodRemarks(this, 'CHLORIDE', '96', '108')"
                                                    value="">
                                            </td>
                                            <td class="">96.0-108 mmol/L</td>
                                            <td><input name="chloride_findings" type="text" class="form-control"
                                                    style="width:350px" id="chloride_findings" value=""></td>
                                            <td><input name="chloride_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="chloride_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>CALCIUM</td>
                                            <td>
                                                <input name="calcium" type="text" class="form-control" id="calcium"
                                                    oninput="getBloodRemarks(this, 'CALCIUM', '2.10', '2.90')"
                                                    value="">
                                            </td>
                                            <td class="">2.10-2.90 mmol/L</td>
                                            <td><input name="calcium_findings" type="text" class="form-control"
                                                    style="width:350px" id="calcium_findings" value=""></td>
                                            <td><input name="calcium_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="calcium_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>A/G RATIO</td>
                                            <td>
                                                <input name="ag_ratio" type="text" class="form-control"
                                                    id="ag_ratio"
                                                    oninput="getBloodRemarks(this, 'AG RATIO', '0.6', '1.7')"
                                                    value="">
                                            </td>
                                            <td class="">1: 0.6-1.7</td>
                                            <td><input name="ag_ratio_findings" type="text" class="form-control"
                                                    style="width:350px" id="ag_ratio_findings" value=""></td>
                                            <td><input name="ag_ratio_recommendation" type="text" class="form-control"
                                                    style="width:350px" id="ag_ratio_recommendation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="brdAll">OTHERS:
                                                <input name="others" type="text" class="form-control" id="others"
                                                    value="">
                                            </td>
                                            <td valign="bottom">
                                                <input name="others_result" type="text" class="form-control"
                                                    id="others_result" value="">
                                            </td>
                                            <td valign="bottom">
                                                <input name="others_nv" type="text" class="form-control"
                                                    style="width:200px" id="others_nv" value="">
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
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1"
                                                        id="remarks_status_0" value="normal">Normal
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1"
                                                        id="remarks_status_1" value="findings">With Findings
                                                </div>
                                                <div class="form-group">
                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="remarks" cols="30" rows="6"></textarea>
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
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="23%"><b>Medical Technologist: </b></td>
                                                            <td width="77%">
                                                                <div class="col-md-8">
                                                                    <select name="technician_id" id="technician_id"
                                                                        class="form-control">
                                                                        @foreach ($medical_techs as $med_tech)
                                                                            <option value={{ $med_tech->id }}
                                                                                {{ $med_tech->id == '55' ? 'selected' : null }}>
                                                                                {{ $med_tech->firstname }}
                                                                                {{ $med_tech->lastname }},
                                                                                {{ $med_tech->title }}</option>
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
                                                                        @foreach ($pathologists as $pathologist)
                                                                            <option value={{ $pathologist->id }}
                                                                                {{ $pathologist->id == '55' ? 'selected' : null }}>
                                                                                {{ $pathologist->firstname }}
                                                                                {{ $pathologist->lastname }},
                                                                                {{ $pathologist->title }}</option>
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
@endsection
@push('scripts')
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
    <script>
        let past_value = '';
        let past_status = '';

        function getBloodRemarks(e, message, minNumber, maxNumber) {
            let remarks = document.querySelector('#remarks').value;
            if (e.value == "") {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
            } else if (e.value < parseFloat(minNumber)) {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} L\n`;
                past_status = "L";
                past_value = e.value;
            } else if (e.value > parseFloat(maxNumber)) {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} H\n`;
                past_status = "H";
                past_value = e.value;
            } else {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
            }
        }

        let pass_sero_value = '';

        function getSerologyRemarks(title, e) {
            let remarks = document.querySelector('#remarks').value;
            if (e.value == "Reactive" || e.value == "Positive") {
                document.getElementById("remarks").innerHTML += `${title} - ${e.value}\n`;
                pass_sero_value = e.value;
            } else {
                var find = `${title} - ${pass_sero_value}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
            }
        }
    </script>
@endpush
