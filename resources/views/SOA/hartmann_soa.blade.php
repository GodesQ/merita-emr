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
        }
        
        @media print {
            body : {
                height: 100% !important;
            }
        }
        
        @media (max-width: 1024px) {
            body : {
                height: 130vh !important;
            }
        }
    </style>
    </head>

@foreach($collected_patients as $collected_patient)
<body >
        <div style="height: 100%; margin: 0;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                    {{-- <tr>
                        <td>
                            <table width="100%" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td width="20%" rowspan="3" align="center">
                                            <img src="../../../app-assets/images/logo/logo.jpg" width="100" height="100" alt="">
                                        </td>
                                        <td width="80%" rowspan="3" align="center" valign="middle">
                                            <span  style="color: #000; font-size: 30px; font-family: serif;">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                                style="margin-bottom: 20px">
                                            <span style="color: #000">920 Pres. Qurino Ave., Brgy. 723, Zone 79, Malate Manila <br>
                                            Tel. No. (632) 310-1022 / 310-0825 Email: meritaclinic@gmail.com <br>
                                            Non VAT Reg. TIN-009-314-189-000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            <table width="100%" cellpadding="2" cellspacing="0" style="margin-top: 2rem;">
                                <tbody>
                                    <tr>
                                        <td width="85%" align="center" style="font-size: 20px;font-weight: 800;font-family: serif">
                                            BILLING INVOICE
                                        </td>
                                        {{-- <td width="15%" style="font-size: 15px;font-weight: 400;font-family: serif">
                                            NO. 0427
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table width="100%" cellpadding="5" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <table width="100%" cellpadding="5" cellspacing="0" class="brdAll">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>BILLED TO</td>
                                                                        <td style="text-transform: uppercase;">
                                                                            {{$agency->agencyname}}
                                                                        </td>
                                                                        <td>Date</td>
                                                                        <td><input style="border: none;" value="{{ date_format(new DateTime($soa_date), 'd M Y') }}" /></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="brdTop">Address: </td>
                                                                        <td class="brdTop">
                                                                            {{$agency->address}}
                                                                        </td>
                                                                        <td class="brdTop">Terms</td>
                                                                        <td class="brdTop"><input style="border: none;" value="{{ $terms_date }}" /></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="brdTop">Buisness Style: </td>
                                                                        <td class="brdTop">
                                                                            &nbsp;
                                                                        </td>
                                                                        <td class="brdTop">TIN</td>
                                                                        <td class="brdTop">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="100%" cellpadding="6" cellspacing="0" class="brdAll soa-table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="85%" align="center" class="brdRight brdBtm" colspan="5" style="font-size: 15px; font-weight: 600;font-family: serif">PARTICULARS</td>
                                                                        <td width="15%" align="center" class="brdBtm" style="font-size: 15px; font-weight: 600;font-family: serif">AMOUNT</td>
                                                                    </tr>
                                                                    <?php $total = 0 ?>
                                                                    <?php $symbol = $currency == 'Dollar' ? '$ ' : '&#8369 '?>
                                                                    @forelse($collected_patient as $patient)
                                                                        <tr>
                                                                            <td valign="top" align="left" class="brdTop">{{date_format(new DateTime($patient->trans_date), "d-M-Y")}}</td>
                                                                            <td valign="top" align="left" class="brdTop">{{$patient->patient->lastname}}</td>
                                                                            <td valign="top" align="left" class="brdTop">{{$patient->patient->firstname}}</td>
                                                                            <td valign="top" align="left" class="brdTop">{{$patient->patient->middlename}}</td>
                                                                            <td valign="top" align="left" class="brdTop brdRight"> {{$patient->package->packagename}}</td>
                                                                            <td valign="top" align="center" class="brdTop">
                                                                                <?php
                                                                                    if($currency == 'Dollar') {
                                                                                        if($patient->package->dollar_price) {
                                                                                            $price = $patient->package->dollar_price;
                                                                                            echo $symbol . $price;
                                                                                        } else {
                                                                                            $price = $patient->package->peso_price / $exchange_rate;
                                                                                            echo $symbol . floor(($price*100))/100;
                                                                                        }
                                                                                    } else {
                                                                                        if($patient->package->dollar_price) {
                                                                                            $price = $patient->package->dollar_price * $exchange_rate;
                                                                                            echo $symbol . $price;
                                                                                        } else {
                                                                                            $price = $patient->package->peso_price ;
                                                                                            echo $symbol . floor(($price*100))/100;
                                                                                        }
                                                                                    }
                                                                                    $total += $price;
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                        @if($patient->package_id != 1)
                                                                            @if(in_array('include_additional_exams', $include_examination))
                                                                                @forelse($patient->admission_exams as $add_exam)
                                                                                <tr>
                                                                                    <td valign="top" class="brdTop" align="left">{{date_format(new DateTime($add_exam->updated_date), "d-M-Y")}}</td>
                                                                                    <td valign="top" class="brdTop" align="left"></td>
                                                                                    <td valign="top" class="brdTop" align="left"></td>
                                                                                    <td valign="top" class="brdTop" align="left"></td>
                                                                                    <td valign="top" class="brdTop brdRight" align="left">{{$add_exam->exam ? $add_exam->exam->examname : null}}</td>
                                                                                    <td valign="top" class="brdTop" align="center">
                                                                                        <?php
                                                                                            if($currency == 'Dollar') {
                                                                                                if($add_exam->exam) {
                                                                                                    $price = number_format($add_exam->exam->price / $exchange_rate, 2);
                                                                                                    echo $symbol . $price;
                                                                                                } else {
                                                                                                    $price = 0.00;
                                                                                                    echo $symbol . $price;
                                                                                                }
                                                                                            } else {
                                                                                                if($add_exam->exam) {
                                                                                                    $price = $add_exam->exam->price;
                                                                                                    echo $price;
                                                                                                } else {
                                                                                                    $price = 0.00;
                                                                                                    echo $symbol . $price;
                                                                                                }
                                                                                            }
                                                                                            $total += $price;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                @empty
                                                                                @endforelse
                                                                            @endif
                                                                        @endif
                                                                    @empty
                                                                        <tr colspan="6"><td>NO RECORDS</td></tr>
                                                                    @endforelse
                                                                    <tr>
                                                                        <td width="85%" align="right" class="brdRight brdTop" colspan="5" style="font-size: 15px; font-weight: 600;font-family: serif">TOTAL AMOUNT</td>
                                                                        <td width="15%" align="center" class="brdTop" style="font-size: 15px; font-weight: 600;font-family: serif;">
                                                                            <?php echo $symbol. number_format((float) $total, 2) ?>
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
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="5" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td width="30%">
                                            <div>
                                                <h3>Prepared By:</h3>
                                                <div>&nbsp;</div>
                                                <div style="font-size: 11px; font-weight: 600; text-align: center;border-bottom: 1px solid black;">
                                                    <input style="border: none; border-bottom: 1px solid black;" value="{{ $prepared_by }}" />
                                                </div>
                                                <div style="text-align: center;">Signature Over Printed Name</div>
                                            </div>
                                        </td>
                                        <td width="3%"></td>
                                        <td width="30%">
                                            <div>
                                                <h3>Certified true and correct:</h3>
                                                <div>&nbsp;</div>
                                                <div style="font-size: 11px; font-weight: 600; text-align: center;border-bottom: 1px solid black;">
                                                    <input style="border: none; border-bottom: 1px solid black;" value="{{ $approved_by }}" />
                                                </div>
                                                <div style="text-align: center;">Cashier/Authorized Representative</div>
                                            </div>
                                        </td>
                                        <td width="3%"></td>
                                        <td width="33%">
                                            <div>
                                                <h3>Received By:</h3>
                                                <div>&nbsp;</div>
                                                <div style="font-size: 11px; font-weight: 600; text-align: center;border-bottom: 1px solid black;">
                                                    &nbsp;
                                                </div>
                                                <div style="text-align: center;">Signature Over Printed Name</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="100">
                                        <td colspan="4">
                                            10 Bklts (50 x 2) 0001-0500 <br>
                                            BIR Autho. to Print No. OCN-1AU0001891455 <br>
                                            Date IssuedL 09/12/2018 Valid Until: 09/12/2023 <br>
                                            Spiral Printing and Gen, Mdse. / Alberto S. Yabut <br>
                                            53  Countryside Ave, Pasig City <br>
                                            TIN-119-456-875-000-VAT Tel. No. 656-5072
                                        </td>
                                        <td>
                                            Printer's Accreditation No. 43BMP20130000000002 <br>
                                            Date IssuedL 12/26/13
                                        </td>
                                    </tr>
                                    <td colspan="6" align="center" style="font-size: 13px; text-transform: uppercase; text-decoration: underline;">
                                        "THIS DOUCMENT IS NOT VALID FOR CLAIM OF INPUT TAX" <br>
                                        "THIS BILLING INVOICE SHALL BE VALID FOR FIVE (5) YEARS FROM THE DATE OF THE ATP"
                                    </td>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


</body>

</html>
@endforeach

    <script>
        let soa_table = document.querySelectorAll('.soa-table');
        let maxHeightTable = screen.height >= 600 ? 500 : 400;
    

        for (let index = 0; index < soa_table.length; index++) {
            const table = soa_table[index];
            console.log(table.rows.length - 2);
            let tableTbody = table.children[0];
            var ind = table.rows.length - 1;

            while(table.clientHeight < maxHeightTable) {
                let tr = table.insertRow(ind);
                tr.innerHTML = `<td valign="top" class="brdTop" align="left">&nbsp;</td>
                                <td valign="top" class="brdTop" align="left">&nbsp;</td>
                                <td valign="top" class="brdTop" align="left">&nbsp;</td>
                                <td valign="top" class="brdTop" align="left">&nbsp;</td>
                                <td valign="top" class="brdTop brdRight" align="left">&nbsp;</td>
                                <td valign="top" class="brdTop" align="left">&nbsp;</td>
                                `;
            }
        }
        window.print();
    </script>
