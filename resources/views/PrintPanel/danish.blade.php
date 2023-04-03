<html>

<head>
    <title>DANISH</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        body,
        table,
        tr,
        td {
            font-family: sans-serif;
            font-size: 10px;
        }

        .fontBoldLrg {
            font: bold 13px constantia;
        }

        .fontMed {
            font: normal 12px constantia;
        }

        @page {
            size: legal;
        }
    </style>
</head>

<body>
    <center>
        <table width="760" border="0" cellpadding="3" cellspacing="0" style="margin-top: 1rem">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="3" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="100%">
                                        <div width="100%"
                                            style="display: flex; align-items: center; justify-content: space-around;">
                                            <div width="50%">
                                                <span style="font-size: 12px; font-weight: 700;">DANISH MARITIME
                                                    AUTHORITY</span>
                                                <div>Parts A and B to be completed by the seafarer</div>
                                            </div>
                                            <div width="50%">
                                                <span style="font-size: 12px; font-weight: 700;">Medical certificate for
                                                    examination of seafarers</span>
                                                <div>To be used only for persons of 16 years of age or older</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <table width="760" border="0" class="brdAll" cellpadding="0" cellspacing="0"
                                        style="border-left: none">
                                        <tbody>
                                            <tr>
                                                <td width="5%" valign="top" align="center"
                                                    style="font-size: 12px; font-weight: 700; margin-top: 1rem;">A.</td>
                                                <td width="95%">
                                                    <table width="100%" class="brdTable" cellpadding="3"
                                                        cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="30%">
                                                                    Surname
                                                                    <div class="fontBoldLrg">
                                                                        {{ $admission->patient->lastname }}</div>
                                                                </td>
                                                                <td width="25%">
                                                                    Firstname
                                                                    <div class="fontBoldLrg">
                                                                        {{ $admission->patient->firstname }}</div>
                                                                </td>
                                                                <td width="35%">
                                                                    Date of birth in format "day-month-year"
                                                                    <div class="fontBoldLrg">
                                                                        {{ $admission->patient->patientinfo->birthdate }}
                                                                    </div>
                                                                </td>
                                                                <td width="10%">
                                                                    SEX(M/F)
                                                                    <div class="fontBoldLrg">
                                                                        {{ strtoupper($admission->patient->gender) }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    Occupation
                                                                    <div class="fontBoldLrg">
                                                                        {{ $admission->patient->patientinfo->occupation }}
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    Nationality
                                                                    <div class="fontBoldLrg">
                                                                        {{ $admission->patient->patientinfo->nationality }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    Home address (street, house number)
                                                                    <div class="fontBoldLrg">
                                                                        {{ $admission->patient->patientinfo->address }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    Postal code and town/city
                                                                    <div class="fontBoldLrg"></div>
                                                                </td>
                                                                <td>
                                                                    Country
                                                                    <div class="fontBoldLrg"></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" valign="top" align="center"
                                                    style="font-size: 12px; font-weight: 700; margin-top: 1rem;">B.</td>
                                                <td width="95%">
                                                    <table width="100%" class="brdTable" cellpadding="0"
                                                        cellspacing="0">
                                                        <tbody>
                                                            <td width="50%">
                                                                <table width="100%" class="brdTable" cellpadding="8"
                                                                    cellspacing="5">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="50%"><b>OWN DECLARATION</b>
                                                                            </td>
                                                                            <td width="15%">No</td>
                                                                            <td width="15%">Yes</td>
                                                                            <td width="20%">When (year)</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Have you previously served in Danish
                                                                                ships
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Have you previously undergone a medical
                                                                                examination for seafarers
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Have you been declared unfit for sea
                                                                                service or fit subject to limitations at
                                                                                any previous medical examination
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Have you been admitted to hospital
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Have you within the last two years had
                                                                                unbroken periods of sick leave of more
                                                                                than 30 days
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Do you have difficulties in orientating
                                                                                yourself under reduced lighting
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <b>Do you suffer or have you suffered
                                                                                    from any of the following diseases
                                                                                </b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Lung diseases, including pulmonary
                                                                                tuberculosis (TB)
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Stomach and intestinal diseases
                                                                                including
                                                                                gastric ulcer
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Heart and circulatory diseases
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kidney and bladder diseases
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Diabetes
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Ear diseases
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td width="50%">
                                                                <table width="100%" class="brdTable"
                                                                    cellpadding="8" cellspacing="5">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="50%"><b>OWN DECLARATION </b>
                                                                            </td>
                                                                            <td width="15%">No</td>
                                                                            <td width="15%">Yes</td>
                                                                            <td width="20%">When (year)</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Eye diseases
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pain in the back including lumbago and
                                                                                sciatica
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Epilepsy or other convulsive fits
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Mental disorders for which you have
                                                                                received medical treatment
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Alcohol- and drug abuse for which you
                                                                                have been treated
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Hypersensitive reactions, including
                                                                                asthma
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Eczema
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Serious accidents causing permanent
                                                                                disability
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Do you use medicine regularly
                                                                            </td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                    width="10"></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="85" colspan="4">
                                                                                I hereby give my consent that
                                                                                information about any previous diseases
                                                                                may be obtained from doctors, hospital,
                                                                                other treatment centres and public
                                                                                authorities
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" height="70">
                                                                                <div
                                                                                    style="display: flex; align-items: flex-start; justify-content: space-between; padding: 1rem; height: 100%;">
                                                                                    <div width="50%">Date <span
                                                                                            style="margin-left: 1rem;"></span>
                                                                                    </div>
                                                                                    <div width="50%">Signature:
                                                                                        <span
                                                                                            style="margin-left: 1rem;"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr height="20">
                                                <td></td>
                                                <td>
                                                    <span style="font-size: 12px; font-weight: 700;">Part
                                                        C to be completed by the doctor</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" valign="top" align="center"
                                                    style="font-size: 12px; font-weight: 700; margin-top: 1rem;">C.
                                                </td>
                                                <td>
                                                    <table width="760" cellspacing="10" cellpadding="0"
                                                        class="brdTable">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="font-size: 13px; padding: 0.3rem;">
                                                                    Doctor’s
                                                                    examination (see list of
                                                                    diseases and
                                                                    conditions)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" cellspacing="0"
                                                                        cellpadding="5" class="brdTable">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td colspan="3">Is the person
                                                                                    examined
                                                                                    known to you
                                                                                    and does he/she use you as a doctor?
                                                                                </td>
                                                                                <td colspan="3"><span><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span> No
                                                                                </td>
                                                                                <td colspan="3"><span><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>Yes
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3">The person examined
                                                                                    is
                                                                                    unknown to
                                                                                    me, but has satisfied me as to his
                                                                                    identity by showing
                                                                                    me
                                                                                </td>
                                                                                <td colspan="2"><span><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>
                                                                                    Danish
                                                                                    discharge book
                                                                                </td>
                                                                                <td colspan="2"><span><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>Driving
                                                                                    licence</td>
                                                                                <td colspan="2"><span><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>Passport
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3">Height (cm)
                                                                                    <span class="fontBoldLrg">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->height }}
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                                <td rowspan="2">BMI <br>
                                                                                    <span class="fontBoldLrg">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->bmi }}
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                                <td colspan="4"><b> Examination of
                                                                                        vision
                                                                                        and hearing</b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4">Weight (kg)
                                                                                    <span class="fontBoldLrg">
                                                                                        @if ($admission->exam_physical)
                                                                                            {{ $admission->exam_physical->weight }}
                                                                                        @endif
                                                                                    </span>
                                                                                </td>
                                                                                <td colspan="5">
                                                                                    Colour
                                                                                    Vision&nbsp;&nbsp;&nbsp;&nbsp;Colour
                                                                                    blindness....
                                                                                    <span
                                                                                        style="margin-left: 1rem;"><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>Yes
                                                                                    <span
                                                                                        style="margin-left: 1rem;"><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>No
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="2" width="40">
                                                                                    Urine</td>
                                                                                <td>Alb.</td>
                                                                                <td colspan="1">
                                                                                    <span>Negative</span>
                                                                                </td>
                                                                                <td colspan="1">Heart</td>
                                                                                <td colspan="1"><span>Normal</span>
                                                                                </td>
                                                                                <td colspan="5">Field of
                                                                                    vision&nbsp;&nbsp;&nbsp;&nbsp;Normal....
                                                                                    <span
                                                                                        style="margin-left: 1rem;"><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>Yes
                                                                                    <span
                                                                                        style="margin-left: 1rem;"><img
                                                                                            src="../../../app-assets/images/icoUnCheck.gif"
                                                                                            width="10"></span>No
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sugar</td>
                                                                                <td colspan="1">
                                                                                    <span>Negative</span>
                                                                                </td>
                                                                                <td>Lungs</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td>Vision acuity (See list par. V4)
                                                                                </td>
                                                                                <td>without correction</td>
                                                                                <td>with correction
                                                                                    normally used</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Blood pressure</td>
                                                                                <td><span>120/80</span>
                                                                                </td>
                                                                                <td>Abdomen</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td colspan="2">Right Eye.....</td>
                                                                                <td>20/25</td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Teeth</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td>Skin</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td colspan="2">Left Eye.....</td>
                                                                                <td>20/25</td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Eyes</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td>Extremities</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td colspan="2">Both eyes
                                                                                    simultaneously..
                                                                                </td>
                                                                                <td>Normal</td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                            <tr>
                                                                                <td>Oral cavity</td>
                                                                                <td><span>Normal</span></td>
                                                                                <td>Hernia</td>
                                                                                <td><span>Negative</span></td>
                                                                                <td>Hearing (see V1)
                                                                                </td>
                                                                                <td>Normal speech</td>
                                                                                <td>Normal speech at
                                                                                    a distance of 4 m</td>
                                                                                <td>Otoscopy</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Reflexes</td>
                                                                                <td><span></span></td>
                                                                                <td>Spinal column</td>
                                                                                <td><span>Negative</span></td>
                                                                                <td>Without hearing aid
                                                                                </td>
                                                                                <td>Normal</td>
                                                                                <td>Normal</td>
                                                                                <td>Right ear <span></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="6" colspan="4">
                                                                                    Special remarks (if any)</td>
                                                                                <td>With hearing aid</td>
                                                                                <td><span></span></td>
                                                                                <td style="background: gray;"></td>
                                                                                <td>Left ear <span></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Result:</b> </td>
                                                                                <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                        width="10"> Fit for
                                                                                    look-out duty</td>
                                                                                <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                        width="10"> Unfit for
                                                                                    look-out duty</td>
                                                                                <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                        width="10">Unfit for
                                                                                    look-out duty and engine-room duty
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2">Is the examined in
                                                                                    your opinion fit for
                                                                                    duty?...............................
                                                                                </td>
                                                                                <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                        width="10"> Yes</td>
                                                                                <td><img src="../../../app-assets/images/icoUnCheck.gif"
                                                                                        width="10"> No</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4">If “no”, please
                                                                                    state the reason</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4">If fitness is
                                                                                    conditional, state limitations in
                                                                                    regard to</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="50" colspan="2">a)
                                                                                    Time</td>
                                                                                <td height="50">b) Field of work
                                                                                </td>
                                                                                <td height="50">c) Trading area</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4">The certificate
                                                                                    should be forwarded to the Danish
                                                                                    Maritime Authority by the master or
                                                                                    the shipping company.</td>
                                                                                <td colspan="4">
                                                                                    Place and date, doctor’s stamp and
                                                                                    signature
                                                                                    S-803E-2000
                                                                                    FILIPINO
                                                                                    TERESITA F. GONZALES, M.D.
                                                                                    LIC. NO. 055997
                                                                                    MERITA DIAGNOSTIC CLINIC INC. 5th
                                                                                    Floor Jettac
                                                                                    Bldg 920 Pres. Quirino Ave.cor. San
                                                                                    Antonio, Malate, Manila
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
