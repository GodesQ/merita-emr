@php
function initCheck($val,$chkval) {
return ($val==$chkval) ? "checked" : "";
}

function formatDate($val,$type=0,$kind=0) {
if ($val=="" || $val=="0000-00-00") {
if ($type==2)
return "null";
else
return "";
} else {
$time = ($kind==0) ? "" : " H:i:s";
if ($type==0) {
return date("m/d/Y".$time,strtotime($val));
} elseif ($type==1) {
return date("F d, Y".$time,strtotime($val));
} elseif ($type==2) {
return date("Y-m-d".$time,strtotime($val));
} elseif ($type==3) {
return date("d/M/Y".$time,strtotime($val));
} elseif ($type==4) {
return date("M. d, Y".$time,strtotime($val));
} elseif ($type==5){
return date("Y".$time,strtotime($val));
} elseif ($type==6){
return date("l(d)".$time,strtotime($val));
} elseif ($type==7){
return date("Y/m/d".$time,strtotime($val));
} elseif ($type==8){
return date("d/m/Y".$time,strtotime($val));
} elseif ($type==9){
return date("F".$time,strtotime($val));
} elseif ($type==10){
return date("mdy".$time,strtotime($val));
} elseif ($type==11){
return date("d M Y".$time,strtotime($val));
} elseif ($type==12){
return date("d F Y".$time,strtotime($val));
} elseif ($type==13){
return date("M/d/Y".$time,strtotime($val));
}
}
}

@endphp

<html>

<head>
    <title>HIV</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
</head>

