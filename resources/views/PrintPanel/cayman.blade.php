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
        <div style="min-height: 100vh;">
            <table width="800px" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th align="center" style="border: none !important;">
                            <img src="{{ URL::asset('app-assets/images/logo/imigration-cayman-island.png') }}" alt=""
                                width="120px">
                            <div style="margin: 0.5rem 0; font-size: 10px;">CAYMAN ISLANDS IMMIGRATION DEPARTMENT GUIDELINES
                                TO MEDICAL PRACTITIONERS</div>
                            <div width="100%" style="border: 1px solid #000;">
                                <h3 style="font-size: 20px; line-height: 5px;">MEDICAL EXAMINATIONS FORM</h3>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div width="100%" style="margin: 15px 0px 30px 0px;">
                                <p>1. Medical examinations are required on initial application for work permit and once in
                                    every three years thereafter.</p>
                                <p>2. Laboratory tests ahave to be repated with each medical examinations. Chest X-rays are
                                    required once in every five years. <br>
                                    For practial purposes, for renewal application a chest x-ray is not required if the
                                    previous x-rays were done with in 4 years application.
                                </p>
                                <p>3. Laboratory reports have to be attached for HIV and VDRL test.</p>
                                <p>4. Medical practioners are advised to perform any test that might be desirable depending
                                    on the disease prevalence in the respective countries.</p>
                            </div>

                            <div width="100%">
                                <h5 style="font-weight: 600; font-size: 13px; line-height: 0px;">PART 1</h5>
                                <h5 style="font-size: 13px; line-height: 0px;">QUESTIONNAIRE (TO BE COMPLETED BY APPLICANT)
                                </h5>
                                <div width="100%">
                                    <table width="100%" cellpadding="5" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="2" cellspacing="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="bottom">1. (a) Surname</td>
                                                                <td valign="bottom" colspan="2" width="20%" style="border-bottom: 1px solid black;">
                                                                    {{ optional($admission->patient)->lastname }}
                                                                </td>
                                                                <td valign="bottom">Maiden Name</td>
                                                                <td valign="bottom" width="15%" style="border-bottom: 1px solid black;">
                                                                    {{ optional($admission->patient)->middlename }}
                                                                </td>
                                                                <td valign="bottom">Given Names (First Names)</td>
                                                                <td valign="bottom" colspan="2" width="20%" style="border-bottom: 1px solid black;">
                                                                    {{ optional($admission->patient)->firstname }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="2" cellspacing="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="bottom">(b) Nationality</td>
                                                                <td valign="bottom" width="12%" style="border-bottom: 1px solid black;">
                                                                    {{ optional($admission->patient)->patientinfo->nationality }}
                                                                </td>
                                                                <td valign="bottom">(c) Country of Birth</td>
                                                                <td valign="bottom" width="12%" style="border-bottom: 1px solid black;">
                                                                    PHILIPPINES
                                                                </td>
                                                                <td valign="bottom">(d) Date of Birth</td>
                                                                <td valign="bottom" width="13%" style="border-bottom: 1px solid black;">
                                                                    {{ date_format(new DateTime($admission->patient->patientinfo->birthdate), 'M d, Y') }}
                                                                </td>
                                                                <td valign="bottom">(e) Passport number</td>
                                                                <td valign="bottom" width="11%" style="border-bottom: 1px solid black;">
                                                                    {{ $admission->patient->patientinfo->passportno }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="60%" cellpadding="2" cellspacing="0" border="0">
                                                        @php
                                                            $maritalStatuses = [
                                                                'MARRIED' => 'Married',
                                                                'DIVORCED' => 'Divorced',
                                                                'WIDOWED' => 'Widowed',
                                                                'SINGLE' => 'Single'
                                                            ];
                                                        @endphp
                                                        <tbody>
                                                            <tr>
                                                                <td width= valign="bottom">(f) Marital Status</td>
                                                                @foreach($maritalStatuses as $statusKey => $statusValue)
                                                                    <td valign="bottom">
                                                                        {{ $statusValue }}
                                                                        @if($admission->patient->patientinfo->maritalstatus == $statusKey)
                                                                            <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                        @else
                                                                            <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                        @endif
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table width="85%" cellpadding="5" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <td>2. Have You Ever Had Or Currently Have</td>
                                                <td>Yes</td>
                                                <td>No</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>(a) Nervous or mental trouble</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick6, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick6, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(b) Fits or convulsions?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick4, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick4, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(c) Heart Trouble or raised Blood Pressure</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick13, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick13, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(d) Lung tuberculosis, Asthma or hay fever?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick10, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick10, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(e) Contact with a case of tuberculosis?</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                            </tr>
                                            <tr>
                                                <td>(f) Frequent or prolonged indigestion?</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                            </tr>
                                            <tr>
                                                <td>(g) Malaria, dysentery or any other tropical illness?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick26, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick26, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(h) A sexually transmitted disease?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick25, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick25, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(i) Eye trouble?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick7, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick7, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(j) Any serious operations?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick31, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick31, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(k) Diabetes?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick15, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick15, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(l) Rheumatic Fever?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick23, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick23, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(m) Family history of mental trouble, suicide, fits <br> Any kind of tuberculosis, diabetes or raised blood pressure?</td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick6, ['1', 'Yes']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admission->exam_physical && in_array($admission->exam_physical->sick6, ['0', 'No']))
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                    @else
                                                        <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(n) Any illness or injury not mentioned above?</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                            </tr>
                                            <tr>
                                                <td>(o) A physical defect?</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                            </tr>
                                            <tr>
                                                <td>3. Do you take alcohol or habit forming drugs?</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                            </tr>
                                            <tr>
                                                <td>4. Have you ever applied for or recieved disability benefits?</td>
                                                <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    If you have answered yes in questions 2,3 or 4, please provide details
                                                    <input type="text" style="border: none; border-bottom: 1px solid black; width: 280px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    5. Are you now in good health?
                                                        <span style="margin: 0 5px;"><b><u>YES</u></b></span>
                                                        <span style="margin: 0 20px;">NO</span>
                                                        If no, give details
                                                        <input type="text" style="border: none; border-bottom: 1px solid black; width: 290px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    6. Are you now Pregnant?
                                                        <span style="margin: 0 5px 0 25px;">YES</span>
                                                        <span style="margin: 0 20px;"><b><u>NO</u></b></span>
                                                        Not Applicable
                                                        <img src="../../../app-assets/images/icoCheck.gif" width="12" style="margin-right: 10px;">
                                                        If yes, how many months
                                                        <input type="text" style="border: none; border-bottom: 1px solid black; width: 150px;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" style="margin-top: 10px;" cellpadding="5" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td valign="bottom">Date
                                                    <input type="text" style="border: none; border-bottom: 1px solid black;" value="{{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), 'F d, Y') : null }}">
                                                </td>
                                                <td valign="bottom">
                                                    Signature of Applicant
                                                    <span style="border-bottom: 1px solid black;">
                                                        <img width="180px" style="transform: translateY(25px);" src="{{ base64_decode($admission->patient->patient_signature) }}" alt="">
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="bottom">Date
                                                    <input type="text" style="border: none; border-bottom: 1px solid black;" value="{{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), 'F d, Y') : null }}"></td>
                                                <td valign="bottom">
                                                    Medical Examiner
                                                    <input type="text" style="border: none; border-bottom: 1px solid black; width: 220px;" value="TERESITA F. GONZALES M.D.">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <b>PAGE 1</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="min-height: 100vh;">
            <table width="800px" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th align="center" style="border: none !important;">
                            <img src="{{ URL::asset('app-assets/images/logo/imigration-cayman-island.png') }}" alt=""
                                width="120px">
                            <div style="margin: 0.5rem 0; font-size: 10px;">CAYMAN ISLANDS IMMIGRATION DEPARTMENT GUIDELINES
                                TO MEDICAL PRACTITIONERS</div>
                            <div width="100%" style="border: 1px solid #000;">
                                <h3 style="font-size: 20px; line-height: 5px;">MEDICAL EXAMINATIONS FORM</h3>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div width="100%" style="margin: 15px 0px 30px 0px;">
                                <h5 style="font-weight: 600; font-size: 13px; line-height: 0px;">PART 2</h5>
                                <h5 style="font-size: 13px; line-height: 0px;">
                                    MEDICAL EXAMINATION REPORT (TO BE COMPLETED BY MEDICAL EXAMINER)
                                </h5>
                            </div>

                            <div width="100%">
                                <table width="100%" cellspacing="5" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td width="2%" valign="bottom">1.</td>
                                            <td>
                                                <table width="60%" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td ><b>Yes</b></td>
                                                            <td><b>No</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="70%">Is the examinee personally know to you?</td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="bottom">&nbsp;</td>
                                            <td>
                                                <table width="60%" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td  width="70%">If no, did you check ID?</td>
                                                            <td width="17%"><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                                            <td ><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="bottom">2.</td>
                                            <td>
                                                <table width="85%" cellpadding="0" cellspacing="0">
                                                    <?php
                                                        function cmToFeetAndInches($cm) {
                                                            $inches = $cm / 2.54;
                                                            $feet = floor($inches / 12);
                                                            $remainingInches = round($inches % 12);
                                                            return array('feet' => $feet, 'inches' => $remainingInches);
                                                        }

                                                        $cm = optional($admission->exam_physical)->height ? optional($admission->exam_physical)->height : 0;
                                                        $height = cmToFeetAndInches($cm);

                                                        function kgToLbs($kg) {
                                                            $lbs = $kg * 2.20462;
                                                            return $lbs;
                                                        }

                                                        $kg = 78.5;
                                                        $weight = kgToLbs($kg);
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom" width="7%">Height</td>
                                                            <td valign="bottom" align="center" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ $height['feet'] }}
                                                            </td>
                                                            <td valign="bottom" width="5%"> Feet</td>
                                                            <td valign="bottom" align="center" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ $height['inches'] }}
                                                            </td>
                                                            <td valign="bottom">in.</td>
                                                            <td valign="bottom" width="5%">Weight</td>
                                                            <td valign="bottom" align="center" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ number_format($weight, 2) }}
                                                            </td>
                                                            <td valign="bottom" width="19%">lbs (in under clothes)</td>
                                                            <td valign="bottom" width="5%">Waist</td>
                                                            <td valign="bottom" width="10%" align="center" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_physical)->waist ?? null }}
                                                            </td>
                                                            <td width="15%">in.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="bottom">&nbsp;</td>
                                            <td>
                                                <table width="85%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom" width="30%">Chest measurements on respiration</td>
                                                            <td valign="bottom" align="center" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_physical)->respiration }}
                                                            </td>
                                                            <td valign="bottom" width="3%"> in,</td>
                                                            <td valign="bottom">on expiration</td>
                                                            <td valign="bottom" align="center" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_physical)->expiration }}
                                                            </td>
                                                            <td valign="bottom" width="35%">in.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="bottom">3.</td>
                                            <td>
                                                <table width="80%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom" width="35%">Blood pressure (two readings at rest (sitting)</td>
                                                            <td valign="bottom" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_physical)->bp_sitting }}
                                                            </td>
                                                            <td valign="bottom" width="10%">lying down</td>
                                                            <td valign="bottom" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_physical)->bp_laying_down }}

                                                            </td>
                                                            <td valign="bottom" width="13%">) 4. Pulse Rate</td>
                                                            <td valign="bottom" align="center" width="10%" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_physical)->pulse }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="bottom">4.</td>
                                            <td>
                                                <table width="80%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom" width="25%">Date and report of last E.C.G if any</td>
                                                            <td valign="bottom" width="55%" style="border-bottom: 1px solid black;">
                                                                {{ optional($admission->exam_ecg)->trans_date ? date_format(new DateTime(optional($admission->exam_ecg)->trans_date), 'M d, Y') : null }}, 
                                                                {{  optional($admission->exam_physical)->ecg_findings ?? null }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="bottom">5.</td>
                                            <td>
                                                <table width="80%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom">Are the following free from any pathological condition or abnormality.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>
                                                <table width="70%" cellpadding="3" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>Yes</td>
                                                            <td>No</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>(a) Skin</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->a1, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->a1, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(b) Throat & mouth</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->a7, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->a7, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(c) Eyes</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->a3, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->a3, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(d) Ears</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->a5, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->a5, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(e) Nose</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->a6, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->a6, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(f) Abdomen</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->b5, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->b5, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(g) Cardiovascular system</td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>(h) Respiratory system</td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>(i) Locomotor system</td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>(j) Nervous system</td>
                                                            <td><img src="../../../app-assets/images/icoCheck.gif" width="12"></td>
                                                            <td><img src="../../../app-assets/images/icoUncheck.gif" width="12"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>(k) Genito-urinary system</td>
                                                            <td>
                                                                @if($admission->exam_physical && in_array($admission->exam_physical->c2, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($admission->exam_physical && !in_array($admission->exam_physical->c2, ['Yes']))
                                                                    <img src="../../../app-assets/images/icoCheck.gif" width="12">
                                                                @else
                                                                    <img src="../../../app-assets/images/icoUncheck.gif" width="12">
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>
                                                <table width="85%" style="margin-top: 20px;" cellpadding="0" cellspacing="10">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom" width="65%">If you answered "no" to any of the above questions, please provide details</td>
                                                            <td contenteditable="true" valign="bottom" style="border-bottom: 1px solid black;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td contenteditable="true" colspan="2" width="100%" style="border-bottom: 1px solid black; padding: 5px;"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" cellspacing="0" cellpadding="5">
                                    <tr>
                                        <td width="2%" valign="top">6.</td>
                                        <td valign="top">
                                            <table width="85%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" width="38%">Is the examinee on any drug therapy at present?</td>
                                                        <td valign="bottom" width="5%" style="border-bottom: 1px solid black;">
                                                            <b>NO</b>
                                                        </td>
                                                        <td width="15%">If yes, give details</td>
                                                        <td contenteditable="true" valign="bottom" width="35%" style="border-bottom: 1px solid black;">
                                                    </tr>
                                                    <tr>
                                                        <td contenteditable="true" colspan="4" width="100%" style="border-bottom: 1px solid black; padding: 5px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td contenteditable="true" colspan="4" width="100%" style="border-bottom: 1px solid black; padding: 5px;">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="2%" valign="top">7.</td>
                                        <td valign="top">
                                            <table width="85%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" width="20%">Give details of any operations</td>
                                                        <td contenteditable="true" valign="bottom" width="35%" style="border-bottom: 1px solid black;">
                                                            {{ optional($admission->exam_physical)->operations }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td contenteditable="true" colspan="4" width="100%" style="border-bottom: 1px solid black; padding: 5px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td contenteditable="true" colspan="4" width="100%" style="border-bottom: 1px solid black; padding: 5px;">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="2%" valign="top">8.</td>
                                        <td valign="top">
                                            <table width="85%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" width="16%">Medical condition a.)</td>
                                                        <td contenteditable="true" valign="bottom" width="35%" style="border-bottom: 1px solid black;">
                                                            {{ optional($admission->exam_physical)->purpose }}
                                                        </td>
                                                        <td width="1%">b.)</td>
                                                        <td contenteditable="true" valign="bottom" width="35%" style="border-bottom: 1px solid black;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="bottom" width="15%" align="right">c.)</td>
                                                        <td contenteditable="true" valign="bottom" width="35%" style="border-bottom: 1px solid black; padding: 5px;"></td>
                                                        <td valign="bottom" width="1%">d.)</td>
                                                        <td contenteditable="true" valign="bottom" width="35%" style="border-bottom: 1px solid black; padding: 5px;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" cellpadding="5" cellspacing="0" style="margin-top: 20px;">
                                    <tbody>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>
                                                <table width="85%">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="bottom" width="25%">Date of examination</td>
                                                            <td valign="bottom" width="25%" style="border-bottom: 1px solid black;">
                                                                {{ $admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), 'M d, Y') : null }}
                                                            </td>
                                                            <td valign="bottom" width="0%">&nbsp;</td>
                                                            <td valign="bottom" width="35%">Signature Medical Examiner</td>
                                                            <td valign="bottom" width="15%" style="border-bottom: 1px solid black;" align="center">
                                                                <img src="../../../app-assets/images/signatures/md_gonzales_sig.png" width="250" height="60" style="object-fit: cover; transform: translate(0, 19px); margin-top: -25px;" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <br>
                            <b>PAGE 2</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</body>
</html>
