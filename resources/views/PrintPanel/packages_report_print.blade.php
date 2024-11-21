<html>

<head>
    <title>PACKAGES REPORT</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        * {
            font-size: 11.5px;
            font-family: Arial, Helvetica, sans-serif;
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

        @page {
            size: landscape legal;
            margin: 1rem;
        }

        td {
            padding: 0.8rem;
            text-align: left;
            text-transform: unset !important;
        }

        th {
            font-weight: bold;
            font-size: 12px !important;
            padding: 10px;
        }
    </style>
</head>

<body>
    <table width="1400" border="0" cellpadding="2" cellspacing="2">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="0" cellspacing="5">
                    <tbody>
                        <tr>
                            <td
                                style="font-size: 35px; color: #244681; font-weight: bold; text-transform: uppercase !important;">
                                PEME REGISTER MONTH: {{ $month }}</td>

                        </tr>
                        <tr>
                            <td style="font-size: 35px; color: #244681; font-weight: bold;">Clinic Name : MERITA
                                DIAGNOSTIC CLINIC INC.</td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="brdTable">
                    <thead>
                        <tr style="text-transform: uppercase !important;">
                            <th>Date</th>
                            <th>Hologram Number</th>
                            <th>Full Name</th>
                            <th>DOB</th>
                            <th>Passport Number</th>
                            <th>M/Agent</th>
                            <th>Principal</th>
                            <th>P/F</th>
                            <th>Vessel</th>
                            <th>Position</th>
                            <th>Medical Packages</th>
                            {{-- <th>Package</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ date_format(new DateTime($patient->trans_date), 'F d, Y') }}</td>
                                <td>{{ optional($patient->exam_physical)->progressive_notes }}</td>
                                <td>{{ optional($patient->patient)->lastname . ', ' . optional($patient->patient)->firstname }}
                                </td>
                                <td>{{ date_format(new DateTime(optional(optional($patient->patient)->patientinfo)->birthdate), 'd-M-Y') }}
                                </td>
                                <td width="5%">{{ optional(optional($patient->patient)->patientinfo)->passportno }}
                                </td>
                                <td>{{ optional($patient->agency)->agencyname }}</td>
                                <td width="15%">{{ $patient->principal }}</td>
                                <td>
                                    @if ($patient->exam_physical)
                                        @if ($patient->exam_physical->fit == 'Fit')
                                            <b>P</b>
                                        @elseif($patient->exam_physical->fit == 'Unfit')
                                            <b>F</b>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{ optional(optional($patient->patient)->patientinfo)->vessel }}
                                </td>
                                <td>{{ $patient->position }}</td>
                                <td>{{ $patient->package->packagename ?? '' }}</td>
                                {{-- <td>{{ $patient->package->packagename }}</td> --}}
                            </tr>
                        @empty
                            <td colspan="11" align="center">
                                <div style="font-size: 20px; text-align: center; text-transfrom: uppercase !important;">
                                    NO RECORD FOUND FOR THE FOLLOWING QUERY: PACKAGES, DATES
                                </div>
                            </td>
                        @endforelse
                        <tr>

                        </tr>
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
            if (action == "PRINT") {
                window.print();
            } else {
                var data = [];
                var rows = document.querySelectorAll(".brdTable tr");

                for (var i = 0; i < rows.length; i++) {
                    var row = [],
                        cols = rows[i].querySelectorAll("td, th");
                    for (var j = 0; j < cols.length; j++) {
                        let col = cols[j].innerText.replace(/,|\n/g, " ")
                        row.push(col);
                    }
                    data.push(row.join(","));
                }

                downloadCSVFile(data.join("\n"), 'patients_packages_report');

                // window.close();
            }
        });

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
