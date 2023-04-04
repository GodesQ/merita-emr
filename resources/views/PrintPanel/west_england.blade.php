<html>

<head>
    <title>West England</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <!--<link href="dist/css/eureka-print.css?v=1650353917" rel="stylesheet" type="text/css" />-->
    <style>
    body,
    table,
    tr,
    td {
        font-family: arial;
        font-size: 9px;
    }

    .fontBoldLrg {
        font: bold 15px arial;
    }

    .fontMed {
        font: normal 12px arial;
    }
    @page {
        size: A4;
        margin: 0.5;
    }
    </style>
</head>

<body>
    <center>
        <table width="680" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="20" rowspan="3" align="center">
                                        <img src="../../../app-assets/images/logo/logo.jpg" width="90" height="90" alt="">
                                    </td>
                                    <td width="396" rowspan="3" align="center" valign="center">
                                        <span class="lblCompName" style="font-size: 30px; font-weight: 800;font-family: serif; color: #156f29">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                            style="margin-bottom: 20px">
                                        <div style="color: #156f29; font-size: 10px;">5th Flr Jettac Building., #920 Pres. Quirino Ave.
                                                corner San Antonio St. Malate, Manila, Philippines<br>
                                                    Tel Nos.: (632) 8404-3411 / (633) 7003-0403 * Cell No.: +63917 857-6942 / +63908 890-8850<br>
                                                    Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                    Accredited: DOH (RLS 13-026-2123-MF-2) &#8226; POEA &#8226; MARINA Global Group ISO 9001:2015<br>Skuld
                                                    P&amp;I &#8226; West of England P&amp;I &#8226; Oil &amp; Gas UK &#8226; Panama Maritime Authority </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" valign="bottom" class="lblReport">
                        <table width="680" border="0" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td align="right">
                                        <img width="130" src="../../../app-assets/images/logo/logoWOE.png">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" valign="top">
                        <table width="680" border="0" cellspacing="1" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="680" border="0" cellpadding="3" cellspacing="0" class="brdMLC">
                                            <tbody>
                                                <tr>
                                                    <td colspan="5" align="center"
                                                        style="font-size:x-large; font-weight:bold;">MEDICAL CERTIFICATE
                                                        FOR SERVICE AT SEA</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="120" valign="top">
                                                        SURNAME/LAST NAME:<br>
                                                        <span class="fontBoldLrg">{{$admission->patient->lastname}}</span>
                                                    </td>
                                                    <td colspan="2" valign="top">
                                                        GIVEN/FIRST NAME:<br>
                                                        <span class="fontBoldLrg">{{$admission->patient->firstname}}</span>
                                                    </td>
                                                    <td width="213" valign="top">
                                                        MIDDLE NAME:<br>
                                                        <span class="fontBoldLrg">{{$admission->patient->middlename}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="91" valign="top">
                                                        AGE:<br>
                                                        <span class="fontMed">{{$admission->patient->age}}</span>
                                                    </td>
                                                    <td colspan="2" valign="top">
                                                        DATE OF BIRTH: (DAY/MONTH/YEAR)<br>
                                                        <span class="fontMed">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span>
                                                    </td>
                                                    <td width="205" valign="top">
                                                        PLACE OF BIRTH:<br>
                                                        <span class="fontMed">{{$admission->patient->patientinfo->birthplace}}</span>
                                                    </td>
                                                    <td valign="top">
                                                        NATIONALITY:<br>
                                                        <span class="fontMed">{{$admission->patient->patientinfo->nationality}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" valign="top">
                                                        GENDER:&nbsp;&nbsp;{{$admission->patient->gender}} </td>
                                                    <td colspan="2" valign="top">
                                                        CIVIL STATUS: &nbsp;&nbsp;{{$admission->patient->patientinfo->maritalstatus}}</td>
                                                    <td valign="top">
                                                        RELIGION: &nbsp;&nbsp;{{$admission->patient->patientinfo->religion}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" valign="top">
                                                        ADDRESS:<br>
                                                        <span class="fontMed">{{$admission->patient->patientinfo->address}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" valign="top">
                                                        PASSPORT NUMBER:<br>
                                                        <span class="fontMed">{{$admission->patient->patientinfo->passportno}}</span>
                                                    </td>
                                                    <td valign="top">SEAMAN'S BOOK NUMBER:<br>
                                                        <span class="fontMed">{{$admission->patient->patientinfo->srbno}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" valign="top">
                                                        POSITION APPLIED FOR:<br>
                                                        <b>DECK</b>&nbsp;&nbsp;&nbsp;
                                                        @if($admission->category == "DECK SERVICES")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <b>ENGINE</b>&nbsp;&nbsp;&nbsp;
                                                        @if($admission->category == "ENGINE SERVICES")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <b>CATERING&nbsp;&nbsp;&nbsp;</b>
                                                        @if($admission->category == "CATERING SERVICES")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif&nbsp;&nbsp;&nbsp;
                                                        <b>OTHER</b>
                                                        @if($admission->category == "OTHER SERVICES")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                        SPECIFY: {{$admission->position}}
                                                    </td>
                                                    <td valign="top">COMPANY:<br>
                                                        <span class="fontMed">
                                                            @if (preg_match("/Bahia/i", $admission->agencyname))
                                                                {{'Bahia Shipping Services, Inc.'}}
                                                            @else
                                                                {{$admission->agency->agencyname}}
                                                            @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"><b>DECLARATION OF THE AUTHORIZED PHYSICIAN</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="87%" valign="middle">CONFIRMATION THAT
                                                                        IDENTIFICATION DOCUMENTS WERE CHECKED AT THE
                                                                        POINT OF EXAMINATION:</td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <!-- check if the remarks in patient exam_audio is normal -->
                                                                    <td width="87%" valign="middle">HEARING MEETS THE
                                                                        STANDARDS IN STCW
                                                                        CODE, SECTION A-1/9?</td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_audio)
                                                                        @if (preg_match('/normal/i', $admission->exam_audio->remarks_status))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_audio)
                                                                        @if (preg_match('/findings/i', $admission->exam_audio->remarks_status))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="87%" valign="middle">UNAIDED HEARING
                                                                        SATISFACTORY? </td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_audio)
                                                                        @if (preg_match('/unaided/i',$admission->exam_audio->hearing))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_audio)
                                                                        @if (!preg_match('/unaided/i',
                                                                        $admission->exam_audio->hearing))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="87%" valign="middle">VISUAL ACUITY MEETS
                                                                        STANDARDS IN
                                                                        STCW CODE, SECTION A-1/9?</td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_visacuity)
                                                                        @if (preg_match('/normal/i',
                                                                        $admission->exam_visacuity->remarks_status))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif

                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_visacuity)
                                                                        @if (preg_match('/findings/i', $admission->exam_visacuity->remarks_status))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" valign="top">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="87%" valign="middle">COLOUR VISION MEETS
                                                                        STANDARDS IN
                                                                        STCW CODE, SECTION A-1/9? <br>
                                                                        Date of last colour vision test:
                                                                        {{$admission->exam_ishihara ? date_format(new DateTime($admission->exam_ishihara->trans_date), "F d, Y") : null}}
                                                                    </td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_ishihara)
                                                                        @if (preg_match('/normal/i', $admission->exam_ishihara->remarks_status))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_ishihara)
                                                                        @if (preg_match('/findings/i', $admission->exam_ishihara->remarks_status))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="32%" valign="middle">VISUAL AIDS (tick if
                                                                        worn) </td>
                                                                    <td width="11%" align="right" valign="middle">
                                                                        SPECTACLES&nbsp;&nbsp;
                                                                    </td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_physical)
                                                                        @if (preg_match('/Spectacles/i', $admission->exam_physical->visual_required))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td width="14%" align="right" valign="middle">
                                                                        CONTACT
                                                                        LENSES&nbsp;&nbsp; </td>
                                                                    <td width="40%" valign="middle">
                                                                        @if ($admission->exam_physical)
                                                                        @if (preg_match('/Contact Lenses/i',
                                                                        $admission->exam_physical->visual_required))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="87%" valign="middle">FIT FOR LOOKOUT
                                                                        DUTIES: </td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_physical)
                                                                        @if (preg_match('/Fit/i', $admission->exam_physical->duty))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_physical)
                                                                        @if (!preg_match('/Fit/i',
                                                                        $admission->exam_physical->duty))
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="tblNoneRightNew">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="87%" valign="middle">FIT BUT AT RISK?<br>
                                                                        If “AT RISK” specify limitations or
                                                                        restrictions : <br>
                                                                          @if ($admission->exam_physical)
                                                                            {{$admission->exam_physical->describe_restriction}}
                                                                          @endif
                                                                    </td>
                                                                    <td width="4%" valign="middle">YES</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_physical)
                                                                        @if ($admission->exam_physical->question8 == "Yes" ||
                                                                        $admission->exam_physical->question8 == "1")
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td width="3%" valign="middle">NO</td>
                                                                    <td width="3%" valign="middle">
                                                                        @if ($admission->exam_physical)
                                                                        @if ($admission->exam_physical->question8 == "No" ||
                                                                        $admission->exam_physical->question8 == "0")
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
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
                                    <td align="center">
                                        <table width="678" border="0" cellpadding="0" cellspacing="0" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="678" border="0" cellpadding="3" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="178" align="center" valign="middle"
                                                                        class="brdBtm" style="padding-top:20px;">
                                                                        @if($admission->patient->patient_image)
                                                                        <img src="../../../app-assets/images/profiles/{{$admission->patient->patient_image}}"
                                                                            alt="Patient Picture" width="140"
                                                                            height="120" class="brdAll">
                                                                        @else
                                                                        <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                                            alt="Patient Picture" width="140"
                                                                            height="120" class="brdAll">
                                                                        @endif<br>
                                                                        <span class="fontMed">{{$admission->patient->patientcode}}</span>
                                                                    </td>
                                                                    <td width="500" class="brdLeftBtm">
                                                                        <table width="500" border="0" cellpadding="0"
                                                                            cellspacing="0" class="size10">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        THIS IS TO CERTIFY THAT A
                                                                                        MEDICAL AND PHYSICAL EXAMINATION
                                                                                        WAS GIVEN IN ACCORDANCE WITH
                                                                                        WEST OF ENGLAND REOMMENDED
                                                                                        PROTOCOLS HAS BEEN CARRIED
                                                                                        OUT<br>
                                                                                        <br>
                                                                                        <span>NAME OF SEAFARER:
                                                                                        </span><span
                                                                                            class="fontBoldLrg"><u>{{$admission->patient->lastname}},
                                                                                                {{$admission->patient->firstname}}
                                                                                                {{$admission->patient->middlename}}</u></span><br><br>
                                                                                        <span
                                                                                            class="fontMed">RESULT:<br>
                                                                                            <span
                                                                                                style="margin-left:50px">FIT
                                                                                                FOR DUTY
                                                                                                @if ($admission->exam_physical)
                                                                                                @if(preg_match('/Fit/i',
                                                                                                $admission->exam_physical->duty) )
                                                                                                <img src="../../../app-assets/images/icoCheck.gif"
                                                                                                    width="10">
                                                                                                @else
                                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                                    width="10">
                                                                                                @endif
                                                                                                @else
                                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                                    width="10">
                                                                                                @endif
                                                                                            </span>
                                                                                            <span
                                                                                                style="margin-left:20px">FIT BUT AT RISK <img
                                                                                                    src="../../../app-assets/images/icoUncheck.gif"
                                                                                                    width="10"></span>
                                                                                            <span
                                                                                                style="margin-left:20px">UNFIT
                                                                                                FOR DUTY
                                                                                                @if ($admission->exam_physical)
                                                                                                @if(!preg_match('/Fit/i',
                                                                                                $admission->exam_physical->duty))
                                                                                                <img src="../../../app-assets/images/icoCheck.gif"
                                                                                                    width="10">
                                                                                                @else
                                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                                    width="10">
                                                                                                @endif
                                                                                                @else
                                                                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                                                                    width="10">
                                                                                                @endif
                                                                                            </span>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" valign="bottom">
                                                                                        <br>
                                                                                        <span style="margin-left:280px">
                                                                                            @if($admission->exam_physical)
                                                                                                @if($admission->exam_physical->first_tech->tech1_signature)
                                                                                                    <img src="{{$admission->exam_physical->first_tech->signature}}" alt="e-Signature" width="80" height="25">
                                                                                                @endif
                                                                                            @endif
                                                                                        </span><br>
                                                                                        Name and Signature of
                                                                                        Examining/Authorized Physician:
                                                                                        @if ($admission->exam_physical)
                                                                                            {{$admission->exam_physical->first_tech->firstname . " " . $admission->exam_physical->first_tech->middlename[0] . "." . " " . $admission->exam_physical->first_tech->lastname . ", " . $admission->exam_physical->first_tech->title}}
                                                                                        @endif<br><br>
                                                                                        Date of Examination:
                                                                                        @if ($admission->exam_physical)
                                                                                            {{date_format(new DateTime($admission->exam_physical->trans_date), "F d, Y")}}
                                                                                        @endif<br>
                                                                                        <br>
                                                                                        <br>
                                                                                        <br>
                                                                                        Approved By: TERESITA F.
                                                                                        GONZALES, MD<br><br>
                                                                                        Title: MEDICAL DIRECTOR
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="140" align="center" class="brdRight">
                                                                        <img src="../../../app-assets/images/logo/hologramWOE.jpg"
                                                                            width="100" height="100"><br><span
                                                                            class="fontMed">{{$admission->exam_physical ? $admission->exam_physical->progressive_notes : null}}</span>
                                                                    </td>
                                                                    <td valign="top" class="brdLeft">
                                                                        <table width="100%" border="0" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top">
                                                                                        NAME OF CLINIC: MERITA
                                                                                        DIAGNOSTIC CLINIC INC.<br><br>
                                                                                        ADDRESS: 5th &amp; 6th Flr
                                                                                        Jettac Bldg., 920 Quirino Ave.
                                                                                        Cor. San Antonio St. Malate
                                                                                        Manila<br><br>
                                                                                        PHYSICIAN’S CERTIFYING
                                                                                        AUTHORITY: PROFESSIONAL
                                                                                        REGULATION COMMISSION <br><br>
                                                                                        PHYSICIAN’S LICENSE NUMBER:
                                                                                        @if ($admission->exam_physical)
                                                                                        {{$admission->exam_physical->license_no}}
                                                                                        @endif </td>
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
                                    <td>
                                        <table width="680" border="0" cellpadding="2" cellspacing="0" class="brdMLC">
                                            <tbody>
                                                <tr>
                                                    <td colspan="7">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                            id="brdNone">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="4">I HAVE READ AND UNDERSTOOD AND WAS
                                                                        INFORMED OF THE CONTENTS OF THE CERTIFICATE AND
                                                                        OF THE RIGHT TO A REVIEW IN ACCORDANCE WITH
                                                                        PARAGRAPH 6 OF SECTION A-1/9 OF THE STCW
                                                                        CODE.<br><br> </td>
                                                                </tr>
                                                                <style>
                                                                    #divImage {
                                                                        width: 100%;
                                                                        height: 35px;
                                                                        position: relative;
                                                                        margin-bottom: 18px;
                                                                    }

                                                                    #divImage img {
                                                                        position: absolute;
                                                                        width: 100px;
                                                                        height: 50px;
                                                                        top: 1%;
                                                                        left: 35%;
                                                                        object-fit: cover;
                                                                    }
                                                                </style>
                                                                <tr>
                                                                    <td width="27%">&nbsp;</td>
                                                                    <td width="48%" align="center">
                                                                        <div id="divImage">
                                                                            @if($admission->agency_id != 19)
                                                                                @if($admission->patient->patient_signature)
                                                                                    <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" class="signature-taken" />
                                                                                @elseif ($admission->signature)
                                                                                    <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" class="signature-taken"/>
                                                                                @else
                                                                                    <div style="width: 150px;height: 40px;"></div>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td width="6%">&nbsp;</td>
                                                                    <td width="19%">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="27%">SEAFARER’S NAME AND SIGNATURE:</td>
                                                                    <td width="48%" align="center"
                                                                        style="border-bottom:solid 1px black">
                                                                        <b>{{$admission->patient->lastname}},
                                                                            {{$admission->patient->firstname}}
                                                                            {{$admission->patient->middlename}}</b>
                                                                    </td>
                                                                    <td width="6%">DATE:</td>
                                                                    <td width="19%"
                                                                        style="border-bottom:solid 1px black">
                                                                        {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}
                                                                    </td>
                                                                </tr>
                                                                <tr height="20">
                                                                    <td colspan="4" valign="bottom">(This signature
                                                                        should be affixed in the presence of the
                                                                        examining physician)</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" cellpadding="2" cellspacing="0" class="brdMLC"
                                            style="margin-top:1px">
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" style="font-size:12px"> <b>DATE OF ISSUANCE:</b> {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->peme_date), "d F Y") : null}}</td>
                                                    <td width="51%" style="font-size:12px"> <b>DATE OF EXPIRATION:</b>
                                                        {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}
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
                    <td colspan="3" valign="top"> <span class="lblForm">FORM NO.84 / REV. 00 / 21 Feb. 2019</span> </td>
                </tr>
            </tbody>
        </table>
    </center>

</body>

</html>
