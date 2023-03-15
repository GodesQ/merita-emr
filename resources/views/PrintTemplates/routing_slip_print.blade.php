<html>

<head>
    <style>
    .lbl {
        font-weight: bold;
        font-size: 12px;
    }

    .val {
        font-size: 16px;
        margin-left: 5px;
        text-transform: uppercase;
    }

    .valSmall {
        font-size: 15px;
        margin-left: 5px;
        text-transform: uppercase;
    }

    table {
        font-family: times new roman;
        font-size: 13px;
        text-transform: uppercase;
    }

    @page {
        size: A4;
    }
    </style>
    <!--<link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css" />-->
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
</head>

<body>
    <table width="760" border="0" align="center" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
                <td valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="155" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>A.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="317" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>B.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="16" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>C.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="132" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>D.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="40" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>E.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="61" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>F.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="20" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>G.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="22" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>H.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/dot.gif" height="22" width="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>I.</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td valign="top">
                    <table width="100%" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="79%" align="center" valign="top">
                                    <font size="5"><b>
                                            MERITA DIAGNOSTIC CLINIC INC. <b></b></b></font><b><b><br>
                                            <font size="2">
                                                5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave. Cor. San Antonio St.
                                                Malate Manila </font><br>
                                            <br>
                                            <font size="4"><b>ROUTING SLIP</b> </font>
                                            <b>{{$admission->admit_type == "Rush" ? "(Rush)" : null}}<b><br>
                                                    &nbsp; </b></b>
                                        </b></b>
                                </td>
                                <td width="21%" colspan="2" align="center" valign="middle"
                                    style="border:solid 1.7px black; border-bottom:solid 1.7px white">
                                    <img src="../../../app-assets/images/profiles/{{$admission->patient_image . '?' . $admission->updated_date}}"
                                        alt="Patient Picture" width="150" height="148">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="32%">
                                    <span class="lbl">LAST NAME</span>
                                    <br>
                                    <span class="val" style="text-transform: uppercase;">{{$admission->lastname}} {{$admission->suffix}}</span>
                                </td>
                                <td colspan="2">
                                    <span class="lbl">FIRST NAME</span>
                                    <br> 
                                    <span class="val">{{$admission->firstname}}</span>
                                </td>
                                <td width="33%" colspan="2">
                                    <span class="lbl">MIDDLE NAME</span>
                                    <br>
                                    <span class="val">{{$admission->middlename}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td height="36" colspan="5" style="border-bottom: solid 1.7px white;">
                                    <span class="lbl" style="float:left; margin-top:2px; text-transform: uppercase;">PERMANENT ADDRESS</span>
                                    <span class="val"
                                        style="width:580px; display:inherit; float:right; border-bottom:solid 1.7px black;">{{$patientInfo->address}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="369" valign="top">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="10%">
                                                    <span class="lbl">SEX</span>
                                                </td>
                                                <td colspan="2" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall" style="text-transform: uppercase;">{{$admission->gender}}</span>
                                                </td>
                                                <td width="25%">
                                                    <span class="lbl">CIVIL STATUS</span>
                                                </td>
                                                <td width="36%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall" style="text-transform: uppercase;">{{$patientInfo->maritalstatus}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="lbl">AGE</span>
                                                </td>
                                                <td colspan="2" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$admission->age}} </span>
                                                </td>
                                                <td>
                                                    <span class="lbl">RELIGION</span>
                                                </td>
                                                <td style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{ $patientInfo->religion == 'OTHERS' ? $patientInfo->religion_other : $patientInfo->religion }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">PLACE OF BIRTH</span>
                                                </td>
                                                <td width="248" colspan="3" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$patientInfo->birthplace}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">DATE OF BIRTH</span>
                                                </td>
                                                <td colspan="3" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$patientInfo->birthdate}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;
                                                </td>
                                                <td colspan="3">
                                                    <span class="lbl">Year / Month / Day</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="373" colspan="3" valign="middle">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="15%">
                                                    <span class="lbl">AGENCY</span>
                                                </td>
                                                <td colspan="2" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (preg_match("/Bahia/i", $patientInfo->agencyname)) 
                                                            {{'Bahia Shipping Services, Inc.'}}
                                                        @else
                                                            {{$patientInfo->agencyname}}
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="45%">
                                                    <span class="lbl">Employment Status</span>
                                                </td>
                                                <td colspan="2" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$admission->emp_status}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">POSITION APPLIED FOR</span>
                                                </td>
                                                <td width="57%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$admission->position_applied}} </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="200">
                                                    <span class="lbl">LAST MEDICAL AT MERITA</span>
                                                </td>
                                                <td width="120" colspan="2" style="border-bottom: solid 1.7px black">
                                                    <input class="valSmall" class="brdNone" style="width:130px;text-align:left;border: none;" value='{{$admission->last_medical}}'/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="18%">
                                                    <span class="lbl">TEL. NO.</span>
                                                </td>
                                                <td width="25%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                                <td width="22%">
                                                    <span class="lbl">CELL. NO.</span>
                                                </td>
                                                <td width="35%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$patientInfo->contactno}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="369" valign="middle" style="border-top: solid 1.7px white;">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">
                                                    <span class="lbl">IDENTIFICATION</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="29%">
                                                    <span class="lbl">PASSPORT NO.</span>
                                                </td>
                                                <td width="71%" colspan="2" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$patientInfo->passportno}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">SEAMN'S BOOK NO.</span>
                                                </td>
                                                <td width="230" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">{{$patientInfo->srbno}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">GOV'T VALID ID</span>
                                                </td>
                                                <td width="212" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td colspan="2" valign="bottom" style="border-top: solid 1.7px white;">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="12">
                                                </td>
                                                <td width="187">&nbsp;
                                                </td>
                                                <td width="13">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;
                                                </td>
                                                <td align="center" style="border-bottom: solid 1.7px black">
                                                    @if($admission->patient_signature)
                                                     <img src="@php echo base64_decode($admission->patient_signature)@endphp" alt="" width="120">
                                                    @elseif ($admission->signature)
                                                        <img src="data:image/jpeg;base64,{{$admission->signature}}" width="150"/>
                                                    @else 
                                                        
                                                    @endif

                                                    <span class="lbl">Applicant's Signature / Date</span>
                                                </td>
                                                <td>&nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;
                                                </td>
                                                <td align="center">&nbsp;
                                                </td>
                                                <td>&nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="143" align="center" valign="bottom" style="border-top: solid 1.7px white;">
                                    <span class="lbl">RIGHT THUMBMARK</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdLTR"
                        style="margin-top: 5px;">
                        <tbody>
                            <tr>
                                <td height="36" colspan="2">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="18%">
                                                    <span class="lbl">MEDICAL PACKAGE</span>
                                                </td>
                                                <td width="41%" style="border-bottom: solid 1.7px black">
                                                    <span class="val">{{$patientInfo->packagename}}</span>
                                                </td>
                                                <td width="12%">
                                                    <span class="lbl">Additional</span>
                                                </td>
                                                <td width="35%" style="border-bottom: solid 1.7px black">
                                                    <span class="val">{{$additional}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdLTR">
                        <tbody>
                            <tr>
                                <td width="100%" height="35" colspan="2">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="6" class="lbl">
                                                    LABORATORY
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="8%" style="" class="lbl">
                                                    1. CBC
                                                </td>
                                                <td width="25%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!preg_grep("/^CBC/i", $exams))
                                                            -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td width="9%" class="lbl">
                                                    5. VDRL
                                                </td>
                                                <td width="29%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!preg_grep("/^VDRL/i", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td width="6%" class="lbl">
                                                    9. ESR
                                                </td>
                                                <td width="23%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("ESR", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="14%" class="lbl">
                                                    2. BLOOD TYPE
                                                </td>
                                                <td width="19%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                       &nbsp;
                                                    </span>
                                                </td>
                                                <td width="14%" class="lbl">
                                                    6. HEPATITIS B
                                                </td>
                                                <td width="24%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!preg_grep("/^Hepatitis/i", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td width="20%" class="lbl">
                                                    10. BLOOD CHEMISTRY
                                                </td>
                                                <td width="9%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if(!in_array("BLOOD CHEM (11)", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td width="14%" class="lbl">
                                                    3. URINE EXAM
                                                </td>
                                                <td width="19%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("Urinalysis", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td width="15%" class="lbl">
                                                    7. HIV/AIDS TEST
                                                </td>
                                                <td width="23%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!preg_grep("/^HIV/i", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td width="17%" class="lbl">
                                                    11. ELECTROLYTES
                                                </td>
                                                <td width="12%" style="border-bottom: solid 1.7px black">&nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt"
                                        style="margin-bottom: 5px">
                                        <tbody>
                                            <tr>
                                                <td width="14%" class="lbl">
                                                    4. STOOL EXAM
                                                </td>
                                                <td width="19%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("Fecalysis", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td width="13%" class="lbl">
                                                    8. PREG. TEST
                                                </td>
                                                <td width="25%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("Pregnancy test - Serum", $exams))
                                                        -
                                                        @endif</span>
                                                </td>
                                                <td width="17%">&nbsp;
                                                </td>
                                                <td width="12%">&nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdLTR">
                        <tbody>
                            <tr>
                                <td width="50%" height="25" style="border-right: solid 1.7px black;">
                                    <span class="lbl">1. DRUG TEST:</span>
                                    <span class="valSmall">
                                        <!-- @if (!in_array("Pregnancy test - Serum", $exams))
                                        N/A
                                        @endif -->
                                    </span>
                                </td>
                                <td width="50%" height="25">
                                    <span class="lbl">2. ALCOHOL TEST:</span>
                                    <span class="valSmall">
                                        &nbsp; </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt"
                                        style="margin-bottom: 5px">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">CHEST X-RAY</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="12%" align="right">
                                                    <span class="lbl">PA</span>
                                                </td>
                                                <td width="88%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt"
                                        style="margin-bottom: 5px">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="lbl">X-RAY LUMBOSACRAL</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="45%" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                        <tbody>
                            <tr>
                                <td width="241" valign="middle"
                                    style="border-top: solid 1.7px white; border-bottom: solid 1.7px white;">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">1. VISUAL ACUITY</span>
                                                </td>
                                                <td width="114" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("Visual Acuity", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">2. AUDIOMETRY</span>
                                                </td>
                                                <td width="123" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!preg_grep("/^Audiometry/i", $exams) || in_array("Pure tone Audiometry", $exams))
                                                            -
                                                        @endif 
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt"
                                        style="margin-bottom: 5px">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">3. ISHIHARA</span>
                                                </td>
                                                <td width="146" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!preg_grep("/^Ishihara/i", $exams))
                                                        -
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="242" valign="middle"
                                    style="border-top: solid 1.7px white; border-bottom: solid 1.7px white;">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">4. ECG</span>
                                                </td>
                                                <td width="169" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("ECG", $exams))
                                                        -
                                                        @endif
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">5. SPIROMETRY</span>
                                                </td>
                                                <td width="126" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">6. STRESS TEST</span>
                                                </td>
                                                <td width="120" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        @if (!in_array("STRESS TEST (Treadmill Exercise Test)", $exams))
                                                        -
                                                        @endif </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="255" colspan="3" valign="middle"
                                    style="border-top: solid 1.7px white; border-bottom: solid 1.7px white;">
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">7. KUB ULTRASOUND</span>
                                                </td>
                                                <td width="86" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">8. HBT ULTRASOUND</span>
                                                </td>
                                                <td width="92" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTableWyt">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="lbl">9. GB ULTRASOUND</span>
                                                </td>
                                                <td width="98" style="border-bottom: solid 1.7px black">
                                                    <span class="valSmall">
                                                        &nbsp; </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                        <tbody>
                            <tr>
                                <td colspan="3" height="36" colspan="2" valign="top">
                                    <span class="lbl">ADDITIONAL TEST</span>
                                    <br>
                                    <span class="valSmall"></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="36" valign="top">
                                    <span class="lbl">PYSCHOLOGICAL</span>
                                    <br>
                                    <span class="valSmall">
                                        @if (!preg_grep("/^Psychometric exam/i", $exams))
                                           -
                                        @endif
                                    </span>
                                </td>
                                <td colspan="2" height="30" valign="top">
                                    <span class="lbl">MODE OF PAYMENT</span>
                                    <br>
                                    <span class="valSmall">{{$admission->payment_type}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" height="36" valign="top">
                                    <span class="lbl">DENTAL</span>
                                    <br>
                                    <span class="valSmall">
                                        @if (!preg_grep("/^Dental Examination/i", $exams))
                                            -
                                        @endif    
                                    </span>
                                </td>
                                <td width="25%" height="30" valign="top">
                                    <span class="lbl">RECORD NUMBER</span>
                                    <br>
                                    <span class="valSmall">{{$admission->id}}</span>
                                </td>
                                <td width="25%" height="30">
                                    <span class="lbl">PATIENT CODE</span>
                                    <br>
                                    <span class="valSmall">{{$admission->patientcode}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td height="36" valign="top">
                                    <span class="lbl">PHYSICAL EXAMINATION</span>
                                    <br>
                                    <span class="valSmall">
                                        @if (!in_array("Complete PE and Medical History", $exams))
                                        -
                                        @endif</span>
                                </td>
                                <td colspan="2" height="30" valign="top">
                                    <span class="lbl">DATE</span>
                                    <br>
                                    <span class="valSmall">{{$admission->trans_date}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="">
                        <tbody>
                            <tr>
                                <td width="100%" height="30" colspan="2" valign="top"
                                    style="border-top: solid 1.7px white;">
                                    FORM NO.2<br>
                                    REV. 01/ 15-06-2022<br>
                                    PAGE 1 OF 1
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>