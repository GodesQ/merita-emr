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
    </style>
</head>

<body>
    <center>
        <table width="680" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td height="100" colspan="3" align="center" valign="bottom" class="lblReport">
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
                    <table width="680" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <td align="center">
                                <table width="680" border="0" cellpadding="3" cellspacing="0" class="brdMLC">
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
                                                    <td width="87%" valign="middle">NO LIMITATIONS OR RESTRICTIONS ON
                                                        FITNESS? <br>
                                                        If “NO” specify limitations or restrictions: <br>
                                                        <textarea name="co" type="text" id="co" value="" class="brdNone" style="width:400px;height: 30px;font-size: 10px;text-align:left;border: none;">{{$admission->exam_physical ? $admission->exam_physical->describe_restriction : null}}</textarea>
                                                    </td>
                                                    <td width="4%" valign="middle">YES</td>
                                                    <td width="3%" valign="middle">
                                                        @if ($admission->exam_physical)
                                                        @if (preg_match('/Without Restriction/i',
                                                        $admission->exam_physical->restriction))
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
                                                        @if (!preg_match('/Without Restriction/i',
                                                        $admission->exam_physical->restriction))
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
                                <table width="678" border="0" cellpadding="0" cellspacing="0" class="brdAll">
                                    <tr>
                                        <td>
                                            <table width="678" border="0" cellpadding="3" cellspacing="0">
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
                                                    <td width="500" class="brdLeftBtm">
                                                        <table width="500" border="0" cellpadding="0" cellspacing="0"
                                                            class="size10">
                                                            <tr>
                                                                <td colspan="2">THIS IS TO CERTIFY THAT A MEDICAL AND
                                                                    PHYSICAL EXAMINATION WAS GIVEN TO: <br>
                                                                    <span class="fontBoldLrg"><u>{{$admission->patient->lastname}},
                                                                            {{$admission->patient->firstname}}
                                                                            {{$admission->patient->middlename}}</u></span><br>
                                                                    <span style="margin-left:20px">NAME OF
                                                                        SEAFARER</span><br>
                                                                    <span class="fontMed"><span style="margin-right: 150px;">RESULT:</span>
                                                                        FIT FOR SEA DUTY
                                                                        @if ($admission->exam_physical)
                                                                            @if (preg_match('/Fit/i',
                                                                                $admission->exam_physical->fit))
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
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UNFIT
                                                                        FOR SEA DUTY
                                                                        @if ($admission->exam_physical)
                                                                        @if (!preg_match('/Fit/i', $admission->exam_physical->fit))
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
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="bottom" class="">
                                                                    @if($admission->exam_physical && $admission->agency_id != 19)
                                                                        <img src="{{$admission->exam_physical->first_tech->signature}}" width="80" />
                                                                    @endif<br>
                                                                    @if($admission->agency_id == 19)
                                                                        <br>
                                                                    @endif
                                                                    @if($admission->exam_physical)
                                                                    <span style="font-size: 10px;">{{$admission->exam_physical->first_tech->firstname}} {{$admission->exam_physical->first_tech->middlename[0]}}. {{$admission->exam_physical->first_tech->lastname}}</span>
                                                                    @endif <br>
                                                                    NAME AND SIGNATURE OF EXAMINING/AUTHORIZED PHYSICIAN
                                                                    <br>
                                                                    DATE OF EXAMINATION:
                                                                         {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}<br><br>
                                                                    APPROVED BY:<br><br><br>
                                                                    TERESITA F. GONZALES, MD<br>
                                                                    MEDICAL DIRECTOR
                                                                </td>
                                                                <td><img width="130" src="../../../app-assets/images/logo/logoNOE.png"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="120" align="center" class="brdRight">&nbsp;</td>
                                                    <td valign="top" class="brdLeft">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td valign="top">NAME OF ISSUING AUTHORITY: TERESITA F.
                                                                    GONZALES, MD <br>
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
                                <table width="680" border="0" cellpadding="2" cellspacing="0" class="brdMLC">
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
                                                    margin-bottom: 18px;
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
