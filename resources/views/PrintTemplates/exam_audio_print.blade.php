<?php
function markSlash($val)
{
    return $val == '' ? '/' : $val;
}
    $ar1 = markSlash($exam->air_right1);
    $ar2 = markSlash($exam->air_right2);
    $ar3 = markSlash($exam->air_right3);
    $ar4 = markSlash($exam->air_right4);
    $ar5 = markSlash($exam->air_right5);
    $ar6 = markSlash($exam->air_right6);
    $ar7 = markSlash($exam->air_right7);
    $ar8 = markSlash($exam->air_right8);
    $ar9 = markSlash($exam->air_right9);
    $al1 = markSlash($exam->air_left1);
    $al2 = markSlash($exam->air_left2);
    $al3 = markSlash($exam->air_left3);
    $al4 = markSlash($exam->air_left4);
    $al5 = markSlash($exam->air_left5);
    $al6 = markSlash($exam->air_left6);
    $al7 = markSlash($exam->air_left7);
    $al8 = markSlash($exam->air_left8);
    $al9 = markSlash($exam->air_left9);
    if($exam->aided_right1 || $exam->aided_right2 || $exam->aided_right3 || $exam->aided_right4 || $exam->aided_right5 || $exam->aided_right6 || $exam->aided_right7 || $exam->aided_right8 || $exam->aided_right9
    || $exam->aided_left1 || $exam->aided_left2 || $exam->aided_left3 || $exam->aided_left4 || $exam->aided_left5 || $exam->aided_left6 ||$exam->aided_left7 || $exam->aided_left8 || $exam->aided_left9) {
        $br1 = markSlash($exam->aided_right1);
        $br2 = markSlash($exam->aided_right2);
        $br3 = markSlash($exam->aided_right3);
        $br4 = markSlash($exam->aided_right4);
        $br5 = markSlash($exam->aided_right5);
        $br6 = markSlash($exam->aided_right6);
        $br7 = markSlash($exam->aided_right7);
        $br8 = markSlash($exam->aided_right8);
        $br9 = markSlash($exam->aided_right9);
        $bl1 = markSlash($exam->aided_left1);
        $bl2 = markSlash($exam->aided_left2);
        $bl3 = markSlash($exam->aided_left3);
        $bl4 = markSlash($exam->aided_left4);
        $bl5 = markSlash($exam->aided_left5);
        $bl6 = markSlash($exam->aided_left6);
        $bl7 = markSlash($exam->aided_left7);
        $bl8 = markSlash($exam->aided_left8);
        $bl9 = markSlash($exam->aided_left9);
    } else {
        $br1 = markSlash($exam->bone_right1);
        $br2 = markSlash($exam->bone_right2);
        $br3 = markSlash($exam->bone_right3);
        $br4 = markSlash($exam->bone_right4);
        $br5 = markSlash($exam->bone_right5);
        $br6 = markSlash($exam->bone_right6);
        $br7 = markSlash($exam->bone_right7);
        $br8 = markSlash($exam->bone_right8);
        $br9 = markSlash($exam->bone_right9);
        $bl1 = markSlash($exam->bone_left1);
        $bl2 = markSlash($exam->bone_left2);
        $bl3 = markSlash($exam->bone_left3);
        $bl4 = markSlash($exam->bone_left4);
        $bl5 = markSlash($exam->bone_left5);
        $bl6 = markSlash($exam->bone_left6);
        $bl7 = markSlash($exam->bone_left7);
        $bl8 = markSlash($exam->bone_left8);
        $bl9 = markSlash($exam->bone_left9);
    }
    // $bl9 = markSlash($exam->free_field1);
    // $bl9 = markSlash($exam->free_field2);
    // $bl9 = markSlash($exam->free_field3);
    // $bl9 = markSlash($exam->free_field4);
    // $bl9 = markSlash($exam->free_field5);
    // $bl9 = markSlash($exam->free_field6);
    // $bl9 = markSlash($exam->free_field7);
    // $bl9 = markSlash($exam->free_field8);
    // $bl9 = markSlash($exam->free_field9);

    $free_field1 = 1;
    $free_field2 = 1;
    $free_field3 = 1;
    $free_field4 = 1;
    $free_field5 = 1;
    $free_field6 = 1;
    $free_field7 = 1;
    $free_field8 = 1;
    $free_field9 = 1;
    $srt_right = 1;
    $srt_left = 1;
    $srt_ff = 1;
    $sd_right = 1;
    $sd_left = 1;
    $sd_ff = 1;
    $mcl_right = 1;
    $mcl_left = 1;
    $mcl_ff = 1;
    $tol_right = 1;
    $tol_left = 1;
    $tol_ff = 1;
    $type_right = 1;
    $type_left = 1;
    $ecv_right = 1;
    $ecv_left = 1;
    $comp_right = 1;
    $comp_left = 1;
    $press_right = 1;
    $press_left = 1;
    $remarks = nl2br($exam->remarks);
    $technician_id = 1;
    $technician2_id = 1;
    $yndelete = 1;
    // $created_date = formatDate($row['created_date']);
    // $created_by = getNameBy($row['created_by']);
    // $updated_date = formatDate($row['updated_date']);
    // $updated_by = getNameBy($row['updated_by']);

    // getAdmissionInfo($admission_id);
    // getTechInfo($technician_id, $technician2_id);
    // $userpic = chkPic('patient', $patientcode);
    header("Content-type: image/png");
