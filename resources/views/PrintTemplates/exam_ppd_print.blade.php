<html>

<head>
    <title>PPD TEST</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
</head>

<body>
    <center>
        <table width="760" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellpadding='0' cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="80" rowspan="3" align="center"><img
                                            src="../../../app-assets/images/logo/logo.jpg" width="100" height="100"
                                            alt=""></td>
                                    <td width="356" rowspan="3" align="center" valign="middle">
                                        <span class="lblCompName" style="font-size: 32px; font-weight: 800;font-family: serif; color: #156f29">MERITA DIAGNOSTIC CLINIC INC.</span>
                                        <br style="margin-bottom: 20px">
                                        <div style="color: #156f29; font-size: 12px;">5th Flr Jettac Building., #920 Pres. Quirino Ave.
                                                corner San Antonio St. Malate, Manila, Philippines<br>
                                                    Tel Nos.: (632) 8404-3411 / (633) 7003-0403 * Cell No.: +63917 857-6942 / +63908 890-8850<br>
                                                    Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                    Accredited: DOH (RLS 13-026-2123-MF-2) • POEA • MARINA Global Group ISO 9001:2015<br>Skuld
                                                    P&amp;I • West of England P&amp;I • Oil &amp; Gas UK • Panama Maritime Authority </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="3" cellspacing="0" style="margin-top: 2rem;">
                            <tbody>
                                <tr>
                                    <td width="20%"></td>
                                    <td width="35%"></td>
                                    <td style="color: #156f29;" width="17%">Date</td>
                                    <td colspan="3" style="border-bottom: 1px solid black;">{{date_format(new DateTime($exam->trans_date), "d F Y")}}</td>
                                </tr>
                                <tr>
                                    <td style="color: #156f29;">
                                        NAME :
                                    </td>
                                    <td style="border-bottom: 1px solid black;">{{$admission->patient->lastname}}, {{$admission->patient->firstname}} {{$admission->patient->middlename}}</td>
                                    <td style="color: #156f29;">
                                       AGE :
                                    </td>
                                    <td width='11%' style="border-bottom: 1px solid black;">
                                        {{$admission->patient->age}}
                                    </td>
                                    <td width='7%' style="color: #156f29;">
                                       SEX :
                                    </td>
                                    <td width='15%' style="border-bottom: 1px solid black;">
                                        {{$admission->patient->gender}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #156f29;">
                                        REQUESTED BY :
                                    </td>
                                    <td style="border-bottom: 1px solid black;">
                                        {{$admission->agency->agencyname}}
                                    </td>
                                    <td style="color: #156f29;">CIVIL STATUS :</td>
                                    <td colspan='3' style="border-bottom: 1px solid black;">
                                        {{$admission->patient->patientinfo->maritalstatus}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding='0' cellspacing="0" height="200">
                            <tbody>
                                <tr>
                                    <td valign='center' align="center" style="font-size: 45px; text-transform: uppercase; font-weight: 700;">
                                        PPD TEST : {{$exam->result}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" border="0" cellpadding="2" cellspacing="0">
                              <tbody><tr>
                                <td height="120" align="center" valign="bottom">
                                  <table width="270" border="0" cellspacing="2" cellpadding="2">
                                    <tbody><tr>
                                      <td align="center">
                                            <br>
                                      </td>
                                    </tr>
                                    <tr valign="bottom">
                                      <td align="center">
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </td>
                                <td colspan="3" align="center" valign="bottom">
                                  <table width="270" border="0" cellspacing="2" cellpadding="2">
                                    <tbody><tr>
                                      <td align="center">
                                            <img src="../../../app-assets/images/signatures/md_gonzales_sig.png" width="220" height="70" style="object-fit: cover; transform: translate(0px, 28px); margin-top: -25px;" /> <br> 
                                            {{$technician2 ? $technician2->firstname . " " . $technician2->middlename . " " . $technician2->lastname . ", " . $technician2->title : ""}}
                                      </td>
                                    </tr>
                                    <tr valign="bottom">
                                      <td align="center" class="brdTop">Medical Director</td>
                                    </tr>
                                  </tbody></table>
                                </td>
                              </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td height="100" style="font-size: 13px;">
                        FORM NO. 40 <br>
                        REV. 01 / 02-10-2020
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>