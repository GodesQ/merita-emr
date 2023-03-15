
@php
	function markX($val,$chkval) {
		echo ($val==$chkval) ? " X " : "&nbsp;&nbsp;&nbsp;";
	}
@endphp

<html><head>
    <title>PSYCHOLOGICAL TEST</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        table tr td {
            font-size: 13.5px;
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
          <td height="50" align="center" class="lblReport">PSYCHOLOGICAL TEST</td>
        </tr>
        <tr>
            <td>
            <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
            <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="78%"><table width="100%" border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td colspan="6" align="left"><b>TEST ADMINISTERED</b></td>
                        </tr>
                        <tr>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                          <td width="26%" align="left">Intelligence  Test (IQ):</td>
                          <td width="12%" align="left">X</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                          <td align="left">Personality Test:</td>
                          <td align="left">X</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                          <td align="left">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="1%" align="left">&nbsp;</td>
                          <td width="4%" align="left"><b>I.</b></td>
                          <td colspan="2" align="left"><b> INTELECTUAL LEVEL:</b></td>
                          <td width="29%" align="center">&nbsp;</td>
                          <td width="28%" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td colspan="2">(
                            <?php markX($exam->intellectual,"Very Superior"); ?>
                            ) Very Superior</td>
                          <td>(
                            <?php markX($exam->intellectual,"Average"); ?>
                            ) Average</td>
                          <td>(
                            <?php markX($exam->intellectual,"Mentally Deficient"); ?>
                            ) Mentally Deficient</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td colspan="2">(
                            <?php markX($exam->intellectual,"Superior"); ?>
                            ) Superior</td>
                          <td>(
                            <?php markX($exam->intellectual,"Below Average"); ?>
                            ) Below Average</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td colspan="2">(
                            <?php markX($exam->intellectual,"Above Average"); ?>
                            ) Above Average</td>
                          <td>(
                            <?php markX($exam->intellectual,"Borderline"); ?>
                            ) Borderline</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><b>II.</b></td>
                          <td colspan="4"><b>PERSONALITY TRAITS AND CHARACTERISTICS</b></td>
                        </tr>
                      </table></td>
                      <td width="22%" align="center"><img src="../../../app-assets/images/imgPsychoLegend.jpg" alt="" width="102" height="134" class="brdAll"/></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" class="brdTable">
                      <tr>
                        <td width="424" valign="middle"><b>SENSE OF RESPONSIBILITY</b></td>
                        <td width="40" align="center" valign="top"><p> <b>1 <br />
                          Very</b> <br>
                          <b>Low</b> </td>
                        <td width="49" align="center" valign="top"><b>2<br />
                          Low </b></td>
                        <td width="47" align="center" valign="top"><b>3 <br>
                          Low 
                          Average</b></td>
                        <td width="50" align="center" valign="top"><b>4<br />
                          Average </b></td>
                        <td width="47" align="center" valign="top"><b>5 <br>
                          High 
                          Average</b></td>
                        <td width="45" align="center" valign="top"><b>6<br />
                          High </b></td>
                        <td width="42" align="center" valign="top"><b>7 <br>
                          Very 
                          High</b></td>
                      </tr>
                      <tr>
                        <td width="424">Perseverance</td>
                        <td width="40" align="center"><?php markX($exam->responsibility1,"1"); ?></td>
                        <td width="49" align="center"><?php markX($exam->responsibility1,"2"); ?></td>
                        <td width="47" align="center"><?php markX($exam->responsibility1,"3"); ?></td>
                        <td width="50" align="center"><?php markX($exam->responsibility1,"4"); ?></td>
                        <td width="47" align="center"><?php markX($exam->responsibility1,"5"); ?></td>
                        <td width="45" align="center"><?php markX($exam->responsibility1,"6"); ?></td>
                        <td width="42" align="center"><?php markX($exam->responsibility1,"7"); ?></td>
                      </tr>
                      <tr>
                        <td width="424">Obedience</td>
                        <td align="center"><?php markX($exam->responsibility2,"1"); ?></td>
                        <td align="center"><?php markX($exam->responsibility2,"2"); ?></td>
                        <td align="center"><?php markX($exam->responsibility2,"3"); ?></td>
                        <td align="center"><?php markX($exam->responsibility2,"4"); ?></td>
                        <td align="center"><?php markX($exam->responsibility2,"5"); ?></td>
                        <td align="center"><?php markX($exam->responsibility2,"6"); ?></td>
                        <td align="center"><?php markX($exam->responsibility2,"7"); ?></td>
                      </tr>
                      <tr>
                        <td width="424">Self-discipline / Orderly</td>
                        <td align="center"><?php markX($exam->responsibility3,"1"); ?></td>
                        <td align="center"><?php markX($exam->responsibility3,"2"); ?></td>
                        <td align="center"><?php markX($exam->responsibility3,"3"); ?></td>
                        <td align="center"><?php markX($exam->responsibility3,"4"); ?></td>
                        <td align="center"><?php markX($exam->responsibility3,"5"); ?></td>
                        <td align="center"><?php markX($exam->responsibility3,"6"); ?></td>
                        <td align="center"><?php markX($exam->responsibility3,"7"); ?></td>
                      </tr>
                      <tr>
                        <td width="424">Enthusiasm</td>
                        <td align="center"><?php markX($exam->responsibility4,"1"); ?></td>
                        <td align="center"><?php markX($exam->responsibility4,"2"); ?></td>
                        <td align="center"><?php markX($exam->responsibility4,"3"); ?></td>
                        <td align="center"><?php markX($exam->responsibility4,"4"); ?></td>
                        <td align="center"><?php markX($exam->responsibility4,"5"); ?></td>
                        <td align="center"><?php markX($exam->responsibility4,"6"); ?></td>
                        <td align="center"><?php markX($exam->responsibility4,"7"); ?></td>
                      </tr>
                      <tr>
                        <td width="424">Initiative</td>
                        <td align="center"><?php markX($exam->responsibility5,"1"); ?></td>
                            <td align="center"><?php markX($exam->responsibility5,"2"); ?></td>
                            <td align="center"><?php markX($exam->responsibility5,"3"); ?></td>
                            <td align="center"><?php markX($exam->responsibility5,"4"); ?></td>
                            <td align="center"><?php markX($exam->responsibility5,"5"); ?></td>
                            <td align="center"><?php markX($exam->responsibility5,"6"); ?></td>
                            <td align="center"><?php markX($exam->responsibility5,"7"); ?></td>
                      </tr>
                      <tr class="brdAll">
                        <td class="brdBtm"><b>EMOTIONAL STABILITY</b></td>
                        <td align="center" class="brdLeftBtm"><b>1</b></td>
                        <td align="center" class="brdLeftBtm"><b>2</b></td>
                        <td align="center" class="brdLeftBtm"><b>3</b></td>
                        <td align="center" class="brdLeftBtm"><b>4</b></td>
                        <td align="center" class="brdLeftBtm"><b>5</b></td>
                        <td align="center" class="brdLeftBtm"><b>6</b></td>
                        <td align="center" class="brdLeftBtm"><b>7</b></td>
                      </tr>
                      <tr class="brdAll">
                        <td class="brdBtm">Can withstand boredom and work alone</td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"1"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"2"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"3"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"4"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"5"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"6"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability1,"7"); ?></td>
                      </tr>
                      <tr class="brdAll">
                        <td class="brdBtm">Tolerance to stress,pressure and inconveniences</td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"1"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"2"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"3"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"4"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"5"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"6"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability2,"7"); ?></td>
                      </tr>
                      <tr class="brdAll">
                        <td class="brdBtm">Faces reality</td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"1"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"2"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"3"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"4"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"5"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"6"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability3,"7"); ?></td>
                      </tr>
                      <tr class="brdAll">
                        <td class="brdBtm">Confidence</td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"1"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"2"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"3"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"4"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"5"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"6"); ?></td>
                        <td align="center" class="brdLeftBtm"><?php markX($exam->stability4,"7"); ?></td>
                      </tr>
                      <tr class="brdAll">
                        <td>Relaxed</td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"1"); ?></td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"2"); ?></td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"3"); ?></td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"4"); ?></td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"5"); ?></td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"6"); ?></td>
                        <td align="center" class="brdLeft"><?php markX($exam->stability5,"7"); ?></td>
                      </tr>
                      <tr>
                        <td valign="middle"><b>OBJECTIVITY</b></td>
                        <td align="center" valign="top"><b>1 </b></td>
                        <td align="center" valign="top"><b>2</b></td>
                        <td align="center" valign="top"><b>3</b></td>
                        <td align="center" valign="top"><b>4 </b></td>
                        <td align="center" valign="top"><b>5</b></td>
                        <td align="center" valign="top"><b>6</b></td>
                        <td align="center" valign="top"><b>7</b></td>
                      </tr>
                      <tr>
                        <td>Tough-mindedness</td>
                        <td align="center"><?php markX($exam->objectivity1,"1"); ?></td>
                        <td align="center"><?php markX($exam->objectivity1,"2"); ?></td>
                        <td align="center"><?php markX($exam->objectivity1,"3"); ?></td>
                        <td align="center"><?php markX($exam->objectivity1,"4"); ?></td>
                        <td align="center"><?php markX($exam->objectivity1,"5"); ?></td>
                        <td align="center"><?php markX($exam->objectivity1,"6"); ?></td>
                        <td align="center"><?php markX($exam->objectivity1,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Adaptability</td>
                        <td align="center"><?php markX($exam->objectivity2,"1"); ?></td>
                        <td align="center"><?php markX($exam->objectivity2,"2"); ?></td>
                        <td align="center"><?php markX($exam->objectivity2,"3"); ?></td>
                        <td align="center"><?php markX($exam->objectivity2,"4"); ?></td>
                        <td align="center"><?php markX($exam->objectivity2,"5"); ?></td>
                        <td align="center"><?php markX($exam->objectivity2,"6"); ?></td>
                        <td align="center"><?php markX($exam->objectivity2,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Practicality</td>
                        <td align="center"><?php markX($exam->objectivity3,"1"); ?></td>
                        <td align="center"><?php markX($exam->objectivity3,"2"); ?></td>
                        <td align="center"><?php markX($exam->objectivity3,"3"); ?></td>
                        <td align="center"><?php markX($exam->objectivity3,"4"); ?></td>
                        <td align="center"><?php markX($exam->objectivity3,"5"); ?></td>
                        <td align="center"><?php markX($exam->objectivity3,"6"); ?></td>
                        <td align="center"><?php markX($exam->objectivity3,"7"); ?></td>
                      </tr>
                      <tr>
                        <td><b>MOTIVATION</b></td>
                        <td align="center"><b>1</b></td>
                        <td align="center"><b>2</b></td>
                        <td align="center"><b>3</b></td>
                        <td align="center"><b>4</b></td>
                        <td align="center"><b>5</b></td>
                        <td align="center"><b>6</b></td>
                        <td align="center"><b>7</b></td>
                      </tr>
                      <tr>
                        <td>Assertiveness</td>
                        <td align="center"><?php markX($exam->motivation1,"1"); ?></td>
                        <td align="center"><?php markX($exam->motivation1,"2"); ?></td>
                        <td align="center"><?php markX($exam->motivation1,"3"); ?></td>
                        <td align="center"><?php markX($exam->motivation1,"4"); ?></td>
                        <td align="center"><?php markX($exam->motivation1,"5"); ?></td>
                        <td align="center"><?php markX($exam->motivation1,"6"); ?></td>
                        <td align="center"><?php markX($exam->motivation1,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Independence</td>
                        <td align="center"><?php markX($exam->motivation2,"1"); ?></td>
                        <td align="center"><?php markX($exam->motivation2,"2"); ?></td>
                        <td align="center"><?php markX($exam->motivation2,"3"); ?></td>
                        <td align="center"><?php markX($exam->motivation2,"4"); ?></td>
                        <td align="center"><?php markX($exam->motivation2,"5"); ?></td>
                        <td align="center"><?php markX($exam->motivation2,"6"); ?></td>
                        <td align="center"><?php markX($exam->motivation2,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Resourcefulness</td>
                        <td align="center"><?php markX($exam->motivation3,"1"); ?></td>
                        <td align="center"><?php markX($exam->motivation3,"2"); ?></td>
                        <td align="center"><?php markX($exam->motivation3,"3"); ?></td>
                        <td align="center"><?php markX($exam->motivation3,"4"); ?></td>
                        <td align="center"><?php markX($exam->motivation3,"5"); ?></td>
                        <td align="center"><?php markX($exam->motivation3,"6"); ?></td>
                        <td align="center"><?php markX($exam->motivation3,"7"); ?></td>
                      </tr>
                      <tr>
                        <td><b>INTERPERSONAL AND PERSONAL ADJUSTMENT</b></td>
                        <td align="center"><b>1</b></td>
                        <td align="center"><b>2</b></td>
                        <td align="center"><b>3</b></td>
                        <td align="center"><b>4</b></td>
                        <td align="center"><b>5</b></td>
                        <td align="center"><b>6</b></td>
                        <td align="center"><b>7</b></td>
                      </tr>
                      <tr>
                        <td>Relationship with Peers and Co-workers (Teamsmanship)</td>
                        <td align="center"><?php markX($exam->adjustment1,"1"); ?></td>
                        <td align="center"><?php markX($exam->adjustment1,"2"); ?></td>
                        <td align="center"><?php markX($exam->adjustment1,"3"); ?></td>
                        <td align="center"><?php markX($exam->adjustment1,"4"); ?></td>
                        <td align="center"><?php markX($exam->adjustment1,"5"); ?></td>
                        <td align="center"><?php markX($exam->adjustment1,"6"); ?></td>
                        <td align="center"><?php markX($exam->adjustment1,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Relationship with Superiors, Employers and Authority Figures(Deference)</td>
                        <td align="center"><?php markX($exam->adjustment2,"1"); ?></td>
                        <td align="center"><?php markX($exam->adjustment2,"2"); ?></td>
                        <td align="center"><?php markX($exam->adjustment2,"3"); ?></td>
                        <td align="center"><?php markX($exam->adjustment2,"4"); ?></td>
                        <td align="center"><?php markX($exam->adjustment2,"5"); ?></td>
                        <td align="center"><?php markX($exam->adjustment2,"6"); ?></td>
                        <td align="center"><?php markX($exam->adjustment2,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Self-esteem</td>
                        <td align="center"><?php markX($exam->adjustment3,"1"); ?></td>
                        <td align="center"><?php markX($exam->adjustment3,"2"); ?></td>
                        <td align="center"><?php markX($exam->adjustment3,"3"); ?></td>
                        <td align="center"><?php markX($exam->adjustment3,"4"); ?></td>
                        <td align="center"><?php markX($exam->adjustment3,"5"); ?></td>
                        <td align="center"><?php markX($exam->adjustment3,"6"); ?></td>
                        <td align="center"><?php markX($exam->adjustment3,"7"); ?></td>
                      </tr>
                      <tr>
                        <td>Aggressive tendencies</td>
                        <td align="center"><?php markX($exam->adjustment4,"1"); ?></td>
                        <td align="center"><?php markX($exam->adjustment4,"2"); ?></td>
                        <td align="center"><?php markX($exam->adjustment4,"3"); ?></td>
                        <td align="center"><?php markX($exam->adjustment4,"4"); ?></td>
                        <td align="center"><?php markX($exam->adjustment4,"5"); ?></td>
                        <td align="center"><?php markX($exam->adjustment4,"6"); ?></td>
                        <td align="center"><?php markX($exam->adjustment4,"7"); ?></td>
                      </tr>
                      <tr>
                        <td><b>GOAL-ORIENTATION</b></td>
                        <td align="center"><b>1</b></td>
                        <td align="center"><b>2</b></td>
                        <td align="center"><b>3</b></td>
                        <td align="center"><b>4</b></td>
                        <td align="center"><b>5</b></td>
                        <td align="center"><b>6</b></td>
                        <td align="center"><b>7</b></td>
                      </tr>
                      <tr>
                        <td>Directs one's effort towards clear cut objective</td>
                        <td align="center"><?php markX($exam->goal1,"1"); ?></td>
                        <td align="center"><?php markX($exam->goal1,"2"); ?></td>
                        <td align="center"><?php markX($exam->goal1,"3"); ?></td>
                        <td align="center"><?php markX($exam->goal1,"4"); ?></td>
                        <td align="center"><?php markX($exam->goal1,"5"); ?></td>
                        <td align="center"><?php markX($exam->goal1,"6"); ?></td>
                        <td align="center"><?php markX($exam->goal1,"7"); ?></td>
                      </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>III. REMARKS</b></td>
                      </tr>
                      <tr>
                        <td width="3%">&nbsp;</td>
                        <td width="97%">
                           {{ $exam->conclusion}}
                          <br>
                            {{$exam->remarks}}
                        </td>
                      </tr>
                  </table></td>
        </tr>
        <tr>
          <td><table width="760" border="0" cellpadding="2" cellspacing="0">
            <tbody><tr>
              <td height="90" align="center" valign="bottom"><table width="300" border="0" cellspacing="2" cellpadding="2">
                <tbody><tr>
                  <td align="center">
                      @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                        <img src="../../../app-assets/images/signatures/psychometrician_sig.png" width="220" height="90" style="object-fit: cover; transform: translate(0px, 44px);" />
                      @endif
                  </td>
                </tr>
                <tr valign="bottom">
                  <td align="center" class="brdTop"> {{$technician1 ? $technician1->firstname . " " . $technician1->middlename[0] . "." . " " . $technician1->lastname . ", " . $technician1->title : ""}}<br>
                    Psychometrician</td>
                </tr>
              </tbody></table></td>
              <td colspan="3" align="center" valign="bottom"><table width="300" border="0" cellspacing="2" cellpadding="2">
                <tbody><tr>
                  <td align="center">
                      @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                        <img src="../../../app-assets/images/signatures/psychological_sig.png" width="220" height="90" style="object-fit: cover; transform: translate(0px, 28px);" />
                      @endif
                  </td>
                </tr>
                <tr valign="bottom">
                  <td align="center" class="brdTop"> {{$technician2 ? $technician2->firstname . " " . $technician2->middlename[0] . "." . " " . $technician2->lastname . ", " . $technician2->title : ""}}<br>
                    Psychologist</td>
                </tr>
              </tbody></table></td>
            </tr>
          </tbody></table></td>
        </tr>
      </tbody></table>
            </td>
        </tr>
        <tr>
          <td height="20"><span class="lblForm">FORM NO. 39<br>REV. 02 / 06-15-2022</span></td>
        </tr>
      </tbody></table>
    </center>
    
    
    </body></html>