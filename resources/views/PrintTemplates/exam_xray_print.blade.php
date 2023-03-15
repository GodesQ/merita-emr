<html>

<head>
    <title>XRAY</title>
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
                    <td height="50" align="center" class="lblReport">ROENTGENOLOGICAL REPORT </td>
                </tr>
                <tr>
                    <td>
                        <style>
                        body,
                        table,
                        td,
                        tr {
                            font-size: 18px;
                        }

                        .tbl tr td {
                            font-size: 16px;
                        }
                        </style>
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td width="596" colspan="2" align="left" valign="top">
                                        <table width="100%" border="0" cellspacing="5" cellpadding="20">
                                            <tbody>
                                                <tr>
                                                    <td width="3%">&nbsp;</td>
                                                    <td width="83%" align="right"><b>X-Ray No.:</b></td>
                                                    <td width="14%">{{$exam->xray_no}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Examination: </b>{{$exam->exam}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Exam Type: </b>{{$exam->exam_type}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Findings:</b></td>
                                                </tr>
                                                <tr>
                                                    <td height="70" valign="top">&nbsp;</td>
                                                    <td height="70" valign="top">@php echo nl2br($exam->findings)
                                                        @endphp</td>
                                                    <td height="70" valign="top">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Impression:</b></td>
                                                </tr>
                                                <tr>
                                                    <td height="70" valign="top">&nbsp;</td>
                                                    <td height="70" valign="top">@php echo nl2br($exam->impression)
                                                        @endphp</td>
                                                    <td height="70" valign="top">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" valign="top">
                                                        <table width="760" border="0" cellpadding="2" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="120" align="center" valign="bottom">
                                                                        <table width="260" border="0" cellspacing="2"
                                                                            cellpadding="2" class="tbl">
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
                                                                                    {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : ""}}<br>
                                                                                        Radiologic Technologist </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td colspan="3" align="center" valign="bottom">
                                                                        <table width="260" border="0" cellspacing="2"
                                                                            cellpadding="2" class="tbl">
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
                                                                                    {{$technician2 ? $technician2->firstname . " " . $technician2->middlename . " " . $technician2->lastname . ", " . $technician2->title : ""}}<br>
                                                                                        Radiologist</td>
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
                    <td height="60"><span class="lblForm">FORM NO. 34<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>