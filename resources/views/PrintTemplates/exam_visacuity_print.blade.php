<html>

<head>
    <title>VISUAL ACUITY</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
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
                    <td height="50" align="center" class="lblReport">VISUAL ACUITY</td>
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" align="center" class="brdBtm"><b>VISUAL ACUITY</b>
                                                    </td>
                                                    <td colspan="2" align="center" class="brdLeftBtm"><b>FAR VISION</b>
                                                    </td>
                                                    <td colspan="2" align="center" class="brdLeftBtm"><b>NEAR VISION</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="brdBtm">&nbsp;</td>
                                                    <td width="18%" align="center" class="brdLeftBtm"><b>OD</b></td>
                                                    <td width="18%" align="center" class="brdLeftBtm"><b>OS</b></td>
                                                    <td width="17%" align="center" class="brdLeftBtm"><b>ODJ</b></td>
                                                    <td width="17%" align="center" class="brdLeftBtm"><b>OSJ</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center" class="brdBtm"><b>Uncorrected</b>
                                                    </td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->ufvod}}</td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->ufvos}}</td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->unvodj}}</td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->unvosj}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center" class="brdBtm"><b>Corrected</b></td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->cfvod}}</td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->cfvos}}</td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->cnvodj}}</td>
                                                    <td align="center" class="brdLeftBtm">{{$exam->cnvosj}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"><b>Remarks</b></td>
                                                    <td colspan="5" class="brdLeft">{{$exam->remarks}}</td>
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
                                                    <td height="120" align="right" valign="bottom">
                                                        <table width="760" border="0" cellpadding="2" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="120" align="center" valign="bottom">
                                                                        <table width="260" border="0" cellspacing="2"
                                                                            cellpadding="2">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        @if ($technician1)
                                                                                            @if($technician1->signature)
                                                                                                <img src="{{$technician1->signature}}" width="150" height="50" style="object-fit: cover;" />
                                                                                            @else
                                                                                                <div style="width: 150px;height: 20px;"></div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr valign="bottom">
                                                                                    <td align="center" class="brdTop">
                                                                                        @if ($technician1)
                                                                                        {{$technician1->firstname . " " . $technician1->middlename[0] . "." . " " . $technician1->lastname . ", " . $technician1->title}}<br>
                                                                                        @endif
                                                                                        Optometrist</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td colspan="3" align="center" valign="bottom">
                                                                        <table width="260" border="0" cellspacing="2"
                                                                            cellpadding="2">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        @if ($technician2)
                                                                                            @if($technician2->signature)
                                                                                                <img src="{{$technician2->signature}}" width="150" height="50" style="object-fit: cover;" />
                                                                                            @else
                                                                                                <div style="width: 150px;height: 20px;"></div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr valign="bottom">
                                                                                    <td align="center" class="brdTop">
                                                                                        @if ($technician2)
                                                                                        {{$technician2->firstname . " " . $technician2->middlename  . "." . " " . $technician2->lastname . ", " . $technician2->title}}<br>
                                                                                        @endif
                                                                                        Medical Director</td>
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
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="60"><span class="lblForm">FORM NO. xx<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>