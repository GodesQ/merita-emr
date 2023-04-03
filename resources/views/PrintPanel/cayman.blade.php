<html>

<head>
    <title>CAYMAN</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 12px;
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
        <table width="760" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr>
                    <table width="760" border="0" cellpadding="8" cellspacing="0" class="brdAll">
                        <tbody>
                            <tr>
                                <td align="middle">
                                    <span class="lblReport">
                                        MEDICAL EXAMINATION FORM
                                    </span>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table width="760" border="0" cellpadding="8" cellspacing="0" style="margin-top: 1rem">
                        <tbody>
                            <tr>
                                <td><span><b> Part 2 <br> MEDICAL EXAMINATION (TO BE COMPLETED BY MEDICAL
                                            EXAMINER)</b></span></td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table width="760" border="0" cellpadding="3" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><b>Yes</b></td>
                                <td><b>No</b></td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Is the examinee personally know to you?</td>
                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>If No did you check ID?</td>
                                <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table width="760" border="0" cellpadding="8" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="5%">2. </td>
                                <td width="5%">Height</td>
                                <td style="border-bottom:solid 1px black">{{$admission->exam_physical ? $admission->exam_physical->height : null}}
                                </td>
                                <td width="5%">Feet</td>
                                <td style="border-bottom:solid 1px black"></td>
                                <td width="5%">in.</td>
                                <td width="5%">Weight</td>
                                <td style="border-bottom:solid 1px black">{{$admission->exam_physical ? $admission->exam_physical->weight : null}}</td>
                                <td width="20%">lbs(in under clothes)</td>
                                <td width="5%">Waist</td>
                                <td style="border-bottom:solid 1px black"></td>
                                <td width="5%">in.</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="5%"></td>
                                <td width="27%">Chest Measurement on respiration</td>
                                <td width="10%" style="border-bottom:solid 1px black">{{$admission->exam_physical ? $admission->exam_physical->respiration : null}}</td>
                                <td width="5%">in, </td>
                                <td width="12%">on expiration</td>
                                <td width="10%" style="border-bottom:solid 1px black"></td>
                                <td>in.</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="5%">3. </td>
                                <td width="33%">Blood Pressure( two readings at rest(sitting)</td>
                                <td width="10%" style="border-bottom:solid 1px black">{{$admission->exam_physical ? $admission->exam_physical->systollic : null}}/{{$admission->exam_physical ? $admission->exam_physical->diastollic : null}}</td>
                                <td width="10%">lying down </td>
                                <td width="8%" style="border-bottom:solid 1px black"></td>
                                <td width="1%">)</td>
                                <td width="14%">4. Pulse Rate</td>
                                <td width="10%" style="border-bottom:solid 1px black">{{$admission->exam_physical ? $admission->exam_physical->pulse : null}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="5%">4. </td>
                                <td width="30%">Date and report of last E.C.G if any</td>
                                <td width="65%" style="border-bottom:solid 1px black">{{$admission->exam_ecg ? date_format(new DateTime($admission->exam_ecg->trans_date), "d F Y") : null}}
                                <span style="margin-left: 2rem;">{{$admission->exam_ecg ? $admission->exam_ecg->remarks : null}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="5%">5.</td>
                                <td width="95%">Are the following free from any pathological condition or abnormality.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <td>
                        <table width="760" border="0" cellpadding="8" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td width="5%"></td>
                                    <td></td>
                                    <td>YES</td>
                                    <td>NO</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(a)</td>
                                    <td>Skin</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a1 == "Yes" || $admission->exam_physical->a1 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a1 == "No" || $admission->exam_physical->a1 == "0")
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
                                    <td></td>
                                    <td>(b)</td>
                                    <td>Throat & mouth</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a7 == "Yes" || $admission->exam_physical->a7 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a7 == "No" || $admission->exam_physical->a7 == "0")
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
                                    <td></td>
                                    <td>(c)</td>
                                    <td>Eyes</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a3 == "Yes" || $admission->exam_physical->a3 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a3 == "No" || $admission->exam_physical->a3 == "0")
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
                                    <td></td>
                                    <td>(d)</td>
                                    <td>Ears</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a5 == "Yes" || $admission->exam_physical->a5 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a5 == "No" || $admission->exam_physical->a5 == "0")
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
                                    <td></td>
                                    <td>(e)</td>
                                    <td>Nose</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a6 == "Yes" || $admission->exam_physical->a6 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->a6 == "No" || $admission->exam_physical->a6 == "0")
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
                                    <td></td>
                                    <td>(f)</td>
                                    <td>Abdomen</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->b5 == "Yes" || $admission->exam_physical->b5 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->b5 == "No" || $admission->exam_physical->b5 == "0")
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
                                    <td></td>
                                    <td>(g)</td>
                                    <td>Cardiovascular system</td>
                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(h)</td>
                                    <td>Respiratory system</td>
                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(i)</td>
                                    <td>Locomotor system</td>
                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(j)</td>
                                    <td>Nervous system</td>
                                    <td><img src="../../../app-assets/images/icoCheck.gif" width="10"></td>
                                    <td><img src="../../../app-assets/images/icoUncheck.gif" width="10"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(k)</td>
                                    <td>Genito-urinary system</td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->c2 == "Yes" || $admission->exam_physical->c2 == "1")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                        @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($admission->exam_physical)
                                        @if ($admission->exam_physical->c2 == "No" || $admission->exam_physical->c2 == "0")
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
                    <table width="760" border="0" cellpadding="8" cellspacing="0">
                        <tbody>
                            <tr>
                                <td></td>
                                <td width="55%">If you answered "no" to any of the above questions, please provide
                                    details</td>
                                <td width="45%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0" style="margin-top: 1rem">
                        <tbody>
                            <tr>
                                <td></td>
                                <td width="95%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0" style="margin-top: 1rem">
                        <tbody>
                            <tr>
                                <td>6.</td>
                                <td>Is the examinee on any drug therapy at present?</td>
                                <td width="8%" style="border-bottom:solid 1px black"></td>
                                <td>If yes, give details</td>
                                <td width="35%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="10" cellspacing="0">
                        <tbody>
                            <tr>
                                <td></td>
                                <td width="95%" style="border-bottom:solid 1px black"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="95%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="8" cellspacing="0" style="margin-top: 1rem">
                        <tbody>
                            <tr>
                                <td>7.</td>
                                <td width="25%">Give details of any operations</td>
                                <td width="75%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="10" cellspacing="0">
                        <tbody>
                            <tr>
                                <td></td>
                                <td width="95%" style="border-bottom:solid 1px black"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="95%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="10" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>8. </td>
                                <td width="20%">Medical Condition</td>
                                <td>a.)</td>
                                <td width="35%" style="border-bottom:solid 1px black"></td>
                                <td>b.)</td>
                                <td width="35%" style="border-bottom:solid 1px black"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="20%"></td>
                                <td>c.)</td>
                                <td width="35%" style="border-bottom:solid 1px black"></td>
                                <td>d.)</td>
                                <td width="35%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="760" border="0" cellpadding="10" cellspacing="0" style="margin-top: 2rem">
                        <tbody>
                            <tr>
                                <td></td>
                                <td width="20%">Date of Examination</td>
                                <td width="20%" style="border-bottom:solid 1px black"></td>
                                <td></td>
                                <td width="25%">Signature Medical Examiner</td>
                                <td width="20%" style="border-bottom:solid 1px black"></td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
