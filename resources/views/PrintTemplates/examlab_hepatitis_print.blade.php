<html>

<head>
    <title>HEPATITIS PROFILE</title>
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
                    <td height="50" align="center" class="lblReport">HEPATITIS PROFILE</td>
                </tr>
                <tr>
                    <td align="center">
                        <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdAll">
                            <tbody>
                                <tr>
                                    <td align="center" class="brdBtm"><b>EXAMINATION</b></td>
                                    <td width="175" align="center" class="brdLeftBtm"><b>RESULTS</b></td>
                                    <td width="204" align="center" class="brdLeftBtm"><b>CUT-OFF VALUE</b></td>
                                    <td width="172" align="center" class="brdLeftBtm"><b>PATIENT'S VALUE</b></td>
                                </tr>
                                <tr>
                                    <td width="191" align="left" valign="top" class="brdBtm">HBsAg</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->hbsag_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->hbsag_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->hbsag_cutoff}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HBs</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihbs_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbs_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbs_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">HBeAg</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->hbeag_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->hbeag_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->hbeag_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HBe</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihbe_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbe_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbe_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HBc (lgM):</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihbclgm_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbclgm_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbclgm_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HBc (lgG)</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihbclgg_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbclgg_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihbclgg_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HAV (lgM)</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihavlgm_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihavlgm_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihavlgm_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HAV (lgG)</td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihavlgg_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihavlgg_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihavlgg_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="brdBtm">Anti-HCV </td>
                                    <td valign="top" class="brdLeftBtm">{{$exam->antihcv_result}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihcv_cutoff}}</td>
                                    <td align="center" class="brdLeftBtm">{{$exam->antihcv_value}}</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="table no-border">Others</td>
                                    <td valign="top" class="brdLeft">{{$exam->others_result}}</td>
                                    <td align="center" class="brdLeft">{{$exam->others_cutoff}}</td>
                                    <td align="center" class="brdLeft">{{$exam->others_value}}</td>
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
                                    <td height="120" align="center" valign="bottom">
                                        <table width="260" border="0" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        @if($technician1)
                                                            <img src="{{$technician1->signature}}" width="100px" style="object-fit: cover;"/>
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
                <tr>
                    <td height="60"><span class="lblForm">FORM NO. 28<br>
                            REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>