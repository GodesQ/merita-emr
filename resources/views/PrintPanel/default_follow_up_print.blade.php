@php
    $count = 0;
@endphp
<html>

<head>
    <title>Follow UP Form</title>
    <meta http-equiv="content-type" content="text/plain; charset=UTF-8" />
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        * {
            font-family: constantia;
            font-size: 13px;
            text-transform: uppercase;
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }

        .fontBoldLrg {
            font: bold 15px constantia;
        }

        .fontMed {
            font: bold 13px constantia;
        }

        div,
        ul li {
            font-size: 12px;
            font-weight: 400;
        }

        .findings-table tr {
            height: 30px !important;
        }

        @page {
            size: legal;
            margin: 5px 28px;
        }
    </style>

</head>

<body>
    <div style="height:100vh; min-height: 100vh; margin: 0;">
        <table valign="top" width="100%" cellspacing="0" cellpadding="0" id="table" class="brdNone second-table">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="7%" rowspan="5" align="center"><img
                                            src="../../../app-assets/images/logo/logo.jpg" width="80" height="80"
                                            alt=""></td>
                                    <td width="73%" align="center">
                                        <span style="font-size: 25px; font-weight: 800;">MERITA DIAGNOSTIC CLINIC
                                            INC.</span> <br>
                                        <span>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave. Cor. San Antonio St.
                                            Malate, Manila</span>
                                    </td>
                                    <td width="20%"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="10" cellpadding="0" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="60%" colspan="2">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start;  width: 100%;">
                                            <div style="width: 15%;">Name :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 85%;">
                                                {{ $patient->lastname }}, {{ $patient->firstname }}
                                                {{ $patient->middlename }} </div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div
                                            style="display: flex; align-items: flex-stendart; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Age :</div>
                                            <div class="fontBoldLrg"
                                                style="border-bottom: 1px solid #000; width: 75%; text-align: center;">
                                                {{ $patient->age }}</div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Sex :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">
                                                {{ $patient->gender }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 35%;">Patient ID :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 65%;">
                                                {{ $patient->patientcode }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">PEME :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">
                                                {{ date_format(new DateTime($patient->admission->trans_date), 'd F Y') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 30%;">Position :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 70%;">
                                                {{ $patient->position_applied }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 15%;">Agency :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 85%;">
                                                {{ $patient->agencyname }}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Vessel :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">
                                                {{ $patient->admission->vesselname }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 15%;">Package :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 85%;">
                                                {{ $patient->admission->package->packagename }}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div
                                            style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Principal :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">
                                                {{ $patient->admission->principal }}</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2 style="font-size: 25px; font-weight: 800; line-height: 20px;">FOLLOW UP FORM</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="5" cellpadding="5" class="brdTable second-findings-table">
                            <tbody>
                                <tr>
                                    <td style="display: none;" colspan="3">Page 2</td>
                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">Name :</td>
                                    <td style="display: none; text-align: left;">{{ $patient->lastname }},
                                        {{ $patient->firstname }} {{ $patient->middlename }}</td>
                                    <td style="display: none; text-align: left;">Agency : {{ $patient->agencyname }}
                                    </td>

                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">Patient ID : </td>
                                    <td style="display: none; text-align: left;">{{ $patient->patientcode }}</td>
                                    <td style="display: none; text-align: left;">Package :
                                        {{ $patient->admission->package->packagename }}</td>

                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">Position :</td>
                                    <td style="display: none; text-align: left;">{{ $patient->position_applied }}</td>
                                    <td style="display: none; text-align: left;">Vessel :
                                        {{ $patient->admission->vesselname }}</td>
                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">PEME : </td>
                                    <td style="display: none; text-align: left;">
                                        {{ date_format(new DateTime($patient->admission->trans_date), 'd F Y') }}</td>
                                    <td style="display: none; text-align: left;">Principal :
                                        {{ $patient->admission->principal }}</td>
                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;"></td>
                                </tr>
                                <tr>
                                    <td width="15%" style="font-weight: 800;">DATE</td>
                                    <td width="30%" style="font-weight: 800;">FINDINGS / DIAGNOSIS</td>
                                    <td width="25%" style="font-weight: 800;">RECOMMENDATIONS</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        FORM NO. 11 <br>
                        REV. 02/15-06-2022
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        let screenHeight = screen.height;
        let maximumSize = [1250, 1220];
        let secondMaxSize = 1230;

        let secondTable = document.querySelector('.second-table');
        let secondTableTbody = document.querySelector('.second-findings-table').children[0];
        while (secondTable.clientHeight <= secondMaxSize) {
            let tr = document.createElement('tr');
            tr.innerHTML = `<tr>
                                <td><div>&nbsp;</div></td>
                                <td><div>&nbsp;</div></td>
                                <td><div>&nbsp;</div></td>
                            </tr>`;
            if (secondTable.clientHeight <= secondMaxSize) {
                secondTableTbody.append(tr);
            }
        }

        window.print();
    </script>

</body>

</html>
