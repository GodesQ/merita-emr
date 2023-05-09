<html>

<head>
    <title>NORTH OF ENGLAND</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <!--<link href="dist/css/eureka-print.css?v=1650507345" rel="stylesheet" type="text/css" />-->
    <style>
    body,
    table,
    tr,
    td {
        font-family: constantia;
        font-size: 9px;
    }

    .fontBoldLrg {
        font: bold 15px constantia;
    }

    .fontMed {
        font: normal 12px constantia;
    }
    @page {
        size: A4;
        margin: 0;
    }
    </style>
</head>

<body>
    <center>
        <table width="735" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <img src="../../../app-assets/images/logo/marine-med-logo.png" width="70" height="70" alt="">
                </td>
                <td>
                    <table width="545" cellpadding="5" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="10" rowspan="3" align="center">
                                    <img src="../../../app-assets/images/logo/logo.jpg" width="65" height="65" alt="">
                                </td>
                                <td width="525" rowspan="3" align="center" valign="center">
                                    <span class="lblCompName" style="font-size: 26px; font-weight: 800;font-family: serif; color: #156f29">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                        style="margin-bottom: 10px">
                                    <div style="color: #156f29; font-size: 10.5px;">
                                        5th Flr Jettac Building., #920 Pres. Quirino Ave.
                                        corner San Antonio St. Malate, Manila, Philippines<br>
                                        Tel Nos.: (632) 8404-3411 / (633) 7003-0403 * Cell No.: +63917 857-6942 / +63908 890-8850<br>
                                        Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                        Accredited: DOH (RLS 13-026-2123-MF-2) &#8226; POEA &#8226; MARINA Global Group ISO 9001:2015<br>Skuld
                                        P&amp;I &#8226; West of England P&amp;I &#8226; Oil &amp; Gas UK &#8226; Panama Maritime Authority</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <img width="125" src="../../../app-assets/images/logo/standardclub_north.png">
                </td>
            </tr>
            <tr>
                <td height="90" colspan="3" align="center" valign="bottom" class="lblReport">
                    <table width="100%" border="0" cellpacing="0" cellpadding="2">
                        <tr>
                            <td class="brdAll">
                                <table width="100%" border="0" cellspacing="0" cellpadding="2"
                                    style="border: 3px solid black">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="2" cellspacing="0"
                                                class="brdAll">
                                                <tr>
                                                    <td align="center"> <span class="lblReport"><u>MEDICAL CERTIFICATE
                                                                FOR SERVICE AT SEA</u></span><br>
                                                        <b><i>Approved by the Department of Health (DOH) and the
                                                                Maritime Industry Authority (MARINA) of the <br>
                                                                Republic of the Philippines Issued in Compliance with
                                                                STCW Convention, 1978 as amended <br>
                                                                Section A-1/9 Paragraph 7 and the Maritime Labour
                                                                Convention, 2006</i></b>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="top">
                    <table width="735" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <td align="center">
                                <table width="735" border="0" cellpadding="3" cellspacing="0" class="brdMLC">
                                    <tr>
                                        <td colspan="2" valign="top" style="text-transform: uppercase;">
                                            SURNAME/LAST NAME:<br>
                                            <span class="fontBoldLrg">{{$admission->patient->lastname}}</span>
                                        </td>
                                        <td colspan="2" valign="top" style="text-transform: uppercase;">
                                            GIVEN NAME:<br>
                                            <span class="fontBoldLrg">{{$admission->patient->firstname}}</span>
                                        </td>
                                        <td width="255" valign="top" style="text-transform: uppercase;">
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
                                        <td width="163" valign="top">
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
                                            GENDER:&nbsp;&nbsp;{{strtoupper($admission->patient->gender)}} </td>
                                        <td colspan="2" valign="top">
                                            CIVIL STATUS:&nbsp;&nbsp;{{strtoupper($admission->patient->patientinfo->maritalstatus)}}</td>
                                        <td valign="top">
                                            RELIGION:&nbsp;&nbsp;{{$admission->patient->patientinfo->religion}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" valign="top">
                                            ADDRESS:<br>
                                            <span class="fontMed">{{$admission->patient->patientinfo->address}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" valign="top">
                                            PASSPORT NO.:<br>
                                            <span class="fontMed">{{$admission->patient->patientinfo->passportno}}</span>
                                        </td>
                                        <td valign="top">SIRB:<br>
                                            <span class="fontMed">
                                                {{$admission->patient->patientinfo->srbno}}
                                            </span>
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
                                                @if (preg_match("/Bahia/i", $admission->agency->agencyname))
                                                    {{'Bahia Shipping Services, Inc.'}}
                                                @else
                                                    {{$admission->agency->agencyname}}
                                                @endif
                                            </span>
                                            <b> </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><b>DECLARATION OF THE AUTHORIZED PHYSICIAN</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">CONFIRMATION THAT IDENTIFICATION
                                                        DOCUMENTS WERE CHECKED AT THE POINT OF EXAMINATION:</td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <!-- check if the remarks in patient exam_audio is normal -->
                                                    <td width="87%" valign="middle">HEARING MEETS THE STANDARDS IN STCW
                                                        CODE, SECTION A-1/9?</td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_audio)
                                                        @if (preg_match('/normal/i', $admission->exam_audio->remarks_status))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_audio)
                                                        @if (!preg_match('/normal/i',$admission->exam_audio->remarks_status))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">UNAIDED HEARING SATISFACTORY? </td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_audio)
                                                        @if ($admission->exam_audio->hearing == "unaided")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_audio)
                                                        @if ($admission->exam_audio->hearing == "aided")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">VISUAL ACUITY MEETS STANDARDS IN
                                                        STCW CODE, SECTION A-1/9?</td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_visacuity)
                                                        @if (preg_match('/normal/i', $admission->exam_visacuity->remarks_status))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif

                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_visacuity)
                                                        @if (!preg_match('/normal/i', $admission->exam_visacuity->remarks_status))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" valign="top">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">COLOUR VISION MEETS STANDARDS IN
                                                        STCW CODE, SECTION A-1/9? <br>
                                                        Date of last colour vision test:
                                                        {{$admission->exam_ishihara ? date_format(new DateTime($admission->exam_ishihara->trans_date), "d F Y") : null}}
                                                    </td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_ishihara)
                                                        @if (preg_match('/normal/i', $admission->exam_ishihara->remarks_status))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif

                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_ishihara)
                                                        @if (!preg_match('/normal/i', $admission->exam_ishihara->remarks_status))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="32%" valign="middle">VISUAL AIDS (tick if worn) </td>
                                                    <td width="11%" align="right" valign="middle">SPECTACLES&nbsp;&nbsp;
                                                    </td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                        @if (preg_match('/Spectacle/i', $admission->exam_physical->visual_required))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td width="14%" align="right" valign="middle">CONTACT
                                                        LENSES&nbsp;&nbsp; </td>
                                                    <td width="40%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                        @if (preg_match('/Contact Lenses/i',
                                                        $admission->exam_physical->visual_required))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">FIT FOR LOOKOUT DUTIES: </td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                        @if ($admission->exam_physical->duty == 'Fit')
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                        @if ($admission->exam_physical->duty == 'Unfit')
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">FIT BUT AT RISK? <br>
                                                        If "AT RISK" specify limitations or restrictions: <br>
                                                        <input name="co" value="{{$admission->exam_physical ? $admission->exam_physical->describe_restriction : null}}" class="brdNone" style="width:400px;height: 15px;font-size: 10px;text-align:left;border: none;" />
                                                    </td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                            @if ($admission->exam_physical->question8 == "Yes" || $admission->exam_physical->question8 == "1")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                            @if ($admission->exam_physical->question8 == "No" || $admission->exam_physical->question8 == "0")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                id="tblNoneRightNew">
                                                <tr>
                                                    <td width="87%" valign="middle">IS APPLICANT SUFFERING FROM ANY
                                                        MEDICAL CONDITION LIKELY TO BE AGGRAVATED BY SERVICE AT SEA OR
                                                        <br>
                                                        TO RENDER THE SEAFARER UNFIT FOR SUCH SERVICE OR TO ENDANGER THE
                                                        HEALTH OF OTHER PERSONS ON BOARD?
                                                    </td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                    <td width="3%" valign="middle">NO</td>
                                                    <td width="3%" valign="middle">
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <table width="735" border="0" cellpadding="0" cellspacing="0" class="brdAll">
                                    <tr>
                                        <td>
                                            <table width="735" border="0" cellpadding="3" cellspacing="0">
                                                <tr>
                                                    <td width="178" align="center" valign="middle" class="brdBtm"
                                                        style="padding-top:20px;">
                                                        @if($admission->patient->patient_image)
                                                            <img src="../../../app-assets/images/profiles/{{$admission->patient->patient_image . '?' . $admission->patient->updated_date}}"
                                                                alt="Patient Picture" width="140" height="140"
                                                                class="brdAll">
                                                        @else
                                                            <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                                alt="Patient Picture" width="140" height="140"
                                                                class="brdAll">
                                                        @endif<br>
                                                        <span class="fontMed">{{$admission->patient->patientcode}}</span>
                                                    </td>
                                                    <td width="550" class="brdLeftBtm">
                                                        <table width="500" border="0" cellpadding="0" cellspacing="0"
                                                            class="size10">
                                                            <tr>
                                                                <td colspan="2">THIS IS TO CERTIFY THAT A MEDICAL AND PHYSICAL EXAMINATION IN ACCORDANCE WITH THE <br>
                                                                    STANDARD CLUB PART OF NORTHSTANDARD RECOMMENDED PROTOCOLS HAS BEEN  CARRIED OUT <br>
                                                                    <span class="fontBoldLrg"><u>{{$admission->patient->lastname}}, {{$admission->patient->firstname}} {{$admission->patient->middlename}}</u></span><br>
                                                                    <span style="margin-left:20px">NAME OF
                                                                        SEAFARER</span><br>
                                                                    <span class="fontMed"><span>RESULT:</span>  <span style="margin-left: 30px;">&nbsp;</span>
                                                                    <span  style="margin-left:50px">FIT FOR DUTY
                                                                        @if ($admission->exam_physical)
                                                                            @if($admission->exam_physical->duty == 'Fit')
                                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                            @else
                                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                            @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                        @endif
                                                                    </span>
                                                                    <span style="margin-left: 20px;">FIT BUT AT RISK
                                                                        @if ($admission->exam_physical)
                                                                            @if($admission->exam_physical->duty == 'Fit Restriction')
                                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                            @else
                                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                            @endif
                                                                        @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </span>
                                                                    <span
                                                                        style="margin-left: 20px;">UNFIT FOR DUTY
                                                                        @if ($admission->exam_physical)
                                                                        @if($admission->exam_physical->duty == 'Unfit')
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
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
                                                                <td valign="bottom" class="">
                                                                    @if($admission->exam_physical && $admission->agency_id != 19)
                                                                        <img src="{{$admission->exam_physical->first_tech->signature}}" width="80" />
                                                                    @endif<br>
                                                                    @if($admission->agency_id == 19)
                                                                        <img src="{{$admission->exam_physical->first_tech->signature}}" width="80" />
                                                                    @endif
                                                                    @if($admission->exam_physical)
                                                                    <span style="font-size: 10px;">{{$admission->exam_physical->first_tech->firstname}} {{$admission->exam_physical->first_tech->middlename[0]}}. {{$admission->exam_physical->first_tech->lastname}}</span>
                                                                    @endif <br>
                                                                    NAME AND SIGNATURE OF EXAMINING/AUTHORIZED PHYSICIAN
                                                                    <br>
                                                                    DATE OF EXAMINATION:
                                                                         {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}<br><br>
                                                                    APPROVED BY:<br><br><br><br>
                                                                    TERESITA F. GONZALES, MD<br>
                                                                    MEDICAL DIRECTOR
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="150" align="center" class="brdRight">&nbsp;</td>
                                                    <td valign="top" class="brdLeft">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td valign="top">NAME OF CLINIC: MERITA DIAGNOSTIC CLINIC INC.<br>
                                                                    ADDRESS: 5th & 6th Flr Jettac Bldg., 920 Quirino
                                                                    Ave. Cor. San Antonio St. Malate Manila <br>
                                                                    <br>
                                                                    PHYSICIAN’S CERTIFYING AUTHORITY: PROFESSIONAL
                                                                    REGULATION COMMISSION <br>
                                                                    PHYSICIAN’S LICENSE NUMBER: 055997
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <table width="735" border="0" cellpadding="2" cellspacing="0" class="brdMLC">
                                    <tr>
                                        <td colspan="7">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" id="brdNone">
                                                <tr>
                                                    <td colspan="4">I HAVE READ AND UNDERSTOOD AND WAS INFORMED OF THE
                                                        CONTENTS OF THE CERTIFICATE AND OF THE RIGHT TO A REVIEW IN
                                                        ACCORDANCE WITH PARAGRAPH 6 OF SECTION A-1/9 OF THE STCW CODE.
                                                    </td>
                                                </tr>
                                                <style>
                                                #divImage {
                                                    width: 100%;
                                                    height: 35px;
                                                    position: relative;
                                                    margin-bottom: 10px;
                                                }

                                                #divImage img {
                                                    position: absolute;
                                                    width: auto;
                                                    height: 40px;
                                                    top: 1%;
                                                    left: 35%;
                                                }
                                                </style>
                                                <tr>
                                                    <td width="27%">&nbsp;</td>
                                                    <td width="48%" align="center">
                                                        <div id="divImage">
                                                            @if($admission->agency_id != 19)
                                                                @if($admission->patient->patient_signature)
                                                                    <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" class="signature-taken" />
                                                                @elseif ($admission->patient->signature)
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
                                                    <td width="19%" style="border-bottom:solid 1px black">
                                                        {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->peme_date), "d F Y") : null}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">(THIS SIGNATURE SHOULD BE AFFIXED IN THE PRESENCE OF
                                                        THE EXAMINING PHYSICIAN)</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" cellpadding="2" cellspacing="0" class="brdMLC"
                                    style="margin-top:1px">
                                    <tr>
                                        <td colspan="6" style="font-size:12px"> <b>DATE OF ISSUANCE: </b>{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->peme_date), "d F Y") : null}}</td>
                                        <td width="51%" style="font-size:12px"> <b>DATE OF EXPIRATION: </b>
                                            {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="top"> <span class="lblForm" style="font-size:8px">FORM NO.41 / REV. 01/ 15-06-2022</span> </td>
            </tr>
        </table>
    </center>
</body>

</html>
