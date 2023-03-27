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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Edit Blood Serology</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="patient_edit?id={{ $exam->admission->patient->id }}&patientcode={{ $exam->admission->patientcode }}"
                                            class="btn btn-primary">Back to Patient</a>
                                        <button
                                            onclick='window.open("/examlab_bloodsero_print?id={{ $exam->admission_id }}&type=both", "width=800,height=650").print()'
                                            class="btn btn-dark btn-solid" title="Print">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/update_bloodsero" role="form">
                                @if (Session::get('status'))
                                    @push('scripts')
                                        <script>
                                            let toaster = toastr.success('{{ Session::get('status') }}', 'Success');
                                        </script>
                                    @endpush
                                @endif
                                @csrf
                                <input type="hidden" name="id" value="{{ $exam->id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
                                                value="{{ $exam->admission->trans_date ? $exam->admission->trans_date : null }}"
                                                class="form-control" readonly />
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control input-sm pull-left" placeholder="Admission No."
                                                    readonly />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control" readonly /></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $exam->admission->patient->lastname . ', ' . $exam->admission->patient->firstname }}"
                                                class="form-control" readonly />
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->admission->patientcode }}" class="form-control" readonly /></td>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td colspan="3">
                                            <h4><b>BLOOD CHEMISTRY</b></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="24%"><b>EXAMINATION</b></td>
                                        <td width="26%"> <b>RESULTS</b></td>
                                        <td width="50%"><b>NORMAL VALUE</b></td>
                                        <td width="50%"><b>FINDINGS</b></td>
                                        <td width="50%"><b>RECOMMENDATION</b></td>
                                    </tr>
                                    <tr>
                                        <td>HBA1C</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'HBA1C', '4.0', '6.4', '{{ $exam->hba1c }}')"
                                                name="hba1c" type="text" class="form-control" id="hba1c"
                                                value="{{ $exam->hba1c }}" />
                                        </td>
                                        <td class="">4.0-6.4%</td>
                                        <td><input name="hba1c_findings" type="text" class="form-control"
                                                style="width:350px" id="hba1c_findings"
                                                value="{{ $exam->hba1c_findings }}"></td>
                                        <td><input name="hba1c_recommendation" type="text" class="form-control"
                                                style="width:350px" id="hba1c_recommendation"
                                                value="{{ $exam->hba1c_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>2hrs. PPBG</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'PPBG', '', '200', '{{ $exam->hba1c }}')"
                                                name="ppbg" type="text" class="form-control" id="ppbg"
                                                value="{{ $exam->ppbg }}">
                                        </td>
                                        <td class=""> &lt; 200 mg/dL</td>
                                        <td><input name="ppbg_findings" type="text" class="form-control"
                                                style="width:350px" id="ppbg_findings"
                                                value="{{ $exam->ppbg_findings }}"></td>
                                        <td><input name="ppbg_recommendation" type="text" class="form-control"
                                                style="width:350px" id="ppbg_recommendation"
                                                value="{{ $exam->ppbg_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>FBS</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'FBS', '70', '110', '{{ $exam->fbs }}')"
                                                name="fbs" type="text" class="form-control" id="fbs"
                                                value="{{ $exam->fbs }}" />
                                        </td>
                                        <td class=""> 70-110 mg/dL </td>
                                        <td><input name="fbs_findings" type="text" class="form-control"
                                                style="width:350px" id="fbs_findings" value="{{ $exam->fbs_findings }}">
                                        </td>
                                        <td><input name="fbs_recommendation" type="text" class="form-control"
                                                style="width:350px" id="fbs_recommendation"
                                                value="{{ $exam->fbs_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>BUN</td>
                                        <td>
                                            <input oninput="getBloodRemarks(this, 'BUN', '5', '20','{{ $exam->bun }}')"
                                                name="bun" type="text" class="form-control" id="bun"
                                                value="{{ $exam->bun }}" />
                                        </td>
                                        <td class=""> 5-20 mg/dL </td>
                                        <td><input name="bun_findings" type="text" class="form-control"
                                                style="width:350px" id="bun_findings" value="{{ $exam->bun_findings }}">
                                        </td>
                                        <td><input name="bun_recommendation" type="text" class="form-control"
                                                style="width:350px" id="bun_recommendation"
                                                value="{{ $exam->bun_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>CREATININE</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'CREATININE', '0.8', '1.2', '{{ $exam->creatinine }}')"
                                                name="creatinine" type="text" class="form-control" id="creatinine"
                                                value="{{ $exam->creatinine }}" />
                                        </td>
                                        <td class=""> 0.8-1.2 mg/dL </td>
                                        <td><input name="creatinine_findings" type="text" class="form-control"
                                                style="width:350px" id="creatinine_findings"
                                                value="{{ $exam->creatinine_findings }}"></td>
                                        <td><input name="creatinine_recommendation" type="text" class="form-control"
                                                style="width:350px" id="creatinine_recommendation"
                                                value="{{ $exam->creatinine_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>CHOLESTEROL</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'CHOLESTEROL', '125', '200', '{{ $exam->cholesterol }}')"
                                                name="cholesterol" type="text" class="form-control" id="cholesterol"
                                                value="{{ $exam->cholesterol }}" />
                                        </td>
                                        <td class=""> 125-200 mg/dL </td>
                                        <td><input name="cholesterol_findings" type="text" class="form-control"
                                                style="width:350px" id="cholesterol_findings"
                                                value="{{ $exam->cholesterol_findings }}"></td>
                                        <td><input name="cholesterol_recommendation" type="text" class="form-control"
                                                style="width:350px" id="cholesterol_recommendation"
                                                value="{{ $exam->cholesterol_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>TRIGLYCERIDES</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'TRIGLYCERIDES', '35', '130', '{{ $exam->triglycerides }}')"
                                                name="triglycerides" type="text" class="form-control"
                                                id="triglycerides" value="{{ $exam->triglycerides }}" />
                                        </td>
                                        <td class=""> M:40-160 F:35-130 </td>
                                        <td><input name="triglycerides_findings" type="text" class="form-control"
                                                style="width:350px" id="triglycerides_findings"
                                                value="{{ $exam->triglycerides_findings }}"></td>
                                        <td><input name="triglycerides_recommendation" type="text"
                                                class="form-control" style="width:350px"
                                                id="triglycerides_recommendation"
                                                value="{{ $exam->triglycerides_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>HDL Chole</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'HDL Chole', '40', '', '{{ $exam->hdl }}')"
                                                name="hdl" type="text" class="form-control" id="hdl"
                                                value="{{ $exam->hdl }}" />
                                        </td>
                                        <td class=""> &gt;40 mg/dL </td>
                                        <td><input name="hdl_findings" type="text" class="form-control"
                                                style="width:350px" id="hdl_findings" value="{{ $exam->hdl_findings }}">
                                        </td>
                                        <td><input name="hdl_recommendation" type="text" class="form-control"
                                                style="width:350px" id="hdl_recommendation"
                                                value="{{ $exam->hdl_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>LDL Chole</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'HDL Chole', '', '100', '{{ $exam->ldl }}')"
                                                name="ldl" type="text" class="form-control" id="ldl"
                                                value="{{ $exam->ldl }}" />
                                        </td>
                                        <td class=""> &lt;100 mg/dL </td>
                                        <td><input name="ldl_findings" type="text" class="form-control"
                                                style="width:350px" id="ldl_findings" value="{{ $exam->ldl_findings }}">
                                        </td>
                                        <td><input name="ldl_recommendation" type="text" class="form-control"
                                                style="width:350px" id="ldl_recommendation"
                                                value="{{ $exam->ldl_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>VLDL Chole</td>
                                        <td>
                                            <input name="vldl" type="text" class="form-control" id="vldl"
                                                value="{{ $exam->vldl }}" />
                                        </td>
                                        <td class=""> M:8-32 F:7-26 </td>
                                        <td><input name="vldl_findings" type="text" class="form-control"
                                                style="width:350px" id="vldl_findings"
                                                value="{{ $exam->vldl_findings }}"></td>
                                        <td><input name="vldl_recommendation" type="text" class="form-control"
                                                style="width:350px" id="vldl_recommendation"
                                                value="{{ $exam->vldl_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>URIC ACID</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'URIC ACID', '140', '430', '{{ $exam->uricacid }}')"
                                                name="uricacid" type="text" class="form-control" id="uricacid"
                                                value="{{ $exam->uricacid }}" />
                                        </td>
                                        <td class=""> 140-430 umol/L </td>
                                        <td><input name="uricacid_findings" type="text" class="form-control"
                                                style="width:350px" id="uricacid_findings"
                                                value="{{ $exam->uricacid_findings }}"></td>
                                        <td><input name="uricacid_recommendation" type="text" class="form-control"
                                                style="width:350px" id="uricacid_recommendation"
                                                value="{{ $exam->uricacid_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>SGOT (AST)</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'SGOT', '0', '40', '{{ $exam->sgot }}')"
                                                name="sgot" type="text" class="form-control" id="sgot"
                                                value="{{ $exam->sgot }}" />
                                        </td>
                                        <td class=""> 0-40 u/L </td>
                                        <td><input name="sgot_findings" type="text" class="form-control"
                                                style="width:350px" id="sgot_findings"
                                                value="{{ $exam->sgot_findings }}"></td>
                                        <td><input name="sgot_recommendation" type="text" class="form-control"
                                                style="width:350px" id="sgot_recommendation"
                                                value="{{ $exam->sgot_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>SGPT (ALT)</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'SGPT', '0', '41', '{{ $exam->sgpt }}')"
                                                name="sgpt" type="text" class="form-control" id="sgpt"
                                                value="{{ $exam->sgpt }}" />
                                        </td>
                                        <td class="">0-41 u/L</td>
                                        <td><input name="sgpt_findings" type="text" class="form-control"
                                                style="width:350px" id="sgpt_findings"
                                                value="{{ $exam->sgpt_findings }}"></td>
                                        <td><input name="sgpt_recommendation" type="text" class="form-control"
                                                style="width:350px" id="sgpt_recommendation"
                                                value="{{ $exam->sgpt_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>GGT</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'GGT', '0', '55', '{{ $exam->ggt }}')"
                                                name="ggt" type="text" class="form-control" id="ggt"
                                                value="{{ $exam->ggt }}" />
                                        </td>
                                        <td class=""> 0-55 u/L </td>
                                        <td><input name="ggt_findings" type="text" class="form-control"
                                                style="width:350px" id="ggt_findings" value="{{ $exam->ggt_findings }}">
                                        </td>
                                        <td><input name="ggt_recommendation" type="text" class="form-control"
                                                style="width:350px" id="ggt_recommendation"
                                                value="{{ $exam->ggt_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>ALK. PHOS.</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'ALK. PHOS.', '35', '129', '{{ $exam->alkphos }}')"
                                                name="alkphos" type="text" class="form-control" id="alkphos"
                                                value="{{ $exam->alkphos }}" />
                                        </td>
                                        <td class=""> 35-129 u/L </td>
                                        <td><input name="alkphos_findings" type="text" class="form-control"
                                                style="width:350px" id="alkphos_findings"
                                                value="{{ $exam->alkphos_findings }}"></td>
                                        <td><input name="alkphos_recommendation" type="text" class="form-control"
                                                style="width:350px" id="alkphos_recommendation"
                                                value="{{ $exam->alkphos_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL BILIRUBIN</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'TOTAL BILIRUBIN', '5', '21', '{{ $exam->ttlbilirubin }}')"
                                                name="ttlbilirubin" type="text" class="form-control"
                                                id="ttlbilirubin" value="{{ $exam->ttlbilirubin }}" />
                                        </td>
                                        <td class="">5-21 umol/L</td>
                                        <td><input name="ttlbilirubin_findings" type="text" class="form-control"
                                                style="width:350px" id="ttlbilirubin_findings"
                                                value="{{ $exam->ttlbilirubin_findings }}"></td>
                                        <td><input name="ttlbilirubin_recommendation" type="text" class="form-control"
                                                style="width:350px" id="ttlbilirubin_recommendation"
                                                value="{{ $exam->ttlbilirubin_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>DIRECT BILIRUBIN</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'DIRECT BILIRUBIN', '0', '5.1', '{{ $exam->dirbilirubin }}')"
                                                name="dirbilirubin" type="text" class="form-control"
                                                id="dirbilirubin" value="{{ $exam->dirbilirubin }}" />
                                        </td>
                                        <td class=""> 0-5.1 umol/L </td>
                                        <td><input name="dirbilirubin_findings" type="text" class="form-control"
                                                style="width:350px" id="dirbilirubin_findings"
                                                value="{{ $exam->dirbilirubin_findings }}"></td>
                                        <td><input name="dirbilirubin_recommendation" type="text" class="form-control"
                                                style="width:350px" id="dirbilirubin_recommendation"
                                                value="{{ $exam->dirbilirubin_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>INDIRECT BILIRUBIN</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'INDIRECT BILIRUBIN', '0', '16', '{{ $exam->indbilirubin }}')"
                                                name="indbilirubin" type="text" class="form-control"
                                                id="indbilirubin" value="{{ $exam->indbilirubin }}" />
                                        </td>
                                        <td class=""> 0-16 umol/L </td>
                                        <td><input name="indbilirubin_findings" type="text" class="form-control"
                                                style="width:350px" id="indbilirubin_findings"
                                                value="{{ $exam->indbilirubin_findings }}"></td>
                                        <td><input name="indbilirubin_recommendation" type="text" class="form-control"
                                                style="width:350px" id="indbilirubin_recommendation"
                                                value="{{ $exam->indbilirubin_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL PROTEIN</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'TOTAL PROTEIN', '66', '87', '{{ $exam->ttlprotein }}')"
                                                name="ttlprotein" type="text" class="form-control" id="ttlprotein"
                                                value="{{ $exam->ttlprotein }}" />
                                        </td>
                                        <td class=""> 66-87 g/L </td>
                                        <td><input name="ttlprotein_findings" type="text" class="form-control"
                                                style="width:350px" id="ttlprotein_findings"
                                                value="{{ $exam->ttlprotein_findings }}"></td>
                                        <td><input name="ttlprotein_recommendation" type="text" class="form-control"
                                                style="width:350px" id="ttlprotein_recommendation"
                                                value="{{ $exam->ttlprotein_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="24%">ALBUMIN</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'ALBUMIN', '35', '52', '{{ $exam->albumin }}')"
                                                name="albumin" type="text" class="form-control" id="albumin"
                                                value="{{ $exam->albumin }}" />
                                        </td>
                                        <td width="50%" class=""> 35-52 g/L </td>
                                        <td><input name="albumin_findings" type="text" class="form-control"
                                                style="width:350px" id="albumin_findings"
                                                value="{{ $exam->albumin_findings }}"></td>
                                        <td><input name="albumin_recommendation" type="text" class="form-control"
                                                style="width:350px" id="albumin_recommendation"
                                                value="{{ $exam->albumin_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>GLOBULIN</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'GLOBULIN', '31', '35', '{{ $exam->globulin }}')"
                                                name="globulin" type="text" class="form-control" id="globulin"
                                                value="{{ $exam->globulin }}" />
                                        </td>
                                        <td class=""> 31-35 g/L </td>
                                        <td><input name="globulin_findings" type="text" class="form-control"
                                                style="width:350px" id="globulin_findings"
                                                value="{{ $exam->globulin_findings }}"></td>
                                        <td><input name="globulin_recommendation" type="text" class="form-control"
                                                style="width:350px" id="globulin_recommendation"
                                                value="{{ $exam->globulin_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>SODIUM</td>
                                        <td>
                                            <input
                                                oninput="getBloodRemarks(this, 'SODIUM', '135', '148', '{{ $exam->sodium }}')"
                                                name="sodium" type="text" class="form-control" id="sodium"
                                                value="{{ $exam->sodium }}" />
                                        </td>
                                        <td class="">135.0-148 mmol/L</td>
                                        <td><input name="sodium_findings" type="text" class="form-control"
                                                style="width:350px" id="sodium_findings"
                                                value="{{ $exam->sodium_findings }}"></td>
                                        <td><input name="sodium_recommendation" type="text" class="form-control"
                                                style="width:350px" id="sodium_recommendation"
                                                value="{{ $exam->sodium_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>POTASSIUM</td>
                                        <td>
                                            <input name="potassium" type="text" class="form-control" id="potassium"
                                                oninput="getBloodRemarks(this, 'POTASSIUM', '3.5', '5.3', '{{ $exam->potassium }}')"
                                                value="{{ $exam->potassium }}" />
                                        </td>
                                        <td class="">3.5-5.3 mmol/L</td>
                                        <td><input name="potassium_findings" type="text" class="form-control"
                                                style="width:350px" id="potassium_findings"
                                                value="{{ $exam->potassium_findings }}"></td>
                                        <td><input name="potassium_recommendation" type="text" class="form-control"
                                                style="width:350px" id="potassium_recommendation"
                                                value="{{ $exam->potassium_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>CHLORIDE</td>
                                        <td>
                                            <input name="chloride" type="text" class="form-control" id="chloride"
                                                value="{{ $exam->chloride }}"
                                                oninput="getBloodRemarks(this, 'CHLORIDE', '96', '108', '{{ $exam->chloride }}')" />
                                        </td>
                                        <td class="">96.0-108 mmol/L</td>
                                        <td><input name="chloride_findings" type="text" class="form-control"
                                                style="width:350px" id="chloride_findings"
                                                value="{{ $exam->chloride_findings }}"></td>
                                        <td><input name="chloride_recommendation" type="text" class="form-control"
                                                style="width:350px" id="chloride_recommendation"
                                                value="{{ $exam->chloride_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>CALCIUM</td>
                                        <td>
                                            <input name="calcium" type="text" class="form-control" id="calcium"
                                                value="{{ $exam->calcium }}"
                                                oninput="getBloodRemarks(this, 'CALCIUM', '2.10', '2.90', '{{ $exam->calcium }}')" />
                                        </td>
                                        <td class="">2.10-2.90 mmol/L</td>
                                        <td><input name="calcium_findings" type="text" class="form-control"
                                                style="width:350px" id="calcium_findings"
                                                value="{{ $exam->calcium_findings }}"></td>
                                        <td><input name="calcium_recommendation" type="text" class="form-control"
                                                style="width:350px" id="calcium_recommendation"
                                                value="{{ $exam->calcium_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td>A/G RATIO</td>
                                        <td>
                                            <input name="ag_ratio" type="text" value="{{ $exam->ag_ratio }}"
                                                class="form-control" id="ag_ratio"
                                                oninput="getBloodRemarks(this, 'AG RATIO', '0.6', '1.7')">
                                        </td>
                                        <td class="">1: 0.6-1.7</td>
                                        <td><input name="ag_ratio_findings" type="text" class="form-control"
                                                style="width:350px" id="ag_ratio_findings"
                                                value="{{ $exam->ag_ratio_findings }}"></td>
                                        <td><input name="ag_ratio_recommendation" type="text" class="form-control"
                                                style="width:350px" id="ag_ratio_recommendation"
                                                value="{{ $exam->ag_ratio_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">OTHERS:
                                            <input name="others" type="text" class="form-control" id="others"
                                                value="{{ $exam->others }}" />
                                        </td>
                                        <td valign="bottom">
                                            <input name="others_result" type="text" class="form-control"
                                                id="others_result" value="{{ $exam->others_result }}" />
                                        </td>
                                        <td valign="bottom">
                                            <input name="others_nv" type="text" class="form-control"
                                                style="width:200px" id="others_nv" value="{{ $exam->others_nv }}" />
                                        </td>
                                    </tr>
                                </table>
                                <!-- <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered table-responsive">
                                    <tr>
                                        <td colspan="4">
                                            <h4><b>SEROLOGY</b></h4>
                                        </td>
                                    </tr>
                                    <tr class="brdAll">
                                        <td width="24%" class="brdBtm"><b>EXAMINATION</b></td>
                                        <td class="brdLeftBtm"><b>RESULTS</b></td>
                                        <td class="brdLeftBtm"><b>CUT-OFF VALUE</b></td>
                                        <td class="brdLeftBtm"><b>PATIENT'S VALUE</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">VDRL/RPR</td>
                                        <td width="36%">
                                            <input name="vdrl_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="vdrl_result_0" onchange="getSerologyRemarks('VDRL/RPR', this, '{{ $exam->vdrl_result }}')"
                                                value="Non Reactive" @php echo $exam->vdrl_result == 'Non Reactive' ?
                                        "checked" : "" @endphp >Non Reactive
                                            <input name="vdrl_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="vdrl_result_1" onchange="getSerologyRemarks('VDRL/RPR', this)"
                                                value="Reactive" @php echo $exam->vdrl_result == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="vdrl_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="vdrl_result_2" value="" onchange="getSerologyRemarks('VDRL/RPR', this)"
                                            @php echo $exam->vdrl_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td width="20%">&nbsp;</td>
                                        <td width="20%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">HBsAg (Hepatitis B) </td>
                                        <td>
                                            <input name="hbsag_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="hbsag_result_0" onchange="getSerologyRemarks('HBsAg', this)"
                                                value="Non Reactive" @php echo $exam->hbsag_result == 'Non Reactive' ?
                                        "checked" : "" @endphp>Non Reactive
                                            <input name="hbsag_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="hbsag_result_1" onchange="getSerologyRemarks('HBsAg', this)"
                                                value="Reactive" @php echo $exam->hbsag_result == 'Reactive' ? "checked" :
                                        "" @endphp>Reactive
                                            <input name="hbsag_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="hbsag_result_2" value="" onchange="getSerologyRemarks('HBsAg', this)"
                                            @php echo $exam->hbsag_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td>
                                            <input name="hbsag_cov" type="text" class="form-control" id="hbsag_cov"
                                                value="{{ $exam->hbsag_cov }}" />
                                        </td>
                                        <td>
                                            <input name="hbsag_pv" type="text" class="form-control" id="hbsag_pv"
                                                value="{{ $exam->hbsag_pv }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">Anti-HCV (Hepatitis C)</td>
                                        <td>
                                            <input name="antihcv_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihcv_result_0"  onchange="getSerologyRemarks('Anti-HCV', this)"
                                                value="Non Reactive" @php echo $exam->antihcv_result == 'Non Reactive' ?
                                        "checked" : "" @endphp>Non Reactive
                                            <input name="antihcv_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihcv_result_1"  onchange="getSerologyRemarks('Anti-HCV', this)"
                                                value="Reactive" @php echo $exam->antihcv_result == 'Reactive' ? "checked" :
                                        "" @endphp>Reactive
                                            <input name="antihcv_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihcv_result_2"  onchange="getSerologyRemarks('Anti-HCV', this)"
                                                value="" @php echo $exam->antihcv_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td>
                                            <input name="antihcv_cov" type="text" class="form-control" id="antihcv_cov"
                                                value="{{ $exam->antihcv_cov }}" />
                                        </td>
                                        <td>
                                            <input name="antihcv_pv" type="text" class="form-control" id="antihcv_pv"
                                                value="{{ $exam->antihcv_pv }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">Anti-HAV IgM</td>
                                        <td>
                                            <input name="antihavigm_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HAV-IgM', this)"
                                                id="antihavigm_result_0" value="Non Reactive" @php echo
                                            $exam->antihavigm_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihavigm_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HAV-IgM', this)"
                                                id="antihavigm_result_1" value="Reactive" @php echo $exam->antihavigm_result
                                        == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihavigm_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HAV-IgM', this)"
                                                id="antihavigm_result_2" value="" @php echo $exam->antihavigm_result == '' ?
                                        "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td>
                                            <input name="antihavigm_cov" type="text" class="form-control"
                                                id="antihavigm_cov" value="{{ $exam->antihavigm_cov }}" />
                                        </td>
                                        <td>
                                            <input name="antihavigm_pv" type="text" class="form-control" id="antihavigm_pv"
                                                value="{{ $exam->antihavigm_pv }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">Anti-HAV IgG </td>
                                        <td>
                                            <input name="antihavigg_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HAV-IgG', this)"
                                                id="antihavigg_result_0" value="Non Reactive" @php echo
                                            $exam->antihavigg_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihavigg_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HAV-IgG', this)"
                                                id="antihavigg_result_1" value="Reactive" @php echo $exam->antihavigg_result
                                        == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihavigg_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HAV-IgG', this)"
                                                id="antihavigg_result_2" value="" @php echo $exam->antihavigg_result == '' ?
                                        "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td>
                                            <input name="antihavigg_cov" type="text" class="form-control"
                                                id="antihavigg_cov" value="{{ $exam->antihavigg_cov }}" />
                                        </td>
                                        <td>
                                            <input name="antihavigg_pv" type="text" class="form-control" id="antihavigg_pv"
                                                value="{{ $exam->antihavigg_pv }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="left" class="brdAll">TPHA</td>
                                        <td>
                                            <input name="tpha_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="tpha_result_0" onchange="getSerologyRemarks('TPHA', this)"
                                                value="Negative" @php echo $exam->tpha_result == 'Negative' ? "checked"
                                        : "" @endphp>Negative
                                            <input name="tpha_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="tpha_result_1" onchange="getSerologyRemarks('TPHA', this)"
                                                value="Positive" @php echo $exam->tpha_result == 'Positive' ? "checked" : "" @endphp>Positive
                                            <input name="tpha_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="tpha_result_2" value=""  onchange="getSerologyRemarks('TPHA', this)" @php echo $exam->tpha_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr class="table no-border">
                                        <td align="left" valign="top">Anti-HBs</td>
                                        <td class="brdLeft">
                                            <input name="antihbs_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihbs_result_0" onchange="getSerologyRemarks('Anti-HBs', this)"
                                                value="Non Reactive" @php echo $exam->antihbs_result == 'Non Reactive' ?
                                        "checked" : "" @endphp>Non Reactive
                                            <input name="antihbs_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihbs_result_1" onchange="getSerologyRemarks('Anti-HBs', this)"
                                                value="Reactive" @php echo $exam->antihbs_result == 'Reactive' ? "checked" :
                                        "" @endphp>Reactive
                                            <input name="antihbs_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihbs_result_2" onchange="getSerologyRemarks('Anti-HBs', this)"
                                                value="" @php echo $exam->antihbs_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbs_cov" type="text" class="form-control" id="antihbs_cov"
                                                value="{{ $exam->antihbs_cov }}" />
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbs_pv" type="text" class="form-control" id="antihbs_pv"
                                                value="{{ $exam->antihbs_pv }}" />
                                        </td>
                                    </tr>
                                    <tr class="table no-border">
                                        <td align="left" valign="top">HBeAg</td>
                                        <td class="brdLeft">
                                            <input name="hbeag_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="hbeag_result_0" onchange="getSerologyRemarks('HBeAg', this)"
                                                value="Non Reactive" @php echo $exam->hbeag_result == 'Non Reactive' ?
                                        "checked" : "" @endphp>Non Reactive
                                            <input name="hbeag_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="hbeag_result_1" onchange="getSerologyRemarks('HBeAg', this)"
                                                value="Reactive" @php echo $exam->hbeag_result == 'Reactive' ? "checked" :
                                        "" @endphp>Reactive
                                            <input name="hbeag_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="hbeag_result_2" value="" onchange="getSerologyRemarks('HBeAg', this)" @php echo $exam->hbeag_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td class="brdLeft">
                                            <input name="hbeag_cov" type="text" class="form-control" id="hbeag_cov"
                                                value="{{ $exam->hbeag_cov }}" />
                                        </td>
                                        <td class="brdLeft">
                                            <input name="hbeag_pv" type="text" class="form-control" id="hbeag_pv"
                                                value="{{ $exam->hbeag_pv }}" />
                                        </td>
                                    </tr>
                                    <tr class="table no-border">
                                        <td align="left" valign="top">Anti-HBe</td>
                                        <td class="brdLeft">
                                            <input name="antihbe_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihbe_result_0" onchange="getSerologyRemarks('Anti-HBe', this)"
                                                value="Non Reactive" @php echo $exam->antihbe_result == 'Non Reactive' ?
                                        "checked" : "" @endphp>Non Reactive
                                            <input name="antihbe_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihbe_result_1" onchange="getSerologyRemarks('Anti-HBe', this)"
                                                value="Reactive" @php echo $exam->antihbe_result == 'Reactive' ? "checked" :
                                        "" @endphp>Reactive
                                            <input name="antihbe_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="antihbe_result_2" onchange="getSerologyRemarks('Anti-HBe', this)"
                                                value="" @php echo $exam->antihbe_result == '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbe_cov" type="text" class="form-control" id="antihbe_cov"
                                                value="{{ $exam->antihbe_cov }}" />
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbe_pv" type="text" class="form-control" id="antihbe_pv"
                                                value="{{ $exam->antihbe_pv }}" />
                                        </td>
                                    </tr>
                                    <tr class="table no-border">
                                        <td align="left" valign="top">Anti-HBc (lgM):</td>
                                        <td class="brdLeft">
                                            <input name="antihbclgm_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HBc-lgM', this)"
                                                id="antihbclgm_result_0" value="Non Reactive" @php echo
                                            $exam->antihbclgm_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihbclgm_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HBc-lgM', this)"
                                                id="antihbclgm_result_1" value="Reactive" @php echo $exam->antihbclgm_result
                                        == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihbclgm_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HBc-lgM', this)"
                                                id="antihbclgm_result_2" value="" @php echo $exam->antihbclgm_result == '' ?
                                        "checked" : "" @endphp>Reset
                                        </td>

                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgm_cov" type="text" class="form-control"
                                                id="antihbclgm_cov" value="{{ $exam->antihbclgm_cov }}" />
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgm_pv" type="text" class="form-control" id="antihbclgm_pv"
                                                value="{{ $exam->antihbclgm_pv }}" />
                                        </td>
                                    </tr>
                                    <tr class="table no-border">
                                        <td align="left" valign="top">Anti-HBc (lgG)</td>
                                        <td class="brdLeft">
                                            <input name="antihbclgg_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HBc-lgG', this)"
                                                id="antihbclgg_result_0" value="Non Reactive" @php echo $exam->antihbclgg_result == 'Non Reactive' ? "checked" : "" @endphp>Non Reactive
                                            <input name="antihbclgg_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HBc-lgG', this)"
                                                id="antihbclgg_result_1" value="Reactive" @php echo $exam->antihbclgg_result
                                        == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihbclgg_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" onchange="getSerologyRemarks('Anti-HBc-lgG', this)"
                                                id="antihbclgg_result_2" value="" @php echo $exam->antihbclgg_result == '' ?
                                        "checked" : "" @endphp>Reset
                                        </td>

                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgg_cov" type="text" class="form-control"
                                                id="antihbclgg_cov" value="{{ $exam->antihbclgg_cov }}" />
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihbclgg_pv" type="text" class="form-control" id="antihbclgg_pv"
                                                value="{{ $exam->antihbclgg_pv }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="brdAll">OTHERS:
                                            <input name="sothers" type="text" class="form-control" id="sothers"
                                                value="{{ $exam->sothers }}" />
                                        </td>
                                        <td valign="bottom"><span class="brdLeft">
                                                <input name="sothers_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="sothers_result_0"
                                                    value="Non Reactive" @php echo $exam->sothers_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                                <input name="sothers_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="sothers_result_1"
                                                    value="Reactive" @php echo $exam->sothers_result == 'Reactive' ?
                                            "checked" : "" @endphp>Reactive
                                                <input name="sothers_result" type="radio" style="width: 20px; height: 20px;" class="m-1 serology" id="sothers_result_2"
                                                    value="" @php echo $exam->sothers_result == 'Reactive' ? "checked" : "" @endphp>Reset </span>
                                        </td>

                                        </span></td>
                                        <td valign="bottom">
                                            <input name="sothers_cov" type="text" class="form-control" id="sothers_cov"
                                                value="{{ $exam->sothers_cov }}" />
                                        </td>
                                        <td valign="bottom">
                                            <input name="sothers_pv" type="text" class="form-control" id="sothers_pv"
                                                value="{{ $exam->sothers_pv }}" />
                                        </td>
                                    </tr>
                                </table> -->
                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                    <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <div class="form-group">
                                                    <label for=""><b>Remarks</b></label>
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1 serology"
                                                        id="remarks_status_0" value="normal"
                                                        @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
                                                    <input name="remarks_status" type="radio"
                                                        style="width: 20px; height: 20px;" class="m-1 serology"
                                                        id="remarks_status_1" value="findings"
                                                        @php echo $exam->remarks_status == "findings" ? "checked" : null @endphp>With
                                                    Findings
                                                </div>
                                                <div class="form-group">
                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="remarks" cols="30"
                                                        rows="6">{{ $exam->remarks }} </textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2"
                                    class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <table width="100%" border="0" cellspacing="2"
                                                    cellpadding="2">
                                                    <tbody>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="23%"><b>Medical Technologist: </b></td>
                                                            <td width="77%">
                                                                <div class="col-md-8">
                                                                    <select required name="technician_id"
                                                                        id="technician_id" class="form-control">
                                                                        @foreach ($medical_techs as $med_tech)
                                                                            <option value={{ $med_tech->id }}
                                                                                {{ $med_tech->id == $exam->technician_id ? 'selected' : null }}>
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
                                                                    <select required name="technician2_id"
                                                                        id="technician2_id" class="form-control">
                                                                        @foreach ($pathologists as $pathologist)
                                                                            <option value={{ $pathologist->id }}
                                                                                {{ $pathologist->id == $exam->technician2_id ? 'selected' : null }}>
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
        let isFirst = true;
        let remarks_value = document.querySelector('#remarks').value;
        console.log(remarks_value.split('\n'));

        function getBloodRemarks(e, message, minNumber, maxNumber, current_value) {
            let remarks = document.querySelector('#remarks').value;

            if (isFirst) {
                past_value = current_value;
                if (current_value > parseFloat(maxNumber)) {
                    past_status = 'H';
                } else if (current_value < parseFloat(minNumber)) {
                    past_status = 'L';
                } else {
                    past_status = '';
                }
            }

            if (e.value == "") {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                isFirst = false;
            } else if (e.value < parseFloat(minNumber)) {
                console.log(past_value);
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} L\n`;
                past_status = "L";
                past_value = e.value;
                isFirst = false;
            } else if (e.value > parseFloat(maxNumber)) {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                document.getElementById("remarks").innerHTML += `${message} - ${e.value} H\n`;
                past_status = "H";
                past_value = e.value;
                isFirst = false;
            } else {
                var find = `${message} - ${past_value} ${past_status}\n`;
                var replace = '';
                var numreplace = new RegExp(find, 'g');
                var resultString = remarks.replace(numreplace, replace);
                document.getElementById("remarks").innerHTML = resultString;
                isFirst = false;
            }
        }



        let past_sero_value = 'React';

        function getSerologyRemarks(title, e, current_value) {
            let remarks = document.querySelector('#remarks').value;

            if (e.value == "Reactive" || e.value == "Positive") {
                document.getElementById("remarks").innerHTML += `${title} - ${e.value}\n`;
                past_sero_value = e.value;
            } else {
                past_sero_value = title == "TPHA" ? "Positive" : "Reactive";
                var find = `${title} - ${past_sero_value}`;
                console.log(find);
                var replace = '';
                var numreplace = new RegExp(find, 'gi');
                var resultString = remarks.replace(numreplace, replace);
                console.log(resultString);
                document.getElementById("remarks").innerHTML = resultString;
            }
        }
    </script>
@endpush