?>

<html>

<head>
    <title>AUDIOMETRY</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        @page{
            size: A4;
        }
    </style>
</head>

<body>
    <center>
        <table width="760" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="760" border="0" cellpadding="2" cellspacing="0" class="brdAll">
                            <tbody>
                                <tr>
                                    <td width="80" rowspan="5" align="center"><img
                                            src="../../../app-assets/images/logo/logo.jpg" width="80" height="80"
                                            alt=""></td>
                                    <td width="356" rowspan="3" align="center" valign="middle">
                                        <span class="lblCompName">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                            style="margin-bottom: 20px">
                                        <span class="lblCompDtl"><b>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                                Cor. San Antonio St. Malate, Manila<b><br>
                                                    Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
                                                    Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                    Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld
                                                    P&amp;I * West of England P&amp;I</b></b></span><b><b>
                                            </b></b>
                                    </td>
                                    <td width="218" valign="top" class="brdLeftBtm"><b>NAME:</b><br>
                                        <span
                                            style="font-size:15px; text-transform: uppercase;">{{$admission->lastname . " " . $admission->suffix . ', ' . $admission->firstname . " " . $admission->middlename}}</span>
                                    </td>
                                    <td width="39" valign="top" class="brdLeftBtm"><b>AGE:</b><br>
                                        <span style="font-size:15px">{{$admission->age}}</span>
                                    </td>
                                    <td width="45" valign="top" class="brdLeftBtm"><b>SEX:</b><br>
                                        <span style="font-size:15px">{{$admission->gender}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="27" colspan="3" align="left" valign="top" class="brdLeftBtm">
                                        <b>REQUESTED BY:</b><br>
                                        <span style="font-size:15px">
                                            @if (preg_match("/Bahia/i", $admission->agencyname)) 
                                                {{'Bahia Shipping Services, Inc.'}}
                                            @else
                                                {{$admission->agencyname}}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="26" align="left" valign="top" class="brdLeft"><b>PEME DATE:</b><br>
                                        <span style="font-size:15px">{{date_format(new DateTime($admission->trans_date), "d F Y")}}</span>
                                    </td>
                                    <td colspan="2" align="left" valign="top" class="brdLeft"><b>PATIENT
                                            NO:</b><br><span style="font-size:15px">{{$admission->patientcode}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="80" align="center" class="lblReport">PURE TONE AUDIOGRAM <br>
                        (Air & Bone, unmasked /masked, F.F.)</td>
                </tr>
                <tr>
                    <td>
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                                <td align="center">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="70%">
                                                <table width="100%" border="0" cellpadding="2" cellspacing="1"
                                                    class="brdTable" style="margin-right: 1rem;">
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
                                                        <td align="center"><?= $ar1 ?></td>
                                                        <td align="center"><?= $ar2 ?></td>
                                                        <td align="center"><?= $ar3 ?></td>
                                                        <td align="center"><?= $ar4 ?></td>
                                                        <td align="center"><?= $ar5 ?></td>
                                                        <td align="center"><?= $ar6 ?></td>
                                                        <td align="center"><?= $ar7 ?></td>
                                                        <td align="center"><?= $ar8 ?></td>
                                                        <td align="center"><?= $ar9 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Air Left</td>
                                                        <td align="center"><?= $al1 ?></td>
                                                        <td align="center"><?= $al2 ?></td>
                                                        <td align="center"><?= $al3 ?></td>
                                                        <td align="center"><?= $al4 ?></td>
                                                        <td align="center"><?= $al5 ?></td>
                                                        <td align="center"><?= $al6 ?></td>
                                                        <td align="center"><?= $al7 ?></td>
                                                        <td align="center"><?= $al8 ?></td>
                                                        <td align="center"><?= $al9 ?></td>
                                                    </tr>
                                                    @if($exam->aided_right1 || $exam->aided_right2 || $exam->aided_right3 || $exam->aided_right4 || $exam->aided_right5 || $exam->aided_right6 || $exam->aided_right7 || $exam->aided_right8 || $exam->aided_right9
                                                        || $exam->aided_left1 || $exam->aided_left2 || $exam->aided_left3 || $exam->aided_left4 || $exam->aided_left5 || $exam->aided_left6 ||$exam->aided_left7 || $exam->aided_left8 || $exam->aided_left9)
                                                    <tr>
                                                        <td>Aided Right</td>
                                                        <td align="center"><?= $br1 ?></td>
                                                        <td align="center"><?= $br2 ?></td>
                                                        <td align="center"><?= $br3 ?></td>
                                                        <td align="center"><?= $br4 ?></td>
                                                        <td align="center"><?= $br5 ?></td>
                                                        <td align="center"><?= $br6 ?></td>
                                                        <td align="center"><?= $br7 ?></td>
                                                        <td align="center"><?= $br8 ?></td>
                                                        <td align="center"><?= $br9 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aided Left</td>
                                                        <td align="center"><?= $bl1 ?></td>
                                                        <td align="center"><?= $bl2 ?></td>
                                                        <td align="center"><?= $bl3 ?></td>
                                                        <td align="center"><?= $bl4 ?></td>
                                                        <td align="center"><?= $bl5 ?></td>
                                                        <td align="center"><?= $bl6 ?></td>
                                                        <td align="center"><?= $bl7 ?></td>
                                                        <td align="center"><?= $bl8 ?></td>
                                                        <td align="center"><?= $bl9 ?></td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td>BONE Right</td>
                                                        <td align="center"><?= $exam->bone_right1 ?></td>
                                                        <td align="center"><?= $exam->bone_right2 ?></td>
                                                        <td align="center"><?= $exam->bone_right3 ?></td>
                                                        <td align="center"><?= $exam->bone_right4 ?></td>
                                                        <td align="center"><?= $exam->bone_right5 ?></td>
                                                        <td align="center"><?= $exam->bone_right6 ?></td>
                                                        <td align="center"><?= $exam->bone_right7 ?></td>
                                                        <td align="center"><?= $exam->bone_right8 ?></td>
                                                        <td align="center"><?= $exam->bone_right9 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BONE Left</td>
                                                        <td align="center"><?= $exam->bone_left1 ?></td>
                                                        <td align="center"><?= $exam->bone_left2 ?></td>
                                                        <td align="center"><?= $exam->bone_left3 ?></td>
                                                        <td align="center"><?= $exam->bone_left4 ?></td>
                                                        <td align="center"><?= $exam->bone_left5 ?></td>
                                                        <td align="center"><?= $exam->bone_left6 ?></td>
                                                        <td align="center"><?= $exam->bone_left7 ?></td>
                                                        <td align="center"><?= $exam->bone_left8 ?></td>
                                                        <td align="center"><?= $exam->bone_left9 ?></td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td>Free Field</td>
                                                        <td align="center"><?= $exam->free_field1 ?></td>
                                                        <td align="center"><?= $exam->free_field2 ?></td>
                                                        <td align="center"><?= $exam->free_field3 ?></td>
                                                        <td align="center"><?= $exam->free_field4 ?></td>
                                                        <td align="center"><?= $exam->free_field5 ?></td>
                                                        <td align="center"><?= $exam->free_field6 ?></td>
                                                        <td align="center"><?= $exam->free_field7 ?></td>
                                                        <td align="center"><?= $exam->free_field8 ?></td>
                                                        <td align="center"><?= $exam->free_field9 ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="29%"><img src="../../../app-assets/images/imgAudioLegend.jpg"
                                                    width="190" height="114" alt="" /></td>
                                        </tr>
                                    </table>
                                    <table width="678" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="366"><img src="{{url('')}}/exam_audio_graphright?<?= "ar1=$ar1&ar2=$ar2&ar3=$ar3&ar4=$ar4&ar5=$ar5&ar6=$ar6&ar7=$ar7&ar8=$ar8&ar9=$ar9&br1=$br1&br2=$br2&br3=$br3&br4=$br4&br5=$br5&br6=$br6&br7=$br7&br8=$br8&br9=$br9" ?>"
                                                    alt="" width="340" height="300" /> </b></td>
                                            <td width="12">&nbsp;</td>
                                            <td width="372" align="center"><img src="{{url('')}}/exam_audio_graphleft?<?= "al1=$al1&al2=$al2&al3=$al3&al4=$al4&al5=$al5&al6=$al6&al7=$al7&al8=$al8&al9=$al9&bl1=$bl1&bl2=$bl2&bl3=$bl3&bl4=$bl4&bl5=$bl5&bl6=$bl6&bl7=$bl7&bl8=$bl8&bl9=$bl9" ?>"
                                                    alt="" width="340" height="300" /></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><b>RIGHT EAR AUDIOGRAM</b></td>
                                            <td>&nbsp;</td>
                                            <td align="center"><b>LEFT EAR AUDIOGRAM</b></td>
                                        </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center">&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="50%" align="center"><b>SPEECH AUDIOMETRY</b> <br>
                                                <table width="300" border="0" cellpadding="2" cellspacing="0"
                                                    class="brdAll">
                                                    <tr>
                                                        <td width="68" class="brdBtm">&nbsp;</td>
                                                        <td width="72" align="center" class="brdLeftBtm">RIGHT</td>
                                                        <td width="73" align="center" class="brdLeftBtm">LEFT</td>
                                                        <td width="71" align="center" class="brdLeftBtm">FF</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="brdBtm">SRT</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->srt_right }}</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->srt_left }}</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->srt_ff }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="brdBtm">SD</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->sd_right }}
                                                            %</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->sd_left }}
                                                            %</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->sd_ff }}
                                                            %</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="brdBtm">MCL</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->mcl_right }}</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->mcl_left }}</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->mcl_ff }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">TOL</td>
                                                        <td align="right" class="brdLeft">
                                                            {{ $exam->tol_right }}
                                                        </td>
                                                        <td align="right" class="brdLeft">
                                                            {{ $exam->tol_left }}
                                                        </td>
                                                        <td align="right" class="brdLeft">
                                                            {{ $exam->tol_ff }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" align="center"><b>TYMPANOMETRY TEST</b> <br>
                                                <table width="300" border="0" cellpadding="2" cellspacing="0"
                                                    class="brdAll">
                                                    <tr>
                                                        <td width="68" class="brdBtm">&nbsp;</td>
                                                        <td width="72" align="center" class="brdLeftBtm">RIGHT</td>
                                                        <td width="73" align="center" class="brdLeftBtm">LEFT</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="brdBtm">TYPE</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->type_right }}
                                                        </td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->type_left }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="brdBtm">ECV</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->ecv_right }}</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->ecv_left }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="brdBtm">COMPLIANCE</td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->comp_right }}
                                                        </td>
                                                        <td align="right" class="brdLeftBtm">{{ $exam->comp_left }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">PRESSURE</td>
                                                        <td align="right" class="brdLeft">
                                                            {{ $exam->press_right }}
                                                        </td>
                                                        <td align="right" class="brdLeft">
                                                            {{ $exam->press_left }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="40" colspan="2" align="left"><b>Remarks:</b>
                                                {{ $exam->remarks }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="760" border="0" cellpadding="2" cellspacing="0">
                                        <tr>
                                            <td height="120" align="center" valign="bottom">
                                                <table width="260" border="0" cellspacing="2" cellpadding="2">
                                                    <tr>
                                                        <td align="center">
                                                            @if ($technician1)
                                                                @if($technician1->signature)
                                                                    <img src="{{$technician1->signature}}" width="150" height="50" style="object-fit: cover;" />
                                                                @else
                                                                    <div style="width: 150px;height: 20px;"></div>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr valign="bottom">
                                                        <td align="center" class="brdTop">
                                                            {{$technician1 ? $technician1->firstname . " " . $technician1->middlename[0] . "." . " " . $technician1->lastname . ", " . $technician1->title : null}}
                                                            <br>
                                                            Audiometrician
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td colspan="3" align="center" valign="bottom">
                                                <table width="260" border="0" cellspacing="2" cellpadding="2">
                                                    <tr>
                                                        <td align="center">
                                                            @if ($technician2)
                                                                @if($technician2->signature)
                                                                    <img src="{{$technician2->signature}}" width="150" height="50" style="object-fit: cover;" />
                                                                @else
                                                                    <div style="width: 150px;height: 20px;"></div>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr valign="bottom">
                                                        <td align="center" class="brdTop">
                                                            {{$technician2 ? $technician2->firstname . " " . $technician2->middlename[0] . "." . " " . $technician2->lastname . ", " . $technician2->title : null}}
                                                            <br>
                                                            Otolaryngologist
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="30"><span class="lblForm">FORM NO. 35<br>REV. 02 / 06-15-2022</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>