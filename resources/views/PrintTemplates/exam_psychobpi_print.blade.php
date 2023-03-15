<html><head>
    <title>BPI Psychological</title>
    <!--<link href="dist/css/eureka-print.css?v=1648801302" rel="stylesheet" type="text/css" />-->
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
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
                  <span style="font-size:15px; text-transform: uppercase;">{{$admission->lastname . ', ' . $admission->firstname . " " . $admission->middlename}}</span>
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
          <td height="50" align="center" class="lblReport">BPI Psychological</td>
        </tr>
        <tr>
            <td>
            <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
            <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td align="center">
                    <table width="100%" border="1" cellpadding="1" cellspacing="0">
                      <tr>
                        <td colspan="10" align="center"><b>PERSONALITY TRAITS AND CHARACTERISTICS</b></td>
                      </tr>
                      <tr>
                        <td width="10%" align="center"><b>SCALE</b></td>
                        <td width="10%" align="center"><b>RS</b></td>
                        <td width="10%" align="center"><b>SS</b></td>
                        <td width="26%" align="center"><b>Low Scorer Description</b></td>
                        <td width="4%" align="center"><b>VL</b></td>
                        <td width="4%" align="center"><b>L</b></td>
                        <td width="4%" align="center"><b>A</b></td>
                        <td width="4%" align="center"><b>ME</b></td>
                        <td width="5%" align="center"><b>HE</b></td>
                        <td width="26%" align="center"><b>High Scorer Description</b></td>
                      </tr>
                      <tr>
                        <td align="center">Hypochondriasis </td>
                        <td align="center">
                          {{$exam->hypochondriasis_rs}}
                        </td>
                        <td align="center">
                          {{$exam->hypochondriasis_ss}}
                        </td>
                        <td>Without any exccessive concerns on his physical appearance.</td>
                        <td align="center"> <?php echo ($exam->hypochondriasis_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->hypochondriasis_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->hypochondriasis_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->hypochondriasis_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->hypochondriasis_scores=="HE") ? "X" : "" ?></td>
                        <td>Preoccupied in concerns with his physical appearance and dysfunction.</td>
                      </tr>
                      <tr>
                        <td align="center">Depression</td>
                        <td align="center"><span class="input-group">
                          {{$exam->depression_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->depression_ss}}
                        </span></td>
                        <td>Optimistic attitudes on the future even when experiencing disappointments.</td>
                        <td align="center"> <?php echo ($exam->depression_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->depression_scores=="L") ? "X" : "" ?></td>
                        <td> <?php echo ($exam->depression_scores=="A") ? "X" : "" ?></td>
                        <td> <?php echo ($exam->depression_scores=="ME") ? "X" : "" ?></td>
                        <td> <?php echo ($exam->depression_scores=="HE") ? "X" : "" ?></td>
                        <td>Looks at the future pessimistically; inclined to be down hearted.</td>
                      </tr>
                      <tr>
                        <td align="center">Denial</td>
                        <td align="center"><span class="input-group">
                          {{$exam->denial_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->denial_ss}}
                        </span></td>
                        <td>Accepts feelings as part of self and can show normal affect.</td>
                        <td align="center"> <?php echo ($exam->denial_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->denial_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->denial_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->denial_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->denial_scores=="HE") ? "X" : "" ?></td>
                        <td>Lacks insight into feelings and the causes of behavior avoids unpleasant topics.</td>
                      </tr>
                      <tr>
                        <td align="center">Interpersonal Problems</td>
                        <td align="center"><span class="input-group">
                           {{$exam->problem_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                         {{$exam->problem_ss}}
                        </span></td>
                        <td>Cooperates fully with other people and readily accepts criticism.</td>
                        <td align="center"> <?php echo ($exam->problem_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->problem_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->problem_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->problem_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->problem_scores=="HE") ? "X" : "" ?></td>
                        <td>Reacts against discipline and criticism; annoyed by life inconveniences.</td>
                      </tr>
                      <tr>
                        <td align="center">Alienation</td>
                        <td align="center"><span class="input-group">
                         {{$exam->allenation_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                         {{$exam->allenation_ss}}
                        </span></td>
                        <td>Normally displays ethical and social responsible attitudes and behavior.</td>
                        <td align="center"> <?php echo ($exam->allenation_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->allenation_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->allenation_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->allenation_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->allenation_scores=="HE") ? "X" : "" ?></td>
                        <td>Expresses attitudes differently from common social codes.</td>
                      </tr>
                      <tr>
                        <td align="center">Persecutory Ideas</td>
                        <td align="center"><span class="input-group">
                          {{$exam->ideas_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->ideas_ss}}
                        </span></td>
                        <td>Trusts others and does not feel threatened.</td>
                        <td align="center"> <?php echo ($exam->ideas_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->ideas_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->ideas_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->ideas_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->ideas_scores=="HE") ? "X" : "" ?></td>
                        <td>Believes that certain people are hostile and tries to make life difficult and unpleasant.</td>
                      </tr>
                      <tr>
                        <td align="center">Anxiety</td>
                        <td align="center"><span class="input-group">
                          {{$exam->anxiety_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->anxiety_ss}}
                        </span></td>
                        <td>Can remain calm in an unexpected situation; maintains self-control.</td>
                        <td align="center"> <?php echo ($exam->anxiety_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->anxiety_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->anxiety_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->anxiety_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->anxiety_scores=="HE") ? "X" : "" ?></td>
                        <td>Afraid of novelty and of the possibility of physical or interpersonal danger.</td>
                      </tr>
                      <tr>
                        <td align="center">Thinking Disorder</td>
                        <td align="center"><span class="input-group">
                          {{$exam->thinking_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->thinking_ss}}
                        </span></td>
                        <td>Has no difficulty in concentrating normally towards reality.</td>
                        <td align="center"> <?php echo ($exam->thinking_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->thinking_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->thinking_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->thinking_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->thinking_scores=="HE") ? "X" : "" ?></td>
                        <td>Confused, distractable and disorganized with thoughts</td>
                      </tr>
                      <tr>
                        <td align="center">Impulse Expression</td>
                        <td align="center"><span class="input-group">
                          {{$exam->impulse_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->impulse_ss}}
                        </span></td>
                        <td>
                          <p>Has the patience to do lengthy and tedious task; considers future before acting.</p>
                        </td>
                        <td align="center"> <?php echo ($exam->impulse_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->impulse_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->impulse_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->impulse_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->impulse_scores=="HE") ? "X" : "" ?></td>
                        <td>Prone to undertake risky and reckless actions. Behaves irresponsible,easily bored.</td>
                      </tr>
                      <tr>
                        <td align="center">Social Introversion</td>
                        <td align="center"><span class="input-group">
                          {{$exam->social_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->social_ss}}
                        </span></td>
                        <td>Enjoys the company of the people around him/her.</td>
                        <td align="center"> <?php echo ($exam->social_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->social_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->social_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->social_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->social_scores=="HE") ? "X" : "" ?></td>
                        <td>Avoids people generally; uncomfortable around others</td>
                      </tr>
                      <tr>
                        <td align="center">Self Depreciation</td>
                        <td align="center"><span class="input-group">
                          {{$exam->self_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->self_ss}}
                        </span></td>
                        <td>Manifest a high degree of self-assurance in dealing with others; speaks with confidence.</td>
                        <td align="center"> <?php echo ($exam->self_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->self_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->self_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->self_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->self_scores=="HE") ? "X" : "" ?></td>
                        <td>Degrades self of being worthless,and expresses low opinion of self</td>
                      </tr>
                      <tr>
                        <td align="center">Deviation</td>
                        <td align="center"><span class="input-group">
                          {{$exam->deviation_rs}}
                        </span></td>
                        <td align="center"><span class="input-group">
                          {{$exam->deviation_ss}}
                        </span></td>
                        <td>Displays behavior patterns similar to those of a majority of people.</td>
                        <td align="center"> <?php echo ($exam->deviation_scores=="VL") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->deviation_scores=="L") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->deviation_scores=="A") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->deviation_scores=="ME") ? "X" : "" ?></td>
                        <td align="center"> <?php echo ($exam->deviation_scores=="HE") ? "X" : "" ?></td>
                        <td>Displays behavior patterns very different from most people.</td>
                      </tr>
                    </table>
          </td>
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
                      <td align="center"></td>
                    </tr>
                    <tr valign="bottom">
                      <td align="center" class="brdTop">
                        {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : ""}}<br>
                      Psychometrician</td>
                    </tr>
                  </tbody></table>
                </td>
                <td colspan="3" align="center" valign="bottom">
                  <table width="270" border="0" cellspacing="2" cellpadding="2">
                    <tbody><tr>
                      <td align="center"></td>
                    </tr>
                    <tr valign="bottom">
                      <td align="center" class="brdTop"> {{$technician2 ? $technician2->firstname . " " . $technician2->middlename . " " . $technician2->lastname . ", " . $technician2->title : ""}}<br>
                      Psychologist</td>
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
          <td height="60"><span class="lblForm">FORM NO. xx<br>REV. 01 / 02-12-2019</span></td>
        </tr>
      </tbody></table>
    </center>
    
    
    </body></html>