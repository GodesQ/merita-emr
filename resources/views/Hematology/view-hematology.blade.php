<div class="row my-1">
    <div class="col-6">
        <a href="/edit_hematology?id={{$examlab_hema->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_hematology_print?id={{$examlab_hema->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0" cellpadding="2"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr class="brdAll">
            <td align="center" colspan="2"
                class="brdBtm">
                <b>EXAMINATION</b>
            </td>
            <td align="center" width="601"
                class="brdBtm">
                <b>RESULTS</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                <p>Hemoglobin</p>
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->hemoglobin}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                Hematocrit </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->hematocrit}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">RBC
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->rbc}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">WBC
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->wbc}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Neutrophil<br>
                </p>
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->neuthrophils}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Lymphocyte
                </p>
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->lymphocytes}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Eosinophil
                </p>
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->eosinophils}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                &nbsp;&nbsp;&nbsp;&nbsp;Monocyte
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->monophils}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                &nbsp;&nbsp;&nbsp;&nbsp;Basophil
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->baspophils}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                &nbsp;&nbsp;&nbsp;&nbsp;Stabs
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->stabs}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                Blood
                Type</td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->blood}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll"> Rh
                Factor</td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->rhfactor}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                Platelet
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->platelet}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                Bleeding
                Time</td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->bleeding}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                Clotting
                Time</td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->clotting}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">ESR
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->esr}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">MCV
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->mcv}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">MCH
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->mch}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">MCHC
            </td>
            <td align="center" valign="top"
                class="brdAll">
                {{$examlab_hema->mchc}}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"
                valign="top" class="brdAll">
                OTHERS:
                {{$examlab_hema->others}}
            </td>
            <td align="center" valign="bottom"
                class="brdAll">
                {{$examlab_hema->others_result}}
            </td>
        </tr>
    </tbody>
</table>