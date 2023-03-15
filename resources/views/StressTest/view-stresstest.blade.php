<div class="row my-1">
    <div class="col-6">
        <a href="/edit_stresstest?id={{$exam_stresstest->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_stresstest_print?id={{$exam_stresstest->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" class="table table-borded">
    <tbody>
        <tr>
            <td align="center" width="94"
                align="left">
                <b>Medications: </b>
            </td>
            <td align="center" width="246"
                align="left">
                {{$exam_stresstest->medication}}
            </td>
            <td align="center" width="119"
                align="left">
                <b>Indication:</b>
            </td>
            <td align="center" width="321"
                align="left">
                {{$exam_stresstest->indication}}
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="0"
    cellspacing="0"
    class="table table-bordered">
    <tbody>
        <tr>
            <td align="center" colspan="12"
                align="center"></td>
        </tr>
        <tr>
            <td align="center" width="9%"
                align="center">
                <b>Stage
                    Number</b>
            </td>
            <td align="center" width="8%"
                align="center"><b>Time <br>
                    (min:sec)</b>
            </td>
            <td align="center" width="10%"
                align="center">
                <b>Speed <br>
                    (km/h)</b>
            </td>
            <td align="center" width="7%"
                align="center">
                <b>Grade <br>
                    (%)</b>
            </td>
            <td align="center" width="9%"
                align="center">
                <b>Workload <br>
                    (METs)</b>
            </td>
            <td align="center" width="7%"
                align="center"><b>HR <br>
                    (bpm)</b></td>
            <td align="center" width="7%"
                align="center"><b>BP <br>
                    (mmHg)</b></td>
            <td align="center" width="7%"
                align="center"><b>RPP <br>
                    (*100)</b></td>
            <td align="center" width="7%"
                align="center">
                <b>VE</b>
            </td>
            <td align="center" width="7%"
                align="center">
                <b>SVE</b>
            </td>
            <td align="center" width="7%"
                align="center"><b>ST II <br>
                    (mm)</b></td>
            <td align="center" width="15%"
                align="center">
                <b>Comment</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Pre-Exercise</b>
            </td>
            <td align="center" width="8%"
                align="center">

            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->exercise_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->exercise_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_hr}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->exercise_bp}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->exercise_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    1</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage1_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage1_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage1_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_hr}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage1_bp}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage1_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    2</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage2_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage2_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage2_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_hr}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage2_bp}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage2_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    3</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage3_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage3_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage3_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_hr}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_bp}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage3_bp}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage3_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    4</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage4_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage4_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage4_mets}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage4_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    5</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage5_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage5_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage5_mets}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage5_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    6</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage6_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage6_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_speed}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage6_mets}}
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage6_remarks}}
            </td>
        </tr>
        <tr>
            <td align="center" width="9%"
                height="31" align="center">
                <b>Stage
                    7</b>
            </td>
            <td align="center" width="8%"
                align="center">
                {{$exam_stresstest->stage7_speed}}
            </td>
            <td align="center" width="10%"
                align="center">
                {{$exam_stresstest->stage7_speed}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage7_grade}}
            </td>
            <td align="center" width="9%"
                align="center">
                {{$exam_stresstest->stage7_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage7_mets}}
            </td>
            <td align="center" width="7%"
                align="center">
                {{$exam_stresstest->stage7_mets}}
            </td>
            <td align="center" width="7%"
                align="center">&nbsp;
            </td>
            <td align="center" width="7%"
                align="center">&nbsp;
            </td>
            <td align="center" width="7%"
                align="center">&nbsp;
            </td>
            <td align="center" width="7%"
                align="center">&nbsp;
            </td>
            <td align="center" width="15%"
                align="center">
                {{$exam_stresstest->stage7_remarks}}
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="2"
    cellspacing="2"
    class="table table-bordered table-responsive">
    <tbody>
        <tr>
            <td align="center" colspan="6">
                <b>RECOVERY/POST
                    EXERCISE</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="5%"
                align="center">
                <b>Stage
                    Number</b>
            </td>
            <td align="center" width="5%"
                align="center">
                <b>Immediately
                    After</b>
            </td>
            <td align="center" width="5%"
                align="center"><b>1
                    minute</b></td>
            <td align="center" width="5%"
                align="center"><b>3
                    minutes</b></td>
            <td align="center" width="5%"
                align="center"><b>5
                    minutes</b></td>
            <td align="center" width="5%"
                align="center"><b>8
                    minutes</b></td>
        </tr>
        <tr>
            <td align="center" height="30"
                colspan="0" align="center">
                <b>BP</b>
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->bp_after}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->bp_1min}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->bp_3mins}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->bp_5mins}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->bp_8mins}}
            </td>
        </tr>
        <tr>
            <td align="center" height="22"
                colspan="0" align="center">
                <b>HR</b>
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->hr_after}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->hr_1min}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->hr_3min}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->hr_5min}}
            </td>
            <td align="center" align="center">
                {{$exam_stresstest->hr_8min}}
            </td>
        </tr>
        <tr>
            <td align="center" width="20%"
                height="27" align="center">
                <p><b><u>RESTING ECG:</u></b>
                </p>
            </td>
            <td align="center" colspan="5">
                {{$exam_stresstest->resting_ecg}}
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="2"
    cellpadding="2">
    <tbody>
        <tr>
            <td align="center" height="27"
                colspan="6">
                <p><u><b>Response
                            Exercise:</b></u>
                </p>
                <u><b>{{$exam_stresstest->symptoms}}</b></u>
                -limited treadmill exercise test
                was
                performed
                using
                the
                <u><b>{{$exam_stresstest->exercise_type}}</b></u>
                Patient reached
                <u><b>{{$exam_stresstest->reach_min}}</b></u>
                min(s)
                <u><b>{{$exam_stresstest->reach_sec}}</b></u>
                sec(s) of stage
                <u><b>{{$exam_stresstest->stage}}</b></u>
                equivalent to
                <u><b>{{$exam_stresstest->mets}}</b></u>
                mets. Baseline heart rate was
                <u><b>{{$exam_stresstest->heart_rate}}</b></u>
                BPM and the patient attained a
                maximum
                heart
                rate of
                <u><b>{{$exam_stresstest->max_heartrate}}</b></u>
                bpm which was
                <u><b>{{$exam_stresstest->bpm_equiv}}</b></u>
                %
                of that predicted for maximal
                heart
                rate
                for the
                patient's age. Starting BP was
                <u><b>{{$exam_stresstest->starting_bp}}</b></u>
                and maximum BP during exercise
                was
                <u><b>{{$exam_stresstest->max_bp}}</b></u>
                Double product is equal to
                <u><b>{{$exam_stresstest->double_prod}}</b></u>
                . ECG response to exercise
                showed
                <u><b>{{$exam_stresstest->ecg}}</b></u>
                Exercise capacity was
                <u><b>{{$exam_stresstest->capacity}}</b></u>
                .
            </td>
        </tr>
    </tbody>
</table>