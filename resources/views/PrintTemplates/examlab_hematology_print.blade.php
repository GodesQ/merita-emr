<html>

<head>
    <title>HEMATOLOGY</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        table td {
            font-size: 14px;
        }
        .red-text{
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
                    <td height="50" align="center" class="lblReport">HEMATOLOGY</td>
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" border="0" cellpadding="10" cellspacing="0" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td width="290" align="center" class="brdBtm"><b>EXAMINATION</b>
                                                    </td>
                                                    <td width="342" align="center" class="brdLeftBtm"><b>RESULTS</b>
                                                    </td>
                                                    <td align="center" class="brdLeftBtm"><b>NORMAL VALUES</b></td>
                                                </tr>

                                                @if($exam->hemoglobin != " ")
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        <p>Hemoglobin</p>
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm {{$exam->hemoglobin < 120 || $exam->hemoglobin > 170 ? 'red-text' : ''}}">
                                                        {{$exam->hemoglobin}}
                                                        @if($exam->hemoglobin < 120)
                                                            L
                                                        @endif
                                                        @if($exam->hemoglobin >  170)
                                                            H
                                                        @endif
                                                        </td>
                                                    <td width="156" align="left" valign="top" class="brdLeftBtm">120 - 170 g/L</td>
                                                </tr>
                                                @endif

                                                @if($exam->hematocrit != "")
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        <p>Hematocrit</p>
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm {{$exam->hematocrit < 0.40 || $exam->hematocrit > 0.54 ? 'red-text' : ''}}">
                                                        {{$exam->hematocrit}}
                                                        @if($exam->hematocrit < 0.40)
                                                            L
                                                        @endif
                                                        @if($exam->hematocrit >  0.54)
                                                            H
                                                        @endif
                                                    </td>
                                                    <td width="156" align="left" valign="top" class="brdLeftBtm">0.40 - 0.54</td>
                                                </tr>
                                                @endif

                                                @if ($exam->rbc != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">RBC</td>
                                                    <td align="left" valign="top" class="brdLeftBtm {{$exam->rbc < 3.5 || $exam->rbc > 5.5 ? 'red-text' : ''}}">
                                                        {{$exam->rbc}}
                                                        @if($exam->rbc < 3.5)
                                                            L
                                                        @endif
                                                        @if($exam->rbc >  5.5)
                                                            H
                                                        @endif
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">3.5 - 5.5
                                                        10<sup>12</sup> /L</td>
                                                </tr>
                                                @endif

                                                @if($exam->wbc != "")
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">WBC</td>
                                                    <td align="left" valign="top" class="brdLeftBtm {{$exam->wbc < 5 || $exam->wbc > 10 ? 'red-text' : ''}}">
                                                        {{$exam->wbc}}
                                                        @if($exam->wbc < 5)
                                                            L
                                                        @endif
                                                        @if($exam->wbc >  10)
                                                            H
                                                        @endif
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">5 - 10 x
                                                        10<sup>9</sup> /L</td>
                                                </tr>
                                                @endif

                                                @if ($exam->neuthrophils != " ")
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Neutrophil<br>
                                                        </p>
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->neuthrophils}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">0.50 - 0.70</td>
                                                </tr>
                                                @endif

                                                @if ($exam->lymphocytes != "")
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Lymphocyte</p>
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->lymphocytes}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">0.20 - 0.40</td>
                                                </tr>
                                                @endif

                                                @if ($exam->eosinophils != "")
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Eosinophil</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->eosinophils}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">0.00 - 0.05</td>
                                                </tr>
                                                @endif

                                                @if ($exam->monophils != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Monocyte</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->monophils}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">0.00 - 0.10</td>
                                                </tr>
                                                @endif

                                                @if ($exam->baspophils != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Basophil</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->baspophils}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">0.00 - 0.01</td>
                                                </tr>
                                                @endif

                                                @if ($exam->stabs != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Stabs</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->stabs}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">0.00 - 0.05</td>
                                                </tr>
                                                @endif

                                                @if ($exam->blood != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Blood Type</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->blood}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">&nbsp;</td>
                                                </tr>
                                                @endif

                                                @if ($exam->rhfactor != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Rh Factor</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->rhfactor}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">&nbsp;</td>
                                                </tr>
                                                @endif

                                                @if ($exam->platelet != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Platelet</td>
                                                    <td align="left" valign="top" class="brdLeftBtm {{$exam->platelet < 150 || $exam->platelet >450 ? 'red-text' : ''}}">
                                                        {{$exam->platelet}}
                                                        @if($exam->platelet < 150)
                                                            L
                                                        @endif
                                                        @if($exam->platelet >  450)
                                                            H
                                                        @endif
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">150 - 450 X
                                                        10<sup>9</sup> /L</td>
                                                </tr>
                                                @endif

                                                @if ($exam->bleeding != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Bleeding Time </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->bleeding}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">1-7 Minutes</td>
                                                </tr>
                                                @endif

                                                @if ($exam->clotting != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Clotting Time</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->clotting}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">5-15 Minutes</td>
                                                </tr>
                                                @endif

                                                @if ($exam->esr != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;ESR</td>
                                                    <td align="left" valign="top" class="brdLeftBtm ">{{$exam->esr}}</td>
                                                    <td valign="top" class="brdLeftBtm">
                                                        <?= $admission->gender == 'Male'
                                                            ? '0 - 10 mm/hr'
                                                            : '0 - 20 mm/hr' ?>
                                                    </td>
                                                </tr>
                                                @endif

                                                @if ($exam->mcv != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;MCV</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->mcv}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">80 - 100 fL5</td>
                                                </tr>
                                                @endif

                                                @if ($exam->mch != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;MCH</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->mch}}</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">27 - 34 pg</td>
                                                </tr>
                                                @endif

                                                @if ($exam->mchc != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;MCHC</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->mchc}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">320 - 360 g/L</td>
                                                </tr>
                                                @endif

                                                @if ($exam->others != '')
                                                <tr>
                                                    <td align="left" valign="top" class="brdBtm">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Others</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->others}}
                                                    </td>
                                                    <td align="left" valign="top" class="brdLeftBtm">&nbsp;</td>
                                                </tr>
                                                @endif


                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="760" border="0" cellpadding="2" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="120" align="center" valign="bottom">
                                                        <table width="260" border="0" cellspacing="2" cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        @if($technician1)
                                                                            @if($technician1->signature)
                                                                                <img src="{{$technician1->signature}}" width="100px" style="object-fit: cover;"/>
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr valign="bottom">
                                                                    <td align="center" class="brdTop">
                                                                        @if ($technician1)
                                                                        {{$technician1->firstname . " " . $technician1->middlename[0] . "." . " " . $technician1->lastname . ", " . $technician1->title}}<br>
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
                                                                        Lic. No.
                                                                        {{$technician2->license_no}}
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
                    <td height="30"><span class="lblForm">FORM NO. 26<br>REV. 02 / 06-15-2022</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>
