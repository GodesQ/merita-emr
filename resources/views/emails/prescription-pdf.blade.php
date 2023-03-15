<!DOCTYPE html>
<html>

<head>
    <title>Prescription Slip</title>
    <style>
    body,
    table,
    tr,
    td {
        font-family: serif;
        font-size: 21px;
        color: green;
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

    @page {
        size: letter;
    }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="0" width="500">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0"  style="margin: 20px 0;">
                        <tbody>
                            <tr>
                                <td>
                                    <div style='text-align: center;'>
                                        <h2 style="font-size: 25px; font-weight: 700; line-height: 0px;">MERITA DIAGNOSTIC CLINIC, INC </h2>
                                        <div>5th Flr. Jettac Bldg. 920 Pres Quirino Ave,</div>
                                        <div>Cor. San Antonio St. Malate Manila</div>
                                        <div>Tel No. (02) 310-05995 / 0917-8576-942</div>
                                        <div>Accredited: DOH &bull; POEA &bull; MARINA</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="5">
                        <tbody>
                            <tr>
                                <td width="65%"></td>
                                <td width="35%"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td width="17%">Name</td>
                                                <td style="border-bottom: 1px solid green;" width="83%">
                                                    <span style="color: black;">{{$patient->firstname}} {{$patient->lastname}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                                </td>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td width="19%">Date: </td>
                                                <td style="border-bottom: 1px solid green;" width="81%">
                                                    <span style="color: black;">{{date_format(new DateTime($data->prescription_date), "F d, Y")}}</span>
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
                                                <td width="14%">Address</td>
                                                <td style="border-bottom: 1px solid green;" width="86%">
                                                    <span style="color: black;">{{$patient->address}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td width="20%">Age</td>
                                                <td style="border-bottom: 1px solid green;" width="80%">
                                                    <span style="color: black;">{{$patient->age}}</span>
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
                    <h3 style="font-size: 50px; font-weight: 600;">Rx</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="height: 440px;">
                        <div style="color: black; margin-left: 80px; font-size: 30px; line-height: 35px;">
                            @php echo nl2br($data->prescription) @endphp
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="60%" rowspan="2"></td>
                            </tr>
                            <tr>
                                <td width="40%">
                                    <table width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <td width="80%">
                                                    <div>
                                                        <img src="@php echo $doctor->signature @endphp" style="width: 80%;object-fit:cover;" alt="">
                                                    </div>
                                                    <div
                                                        style="width: 100%; border-bottom: 1px solid green; color: black;">
                                                        {{$doctor->firstname . " " . $doctor->lastname}}</div>
                                                </td>
                                                <td width="20%" style="vertical-align: bottom;">
                                                    {{$doctor->title}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td width="30%">
                                                    Lic. No.
                                                </td>
                                                <td width="70%">
                                                    <div style="border-bottom: 1px solid green; color: black;">
                                                        {{$doctor->license_no}}</div>
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
</body>

</html>