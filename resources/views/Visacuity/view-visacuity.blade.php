<div class="row my-1">
    <div class="col-6">
        <a href="edit_visacuity?id={{$exam_visacuity->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_visacuity_print?id={{$exam_visacuity->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2" class="table no-border">
    <tbody>
        <tr>
            <td align="center" colspan="2"
                align="center">
                <b>VISUAL
                    ACUITY</b>
            </td>
            <td align="center" colspan="2"
                align="center"><b>FAR
                    VISION</b></td>
            <td colspan="2" align="center">
                <b>NEAR
                    VISION</b>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td width="18%" align="center">
                <b>OD</b>
            </td>
            <td width="18%" align="center">
                <b>OS</b>
            </td>
            <td width="17%" align="center">
                <b>ODJ</b>
            </td>
            <td width="17%" align="center">
                <b>OSJ</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <b>Uncorrected</b>
            </td>
            <td align="center">
                {{$exam_visacuity->ufvod}}
            </td>
            <td align="center">
                {{$exam_visacuity->ufvos}}
            </td>
            <td align="center">
                {{$exam_visacuity->unvodj}}
            </td>
            <td align="center">
                {{$exam_visacuity->unvosj}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <b>Corrected</b>
            </td>
            <td align="center">
                {{$exam_visacuity->cfvod}}
            </td>
            <td align="center">
                {{$exam_visacuity->cfvos}}
            </td>
            <td align="center">
                {{$exam_visacuity->cnvodj}}
            </td>
            <td align="center">
                {{$exam_visacuity->cnvosj}}
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <tr>
        <td width="10%"><b>Findings</b></td>
        <td>{{$exam_visacuity->remarks}}</td>
    </tr>
    <tr>
        <td width="10%"><b>Recommendation</b></td>
        <td>{{$exam_visacuity->recommendation}}</td>
    </tr>
</table>