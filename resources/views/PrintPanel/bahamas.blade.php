<html>

<head>
    <title>BAHAMAS</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 15px;
    }

    .fontBoldLrg {
        font: bold 15px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }
    @print {
        @page {
            size: A4;
        }
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="0" cellpadding="5">
            <tbody>
                <tr>
                    <td align="right">
                        Bahamas Maritime Authority
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <b><u>Annex II - Medical Examination Form</u></b> <br>
                                        <span style="color: red; margin: 0.3rem;"><b>CONFIDENTIAL FORM</b></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="9" style="margin-top: 1rem;">
                            <tbody>
                                <tr>
                                    <td>
                                        Pre-sea Exam <span style="margin-right: 2rem;"><img
                                                src="../../../app-assets/images/icoCheck.gif" width="10"></span>
                                        Periodic Exam <span style="margin-right: 2rem;"><img
                                                src="../../../app-assets/images/icoUncheck.gif" width="10"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Name (last, first, middle):
                                            <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">{{ optional($admission->patient)->lastname }}, {{ optional($admission->patient)->firstname }} {{ optional($admission->patient)->middlename }}</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <div style="width: 50%"> Date of birth (day/month/year): <span
                                                    style="margin-left: 0.5rem; border-bottom: 1px solid black;">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span>
                                            </div>
                                            <div style="width: 50%">Sex: <span style="margin-left: 2rem;">
                                                @if(optional($admission->patient)->gender == 'Male')
                                                     <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                     <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                                MALE
                                                <span style="margin-left: 2rem;">
                                                @if(optional($admission->patient)->gender == 'Female')
                                                     <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                     <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                                FEMALE</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nationality <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">{{$admission->patient->patientinfo->nationality}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Home address: <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">{{$admission->patient->patientinfo->address}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Identity document No.: <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;"><span style="margin-left: 0.5rem; border-bottom: 1px solid black;">{{$admission->patient->patientcode}}</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Type of ship (e.g. container, tanker, passenger, fishing): <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">PASSENGER</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trade area (e.g., coastal, tropical, worldwide): <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">WORLDWIDE</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Examinee’s personal declaration</b></td>
                                </tr>
                                <tr>
                                    <td>(Assistance should be offered by medical staff)</td>
                                </tr>
                                <tr>
                                    <td>Have you ever had any of the following conditions:</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="5" >
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="10" >
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
                                                    <td>
                                                        @if($admission->exam_physical)
                                                        @if($admission->exam_physical->sick35 == "Yes" || $admission->exam_physical->sick35 == "1")
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
                                                        @if($admission->exam_physical->sick35 == "No" || $admission->exam_physical->sick35 == "0")
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
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="10" >
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
                                                    <td>
                                                        Do you smoke?
                                                    </td>
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
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" >
                            <tbody>
                                <tr>
                                    <td>
                                        B103 Rev.03 <br>
                                        Contact:
                                    </td>
                                    <td align="center">
                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                    </td>
                                    <td>
                                        <div style="text-align: center;">Page 12 of 22</div>
                                        +44 20 7562 1300
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Bahamas Maritime Authority
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                            <tbody>
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
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                            <tbody>
                                                <tr>
                                                    <td>31. </td>
                                                    <td>Tuberculosis</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->sick10 == "Yes" || $admission->exam_physical->sick10 == "1")
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
                                                            @if($admission->exam_physical->sick10 == "No" || $admission->exam_physical->sick10 == "0")
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
                                                    <td>32. </td>
                                                    <td>Back problems</td>
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->sick34 == "Yes" || $admission->exam_physical->sick34 == "1")
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
                                                        @if($admission->exam_physical->sick34 == "No" || $admission->exam_physical->sick34 == "0")
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
                                                    <td>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->sick36 == "Yes" || $admission->exam_physical->sick36 == "1")
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
                                                            @if($admission->exam_physical->sick36 == "No" || $admission->exam_physical->sick36 == "0")
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
                    <td>
                        <div
                            style="width: 97%; border: 1px double black; margin-top: 1.5rem; padding: 0.5rem; height: 100px;">
                            If any of the above questions were answered “yes,” please give details. <br>
                            <span></span> <br>
                            @if($admission->exam_physical) @php echo nl2br($admission->exam_physical->specify) @endphp @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-bottom: 1.5rem"><b>Additional questions</b></div>
                        <table width="100%" cellspacing="0" cellpadding="12">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><b>Yes</b></td>
                                    <td><b> No</b></td>
                                </tr>
                                <tr>
                                    <td>35. </td>
                                    <td>Have you ever been signed off as sick or repatriated from a ship?</td>
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
                                    <td>36. </td>
                                    <td>Have you ever been hospitalized?</td>
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
                                    <td>37. </td>
                                    <td>Have you ever been declared unfit for sea duty?</td>
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
                                    <td>38. </td>
                                    <td>Has your medical certificate ever been restricted or revoked?</td>
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
                                    <td>39. </td>
                                    <td>Are you aware that you have any medical problems, diseases or illnesses?</td>
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
                                    <td>40. </td>
                                    <td>Do you feel healthy and fit to perform the duties of your designated
                                        position/occupation?</td>
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
                                    <td>41. </td>
                                    <td>Are you allergic to any medications?</td>
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
                                    <td colspan="4">
                                        <div
                                            style="width: 100%; border: 1px double black; margin-top: 2rem; padding: 0.5rem; height: 80px;">
                                            <b>Comments</b><br>
                                                @if($admission->exam_physical)
                                                    @php echo nl2br($admission->exam_physical->comments) @endphp
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>42. </td>
                                    <td>Are you taking any non-prescription or prescription medications?</td>
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
                                <tr>
                                    <td colspan="10">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style=" margin-top: 2.7rem; margin-bottom: 1rem;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        B103 Rev.03 <br>
                                                        Contact:
                                                    </td>
                                                    <td align="center">
                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                    </td>

                                                    <td>
                                                        <div style="text-align: center;">Page 13 of 22</div>
                                                        +44 20 7562 1300
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">
                                        Bahamas Maritime Authority
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div
                                            style="width: 100%; border: 1px double black; margin-top: 1rem; padding: 0.5rem; height: 80px;">
                                            <b>If yes, please list the medications taken and the purpose(s) and
                                                dosage(s).</b><br>
                                                @if($admission->exam_physical)
                                                    @php echo nl2br($admission->exam_physical->purpose)@endphp
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" height="80">I hereby certify that the personal declaration above is
                                        a true statement to the best of my knowledge.</td>
                                </tr>
                                <tr>
                                    <td colspan="4"  height="80">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td width="25%">
                                                        Signature of examinee:
                                                    </td>
                                                    <td  width="15%" style="border-bottom: 1px solid black; padding: 0 1.5rem; position: relative;">
                                                        @if($admission->agency_id != 19)
                                                            @if(optional($admission->patient)->patient_signature)
                                                                <img src="@php echo base64_decode(optional($admission->patient)->patient_signature) @endphp" width="170%"/>
                                                            @elseif (optional($admission->patient)->signature)
                                                                <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="170%"/>
                                                            @else
                                                                <div style="width: 150%;height: 40px; position: absolute; top: -30px; left: 0px;"></div>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td width="2%"></td>
                                                    <td  width="25%" style="margin-left: 1rem;">
                                                        Date (day/month/year):
                                                    </td>
                                                    <td valign="bottom" width="23%" style="border-bottom: 1px solid black;">{{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->trans_date), "d F Y") : null }}</td>
                                                    <td  width="10%"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"  height="80">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td width="25%" valign="bottom" style="font-size: 13px;">
                                                        Witnessed by: (Signature):
                                                    </td>
                                                    <td  width="15%" style="border-bottom: 1px solid black; padding: 0 1.5rem;">
                                                        @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                                                            <img src="../../../app-assets/images/signatures/rex_bahamas_signature.png" width="76" height="60" style="object-fit: cover; object-position: top;" />
                                                        @endif
                                                    </td>
                                                    <td  width="1%"></td>
                                                    <td  width="25%" valign="bottom">Name: (Typed or printed)</td>
                                                    <td  width="23%" valign="bottom" style="border-bottom: 1px solid black; padding: 0 1.5rem;">REX A. GAID</td>
                                                    <td  width="10%"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" height="80">I hereby authorize the release of all my previous
                                        medical records from any health professionals,
                                        health institutions and public authorities to Dr. <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>(the
                                        approved medical practitioner carrying out the medical examinations).</td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td width="25%">
                                                        Signature of examinee:
                                                    </td>
                                                    <td  width="15%" style="border-bottom: 1px solid black; padding: 0 1.5rem; position: relative;">
                                                        @if($admission->agency_id != 19)
                                                            @if(optional($admission->patient)->patient_signature)
                                                                <img src="@php echo base64_decode(optional($admission->patient)->patient_signature) @endphp" width="170%"/>
                                                            @elseif (optional($admission->patient)->signature)
                                                                <img src="data:image/jpeg;base64,{{ $admission->signature }}" width="170%"/>
                                                            @else
                                                                <div style="width: 150%;height: 40px; position: absolute; top: -30px; left: 0px;"></div>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td width="2%"></td>
                                                    <td  width="25%">
                                                        Date (day/month/year):
                                                    </td>
                                                    <td valign="bottom" width="23%" style="border-bottom: 1px solid black;">{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->trans_date), "d F Y") : null}}</td>
                                                    <td  width="10%"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="2" height="40" style="margin-bottom: 21rem;">
                                            <tbody>
                                                <tr>
                                                    <td width="25%" style="font-size: 13px;" valign="bottom">
                                                        Witnessed by: (Signature):
                                                    </td>
                                                    <td  width="15%" style="border-bottom: 1px solid black; position: relative;">
                                                        @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                                                            <img src="../../../app-assets/images/signatures/md_gonzales_bahamas_sig.png" width="120" height="60" style="object-fit: cover; object-position: center;" />
                                                        @endif
                                                    </td>
                                                    <td width="1%"></td>
                                                    <td  width="25%" valign="bottom">
                                                         Name: (Typed or printed)
                                                    </td>
                                                    <td  width="23%" style="border-bottom: 1px solid black;" valign="bottom">
                                                        @if($medical_director)
                                                            {{$medical_director->firstname}} {{$medical_director->middlename[0]}} {{$medical_director->lastname}}
                                                        @endif
                                                    </td>
                                                    <td  width="10%">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin-bottom: 2.5rem;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        B103 Rev.03 <br>
                                                        Contact:
                                                    </td>
                                                    <td align="center">
                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center;">Page 14 of 22</div>
                                                        +44 20 7562 1300
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
                    <td align="right">
                        Bahamas Maritime Authority
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="10">
                            <tbody>
                                <tr>
                                    <td><b>Medical Examination</b></td>
                                </tr>
                                <tr>
                                    <td><span style="margin-right: 1rem; margin-left: 1rem;">
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10"> Pre-sea
                                        <span style="margin-right: 1rem; margin-left: 2rem;">
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10"> Periodic
                                        <span style="margin-right: 1rem; margin-left: 2rem;">
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10"> Other
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60"><b>Sight</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="5">
                                            <tbody>
                                                <tr>
                                                    <td width="70%">
                                                        <table width="100%" cellspacing="0" cellpadding="10"
                                                            class="brdTable">
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="6">Visual acuity</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="3">Unaided</td>
                                                                    <td colspan="3">Aided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Right eye</td>
                                                                    <td>Left eye</td>
                                                                    <td>Binocular</td>
                                                                    <td>Right eye</td>
                                                                    <td>Left eye</td>
                                                                    <td>Binocular</td>
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
                                                                    <td>
                                                                    </td>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="30%">
                                                        <table width="100%" cellspacing="0" cellpadding="10" class="brdTable">
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">Visual fields</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Normal</td>
                                                                    <td>Defective</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Right Eye</td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Left Eye</td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                                    <td><img src="../../../app-assets/images/icoUncheck.gif"
                                                                            width="10"></td>
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
                                    <td><b>Color Vision:</b>
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
                                    </td>
                                </tr>
                                <tr>
                                    <td height="40"><b>Hearing</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                            <tbody>
                                                <tr>
                                                    <td width="70%">
                                                        <span style="text-align: right;">Pure tone and audio metry
                                                            (threshold values in dB)</span> <br>
                                                        <table width="100%" cellspacing="0" cellpadding="10"
                                                            class="brdTable">
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        500 <br> Hz
                                                                    </td>
                                                                    <td>
                                                                        1,000 <br> Hz
                                                                    </td>
                                                                    <td>
                                                                        2,000 <br> Hz
                                                                    </td>
                                                                    <td>
                                                                        3,000 <br> Hz
                                                                    </td>
                                                                    <td>
                                                                        4,000 <br> Hz
                                                                    </td>
                                                                    <td>
                                                                        6,000 <br> Hz
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Right ear</td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_right2}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_right4}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_right5}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_right6}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_right7}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_right8}}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Left ear</td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_left2}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_left4}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_left5}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_left6}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_left7}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($admission->exam_audio)
                                                                            {{$admission->exam_audio->air_left8}}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="30%">
                                                        Speech and whisper test (metres)
                                                        <table width="100%" cellspacing="0" cellpadding="10"
                                                            class="brdTable">
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Normal</td>
                                                                    <td>Whisper</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Right ear</td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Left ear</td>
                                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                                    <td></td>
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
                                    <td height="80">Height:
                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->height}}
                                            @else
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endif
                                        </span>(cm)
                                        <span style="margin-left: 2rem;">Weight:</span> <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;padding: 0 1.5rem;">
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->weight}}
                                            @else
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endif
                                        </span>(kg)
                                    </td>
                                </tr>
                                <tr>
                                    <td height="80">Pulse rate: <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;  padding: 0 1.5rem;">
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->pulse}}
                                            @else
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endif
                                            </span>(/minute)
                                        <span style="margin-left: 2rem;">Rhythm:</span> <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;  padding: 0 1.5rem;">
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->rhythm}}
                                            @else
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endif
                                            </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="80">Blood pressure: Systolic <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">
                                        @if($admission->exam_physical)
                                                {{$admission->exam_physical->systollic}}
                                        @else
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endif
                                        </span>(mm
                                        Hg) <span style="margin-left: 2rem;">Diastolic:</span> <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">
                                        @if($admission->exam_physical)
                                                {{$admission->exam_physical->diastollic}}
                                        @else
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endif
                                        </span>(mm
                                        Hg)</td>
                                </tr>
                                <tr colspan="10">
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 2rem 0;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        B103 Rev.03 <br>
                                                        Contact:
                                                    </td>
                                                    <td align="center">
                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center;">Page 15 of 22</div>
                                                        +44 20 7562 1300
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">
                                        Bahamas Maritime Authority
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50">Urinalysis:
                                            <span style="margin-right: 4rem;">
                                                @if($admission->exam_urin)
                                                    @php echo nl2br($admission->exam_urin->remarks) @endphp
                                                @endif
                                            </span>
                                                    Glucose: <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">Normal</span>
                                        <span style="margin-left: 2rem;">Protein:</span> <span style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">
                                        @if($admission->exam_urin)
                                                {{$admission->exam_urin->albumin}}
                                        @else
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <table width="100%" cellspacing="0" cellpadding="5" >
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td><b>Normal</b></td>
                                                    <td><b>Abnormal</b></td>
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
                                                    <td>Sinuses, nose, throat</td>
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
                                                <tr>
                                                    <td>Ears (general)</td>
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
                                                    <td>Tympanic membrane</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Eyes</td>
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
                                                    <td>Opthalmoscopy</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pupils</td>
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
                                                    <td>Eye movement</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lungs and chest</td>
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
                                                    <td>Breast examination</td>
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
                                                    <td>Heart</td>
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
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td><b>Normal</b></td>
                                                    <td><b>Abnormal</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Skin</td>
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
                                                    <td>Varicose veins</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Vascular (inc. pedal pulses)</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Abdomen and viscera</td>
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
                                                    <td>Hernia</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anus (not rectal exam.)</td>
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
                                                    <td>G-U system</td>
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
                                                    <td>Upper and lower extremities</td>
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
                                                    <td>Spine (C/S, T/S and L/S)</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Neurologic (full brief)</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Psychiatric</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>General appearance</td>
                                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                    </td>
                                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="80">
                                        Chest X-ray:
                                        <span style="margin-left: 1rem;">
                                            @if(!$admission->exam_xray)
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                            Not Performed</span>
                                        <span style="margin-left: 1rem;">
                                            @if($admission->exam_xray)
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                            Performed on
                                            (day/month/year):
                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">
                                            @if($admission->exam_xray)
                                                {{date_format(new DateTime($admission->exam_xray->trans_date), "d F Y")}}
                                            @else
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endif
                                        </span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Results: <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black; padding: 0 1.5rem;">
                                            @if($admission->exam_physical)
                                                {{$admission->exam_physical->chest == 'normal' ? 'NORMAL' : $admission->exam_physical->xray_findings}}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr colspan="10">
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 16rem 0 4rem 0;">
                            <tbody>
                                <tr>
                                    <td>
                                        B103 Rev.03 <br>
                                        Contact:
                                    </td>
                                    <td align="center">
                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                    </td>
                                    <td>
                                        <div style="text-align: center;">Page 16 of 22</div>
                                        +44 20 7562 1300
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right">
                        Bahamas Maritime Authority
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="5" cellspacing="10">
                            <tbody>
                                <tr>
                                    <td colspan="2">Other diagnostic test(s) and result(s):</td>
                                </tr>
                                <tr valign="top" height="80">
                                    <td>Test: <span>
                                        ECG
                                    </span></td>
                                    <td>Result: <span>
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->ecg == 'normal' ? 'NORMAL' : $admission->exam_physical->ecg_findings}}
                                        @endif
                                    </span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="120">
                                        <div style="padding: 0.5rem; border: 1px solid black; height: 120px;">
                                            Medical practitioner's comments: <br> <br>
                                            @if($admission->exam_ecg)
                                                @php echo nl2br($admission->exam_ecg->practioner_comment) @endphp
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" height="50" colspan="2">
                                        Vaccination status recorded:
                                        <span style="margin-left: 1rem;">
                                            @if($admission->exam_physical)
                                                @if($admission->exam_physical->sick32 == "Yes" || $admission->exam_physical->sick32 == "1")
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">Yes
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">Yes
                                                @endif
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">Yes
                                            @endif
                                        </span>
                                        <span style="margin-left: 1rem;">
                                            @if($admission->exam_physical)
                                                @if($admission->exam_physical->sick32 == "No" || $admission->exam_physical->sick32 == "0")
                                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">No
                                                @else
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">No
                                                @endif
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">No
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="50"><b>Assessment of fitness for service at sea</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">On the basis of the examinee’s personal declaration, my clinical
                                        examination and the diagnostic test results recorded above, I declare the
                                        examinee medically:</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span style="margin-left: 1rem;">
                                            @if($admission->exam_physical)
                                                @if($admission->exam_physical->duty == "Fit")
                                                     <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                @else
                                                     <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                @endif
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                            @endif
                                            Fit for look-out duty
                                        </span>
                                        <span style="margin-left: 1rem;">
                                            @if($admission->exam_physical)
                                                @if($admission->exam_physical->duty == "Unfit")
                                                     <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                @else
                                                     <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                @endif
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                            @endif
                                            Not Fit for look-out duty
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="5" cellspacing="10">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>Deck service</td>
                                    <td>Engine service</td>
                                    <td>Catering service</td>
                                    <td>Other services</td>
                                </tr>
                                <tr>
                                    <td><b>FIT</b></td>
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
                                    <td><b>UNFIT</b></td>
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
                                <tr>
                                    <td colspan="5" height="100">
                                        Without restrictions
                                        <span>
                                            @if($admission->exam_physical)
                                                @if($admission->exam_physical->restriction == "without restriction")
                                                     <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                @else
                                                     <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                @endif
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                            @endif
                                        </span>
                                        With restrictions
                                        <span>
                                            @if($admission->exam_physical)
                                                @if($admission->exam_physical->restriction == "with restriction")
                                                     <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                @else
                                                     <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                @endif
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div style="padding: 0.5rem; border: 1px solid black; height: 120px;">Describe
                                            restrictions (e.g., specific positions, type of ship, trade area) <br>
                                            @if($admission->exam_physical)
                                                @php echo nl2br($admission->exam_physical->describe_restriction) @endphp
                                            @else

                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 3rem 0;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        B103 Rev.03 <br>
                                                        Contact:
                                                    </td>
                                                    <td align="center">
                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center;">Page 17 of 22</div>
                                                        +44 20 7562 1300
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right">
                                        Bahamas Maritime Authority
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">
                                        Action taken by medical examiner (e.g., referral): <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">
                                        Place of examination: <span
                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">MERITA DIAGNOSTIC CLINIC</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">
                                        Date of examination (day/month/year):
                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black; ">
                                            <input type="text" style="border: none; font-family: serif; border-bottom: 1px solid black;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}" />
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">
                                        Medical certificate’s date of expiration (day/month/year):
                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                            <input type="text" style="border: none; font-family: serif; border-bottom: 1px solid black;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}" />
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" height="100">Official stamp:</td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">Signature of medical practitioner: <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                        @if ($medical_director)
                                            <img width="100" height="40" style="object-fit: cover;" src="{{$medical_director->signature}}">
                                        @endif
                                    </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">Name of medical practitioner: (Typed or printed)
                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                            @if ($medical_director)
                                                {{$medical_director->firstname . " " . $medical_director->middlename[0] . ". " . $medical_director->lastname . ", " . 'M.D'}}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" colspan="5">Authorized by: <b>PROFESSIONAL REGULATION COMMISSION</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 26rem 0 3rem 0;">
                            <tbody>
                                <tr>
                                    <td>
                                        B103 Rev.03 <br>
                                        Contact:
                                    </td>
                                    <td align="center">
                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                    </td>
                                    <td>
                                        <div style="text-align: center;">Page 18 of 22</div>
                                        +44 20 7562 1300
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="right">
                        Bahamas Maritime Authority
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" >
                            <tbody>
                                <tr>
                                    <td align="center"><b><u>Annex III: Draft Format of a Seafarer Medical
                                                Certificate</u></b></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <div
                                            style="margin-top: 1rem; font-size: 19px; font-weight: 700; text-decoration: underline;">
                                            SEAFARER MEDICAL CERTIFICATE</div> (issued under the authority of
                                        authorising country details.)
                                    </td>
                                </tr>
                                <tr>
                                    <td height="100" style="font-style: italic;">This Medical Certificate has been
                                        issued in accordance with the provisions of the( International Convention on
                                        Standards of Training,
                                        Certification and Watch-keeping for Seafarers STCW 1978, as amended (STCW)
                                        Regulation I/9, Maritime Labour Convention 2006
                                        (MLC 2006) Regulation 1.2 and regulation xxx of the authorising country)*as
                                        applicable
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><b><u>SEAFARER INFORMATION</u></b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTable"
                                            style="margin-top: 1rem;">
                                            <tbody>
                                                <tr>
                                                    <td>Surname: <span>{{ $admission->patient->lastname }}</span></td>
                                                    <td colspan="2">Given Name(s): <span>{{ $admission->patient->firstname }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Birth (dd/mm/yyyy): <span>{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</span></td>
                                                    <td>Nationality: <span>{{$admission->patient->patientinfo->nationality}}</span> <br>
                                                        ID Document no: <span style="border-bottom: 1px solid black;">{{$admission->patientcode}}</span>
                                                    </td>
                                                    <td>Gender: <br>
                                                        <span style="text-decoration: {{$admission->patient->gender == 'Male' ? 'underline' : 'none' }}">MALE</span> / <span style="text-decoration: {{$admission->patient->gender == 'Female' ? 'underline' : 'none' }}">FEMALE</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        Capacity that the seafarer will serve onboard serve in:
                                                        <span></span> <br> <br>
                                                        <span class="duty_as" style="margin-left: 1rem;  {{$admission->category == 'DECK SERVICES' ? 'text-decoration: underline; font-weight: 600;' : 'text-decoration: none'}}">Deck</span>
                                                        <span class="duty_as" style="margin-left: 1rem;  {{$admission->category == 'ENGINE SERVICES' ? 'text-decoration: underline; font-weight: 600;' : 'text-decoration: none'}}">Engine</span>
                                                        <span class="duty_as" style="margin-left: 1rem;">GMDSS</span>
                                                        <span class="duty_as" style="margin-left: 1rem;">Rating</span>
                                                        <span class="duty_as" style="margin-left: 1rem; {{$admission->category == 'CATERING SERVICES' ? 'text-decoration: underline; font-weight: 600;' : 'text-decoration: none'}}">Catering</span>
                                                        <span class="duty_as" style="margin-left: 1rem; {{$admission->category == 'OTHER SERVICES' ? 'text-decoration: underline; font-weight: 600;' : 'text-decoration: none'}}">Other</span>
                                                        <span style="border-bottom: 1px solid black; margin-left: 1rem;">{{$admission->position}}</span>
                                                    </td/>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><b><u>DECLARATION OF APPROVED** MEDICAL PRACTITIONER</u></b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="10" class="brdTable"
                                            style="margin-top: 1rem;">
                                            <tbody>
                                                <tr>
                                                    <td>I confirm that identification documents were checked:
                                                        <span class="duty_as">Yes</span> / <span class="duty_as">No</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Does the seafarers hearing meet medical standards*?
                                                            @if($admission->exam_audio)
                                                                <span style="text-decoration: {{$admission->exam_audio->remarks_status == 'normal' ? 'underline' : 'none'}}">Yes</span>
                                                            @else
                                                                <span style="">Yes</span>
                                                            @endif
                                                                /
                                                            @if($admission->exam_audio)
                                                                <span style="text-decoration: {{$admission->exam_audio->remarks_status == 'findings' ? 'underline' : 'none'}}">No</span>
                                                            @else
                                                                <span style="">No</span>
                                                            @endif
                                                        <br> <br>
                                                        Is unaided hearing satisfactory*?
                                                            @if($admission->exam_audio)
                                                                <span style="text-decoration: {{$admission->exam_audio->hearing == 'unaided' ? 'underline' : 'none'}}">Yes</span>
                                                            @else
                                                                <span style="">Yes</span>
                                                            @endif
                                                                /
                                                            @if($admission->exam_audio)
                                                                <span style="text-decoration: {{$admission->exam_audio->hearing == 'aided' ? 'underline' : 'none'}}">No</span>
                                                            @else
                                                                <span style="">No</span>
                                                            @endif
                                                        <br> <br>
                                                        Vision acuity meets medical standards*?
                                                            @if($admission->exam_audio)
                                                                <span style="text-decoration: {{$admission->exam_audio->remarks_status == 'normal' ? 'underline' : 'none'}}">Yes</span>
                                                            @else
                                                                <span style="">Yes</span>
                                                            @endif
                                                                /
                                                            @if($admission->exam_audio)
                                                                <span style="text-decoration: {{$admission->exam_audio->remarks_status == 'findings' ? 'underline' : 'none'}}">No</span>
                                                            @else
                                                                <span style="">No</span>
                                                            @endif
                                                        <br> <br>
                                                        Colour vision meets standard*?
                                                            @if($admission->exam_ishihara)
                                                                <span style="text-decoration: {{$admission->exam_ishihara->remarks_status == 'normal' ? 'underline' : 'none'}}">Yes</span>
                                                            @else
                                                                <span style="">Yes</span>
                                                            @endif
                                                                /
                                                            @if($admission->exam_ishihara)
                                                                <span style="text-decoration: {{$admission->exam_ishihara->remarks_status == 'findings' ? 'underline' : 'none'}}">No</span>
                                                            @else
                                                                <span style="">No</span>
                                                            @endif
                                                        <br> <br>
                                                        Date of last colour vision test? (dd/mm/yyyy) <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                                                {{$admission->exam_ishihara ? date_format(new DateTime($admission->exam_ishihara->trans_date), "d/F/Y") : null}}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Is the seafarer fit for lookout duties: YES/NO/Not applicable
                                                        <br> <b>
                                                        <u>
                                                            @if($admission->exam_physical)
                                                                @if($admission->exam_physical->duty == "Fit")
                                                                    YES
                                                                @else
                                                                    NO
                                                                @endif
                                                            @else
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            @endif
                                                        </u></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Is the seafarer free from any medical condition likely to be
                                                        aggravated by service at sea or render the seafarer unfit for
                                                        such service or to endanger the health of other persons on
                                                        board? YES/NO <br>
                                                        <b><u>YES</u></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Is the seafarer fit for service? YES/ NO <br>
                                                    <b><u>
                                                        @if($admission->exam_physical)
                                                            @if($admission->exam_physical->fit == "Fit")
                                                                YES
                                                            @else
                                                                NO
                                                            @endif
                                                        @else
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        @endif
                                                    </u></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="70" valign="top">Are there any limitations or
                                                        restrictions on fitness? If so specify the limitation. <br>
                                                        @if($admission->exam_physical)
                                                            {{$admission->exam_physical->describe_restriction}}
                                                        @else
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr colspan="10">
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 10.5rem 0 3rem 0;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        B103 Rev.03 <br>
                                                        Contact:
                                                    </td>
                                                    <td align="center">
                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center;">Page 19 of 22</div>
                                                        +44 20 7562 1300
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right">
                                        Bahamas Maritime Authority
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="5" style="margin-top: 1rem;" cellpadding="0" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td>I hereby confirm that the medical examination has been carried
                                                        out in accordance with the ILO/IMO Guidelines on the
                                                        Medical Examinations of Seafarers and the national guidelines of
                                                        the authorising Administration.</td>
                                                </tr>
                                                <tr>
                                                    <td height="40">Name of Approved** Medical Practioner: <span
                                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                                        @if ($medical_director)
                                                            {{$medical_director->firstname . " " . $medical_director->middlename . " " . $medical_director->lastname}}
                                                        @endif
                                                    </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40">Signature of Approved** Medical Practitioner: <span
                                                            style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                                        @if ($medical_director)
                                                            <img width="100" height="20" style="object-fit: cover;" src="{{$medical_director->signature}}">
                                                        @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40">Date of Examination (dd/mm/yyyy):
                                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black; ">
                                                            <input type="text" style="border: none; font-family: serif; border-bottom: 1px solid black;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}" />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Expiry date of certificate (dd/mm/yyyy):
                                                        <span style="margin-left: 0.5rem; border-bottom: 1px solid black; ">
                                                            <input type="text" style="border: none; font-family: serif; border-bottom: 1px solid black;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}" />
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="5" cellpadding="5" class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td align="center"><b>SEAFARER ACKNOWLEDGEMENT</b></td>
                                                </tr>
                                                <tr>
                                                    <td>I Name of seafarer confirm that I have been informed of the
                                                        content of certificate and the right to get a review***. <br>
                                                        <br>
                                                        <div
                                                            style="display: flex; align-items: center; justify-content: space-around;">
                                                            <div style="width: 50%">Signature: <span style="margin-left: 0.5rem; border-bottom: 1px solid black;">
                                                                @if($admission->agency_id != 19)
                                                                    @if($admission->patient->patient_signature)
                                                                        <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="150px" />
                                                                    @elseif ($admission->patient->signature)
                                                                        <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="150px"/>
                                                                    @else
                                                                        <div style="width: 150px;height: 40px;"></div>
                                                                    @endif
                                                                @endif
                                                            </span>
                                                            </div>
                                                            <div style="width: 50%">Date: (dd/mm/yyyy): <span>{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d/F/Y") : null}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>* For persons who are assigned shipboard safety, security or environmental
                                        protection duties, the medical standards
                                        referenced on the certificate are the standards as specified in STCW Regulation
                                        I/9 and any other standards as specified
                                        by the authorizing Administration. For any other persons serving onboard, the
                                        medical standards shall be as specified by
                                        ILO and the authorizing Administration. <br> <br>
                                        ** The Medical Practitioner shall be approved by the national Administration,
                                        after inspection of medical
                                        facilities/recordkeeping, to carry out STCW/ILO medical examination. <br> <br>
                                        *** The review shall be carried out by a body/Medical Practitioner authorized by
                                        national Administration and this
                                        information should be made available to the seafarer
                                    </td>
                                </tr>
                                <tr colspan="10">
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 27rem 0 3rem 0;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        B103 Rev.03 <br>
                                                        Contact:
                                                    </td>
                                                    <td align="center">
                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center;">Page 20 of 22</div>
                                                        +44 20 7562 1300
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right">
                                        Bahamas Maritime Authority
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="5" cellpadding="5" >
                                            <tbody>
                                                <tr>
                                                    <td><b><u>ANNEX IV: List of countries, whose seafarer medical
                                                                certificates that are issued by a qualified Medical
                                                                Practitioner
                                                                licensed by the national Administration , are accepted
                                                                by The Bahamas</u></b></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" cellspacing="0" cellpadding="0" height="100%" style="margin-top: 1rem;">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="33%">
                                                                        <table width="100%" cellspacing="3"
                                                                            cellpadding="3" class="brdAll">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Algeria</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Antigua and Barbuda</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Argentina</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Australia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Azerbaijan</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Bahamas (the)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Bahrain</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Bangladesh</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Barbados</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Belgium</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Belize</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Brazil</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Brunei Darussalam</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Bulgaria</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Cambodia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Canada</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Cape Verde</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Chile</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>China: includes: Hong Kong,
                                                                                        China</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Colombia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Comoros</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Cook Islands (the)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Côte d'Ivoire</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Croatia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Cuba</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Cyprus</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Czech Republic</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Democratic People’s</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Republic of Korea</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Denmark: includes Faroe Islands
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="33%">
                                                                        <table width="100%" cellspacing="3"
                                                                            cellpadding="3" class="brdAll">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Greece</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Honduras</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Hungary</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Iceland</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>India</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Indonesia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Iran (Islamic Republic of)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Ireland</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Italy</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Israel</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Jamaica</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Japan</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Jordan</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kenya</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kiribati</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kuwait</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Latvia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lebanon</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Liberia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lithuania</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Luxembourg</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Libyan Arab Jamahiriya (the)
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Madagascar</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Malaysia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Malawi</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Maldives</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Malta</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Marshall Islands</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Mauritania</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Mauritius</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="33%">
                                                                        <table width="100%" cellspacing="3"
                                                                            cellpadding="3" class="brdAll">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Panama</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Papua New Guinea</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Peru</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Philippines</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Poland</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Portugal</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Qatar</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Republic of Korea</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Romania</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Russian Federation</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Saint Vincent and the Grenadines
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Samoa</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Saudi Arabia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Senegal</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Serbia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Singapore</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Slovak Republic</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Slovenia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Solomon Islands</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>South Africa</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Spain</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sri Lanka</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sweden</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Switzerland</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Syrian Arab Republic</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Thailand</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Togo</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tonga</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Trinidad & Tobago</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tunisia</td>
                                                                                </tr>
                                                                                <tr>
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
                                                <tr colspan="10">
                                                    <td>
                                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 6rem 0 2rem 0;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        B103 Rev.03 <br>
                                                                        Contact:
                                                                    </td>
                                                                    <td align="center">
                                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                                    </td>
                                                                    <td>
                                                                        <div style="text-align: center;">Page 21 of 22</div>
                                                                        +44 20 7562 1300
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" align="right">
                                                        Bahamas Maritime Authority
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="33%" height="600">
                                                                        <table width="100%" cellspacing="5"
                                                                            cellpadding="5" class="brdAll"  height="600">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Dominica</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Ecuador</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Egypt</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Eritrea</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Estonia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Ethiopia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Fiji</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Finland</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>France</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Georgia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Germany</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Ghana</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="33%" height="600">
                                                                        <table width="100%" cellspacing="5"
                                                                            cellpadding="5" class="brdAll" height="600">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Mexico</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Micronesia (Federated States of)
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Montenegro</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Morocco</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Mozambique</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Myanmar</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Netherlands: includes Aruba,
                                                                                        Curaca, St. Maarten</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>New Zealand</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Nigeria</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Norway</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Oman</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Pakistan</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="33%" height="600">
                                                                        <table width="100%" cellspacing="5"
                                                                            cellpadding="5" class="brdAll"  height="600">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Turkey</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tuvalu</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Ukraine</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>United Arab Emirates</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>United Kingdom: includes
                                                                                        Bermuda,</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>British Virgin Islands, Cayman
                                                                                        Islands</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Gibraltar, Isle of Man</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>United Republic of Tanzania</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>United States</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Uruguay</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Vanuatu</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Venezuela (Bolivarian Republic
                                                                                        of)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Viet Nam</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <td>
                                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdTop" style="margin: 19rem 0 0rem 0;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        B103 Rev.03 <br>
                                                                        Contact:
                                                                    </td>
                                                                    <td align="center">
                                                                        SEAFARER MEDICAL EXAMINATION AND CERTIFICATE <br>
                                                                        <span style="color: blue;">stcw@bahamasmaritime.com</span> <br>
                                                                        <span style="color: blue;">mlc@bahamasmaritime.com</span>
                                                                    </td>
                                                                    <td>
                                                                        <div style="text-align: center;">Page 22 of 22</div>
                                                                        +44 20 7562 1300
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
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
            </tbody>
        </table>
    </center>
</body>
<script>
    let duty_as = document.querySelectorAll('.duty_as');

        for(let i = 0; i < duty_as.length; i++) {
            duty_as[i].addEventListener('click', (e) => {
                if(e.target.classList.contains('underlined')) {
                    e.target.style.textDecoration = 'none';
                    e.target.style.fontWeight = '400';
                    e.target.classList.remove('underlined');
                } else {
                    e.target.style.textDecoration = 'underline';
                    e.target.style.fontWeight = '700';
                    e.target.classList.add('underlined');
                }
            })
        }
</script>
</html>
