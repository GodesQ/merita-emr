<?php
function convertNumber($num = false, $currency = 'Pesos')
{
    [$whole, $fraction] = explode('.', number_format($num, 2));

    $num = str_replace([',', ''], '', trim($num));
    if (!$num) {
        return 0;
    }

    $num = (int) $num;

    $words = [];
    $list1 = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    $list2 = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred'];
    $list3 = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'];

    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);

    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = $hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : '') . ' ' : '';
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ($tens < 20) {
            $tens = $tens ? ' and ' . $list1[$tens] . ' ' : '';
        } elseif ($tens >= 20) {
            $tens = (int) ($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ($levels && (int) $num_levels[$i] ? ' ' . $list3[$levels] . ' ' : '');
    } //end for loop

    $centavos_num_length = strlen($fraction);
    $centavos_levels = (int) (($centavos_num_length + 2) / 3);
    $centavos_max_length = $centavos_levels * 3;
    $fraction = substr('00' . $fraction, -$centavos_max_length);
    $centavos_num_levels = str_split($fraction, 3);

    for ($i = 0; $i < count($centavos_num_levels); $i++) {
        $centavos_levels--;
        $hundreds = (int) ($centavos_num_levels[$i] / 100);
        $hundreds = $hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : '') . ' ' : '';
        $tens = (int) ($centavos_num_levels[$i] % 100);
        $singles = '';
        if ($tens < 20) {
            $tens = $tens ? ' and ' . $list1[$tens] . ' ' : '';
        } elseif ($tens >= 20) {
            $tens = (int) ($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($centavos_num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $centavos_words[] = $hundreds . $tens . $singles . ($centavos_levels && (int) $centavos_num_levels[$i] ? ' ' . $list3[$centavos_levels] . ' ' : '');
    } //end for loop

    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    if ($currency == 'Dollar') {
        $language_sign = 'Dollar ';
        $language_sign2 = 'Cents ';
    } else {
        $language_sign = 'Pesos ';
        $language_sign2 = 'Centavos ';
    }

    $words = implode(' ', $words);
    $words = preg_replace('/^\s\b(and)/', '', $words);
    $words = trim($words);
    $words = ucfirst($words);
    $words = $words . ' ' . $language_sign;

    $centavos_words = implode(' ', $centavos_words);
    $centavos_words = preg_replace('/^\s\b(and)/', '', $centavos_words);
    $centavos_words = trim($centavos_words);
    $centavos_words = ucfirst($centavos_words);
    $centavos_words = $fraction > 0 ? $centavos_words . ' ' . $language_sign2 : null;

    $total_words = (int) $fraction > 0 ? $words . ' And ' . $centavos_words : $words;
    return $total_words;
}
?>

<html>

<head>
    <title>SOA REPORT</title>
    <!--<link href="dist/css/eureka-print.css?v=1648791805" rel="stylesheet" type="text/css" />-->
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        * {
            font-family: sans-serif;
            font-size: 10px;
        }

        @page {
            size: A4;
            margin: 0.6rem;
        }

        @media print {
            body {
                height: 100vh;
            }
        }

        #pageFooter {
            display: table-footer-group;
        }

        #pageFooter:after {
            counter-increment: page;
            content: counter(page);
        }
    </style>
</head>

