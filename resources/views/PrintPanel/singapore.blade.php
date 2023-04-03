<html>

<head>
    <title>SINGAPORE FLAG</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <!--<link href="dist/css/eureka-print.css?v=1650507345" rel="stylesheet" type="text/css" />-->
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 13px;
    }

    .fontBoldLrg {
        font: bold 13px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }
    @page {
        size: A4;
    }
    </style>
</head>

<body>
    <table width="100%" cellpadding="2" cellspacing="0" class="brdNone">
        <tbody>
            <tr>
                <td align="right" >ANNEX B</td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="20%">
                                    <img width="100" src="../../../app-assets/images/logo/mpa-logo.png">
                                </td>
                                <td align="center">
                                    <span style="font-size: 16px; font-weight: 600;">MARITIME AND PORT AUTHORITY OF SINGAPORE <br>
                                    SHIPPING DIVISION</span> <br><br>
                                    <span style="font-size: 16px; font-weight: 600;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARER</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Part A – to be completed by the Seafarer who is responsible for answering each question accurately.
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" class="brdTable">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    Seafarer's Name: (Last, First, Middle) <br>
                                    <span class="fontBoldLrg">{{$admission->patient->lastname}} {{$admission->patient->firstname}} {{$admission->patient->middlename}}</span>
                                </td>
                                <td>
                                    Gender <br>
                                    <span style="text-decoration: {{$admission->patient->gender == 'Male' ? 'underline' : null}}">Male</span> / <span style="text-decoration: {{$admission->patient->gender == 'Female' ? 'underline' : null}}">Female</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Date of Birth: day/month/year <br>
                                    <span class="fontBoldLrg">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span>
                                </td>
                                <td>Place of Birth: <br>
                                    <span class="fontBoldLrg">{{$admission->patient->patientinfo->birthplace}}</span>
                                </td>
                                <td>
                                    Nationality <br>
                                    <span class="fontBoldLrg">{{$admission->patient->patientinfo->nationality}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Type of ID documents: NRIC No / Passport No: <br>
                                    <span>{{$admission->patient->patientinfo->passportno}}</span>
                                </td>
                                <td>Dept: <span style="text-decoration: {{$admission->category == 'DECK SERVICES' ? 'underline' : null}}">Deck</span> /
                                        <span style="text-decoration: {{$admission->category == 'ENGINE SERVICES' ? 'underline' : null}}">Engine</span> /
                                        <span style="text-decoration: {{$admission->category == 'CATERING SERVICES' ? 'underline' : null}}">Catering</span> /
                                        <span style="text-decoration: {{$admission->category == 'OTHER SERVICES' ? 'underline' : null}}">Others</span> <br>
                                    Rank: <span>{{$admission->position}}</span>
                                </td>
                                <td>
                                    Type of ship : <br>
                                    <span>TANKER</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Home Address:<br>
                                    <span class="fontMed">{{$admission->patient->patientinfo->address}}</span>
                                </td>
                                <td>Routine and emergency duties:<br>
                                    Rank: <span></span>
                                </td>
                                <td>
                                    Trading area: e.g <span>coastal</span> <br> / <span>world wide</span> <br>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="10">Seafarer’s Declarations <span class="s20">(please tick)</span></td>
            </tr>
            <tr>
                <td height="10"> Have you ever had any of the following conditions?</td>
            </tr>
            <tr>
                <td>
                    <table cellspacing="5" cellpadding="2" width="100%">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <table width="100%" cellpadding="5" cellspacing="0" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td><b>Yes</b></td>
                                                <td><b>No</b></td>
                                            </tr>
                                            <tr>
                                                <td>1. Eye/vision problem</td>
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
                                                <td>2. High blood pressure</td>
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
                                                <td>3. Heart/vascular disease</td>
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
                                                <td>4. Heart surgery</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5. Varicose veins</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6. Asthma/bronchitis</td>
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
                                                <td>7. Blood disorder</td>
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
                                                <td>8. Diabetes</td>
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
                                                <td>9. Thyroid problem</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10. Digestive disorder</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11. Kidney problem</td>
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
                                                <td>12. Skin problem</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>13. Allergies</td>
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
                                                <td>14. Infectious/contagious diseases</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>15. Hernia</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>16. Genital disorders</td>
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
                                                <td>17. Pregnancy</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table width="100%" cellpadding="5" cellspacing="0" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td><b>Yes</b></td>
                                                <td><b>No</b></td>
                                            </tr>
                                            <tr>
                                                <td>18. Sleeping problems</td>
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
                                                <td>19. Do you smoke?</td>
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
                                                <td>20. Operation/surgery</td>
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
                                                <td>21. Epilepsy/seizures</td>
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
                                                <td>22. Dizziness/fainting</td>
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
                                                <td>23. Loss of consciousness</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>24. Psychiatric problems</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>25. Depression</td>
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
                                                <td>26. Attempted suicide</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>27. Loss of memory</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>28. Balance problem</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>29. Severe headaches</td>
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
                                                <td>30. Ear/nose/throat problems</td>
                                                <td>
                                                    @if($admission->exam_physical)
                                                    @if($admission->exam_physical->sick9 == "Yes" || $admission->exam_physical->sick9 == "1")
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
                                                    @if($admission->exam_physical->sick9 == "No" || $admission->exam_physical->sick9 == "0")
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
                                                <td>31. Restricted mobility</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>32. Back problems</td>
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
                                                <td>33. Amputation</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                </td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>34. Fractures/dislocations</td>
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
                <td>
                    <table width="100%" cellspacing="5" cellpadding="2">
                        <tbody>
                            <tr>
                                <td valign="top" style="border: 1px double black;" height="65">
                                    If you answer “yes” to any of the above questions, please provide details: <br>
                                    @if($admission->exam_physical) @php echo nl2br($admission->exam_physical->specify) @endphp @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td >
                    <b>Additional questions</b>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" class="brdTable">
                        <tbody>
                            <tr>
                                <td>
                                    35. Have you ever been signed off as sick or repatriated from a ship?
                                </td>
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
                                <td>
                                    36. Have you ever been hospitalized?
                                </td>
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
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" style="margin-top: 0.5rem;">
                        <tbody>
                            <tr>
                                <td width="50%" style="font-size: 8px;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARERS – March 2020</td>
                                <td width="50%">Page 1 of 5</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="40">&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" class="brdTable" style="margin-top: 0.5rem;">
                        <tbody>
                            <tr>
                                <td>
                                   37. Have you ever been declared unfit for sea duty?
                                </td>
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
                                <td>
                                    38. Has your medical certificate even been restricted or revoked?
                                </td>
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
                                <td>
                                    39. Are you aware that you have any medical problems, diseases or illnesses?
                                </td>
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
                                <td>
                                    40. Do you feel healthy and fit to perform the duties of your designated position/occupation?
                                </td>
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
                                <td>
                                    41. Are you allergic to any medication?
                                </td>
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
                            <tr>
                                <td>
                                    42. Are you using any non-prescription or prescription medication?
                                </td>
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
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" style="margin-top: 1.7rem;">
                        <tbody>
                            <tr>
                                <td valign="top" style="border: 1px double black;" height="80">
                                    If you answer “yes”, please list the medications taken, the purpose(s) and the dosage: <br>
                                    <span>@if($admission->exam_physical){{$admission->exam_physical->purpose}}@endif</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="50">
                    I hereby declare that the personal declaration above is a true statement to the best of my knowledge.
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 25rem;">
                        <tbody>
                            <tr>
                                <td>
                                    <div style="width: 100%; display: flex; align-items: flex-end; justify-content: space-around; margin: 1.5rem 0rem;">
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 200px; display: flex; justify-content: center;">
                                               {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}
                                            </div>
                                            <div class="s3" style="text-align: center">Date</div>
                                        </div>
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 200px; text-align: center;">
                                                @if($admission->agency_id != 19)
                                                    @if($admission->patient->patient_signature)
                                                        <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="150"  class="signature-taken" />
                                                    @elseif ($admission->signature)
                                                        <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="150"  class="signature-taken"/>
                                                    @else
                                                        <div style="width: 150px;height: 40px;"></div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="s3" style="text-align: center">Signature of Seafarer</div>
                                        </div>
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 200px; text-align: center;">REX A. GAID</div>
                                            <div class="s3" style="text-align: center">Name and Signature of Witness</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    I hereby authorize the release of all my previous medical records (including my last Seafarer Medical
                                    Certificate) from any health professional, health institutions and public authorities to Dr. <span style="border-bottom: 1px solid black;">Teresita f. Gonzales M.D.</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="width: 100%; display: flex; align-items: flex-end; justify-content: space-around; margin: 1.5rem 0rem;">
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 200px; display: flex; justify-content: center;">
                                                {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}
                                            </div>
                                            <div class="s3" style="text-align: center">Date</div>
                                        </div>
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 200px; text-align: center;">
                                                @if($admission->agency_id != 19)
                                                    @if($admission->patient->patient_signature)
                                                        <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="150"  class="signature-taken" />
                                                    @elseif ($admission->patient->signature)
                                                        <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="150"  class="signature-taken"/>
                                                    @else
                                                        <div style="width: 150px;height: 40px;"></div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="s3" style="text-align: center">Signature of Seafarer</div>
                                        </div>
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 200px; text-align: center;">REX A. GAID</div>
                                            <div class="s3" style="text-align: center">Name and Signature of Witness</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" style="margin-top: 0.8rem;">
                        <tbody>
                            <tr>
                                <td width="50%" style="font-size: 8px;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARERS – March 2020</td>
                                <td width="50%">Page 2 of 5</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="5">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="7" cellspacing="0" >
                        <tbody>
                            <tr>
                                <td>Part B – Result of medical examinations</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Eyesight</b> <br>
                                    Use of glasses or contact lenses
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="5" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="6">
                                                    <img class="checkbox" src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    No
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%">
                                                    <img class="checkbox" src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    Yes
                                                </td>
                                                <td width="35%">
                                                    Type <span style="border-bottom: 1px solid black;">
                                                        <input type="text" class="brdNone" style="border-bottom: 1px solid black !important;" width="200" value="">
                                                    </span>
                                                </td>
                                                <td width="35%">
                                                    Purpose <span style="border-bottom: 1px solid black;">
                                                        <input type="text" class="brdNone" style="border-bottom: 1px solid black !important;" width="200">
                                                    </span>
                                                </td>
                                                <td width="20%">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                    <table width="100%" cellpadding="7" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Visual Acuity</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="5" cellpadding="5" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td align="center" width="50%" colspan="3">
                                                    <b>Unaided</b>
                                                </td>
                                                <td align="center" width="50%" colspan="3">
                                                    <b>Aided</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Right eye</td>
                                                <td>Left eye</td>
                                                <td>Binocular</td>
                                                <td>Right eye</td>
                                                <td>Left eye</td>
                                                <td>Binocular</td>
                                            </tr>
                                            <tr>
                                                <td>Distant: <span>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->ufvod}}
                                                    @endif
                                                </span></td>
                                                <td>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->ufvos}}
                                                    @endif
                                                </td>
                                                <td>&nbsp;&nbsp;</td>
                                                <td>Distant: <span>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->cfvod}}
                                                    @endif
                                                </span></td>
                                                <td>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->cfvos}}
                                                    @endif
                                                </td>
                                                <td>&nbsp;&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>Near: <span>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->unvodj}}
                                                    @endif
                                                </span></td>
                                                <td>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->unvosj}}
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td>Near: <span>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->cnvodj}}
                                                    @endif
                                                </span></td>
                                                <td>
                                                    @if($admission->exam_visacuity)
                                                        {{$admission->exam_visacuity->cnvosj}}
                                                    @endif
                                                </td>
                                                <td>&nbsp;&nbsp;</td>
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
                    <table width="100%" cellspacing="7" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                   <b>Visual Fields</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="70%" cellspacing="5" cellpadding="5" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td>Normal</td>
                                                <td>Defective</td>
                                            </tr>
                                            @if($admission->exam_visacuity)
                                                @if($admission->exam_visacuity->remarks_status == 'normal')
                                                    <tr>
                                                        <td>Right Eye</td>
                                                        <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        <td>&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Left Eye</td>
                                                        <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        <td>&nbsp;&nbsp;</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>Right Eye</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Left Eye</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                    </tr>
                                                @endif
                                            @else
                                                <tr>
                                                    <td>Right Eye</td>
                                                    <td>&nbsp;&nbsp;</td>
                                                    <td>&nbsp;&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>Left Eye</td>
                                                    <td>&nbsp;&nbsp;</td>
                                                    <td>&nbsp;&nbsp;</td>
                                                </tr>
                                            @endif

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
                    <table width="100%" cellpadding="7" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="10">
                                    Colour Vision (please tick)
                                </td>
                            </tr>
                            <tr>
                                <td width="15%">
                                    @if($admission->exam_ishihara)
                                        @if($admission->exam_ishihara->result == "")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    Not tested
                                </td>
                                <td width="5%"></td>
                                <td width="13%">
                                    @if($admission->exam_ishihara)
                                        @if($admission->exam_ishihara->result == "Adequate")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                     Normal
                                </td>
                                <td width="5%"></td>
                                <td width="13%">
                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10"> Doubtful
                                </td>
                                <td width="5%"></td>
                                <td width="15%">
                                    @if($admission->exam_ishihara)
                                        @if($admission->exam_ishihara->result == "Defective")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    Defective
                                </td>
                                <td width"29%"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="7" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Hearing</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="70%" cellpadding="5" cellspacing="5" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td colspan="5" align="center">
                                                    <b>Pure tone and audiometry (threshold values in dB)</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td align="center">500 Hz</td>
                                                <td align="center">1000 Hz</td>
                                                <td align="center">2,000 Hz</td>
                                                <td align="center">3,000 Hz</td>
                                            </tr>
                                            <tr>
                                                <td align="center">Right Ear</td>
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
                                            </tr>
                                            <tr>
                                                <td align="center">Left Ear</td>
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
                    <table width="100%" cellspacing="7" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                   <b>Speech and whisper test (metres)</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="70%" cellspacing="5" cellpadding="5" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td>Normal</td>
                                                <td>Defective</td>
                                            </tr>
                                            <tr>
                                                <td>Right Eye</td>
                                                <td>
                                                    @if($admission->exam_audio)
                                                        @if($admission->exam_audio->remarks_status == "normal")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_audio)
                                                        @if($admission->exam_audio->remarks_status == "findings")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Left Eye</td>
                                                <td>
                                                    @if($admission->exam_audio)
                                                        @if($admission->exam_audio->remarks_status == "normal")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_audio)
                                                        @if($admission->exam_audio->remarks_status == "findings")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @endif
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
                <td>
                    <table width="100%" cellspacing="9" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Clinical Findings</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="90%" cellpadding="5" cellspacing="0" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td width="25%">
                                                    Height (cm)
                                                </td>
                                                <td align="center" width="25%">
                                                    @if($admission->exam_physical)
                                                        {{$admission->exam_physical->height}} (cm)
                                                    @endif
                                                </td>
                                                <td width="25%" >
                                                    Weight (kg)
                                                </td width="25%">
                                                <td align="center">
                                                    @if($admission->exam_physical)
                                                        {{$admission->exam_physical->weight}} (kg)
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pulse rate (per minute)
                                                </td>
                                                <td align="center">
                                                    @if($admission->exam_physical)
                                                        {{$admission->exam_physical->pulse}} (/minute)
                                                    @endif
                                                </td>
                                                <td>
                                                    Rhythm
                                                </td>
                                                <td align="center">
                                                    @if($admission->exam_physical)
                                                        {{$admission->exam_physical->rhythm}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Blood Pressure Systolic (mm Hg)
                                                </td>
                                                <td align="center">
                                                    @if($admission->exam_physical)
                                                        {{$admission->exam_physical->systollic}}
                                                    @endif
                                                </td>
                                                <td>
                                                    Diastolic (mm Hg)
                                                </td>
                                                <td align="center">
                                                    @if($admission->exam_physical)
                                                        {{$admission->exam_physical->diastollic}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                   Urinalysis: <span>
                                                       Normal
                                                   </span>
                                                </td>
                                                <td>Glucose: <span>Normal</span></td>
                                                <td>
                                                    Protein: <span>Normal</span>
                                                </td>
                                                <td>Blood: <span>Normal</span></td>
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
                    <table width="60%" cellpadding="2" cellpadding="3"  style=";" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="80%">&nbsp;&nbsp;</td>
                                <td width="10%">Normal</td>
                                <td width="10%">Abnormal</td>
                            </tr>
                            <tr>
                                <td>Head</td>
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
                                <td>Sinus, nose, throat</td>
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
                                <td>Mouth/teeth</td>
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
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" style="margin-top: 0.5rem;">
                        <tbody>
                            <tr>
                                <td width="50%" style="font-size: 8px;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARERS – March 2020</td>
                                <td width="50%">Page 3 of 5</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="font-size: 8px;">&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td style="font-size: 8px;">&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="60%" cellpadding="2" cellpadding="2" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="80%">&nbsp;&nbsp;</td>
                                <td align="center" width="10%">Normal</td>
                                <td align="center" width="10%">Abnormal</td>
                            </tr>
                            <tr>
                                <td>Ears (general)</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Tympanic membrane</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Eyes</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Ophthalmoscopy</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Pupils</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Eye movement</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Lungs and chest</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Breast examination</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Heart</td>
                                <td align="center">
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
                                <td align="center">
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
                            <tr>
                                <td>Skin</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Varicose Vein</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Vascular (inc. pedal pulse)</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Abdomen and viscera</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Hernia</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Anus (not rectal exam)</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>G-U system</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Upper and lower extremities</td>
                                <td align="center">
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
                                <td align="center">
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
                                <td>Spine (C/s, T/S, L/S)</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Neurologic (full/brief)</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>Psychiatric</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td>General appearance</td>
                                <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="5" cellspacing="0" style="margin-top: 1rem;">
                        <tbody>
                            <tr>
                                <td>
                                    <div><b>Chest X-ray</b></div>
                                    <div style="width: 100%; display: flex; align-items: flex-start; justify-content: space-between; margin-top: 1rem;">
                                        <div>
                                            <span style="font-size: 15px;">
                                                @if(!$admission->exam_xray)
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                @endif
                                            </span>
                                            Not performed
                                        </div>
                                        <div>
                                            <div>
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_xray)
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </span>
                                                Performed on:
                                                @if($admission->exam_xray)
                                                    {{$admission->exam_xray ? date_format(new DateTime($admission->exam_xray->trans_date), "d F Y") : null}}
                                                @endif
                                            </div>
                                            Result <span style="border-bottom: 1px solid black;">
                                                @if($admission->exam_physical)
                                                    {{$admission->exam_physical->chest == 'normal' ? 'NORMAL' : $admission->exam_physical->xray_findings}}
                                                @endif
                                            </span>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div>&nbsp;</div>
                                        <div>&nbsp;</div>
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0" style="margin: 1rem 0 1.5rem 0">
                        <tbody>
                            <tr>
                                <td>Other diagnostic test/s and results: <br>
                                    {{$admission->exam_ecg ? $admission->exam_ecg->ecg : null}}
                                    <div style="height: 100%; display: flex; align-items: center; justify-content: space-between; padding: 1rem 2rem 0rem 2rem;">
                                        <div style="width: 50%">Test <span>ECG</span></div>
                                        <div style="width: 50%">Result: <span>
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->ecg == 'normal' ? 'NORMAL' : $admission->exam_physical->ecg_findings}}
                                            @endif
                                        </span></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="top" style="border: 1px solid black;" height="90">
                    Medical practitioner’s comments and assessment of fitness, with reasons for any limitations. <br>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0" style="margin: 1rem 0">
                        <tbody>
                            <tr>
                                <td><b>Assessment of fitness for service at sea (please tick)</b></td>
                            </tr>
                            <tr>
                                <td>On the basis of the seafarer’s personal declaration, my clinical examination and diagnostic test
                                    results recorded above, I declare the seafarer medically:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="5" cellspacing="5">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->duty == "Fit")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                    Fit for look out duty
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
                                                    Unfit for lookout duty
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    Visual aid required
                                                </td>
                                                <td>
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    Visual aid not required
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
                    <table width="70%" cellpadding="5" cellspacing="5" style="margin-bottom: 1rem;" class="brdTable">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Deck Service</td>
                                <td>Engine Service</td>
                                <td>Catering Service</td>
                                <td>Other Service</td>
                            </tr>
                            <tr>
                                <td>Fit</td>
                                <td style="font-size:15px;"><b>
                                         {{$admission->category == "DECK SERVICES" && optional($admission->exam_physical)->fit == "Fit" ? '☑' : '☐'}}
                                    </b></td>
                                <td style="font-size:15px;"><b>
                                        {{$admission->category == "ENGINE SERVICES" && optional($admission->exam_physical)->fit == "Fit" ? '☑' : '☐'}}
                                    </b></td>
                                <td style="font-size:15px;"><b>
                                        {{$admission->category == "CATERING SERVICES" && optional($admission->exam_physical)->fit == "Fit" ? '☑' : '☐'}}
                                    </b></td>
                                <td style="font-size:15px;"><b>
                                        {{$admission->category == "OTHER SERVICES" && optional($admission->exam_physical)->fit == "Fit" ? '☑' : '☐'}}
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Unfit</td>
                                <td  style="font-size:15px;"><b>
                                         {{$admission->category == "DECK SERVICES" && optional($admission->exam_physical)->fit == "Unfit" ? '☑' : '☐'}}
                                    </b></td>
                                <td  style="font-size:15px;"><b>
                                        {{$admission->category == "ENGINE SERVICES" && optional($admission->exam_physical)->fit == "Unfit" ? '☑' : '☐'}}
                                    </b></td>
                                <td  style="font-size:15px;"><b>
                                        {{$admission->category == "CATERING SERVICES" && optional($admission->exam_physical)->fit == "Unfit" ? '☑' : '☐'}}
                                    </b></td>
                                <td  style="font-size:15px;"><b>
                                        {{$admission->category == "OTHER SERVICES" && optional($admission->exam_physical)->fit == "Unfit" ? '☑' : '☐'}}
                                    </b></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2" >
                        <tbody>
                            <tr>
                                <td width="50%" style="font-size: 8px;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARERS – March 2020</td>
                                <td width="50%">Page 4 of 5</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="40">&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="5" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="5" cellspacing="5">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->restriction == "without restriction")
                                                             <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                             <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                    Without restrictions
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->restriction == "with restriction")
                                                             <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                             <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                    With restrictions
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
                <td valign="top" style="border: 1px solid black;" height="80">
                    Description of restrictions (e.g. specific position, type of ship, trading area etc.) <br>
                    <span>@if($admission->exam_physical) {{nl2br($admission->exam_physical->describe_restriction)}} @endif</span>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 42rem;">
                        <tbody>
                            <tr>
                                <td>
                                    <div style="width: 100%; display: flex; align-items: flex-end; justify-content: space-around; margin: 1.5rem 0rem;">
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 150px; display: flex; justify-content: center;">
                                                {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}
                                            </div>
                                            <div class="s3" style="text-align: center">Date</div>
                                        </div>
                                        <div>
                                            <div style="width: 150px; text-align: center;">&nbsp;&nbsp;&nbsp;</div>
                                            <div class="s3" style="text-align: center; border-top: 1px solid black; ">Signature of Medical Practioner</div>
                                        </div>
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 300px; text-align: left;">
                                                Dr. Teresita F. Gonzales M.D. <br>
                                                Lic. No. 0055997 <br>
                                                MERITA DIAGNOSTIC CLINIC INC. <br>
                                                5th Flr. Jettac Building #920 Pres. Quirino Ave. <br>
                                                corner San Antonio St, Malate Manila
                                            </div>
                                            <div class="s3" style="text-align: center">Medical Practitioner’s name, licence number, address</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2">
                        <tbody>
                            <tr>
                                <td width="50%" style="font-size: 8px;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARERS – March 2020</td>
                                <td width="50%">Page 5 of 5</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="48">
                    &nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="5" cellspacing="0">
                        <tbody>
                            <tr>
                                <td align="right" >ANNEX C</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" >
                                        <tbody>
                                            <tr>
                                                <td width="20%">
                                                    <img width="100" src="../../../app-assets/images/logo/mpa-logo.png">
                                                </td>
                                                <td align="center">
                                                    <span style="font-size: 16px; font-weight: 600;">MARITIME AND PORT AUTHORITY OF SINGAPORE <br>
                                                    SHIPPING DIVISION</span> <br><br>
                                                    <span style="font-size: 16px; font-weight: 600;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARER</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    This certificate is issued by the undersigned recognized medical practitioner to the named seafarer on behalf of the
                                    Maritime and Port Authority of Singapore and meets both the requirements of the International Convention on Standards
                                    of Trainings, Certification and Watchkeeping for Seafarers, 1978, as amended (STCW Convention) and the Maritime
                                    Labour Convention, 2006.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="2" class="brdTable" style="margin: 1rem 0;">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    Seafarer's Name: (Last, First, Middle) <br>
                                                    <span class="fontBoldLrg">{{$admission->patient->lastname}} {{$admission->patient->firstname}} {{$admission->patient->middlename}}</span>
                                                </td>
                                                <td>
                                                    Gender <br>
                                                    <span style="text-decoration: {{$admission->patient->gender == 'Male' ? 'underline' : null}}">Male</span> / <span style="text-decoration: {{$admission->patient->gender == 'Female' ? 'underline' : null}}">Female</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth: day/month/year <br>
                                                    <span class="fontBoldLrg">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span>
                                                </td>
                                                <td>
                                                    Nationality <br>
                                                    <span class="fontBoldLrg">{{$admission->patient->patientinfo->nationality}}</span>
                                                </td>
                                                <td>Place of Birth: <br>
                                                    <span class="fontBoldLrg">{{$admission->patient->patientinfo->birthplace}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                               <td> Declaration of the recognized medical practitioner:</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="5" cellspacing="5" class="brdTable">
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Identification documents were checked at the point of examination?</td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Hearing meets the standards in STCW Code Section A-I/9?</td>
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
                                                <td>3.</td>
                                                <td>Unaided hearing satisfactory?</td>
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
                                            <tr>
                                                <td>4.</td>
                                                <td>Visual acuity meets the standards in STCW Code Section A-I/9?</td>
                                                <td width="3%" valign="middle">
                                                    @if ($admission->exam_visacuity)
                                                    @if (preg_match('/normal/i', $admission->exam_visacuity->remarks_status))
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif

                                                </td>
                                                <td width="3%" valign="middle">
                                                    @if ($admission->exam_visacuity)
                                                    @if (!preg_match('/normal/i', $admission->exam_visacuity->remarks_status))
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                    @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
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
                                                <td></td>
                                                <td colspan="3">Date of last colour vision test: <span>{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td>Fit for look-out duty?</td>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->duty == "Fit")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->duty == "Unfit")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td>Is the seafarer free from any medical condition likely to be aggravated by service at sea or
                                                    to render the seafarer unfit for such service or endanger the life of person onboard?</td>
                                                <td>
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                </td>
                                                <td>
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8.</td>
                                                <td>No limitations or restrictions on fitness?</td>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->restriction == "without restriction")
                                                             <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                             <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->restriction == "with restriction")
                                                             <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                             <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td height="30" colspan="3">If “no” specify limitations or restrictions: <span>
                                                    {{nl2br(optional($admission->exam_physical)->describe_restriction)}}
                                                </span></td>
                                            </tr>
                                            <tr>
                                                <td>9.</td>
                                                <td height="30" colspan="3">Date of examination: (day/month/year)<span> {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>10.</td>
                                                <td height="30" colspan="3">Expiry of certificate: (day/month/year)<span> {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}</span> <br>
                                                    ** Maximum two years from date of examination unless the seafarer is under the age of 18
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="width: 100%; display: flex; align-items: flex-end; justify-content: space-around; margin: 1.5rem 0rem;">
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 150px; display: flex; justify-content: center;">
                                                {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}
                                            </div>
                                            <div class="s3" style="text-align: center">Date</div>  <br>
                                        </div>
                                        <div>
                                            <div style="width: 150px; text-align: center;">&nbsp;&nbsp;&nbsp;</div>
                                            <div class="s3" style="text-align: center; border-top: 1px solid black;">Signature of Authorised <br> Medical Practioner</div>
                                        </div>
                                        <div>
                                            <div style="border-bottom: 1px solid black; width: 300px; text-align: left;">
                                                Dr. Teresita F. Gonzales M.D. <br>
                                                Lic. No. 0055997 <br>
                                                MERITA DIAGNOSTIC CLINIC INC. <br>
                                                5th Flr. Jettac Building #920 Pres. Quirino Ave. <br>
                                                corner San Antonio St, Malate Manila
                                            </div>
                                            <div class="s3" style="text-align: left">Medical Practitioner’s Official stamp <br>
                                                                                       (name, licence number, address etc)</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    I have been informed of the content of the certificate and of the right to a review.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="border-bottom: 1px solid black;">
                                        @if($admission->agency_id != 19)
                                            @if($admission->patient->patient_signature)
                                                <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="130"  class="signature-taken" />
                                            @elseif ($admission->patient->signature)
                                                <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="130"  class="signature-taken"/>
                                            @else
                                                <div style="width: 150px;height: 40px;"></div>
                                            @endif
                                        @endif
                                    </span> <br>
                                    <span>Signature of Seafarer</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="2">
                        <tbody>
                            <tr>
                                <td width="50%" style="font-size: 8px;">RECORD OF MEDICAL EXAMINATIONS OF SEAFARERS – March 2020</td>
                                <td width="50%">Page 1 of 1</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        let checkbox = document.querySelectorAll('.checkbox');
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
</body>
</html>
