<div class="row my-1">
    <div class="col-6">
        <a href="/edit_hepatitis?id={{$examlab_hepa->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_bloodsero_print?id={{$examlab_hepa->admission_id}}&type=serology", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print Serology Only</button>
        <button
            onclick='window.open("/examlab_bloodsero_print?id={{$examlab_hepa->admission_id}}&type=both", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print Blood & Serology</button>
    </div>
</div>
<table width="100%" border="0" cellpadding="2"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td align="left" class="brdBtm">
                <b>Examination</b>
            </td>
            <td align="left" class="brdBtm">
                <b><b>Result</b></b>
            </td>
            <td align="left" class="brdLeftBtm">
                <p><b>Cut-Off Value</b></p>
            </td>
            <td align="left" class="brdBtm">
                <b>Patient
                    Count</b>
            </td>
        </tr>
        <tr>
            <td width="22%" align="left"
                valign="top">
                HBsAg</td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->hbsag_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->hbsag_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->hbsag_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HBs
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihbs_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbs_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbs_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">HBeAg
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->hbeag_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->hbeag_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->hbeag_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HBe
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihbe_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbe_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbe_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HBc
                (lgM):</td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihbclgm_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbclgm_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbclgm_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HBc
                (lgG)
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihbclgg_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbclgg_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihbclgg_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HAV
                (lgM)
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihavlgm_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihavlgm_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihavlgm_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HAV
                (lgG)
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihavlgg_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihavlgg_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihavlgg_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                Anti-HCV
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->antihcv_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihcv_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->antihcv_value}}
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">Others
            </td>
            <td width="38%" class="brdLeft">
                {{$examlab_hepa->others_result}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->others_cutoff}}
            </td>
            <td width="20%" class="brdLeft">
                {{$examlab_hepa->others_value}}
            </td>
        </tr>
    </tbody>
</table>