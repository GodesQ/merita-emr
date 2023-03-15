@php
function encircle($val,$num) {
echo ($val=="") ? $num : '<span style="border-radius:50%; border:solid black 1px;padding:5px">'.$num.'</span>';
}
@endphp

<html>

<head>
    <title>DENTAL EXAM</title>
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
                                    <td width="80" rowspan="3" align="center"><img
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
                    <td height="50" align="center" class="lblReport">DENTAL EXAM</td>
                </tr>
                <tr>
                    <td>
                        <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" border="0" cellpadding="2" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center"></td>
                                                    <td colspan="2" align="center"><b><u>SHORT MEDICAL HISTORY</u></b>
                                                    </td>
                                                    <td align="center"></td>
                                                </tr>
                                                <tr>
                                                    <td width="163"><b>ORAL HYGIENE </b></td>
                                                    <td width="233"></td>
                                                    <td width="147"><b>COLOR</b></td>
                                                    <td width="195"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>GINGIVA CONSISTENCY</b></td>
                                                    <td></td>
                                                    <td><b>TONGUE</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td height="" colspan="4">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td colspan="4"><u><b>ALLERGY</b></u></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="22%"><b class="size10">HIGH BLOOD
                                                                            PRESSURE</b></td>
                                                                    <td width="8%">{{$exam->high_blood}}</td>
                                                                    <td width="16%"><b class="size10">HEPATITIS</b></td>
                                                                    <td width="8%">{{$exam->hepatitis}}</td>
                                                                    <td width="16%"><b class="size10">FOOD</b></td>
                                                                    <td width="8%">{{$exam->food}}</td>
                                                                    <td width="14%"><b class="size10">FAINTING</b></td>
                                                                    <td width="8%">{{$exam->fainting}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b class="size10">DIABETES</b></td>
                                                                    <td>{{$exam->diabetis}}</td>
                                                                    <td><b class="size10">GOITER</b></td>
                                                                    <td>{{$exam->goiter}}</td>
                                                                    <td><b class="size10">DRUGS</b></td>
                                                                    <td>{{$exam->drugs}}</td>
                                                                    <td><b class="size10">OTHERS</b></td>
                                                                    <td>{{$exam->others}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="22"><strong
                                                                            class="size10">TUBERCULOSIS</strong></td>
                                                                    <td>{{$exam->tuberculosis}}</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td><b class="size10">ANESTHESIA</b></td>
                                                                    <td>{{$exam->anesthesia}}</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td width="66%" align="center"><u><strong>PERMANENT
                                                                DENTITION</strong></u></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table width="50%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table width="88%" height="" border="1"
                                                                            align="left" cellpadding="5" cellspacing="0"
                                                                            dir="ltr" style="font-size: 10px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth18}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth17}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth16}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth15}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth14}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth13}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth12}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth11}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth21}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth22}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth23}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth24}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth25}}</td>
                                                                                    <td width="3%" align="center">
                                                                                        {{$exam->tooth26}}</td>
                                                                                    <td width="4%" align="center">
                                                                                        {{$exam->tooth27}}</td>
                                                                                    <td width="54%" align="center">
                                                                                        {{$exam->tooth28}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno18.jpg"
                                                                                            width="16" height="105"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno17.jpg"
                                                                                            width="19" height="100"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno15.jpg"
                                                                                            width="20" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno15.jpg"
                                                                                            width="22" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno14.jpg"
                                                                                            width="18" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno13.jpg"
                                                                                            width="20" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno12.jpg"
                                                                                            width="25" height="136"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno11.jpg"
                                                                                            width="23" height="124"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno21.jpg"
                                                                                            width="20" height="115"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno22.jpg"
                                                                                            width="22" height="115"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno23.jpg"
                                                                                            width="19" height="106"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno24.jpg"
                                                                                            width="19" height="102"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno25.jpg"
                                                                                            width="22" height="105"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno26.jpg"
                                                                                            width="22" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno27.jpg"
                                                                                            width="20" height="107"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno28.jpg"
                                                                                            width="22" height="110"
                                                                                            alt=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition18,"18");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition17,"17");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition16,"16");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition15,"15");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition14,"14");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition13,"13");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition12,"12");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition11,"11");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition21,"21");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition22,"22");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition23,"23");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition24,"24");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition25,"25");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition26,"26");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition27,"27");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition28,"28");?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition48,"48");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition47,"47");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition46,"46");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition45,"45");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition44,"44");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition43,"43");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition42,"42");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition41,"41");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition31,"31");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition31,"31");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition33,"33");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition34,"34");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition35,"35");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition36,"36");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition37,"37");?>
                                                                                    </td>
                                                                                    <td align="center" valign="middle">
                                                                                        <?=encircle($exam->dentition38,"38");?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno48.jpg"
                                                                                            width="23" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno47.jpg"
                                                                                            width="20" height="90"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno46.jpg"
                                                                                            width="23" height="90"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno45.jpg"
                                                                                            width="18" height="90"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno44.jpg"
                                                                                            width="22" height="90"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno43.jpg"
                                                                                            width="20" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno42.jpg"
                                                                                            width="14" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno41.jpg"
                                                                                            width="21" height="111"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno31.jpg"
                                                                                            width="18" height="115"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno32.jpg"
                                                                                            width="23" height="115"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno33.jpg"
                                                                                            width="21" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno34.jpg"
                                                                                            width="20" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno35.jpg"
                                                                                            width="23" height="111"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno36.jpg"
                                                                                            width="17" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno37.jpg"
                                                                                            width="19" height="110"
                                                                                            alt=""></td>
                                                                                    <td align="center" valign="top"><img
                                                                                            src="../../../app-assets/images/dental/tno38.jpg"
                                                                                            width="24" height="111"
                                                                                            alt=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth48}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth47}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth46}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth45}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth44}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth43}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth42}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth41}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth31}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth32}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth33}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth34}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth35}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth36}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth37}}</td>
                                                                                    <td align="center">
                                                                                        {{$exam->tooth38}}</td>
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
                                                    <td align="center">
                                                        <table width="80%" border="0" cellspacing="0" cellpadding="0"
                                                            style="border: solid 1px black">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <table width="100%" border="0" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="7" align="center"><span
                                                                                            class="qq"><strong><u>LEGEND</u></strong></span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">
                                                                                                &nbsp;BLUE INK - Shade
                                                                                                location of the
                                                                                                restoration</font>
                                                                                        </span></td>
                                                                                    <td width="5%"><span
                                                                                            class="smallfont">Se</span>
                                                                                    </td>
                                                                                    <td width="25%"><span
                                                                                            class="smallfont">-
                                                                                            Sealant</span></td>
                                                                                    <td colspan="2"><span
                                                                                            class="smallfont">
                                                                                            <font color="red">RED INK -
                                                                                                Shade location of
                                                                                                abnormality</font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="6%"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">&nbsp;Am
                                                                                            </font>
                                                                                        </span></td>
                                                                                    <td colspan="2"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">- Amalgam
                                                                                                Filling</font>
                                                                                        </span></td>
                                                                                    <td><span
                                                                                            class="smallfont">GIC</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">- Glass
                                                                                            Ionomer</span></td>
                                                                                    <td width="3%"><span
                                                                                            class="smallfont">
                                                                                            <font color="red">C</font>
                                                                                        </span></td>
                                                                                    <td width="25%"><span
                                                                                            class="smallfont">
                                                                                            <font color="red">-
                                                                                                Carries/Cavity</font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="blue">&nbsp;Co
                                                                                            </font>
                                                                                        </span></td>
                                                                                    <td colspan="2"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">-
                                                                                                Composite</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">3/4
                                                                                            Cr</span></td>
                                                                                    <td><span class="smallfont">- Three
                                                                                            Quarter Crown</span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">TF</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">-
                                                                                                Temporary Filling</font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="blue">&nbsp;PJC
                                                                                            </font>
                                                                                        </span></td>
                                                                                    <td colspan="2"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">-
                                                                                                Plastic/Porcelain Jacket
                                                                                                Crown</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">P</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">-
                                                                                            Pontic</span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">X</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">- For
                                                                                                extraction</font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="blue">&nbsp;MC
                                                                                            </font>
                                                                                        </span></td>
                                                                                    <td colspan="2"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">- Metal
                                                                                                Crown</font>
                                                                                        </span></td>
                                                                                    <td><span
                                                                                            class="smallfont">In</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">-
                                                                                            Inlay</span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">RF</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">- Root
                                                                                                Fragments</font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">
                                                                                                &nbsp;Encircled No.
                                                                                            </font>
                                                                                        </span></td>
                                                                                    <td width="27%"><span
                                                                                            class="smallfont">
                                                                                            <font color="blue">- Tooth
                                                                                                Present</font>
                                                                                        </span></td>
                                                                                    <td><span
                                                                                            class="smallfont">On</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">-
                                                                                            Onlay</span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">UN</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">-
                                                                                                Unerupted</font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                    <td colspan="2">&nbsp;</td>
                                                                                    <td><span
                                                                                            class="smallfont">Abt</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">-
                                                                                            Abutment</span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">M</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">- Missing
                                                                                            </font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3">&nbsp;</td>
                                                                                    <td><span
                                                                                            class="smallfont">GC</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">- Gold
                                                                                            Crown</span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">Ab</font>
                                                                                        </span></td>
                                                                                    <td><span class="smallfont">
                                                                                            <font color="red">- Abrasion
                                                                                            </font>
                                                                                        </span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3">&nbsp;</td>
                                                                                    <td><span
                                                                                            class="smallfont">CD</span>
                                                                                    </td>
                                                                                    <td><span class="smallfont">-
                                                                                            Complete Denture</span></td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td>&nbsp;</td>
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
                                                    <td align="center">
                                                        <table width="80%" border="0" cellpadding="2" cellspacing="0"
                                                            class="brdAll">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="21%" align="center" class="brdBtm">
                                                                        <b>DATE</b>
                                                                    </td>
                                                                    <td width="59%" align="left" class="brdLeftBtm">
                                                                        <b>SERVICE RENDERED</b>
                                                                    </td>
                                                                    <td width="20%" align="center" class="brdLeftBtm">
                                                                        <b>TOOTH NO.</b>
                                                                    </td>
                                                                </tr>
                                                                @forelse($exam_services as $exam_service)
                                                                    <tr>
                                                                        <td  width="21%" align="center" class="brdBtm">{{$exam_service->date}}</td>
                                                                        <td width="59%" align="left" class="brdLeftBtm">{{$exam_service->service}}</td>
                                                                        <td idth="20%" align="center" class="brdLeftBtm">{{$exam_service->teeth}}</td>
                                                                    </tr>
                                                                @empty
                                                                <tr>
                                                                    <td colspan="3">No Record Found</td>
                                                                </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>REMARKS:</b>
                                                        {{$exam->remarks}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellpadding="2" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td align="right" valign="bottom">
                                                        <table width="270" border="0" cellspacing="2" cellpadding="2">
                                                            <tbody>
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
                                                                        {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : null}}
                                                                        <br>
                                                                        <b>Dentist</b>
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
                <tr>
                    <td height="60"><span class="lblForm">FORM NO. 5<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>