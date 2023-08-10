<html>

<head>
    <title>TRANSMITTAL</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    * {
        font-size: 11.5px;
    }

    @page {
        size: landscape legal;
        margin: 1rem;
    }
    td {
        padding: 0.3rem;
        text-align: left;
    }

    </style>
</head>

<body>
    <table width="1400" border="0" cellpadding="2" cellspacing="2">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="11%" rowspan="2" align="left"><img src="../../../app-assets/images/logo/logo.jpg"
                                width="116" height="104" alt="" /></td>
                        <td align="left"><b style="font-size: 20px">

                            </b></td>
                    </tr>
                    <tr>
                        <td width="89%" align="left" valign="top">
                            <br />Tel. No. :<br><br>
                            <span style="font-size:9px;">Date Printed: {{date("Y-m-d")}}</span>
                        </td>
                        <!--<td width="89%" align="center" valign="top">-->
                        <!--    <span class="lblCompName" style="font-size: 30px; font-weight: 800;font-family: serif; color: #156f29">MERITA DIAGNOSTIC CLINIC INC.</span><br style="margin-bottom: 20px">-->
                        <!--    <div style="color: #156f29; font-size: 10px;">5th Flr Jettac Building., #920 Pres. Quirino Ave.-->
                        <!--            corner San Antonio St. Malate, Manila, Philippines<br>-->
                        <!--                Tel Nos.: (632) 8404-3411 / (633) 7003-0403 * Cell No.: +63917 857-6942 / +63908 890-8850<br>-->
                        <!--                Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>-->
                        <!--                Accredited: DOH (RLS 13-026-2123-MF-2) &#8226; POEA &#8226; MARINA Global Group ISO 9001:2015<br>Skuld-->
                        <!--                P&amp;I &#8226; West of England P&amp;I &#8226; Oil &amp; Gas UK &#8226; Panama Maritime Authority </div>-->
                        <!--</td>-->
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <hr />
                        </td>
                    </tr>
                    <tr>
                        <td height="40" colspan="2" valign="top">
                            <span style="font-weight:bold; font-size:22px">TRANSMITTAL REPORT</span>
                            <span style="margin-left:100px; font-size:16px"><b>Period:</b> {{ date_format(new DateTime($from_date), 'F d, Y') }} - {{ date_format(new DateTime($to_date), 'F d, Y') }}</span>
                            <span style="margin-left:100px; font-size:16px"><b>Agency:</b>
                                {{$agency ? $agency->agencyname : 'All'}}
                            </span>
                            <span style="margin-left:100px; font-size:16px"><b>Patient Status:</b>
                                {{$patientstatus ? $patientstatus : 'All'}}</span>
                        </td>
                    </tr>
                </table>
                <table width="100%" border="0" cellspacing="3" cellpadding="5" class="brdTable">
                    <tbody>
                        <tr>
                            <td width="1%" bgcolor="#C0C0C0" class="brdBtm"><b>No.</b></td>
                            <td width="1%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Adm.ID</b></td>
                            <td width="3%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>PEME Date</b></td>
                            <td width="3%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Surname</b></td>
                            <td width="4%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>First Name</b></td>
                            <td width="3%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Middle Name</b></td>
                            <td width="1%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Age</b></td>
                            <td width="4%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Position</b></td>
                            <td width="5%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Findings</b></td>
                            <td width="5%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Recommendation</b></td>
                            <td width="2%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Remarks</b></td>
                            @if(in_array("vital_signs", $additional_columns))
                                <td width="10%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Vital Signs</b></td>
                            @endif
                            @if(in_array("bmi", $additional_columns))
                                <td bgcolor="#C0C0C0" class="brdLeftBtm">BMI</td>
                            @endif
                            <td width="3%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Follow up Date</b></td>
                            @if(in_array("vessel", $additional_columns))
                                <td width="5%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Vessel</b></td>
                            @endif
                            @if(in_array("emp_status", $additional_columns))
                                <td width="5%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Emp. Status</b></td>
                            @endif
                            @if(in_array("medical_package", $additional_columns))
                                <td width="11%" bgcolor="#C0C0C0" class="brdLeftBtm"><b>Med. Pckg.</b></td>
                            @endif
                        </tr>
                        @php
                            $count = 1;
                        @endphp
                        @if (count($patients) != 0)

                        @foreach ($patients as $key => $patient)
                            @php
                                $results = [];
                                $findings = explode(";", optional($patient->followup)->findings);
                                $results = array_map(function ($finding) {
                                    return ['Findings' => $finding];
                                    }, $findings);
                                $recommendations = explode(";",optional($patient->followup)->remarks);
                                foreach($recommendations as $key => $recommendation) {
                                    if(isset($results[$key])) {
                                        $results[$key] += ['Recommendation' => $recommendation];
                                    }
                                }
                            @endphp

                            <tr>
                                <td align="left">{{$count++}}</td>
                                <td align="left">{{$patient->patientcode}}</td>
                                <td align="left">
                                    @if($patient->followups)
                                        @if(count($patient->followups) > 1)
                                            <?php $latest_followup = $patient->followups[count($patient->followups) - 1] ?>
                                            {{ date_format(new DateTime($latest_followup->date), "d F Y") }}
                                        @else
                                            {{ date_format(new DateTime($patient->trans_date), "d F Y") }}
                                        @endif
                                    @endif
                                </td>
                                <td align="left">{{$patient->patient ? $patient->patient->lastname . " " . $patient->patient->suffix : null}}</td>
                                <td align="left">{{$patient->patient ? $patient->patient->firstname : null}}</td>
                                <td align="left">{{$patient->patient ? $patient->patient->middlename : null}}</td>
                                <td align="left">{{$patient->patient ? $patient->patient->age : null}}</td>
                                <td align="left">{{$patient->position}}</td>
                                <td align="left" valign="top">
                                    {{  count($results) > 0 ? $results[0]['Findings'] : null }}
                                </td>
                                <td align="left" valign="top">
                                    {{ count($results) > 0 ? $results[0]['Recommendation'] : null }}
                                </td>
                                <td align="left" valign="top">
                                    <?php
                                        if($patient->lab_status  == '3') {
                                            $status = 'Unfit';
                                        } else if($patient->lab_status  == '2') {
                                            $status = 'Fit';
                                        } else if($patient->lab_status  == '4') {
                                            $status = 'Unfit Temporarily';
                                        } else if($patient->lab_status  == '1') {
                                            $status = 'Pending';
                                        } else {
                                            $status = '';
                                        }
                                    ?>
                                    <?php $pe_status = null; ?>
                                    @if($patient->exam_physical)
                                        <?php
                                            $pe_status = null;
                                            if($patient->exam_physical->fit == 'Fit') {
                                                $pe_status = 'Fit to Work';
                                            } else if($patient->exam_physical->fit == 'Unfit') {
                                                $pe_status = 'Unfit to Work';
                                            } else {
                                                $pe_status = 'Pending';
                                            }
                                        ?>
                                    @endif
                                    <div style="text-align: center">
                                        {{$pe_status}} <br>
                                        <b>{{ $pe_status == 'Fit to Work' ? '(' . date_format(new DateTime($patient->patient->fit_to_work_date), 'M d, Y') . ')' : null }}</b>
                                    </div>
                                </td>
                                @if(in_array("vital_signs", $additional_columns))
                                    <td align="left">
                                        <b>Height: </b>{{$patient->exam_physical ? $patient->exam_physical->height : 0}} <br>
                                        <b>Weight: </b>{{$patient->exam_physical ? $patient->exam_physical->weight : 0}}
                                    </td>
                                @endif
                                @if(in_array("bmi", $additional_columns))
                                    <td align="left">
                                        <b>BMI: </b>
                                        @if($patient->exam_physical)
                                            @if($patient->exam_physical->height && $patient->exam_physical->weight)
                                                @php
                                                    $bmi = ($patient->exam_physical->weight / $patient->exam_physical->height / $patient->exam_physical->height) * 10000;
                                                @endphp
                                                {{number_format($bmi, 2)}}
                                            @else
                                                0
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                <td align="left">
                                    @if($patient->followups)
                                        @forelse ($patient->followups as $followup)
                                            @if($loop->first)
                                                <span style="margin: 5px 0;">{{ date_format(new DateTime($patient->trans_date), 'F d, Y') }}</span>
                                            @else
                                                <span style="margin: 5px 0;">{{ date_format(new DateTime($followup->date), 'F d, Y') }}</span>
                                            @endif
                                        @empty
                                        @endforelse
                                    @endif
                                </td>
                                @if(in_array("vessel", $additional_columns))
                                    <td align="left">{{$patient->vesselname}}</td>
                                @endif

                                @if(in_array("emp_status", $additional_columns))
                                    <td align="left">{{$patient->emp_status}}</td>
                                @endif

                                @if(in_array("medical_package", $additional_columns))
                                    <td align="left">
                                        @if($patient->package)
                                            @if($patient->package->packagename == 'SKULD PACKAGE' || $patient->package->id == 3)
                                                SKULD
                                            @else
                                                {{ $patient->package->packagename }}
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            </tr>

                            @forelse ($results as $key => $result)
                                @if($key != 0)
                                    <tr>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left" valign="top">
                                            @isset($result['Findings'])
                                                {{ $result['Findings'] }}
                                            @endisset
                                        </td>
                                        <td align="left" valign="top">
                                            @isset($result['Recommendation'])
                                                {{ $result['Recommendation'] }}
                                            @endisset
                                        </td>
                                        <td align="left" valign="top"></td>
                                        @if(in_array("vital_signs", $additional_columns))
                                            <td align="left"></td>
                                        @endif
                                        @if(in_array("bmi", $additional_columns))
                                            <td align="left"></td>
                                        @endif
                                        <td align="left">

                                        </td>
                                        @if(in_array("vessel", $additional_columns))
                                            <td align="left"></td>
                                        @endif

                                        @if(in_array("emp_status", $additional_columns))
                                            <td align="left">{{$patient->emp_status}}</td>
                                        @endif

                                        @if(in_array("medical_package", $additional_columns))
                                            <td align="left"></td>
                                        @endif
                                    </tr>
                                @endif
                            @empty

                            @endforelse

                            @if (optional($patient->exam_xray)->lumbosacral_findings || optional($patient->exam_xray)->lumbosacral_recommendations)
                            <tr>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->lumbosacral_findings) <b>Lumbosacral Xray:</b> @endif {{ optional($patient->exam_xray)->lumbosacral_findings }}
                                </td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->lumbosacral_recommendations) <b>Lumbosacral Xray:</b> @endif {{ optional($patient->exam_xray)->lumbosacral_recommendations }}
                                </td>
                                <td align="left" valign="top"></td>
                                @if(in_array("vital_signs", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                @if(in_array("bmi", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                <td align="left">

                                </td>
                                @if(in_array("vessel", $additional_columns))
                                    <td align="left"></td>
                                @endif

                                @if(in_array("emp_status", $additional_columns))
                                    <td align="left">{{$patient->emp_status}}</td>
                                @endif

                                @if(in_array("medical_package", $additional_columns))
                                    <td align="left"></td>
                                @endif
                            </tr>
                        @endif

                        @if (optional($patient->exam_xray)->chest_findings || optional($patient->exam_xray)->chest_recommendations)
                            <tr>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->chest_findings)<b>Chest Xray:</b>@endif {{ optional($patient->exam_xray)->chest_findings }}
                                </td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->chest_recommendations)<b>Chest Xray:</b>@endif {{ optional($patient->exam_xray)->chest_recommendations }}
                                </td>
                                <td align="left" valign="top"></td>
                                @if(in_array("vital_signs", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                @if(in_array("bmi", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                <td align="left">

                                </td>
                                @if(in_array("vessel", $additional_columns))
                                    <td align="left"></td>
                                @endif

                                @if(in_array("emp_status", $additional_columns))
                                    <td align="left">{{$patient->emp_status}}</td>
                                @endif

                                @if(in_array("medical_package", $additional_columns))
                                    <td align="left"></td>
                                @endif
                            </tr>
                        @endif

                        @if (optional($patient->exam_xray)->knees_findings || optional($patient->exam_xray)->knees_recommendations)
                            <tr>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->knees_findings)<b>Knees Xray:</b>@endif {{ optional($patient->exam_xray)->knees_findings }}
                                </td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->knees_recommendations)<b>Knees Xray:</b>@endif {{ optional($patient->exam_xray)->knees_recommendations }}
                                </td>
                                <td align="left" valign="top"></td>
                                @if(in_array("vital_signs", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                @if(in_array("bmi", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                <td align="left">

                                </td>
                                @if(in_array("vessel", $additional_columns))
                                    <td align="left"></td>
                                @endif

                                @if(in_array("emp_status", $additional_columns))
                                    <td align="left">{{$patient->emp_status}}</td>
                                @endif

                                @if(in_array("medical_package", $additional_columns))
                                    <td align="left"></td>
                                @endif
                            </tr>
                        @endif

                        @if (optional($patient->exam_xray)->skull_findings || optional($patient->exam_xray)->skull_recommendations)
                            <tr>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left"></td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->knees_findings)<b>Skull Xray:</b>@endif {{ optional($patient->exam_xray)->skull_findings }}
                                </td>
                                <td align="left" valign="top">
                                    @if(optional($patient->exam_xray)->skull_recommendations)<b>Skull Xray:</b>@endif {{ optional($patient->exam_xray)->skull_recommendations }}
                                </td>
                                <td align="left" valign="top"></td>
                                @if(in_array("vital_signs", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                @if(in_array("bmi", $additional_columns))
                                    <td align="left"></td>
                                @endif
                                <td align="left">

                                </td>
                                @if(in_array("vessel", $additional_columns))
                                    <td align="left"></td>
                                @endif

                                @if(in_array("emp_status", $additional_columns))
                                    <td align="left">{{$patient->emp_status}}</td>
                                @endif

                                @if(in_array("medical_package", $additional_columns))
                                    <td align="left"></td>
                                @endif
                            </tr>
                        @endif

                        @endforeach
                        @else
                        <tr>
                            <td colspan="16" align="center">No Record Found</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <script>
        window.addEventListener('load', () => {
            let url_string = location.href;
            let url = new URL(url_string);
            var action = url.searchParams.get("action");
            if(action == "PRINT") {
                window.print();
            }else {
                var data = [];
            	var rows = document.querySelectorAll(".brdTable tr");

            	for (var i = 0; i < rows.length; i++) {
            		var row = [], cols = rows[i].querySelectorAll("td, th");
            		for (var j = 0; j < cols.length; j++) {
            		        let col = cols[j].innerText.replace(/,|\n/g, " ")
            		        row.push(col);
                    }
            		data.push(row.join(","));
            	}

            	downloadCSVFile(data.join("\n"), 'transmittal_report');
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
    </script>
</body>

</html>
