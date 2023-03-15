<!DOCTYPE html>
<html>

<head>
    <title>Referral Slip</title>
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 12.5px;
    }

    .fontBoldLrg {
        font: bold 15px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }

    .text-below { 
        word-spacing: 1rem;
        font-weight: 600;
        font-size: 0.8rem;
        margin-top: 1rem;
    }

    .box-container {
        padding: 0rem;
        width: 100%;
        margin-bottom: 1rem;
        border: 1px solid black;
        text-align: center;
    }

    .instruction {
        width: 100%;
    }

    .box {
        margin-left: 0.5rem;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        padding-bottom: 0.2rem;
        padding-top: 0.2rem;
        border: 1px solid black;
    }
    span, p, td, b {
        color: #476434;
    }
    @page {
        size: A4;
        margin-top: 0.5rem;
    }
    </style>
</head>
<table width="100%" celspacing="0" cellpadding="5" align="center">
    <tbody>
        <tr>
            <td><span style="font-weight: bold; font-size: 20px; font-family: serif; text-align: center;">REFERRAL SLIP FOR MEDICAL
                    EXAMINATION</span></td>
        </tr>
        <tr>
            <td><span style="margin-top: -10px;text-align: center;font-weight: 400;font-size: 12px;font-family: sans-serif;">Joint DOH-POEA-MARINA CONSULTATIVE
                    COMMITTEE</span></td>
        </tr>
    </tbody>
