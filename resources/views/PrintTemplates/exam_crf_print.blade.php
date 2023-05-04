<html>
    <head>
    <title>CARDIAC RISK FACTOR</title>
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
        <tbody><tr>
          <td>
            <table width="760" border="0" cellpadding="2" cellspacing="0" class="brdAll">
              <tbody><tr>
                <td width="80" rowspan="5" align="center"><img src="../../../app-assets/images/logo/logo.jpg" width="80" height="80" alt=""></td>
                <td width="356" rowspan="3" align="center" valign="middle">
                    <span class="lblCompName">MERITA DIAGNOSTIC CLINIC INC.</span><br style="margin-bottom: 20px">
                  <span class="lblCompDtl"><b>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave. Cor. San Antonio St. Malate, Manila<b><br>
        Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
        Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
        Accredited:  DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld P&amp;I * West of England P&amp;I</b></b></span><b><b>
                </b></b></td>
                <td width="218" valign="top" class="brdLeftBtm"><b>NAME:</b><br>
                  <span style="font-size:15px; text-transform: uppercase;">{{$admission->lastname . " " . $admission->suffix . ', ' . $admission->firstname . " " . $admission->middlename}}</span>
                </td>
                <td width="39" valign="top" class="brdLeftBtm"><b>AGE:</b><br>
                  <span style="font-size:15px">{{$admission->age}}</span>                </td>
                <td width="45" valign="top" class="brdLeftBtm"><b>SEX:</b><br>
                  <span style="font-size:15px">{{$admission->gender}}</span>
                </td>
              </tr>
              <tr>
                <td height="27" colspan="3" align="left" valign="top" class="brdLeftBtm"><b>REQUESTED BY:</b><br>
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
                <td colspan="2" align="left" valign="top" class="brdLeft"><b>PATIENT NO:</b><br><span style="font-size:15px">{{$admission->patientcode}}</span></td>
              </tr>
            </tbody></table>
          </td>
        </tr>
        <tr>
          <td height="50" align="center" class="lblReport">CARDIAC RISK FACTOR</td>
        </tr>
        <tr>
            <td>
                <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
      <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
              <tbody><tr>
          <td align="center">
              <table width="76%" border="0" cellspacing="0" cellpadding="2">
              <tbody><tr>
                <td width="20%">&nbsp;</td>
                <td width="2%">&nbsp;</td>
                <td width="26%"><b>RESULT </b></td>
                <td colspan="3" align="center"><b>POINTS OF RISK FACTOR </b></td>
              </tr>
              <tr>
                <td><b>1. AGE</b></td>
                <td><b>:</b></td>
                <td>{{$exam->age_result}}</td>
                <td width="21%" align="right">&nbsp;</td>
                <td width="11%" align="center">{{$exam->age_points}}</td>
                <td width="20%" align="right">&nbsp;</td>
              </tr>
              <tr>
                <td><b>2. HDL-C</b></td>
                <td><b>:</b></td>
                <td>{{$exam->hdl_result}}</td>
                <td align="right">&nbsp;</td>
                <td align="center">{{$exam->hdl_points}}</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr>
                <td><b>3. TOTAL- C </b></td>
                <td><b>:</b></td>
                <td>{{$exam->total_result}}</td>
                <td align="right">&nbsp;</td>
                <td align="center">{{$exam->total_points}}</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr>
                <td><b>4. SBP</b></td>
                <td><b>:</b></td>
                <td>{{$exam->sbp_result}}</td>
                <td align="right">&nbsp;</td>
                <td align="center">{{$exam->sbp_points}}</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr>
                <td><b>5. SMOKER</b></td>
                <td><b>:</b></td>
                <td>{{$exam->smoker_result}}</td>
                <td align="right">&nbsp;</td>
                <td align="center">{{$exam->smoker_points}}</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr>
                <td><b>6. DIABETES </b></td>
                <td><b>:</b></td>
                <td>{{$exam->diabetes_result}}</td>
                <td align="right">&nbsp;</td>
                <td align="center">{{$exam->diabetes_points}}</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr>
                <td><b>7. ECG-LVH</b></td>
                <td><b>:</b></td>
                <td>{{$exam->ecg_result}}</td>
                <td align="right">&nbsp;</td>
                <td align="center">{{$exam->ecg_result}}</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4" align="right"><b>TOTAL POINTS:</b></td>
                <td align="center" class="brdTop">
                    <?php echo $exam->hdl_points + $exam->total_points + $exam->sbp_points + $exam->smoker_points + $exam->diabetes_points ?>
                </td>
                <td align="right">&nbsp;</td>
              </tr>
              </tbody></table>
          </td>
        </tr>
        <tr>
          <td height="100" align="center">
           {{$exam->probability}}  % PROBABILITY IN 5 YEARS FOR CARDIAC DISEASE.
          </td>
        </tr>
                <tr>
          <td height="100" align="center"><span class="lblReport">SPIROMETRY RESULTS </span></td>
        </tr>
            <tr>
          <td align="center"><table width="425" border="0" cellspacing="0" cellpadding="2">
            <tbody><tr>
              <td width="87">&nbsp;</td>
              <td width="94" align="center" class="brdLeftTopBtm"><b>Predicted</b></td>
              <td width="107" align="center" class="brdLeftTopBtm"><b>Actual</b></td>
              <td width="95" align="center" class="brdLeftTopBtm"><b>%</b></td>
              <td width="22" align="center" class="brdLeft">&nbsp;</td>
            </tr>
            <tr>
              <td>FEV 1 </td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fev1_predicted}}</td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fev1_actual}}</td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fev1_perc}}</td>
              <td align="center" class="brdLeft">&nbsp;</td>
            </tr>
            <tr>
              <td>FVC </td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fvc_predicted}}</td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fvc_actual}}</td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fvc_perc}}</td>
              <td align="center" class="brdLeft">&nbsp;</td>
            </tr>
            <tr>
              <td>FEV1/ FVC % </td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fev1fvc_predicted}}</td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fev1fvc_actual}}</td>
              <td height="60" align="center" class="brdLeftBtm">{{$exam->fev1fvc_perc}}</td>
              <td align="center" class="brdLeft">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>RESULT: </td>
              <td align="center" class="brdBtm">{{$exam->result}}</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody></table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>
            <table width="760" border="0" cellpadding="2" cellspacing="0">
              <tbody><tr>
                <td height="120" align="center" valign="bottom">
                  <table width="270" border="0" cellspacing="2" cellpadding="2">
                    <tbody><tr>
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
                      <td align="center" class="brdTop">{{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : ""}}<br>
                                        Nurse</td>
                    </tr>
                  </tbody></table>
                </td>
                <td colspan="3" align="center" valign="bottom">
                  <table width="270" border="0" cellspacing="2" cellpadding="2">
                    <tbody><tr>
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
                      <td align="center" class="brdTop">{{$technician2 ? $technician2->firstname . " " . $technician2->middlename . " " . $technician2->lastname . ", " . $technician2->title : ""}}<br>
                                        Medical Director</td>
                    </tr>
                  </tbody></table>
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>
            </td>
        </tr>
        <tr>
          <td height="60"><span class="lblForm">FORM NO. 37<br>REV. 01 / 02-12-2019</span></td>
        </tr>
      </tbody></table>
    </center>


    </body>
    </html>
