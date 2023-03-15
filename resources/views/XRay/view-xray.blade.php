<div class="row my-1">
    <div class="col-6">
        <a href="edit_xray?id={{$exam_xray->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_xray_print?id={{$exam_xray->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2" class="table no-border">
    <tbody>
        <tr>
            <td width="19%"><b>X-Ray No.</b>
            </td>
            <td width="32%">
                {{$exam_xray->xray_no}}
            </td>
            <td width="49%">&nbsp;</td>
        </tr>
        <tr>
            <td><b>Examination</b></td>
            <td>
                {{$exam_xray->exam}}
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><b>Exam Type</b></td>
            <td>
                {{$exam_xray->exam_type}}
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><b>Exam View</b></td>
            <td>
                {{$exam_xray->exam_view}}
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><b>Findings</b></td>
            <td colspan="2">
                {{$exam_xray->findings}}
            </td>
        </tr>
        <tr>
            <td><b>Impression</b></td>
            <td colspan="2">
                {{$exam_xray->impression}}
            </td>
        </tr>
    </tbody>
</table>