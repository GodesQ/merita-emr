<html>

<head>
    <title>MEDICAL FORM</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: serif;
        font-size: 11.5px;
    }

    .fontBoldLrg {
        font: bold 13px serif;
    }

    .fontMed {
        font: normal 12px serif;
    }
    @page {
        size: legal;
        margin: 0;
    }
    </style>
</head>
<body>
    <center>
        <table width="760" border="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="10%">&nbsp;</td>
                                    <td align="center">
                                        <span style="font-size: 30px; font-weight: 800;font-family: serif; color: 'lightgreen;'">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                        style="margin-bottom: 10px">
                                    <div style="font-size: 12px;">DOH Accrediation NO. 13-010-1820-MF-2 <br>
                                        5TH Flr. Jettac Bldg, 920 Pres Quirino Ave, Cor. San Antonio St. Malate Manila <br>
                                        Tel No. (02) 310-0595 Email: meritaclinic@gmail.com
                                    </div>
                                    </td>
                                    <td>
                                        <div style="border: 1px solid black; width:120px; height: 120px; display: flex; justify-content: center; align-items: center;">
                                            @if($admission->patient_image)
                                            <img src="../../../app-assets/images/profiles/{{$admission->patient_image}}"
                                                alt="Patient Picture"
                                                width="93%"
                                                height="93%"
                                                class="brdAll">
                                            @else
                                            <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                alt="Patient Picture"
                                                width="100%"
                                                height="100%"
                                                class="brdAll">
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 0.2rem;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" class="brdAll" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <b>MEDICAL EXAMINATION REPORT FOR SEAFERERS</b> <br>
                                                        Approved and authorized by the Department of Health (DOH) and the Maritime Industry Authority (MARINA) of the Republic of the Philippines  <br>
                                                        Issued in compliance with STCW Convention, 1978, as amended Section A-1/9 Paragraph 7 and the Maritime Labour Convention, 2006 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" class="brdTable" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="fontBoldLrg">Surname / Lastname : <br>
                                                        <span>{{ $admission->lastname }}</span>
                                                    </td>
                                                    <td class="fontBoldLrg">Given Name : <br> 
                                                        <span>{{ $admission->firstname }}</span>
                                                    </td>
                                                    <td class="fontBoldLrg">Middle Name : <br> 
                                                        <span>{{ $admission->middlename }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="fontBoldLrg">Company/Agency<br>
                                                        <span>{{ $admission->agencyname }}</span>
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
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 0.2rem;">
                            <tbody>
                                <tr>
                                    <td align="center"><span style="font-weight: 700;">1. MEDICAL HISTORY: </span> Has applicant suffered form, been diagnosed, sought advice or treatment form a medical doctor on the following <br>
                                        Conditions. Please Check
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="2" class="brdTable"  cellspacing="0" style="margin-top: 0.2rem;">
                            <tbody>
                                <tr>
                                    <td style="border: none !important;">&nbsp;</td>
                                    <td style="border: none !important;">YES</td>
                                    <td style="border: none !important;">NO</td>
                                    <td style="border: none !important;">&nbsp;</td>
                                    <td style="border: none !important;">YES</td>
                                    <td style="border: none !important;">NO</td>
                                    <td style="border: none !important;">&nbsp;</td>
                                    <td style="border: none !important;">YES</td>
                                    <td style="border: none !important;">NO</td>
                                </tr>
                                <tr>
                                    <td align="center">Head and Neck Injury</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->head_and_neck_injury == 'Yes' ||
                                            $medical_history->head_and_neck_injury == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->head_and_neck_injury == 'No' ||
                                            $medical_history->head_and_neck_injury == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Other Lung disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->other_lung_disorder == 'Yes' ||
                                            $medical_history->other_lung_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->other_lung_disorder == 'No' ||
                                            $medical_history->other_lung_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Gynecological Disorders</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->gynecological_disorder == 'Yes' ||
                                            $medical_history->gynecological_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->gynecological_disorder == 'No' ||
                                            $medical_history->gynecological_disorder == '0')
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
                                    <td align="center">Frequent Headache</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->frequent_headache == 'Yes' ||
                                            $medical_history->frequent_headache == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->frequent_headache == 'No' ||
                                            $medical_history->frequent_headache == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">High Blood Pressure</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->high_blood_pressure == 'Yes' ||
                                            $medical_history->high_blood_pressure == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->high_blood_pressure == 'No' ||
                                            $medical_history->high_blood_pressure == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Last Menstrual Period</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->last_menstrual_period == 'Yes' ||
                                            $medical_history->last_menstrual_period == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->last_menstrual_period == 'No' ||
                                            $medical_history->last_menstrual_period == '0')
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
                                    <td align="center">Frequent Dizziness</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->frequent_dizziness == 'Yes' ||
                                            $medical_history->frequent_dizziness == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->frequent_dizziness == 'No' ||
                                            $medical_history->frequent_dizziness == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Heart Disease / Vascular</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->heart_disease_or_vascular == 'Yes' ||
                                            $medical_history->heart_disease_or_vascular == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->heart_disease_or_vascular == 'No' ||
                                            $medical_history->heart_disease_or_vascular == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Pregnancy</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->pregnancy == 'Yes' ||
                                            $medical_history->pregnancy == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->pregnancy == 'No' ||
                                            $medical_history->pregnancy == '0')
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
                                    <td align="center">Fainting Spells, Fits</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->fainting_spells_fits == 'Yes' ||
                                            $medical_history->fainting_spells_fits == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->fainting_spells_fits == 'No' ||
                                            $medical_history->fainting_spells_fits == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Chest pain</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->chest_pain == 'Yes' ||
                                            $medical_history->chest_pain == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->chest_pain == 'No' ||
                                            $medical_history->chest_pain == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Kidney or Bladder Disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->kidney_or_bladder_disorder == 'Yes' ||
                                            $medical_history->kidney_or_bladder_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->kidney_or_bladder_disorder == 'No' ||
                                            $medical_history->kidney_or_bladder_disorder == '0')
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
                                    <td align="center">Seizures</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->seizures == 'Yes' ||
                                            $medical_history->seizures == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->seizures == 'No' ||
                                            $medical_history->seizures == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Rheumatic Fever</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->rheumatic_fever == 'Yes' ||
                                            $medical_history->rheumatic_fever == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->rheumatic_fever == 'No' ||
                                            $medical_history->rheumatic_fever == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Back Injury / Joint pain</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->back_injury_or_joint_pain == 'Yes' ||
                                            $medical_history->back_injury_or_joint_pain == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->back_injury_or_joint_pain == 'No' ||
                                            $medical_history->back_injury_or_joint_pain == '0')
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
                                    <td align="center">Other neurological disorders</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->other_neurological_disorders == 'Yes' ||
                                            $medical_history->other_neurological_disorders == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->other_neurological_disorders == 'No' ||
                                            $medical_history->other_neurological_disorders == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Diabetes Mellitus</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->diabetes_mellitus == 'Yes' ||
                                            $medical_history->diabetes_mellitus == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->diabetes_mellitus == 'No' ||
                                            $medical_history->diabetes_mellitus == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Arthritis</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->arthritis == 'Yes' ||
                                            $medical_history->arthritis == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->arthritis == 'No' ||
                                            $medical_history->arthritis == '0')
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
                                    <td align="center">Insomia or Sleep disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->insomia_or_sleep_disorder == 'Yes' ||
                                            $medical_history->insomia_or_sleep_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->insomia_or_sleep_disorder == 'No' ||
                                            $medical_history->insomia_or_sleep_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Endocrine disorders (goiter)</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->endocrine_disorders == 'Yes' ||
                                            $medical_history->endocrine_disorders == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->endocrine_disorders == 'No' ||
                                            $medical_history->endocrine_disorders == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Genetic, Heredity or Familial Dis.</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->genetic_heredity_or_familial_dis == 'Yes' ||
                                            $medical_history->genetic_heredity_or_familial_dis == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->genetic_heredity_or_familial_dis == 'No' ||
                                            $medical_history->genetic_heredity_or_familial_dis == '0')
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
                                    <td align="center">Depression, other mental disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->depression_other_mental_disorder == 'Yes' ||
                                            $medical_history->depression_other_mental_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->depression_other_mental_disorder == 'No' ||
                                            $medical_history->depression_other_mental_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Cancer or Tumor</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->cancer_or_tumor == 'Yes' ||
                                            $medical_history->cancer_or_tumor == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->cancer_or_tumor == 'No' ||
                                            $medical_history->cancer_or_tumor == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Sexually Transmitted Disease (Syphilis)</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->sexually_transmitted_disease == 'Yes' ||
                                            $medical_history->sexually_transmitted_disease == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->sexually_transmitted_disease == 'No' ||
                                            $medical_history->sexually_transmitted_disease == '0')
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
                                    <td align="center">Eye problems / Error of refraction</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->eye_problems_or_error_refraction == 'Yes' ||
                                            $medical_history->eye_problems_or_error_refraction == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->eye_problems_or_error_refraction == 'No' ||
                                            $medical_history->eye_problems_or_error_refraction == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Blood disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->blood_disorder == 'Yes' ||
                                            $medical_history->blood_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->blood_disorder == 'No' ||
                                            $medical_history->blood_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Tropical Disease - Malaria</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->tropical_disease_or_malaria == 'Yes' ||
                                            $medical_history->tropical_disease_or_malaria == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->tropical_disease_or_malaria == 'No' ||
                                            $medical_history->tropical_disease_or_malaria == '0')
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
                                    <td align="center">Deafness / Ear disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->deafness_or_ear_disorder == 'Yes' ||
                                            $medical_history->deafness_or_ear_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->deafness_or_ear_disorder == 'No' ||
                                            $medical_history->deafness_or_ear_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Stomach pain, Gastritis</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->stomach_pain_or_gastritis == 'Yes' ||
                                            $medical_history->stomach_pain_or_gastritis == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->stomach_pain_or_gastritis == 'No' ||
                                            $medical_history->stomach_pain_or_gastritis == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Thypoid Fever</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->thypoid_fever == 'Yes' ||
                                            $medical_history->thypoid_fever == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->thypoid_fever == 'No' ||
                                            $medical_history->thypoid_fever == '0')
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
                                    <td align="center">Nose or Throat disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->nose_or_throat_disorder == 'Yes' ||
                                            $medical_history->nose_or_throat_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->nose_or_throat_disorder == 'No' ||
                                            $medical_history->nose_or_throat_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Ulcer</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->ulcer == 'Yes' ||
                                            $medical_history->ulcer == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->ulcer == 'No' ||
                                            $medical_history->ulcer == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Schistosomiasis</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->schistosomiasis == 'Yes' ||
                                            $medical_history->schistosomiasis == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->schistosomiasis == 'No' ||
                                            $medical_history->schistosomiasis == '0')
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
                                    <td align="center">Tuberculosis</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->tuberculosis == 'Yes' ||
                                            $medical_history->tuberculosis == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->tuberculosis == 'No' ||
                                            $medical_history->tuberculosis == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Other Abdominal Disorder</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->other_abdominal_disorder == 'Yes' ||
                                            $medical_history->other_abdominal_disorder == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->other_abdominal_disorder == 'No' ||
                                            $medical_history->other_abdominal_disorder == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Asthma</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->asthma == 'Yes' ||
                                            $medical_history->asthma == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->asthma == 'No' ||
                                            $medical_history->asthma == '0')
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
                                    <td align="center">Signed off as sick</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->signed_off_as_sick == 'Yes' ||
                                            $medical_history->signed_off_as_sick == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->signed_off_as_sick == 'No' ||
                                            $medical_history->signed_off_as_sick == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Medical certificate restricted</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->medical_certificate_restricted == 'Yes' ||
                                            $medical_history->medical_certificate_restricted == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->medical_certificate_restricted == 'No' ||
                                            $medical_history->medical_certificate_restricted == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Allergies</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->allergies == 'Yes' ||
                                            $medical_history->allergies == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->allergies == 'No' ||
                                            $medical_history->allergies == '0')
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
                                    <td align="center">Repatriation form ship</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->repatriation_form_ship == 'Yes' ||
                                            $medical_history->repatriation_form_ship == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->repatriation_form_ship == 'No' ||
                                            $medical_history->repatriation_form_ship == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Medical certificate revoked</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->medical_certificate_revoked == 'Yes' ||
                                            $medical_history->medical_certificate_revoked == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->medical_certificate_revoked == 'No' ||
                                            $medical_history->medical_certificate_revoked == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Smoking (Specify) <br>
                                    
                                        {{ optional($medical_history)->smoking_other }}
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->smoking == 'Yes' ||
                                            $medical_history->smoking == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->smoking == 'No' ||
                                            $medical_history->smoking == '0')
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
                                    <td align="center">Declared Unfit for sea duty</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->declared_unfit_for_sea_duty == 'Yes' ||
                                            $medical_history->declared_unfit_for_sea_duty == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->declared_unfit_for_sea_duty == 'No' ||
                                            $medical_history->declared_unfit_for_sea_duty == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Aware of any medical problems</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->aware_of_any_medical_problems == 'Yes' ||
                                            $medical_history->aware_of_any_medical_problems == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->aware_of_any_medical_problems == 'No' ||
                                            $medical_history->aware_of_any_medical_problems == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Taking medication for Hypertension</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->taking_medication_for_hypertension == 'Yes' ||
                                            $medical_history->taking_medication_for_hypertension == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->taking_medication_for_hypertension == 'No' ||
                                            $medical_history->taking_medication_for_hypertension == '0')
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
                                    <td align="center">Previous Hospitalization</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->previous_hospitalization == 'Yes' ||
                                            $medical_history->previous_hospitalization == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->previous_hospitalization == 'No' ||
                                            $medical_history->previous_hospitalization == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Aware of any disease / illness</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->aware_of_any_disease_or_illness == 'Yes' ||
                                            $medical_history->aware_of_any_disease_or_illness == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->aware_of_any_disease_or_illness == 'No' ||
                                            $medical_history->aware_of_any_disease_or_illness == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center">Taking medication for Diabetes</td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->taking_medication_for_diabetes == 'Yes' ||
                                            $medical_history->taking_medication_for_diabetes == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->taking_medication_for_diabetes == 'No' ||
                                            $medical_history->taking_medication_for_diabetes == '0')
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
                                    <td align="center">Do you feel healthy / <br>
                                        Fit to perform duties of
                                        designed position</td>
                                        <td>
                                            <span style="font-size: 14px;">
                                                @if ($medical_history)
                                                @if ($medical_history->feel_healthy == 'Yes' ||
                                                $medical_history->feel_healthy == '1')
                                                ☑
                                                @else
                                                ☐
                                                @endif
                                                @else
                                                ☐
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <span style="font-size: 14px;">
                                                @if ($medical_history)
                                                @if ($medical_history->feel_healthy == 'No' ||
                                                $medical_history->feel_healthy == '0')
                                                ☑
                                                @else
                                                ☐
                                                @endif
                                                @else
                                                ☐
                                                @endif
                                            </span>
                                        </td>
                                    <td align="center" valign="top">Operation(s) (specify)
                                        <br>
                                        {{$medical_history ? $medical_history->operation_other : null}}
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->operations == 'Yes' ||
                                            $medical_history->operations == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->operations == 'No' ||
                                            $medical_history->operations == '0')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td align="center" valign="top">Vaccination (Specify)
                                        <br>
                                        {{$medical_history ? $medical_history->vaccination_date : null}}
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->vaccination == 'Yes' ||
                                            $medical_history->vaccination == '1')
                                            ☑
                                            @else
                                            ☐
                                            @endif
                                            @else
                                            ☐
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px;">
                                            @if ($medical_history)
                                            @if ($medical_history->vaccination == 'No' ||
                                            $medical_history->vaccination == '0')
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
                        <table width="100%" cellpadding="0" class="brdTable" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="padding: 0.3rem 1rem; font-size: 11px;">
                                            I hereby certify that the personal declaration above is true to the best of my knowledge and I fully understand the above results
                                            of my medical examination. As explained to me by the examining / authorized physician. I hereby authorized the release of all
                                            medical records to the DOH / MARINA / POEA/ the examining authorized physician and my employer / running agency.
                                        </div>
                                        <div style="display: flex; justify-content:space-between; align-items: flex-end;padding: 0.5rem;">
                                            <div style="width: 32%; text-align: center;">
                                                <div style="border-bottom: 1px solid black; font-size: 11px;">{{$admission->lastname}}, {{$admission->firstname}} {{$admission->middlename ? $admission->middlename[0] . '.' : null}}</div>
                                                NAME OF SEAFARER
                                            </div>
                                            <div style="width: 32%; text-align: center;">
                                                <div style="border-bottom: 1px solid black;">
                                                    @if($admission->patient_signature)
                                                        <img src="@php echo base64_decode($admission->patient_signature) @endphp"  width="100" style="object-fit: cover;" />
                                                    @elseif ($admission->signature)
                                                        <img src="data:image/jpeg;base64,{{$admission->signature}}"  width="100" style="object-fit: cover;"/>
                                                    @else 
                                                        <div style="width: 150px;height: 40px;"></div>
                                                    @endif
                                                </div>
                                                SIGNATURE
                                            </div>
                                            <div style="width: 32%; text-align: center;">
                                                <div style="border-bottom: 1px solid black;">
                                                    @if ($exam_physical)
                                                        {{$exam_physical ? date_format(new DateTime($exam_physical->date_examination), "d F Y") : null}}
                                                    @endif
                                                </div>
                                                DATE
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 130px;">
                                            
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="1" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center">II. MEDICAL EXAMINATION: ENTER THE DATA CALLED FOR.</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="1" cellspacing="0" class="brdTable" style="font-size: 10px !important;">
                            <tbody>
                                <tr>
                                    <td valign='top'>HEIGHT (cm) <br>
                                        <span><b>{{$exam_physical ? $exam_physical->height : null}}</b></span>
                                    </td>
                                    <td valign='top'>WEIGHT (kg) <br>
                                        <span><b>{{$exam_physical ? $exam_physical->weight : null}}</b></span>
                                    </td>
                                    <td valign='top'>BP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                        <span>{{$exam_physical ? $exam_physical->systollic . "/" . $exam_physical->diastollic : null}}</span>
                                    </td>
                                    <td valign='top'>PULSE RATE <br>
                                        <span><u>{{$exam_physical ? $exam_physical->pulse : null}}</u></b></span>
                                    </td>
                                    <td valign='top'>RESPIRATION <br>
                                        <span><b><u>{{$exam_physical ? $exam_physical->respiration : null}}</u></b></span>
                                    </td>
                                    <td valign='top'>BMI <br>
                                        <span>
                                            <b><u>{{$exam_physical ? $exam_physical->bmi : null}}</u></b>
                                        </span>
                                    </td>
                                    <td valign="top">ISHIHARA <br>
                                        <span>
                                            <u>{{$exam_ishihara ? $exam_ishihara->remarks : ""}}</u>
                                        </span>
                                    </td>
                                    <td>BUILT <br>
                                        <span>&nbsp;</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellpadding="2" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td><b>Visual Acuity</b></td>
                                    <td colspan="2">FAR VISION</td>
                                    <td colspan="2">NEAR VISION</td>
                                    <td><b>AUDIOMETRY</b></td>
                                    <td>500</td>
                                    <td>1000</td>
                                    <td>2000</td>
                                    <td>3000</td>
                                    <td>4000</td>
                                    <td>6000</td>
                                    <td>8000</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>OD</td>
                                    <td>OS</td>
                                    <td>ODJ</td>
                                    <td>OSJ</td>
                                    <td>Right (AD)</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right2 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right4 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right5 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right6 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right7 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right8 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_right9 : null}}</td>
                                </tr>
                                <tr>
                                    <td>Uncorrected</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->ufvod : null}}</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->ufvos : null}}</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->unvodj : null}}</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->unvosj : null}}</td>
                                    <td>Left (AS)</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_left2 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_left4 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_left5 : null}}</td>
                                    <td colspan="2" align="center">{{$exam_audio ? $exam_audio->aided_left7 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_left8 : null}}</td>
                                    <td>{{$exam_audio ? $exam_audio->aided_left9 : null}}</td>
                                </tr>
                                <tr>
                                    <td>Corrected</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->cfvod : null}}</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->cfvos : null}}</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->cnvodj : null}}</td>
                                    <td>{{$exam_visacuity ? $exam_visacuity->cnvosj : null}}</td>
                                    <td colspan="8" align="left">Remarks : {{ $exam_audio ? $exam_audio->remarks : null }}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="left">REMARKS</td>
                                    <td colspan="7" align="left">Clarity of Speech</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center"><b>III. PHYSICAL EXAMINATION</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="2" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td>A.</td>
                                    <td>Significant Findings</td>
                                    <td>B.</td>
                                    <td>Significant Findings</td>
                                </tr>
                                <tr>
                                    <td>Skin</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a1_findings ? $exam_physical->a1_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Heart</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b4_findings ? $exam_physical->b4_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Head, Neck Scalp</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a2_findings ? $exam_physical->a2_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Abdomen</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b5_findings ? $exam_physical->b5_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Eyes, External</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a3_findings ? $exam_physical->a3_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Back</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b6_findings ? $exam_physical->b6_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pupils-Ophthalmoscope</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a4_findings ? $exam_physical->a4_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Anus Rectum</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b7_findings ? $exam_physical->b7_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ears</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a5_findings ? $exam_physical->a5_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Genito-urinary system</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->c2_findings ? $exam_physical->c2_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nose, Sinuses</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a6_findings ? $exam_physical->a6_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Inguinal, Genitals</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->c3_findings ? $exam_physical->c3_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mouth, Throat</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->a7_findings ? $exam_physical->a7_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Extremities</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->c4_findings ? $exam_physical->c4_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Neck Lymph nodes, <br>Thyroid</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b1_findings ? $exam_physical->b1_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Varicose veins</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Chest, Breast, Axilla</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b3_findings ? $exam_physical->b3_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Reflexes</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->c4_findings ? $exam_physical->c4_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lungs</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->b4_findings ? $exam_physical->b4_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                    <td>Dental (Teeth, Gums)</td>
                                    <td>
                                        @if($exam_physical)
                                            {{$exam_physical->c6_findings ? $exam_physical->c6_findings : " "}}
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">Conditions / Medications: </td>
                                    <td>
                                       
                                    </td>
                                    <td style="text-align: center;"><b>Examining Physician:</b> <br>
                                        Name & SIgnature
                                    </td>
                                    <td style="padding: 8px;">
                                        @if($exam_physical && $admission->agency_id != 19)
                                            <img src="{{$exam_physical->physician_signature}}" width="80" />
                                        @endif<br>
                                        @if($admission->agency_id == 19)
                                            <br>
                                        @endif
                                        @if($exam_physical)
                                            <span>{{$exam_physical->physician_firstname}} {{$exam_physical->physician_middlename[0]}}. {{$exam_physical->physician_lastname}}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Form No. 3 Rev. 01/01-31-2022 Page 1 of 3</td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>