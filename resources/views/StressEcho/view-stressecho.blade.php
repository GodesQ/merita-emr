<div class="row my-1">
    <div class="col-6">
        <a href="/edit_stressecho?id={{$exam_stressecho->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_stress_echo_print?id={{$exam_stressecho->admission_id}}", "width=800,height=650").print()'
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
                {{$exam_stressecho->referring_md}}
            </td>
        </tr>
        <tr>
            <td align="center" width="18%">
                <b>Clinical
                    Diagnostic</b>
            </td>
            <td align="center" colspan="7">
                {{$exam_stressecho->clinical_diagnostic}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Height (cm)
                </b>
            </td>
            <td align="center" width="8%">
                {{$exam_stressecho->height}}
            </td>
            <td align="center" width="17%">
                <b>Weight
                    (kg) </b>
            </td>
            <td align="center" width="8%">
                {{$exam_stressecho->weight}}
            </td>
            <td align="center" width="12%">
                <b>BP</b>
            </td>
            <td align="center" width="8%">
                {{$exam_stressecho->bp}}</td>
            <td align="center"><b>HR</b>
            </td>
            <td align="center">
                {{$exam_stressecho->hr}}</td>
        </tr>
        <tr>
            <td align="center"><b>Study No. </b>
            </td>
            <td align="center">
                {{$exam_stressecho->study_no}}
            </td>
            <td align="center">
                <b>DVD No.</b>
            </td>
            <td align="center">
                {{$exam_stressecho->dvd_no}}
            </td>
            <td align="center"><b>Rhythm</b>
            </td>
            <td align="center">
                {{$exam_stressecho->rhythm}}
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
                class="{{$exam_stressecho->lved < '3.9' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->lved}}</td>
            <td align="center">(3.9 - 5.2)</td>
            <td align="center" align="left">
                LVEDV
            </td>
            <td align="center">
                {{$exam_stressecho->lvedv}}</td>
            <td align="center" colspan="2">
                {{$exam_stressecho->lvedv_simp}}
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
                {{$exam_stressecho->lves}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">
                LVESV
            </td>
            <td align="center">
                {{$exam_stressecho->lvesv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_stressecho->lvesv_simp}}
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
                class="{{$exam_stressecho->ivsed < '0.8' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->ivsed}}</td>
            <td align="center">(0.8 - 1.1)</td>
            <td align="center" align="left">
                Stroke
                Volume</td>
            <td align="center">
                {{$exam_stressecho->sv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_stressecho->sv_simp}}
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
                {{$exam_stressecho->ivses}}</td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">
                Cardiac
                Output</td>
            <td align="center">
                {{$exam_stressecho->co}}
            </td>
            <td align="center" colspan="2">
                {{$exam_stressecho->co_simp}}
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
                class="{{$exam_stressecho->lvpwed < '0.8' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->lvpwed}}
            </td>
            <td align="center">(0.8 - 1.1)</td>
            <td align="center" align="left">EF
            </td>
            <td align="center">
                {{$exam_stressecho->ef}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_stressecho->ef_simp < '55' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->ef_simp}}
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
                {{$exam_stressecho->lvpwes}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" align="left">FS
            </td>
            <td align="center">
                {{$exam_stressecho->fs}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_stressecho->fs_simp < '29' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->fs_simp}}
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
                class="{{$exam_stressecho->aorta < '2.3' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->aorta}}</td>
            <td align="center">(2.3 - 3.5)</td>
            <td align="center" align="left">VCF
            </td>
            <td align="center">
                {{$exam_stressecho->vcf}}
            </td>
            <td align="center" colspan="2"
                class="{{$exam_stressecho->vcf_simp < '0.5' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->vcf_simp}}
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
                class="{{$exam_stressecho->laap < '2.6' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->laap}}</td>
            <td align="center">(2.6 - 3.8)</td>
            <td align="center" align="left">LV
                Mass
                1
            </td>
            <td align="center">
                {{$exam_stressecho->lmv}}
            </td>
            <td align="center" colspan="2">
                {{$exam_stressecho->lmv_simp}}
            </td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">MPA
            </td>
            <td align="center">
                {{$exam_stressecho->mpa}}
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
                {{$exam_stressecho->lvet}}</td>
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
                class="{{$exam_stressecho->epss > '1.0' ? 'text-danger' : 'null'}}">
                {{$exam_stressecho->epss}}</td>
            <td align="center">( &lt; 1.0)</td>
            <td align="center">DT</td>
            <td align="center">
                {{$exam_stressecho->dt}}
            </td>
            <td align="center" width="12%">L1
            </td>
            <td align="center" width="8%">LVMI
            </td>
            <td align="center"
                class="{{$exam_stressecho->l1 < '49' ? 'text-danger' : null}}">
                {{$exam_stressecho->l1}}
            </td>
            <td align="center" colspan="2">
                (49-115)
            </td>
        </tr>
        <tr>
            <td align="center" align="left">LVOT
            </td>
            <td align="center">
                {{$exam_stressecho->lvot}}</td>
            <td align="center">&nbsp;</td>
            <td align="center">IVRT</td>
            <td align="center">
                {{$exam_stressecho->ivrt}}</td>
            <td align="center">L2</td>
            <td align="center">RWT</td>
            <td align="center">
                {{$exam_stressecho->l2}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">RV
            </td>
            <td align="center"
                class="{{$exam_stressecho->rv < '2.2' ? 'text-danger' : null}}">
                {{$exam_stressecho->rv}}
            </td>
            <td align="center">(2.2 - 4.0)</td>
            <td align="center">PV Flow </td>
            <td align="center">
                {{$exam_stressecho->pvf}}
            </td>
            <td align="center">A1</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_stressecho->a1}}
            </td>
            <td align="center" colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="center" align="left">RA
            </td>
            <td align="center"
                class="{{$exam_stressecho->ra < '3.5' ? 'text-danger' : null}}">
                {{$exam_stressecho->ra}}
            </td>
            <td align="center">(3.5 - 4.5)</td>
            <td align="center">PV E</td>
            <td align="center">
                {{$exam_stressecho->pve}}
            </td>
            <td align="center">A2</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_stressecho->a2}}
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
                {{$exam_stressecho->mva}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">PV A</td>
            <td align="center">
                {{$exam_stressecho->pva}}
            </td>
            <td align="center">LA Vol.</td>
            <td align="center">&nbsp;</td>
            <td align="center">
                {{$exam_stressecho->lav}}
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
                {{$exam_stressecho->tva}}
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">PV AR</td>
            <td align="center">
                {{$exam_stressecho->pvar}}</td>
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
                {{$exam_stressecho->aortic_mv}}
            </td>
            <td align="center">
                {{$exam_stressecho->aortic_pg}}
            </td>
            <td align="center">
                {{$exam_stressecho->aortic_oa}}
            </td>
            <td align="center">
                {{$exam_stressecho->aortic_vti}}
            </td>
            <td align="center">
                {{$exam_stressecho->aortic_rr}}
            </td>
            <td align="center">
                {{$exam_stressecho->aortic_rja}}
            </td>
            <td align="center">
                {{$exam_stressecho->aortic_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Mitral
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_mv}}
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_pg}}
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_oa}}
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_vti}}
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_vti}}
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_rja}}
            </td>
            <td align="center">
                {{$exam_stressecho->mitral_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Tricuspid</td>
            <td align="center">
                {{$exam_stressecho->tri_mv}}
            </td>
            <td align="center">
                {{$exam_stressecho->tri_pg}}
            </td>
            <td align="center">
                {{$exam_stressecho->tri_oa}}
            </td>
            <td align="center">
                {{$exam_stressecho->tri_vti}}
            </td>
            <td align="center">
                {{$exam_stressecho->tri_rr}}
            </td>
            <td align="center">
                {{$exam_stressecho->tri_rja}}
            </td>
            <td align="center">
                {{$exam_stressecho->tri_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">
                Pulmonic
            </td>
            <td align="center">
                {{$exam_stressecho->pul_mv}}
            </td>
            <td align="center">
                {{$exam_stressecho->pul_pg}}
            </td>
            <td align="center">
                {{$exam_stressecho->pul_oa}}
            </td>
            <td align="center">
                {{$exam_stressecho->pul_vti}}
            </td>
            <td align="center">
                {{$exam_stressecho->pul_rr}}
            </td>
            <td align="center">
                {{$exam_stressecho->pul_rja}}
            </td>
            <td align="center">
                {{$exam_stressecho->pul_rg}}
            </td>
        </tr>
        <tr>
            <td align="center" align="left"
                valign="bottom">PA
                Pressure</td>
            <td align="center">
                {{$exam_stressecho->pp_mv}}</td>
            <td align="center">
                {{$exam_stressecho->pp_pg}}</td>
            <td align="center">
                {{$exam_stressecho->pp_oa}}</td>
            <td align="center">
                {{$exam_stressecho->pp_vti}}
            </td>
            <td align="center">
                {{$exam_stressecho->pp_rr}}</td>
            <td align="center">
                {{$exam_stressecho->pp_rja}}
            </td>
            <td align="center">
                {{$exam_stressecho->pp_rg}}</td>
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
                            <td align="center"
                                width="85%">
                                @php echo nl2br($exam_stressecho->interpretation) @endphp</textarea>
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
                                <b>TSE</b>
                            </td>
                            <td align="center"
                                width="85%">
                                {{$exam_stressecho->tse}}</textarea>
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
                            <td align="center"
                                width="85%">
                                @php echo nl2br($exam_stressecho->conclusion) @endphp</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>