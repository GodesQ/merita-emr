<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
    @media screen {
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap');
    }

    /* CLIENT-SPECIFIC STYLES */
    body,
    table,
    td,
    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    /* RESET STYLES */
    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px) {
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] {
        margin: 0 !important;
    }
    </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    @foreach ($data as $row)
    <!-- HIDDEN PREHEADER TEXT -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#244681" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#244681" align="center" style="padding: 0px 10px 0px 0px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 20px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 3px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <img src=" https://meritaclinic.ph/wp-content/uploads/2022/03/Merita-Logo.png" width="125"
                                height="120" style="display: block; border: 0px;" />
                            <h1 style="font-size: 32px; font-weight: 800; margin-bottom: 0;">REFERRAL SLIP</h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center"
                            style="padding: 20px 20px 0px 20px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Your agency has successfully generated your medical referral slip. Please see the details provided below for your reference upon registration.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 25px 25px 25px 25px;">
                                        <table border="0" cellspacing="5" cellpadding="10">
                                            <tr>
                                                <td width="40%">
                                                    <b>AGENCY NAME: </b>
                                                </td>
                                                <td align="center" width="60%">
                                                    {{$row->agencyname}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>ADDRESS OF AGENCY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->agency_address}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>MEDICAL PACKAGE: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->packagename}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>REQUESTOR: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->requestor}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>COUNTRY OF DESTINATION: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->country_destination}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>NAME: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->firstname}} {{$row->middlename}} {{$row->lastname}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>POSITION APPLIED: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->position_applied}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>PAYMENT TYPE: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->payment_type}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>VESSEL: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->vessel}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>ADMISSION TYPE: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->admission_type}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>CUSTOM REQUEST: </b>
                                                </td>
                                                <td align="center">
                                                    @php echo nl2br($row->custom_request) @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>CERTIFICATES: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->certificate}}
                                                </td>
                                            </tr>
                                            @if ($row->skuld_qty)
                                            <tr>
                                                <td>
                                                    <b>SKULD QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->skuld_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->woe_qty)
                                            <tr>
                                                <td>
                                                    <b>WOE QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->woe_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->cayman_qty)
                                            <tr>
                                                <td>
                                                    <b>CAYMAN QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->cayman_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->liberian_qty)
                                            <tr>
                                                <td>
                                                    <b>LIBERIAN QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->liberian_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->croatian_qty)
                                            <tr>
                                                <td>
                                                    <b>CROATIAN QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->croatian_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->danish_qty)
                                            <tr>
                                                <td>
                                                    <b>DANISH QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->danish_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->diamlemos_qty)
                                            <tr>
                                                <td>
                                                    <b>DIAMLEMOS QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->diamlemos_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->marshall_qty)
                                            <tr>
                                                <td>
                                                    <b>MARSHALL QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->marshall_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->malta_qty)
                                            <tr>
                                                <td>
                                                    <b>MALTA QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->malta_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->dominican_qty)
                                            <tr>
                                                <td>
                                                    <b>DOMINICAN QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->dominican_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->bahamas_qty)
                                            <tr>
                                                <td>
                                                    <b>BAHAMAS QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->bahamas_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->bermuda_qty)
                                            <tr>
                                                <td>
                                                    <b>BERMUDA QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->bermuda_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->mlc_qty)
                                            <tr>
                                                <td>
                                                    <b>MLC QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->mlc_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->mer_qty)
                                            <tr>
                                                <td>
                                                    <b>MER QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->mer_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($row->bahia_qty)
                                            <tr>
                                                <td>
                                                    <b>BAHIA QUANTITY: </b>
                                                </td>
                                                <td align="center">
                                                    {{$row->bahia_qty}}
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="padding: 20px 0px; margin: 0px 0;">
                                            <p style="padding: 0px 30px 0px 30px; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600;">[IMPORTANT] BEFORE PROCEEDING TO MERITA DIAGNOSTIC CLINIC. PLEASE REGISTER, LOGIN AND ACCOMPLISH THE FORM</p>
                                            <ol style="font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px;">
                                                <li>Register by clicking the Register button below</li>
                                                <li>Verify your Email address</li>
                                                <li>Login @ www.meritaclinic.app</li>
                                                <li>Accomplish the form and schedule your appointment</li>
                                                <li>Screenshot your scheduled date and present it to the guard</li>
                                            </ol>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 20px 0px; margin: 0px 0;">
                                        <a href="{{url('')}}/register" style="padding: 0.6rem 1rem 0.6rem 1rem; background: #244681; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px;">REGISTER NOW</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;">
                                        <p style="margin: 0;">IF USER HAS ALREADY REGISTERED AND NOT TAKING MEDICAL EXAM FOR THE FIRST TIME, LOGIN HERE AND CLICK RE-MEDICAL BUTTON TO SCHEDULE YOUR APPOINTMENT</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 20px 0px; margin: 10px 0;">
                                        <a href="{{url('')}}" style="padding: 0.6rem 1rem 0.6rem 1rem; background: #244681; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px;">LOGIN NOW</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="center"
                            style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, send us an email at info@meritaclinic.ph</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 10px 30px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">PS: Bring 3 copies of Passport picture</p>
                            <p style="margin: 0;">Wear proper attire (no shorts and slippers)</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center"
                            style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Regards,<br>Merita Diagnostic Clinic </p>
                            <p style="margin: 0;">5th and 6th Floor JETTAC Building, 920 Pres. Quirino Ave., cor. San Antonio St., Brgy 689 Malate Manila</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#156f29" align="center"
                            style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: white; margin: 0;">Need more help?
                            </h2>
                            <p style="margin: 0;"><a href="https://meritaclinic.ph/contact-us/" target="_blank"
                                    style="color: white;">We&rsquo;re here
                                    to help you out</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#f4f4f4" align="center"
                            style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;">
                            <br>
                            <p style="margin: 0;">Powered by: <a href="https://meritaclinic.ph/" target="_blank"
                                    style="color: #156f29; font-weight: 700;"><strong>Merita Diagnostic
                                        Clinic</strong></a>.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    @endforeach
</body>

</html>