@php
function markSlash($val)
{
return $val == '' ? ' / ' : $val;
}

if ($admission->exam_audio) {
$ar1 = markSlash($admission->exam_audio->air_right1);
$ar2 = markSlash($admission->exam_audio->air_right2);
$ar3 = markSlash($admission->exam_audio->air_right3);
$ar4 = markSlash($admission->exam_audio->air_right4);
$ar5 = markSlash($admission->exam_audio->air_right5);
$ar6 = markSlash($admission->exam_audio->air_right6);
$ar7 = markSlash($admission->exam_audio->air_right7);
$ar8 = markSlash($admission->exam_audio->air_right8);
$ar9 = markSlash($admission->exam_audio->air_right9);
$al1 = markSlash($admission->exam_audio->air_left1);
$al2 = markSlash($admission->exam_audio->air_left2);
$al3 = markSlash($admission->exam_audio->air_left3);
$al4 = markSlash($admission->exam_audio->air_left4);
$al5 = markSlash($admission->exam_audio->air_left5);
$al6 = markSlash($admission->exam_audio->air_left6);
$al7 = markSlash($admission->exam_audio->air_left7);
$al8 = markSlash($admission->exam_audio->air_left8);
$al9 = markSlash($admission->exam_audio->air_left9);
$br1 = markSlash($admission->exam_audio->bone_right1);
$br2 = markSlash($admission->exam_audio->bone_right2);
$br3 = markSlash($admission->exam_audio->bone_right3);
$br4 = markSlash($admission->exam_audio->bone_right4);
$br5 = markSlash($admission->exam_audio->bone_right5);
$br6 = markSlash($admission->exam_audio->bone_right6);
$br7 = markSlash($admission->exam_audio->bone_right7);
$br8 = markSlash($admission->exam_audio->bone_right8);
$br9 = markSlash($admission->exam_audio->bone_right9);
$bl1 = markSlash($admission->exam_audio->bone_left1);
$bl2 = markSlash($admission->exam_audio->bone_left2);
$bl3 = markSlash($admission->exam_audio->bone_left3);
$bl4 = markSlash($admission->exam_audio->bone_left4);
$bl5 = markSlash($admission->exam_audio->bone_left5);
$bl6 = markSlash($admission->exam_audio->bone_left6);
$bl7 = markSlash($admission->exam_audio->bone_left7);
$bl8 = markSlash($admission->exam_audio->bone_left8);
$bl9 = markSlash($admission->exam_audio->bone_left9);
$ff1 = markSlash($admission->exam_audio->free_field1);
$ff2 = markSlash($admission->exam_audio->free_field2);
$ff3 = markSlash($admission->exam_audio->free_field3);
$ff4 = markSlash($admission->exam_audio->free_field4);
$ff5 = markSlash($admission->exam_audio->free_field5);
$ff6 = markSlash($admission->exam_audio->free_field6);
$ff7 = markSlash($admission->exam_audio->free_field7);
$ff8 = markSlash($admission->exam_audio->free_field8);
$ff9 = markSlash($admission->exam_audio->free_field9);
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
                            src="../../../app-assets/images/profiles/{{$admission->patient->patient_image}}"
                            alt="Patient Picture" width="153" height="154" class="brdAll"><br>
                        <b>
                            {{$admission->patient->lastname}},
                            {{$admission->patient->firstname}}
                            {{$admission->patient->middlename}} </b>
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
                                                            {{$admission->patient->patientinfo->address}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Date of Birth:</b></td>
                                                        <td width="517" valign="top"> {{date_format(new DateTime($admission->patient->patientinfo->birthdate), "F d, Y")}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Contact Number:</b></td>
                                                        <td width="517" valign="top">{{$admission->patient->patientinfo->contactno}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Place of Birth:</b></td>
                                                        <td width="517" valign="top">{{$admission->patient->patientinfo->birthplace}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Civil Status:</b></td>
                                                        <td width="517" valign="top">{{strtoupper($admission->patient->patientinfo->maritalstatus)}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Gender:</b></td>
                                                        <td width="517" valign="top">{{strtoupper($admission->patient->gender)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Nationality:</b></td>
                                                        <td width="517" valign="top">{{$admission->patient->patientinfo->nationality}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Age:</b></td>
                                                        <td width="517" valign="top">{{$admission->patient->age}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Passport Valid Date:</b></td>
                                                        <td width="517" valign="top">
                                                            {{date_format(new DateTime($admission->patient->patientinfo->passport_expdate), "F d, Y")}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>SRB Valid Date:</b></td>
                                                        <td width="517" valign="top">
                                                            {{date_format(new DateTime($admission->patient->patientinfo->srb_expdate), "F d, Y")}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>Passport:</b></td>
                                                        <td width="517" valign="top">{{$admission->patient->patientinfo->passportno}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="149" valign="top"><b>SRB Number:</b></td>
                                                        <td width="517" valign="top">{{$admission->patient->patientinfo->srbno}}
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
                                        <p>{{$admission->patient->patientcode}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Manning Company:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>@if (preg_match("/Bahia/i", $admission->agency->agencyname))
                                                    {{'Bahia Shipping Services, Inc.'}}
                                                @else
                                                    {{$admission->agency->agencyname}}
                                                @endif</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Package:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>{{$admission->package->packagename}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="149" valign="top">
                                        <p><b>Principal:</b></p>
                                    </td>
                                    <td width="517" valign="top">
                                        <p>
                                            {{$admission->patient->patientinfo->principal}}
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
                                            @if($admission->exam_cardio)
                                                {{$admission->exam_cardio->height . "cm"}}
                                            @else
                                                {{$admission->exam_physical ? $admission->exam_physical->height . "cm" : null}}
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
                                            @if($admission->exam_cardio)
                                                {{$admission->exam_cardio->weight . "kgs"}}
                                            @else
                                                {{$admission->exam_physical ? $admission->exam_physical->weight . "kgs" : null}}
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
                                            {{$admission->exam_cardio ? $admission->exam_cardio->bp : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Doctor:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        @if($admission->exam_cardio)
                                            <span style="font-size: 10px;">{{$admission->exam_cardio->first_tech->firstname}} {{$admission->exam_cardio->first_tech->middlename[0]}}. {{$admission->exam_cardio->first_tech->lastname}}</span>
                                        @else
                                            <span style="font-size: 10px;">{{$admission->exam_physical ? $admission->exam_physical->first_tech->firstname . $admission->exam_physical->first_tech->middlename[0] . $admission->exam_physical->first_tech->lastname : null}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="148" valign="top">
                                        <p><b>Last updated:</b></p>
                                    </td>
                                    <td width="512" valign="top">
                                        <p>
                                            @if($admission->exam_cardio)
                                                {{ date_format(new DateTime($admission->exam_cardio->updated_date), "F d, Y")}}
                                            @else
                                                {{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->updated_date), "F d, Y") : null}}
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
                            {{$admission->exam_audio ? $admission->exam_audio->remarks : null}}<br>
                            Audiometrician:
                            @if($admission->exam_audio)
                                <span style="font-size: 12px;">{{$admission->exam_audio->first_tech->firstname}} {{$admission->exam_audio->first_tech->middlename[0]}}. {{$admission->exam_audio->first_tech->lastname}}</span>
                            @endif
                            <span style="margin-left:100px">Last updated:
                                {{$admission->exam_audio ? date_format(new DateTime($admission->exam_audio->updated_date), "F d, Y") : null}}</span>
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
                                            {{$admission->exam_ecg ? $admission->exam_ecg->second_tech->lastname . ", " . $admission->exam_ecg->second_tech->firstname . " " .  $admission->exam_ecg->second_tech->middlename : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Nurse:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$admission->exam_ecg ? $admission->exam_ecg->first_tech->lastname . ", " . $admission->exam_ecg->first_tech->firstname . " " .  $admission->exam_ecg->first_tech->middlename : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Remarks:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$admission->exam_ecg ? $admission->exam_ecg->remarks : null}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="131" valign="top">
                                        <p>Last updated:</p>
                                    </td>
                                    <td width="529" valign="top">
                                        <p>
                                            {{$admission->exam_ecg ? date_format(new DateTime($admission->exam_ecg->updated_date), "F d, Y") : null}}
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
                                        {{$admission->exam_crf ? $admission->exam_crf->fev1_predicted : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fev1_actual : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fev1_perc : null}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>FVC </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fvc_predicted : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fvc_actual : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fvc_perc : null}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>FEV1/ FVC % </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fev1fvc_predicted : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fev1fvc_actual : null}}
                                    </td>
                                    <td height="60" align="center" class="brdLeftBtm">
                                        {{$admission->exam_crf ? $admission->exam_crf->fev1fvc_perc : null}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p> Remarks: <br>
                            @php echo $admission->exam_crf ? nl2br($admission->exam_crf->remarks) : null@endphp
                            <br>
                            Nurse:
                            {{$admission->exam_crf ? $admission->exam_crf->first_tech->lastname . ", " . $admission->exam_crf->first_tech->firstname . " " .  $admission->exam_crf->first_tech->middlename : null}}
                            <span style="margin-left:100px">Last updated:
                                {{$admission->exam_crf ? date_format(new DateTime($admission->exam_crf->updated_date), "F d, Y") : null}}
                            </span>
                        </p>
                        <p style="margin-top:20px">
                        </p>
                        <h4><b><u>LABORATORY RESULT:</u></b></h4>
                        <p></p>
                        <p><i>5. Blood Chemistry</i></p>
                        @if($admission->exam_bloodsero)
                            @if($admission->exam_bloodsero->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($admission->exam_bloodsero->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>6. Drug Test</i></p>
                        @if($admission->exam_drug)
                            @if($admission->exam_drug->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($admission->exam_drug->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>7. Fecalysis</i></p>
                        @if($admission->exam_feca)
                            @if($admission->exam_feca->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($admission->exam_feca->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>8. Hematology CBC</i></p>
                        @if($admission->exam_hema)
                            @if($admission->exam_hema->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($admission->exam_hema->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>9. Immunology</i></p>
                        <p></p>
                        <p style=""><i>10. Urinalysis</i></p>
                        @if($admission->exam_urin)
                            @if($admission->exam_urin->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($admission->exam_urin->remarks) @endphp
                                </p>
                            @endif
                        @endif
                        <p><i>11. Dental</i></p>
                        @if($admission->exam_dental)
                            @if($admission->exam_dental->remarks_status ==  'findings')
                                <p><b>Remarks</b></p>
                                <p>
                                    @php echo nl2br($admission->exam_dental->remarks) @endphp
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