</table>
<table width="100%">
    <tbody>
        <tr width="100%">
            <td width="80%">
                <table width="100%" cellspacing="2" cellpadding="3">
                    <tbody>
                        <tr>
                            <td width="40%" style="font-size: 12px;">Name of Employer/Agency:</td>
                            <td width="60%">
                                <div style="border-bottom: 1px solid #476434; font-size: 12px;">{{$referral ? optional($referral->agency)->agencyname : null}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="font-size: 12px;">Vessel:</td>
                            <td width="60%">
                                <div style="border-bottom: 1px solid #476434; font-size: 12px;">{{$referral ? $referral->vessel : null}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="font-size: 12px;">Country of Destination:</td>
                            <td width="60%">
                                <div style="border-bottom: 1px solid #476434; font-size: 12px;">{{$referral ? $referral->country_destination : null}}</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="text-align: center; border: 1px solid #476434; width: 100px; height: 110px;">
                    <span>
                        @if($referral)
                            @if($referral->patient_image)
                                <img src="../../../app-assets/images/profiles/{{$referral->patient_image}}" alt="Patient Picture" width="100%" height="100%">
                            @endif
                        @endif
                    </span>
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" celspacing="0" cellpadding="2" style="margin-top: 10px;">
    <tbody>
        <tr>
            <td width="33%">
                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                    {{$referral ? $referral->lastname : null}}
                </div>
                <span style="font-size: 12px;" >Last Name</span>
            </td>
            <td width="33%">
                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                    {{$referral ? $referral->firstname : null}}
                </div>
                <span style="font-size: 12px;" >First Name</span>
            </td>
            <td width="33%">
                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                    {{$referral ? $referral->middlename: null}}
                </div>
                <span style="font-size: 12px;">Middle Name</span>
            </td>
        </tr>
    </tbody>
</table>
<table  width="100%" celspacing="0" cellpadding="2">
    <tbody>
        <tr>
            <td width="71%">
                <table style="margin-top: 10px;" width="100%">
                    <tbody>
                        <tr>
                            <td width="100%">
                                <div style="border-bottom: 1px solid #476434; margin-bottom: 1rem;">{{$referral ? $referral->address : null}}
                                </div>
                                <div style="text-align: center; font-size: 12px; margin-top: -10px;">Permanent Address
                                    (Street,
                                    Municipality)</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top: 20px;" width="100%">
                    <tbody>
                        <tr>
                            <td width="50%">
                                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                                    {{$referral ? $referral->age : null}}
                                </div>
                                <span style="font-size: 12px;" >Age</span>
                            </td>
                            <td width="50%">
                                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                                    {{$referral ? $referral->position_applied : null}}
                                </div>
                                <span style="font-size: 12px;">Position Applied</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="29%">
                <table width="100%" cellspacing="0" cellpadding="2">
                    <tbody>
                                <tr>
                                    <td width="40%">Birthday:</td><td style="font-weight: 400; border-bottom: 1px solid #476434;">
                                        @if($referral)
                                            {{$referral->birthdate ? date_format(new DateTime($referral->birthdate), 'F d, Y') : null}}
                                        @endif
                                    </td>
                                </tr>
                                <tr><td width="40%">Passport:</td><td style="font-weight: 400; border-bottom: 1px solid #476434;">{{$referral ? $referral->passportno : null}}</td></tr>
                                <tr><td width="40%">SSRB:</td><td  style="font-weight: 400; border-bottom: 1px solid #476434; ">{{$referral ? $referral->srbno : null}}</td></tr>
                                <tr><td width="40%">Cellphone #:</td><td  style="font-weight: 400; border-bottom: 1px solid #476434; ">{{$referral ? $referral->contactno : null}}</td></tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@php
$path = "https://meritaclinic.ph/wp-content/uploads/2022/03/Merita-Logo.png";
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
@endphp
<table width="100%" celspacing="0" cellpadding="5" style="text-align: center; border: 1px solid #476434;" >
    <tbody>
        <tr width="90%" style="border: 1px solid black; text-align: center;">
             
             <td width="25%" style="text-align: right;">
                <img src="{{ $logo }}" width="80" />
            </td>
            <td width="75%">
               
                     <h2 style="font-family: serif; font-size: 16px; font-weight: 600;">MERITA DIAGNOSTIC CLINIC INC.</h2>
                    <p style="line-height: 10px;">5th floor Jettac Bldg. 920 Pres. Quirino Ave.cor. San Antonio, Malate, Manila</p>
                    <p style="line-height: 10px;">Tel: (02) 310-0595/404-3441 / Cell No. 0917-8576942 Email: mdcinc2019@gmail.com</p>
              
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="2">
    <tbody>
        <tr>
            <td colspan="2"><b>INSTRUCTION TO WORKER: (ONLY PATIENT ARE ALLOWED TO ENTER)</b></td>
        </tr>
        <tr>
            <td>
                1. Register to the Merita EMR: https://meritaclinic.app/register.
            </td>
        </tr>
        <tr>
            <td>
                2. Fill up all the necessary information and schedule your appointment.
            </td>
        </tr>
        <tr>
            <td colspan="2">3. Bring 3 copies of 1x1 PICTURES.</td>
        </tr>
        <tr>
            <td colspan="2">4. (FASTING) NO INTAKE OF FOOD OR DRINKS FOR 8-10 HOURS.</td>
        </tr>
        <tr>
            <td colspan="2">5. Non-Compliance of the above Instruction may cause delay of processing
                of your application.</td>
        </tr>
        <tr style="margin-top: 15px;">
            <td colspan="2"><b>I have read, understand and agree to comply with the above
                    requirement.</b></td>
        </tr>
        <tr height="30px;">
            <td width="50%" style="text-align: center; border-bottom: 1px solid #476434">
                {{$referral ? date_format(new DateTime($referral->trans_date), "F d, Y") : null}}
            </td>
            <td width="50%" style="text-align: center; border-bottom: 1px solid #476434">
                
            </td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 11px; font-family: sans-serif;">
            Date of PEME
            </td>                      
            <td style="text-align: center; font-size: 11px; font-family: sans-serif;">Signature</td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="5" cellpadding="2" >
    <tbody>
        <tr>
            <td colspan="3">5. Please conduct the following medication exam:</td>
        </tr>
        <tr>
            <td width="20%">5.1 Medical Package/Test:</td><td width="80%" style="text-align: left; border-bottom: 1px solid #476434;">{{$referral ? optional($referral->package)->packagename : null}}</td>
        </tr>
        <tr>
            <td width="20%">5.2 Additional Request:</td><td width="80%" style="text-align: left; border-bottom: 1px solid #476434;">{{$referral ? $referral->custom_request : null}}</td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="5" cellpadding="3">
    <tbody>
        <tr>
            <td width="30%" style="text-align: center;"><b>Type of Payment: </b></td>
            <td style="text-align: center;">Applicant Paid
                <span>
                    @if($referral)
                        @if ($referral->payment_type == "Applicant Paid")
                            <input type="checkbox" name="" id="" checked disabled style="vertical-align: middle;">
                        @else
                            <input type="checkbox" name="" id="" disabled style="vertical-align: middle;">
                        @endif
                    @endif
                </span>
            </td>
            <td style="text-align: center;">Billed Agency
                <span>
                   @if($referral)
                        @if ($referral->payment_type == "Billed")
                            <input type="checkbox" name="" id="" checked disabled style="vertical-align: middle;">
                        @else
                            <input type="checkbox" name="" id="" disabled style="vertical-align: middle;">
                        @endif
                    @endif
                </span>
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="5" cellpadding="2">
<tbody>
    <tr height="30px">
        <td width="30%">&nbsp;</td>
        <td width="40%" style="text-align: center; border-bottom: 1px solid #476434;"> 
            @if($referral)
                @if($referral->signature)
                    <img width="150px" height="45px" style="object-fit:cover;" src="@php echo base64_decode($referral->signature)@endphp" alt="">
                @else
                    <div></div>
                @endif
            @else
                <div></div>
            @endif
        </td>
        <td width="30%">&nbsp;</td> 
    </tr>
    <tr>
        <td width="30%">&nbsp;</td>
        <td width="40%" style="text-align: center;"> Signature over Printed name of Authorized Official</td>
        <td width="30%">&nbsp;</td>
    </tr>
</tbody>
</table>
@php
$path2 = "https://meritaclinic.ph/wp-content/uploads/2022/06/merita-map.png";
$type2 = pathinfo($path2, PATHINFO_EXTENSION);
$data2 = file_get_contents($path2);
$map = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
@endphp
<table width="100%" cellspacing="5" cellpadding="2">
    <tbody>
        <tr>
            <td width="25%" style="text-align: center;"><h3>Location Map</h3></td>
            <td style="text-align: center;"> <img src="{{ $map }}" width="75%" /></td>
            <td width="25%">&nbsp;</td>
        </tr>
    </tbody>
</table>
    <script>
        window.print();
    </script>
</html>