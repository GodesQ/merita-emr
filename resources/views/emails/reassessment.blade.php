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
    <!-- HIDDEN PREHEADER TEXT -->
    <div
        style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Google Sans', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        Hello! This is your medical result status.
    </div>
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
                            <h1 style="font-size: 32px; font-weight: 800; margin-bottom: 0;">MEDICAL RESULT STATUS</h1>
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
                            <p style="margin: 0;"></p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 20px 20px 20px;">
                                        <table border="0" cellspacing="5" cellpadding="5">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;"><b>Name</b></div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;">
                                                            {{$patient->firstname}} {{$patient->lastname}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;"><b>Agency</b></div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;">
                                                            {{$patient->agencyname}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;"><b>Result</b></div>
                                                        <div style="font-size: 24px; font-family: 'Google Sans', Helvetica, Arial, sans-serif;">
                                                            FINDINGS / REASSESSMENT
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;"><b><u>Remarks / Recommendation</u></b></div>
                                                        <div style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;">
                                                            @php echo nl2br($data->remarks)@endphp
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 style="font-family: 'Google Sans', Helvetica, Arial, sans-serif;">Your are schedule on {{$schedule}}</h4>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 20px 20px 20px;">
                                        <table border="0" cellspacing="10" cellpadding="10">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;">
                                                    <a href="https://www.google.com/search?q=merita+clinic&oq=merita+clinic+&aqs=chrome.0.69i59l2j69i61j69i60l2.3952j0j1&sourceid=chrome&ie=UTF-8#lrd=0x3397c9810ee974bb:0x7806d22f04c0598b,1,,,"
                                                        target="_blank"
                                                        style="color: #156f29; font-weight: 700;"><strong>Write a Review
                                                            in Google</strong></a>
                                                </td>
                                                <td>
                                                    <a href="#" target="_blank"
                                                        style="color: #156f29; font-weight: 700;"><strong>Write a Review
                                                            in Facebook</strong></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->

                    <tr>
                        <td bgcolor="#ffffff" align="center"
                            style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Copy of your medical result(s) was forwarded to your respective agency. Requesting additional copy would require additional fee.
                                <br><br>
                                If you have any questions please call our official hotline 84609906—we’re always happy to help</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center"
                            style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Google Sans', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Regards,<br>Merita Diagnostic Clinic </p>
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

</body>

</html>
