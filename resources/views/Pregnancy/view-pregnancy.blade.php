<div class="row my-1">
    <div class="col-6">
        <a href="/edit_pregnancy?id={{$examlab_pregnancy->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_pregnancy_print?id={{$examlab_pregnancy->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0" cellpadding="2"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td align="left"><b>TYPE OF
                    SPECIMEN</b>
            </td>
            <td>{{$examlab_pregnancy->specimen_type}}
            </td>
        </tr>
        <tr>
            <td width="18%" align="left">
                <b>RESULT</b>
            </td>
            <td width="82%">
                {{$examlab_pregnancy->result}}
            </td>
        </tr>
    </tbody>
</table>