<html>

<head>
    <title>MISCELLANEOUS</title>
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
                                            style="font-size:15px; text-transform: uppercase;">{{$admission->lastname . ', ' . $admission->firstname . " " . $admission->middlename}}</span>
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
                    <td height="50" align="center" class="lblReport">TEST EXAM</td>
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" border="0" cellpadding="10" cellspacing="0"
                                            class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td height="30" valign="top"><b>EXAMINATION</b></td>
                                                    <td valign="top"><b>RESULT</b></td>
                                                    <td valign="top"><b>NORMAL VALUE</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="37%" height="100" valign="top">@php echo
                                                        nl2br($exam->col1) @endphp</td>
                                                    <td width="31%" valign="top">@php echo nl2br($exam->col2) @endphp
                                                    </td>
                                                    <td width="32%" valign="top">@php echo nl2br($exam->col3) @endphp
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
                                                                    <td align="center"></td>
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
                    <td height="60"><span class="lblForm">FORM NO. 40<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>