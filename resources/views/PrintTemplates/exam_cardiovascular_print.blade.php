<html>

<head>
    <title>CARDIOVASCULAR EVALUATION</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        @page{
            size: A4;
        }
        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table width="1000" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="1000" border="0" cellpadding="2" cellspacing="0" class="brdAll">
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
                    <td height="50" align="center" class="lblReport">CARDIOVASCULAR EVALUATION</td>
                </tr>
                <tr>
                    <td>
                        <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                            <tbody>
                                                <tr>
                                                    <td width="21%" align="left"><b>Past Medical History</b></td>
                                                    <td colspan="6" class="brdBtm">{{$exam->pasthistory}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="21%" align="left"><b>Medications/Maintenance </b></td>
                                                    <td colspan="6" class="brdBtm">{{$exam->medmaint}}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left"><b>Smoking History</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="smoking" id="smoking"
                                                            type="text" style="text-align: center"
                                                            value="{{$exam->smoking}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left"><b>Alcohol Intake</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="alcohol" id="alcohol"
                                                            type="text" style="text-align: center"
                                                            value="{{$exam->alcohol}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left"><b>VITAL SIGNS</b></td>
                                                    <td colspan="6" class="brdBtm">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="right">&nbsp;</td>
                                                    <td width="14%"><b>Height (cm)</b></td>
                                                    <td width="13%" class="brdBtm"><input name="height" type="text"
                                                            style="text-align: center" id="height"
                                                            value="{{$exam->height}}" class="brdNone"
                                                            style="width:50px"></td>
                                                    <td width="14%"><b>Weight
                                                            (kg) </b></td>
                                                    <td width="12%" class="brdBtm"><input name="weight" type="text"
                                                            style="text-align: center" id="weight"
                                                            value="{{$exam->weight}}" class="brdNone"
                                                            style="width:50px"></td>
                                                    <td width="12%"><b>Resting BP</b></td>
                                                    <td width="14%" class="brdBtm"><input name="bp" type="text"
                                                            style="text-align: center" id="bp" value="{{$exam->bp}}"
                                                            size="15" class="brdNone" style="width:50px"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">&nbsp;</td>
                                                    <td><b>BMI</b></td>
                                                    <td class="brdBtm"><input name="bmi" type="text"
                                                            style="text-align: center" id="bmi" value="{{$exam->bmi}}"
                                                            class="brdNone" style="width:50px"></td>
                                                    <td><b>Respiratory Rate</b></td>
                                                    <td class="brdBtm"><input name="rhythm" type="text"
                                                            style="text-align: center" id="rhythm"
                                                            value="{{$exam->rhythm}}" size="15" class="brdNone"
                                                            style="width:50px"></td>
                                                    <td><b>Heart Rate</b></td>
                                                    <td class="brdBtm"><input name="hr" type="text"
                                                            style="text-align: center" id="hr" value="{{$exam->hr}}"
                                                            class="brdNone" style="width:50px"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>HEENT</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="heent" id="heent"
                                                            type="text" value="{{$exam->heent}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cardiac Findings</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="cardiac" id="cardiac"
                                                            type="text" value="{{$exam->cardiac}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lung Findings</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="lung" id="lung"
                                                            type="text" value="{{$exam->lung}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Other Findings</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="other" id="other"
                                                            type="text" value="{{$exam->other}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>12 LEAD ECG</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="egc" id="egc"
                                                            type="text" value="{{$exam->egc}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>2D Echocardiogram</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="echo" id="echo"
                                                            type="text" value="{{$exam->echo}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Stress Test</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="stress" id="stress"
                                                            type="text" value="{{$exam->stress}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>TSE</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="tse" id="tse"
                                                            type="text" value="{{$exam->tse}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Other Test/s</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="othertest"
                                                            id="othertest" type="text" value="{{$exam->othertest}}"
                                                            class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cardiac Risk Factor</b></td>
                                                    <td colspan="6" class="brdBtm"><input name="crf" id="crf"
                                                            type="text" value="{{$exam->crf}}" class="brdNone"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Impression</b></td>
                                                    <td colspan="9" class="brdBtm">{{$exam->impression}}<br>
                                                        werw<br>
                                                        werer</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Remarks</b></td>
                                                    <td colspan="9" class="brdBtm">{{$exam->remarks}}<br>
                                                        ewerw<br>
                                                        agadf</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Recommendation/s</b></td>
                                                    <td colspan="9" class="brdBtm">{{$exam->recommendations}}<br>
                                                        sfdagh<br>
                                                        aag</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="760" border="0" cellpadding="2" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="120" align="right" valign="bottom">
                                                        <table width="200" border="0" cellspacing="2" cellpadding="2">
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
                                                                        {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : null}}<br>
                                                                        Cardiologist</td>
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
                    <td height="60"><span class="lblForm">FORM NO. 07<br>REV. 01 / 02-12-2019</span></td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>