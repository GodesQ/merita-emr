<html>

<head>
    <title>2 DIMENSIONAL ECHOCARDIOGRAPHY PLAIN</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    .text-red {
        color: red;
    }
    @page{
        size: A4;
        margin: 0;
    }
    *{
        font-size: 12.5px;
    }
    </style>
    </style>
</head>

<body>
    <center>
        <table width="760" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="760" border="0" cellpadding="2" cellspacing="0" >
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="../../../app-assets/images/logo/logo.jpg" width="100" height="100" alt="">
                                    </td>
                                    <td style="text-align: center;">
                                        <span class="lblCompName" style="font-size: 37px;">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                            style="margin-bottom: 20px">
                                        <span class="lblCompDtl">
                                            <b>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                                Cor. San Antonio St. Malate, Manila Philippines
                                            <b><br>
                                                Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        <table width="760" border="0" cellpadding="2" cellspacing="0" class="brdAll">
                            <tbody>
                                <tr>
                                    <td width="80" rowspan="3" align="center"></td>
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
                </tr> -->
                <tr>
                    <td height="30" align="center" class="lblReport">TWO DIMENSIONAL ECHOCARDIOGRAPHY</td>
                </tr>
                <tr>
                    <td>
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td><table width="100%" border="0" cellpadding="2" cellspacing="2"
                                        class="brdTable">
                            <tbody>
                                <tr>
                                    <td>Name: </td>
                                    <td>{{$admission->lastname . " " . $admission->suffix . ', ' . $admission->firstname . " " . $admission->middlename}}</td>
                                    <td>Age</td>
                                    <td>{{$admission->age}}</td>
                                    <td>Sex</td>
                                    <td>{{$admission->gender}}</td>
                                    <td>Date</td>
                                    <td colspan="3">{{date_format(new DateTime($admission->trans_date), "d F Y")}}</td>
                                </tr>
                                <tr>
                                    <td width="15%" align="left"><b>Referring MD </b></td>
                                    <td width="24%" align="left"><input name="referring_md" type="text"
                                            id="referring_md" value="{{$exam->referring_md}}" class="brdNone"></td>
                                    <td width="8%" align="left"><b>Height</b></td>
                                    <td width="8%" align="left"><input name="height" type="text" id="height"
                                            value="{{$exam->height}}" class="brdNone"
                                            style="width:50px;text-align:center;"></td>
                                    <td width="8%" align="left"><b>Weight</b></td>
                                    <td width="8%" align="left"><input name="weight" type="text" id="weight"
                                            value="{{$exam->weight}}" class="brdNone"
                                            style="width:50px;text-align:center;"></td>
                                    <td width="7%" align="left"><b>BP</b></td>
                                    <td colspan="3" align="left"><input name="bp" type="text" id="bp"
                                            value="{{$exam->bp}}" size="15" class="brdNone"
                                            style="width:50px;text-align:center;"></td>
                                </tr>
                                <tr>
                                    <td width="15%" align="left"><b>Clinical Diagnostic</b></td>
                                    <td align="left"><input name="clinical_diagnostic" type="text"
                                            id="clinical_diagnostic" value="{{$exam->clinical_diagnostic}}"
                                            class="brdNone"></td>
                                    <td align="left"><b>Study No. </b></td>
                                    <td align="left"><input name="study_no" type="text" id="study_no"
                                            value="{{$exam->study_no}}" class="brdNone"
                                            style="width:50px;text-align:center;"></td>
                                    <td align="left"><b>DVD No.</b></td>
                                    <td align="left"><input name="dvd_no" type="text" id="dvd_no"
                                            value="{{$exam->dvd_no}}" class="brdNone"
                                            style="width:50px;text-align:center;"></td>
                                    <td align="left"><b>Rhythm</b></td>
                                    <td width="8%" align="left"><input name="rhythm" type="text" id="rhythm"
                                            value="{{$exam->rhythm}}" size="15" class="brdNone"
                                            style="width:50px;text-align:center;"></td>
                                    <td width="6%" align="left"><b>HR</b></td>
                                    <td width="8%" align="left"><input name="hr" type="text" id="hr"
                                            value="{{$exam->hr}}" class="brdNone" style="width:50px;text-align:center;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellpadding="2" cellspacing="0" class="brdAll">
                            <tbody>
                            <tr>
                                <td colspan="10" align="center" class="brdAll"><b
                                        style="font-size:17px">QUANTITATIVE MEASUREMENT</b></td>
                            </tr>
                            <tr>
                                <td width="11%" align="center" class="brdAll"><b>Dimension</b></td>
                                <td width="11%" align="center" class="brdAll"><b>Measurement</b></td>
                                <td width="13%" align="center" class="brdAll"><b>Normal</b></td>
                                <td width="12%" align="center" class="brdAll"><b>Dimension</b></td>
                                <td width="11%" align="center" class="brdAll"><b>Measurement</b></td>
                                <td colspan="3" align="center" class="brdAll"><b>Simposon's</b></td>
                                <td colspan="3" align="center" class="brdAll"><b>Normal</b></td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">LV (ed)</td>
                                <td class="brdRight" align="center">
                                    @if($exam->lved)
                                        <input name="lved" type="text"
                                            class="brdNone {{$exam->lved < '3.9' ? 'text-red' : null}}" id="lved" style="width:50px;text-align:center;"
                                            value="{{$exam->lved}} {{$exam->lved < '3.9' ? 'L' : null}}">
                                    @endif
                                </td>
                                <td class="brdRight" align="center">(3.9 - 5.2)</td>
                                <td align="left" class="brdRight">LVEDV</td>
                                <td align="center" class="brdRight"><input name="lvedv" type="text" id="lvedv"
                                        value="{{$exam->lvedv}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td  colspan="3" class="brdRight" align="center"><input name="lvedv_simp" type="text"
                                        id="lvedv_simp" value="{{$exam->lvedv_simp}}"
                                        class="brdNone" style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">LV (es)</td>
                                <td align="center" class="brdRight"><input name="lves" type="text" id="lves"
                                        value="{{$exam->lves}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td align="center" class="brdRight">&nbsp;</td>
                                <td align="left" class="brdRight">LVESV</td>
                                <td align="center" class="brdRight"><input name="lvesv" type="text" id="lvesv"
                                        value="{{$exam->lvesv}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight" colspan="3" align="center"><input name="lvesv_simp" type="text"
                                        id="lvesv_simp" value="{{$exam->lvesv_simp}}"
                                        class="brdNone" style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">IVS (ed)</td>
                                <td align="center" class="brdRight">
                                    @if($exam->ivsed)
                                         <input name="ivsed" type="text" id="ivsed" 
                                        value="{{$exam->ivsed}} {{$exam->ivsed < '0.8' ? 'L' : null}}" 
                                        class="brdNone {{$exam->ivsed < '0.8' ? 'text-red' : null}}" 
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td class="brdRight">
                                <td align="center" class="brdRight">(0.8 - 1.1)</td>
                                <td align="left" class="brdRight">Stroke Volume</td>
                                <td align="center" class="brdRight"><input name="sv" type="text" id="sv"
                                        value="{{$exam->sv}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center" class="brdRight"><input name="sv_simp" type="text"
                                        id="sv_simp" value="{{$exam->sv_simp}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">IVS (es)</td>
                                <td align="center" class="brdRight"><input name="ivses" type="text" id="ivses"
                                        value="{{$exam->ivses}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td align="center" class="brdRight">&nbsp;</td>
                                <td align="left" class="brdRight">Cardiac Output</td>
                                <td align="center" class="brdRight"><input name="co" type="text" id="co"
                                        value="{{$exam->co}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center" class="brdRight"><input name="co_simp" type="text"
                                        id="co_simp" value="{{$exam->co_simp}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">LVPW (ed)</td>
                                <td align="center" class="brdRight">
                                    @if($exam->lvpwed)
                                        <input name="lvpwed" type="text" id="lvpwed"
                                            value="{{$exam->lvpwed}} {{$exam->lvpwed < '0.8' ? 'L' : null}}"
                                            class="brdNone {{$exam->lvpwed < '0.8' ? 'text-red' : null}}"
                                            style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td align="center" class="brdRight">(0.8 - 1.1)</td>
                                <td align="left" class="brdRight">EF</td>
                                <td align="center" class="brdRight">
                                    @if($exam->ef)
                                        <input name="ef" type="text" id="ef"
                                        value="{{$exam->ef}}" class="brdNone"
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td colspan="3" align="center" class="brdRight">
                                    @if($exam->ef_simp)
                                    <input name="ef_simp" type="text"
                                        id="ef_simp" value="{{$exam->ef_simp}} {{$exam->ef_simp < '55' ? 'L' : null}}"
                                        class="brdNone {{$exam->ef_simp < '55' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td colspan="3" align="center">(55 - 77)</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">LVPW (es)</td>
                                <td align="center" class="brdRight"><input name="lvpwes" type="text" id="lvpwes"
                                        value="{{$exam->lvpwes}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td align="center" class="brdRight">&nbsp;</td>
                                <td align="left" class="brdRight">FS</td>
                                <td align="center" class="brdRight"><input name="fs" type="text" id="fs"
                                        value="{{$exam->fs}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center" class="brdRight">
                                    @if($exam->fs_simp)
                                        <input name="fs_simp" type="text"
                                        id="fs_simp" value="{{$exam->fs_simp}} {{$exam->fs_simp < '29' ? 'L' : null}}"
                                        class="brdNone {{$exam->fs_simp < '29' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">
                                    @endif
                                    </td>
                                <td colspan="3" align="center" >(29 - 42)</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">Aorta</td>
                                <td align="center" class="brdRight">
                                    @if($exam->aorta)
                                         <input name="aorta" type="text" id="aorta"
                                        value="{{$exam->aorta}} {{$exam->aorta < '2.3' ? 'L' : null}}"
                                        class="brdNone {{$exam->aorta < '2.3' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">        
                                    @endif
                                </td>
                                <td class="brdRight" align="center">(2.3 - 3.5)</td>
                                <td align="left" class="brdRight">VCF</td>
                                <td align="center" class="brdRight"><input name="vcf" type="text" id="vcf"
                                        value="{{$exam->vcf}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center" class="brdRight">
                                    @if($exam->vcf_simp)
                                        <input name="vcf_simp" type="text"
                                        id="vcf_simp" value="{{$exam->vcf_simp}} {{$exam->vcf_simp < '0.5' ? 'L' : null}}"
                                        class="brdNone {{$exam->vcf_simp < '0.5' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">        
                                    @endif
                                </td>
                                <td colspan="3" align="center">(0.5 - 1.0)</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">LA (AP)</td>
                                <td align="center" class="brdRight">
                                    @if($exam->laap)
                                        <input name="laap" type="text" id="laap"
                                        value="{{$exam->laap}} {{$exam->laap < '2.6' ? 'L' : null}}"
                                        class="brdNone {{$exam->laap < '2.6' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">
                                    @endif  
                                </td>
                                <td class="brdRight" align="center">(2.6 - 3.8)</td>
                                <td align="left" class="brdRight brdBtm">LV Mass</td>
                                <td align="center" class="brdRight brdBtm"><input name="lmv" type="text" id="lmv"
                                        value="{{$exam->lmv}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center" class="brdRight brdBtm"><input name="lmv_simp" type="text"
                                        id="lmv_simp" value="{{$exam->lmv_simp}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td colspan="3" align="center" class="brdBtm">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">MPA</td>
                                <td align="center" class="brdRight"><input name="mpa" type="text" id="mpa"
                                        value="{{$exam->mpa}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td align="center" class="brdRight">&nbsp;</td>
                                <td colspan="7" align="left">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">LVET</td>
                                <td align="center" class="brdRight"><input name="lvet" type="text" id="lvet"
                                        value="{{$exam->lvet}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td align="center" class="brdRight">&nbsp;</td>
                                <td colspan="2" align="center" class="brdAll"><b>Diastolic Functions</b></td>
                                <td colspan="3" align="center" class="brdAll"><b>Left Atrium</b></td>
                                <td width="12%" align="center" class="brdAll">&nbsp;</td>
                                <td width="10%" colspan="2" align="center" class="brdAll"><b>Normal</b></td>
                            </tr>
                            <tr>
                                <td align="left" class="brdRight">EPSS</td>
                                <td align="center" class="brdRight"><input name="epss" type="text" id="epss"
                                        value="{{$exam->epss}}"
                                        class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td align="center" class="brdRight">( &lt; 1.0)</td>
                                <td class="brdRight">DT</td>
                                <td align="center" class="brdRight"><input name="dt" type="text" id="dt"
                                        value="{{$exam->dt}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td width="12%" class="brdRight">L1</td>
                                <td width="5%" class="brdRight">
                                    @if($exam->l1)
                                        <input name="l1" type="text" id="l1"
                                        value="{{$exam->l1}}"
                                        class="brdNone"
                                        style="width:50px;text-align:center;">
                                    @endif
                                    </td>
                                <td align="center" class="brdRight">
                                    LVMI
                                </td>
                                <td class="brdRight">
                                    @if($exam->lvmi)
                                        <input name="lvmi" type="text" id="lvmi"
                                        value="{{$exam->lvmi}} {{$exam->lvmi < '49' ? 'L' : null}}"
                                        class="brdNone {{$exam->lvmi < '49' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td align="center">(49-115)</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">LVOT</td>
                                <td class="brdRight" align="center"><input name="lvot" type="text" id="lvot"
                                        value="{{$exam->lvot}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight" align="center">&nbsp;</td>
                                <td class="brdRight">IVRT</td>
                                <td class="brdRight" align="center"><input name="ivrt" type="text" id="ivrt"
                                        value="{{$exam->ivrt}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight">L2</td>
                                <td class="brdRight">
                                    @if($exam->l2)
                                        <input name="l2" type="text" id="l2"
                                        value="{{$exam->l2}}" class="brdNone"
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td class="brdRight" align="center">RWT</td>
                                <td class="brdRight">
                                    @if($exam->rwt)
                                        <input name="rwt" type="text" id="rwt"
                                        value="{{$exam->rwt}}" class="brdNone"
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td colspan="1">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">RV</td>
                                <td class="brdRight" align="center">
                                    @if($exam->rv)
                                        <input name="rv" type="text" id="rv" value="{{$exam->rv}} {{$exam->rv < '2.2' ? 'L' : null}}"
                                        class="brdNone {{$exam->rv < '2.2' ? 'text-red' : null}}" style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td class="brdRight" align="center">(2.2 - 4.0)</td>
                                <td class="brdRight">PV Flow</td>
                                <td class="brdRight" align="center"><input name="pvf" type="text" id="pvf"
                                        value="{{$exam->pvf}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight">A1</td>
                                <td class="brdRight"><input name="a1" type="text" id="a1"
                                    value="{{$exam->a1}}" class="brdNone"
                                    style="width:50px;text-align:center;"></td>
                                <td class="brdRight" align="center"></td>
                                <td class="brdRight"></td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">RA</td>
                                <td class="brdRight" align="center">
                                    @if($exam->ra)
                                        <input name="ra" type="text" id="ra"
                                        value="{{$exam->ra}} {{$exam->ra < '3.5' ? 'L' : null}}"
                                        class="brdNone {{$exam->ra < '3.5' ? 'text-red' : null}}"
                                        style="width:50px;text-align:center;">
                                    @endif
                                </td>
                                <td class="brdRight" align="center">(3.5 - 4.5)</td>
                                <td class="brdRight">PV E</td>
                                <td class="brdRight" align="center"><input name="pve" type="text" id="pve"
                                        value="{{$exam->pve}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight">A2</td>
                                <td class="brdRight"><input name="a2" type="text" id="a2"
                                    value="{{$exam->a2}}" class="brdNone"
                                    style="width:50px;text-align:center;"></td>
                                <td class="brdRight" align="center"></td>
                                <td class="brdRight"></td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">MV Annulus</td>
                                <td class="brdRight" align="center"><input name="mva" type="text" id="mva"
                                        value="{{$exam->mva}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight" align="center">&nbsp;</td>
                                <td class="brdRight">PV A</td>
                                <td class="brdRight" align="center"><input name="pva" type="text" id="pva"
                                        value="{{$exam->pva}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight">LA Vol.</td>
                                <td class="brdRight"><input name="lav" type="text" id="lav"
                                    value="{{$exam->lav}}" class="brdNone"
                                    style="width:50px;text-align:center;"></td>
                                <td class="brdRight" align="center"></td>
                                <td class="brdRight"></td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="brdRight" align="left">TV Annulus</td>
                                <td class="brdRight" align="center"><input name="tva" type="text" id="tva"
                                        value="{{$exam->tva}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight" align="center">&nbsp;</td>
                                <td class="brdRight">PV AR</td>
                                <td class="brdRight" align="center"><input name="pvar" type="text" id="pvar"
                                        value="{{$exam->pvar}}" class="brdNone"
                                        style="width:50px;text-align:center;"></td>
                                <td class="brdRight">Tapse</td>
                                <td class="brdRight" align="center">{{$exam->tapse}}</td>
                                <td class="brdRight">&nbsp;</td>
                                <td class="brdRight"></td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <table width="100%" cellpadding="0" cellspacing="0" class="brdAll">
                                    <tbody>
                                        <tr>
                                            <td align="center" class="brdAll" style="padding: 5px;"><b
                                                style="font-size:17px;">SPECTRAL AND COLOR FLOW DOPPLER</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" cellpadding="4" border="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="brdAll" rowspan="2">Valve</td>
                                                            <td class="brdAll" rowspan="2">MAX Velocity <br> m/sec</td>
                                                            <td class="brdAll" rowspan="2">PEAK GRADIENT <br> mm Hg</td>
                                                            <td class="brdAll" rowspan="2">ORIFICE AREA <br>cm2</td>
                                                            <td class="brdAll" rowspan="2">VTI</td>
                                                            <td colspan="3" class="brdAll">REGURGITATION</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdAll">Ratio</td>
                                                            <td class="brdAll">Jet Area</td>
                                                            <td class="brdAll">Gradient</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">Aortic</td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">Mitral</td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">Tricuspid</td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">Pulmonic</td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">PA Pressure</td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                            <td class="brdRight"></td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </tr>
                            <tr>
                                <table width="100%" cellpadding="2" cellspacing="0" class="brdTable">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table id="brdTblNone" width="100%" border="0" cellspacing="0"
                                                    cellpadding="2">
                                                    <tbody>
                                                        <tr>
                                                            <td width="13%" valign="top"><b>Interpretation:</b></td>
                                                            <td width="87%" valign="top">@php echo nl2br($exam->interpretation) @endphp
                                                            </td>
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
                                                            <td width="87%" valign="top">@php echo nl2br($exam->conclusion) @endphp</td>
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
                                                            <td width="13%" valign="top"><b>Remarks:</b></td>
                                                            <td width="87%" valign="top">@php echo nl2br($exam->remarks) @endphp</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" border="0" cellpadding="3" cellspacing="0" class="brdAll">
                            <tbody>
                                <tr>
                                    <td height="100" valign="bottom">
                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr valign="bottom">
                                                    <td width="70%"><span class="lblForm" style="font-weight: 800;">FORM NO. 38<br>REV. 01 / 02-12-2019</span></td>
                                                    <td align="center" class="brdTop">
                                                        {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : ""}}
                                                        <br>
                                                        Cardiologist
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
            </tbody>
        </table>
        </td>
        </tr>
        <!-- <tr>
            <td height="60"><span class="lblForm">FORM NO. 38<br>REV. 01 / 02-12-2019</span></td>
        </tr> -->
        </tbody>
        </table>
    </center>


</body>

</html>