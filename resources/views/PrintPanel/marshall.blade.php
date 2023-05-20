<html>

<head>
    <title>MARSHALL</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: constantia;
        font-size: 10px;
    }

    .fontBoldLrg {
        font: bold 15px constantia;
    }

    .fontMed {
        font: bold 13px constantia;
    }

    div,
    ul li {
        font-size: 11px;
        font-weight: 400;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="0" cellpadding="0" class="brdAll">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="10" class="brdAll">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <span style="font-size: 20px; font-weight: 700;">MEDICAL EXAMINATION
                                            REPORT/CERTIFICATE</span><br>
                                        <span style="font-size: 17px; font-weight: 700;">MARITIME ADMINISTRATOR</span>
                                        <br>
                                        <span style="font-size: 14px; font-weight: 700; color: red;">CONFIDENTIAL
                                            DOCUMENT</span> <br>
                                        <span style="font-size: 17px; font-weight: 700;">REPUBLIC OF THE MARSHALL
                                            ISLANDS</span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" class="brdTable" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="33%">
                                        Surname <br>
                                        <span class="fontBoldLrg" style="margin-left: 0.5rem;">{{$admission->patient->lastname}}</span>
                                    </td>
                                    <td width="43%">
                                        GIVEN NAME(S) <br>
                                        <span class="fontBoldLrg" style="margin-left: 0.5rem;">{{$admission->patient->firstname}}</span>
                                    </td>
                                    <td width="23%">
                                       MIDDLE NAME <br>
                                        <span class="fontBoldLrg" style="margin-left: 0.5rem;">{{$admission->patient->middlename}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="brdTable" cellspacing="0" cellpadding="2">
                            <tbody>
                                <tr>
                                    <td>DATE OF BIRTH <br>
                                        <div style="display: flex; align-items: center; justify-content: space-around;">
                                            <div>
                                                <span>{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "F")}}</span> <br> MONTH
                                            </div>
                                            <div>
                                                <span>{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d")}}</span> <br> DAY
                                            </div>
                                            <div>
                                                <span>{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "Y")}}</span> <br> YEAR
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        PLACE OF BIRTH <br>
                                        <div style="display: flex; align-items: center; justify-content: space-around;">
                                            <div>
                                                <span>{{$admission->patient->patientinfo->birthplace}}</span> <br> CITY
                                            </div>
                                            <div>
                                                <span>Phil's</span> <br> COUNTRY
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        SEX <br>
                                        <div style="display: flex; align-items: center; justify-content: space-around;">
                                            <div>
                                                <span>
                                                    @if($admission->patient->gender == "Male")
                                                        <img class="duty_as" src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                        <img class="duty_as" src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span> MALE
                                            </div>
                                            <div>
                                                <span>
                                                    @if($admission->patient->gender == "Female")
                                                        <img class="duty_as" src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                        <img class="duty_as" src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span> FEMALE
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EXAMINATION FOR DUTY AS: <br>
                                        <div style="display: flex; align-items: center; justify-content: space-around; width: 100%;">
                                            <div style="width: 50%;">
                                                <div
                                                    style="display: flex; align-items: flex-start; justify-content: space-around; width: 100%;">
                                                    <div style="width: 70%; text-align: flex-start">MASTER</div>
                                                    <div style="font-size: 15px; width: 30%;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10"></div>
                                                </div>
                                                <div
                                                    style="display: flex; align-items: flex-start; justify-content: space-around; width: 100%;">
                                                    <div style="width: 70%; text-align: flex-start;">DECK OFFICER</div>
                                                    <div style="font-size: 15px; width: 30%;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10"></div>
                                                </div>
                                                <div style="display: flex; align-items: flex-start; justify-content: space-around;">
                                                    <div style="width: 70%; text-align: flex-start;">ENGINEERING</div>
                                                    <div style="font-size: 15px; width: 30%;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10"></div>
                                                </div>
                                            </div>
                                            <div style="width: 50%;">
                                                <div style="display: flex; align-items: flex-start; justify-content: space-around;">
                                                    <div style="width: 70%; text-align: flex-start;">ENGINE</div>
                                                    <div style="font-size: 15px; width: 30%;">
                                                         @if($admission->category ==  'ENGINE SERVICES')
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10"  class="checkbox">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div style="display: flex; align-items: flex-start; justify-content: space-around;">
                                                    <div style="width: 70%; text-align: flex-start;">RATING</div>
                                                    <div style="font-size: 15px; width: 30%;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10"></div>
                                                </div>
                                                <div style="display: flex; align-items: flex-start; justify-content: space-around;">
                                                    <div style="width: 70%; text-align: flex-start;">RADIO OFFICER</div>
                                                    <div style="font-size: 15px; width: 30%;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                                width="10"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2" valign="top">
                                        MAILING ADDRESS OF APPLICANT: <br> <span style="font-size: 13px;">{{$admission->patient->patientinfo->address}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">MEDICAL EXAMINATION (SEE REVERSE SIDE FOR MEDICAL REQUIREMENTS)
                                        STATE DETAILS ON REVERSE SIDE</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="brdTable" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td>
                                        HEIGHT <br> <span class="fontMed">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->height}} (cm)
                                        @endif
                                        </span>
                                    </td>
                                    <td>
                                        WEIGHT <br> <span class="fontMed">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->weight}} (kg)
                                        @endif
                                        </span>
                                    </td>
                                    <td>
                                        BLOOD PRESSURE <br> <span class="fontMed">{{$admission->exam_physical ? $admission->exam_physical->systollic : null}}/{{$admission->exam_physical ? $admission->exam_physical->diastollic : null}}</span>
                                    </td>
                                    <td>
                                        PULSE <br> <span class="fontMed">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->pulse}} (/minute)
                                        @endif
                                        </span>
                                    </td>
                                    <td>
                                        RESPIRATION <br> <span class="fontMed">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->respiration}}
                                        @endif
                                        </span>
                                    </td>
                                    <td>
                                        GENERAL APPEARANCE <br> <span class="fontMed">NORMAL</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div style="display: flex; align-items: center; justify-content: space-around;">
                                            <div style="width: 40%;">VISION:</div>
                                            <div style="width: 25%; text-align: center;">RIGHT EYE</div>
                                            <div style="width: 10%;"> </div>
                                            <div style="width: 25%; text-align: center;">LEFT EYE</div>
                                        </div>
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: space-around; margin: 1rem 0;">
                                            <div style="width: 40%;">WITHOUT GLASSES</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px; text-align: center;">{{$admission->exam_visacuity ? $admission->exam_visacuity->ufvos : null}}</div>
                                            <div style="width: 10%; text-align: center;">/</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px; text-align: center;">{{$admission->exam_visacuity ? $admission->exam_visacuity->ufvod : null}}</div>
                                        </div>
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: space-around;">
                                            <div style="width: 40%;">WITH GLASSES</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px; text-align: center;">{{$admission->exam_visacuity ? $admission->exam_visacuity->cfvos : '&nbsp;'}}
                                                </div>
                                            <div style="width: 10%; text-align: center;">/</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px; text-align: center;">{{$admission->exam_visacuity ? $admission->exam_visacuity->cfvod : '&nbsp;'}}</div>
                                        </div>
                                    </td>
                                    <td colspan="2" valign="top">
                                        HEARING: <br> <br>
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: space-around; height: 50px">
                                            <div>RT. EAR</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px; padding: 0 1.5rem;">
                                                @if($admission->exam_audio)
                                                    {{$admission->exam_audio->remarks_status == "normal" ? 'NORMAL' : ''}}
                                                @endif
                                            </div>
                                            <div>LEFT EAR</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px;">
                                                @if($admission->exam_audio)
                                                    {{$admission->exam_audio->remarks_status == "normal" ? 'NORMAL' : ''}}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div
                                            style="display: flex; align-items: center; justify-content: space-between; width: 100%">
                                            <div>COLOR TEST TYPE:
                                                <span style="margin: 0 1rem;">BOOK
                                                    <span style="font-size: 15px;"><img src="../../../app-assets/images/icoCheck.gif"
                                                        width="10"></span>
                                                </span>
                                                <span style="margin: 0 1rem;">LANTERN
                                                    <span style="font-size: 15px;"><img src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span>
                                                </span>
                                            </div>
                                            <div>COLOR TEST TYPE:
                                                <span style="margin: 0 1rem;">YES
                                                    <span style="font-size: 15px;"><img src="../../../app-assets/images/icoCheck.gif"
                                                        width="10"></span>
                                                </span>
                                                <span style="margin: 0 1rem;">NO
                                                    <span style="font-size: 15px;"><img src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span>
                                                </span>
                                                <span> (If “No” explain on page 2)</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div>
                                            ARE GLASSES OR CONTACT LENSES NECESSARY TO MEET THE REQUIRED VISION
                                            STANDARD?
                                            <span style="margin: 0 1rem;">YES
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->remarks_status == 'normal')
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">NO
                                                <span style="font-size: 15px;">
                                                     @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->remarks_status == 'findings')
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        HEAD AND NECK <br>
                                        <span>
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->a2 == "Yes" ? 'NORMAL' : ''}}
                                            @endif
                                        </span>
                                    </td>
                                    <td colspan="2">
                                        HEART (CARDIOVASCULAR) <br> ECG:
                                        <span>
                                            @if($admission->exam_ecg)
                                                {{$admission->exam_ecg->remarks_status == "normal" ? 'NORMAL' : $admission->exam_ecg->remarks}}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        LUNGS <br>
                                        <span>
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->b3 == "Yes" ? 'NORMAL' : ''}}
                                            @endif
                                        </span>
                                    </td>
                                    <td colspan="2">
                                        SPEECH (DECK/NAVIGATIONAL OFFICER AND RADIO OFFICER) <br>
                                        <span style="font-size: 9px;">IS SPEECH UNIMPAIRED FOR NORMAL VOICE
                                            COMMUNICATION?</span>
                                        <span>
                                            @if($admission->exam_audio)
                                                {{$admission->exam_audio->remarks_status == "normal" ? 'NORMAL' : ''}}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        EXTREMITIES:: <br> <br>
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: space-around;">
                                            <div>UPPER</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px;">
                                                NORMAL</div>
                                            <div>LOWER</div>
                                            <div style="width: 25%; border-bottom: 1px solid black; font-size: 13px;">
                                                NORMAL</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div>
                                            IS APPLICANT VACCINATED IN ACCORDANCE WITH WHO RECOMMENDATIONS?
                                            <span style="margin: 0 1rem;">YES
                                                <span style="font-size: 15px;"><img src="../../../app-assets/images/icoCheck.gif"
                                                        width="10"></span>
                                            </span>
                                            <span style="margin: 0 1rem;">NO
                                                <span style="font-size: 15px;"><img src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">IS APPLICANT SUFFERING FROM ANY DISEASE LIKELY TO BE AGGRAVATED BY
                                        WORKING ABOARD A VESSEL, OR TO RENDER HIM/HER UNFIT FOR SERVICE <br>
                                        AT SEA OR LIKELY TO ENDANGER THE HEALTH OF OTHER PERSONS ON BOARD?
                                        <span style="margin: 0 1rem;">YES
                                            <span style="font-size: 15px;"><img src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span>
                                        </span>
                                        <span style="margin: 0 1rem;">NO
                                            <span style="font-size: 15px;"><img src="../../../app-assets/images/icoCheck.gif"
                                                        width="10"></span>
                                        </span> <br>
                                        IF YES, PLEASE ENTER EXPLANATION IN THE SECTION AT THE BOTTOM OF ON PAGE 2
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div>
                                            IS APPLICANT TAKING ANY NON-PRESCRIPTION OR PRESCRIPTION MEDICATIONS?
                                            <span style="margin: 0 1rem;">YES
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question8 == "1" || $admission->exam_physical->question8 == "Yes")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">NO
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question8 == "0" || $admission->exam_physical->question8 == "No")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="brdAll" cellspacing="0" cellpadding="3">
                            <tbody>
                                <tr>
                                    <td colspan="7">
                                        <table width="100%" cellspacing="0" cellpadding="3" style="margin-left: 1rem;">
                                            <tbody>
                                                <tr>
                                                    <td width="30%" align="center" valign="bottom" style="border-bottom: 1px solid black; position: relative;">
                                                        @if($admission->agency_id != 19)
                                                            @if($admission->patient->patient_signature)
                                                                <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="150" height="60" class="signature-taken" />
                                                            @elseif ($admission->signature)
                                                                <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="150" class="signature-taken"/>
                                                            @else
                                                                <div style="width: 150px;height: 40px;"></div>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td width="3%"></td>
                                                    <td width="30%" align="center" valign="bottom" style="border-bottom: 1px solid black;">{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}</td>
                                                    <td width="3%"></td>
                                                    <td width="30%" align="center" valign="bottom" style="border-bottom: 1px solid black;">{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}</td>
                                                    <td width="3%"></td>
                                                </tr>
                                                 <tr>
                                                    <td align="center">SIGNATURE OF APPLICANT</td>
                                                    <td></td>
                                                    <td align="center">DATE OF EXAMINATION</td>
                                                    <td></td>
                                                    <td align="center">EXPIRY DATE</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="5">THIS SIGNATURE SHOULD BE AFFIXED IN THE PRESENCE OF THE EXAMINING
                                        PHYSICIAN.</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <table width="760" cellpadding="5" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td width="50%">THIS IS TO CERTIFY THAT A PHYSICAL EXAMINATION WAS GIVEN TO:</td>
                                                    <td  width="35%" align="center" valign="bottom"  style='border-bottom: 1px solid; font-size: 13px;'>{{$admission->patient->lastname}}, {{$admission->patient->firstname}} {{$admission->patient->middlename}}</td>
                                                    <td  width="15%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td align="center">NAME OF APPLICANT</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        THIS APPLICANT IS CERTIFIED FREE OF COMMUNICABLE DISEASE (OR VIRUSES FOR COOKS):
                                        <span style="margin: 0 0.3rem;">YES
                                            <span style="font-size: 15px;">
                                                <img class="checkbox" src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            </span>
                                        </span>
                                        <span style="margin: 0 0.3rem;">NO
                                            <span style="font-size: 15px;">
                                                <img class="checkbox" src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="5">
                                        <div>
                                            SEAFARER IS FOUND TO BE
                                            <span style="font-size: 15px; margin: 0 0.5rem;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->duty == "Fit")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                                </span>
                                            </span>
                                            <span>FIT </span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->duty == "Unfit")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                            </span>
                                            <span>NOT FIT FOR DUTY AS A</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif" width="10"></span><span>MASTER
                                                /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span><span>DECK OFFICER
                                                /</span>
                                            <span style="font-size: 15px; margin: 0 1rem;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span><span>ENGINEERING
                                                OFFICER /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;"><br><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span><span>RADIO OFFICER
                                                /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;">
                                                @if($admission->category ==  'DECK SERVICES')
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10"  class="checkbox">
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox">
                                                @endif
                                            </span><span>RATING
                                                /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;">
                                                @if($admission->category ==  'ENGINE SERVICES')
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10"  class="checkbox">
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox">
                                                @endif
                                            </span><span>ENGINE
                                                /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span><span>CHIEF COOK
                                                /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;"><img class="duty_as" src="../../../app-assets/images/icoUncheck.gif"
                                                        width="10"></span><span>COOK /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->restriction == "without restriction")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                            </span><span>WITHOUT ANY
                                                RESTRICTIONS /</span>
                                            <span style="font-size: 15px; margin: 0 0.5rem;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->restriction == "with restriction")
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                            </span><span>WITH THE
                                                FOLLOWING /</span> <br>
                                            <span style="font-size: 11px; margin: 0 0.5rem;">RESTRICTIONS: <span>
                                                </span>
                                                     @if($admission->exam_physical)
                                                        {{$admission->exam_physical->describe_restriction}}
                                                     @endif
                                                </span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="brdAll" cellspacing="0" cellpadding="3">
                            <tbody>
                                <tr>
                                    <td>NAME AND DEGREE OF PHYSICIAN</td>
                                    <td style="border-bottom: 1px solid black;">
                                        @if($medical_director)
                                            <span style="font-size: 10px;">{{$medical_director->firstname}} {{$medical_director->middlename[0]}}. {{$medical_director->lastname}} {{$medical_director->title}}</span>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>ADDRESS</td>
                                    <td style="border-bottom: 1px solid black;">5th Floor JETTAC Bldg. 920 Pres. Quirino Ave. Cor. San Antonio St. Malate,
                                        Manila</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>NAME OF PHYSICIAN&#39;S CERTIFICATING</td>
                                    <td style="border-bottom: 1px solid black;">Professional Regulation Commission</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>AUTHORITY <br> DATE OF ISSUE OF PHYSICIAN&#39;S CERTIFICATE</td>
                                    <td style="border-bottom: 1px solid black;">14 June 1984</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="brdAll" cellspacing="0" cellpadding="3">
                            <tbody>
                                <tr>
                                    <td width="20%" valign="bottom">SIGNATURE OF PHYSICIAN</td>
                                    <td width="20%" height="40" style="border-bottom: 1px solid black;"></td>
                                    <td width="20%"></td>
                                    <td width="20%" valign="bottom" style="border-bottom: 1px solid black;" align="center">{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}</td>
                                    <td width="10%"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td></td>
                                    <td align="center">DATE</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="760" height="60" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="3" align="center">
                        This certificate is issued by authority of the Maritime Administrator and in compliance with the requirements of the International Convention on Standards of Trainings, <br>
                        Certification and Watchkeeping for Seafarers 1978, as amended, and the Maritime Labour Convention, 2006, as amended.
                    </td>
                </tr>
                <tr>
                    <td>Rev Mar/2022</td>
                    <td align="center"></td>
                    <td align="right">MI-105M</td>
                </tr>
            </tbody>
        </table>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div style="width: 760px; border: 1px solid black; padding: 10px;">
            <h2 style="text-align: center;">MEDICAL REQUIREMENTS</h2>
            <p style="text-align: left; font-size: 11px; line-height: 15px;">All applicants for an officer certificate,
                Seafarer's Identification and Record Book or certification of special qualifications shall be required
                to have a medical examination reported on this Medical Form completed by a certificated physician. The
                completed medical form must accompany the application for officer’s certificate, application for
                Seafarer's Identification and Record Book, or application for certification of special qualifications.
                This medical examination must be carried out within the 24 months immediately preceding application for
                an officer certificate, certification of special qualifications or a Seafarer’s Identification and
                Record Book. The examination shall be conducted in accordance with RMI MG-7-47-1. Such proof of
                examination must establish that the applicant is in satisfactory physical and mental condition for the
                specific duty assignment undertaken and is generally in possession of all body faculties necessary in
                fulfilling the requirements of the seafaring profession.
                In conducting the examination, the certified physician should, where appropriate, examine the seafarer’s
                previous medical records (including vaccinations) and information on occupational history, noting any
                diseases, including alcohol or drug-related problems and/or injuries. In addition, the following minimum
                requirements shall apply:
            </p>
            <div style="text-align: left;">
                <div>(a) Hearing</div>
                <ul>
                    <li>All applicants must have hearing unimpaired for normal sounds and be
                        capable of hearing a whispered voice in better ear at 15 feet (4.57 m)
                        and in poorer ear at 5 feet (1.52 m).
                    </li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(b) Eyesight</div>
                <ul>
                    <li>Deck officer applicants must have (either with or without glasses) at least 20/20(1.00)
                        vision in one eye and at least 20/40 (0.50) in the other. Applicants for deck officer and deck
                        ratings who will serve on vessels of 500 gross tons or more must have normal color perception
                        that complies with C.I.E. Standard 1;
                        those serving on vessels less than 500 gross tons must comply with C.I.E. Standards 1 or 2.
                    </li>
                    <li>
                        Engineer and radio officer applicants must have (either with or without glasses) at least 20/30
                        (0.63) vision in one eye and at least 20/50 (0.40) in the other.
                        Applicants for engineering officer or rating and for radio operator must comply with C.I.E.
                        Standards 1, 2, or 3.
                        Engineer and radio officer applicants must also be able to perceive the colors red, yellow and
                        green.
                    </li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(c) Dental</div>
                <ul>
                    <li>Seafarers must be free from infections of the mouth cavity or gums.
                    </li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(d) Blood Pressure</div>
                <ul>
                    <li>An applicant&#39;s blood pressure must fall within an average range, taking age into
                        consideration.</li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(e) Voice</div>
                <ul>
                    <li>Deck/Navigational officer applicants and Radio officer applicants must have speech which is
                        unimpaired for normal voicecommunication.</li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(f) Vaccinations</div>
                <ul>
                    <li>All applicants should be vaccinated according to the recommendations provided in the WHO
                        publication, International
                        Travel and Health, Vaccination Requirements and Health Advice, and should be given advice by the
                        certified physician on
                        immunizations. If new vaccinations are given, these should be recorded.</li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(g) Diseases or Conditions</div>
                <ul>
                    <li>Applicants afflicted with any of the following diseases or conditions shall be disqualified:
                        epilepsy, insanity, senility,
                        alcoholism, tuberculosis, acute venereal disease or neurosyphilis, AIDS, and/or the use of
                        narcotics.</li>
                </ul>
            </div>
            <div style="text-align: left;">
                <div>(h) Physical Requirements</div>
                <ul>
                    <li>Applicants for able seafarer, bosun, GP-1, ordinary seafarer and junior ordinary seafarer must
                        meet the physical
                        requirements for a deck/navigational officer&#39;s certificate.
                    </li>
                    <li>
                        Applicants for fire/watertender, oiler/motor, pump technician, electrician, wiper, tanker rating
                        and survival craft/rescue
                        boat crewmember must meet the physical requirements for an engineer officer&#39;s certificate.
                    </li>
                </ul>
            </div>
        </div>
        <div style="width: 760px; border: 1px solid black; margin-top: 10px; padding: 10px;">
            <h2 style="text-align: center; ">IMPORTANT NOTE:</h2>
            <p style="text-align: left; ">A copy of the MI-105M must accompany the application. The applicant must
                retain the original of the MI-105M as evidence of physical qualification while serving on board a
                vessel.
                An applicant who has been refused a medical certificate or has had a limitation imposed on his/her
                ability to work, shall be given the opportunity to have an additional examination by another medical
                practitioner or medical referee who is independent of the shipowner or
                of any organization of shipowners or seafarers.
                Medical examination reports shall be marked as and remain confidential with the applicant having the
                right of a copy to his/her report. The medical examination report shall be used only for determining the
                fitness of the seafarer for work and enhancing health care.
            </p>
        </div>
        <div style="width: 740px; border: 1px solid black; margin-top: 10px; padding: 10px 20px;">
            <h2 style="text-align: center; ">DETAILS OF MEDICAL EXAMINATION</h2>
            <p style="text-align: left; ">(To be completed by examining physician; alternatively, the examining physician may attach an equivalent form. <br>
                See RMI <u>MG 7-47-1</u>, &#167; 3.3
            </p>
        </div>

        <table width="760" height="60" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>Rev Mar/2022</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">MI-105M</td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

<script>
    let duty_as = document.querySelectorAll('.duty_as');
    let checkbox = document.querySelectorAll('.checkbox');

        for(let i = 0; i < duty_as.length; i++) {
            duty_as[i].addEventListener('click', (e) => {
                if(e.target.classList.contains('check')) {
                    e.target.src = '../../../app-assets/images/icoUncheck.gif';
                    e.target.classList.toggle('check');
                } else {
                    e.target.src = '../../../app-assets/images/icoCheck.gif';
                    e.target.classList.toggle('check');
                }
            })
        }

        for(let i = 0; i < checkbox.length; i++) {
            checkbox[i].addEventListener('click', (e) => {
                if(e.target.classList.contains('check')) {
                    e.target.src = '../../../app-assets/images/icoUncheck.gif';
                    e.target.classList.toggle('check');
                } else {
                    e.target.src = '../../../app-assets/images/icoCheck.gif';
                    e.target.classList.toggle('check');
                }
            })
        }
</script>
</html>
