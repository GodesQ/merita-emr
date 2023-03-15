<div class="row my-1">
    <div class="col-6">
        <a href="edit_hiv?id={{$examlab_hiv->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_hiv_print?id={{$examlab_hiv->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0" class="table">
    <tbody>
        <tr>
            <td colspan="3"><b>EXAMINATION
                    DONE:</b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                {{$examlab_hiv->exam}}
            </td>
            <td width="45%">
                {{$examlab_hiv->others}}
            </td>
        </tr>
        <tr>
            <td width="25%"><b>Result</b></td>
            <td colspan="2">
                {{$examlab_hiv->result}}</td>
        </tr>
        <tr>
            <td><b>HIV Proficiency Cert. <br>
                    Expiry Date</b></td>
            <td colspan="2">
                {{$examlab_hiv->expiry_date}}
            </td>
        </tr>
    </tbody>
</table>