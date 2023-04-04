<html>

<head>
    <title>LABORATORY STATUS</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    html, body {
        height:100%;
    }
    body,
    table,
    tr,
    td {
        font-family: constantia;
        font-size: 12px;
    }

    .fontBoldLrg {
        font: bold 15px constantia;
    }

    .fontMed {
        font: normal 12px constantia;
    }
    .brdBot tr td{
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        font-size: 11px;
    }
    ol li {
        margin: 0.5rem 0;
    }
    .fntBldLrg{
        font-weight: 800;
        text-align: center;
    }
    .fntBldSml{
        font-weight: 800;
        text-align: center;
        font-size: 9px;
    }
    .red-text {
        color: red;
    }
    @page {
        size: legal;
        margin: 0.5rem;
    }

    @media print {
      * { margin: 0 !important; padding: 0 !important; }
      #controls, .footer, .footerarea{ display: none; }
      html, body {
        /*changing width to 100% causes huge overflow and wrap*/
        height:100%;
        overflow: hidden;
        background: #FFF;
        font-size: 10pt;
      }

      .template { width: auto; left:0; top:0; }
      img { width:100%; }
      li { margin: 0 0 10px 20px !important;}
    }

    </style>
</head>

<body>

</body>
<html>
    <center>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" style="font-size: 25px; text-transform: uppercase;">MERITA DIAGNOSTIC CLINIC</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td >
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td align="right" width="5%" align="center" style="text-transform: uppercase;">Date: </td>
                                    <td align="right" width="15%" align="center" class="fntBldLrg" style="border-bottom: 1px solid black;">{{date_format(new DateTime($admission->trans_date), "d F Y")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="5">
                            <tbody>
                                <tr>
                                    <td width="8%">NAME</td>
                                    <td width="20%" style="border-bottom: 1px solid black;">{{$admission->patient->lastname}}, {{$admission->patient->firstname}} {{$admission->patient->middlename}}</td>
                                    <td width="8%">AGENCY</td>
                                    <td width="25%" style="border-bottom: 1px solid black;">{{$admission->agency->agencyname}}</td>
                                </tr>
                                <tr>
                                    <td width="8%">Package</td>
                                    <td width="20%" style="border-bottom: 1px solid black;">{{$admission->package->packagename}}</td>
                                    <td width="8%">Additional Test</td>
                                    <td width="25%" style="border-bottom: 1px solid black;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" style="font-size: 17px; text-transform: uppercase;">LABORATORY RESULTS</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">HEMATOLOGY</td>
                                </tr>
                                <tr>
                                    <td width="2%">HGB</td>
                                    <td width="22%" class="fntBldLrg {{optional($admission->exam_hema)->hemoglobin < 120 || $admission->exam_hema->hemoglobin > 170 ? 'red-text' : ''}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->hemoglobin}}
                                            @if($admission->exam_hema->hemoglobin < 120)
                                                L
                                            @endif
                                            @if($admission->exam_hema->hemoglobin >  170)
                                                H
                                            @endif
                                        @endif
                                    </td>
                                    <td width="5%">Neutrophil</td>
                                    <td width="25%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->neuthrophils}}
                                        @endif
                                    </td>
                                    <td width="2%">MCH</td>
                                    <td width="33%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->mch}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">HCT</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_hema)->hematocrit < 0.40 || $admission->exam_hema->hematocrit > 0.54 ? 'red-text' : ''}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->hematocrit}}
                                            @if($admission->exam_hema->hematocrit < 0.40)
                                                L
                                            @endif
                                            @if($admission->exam_hema->hematocrit >  0.54)
                                                H
                                            @endif
                                        @endif
                                    </td>
                                    <td width="12%">Lymphocyte</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->lymphocytes}}
                                        @endif
                                    </td>
                                    <td width="10%">MCV</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->mcv}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">WBC</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_hema)->wbc < 5 || $admission->exam_hema->wbc > 10 ? 'red-text' : ''}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->wbc}}
                                            @if($admission->exam_hema->wbc < 5)
                                                L
                                            @endif
                                            @if($admission->exam_hema->wbc >  10)
                                                H
                                            @endif
                                        @endif
                                    </td>
                                    <td width="12%">Eosinophil</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->eosinophils}}
                                        @endif
                                    </td>
                                    <td width="10%">MCHC</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->mchc}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">RBC</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_hema)->rbc < 3.5 || $admission->exam_hema->rbc > 5.5 ? 'red-text' : ''}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->rbc}}
                                            @if($admission->exam_hema->rbc < 3.5)
                                                L
                                            @endif
                                            @if($admission->exam_hema->rbc > 5.5)
                                                H
                                            @endif
                                        @endif
                                    </td>
                                    <td width="12%">Monocyte</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->monophils}}
                                        @endif
                                    </td>
                                    <td colspan="2" width="30%">
                                        <table cellspacing="5" cellpadding="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        ABO
                                                    </td>
                                                    <td width="45%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hema)
                                                            {{optional($admission->exam_hema)->blood}}
                                                        @endif
                                                    </td>
                                                    <td width="5%">Rh</td>
                                                    <td width="45%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hema)
                                                            {{optional($admission->exam_hema)->rhfactor}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">ESR</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->esr}}
                                        @endif
                                    </td>
                                    <td width="12%">Basophil</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->baspophils}}
                                        @endif
                                    </td>
                                    <td width="10%">Platelet</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_hema)->platelet < 150 || $admission->exam_hema->platelet > 450 ? 'red-text' : ''}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_hema)
                                            {{optional($admission->exam_hema)->platelet}}
                                            @if($admission->exam_hema->platelet < 150)
                                                L
                                            @endif
                                            @if($admission->exam_hema->platelet > 450)
                                                H
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">URINALYSIS</td>
                                </tr>
                                <tr>
                                    <td width="10%">Color</td>
                                    <td width="22%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->color}}
                                        @endif
                                    </td>
                                    <td width="5%">pH</td>
                                    <td width="25%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->ph}}
                                        @endif
                                    </td>
                                    <td width="2%">Pus cells</td>
                                    <td width="33%" class="fntBldLrg {{str_contains(optional($admission->exam_urin)->pus, 'H') ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->pus}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Transp</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->transparency}}
                                        @endif
                                    </td>
                                    <td width="12%">Blood Cells</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_urin)->blood != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->blood}}
                                        @endif
                                    </td>
                                    <td width="10%">Red Blood cells</td>
                                    <td width="20%" class="fntBldLrg {{str_contains(optional($admission->exam_urin)->rbc, 'H') ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->rbc}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Leukocytes</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_urin)->leukocyte != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->leukocyte}}
                                        @endif
                                    </td>
                                    <td width="12%">Sp. Gravity</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->spgravity}}
                                        @endif
                                    </td>
                                    <td width="10%">Epithelial cells</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->epithelial}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Nitrite</td>
                                    <td width="20%" class="fntBldLrg {{optional($admission->exam_urin)->nitrite != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->nitrite}}
                                        @endif
                                    </td>
                                    <td width="12%">ketone</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_urin)->ketone != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->ketone}}
                                        @endif
                                    </td>
                                    <td width="10%">Mucus Threads</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->mucus}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Urobilinogen</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_urin)->urobilinogen != 'Normal' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->urobilinogen}}
                                        @endif
                                    </td>
                                    <td width="12%">Bilirubin</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_urin)->bilirubin != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->bilirubin}}
                                        @endif
                                    </td>
                                    <td width="10%">Bacteria</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->bacteria}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Protein</td>
                                    <td width="20%" class="fntBldLrg {{optional($admission->exam_urin)->albumin != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->albumin}}
                                        @endif
                                    </td>
                                    <td width="12%">Glucose</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_urin)->sugar != 'Negative' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                       @if($admission->exam_urin)
                                            {{$admission->exam_urin->sugar}}
                                        @endif
                                    </td>
                                    <td width="10%">A. Urates</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->urates}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Others</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">{{optional($admission->exam_urin)->others}}</td>
                                    <td width="12%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;"></td>
                                    <td width="10%">A. Phospates</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_urin)
                                            {{$admission->exam_urin->phosphates}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">Fecalysis</td>
                                </tr>
                                <tr>
                                    <td width="5%">Color</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_feca)
                                            {{$admission->exam_feca->color}}
                                        @endif
                                    </td>
                                    <td width="5%">Pus Cells</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_feca)
                                            {{$admission->exam_feca->pus}}
                                        @endif
                                    </td>
                                    <td width="10%">Ova/Parasite</td>
                                    <td width="27%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_feca)
                                            {{$admission->exam_feca->ova}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">Consistency</td>
                                    <td width="15%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_feca)
                                            {{$admission->exam_feca->consistency}}
                                        @endif
                                    </td>
                                    <td width="12%">RBC</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_feca)
                                            {{$admission->exam_feca->rbc}}
                                        @endif
                                    </td>
                                    <td width="10%">Bacteria</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_feca)
                                            {{$admission->exam_feca->bacteria}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="2" cellspacing="5" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">PREGNANCY TEST: <span>
                                        @if($admission->exam_pregnancy)
                                            {{$admission->exam_pregnancy->result}}
                                        @endif
                                    </span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="2" cellspacing="5" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">MALARIAL SMEAR: <span></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                       <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">SEROLOGY</td>
                                </tr>
                                <tr>
                                    <td valign="top" width="50%" style="font-weight: 600;">
                                        <table width="100%" cellpadding="0" cellspacing="5">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" style="text-transform: uppercase; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="15%" align="center">COV</td>
                                                    <td width="15%" align="center">PV</td>
                                                    <td width="15%" align="center">RESULTS</td>
                                                </tr>
                                                <tr>
                                                    <td>VDRL/RPR</td>
                                                    <td class="fntBldSml" style="border-bottom: 1px solid black;"></td>
                                                    <td class="fntBldSml" style="border-bottom: 1px solid black;"></td>
                                                    <td class="fntBldSml {{optional($admission->exam_bloodsero)->vdrl_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->vdrl_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HBsAg</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->hbsag_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->hbsag_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->hbsag_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->hbsag_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HIV 1&2</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hiv)
                                                            {{$admission->exam_hiv->result_cov}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hiv)
                                                            {{$admission->exam_hiv->result_pv}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hiv)
                                                            {{$admission->exam_hiv->result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anti HCV</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihcv_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihcv_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihcv_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihcv_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TPHA Quali</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"></td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"></td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->tpha_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            @if($admission->exam_hepa->tpha_result == 'Reactive')
                                                                Positive
                                                            @elseif($admission->exam_hepa->tpha_result == 'Non Reactive')
                                                                Negative
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td class="fntBldLrg"></td>
                                                    <td class="fntBldLrg"></td>
                                                    <td class="fntBldSml"></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td valign="top" width="50%" style=" font-weight: 600;">
                                        <table width="100%" cellpadding="0" cellspacing="5">
                                            <tbody>
                                                <tr>
                                                    <td  width="20%" style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td  width="15%" align="center">COV</td>
                                                    <td  width="15%" align="center">PV</td>
                                                    <td  width="15%" align="center">RESULTS</td>
                                                </tr>
                                                <tr>
                                                    <td>Anti HBS</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbs_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbs_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihbs_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbs_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HBeAg</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->hbeag_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->hbeag_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->hbeag_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->hbeag_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>AntiHBe</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbe_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbe_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihbe_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbe_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anti HBc-IgM</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbclgm_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbclgm_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihbclgm_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbclgm_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anti HBc-IgG</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbclgg_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbclgg_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihbclgg_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihbclgg_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anti HAV IgM</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihavlgm_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihavlgm_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihavlgm_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihavlgm_result}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anti HAV IgG</td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihavlgg_cutoff}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihavlgg_value}}
                                                        @endif
                                                    </td>
                                                    <td class="fntBldSml {{optional($admission->exam_hepa)->antihavlgg_result == 'Reactive' ? 'red-text' : null}}" style="border-bottom: 1px solid black; text-transform: uppercase;">
                                                        @if($admission->exam_hepa)
                                                            {{optional($admission->exam_hepa)->antihavlgg_result}}
                                                        @endif
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
                        <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">BLOOD CHEMISTRY</td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="5">
                                            <tbody>
                                                <tr>
                                                    <td width="18%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="27%" align="center">Normal values</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">FBS</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->fbs < 70 || optional($admission->exam_bloodsero)->fbs > 110 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->fbs}}
                                                        @if(optional($admission->exam_bloodsero)->fbs < 70 && is_numeric(optional($admission->exam_bloodsero)->fbs))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->fbs > 110 && is_numeric(optional($admission->exam_bloodsero)->fbs))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">70-110 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">2hrs PPBG</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->ppbg > 200 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->ppbg}}
                                                        @if(optional($admission->exam_bloodsero)->ppbg > 200 && is_numeric(optional($admission->exam_bloodsero)->ppbg))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> < 200 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">HBAIC</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->hba1c < 4 || optional($admission->exam_bloodsero)->hba1c > 6.5 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->hba1c}}
                                                        @if(optional($admission->exam_bloodsero)->hba1c < 4 && is_numeric(optional($admission->exam_bloodsero)->hba1c))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->hba1c > 6.5 && is_numeric(optional($admission->exam_bloodsero)->hba1c))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 4.0-6.5%</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">BUN</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->bun < 5 || optional($admission->exam_bloodsero)->bun > 20 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->bun}}
                                                        @if(optional($admission->exam_bloodsero)->bun < 5  && is_numeric(optional($admission->exam_bloodsero)->bun))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->bun > 20  && is_numeric(optional($admission->exam_bloodsero)->bun))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 5 - 20 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Creatinine</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->creatinine < 0.8 || optional($admission->exam_bloodsero)->creatinine > 1.2 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->creatinine}}
                                                        @if(optional($admission->exam_bloodsero)->creatinine < 0.8 && is_numeric(optional($admission->exam_bloodsero)->creatinine))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->creatinine > 1.2 && is_numeric(optional($admission->exam_bloodsero)->creatinine))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 0.8-1.2 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Uric Acid</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->uricacid < 140 || optional($admission->exam_bloodsero)->uricacid > 430 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->uricacid}}
                                                        @if(optional($admission->exam_bloodsero)->uricacid < 140 && is_numeric(optional($admission->exam_bloodsero)->uricacid))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->uricacid > 430 && is_numeric(optional($admission->exam_bloodsero)->uricacid))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 140-430 umol/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Cholesterol</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->cholesterol < 125 || optional($admission->exam_bloodsero)->cholesterol > 200 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->cholesterol}}
                                                        @if(optional($admission->exam_bloodsero)->cholesterol < 125 && is_numeric(optional($admission->exam_bloodsero)->cholesterol))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->cholesterol > 200 && is_numeric(optional($admission->exam_bloodsero)->cholesterol))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 125-200 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">HDL Chole</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->hdl < 40 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->hdl}} {{optional($admission->exam_bloodsero)->hdl < 40 && is_numeric(optional($admission->exam_bloodsero)->hdl) ? 'L': null}}
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> > 40 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">LDL Chole</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->ldl > 100 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->ldl}} {{optional($admission->exam_bloodsero)->ldl > 100 && is_numeric(optional($admission->exam_bloodsero)->ldl) ? 'H': null}}
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> < 100 mg/dL</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">VLDL Chole</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->vldl < 7 || optional($admission->exam_bloodsero)->vldl > 32 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->vldl}}
                                                        @if(optional($admission->exam_bloodsero)->vldl < 7 && is_numeric(optional($admission->exam_bloodsero)->vldl))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->vldl > 32 && is_numeric(optional($admission->exam_bloodsero)->vldl))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 	M-8-32 F:7-26 mg</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Triglycerides</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->triglycerides < 35 || optional($admission->exam_bloodsero)->triglycerides > 160 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->triglycerides}}
                                                        @if(optional($admission->exam_bloodsero)->triglycerides < 35 && is_numeric(optional($admission->exam_bloodsero)->triglycerides))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->triglycerides > 160 && is_numeric(optional($admission->exam_bloodsero)->triglycerides))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> M:40-160 F:35-130</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="5">
                                            <tbody>
                                                <tr>
                                                    <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="20%" align="center">Normal values</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">SGOT</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->sgot < 0 || optional($admission->exam_bloodsero)->sgot > 40 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->sgot}}
                                                        @if(optional($admission->exam_bloodsero)->sgot < 0 && is_numeric(optional($admission->exam_bloodsero)->sgot))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->sgot > 40 && is_numeric(optional($admission->exam_bloodsero)->sgot))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">0-40 u/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">SGPT</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->sgpt < 0 || optional($admission->exam_bloodsero)->sgpt > 41 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->sgpt}}
                                                        @if(optional($admission->exam_bloodsero)->sgpt < 0 && is_numeric(optional($admission->exam_bloodsero)->sgpt))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->sgpt > 41 && is_numeric(optional($admission->exam_bloodsero)->sgpt))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 0-41 u/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Alk. Phosphatase</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->alkphos < 35 || optional($admission->exam_bloodsero)->alkphos > 129 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->alkphos}}
                                                        @if(optional($admission->exam_bloodsero)->alkphos < 35 && is_numeric(optional($admission->exam_bloodsero)->alkphos))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->alkphos > 129 && is_numeric(optional($admission->exam_bloodsero)->alkphos))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 35-129 u/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">GGT</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->ggt < 0 || optional($admission->exam_bloodsero)->ggt > 55 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->ggt}}
                                                        @if(optional($admission->exam_bloodsero)->ggt < 0 && is_numeric(optional($admission->exam_bloodsero)->ggt))
                                                        L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->ggt > 55 && is_numeric(optional($admission->exam_bloodsero)->ggt))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 0-55u/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Total Protein</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->ttlprotein < 66 || optional($admission->exam_bloodsero)->ttlprotein > 87 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->ttlprotein}}
                                                        @if(optional($admission->exam_bloodsero)->ttlprotein < 66 && is_numeric(optional($admission->exam_bloodsero)->ttlprotein))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->ttlprotein > 87 && is_numeric(optional($admission->exam_bloodsero)->ttlprotein))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 66-87 g/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Albumin</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->albumin < 35 || optional($admission->exam_bloodsero)->albumin > 52 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->albumin}}
                                                        @if(optional($admission->exam_bloodsero)->albumin < 35 && is_numeric(optional($admission->exam_bloodsero)->albumin))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->albumin > 52 && is_numeric(optional($admission->exam_bloodsero)->albumin))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 35-52 g/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Globulin</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->globulin < 31 || optional($admission->exam_bloodsero)->globulin > 35 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->globulin}}
                                                        @if(optional($admission->exam_bloodsero)->globulin < 31 && is_numeric(optional($admission->exam_bloodsero)->globulin))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->globulin > 35 && is_numeric(optional($admission->exam_bloodsero)->globulin))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 31-35 g/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">A/G Ratio</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->ag_ratio < 0.6 || optional($admission->exam_bloodsero)->ag_ratio > 1.7 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->ag_ratio}}
                                                        @if(optional($admission->exam_bloodsero)->ag_ratio < 0.6 && is_numeric(optional($admission->exam_bloodsero)->ag_ratio))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->ag_ratio > 1.7 && is_numeric(optional($admission->exam_bloodsero)->ag_ratio))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;">1: 0.6-1.7</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Total Biliburin</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->ttlbilirubin < 5 || optional($admission->exam_bloodsero)->ttlbilirubin > 21 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->ttlbilirubin}}
                                                        @if(optional($admission->exam_bloodsero)->ttlbilirubin < 5 && is_numeric(optional($admission->exam_bloodsero)->ttlbilirubin))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->ttlbilirubin > 21 && is_numeric(optional($admission->exam_bloodsero)->ttlbilirubin))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 5-21 umol/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Direct Biliburin</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->dirbilirubin < 0 || optional($admission->exam_bloodsero)->dirbilirubin > 5.1 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->dirbilirubin}}
                                                        @if(optional($admission->exam_bloodsero)->dirbilirubin < 0 && is_numeric(optional($admission->exam_bloodsero)->dirbilirubin))
                                                            L
                                                        @endif
                                                        @if(optional($admission->exam_bloodsero)->dirbilirubin > 5.1 && is_numeric(optional($admission->exam_bloodsero)->dirbilirubin))
                                                            H
                                                        @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 0-5.1 umol/L</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Indirect Biliburin</td>
                                                    <td class="fntBldLrg {{optional($admission->exam_bloodsero)->indbilirubin < 0 || optional($admission->exam_bloodsero)->indbilirubin > 16 ? 'red-text': null}}" style="border-bottom: 1px solid black;">
                                                        {{optional($admission->exam_bloodsero)->indbilirubin}}
                                                            @if(optional($admission->exam_bloodsero)->indbilirubin < 0 && is_numeric(optional($admission->exam_bloodsero)->indbilirubin))
                                                                L
                                                            @endif
                                                            @if(optional($admission->exam_bloodsero)->indbilirubin > 16 && is_numeric(optional($admission->exam_bloodsero)->indbilirubin))
                                                                H
                                                            @endif
                                                    </td>
                                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;"> 0-16 umol/L</td>
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
                        <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-transform: uppercase; font-weight: 600;">DRUG & ALCOHOL TEST</td>
                                </tr>
                                <tr>
                                    <td width="10%">Metaphetamine / Amphetamines</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->methamphetamine == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->methamphetamine}}
                                        @endif
                                    </td>
                                    <td width="12%">Alcohol</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->alcohol == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->alcohol}}
                                        @endif
                                    </td>
                                    <td width="10%">Metaqualone</td>
                                    <td width="20%" class="fntBldLrg {{optional($admission->exam_drug)->metaqualone == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->metaqualone}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">Cannabinoids (THC)</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->tetrahydrocannabinol == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->tetrahydrocannabinol}}
                                        @endif
                                    </td>
                                    <td width="10%">Propoxypene</td>
                                    <td width="20%" class="fntBldLrg {{optional($admission->exam_drug)->propoxyphene == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->propoxyphene}}
                                        @endif
                                    </td>
                                    <td width="10%">Opium</td>
                                    <td width="20%" class="fntBldLrg {{optional($admission->exam_drug)->opium == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid rgb(0, 0, 0);">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->opium}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">Cocaine</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->cocaine == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->cocaine}}
                                        @endif
                                    </td>
                                    <td width="12%">Benzodiazepines</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->benzodiazepine == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->benzodiazepine}}
                                        @endif
                                    </td>
                                    <td width="10%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">Morphine / Opiates</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->morphine == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->morphine}}
                                        @endif
                                    </td>
                                    <td width="12%">Barbiturates</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->benzodiazepine == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->benzodiazepine}}
                                        @endif
                                    </td>
                                    <td width="10%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td width="20%" class="fntBldLrg" style="border-bottom: 1px solid black;">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">Phencyclidine</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->phencyclidine == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->phencyclidine}}
                                        @endif
                                    </td>
                                    <td width="12%">Methadone</td>
                                    <td width="15%" class="fntBldLrg {{optional($admission->exam_drug)->methadone == 'Positive' ? 'red-text' : null}}" style="border-bottom: 1px solid black;">
                                        @if($admission->exam_drug)
                                            {{$admission->exam_drug->methadone}}
                                        @endif
                                    </td>
                                    <td width="10%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="2" class="brdAll">
                            <tbody>
                                <tr>
                                    <td width="12%">Additional Test: </td>
                                    <td class="fntBldLrg" style="border-bottom: 1px solid black;" width="85%">{{$additional}}</td>
                                    <td width="3%"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><span class="lblForm">FORM NO. 3<br>REV. 01 / 31-01-2022</span></td>
                </tr>
            </tbody>
        </table>
    </center>
</html>
