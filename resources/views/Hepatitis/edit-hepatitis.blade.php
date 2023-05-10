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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Hepatitis</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/examlab_bloodsero_print?id={{$exam->admission_id}}&type=both", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_hepatitis" role="form">
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
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
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
                                        <td>
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered table-responsive">
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
                                        <td width="22%" align="left" valign="top">VDRL/RPR</td>
                                        <td width="38%" class="brdLeft">
                                            <input name="vdrl_result" type="radio" class="m-1" id="vdrl_result_0"
                                                value="Non Reactive" @php echo $exam->vdrl_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="vdrl_result" type="radio" class="m-1" id="vdrl_result_1"
                                                value="Reactive" @php echo $exam->vdrl_result == 'Reactive' ? "checked"
                                            : "" @endphp>Reactive
                                            <input name="vdrl_result" type="radio" class="m-1" id="vdrl_result_2"
                                                value="" @php echo $exam->vdrl_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td width="20%" class="brdLeft"></td>
                                        <td width="20%" class="brdLeft"></td>
                                        <td><input name="vdrl_findings" type="text" class="form-control" style="width:280px"
                                            id="vdrl_findings" value="{{ $exam->vdrl_findings }}"></td>
                                        <td><input name="vdrl_recommendation" type="text" class="form-control" style="width:280px"
                                                id="vdrl_recommendation" value="{{ $exam->vdrl_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="22%" align="left" valign="top">HBsAg</td>
                                        <td width="38%" class="brdLeft">
                                            <input name="hbsag_result" type="radio" class="m-1" id="hbsag_result_0"
                                                value="Non Reactive" @php echo $exam->hbsag_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="hbsag_result" type="radio" class="m-1" id="hbsag_result_1"
                                                value="Reactive" @php echo $exam->hbsag_result == 'Reactive' ? "checked"
                                            : "" @endphp>Reactive
                                            <input name="hbsag_result" type="radio" class="m-1" id="hbsag_result_2"
                                                value="" @php echo $exam->hbsag_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td width="20%" class="brdLeft"><input name="hbsag_cutoff" type="text"
                                                class="form-control" id="hbsag_cutoff"
                                                value="{{ $exam->hbsag_cutoff }}">
                                        </td>
                                        <td width="20%" class="brdLeft"><input name="hbsag_value" type="text"
                                                class="form-control" id="hbsag_value"
                                                value="{{ $exam->hbsag_value }}">
                                        </td>
                                        <td><input name="hbsag_findings" type="text" class="form-control" style="width:280px"
                                            id="hbsag_findings" value="{{ $exam->hbsag_findings }}"></td>
                                        <td><input name="hbsag_recommendation" type="text" class="form-control" style="width:280px"
                                                id="hbsag_recommendation" value="{{ $exam->hbsag_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HCV </td>
                                        <td class="brdLeft">
                                            <input name="antihcv_result" type="radio" class="m-1" id="antihcv_result_0"
                                                value="Non Reactive" @php echo $exam->antihcv_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="antihcv_result" type="radio" class="m-1" id="antihcv_result_1"
                                                value="Reactive" @php echo $exam->antihcv_result == 'Reactive' ?
                                            "checked" : "" @endphp>Reactive
                                            <input name="antihcv_result" type="radio" class="m-1" id="antihcv_result_2"
                                                value="" @php echo $exam->antihcv_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="antihcv_cutoff" type="text"
                                                class="form-control" id="antihcv_cutoff"
                                                value="{{ $exam->antihcv_cutoff }}"></td>
                                        <td class="brdLeft"><input name="antihcv_value" type="text" class="form-control"
                                                id="antihcv_value" value="{{ $exam->antihcv_value }}"></td>
                                        <td><input name="antihcv_findings" type="text" class="form-control" style="width:280px"
                                            id="antihcv_findings" value="{{ $exam->antihcv_findings }}"></td>
                                        <td><input name="antihcv_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihcv_recommendation" value="{{ $exam->antihcv_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HAV (lgM)</td>
                                        <td class="brdLeft">
                                            <input name="antihavlgm_result" type="radio" class="m-1"
                                                id="antihavlgm_result_0" value="Non Reactive" @php echo
                                                $exam->antihavlgm_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihavlgm_result" type="radio" class="m-1"
                                                id="antihavlgm_result_1" value="Reactive" @php echo
                                                $exam->antihavlgm_result == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihavlgm_result" type="radio" class="m-1"
                                                id="antihavlgm_result_2" value="" @php echo $exam->antihavlgm_result ==
                                            'Reactive' ? "checked" : "" @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="antihavlgm_cutoff" type="text"
                                                class="form-control" id="antihavlgm_cutoff"
                                                value="{{ $exam->antihavlgm_cutoff }}"></td>
                                        <td class="brdLeft"><input name="antihavlgm_value" type="text"
                                                class="form-control" id="antihavlgm_value"
                                                value="{{ $exam->antihavlgm_value }}"></td>
                                        <td><input name="antihavlgm_findings" type="text" class="form-control" style="width:280px"
                                            id="antihavlgm_findings" value="{{ $exam->antihavlgm_findings }}"></td>
                                        <td><input name="antihavlgm_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihavlgm_recommendation" value="{{ $exam->antihavlgm_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HAV (lgG)</td>
                                        <td class="brdLeft">
                                            <input name="antihavlgg_result" type="radio" class="m-1"
                                                id="antihavlgg_result_0" value="Non Reactive" @php echo
                                                $exam->antihavlgg_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihavlgg_result" type="radio" class="m-1"
                                                id="antihavlgg_result_1" value="Reactive" @php echo
                                                $exam->antihavlgg_result == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihavlgg_result" type="radio" class="m-1"
                                                id="antihavlgg_result_2" value="" @php echo $exam->antihavlgg_result ==
                                            '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihavlgg_cutoff" type="text" class="form-control"
                                                id="antihavlgg_cutoff" value="{{ $exam->antihavlgg_cutoff }}">
                                        </td>
                                        <td class="brdLeft">
                                            <input name="antihavlgg_value" type="text" class="form-control"
                                                id="antihavlgg_value" value="{{ $exam->antihavlgg_value }}">
                                        </td>
                                        <td><input name="antihavlgg_findings" type="text" class="form-control" style="width:280px"
                                            id="antihavlgg_findings" value="{{ $exam->antihavlgg_findings }}"></td>
                                        <td><input name="antihavlgg_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihavlgg_recommendation" value="{{ $exam->antihavlgg_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="22%" align="left" valign="top">TPHA</td>
                                        <td width="38%" class="brdLeft">
                                            <input name="tpha_result" type="radio" class="m-1" id="tpha_result_0"
                                                value="Non Reactive" @php echo $exam->tpha_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Negative
                                            <input name="tpha_result" type="radio" class="m-1" id="tpha_result_1"
                                                value="Reactive" @php echo $exam->tpha_result == 'Reactive' ? "checked"
                                            : "" @endphp>Positive
                                            <input name="tpha_result" type="radio" class="m-1" id="tpha_result_2"
                                                value="" @php echo $exam->tpha_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td width="20%" class="brdLeft"></td>
                                        <td width="20%" class="brdLeft"></td>
                                        <td><input name="tpha_findings" type="text" class="form-control" style="width:280px"
                                            id="tpha_findings" value="{{ $exam->tpha_findings }}"></td>
                                        <td><input name="tpha_recommendation" type="text" class="form-control" style="width:280px"
                                                id="tpha_recommendation" value="{{ $exam->tpha_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBs</td>
                                        <td class="brdLeft">
                                            <input name="antihbs_result" type="radio" class="m-1" id="antihbs_result_0"
                                                value="Non Reactive" @php echo $exam->antihbs_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="antihbs_result" type="radio" class="m-1" id="antihbs_result_1"
                                                value="Reactive" @php echo $exam->antihbs_result == 'Reactive' ?
                                            "checked" : "" @endphp>Reactive
                                            <input name="antihbs_result" type="radio" class="m-1" id="antihbs_result_2"
                                                value="" @php echo $exam->antihbs_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="antihbs_cutoff" type="text"
                                                class="form-control" id="antihbs_cutoff"
                                                value="{{ $exam->antihbs_cutoff }}"></td>
                                        <td class="brdLeft"><input name="antihbs_value" type="text" class="form-control"
                                                id="antihbs_value" value="{{ $exam->antihbs_value }}"></td>
                                        <td><input name="antihbs_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbs_findings" value="{{ $exam->antihbs_findings }}"></td>
                                        <td><input name="antihbs_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbs_recommendation" value="{{ $exam->antihbs_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">HBeAg</td>
                                        <td class="brdLeft">
                                            <input name="hbeag_result" type="radio" class="m-1" id="hbeag_result_0"
                                                value="Non Reactive" @php echo $exam->hbeag_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="hbeag_result" type="radio" class="m-1" id="hbeag_result_1"
                                                value="Reactive" @php echo $exam->hbeag_result == 'Reactive' ? "checked"
                                            : "" @endphp>Reactive
                                            <input name="hbeag_result" type="radio" class="m-1" id="hbeag_result_2"
                                                value="" @php echo $exam->hbeag_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="hbeag_cutoff" type="text" class="form-control"
                                                id="hbeag_cutoff" value="{{ $exam->hbeag_cutoff }}"></td>
                                        <td class="brdLeft"><input name="hbeag_value" type="text" class="form-control"
                                                id="hbeag_value" value="{{ $exam->hbeag_value }}"></td>
                                        <td><input name="hbeag_findings" type="text" class="form-control" style="width:280px"
                                            id="hbeag_findings" value="{{ $exam->hbeag_findings }}"></td>
                                        <td><input name="hbeag_recommendation" type="text" class="form-control" style="width:280px"
                                                id="hbeag_recommendation" value="{{ $exam->hbeag_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBe</td>
                                        <td class="brdLeft">
                                            <input name="antihbe_result" type="radio" class="m-1" id="antihbe_result_0"
                                                value="Non Reactive" @php echo $exam->antihbe_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="antihbe_result" type="radio" class="m-1" id="antihbe_result_1"
                                                value="Reactive" @php echo $exam->antihbe_result == 'Reactive' ?
                                            "checked" : "" @endphp>Reactive
                                            <input name="antihbe_result" type="radio" class="m-1" id="antihbe_result_2"
                                                value="" @php echo $exam->antihbe_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="antihbe_cutoff" type="text"
                                                class="form-control" id="antihbe_cutoff"
                                                value="{{ $exam->antihbe_cutoff }}"></td>
                                        <td class="brdLeft"><input name="antihbe_value" type="text" class="form-control"
                                                id="antihbe_value" value="{{ $exam->antihbe_value }}"></td>
                                        <td><input name="antihbe_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbe_findings" value="{{ $exam->antihbe_findings }}"></td>
                                        <td><input name="antihbe_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbe_recommendation" value="{{ $exam->antihbe_recommendation }}"></td>
                                     </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBc (lgM):</td>
                                        <td class="brdLeft">
                                            <input name="antihbclgm_result" type="radio" class="m-1"
                                                id="antihbclgm_result_0" value="Non Reactive" @php echo
                                                $exam->antihbclgm_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihbclgm_result" type="radio" class="m-1"
                                                id="antihbclgm_result_1" value="Reactive" @php echo
                                                $exam->antihbclgm_result == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihbclgm_result" type="radio" class="m-1"
                                                id="antihbclgm_result_2" value="" @php echo $exam->antihbclgm_result ==
                                            ' ' ? "checked" : "" @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="antihbclgm_cutoff" type="text"
                                                class="form-control" id="antihbclgm_cutoff"
                                                value="{{ $exam->antihbclgm_cutoff }}"></td>
                                        <td class="brdLeft"><input name="antihbclgm_value" type="text"
                                                class="form-control" id="antihbclgm_value"
                                                value="{{ $exam->antihbclgm_value }}"></td>
                                        <td><input name="antihbclgm_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbclgm_findings" value="{{ $exam->antihbclgm_findings }}"></td>
                                        <td><input name="antihbclgm_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbclgm_recommendation" value="{{ $exam->antihbclgm_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Anti-HBc (lgG)</td>
                                        <td class="brdLeft">
                                            <input name="antihbclgg_result" type="radio" class="m-1"
                                                id="antihbclgg_result_0" value="Non Reactive" @php echo
                                                $exam->antihbclgg_result == 'Non Reactive' ? "checked" : "" @endphp>Non
                                            Reactive
                                            <input name="antihbclgg_result" type="radio" class="m-1"
                                                id="antihbclgg_result_1" value="Reactive" @php echo
                                                $exam->antihbclgg_result == 'Reactive' ? "checked" : "" @endphp>Reactive
                                            <input name="antihbclgg_result" type="radio" class="m-1"
                                                id="antihbclgg_result_2" value="" @php echo $exam->antihbclgg_result ==
                                            '' ? "checked" : "" @endphp>Reset
                                        </td>
                                        <td class="brdLeft"><input name="antihbclgg_cutoff" type="text"
                                                class="form-control" id="antihbclgg_cutoff"
                                                value="{{ $exam->antihbclgg_cutoff }}"></td>
                                        <td class="brdLeft"><input name="antihbclgg_value" type="text"
                                                class="form-control" id="antihbclgg_value"
                                                value="{{ $exam->antihbclgg_value }}"></td>
                                        <td><input name="antihbclgg_findings" type="text" class="form-control" style="width:280px"
                                            id="antihbclgg_findings" value="{{ $exam->antihbclgg_findings }}"></td>
                                        <td><input name="antihbclgg_recommendation" type="text" class="form-control" style="width:280px"
                                                id="antihbclgg_recommendation" value="{{ $exam->antihbclgg_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Others</td>
                                        <td valign="top" class="brdLeft">
                                            <input name="others_result" type="radio" class="m-1" id="others_result_0"
                                                value="Non Reactive" @php echo $exam->others_result == 'Non Reactive' ?
                                            "checked" : "" @endphp>Non Reactive
                                            <input name="others_result" type="radio" class="m-1" id="others_result_1"
                                                value="Reactive" @php echo $exam->others_result == 'Reactive' ?
                                            "checked" : "" @endphp>Reactive
                                            <input name="others_result" type="radio" class="m-1" id="others_result_2"
                                                value="" @php echo $exam->others_result == '' ? "checked" : ""
                                            @endphp>Reset
                                        </td>
                                        <td valign="top" class="brdLeft"><input name="others_cutoff" type="text"
                                                class="form-control" id="others_cutoff"
                                                value="{{ $exam->others_cutoff }}"></td>
                                        <td valign="top" class="brdLeft"><input name="others_value" type="text"
                                                class="form-control" id="others_value"
                                                value="{{ $exam->others_value }}">
                                        </td>
                                        <td><input name="others_findings" type="text" class="form-control" style="width:280px"
                                            id="others_findings" value="{{ $exam->others_findings }}"></td>
                                        <td><input name="others_recommendation" type="text" class="form-control" style="width:280px"
                                                id="others_recommendation" value="{{ $exam->others_recommendation }}"></td>
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
                                                id="remarks_status_0" value="normal" @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" @php echo $exam->remarks_status == "findings" ? "checked" : null @endphp>With Findings
                                        </div>
                                        <div class="form-group">
                                                <textarea placeholder="Remarks" class="form-control" name="remarks" id="" cols="30" rows="6">{{$exam->remarks}}</textarea>
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
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($medical_techs as $med_tech)
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == $exam->technician_id ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}, {{$med_tech->title}}</option>
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
                                                                    @foreach($pathologists as $pathologist)
                                                                        <option value={{$pathologist->id}} {{$pathologist->id == $exam->technician2_id ? "selected" : null}}>{{$pathologist->firstname}} {{$pathologist->lastname}}, {{$pathologist->title}}</option>
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
