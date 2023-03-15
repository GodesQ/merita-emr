<div class="row my-1">
    <div class="col-6">
        <a href="edit_echoplain?id={{$exam_echoplain->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_echoplain_print?id={{$exam_echoplain->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2"
    class="table-bordered table">
    <tbody>
        <tr>
            <td align="center" width="18%">
                <b>Referring
                    MD </b>
            </td>
            <td align="center" colspan="7">
                {{$exam_echoplain->referring_md}}
            </td>
        </tr>
        <tr>
            <td align="center" width="18%">
                <b>Clinical
                    Diagnostic</b>
            </td>
            <td align="center" colspan="7">
                {{$exam_echoplain->clinical_diagnostic}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Height (cm)
                </b>
            </td>
            <td align="center" width="8%">
                {{$exam_echoplain->height}}
            </td>
            <td align="center" width="17%">
                <b>Weight
                    (kg) </b>
            </td>
            <td align="center" width="8%">
                {{$exam_echoplain->weight}}</td>
            <td align="center" width="12%">
                <b>BP</b>
            </td>
            <td align="center" width="8%">
                {{$exam_echoplain->bp}}</td>
            <td align="center"><b>HR</b>
            </td>
            <td align="center">
                {{$exam_echoplain->hr}}</td>
        </tr>
        <tr>
            <td align="center"><b>Study No. </b>
            </td>
            <td align="center">
                {{$exam_echoplain->study_no}}
            </td>
            <td align="center">
                <b>DVD No.</b>
            </td>
            <td align="center">
                {{$exam_echoplain->dvd_no}}</td>
            <td align="center"><b>Rhythm</b>
            </td>
            <td align="center">
                {{$exam_echoplain->rhythm}}</td>

        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="0"
    cellspacing="0" id="brdTable"
    class="table table-bordered my-2">
    <tbody>
        <tr>
            <td align="center" colspan="10">
                <b>QUANTITATIVE
                    MEASUREMENT</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="11%">
                <b>Dimension</b>
            </td>
            <td align="center" width="11%">
                <b>Measurement</b>
            </td>
            <td align="center" width="13%">
                <b>Normal</b>
            </td>
            <td align="center" width="12%">
                <b>Dimension</b>
            </td>
            <td align="center" width="11%">
                <b>Measurement</b>
            </td>
            <td align="center" colspan="2">
                <b>Simposon's</b>
            </td>
            <td align="center" colspan="3">
                <b>Normal</b>
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LV
                (ed)
            </td>
            <td align="center"
                class="{{$exam_echoplain->lved < '3.9' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->lved}}</td>
            <td align="center">(3.9 - 5.2)</td>
            <td align="center" align="left">
                LVEDV
            </td>
            <td align="center">
                {{$exam_echoplain->lvedv}}</td>
            <td align="center" colspan="2">
                {{$exam_echoplain->lvedv_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LV
                (es)
            </td>
            <td align="center">
                {{$exam_echoplain->lves}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">
                LVESV
            </td>
            <td align="center">
                {{$exam_echoplain->lvesv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echoplain->lvesv_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">IVS
                (ed)
            </td>
            <td align="center"
                class="{{$exam_echoplain->ivsed < '0.8' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->ivsed}}</td>
            <td align="center">(0.8 - 1.1)</td>
            <td align="center" align="left">
                Stroke
                Volume</td>
            <td align="center">
                {{$exam_echoplain->sv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echoplain->sv_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">IVS
                (es)
            </td>
            <td align="center">
                {{$exam_echoplain->ivses}}</td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">
                Cardiac
                Output</td>
            <td align="center">
                {{$exam_echoplain->co}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echoplain->co_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LVPW
                (ed)
            </td>
            <td align="center"
                class="{{$exam_echoplain->lvpwed < '0.8' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->lvpwed}}
            </td>
            <td align="center">(0.8 - 1.1)</td>
            <td align="center" align="left">EF
            </td>
            <td align="center">
                {{$exam_echoplain->ef}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_echoplain->ef_simp < '55' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->ef_simp}}
            </td>
            <td align="center" colspan="3">(55 -
                77)
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LVPW
                (es)
            </td>
            <td align="center">
                {{$exam_echoplain->lvpwes}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">FS
            </td>
            <td align="center">
                {{$exam_echoplain->fs}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_echoplain->fs_simp < '29' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->fs_simp}}
            </td>
            <td align="center" colspan="3">(29 -
                42)
            </td>
        </tr>
        <tr>
            <td align="center" align="left">
                Aorta
            </td>
            <td align="center"
                class="{{$exam_echoplain->aorta < '2.3' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->aorta}}</td>
            <td align="center">(2.3 - 3.5)</td>
            <td align="center" align="left">VCF
            </td>
            <td align="center">
                {{$exam_echoplain->vcf}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_echoplain->vcf_simp < '0.5' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->vcf_simp}}
            </td>
            <td align="center" colspan="3">(0.5
                -
                1.0)
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LA
                (AP)
            </td>
            <td align="center"
                class="{{$exam_echoplain->laap < '2.6' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->laap}}</td>
            <td align="center">(2.6 - 3.8)</td>
            <td align="center" align="left">LV
                Mass
                1
            </td>
            <td align="center">
                {{$exam_echoplain->lmv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echoplain->lmv_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">MPA
            </td>
            <td align="center">
                {{$exam_echoplain->mpa}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" colspan="7"
                align="left">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LVET
            </td>
            <td align="center">
                {{$exam_echoplain->lvet}}</td>
            <td align="center">&nbsp;</td>
            <td align="center" colspan="2">
                <b>Diastolic
                    Functions</b>
            </td>
            <td align="center" colspan="2">
                <b>Left
                    Atrium</b>
            </td>
            <td align="center" width="12%">
                &nbsp;
            </td>
            <td align="center" width="10%"
                colspan="2">
                <b>Normal</b>
            </td>
        </tr>
        <tr>
            <td align="center" align="left">EPSS
            </td>
            <td align="center"
                class="{{$exam_echoplain->epss > '1.0' ? 'text-danger' : 'null'}}">
                {{$exam_echoplain->epss}}</td>
            <td align="center">( &lt; 1.0)</td>
            <td align="center">DT</td>
            <td align="center">
                {{$exam_echoplain->dt}}
            </td>
            <td align="center" width="12%">L1
            </td>
            <td align="center" width="8%">LVMI
            </td>
            <td align="center"
                class="{{$exam_echoplain->l1 < '49' ? 'text-danger' : null}}">
                {{$exam_echoplain->l1}}
            </td>
            <td align="center" colspan="2">
                (49-115)
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LVOT
            </td>
            <td align="center">
                {{$exam_echoplain->lvot}}</td>
            <td align="center">&nbsp;</td>
            <td align="center">IVRT</td>
            <td align="center">
                {{$exam_echoplain->ivrt}}</td>
            <td align="center">L2</td>
            <td align="center">RWT</td>
            <td align="center">
                {{$exam_echoplain->l2}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">RV
            </td>
            <td align="center"
                class="{{$exam_echoplain->rv < '2.2' ? 'text-danger' : null}}">
                {{$exam_echoplain->rv}}
            </td>
            <td align="center">(2.2 - 4.0)</td>
            <td align="center">PV Flow </td>
            <td align="center">
                {{$exam_echoplain->pvf}}
            </td>
            <td align="center">A1</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_echoplain->a1}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">RA
            </td>
            <td align="center"
                class="{{$exam_echoplain->ra < '3.5' ? 'text-danger' : null}}">
                {{$exam_echoplain->ra}}
            </td>
            <td align="center">(3.5 - 4.5)</td>
            <td align="center">PV E</td>
            <td align="center">
                {{$exam_echoplain->pve}}
            </td>
            <td align="center">A2</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_echoplain->a2}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">MV
                Annulus
            </td>
            <td align="center">
                {{$exam_echoplain->mva}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">PV A</td>
            <td align="center">
                {{$exam_echoplain->pva}}
            </td>
            <td align="center">LA Vol.</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_echoplain->lav}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">TV
                Annulus
            </td>
            <td align="center">
                {{$exam_echoplain->tva}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">PV AR</td>
            <td align="center">
                {{$exam_echoplain->pvar}}</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="2"
    cellpadding="2">
    <tbody>
        <tr>
            <td align="center" align="left">
                <table width="100%"
                    cellspacing="2"
                    cellpadding="2"
                    class="table table-bordered">
                    <tbody>
                        <tr>
                            <td align="center"
                                width="15%">
                                <b>Interpretation</b>
                            </td>
                            <td align="left"
                                width="85%">
                                @php echo nl2br($exam_echoplain->interpretation) @endphp</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" align="left">
                <table width="100%"
                    cellspacing="2"
                    cellpadding="2"
                    class="table table-bordered">
                    <tbody>
                        <tr>
                            <td align="center"
                                width="15%">
                                <b>Conclusion</b>
                            </td>
                            <td align="left"
                                width="85%">
                                @php echo nl2br($exam_echoplain->conclusion) @endphp</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>