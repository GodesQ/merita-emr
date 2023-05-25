<html>

<head>
    <title>Medical Examination Report for Seafarers</title>
    <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
    <link href="dist/css/eureka-print.css?v=1650448751" rel="stylesheet" type="text/css">
    <style>
        body,
        table,
        tr,
        td {
            font-family: arial;
            font-size: 15.5px;
        }

        .aa {
            font-size: 10px;
        }

        @page {
            size: ledger;
            margin-top: 0.7rem;
            margin-left: 0.2rem;
            margin-right: 0.2rem;
            margin-bottom: 0.2rem;
        }
    </style>
</head>

<body>
    <table width="850" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <table width="100%" cellpadding="2" cellspacing="0">
                    <tbody>
                        <tr>
                            <td width="20" rowspan="3" align="center">
                                <img src="../../../app-assets/images/logo/logo.jpg" width="130" height="130"
                                    alt="">
                            </td>
                            <td width="396" rowspan="3" align="center" valign="center">
                                <span
                                    style="font-size: 40px; font-weight: 800;font-family: serif; color: 'lightgreen;'">MERITA
                                    DIAGNOSTIC CLINIC INC.</span><br style="margin-bottom: 20px">
                                <div>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                    Cor. San Antonio St. Malate, Manila<br>
                                    Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
                                    Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                    Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld
                                    P&amp;I * West of England P&amp;I</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="1" cellpadding="5" cellspacing="0">
                        <tbody>
                            <tr>
                                <td align="center" valign="top"><span style="font-size:18px;font-weight:bold">MEDICAL
                                        EXAMINATION REPORT FOR
                                        SEAFARERS</span><br>
                                    <span style="font-size: 15px;">
                                        Approved and authorized by the Department of Health(DOH) and the Maritime
                                        Industry Authority (MARINA) of the Republic of the Philippines <br>
                                        Issued in compliance with STCW Convention, 1978, as amended Section A-1/9
                                        Paragraph 7 and the Maritime Labour Convetion, 2008.
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="1" cellpadding="5"
                                        style="border-top : none;border-left : none;border-right : none;"
                                        cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    SURNAME/LASTNAME<br>
                                                    <span class="lblName"
                                                        style='font-weight: 700;'>{{ $admission->patient->lastname }}</span>
                                                </td>
                                                <td>
                                                    GIVEN NAME<br>
                                                    <span class="lblName"
                                                        style='font-weight: 700;'>{{ $admission->patient->firstname }}</span>
                                                </td>
                                                <td>
                                                    MIDDLE NAME<br>
                                                    <span class="lblName"
                                                        style='font-weight: 700;'>{{ $admission->patient->middlename }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%">
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>AGE</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ $admission->patient->age }}</b>&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="28%">
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>DATE OF BIRTH: (DAY/MONTH/YEAR)</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ date_format(new DateTime($admission->patient->patientinfo->birthdate), 'd F Y') }}</b>&nbsp;
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="37%">
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">PLACE OF BIRTH :(City/Country) Phils
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ $admission->patient->patientinfo->birthplace }}</b>&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="25%">
                                                    <table width="100%" border="0" cellpadding="0"
                                                        cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>NATIONALITY :</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ $admission->patient->patientinfo->nationality }}</b>&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">GENDER:&nbsp;&nbsp;
                                                    MALE
                                                    @if ($admission->patient->gender == 'Male')
                                                        <span style="font-size: 20px;">☑</span>
                                                    @else
                                                        <span style="font-size: 20px;">☐</span>
                                                    @endif
                                                    FEMALE
                                                    @if ($admission->patient->gender == 'Female')
                                                        <span style="font-size: 20px;">☑</span>
                                                    @else
                                                        <span style="font-size: 20px;">☐</span>
                                                    @endif

                                                </td>
                                                <td>CIVIL STATUS: <br>
                                                    Single
                                                    @if ($admission->patient->patientinfo->maritalstatus == 'Single' || $admission->patient->patientinfo->maritalstatus == 'SINGLE')
                                                        <span style="font-size: 20px;">☑</span>
                                                    @else
                                                        <span style="font-size: 20px;">☐</span>
                                                    @endif
                                                    Married
                                                    @if ($admission->patient->patientinfo->maritalstatus == 'Married' || $admission->patient->patientinfo->maritalstatus == 'MARRIED')
                                                        <span style="font-size: 20px;">☑</span>
                                                    @else
                                                        <span style="font-size: 20px;">☐</span>
                                                    @endif
                                                    Separated
                                                    @if ($admission->patient->patientinfo->maritalstatus == 'Separated' || $admission->patient->patientinfo->maritalstatus == 'SEPARATED')
                                                        <span style="font-size: 20px;">☑</span>
                                                    @else
                                                        <span style="font-size: 20px;">☐</span>
                                                    @endif
                                                    Widowed
                                                    @if ($admission->patient->patientinfo->maritalstatus == 'Widowed' || $admission->patient->patientinfo->maritalstatus == 'WIDOWED')
                                                        <span style="font-size: 20px;">☑</span>
                                                    @else
                                                        <span style="font-size: 20px;">☐</span>
                                                    @endif
                                                </td>
                                                <td> RELIGION:
                                                    <b>{{ $admission->patient->patientinfo->religion == 'OTHERS' ? $admission->patient->patientinfo->religion_other : $admission->patient->patientinfo->religion }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">ADDRESS : <b>{{ $admission->patient->patientinfo->address }}</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">PASSPORT NUMBER : <b>
                                                        {{ $admission->patient->patientinfo->passportno }}</b></td>
                                                <td colspan="2">SEAMAN'S BOOK(SIRB) NUMBER : <b>
                                                        {{ $admission->patient->patientinfo->srbno }} </b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>POSITION APPLIED FOR:<br>
                                                                    <b>DECK</b>&nbsp;&nbsp;&nbsp;
                                                                    @if ($admission->category == 'DECK SERVICES')
                                                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <b>ENGINE</b>&nbsp;&nbsp;&nbsp;
                                                                    @if ($admission->category == 'ENGINE SERVICES')
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                    @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                    @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <b>CATERING&nbsp;&nbsp;&nbsp;</b>
                                                                    @if ($admission->category == 'CATERING SERVICES')
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                    @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                    @endif&nbsp;&nbsp;&nbsp;
                                                                    <b>OTHER</b>
                                                                    @if ($admission->category == 'OTHER SERVICES')
                                                                        <img src="../../../app-assets/images/icoCheck.gif"
                                                                            width="10">
                                                                    @else
                                                                        <img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10">
                                                                    @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    SPECIFY: <span
                                                                        style="font-weight: 600;">{{ $admission->position }}</span>
                                                                    <input name="co" type="text"
                                                                        id="co" value="" class="brdNone"
                                                                        style="width:330px;text-align:left;border: none;">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">NAME OF COMPANY : <b>
                                                        @if (preg_match('/Bahia/i', $admission->agency->agencyname))
                                                            {{ 'Bahia Shipping Services, Inc.' }}
                                                        @else
                                                            {{ $admission->agency->agencyname }}
                                                        @endif
                                                    </b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="1" cellpadding="0"
                                                        cellspacing="0"
                                                        style="border-top : none;border-left : none;border-right : none;border-bottom : none;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="6" align="left"> I.MEDICAL HISTORY -
                                                                    Has applicant suffered from, been diagnosed,
                                                                    sought advice or treatment from medical doctor
                                                                    on the following conditions: <br>
                                                                    Place a check mark (✔) in the appropriate box<b>
                                                                        <span style="font-size: 20px;">☐</span> </b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="155">&nbsp;</td>
                                                                <td width="62" align="center">YES NO</td>
                                                                <td width="184">&nbsp;</td>
                                                                <td width="62" align="center">YES NO</td>
                                                                <td width="220">&nbsp;</td>
                                                                <td width="67" align="center">YES NO</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Head or Neck Injury
                                                                        :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick1 == 'Yes' || $admission->exam_physical->sick1 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick1 == 'No' || $admission->exam_physical->sick1 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Other Lung Disorders
                                                                        :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick11 == 'Yes' || $admission->exam_physical->sick11 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick11 == 'No' || $admission->exam_physical->sick11 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Gynecological
                                                                        Disorder :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        ☐
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        ☑
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Frequent Headaches
                                                                        :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick2 == 'Yes' || $admission->exam_physical->sick2 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick2 == 'No' || $admission->exam_physical->sick2 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>High Blood Pressure
                                                                        :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick12 == 'Yes' || $admission->exam_physical->sick12 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick12 == 'No' || $admission->exam_physical->sick12 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Last Menstrual Period
                                                                        :</b><br>{{ $admission->exam_physical ? $admission->exam_physical->last_menstrual : null }}
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick29 == 'Yes' || $admission->exam_physical->sick29 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick29 == 'No' || $admission->exam_physical->sick29 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Frequent Dizziness
                                                                        :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick3 == 'Yes' || $admission->exam_physical->sick3 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick3 == 'No' || $admission->exam_physical->sick3 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Heart Disease/Chest
                                                                        Pain :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick13 == 'Yes' || $admission->exam_physical->sick13 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick13 == 'No' || $admission->exam_physical->sick13 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Kidney or Bladder
                                                                        Disorder :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick22 == 'Yes' || $admission->exam_physical->sick22 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick22 == 'No' || $admission->exam_physical->sick22 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p><b>Fainting Spells, Fits,Seizures or Other
                                                                            Neurological Disorders :</b></p>
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick4 == 'Yes' || $admission->exam_physical->sick4 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick4 == 'No' || $admission->exam_physical->sick4 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Rheumatic Fever :</b>
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick14 == 'Yes' || $admission->exam_physical->sick14 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick14 == 'No' || $admission->exam_physical->sick14 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Back Injury: Joint
                                                                        Pain/Arthritis/Rheumatic :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick23 == 'Yes' || $admission->exam_physical->sick23 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick23 == 'No' || $admission->exam_physical->sick23 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20"><b>Insomnia
                                                                        or Sleep Disorders :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick5 == 'Yes' || $admission->exam_physical->sick5 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick5 == 'No' || $admission->exam_physical->sick5 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Diabetes Mellitus
                                                                        :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick15 == 'Yes' || $admission->exam_physical->sick15 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick15 == 'No' || $admission->exam_physical->sick15 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Genetic,Hereditary or
                                                                        Familial Disorders:</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick24 == 'Yes' || $admission->exam_physical->sick24 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick24 == 'No' || $admission->exam_physical->sick24 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Depression, Other
                                                                        Mental Disorders :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick6 == 'Yes' || $admission->exam_physical->sick6 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick6 == 'No' || $admission->exam_physical->sick6 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Other Endocrine
                                                                        Disorder (e.g Goiter) :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick16 == 'Yes' || $admission->exam_physical->sick16 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick16 == 'No' || $admission->exam_physical->sick16 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Sexually Transmitted
                                                                        Diseases :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick25 == 'Yes' || $admission->exam_physical->sick25 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick25 == 'No' || $admission->exam_physical->sick25 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Trachoma,Other Eye
                                                                        Disorders :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick7 == 'Yes' || $admission->exam_physical->sick7 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick7 == 'No' || $admission->exam_physical->sick7 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Cancer or Tumor :</b>
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick17 == 'Yes' || $admission->exam_physical->sick17 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick17 == 'No' || $admission->exam_physical->sick17 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b> Tropical
                                                                        Diseases(e.g Malaria,Filariasis<br>

                                                                        Typoid Fever Date:<br>
                                                                    </b>
                                                                    {{ $admission->exam_physical ? $admission->exam_physical->tropical_disease : null }}
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick26 == 'Yes' || $admission->exam_physical->sick26 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick26 == 'No' || $admission->exam_physical->sick26 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Deafness, Other Ear
                                                                        Disorders :</b></td>
                                                                <td align="center"><span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick8 == 'Yes' || $admission->exam_physical->sick8 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick8 == 'No' || $admission->exam_physical->sick8 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Blood Disorders :</b>
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick18 == 'Yes' || $admission->exam_physical->sick18 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick18 == 'No' || $admission->exam_physical->sick18 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Schitomasis :</b>
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        ☐
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        ☑
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Nose or Throat
                                                                        Disorders :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick9 == 'Yes' || $admission->exam_physical->sick9 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick9 == 'No' || $admission->exam_physical->sick9 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Stomach
                                                                        Pain,Gastritis or Ulcer :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick19 == 'Yes' || $admission->exam_physical->sick19 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick19 == 'No' || $admission->exam_physical->sick19 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Asthma (Specify) :</b>
                                                                    {{ optional($admission->exam_physical)->asthma }}</td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick27 == 'Yes' || $admission->exam_physical->sick27 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick27 == 'No' || $admission->exam_physical->sick27 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tuberculosis :</b>
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick10 == 'Yes' || $admission->exam_physical->sick10 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick10 == 'No' || $admission->exam_physical->sick10 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Other Abdominal Disorders :</b></td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick20 == 'Yes' || $admission->exam_physical->sick20 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick20 == 'No' || $admission->exam_physical->sick20 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Allergies (Specify)
                                                                        :</b>{{ $admission->exam_physical ? $admission->exam_physical->allergies : null }}
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick30 == 'Yes' || $admission->exam_physical->sick30 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick30 == 'No' || $admission->exam_physical->sick30 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Previous Hospitalization :</b>
                                                                    <br>&nbsp;
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        ☐
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        ☑
                                                                    </span>
                                                                </td>
                                                                <td><b>Operations (Specify)
                                                                        :</b>{{ $admission->exam_physical ? $admission->exam_physical->operations : null }}
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick31 == 'Yes' || $admission->exam_physical->sick31 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick31 == 'No' || $admission->exam_physical->sick31 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td><b>Immunization (Specify) :</b>
                                                                    <br>{{ $admission->exam_physical ? $admission->exam_physical->vaccination : null }}
                                                                </td>
                                                                <td align="center">
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick32 == 'Yes' || $admission->exam_physical->sick32 == '1')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                    <span style="font-size: 20px;">
                                                                        @if ($admission->exam_physical)
                                                                            @if ($admission->exam_physical->sick32 == 'No' || $admission->exam_physical->sick32 == '0')
                                                                                ☑
                                                                            @else
                                                                                ☐
                                                                            @endif
                                                                        @else
                                                                            ☐
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="1"
                                                        style="border-top : none;border-left : none;border-right : none;border-bottom : none;"
                                                        cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0"
                                                                        style="font-size: 11px;" cellpadding="0"
                                                                        cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="480" valign="top">
                                                                                    <b>&nbsp;&nbsp;Place a check
                                                                                        mark (✔) in the appropriate
                                                                                        box
                                                                                        <span
                                                                                            style="font-size: 20px;">☐</span></b>
                                                                                </td>
                                                                                <td colspan="2" align="center"
                                                                                    valign="top"><b>YES
                                                                                    </b><b>NO</b></td>
                                                                                <td width="184" rowspan="10"
                                                                                    align="center" valign="top">
                                                                                    <p><b><br>
                                                                                            <div
                                                                                                style="width: 130px; height: 130px;padding: 0.2rem; border: 1px solid black;">
                                                                                                @if ($admission->patient->patient_image)
                                                                                                    <img src="../../../app-assets/images/profiles/{{ $admission->patient->patient_image }}"
                                                                                                        alt="Patient Picture"
                                                                                                        width="100%"
                                                                                                        height="100%"
                                                                                                        class="brdAll">
                                                                                                @else
                                                                                                    <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                                                                        alt="Patient Picture"
                                                                                                        width="100%"
                                                                                                        height="100%"
                                                                                                        class="brdAll">
                                                                                                @endif
                                                                                            </div>
                                                                                        </b>
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1. Have you ever been signed off
                                                                                    as sick or repatriated from a
                                                                                    ship?</td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question1 == 'Yes' || $admission->exam_physical->question1 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question1 == 'No' || $admission->exam_physical->question1 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2. Have you ever been
                                                                                    hospitalized?</td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question2 == 'Yes' || $admission->exam_physical->question2 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question2 == 'No' || $admission->exam_physical->question2 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3. Have you ever been declared
                                                                                    unfit for sea duty?</td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question3 == 'Yes' || $admission->exam_physical->question3 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question3 == 'No' || $admission->exam_physical->question3 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4. Has your medical certificate
                                                                                    ever been restricted or revoked?
                                                                                </td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question4 == 'Yes' || $admission->exam_physical->question4 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question4 == 'No' || $admission->exam_physical->question4 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>5. Are you aware that you have
                                                                                    any medical problem,disease or
                                                                                    illness?</td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question5 == 'Yes' || $admission->exam_physical->question5 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question5 == 'No' || $admission->exam_physical->question5 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6. Do you feel healthy and fit
                                                                                    to perform the duties of your
                                                                                    designated position/occupation?
                                                                                </td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question6 == 'Yes' || $admission->exam_physical->question6 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question6 == 'No' || $admission->exam_physical->question6 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>7. Are you allergic to any
                                                                                    medication?</td>
                                                                                <td colspan="2" align="center">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question7 == 'Yes' || $admission->exam_physical->question7 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question7 == 'No' || $admission->exam_physical->question7 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3" height="35"
                                                                                    valign="top">&nbsp;Comments:
                                                                                    <br>
                                                                                    @php echo nl2br(optional($admission->exam_physical)->comments) @endphp
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <p>8. Are you taking any
                                                                                        non-prescription or
                                                                                        prescription medication?<br>
                                                                                        if <b>YES</b>, please list
                                                                                        the medication(s)
                                                                                        taken/being taken, and the
                                                                                        purpose(s) and dosage(s):
                                                                                        <br>
                                                                                        <span
                                                                                            style="border-bottom : 1px solid"><b>
                                                                                            </b></span>
                                                                                    </p>
                                                                                </td>
                                                                                <td colspan="2" align="center"
                                                                                    valign="top">
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question8 == 'Yes' || $admission->exam_physical->question8 == '1' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                    <span style="font-size: 20px;">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->question8 == 'No' || $admission->exam_physical->question8 == '0' ? '☑' : '☐' }}
                                                                                        @else
                                                                                            ☐
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" valign="top"
                                                                                    height="35">
                                                                                    @php echo nl2br(optional($admission->exam_physical)->purpose) @endphp
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
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0"
                                                                        cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%"
                                                                                        border="1"
                                                                                        style="border-left : none;border-right : none;"
                                                                                        cellspacing="0"
                                                                                        cellpadding="2">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td colspan="10"
                                                                                                    align="left"
                                                                                                    valign="top">
                                                                                                    <b>II. MEDICAL
                                                                                                        EXAMINATION
                                                                                                        <br>
                                                                                                        Enter the
                                                                                                        data called
                                                                                                        for. Place a
                                                                                                        checkmark
                                                                                                        (✔) in the
                                                                                                        appropriate
                                                                                                        box
                                                                                                        <span
                                                                                                            style="font-size: 20px;">☐</span>
                                                                                                    </b>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td valign="top">
                                                                                                    HEIGHT(cm):<br>
                                                                                                    <b>{{ $admission->exam_physical ? $admission->exam_physical->height : null }}</b>
                                                                                                </td>
                                                                                                <td colspan="2"
                                                                                                    valign="top">
                                                                                                    WEIGHT (kg):<br>
                                                                                                    <b>{{ $admission->exam_physical ? $admission->exam_physical->weight : null }}</b>
                                                                                                </td>
                                                                                                <td colspan="2"
                                                                                                    align="left"
                                                                                                    valign="top">
                                                                                                    BLOOD
                                                                                                    PRESSURE:<br>
                                                                                                    Systolic:
                                                                                                    <b><u>{{ $admission->exam_physical ? $admission->exam_physical->systollic : null }}</u></b>
                                                                                                    <br>
                                                                                                    Diastolic:<b><u>{{ $admission->exam_physical ? $admission->exam_physical->diastollic : null }}</u></b>
                                                                                                </td>
                                                                                                <td colspan="2"
                                                                                                    valign="top">
                                                                                                    PULSE RATE:<b><br><u>{{ $admission->exam_physical ? $admission->exam_physical->pulse : null }}</u></b>/min
                                                                                                    <br>
                                                                                                    Regular
                                                                                                    Rhythm:<b><u>{{ $admission->exam_physical ? $admission->exam_physical->rhythm : null }}</u></b>
                                                                                                </td>
                                                                                                <td colspan="2"
                                                                                                    valign="top">
                                                                                                    RESPIRATION:<b><br>
                                                                                                        <u>{{ $admission->exam_physical ? $admission->exam_physical->respiration : null }}</u>
                                                                                                    </b>/min</td>
                                                                                                <td valign="top">BMI
                                                                                                    :<br>
                                                                                                    @if ($admission->agency_id == 22)
                                                                                                        <b>
                                                                                                            {{ $admission->exam_physical->height && $admission->exam_physical->weight ? (int) floor($admission->exam_physical->weight / (($admission->exam_physical->height / 100) * ($admission->exam_physical->height / 100))) : null }}
                                                                                                        </b>
                                                                                                    @else
                                                                                                        <b>
                                                                                                            {{ $admission->exam_physical ? $admission->exam_physical->bmi : null }}
                                                                                                        </b>
                                                                                                    @endif
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td width="11%"
                                                                                                    align="center">
                                                                                                    VISUAL ACUITY
                                                                                                </td>
                                                                                                <td colspan="2"
                                                                                                    align="center">
                                                                                                    FAR VISION</td>
                                                                                                <td colspan="2"
                                                                                                    align="center">
                                                                                                    NEAR VISION</td>
                                                                                                <td width="12%"
                                                                                                    align="center">
                                                                                                    ISHIHARA COLOR
                                                                                                </td>
                                                                                                <td width="8%"
                                                                                                    align="center">
                                                                                                    EAR</td>
                                                                                                <td colspan="2"
                                                                                                    align="center">
                                                                                                    Hearing by
                                                                                                    Audiometry</td>
                                                                                                <td width="11%"
                                                                                                    align="center">
                                                                                                    Clarity of
                                                                                                    Speech</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Uncorrected</td>
                                                                                                <td width="9%">OD
                                                                                                    <b>
                                                                                                        {{ $admission->exam_visacuity ? $admission->exam_visacuity->ufvod : null }}
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td width="9%">OS
                                                                                                    <b>
                                                                                                        {{ $admission->exam_visacuity ? $admission->exam_visacuity->ufvos : null }}
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td width="9%">ODJ
                                                                                                    <b>
                                                                                                        {{ $admission->exam_visacuity ? $admission->exam_visacuity->unvodj : null }}
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td width="10%">OSJ
                                                                                                    <b>
                                                                                                        {{ $admission->exam_visacuity ? $admission->exam_visacuity->unvosj : null }}
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td align="center"
                                                                                                    width="12%">
                                                                                                    Adequate
                                                                                                    <b>
                                                                                                        @if ($admission->exam_ishihara)
                                                                                                            <span
                                                                                                                style="font-size: 20px;">{{ $admission->exam_ishihara->result == 'Adequate' ? '☑' : '☐' }}</span>
                                                                                                        @else
                                                                                                            <span
                                                                                                                style="font-size: 20px;">☐</span>
                                                                                                        @endif
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td align="center">Right</td>
                                                                                                <td width="10%"><b>
                                                                                                        @if ($admission->exam_audio)
                                                                                                            <span style="font-size: 20px;">{{ $admission->exam_audio->right_ear_result == 'Adequate' ? '☑' : '☐' }}</span>
                                                                                                        @else
                                                                                                            <span style="font-size: 20px;">☐</span>
                                                                                                        @endif
                                                                                                    </b> Adequate
                                                                                                </td>
                                                                                                <td width="11%"><b>
                                                                                                        @if ($admission->exam_audio)
                                                                                                            <span style="font-size: 20px;">{{ $admission->exam_audio->right_ear_result == 'Inadequate' ? '☑' : '☐' }}</span>
                                                                                                        @else
                                                                                                            <span style="font-size: 20px;">☐</span>
                                                                                                        @endif
                                                                                                    </b> Inadequate
                                                                                                </td>
                                                                                                <td align="left"><b>
                                                                                                        <span style="font-size: 20px;">☑</span>
                                                                                                    </b> Adequate
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td width="11%">
                                                                                                    Corrected</td>
                                                                                                <td>OD <b>{{ $admission->exam_visacuity ? $admission->exam_visacuity->cfvod : null }}</b></td>
                                                                                                <td>OS <b>{{ $admission->exam_visacuity ? $admission->exam_visacuity->cfvos : null }}</b></td>
                                                                                                <td>ODJ <b>{{ $admission->exam_visacuity ? $admission->exam_visacuity->cnvodj : null }}</b></td>
                                                                                                <td>OSJ <b>{{ $admission->exam_visacuity ? $admission->exam_visacuity->cnvosj : null }}</b></td>
                                                                                                <td align="center">
                                                                                                    Defective<b>
                                                                                                        @if ($admission->exam_ishihara)
                                                                                                            <span style="font-size: 20px;">{{ $admission->exam_ishihara->result == 'Defective' ? '☑' : '☐' }}</span>
                                                                                                        @else
                                                                                                            <span style="font-size: 20px;">☐</span>
                                                                                                        @endif
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td align="center">Left</td>
                                                                                                <td><b>
                                                                                                        @if ($admission->exam_audio)
                                                                                                            <span style="font-size: 20px;">{{ $admission->exam_audio->left_ear_result == 'Adequate' ? '☑' : '☐' }}</span>
                                                                                                        @else
                                                                                                            <span style="font-size: 20px;">☐</span>
                                                                                                        @endif
                                                                                                    </b> Adequate
                                                                                                </td>
                                                                                                <td><b>
                                                                                                        @if($admission->exam_audio)
                                                                                                            <span style="font-size: 20px;">{{ $admission->exam_audio->left_ear_result == 'Inadequate' ? '☑' : '☐' }}</span>
                                                                                                        @else
                                                                                                            <span style="font-size: 20px;">☐</span>
                                                                                                        @endif
                                                                                                    </b> Inadequate
                                                                                                </td>
                                                                                                <td align="left"><b>
                                                                                                        <span
                                                                                                            style="font-size: 20px;">☐</span>
                                                                                                    </b> Defective
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
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <span style="font-size: 11px; text-align: left;">DOH-PEMER-SB REVISION 03/10-17-2013</span>
                    </div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="1"
                                        style="border-left : none;border-right : none;" cellspacing="0"
                                        cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="9"><b>II.MEDICAL EXAMINATION(Continuation). Alongside
                                                        columns A,B,C put check mark(✔) under "YES" if Normal. If
                                                        not Normal, specify findings</b></td>
                                            </tr>
                                            <tr>
                                                <td width="15%" align="center"><b>A</b></td>
                                                <td width="4%" align="center"><b>YES</b></td>
                                                <td width="16%" align="center"><b>Significant Findings</b></td>
                                                <td width="14%" align="center"><b>B</b></td>
                                                <td width="4%" align="center"><b>YES</b></td>
                                                <td width="15%" align="center"><b>Significant Findings</b></td>
                                                <td width="13%" align="center"><b>C</b></td>
                                                <td width="3%" align="center"><b>YES</b></td>
                                                <td width="16%" align="center"><b>Significant Findings</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Skin</b></td>
                                                <td align="center" style="font-size: 20px;"><b>

                                                        {{ optional($admission->exam_physical)->a1 == 'Yes' ? '☑' : '☐' }}

                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a1_findings ? $admission->exam_physical->a1_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Neck,Lymph Nodes,Thyroid</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b1 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b1_findings ? $admission->exam_physical->b1_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Genito-urinary System</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c2 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c2_findings ? $admission->exam_physical->c2_findings : null }}
                                                        @endif
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Head, neck, scalp</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a2 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a2_findings ? $admission->exam_physical->a2_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Chest-Breast-Axilla</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b2 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center">
                                                    <b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b3_findings ? $admission->exam_physical->b3_findings : null }}
                                                        @endif
                                                    </b>
                                                </td>
                                                <td><b>Inguinals, Genitals</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c3 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c3_findings ? $admission->exam_physical->c3_findings : null }}
                                                        @endif
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Eyes, external</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a3 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a3_findings ? $admission->exam_physical->a3_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Lungs</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b3 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b4_findings ? $admission->exam_physical->b4_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Extremities</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c3 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c4_findings ? $admission->exam_physical->c4_findings : null }}
                                                        @endif
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Pupils,Opthalmoscopic</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a4 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a4_findings ? $admission->exam_physical->a4_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Heart</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b4 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b5_findings ? $admission->exam_physical->b5_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Reflexes</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c4 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c5_findings ? $admission->exam_physical->c5_findings : null }}
                                                        @endif
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Ears</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a5 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a5_findings ? $admission->exam_physical->a5_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Abdomen</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b5 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b6_findings ? $admission->exam_physical->b6_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Dental(Teeth/Gums)</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c5 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c6_findings ? $admission->exam_physical->c6_findings : null }}
                                                        @endif
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Noses, Sinuses</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a6 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a6_findings ? $admission->exam_physical->a6_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Back</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b6 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b7_findings ? $admission->exam_physical->b7_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td>&nbsp;</td>
                                                <td align="center">&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><b>Mouth, Throat</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a7 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->a7_findings ? $admission->exam_physical->a7_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td><b>Anus-rectum</b></td>
                                                <td align="center" style="font-size: 20px;"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->b7 == 'Yes' ? '☑' : '☐' }}
                                                        @endif
                                                    </b></td>
                                                <td align="center"><b>
                                                        @if ($admission->exam_physical)
                                                            {{ $admission->exam_physical->c1_findings ? $admission->exam_physical->c1_findings : null }}
                                                        @endif
                                                    </b></td>
                                                <td>&nbsp;</td>
                                                <td align="center">&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="1"
                                        style="border-top : none;border-left : none;border-right : none;"
                                        cellspacing="0" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>III.RESULTS OF ANCILLARY EXAMINATION. Place a
                                                        check mark (✔) in the appropriate box
                                                        ☐
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td width="22%">A. CHEST X-RAY: <br>
                                                    <div
                                                        style="width: 100%; display: flex; align-items: center; justify-content: center;">
                                                        <span style="margin-right: 0.2rem;">Specify: </span>
                                                        <span>
                                                            {{ $admission->exam_physical ? $admission->exam_physical->xray_findings : null }}</span>
                                                    </div>
                                                </td>
                                                <td width="19%"><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->chest == 'normal' || $admission->exam_physical->chest == 'normal' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Normal<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->chest == 'findings' || $admission->exam_physical->chest == 'findings' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>With Findings</td>
                                                <td width="3%">D. URINALYSIS :
                                                    <div
                                                        style="width: 100%; display: flex; align-items: center; justify-content: center;">
                                                        <span>Specify</span>
                                                        <span><input name="co" type="text" id="co"
                                                                value="" class="brdNone"
                                                                style="width:100px;text-align:left;border: none;font-size: 10px;"></span>
                                                    </div>
                                                </td>
                                                <td width="19%" valign="top"><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->urinalysis == 'normal' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Normal<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->urinalysis == 'findings' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>With Findings</td>
                                                <td width="13%">G. HIV/AIDS Test :</td>
                                                <td width="21%"><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->hiv == 'Reactive' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Reactive<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->hiv == 'Non Reactive' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b> Non-Reactive </td>
                                            </tr>
                                            <tr>
                                                <td>B. ECG : <br>
                                                    <div
                                                        style="width: 100%; display: flex; align-items: center; justify-content: center;">
                                                        <span style="margin-right: 0.2rem;">Specify: </span>
                                                        <span style="font-size: 10px;">
                                                            {{ $admission->exam_physical ? $admission->exam_physical->ecg_findings : null }}</span>
                                                    </div>
                                                </td>
                                                <td><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->ecg == 'normal' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Normal<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->ecg == 'findings' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>With Findings</td>
                                                <td> E. STOOL EXAM : <br>
                                                    <div
                                                        style="width: 100%; display: flex; align-items: center; justify-content: center;">
                                                        <span>Specify</span>
                                                        <span><input name="co" type="text" id="co"
                                                                value="" class="brdNone"
                                                                style="width:100px;text-align:left;border: none;font-size: 10px;"></span>
                                                    </div>
                                                </td>
                                                <td valign="top"><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->stool == 'normal' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Normal<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->stool == 'findings' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>With Findings</td>
                                                <td>H. RPR :</td>
                                                <td><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->rph == 'Reactive' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Reactive<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->rph == 'Non Reactive' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Non-Reactive</td>
                                            </tr>
                                            <tr>
                                                <td>C. CBC :</td>
                                                <td><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->cbc == 'normal' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Normal<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->cbc == 'findings' || $admission->exam_physical->chest == 'Non-Significant' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>With Findings</td>
                                                <td>F. Hepatitis B :</td>
                                                <td valign="top"><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->hepa_b == 'Reactive' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Reactive <b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->hepa_b == 'Non Reactive' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>Non-Reactive</td>
                                                <td colspan="2">I. BLOOD TYPE(Specify) :<b>
                                                    </b>
                                                    @if ($admission->exam_physical)
                                                        {{ $admission->exam_physical->blood_type ? $admission->exam_physical->blood_type : null }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" style="border-bottom: 1px solid black;"
                                        cellspacing="0" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td width="15%">Psychological Test</td>
                                                <td width="5%">
                                                    <span style="font-size: 13px; font-weight: 600;">
                                                        @if ($admission->exam_physical)
                                                            @if ($admission->exam_physical->psychological == 'normal')
                                                                ☑
                                                            @else
                                                                ☐
                                                            @endif
                                                        @else
                                                            ☐
                                                        @endif
                                                        Yes
                                                    </span>
                                                </td>
                                                <td width="85%">
                                                    <span style="font-size: 13px; font-weight: 600;">
                                                        @if ($admission->exam_physical)
                                                            @if ($admission->exam_physical->psychological == 'evaluation')
                                                                ☑
                                                            @else
                                                                ☐
                                                            @endif
                                                        @else
                                                            ☐
                                                        @endif
                                                        No
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" height="40" border="0"
                                        style="border-bottom: 1px solid black;" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>ADDITIONAL TEST (Specify) e.g Blood Chemistries, Drug Test, Alcohol
                                                    Test</td>
                                            </tr>
                                            <td>
                                                @if ($admission->exam_physical)
                                                    @php echo nl2br($admission->exam_physical->additional_labtest) @endphp
                                                @endif
                                            </td>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td><b>IV. Summary. Place a check mark(✔) in the appropriate box
                                                        ☐
                                                    </b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="1" cellspacing="0"
                                        style="border-left : none;border-right : none;" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td width="32%">Basic DOH Mandatory Medical Examination :</td>
                                                <td><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->summary_medexam == 'passed' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b> PASSED <b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->summary_medexam == 'findings' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>WITH SIGNIFICANT FINDINGS</td>
                                            </tr>
                                            <tr>
                                                <td>Additional Laboratory Test :</td>
                                                <td><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->summary_labtest == 'passed' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>PASSED<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->summary_labtest == 'findings' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>WITH SIGNIFICANT FINDINGS</td>
                                            </tr>
                                            <tr>
                                                <td>Flag/Host Medical and Laboratory Requirements</td>
                                                <td><b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->summary_labrequirements == 'passed' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>PASSED<b>
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->summary_labrequirements == 'findings' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b>WITH SIGNIFICANT FINDINGS</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>REMARKS/SPECIAL NEEDS SPECIFY</b>(Specify e.g.
                                                    with medication,diet restriction etc.)<br>
                                                    @if ($admission->exam_physical)
                                                        {{ $admission->exam_physical->remarks ? $admission->exam_physical->remarks : null }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td colspan="4">V.ASSESSMENT OF FITNESS FOR SERVICE AT SEA. Place a
                                                    check mark (✔) in the appropriate box<b>
                                                        ☐
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">On the basis of the examinee's personal declaration,
                                                    my clinic examination and the diagnostic test results recorded
                                                    above, I declare the examinee medically:</td>
                                            </tr>
                                            <tr>
                                                <td width="12%">&nbsp;</td>
                                                <td width="33%" align="left"><b>FIT FOR LOOK OUT DUTY
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->duty == 'Fit' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b></td>
                                                <td width="28%" align="center"><b>NOT FIT FOR LOOK OUT DUTY
                                                        @if ($admission->exam_physical)
                                                            <span
                                                                style="font-size: 20px;">{{ $admission->exam_physical->duty == 'Unfit' ? '☑' : '☐' }}</span>
                                                        @endif
                                                    </b></td>
                                                <td width="27%">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td width="12%">&nbsp;</td>
                                                <td width="18%"><b>DECK SERVICE</b></td>
                                                <td width="22%"><b>ENGINE SERVICE</b></td>
                                                <td width="19%"><b>CATERING SERVICE</b></td>
                                                <td width="29%"><b>OTHER SERVICE</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>FIT</b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'DECK SERVICES' && optional($admission->exam_physical)->fit == 'Fit' ? '☑' : '☐' }}
                                                    </b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'ENGINE SERVICES' && optional($admission->exam_physical)->fit == 'Fit' ? '☑' : '☐' }}
                                                    </b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'CATERING SERVICES' && optional($admission->exam_physical)->fit == 'Fit' ? '☑' : '☐' }}
                                                    </b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'OTHER SERVICES' && optional($admission->exam_physical)->fit == 'Fit' ? '☑' : '☐' }}
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>UNFIT</b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'DECK SERVICES' && optional($admission->exam_physical)->fit == 'Unfit' ? '☑' : '☐' }}
                                                    </b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'ENGINE SERVICES' && optional($admission->exam_physical)->fit == 'Unfit' ? '☑' : '☐' }}
                                                    </b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'CATERING SERVICES' && optional($admission->exam_physical)->fit == 'Unfit' ? '☑' : '☐' }}
                                                    </b></td>
                                                <td style="font-size: 20px;"><b>
                                                        {{ $admission->category == 'OTHER SERVICES' && optional($admission->exam_physical)->fit == 'Unfit' ? '☑' : '☐' }}
                                                    </b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="1"
                                        style="border-left : none;border-right : none;" cellspacing="0"
                                        cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="2">
                                                        <tbody>
                                                            <tr>
                                                                <td width="19%" height="29">WITH RESTRICTIONS:
                                                                    <b>
                                                                        @if ($admission->exam_physical)
                                                                            <span
                                                                                style="font-size: 20px;">{{ $admission->exam_physical->restriction == 'with restriction' ? '☑' : '☐' }}</span>
                                                                        @endif
                                                                    </b>
                                                                </td>
                                                                <td width="25%">WITHOUT RESTRICTIONS: <b>
                                                                        @if ($admission->exam_physical)
                                                                            <span
                                                                                style="font-size: 20px;">{{ $admission->exam_physical->restriction == 'without restriction' ? '☑' : '☐' }}</span>
                                                                        @endif
                                                                    </b></td>
                                                                <td width="20%">VISUAL AIDS REQUIRED:</td>
                                                                <td width="6%" valign="top">Yes<b>
                                                                        @if ($admission->exam_physical)
                                                                            <span
                                                                                style="font-size: 20px;">{{ $admission->exam_physical->visual_required ? '☑' : '☐' }}</span>
                                                                        @endif
                                                                    </b></td>
                                                                <td width="21%" valign="top">No<b>
                                                                        @if ($admission->exam_physical)
                                                                            <span
                                                                                style="font-size: 20px;">{{ !$admission->exam_physical->visual_required ? '☑' : '☐' }}</span>
                                                                        @endif
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Describe restriction**(refer to
                                                                    standard restrictions at the bottom of this page)
                                                                </td>
                                                                <td colspan="2">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style="border-bottom : 1px solid">
                                                                    <b>
                                                                        @if ($admission->exam_physical)
                                                                            {{ $admission->exam_physical->describe_restriction }}
                                                                        @endif
                                                                    </b>
                                                                </td>
                                                                <td colspan="2">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="1"
                                        style="border-top : none;border-left : none;border-right : none;"
                                        cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td>Date of Medical Examination</td>
                                                                <td width="36%">Date Expire of Medical Examination
                                                                    Report</td>
                                                                <td>Medical Examination Report No.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>(DD/MM/YY):<b>
                                                                        @if ($admission->exam_physical)
                                                                            {{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), 'd F Y') : null }}
                                                                        @endif
                                                                    </b></td>
                                                                <td>(DD/MM/YY):<b>
                                                                        @if ($admission->exam_physical)
                                                                            {{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), 'd F Y') : null }}
                                                                        @endif
                                                                    </b></td>
                                                                <td><b>
                                                                        @if ($admission->exam_physical)
                                                                            {{ $admission->patientcode }}
                                                                        @endif
                                                                    </b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" borded="1" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="3">
                                                        <tbody>
                                                            <tr>
                                                                <td width="51%"><b>NAME AND SIGNATURE OF
                                                                        EXAMINING/AUTHORIZED PHYSICIAN:</b></td>
                                                                <td width="42%" style="border-bottom : 1px solid">
                                                                    <b>
                                                                        @if ($medical_director)
                                                                            {{ $medical_director->firstname . ' ' . $medical_director->middlename[0] . '.' . ' ' . $medical_director->lastname }},
                                                                            {{ $medical_director->title }}
                                                                        @endif
                                                                    </b>
                                                                </td>
                                                                <td width="7%">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <table width="100%" border="0"
                                                                        cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="15%"><b>LICENSE NUMBER
                                                                                        :</b></td>
                                                                                <td width="25%"
                                                                                    style="border-bottom : 1px solid">
                                                                                    <b>
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $medical_director->license_no }}
                                                                                        @endif
                                                                                    </b>
                                                                                </td>
                                                                                <td width="60%">&nbsp;</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <table width="100%" border="0"
                                                                        cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="10%"><b>ADDRESS: </b>
                                                                                </td>
                                                                                <td width="59%"
                                                                                    style="border-bottom : 1px solid">
                                                                                    <b>
                                                                                        @if ($medical_director)
                                                                                            {{ $medical_director->address }}
                                                                                        @endif
                                                                                    </b>
                                                                                </td>
                                                                                <td width="30%">&nbsp;</td>
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
                                    <table width="100%" border="1" cellpadding="5"
                                        style="border-left : none;border-right : none;border-bottom : none"
                                        cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" align="left">
                                                    <p>I hereby certify that the personal declaration above is true
                                                        to the best of my knowlegde and I fully understand the above
                                                        results of my medical examination as explained to me by the
                                                        examining/authorized physician.</p>
                                                    <p>I hereby authorized the release of all my medical records to
                                                        the DOH/MARINA/POEA, the examining/authorized physician and
                                                        my employer/manning agency </p>
                                                    <table width="100%" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="1%" align="right">(</td>
                                                                <td width="34%" align="center"
                                                                    style="border-bottom : 1px solid"><b>
                                                                        @if (preg_match('/Bahia/i', $admission->agency->agencyname))
                                                                            {{ 'Bahia Shipping Services, Inc.' }}
                                                                        @else
                                                                            {{ $admission->agency->agencyname }}
                                                                        @endif
                                                                    </b></td>
                                                                <td width="65%">)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="100%" border="0" cellpadding="2"
                                                        cellspacing="2">
                                                        <style>
                                                            #divImage {
                                                                width: 100%;
                                                                height: 35px;
                                                                position: relative;
                                                            }

                                                            #divImage img {
                                                                position: absolute;
                                                                width: 140px;
                                                                left: 35%;
                                                                top: 20px;
                                                                object-fit: cover;
                                                            }
                                                        </style>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    @if ($admission->agency_id != 19)
                                                                        @if ($admission->patient->patient_signature)
                                                                            <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp"
                                                                                width="120"
                                                                                style="object-fit: cover;" />
                                                                        @elseif ($admission->patient->signature)
                                                                            <img src="data:image/jpeg;base64,{{ $admission->patient->signature }}"
                                                                                width="120"
                                                                                style="object-fit: cover;" />
                                                                        @else
                                                                            <div style="width: 150px;height: 40px;">
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <br>
                                                                        <br>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="395" align="center"
                                                                    style="border-bottom: 1px black solid; font-weight: 600;">
                                                                    {{ $admission->patient->lastname . ', ' . $admission->patient->firstname . ' ' . $admission->patient->middlename }}
                                                                </td>
                                                                <td width="85" align="center">&nbsp;</td>
                                                                <td width="182" align="center"
                                                                    style="border-bottom: 1px black solid; text-transform: uppercase;  font-weight: 600;">
                                                                    {{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->trans_date), 'd F Y') : null }}
                                                                </td>
                                                                <td width="86" align="center">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="top"><b>NAME AND
                                                                        SIGNATURE OF SEAFARER</b> <br style="">

                                                                    <span style="font-size: 7px;font-color:solid"><b>THIS
                                                                            SIGNATURE SHOULD BE AFFIXED IN THE
                                                                            PRESENCE OF THE EXAMINING PHYSICIAN
                                                                        </b></span>
                                                                </td>
                                                                <td align="center">&nbsp;</td>
                                                                <td align="center" valign="top"><b>DATE</b></td>
                                                                <td align="center">&nbsp;</td>
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
    <table width="100%" border="1" cellspacing="0" cellpadding="2">
        <tbody>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tbody>
                            <tr>
                                <td width="54%" valign="top"><b>**STANDARD RESTRICTION(Duties) :</b>
                                    <ul style="font-size: 11.5px;">
                                        <li>No solo watchkeeping</li>
                                        <li>Not fit for emergency duties</li>
                                        <li>Not fit for lookout duties</li>
                                        <li>Only fit for lookout during daylight hours</li>
                                        <li>Not fit for work with colour coded tables etc.</li>
                                        <li>Not to be away from (home) port overnight</li>
                                        <li>Not to be away from (home) port for periods over 24 hours/7days</li>
                                        <li>Not to lift items weighing over 5/10/20/40kg</li>
                                        <li>Protective gloves to be worn for work with .......(specify)</li>
                                        <li>Eye protection to be worn to all work</li>
                                    </ul>
                                </td>
                                <td valign="top">
                                    <p>&nbsp;</p>
                                    <ul style="font-size: 11.5px;">
                                        <li>Not to work ...........(specify)</li>
                                        <li>Not fit for food handling</li>
                                        <li>Within.......(specify) miles from a safe haven</li>
                                        <li>Near - coastal only</li>
                                        <li>Coastal waters only,up to....(specify) miles from shore</li>
                                        <li>Non - tropical waters only</li>
                                        <li>Not fit for service on stand-by vessels</li>
                                        <li>Fit for service only on vessels with ship's doctor</li>
                                        <li>Toilet/washing facilities in private cabin required</li>
                                        <li>Special needs.....in emergencies(specify)</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        <span style="font-size: 11px; text-align: left;">DOH-PEMER-SB REVISION 03/10-17-2013</span>
    </div>
</body>

</html>
