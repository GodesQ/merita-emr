<html>

<head>
    <title>BERMUDA</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: constantia;
        font-size: 12px;
    }

    .fontBoldLrg {
        font: bold 13px constantia;
    }

    .fontMed {
        font: normal 12px constantia;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table class="brdAll" width="100%" cellspacing="10" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td width="20%">
                                        <img src="../../../app-assets/images/logo/bermuda.jpg" width="70" height="70"
                                            alt="" style="object-fit: fill;">
                                    </td>
                                    <td width="70%" align="center">
                                        <span style="font-size: 15px; font-weight: 700;"> GOVERNMENT OF BERMUDA <br>
                                            DEPARTMENT OF MARITIME ADMINISTRATION <br>
                                            SEAFARER MEDICAL FITNESS CERTIFICATE</span>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="brdAll" width="100%" cellspacing="5" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td width="100%" align="center" style="font-size: 12px; font-weight: 700;">
                                        Authorised by the Department of Maritime Administration, Government of Bermuda
                                        <br>
                                        Issued under the Provision ot the International Convention on Standards of <br>
                                        Training. Certification and Watchkeeping for <br>
                                        Seaman, 1978 as amended, The Maritime Labour Convention 2006, and Bermuda <br>
                                        Merchant Shipping (Medical Certification of Seafarers) Regulation 2013.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="4" class="brdTable">
                            <tbody>
                                <tr>
                                    <td>2.0</td>
                                    <td colspan="6">Seafarer Information</td>
                                    <td rowspan="7" width="130">@if($admission->patient->patient_image)
                                        <img src="../../../app-assets/images/profiles/{{$admission->patient->patient_image}}"
                                            alt="Patient Picture" width="140" height="140" class="brdAll">
                                        @else
                                        <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                            alt="Patient Picture" width="140" height="140" class="brdAll">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.1</td>
                                    <td colspan="2">Family Name: <span>{{$admission->patient->lastname}}</span></td>
                                    <td>2.1.1</td>
                                    <td colspan="3">First/Middle Name: <span>{{$admission->patient->firstname}}
                                            {{$admission->patient->middlename}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td>2.2</td>
                                    <td>Date of Birth:</td>
                                    <td>{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</td>
                                    <td>2.3</td>
                                    <td>Gender:</td>
                                    <td colspan="2">
                                        Male
                                        <span>
                                            @if ($admission->patient->gender == "Male")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        </span>
                                        Female <span>
                                            @if ($admission->patient->gender == "Female")
                                            <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.4</td>
                                    <td>Nationality:</td>
                                    <td colspan="5">{{$admission->patient->patientinfo->nationality}}</td>
                                </tr>
                                <tr>
                                    <td>2.4.1</td>
                                    <td colspan="6">Passport or Seafarer’s Book Number:
                                        <span>{{$admission->patient->patientinfo->passportno}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.5</td>
                                    <td colspan="3">Department: Rank: <br>
                                        <span class="fontBoldLrg"></span>
                                    </td>
                                    <td colspan="3">Job: <span class="fontBoldLrg">{{ $admission->position }}</span></td>
                                </tr>
                                <tr>
                                    <td>3.0</td>
                                    <td colspan="7">Declaration of the recognized Medical Practitioner (Standards to be
                                        met are per STCW Code Section A-1/9)</td>
                                </tr>
                                <tr>
                                    <td>3.1</td>
                                    <td width="30" colspan="2">Seafarers Documentation checked at point of examination
                                    </td>
                                    <td align="center">Yes</td>
                                    <td align="center"><img src="../../../app-assets/images/icoCheck.gif" width="10">
                                    </td>
                                    <td align="center">No</td>
                                    <td align="center" width="100"><img src="../../../app-assets/images/icoUncheck.gif"
                                            width="10"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3.2</td>
                                    <td width="30" colspan="2">Hearing satisfactory</td>
                                    <td align="center">Yes</td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->remarks_status == "normal")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td align="center">No</td>
                                    <td align="center" width="100">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->remarks_status == "findings")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3.3</td>
                                    <td width="30" colspan="2">Unaided Hearing satisfactory</td>
                                    <td align="center">Yes</td>
                                    <td align="center">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->hearing == "unaided")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td align="center">No</td>
                                    <td align="center" width="100">
                                        @if($admission->exam_audio)
                                            @if($admission->exam_audio->hearing == "aided")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3.4</td>
                                    <td width="30" colspan="2">Visual Acuity satisfactory</td>
                                    <td align="center">Yes</td>
                                    <td align="center">
                                        @if($admission->exam_visacuity)
                                            @if($admission->exam_visacuity->remarks_status == "normal")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td align="center">No</td>
                                    <td align="center" width="100">
                                        @if($admission->exam_visacuity)
                                            @if($admission->exam_visacuity->remarks_status == "findings")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3.5</td>
                                    <td width="30" colspan="2">Satisfactory Colour Vision (Deck &amp; Engine Only)</td>
                                    <td align="center">Yes</td>
                                    <td align="center">
                                        @if($admission->exam_ishihara)
                                            @if($admission->exam_ishihara->remarks_status == "normal")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td align="center">No</td>
                                    <td align="center" width="100">
                                        @if($admission->exam_ishihara)
                                            @if($admission->exam_ishihara->remarks_status == "findings")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3.6</td>
                                    <td width="30" colspan="2">Fit to look-out Duties (Deck &amp; Engine Only)</td>
                                    <td align="center">Yes</td>
                                    <td align="center"><img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                    </td>
                                    <td align="center">No</td>
                                    <td align="center" width="100"><img src="../../../app-assets/images/icoUncheck.gif"
                                            width="10"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td rowspan="2"></td>
                                    <td style="font-size: 8px; font-weight: 600;" rowspan="2" colspan="2">Visual Aids:
                                        (If worn specify which type) <span>Spectacles</span> <br>
                                        And for what purpose)<span style="margin-left: 3rem;">Contact Lenses</span>
                                    </td>
                                    <td align="center">
                                        @if($admission->exam_physical)
                                            @if($admission->exam_physical->visual_required == "Spectacles")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                    <td rowspan="2" colspan="4">required to carry an addition pair of spectacles</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        @if($admission->exam_physical)
                                            @if($admission->exam_physical->visual_required == "Contact Lenses")
                                                <img src="../../../app-assets/images/icoCheck.gif" width="10">
                                            @else
                                                <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                            @endif
                                        @else
                                            <img src="../../../app-assets/images/icoUncheck.gif" width="10">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.7</td>
                                    <td colspan="7">Medical Fitness Category</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="7">
                                        <div>1. Fit <span><img src="../../../app-assets/images/icoUncheck.gif"
                                                    width="10"></span><span> No Restrictions or Limitations, Full
                                                Duration</span> Yes <span><img
                                                    src="../../../app-assets/images/icoUncheck.gif" width="10"></span> No
                                            <span><img src="../../../app-assets/images/icoUncheck.gif" width="10"></span>
                                        </div>
                                        <div>2. Fit <span><img src="../../../app-assets/images/icoUncheck.gif"
                                                    width="10"></span><span> Subject to Restrictions and/or Limited
                                                Duration, See Below</span< /div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="4">++ Restricted Duties:</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="4">++ Restricted to Ship Type/Geographical area/Other The above MUST
                                        NOT contain any clinical information</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td>3.8</td>
                                    <td colspan="7">
                                        The Seafarer is free from any medical condition likely to be aggravated by sea
                                        service or to endanger the health of other persons on board. <br>
                                        Yes <span><img src="../../../app-assets/images/icoUncheck.gif" width="10"></span>
                                        No <span><img src="../../../app-assets/images/icoUncheck.gif" width="10"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.9</td>
                                    <td colspan="3">Examination Date: <span></span></td>
                                    <td>3.10</td>
                                    <td colspan="3">Certificate Expiry Date: <span></span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="7">I confirm that the abovenamed seafarer was examined by me and found
                                        to be fit for sea services as stated in Section 3.7 and 3.8 above.</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3" align="center">
                                        @if($medical_director)
                                            <img src="../../../app-assets/images/signatures/md_gonzales_sig.png" width="200" height="50" style="object-fit: cover; transform: translate(-23px, 5px); margin-top: -5px;" />
                                        @endif
                                    </td>
                                    <td colspan="4" align="center">
                                        @if($medical_director)
                                            <span style="font-size: 14px; text-transform: uppercase;">{{$medical_director->firstname}} {{$medical_director->middlename[0]}}. {{$medical_director->lastname}} {{$medical_director->title}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.0</td>
                                    <td align="center" colspan="3">Signature of duly authorized Medical Practitioner:</td>
                                    <td align="center" colspan="4">Full Name (Print of duly authorized Medical Practitioner)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3" valign="top" align="center" height="130">
                                        <b>Medical Practitioner’s Official Stamp</b>

                                    </td>
                                    <td colspan="4" valign="top">
                                        <b ><u style="text-align: center;"> Medical Practitioner’s Contact Information</u></b> <br>
                                        Address: 5 th Floor JettacBldg 920 P. QuirinoAve.cor. San Antonio St., Malate,
                                        Manila Phone: 310-0595 Cell: 0917-8576942 Email:meritadiagnosticclinic@yahoo.com
                                    </td>
                                </tr>
                                <tr>
                                    <td>5.0</td>
                                    <td colspan="7">Seafarer Declaration – I have been informed by the medical
                                        practitioner of the content of the medical certificate and of the right to a
                                        Review in accordance with paragraph 6 of section A-1/9 of the STCW Code in
                                        relation to medical fitness standards or any limitations
                                        Or restrictions imposed on my ability to work (see overleaf for review
                                        procedure)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td height="60" valign="bottom" colspan="4">Seafarer’s Signature: <span>
                                        <img src="@php echo base64_decode($admission->patient->patient_signature) @endphp" class="signature-taken" width="150" height="50" style="object-fit: cover; transform: translate(3px, 0px);" />
                                    </span>
                                    </td>
                                    <td colspan="3" valign="bottom">Serial Number: <span>{{ $admission->patient->patientcode }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>
