@php
function markSlash($val)
{
return $val == '' ? ' / ' : $val;
}

if ($exam_audio) {
$ar1 = markSlash($exam_audio->air_right1);
$ar2 = markSlash($exam_audio->air_right2);
$ar3 = markSlash($exam_audio->air_right3);
$ar4 = markSlash($exam_audio->air_right4);
$ar5 = markSlash($exam_audio->air_right5);
$ar6 = markSlash($exam_audio->air_right6);
$ar7 = markSlash($exam_audio->air_right7);
$ar8 = markSlash($exam_audio->air_right8);
$ar9 = markSlash($exam_audio->air_right9);
$al1 = markSlash($exam_audio->air_left1);
$al2 = markSlash($exam_audio->air_left2);
$al3 = markSlash($exam_audio->air_left3);
$al4 = markSlash($exam_audio->air_left4);
$al5 = markSlash($exam_audio->air_left5);
$al6 = markSlash($exam_audio->air_left6);
$al7 = markSlash($exam_audio->air_left7);
$al8 = markSlash($exam_audio->air_left8);
$al9 = markSlash($exam_audio->air_left9);
$br1 = markSlash($exam_audio->bone_right1);
$br2 = markSlash($exam_audio->bone_right2);
$br3 = markSlash($exam_audio->bone_right3);
$br4 = markSlash($exam_audio->bone_right4);
$br5 = markSlash($exam_audio->bone_right5);
$br6 = markSlash($exam_audio->bone_right6);
$br7 = markSlash($exam_audio->bone_right7);
$br8 = markSlash($exam_audio->bone_right8);
$br9 = markSlash($exam_audio->bone_right9);
$bl1 = markSlash($exam_audio->bone_left1);
$bl2 = markSlash($exam_audio->bone_left2);
$bl3 = markSlash($exam_audio->bone_left3);
$bl4 = markSlash($exam_audio->bone_left4);
$bl5 = markSlash($exam_audio->bone_left5);
$bl6 = markSlash($exam_audio->bone_left6);
$bl7 = markSlash($exam_audio->bone_left7);
$bl8 = markSlash($exam_audio->bone_left8);
$bl9 = markSlash($exam_audio->bone_left9);
$ff1 = markSlash($exam_audio->free_field1);
$ff2 = markSlash($exam_audio->free_field2);
$ff3 = markSlash($exam_audio->free_field3);
$ff4 = markSlash($exam_audio->free_field4);
$ff5 = markSlash($exam_audio->free_field5);
$ff6 = markSlash($exam_audio->free_field6);
$ff7 = markSlash($exam_audio->free_field7);
$ff8 = markSlash($exam_audio->free_field8);
$ff9 = markSlash($exam_audio->free_field9);
}else {
    $ar1 = null;
    $ar2 = null;
    $ar3 = null;
    $ar4 = null;
    $ar5 = null;
    $ar6 = null;
    $ar7 = null;
    $ar8 = null;
    $ar9 = null;
    $al1 = null;
    $al2 = null;
    $al3 = null;
    $al4 = null;
    $al5 = null;
    $al6 = null;
    $al7 = null;
    $al8 = null;
    $al9 = null;
    $br1 = null;
    $br2 = null;
    $br3 = null;
    $br4 = null;
    $br5 = null;
    $br6 = null;
    $br7 = null;
    $br8 = null;
    $br9 = null;
    $bl1 = null;
    $bl2 = null;
    $bl3 = null;
    $bl4 = null;
    $bl5 = null;
    $bl6 = null;
    $bl7 = null;
    $bl8 = null;
    $bl9 = null;
    $ff1 = null;
    $ff2 = null;
    $ff3 = null;
    $ff4 = null;
    $ff5 = null;
    $ff6 = null;
    $ff7 = null;
    $ff8 = null;
    $ff9 = null;
}

@endphp


<html>

<head>
    <title>
        PEME BAHIA</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: arial;
        font-size: 12px;
    }
    </style>
</head>

