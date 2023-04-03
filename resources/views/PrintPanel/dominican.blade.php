<html>

<head>
    <title>DOMINICAN</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: constantia;
        font-size: 12px;
    }

    .fontBoldLrg {
        font: bold 15px constantia;
    }

    .fontMed {
        font: normal 12px constantia;
    }
    .brdBot tr td{
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        font-size: 11px;
    }
    ol li {
        margin: 0.5rem 0;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="5" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                    <table width="760" cellspacing="0" cellpadding="10" class="brdAll">
                         <tbody>
                            <tr>
                                <td width="30%"><img width="80" src="../../app-assets/images/logo/dominican-logo.png"></td>
                                <td width="70%" style="font-size: 20px; font-weight: 700;">COMMONWEALTH OF DOMINICA <br> PHYSICAL EXAMINATION REPORT</td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                <tr>
                    <table width="760" cellspacing="0" cellpadding="10" class="brdAll">
                        <tbody>
                            <tr>
                                <td style="background: lightgray;"> <b> Part I PERSONAL INFORMATION (This section to be completed by applicant)</b></td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table width="760" cellspacing="0" cellpadding="5" class="brdTable" style="margin: 1rem;">
                        <tbody>
                            <tr>
                                <td>Last Name <br> <span class="fontBoldLrg">{{$admission->patient->lastname}}</span></td>
                                <td>First Name <br> <span class="fontBoldLrg">{{$admission->patient->firstname}}</span></td>
                                <td>Middle Name <br><span class="fontBoldLrg">{{$admission->patient->middlename}}</span></td>
                            </tr>
                            <tr>
                                <td valign="top">Date of Birth <br>
                                    <span class="fontBoldLrg">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "F d, Y")}}</span><br> <br>
                                    Month <span style="margin: 0 1rem;"></span> Day <span style="margin: 0 1rem;"></span> Year <span style="margin: 0 1rem;"></span>
                                </td>
                                <td>
                                    Place of Birth <br> <span class="fontBoldLrg">{{$admission->patient->patientinfo->birthplace}}</span><br> <br>
                                    City  <span style="margin: 0 1rem;"></span> Country  <span style="margin: 0 1rem;"></span></span>
                                </td>
                                <td>
                                    Sex <br> <br>
                                    <span>
                                        @if($admission->patient->gender == "Male")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </span> Male <br>
                                    <span>
                                        @if($admission->patient->gender == "Female")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </span> Female
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Mailing address of applicant <br>
                                    <span>{{$admission->patient->patientinfo->address}}</span>
                                </td>
                                <td colspan="2">
                                    Department <br>
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                                        <div style="width: 50%;">
                                            <span>
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Deck officer <br>
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Deck rating <br>
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Radio officer <br>
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Food handling <br>
                                        </div>
                                        <div style="width: 50%;">
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Engine officer <br>
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Engine rating <br>
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10" class="checkbox"></span> Other <br>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Passport number and country of issue: <br>
                                    <span>{{$admission->patient->patientinfo->passportno}}</span>
                                </td>
                                <td colspan="2">Routine and emergency duties (if known): <br>
                                    <span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Type of ship: <br>
                                    <span>PASSENGER</span>
                                </td>
                                <td colspan="2">Trade area: <br>
                                    <span>WORLDWIDE</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td style="background: lightgray; font-weight: 700;">Examinee’s Personal Declaration:</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 760px; text-align: left;">
                            (To be completed by the seafarer with the help of medical staff, if requested)
                        </div>
                        <div style="width: 760px; text-align: left; margin: 1rem 0;">Have you ever had any of the following conditions?:</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: flex-start; justify-content: space-between; width: 100%'">
                                            <div style="width: 45%">
                                                <table width="100%" cellspacing="0" cellpadding="5" class="brdBot brdAll">
                                                    <tbody>
                                                        <tr style="background: lightgray;">
                                                            <td>Condition</td>
                                                            <td>Yes</td>
                                                            <td>No</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1.	Eye/vision problem</td>
                                                            <td>
                                                                @if($admission->exam_physical)
                                                                    @if($admission->exam_physical->sick7 == "1" || $admission->exam_physical->sick7 == "Yes")
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
                                                                    @if($admission->exam_physical->sick7 == "0" || $admission->exam_physical->sick7 == "No")
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
                                                            <td>2.	High blood pressure</td>
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
                                                            <td>3.	Heart/vascular disease</td>
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
                                                            <td>4.	Heart surgery</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.	Varicose veins/piles</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6.	Asthma/bronchitis</td>
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
                                                            <td>7.	Blood disorder</td>
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
                                                            <td>8.	Diabetes</td>
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
                                                            <td>9.	Thyroid problem</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10.	Digestive disorder</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11.	Kidney problem</td>
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
                                                            <td>12.	Skin problem</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13.	Allergies</td>
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
                                                            <td>14.	Infectious/contagious diseases</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>15.	Hernia</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16.	Genital disorder</td>
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
                                                            <td>17.	Pregnancy</td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="width: 45%;">
                                                <table width="100%" cellspacing="0" cellpadding="5" class="brdBot brdAll">
                                                    <tbody>
                                                        <tr style="background: lightgray;">
                                                            <td>Condition</td>
                                                            <td>Yes</td>
                                                            <td>No</td>
                                                        </tr>
                                                        <tr>
                                                            <td>18.	Sleep problem</td>
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
                                                            <td>19.	Do you smoke, use alcohol or drugs?</td>
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
                                                            <td>20.	Operation/surgery</td>
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
                                                            <td>21.	Epilepsy/seizures</td>
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
                                                            <td>22.	Dizziness/fainting</td>
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
                                                            <td>23.	Loss of consciousness</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>24.	Psychiatric problems</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>25.	Depression</td>
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
                                                            <td>26.	Attempted suicide</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>27.	Loss of memory</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.	Balance problem</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>29.	Severe headaches</td>
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
                                                            <td>30.	Ear (hearing, tinnitus)/nose/throat problem</td>
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
                                                            <td>31.	Restricted mobility</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>32.	Back or joint problem</td>
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
                                                            <td>33.	Amputation</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>34.	Fractures/dislocations</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="height: 60px; border: 1px solid black; padding: 0.5rem;">
                                            If you answered “yes” to any of the above questions, please provide details <br>
                                            @if($admission->exam_physical) @php echo nl2br($admission->exam_physical->specify) @endphp @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin: 2rem 0;">
                            <tbody>
                                <tr>
                                    <td width="75%">CDMP-3033A Rev02 </td>
                                    <td width="25%">Dominica Physical Exam Report</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="760" class="brdAll brdBot" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr style="background: lightgray;">
                                    <td><b>Additional Questions</b></td>
                                    <td>Yes</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>35.	Have you ever been signed off sick or repatriated from a ship?</td>
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
                                    <td>36.	Have you ever been hospitalized?</td>
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
                                    <td>37.	Have you ever been declared unfit for sea duty?</td>
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
                                    <td>38.	Has your medical certificate ever been restricted or revoked?</td>
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
                                    <td>39.	Are you aware that you have any medical problems, diseases, or illnesses?</td>
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
                                    <td>40.	Do you feel healthy and fit to perform the duties of your designated position/occupation?</td>
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
                            </tbody>
                        </table>
                        <div style="height: 100px; border: 1px solid black; padding: 0.5rem; width: 750px; margin: 1rem 0; text-align: left;">
                            Comments<br>
                            @if($admission->exam_physical){{nl2br($admission->exam_physical->comments)}}@endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" class="brdAll brdBot" cellspacing="0" cellpadding="5" style="margin-top: 1rem;">
                            <tbody>
                                <tr style="background: lightgray;">
                                    <td><b>Additional Questions</b></td>
                                    <td>Yes</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>41.	Are you allergic to any medication?</td>
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
                        <div style="height: 100px; border: 1px solid black; padding: 0.5rem; width: 750px; margin: 1rem 0; text-align: left;">
                            If yes, please list the medications taken, and the purpose(s) and dosage(s):<br>
                            @if($admission->exam_physical){{nl2br($admission->exam_physical->purpose)}}@endif
                        </div>
                        <div style="background: lightgray; padding: 0.5rem; width: 760px; border: 1px solid black; text-align: left;">
                            Attestations
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760"  cellspacing="0" cellpadding="5" style="margin-top: 1rem;">
                            <tbody>
                                <tr>
                                    <td>I hereby certify that the personal declaration above is a true statement to the best of my knowledge.</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: flex-end; justify-content: space-between; width: 100%; margin: 1rem 0;">
                                            <div style="width: 25%;">Signature of examinee</div>
                                            <div style="border-bottom: 1px solid black; width: 35%; position: relative;">
                                                @if($admission->agency_id != 19)
                                                    @if($admission->patient->patient_signature)
                                                        <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="100%" />
                                                    @elseif ($admission->patient->signature)
                                                        <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="100%"/>
                                                    @else
                                                        <div style="width: 150%;height: 40px; position: absolute; top: -30px; left: 0px;"></div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div style="width: 25%;">Date (dd/mm/yyyy): </div>
                                            <div style="border-bottom: 1px solid black; width: 35%;">{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->trans_date), "d F Y") : null}}</div>
                                        </div>
                                        <div style="display: flex; align-items: flex-end; justify-content: space-between; width: 100%; margin: 1rem 0;">
                                            <div style="width: 25%;">Witnessed by (signature):</div>
                                            <div style="border-bottom: 1px solid black; width: 35%;"></div>
                                            <div style="width: 10%;">Name: </div>
                                            <div style="border-bottom: 1px solid black; width: 55%;">REX A. GAID</div>
                                        </div>
                                        <div>
                                            I hereby authorize the release of all my previous medical records from any health professionals, health institutions and public authorities to
                                        </div>
                                        <div style="margin: 1rem 0;">Dr. <span style="border-bottom: 1px solid black; width: 55%;">TERESITA F. GONZALES M.D</span>
                                        (the approved medical practitioner).</div>
                                        <div style="display: flex; align-items: flex-end; justify-content: space-between; width: 100%; margin: 1rem 0;">
                                            <div style="width: 25%;">Signature of examinee</div>
                                            <div style="border-bottom: 1px solid black; width: 35%; position: relative;">
                                                @if($admission->agency_id != 19)
                                                    @if($admission->patient->patient_signature)
                                                        <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="100%"/>
                                                    @elseif ($admission->patient->signature)
                                                        <img src="data:image/jpeg;base64,{{$admission->patient->signature}}" width="100%"/>
                                                    @else
                                                        <div style="width: 150%;height: 40px; position: absolute; top: -30px; left: 0px;"></div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div style="width: 25%;">Date (dd/mm/yyyy): </div>
                                            <div style="border-bottom: 1px solid black; width: 35%;">
                                                {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->trans_date), "d F Y") : null}}
                                            </div>
                                        </div>
                                        <div style="display: flex; align-items: flex-end; justify-content: space-between; width: 100%; margin: 1rem 0;">
                                            <div style="width: 25%;">Witnessed by (signature):</div>
                                            <div style="border-bottom: 1px solid black; width: 35%;"></div>
                                            <div style="width: 10%;">Name: </div>
                                            <div style="border-bottom: 1px solid black; width: 55%;">Teresita F Gonzales</div>
                                        </div>
                                        <div style="display: flex; align-items: flex-end; justify-content: space-between; width: 100%; margin: 1rem 0;">
                                            <div style="width: 50%;">Date and contact details for previous medical examination (if known):</div>
                                            <div style="border-bottom: 1px solid black; width: 50%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin: 10rem 0 2rem 0;">
                            <tbody>
                                <tr>
                                    <td width="75%">CDMP-3033A Rev02 </td>
                                    <td width="25%">Dominica Physical Exam Report</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="760"  width="760"  cellspacing="0" cellpadding="3">
                            <tbody>
                                <tr>
                                    <td style="background: lightgray; padding: 0.5rem;" >
                                      <b> Part II MEDICAL EXAMINATION (This section to be completed by physician)</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760"  class="brdTable"  cellspacing="0" cellpadding="2" style="margin-top: 1rem;">
                            <tbody>
                                <tr>
                                    <td colspan="7" style="background: lightgray;" >
                                        Sight
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7"  height="60" valign="top">
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
                                            <span>(if yes, specify which type and for what purpose)</span> <br> <span>
                                                <textarea name="co" type="text" id="co" value=""  class="brdNone" style="width:100%;text-align:left;border: none;"></textarea>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Visual Acuity</td>
                                    <td align="center" colspan="3">Unaided</td>
                                    <td align="center" colspan="3">Aided</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Right Eye</td>
                                    <td>Left Eye</td>
                                    <td>Binocular</td>
                                    <td>Right Eye</td>
                                    <td>Left Eye</td>
                                    <td>Binocular</td>
                                </tr>
                                <tr>
                                    <tr>
                                        <td>Distant</td>
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
                                    </tr>
                                </tr>
                                <tr>
                                    <td>Near</td>
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
                                    <td>
                                    </td>
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
                                </tr>
                            </tbody>
                        </table>
                        <table width="760"  class="brdTable"  cellspacing="0" cellpadding="3">
                            <tbody>
                                <tr>
                                    <td colspan="6">Visual Fields</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="center">Normal</td>
                                    <td align="center">Defective</td>
                                    <td></td>
                                    <td align="center">Normal</td>
                                    <td align="center">Defective</td>
                                </tr>
                                <tr>
                                    <td>Right Eye</td>
                                    @if($admission->exam_visacuity)
                                        @if($admission->exam_visacuity->remarks_status == 'normal')
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                            <td align="center"><img src="../../../app-assets/images/icoUnceck.gif" width="10"></td>
                                        @else
                                            <td align="center"><img src="../../../app-assets/images/icoUnceck.gif" width="10"></td>
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                        @endif
                                    @else
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    @endif
                                    <td>Left Eye</td>
                                    @if($admission->exam_visacuity)
                                        @if($admission->exam_visacuity->remarks_status == 'normal')
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                            <td align="center"><img src="../../../app-assets/images/icoUnceck.gif" width="10"></td>
                                        @else
                                            <td align="center"><img src="../../../app-assets/images/icoUnceck.gif" width="10"></td>
                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                        @endif
                                    @else
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td colspan="6" height="50" valign="top">
                                        Colour Vision <br>
                                        <span style="margin: 0 1rem;">Not tested
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->result == "")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Normal
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->result == "Adequate")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Doubtful
                                                <span style="font-size: 15px;">
                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Defective
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_ishihara)
                                                        @if($admission->exam_ishihara->result == "Defective")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                    @endif
                                                </span>
                                            </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="760"  class="brdTable"  cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td colspan="7" style="background: lightgray;">Hearing</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="5" align="center">Pure tone and audiometry (threshold values in dB)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>500 HZ</td>
                                    <td>1000 HZ</td>
                                    <td>2000 HZ</td>
                                    <td colspan="2">3000 HZ</td>
                                </tr>
                                <tr>
                                    <td>Right Ear</td>
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
                                    <td colspan="2">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_right6}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Left Ear</td>
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
                                    <td colspan="2">
                                        @if($admission->exam_audio)
                                            {{$admission->exam_audio->air_left6}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" height="50">
                                        Speech and Whisper Test (metres)	<span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="center">Normal</td>
                                    <td align="center">Whisper</td>
                                    <td></td>
                                    <td align="center">Normal</td>
                                    <td align="center">Whisper</td>
                                </tr>
                                <tr>
                                    <td>Right Ear</td>
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
                                    <td>Left Ear</td>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="brdTable" width="760" cellspacing="0" cellpadding="5" style="margin-top: 2rem;">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="background: lightgray;">
                                        Clinical Findings
                                    </td>
                                </tr>
                                <tr>
                                    <td>Height: <span style="font-weight: 700; font-size: 13px;">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->height}}
                                        @endif
                                    </span>(cm)</td>
                                    <td colspan="2">Weight <span style="font-weight: 700; font-size: 13px;">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->weight}}
                                        @endif
                                    </span>(kg)</td>
                                </tr>
                                <tr>
                                    <td>Pulse rate: <span style="font-weight: 700; font-size: 13px;">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->pulse}}
                                        @endif
                                    </span> /(min.)</td>
                                    <td colspan="2">Rhythm: <span style="font-weight: 700; font-size: 13px;">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->rhythm}}
                                        @endif
                                    </span></td>
                                </tr>
                                <tr>
                                    <td>Blood pressure Systolic: <span style="font-weight: 700; font-size: 13px;">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->systollic}}
                                        @endif
                                    </span> (mmHg)</td>
                                    <td colspan="2">Diastolic <span style="font-weight: 700; font-size: 13px;">
                                        @if($admission->exam_physical)
                                            {{$admission->exam_physical->diastollic}}
                                        @endif
                                    </span>(mmHg)</td>
                                </tr>
                                <tr>
                                    <td>Urinalysis: <span></span>  Glucose: <span>NORMAL</span></td>
                                    <td>Protein: <span>NORMAL</span></td>
                                    <td>Blood: <span>NORMAL</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="5" style="margin-top: 2rem;">
                            <tbody>
                                <tr>
                                    <td>
                                    <div style="display: flex; align-items: flex-start; justify-content: space-between; width: 100%'">
                                            <div style="width: 48%">
                                                <table width="100%" cellspacing="0" cellpadding="5" class="brdBot brdAll">
                                                    <tbody>
                                                        <tr style="background: lightgray;">
                                                            <td></td>
                                                            <td align="center">Normal</td>
                                                            <td align="center">Abnormal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Head</td>
                                                            <td align="center">
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
                                                            <td align="center">
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
                                                            <td align="center">
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
                                                            <td align="center">
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
                                                            <td align="center">
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
                                                            <td align="center">
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
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
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
                                                            <td>Opthalmoscopy</td>
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
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
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td >
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="width: 48%;">
                                                <table width="100%" cellspacing="0" cellpadding="5" class="brdBot brdAll">
                                                    <tbody>
                                                        <tr style="background: lightgray;">
                                                            <td></td>
                                                            <td align="center">Normal</td>
                                                            <td align="center">Abnormal</td>
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
                                                            <td>Varicose veins</td>
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vascular (inc. pedal pulses)</td>
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
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
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Anus (not rectal exam.)</td>
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
                                                            <td>Spine (C/S, T/S and L/S)</td>
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Neurologic (full brief)</td>
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Psychiatric</td>
                                                            <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>General appearance</td>
                                                            <td align="center" ><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                            </td>
                                                            <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin: 2rem 0 2rem 0;">
                            <tbody>
                                <tr>
                                    <td width="75%">CDMP-3033A Rev02 </td>
                                    <td width="25%">Dominica Physical Exam Report</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellpadding="0" cellspacing="20" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="2">Chest X-ray</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="margin-left: 1rem;">
                                            @if(!$admission->exam_xray)
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                            Not Performed
                                        </span>
                                    </td>
                                    <td>
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
                            </tbody>
                        </table>
                        <table width="760" cellpadding="0" cellspacing="20" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="2">Other Diagnostic Test(s) and Result(s):</td>
                                </tr>
                                <tr>
                                    <td>Test: <span style="border-bottom: 1px solid black;">ECG</span></td>
                                    <td>Result:  <span style="border-bottom: 1px solid black;">{{$admission->exam_physical ? $admission->exam_physical->ecg_findings : null}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="760" cellpadding="5" cellspacing="0" class="brdAll">
                            <tbody>
                                <tr>
                                    <td height="60" valign="top">Medical practitioner’s comments and assessment of fitness, with reasons for any limitations: <br>
                                        <textarea name="co" type="text" id="co" rows="3" class="brdNone" style="width:100%;text-align:left;border: none;"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="margin-top: 2rem;" width="760" cellpadding="10" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td colspan="5" style="background: lightgray;">Assessment of Fitness for Service at Sea</td>
                                </tr>
                                <tr>
                                    <td  colspan="5" height="90" valign="top">
                                        On the basis of the examinee’s personal declaration, my clinical examination and the diagnostic test results recorded above,
                                        I declare the examinee medically: <br>
                                        <div style="margin-top: 1rem;">
                                            <span style="margin: 0 1rem;">Fit for duty
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->duty == 'Fit')
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="13">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="13">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Not fit for duty
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->duty == 'Unfit')
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
                                <tr>
                                    <td></td>
                                    <td align="center">Deck Service</td>
                                    <td align="center">Engine Service</td>
                                    <td align="center">Catering Service</td>
                                    <td align="center">Other Service</td>
                                </tr>
                                <tr>
                                    <td>Fit</td>
                                    <td align="center" style="font-size:15px;"><b>
                                             {{$admission->category == "DECK SERVICES" && $admission->exam_physical->fit == "Fit" ? '☑' : '☐'}}
                                        </b></td>
                                    <td align="center" style="font-size:15px;"><b>
                                            {{$admission->category == "ENGINE SERVICES" && $admission->exam_physical->fit == "Fit" ? '☑' : '☐'}}
                                        </b></td>
                                    <td align="center" style="font-size:15px;"><b>
                                            {{$admission->category == "CATERING SERVICES" && $admission->exam_physical->fit == "Fit" ? '☑' : '☐'}}
                                        </b></td>
                                    <td align="center" style="font-size:15px;"><b>
                                            {{$admission->category == "OTHER SERVICES" && $admission->exam_physical->fit == "Fit" ? '☑' : '☐'}}
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Unfit</td>
                                    <td align="center" style="font-size:15px;"><b>
                                             {{$admission->category == "DECK SERVICES" && $admission->exam_physical->fit == "Unfit" ? '☑' : '☐'}}
                                        </b></td>
                                    <td align="center" style="font-size:15px;"><b>
                                            {{$admission->category == "ENGINE SERVICES" && $admission->exam_physical->fit == "Unfit" ? '☑' : '☐'}}
                                        </b></td>
                                    <td align="center" style="font-size:15px;"><b>
                                            {{$admission->category == "CATERING SERVICES" && $admission->exam_physical->fit == "Unfit" ? '☑' : '☐'}}
                                        </b></td>
                                    <td align="center" style="font-size:15px;"><b>
                                            {{$admission->category == "OTHER SERVICES" && $admission->exam_physical->fit == "Unfit" ? '☑' : '☐'}}
                                        </b></td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div style="margin-top: 1rem;">
                                            <span style="margin: 0 1rem;">With restrictions
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->restriction == "with restriction")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Without restrictions
                                                <span style="font-size: 15px;">
                                                    @if($admission->exam_physical)
                                                        @if($admission->exam_physical->restriction == "without restriction")
                                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                        @else
                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                        @endif
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                    @endif
                                                </span>
                                            </span>
                                            <span style="margin: 0 1rem;">Visual aid required
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
                                            <span style="margin: 0 1rem;">Visual aid not required
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
                                <tr>
                                    <td colspan="5" height="70" valign="top">Describe restrictions (e.g., specific position, type of ship, trade area): <br>
                                        {{$admission->exam_physical ? $admission->exam_physical->describe_restriction : null}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="5" class="brdTable" style="margin-top: 2rem;">
                            <tbody>
                                <tr>
                                    <td style="background: lightgray;">Physician’s Signature and Stamp</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="margin: 1rem;">
                                            Signature of medical practitioner : <span style="border-bottom: 1px solid black;"></span>
                                        </div>
                                        <div style="margin: 2rem 1rem;">Medical practitioner information (name, license number, address): <br>
                                        <span style="border-bottom: 1px solid black;">
                                            Dr. Teresita G. Gonzales M.D. <br>
                                                Lic. No. 0055997 <br>
                                                MERITA DIAGNOSTIC CLINIC INC. <br>
                                                5th Flr. Jettac Building #920 Pres. Quirino Ave. <br>
                                                corner San Antonio St, Malate Manila
                                        </span></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 52rem; margin-top: 1rem;">
                            <tbody>
                                <tr>
                                    <td width="75%">CDMP-3033A Rev02 </td>
                                    <td width="25%">Dominica Physical Exam Report</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="10" class="brdAll" >
                            <tbody>
                                <tr>
                                    <td>
                                        <h4 style="text-align: center;">MEDICAL REQUIREMENTS</h4>
                                        <p>All applicants for an officer certificate, Seafarer’s Identification and Training Record Book or certification of special qualification
                                            shall be required to have a physical examination reported on this Medical Form completed by a certificated physician.
                                            The completed medical form must accompany the application for officer certificate, application for seafarer’s identity document,
                                            or application for certification of special qualifications. This physical examination must be carried out not more than 12 months prior to the date
                                            of making application for an officer certificate, certification of special qualifications, or a seafarer’s book.
                                            Such proof of examination must reestablish that the applicant is in satisfactory physical condition for the
                                            specific duty assignment undertaken and is generally in possession of all body faculties necessary in fulfilling
                                            the requirements of the seafaring profession.
                                            In addition, the following minimum requirements shall apply:
                                        </p>
                                        <ol>
                                            <li>All applicants must have hearing unimpaired for normal sounds and be capable of hearing a
                                                whispered voice in the better ear at 15 feet and in the poorer ear at 5 feet</li>
                                            <li>Deck officer applicants must have (either with or without corrective lenses) at least 20/20 vision in one eye and at least 20/40 in the other.
                                                If the applicant uses corrective lenses, he must have vision without corrective lenses of at least 20/160 in both eyes.
                                                Deck officer applicants must also have normal color perception and be capable of distinguishing the colors red, green, blue and yellow.
                                            </li>
                                            <li>Engineer and radio officer applicants must have (whether with or without corrective lenses) at least 20/30 vision in one eye and at least 20/50 in the other.
                                                If the applicant wears glasses, he must have vision without glasses of at least 20/200 in both eyes.
                                                Engineer and radio officer applicants must also be able to perceive the colors red, yellow and green.
                                            </li>
                                            <li>An applicant’s blood pressure must fall within an average range, taking age into consideration.</li>
                                            <li>Applicants afflicted with any of the following diseases or conditions may be disqualified: <br> <br>
                                                <table width="100%" cellspacing="0" cellpadding="3">
                                                    <tbody>
                                                        <tr>
                                                            <td width="33%">a)	Epilepsy;</td>
                                                            <td width="33%">s)	Obesity, incapacitating function;</td>
                                                            <td width="33%">jj)	Recurrent appendicitis;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>b)	Insanity;</td>
                                                            <td>t)	Thyroid disease;</td>
                                                            <td>kk)	Cholelithiasis, cholecystitis,cholangitis;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>c)	Senility;</td>
                                                            <td>u)	Diseases of the blood or blood forming organs;</td>
                                                            <td>ll)	Liver cirrhosis;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>d)	Psychosis;</td>
                                                            <td>v)	Meniere’s diseases;</td>
                                                            <td>mm)	Pancreatitis, recurrent;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>e)	Psychoneurosis;</td>
                                                            <td>w)	Post-concussion syndrome;</td>
                                                            <td>nn)	Intestinal stoma;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>f)	Dementia;</td>
                                                            <td>x)	Heart disease;</td>
                                                            <td>oo)	Perianal pathology;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>g)	Personality disorder;</td>
                                                            <td>y)	Hypertension;</td>
                                                            <td>pp)	Renal failure;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>h)	Alcoholism;</td>
                                                            <td>z)	Arterial disease;</td>
                                                            <td>qq)	Urinary tract obstruction;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>i)	Tuberculosis;</td>
                                                            <td>aa)	Cerebrovascular disease;</td>
                                                            <td>rr)	Prostatism;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>j)	Acute venereal disease or neurosyphilis;</td>
                                                            <td>bb)	Diseases of veins;</td>
                                                            <td>ss)	Removal of one kidney;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>k) AIDS;</td>
                                                            <td>cc)	Bronchial asthma</td>
                                                            <td>tt)	Renal transplantation;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>l)	The use of narcotics;</td>
                                                            <td>dd)	Pulmonary fibrosis;</td>
                                                            <td>uu)	Hydrocoele, large, symptomatic;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>m)	Hepatitis;</td>
                                                            <td>ee)	Gross deformity of the chest wall;</td>
                                                            <td>vv)	Osteoarthritis;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>n) Malaria</td>
                                                            <td>ff)	Pneumothorax;</td>
                                                            <td>ww)	Recurrent dislocation of major joint;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>o)	Sexually transmitted diseases;</td>
                                                            <td>gg)	Tumors;</td>
                                                            <td>xx)	Infection or inflammatory ear conditions;<td>
                                                        </tr>
                                                        <tr>
                                                            <td>p)	Adrenal insufficiency, uncontrolled;</td>
                                                            <td>hh)	Peptic ulcers;</td>
                                                            <td>yy)	Sleep disorders; and<td>
                                                        </tr>
                                                        <tr>
                                                            <td>q)	Diabetes mellitus, all cases requiring insulin;</td>
                                                            <td>ii)	History of gastro-intestinal bleeding/perforation;</td>
                                                            <td>zz)	Severe speech impediment.<td>
                                                        </tr>
                                                        <tr>
                                                            <td>r)	Immunosuppressive therapy;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                            <li>Deck/Navigational officer applicants and Radio officer applicants must have speech which is unimpaired for normal voice communication.</li>
                                            <li>Applicants for RFPNW, Ordinary Seaman, Able Seafarer Deck, Cook , Deck Cadet or any deck rating position must meet the physical requirements for a deck/navigational officer’s certificate.</li>
                                            <li>Applicants for RFPEW, Able Seafarer Engine, Electro Technical Rating, Tankerman, Engine Cadet or any other engineering rating must meet the physical requirements for an engineer officer’s certificate.</li>
                                        </ol>
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
        let checkbox = document.querySelectorAll('.checkbox');

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
