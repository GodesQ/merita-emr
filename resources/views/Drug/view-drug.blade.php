<div class="row my-1">
    <div class="col-6">
        <a href="edit_drug?id={{$examlab_drug->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_drug_print?id={{$examlab_drug->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0"
    class="table table-bordered">
    <tbody>
        <tr>
            <td><b>Report No.</b></td>
            <td>{{$examlab_drug->reportno}}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="19%"><b>Purpose</b></td>
            <td width="31%">
                {{$examlab_drug->purpose}}
            </td>
            <td width="18%"><b>Method</b></td>
            <td width="32%">
                {{$examlab_drug->method}}
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="right">
                <b>Methamphetamine</b>
            </td>
            <td>{{$examlab_drug->methamphetamine}}
            </td>
            <td align="right">
                <b>Barbiturates</b>
            </td>
            <td>{{$examlab_drug->barbiturates}}
            </td>
        </tr>
        <tr>
            <td align="right">
                <b>Tetrahydrocannabinol</b>
            </td>
            <td>{{$examlab_drug->tetrahydrocannabinol}}
            </td>
            <td align="right">
                <b>Ecstacy(MDMA)</b>
            </td>
            <td>{{$examlab_drug->ecstacy}}</td>
        </tr>
        <tr>
            <td align="right"><b>Morphine</b>
            </td>
            <td>{{$examlab_drug->morphine}}</td>
            <td width="18%" colspan="-2"
                align="right">
                <b>
                    Benzodiazepine </b>
            </td>
            <td width="32%" colspan="-2">
                {{$examlab_drug->benzodiazepine}}
            </td>
        </tr>
        <tr>
            <td align="right"><b>Cocaine</b>
            </td>
            <td>{{$examlab_drug->cocaine}}</td>
            <td align="right"><b>Opiates</b>
            </td>
            <td>{{$examlab_drug->opiapes}}</td>
        </tr>
        <tr>
            <td colspan="-2" align="right"><b>
                    Phencyclidine</b>
            </td>
            <td colspan="-2">
                {{$examlab_drug->phencyclidine}}
            </td>
            <td width="18%" colspan="-2"
                align="right">
                <b>Methadone</b>
            </td>
            <td width="32%" colspan="-2">
                {{$examlab_drug->methadone}}
            </td>
        </tr>
        <tr>
            <td align="right"><b>Alcohol</b>
            </td>
            <td>{{$examlab_drug->alcohol}}</td>
            <td width="18%" colspan="-2"
                align="right">
                <b>
                    Metaqualone</b>
            </td>
            <td width="32%" colspan="-2">
                {{$examlab_drug->metaqualone}}
            </td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">
                <b>Propoxyphene</b>
            </td>
            <td>{{$examlab_drug->propoxyphene}}
            </td>
        </tr>
    </tbody>
</table>