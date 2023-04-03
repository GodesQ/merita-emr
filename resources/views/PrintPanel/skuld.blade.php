<html>

<head>
    <title>Skuld</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 13px;
    }
    b{
        font-family: sans-serif;
    }
    .fontBoldLrg {
        font: bold 15px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }
    .active-ans {
        text-decoration: underline;
        font-weight: bold;
    }
    @page {
        size: A4;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="brdNone" style="border-bottom: 1px solid black;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 1rem;">
                                            <tbody>
                                                <tr>
                                                    <td><img style="object-fit: cover; width: 90px;" src="../../../app-assets/images/logo/logoSkuld.png" alt=""></td>
                                                    <td><span style="margin-left: 1rem; font-size: 12px; font-weight: 800;">Skuld Medical Fitness Certificate</span></td>
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
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="brdNone" style="border-bottom: 1px solid black; padding-top: 1.5rem;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 1rem;">
                                            <tbody>
                                                <tr>
                                                    <td><b>MEDICAL FITNESS CERTIFICATE</b> <br>
                                                        FOR EMPLOYMENT AT SEA
                                                    </td>
                                                    <td align="right"><span style="margin-left: 1rem; font-size: 15px; font-weight: 800;font-family: serif !important;">MERITA DIAGNOSTIC CLINIC INC.</span></td>
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
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <b>Surname</b><br>
                                                        <div style="border: 1px solid black !important; padding: 5px;" class="fontBoldLrg">
                                                            {{$admission->patient->lastname}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <b>Firstname</b><br>
                                                        <div style="border: 1px solid black !important; padding: 5px;" class="fontBoldLrg">
                                                            {{$admission->patient->firstname}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <b>Middlename</b><br>
                                                        <div style="border: 1px solid black !important; padding: 5px;" class="fontBoldLrg">
                                                            {{$admission->patient->middlename}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="33%" align="top"><b>DATE OF BIRTH (DD/MM/YYYY)</b><br>
                                                        <div style="border: 1px solid black !important; padding: 5px; margin-right: 10px; text-align: center;" class="fontBoldLrg">{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</div>
                                                    </td>
                                                    <td width="33%" align="top" style="text-align: center;"><b>FEMALE</b> <br>
                                                        <div style="border: 1px solid black !important; padding: 5px; margin-right: 10px; text-align: center;" class="fontBoldLrg">
                                                            @if($admission->patient->gender == "Female")
                                                                YES
                                                            @else
                                                                &nbsp;&nbsp;
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td width="33%" align="top" style="text-align: center;"><b>MALE</b> <br>
                                                        <div style="border: 1px solid black !important; padding: 5px; text-align: center;" class="fontBoldLrg">
                                                            @if($admission->patient->gender == "Male")
                                                                YES
                                                            @else
                                                                &nbsp;&nbsp;
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="33%">
                                                        <div style="margin-right: 10px;">
                                                            <div style="border: 1px solid black !important; padding: 5px; text-align: center;"><b>Height (CMs)</b></div>
                                                            <div style="border: 1px solid black !important; padding: 5px; text-align: center;" class="fontBoldLrg">
                                                                @if($admission->exam_physical)
                                                                    {{$admission->exam_physical->height}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td width="33%">
                                                        <div style="margin-right: 10px;">
                                                            <div style="border: 1px solid black !important; padding: 5px; text-align: center;"><b>Weight (KG)</b></div>
                                                            <div style="border: 1px solid black !important; padding: 5px; text-align: center;" class="fontBoldLrg">
                                                                @if($admission->exam_physical)
                                                                    {{$admission->exam_physical->weight}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td width="33%">
                                                        <div style="border: 1px solid black !important; padding: 5px; text-align: center;"><b>BMI</b></div>
                                                        <div style="border: 1px solid black !important; padding: 5px; text-align: center;" class="fontBoldLrg">
                                                        @if($admission->exam_physical)
                                                            {{$admission->exam_physical->bmi}}
                                                        @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid black !important;" colspan="3" height="80" valign="top" >
                                                        Comments/Restrictions (if any) : <br>
                                                         @php echo $admission->exam_physical ? nl2br($admission->exam_physical->describe_restriction) : null @endphp

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <table class="brdAll" width="100%" cellspacing="0" cellpadding="5">
                                           <tbody>
                                               <tr>
                                                   <td style="border: 1px solid black !important;" colspan="6"><b>OCCUPATION: (Tick relevant Box)</b></td>
                                               </tr>
                                               <tr>
                                                   <td>Deck:
                                                        @if($admission->category == "DECK SERVICES")
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                    </td>
                                                    <td>Engine:
                                                        @if($admission->category == "ENGINE SERVICES")
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                    </td>
                                                    <td>GMDSS:
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                    </td>
                                                    <td>Rating:
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                    </td>
                                                    <td>Catering:
                                                        @if($admission->category == "CATERING SERVICES")
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                    </td>
                                                    <td>Other:
                                                        @if($admission->category == "OTHER SERVICES")
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoCheck.gif" width="15">
                                                        @else
                                                        <img style="margin: 0rem 0.5rem;" src="../../../app-assets/images/icoUncheck.gif" width="15">
                                                        @endif
                                                        (Specify) <span>{{$admission->position}}</span>
                                                     </td>
                                               </tr>
                                           </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div>
                                            <b>Home Address</b> <br>
                                            <div style="border: 1px solid black !important;padding:5px;" class="fontBoldLrg">{{$admission->patient->patientinfo->address}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div>
                                            <b>Nationatlity</b> <br>
                                            <div style="border: 1px solid black !important;padding:5px;"  class="fontBoldLrg">{{$admission->patient->patientinfo->nationality}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="40%" colspan="3" >
                                                        <b style="font-family: sans-serif">PASSPORT NO.</b> <br>
                                                        <div class="fontBoldLrg" style="border: 1px solid black !important;padding:5px;">{{$admission->patient->patientinfo->passportno}}</div>
                                                    </td>
                                                    <td width="20%"></td>
                                                    <td width="40%" colspan="3">
                                                        <b style="font-family: sans-serif">SEAMAN'S BOOK NO.</b> <br>
                                                        <div class="fontBoldLrg" style="border: 1px solid black !important;padding:5px;">{{$admission->patient->patientinfo->srbno}}</div>
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
                    <td>
                        <table style="margin-top: 1rem;" width="100%" cellspacing="0" cellpadding="5" class="brdNone">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="font-size:15px; font-weight: 700; text-align: center;"><u>DECLARATION OF APPROVED MEDICAL PRACTITIONER</u></td>
                                </tr>
                                <tr>
                                    <td width="50%"><span style="font-size: 13px;">I confirm that identification documents were checked:</span></td>
                                    <td width="50%" align="left"><span style="font-size: 13px;" class="active-ans">YES</span> / <span class="" style="font-size: 13px;">NO</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span style="font-size:13px;">I confirm the following are satisfactory for duties to be performed: (Tick relevant boxes)</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="margin-top: 1rem;" width="100%" cellspacing="5" cellpadding="5" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="brdNone">
                                            <tbody>
                                                <tr>
                                                    <td style="border: 1px solid black !important;" align="center"><b>Hearing</b></td>
                                                    <td></td>
                                                    <td style="border: 1px solid black !important;" align="center"><b>Sight</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid black !important;" align="center" width="45%">
                                                        <div style="font-size: 15px;">
                                                            @if ($admission->exam_audio)
                                                                @if($admission->exam_audio->remarks_status == 'normal')
                                                                    NORMAL
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td width="10%"></td>
                                                    <td style="border: 1px solid black !important;" align="center">
                                                        <div style="font-size: 15px;">
                                                            @if ($admission->exam_visacuity)
                                                                @if($admission->exam_visacuity->remarks_status == 'normal')
                                                                    NORMAL
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="100%" cellspacing="5" cellpadding="5" class="brdTable">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="border: none !important;"><b></b></td>
                                                    <td align="center" colspan="2"><b>Colour Vision:</b></td>
                                                    <td align="center" colspan="2"><b>Fit for Look-out Duties:</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><div>Defective</div></td>
                                                    <td align="center">
                                                        <div style="font-size: 12px;">
                                                            @if($admission->exam_ishihara)
                                                                @if($admission->exam_ishihara->result == 'Defective')
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                                                @else
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                                @endif
                                                            @else
                                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                            @endif
                                                            Yes
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div style="font-size: 12px;">
                                                            @if($admission->exam_ishihara)
                                                                @if($admission->exam_ishihara->result == 'Adequate')
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                                                @else
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                                @endif
                                                            @else
                                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                            @endif
                                                            No
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div style="font-size: 12px;">
                                                            @if($admission->exam_physical)
                                                                @if($admission->exam_physical->duty == 'Fit')
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                                                @else
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                                @endif
                                                            @else
                                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                            @endif
                                                            Yes
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div style="font-size: 12px;">
                                                            @if($admission->exam_physical)
                                                                @if($admission->exam_physical->duty == 'Unfit')
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                                                @else
                                                                    <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                                @endif
                                                            @else
                                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                                            @endif
                                                            No
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="middle" colspan="2">
                                        <div style=" width: 70%; display: flex; align-items: center; justify-content: space-between; float: right;">
                                            <div>Date of last colour vision test</div>
                                            <div style="width: 50%; border: 1px solid black; padding: 0.5rem;text-align: left;">{{$admission->exam_ishihara ? date_format(new DateTime($admission->exam_ishihara->trans_date), "d/F/Y") : null}}</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="margin-top: 1rem;" width="50%" cellspacing="0" cellpadding="5" class="brdNone">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="font-size: 12px;"><b>Visual Aids: (Tick if Worn)</b></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black !important;" width="45%" align="center"><b>Spectacles</b></td>
                                    <td></td>
                                    <td style="border: 1px solid black !important;" width="45%" align="center"><b>Contact Lenses</b></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black !important;" align="center">
                                       @if($admission->exam_physical)
                                            @if($admission->exam_physical->visual_required == 'Spectacles')
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                            @else
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                            @endif
                                            <span>Yes</span>
                                            @if($admission->exam_physical->visual_required != 'Spectacles')
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                            @else
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                            @endif
                                            <span>No</span>
                                        @endif

                                    </td>
                                    <td></td>
                                    <td style="border: 1px solid black !important;" align="center">
                                        @if($admission->exam_physical)
                                            @if($admission->exam_physical->visual_required == 'Contact Lenses')
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                            @else
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                            @endif
                                            <span>Yes</span>
                                            @if($admission->exam_physical->visual_required != 'Contact Lenses')
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoCheck.gif" width="15"></span>
                                            @else
                                                <span style="margin-right: 0rem;"><img  src="../../../app-assets/images/icoUncheck.gif" width="15"></span>
                                            @endif
                                            <span>No</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="font-size: 14px; font-weight: 500; margin-top: 4.5rem;">
                            <table width="100%" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid gray;margin-bottom: 1rem; padding-bottom: 1rem;">
                                <tbody>
                                    <tr>
                                        <td><img style="object-fit: cover; width: 90px;" src="../../../app-assets/images/logo/logoSkuld.png" alt=""></td>
                                        <td><span style="margin-left: 1rem; font-size: 12px; font-weight: 800;">Skuld Medical Fitness Certificate</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            On the basis of the examinee's personal declaration, my clinical examination and Diagnostic test results
                            recorded on Medical Examination Form, I declare the Examinee is not suffering from any medical condition
                            likely to be aggravated by service at sea or to endanger the health of other persons on board:
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" style="margin-top: 1rem;" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="40%">
                                        <div style="text-align: center;">
                                            <b>FIT</b> for employment at Sea :
                                            <div style="margin-right: 0rem; border: 1px solid black !important;padding: 5px;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->fit == 'Fit' && $admission->exam_physical->restriction != "with restriction")
                                                       YES
                                                    @else
                                                         &nbsp;&nbsp;
                                                    @endif
                                                @else
                                                    &nbsp;&nbsp;
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td width="20%"></td>
                                    <td width="40%">
                                        <div style="text-align: center;">
                                            <b>UNFIT</b> for employment at Sea :
                                            <div style="margin-right: 0rem; border: 1px solid black !important;padding: 5px;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->fit == 'Unfit' && $admission->exam_physical->restriction != "with restriction")
                                                       YES
                                                    @else
                                                         &nbsp;&nbsp;
                                                    @endif
                                                @else
                                                    &nbsp;&nbsp;
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="text-align: center; margin-top: 1rem;">
                                            <b>At RISK BUT FIT at Sea</b>
                                            <div style="margin-right: 0rem; border: 1px solid black !important;padding: 5px;">
                                                @if($admission->exam_physical)
                                                    @if($admission->exam_physical->restriction == "with restriction")
                                                       YES
                                                    @else
                                                         &nbsp;&nbsp;
                                                    @endif
                                                @else
                                                    &nbsp;&nbsp;
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div height="auto" style="border: 1px solid black; width: 97%; padding: 10px; margin-bottom: 2rem; margin-top: 1rem;">
                            <span>Restrictions (if any)</span> <span style="margin-left: 3rem;">Conscession Declaration signed?</span> <span style="margin-left: 3rem;">Prescription?</span>
                            <br>
                            @if($admission->exam_physical)
                                @php echo nl2br($admission->exam_physical->comments_restriction)@endphp
                            @endif
                        </div>
                        <div style="font-size: 12px;">
                            I hereby confirm that the medical examination has been carried out in accordance with ILO/IMO Guidelines
                            on the Medical Examinations of Seafarers and the national guidelines of the authorising Administration.
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="10" cellpadding="15" style="margin-top: 1rem;" class="brdNone">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid black !important;" width="50%" valign="top" >
                                        Name of Medical Practitioner:
                                    </td>
                                    <td style="border: 1px solid black !important;" width="50%">
                                        @if($medical_director)
                                            {{$medical_director->firstname}} {{$medical_director->middlename[0]}}. {{$medical_director->lastname}}, {{$medical_director->title}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black !important;" width="50%">
                                        Signature of Medical Practitioner:
                                    </td>
                                    <td style="border: 1px solid black !important;" width="50%">
                                        @if($admission->agency_id == 3 || $admission->agency_id == 55 || $admission->agency_id == 57 || $admission->agency_id == 58)
                                            <img src="../../../app-assets/images/signatures/md_gonzales_sig.png" width="240" height="60" style="object-fit: cover; transform: translate(-45px, 13px); margin-top: -25px;" />
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" cellspacing="0" cellpadding="0" class="brdNone">
                                            <tbody>
                                                <tr>
                                                    <td width="20%">Date of Examination <br> (DD/MM/YYYY)</td>
                                                    <td width="20%" style="border: 1px solid black !important; padding: 5px;">
                                                        @if($admission->exam_physical)
                                                            <input type="text" style="border: none; font-family: serif;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}" />
                                                        @endif
                                                    </td>
                                                    <td width="20%"></td>
                                                    <td width="20%">Date of Expiry <br> (DD/MM/YYYY)</td>
                                                    <td width="20%" style="border: 1px solid black !important; padding: 5px;">
                                                        @if($admission->exam_physical)
                                                            <input type="text" style="border: none; font-family: serif;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_expiration), "d F Y") : null}}" />
                                                        @endif
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
                    <td>
                        <div style="font-size: 12px; margin-left: 5px;">
                           <span>I <span style="border-bottom: 1px solid black; margin: 0 0.5rem 0 0; padding: 0 0.5rem;"> {{$admission->patient->lastname}}, {{$admission->patient->firstname}}  {{$admission->patient->middlename}}</span>confirm that I have been informed of the content of the certificate and the right to get a review</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="margin-top: 1rem;" cellspacing="5" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="22%">Seafarer Signature :</td>
                                    <td width="20%" style="border: 1px solid black !important;">
                                        @if($admission->agency_id != 19)
                                            <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" width="100%" style="object-fit: cover;" />
                                        @endif
                                    </td>
                                    <td width="18%"></td>
                                    <td width="20%">Date: DD/MM/YYYY)</td>
                                    <td width="20%" style="border: 1px solid black !important;">
                                        @if($admission->exam_physical)
                                            <input type="text" style="border: none; font-family: serif;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->date_examination), "d F Y") : null}}" />
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="margin-top: 1rem;" cellspacing="0" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <table width="100%" style="margin-top: 1rem;" cellspacing="0" cellpadding="10" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td width="50%" style="border: 1px solid black;">CLINIC LICENSE NO.</td>
                                                    <td width="50%" style="border: 1px solid black;">EXPIRY DATE: </td>
                                                </tr>
                                                <tr>
                                                    <td style="height: 200px;" valign="top">
                                                        RLS 13-026-2123-MF-2
                                                    </td>
                                                    <td valign="top">31/DEC/2023</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="100%" style="margin-top: 1rem;" cellspacing="0" cellpadding="10" class="brdAll">
                                            <tbody>
                                                <tr>
                                                    <td width="50%" style="border: 1px solid black;">CLINIC STAMP</td>
                                                    <td width="50%" style="border: 1px solid black;">DATE: </td>
                                                </tr>
                                                <tr>
                                                    <td style="height: 200px;" valign="top">

                                                    </td>
                                                    <td valign="top">
                                                        @if($admission->exam_physical)
                                                        <input type="text" style="border: none; font-family: serif;" value="{{$admission->exam_physical ? date_format(new DateTime($admission->exam_physical->peme_date), "d F Y") : null}}" />
                                                        @endif
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
            </tbody>
        </table>
    </center>
    <script>
        let identification = document.querySelectorAll('.identification');

        for(let i = 0; i < identification.length; i++) {
            identification[i].addEventListener('click', (e) => {
                if(e.target.classList.contains('underlined')) {
                    e.target.style.textDecoration = 'none';
                    e.target.style.fontWeight = '400';
                    e.target.classList.remove('underlined');
                } else {
                    e.target.style.textDecoration = 'underline';
                    e.target.style.fontWeight = '700';
                    e.target.classList.add('underlined');
                }
            })
        }
    </script>
</body>
</html>
