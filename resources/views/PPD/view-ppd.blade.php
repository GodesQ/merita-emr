<div class="row my-1">
    <div class="col-6">
        <a href="edit_ppd?id={{$exam_ppd->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_ppd_print?id={{$exam_ppd->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2" class="table no-border">
    <tbody>
        <tr>
            <td align="center" width="17%">
                <b>RESULT</b>
            </td>
            <td align="center" width="83%">
                {{$exam_ppd->result}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>REMARKS</b>
            </td>
            <td align="center">
                {{$exam_ppd->remarks}}</td>
        </tr>
    </tbody>
</table>