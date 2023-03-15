<html>

<head>
    <title>Blood Serology</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        .red-text {
            color: red;
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
                                        <span style="font-size:15px">
                                            @if (preg_match("/Bahia/i", $admission->agencyname)) 
                                                {{'Bahia Shipping Services, Inc.'}}
                                            @else
                                                {{$admission->agencyname}}
                                            @endif
                                        </span>
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
                    @if($type == 'both' || $type == 'blood')
                        <td height="50" align="center" class="lblReport">BLOOD CHEMISTRY</td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td>
                                        @if($type == 'both' || $type == 'blood')
                                            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="">
                                                <tbody>
                                                    <tr>
                                                        <td width="24%"><b>EXAMINATION</b></td>
                                                        <td width="26%"> <b>RESULTS</b></td>
                                                        <td width="50%"><b>NORMAL VALUE</b></td>
                                                    </tr>
                                                    @if(optional($exam_blood)->hba1c)
                                                    <tr>
                                                        <td>HBA1C</td>
                                                        <td class="{{optional($exam_blood)->hba1c < 4.0 || optional($exam_blood)->hba1c > 6.4  ? 'red-text': null}}">
                                                            {{optional($exam_blood)->hba1c}}
                                                            @if(optional($exam_blood)->hba1c < 4.0)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->hba1c >  6.4)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>4.0-6.4%</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->ppbg)
                                                    <tr>
                                                        <td>2hrs. PPBG</td>
                                                        <td class="{{optional($exam_blood)->ppbg > 200  ? 'red-text': null}}">
                                                            {{optional($exam_blood)->ppbg}}
                                                            @if(optional($exam_blood)->ppbg >  200)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td> < 200 mg/dL</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->fbs)
                                                    <tr>
                                                        <td>FBS</td>
                                                        <td class="{{optional($exam_blood)->fbs < 70 || optional($exam_blood)->fbs > 110 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->fbs}}
                                                            @if(optional($exam_blood)->fbs < 70)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->fbs > 110)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            70-110 mg/dL
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->bun)
                                                    <tr>
                                                        <td>BUN</td>
                                                        <td class="{{optional($exam_blood)->bun < 5 || optional($exam_blood)->bun > 20 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->bun}}
                                                            @if(optional($exam_blood)->bun < 5)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->bun > 20)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>5-20 mg/dL</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->creatinine)
                                                    <tr>
                                                        <td>CREATININE</td>
                                                        <td class="{{optional($exam_blood)->creatinine < 0.8 || optional($exam_blood)->creatinine > 1.2 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->creatinine}}
                                                            @if(optional($exam_blood)->creatinine < 0.8)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->creatinine > 1.2)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            0.8-1.2 mg/dL
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->cholesterol)
                                                    <tr>
                                                        <td>CHOLESTEROL</td>
                                                        <td class="{{optional($exam_blood)->cholesterol < 125 || optional($exam_blood)->cholesterol > 200 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->cholesterol}}
                                                            @if(optional($exam_blood)->cholesterol < 125)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->cholesterol > 200)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            125-200 mg/dL
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->triglycerides)
                                                    <tr>
                                                        <td>TRIGLYCERIDES</td>
                                                        <td class="{{optional($exam_blood)->triglycerides < 35 || optional($exam_blood)->triglycerides > 160 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->triglycerides}} 
                                                            @if(optional(optional($exam_blood))->triglycerides < 35 )
                                                                L
                                                            @endif
                                                            @if(optional(optional($exam_blood))->triglycerides > 160)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            M:40-160 F:35-130
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->hdl)
                                                    <tr>
                                                        <td>HDL Chole</td>
                                                        <td class="{{optional($exam_blood)->hdl < 40 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->hdl}} {{optional($exam_blood)->hdl < 40 ? 'L': null}}
                                                        </td>
                                                        <td>
                                                            >40 mg/dL
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->ldl)
                                                    <tr>
                                                        <td>LDL Chole</td>
                                                        <td class="{{optional($exam_blood)->ldl > 100 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->ldl}} {{optional($exam_blood)->ldl > 100 ? 'H': null}}
                                                        </td>
                                                        <td>
                                                            < 100 mg/dL </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->vldl)
                                                    <tr>
                                                        <td>VLDL Chole</td>
                                                        <td class="{{optional($exam_blood)->vldl < 7 || optional($exam_blood)->vldl > 32 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->vldl}} 
                                                            @if(optional(optional($exam_blood))->vldl < 7 )
                                                            L
                                                            @endif
                                                            @if(optional(optional($exam_blood))->vldl > 32)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            M-8-32 F:7-26 mg
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->uricacid)
                                                    <tr>
                                                        <td>URIC ACID</td>
                                                        <td class="{{optional($exam_blood)->uricacid < 140 || optional($exam_blood)->uricacid > 430 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->uricacid}}
                                                            @if(optional($exam_blood)->uricacid < 140)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->uricacid > 430)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            140-430 umol/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->sgot)
                                                    <tr>
                                                        <td>SGOT (AST)</td>
                                                        <td class="{{optional($exam_blood)->sgot < 0 || optional($exam_blood)->sgot > 40 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->sgot}}
                                                            @if(optional($exam_blood)->sgot < 0)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->sgot > 40)
                                                                H
                                                            @endif
                                                        <td>
                                                            0-40 u/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->sgpt)
                                                    <tr>
                                                        <td>SGPT (ALT) </td>
                                                        <td class="{{optional($exam_blood)->sgpt < 0 || optional($exam_blood)->sgpt > 41 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->sgpt}}
                                                            @if(optional($exam_blood)->sgpt < 0)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->sgpt > 41)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            0-41 u/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->ggt)
                                                        <tr>
                                                            <td>GGT</td>
                                                            <td class="{{optional($exam_blood)->ggt < 0 || optional($exam_blood)->ggt > 55 ? 'red-text': null}}">
                                                                {{optional($exam_blood)->ggt}}
                                                                @if(optional($exam_blood)->ggt < 0)
                                                                L
                                                                @endif
                                                                @if(optional($exam_blood)->ggt > 55)
                                                                    H
                                                                @endif
                                                            
                                                            </td>
                                                            <td>
                                                                0-55 u/L
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->alkphos)
                                                    <tr>
                                                        <td>ALK. PHOS.</td>
                                                        <td class="{{optional($exam_blood)->alkphos < 35 || optional($exam_blood)->alkphos > 129 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->alkphos}}
                                                            @if(optional($exam_blood)->alkphos < 35)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->alkphos > 129)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            35-129 u/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->ttlbilirubin)
                                                    <tr>
                                                        <td>TOTAL BILIRUBIN </td>
                                                        <td class="{{optional($exam_blood)->ttlbilirubin < 5 || optional($exam_blood)->ttlbilirubin > 21 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->ttlbilirubin}}
                                                            @if(optional($exam_blood)->ttlbilirubin < 5)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->ttlbilirubin > 21)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            5-21 umol/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->dirbilirubin)
                                                    <tr>
                                                        <td>DIRECT BILIRUBIN</td>
                                                        <td class="{{optional($exam_blood)->dirbilirubin < 0 || optional($exam_blood)->dirbilirubin > 5.1 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->dirbilirubin}}
                                                            @if(optional($exam_blood)->dirbilirubin < 0)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->dirbilirubin > 5.1)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            0-5.1 umol/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->indbilirubin)
                                                        <tr>
                                                            <td>INDIRECT BILIRUBIN</td>
                                                            <td class="{{optional($exam_blood)->indbilirubin < 0 || optional($exam_blood)->indbilirubin > 16 ? 'red-text': null}}">
                                                                {{optional($exam_blood)->indbilirubin}}
                                                                @if(optional($exam_blood)->indbilirubin < 0)
                                                                    L
                                                                @endif
                                                                @if(optional($exam_blood)->indbilirubin > 16)
                                                                    H
                                                                @endif
                                                            </td>
                                                            <td>
                                                                0-16 umol/L
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->ttlprotein)
                                                    <tr>
                                                        <td>TOTAL PROTEIN</td>
                                                        <td class="{{optional($exam_blood)->ttlprotein < 66 || optional($exam_blood)->ttlprotein > 87 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->ttlprotein}}
                                                            @if(optional($exam_blood)->ttlprotein < 66)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->ttlprotein > 87)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            66-87 g/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->albumin)
                                                    <tr>
                                                        <td>ALBUMIN</td>
                                                        <td class="{{optional($exam_blood)->albumin < 35 || optional($exam_blood)->albumin > 52 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->albumin}}
                                                            @if(optional($exam_blood)->albumin < 35)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->albumin > 52)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            35-52 g/L
                                                        </td>
                                                    </tr>
                                                    @endif  
                                                    @if(optional($exam_blood)->globulin)
                                                    <tr>
                                                        <td>GLOBULIN</td>
                                                        <td class="{{optional($exam_blood)->globulin < 31 || optional($exam_blood)->globulin > 35 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->globulin}}
                                                            @if(optional($exam_blood)->globulin < 31)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->globulin > 35)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            31-35 g/L
                                                        </td>
                                                    </tr>
                                                    @endif 
                                                    @if(optional($exam_blood)->sodium)
                                                    <tr>
                                                        <td>SODIUM</td>
                                                        <td class="{{optional($exam_blood)->sodium < 135 || optional($exam_blood)->sodium > 148 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->sodium}}
                                                            @if(optional($exam_blood)->sodium < 135)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->sodium > 148)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            135-148 mmol/L
                                                        </td>
                                                    </tr>
                                                    @endif    
                                                    @if(optional($exam_blood)->potassium)
                                                    <tr>
                                                        <td>POTASSIUM</td>
                                                        <td class="{{optional($exam_blood)->potassium < 3.5 || optional($exam_blood)->potassium > 5.3 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->potassium}}
                                                            @if(optional($exam_blood)->potassium < 3.5)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->potassium > 5.3)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            3.5.0-5.3 mmol/L
                                                        </td>
                                                    </tr>
                                                    @endif   
                                                    @if(optional($exam_blood)->chloride)
                                                    <tr>
                                                        <td>CHLORIDE</td>
                                                        <td class="{{optional($exam_blood)->chloride < 96 || optional($exam_blood)->chloride > 108 ? 'red-text': null}}">
                                                            {{optional($exam_blood)->chloride}}
                                                            @if(optional($exam_blood)->chloride < 96)
                                                                L
                                                            @endif
                                                            @if(optional($exam_blood)->chloride > 108)
                                                                H
                                                            @endif
                                                        </td>
                                                        <td>
                                                            96.0-108 mmol/L
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_blood)->calcium)
                                                    <tr>
                                                        <td>CALCIUM</td>
                                                        <td class="{{optional($exam_blood)->calcium < 2.10 || optional($exam_blood)->calcium > 2.90 ? 'red-text': null}}">
                                                                {{optional($exam_blood)->calcium}}
                                                                @if(optional($exam_blood)->calcium < 2.10)
                                                                    L
                                                                @endif
                                                                @if(optional($exam_blood)->calcium > 2.90)
                                                                    H
                                                                @endif
                                                        </td>
                                                        <td>
                                                            2.10-2.90 mmol/L
                                                        </td>
                                                    </tr>
                                                    @endif    
                                                    @if(optional($exam_blood)->ag_ratio)
                                                    <tr>
                                                        <td>CALCIUM</td>
                                                        <td class="{{optional($exam_blood)->ag_ratio < 0.6 || optional($exam_blood)->ag_ratio > 1.7 ? 'red-text': null}}">
                                                                {{optional($exam_blood)->ag_ratio}}
                                                                @if(optional($exam_blood)->ag_ratio < 0.6)
                                                                    L
                                                                @endif
                                                                @if(optional($exam_blood)->ag_ratio > 1.7)
                                                                    H
                                                                @endif
                                                        </td>
                                                        <td>
                                                        1: 0.6-1.7
                                                        </td>
                                                    </tr>
                                                    @endif    
                                                </tbody>
                                            </table>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    @if($type == 'both' || $type == 'serology')
                                        <td height="15" align="center"><span class="lblReport">SEROLOGY</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>
                                        @if($type == 'both' || $type == 'serology')
                                            <table width="760" border="0" cellpadding="0" cellspacing="0" class="">
                                                <tbody>
                                                    <tr>
                                                        <td width="196" align="left" class=""><b>EXAMINATION</b></td>
                                                        <td width="191" align="left" class=""><b>RESULTS</b></td>
                                                        <td width="172" align="center" class=""><b>CUT OFF VALUE</b></td>
                                                        <td width="169" align="center" class=""><b>PATIENT'S VALUE</b></td>
                                                    </tr>
                                                    @if(optional($exam_sero)->vdrl_result)
                                                        <tr>
                                                            <td align="left">VDRL/RPR</td>
                                                            <td align="left" valign="top">{{$exam_sero->vdrl_result}}</td>
                                                            <td align="center" valign="top"> - </td>
                                                            <td align="center" valign="top"> - </td>
                                                        </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->hbsag_result)
                                                    <tr>
                                                        <td align="left">HBsAg (Hepatitis B) </td>
                                                        <td align="left" valign="top">{{$exam_sero->hbsag_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->hbsag_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->hbsag_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihcv_result)
                                                    <tr>
                                                        <td align="left">Anti-HCV (Hepatitis C) </td>
                                                        <td align="left" valign="top">{{$exam_sero->antihcv_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihcv_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihcv_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihavlgm_result)
                                                    <tr>
                                                        <td align="left">Anti-HAV IgM</td>
                                                        <td align="left" valign="top">{{$exam_sero->antihavlgm_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihavlgm_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihavlgm_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihavlgg_result)
                                                    <tr>
                                                        <td align="left">Anti-HAV IgG</td>
                                                        <td align="left" valign="top">{{$exam_sero->antihavlgg_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->aantihavlgg_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihavlgg_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->tpha_result)
                                                    <tr>
                                                        <td align="left">TPHA</td>
                                                        <td align="left" valign="top">
                                                            @if($exam_sero->tpha_result == 'Reactive')
                                                                Positive
                                                            @elseif($exam_sero->tpha_result == 'Non Reactive')
                                                                Negative
                                                            @endif
                                                        </td>
                                                        <td align="center" valign="top"> - </td>
                                                        <td align="center" valign="top"> - </td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihbs_result)
                                                    <tr>
                                                        <td align="left">Anti-HBs</td>
                                                        <td align="left" valign="top">{{$exam_sero->antihbs_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbs_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbs_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->hbeag_result)
                                                    <tr>
                                                        <td align="left">HBeAg</td>
                                                        <td align="left" valign="top">{{$exam_sero->hbeag_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->hbeag_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->hbeag_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihbe_result)
                                                    <tr>
                                                        <td align="left">Anti-HBe</td>
                                                        <td align="left" valign="top">{{$exam_sero->antihbe_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbe_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbe_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihbclgm_result)
                                                    <tr>
                                                        <td align="left">Anti-HBc (lgM):</td>
                                                        <td align="left" valign="top">{{$exam_sero->antihbclgm_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbclgm_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbclgm_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->antihbclgg_result)
                                                    <tr>
                                                        <td align="left">Anti-HBc (lgG)</td>
                                                        <td align="left" valign="top">{{$exam_sero->antihbclgg_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbclgg_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->antihbclgg_value}}</td>
                                                    </tr>
                                                    @endif
                                                    @if(optional($exam_sero)->sothers_result)
                                                    <tr>
                                                        <td align="left">{{$exam_sero->sothers}}</td>
                                                        <td align="left" valign="top">{{$exam_sero->sothers_result}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->sothers_cutoff}}</td>
                                                        <td align="center" valign="top">{{$exam_sero->sothers_value}}</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellpadding="2" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="120" align="center" valign="bottom">
                                                        <table width="260" border="0" cellspacing="2" cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                         @if($technician1)
                                                                            @if($technician1->signature)
                                                                                <img src="{{$technician1->signature}}" width="220" style="object-fit: cover; transform: translate(0px, 20px);"/>
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr valign="bottom">
                                                                    <td align="center" class="brdTop">
                                                                        @if ($technician1)
                                                                            {{$technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title}}<br>
                                                                            Medical Technologist<br>
                                                                            Lic. No.
                                                                            {{$technician1->license_no}}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td colspan="3" align="center" valign="bottom">
                                                        <table width="260" border="0" cellspacing="2" cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                                                                            <img src="../../../app-assets/images/signatures/noel_lab_sig.png" width="240" height="90" style="object-fit: cover; transform: translate(0px, 40px);" />
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr valign="bottom">
                                                                    <td align="center" class="brdTop">
                                                                        @if ($technician2)
                                                                        {{$technician2->firstname . " " . $technician2->middlename . " " . $technician2->lastname . ", " . $technician2->title}}<br>
                                                                        Pathologist<br>
                                                                        Lic. No. {{$technician2->license_no}}
                                                                        @endif

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
                <tr>
                    <td height="30"><span class="lblForm">FORM NO. 15<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>