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
                                    <h3>Edit Stresstest</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_stresstest_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_stresstest" role="form">
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
                                <tr>
                                    <td width="92"><b>PEME Date</b></td>
                                    <td width="247">
                                        <input name="peme_date" type="text" id="peme_date"
                                            value="{{ $admission->trans_date }}" class="form-control"
                                            style="padding: .4rem;" readonly />
                                    </td>
                                    <td width="113"><b>Admission No.</b></td>
                                    <td width="322">
                                        <div class="col-md-10" style="margin-left: -14px">
                                            <input name="admission_id" type="text" id="admission_id"
                                                value="{{ $exam->admission_id }}" class="form-control" input-sm
                                                pull-left placeholder="Admission No." readonly />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Exam Date</b></td>
                                    <td><input name="trans_date" type="text" id="trans_date"
                                            value="{{ $exam->trans_date }}" class="form-control"
                                            style="padding: .4rem;" readonly /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><b>Patient</b></td>
                                    <td>
                                        <input name="patientname" id="patientname" type="text"
                                            value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                            class="form-control" style="padding: .4rem;" readonly />
                                    </td>
                                    <td><b>Patient Code</b></td>
                                    <td><input name="patientcode" id="patientcode" type="text"
                                            value="{{ $exam->patientcode }}" class="form-control"
                                            style="padding: .4rem;" readonly /></td>
                                </tr>
                            </table>
                            <table width="100%" class="table table-borded">
                                <tr>
                                    <td width="94" align="left"><b>Medications: </b></td>
                                    <td width="246" align="left">
                                        <input name="medication" type="text" id="medication"
                                            value="{{ $exam->medication }}" size="30" class="form-control"
                                            style="padding: .4rem;" />
                                    </td>
                                    <td width="119" align="left"><b>Indication:</b></td>
                                    <td width="321" align="left">
                                        <input name="indication" type="text" id="indication"
                                            value="{{ $exam->indication }}" size="20" class="form-control"
                                            style="padding: .4rem;" />
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2"
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
                                        <td width="7%" align="center"><b>RPP (*100)&nbsp;</b></td>
                                        <td width="7%" align="center"><b>VE</b></td>
                                        <td width="7%" align="center"><b>SVE</b></td>
                                        <td width="7%" align="center"><b>ST II (mm)</b></td>
                                        <td width="15%" align="center"><b>Comment</b></td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Pre-Exercise</b></td>
                                        <td width="8%" align="center">
                                            <input name="exercise_speed" type="text" id="exercise_speed"
                                                value="{{ $exam->exercise_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="5%" align="center">
                                            <input name="exercise_speed" type="text" id="exercise_speed"
                                                value="{{ $exam->exercise_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_grade" type="text" id="exercise_grade"
                                                value="{{ $exam->exercise_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_mets" type="text" id="exercise_mets"
                                                value="{{ $exam->exercise_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_hr" type="text" id="exercise_hr"
                                                value="{{ $exam->exercise_hr }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp"
                                                value="{{ $exam->exercise_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp"
                                                value="{{ $exam->exercise_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="30%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp"
                                                value="{{ $exam->exercise_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp"
                                                value="{{ $exam->exercise_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="exercise_bp" type="text" id="exercise_bp"
                                                value="{{ $exam->exercise_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="exercise_remarks" type="text" id="exercise_remarks"
                                                value="{{ $exam->exercise_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 1</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage1_speed" type="text" id="stage1_speed"
                                                value="{{ $exam->stage1_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage1_speed" type="text" id="stage1_speed"
                                                value="{{ $exam->stage1_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_grade" type="text" id="stage1_grade"
                                                value="{{ $exam->stage1_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage1_mets" type="text" id="stage1_mets"
                                                value="{{ $exam->stage1_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_hr" type="text" id="stage1_hr"
                                                value="{{ $exam->stage1_hr }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp"
                                                value="{{ $exam->stage1_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp"
                                                value="{{ $exam->stage1_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp"
                                                value="{{ $exam->stage1_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp"
                                                value="{{ $exam->stage1_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage1_bp" type="text" id="stage1_bp"
                                                value="{{ $exam->stage1_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage1_remarks" type="text" id="stage1_remarks"
                                                value="{{ $exam->stage1_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 2</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage2_speed" type="text" id="stage2_speed"
                                                value="{{ $exam->stage2_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage2_speed" type="text" id="stage2_speed"
                                                value="{{ $exam->stage2_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_grade" type="text" id="stage2_grade"
                                                value="{{ $exam->stage2_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage2_mets" type="text" id="stage2_mets"
                                                value="{{ $exam->stage2_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_hr" type="text" id="stage2_hr"
                                                value="{{ $exam->stage2_hr }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp"
                                                value="{{ $exam->stage2_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp"
                                                value="{{ $exam->stage2_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp"
                                                value="{{ $exam->stage2_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp"
                                                value="{{ $exam->stage2_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage2_bp" type="text" id="stage2_bp"
                                                value="{{ $exam->stage2_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage2_remarks" type="text" id="stage2_remarks"
                                                value="{{ $exam->stage2_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 3</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage3_speed" type="text" id="stage3_speed"
                                                value="{{ $exam->stage3_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage3_speed" type="text" id="stage3_speed"
                                                value="{{ $exam->stage3_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_grade" type="text" id="stage3_grade"
                                                value="{{ $exam->stage3_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage3_mets" type="text" id="stage3_mets"
                                                value="{{ $exam->stage3_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_hr" type="text" id="stage3_hr"
                                                value="{{ $exam->stage3_hr }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp"
                                                value="{{ $exam->stage3_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp"
                                                value="{{ $exam->stage3_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp"
                                                value="{{ $exam->stage3_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp"
                                                value="{{ $exam->stage3_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage3_bp" type="text" id="stage3_bp"
                                                value="{{ $exam->stage3_bp }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage3_remarks" type="text" id="stage3_remarks"
                                                value="{{ $exam->stage3_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 4</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage4_speed" type="text" id="stage4_speed"
                                                value="{{ $exam->stage4_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage4_speed" type="text" id="stage4_speed"
                                                value="{{ $exam->stage4_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_grade" type="text" id="stage4_grade"
                                                value="{{ $exam->stage4_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage4_mets" type="text" id="stage4_mets"
                                                value="{{ $exam->stage4_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage4_remarks" type="text" id="stage4_remarks"
                                                value="{{ $exam->stage4_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 5</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage5_speed" type="text" id="stage5_speed"
                                                value="{{ $exam->stage5_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage5_speed" type="text" id="stage5_speed"
                                                value="{{ $exam->stage5_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_grade" type="text" id="stage5_grade"
                                                value="{{ $exam->stage5_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" l class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage5_mets" type="text" id="stage5_mets"
                                                value="{{ $exam->stage5_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage5_remarks" type="text" id="stage5_remarks"
                                                value="{{ $exam->stage5_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 6</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage6_speed" type="text" id="stage6_speed"
                                                value="{{ $exam->stage6_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage6_speed" type="text" id="stage6_speed"
                                                value="{{ $exam->stage6_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_grade" type="text" id="stage6_grade"
                                                value="{{ $exam->stage6_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage6_mets" type="text" id="stage6_mets"
                                                value="{{ $exam->stage6_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="15%" align="center">
                                            <input name="stage6_remarks" type="text" id="stage6_remarks"
                                                value="{{ $exam->stage6_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="9%" height="31" align="center"><b>Stage 7</b></td>
                                        <td width="8%" align="center">
                                            <input name="stage7_speed" type="text" id="stage7_speed"
                                                value="{{ $exam->stage7_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="10%" align="center">
                                            <input name="stage7_speed" type="text" id="stage7_speed"
                                                value="{{ $exam->stage7_speed }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage7_grade" type="text" id="stage7_grade"
                                                value="{{ $exam->stage7_grade }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="9%" align="center">
                                            <input name="stage7_mets" type="text" id="stage7_mets"
                                                value="{{ $exam->stage7_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage7_mets" type="text" id="stage7_mets"
                                                value="{{ $exam->stage7_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">
                                            <input name="stage7_mets" type="text" id="stage7_mets"
                                                value="{{ $exam->stage7_mets }}" size="5" class="form-control"
                                                style="padding: .4rem;" />
                                        </td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="7%" align="center">&nbsp;</td>
                                        <td width="15%" align="center">
                                            <input name="stage7_remarks" type="text" id="stage7_remarks"
                                                value="{{ $exam->stage7_remarks }}" size="10" class="form-control"
                                                style="padding: .4rem;" />
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
                                            <input name='bp_after' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->bp_after }}" />
                                        </td>
                                        <td align="center">
                                            <input name='bp_1min' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->bp_1min }}" />
                                        </td>
                                        <td align="center">
                                            <input name='bp_3mins' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->bp_3mins }}" />
                                        </td>
                                        <td align="center">
                                            <input name='bp_5mins' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->bp_5mins }}" />
                                        </td>
                                        <td align="center">
                                            <input name='bp_8mins' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->bp_8mins }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="22" colspan="0" align="center"><b>HR</b></td>
                                        <td align="center">
                                            <input name='hr_after' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->hr_after }}" />
                                        </td>
                                        <td align="center">
                                            <input name='hr_1min' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->hr_1min }}" />
                                        </td>
                                        <td align="center">
                                            <input name='hr_3min' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->hr_3min }}" />
                                        </td>
                                        <td align="center">
                                            <input name='hr_5min' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->hr_5min }}" />
                                        </td>
                                        <td align="center">
                                            <input name='hr_8min' type="text" class="form-control"
                                                style="padding: .4rem;" value="{{ $exam->hr_8min }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" height="27" align="center">
                                            <p><b><u>RESTING ECG:</u></b></p>
                                        </td>
                                        <td colspan="5">
                                            <textarea name="resting_ecg" cols="50" rows="2" maxlength=""
                                                class="form-control" style="padding: .4rem;" id="resting_ecg">{{ $exam->resting_ecg }}
                                      </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="27" colspan="6">
                                            <p><u><b>Response Exercise:</b></u></p>
                                            <input class="my-50" name="symptoms" type="text" id="symptoms"
                                                value="{{ $exam->symptoms }}" size="15" />
                                            -limited treadmill exercise test was performed using the
                                            <input class="my-50" name="exercise_type" type="text" id="exercise_type"
                                                value="{{ $exam->exercise_type }}" size="15" />
                                            Patient <br> reached
                                            <input class="my-50" name="reach_min" type="text" id="reach_min"
                                                value="{{ $exam->reach_min }}" size="3" />
                                            min(s)
                                            <input class="my-50" name="reach_sec" type="text" id="reach_sec"
                                                value="{{ $exam->reach_sec }}" size="3" />
                                            sec(s) of stage
                                            <input class="my-50" name="stage" type="text" id="stage" value="{{ $exam->stage }}"
                                                size="2" />
                                            equivalent to
                                            <input class="my-50" name="mets" type="text" id="mets" value="{{ $exam->mets }}"
                                                size="3" />
                                            mets. Baseline <br> heart rate was
                                            <input class="my-50" name="heart_rate" type="text" id="heart_rate"
                                                value="{{ $exam->heart_rate }}" size="3" />
                                            BPM and the patient attained a maximum heart rate of
                                            <input class="my-50" name="max_heartrate" type="text" id="max_heartrate"
                                                value="{{ $exam->max_heartrate }}" size="3" />
                                            bpm which was
                                            <input class="my-50" name="bpm_equiv" type="text" id="bpm_equiv"
                                                value="{{ $exam->bpm_equiv }}" size="1" />
                                            %
                                            of that predicted <br> for maximal heart rate for the patient's age. Starting BP
                                            was
                                            <input class="my-50" name="starting_bp" type="text" id="starting_bp"
                                                value="{{ $exam->starting_bp }}" size="5" />
                                            and maximum BP during exercise <br> was
                                            <input class="my-50" name="max_bp" type="text" id="max_bp" value="{{ $exam->max_bp }}"
                                                size="5" />
                                            Double product is equal to
                                            <input class="my-50" name="double_prod" type="text" id="double_prod"
                                                value="{{ $exam->double_prod }}" size="5" />
                                            . ECG response to exercise showed
                                            <input class="my-50" name="ecg" type="text" id="ecg" value="{{ $exam->ecg }}"
                                                size="5" />
                                            Exercise <br> capacity was
                                            <input class="my-50" name="capacity" type="text" id="capacity"
                                                value="{{ $exam->capacity }}" size="10" />
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
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal" @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" @php echo $exam->remarks_status == "findings" ? "checked" : null @endphp>With Findings
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Findings</label>
                                            <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                id="" cols="30" rows="6">{{$exam->remarks}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Recommendation</label>
                                            <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                id="" cols="30" rows="6">{{$exam->recommendation}}</textarea>
                                        </div>
                                        </td>
                                        </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tr>
                                    <td align="left">
                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                            <tr>
                                                <td width="16%"><b>Cardiologist: </b></td>
                                                <td width="84%">
                                                    <div class="col-md-8">
                                                        <select required name="technician_id" id="technician_id"
                                                            class="form-control">
                                                            @foreach($cardiologists as $cardiologist)
                                                                <option value={{$cardiologist->id}} {{$cardiologist->id == $exam->technician_id ? "selected" : null}}>{{$cardiologist->firstname}} {{$cardiologist->lastname}} {{$cardiologist->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            </td>
                            </tr>
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
    @endsection