<body>
    <?php $page = 1; ?>
    @forelse($collected_patients as $collected_patient)
        <div style="height: 100vh; margin: 0; position: relative;">
            <table width="100%" cellpadding="0" cellspacing="0" class="pageTable">
                <tbody>
                    {{-- <tr>
                        <td >
                            <table width="100%" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td width="20%" rowspan="3" align="center">
                                            <img src="../../../app-assets/images/logo/logo.jpg" width="100" height="100" alt="">
                                        </td>
                                        <td width="80%" rowspan="3" align="center" valign="middle">
                                            <span  style="color: #2c763f; font-size: 30px; font-family: serif;">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                                style="margin-bottom: 20px">
                                            <span style="color: #2c763f">5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                                    Cor. San Antonio St. Malate, Manila<br>
                                                        Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
                                                        Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                        Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld
                                                        P&amp;I * West of England P&amp;I
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            <table width="100%" cellspacing="0" cellpadding="2" style="margin: 2rem 0 0 0;">
                                <tbody>
                                    <tr>
                                        <td width="80%" style="font-size: 10px; text-decoration: underline;">
                                            {{ $agency ? $agency->agencyname : 'All Agency' }}
                                        </td>
                                        <td width="80%">Date:
                                            <span>{{ date_format(new DateTime($soa_date), 'd M Y') }}</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"
                                            style="font-size: 10px; text-decoration: underline;text-transform: uppercase;">
                                            {{ date_format(new DateTime($date_to), 'F Y') }}
                                        </td>
                                        <td width="20%">INVOICE: <span
                                                style="border: none; border-bottom: 1px solid black;">{{ $invoice_number }}000{{ $page }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $bahia_vessel ? '( ' . $bahia_vessel . ' )' : null }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <table width="100%" cellpadding="2" cellspacing="0" class="brdBtm soa-table"
                                    border="0" style="margin-top: 1rem;">
                                    <tbody>
                                        <tr>
                                            <td colspan="10" align="center"
                                                style="font-size: 15px; font-weight: 500; border: none !important;">
                                                STATEMENT OF ACCOUNT</td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="brdAll" width="10%">DATE</td>
                                            <td align="left" class="brdTop brdBtm" width="2%">&nbsp;</td>
                                            <td align="left" class="brdTop brdLeft brdBtm" width="12%">LASTNAME
                                            </td>
                                            <td align="left" class="brdTop brdBtm" width="12%">FIRSTNAME</td>
                                            <td align="left" class="brdTop brdBtm" width="12%">MIDDLENAME</td>
                                            <td align="left" class="brdTop brdLeft brdBtm" width="15%">PARTICULAR
                                            </td>
                                            <td width="15%" align="left" class="brdAll">CERTIFICATE NOS.</td>
                                            <td align="left" class="brdAll" width="10%">AMOUNT</td>
                                        </tr>
                                        <?php
                                        $total = 0;
                                        $patient_count = 1;
                                        ?>
                                        @forelse($collected_patient as $patient)
                                            <tr>
                                                <td valign="top" align="left" class="brdLeft brdRight">
                                                    {{ date_format(new DateTime($patient->trans_date), 'd-M-Y') }}</td>
                                                <td valign="top" align="left" class="brdRight">
                                                    @php
                                                        echo $patient_count;
                                                        $patient_count++;
                                                    @endphp
                                                </td>
                                                <td valign="top" align="left">
                                                    {{ $patient->patient ? $patient->patient->lastname : null }}</td>
                                                <td valign="top" align="left">
                                                    {{ $patient->patient ? $patient->patient->firstname : null }}</td>
                                                <td valign="top" align="left" class="brdRight">
                                                    {{ $patient->patient ? $patient->patient->middlename : null }}</td>
                                                <td valign="top" align="left" class="brdRight">Liberian Medical
                                                    Cert.</td>
                                                <td valign="top" align="left" class="brdRight">
                                                    {{ optional($patient->exam_physical)->liberian_code ? optional($patient->exam_physical)->liberian_code : $patient->liberian_certno }}
                                                </td>
                                                <td valign="top" align="left" class="brdRight">
                                                    <?php
                                                    if ($agency) {
                                                        if ($agency->id == 9 || $agency->id == 22 || $agency->id == 25 || $agency->id == 4) {
                                                            $price = 300;
                                                            echo '₱ ' . number_format($price, 2);
                                                            $total += $price;
                                                        } else {
                                                            if ($currency == 'Peso') {
                                                                $price = $exchange_rate * 5;
                                                                echo '₱ ' . number_format($price, 2);
                                                                $total += $price;
                                                            } else {
                                                                $price = 5;
                                                                echo '$ ' . number_format($price, 2);
                                                                $total += $price;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        @empty
                                            <h2 class="text-align">No Record Found</h2>
                                        @endforelse
                                        <tr>
                                            <td class="brdTop brdLeft brdRight" colspan="8"></td>
                                        </tr>
                                        <tr>
                                            @if ($tax)
                                                <?php
                                                $tax_amount = $tax / 100;
                                                $sub_amount = $total;
                                                $total_tax_amount = $sub_amount * $tax_amount;
                                                $total = $total - $total_tax_amount;
                                                ?>
                                            @endif


                                            <td class="brdTop brdLeft" colspan="6">
                                                Amount in Words : <b
                                                    style="text-transform: uppercase; font-size: 9px;"><?php $get_amount = convertNumber($total, $currency);
                                                    echo $get_amount; ?></b>
                                            </td>
                                            <td class="brdTop brdRight" style="text-align: right;"><b>Total Amount:</b>
                                            </td>
                                            <td class="brdTop brdRight" colspan="1">
                                                @if ($tax)
                                                    <div>{{ $currency == 'Pesos' ? '₱' : '' }} <?php echo number_format((float) $sub_amount, 2); ?>
                                                    </div>
                                                    <div style="margin: 5px 0;">({{ $currency == 'Pesos' ? '₱' : '$' }}
                                                        <?php echo number_format((float) $total_tax_amount, 2); ?>)</div>
                                                    <hr>
                                                    {{ $currency == 'Pesos' ? '₱' : '$' }} <?php echo number_format((float) $total, 2); ?>
                                                @else
                                                    {{ $currency == 'Pesos' ? '₱' : '$' }} <?php echo number_format((float) $total, 2); ?>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="3" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td> All statement of account with unpaid balances of more than two months on
                                            the agreed due date, a two(2) % monthly interest shall apply. </td>
                                    </tr>
                                    <tr>
                                        <td>Please disregard if payment have been made.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="6" cellspacing="6" style="margin-top: 2rem;">
                                <tbody>
                                    <tr>
                                        <td>
                                            Prepared by / Checked by: <span
                                                style="border-bottom: 1px solid black;"><input
                                                    style="border: none; border-bottom: 1px solid black;"
                                                    value="{{ $prepared_by }}" /> </span>
                                        </td>
                                        <td>
                                            Approved by: <span style="border-bottom: 1px solid black;"><input
                                                    style="border: none; border-bottom: 1px solid black;"
                                                    value="{{ $approved_by }}" /></span>
                                        </td>
                                        <td>Received by: <span style="border-bottom: 1px solid black;"><input
                                                    style="border: none; border-bottom: 1px solid black;"
                                                    value="" /></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Form No. 60 | Rev. 00/20-02-2018</td>
                                        <td style="position: absolute; bottom: 20px; left: 45%;">Page
                                            <?php echo $page;
                                            $page++; ?> of <?php echo count($collected_patients); ?></td>
                                        <td>Date & Time: <input style="border: none; border-bottom: 1px solid black;"
                                                value="" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @empty
        <table width="100%" cellpadding="0" cellspacing="0" class="pageTable">
            <tbody>
                {{-- <tr>
                    <td >
                        <table width="100%" cellpadding="2" cellspacing="0" style="margin-bottom: 4rem;">
                            <tbody>
                                <tr>
                                    <td width="20%" rowspan="3" align="center">
                                        <img src="../../../app-assets/images/logo/logo.jpg" width="100" height="100" alt="">
                                    </td>
                                    <td width="80%" rowspan="3" align="center" valign="middle">
                                        <span  style="color: #2c763f; font-size: 30px; font-family: serif;">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                            style="margin-bottom: 20px">
                                        <span style="color: #2c763f">5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                                Cor. San Antonio St. Malate, Manila<br>
                                                    Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
                                                    Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                    Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld
                                                    P&amp;I * West of England P&amp;I
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> --}}
                <tr>
                    <td style="font-size: 20px; font-weight: bold; text-align: center;">NO RECORD FOUND</td>
                </tr>
            </tbody>
    @endforelse

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        window.addEventListener('load', () => {
            let url_string = location.href;
            let url = new URL(url_string);
            var action = url.searchParams.get("action");
            if (action == "PRINT") {
                window.print();
            }

            if (action == 'Download Excel') {
                exportTableToExcel('soa-table');
                window.close();
            }

            if (action == 'Download CSV') {
                var data = [];
                var rows = document.querySelectorAll(".soa-table tr");

                for (var i = 0; i < rows.length; i++) {
                    var row = [],
                        cols = rows[i].querySelectorAll("td, th");
                    for (var j = 0; j < cols.length; j++) {
                        let col = cols[j].innerText.replace(/,|\n/g, " ")
                        row.push(col);
                    }
                    data.push(row.join(","));
                }

                downloadCSVFile(data.join("\n"), 'soa_report');
                window.close();
            }

            let tableHeight = document.querySelectorAll('.soa-table');
            let maxHeightTable = 453;

            for (let index = 0; index < tableHeight.length; index++) {
                const element = tableHeight[index];
                let tableRow = element.children[0].children;
                console.log(element, element.clientHeight);
                if (element.clientHeight < maxHeightTable) {
                    let targetElement = tableRow[tableRow.length - 3];
                    let t = targetElement.setAttribute('height', `${maxHeightTable - element.clientHeight}px`);
                }
            }
        });

        function exportTableToExcel(tableID, filename = 'soa_report') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.querySelectorAll('.soa-table');
            var tableHTML;

            tableSelect.forEach(table => {
                tableHTML += table.outerHTML.replace(/ /g, '%20');
            });

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }

        function downloadCSVFile(csv, filename) {
            var csv_file, download_link;

            csv_file = new Blob([csv], {
                type: "text/csv"
            });

            download_link = document.createElement("a");

            download_link.download = filename;

            download_link.href = window.URL.createObjectURL(csv_file);

            download_link.style.display = "none";

            document.body.appendChild(download_link);

            download_link.click();
        }
    </script>
</body>

</html>
