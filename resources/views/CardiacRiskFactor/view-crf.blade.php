<div class="col-6 my-2">
    <a href='edit_crf?id={{$exam_crf->admission_id}}'
        class="btn btn-solid btn-primary">Edit</a>
    <button
        onclick='window.open("/exam_crf_print?id={{$exam_crf->admission_id}}").print()'
        class="btn btn-dark btn-solid">Print</button>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td align="center" width="23%">
                &nbsp;
            </td>
            <td align="center" width="19%">
                <b>RESULT
                </b>
            </td>
            <td colspan="2"><b>POINTS OF
                    RISK
                    FACTOR </b></td>
        </tr>
        <tr>
            <td align="center"><b>1. AGE</b>
            </td>
            <td align="center">
                {{$exam_crf->age_result}}
            </td>
            <td align="center" width="19%">
                {{$exam_crf->age_points}}
            </td>
            <td align="center" width="38%">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center"><b>2.
                    HDL-C</b>
            </td>
            <td align="center">
                {{$exam_crf->hdl_result  }}
            </td>
            <td align="center">
                {{$exam_crf->hdl_points}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><b>3. TOTAL-
                    C
                </b>
            </td>
            <td align="center">
                {{$exam_crf->total_result}}
            </td>
            <td align="center">
                {{$exam_crf->total_points}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><b>4. SBP</b>
            </td>
            <td align="center">
                {{$exam_crf->sbp_result}}
            </td>
            <td align="center">
                {{$exam_crf->sbp_points}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><b>5.
                    SMOKER</b>
            </td>
            <td align="center">
                @if($exam_crf->smoker_result
                ==
                '(-)')
                Negative
                @else
                Positive
                @endif
            </td>
            <td align="center">
                {{$exam_crf->smoker_points}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><b>6.
                    DIABETES
                </b>
            </td>
            <td align="center">
                @if($exam_crf->diabetes_result
                ==
                '(-)')
                Negative
                @else
                Positive
                @endif
            </td>
            <td align="center">
                {{$exam_crf->diabetes_points}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><b>7.
                    ECG-LVH</b>
            </td>
            <td align="center">
                @if($exam_crf->ecg_result ==
                '(-)')
                Negative
                @else
                Positive
                @endif
            </td>
            <td align="center">
                {{$exam_crf->ecg_points}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <b>PROBABILITY</b>
            </td>
            <td align="center">
                {{$exam_crf->probability}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="0"
    cellpadding="2" class="table no-border">
    <tbody>
        <tr>
            <td align="center" colspan="5">
                <b>SPIROMETRY
                    RESULTS</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="182">
                &nbsp;
            </td>
            <td align="center" width="169">
                <b>Predicted</b>
            </td>
            <td align="center" width="162">
                <b>Actual</b>
            </td>
            <td align="center" width="171">
                <b>Percentage</b>
            </td>
            <td align="center" width="96">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center">FEV 1 </td>
            <td align="center">
                {{$exam_crf->fev1_predicted}}
            </td>
            <td align="center">
                {{$exam_crf->fev1_actual}}
            </td>
            <td align="center">
                {{$exam_crf->fev1_perc}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">FVC </td>
            <td align="center">
                {{$exam_crf->fvc_predicted}}
            </td>
            <td align="center">
                {{$exam_crf->fvc_actual}}
            </td>
            <td align="center">
                {{$exam_crf->fvc_perc}}</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">FEV1/ FVC %
            </td>
            <td align="center">
                {{$exam_crf->fev1fvc_predicted}}
            </td>
            <td align="center">
                {{$exam_crf->fev1fvc_actual}}
            </td>
            <td align="center">
                {{$exam_crf->fev1fvc_perc}}
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">RESULT</td>
            <td align="center">
                {{$exam_crf->result}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
    </tbody>
</table>