@php
    $count = 0;
@endphp
<html>

<head>
    <title>Follow UP Form</title>
    <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    * {
        font-family: constantia;
        font-size: 13px;
        text-transform: uppercase;
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
       margin: 0px 28px;
    }
    </style>

</head>
<body>
    <div style="min-height: 100vh; margin: 0; max-height: 200vh;">
        <table valign="top" width="100%" style="overflow: hidden;" cellspacing="0" cellpadding="0" id="table" class="brdNone main-table">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="7%" rowspan="5" align="center"><img src="../../../app-assets/images/logo/logo.jpg" width="80" height="80" alt=""></td>
                                    <td width="73%" align="center">
                                        <span style="font-size: 25px; font-weight: 800;">MERITA DIAGNOSTIC CLINIC INC.</span> <br>
                                        <span>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave. Cor.. San Antonio St. Malate, Manila</span>
                                    </td>
                                    <td width="20%"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="10" cellpadding="0" class="brdNone main-findings-table">
                            <tbody>
                                <tr>
                                    <td width="60%" colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start;  width: 100%;">
                                            <div style="width: 15%;">Name :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 85%;">{{$patient->lastname}}, {{$patient->firstname}} {{$patient->middlename}} </div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div style="display: flex; align-items: flex-stendart; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Age :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 75%; text-align: center;">{{$patient->age}}</div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Sex :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 75%;">{{$patient->gender}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 40%;">Patient ID :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 60%;">{{$patient->patientcode}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 30%;">PEME :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 70%;">{{ $patient->admission->last_medical }}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 30%;">Position :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 70%;">{{$patient->position_applied}} <span style="font-size: 10px;">({{ $patient->admission->emp_status }})</span></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 15%;">Agency :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 85%;">{{$patient->agencyname}}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Vessel :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 75%;">{{$patient->admission->vesselname}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 15%;">Package :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 85%;">{{$patient->admission->package->packagename}}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Principal :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid black; width: 75%;">{{ $patient->admission->principal }}</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2 style="font-size: 25px; font-weight: 800; line-height: 10px; margin: 1.5rem 0;">FOLLOW UP FORM</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" border="1" style="border-collapse: collapse !important;" cellpadding="2" class="findings-table">
                            <tbody>
                                <tr style="display: none;">
                                    <td>Name: {{ $patient->lastname }}, {{ $patient->firstname }} {{ $patient->middlename }} </td>
                                    <td>Agency: {{ $patient->agencyname }}</td>
                                    <td>Package: {{ $patient->admission->package->packagename }}</td>
                                </tr>
                                <tr>
                                    <td width="12%" style="font-weight: 800;">DATE</td>
                                    <td width="30%" style="font-weight: 800;">FINDINGS / DIAGNOSIS</td>
                                    <td width="28%" style="font-weight: 800;">RECOMMENDATIONS</td>
                                </tr>
                                @forelse($records as $key_record => $record)
                                    @php
                                        $findings = explode(";", $record->findings);
                                        $results = array_map(function ($finding) {
                                            return ['Findings' => $finding];
                                            }, $findings);
                                        $recommendations = explode(";", $record->remarks);
                                        foreach($recommendations as $key => $recommendation) {
                                            if(isset($results[$key])) {
                                                $results[$key] += ['Recommendation' => $recommendation];
                                            }
                                        }
                                    @endphp

                                    @if($loop->first)
                                        <tr>
                                            <td valign="top">{{date_format(new DateTime($admission->trans_date), "d F Y")}}</td>
                                            <td valign="top">
                                                <b>Past Med History:</b>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                @if($admission->exam_physical)
                                                    <b>{{ $admission->exam_physical->past_peme ? $admission->exam_physical->past_peme : "." }}</b>
                                                @endif
                                            </td>
                                            <td valign="top">
                                                @if($admission->exam_physical)
                                                    <b>{{ $admission->exam_physical->past_peme_recommendation ? $admission->exam_physical->past_peme_recommendation : "." }}</b>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>VITAL SIGN:</b>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">

                                                <b>Height:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->height }} cm</span>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>Weight:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->weight }} kg</span>
                                            </td valign="top">
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>BMI:</b> <span style="margin-left: 10px;">{{ strpos(optional($admission->exam_physical)->bmi, 'Overweight') ? str_replace('Overweight', '', optional($admission->exam_physical)->bmi) : optional($admission->exam_physical)->bmi }}</span>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>BP:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->systollic }}/{{ optional($admission->exam_physical)->diastollic }}</span>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>PR:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->pulse }}/min</span>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>RR:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->respiration }}/min</span>
                                            </td>
                                            <td valign="top"></td>
                                        </tr>

                                        @if($admission->exam_xray)
                                            @if($admission->exam_xray->chest_remarks_status)
                                                <tr>
                                                    <td valign="top"></td>
                                                    <td valign="top">
                                                        <b>Chest Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->chest_remarks_status == 'normal' ? 'Normal' : $admission->exam_xray->chest_findings  }}</span>
                                                    </td>
                                                    <td valign="top">
                                                        @if($admission->exam_xray->chest_remarks_status == 'findings' && $admission->exam_xray->chest_recommendations)
                                                            <b>Chest Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->chest_remarks_status == 'findings' ? $admission->exam_xray->chest_recommendations : null }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif

                                        @if($admission->exam_xray)
                                            @if($admission->exam_xray->lumbosacral_remarks_status)
                                                <tr>
                                                    <td valign="top"></td>
                                                    <td valign="top">
                                                        <b>LUMBOSACRAL XRAY:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->lumbosacral_remarks_status == 'normal' ? 'Normal' : $admission->exam_xray->lumbosacral_findings  }}</span>
                                                    </td>
                                                    <td valign="top">
                                                        @if($admission->exam_xray->lumbosacral_remarks_status == 'findings' && $admission->exam_xray->lumbosacral_recommendations)
                                                            <b>LUMBOSACRAL Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->lumbosacral_remarks_status == 'findings' ? $admission->exam_xray->lumbosacral_recommendations : null }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif

                                        @if($admission->exam_xray)
                                            @if($admission->exam_xray->knees_remarks_status)
                                                <tr>
                                                    <td valign="top"></td>
                                                    <td valign="top">
                                                        <b>Knee:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->knees_findings == 'normal' ? 'Normal' : $admission->exam_xray->remarks  }}</span>
                                                    </td>
                                                    <td valign="top">
                                                        @if($admission->exam_xray->knees_findings == 'findings' && $admission->exam_xray->knees_recommendations)
                                                            <b>Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->knees_findings == 'findings' ? $admission->exam_xray->knees_recommendations : null }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif

                                        @if($admission->exam_ecg)
                                            <tr>
                                                <td valign="top"></td>
                                                <td valign="top">
                                                    <b>ECG:</b> <span style="margin-left: 10px;">{{ $admission->exam_ecg->ecg == 'Significant Findings' ? $admission->exam_ecg->findings : 'Normal'  }}</span>
                                                </td>
                                                <td valign="top">
                                                    @if($admission->exam_ecg->ecg == 'Significant Findings' && $admission->exam_ecg->recommendation)
                                                        <b>ECG:</b>
                                                    @endif
                                                   {{ $admission->exam_ecg->ecg == 'Significant Findings' && $admission->exam_ecg->recommendation ? $admission->exam_ecg->recommendation : ''  }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    <?php $drag_count = 1; ?>
                                    @foreach($results as $key => $result)
                                        <tr style="height:40px">
                                            <td valign="top">{{ $key_record > 0 && $loop->first ? date_format(new DateTime($record->date), "d F Y") : null }}</td>
                                            <td valign="top"  class="drag">
                                                <div class="drag" draggable="true" id="cell-findings-{{ $key }}">
                                                    @php echo nl2br($result['Findings']) @endphp
                                                </div>
                                            </td>

                                            <td valign="top" class="drag">
                                                <div class="drag" draggable="true" id="cell-recommendation-{{ $key }}">
                                                    @if(isset($result['Recommendation']))
                                                        @if(!preg_match('/X Ray:/i', $result['Recommendation']))
                                                            @php echo nl2br($result['Recommendation']) @endphp
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td>{{ date_format(new DateTime($admission->trans_date), "d F Y") }}</td>
                                        <td>
                                            <b>Past Med History:</b>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td valign="top">
                                            @if($admission->exam_physical)
                                                <b>{{ $admission->exam_physical->past_peme ? $admission->exam_physical->past_peme : "." }}</b>
                                            @endif
                                        </td>
                                        <td valign="top">
                                            @if($admission->exam_physical)
                                                <b>{{ $admission->exam_physical->past_peme_recommendation ? $admission->exam_physical->past_peme_recommendation : "." }}</b>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b>Height:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->height }} cm</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b>Weight:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->weight }} kg</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b>BMI:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->bmi }}</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b>BP:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->systollic }}/{{ optional($admission->exam_physical)->diastollic }}</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b>PR:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->pulse }}/min</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b>RR:</b> <span style="margin-left: 10px;">{{ optional($admission->exam_physical)->respiration }}/min</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @if($admission->exam_xray)
                                        @if($admission->exam_xray->chest_remarks_status)
                                            <tr>
                                                <td valign="top"></td>
                                                <td valign="top">
                                                    <b>Chest Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->chest_remarks_status == 'normal' ? 'Normal' : $admission->exam_xray->chest_findings }}</span>
                                                </td>
                                                <td valign="top">
                                                    @if($admission->exam_xray->chest_remarks_status == 'findings' && $admission->exam_xray->chest_recommendations)
                                                        <b>Chest Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->chest_remarks_status == 'findings' ? $admission->exam_xray->chest_recommendations : null }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif

                                    @if($admission->exam_xray)
                                        @if($admission->exam_xray->lumbosacral_remarks_status)
                                            <tr>
                                                <td valign="top"></td>
                                                <td valign="top">
                                                    <b>Lumbosacral XRAY:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->lumbosacral_remarks_status == 'normal' ? 'Normal' : $admission->exam_xray->lumbosacral_findings  }}</span>
                                                </td>
                                                <td valign="top">
                                                    @if($admission->exam_xray->lumbosacral_remarks_status == 'findings' && $admission->exam_xray->lumbosacral_recommendations)
                                                        <b>Lumbosacral Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->lumbosacral_remarks_status == 'findings' ? $admission->exam_xray->lumbosacral_recommendations : null }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif

                                    @if($admission->exam_xray)
                                        @if($admission->exam_xray->knees_remarks_status)
                                            <tr>
                                                <td valign="top"></td>
                                                <td valign="top">
                                                    <b>Knee:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->knees_remarks_status == 'normal' ? 'Normal' : $admission->exam_xray->knees_findings  }}</span>
                                                </td>
                                                <td valign="top">
                                                    @if($admission->exam_xray->knees_remarks_status == 'findings' && $admission->exam_xray->knees_recommendations)
                                                        <b>Knee Xray:</b> <span style="margin-left: 10px;">{{ $admission->exam_xray->knees_remarks_status == 'findings' ? $admission->exam_xray->knees_recommendations : null }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif

                                    @if($admission->exam_ecg)
                                        <tr>
                                            <td valign="top"></td>
                                            <td valign="top">
                                                <b>ECG:</b> <span style="margin-left: 10px;">{{ $admission->exam_ecg->ecg == 'Significant Findings' ? $admission->exam_ecg->findings : 'Normal'  }}</span>
                                            </td>
                                            <td valign="top">
                                                <b>
                                                    @if($admission->exam_ecg->ecg == 'Significant Findings' && $admission->exam_ecg->recommendation)
                                                        ECG:
                                                    @endif
                                                </b> {{ $admission->exam_ecg->ecg == 'Significant Findings' && $admission->exam_ecg->recommendation ? $admission->exam_ecg->recommendation : ''  }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforelse
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
    <div style="height: 100vh; margin: 0;">
        <table valign="top" width="100%" cellspacing="0" cellpadding="0" id="table" class="brdNone second-table">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="10" class="brdNone">
                            <tbody>
                                <tr>
                                    <td width="7%" rowspan="5" align="center"><img src="../../../app-assets/images/logo/logo.jpg" width="80" height="80" alt=""></td>
                                    <td width="73%" align="center">
                                        <span style="font-size: 25px; font-weight: 800;">MERITA DIAGNOSTIC CLINIC INC.</span> <br>
                                        <span>5th &amp; 6th Flr Jettac Bldg., 920 Quirino Ave. Cor. San Antonio St. Malate, Manila</span>
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
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start;  width: 100%;">
                                            <div style="width: 15%;">Name :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 85%;">{{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}} </div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div style="display: flex; align-items: flex-stendart; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Age :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%; text-align: center;">{{$patient->age}}</div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Sex :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">{{$patient->gender}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 35%;">Patient ID :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 65%;">{{$patient->patientcode}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">PEME :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">{{date_format(new DateTime($patient->admission->trans_date), "d F Y")}}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 30%;">Position :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 70%;">{{$patient->position_applied}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 15%;">Agency :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 85%;">{{$patient->agencyname}}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Vessel :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">{{$patient->admission->vesselname}}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 15%;">Package :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 85%;">{{$patient->admission->package->packagename}}</div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div style="display: flex; align-items: flex-end; justify-content: flex-start; width: 100%;">
                                            <div style="width: 25%;">Principal :</div>
                                            <div class="fontBoldLrg" style="border-bottom: 1px solid #000; width: 75%;">{{$patient->admission->principal}}</div>
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
                                    <td style="display: none; text-align: left;">{{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}}</td>
                                    <td style="display: none; text-align: left;">Agency : {{$patient->agencyname}}</td>

                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">Patient ID : </td>
                                    <td style="display: none; text-align: left;">{{$patient->patientcode}}</td>
                                    <td style="display: none; text-align: left;">Package : {{$patient->admission->package->packagename}}</td>

                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">Position :</td>
                                    <td style="display: none; text-align: left;">{{$patient->position_applied}}</td>
                                    <td style="display: none; text-align: left;">Vessel : {{$patient->admission->vesselname}}</td>
                                </tr>
                                <tr>
                                    <td style="display: none; text-align: left;">PEME : </td>
                                    <td style="display: none; text-align: left;">{{date_format(new DateTime($patient->admission->trans_date), "d F Y")}}</td>
                                    <td style="display: none; text-align: left;">Principal : {{$patient->admission->principal}}</td>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script>
        let url_string = location.href;
        let url = new URL(url_string);
        var action = url.searchParams.get("action");
        window.addEventListener('load', () => {
            if(action == "print") {
                window.print();
            } else {
                $(document).ready(function () {
                    // let table = document.querySelector('.findings-table');
                    // table.style.border = 'solid 2px black';
                    $(".findings-table").table2excel({
                        filename: "FollowUpForm {{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}}"
                    });
                });
                window.close();
                var data = [];
            	var rows = document.querySelectorAll(".findings-table tr");
                var secondRows = document.querySelectorAll(".second-findings-table tr");
            	for (var i = 0; i < rows.length; i++) {
            		var row = [], cols = rows[i].querySelectorAll("td, th");
            		for (var j = 0; j < cols.length; j++) {
            		        let col = cols[j].innerText.replace(/,|\n/g, " ")
            		        row.push(col);
                    }
            		data.push(row.join(","));
                }
            //     for (var i = 0; i < secondRows.length; i++) {
            // 		var row = [], cols = secondRows[i].querySelectorAll("td, th");
            // 		for (var j = 0; j < cols.length; j++) {
            // 		        let col = cols[j].innerText.replace(/,|\n/g, " ")
            // 		        row.push(col);
            //         }
            // 		data.push(row.join(","));
            // 	}
                let title = "FOLLOW UP FORM ({{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}})"
            	downloadCSVFile(data.join("\n"), title);
            	window.close();
            }
        });

        function downloadCSVFile(csv, filename) {
            var csv_file, download_link;

            csv_file = new Blob([csv], {type: "text/csv"});

            download_link = document.createElement("a");

            download_link.download = filename;

            download_link.href = window.URL.createObjectURL(csv_file);

            download_link.style.display = "none";

            document.body.appendChild(download_link);

            download_link.click();
        }

        if(action == 'print') {
            let screenHeight = screen.height;
            let maximumSize = [1250, 1220];
            let secondMaxSize = 1230;
            let mainTable = document.querySelector('.main-table');
            let tableTbody = document.querySelector('.findings-table').children[0];

            let drag_count = 10;

            while(mainTable.clientHeight <= maximumSize[mainTable.clientHeight > 850 ? 1 : 0]) {

                let tr = document.createElement('tr');
                tr.innerHTML = `<tr>
                                    <td valign="top"><div>&nbsp;</div></td>
                                    <td valign="top" class="drag"><div class="drag" draggable="true" id="cell-findings-${drag_count}"></div></td>
                                    <td valign="top" class="drag"><div class="drag" draggable="true" id="cell-recommendation-${drag_count}"></div></td>
                                </tr>`;
                tableTbody.append(tr);
                if(mainTable.clientHeight > maximumSize) {
                    mainTable.style.overflow = 'hidden';
                }

            }

            let secondTable = document.querySelector('.second-table');
            let secondTableTbody = document.querySelector('.second-findings-table').children[0];
            while(secondTable.clientHeight <= secondMaxSize) {
                let tr = document.createElement('tr');
                tr.innerHTML = `<tr>
                                    <td><div>&nbsp;</div></td>
                                    <td><div>&nbsp;</div></td>
                                    <td><div>&nbsp;</div></td>
                                </tr>`;
                if(secondTable.clientHeight <= secondMaxSize) {
                    secondTableTbody.append(tr);
                }
            }
        }

    </script>

    <script type="text/javascript">
        // Get all the data cells in the table
        var cells = document.querySelectorAll('.drag');
        // Loop through each cell and add event listeners for drag and drop
        for (var i = 0; i < cells.length; i++) {
        cells[i].addEventListener('dragstart', drag);
        cells[i].addEventListener('dragover', allowDrop);
        cells[i].addEventListener('drop', drop);
        }

        function drag(event) {
        // Set the data being dragged to the ID of the cell being dragged
        event.dataTransfer.setData('text', event.target.id);
        // Add a class to the cell being dragged for visual feedback
        event.target.classList.add('dragging');
        }

        function drop(event) {
        // Prevent the default behavior of the browser when dragging and dropping
        event.preventDefault();

        // Get the ID of the cell being dropped
        var data = event.dataTransfer.getData('text');

        // Move the cell being dragged to the new location
        event.target.appendChild(document.getElementById(data));

        // Remove the dragging class from the cell being dragged
        document.getElementById(data).classList.remove('dragging');
        }

        function allowDrop(event) {
        // Prevent the default behavior of the browser when dragging and dropping
        event.preventDefault();
        }

    </script>
</body>
</html>
