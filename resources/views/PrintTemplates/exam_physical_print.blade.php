<html>

<head>
    <title>PHYSICAL TEST</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    .aa {
        font-size: 10px;
    }

    table {
        font-family: arial;
        font-size: 9px;
    }
    #divImage {
        width: 100%;
        height: 0px;
        position: relative;
        margin-bottom: 18px;
    }

    #divImage img {
        position: absolute;
        width: 140px;
        height: 42px;
        top: 54%;
        left: 35%;
        object-fit: cover;
    }
    @page {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <center>
        <table width="816px" id="physical" border="0" cellpadding="2" cellspacing="2">
            <tr>
                <td width="100%">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="15%" rowspan="2" align="left"><img src="../../../app-assets/images/logo/logo.jpg" width="116"
                                    height="104" alt="" /></td>
                            <td align="center"><b style="font-size: 20px">

                                </b></td>
                            <td width="19%" rowspan="2">
                                <p style="font-size: 8px">
                                    <font style="font-size: 8px">

                                    </font>
                                </p>
                                <p style="font-size: 8px">PATIENT NO:<b>
                                        {{$admission->patientcode}}
                                    </b><br />
                                    <input name="employment" id="employment" type="hidden" value="" />
                                    @if($admission->employment == "Sea-Based")
                                    @endif
                                    @if($admission->employment=="Land-Based")
                                    @endif
                                    <br />
                                    CONTROL NO :<b>

                                    </b>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td width="66%" align="center" valign="top">
                                <br />
                                Tel. No.: | Fax No.:
                                <br />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                                <hr />
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><b>DOH Accreditation Number : </b>RLS 13-761-2011</td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <table width="100%" border="1" cellspacing="0" cellpadding="2">
                                                <tr>
                                                    <td style="text-transform: uppercase;"><b >SURNAME :</b> <u>
                                                            {{$admission->lastname . " " . $admission->suffix}}
                                                        </u>
                                                    </td>
                                                    <td style="text-transform: uppercase;"><b>FIRST NAME:</b> <u>
                                                            {{$admission->firstname}}
                                                        </u></td>
                                                    <td style="text-transform: uppercase;"><b>MIDDLE NAME:</b> <u>
                                                            {{$admission->middlename}}
                                                        </u></td>
                                                </tr>
                                                <tr>
                                                    <td><b>NATIONALITY :</b><u>
                                                            {{$patientInfo->nationality}}
                                                        </u></td>
                                                    <td><b>PASSPORT NUMBER : </b> <u>
                                                            {{$patientInfo->passportno}}
                                                        </u></td>
                                                    <td><b>SEAMAN'S BOOK NUMBER : </b>
                                                        {{$patientInfo->srbno}}
                                                    </td>
                                                </tr>
                                            </table>
                                            <table width="100%" border="1" cellspacing="0" cellpadding="2">
                                                <tr>
                                                    <td width="54%">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="43%"><b>PLACE AND DATE OF BIRTH :</b></td>
                                                                <td>
                                                                    {{$patientInfo->birthplace}}
                                                                    ,
                                                                    {{$patientInfo->birthdate}}
                                                                    ,
                                                                    {{$admission->age}}
                                                                    y/o</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="13%"><b>GENDER : </b>
                                                        {{$admission->gender}}
                                                    </td>
                                                    <td width="18%"><b>CIVIL STATUS :</b>
                                                        {{$patientInfo->maritalstatus}}
                                                    </td>
                                                    <td width="15%"><b>RELIGION : </b>
                                                        {{$patientInfo->religion}}
                                                    </td>
                                                </tr>
                                            </table>
                                            <table width="100%" border="1" cellspacing="0" cellpadding="2">
                                                <tr>
                                                    <td width="49%" rowspan="2" valign="top"><b>PERMANENT HOME ADDRESS :
                                                        </b>
                                                        {{$patientInfo->address}}
                                                    </td>
                                                    <td width="22%"><b>CONTACT NUMBER :</b></td>
                                                    <td width="29%">
                                                        {{$patientInfo->contactno}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>POSITION APPLIED FOR :</b></td>
                                                    <td>
                                                        {{$admission->position_applied}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                            <td><b>I.PAST MEDICAL HISTORY. Has applicant suffered from or been told he has any of the
                                    following : (Answer yes or no)</b></td>
                        </tr>
                    </table>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="25%" style="font-size: 10px"><b>Head or Neck Injury :</b></td>
                                        <td width="4%">
                                            {{$exam->sick1 == "Yes" || $exam->sick1 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td width="28%" style="font-size: 10px"><b>Other Lung Disorders :</b></td>
                                        <td width="8%">
                                            {{$exam->sick11 == "Yes" || $exam->sick11 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td width="31%" style="font-size: 10px"><b>Other Abdominal Disorder :</b></td>
                                        <td width="4%">
                                            {{$exam->sick21 == "Yes" || $exam->sick21 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Frequent Headaches :</b></td>
                                        <td>
                                            {{$exam->sick2 == "Yes" || $exam->sick2 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>High Blood Pressure :</b></td>
                                        <td>
                                            {{$exam->sick12 == "Yes" || $exam->sick12 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Kidney or Bladder Disorder :</b></td>
                                        <td>
                                            {{$exam->sick22 == "Yes" || $exam->sick22 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Frequent Dizziness :</b></td>
                                        <td>
                                            {{$exam->sick3 == "Yes" || $exam->sick3 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Heart Disease/Chest Pain :</b></td>
                                        <td>
                                            {{$exam->sick13 == "Yes" || $exam->sick13 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Back Injury: Joint Pain/Arthritis/Rheumatic :</b>
                                        </td>
                                        <td>
                                            {{$exam->sick23 == "Yes" || $exam->sick23 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" style="font-size: 10px">
                                            <p><b>Fainting Spells, Fits,Seizures or Other Neurological Disorders :</b>
                                            </p>
                                        </td>
                                        <td rowspan="2">
                                            {{$exam->sick4 == "Yes" || $exam->sick4 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Rheumatic Fever :</b></td>
                                        <td>
                                            {{$exam->sick14 == "Yes" || $exam->sick14 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Genetic,Hereditary or Familial Disorders:</b>
                                        </td>
                                        <td>
                                            {{$exam->sick24 == "Yes" || $exam->sick24 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td style="font-size: 10px"><b> Tropical Diseases(e.g Malaria,Filariasis</br>
                                                <br>
                                                Schistosomiasis - Specify Date):</br>
                                            </b></td>
                                        <td>
                                            {{$exam->sick25 == "Yes" || $exam->sick25 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 10px"><b>Insomnia or Sleep Disorders :</b>
                                        </td>
                                        <td>
                                            {{$exam->sick5 == "Yes" || $exam->sick5 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Diabetes Mellitus :</b></td>
                                        <td>
                                            {{$exam->sick15 == "Yes" || $exam->sick15 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Sexually Transmitted Diseases :</b></td>
                                        <td>
                                            {{$exam->sick26 == "Yes" || $exam->sick26 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Depression, Other Mental Disorders :</b></td>
                                        <td>
                                            {{$exam->sick6 == "Yes" || $exam->sick6 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Other Endocrine Disorder (e.g Goiter) :</b></td>
                                        <td>
                                            {{$exam->sick16 == "Yes" || $exam->sick16 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Asthma :</b></td>
                                        <td>
                                            {{$exam->sick27 == "Yes" || $exam->sick27 == 1 ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Trachoma,Other Eye Disorders :</b></td>
                                        <td>
                                            {{$exam->sick7 == "Yes" || $exam->sick7 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Cancer or Tumor :</b></td>
                                        <td>
                                            {{$exam->sick17 == "Yes" || $exam->sick17 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Allergies (Specify) :</b></td>
                                        <td>
                                            {{$exam->allergies}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Deafness, Other Ear Disorders :</b></td>
                                        <td>
                                            {{$exam->sick8 == "Yes" || $exam->sick8 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Blood Disorders :</b></td>
                                        <td>
                                            {{$exam->sick18 == "Yes" || $exam->sick18 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Operations (Specify) :</b></td>
                                        <td>
                                            {{$exam->operations}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Nose or Throat Disorders :</b></td>
                                        <td>
                                            {{$exam->sick9 == "Yes" || $exam->sick9 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Stomach Pain,Gastritis or Ulcer :</b></td>
                                        <td>
                                            {{$exam->sick19 == "Yes" || $exam->sick19 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px"><b>Tuberculosis :</b></td>
                                        <td>
                                            {{$exam->sick10 == "Yes" || $exam->sick10 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td style="font-size: 10px"><b>Liver Gall Bladder diseases/Jaundice :</b></td>
                                        <td>
                                            {{$exam->sick20 == "Yes" || $exam->sick20 == 1 ? "Yes" : "No"}}
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"><b class="aa">Others :</b>
                                            {{$exam->others}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr height="3">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td width="20%"><img src="../../../app-assets/images/profiles/{{$admission->patient_image}}"
                                    alt="Patient Picture" width="117" height="101"
                                    style="border: 1px solid gray; margin-left: 10px" /></td>
                            <td width="80%">I hereby permit the DOH/MARINA/POEA and the undersigned physician to furnish
                                such information the company may need pertaining to my health status and other pertinent
                                findings and do hereby release them from any and legal responsibility by doing so.I also
                                certify that my medical history contained above is true and any false statement will
                                disqualify me from my employment,benefit and claim.</td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td width="37%">&nbsp;</td>
                            <td width="35%">
                                <table width="250" border="0" cellpadding="2" cellspacing="2">
                                    <tr>&nbsp;
                                        <td align="center" style="border-bottom: 1px black solid">
                                                @if($admission->patient_signature)
                                                <img src="@php echo base64_decode($admission->patient_signature) @endphp" width="150" height="25" style="object-fit: cover;" class="signature-taken" />
                                                @elseif ($admission->signature)
                                                    <img src="data:image/jpeg;base64,{{$admission->signature}}" class="signature-taken"  width="150" height="25" style="object-fit: cover;"/>
                                                @else 
                                                    <div style="width: 150px;height: 40px;"></div>
                                                @endif
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>&nbsp;Signature of Examinee</b></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="25%">
                                <table width="250" border="0" cellpadding="2" cellspacing="2">
                                    <tr>
                                        <td align="center" style="border-bottom: 1px black solid">
                                            {{$admission->agencyname}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>Name of Employer</b></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><b>II.PHYSICAL EXAMINATION</b></td>
                        </tr>
                    </table>
                    <table width="100%" border="1" cellspacing="0" cellpadding="2">
                        <tr>
                            <td width="17%">&nbsp;<b>Weight(kg) :</b>
                               {{$exam->weight}}
                            </td>
                            <td width="17%">&nbsp;<b>Height(cm) :</b>
                                {{$exam->height}}
                            </td>
                            <td width="15%">&nbsp;<b>BMI :</b>
                                {{$exam->bmi}}
                            </td>
                            <td width="21%">&nbsp;<b>Blood Pressure :</b>
                                {{$exam->systollic}}
                                /
                                {{$exam->diastollic}}
                            </td>
                            <td width="12%">&nbsp;<b>Pulse : </b>
                                {{$exam->pulse}}
                            </td>
                            <td width="18%">&nbsp;<b>Respiratory Rate:</b>
                                {{$exam->respiratory_rate}}
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="5" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="38%" valign="top">
                                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="20%" align="center"><b>Vision</b></td>
                                        <td width="40%" align="center"><b>Far vision</b></td>
                                        <td width="40%" align="center"><b>Near Vision</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>Unaided</b></td>
                                        <td align="center">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="20%">OD</td>
                                                    <td width="30%">
                                                        {{$exam->ufar_vision1}}
                                                    </td>
                                                    <td width="20%">OS</td>
                                                    <td width="30%">
                                                        {{$exam->ufar_vision2}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="20%">OD</td>
                                                    <td width="30%">
                                                        {{$exam->unear_vision1}}
                                                    </td>
                                                    <td width="20%">OS</td>
                                                    <td width="30%">
                                                        {{$exam->unear_vision2}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="22" align="center"><b>Aided</b></td>
                                        <td align="center">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="20%">OD</td>
                                                    <td width="30%">
                                                        {{$exam->cfar_vision1}}
                                                    </td>
                                                    <td width="20%">OS</td>
                                                    <td width="30%">
                                                        {{$exam->cfar_vision2}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="20%">OD</td>
                                                    <td width="30%">
                                                        {{$exam->cnear_vision1}}
                                                    </td>
                                                    <td width="20%">OS</td>
                                                    <td width="30%">
                                                        {{$exam->cnear_vision2}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="2%">&nbsp;</td>
                            <td width="24%" valign="top">
                                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center"><b>Ishihara Color Vision</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            @if($exam_ishihara)
                                                <b>(
                                                {{preg_match('/Adequate/i', $exam_ishihara->result)}}
                                                )</b>
                                            @endif
                                            Adequate
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="22" align="center">
                                            @if($exam_ishihara)
                                                <b>(
                                                {{preg_match('/Defective/i', $exam_ishihara->result)}}
                                                )</b>
                                            @endif
                                            Defective
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="4%">&nbsp;</td>
                            <td width="32%">
                                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="7%" align="center"><b>Ear</b></td>
                                        <td colspan="2" align="center"><b>Hearing by Audiometry</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>RIght</b></td>
                                        <td width="17%"><b>()
                                            </b> Adequate </td>
                                        <td width="16%"><b>()
                                            </b> Inadequate </td>
                                    </tr>
                                    <tr>
                                        <td height="22" align="center"><b>Left</b></td>
                                        <td><b>()
                                            </b> Adequate </td>
                                        <td><b>()
                                            </b> Inadequate</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" valign="top" height="3">&nbsp;</td>
                        </tr>
                    </table>
                    <table width="100%" border="1" cellspacing="0" cellpadding="2">
                        <tr> </tr>
                        <tr>
                            <td width="14%" align="center">A</td>
                            <td width="4%" align="center">Yes</td>
                            <td width="15%" align="center">Significant Findings</td>
                            <td width="18%" align="center">B</td>
                            <td width="3%" align="center">Yes</td>
                            <td width="14%" align="center">Significant Findings</td>
                            <td width="15%" align="center">C</td>
                            <td width="3%" align="center">Yes</td>
                            <td width="14%" align="center">Significant Findings</td>
                        </tr>
                        <tr>
                            <td>Skin</td>
                            <td align="center"><b>
                                    {{$exam->a1 ? "Yes" : ""}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a1_findings}}</font>
                                </b></td>
                            <td>Neck,Lymph Node,Thyroid</td>
                            <td align="center"><b>
                                    {{$exam->b1 ? "Yes" : ""}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->b1_findings}}</font>
                                </b></td>
                            <td>Anus-Rectum</td>
                            <td align="center"><b>
                                    {{$exam->b1 ? "Yes" : ""}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->c1_findings}}</font>
                                </b></td>
                        </tr>
                        <tr>
                            <td>Head,Neck,Scalp</td>
                            <td align="center"><b>
                                    {{$exam->a2}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a2_findings}}</font>
                                </b></td>
                            <td>Breast,Axilla,Chest</td>
                            <td align="center"><b>
                                    {{$exam->b2}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->b2_findings}}</font>
                                </b></td>
                            <td>Genito-Urinary Sys</td>
                            <td align="center"><b>
                                    {{$exam->c2}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->c2_findings}}</font>
                                </b></td>
                        </tr>
                        <tr>
                            <td>Eyes,external</td>
                            <td align="center"><b>
                                    {{$exam->a3}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a3_findings}}</font>
                                </b></td>
                            <td>Lungs</td>
                            <td align="center"><b>
                                    {{$exam->b3}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->b3_findings}}</font>
                                </b></td>
                            <td>Inguinals,Genitals</td>
                            <td align="center"><b>
                                    {{$exam->c3}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->c3_findings}}</font>
                                </b></td>
                        </tr>
                        <tr>
                            <td>Pupils</td>
                            <td align="center"><b>
                                    {{$exam->a4}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a4_findings}}</font>
                                </b></td>
                            <td>Heart</td>
                            <td align="center"><b>
                                    {{$exam->b4}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->b4_findings}}</font>
                                </b></td>
                            <td>Extremities</td>
                            <td align="center"><b>
                                    {{$exam->c4}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->c4_findings}}</font>
                                </b></td>
                        </tr>
                        <tr>
                            <td>Ears</td>
                            <td align="center"><b>
                                    {{$exam->a5}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a5_findings}}</font>
                                </b></td>
                            <td>Abdomen</td>
                            <td align="center"><b>
                                    {{$exam->b5}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->b5_findings}}</font>
                                </b></td>
                            <td>Reflexes</td>
                            <td align="center"><b>
                                    {{$exam->c5}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->c5_findings}}</font>
                                </b></td>
                        </tr>
                        <tr>
                            <td>Nose,Sinuses</td>
                            <td align="center"><b>
                                    {{$exam->a6}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a6_findings}}</font>
                                </b></td>
                            <td>Back</td>
                            <td align="center"><b>
                                    {{$exam->b6}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->b6_findings}}</font>
                                </b></td>
                            <td>Dental(Teeth/Gums)</td>
                            <td align="center"><b>
                                    {{$exam->c6}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->c6_findings}}</font>
                                </b></td>
                        </tr>
                        <tr>
                            <td>Mouth,Throat</td>
                            <td align="center"><b>
                                    {{$exam->a7}}
                                </b></td>
                            <td align="center"><b>
                                    <font size="1">{{$exam->a7_findings}}</font>
                                </b></td>
                            <td>&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                            <td><b>III.RESULT OF ANCILLARY EXAMINATIONS.</b></td>
                        </tr>
                    </table>
                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td><b>A.Chest x-ray : </b>
                                            @if ($exam_xray)
                                                {{$exam_xray->xray_no}}
                                            @endif
                                           
                                        </td>
                                        <td width="21%"><b>E.Stool Exam :</b></td>
                                        <td width="11%">
                                            <input name="stool" type="checkbox" id="stool" value="normal"
                                               {{preg_match('/normal/i', $exam->stool) ? "checked" : ""}} disabled />
                                            Normal
                                        </td>
                                        <td width="37%">
                                            <input name="stool" type="checkbox" id="stool" value="findings"
                                            {{preg_match('/findings/i', $exam->stool) ? "checked" : ""}} disabled />
                                            With Findings <b> </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" valign="top">
                                            
                                            <br>
                                        </td>
                                        <td><b>F.HBsAg :</b></td>
                                        <td>
                                            <input name="hbsag" type="checkbox" id="hbsag" value="reactive" disabled
                                                @if ($examlab_hepa)
                                                    {{preg_match('/reactive/i', $examlab_hepa->hbsag_result) ? "checked" : ""}}
                                                @endif />
                                            Reactive
                                        </td>
                                        <td>
                                            <input name="hbsag" type="checkbox" id="hbsag" value="nonreactive" disabled
                                                @if ($examlab_hepa)
                                                    {{preg_match('/Non Reactive/i', $examlab_hepa->hbsag_result) ? "checked" : ""}}
                                                @endif />
                                            Non-Reactive
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>G.HIV/AIDS Test :</b></td>
                                        <td>
                                            <input name="hiv" type="checkbox" id="hiv" value="reactive" disabled
                                                @if ($examlab_hiv)
                                                    {{preg_match('/reactive/i', $examlab_hiv->result) ? "checked" : ""}}
                                                @endif  />
                                            Reactive
                                        </td>
                                        <td>
                                            <input name="hiv" type="checkbox" id="hiv" value="nonreactive" disabled
                                                @if ($examlab_hiv)
                                                    {{preg_match('/Non Reactive/i', $examlab_hiv->result) ? "checked" : ""}}
                                                @endif />
                                            Non-Reactive
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br>
                                            <b>B.ECG: </b>
                                            @if ($exam_ecg)
                                                {{$exam_ecg->ecg}}
                                            @endif
                                        </td>
                                        <td><b>H.RPR :</b></td>
                                        <td>
                                            <input name="rph" type="checkbox" id="rph" value="reactive"
                                                disabled />
                                            Reactive
                                        </td>
                                        <td>
                                            <input name="rph" type="checkbox" id="rph" value="nonreactive"
                                                 disabled />
                                            Non-Reactive
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if ($exam_ecg)
                                                {{$exam_ecg->remarks}}
                                            @endif
                                            <br>
                                            &nbsp;
                                        </td>
                                        <td><b>I. Blood Type (Specify) :</b></td>
                                        <td>
                                            {{$exam->blood_type}}
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>C.CBC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="cbc" type="checkbox" id="cbc" value="normal"
                                                     {{preg_match('/normal/i', $exam->cbc) ? "checked" : ""}} disabled />
                                            </b> Normal<b>
                                                <input name="cbc" type="checkbox" id="cbc" value="with findings"
                                                {{preg_match('/findings/i', $exam->cbc) ? "checked" : ""}} disabled />
                                            </b>With Findings </td>
                                        <td colspan="3"><b>J. Psychological Test : </b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><br>
                                                &nbsp;
                                        </td>
                                        <td colspan="3" valign="top">
                                           @if ($exam_psycho)
                                               {{$exam_psycho->conclusion}}
                                           @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>D.Urinalysis
                                                <input name="urinalysis" type="checkbox" id="urinalysis" value="normal"
                                                    {{preg_match('/normal/i', $exam->urinalysis) ? "checked" : ""}} disabled />
                                            </b>Normal <b>
                                                <input name="urinalysis" type="checkbox" id="urinalysis"
                                                    value="with findings"
                                                    {{preg_match('/findings/i', $exam->urinalysis) ? "checked" : ""}} disabled />
                                            </b>With Findings </td>
                                        <td><b>K.Additional Tests(Specify) :</b></td>
                                        <td>&nbsp;</td>
                                        <td><b>L.Others :</b></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">&nbsp;</td>
                                        <td colspan="2" valign="top">
                                        <td valign="top"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                            <td><b>IV. RECOMMENDATION.</b></td>
                        </tr>
                    </table>
                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><br>
                                    The Abovementioned Candidate is:<b>
                                    {{ $exam->fit == 'Fit' ? $exam->fit . ' FOR SEA DUTY' : ''}}
                                </b><br>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">
                                <p><span style="font-size: 11px">Date of PEME(Fitness Date) :</span> <strong>
                                        <?=$admission->trans_date?>
                                    </strong></p>
                            </td>
                            <td valign="top">
                                <p><span style="font-size: 11px">Date of Medical Examination:</span> <strong>
                                        <?=$exam->trans_date?>
                                    </strong></p>
                            </td>
                            <td><span style="font-size: 11px">Valid Until </span>: <strong>
                                    
                                </strong> <br>
                                <span style="font-size: 11px">Provided the seafarer is deployed within 90 days from the
                                    date of fitness</span>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>&quot;Art. 1.2.6(b): the seafarer concerned is not suffering from any medical
                                    condition likely to be aggravated by sea service or to render the seafarer unfit for
                                    such service or to endanger the health of other persons onboard(of the MLC
                                    2006)&quot;</p>
                                <p>In accordance with Medical Examination (Seafarers) Convention 1946 (ILO no.73) and
                                    STCW 1978/1995 as Amended.</p>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="14%">

                                        </td>
                                        <td width="42%">
                                            <table width="260" border="0">
                                                <tr>
                                                    <td width="227" align="center" style="border-bottom: 1px black solid">
                                                        @if ($technician1)
                                                            <img src="{{$technician1->signature}}" width="130" /> <br>
                                                            {{$technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><b>Name and Signature of Examining Physician</b>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="44%">
                                            <table width="250" border="0">
                                                <tr>
                                                    <td align="center" style="border-bottom: 1px black solid">
                                                        @if($medical_director)
                                                            <img src="{{$medical_director->signature}}" width="130" /> <br>
                                                            {{$medical_director->firstname . " " . $medical_director->middlename . " " . $medical_director->lastname . ", " . $medical_director->title}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><b>Medical Director</b></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="14%">&nbsp;</td>
                                        <td width="17%">PRC NO.-
                                            {{$technician1->license_no}}
                                        </td>
                                        <td width="25%">Expiry -
                                            {{$technician1->license_expdate}}
                                        </td>
                                        <td width="17%">PRC No. -
                                            
                                        </td>
                                        <td width="27%">Expiry -
                                            
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>NOTE: This certificate does not cover diseases that would require special
                                            procedures and examination for their detection such as bronchiectasis, which
                                            needs bronchography,peptic ulcer/gall bladder diseases which need chole GI
                                            series,certain kidney problems which needs IVP and also those which are
                                            asymptomatic at the time of examination including pregnancy test and
                                            psychological test.</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>