<html>

<head>
    <title>SCREENING DRUG TEST REPORT</title>
    <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
    <style>
    @page{
        size: A4;
    }
    </style>
</head>

<body>
    <center>
        <table width="680" border="0" cellpadding="2" cellspacing="0" class="brdAll">
            <tbody>
                <tr>
                    <td colspan="3" align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                            <tbody>
                                <tr>
                                    <td width="19%"><img src="../../../app-assets/images/logo/logo.jpg" width="80"
                                            height="80" alt=""> </td>
                                    <td width="62%" align="center" valign="top">
                                        <p><span style="font-family:times new roman; font-size:18px; font-weight:bold;">MERITA
                                                DIAGNOSTIC CLINIC, INC.</span> <br>
                                            <span class="lblCompDtl"> 5th &amp; 6th Floor Jettac Bldg. 920 Pres Quirino
                                                Ave, Cor. San Antonio St. Malate Manila <br>
                                                Tel No. (02) 310-0595 / 0917-8576-942 Email: meritaclinic@gmail.com
                                            </span>
                                        </p>
                                        <p><span class="lblCompDtl"><span class="lblReport">SCREENING DRUG TEST
                                                    REPORT</span><br>
                                                <br>
                                            </span></p>
                                    </td>
                                    <td width="19%">
                                        <div style="width: 110px; height: 110px;padding: 0.2rem; border: 1px solid black;">
                                            <img src="../../../app-assets/images/profiles/{{$admission->patient->patient_image}}"  alt="Patient Picture" width="100%" height="100%">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td height="20" align="center" valign="bottom">&nbsp;</td>
                                    <td align="center"> </td>
                                </tr>
                                <tr>
                                    <td height="10" colspan="3">
                                        <hr>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="30" colspan="3" align="left" valign="middle">
                        <table width="678" border="0" cellspacing="0" cellpadding="3">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="text-transform: uppercase;"><b>Name:</b>
                                        {{$admission->lastname . " " . $admission->suffix . ', ' . $admission->firstname . " " . $admission->middlename}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="85"><b>Age:</b>
                                        {{$admission->age}}</td>
                                    <td width="249"><b>Sex:</b>
                                        {{$admission->gender}}</td>
                                    <td width="248"><b>Occupation:</b>
                                        {{$admission->position}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Date of Birth:</b>
                                        {{date_format(new DateTime($gen_info->birthdate), "F d, Y")}}</td>
                                    <td><b>Place of Birth:</b>
                                        {{$gen_info->birthplace}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Address:</b>
                                        {{$gen_info->address}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Purpose:</b>
                                        {{ $exam->purpose == 'Pre-Employement' ? 'Pre-Employment' : $exam->purpose }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Date &amp; Time of Received:</b> <span style="text-transform: uppercase;">{{date_format(new DateTime($exam->trans_date), "F d, Y")}}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Requesting Party:</b>
                                        @if (preg_match("/Bahia/i", $admission->agencyname))
                                            {{'Bahia Shipping Services, Inc.'}}
                                        @else
                                            {{$admission->agencyname}}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">
                                        <table width="580" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td width="568" valign="top">
                                                        <table width="100%" border="0" cellpadding="4" cellspacing="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" align="left">FINDINGS: Screening
                                                                        Test by - <b>Test Kit</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" align="left">Gave the following
                                                                        result:</td>
                                                                </tr>
                                                                @if ($exam->methamphetamine != "")
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Methamphetamine / Amphetamines</b>
                                                                    </td>
                                                                    <td width="24%" align="left">
                                                                        {{$exam->methamphetamine}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->tetrahydrocannabinol != "")
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left">
                                                                        <b>Tetrahydrocannabinol</b>
                                                                    </td>
                                                                    <td align="left">{{$exam->tetrahydrocannabinol}}
                                                                    </td>
                                                                </tr>
                                                                @endif

                                                                @if ($exam->morphine != "")
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Morphine / Opiates</b></td>
                                                                    <td align="left">{{$exam->morphine}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->cocaine != "")
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" height="14" align="left">
                                                                        <b>Cocaine</b>
                                                                    </td>
                                                                    <td align="left">{{$exam->cocaine}}</td>
                                                                </tr>
                                                                @endif


                                                                @if($exam->phencyclidine != "")
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Phencyclidine</b>
                                                                    </td>
                                                                    <td align="left">{{$exam->phencyclidine}}</td>
                                                                </tr>
                                                                @endif

                                                                @if ($exam->alcohol != "")
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Alcohol</b></td>
                                                                    <td align="left">{{$exam->alcohol}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->barbiturates)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Barbiturates</b>
                                                                    </td>
                                                                    <td align="left">{{$exam->barbiturates}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->ecstacy)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Ecstacy</b></td>
                                                                    <td align="left">{{$exam->ecstacy}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->benzodiazepine)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Benzodiazepine</b>
                                                                    </td>
                                                                    <td align="left">{{$exam->benzodiazepine}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->methadone)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Methadone</b></td>
                                                                    <td align="left">{{$exam->methadone}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->metaqualone)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Metaqualone</b></td>
                                                                    <td align="left">{{$exam->metaqualone}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->propoxyphene)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Propoxyphene</b></td>
                                                                    <td align="left">{{$exam->propoxyphene}}</td>
                                                                </tr>
                                                                @endif

                                                                @if($exam->opium)
                                                                <tr>
                                                                    <td width="6%" align="left">&nbsp;</td>
                                                                    <td width="70%" align="left"><b>Opium</b></td>
                                                                    <td align="left">{{$exam->opium}}</td>
                                                                </tr>
                                                                @endif

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
                    <td height="30" colspan="3" align="center" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                    <td width="300" align="center" valign="top">
                        <table width="270" border="0" cellspacing="2" cellpadding="2">
                            <tbody>
                                <tr valign="bottom">
                                    <td align="center" style="border-bottom: 1px solid black;" height="50">
                                        @if($technician1)
                                            <img src="{{$technician1->signature}}" width="100px" style="object-fit: cover;"/>
                                        @endif
                                    </td>
                                </tr>
                                <tr valign="bottom">
                                    <td align="center" class="brdTop">
                                        @if ($technician1)
                                            {{$technician1->firstname . " " . $technician1->middlename[0]. "." . " " . $technician1->lastname . ", " . $technician1->title}}<br>
                                            Medical Technologist<br>
                                            {{$technician1->id == 70 ? $technician1->otherposition : 'License No.: ' . $technician1->license_no}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="296" align="center" valign="top">
                        <table width="270" border="0" cellspacing="2" cellpadding="2">
                            <tbody>
                                <tr valign="bottom">
                                    <td align="left">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="44" align="center" style="border-bottom: 1px solid black;" valign="bottom"></td>
                                </tr>
                                <tr valign="bottom">
                                    <td align="center" class="brdTop">
                                        @if ($technician2)
                                        {{$technician2->firstname . " " . $technician2->middlename[0] . "." . " " . $technician2->lastname . ", " . $technician2->title}}<br>
                                        Pathologist<br>
                                        Lic. No.: {{$technician2->license_no}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr style="margin-top: 3rem; font-size: 8px;">
                    <td colspan="3" valign="top"><span class="lblForm">FORM NO. 33 REV. 00 /
                            20-02-2018</span></td>
                </tr>
            </tbody>
        </table>
    </center>

</body>

</html>
