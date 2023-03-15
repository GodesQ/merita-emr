<html><head>
    <title>STRESS TEST</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">>
    </head>
    <body>
    <center>
      <table width="760" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td>
            <table width="760" border="0" cellpadding="2" cellspacing="0" class="brdAll">
              <tbody><tr>
                <td width="80" rowspan="3" align="center"><img src="../../../app-assets/images/logo/logo.jpg" width="80" height="80" alt=""></td>
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
                  <span style="font-size:15px">{{$admission->age}}</span>
                </td>
                <td width="45" valign="top" class="brdLeftBtm"><b>SEX:</b><br>
                  <span style="font-size:15px">{{$admission->gender}}</span>
                </td>
              </tr>
              <tr>
                <td height="27" colspan="3" align="left" valign="top" class="brdLeftBtm"><b>REQUESTED BY:</b><br>
                  <span style="font-size:15px">{{$admission->agencyname}}</span>
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
          <td height="50" align="center" class="lblReport">STRESS TEST</td>
        </tr>
        <tr>
            <td>
            <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
            <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td align="center">
                    <table width="100%" border="1" cellpadding="1" cellspacing="0" >
                      <tr>
                        <td width="9%" align="center"><span class="a"><b>Stage Number</b></span></td>
                        <td width="8%" align="center" class="table table-bordered"><b>Time (min:sec)</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>Speed (km/h)</b></td>
                        <td width="9%" align="center" class="table table-bordered"><b>Grade (%)</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>Workload (METs)</b></td>
                        <td width="9%" align="center" class="table table-bordered"><b>HR (bpm)</b></td>
                        <td width="9%" align="center" class="table table-bordered"><b>BP (mmHg)</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>RPP (*100)</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>VE</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>SVE</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>ST II (mm)</b></td>
                        <td width="8%" align="center" class="table table-bordered"><b>Comment</b></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Pre-Exercise</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_bp}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->exercise_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 1</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_bp}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage1_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 2</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_bp}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage2_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 3</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_bp}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_hr}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage3_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 4</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage4_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 5</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage5_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 6</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage6_remarks}}
                        </span></td>
                      </tr>
                      <tr>
                        <td height="31" align="center"><span class="a"><b>Stage 7</b></span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_speed}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_grade}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_mets}}
                        </span></td>
                        <td align="center"> <span class="a">
                          {{$exam->stage7_remarks}}
                        </span></td>
                      </tr>
                    </table>
                    <br>
                    <table width="100%" border="1" cellpadding="1" cellspacing="0" class="table table-bordered">
                      <tbody>
                        <tr>
                          <td width="119" align="center"><span class="a"><b>Stage Number</b></span></td>
                          <td width="153" align="center"><span class="a"><b>Immediately After</b></span></td>
                          <td width="88" align="center"><span class="a"><b>1 minute</b></span></td>
                          <td width="108" align="center"><span class="a"><b>3 minutes</b></span></td>
                          <td width="92" align="center"><span class="a"><b>5 minutes</b></span></td>
                          <td width="97" align="center"><span class="a"><b>8 minutes</b></span></td>
                        </tr>
                        <tr>
                          <td height="30" colspan="0" align="center"><span class="a"><b>BP</b></span></td>
                          <td align="center"> <span class="a">
                            {{$exam->bp_after}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->bp_1min}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->bp_3mins}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->bp_5mins}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->bp_8mins}}
                          </span></td>
                        </tr>
                        <tr>
                          <td height="22" colspan="0" align="center"><span class="a"><b>HR</b></span></td>
                          <td align="center"> <span class="a">
                            {{$exam->hr_after}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->hr_1min}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->hr_3min}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->hr_5min}}
                          </span></td>
                          <td align="center"> <span class="a">
                            {{$exam->hr_8min}}
                          </span></td>
                        </tr>
                        {{$exam->response}}
                      </tbody>
                    </table>
                    <br>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" class="table table-bordered">
                      <tbody>
                        <tr>
                          <td width="117" height="27"  align="left">
                            <p><span class="a"><b><u>RESTING ECG:</u></b></span></p>
                          </td>
                          <td width="631">
                            <p> <span class="a"><u>
                              {{$exam->resting_ecg}}
                            </u></span></p>
                          </td>
                        </tr>
                        {{$exam->response}}
                        <tr>
                          <td height="27" colspan="2"><span class="a"><u><b>Response Exercise:</b></u><br>
                            <u>
                              {{$exam->symptoms}}
                          </u>-limited treadmill exercise test was performed using the<u>
                                {{$exam->exercise_type}}
                                </u>. Patient reached <u>
                                  {{$exam->reach_min}}
                                  </u> min(s) <u>
                                    {{$exam->reach_sec}}
                                    </u> sec(s) of stage <u>
                                      {{$exam->stage}}
                                      </u> equivalent to <u>
                                        {{$exam->mets}}
                                        </u> mets. Baseline heart rate was <u>
                                          {{$exam->heart_rate}}
                                          </u> BPM and the patient attained a maximal heart rate of <u>
                                            {{$exam->max_heartrate}}
                                            </u> bpm which was <u>
                                              {{$exam->bpm_equiv}}
                                              </u> %
                            of that predicted for maximal heart rate for the patient's age. Starting BP was <u>
                              {{$exam->starting_bp}}
                              </u> and maximum BP during exercise was <u>
                                {{$exam->max_bp}}
                                </u>. Double product is equal to <u>
                                  {{$exam->double_prod}}
                                  </u>. ECG response to exercise showed <u>
                                    {{$exam->ecg}}
                                    </u>. Exercise capacity was <u>
                                      {{$exam->capacity}}
                                    </u>.</span></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span class="a"><b>Arrhythmias:</b> <u>
                            {{$exam->arrhythmias}}
                          </u></span></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span class="a"><b>Conclusion:</b> <u>
                            {{$exam->conclusion}}
                          </u></span></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left"><span class="a"><b>Suggestion:</b> <u>
                            {{$exam->suggestion}}
                          </u></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </td>
                </tr>
                <tr>
                  <td>
                    <table width="760" border="0" cellpadding="2" cellspacing="0">
                      <tr>
                        <td height="120" align="right" valign="bottom">
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
                              {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : ""}}<br>
                                                Cardiologist</td>
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
      </tbody>
    </table>
            </td>
        </tr>
        <tr>
          <td height="60"><span class="lblForm">FORM NO. xx<br>REV. 01 / 02-12-2019</span></td>
        </tr>
      </tbody></table>
    </center>
    </body></html>