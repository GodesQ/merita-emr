<html>

<head>
    <title>LAND BASED</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 13.5px;
    }

    .fontBoldLrg {
        font: bold 14px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }

    ol li {
        margin: 1rem 0;
    }
    @page {
        size: A4;
        margin-top: 1rem;
    }
    </style>
</head>

<body>
    <center>
        <table width="680" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td height="80" colspan="3" align="center" valign="bottom" class="lblReport">
                        <table width="680" border="0" cellspacing="0" cellpadding="2">
                          <tr>
                            <td class="brdAll">
                              <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border: 3px solid black">
                                <tr>
                                  <td>
                                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="brdAll">
                                      <tr>
                                        <td align="center"> <span class="lblReport">MEDICAL CERTIFICATE FOR LANDBASED OVERSEAS WORKERS </span><br>
                                          <i><font size="3">Approved and authorized by the Department of Health (DOH)</font></i></td>
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
                <tr>
                  <td colspan="3" valign="top">
                    <table width="680" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td align="center">
                          <table width="680" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                            <tr>
                              <td colspan="2">SURNAME/LAST NAME:<br>
                                <b>
                                {{$admission->lastname}}
                                </b>
                              </td>
                              <td colspan="2">GIVEN NAME:<br>
                                <b>
                                {{$admission->firstname}}
                                </b>
                              </td>
                              <td width="134">MIDDLE NAME:<br>
                                <b>
                                <?=$admission->middlename?>
                                </b>
                              </td>
                            </tr>
                            <tr>
                              <td width="129">AGE:<br>
                                <b>
                                <?=$admission->age?>
                                </b>
                              </td>
                              <td colspan="2">DATE OF BIRTH: (DAY/MONTH/YEAR)<br>
                                <b>
                                {{date_format(new DateTime($patientInfo->birthdate), "d F Y")}}
                                </b>
                              </td>
                              <td width="161">PLACE OF BIRTH:<br>
                                <b>
                                <?=$patientInfo->birthplace?>
                                </b>
                              </td>
                              <td>NATIONALITY:<br>
                                <b>
                                <?=$patientInfo->nationality?>
                                </b>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">GENDER:<br>
                                <b>
                                <?=$admission->gender?>
                                </b>
                              </td>
                              <td colspan="2">CIVIL STATUS:<br>
                                <b>
                                <?=$patientInfo->maritalstatus?>
                                </b>
                              </td>
                              <td>RELIGION:<br>
                                <b>
                                <?=$patientInfo->religion?>
                                </b>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="5">ADDRESS:<br>
                                <b>
                                <?=$patientInfo->address?>
                                </b>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3">PASSPORT NO.:<br>
                                <b>
                                <?=$patientInfo->passportno?>
                                </b>
                              </td>
                              <td colspan="2">COUNTRY OF DESTINATION:<br>
                                <b>
                                <?=$patientInfo->country_destination?>
                                </b>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3">POSITION APPLIED FOR:<br>
                                <b>
                                <?=$admission->position?>
                                </b>
                              </td>
                              <td colspan="2">COMPANY:<br>
                                <b>
                                <?=$admission->agencyname?>
                                </b>
                              </td>
                            </tr>
                            <tr>
                              <td height="25" colspan="5">
                                <b>DECLARATION OF THE AUTHORIZED PHYSICIAN</b>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="5">
                              	<table width="100%" border="0" cellpadding="3" cellspacing="3" id="tblNoneRight">
                                    <tr>
                                    <td width="87%" valign="middle">SATISFACTORY HEARING? </td>
                                    <td width="4%" valign="middle">YES</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_audio)
                                    @if ($exam_audio->hearing == "unaided")
                                        <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                    <td width="3%" valign="middle">NO</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_audio)
                                    @if ($exam_audio->hearing == "aided")
                                    <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                    @else
                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    @else
                                    <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                  </tr>                    
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="5">
                                <table width="100%" border="0" cellpadding="3" cellspacing="3" id="tblNoneRight">
            											<tr>
                                    <td width="87%" valign="middle">SATISFACTORY SIGHT? </td>
                                    <td width="4%" valign="middle">YES</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_visacuity)
                                        @if (preg_match('/normal/i', $exam_visacuity->remarks_status))
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                    <td width="3%" valign="middle">NO</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_visacuity)
                                        @if (!preg_match('/normal/i', $exam_visacuity->remarks_status))
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                  </tr>                    
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="5">
                                <table width="100%" border="0" cellpadding="3" cellspacing="3" id="tblNoneRight">
                                  <tr>
                                    <td width="87%" valign="middle">SATISFACTORY COLOR VISION? (WHEN REQUIRED) </td>
                                    <td width="4%" valign="middle">YES</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_visacuity)
                                        @if (preg_match('/normal/i', $exam_visacuity->remarks_status))
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                    <td width="3%" valign="middle">NO</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_visacuity)
                                        @if (!preg_match('/normal/i', $exam_visacuity->remarks_status))
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="5">
                                <table width="100%" border="0" cellpadding="3" cellspacing="3" id="tblNoneRight">
                                  <tr>
                                    <td width="87%" valign="middle">SATISFACTORY PSYCHOLOGICAL TEST? </td>
                                    <td width="4%" valign="middle">YES</td>
                                    <td width="3%" valign="middle">
                                    @if ($exam_psycho)
                                        @if (preg_match('/normal/i', $exam_psycho->remarks_status))
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                    <td width="3%" valign="middle">NO</td>
                                    <td width="3%" valign="middle">
                                     @if ($exam_psycho)
                                        @if (!preg_match('/normal/i', $exam_psycho->remarks_status))
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    @else
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    @endif
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <table width="100%" border="0" cellpadding="3" cellspacing="3" id="tblNoneRight">
                                        <tr>
                                            <td width="87%" valign="middle">NO LIMITATIONS OR RESTRICTIONS ON FITNESS? <br> If “NO” specify limitations or restrictions: <br>
                                                <textarea name="co" type="text" id="co" value="" class="brdNone" style="width:400px;height: 30px;font-size: 10px;text-align:left;border: none;">{{$exam_physical ? $exam_physical->describe_restriction : null}}</textarea>
                                            </td>
                                            <td width="4%" valign="middle">YES</td>
                                            <td width="3%" valign="middle">
                                                @if ($exam_physical)
                                                @if (preg_match('/Without Restriction/i',
                                                $exam_physical->restriction))
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                            </td>
                                            <td width="3%" valign="middle">NO</td>
                                            <td width="3%" valign="middle">
                                                @if ($exam_physical)
                                                @if (!preg_match('/Without Restriction/i',
                                                $exam_physical->restriction))
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="5" valign="top">
                                <table width="100%" border="0" cellpadding="3" cellspacing="3" id="tblNoneRight">
                                  <tr>
                                    <td width="87%" valign="middle">IS APPLICANT SUFFERING FROM ANY MEDICAL CONDITION LIKELY TO BE AGGRAVATED BY LANDBASED OVERSEAS WORK OR TO RENDER THE APPLICANT UNFIT FOR SUCH SERVICE OR TO ENDANGER THE HEALTH OF OTHER PERSON?</td>
                                    <td width="4%" valign="middle">YES</td>
                                    <td width="3%" valign="middle">
                                        <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    </td>
                                    <td width="3%" valign="middle">NO</td>
                                    <td width="3%" valign="middle">
                                      <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="center">
                          <table width="678" border="0" cellpadding="0" cellspacing="0" class="brdAll">
                            <tr>
                              <td>
                                <table width="678" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="250" height="160" align="center" style="border: 1px solid black;"> 
                                        @if($admission->patient_image)
                                        <img src="../../../app-assets/images/profiles/{{$admission->patient_image . '?' . $admission->updated_date}}"
                                            alt="Patient Picture" width="130" height="130"
                                            class="brdAll">
                                        @else
                                        <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                            alt="Patient Picture" width="130" height="130"
                                            class="brdAll">
                                        @endif
                                    </td>
                                    <td width="428" valign="top">
                                      <table width="500" border="0" cellpadding="5" cellspacing="0" class="size10">
                                        <tr>
                                          <td width="312" style="font-size: 11px;">THIS IS TO CERTIFY THAT A MEDICAL AND PHYSICAL EXAMINATION WAS GIVEN TO: </td>
                                        </tr>
                                        <tr>
                                          <td height="20">
                                            <span style="padding: 1px 10px; border-bottom: 1px solid black;">
                                                <?=$admission->lastname . ", " . $admission->firstname . ' ' . $admission->middlename?>
                                            </span>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td valign="middle">
                                          	<span class="fontMed">RESULT:<br>
                                                FIT 
                                                @if ($exam_physical)
                                                @if (preg_match('/Fit/i',
                                                $exam_physical->fit))
                                                <img src="../../../app-assets/images/icoCheck.gif"
                                                    width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                    width="10">
                                                @endif
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                    width="10">
                                                @endif
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UNFIT
                                                @if ($exam_physical)
                                                @if (!preg_match('/Fit/i',
                                                $exam_physical->fit))
                                                <img src="../../../app-assets/images/icoCheck.gif"
                                                    width="10">
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                    width="10">
                                                @endif
                                                @else
                                                <img src="../../../app-assets/images/icoUncheck.gif"
                                                    width="10">
                                                @endif
                                            </span>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="border-right: 1px solid black;">
                                        &nbsp;
                                    </td>
                                    <td>
                                      <table width="500" border="0" cellpadding="5" style="margin-top: -60px;" cellspacing="0" class="size10">
                                        <tr>
                                          <td height="40" valign="bottom">
                                            @if($exam_physical && $admission->agency_id != 19)
                                            <img src="{{$exam_physical->physician_signature}}" width="80" />
                                            @endif<br>
                                            @if($admission->agency_id == 19)
                                                <br>
                                                <br>
                                            @endif
                                            @if($exam_physical)
                                            <span style="font-size: 14px;">{{$exam_physical->physician_firstname}} {{$exam_physical->physician_middlename[0]}}. {{$exam_physical->physician_lastname}}</span>
                                            @endif
                                          </td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-size: 10px;">
                                                <span class="brdTop" style="padding: 7px 0px 0px 0px;">
                                                    NAME AND SIGNATURE OF EXAMINING/AUTHORIZED PHYSICIAN 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="font-size: 11px;">DATE OF EXAMINATION:
                                            {{$exam_physical ? date_format(new DateTime($exam_physical->date_examination), "d F Y") : null}}
                                          </td>
                                        </tr>
                                        <tr>
                                          <td valign="top" style="font-size: 12px;">APPROVED BY:</td>
                                          <td> <br> <br></td>
                                        </tr>
                                        <tr>
                                          <td valign="bottom" style="font-size: 11px;">
                                              <div style="margin-bottom: -8px;">
                                                TERESITA F. GONZALES
                                              </div>
                                          </td>
                                          <td>&nbsp; </td>
                                        </tr>
                                        <tr>
                                            <td height="2" valign="top" style="font-size: 10px; ">
                                                <div style="margin-top: 0px;">
                                                     MEDICAL DIRECTOR
                                                </div>
                                               
                                            </td>
                                          <td>&nbsp; </td>
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
                      <tr>
                        <td>
                          <table width="680" border="0" cellpadding="2" cellspacing="0" class="brdTable">
                            <tr>
                              <td colspan="7">
                                <table width="100%" border="0" cellpadding="2" cellspacing="0" id="brdNone">
                                  <tr>
                                    <td colspan="4">I HAVE READ AND UNDERSTOOD THE CONTENTS OF THE ABOVE AND THE INTEGRAL NOTES HEREOF. </td>
                                  </tr>
                                  <style>
                                        #divImage {
                                            width: 100%;
                                            height: 15px;
                                            position: relative;
                                            margin-bottom: 18px;
                                        }
    
                                        #divImage img {
                                            position: absolute;
                                            width: 100px;
                                            height: 40px;
                                            top: 1%;
                                            left: 35%;
                                            object-fit: cover;
                                        }
                                    </style>
                                  <tr>
                                    <td width="27%">&nbsp;</td>
                                    <td width="48%" align="center">
                                    <div id="divImage">
                                        @if($admission->agency_id != 19)
                                            @if($admission->patient_signature)
                                                <img src="@php echo base64_decode($admission->patient_signature) @endphp"  />
                                            @elseif ($admission->signature)
                                                <img src="data:image/jpeg;base64,{{$admission->signature}}" />
                                            @else 
                                                <div style="width: 150px;height: 40px;"></div>
                                            @endif
                                        @endif
                                    </div>
                                    </td>
                                    <td width="6%">&nbsp;</td>
                                    <td width="19%">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td width="30%">APPLICANT’S NAME AND SIGNATURE: </td>
                                    <td align="center" style="border-bottom:solid 1px black"><b><?=$admission->lastname . ", " . $admission->firstname . ' ' . $admission->middlename?></b></td>
                                    <td>DATE:</td>
                                    <td style="border-bottom:solid 1px black">{{$exam_physical ? date_format(new DateTime($exam_physical->peme_date), "d F Y") : null}}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">(THIS SIGNATURE SHOULD BE AFFIXED IN THE PRESENCE OF THE EXAMINING PHYSICIAN)</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="6" style="font-size:12px">
                                <b>Date of Issuance of PEME Certificate:</b> <br>
                                {{$exam_physical ? date_format(new DateTime($exam_physical->peme_date), "d F Y") : null}}
                              </td>
                              <td width="51%" style="font-size:12px">
                                <b>Date of Expiration of PEME Certificate:</b> <br>
                                {{$exam_physical ? date_format(new DateTime($exam_physical->date_expiration), "d F Y") : null}}
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td width="92%" style="font-size: 11px;">
                                        FORM NO. 42 / REV. 0 / 15-06-2022 
                                    </td>
                                    <td width="8%" align="right" >
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>