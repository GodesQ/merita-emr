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
        font-size: 12px;
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
    }
    </style>
</head>
@foreach ($data as $row)
<table width="100%" celspacing="0" cellpadding="5" align="center">
    <tbody>
        <tr>
            <td><span style="font-weight: bold; font-size: 20px; font-family: serif; text-align: center;">REFERRAL SLIP FOR MEDICAL EXAMINATION</span></td>
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
                                <div style="border-bottom: 1px solid #476434; font-size: 12px;">{{$row->agencyname}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="font-size: 12px;">Vessel:</td>
                            <td width="60%">
                                <div style="border-bottom: 1px solid #476434; font-size: 12px;">{{$row->vessel}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="font-size: 12px;">Country of Destination:</td>
                            <td width="60%">
                                <div style="border-bottom: 1px solid #476434; font-size: 12px;">{{$row->country_destination}}</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="text-align: center; border: 1px solid #476434; width: 100px; height: 100px;">
                    <span>IMAGE HERE</span>
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" celspacing="0" cellpadding="2" style="margin-top: 20px;">
    <tbody>
        <tr>
            <td width="33%">
                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                    {{$row->lastname}}
                </div>
                <span style="font-size: 12px;" >Last Name</span>
            </td>
            <td width="33%">
                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                    {{$row->firstname}}
                </div>
                <span style="font-size: 12px;" >First Name</span>
            </td>
            <td width="33%">
                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                    {{$row->middlename}}
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
                                <div style="border-bottom: 1px solid #476434; margin-bottom: 1rem;">{{$row->address}}
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
                                    {{$row->age}}
                                </div>
                                <span style="font-size: 12px;" >Age</span>
                            </td>
                            <td width="50%">
                                <div style="border-bottom: 1px solid #476434;  margin-bottom: 0.3rem; font-size: 12px;">
                                    {{$row->position_applied}}
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
                                <tr><td width="38%">Birthday:</td><td width="62%" style="font-weight: 400; border-bottom: 1px solid black;">{{$row->birthdate ? date_format(new DateTime($row->birthdate), 'F d, Y') : '' }}</td></tr>
                                <tr><td width="38%">Passport:</td><td width="62%" style="font-weight: 400; border-bottom: 1px solid black; ">{{$row->passport ? $row->passport : '' }}</td></tr>
                                <tr><td width="38%">SSRB:</td><td width="62%" style="font-weight: 400; border-bottom: 1px solid black; ">{{$row->ssrb ? $row->ssrb : '' }}</td></tr>
                                <tr><td width="38%">Cellphone #:</td><td width="62%" style="font-weight: 400; border-bottom: 1px solid black; ">{{$row->contactno ? $row->contactno : '' }}</td></tr>
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
        <tr>
            <td width="50%" style="text-align: center; border-bottom: 1px solid #476434">
                {{$row->created_date}}
            </td>
            <td width="50%" style="text-align: center; border-bottom: 1px solid #476434">
                <img width="150px" height="45px" style="object-fit:cover;"
                src="" alt="">
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
            <td width="20%">5.1 Medical Package/Test:</td><td width="80%" style="text-align: left; border-bottom: 1px solid #476434">{{$row->packagename}}</td>
        </tr>
        <tr>
            <td width="20%">5.2 Additional Request:</td><td width="80%" style="text-align: left; border-bottom: 1px solid #476434">{{$row->custom_request}}</td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="5" cellpadding="3">
    <tbody>
        <tr>
            <td width="30%" style="text-align: center;"><b>Type of Payment: </b></td>
            <td style="text-align: center;">Applicant Paid
                <span>
                    @if ($row->payment_type == "Applicant Paid")
                    <input type="checkbox" name="" id="" checked disabled style="vertical-align: middle;">
                    @else
                    <input type="checkbox" name="" id="" disabled style="vertical-align: middle;">
                    @endif
                </span>
            </td>
            <td style="text-align: center;">Billed Agency
                <span>
                    @if ($row->payment_type == "Billed")
                    <input type="checkbox" name="" id="" checked disabled style="vertical-align: middle;">
                    @else
                    <input type="checkbox" name="" id="" disabled style="vertical-align: middle;">
                    @endif
                </span>
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="5" cellpadding="2">
<tbody>
    <tr>
        <td width="30%">&nbsp;</td>
        <td width="40%" style="text-align: center; border-bottom: 1px solid #476434;"> <img src="@php echo base64_decode($row->signature)@endphp" alt=""  width="150px" height="45px" style="object-fit:cover;"></td>
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
            <td width="50%" style="text-align: center;"> <img src="{{ $map }}" width="100%" /></td>
            <td width="25%">&nbsp;</td>
        </tr>
    </tbody>
</table>

@endforeach

</html>