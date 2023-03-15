<div class="row my-2">
    <div class="col-6">
        <a href="/edit_cardiovascular?id={{$exam_cardio->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_cardiovascular_print?id={{$exam_cardio->admission_id}}").print()'
            class="btn btn-dark btn-solid">Print</button>
    </div>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2"
    class="table table-bordered table-responsive">
    <tbody>
        <tr>
            <td align="center" width="21%">
                <b>Past
                    Medical
                    History</b>
            </td>
            <td align="center" colspan="6">
                {{$exam_cardio->pasthistory}}
            </td>
        </tr>
        <tr>
            <td align="center" width="21%">
                <b>Medications/Maintenance</b>
            </td>
            <td align="center" colspan="6">
                {{$exam_cardio->medmaint}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Smoking
                    History</b>
            </td>
            <td align="center" colspan="6">
                {{$exam_cardio->smoking}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Alcohol
                    Intake</b>
            </td>
            <td align="center" colspan="6">
                {{$exam_cardio->alcohol}}
            </td>
        </tr>
        <tr>
            <td align="center" colspan="12">
                <b>VITAL
                    SIGNS</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="14%">
                <b>Height
                    (cm)</b>
            </td>
            <td align="center" width="10%">
                {{$exam_cardio->height}}
            </td>
            <td align="center" width="14%">
                <b>Weight
                    (kg) </b>
            </td>
            <td align="center" width="11%">
                {{$exam_cardio->weight}}
            </td>
            </td>
            <td align="center" width="13%">
                <b>Resting
                    BP</b>
            </td>
            <td align="center" width="17%">
                {{$exam_cardio->bp}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><b>BMI</b></td>
            <td align="center">
                {{$exam_cardio->bmi}}
            </td>
            <td align="center"><b>Respiratory
                    Rate</b>
            </td>
            <td align="center">
                {{$exam_cardio->rhythm}}
            </td>
            <td align="center"><b>Heart Rate</b>
            </td>
            <td align="center">
                {{$exam_cardio->hr}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr class="my-2">
            <td align="center"><b>HEENT</b></td>
            <td colspan="6" align="center">
                {{$exam_cardio->heent}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Cardiac
                    Findings</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->cardiac}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Lung
                    Findings</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->lung}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Other
                    Findings</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->other}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>12 LEAD
                    ECG</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->egc}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>2D
                    Echocardiogram</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->echo}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Stress
                    Test</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->stress}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>TSE</b></td>
            <td colspan="6" align="center">
                {{$exam_cardio->tse}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Other
                    Test/s</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->othertest}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Cardiac Risk
                    Factor</b></td>
            <td colspan="6" align="center">
                {{$exam_cardio->crf}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Impression</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->impression}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Remarks</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->remarks}}
            </td>
        </tr>
        <tr>
            <td align="center">
                <b>Recommendation/s</b>
            </td>
            <td colspan="6" align="center">
                {{$exam_cardio->recommendations}}
            </td>
        </tr>
    </tbody>
</table>