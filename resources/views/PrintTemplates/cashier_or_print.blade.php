<?php

	function formatNumber($val,$digit = 2){
		return ($val=="") ? "" : number_format($val,$digit,".",",");
	}
	
	function formatDate($val,$type=0,$kind=0) {
		if ($val=="" || $val=="0000-00-00") {
			if ($type==2)
				return "null";
			else
				return "";
		} else {
			$time = ($kind==0) ? "" : " H:i:s";
			if ($type==0) {
				return date("m/d/Y".$time,strtotime($val));	
			} elseif ($type==1) {
				return date("F d, Y".$time,strtotime($val));
			} elseif ($type==2) {
				return date("Y-m-d".$time,strtotime($val));
			} elseif ($type==3) {
				return date("d/M/Y".$time,strtotime($val));
			} elseif ($type==4) {
				return date("M. d, Y".$time,strtotime($val));
			} elseif ($type==5){
				return date("Y".$time,strtotime($val));
			}  elseif ($type==6){
				return date("l(d)".$time,strtotime($val));
			}  elseif ($type==7){
				return date("Y/m/d".$time,strtotime($val));	
			}  elseif ($type==8){
				return date("d/m/Y".$time,strtotime($val));	
			}  elseif ($type==9){
				return date("F".$time,strtotime($val));	
			}  elseif ($type==10){
				return date("mdy".$time,strtotime($val));	
			}  elseif ($type==11){
				return date("d M Y".$time,strtotime($val));	
			}  elseif ($type==12){
				return date("d F Y".$time,strtotime($val));	
			}  elseif ($type==13){
				return date("M/d/Y".$time,strtotime($val));	
			}
		}
	}
	
	$serial_no = $account->serial_no;
	$trans_no = $account->trans_no;
	$trans_date = formatDate($account->trans_date);
	$admission_id = $account->admission_id;
	$payor = $account->payor;
	$paying_type = $account->paying_type;
	$particulars = $account->particulars;
	$amount_due = $account->amount_due;
	$tin_no = $account->tin_no;
	$amount = $account->amount;
	$amountinword = $account->amountinword;
	$agency_id = $account->agency_id;
	$dentist_id = $account->dentist_id;
	$dentist_procedure = $account->dentist_procedure;
	$vat = $account->vat;
	$discount = $account->discount;

	$vamount = 0;
	$total = 0;
	$pwd  = 0;
	$lvat = 0;
	$vat_inclusive = 0;
	$vsales = 0;
	$vamount = 0;
	$vat_inclusive = 0;
	
	if ($tin_no) {
		$amount_due = $amount/1.12;
		$vamount = $amount_due * 0.12;
		$total = $amount_due/0.8;
		$pwd = $total*0.2;
		$lvat = $total*0.12;
		$vat_inclusive = $total + $lvat;
	} else {
		$vsales = $amount/1.12;
		$vamount = $amount-$vsales;
		$vat_inclusive = $amount;
	}

?>

<html>
    <head>
    <title>Cashier Official Receipt</title>
    <!--<link href="dist/css/eureka-print.css?v=1648791805" rel="stylesheet" type="text/css" />-->
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        * {
            font-family: sans-serif;
            font-size: 12px;
        }
    </style>
    </head>
    <body tracingsrc="" tracingopacity="100" >
        <table width="100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <table width="100%" cellpadding="2" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="80" rowspan="3" align="center">
                                    <img src="../../../app-assets/images/logo/logo.jpg" width="100" height="100" alt="">
                                </td>
                                <td width="356" rowspan="3" align="center" valign="middle">
                                    <span class="lblCompName">MERITA DIAGNOSTIC CLINIC INC.</span><br
                                        style="margin-bottom: 20px">
                                    <span >5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave.
                                            Cor. San Antonio St. Malate, Manila<br>
                                                Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
                                                Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
                                                Accredited: DOH * POEA * MARINA * TESDA * Oil &amp; Gas UK<br>Skuld
                                                P&amp;I * West of England P&amp;I
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 2rem;">
                            <tbody>
                                <tr>
                                    <td width="100%">
                                        <span style="font-size: 25px;">RECEIPT</span> 
                                        <span style="font-size: 12px;"> {{$trans_no}}</span> <br> <br>
                                        <span style="font-size: 13px; font-weight: 700;">{{$account->admission->patient->firstname}} {{$account->admission->patient->lastname}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="5" cellspacing="0" style="margin: 1rem 0;">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <span style="font-size: 13px; font-weight: 700;">Bill From:</span> <br>
                                    </td>
                                    <td>
                                        <span style="font-size: 13px; font-weight: 700;">Bill To:</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 12px; font-weight: 300;">Merita Diagnostic Clinic</span> <br>
                                    </td>
                                    <td>
                                        <span style="font-size: 12px; font-weight: 300;">{{$payor}}</span> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-size: 12px; font-weight: 300;">5th  6th Flr Jettac Bldg., 920 <br> Quirino Ave.Cor. San Antonio St. Malate, Manila</span>
                                    </td>
                                    <td>
                                        <b>Serial No.: </b>{{$serial_no}} <br>
                                        <b>Transaction No.: </b>{{$trans_no}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin: 2rem 0;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" class="brdTable" cellpadding="5" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td width="35%"><b>Item</b></td>
                                                    <td width="15%"><b>Description</b></td>
                                                    <td width="15%"><b>Price</b></td>
                                                    <td width="15%"><b>Date</b></td>
                                                </tr>
                                                @foreach($items as $item)
                                                <tr>
                                                    <td>{{$item['itemname']}}</td>
                                                    <td>{{$item['description']}}</td>
                                                    <td>₱ {{$item['price']}}</td>
                                                    <td>{{date_format(new DateTime($item['date']), "F d, Y")}}</td>
                                                </tr>
                                                @endforeach
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
                        <table width="100%" cellpadding="5" cellspacing="0" style="margin: 2rem 0;">
                            <tbody>
                                <tr>
                                    <td valign="top" width="60%">
                                        <h3><b>Particulars</b></h3>
                                        <div>{{$particulars}}</div>
                                    </td>
                                    <td width="30%">
                                        <table width="100%" cellpadding="5" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>VAT INCLUSIVE</td>
                                                    <td align="right">₱ <?php echo formatNumber($vat_inclusive) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DISCOUNT</td>
                                                    <td align="right">₱ <?php echo formatNumber($discount) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>AMOUNT DUE</td>
                                                    <td align="right">₱ <?php echo formatNumber($amount_due) ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TIN NO</td>
                                                    <td align="right"> <?php echo $tin_no ?></td>
                                                </tr>
                                                <tr>
                                                    <td>AMOUNT</td>
                                                    <td align="right">₱ <?php echo formatNumber($amount) ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        PRINT BY: 
                                                    </td>
                                                    <td align="right">
                                                        {{$print_by->firstname}} {{$print_by->lastname}}
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
        
        
        
        <script>
            window.print();
        </script>
    </body>
</html>