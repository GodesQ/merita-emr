<div class="row my-2">
    <div class="col-6">
        <a href="edit_ecg?id={{$exam_ecg->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_ecg_print?id={{$exam_ecg->admission_id}}").print()'
            class="btn btn-dark btn-solid">Print</button>
    </div>
</div>
<table width="100%" cellspacing="2"
    cellpadding="2"
    class="table tabled-bordered">
    <tbody>
        <tr>
            <td align="center" width="12%">
                <b>Otoscopy:</b>
            </td>
            <td align="center" width="88%">
                {{$exam_ecg->otoscopy}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Heart:</b>
            </td>
            <td align="center">
                {{$exam_ecg->heart}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Lung:</b></td>
            <td align="center">
                {{$exam_ecg->lung}}
            </td>
        </tr>
        <tr>
            <td colspan="2"><b>ECG Result:</b>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                {{$exam_ecg->ecg}}
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"
                valign="top">
                <b>Remarks
                </b><br>
                {{$exam_ecg->remarks}}
            </td>
        </tr>
    </tbody>
</table>