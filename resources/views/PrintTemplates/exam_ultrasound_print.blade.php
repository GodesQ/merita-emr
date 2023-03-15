

<html><head>
    <title>ULTRASOUND</title>
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
                <td colspan="2" align="left" valign="top" class="brdLeft"><b>PATIENT
                        NO:</b><br><span style="font-size:15px">{{$admission->patientcode}}</span>
                </td>
            </tr>
            </tbody></table>
          </td>
        </tr>
        <tr>
            <td>
            <link href="dist/css/eureka-print.css" rel="stylesheet" type="text/css">
              <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td width="596" height="30" colspan="3" align="left" valign="middle">
                    <table width="100%" border="0" cellpadding="30" cellspacing="0">
                      <tr>
                        <td width="29%" valign="top"><b>TYPE OF EXAM</b></td>
                        <td width="71%" valign="top"><?=$exam->exam_type?></td>
                      </tr>
                      <tr>
                        <td colspan="2" valign="top">&nbsp;</td>
                      </tr>
                      <? if ($exam->exam_type=="KUB") { ?>
                      <tr>
                        <td valign="top"><b>KIDNEY</b></td>
                        <td valign="top">@php echo nl2br($exam->kidney)?></td>
                      </tr>
                      <tr>
                        <td valign="top"><b>URETER/URINARY BLADDER</b></td>
                        <td valign="top"><?=nl2br($exam->urinary_bladder)?></td>
                      </tr>
                      <? } if ($exam->exam_type=="HEPA") { ?>
                      <tr>
                        <td valign="top"><b>LIVER</b></td>
                        <td valign="top">@php echo nl2br($exam->liver)@endphp</td>
                      </tr>
                      <tr>
                        <td valign="top"><b>GALLBLADDER</b></td>
                        <td valign="top">@php echo nl2br($exam->gall_bladder)@endphp</td>
                      </tr>
                      <tr>
                        <td valign="top"><b>PANCREAS</b></td>
                        <td valign="top">@php echo nl2br($exam->pancreas)@endphp</td>
                      </tr>
                      <? } if ($exam->exam_type=="THYROID") { ?>
                      <tr>
                        <td valign="top"><b>THYROID</b></td>
                        <td valign="top">@php echo nl2br($exam->thyroid)@endphp</td>
                      </tr>
                      <? } if ($exam->exam_type=="BREAST") { ?>
                      <tr>
                        <td valign="top"><b>BREAST</b></td>
                        <td valign="top">@php echo nl2br($exam->breast)@endphp</td>
                      </tr>
                      <? } if ($exam->exam_type=="WHOLE ABDOMEN") { ?>
                      <tr>
                        <td valign="top"><b>WHOLE ABDOMEN</b></td>
                        <td valign="top">@php echo nl2br($exam->abdomen)@endphp</td>
                      </tr>
                      <? } if ($exam->exam_type=="GENITALS") { ?>
                      <tr>
                        <td valign="top"><b>GENITALS</b></td>
                        <td valign="top">@php echo nl2br($exam->genitals)@endphp</td>
                      </tr>
                      <? } ?>
                      <tr>
                        <td valign="top"><b>IMPRESSION</b></td>
                        <td valign="top">@php echo nl2br($exam->impression)@endphp</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td height="60" colspan="3" align="center" valign="middle">
                    <table width="760" border="0" cellpadding="2" cellspacing="0">
                      <tr>
                        <td height="180" align="right" valign="bottom">
                          <table width="270" border="0" cellspacing="2" cellpadding="2" class="tbl">
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
                                {{$technician1 ? $technician1->firstname . " " . $technician1->middlename . " " . $technician1->lastname . ", " . $technician1->title : '&nbsp;'}}
                                <br>
                                Sonologist</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                    <td height="60"><span class="lblForm">FORM NO. 35<br>REV. 02 / 06-15-2022</span></td>
                </tr>
              </table>