<body>
    <center>
        <style>
            .underlined {
                text-decoration: underline;
            }
        </style>
        <table width="680" border="0" cellpadding="2" cellspacing="0" class="">
            <tr>
                <td colspan="3" align="left">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td width="100%" colspan="3" align="center" valign="bottom">
                                <h3>HUMAN IMMUNODEFICIENCY VIRUS (HIV) <br>
                                    SCREENING TEST CERTIFICATE</h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><span style="margin-left:40px; ">This is to certify that
                                    <b>
                                        <span class="{{$admission->patient->gender == 'Male' ? 'underlined' : ''}}">Mr.</span> /
                                        <span class="{{$admission->patient->gender == 'Female' ? 'underlined' : ''}}">Ms.</span>
                                        <u style="text-transform: uppercase;">
                                            {{$admission->patient->lastname . " " . $admission->patient->suffix . ", " .$admission->patient->firstname . " " . $admission->patient->middlename}}
                                        </u>
                                    </b>
                                    has undergone screening test
                                    for HIV/Acquired Immunodeficiency Syndrome (AIDS),
                                    and was found to be <b><?php echo $exam->result?>*</b> based on laboratory test
                                    (HIV-1/HIV-2).</span></td>
                        </tr>
                        <tr>
                            <td height="80" colspan="3" align="center">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 1rem 0;">
                                    <tr>
                                        <td width="60%" rowspan="6">
                                            <div style="width: 150px; height: 140px;padding: 0.2rem; border: 1px solid black;">
                                                <img src="../../../app-assets/images/profiles/{{$admission->patient->patient_image}}"  alt="Patient Picture" width="100%" height="100%">
                                            </div>
                                        </td>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="">
                                            <table width="350" border="0" cellspacing="2" cellpadding="2">
                                                <tr valign="bottom">
                                                    <td align='center'>
                                                        @if ($technician3)
                                                            <img src="{{$technician3->signature}}" width="100px" style="object-fit: cover;"/>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                     @if ($technician3)
                                                    <td style="text-transform: uppercase;">{{$technician3->firstname . " " . $technician3->middlename . " " . $technician3->lastname}}
                                                    </td>
                                                     @endif
                                                </tr>
                                                <tr valign="bottom">
                                                    <td align="left" class="brdTop">
                                                        Examining Physician<br>
                                                        License No.: <b>
                                                            @if ($technician3)
                                                                {{$technician3->license_no}}
                                                            @endif
                                                            </b><br>
                                                        Date of Medical Examination:
                                                        <b><?=formatDate($admission->trans_date,11)?></b>
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="3" align="left" valign="middle">
                    <table width="680" border="0" cellspacing="0" cellpadding="3">
                        <tr>
                            <td valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td colspan="3" align="center">
                                            <h2>LABORATORY REPORT</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="60%" align="right">&nbsp;</td>
                                        <td width="20%" align="right"> Date:</td>
                                        <td width="20%" align="center" style="border-bottom : 1px solid"><b>
                                                <?=formatDate($admission->trans_date,11)?>
                                            </b></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="497" valign="top"><br>
                                <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td width="6%">Name:</td>
                                        <td width="46%" class="brdBtm" style="text-transform: uppercase; font-size: 13px;"><b>
                                                <?php echo $admission->patient->lastname . ', ' . $admission->patient->firstname . ' ' . $admission->patient->middlename?>
                                            </b></td>
                                        <td width="1%">Age:</td>
                                        <td width="4%" class="brdBtm"><b>
                                                <?=$admission->patient->age?>
                                            </b></td>
                                        <td width="5%">Sex:</td>
                                        <td width="9%" class="brdBtm"><b>
                                                <?=$admission->patient->gender?>
                                            </b></td>
                                        <td width="16%">Civil Status:</td>
                                        <td width="9%" class="brdBtm"><b>
                                                <?=$gen_info->maritalstatus?>
                                            </b></td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td width="6%">Address:</td>
                                        <td width class="brdBtm"><b>
                                                <?=$gen_info->address?>
                                            </b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Human Immunodeficiency Virus Types I (HIV-I) and (HIV-2) as a
                                            screening test for HIV/AIDS: <br>
                                            Screening Test Used:
                                            @if($exam->exam == "rapid")
                                            <p><span style="text-align: left">
                                                    <input name="exam" type="checkbox" id="exam" value="rapid"
                                                        <?=initCheck("rapid",$exam->exam)?> disabled />
                                                </span>RAPID</p>
                                            @endif
                                            @if($exam->exam == "particle")
                                            <p><span style="text-align: left">
                                                    <input name="exam" type="checkbox" id="exam" value="particle"
                                                        <?=initCheck("particle",$exam->exam)?> disabled />
                                                </span>Particle Agglutination</p>
                                            @endif
                                            @if($exam->exam == "enzyme")
                                            <p><span style="text-align: left">
                                                    <input name="exam" type="checkbox" id="exam" value="enzyme"
                                                        <?=initCheck("enzyme",$exam->exam)?> disabled />
                                                </span>EIA/CMIA/ELFA</p>
                                            @endif
                                            @if($exam->exam == "others")
                                            <p><span style="text-align: left">
                                                    <input name="exam" type="checkbox" id="exam" value="others"
                                                        <?=initCheck("others",$exam->others)?> disabled />
                                                </span>Others (specify): <u>
                                                    <?=nl2br($exam->others)?>
                                                </u></p>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="" colspan="2" align="center">
                    <h2>RESULT *
                        <?=$exam->result?>
                    </h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="bottom">
                    <table width="260" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                            <td width="260" align='center'>
                                @if($technician1)
                                    @if($technician1->signature)
                                        <img src="{{$technician1->signature}}" width="100px" style="object-fit: cover;"/>
                                    @else
                                        <div></div>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr valign="bottom">
                            <td align="left" class="brdTop">
                                @if ($technician1)
                                        {{$technician1->firstname . " " . $technician1->middlename[0] . "." . " " . $technician1->lastname . ", " . $technician1->title}}<br>
                                    Medical Technologist<br>
                                    Lic. No. {{$technician1->license_no}} <br><br>
                                    HIV Proficiency Cert. No.<b><u>2713</u></b><br>
                                    Expiry Date : <b><u>{{date_format(new DateTime($exam->expiry_date), "F d, Y")}}</u></b><br>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="bottom">
                    <table width="260" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                            <td width="207" align='center'>
                                @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                                    <img src="../../../app-assets/images/signatures/noel_lab_sig.png" width="240" height="90" style="object-fit: cover; transform: translate(0px, 40px);" />
                                @else
                                    <br>
                                    <br>
                                @endif
                            </td>
                        </tr>
                        <tr valign="bottom">
                            <td align="left" class="brdTop">
                                @if ($technician2)
                                    {{$technician2->firstname . " " . $technician1->middlename[0] . "." . " " . $technician2->lastname . ", " . $technician2->title}}<br>
                                Pathologist<br>
                                Lic. No. {{$technician2->license_no}}
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="bottom" class="smallfont">
                    <hr>
                    *A nonreactive result indicates that the tested sample does not contain detectable Human
                    Immunodeficiency Virus (HIV) antibody. This does not preclude the possibility of recent exposure to
                    an infection by HIV.
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="top"><span class="lblForm">FORM NO. 32 REV. 00 / 20-02-2018</span></td>
            </tr>
        </table>
    </center>
</body>

</html>
