<div class="row my-1">
    <div class="col-6">
        <a href="edit_fecalysis?id={{$examlab_feca->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_fecalysis_print?id={{$examlab_feca->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0" cellpadding="2"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td colspan="3" align="left">
                <b>MACROSCOPIC
                    FINDINGS:</b>
            </td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><b>Color</b></td>
            <td width="76%">
                {{$examlab_feca->color}}
            </td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><b>Consistency</b>
            </td>
            <td>{{$examlab_feca->consistency}}
            </td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <b>MICROSCOPIC
                    FINDINGS:</b>
            </td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><b>Pus Cells</b>
            </td>
            <td>{{$examlab_feca->pus}}</td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><b>RBC</b></td>
            <td>{{$examlab_feca->rbc}}</td>
        </tr>
        <tr>
            <td width="5%" align="left">&nbsp;
            </td>
            <td width="19%" align="left">
                <b>Yeast
                    Cells</b>
            </td>
            <td>{{$examlab_feca->yeast}}</td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><strong>Mucus
                    Threads</strong></td>
            <td>{{$examlab_feca->mucus}}</td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><b>Epithelial
                    Cells</b>
            </td>
            <td>{{$examlab_feca->epithelial}}
            </td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><b>Ova /
                    Parasite</b>
            </td>
            <td>{{$examlab_feca->ova}}</td>
        </tr>
    </tbody>
</table>