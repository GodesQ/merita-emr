<div class="row my-2">
    <div class="col-6">
        <a href="edit_echodoppler?id={{$exam_echodoppler->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_echodoppler_print?id={{$exam_echodoppler->admission_id}}", "width=800,height=650").print()'
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
                {{$exam_echodoppler->referring_md}}
            </td>
        </tr>
        <tr>
            <td align="center" width="18%">
                <b>Clinical
                    Diagnostic</b>
            </td>
            <td align="center" colspan="7">
                {{$exam_echodoppler->clinical_diagnostic}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Height (cm)
                </b>
            </td>
            <td align="center" width="8%">
                {{$exam_echodoppler->height}}
            </td>
            <td align="center" width="17%">
                <b>Weight
                    (kg) </b>
            </td>
            <td align="center" width="8%">
                {{$exam_echodoppler->weight}}
            </td>
            <td align="center" width="12%">
                <b>BP</b>
            </td>
            <td align="center" width="8%">
                {{$exam_echodoppler->bp}}</td>
            <td align="center"><b>HR</b>
            </td>
            <td align="center">
                {{$exam_echodoppler->hr}}</td>
        </tr>
        <tr>
            <td align="center"><b>Study No. </b>
            </td>
            <td align="center">
                {{$exam_echodoppler->study_no}}
            </td>
            <td align="center">
                <b>DVD No.</b>
            </td>
            <td align="center">
                {{$exam_echodoppler->dvd_no}}
            </td>
            <td align="center"><b>Rhythm</b>
            </td>
            <td align="center">
                {{$exam_echodoppler->rhythm}}
            </td>

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
                class="{{$exam_echodoppler->lved < '3.9' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->lved}}</td>
            <td align="center">(3.9 - 5.2)</td>
            <td align="center" align="left">
                LVEDV
            </td>
            <td align="center">
                {{$exam_echodoppler->lvedv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echodoppler->lvedv_simp}}
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
                {{$exam_echodoppler->lves}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">
                LVESV
            </td>
            <td align="center">
                {{$exam_echodoppler->lvesv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echodoppler->lvesv_simp}}
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
                class="{{$exam_echodoppler->ivsed < '0.8' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->ivsed}}
            </td>
            <td align="center">(0.8 - 1.1)</td>
            <td align="center" align="left">
                Stroke
                Volume</td>
            <td align="center">
                {{$exam_echodoppler->sv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echodoppler->sv_simp}}
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
                {{$exam_echodoppler->ivses}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">
                Cardiac
                Output</td>
            <td align="center">
                {{$exam_echodoppler->co}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echodoppler->co_simp}}
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
                class="{{$exam_echodoppler->lvpwed < '0.8' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->lvpwed}}
            </td>
            <td align="center">(0.8 - 1.1)</td>
            <td align="center" align="left">EF
            </td>
            <td align="center">
                {{$exam_echodoppler->ef}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_echodoppler->ef_simp < '55' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->ef_simp}}
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
                {{$exam_echodoppler->lvpwes}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">FS
            </td>
            <td align="center">
                {{$exam_echodoppler->fs}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_echodoppler->fs_simp < '29' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->fs_simp}}
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
                class="{{$exam_echodoppler->aorta < '2.3' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->aorta}}
            </td>
            <td align="center">(2.3 - 3.5)</td>
            <td align="center" align="left">VCF
            </td>
            <td align="center">
                {{$exam_echodoppler->vcf}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_echodoppler->vcf_simp < '0.5' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->vcf_simp}}
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
                class="{{$exam_echodoppler->laap < '2.6' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->laap}}</td>
            <td align="center">(2.6 - 3.8)</td>
            <td align="center" align="left">LV
                Mass
                1
            </td>
            <td align="center">
                {{$exam_echodoppler->lmv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_echodoppler->lmv_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">MPA
            </td>
            <td align="center">
                {{$exam_echodoppler->mpa}}
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
                {{$exam_echodoppler->lvet}}</td>
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
                class="{{$exam_echodoppler->epss > '1.0' ? 'text-danger' : 'null'}}">
                {{$exam_echodoppler->epss}}</td>
            <td align="center">( &lt; 1.0)</td>
            <td align="center">DT</td>
            <td align="center">
                {{$exam_echodoppler->dt}}
            </td>
            <td align="center" width="12%">L1
            </td>
            <td align="center" width="8%">LVMI
            </td>
            <td align="center"
                class="{{$exam_echodoppler->l1 < '49' ? 'text-danger' : null}}">
                {{$exam_echodoppler->l1}}
            </td>
            <td align="center" colspan="2">
                (49-115)
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LVOT
            </td>
            <td align="center">
                {{$exam_echodoppler->lvot}}</td>
            <td align="center">&nbsp;</td>
            <td align="center">IVRT</td>
            <td align="center">
                {{$exam_echodoppler->ivrt}}</td>
            <td align="center">L2</td>
            <td align="center">RWT</td>
            <td align="center">
                {{$exam_echodoppler->l2}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">RV
            </td>
            <td align="center"
                class="{{$exam_echodoppler->rv < '2.2' ? 'text-danger' : null}}">
                {{$exam_echodoppler->rv}}
            </td>
            <td align="center">(2.2 - 4.0)</td>
            <td align="center">PV Flow </td>
            <td align="center">
                {{$exam_echodoppler->pvf}}
            </td>
            <td align="center">A1</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_echodoppler->a1}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">RA
            </td>
            <td align="center"
                class="{{$exam_echodoppler->ra < '3.5' ? 'text-danger' : null}}">
                {{$exam_echodoppler->ra}}
            </td>
            <td align="center">(3.5 - 4.5)</td>
            <td align="center">PV E</td>
            <td align="center">
                {{$exam_echodoppler->pve}}
            </td>
            <td align="center">A2</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_echodoppler->a2}}
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
                {{$exam_echodoppler->mva}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">PV A</td>
            <td align="center">
                {{$exam_echodoppler->pva}}
            </td>
            <td align="center">LA Vol.</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_echodoppler->lav}}
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
                {{$exam_echodoppler->tva}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">PV AR</td>
            <td align="center">
                {{$exam_echodoppler->pvar}}</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="0"
    cellspacing="0" id="brdTable"
    class="table table-bordered my-1">
    <tbody>
        <tr>
            <td align="center" colspan="8">
                <b>SPECTRAL
                    AND COLOR
                    FLOW DOPPLER</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="17%"
                rowspan="2" valign="bottom">
                <b>VALVE</b>
            </td>
            <td align="center" width="15%"
                rowspan="2">
                <p><b>MAX VELOCITY<br>
                        m/sec</b></p>
            </td>
            <td align="center" width="14%"
                rowspan="2">
                <b>PEAK
                    GRADIENT<br>
                    mm Hg
                </b>
            </td>
            <td align="center" width="14%"
                rowspan="2">
                <b>ORIFIC
                    AREA<br>
                    cm2
                </b>
            </td>
            <td align="center" width="9%"
                rowspan="2">
                <b>VTI</b>
            </td>
            <td align="center" colspan="3">
                <b>REGURGITATION</b>
            </td>
        </tr>
        <tr>
            <td align="center" width="11%">
                <b>Ratio</b>
            </td>
            <td align="center" width="10%">
                <b>Jet
                    Area</b>
            </td>
            <td align="center" width="10%">
                <b>Gradient</b>
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Aortic
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_mv}}
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_pg}}
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_oa}}
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_vti}}
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_rr}}
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_rja}}
            </td>
            <td align="center">
                {{$exam_echodoppler->aortic_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Mitral
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_mv}}
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_pg}}
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_oa}}
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_vti}}
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_vti}}
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_rja}}
            </td>
            <td align="center">
                {{$exam_echodoppler->mitral_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Tricuspid</td>
            <td align="center">
                {{$exam_echodoppler->tri_mv}}
            </td>
            <td align="center">
                {{$exam_echodoppler->tri_pg}}
            </td>
            <td align="center">
                {{$exam_echodoppler->tri_oa}}
            </td>
            <td align="center">
                {{$exam_echodoppler->tri_vti}}
            </td>
            <td align="center">
                {{$exam_echodoppler->tri_rr}}
            </td>
            <td align="center">
                {{$exam_echodoppler->tri_rja}}
            </td>
            <td align="center">
                {{$exam_echodoppler->tri_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Pulmonic
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_mv}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_pg}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_oa}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_vti}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_rr}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_rja}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pul_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">PA
                Pressure</td>
            <td align="center">
                {{$exam_echodoppler->pp_mv}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pp_pg}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pp_oa}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pp_vti}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pp_rr}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pp_rja}}
            </td>
            <td align="center">
                {{$exam_echodoppler->pp_rg}}
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
                                @php echo nl2br($exam_echodoppler->interpretation) @endphp</textarea>
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
                                @php echo nl2br($exam_echodoppler->conclusion) @endphp</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>