<body>
    <center>
        <table width="800" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr>
                    <td valign="bottom" class=""><img
                            src="../../../app-assets/images/profiles/{{$admission->patient_image}}"
                            alt="Patient Picture" width="153" height="154" class="brdAll"><br>
                        <b>
                            {{$admission->lastname}},
                            {{$admission->firstname}}
                            {{$admission->middlename}} </b>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" class="">&nbsp;</td>
                </tr>
                <tr>
                    <td height="120" valign="bottom" class="">
                        <table cellspacing="0" cellpadding="0" hspace="0" vspace="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td valign="bottom" align="left">
                                        <h4><b><u>PERSONAL INFORMATION</u></b></h4>
                                        <div align="center">
                                            <table class="brdTable" width="100%" border="0" cellpadding="4"
                                                cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Address: </b></td>
                                                        <td width="517" valign="top">
                                                            {{$patientInfo->address}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Date of Birth:</b></td>
                                                        <td width="517" valign="top"> {{date_format(new DateTime($patientInfo->birthdate), "F d, Y")}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Contact Number:</b></td>
                                                        <td width="517" valign="top">{{$patientInfo->contactno}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Place of Birth:</b></td>
                                                        <td width="517" valign="top">{{$patientInfo->birthplace}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Civil Status:</b></td>
                                                        <td width="517" valign="top">{{strtoupper($patientInfo->maritalstatus)}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Gender:</b></td>
                                                        <td width="517" valign="top">{{strtoupper($admission->gender)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Nationality:</b></td>
                                                        <td width="517" valign="top">{{$patientInfo->nationality}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Age:</b></td>
                                                        <td width="517" valign="top">{{$admission->age}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Passport Valid Date:</b></td>
                                                        <td width="517" valign="top">
                                                            {{date_format(new DateTime($patientInfo->passport_expdate), "F d, Y")}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>SRB Valid Date:</b></td>
                                                        <td width="517" valign="top">
                                                            {{date_format(new DateTime($patientInfo->srb_expdate), "F d, Y")}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Passport:</b></td>
                                                        <td width="517" valign="top">{{$patientInfo->passportno}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>SRB Number:</b></td>
                                                        <td width="517" valign="top">{{$patientInfo->srbno}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table width="100%" border="0" cellpadding="4" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td width="149" valign="top"><b>ID No.:</b></td>
                                    <td width="517" valign="top">
                                        <p>{{$admission->patientcode}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Manning Company:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>@if (preg_match("/Bahia/i", $admission->agencyname)) 
                                                    {{'Bahia Shipping Services, Inc.'}}
                                                @else
                                                    {{$admission->agencyname}}
                                                @endif</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Package:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>{{$admission->packagename}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Principal:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>
                                            {{$patientInfo->principal}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Crew Type:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>{{$admission->emp_status}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Vessel:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>{{$admission->vesselname}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Position:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>{{$admission->position}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Contract:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <input name="co" type="text" id="co" value="" class="brdNone" style="width:300px;text-align:left;border: none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>PNI Club:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <input name="co" type="text" id="co" value="" class="brdNone" style="width:300px;text-align:left;border: none;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="margin-top:500px">
                        </p>
                        <h4><b><u>EXAMINATION RESULT:</u></b></h4>
                        <p></p>
                        <p><i>1. Vital Signs</i></p>

                        <table width="100%" border="0" cellpadding="4" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Height:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        <p>
                                            @if($exam_cardio)
                                                {{$exam_cardio->height . "cm"}}
                                            @else
                                                {{$exam_physical ? $exam_physical->height . "cm" : null}}
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Weight:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        <p>
                                            @if($exam_cardio)
                                                {{$exam_cardio->weight . "kgs"}}
                                            @else
                                                {{$exam_physical ? $exam_physical->weight . "kgs" : null}}
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Blood Pressure:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        <p>
                                            {{$exam_cardio ? $exam_cardio->bp : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Doctor:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        @if($exam_cardio)
                                            <span style="font-size: 10px;">{{$exam_cardio->tech1_firstname}} {{$exam_cardio->tech1_middlename[0]}}. {{$exam_cardio->tech1_lastname}}</span>
                                        @else
                                            <span style="font-size: 10px;">{{$exam_physical ? $exam_physical->tech1_firstname . $exam_physical->tech1_middlename[0] . $exam_physical->tech1_lastname : null}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Last updated:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        <p>
                                            @if($exam_cardio)
                                                {{ date_format(new DateTime($exam_cardio->updated_date), "F d, Y")}}
                                            @else
                                                {{$exam_physical ? date_format(new DateTime($exam_physical->updated_date), "F d, Y") : null}}
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p><i>2. Pure Tone Audiogram</i></p>
                        <table width="100%" border="0" cellpadding="2" cellspacing="1" class="brdTable"
                            style="margin-right: 1rem;">
                            <tr>
                                <td width="13%">&nbsp;</td>
                                <td width="10%" align="center"> 250 </td>
                                <td width="10%" align="center"> 500 </td>
                                <td width="9%" align="center">750</td>
                                <td width="10%" align="center"> 1000 </td>
                                <td width="10%" align="center"> 2000 </td>
                                <td width="10%" align="center"> 3000 </td>
                                <td width="9%" align="center"> 4000 </td>
                                <td width="9%" align="center"> 6000 </td>
                                <td width="10%" align="center"> 8000 </td>
                            </tr>
                            <tr>
                                <td>Air Right</td>
                                <td align="center">{{ $ar1 ? $ar1 : null }}</td>
                                <td align="center">{{ $ar2 ? $ar2 : null }}</td>
                                <td align="center">{{ $ar3 ? $ar3 : null }}</td>
                                <td align="center">{{ $ar4 ? $ar4 : null }}</td>
                                <td align="center">{{ $ar5 ? $ar5 : null }}</td>
                                <td align="center">{{ $ar6 ? $ar6 : null }}</td>
                                <td align="center">{{ $ar7 ? $ar7 : null }}</td>
                                <td align="center">{{ $ar8 ? $ar8 : null }}</td>
                                <td align="center">{{ $ar9 ? $ar9 : null }}</td>
                            </tr>
                            <tr>
                                <td>Air Left</td>
                                <td align="center">{{ $al1 ? $al1 : null }}</td>
                                <td align="center">{{ $al2 ? $al2 : null }}</td>
                                <td align="center">{{ $al3 ? $al3 : null }}</td>
                                <td align="center">{{ $al4 ? $al4 : null }}</td>
                                <td align="center">{{ $al5 ? $al5 : null }}</td>
                                <td align="center">{{ $al6 ? $al6 : null }}</td>
                                <td align="center">{{ $al7 ? $al7 : null }}</td>
                                <td align="center">{{ $al8 ? $al8 : null }}</td>
                                <td align="center">{{ $al9  ? $al9 : null}}</td>
                            </tr>
                            <tr>
                                <td>BONE Right</td>
                                <td align="center">{{ $br1 ? $br1 : null  }}</td>
                                <td align="center">{{ $br2 ? $br2 : null }}</td>
                                <td align="center">{{ $br3 ? $br3 : null }}</td>
                                <td align="center">{{ $br4 ? $br4 : null }}</td>
                                <td align="center">{{ $br5 ? $br5 : null }}</td>
                                <td align="center">{{ $br6 ? $br6 : null }}</td>
                                <td align="center">{{ $br7 ? $br7 : null }}</td>
                                <td align="center">{{ $br8 ? $br8 : null }}</td>
                                <td align="center">{{ $br9 ? $br9 : null }}</td>
                            </tr>
                            <tr>
                                <td>BONE Left</td>
                                <td align="center">{{ $bl1 ? $bl1 : null }}</td>
                                <td align="center">{{ $bl2 ? $bl2 : null }}</td>
                                <td align="center">{{ $bl3 ? $bl3 : null }}</td>
                                <td align="center">{{ $bl4 ? $bl4 : null }}</td>
                                <td align="center">{{ $bl5 ? $bl5 : null }}</td>
                                <td align="center">{{ $bl6 ? $bl6 : null}}</td>
                                <td align="center">{{ $bl7 ? $bl7 : null }}</td>
                                <td align="center">{{ $bl8 ? $bl8 : null }}</td>
                                <td align="center">{{ $bl9 ? $bl9 : null }}</td>
                            </tr>
                            <tr>
                                <td>Free Field</td>
                                <td align="center">{{ $ff1 ? $ff1 : null }}</td>
                                <td align="center">{{ $ff2 ? $ff2 : null }}</td>
                                <td align="center">{{ $ff3 ? $ff3 : null }}</td>
                                <td align="center">{{ $ff4 ? $ff4 : null }}</td>
                                <td align="center">{{ $ff5 ? $ff5 : null }}</td>
                                <td align="center">{{ $ff6 ? $ff6 : null }}</td>
                                <td align="center">{{ $ff7 ? $ff7 : null }}</td>
                                <td align="center">{{ $ff8 ? $ff8 : null }}</td>
                                <td align="center">{{ $ff9 ? $ff9 : null }}</td>
                            </tr>
                        </table>
                        <p>Remarks:
                            {{$exam_audio ? $exam_audio->remarks : null}}<br>
                            Audiometrician:
                            @if($exam_audio)
                                <span style="font-size: 12px;">{{$exam_audio->tech1_firstname}} {{$exam_audio->tech1_middlename[0]}}. {{$exam_audio->tech1_lastname}}</span>
                            @endif
                            <span style="margin-left:100px">Last updated:
                                {{$exam_audio ? date_format(new DateTime($exam_audio->updated_date), "F d, Y") : null}}</span>
                        </p>
                        <p><i>3. Electrodiagram ( ECG)</i></p>
                        <table width="100%" border="0" cellpadding="4" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Doctor:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$exam_ecg ? $exam_ecg->tech2_lastname . ", " . $exam_ecg->tech2_firstname . " " .  $exam_ecg->tech2_middlename : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Nurse:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$exam_ecg ? $exam_ecg->tech1_lastname . ", " . $exam_ecg->tech1_firstname . " " .  $exam_ecg->tech1_middlename : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Remarks:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$exam_ecg ? $exam_ecg->remarks : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Last updated:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$exam_ecg ? date_format(new DateTime($exam_ecg->updated_date), "F d, Y") : null}}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p><i>4. Spirometry</i></p>
                        <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                            <tbody>
                                <tr>
                                    <td width="87">&nbsp;</td>
                                    <td width="94" align="center" class="brdLeftTopBtm"><b>Predicted</b></td>
                                    <td width="107" align="center" class="brdLeftTopBtm"><b>Actual</b></td>
                                    <td width="95" align="center" class="brdLeftTopBtm"><b>%</b></td>
                                </tr>
                                <tr>
                                    <td>FEV 1 </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fev1_predicted : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fev1_actual : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fev1_perc : null}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>FVC </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fvc_predicted : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fvc_actual : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fvc_perc : null}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>FEV1/ FVC % </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fev1fvc_predicted : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fev1fvc_actual : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$exam_crf ? $exam_crf->fev1fvc_perc : null}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p> Remarks: <br>
                            @php echo $exam_crf ? nl2br($exam_crf->remarks) : null@endphp
                            <br>
                            Nurse:
                            {{$exam_crf ? $exam_crf->tech1_lastname . ", " . $exam_crf->tech1_firstname . " " .  $exam_crf->tech1_middlename : null}}
                            <span style="margin-left:100px">Last updated:
                                {{$exam_crf ? date_format(new DateTime($exam_crf->updated_date), "F d, Y") : null}}
                            </span>
                        </p>
                        <p style="margin-top:20px">
                        </p>
                        <h4><b><u>LABORATORY RESULT:</u></b></h4>
                        <p></p>
                        <p><i>5. Blood Chemistry</i></p>
                        @if($exam_bloodsero)
                            @if($exam_bloodsero->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($exam_bloodsero->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>6. Drug Test</i></p>
                        @if($exam_drug)
                            @if($exam_drug->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($exam_drug->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>7. Fecalysis</i></p>
                        @if($exam_feca)
                            @if($exam_feca->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($exam_feca->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>8. Hematology CBC</i></p>
                        @if($exam_hema)
                            @if($exam_hema->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($exam_hema->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>9. Immunology</i></p>
                        <p></p>
                        <p style=""><i>10. Urinalysis</i></p>
                        @if($exam_urin)
                            @if($exam_urin->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($exam_urin->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>11. Dental</i></p>
                        @if($exam_dental)
                            @if($exam_dental->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($exam_dental->remarks) @endphp
                                </p>
                            @endif
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </center>

</body>

</html>