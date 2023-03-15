<html>

<head>
    <title>URINALYSIS</title>
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
                                       <span style="font-size:15px; text-transform: uppercase;">{{$admission->lastname . " " . $admission->suffix . ', ' . $admission->firstname . " " . $admission->middlename}}</span>
                                    </td>
                                    <td width="39" valign="top" class="brdLeftBtm"><b>AGE:</b><br>
                                        <span style="font-size:15px">{{$admission->age}}</span>
                                    </td>
                                    <td width="45" valign="top" class="brdLeftBtm"><b>SEX:</b><br>
                                        <span style="font-size:15px">Male</span>
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
                                            NO:</b><br><span style="font-size:15px">{{$admission->patientcode}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="50" align="center" class="lblReport">URINALYSIS</td>
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="800" border="0" cellpadding="2" cellspacing="0" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td width="231" align="center" class="brdBtm"><b>MACROSCOPIC</b>
                                                    </td>
                                                    <td width="140" align="center" class="brdLeftBtm"><b>RESULTS</b>
                                                    </td>
                                                    <td width="206" align="center" class="brdLeftBtm"><b>MICROSCOPIC</b>
                                                    </td>
                                                    <td width="205" align="center" class="brdLeftBtm"><b>RESULTS</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Color</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->color}}
                                                    </td>
                                                    <td valign="top" class="brdLeftBtm">Pus Cells</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->pus}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Transparency</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->transparency}}</td>
                                                    <td valign="top" class="brdLeftBtm">RBC</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->rbc}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">pH</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->ph}}</td>
                                                    <td valign="top" class="brdLeftBtm">Epithelial Cells</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->epithelial}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Specific Gravity</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->spgravity}}</td>
                                                    <td valign="top" class="brdLeftBtm">Amorphous Urates</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->urates}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Sugar</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->sugar}}
                                                    </td>
                                                    <td valign="top" class="brdLeftBtm">Amorphous Phosphates</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->phosphates}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Protein/Albumin</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->albumin}}
                                                    </td>
                                                    <td valign="top" class="brdLeftBtm">Mucus Threads</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->mucus}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Ketone</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->ketone}}
                                                    </td>
                                                    <td valign="top" class="brdLeftBtm">Bacteria</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->bacteria}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Urobilinogen</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->urobilinogen}}</td>
                                                    <td colspan="2" rowspan="5" align="left" valign="top"
                                                        class="brdLeft">OTHERS:
                                                        {{$exam->others}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Bilirubin</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->bilirubin}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Nitrite</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">{{$exam->nitrite}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="brdBtm">Leukocyte</td>
                                                    <td align="left" valign="top" class="brdLeftBtm">
                                                        {{$exam->leukocyte}}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Blood Cell</td>
                                                    <td align="left" valign="top" class="brdLeft">{{$exam->blood}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
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
                                                                            {{$technician1->firstname . " " . $technician1->middlename[0] . "." . " " . $technician1->lastname . ", " . $technician1->title}}<br>
                                                                            Medical Technologist<br>
                                                                            Lic. No. {{$technician1->license_no}} 
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
                                                                        {{$technician2->firstname . " " . $technician2->middlename[0] . "." . " " . $technician2->lastname . ", " . $technician2->title}}<br>
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
                    <td height="60"><span class="lblForm">FORM NO. 31<br>REV. 02 / 06-15-2022</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>