<html>

<head>
    <title>MALTA</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 13.5px;
    }

    .fontBoldLrg {
        font: bold 14px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }
    .tb-fontLarge tr td {
        font: bold 14.3px sans-serif;
    }
    ol li {
        margin: 1rem 0;
    }
    @page {
        size: A4;
        margin-top: 0.5rem;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <span style="font-size: 15px; font-weight: 700;">
                                            Medical fitness certificate issued in compliance with ILO / IMO <br>
                                            guidelines of the medical examinations for seafarers
                                        </span>
                                    </td>
                                    <td>
                                        <img width="80" src="../../../app-assets/images/logo/malta.jpg" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 13px;">Merchant Shipping Directorate</span> <br>
                                        <span style="font-size: 8px;">Transport Malta, Malta Transport Centre, Marsa
                                            MRS1917, Malta Tel: +356 21250360 / +356 99067197 (AOH) Fax: +356 21241460
                                            E-Mail: applica.stcw@transport.gov.mt</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="2" style="margin-top: 0.7rem;" class="brdTable">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="background: whitesmoke; padding: 0.5rem; font-weight: 700;">
                                        PART A – To be completed by applicant</td>
                                </tr>
                                <tr>
                                    <td>Surname (Family Name) <br> <span
                                            class="fontBoldLrg">{{$admission->patient->lastname}}</span></td>
                                    <td>First Name <br> <span class="fontBoldLrg">{{$admission->patient->firstname}}</span></td>
                                    <td>Second Name <br> <span class="fontBoldLrg">{{$admission->patient->middlename}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth<br> <span class="fontBoldLrg">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span>
                                    </td>
                                    <td>Country of Birth<br> <span
                                            class="fontBoldLrg">{{$admission->patient->patientinfo->birthplace}}</span></td>
                                    <td>Nationality <br> <span class="fontBoldLrg">{{$admission->patient->patientinfo->nationality}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        Department <br>
                                        <div>
                                            <span style="margin: 0 1rem;">Deck
                                             @if (preg_match('/DECK SERVICES/i', $admission->category))
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                             </span>
                                             @else
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                             </span>
                                             @endif
                                            </span>
                                            <span style="margin: 0 1rem;">Engine
                                             @if (preg_match('/ENGINE SERVICES/i', $admission->category))
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                             </span>
                                             @else
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                             </span>
                                             @endif
                                            </span>
                                            <span style="margin: 0 1rem;">Radio
                                             @if (preg_match('/RADIO SERVICES/i', $admission->category))
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                             </span>
                                             @else
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                             </span>
                                             @endif
                                            </span>
                                            <span style="margin: 0 1rem;">Catering
                                             @if (preg_match('/CATERING SERVICES/i', $admission->category))
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                             </span>
                                             @else
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                             </span>
                                             @endif
                                            </span>
                                            <span style="margin: 0 1rem;">Other
                                            @if (preg_match('/OTHER SERVICES/i', $admission->category))
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                             </span>
                                             @else
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                             </span>
                                             @endif
                                            </span>
                                            <span style="margin: 0 1rem;">Please specify:
                                                <span style="font-size: 15px;">{{$admission->position}}</span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Passport No. / Discharge Book No. / Identity Card No. <br>
                                        <span>{{$admission->patient->patientinfo->passportno}}</span>
                                    </td>
                                    <td>
                                        Gender <br>
                                        <span>{{strtoupper($admission->patient->gender)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        Address <br>
                                        <span>{{$admission->patient->patientinfo->address}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="3" class="brdAll">
                            <tbody>
                                <tr>
                                    <td>
                                        Applicant`s personal declaration (Assistance should be offered by medical staff)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        • Have you ever had any of the following conditions:
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td width="50%">
                                                        <table width="100%" cellspacing="0" cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><b> Condition</b></td>
                                                                    <td><b> Yes</b></td>
                                                                    <td><b>No</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1. </td>
                                                                    <td>Eye/vision problem</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick7 == "Yes" || $admission->exam_physical->sick7 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick7 == "No" || $admission->exam_physical->sick7 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2. </td>
                                                                    <td>High blood pressure</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick12 == "Yes" || $admission->exam_physical->sick12 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick12 == "No" || $admission->exam_physical->sick12 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3. </td>
                                                                    <td>Heart/vascular disease</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick13 == "Yes" || $admission->exam_physical->sick13 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick13 == "No" || $admission->exam_physical->sick13 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4. </td>
                                                                    <td>Heart surgery</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5. </td>
                                                                    <td>Varicose veins</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6. </td>
                                                                    <td>Asthma/bronchitis</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick27 == "Yes" || $admission->exam_physical->sick27 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick27 == "No" || $admission->exam_physical->sick27 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7. </td>
                                                                    <td>Blood disorder</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick18 == "Yes" || $admission->exam_physical->sick18 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick18 == "No" || $admission->exam_physical->sick18 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8. </td>
                                                                    <td>Diabetes</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick15 == "Yes" || $admission->exam_physical->sick15 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick15 == "No" || $admission->exam_physical->sick15 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9. </td>
                                                                    <td>Thyroid problem</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10. </td>
                                                                    <td>Digestive disorder</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11. </td>
                                                                    <td>Kidney problem</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick22 == "Yes" || $admission->exam_physical->sick22 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick22 == "No" || $admission->exam_physical->sick22 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>12. </td>
                                                                    <td>Skin problem</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>13. </td>
                                                                    <td>Allergies</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick30 == "Yes" || $admission->exam_physical->sick30 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick30 == "No" || $admission->exam_physical->sick30 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>14. </td>
                                                                    <td>Infectious/contagious diseases</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>15. </td>
                                                                    <td>Hernia</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>16. </td>
                                                                    <td>Genital disorders</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick24 == "Yes" || $admission->exam_physical->sick24 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick24 == "No" || $admission->exam_physical->sick24 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>17. </td>
                                                                    <td>Pregnancy</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="50%">
                                                        <table width="100%" cellspacing="0" cellpadding="2" style="margin-top: 1rem;">
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><b> Condition</b></td>
                                                                    <td><b> Yes</b></td>
                                                                    <td><b>No</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>18. </td>
                                                                    <td>Sleeping problems</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick5 == "Yes" || $admission->exam_physical->sick5 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick5 == "No" || $admission->exam_physical->sick5 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>19. </td>
                                                                    <td>Do you smoke?</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick33 == "Yes" || $admission->exam_physical->sick33 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick33 == "No" || $admission->exam_physical->sick33 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>20. </td>
                                                                    <td>Operation/surgery</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick31 == "Yes" || $admission->exam_physical->sick31 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick31 == "No" || $admission->exam_physical->sick31 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>21. </td>
                                                                    <td>Epilepsy/seizures</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick4 == "Yes" || $admission->exam_physical->sick4 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick4 == "No" || $admission->exam_physical->sick4 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>22. </td>
                                                                    <td>Dizziness/fainting</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick3 == "Yes" || $admission->exam_physical->sick3 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick3 == "No" || $admission->exam_physical->sick3 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>23. </td>
                                                                    <td>Loss of consciousness</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>24. </td>
                                                                    <td>Psychiatric problems</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>25. </td>
                                                                    <td>Depression</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick6 == "Yes" || $admission->exam_physical->sick6 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick6 == "No" || $admission->exam_physical->sick6 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>26. </td>
                                                                    <td>Attempted suicide</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>27. </td>
                                                                    <td>Loss of memory</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>28. </td>
                                                                    <td>Balance problem</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>29. </td>
                                                                    <td>Severe headaches</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick2 == "Yes" || $admission->exam_physical->sick2 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick2 == "No" || $admission->exam_physical->sick2 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>30. </td>
                                                                    <td>Ear/nose/throat problems</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick8 == "Yes" || $admission->exam_physical->sick8 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick8 == "No" || $admission->exam_physical->sick8 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>31. </td>
                                                                    <td>Restricted mobility</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>32. </td>
                                                                    <td>Back problems</td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick23 == "Yes" || $admission->exam_physical->sick23 == "1")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_physical)
                                                                        @if($admission->exam_physical->sick23 == "No" || $admission->exam_physical->sick23 == "0")
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>33. </td>
                                                                    <td>Amputation</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>34. </td>
                                                                    <td>Fractures/dislocations</td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                                    </td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
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
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdAll">
                            <tbody>
                                <tr>
                                    <td height="70" valign="top">
                                        If you answered yes to any of the above questions, please write details below:
                                        <br>
                                         @if($admission->exam_physical) @php echo nl2br($admission->exam_physical->specify) @endphp @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="3" class="brdAll">
                            <tbody>
                                <tr>
                                    <td>• Additional questions:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td>Condition</td>
                                                    <td>Yes</td>
                                                    <td>No</td>
                                                </tr>
                                                <tr>
                                                    <td>35. Have you ever been signed off as sick or repatriated from a ship?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question1 == "Yes" || $admission->exam_physical->question1 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question1 == "No" || $admission->exam_physical->question1 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>36. Have you ever been hospitalized?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question2 == "Yes" || $admission->exam_physical->question2 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question2 == "No" || $admission->exam_physical->question2 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>37. Have you ever been declared unfit for sea duty?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question3 == "Yes" || $admission->exam_physical->question3 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question3 == "No" || $admission->exam_physical->question3 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>38. Has your medical certificate ever been restricted or
                                                        revoked?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question4 == "Yes" || $admission->exam_physical->question4 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question4 == "No" || $admission->exam_physical->question4 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>39. Are you aware that you have any medical problems, diseases
                                                        or illnesses?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question5 == "Yes" || $admission->exam_physical->question5 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question5 == "No" || $admission->exam_physical->question5 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>40. Do you feel healthy and fit to perform the duties of your
                                                        designated position / occupation?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question6 == "Yes" || $admission->exam_physical->question6 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question6 == "No" || $admission->exam_physical->question6 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>41. Are you allergic to any medication?</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question7 == "Yes" || $admission->exam_physical->question7 == "1")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->question7 == "No" || $admission->exam_physical->question7 == "0")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="3" class="brdAll">
                            <tbody>
                                <tr>
                                    <td height="50" valign="top">Comments: <br>
                                        @if($admission->exam_physical){{$admission->exam_physical->comments}}@endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="6" cellpadding="5" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        Form TM/MSD/SCU 010 Issue 3
                                    </td>
                                    <td width="50%">
                                        Transport Malta is the Authority for Transport in Malta set up by ACT XV of 2009
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <b>Page 1 of 4</b> <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <span style="font-size: 15px; font-weight: 700; text-align: center;">
                                            Medical fitness certificate issued in compliance with ILO / IMO
                                           <br> guidelines of the medical examinations for seafarers
                                        </span>
                                    </td>
                                    <td>
                                        <img width="80" src="../../../app-assets/images/logo/malta.jpg" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 13px;">Merchant Shipping Directorate</span> <br>
                                        <span style="font-size: 8px;">Transport Malta, Malta Transport Centre, Marsa
                                            MRS1917, Malta Tel: +356 21250360 / +356 99067197 (AOH) Fax: +356 21241460
                                            E-Mail: applica.stcw@transport.gov.mt</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdAll" style="margin-top: 0.5rem;">
                            <tbody>
                                <tr>
                                    <td>42. Are you taking any non-prescription or prescription medications?</td>
                                    <td>
                                        @if($admission->exam_physical)
                                        @if($admission->exam_physical->question8 == "Yes" || $admission->exam_physical->question8 == "1")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if($admission->exam_physical)
                                        @if($admission->exam_physical->question8 == "No" || $admission->exam_physical->question8 == "0")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdAll">
                            <tbody>
                                <tr>
                                    <td height="50" valign="top">If yes, please list the medications taken, and the
                                        purpose/s and dosage/s: <br>
                                        @if($admission->exam_physical){{$admission->exam_physical->purpose}}@endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" cellspacing="0" cellpadding="10" class="brdAll">
                            <tbody>
                                <tr>
                                    <td height="80" valign="top" > <span style="font: bold 12px sans-serif;">Applicant
                                            must sign personal declaration in the presence of a duly qualified medical
                                            practitioner
                                            who will be filling PART B of this medical report </span>
                                        <br>
                                        <span>I hereby certify that the personal declaration above is a true statement
                                            to the best of my knowledge. Furthermore, I authorize the release of all my
                                            records from any health professionals,
                                            mm health institutions and public authorities to the appointed medical
                                            practitioner.</span> <br>
                                        <div style="display: flex; align-items: flex-end; justify-content: space-around; height: 80px;">
                                            <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; height: 100%;">
                                                <span>
                                                    @if($admission->agency_id != 19)
                                                        @if($admission->patient->patient_signature)
                                                            <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="150" class="signature-taken" />
                                                        @elseif ($admission->patient->signature)
                                                            <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="150" class="signature-taken"/>
                                                        @else
                                                            <div style="width: 150px;height: 40px;"></div>
                                                        @endif
                                                    @endif
                                                </span>
                                                <span style="text-align: center;">Applicant`s Signature</span>
                                                <span style="text-align: center;">(Signed in the presence of medical practitioner)</span>
                                            </div>
                                            <div style="font: normal sans-serif;">
                                                Date:
                                                @if($admission->exam_physical)
                                                    {{$admission->exam_ishihara ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="2" class="brdTable" style="margin-top: 1rem;">
                            <tbody>
                                <tr>
                                    <td colspan="10" style="background: whitesmoke; padding: 0.5rem; font-weight: 700;">
                                        PART B – To be completed by a duly qualified medical practitioner</td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="10">
                                        <b>Medical Examination</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td>
                                        @if($admission->exam_physical)
                                        {{$admission->exam_physical->height}} (cm)
                                        @endif
                                    </td>
                                    <td>Weight</td>
                                    <td>
                                        @if($admission->exam_physical)
                                        {{$admission->exam_physical->weight}} (kg)
                                        @endif
                                    </td>
                                    <td>Pulse Rate</td>
                                    <td colspan="2">
                                        @if($admission->exam_physical)
                                        {{$admission->exam_physical->pulse}} (/minute)
                                        @endif
                                    </td>
                                    <td>Rhythm</td>
                                    <td colspan="2">
                                        @if($admission->exam_physical)
                                        {{$admission->exam_physical->rhythm}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        Blood pressure (mm HG)
                                    </td>
                                    <td colspan="6">Urinalysis</td>
                                </tr>
                                <tr>
                                    <td>Systolic</td>
                                    <td>
                                        @if($admission->exam_physical)
                                        {{$admission->exam_physical->systollic}}
                                        @endif
                                    </td>
                                    <td>Diastolic</td>
                                    <td>
                                        @if($admission->exam_physical)
                                        {{$admission->exam_physical->diastollic}}
                                        @endif
                                    </td>
                                    <td>Glucose</td>
                                    <td>Normal</td>
                                    <td>Protein</td>
                                    <td>Normal</td>
                                    <td>Blood</td>
                                    <td>Normal</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="2" class="brdTable">
                            <tbody>
                                <tr>
                                    <td>Sight (Table on the “Minimum in-service eyesight standards for seafarers” is
                                        found on page 4 of this medical report)</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            Use of glasses or contact lenses:
                                            <span style="margin: 0 1rem;">YES
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->visual_required != "")
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
                                                        @if($admission->exam_physical->visual_required == "")
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
                        <table width="100%" cellspacing="0" cellpadding="3" class="brdTable">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td align="center" colspan="6">Visual acuity</td>
                                    <td rowspan="5"></td>
                                    <td align="center" colspan="3">Visual fields </td>
                                </tr>
                                <tr>
                                    <td rowspan="2"></td>
                                    <td colspan="3" align="center">Unaided</td>
                                    <td colspan="3" align="center">Aided</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td>Right eye</td>
                                    <td>Left eye</td>
                                    <td>Binocular</td>
                                    <td>Right eye</td>
                                    <td>Left eye</td>
                                    <td>Binocular</td>
                                    <td></td>
                                    <td>Right eye</td>
                                    <td>Left eye</td>
                                </tr>
                                <tr>
                                    <td>Distant</td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->ufvod}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->ufvos}}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->cfvod}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->cfvos}}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>Normal</td>
                                    @if($admission->exam_visacuity)
                                        @if($admission->exam_visacuity->remarks_status == 'normal')
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                        @else
                                            <td align="center"></td>
                                            <td align="center"></td>
                                        @endif
                                    @else
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Near</td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->unvodj}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->unvosj}}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->cnvodj}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($admission->exam_visacuity)
                                            {{$admission->exam_visacuity->cnvosj}}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>Defective</td>
                                    @if($admission->exam_visacuity)
                                        @if($admission->exam_visacuity->remarks_status == 'findings')
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                        @else
                                            <td align="center"></td>
                                            <td align="center"></td>
                                        @endif
                                    @else
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td colspan="11">
                                        <div>
                                            Colour vision
                                            <span style="margin: 0 1rem;">Not tested
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->result == "")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Normal
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->result == "Adequate")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Doubtful
                                                <span style="font-size: 15px;">
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Defective
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->result == "Defective")
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
                        <table width="100%" cellspacing="0" cellpadding="3" class="brdTable">
                            <tbody>
                                <tr>
                                    <td colspan="11"><b>Hearing</b></td>
                                </tr>
                                <tr>
                                    <td align="center"></td>
                                    <td colspan="6" align="center">Pure tone and audiometry (threshold values in dB)
                                    </td>
                                    <td align="center" rowspan="4"></td>
                                    <td colspan="3" align="center">Speech and whisper test (metres)</td>
                                </tr>
                                <tr>
                                    <td align="center"></td>
                                    <td align="center">500 Hz</td>
                                    <td align="center">1000 Hz</td>
                                    <td align="center">2000 Hz</td>
                                    <td align="center">3000 Hz</td>
                                    <td align="center">4000 Hz</td>
                                    <td align="center">6000 Hz</td>
                                    <td align="center"></td>
                                    <td align="center">Normal</td>
                                    <td align="center">Whisper</td>
                                </tr>
                                <tr>
                                    <td align="center">Right ear</td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right2}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right4}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right5}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right6}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right7}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right8}}
                                        @endif
                                    </td>
                                    <td align="center">Right ear</td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->remarks_status == "normal")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @endif
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->remarks_status == "findings")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">Left ear</td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left2}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left4}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left5}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left6}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left7}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left8}}
                                        @endif
                                    </td>
                                    <td align="center">Left ear</td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->remarks_status == "normal")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @endif
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->remarks_status == "findings")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="4" class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>Normal</td>
                                                    <td>Abnormal</td>
                                                </tr>
                                                <tr>
                                                    <td>1. Head</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a2 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a2 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2. Sinuses, nose, throat</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a6 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a6 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3. Mouth / teeth</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a7 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a7 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4. Ears (general)</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a5 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a5 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5. Tympanic membrane</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6. Eyes</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a3 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a3 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7. Ophthalmoscopy</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8. Pupils</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a4 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a4 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9. Eye movement</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10. Lungs and chest</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b3 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b3 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11. Breast examination</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b2 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b2 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12. Heart</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b4 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b4 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="4" class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>Normal</td>
                                                    <td>Abnormal</td>
                                                </tr>
                                                <tr>
                                                    <td>13. Skin</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a1 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->a1 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>14. Varicose veins</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>15. Vascular (inc. pedal pulses)</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>16. Abdomen and viscera</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b5 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->b5 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>17. Hernia</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>18. Anus (not rectal exam)</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->c1 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->c1 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19. G-U system</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->c2 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->c2 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>20. Upper and lower extremities</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->c4 == "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->c4 != "Yes")
                                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            @else
                                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            @endif
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>21. Spine (C/S, T/S and L/S)</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22. Neurologic (full brief)</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>23. Psychiatric</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>24. General appearance</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="2" cellpadding="2" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="50%" style="font-size: 13px;">
                                        Form TM/MSD/SCU 010 Issue 3
                                    </td>
                                    <td width="50%" style="font-size: 13px;">
                                        Transport Malta is the Authority for Transport in Malta set up by ACT XV of 2009
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <b>Page 2 of 4</b> <br><br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0" >
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <span style="font-size: 15px; font-weight: 700;">
                                            Medical fitness certificate issued in compliance with ILO / IMO <br>
                                            guidelines of the medical examinations for seafarers
                                        </span>
                                    </td>
                                    <td>
                                        <img width="80" src="../../../app-assets/images/logo/malta.jpg" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 13px;">Merchant Shipping Directorate</span> <br>
                                        <span style="font-size: 8px;">Transport Malta, Malta Transport Centre, Marsa
                                            MRS1917, Malta Tel: +356 21250360 / +356 99067197 (AOH) Fax: +356 21241460
                                            E-Mail: applica.stcw@transport.gov.mt</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin-top: 10px;" width="100%" cellspacing="0" cellpadding="3" class="brdTable">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <b>Chest X-ray</b>
                                            <span style="margin: 0 1rem;">Not performed
                                                <span style="font-size: 15px;">
                                                    @if(!$admission->exam_xray)
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Performed on:
                                                    @if($admission->exam_xray)
                                                        {{$admission->exam_physical ? date_format(new DateTime($admission->exam_xray->trans_date), "d F Y") : null}}
                                                    @endif
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_xray)
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Results: <span>
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->chest == 'normal' ? 'NORMAL' : $admission->exam_physical->xray_findings}}
                                        @endif
                                    </span></td>
                                </tr>
                                <tr>
                                    <td>Other diagnostic test/s and results: <br>
                                        {{$admission->exam_ecg ? $admission->exam_ecg->ecg : null}}
                                        <div style="height: 100%; display: flex; align-items: center; justify-content: space-between; padding: 1rem 2rem 0rem 2rem;">
                                            <div style="width: 50%">Test: <span>ECG</span></div>
                                            <div style="width: 50%">Result: <span>
                                                @if($admission->exam_physical)
                                                    {{$admission->exam_physical->ecg == 'normal' ? 'NORMAL' : $admission->exam_physical->ecg_findings}}
                                                @endif
                                            </span></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">Medical practitioner`s comments and assessment for fitness, with reasons for any
                                        limitations: <br>
                                        @if($admission->exam_ecg)
                                            @php echo nl2br($admission->exam_ecg->remarks) @endphp
                                        @endif
                                        <br>
                                        <div>
                                            Vaccination status recorded
                                            <span style="margin: 0 1rem;">YES
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->sick32 == 'Yes' || $admission->exam_physical->sick32 == '1')
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif

                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">NO
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->sick32 == 'No' || $admission->exam_physical->sick32 == '0')
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin-top: 10px;" width="100%" cellspacing="0" cellpadding="5" class="brdTable">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="background: whitesmoke; padding: 0.5rem; font-weight: 700;">
                                        Medical certificate for service at sea</td>
                                </tr>
                                <tr>
                                    <td>Surname (Family Name) <br> <span class="fontBoldLrg">{{$admission->patient->lastname}}</span></td>
                                    <td>First Name <br> <span class="fontBoldLrg">{{$admission->patient->firstname}}</span></td>
                                    <td>Second Name <br> <span class="fontBoldLrg">{{$admission->patient->middlename}}</span></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth<br> <span class="fontBoldLrg">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span></td>
                                    <td>Country of Birth<br> <span class="fontBoldLrg">{{$admission->patient->patientinfo->birthplace}}</span></td>
                                    <td>Nationality <br> <span class="fontBoldLrg">{{$admission->patient->patientinfo->nationality}}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        Department <br>
                                        <div>
                                            <span style="margin: 0 1rem;">Deck
                                                <span style="font-size: 15px;">
                                                    @if(preg_match('/DECK SERVICES/i', $admission->category))
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Engine
                                                <span style="font-size: 15px;">
                                                    @if(preg_match('/ENGINE SERVICES/i', $admission->category))
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Radio
                                                <span style="font-size: 15px;">
                                                    @if(preg_match('/RADIO SERVICES/i', $admission->category))
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Catering
                                             @if (preg_match('/CATERING SERVICES/i', $admission->category))
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                             </span>
                                             @else
                                             <span style="font-size: 15px;">
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                             </span>
                                             @endif
                                            </span>
                                            <span style="margin: 0 1rem;">Other
                                                <span style="font-size: 15px;">
                                                    @if(preg_match('/RADIO SERVICES/i', $admission->category))
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Please specify:
                                                <span style="font-size: 15px;">{{$admission->position}}</span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Passport No. / Discharge Book No. / Identity Card No. <br>
                                        <span class="fontBoldLrg">{{$admission->patient->patientinfo->passportno}}</span>
                                    </td>
                                    <td>
                                        Gender <br>
                                        <span class="fontBoldLrg">{{strtoupper($admission->patient->gender)}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTable">
                            <tbody>
                                <tr>
                                    <td colspan="3"><b> Declaration of duly qualified medical practitioner</b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Yes</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Confirmation that applicant`s identification documents were checked?</td>
                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                </tr>
                                <tr>
                                    <td>Hearing meets the standards in STCW Code, section A-I/9?</td>
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
                                <tr>
                                    <td>Visual acuity meets standards in STCW Code, section A-I9?</td>
                                    <td width="3%" valign="middle">
                                        @if ($admission->exam_visacuity)
                                            @if (preg_match('/normal/i', $admission->exam_visacuity->remarks_status))
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
                                <tr>
                                    <td>Colour vision meets standards in STCW Code, section A-I9?</td>
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
                                </tr>
                                <tr>
                                    <td>Fit for lookout duties?</td>
                                    <td>
                                        @if($admission->exam_physical)
                                            @if($admission->exam_physical->duty == "Fit" || $admission->exam_physical->duty == "Fit Restriction")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if($admission->exam_physical)
                                            @if($admission->exam_physical->duty == "Unfit")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Is applicant suffering from any medical condition likely to be aggravated by
                                        service at sea or to render the seafarer
                                        unfit for such service or to endanger the health of other persons on boards?
                                    </td>
                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        This is to certify that I have examined the applicant and that my findings are
                                        recorded in this medical report
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        Result: <br>
                                        <div style="height: 20px;">
                                            <span style="margin: 0 1rem;">Fit for Sea Duty
                                                <span style="font-size: 15px;">
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
                                            <span style="margin: 0 1rem;">Unfit for Sea Duty
                                                <span style="font-size: 15px;">
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
                                            </span>
                                            <span style="margin: 0 1rem;">**Fit with limitations or restrictions
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->duty == "Fit Restriction")
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
                                        **Please specify limitations or restrictions, if any: <span>
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->describe_restriction}}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTable">
                            <tbody>
                                <tr>
                                    <td height="80" valign="bottom" align="center">
                                        @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                                            <img src="../../../app-assets/images/signatures/md_gonzales_sig.png" width="220" height="70" style="object-fit: cover; transform: translate(13px, 25px); margin-top: -25px;" />
                                        @else
                                            <br>
                                            <br>
                                        @endif <br>
                                        Signature of duty qualified medical practitioner
                                    </td>
                                    <td height="80" valign="bottom" align="center">
                                        <span>
                                            @if($admission->agency_id != 19)
                                                @if($admission->patient->patient_signature)
                                                    <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="130" class="signature-taken" />
                                                @elseif ($admission->patient->signature)
                                                    <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="130" class="signature-taken"/>
                                                @else
                                                    <div style="width: 150px;height: 40px;"></div>
                                                @endif
                                            @endif
                                        </span> <br>
                                        <span style="text-align: center;">Applicant`s Signature</span> <br>
                                        <span style="text-align: center;">(Signed in the presence of medical practitioner)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" valign="bottom" align="center">
                                        <span></span> <br>
                                        Medical practitioner`s stamp
                                    </td>
                                    <td height="50" valign="bottom" align="center">
                                        <span>{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}</span> <br>
                                        Date of Examination <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b>Validity:</b> <span>{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b>Date of Issue:</b> <span>{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->peme_date), "d F Y") : null}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">This medical certificate shall remain valid for a
                                        maximum period of two years unless the seafarer is under the age of 18,
                                        in which case the maximum period of validity shall be one year.</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="6" cellpadding="5" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        Form TM/MSD/SCU 010 Issue 3
                                    </td>
                                    <td width="50%">
                                        Transport Malta is the Authority for Transport in Malta set up by ACT XV of 2009
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <b>Page 3 of 4</b> <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>&nbsp;&nbsp;</div>
                        <div>&nbsp;&nbsp;</div>
                        <table width="100%" cellspacing="0" cellpadding="0" >
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <span style="font-size: 15px; font-weight: 700;">
                                            Medical fitness certificate issued in compliance with ILO / IMO <br>
                                            guidelines of the medical examinations for seafarers
                                        </span>
                                    </td>
                                    <td>
                                        <img width="80" src="../../../app-assets/images/logo/malta.jpg" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 13px;">Merchant Shipping Directorate</span> <br>
                                        <span style="font-size: 8px;">Transport Malta, Malta Transport Centre, Marsa
                                            MRS1917, Malta Tel: +356 21250360 / +356 99067197 (AOH) Fax: +356 21241460
                                            E-Mail: applica.stcw@transport.gov.mt</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="width: 760px; margin-top: 10px;">
                            <div style="text-align: center">Table A-I/9</div>
                            <div style="text-align: center; font-weight: bold;">Minimum in-service eyesight standards
                                for seafarers</div>
                            <table width="100%" cellspacing="0" cellpadding="5"  class="brdTable tb-fontLarge">
                                <tbody>
                                    <tr>
                                        <td rowspan="2">
                                            STCW Convention regulation
                                        </td>
                                        <td rowspan="2">Category of seafarer</td>
                                        <td colspan="2">Distance vision aided</td>
                                        <td colspan="2">Near/immediate vision</td>
                                        <td rowspan="2">Colour vision</td>
                                        <td rowspan="2">Visual fields</td>
                                        <td rowspan="2">Night Blindness</td>
                                        <td rowspan="2">Diplopia (double vision)</td>
                                    </tr>
                                    <tr>
                                        <td>One Eye</td>
                                        <td>Other Eye</td>
                                        <td colspan="2">Both Eyes together, aided or unaided</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I/11 <br> II/1 <br> II/2 <br> II/3 <br> II/4 <br> II/5 <br> VII/2
                                        </td>
                                        <td>Masters, deck officers and ratings required to undertake look out duties
                                        </td>
                                        <td>0.5</td>
                                        <td>0.5</td>
                                        <td colspan="2">Vision required for ships navigation (e.g, chart and nautical
                                            publication reference, use of bridge instrumentation and equipment, and
                                            identification of aids to navigation)</td>
                                        <td>See Note 6</td>
                                        <td>Normal Visual fields</td>
                                        <td>Vision required to perform all necessary functions in darkness without
                                            compromise</td>
                                        <td>No significant condition evident</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I/11 <br> II/1 <br> II/2 <br> II/3 <br> II/4 <br> II/5 <br> VII/2
                                        </td>
                                        <td>All engineer officers, electro-technical officers, electro-technical ratings
                                            and ratings or others forming part of an engine room watch</td>
                                        <td>0.5</td>
                                        <td>0.5</td>
                                        <td colspan="2">Vision required to read instruments in close proximitry, to
                                            operate equipment, and to identify systems/ components as necessary</td>
                                        <td>See Note 7</td>
                                        <td>Sufficient visual fields </td>
                                        <td>Vision required to perform all necessary functions in darkness without
                                            compromise</td>
                                        <td>No significant condition evident</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I/11 <br> VII/2
                                        </td>
                                        <td>GMDSS Radio operators</td>
                                        <td>0.5</td>
                                        <td>0.5</td>
                                        <td colspan="2">Vision required to read instruments in close proximitry, to
                                            operate equipment, and to identify systems/ components as necessary</td>
                                        <td>See Note 7</td>
                                        <td>Sufficient visual fields </td>
                                        <td>Vision required to perform all necessary functions in darkness without
                                            compromise</td>
                                        <td>No significant condition evident</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div style="margin-top: 0.5rem;">
                                Notes <br>
                                <ol>
                                    <li>Values given in Snellen decimal notation.</li>
                                    <li>A value of at least 0.7 in one eye is recommended to reduce the risk of
                                        undetected underlying eye disease.</li>
                                    <li>As defined in the International Recommendations for colour Vision Requirments
                                        for Transport
                                        by the Commision International de I Eclariage(CTE-143-2001 including any
                                        subsequent versions.)</li>
                                    <li>Subject to assessment by a clinical vision specialist where indicated by initial
                                        examination findings</li>
                                    <li>Engine department personnel shall have combined eyesight vision of at least 0.4
                                    </li>
                                    <li>CTE colour vision standard 1 or 2</li>
                                    <li>CTE colour vision standard 1, 2 or 3</li>
                                </ol>
                            </div>
                        </div>
                        <table width="100%" cellspacing="6" cellpadding="5" style="margin-top: 1rem;" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        Form TM/MSD/SCU 010 Issue 3
                                    </td>
                                    <td width="50%">
                                        Transport Malta is the Authority for Transport in Malta set up by ACT XV of 2009
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <b>Page 4 of 4</b> <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
