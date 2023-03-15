<html>

<head>
    <title>THREADMILL EXERCISE STRESS CARDIOGRAPHY
    </title>
    <!--<link href="dist/css/eureka-print.css?v=1648791805" rel="stylesheet" type="text/css" />-->
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    .text-red {
        color: red;
    }
    table tr td {
        font-size: 11px;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="760" border="0" cellpadding="2" cellspacing="0" class="brdAll">
                            <tbody>
                                <tr>
                                    <td width="80" rowspan="3" align="center"><img
                                            src="../../../app-assets/images/logo/logo.jpg" width="80" height="80"
                                            alt=""></td>
                                    <td width="356" rowspan="3" align="center" valign="middle">
                                        <span class="lblCompName">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                            style="margin-bottom: 20px">
                                        <span class="lblCompDtl"><b>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                                Cor. San Antonio St. Malate, Manila<b><br>
                                                    Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
                                                    Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                    Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld
                                                    P&amp;I * West of England P&amp;I</b></b></span><b><b>
                                            </b></b>
                                    </td>
                                    <td width="218" valign="top" class="brdLeftBtm"><b>NAME:</b><br>
                                        <span
                                            style="font-size:15px; text-transform: uppercase;">{{$admission->lastname . " " . $admission->suffix . ', ' . $admission->firstname . " " . $admission->middlename}}</span>
                                    </td>
                                    <td width="39" valign="top" class="brdLeftBtm"><b>AGE:</b><br>
                                        <span style="font-size:15px">{{$admission->age}}</span>
                                    </td>
                                    <td width="45" valign="top" class="brdLeftBtm"><b>SEX:</b><br>
                                        <span style="font-size:15px">{{$admission->gender}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="27" colspan="3" align="left" valign="top" class="brdLeftBtm">
                                        <b>REQUESTED BY:</b><br>
                                        <span style="font-size:15px">{{$admission->agencyname}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="26" align="left" valign="top" class="brdLeft"><b>PEME DATE:</b><br>
                                        <span style="font-size:15px">{{date_format(new DateTime($admission->trans_date), "d F Y")}}</span>
                                    </td>
                                    <td colspan="2" align="left" valign="top" class="brdLeft"><b>PATIENT
                                            NO:</b><br><span style="font-size:15px">{{$admission->patientcode}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="50" align="center" class="lblReport">THREADMILL EXERCISE STRESS CARDIOGRAPHY</td>
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="15%" align="left"><b>Referring MD </b></td>
                                                    <td width="24%" align="left"><input name="referring_md" type="text"
                                                            id="referring_md" value="{{$exam->referring_md}}"
                                                            class="brdNone"></td>
                                                    <td width="8%" align="left"><b>Height</b></td>
                                                    <td width="8%" align="left"><input name="height" type="text"
                                                            id="height" value="{{$exam->height}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td width="8%" align="left"><b>Weight</b></td>
                                                    <td width="8%" align="left"><input name="weight" type="text"
                                                            id="weight" value="{{$exam->weight}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td width="7%" align="left"><b>BP</b></td>
                                                    <td colspan="3" align="left"><input name="bp" type="text" id="bp"
                                                            value="{{$exam->bp}} size=" 15" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%" align="left"><b>Clinical Diagnostic</b></td>
                                                    <td align="left"><input name="clinical_diagnostic" type="text"
                                                            id="clinical_diagnostic"
                                                            value="{{$exam->clinical_diagnostic}}" class="brdNone"></td>
                                                    <td align="left"><b>Study No. </b></td>
                                                    <td align="left"><input name="study_no" type="text" id="study_no"
                                                            value="{{$exam->study_no}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="left"><b>DVD No.</b></td>
                                                    <td align="left"><input name="dvd_no" type="text" id="dvd_no"
                                                            value="{{$exam->dvd_no}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="left"><b>Rhythm</b></td>
                                                    <td width="8%" align="left"><input name="rhythm" type="text"
                                                            id="rhythm" value="{{$exam->rhythm}}" size="15"
                                                            class="brdNone" style="width:50px;text-align:center;"></td>
                                                    <td width="6%" align="left"><b>HR</b></td>
                                                    <td width="8%" align="left"><input name="hr" type="text" id="hr"
                                                            value="{{$exam->hr}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" cellpadding="2" cellspacing="0" class="brdTable">
                                            <tbody>
                                            <tr>
                                                <td colspan="10" align="center"><b
                                                        style="font-size:17px">QUANTITATIVE MEASUREMENT</b></td>
                                                </tr>
                                                <tr>
                                                <td width="11%" align="center"><b>Dimension</b></td>
                                                <td width="11%" align="center"><b>Measurement</b></td>
                                                <td width="13%" align="center"><b>Normal</b></td>
                                                <td width="12%" align="center"><b>Dimension</b></td>
                                                <td width="11%" align="center"><b>Measurement</b></td>
                                                <td colspan="2" align="center"><b>Simposon's</b></td>
                                                <td colspan="3" align="center"><b>Normal</b></td>
                                                </tr>
                                                <tr>
                                                <td align="left">LV (ed)</td>
                                                <td align="center"><input name="lved" type="text"
                                                        class="brdNone {{$exam->lved < '3.9' ? 'text-red' : null}}"
                                                        id="lved" style="width:50px;text-align:center;"
                                                        value="{{$exam->lved}} {{$exam->lved < '3.9' ? 'L' : null}}"></td>
                                                <td align="center">(3.9 - 5.2)</td>
                                                <td align="left">LVEDV</td>
                                                <td align="center"><input name="lvedv" type="text" id="lvedv"
                                                        value="{{$exam->lvedv}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="lvedv_simp" type="text"
                                                        id="lvedv_simp" value="{{$exam->lvedv_simp}}"
                                                        class="brdNone" style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">LV (es)</td>
                                                <td align="center"><input name="lves" type="text" id="lves"
                                                        value="{{$exam->lves}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td align="left">LVESV</td>
                                                <td align="center"><input name="lvesv" type="text" id="lvesv"
                                                        value="{{$exam->lvesv}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="lvesv_simp" type="text"
                                                        id="lvesv_simp" value="{{$exam->lvesv_simp}}"
                                                        class="brdNone" style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">IVS (ed)</td>
                                                <td align="center"><input name="ivsed" type="text" id="ivsed"
                                                        value="{{$exam->lvesv_simp}} {{$exam->lvesv_simp < '0.8' ? 'L' : null}}"
                                                        class="brdNone {{$exam->lvesv_simp < '0.8' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">(0.8 - 1.1)</td>
                                                <td align="left">Stroke Volume</td>
                                                <td align="center"><input name="sv" type="text" id="sv"
                                                        value="{{$exam->sv}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="sv_simp" type="text"
                                                        id="sv_simp" value="{{$exam->sv_simp}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">IVS (es)</td>
                                                <td align="center"><input name="ivses" type="text" id="ivses"
                                                        value="{{$exam->ivses}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td align="left">Cardiac Output</td>
                                                <td align="center"><input name="co" type="text" id="co"
                                                        value="{{$exam->co}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="co_simp" type="text"
                                                        id="co_simp" value="{{$exam->co_simp}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">LVPW (ed)</td>
                                                <td align="center"><input name="lvpwed" type="text" id="lvpwed"
                                                        value="{{$exam->lvpwed}} {{$exam->lvpwed < '0.8' ? 'L' : null}}"
                                                        class="brdNone {{$exam->lvpwed < '0.8' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">(0.8 - 1.1)</td>
                                                <td align="left">EF</td>
                                                <td align="center"><input name="ef" type="text" id="ef"
                                                        value="{{$exam->ef}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="ef_simp" type="text"
                                                        id="ef_simp" value="{{$exam->ef_simp}} {{$exam->ef_simp < '55' ? 'L' : null}}"
                                                        class="brdNone {{$exam->ef_simp < '55' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">(55 - 77)</td>
                                                </tr>
                                                <tr>
                                                <td align="left">LVPW (es)</td>
                                                <td align="center"><input name="lvpwes" type="text" id="lvpwes"
                                                        value="{{$exam->lvpwes}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td align="left">FS</td>
                                                <td align="center"><input name="fs" type="text" id="fs"
                                                        value="{{$exam->fs}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="fs_simp" type="text"
                                                        id="fs_simp" value="{{$exam->fs_simp}} {{$exam->fs_simp < '29' ? 'L' : null}}"
                                                        class="brdNone {{$exam->fs_simp < '29' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">(29 - 42)</td>
                                                </tr>
                                                <tr>
                                                <td align="left">Aorta</td>
                                                <td align="center"><input name="aorta" type="text" id="aorta"
                                                        value="{{$exam->aorta}} {{$exam->aorta < '2.3' ? 'L' : null}}"
                                                        class="brdNone {{$exam->aorta < '2.3' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">(2.3 - 3.5)</td>
                                                <td align="left">VCF</td>
                                                <td align="center"><input name="vcf" type="text" id="vcf"
                                                        value="{{$exam->vcf}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="vcf_simp" type="text"
                                                        id="vcf_simp" value="{{$exam->vcf_simp}} {{$exam->vcf_simp < '0.5' ? 'L' : null}}"
                                                        class="brdNone {{$exam->vcf_simp < '0.5' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">(0.5 - 1.0)</td>
                                                </tr>
                                                <tr>
                                                <td align="left">LA (AP)</td>
                                                <td align="center"><input name="laap" type="text" id="laap"
                                                        value="{{$exam->laap}} {{$exam->laap < '2.6' ? 'L' : null}}"
                                                        class="brdNone {{$exam->laap < '2.6' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">(2.6 - 3.8)</td>
                                                <td align="left">LV Mass 1</td>
                                                <td align="center"><input name="lmv" type="text" id="lmv"
                                                        value="{{$exam->lmv}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center"><input name="lmv_simp" type="text"
                                                        id="lmv_simp" value="{{$exam->lmv_simp}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="3" align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">MPA</td>
                                                <td align="center"><input name="mpa" type="text" id="mpa"
                                                        value="{{$exam->mpa}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td colspan="7" align="left">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">LVET</td>
                                                <td align="center"><input name="lvet" type="text" id="lvet"
                                                        value="{{$exam->lvet}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td colspan="2" align="center"><b>Diastolic Functions</b></td>
                                                <td colspan="2" align="center"><b>Left Atrium</b></td>
                                                <td width="12%" align="center">&nbsp;</td>
                                                <td width="10%" colspan="2" align="center"><b>Normal</b></td>
                                                </tr>
                                                <tr>
                                                <td align="left">EPSS</td>
                                                <td align="center"><input name="epss" type="text" id="epss"
                                                        value="{{$exam->epss}} {{$exam->epss > '1.0' ? 'H' : null}}"
                                                        class="brdNone {{$exam->epss > '1.0' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">( &lt; 1.0)</td>
                                                <td>DT</td>
                                                <td align="center"><input name="dt" type="text" id="dt"
                                                        value="{{$exam->dt}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td width="12%">L1</td>
                                                <td width="8%">LVMI</td>
                                                <td align="center"><input name="l1" type="text" id="l1"
                                                        value="{{$exam->l1}} {{$exam->l1 < '49' ? 'L' : null}}"
                                                        class="brdNone {{$exam->l1 < '49' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2" align="center">(49-115)</td>
                                                </tr>
                                                <tr>
                                                <td align="left">LVOT</td>
                                                <td align="center"><input name="lvot" type="text" id="lvot"
                                                        value="{{$exam->lvot}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td>IVRT</td>
                                                <td align="center"><input name="ivrt" type="text" id="ivrt"
                                                        value="{{$exam->ivrt}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td>L2</td>
                                                <td>RWT</td>
                                                <td align="center"><input name="l2" type="text" id="l2"
                                                        value="{{$exam->l2}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">RV</td>
                                                <td align="center"><input name="rv" type="text" id="rv"
                                                        value="{{$exam->rv}} {{$exam->rv < '2.2' ? 'L' : null}}"
                                                        class="brdNone {{$exam->rv < '2.2' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">(2.2 - 4.0)</td>
                                                <td>PV Flow</td>
                                                <td align="center"><input name="pvf" type="text" id="pvf"
                                                        value="{{$exam->pvf}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td>A1</td>
                                                <td>&nbsp;</td>
                                                <td align="center"><input name="a1" type="text" id="a1"
                                                        value="{{$exam->a1}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">RA</td>
                                                <td align="center"><input name="ra" type="text" id="ra"
                                                        value="{{$exam->ra}} {{$exam->ra < '3.5' ? 'L' : null}}"
                                                        class="brdNone {{$exam->ra < '3.5' ? 'text-red' : null}}"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">(3.5 - 4.5)</td>
                                                <td>PV E</td>
                                                <td align="center"><input name="pve" type="text" id="pve"
                                                        value="{{$exam->pve}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td>A2</td>
                                                <td>&nbsp;</td>
                                                <td align="center"><input name="a2" type="text" id="a2"
                                                        value="{{$exam->a2}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">MV Annulus</td>
                                                <td align="center"><input name="mva" type="text" id="mva"
                                                        value="{{$exam->mva}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td>PV A</td>
                                                <td align="center"><input name="pva" type="text" id="pva"
                                                        value="{{$exam->pva}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td>LA Vol.</td>
                                                <td>&nbsp;</td>
                                                <td align="center"><input name="lav" type="text" id="lav"
                                                        value="{{$exam->lav}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td colspan="2">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <td align="left">TV Annulus</td>
                                                <td align="center"><input name="tva" type="text" id="tva"
                                                        value="{{$exam->tva}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td align="center">&nbsp;</td>
                                                <td>PV AR</td>
                                                <td align="center"><input name="pvar" type="text" id="pvar"
                                                        value="{{$exam->pvar}}" class="brdNone"
                                                        style="width:50px;text-align:center;"></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td colspan="2">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" cellpadding="2" cellspacing="0" class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" align="center"><b style="font-size:17px">SPECTRAL
                                                            AND COLOR FLOW DOPPLER</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="17%" rowspan="2" align="center" valign="bottom">
                                                        <b>VALVE</b>
                                                    </td>
                                                    <td width="15%" rowspan="2" align="center">
                                                        <p><b>MAX VELOCITY<br>
                                                                m/sec</b></p>
                                                    </td>
                                                    <td width="14%" rowspan="2" align="center"><b>PEAK GRADIENT<br>
                                                            mm Hg </b></td>
                                                    <td width="14%" rowspan="2" align="center"><b>ORIFIC AREA<br>
                                                            cm2 </b></td>
                                                    <td width="9%" rowspan="2" align="center"><b>VTI</b></td>
                                                    <td colspan="3" align="center"><b>REGURGITATION</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="11%" align="center"><b>Ratio</b></td>
                                                    <td width="10%" align="center"><b>Jet Area</b></td>
                                                    <td width="10%" align="center"><b>Gradient</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="bottom">Aortic</td>
                                                    <td align="center"><input name="aortic_mv" id="aortic_mv"
                                                            type="text" value="{{$exam->aortic_mv}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="aortic_pg" id="aortic_pg"
                                                            type="text" value="{{$exam->aortic_pg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="aortic_oa" id="aortic_oa"
                                                            type="text" value="{{$exam->aortic_oa}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="aortic_vti" id="aortic_vti"
                                                            type="text" value="{{$exam->aortic_vti}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="aortic_rr" id="aortic_rr"
                                                            type="text" value="{{$exam->aortic_rr}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="aortic_rja" id="aortic_rja"
                                                            type="text" value="{{$exam->aortic_rja}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="aortic_rg" id="aortic_rg"
                                                            type="text" value="{{$exam->aortic_rg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="bottom">Mitral</td>
                                                    <td align="center"><input name="mitral_mv" id="mitral_mv"
                                                            type="text" value="{{$exam->mitral_mv}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="mitral_pg" id="mitral_pg"
                                                            type="text" value="{{$exam->mitral_pg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="mitral_oa" id="mitral_oa"
                                                            type="text" value="{{$exam->mitral_oa}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="mitral_vti" id="mitral_vti"
                                                            type="text" value="{{$exam->mitral_vti}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="mitral_rr" id="mitral_rr"
                                                            type="text" value="{{$exam->mitral_rr}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="mitral_rja" id="mitral_rja"
                                                            type="text" value="{{$exam->mitral_rja}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="mitral_rg" id="mitral_rg"
                                                            type="text" value="{{$exam->mitral_rg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="bottom">Tricuspid</td>
                                                    <td align="center"><input name="tri_mv" id="tri_mv" type="text"
                                                            value="{{$exam->tri_mv}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="tri_pg" id="tri_pg" type="text"
                                                            value="{{$exam->tri_pg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="tri_oa" id="tri_oa" type="text"
                                                            value="{{$exam->tri_oa}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="tri_vti" id="tri_vti" type="text"
                                                            value="{{$exam->tri_vti}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="tri_rr" id="tri_rr" type="text"
                                                            value="{{$exam->tri_rr}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="tri_rja" id="tri_rja" type="text"
                                                            value="{{$exam->tri_rja}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="tri_rg" id="tri_rg" type="text"
                                                            value="{{$exam->tri_rg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="bottom">Pulmonic</td>
                                                    <td align="center"><input name="pul_mv" id="pul_mv" type="text"
                                                            value="{{$exam->pul_mv}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pul_pg" id="pul_pg" type="text"
                                                            value="{{$exam->pul_pg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pul_oa" id="pul_oa" type="text"
                                                            value="{{$exam->pul_oa}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pul_vti" id="pul_vti" type="text"
                                                            value="{{$exam->pul_vti}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pul_rr" id="c" type="text"
                                                            value="{{$exam->pul_vti}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pul_rja" id="pul_rja" type="text"
                                                            value="{{$exam->pul_rja}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pul_rg" id="pul_rg" type="text"
                                                            value="{{$exam->pul_rg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="bottom">PA Pressure</td>
                                                    <td align="center"><input name="pp_mv" id="pp_mv" type="text"
                                                            value="{{$exam->pp_mv}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pp_pg" id="pp_pg" type="text"
                                                            value="{{$exam->pp_pg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pp_oa" id="pp_oa" type="text"
                                                            value="{{$exam->pp_oa}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pp_vti" id="pp_vti" type="text"
                                                            value="{{$exam->pp_vti}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pp_rr" id="pp_rr" type="text"
                                                            value="{{$exam->pp_rr}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pp_rja" id="pp_rja" type="text"
                                                            value="{{$exam->pp_rja}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                    <td align="center"><input name="pp_rg" id="pp_rg" type="text"
                                                            value="{{$exam->pp_rg}}" class="brdNone"
                                                            style="width:50px;text-align:center;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" cellpadding="2" cellspacing="0" class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table id="brdTblNone" width="100%" border="0" cellspacing="0"
                                                            cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="13%" valign="top"><b>Interpretation:</b>
                                                                    </td>
                                                                    <td width="87%" valign="top">
                                                                        {{$exam->interpretation}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table id="brdTblNone" width="100%" border="0" cellspacing="0"
                                                            cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="13%" valign="top"><b>Conclusion:</b></td>
                                                                    <td width="87%" valign="top">{{$exam->conclusion}}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="760" border="0" cellpadding="2" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="100" align="right" valign="bottom">
                                                        <table width="260" border="0" cellspacing="2" cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                    </td>
                                                                </tr>
                                                                <tr valign="bottom">
                                                                    <td align="center" class="brdTop">
                                                                        {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : ""}}<br>
                                                                        Cardiologist</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="60"><span class="lblForm">FORM NO. 38<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>