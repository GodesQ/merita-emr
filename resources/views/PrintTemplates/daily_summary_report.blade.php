<html>

<head>
    <title>DAILY PATIENT</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    * {
        font-size: 15px;
    }

    body {
        -webkit-print-color-adjust:exact !important;
        print-color-adjust:exact !important;
    }

    @page {
        size: landscape legal;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <center>
        <table  width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td align="center">
                        <div style="font-size: 20px; font-weight: bold;">DAILY SUMMARY REPORT</div>
                        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">{{ $agency->agencyname }}</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" class="brdTable" cellspacing="0" cellpadding="5">
                            <thead style="background: rgb(26, 163, 26) !important;">
                                <tr>
                                    <td width="2%"><b>NO.</b></td>
                                    <td width="6%"><b>PEME Date</b></td>
                                    <td width="6%"><b>Surname</b></td>
                                    <td width="8%"><b>First Name</b></td>
                                    <td width="6%"><b>Middle Name</b></td>
                                    <td width="6%"><b>Age</b></td>
                                    <td width="6%"><b>Position</b></td>
                                    <td width="1%"><b>Findings</b></td>
                                    <td width="6%"><b>Recommendation</b></td>
                                    <td width="3%"><b>Remarks</b></td>
                                </tr>  
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @if(count($admissions) > 0)
                                    @foreach ($admissions as $key => $admission)
                                        @php
                                            $results = [];
                                            $findings = explode(";", optional($admission->followup)->findings);
                                            $results = array_map(function ($finding) {
                                                return ['Findings' => $finding];
                                                }, $findings);
                                            $recommendations = explode(";",optional($admission->followup)->remarks);
                                            foreach($recommendations as $key => $recommendation) {
                                                if(isset($results[$key])) {
                                                    $results[$key] += ['Recommendation' => $recommendation];
                                                }
                                            }
                                        @endphp

                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ Carbon::parse($admission->trans_date)->format('d-M-y') }}</td>
                                            <td>{{ $admission->patient->lastname ?? null }}</td>
                                            <td>{{ $admission->patient->firstname ?? null }}</td>
                                            <td>{{ $admission->patient->middlename ?? null }}</td>
                                            <td>{{ $admission->patient->age ?? null }}</td>
                                            <td>{{ $admission->position }}</td>
                                            <td>
                                                @forelse ($results as $key => $result)
                                                    @isset($result['Findings'])
                                                        @if(!preg_match('/Hepatitis:/i', $result['Findings']))
                                                            {!! $result['Findings'] !!} <br>
                                                        @endif
                                                    @endisset
                                                @empty
                                                @endforelse
                                            </td>
                                            <td>
                                                @forelse ($results as $key => $result)
                                                    @isset($result['Recommendation'])
                                                        {!! $result['Recommendation'] !!} <br>
                                                    @endisset
                                                @empty
                                                @endforelse
                                            </td>
                                            <td>
                                                <?php $pe_status = null; ?>
                                                @if($admission->exam_physical)
                                                    <?php
                                                        $pe_status = null;
                                                        if($admission->exam_physical->fit == 'Fit') {
                                                            $pe_status = 'Fit to Work';
                                                        } else if($admission->exam_physical->fit == 'Unfit') {
                                                            $pe_status = 'Unfit to Work';
                                                        } else if($admission->exam_physical->fit == 'Unfit_temp') {
                                                            $pe_status = 'Unfit Temporarily';
                                                        } else {
                                                            $pe_status = 'Pending';
                                                        }
                                                    ?>
                                                @endif
                                                {{ $pe_status }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>

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

            	downloadCSVFile(data.join("\n"), 'daily-transmittal-report - ' + "{{ $agency->agencyname }}");
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