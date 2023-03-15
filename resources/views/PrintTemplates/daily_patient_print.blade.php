<html>

<head>
    <title>DAILY PATIENT</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    * {
        font-size: 10px;
        text-transform: uppercase;
    }

    @page {
        size: landscape legal;
        margin-top: 0;
    }
    </style>
</head>

<body>
    <center>
        <table class="brdAll" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td align="center">
                        <table class="brdNone" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td>
                                        <b style="font-size: 20px;">
                                            @php $created_at = new DateTime($from_date); 
                                                echo date_format($created_at,'F d, Y'); 
                                            @endphp - 
                                            @php $end_at = new DateTime($to_date); 
                                                echo date_format($end_at,'F d, Y'); 
                                            @endphp</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" class="brdTable" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td width="2%"><b>NO.</b></td>
                                    <td width="6%"><b>Date</b></td>
                                    <td width="6%"><b>Record NO.</b></td>
                                    <td width="8%"><b>AGENCY</b></td>
                                    <td width="6%"><b>FAMILY NAME</b></td>
                                    <td width="6%"><b>FIRST NAME</b></td>
                                    <td width="6%"><b>MIDDLE NAME</b></td>
                                    <td width="6%"><b>AGE/SEX</b></td>
                                    <td width="6%"><b>POSITION</b></td>
                                    <td width="1%"><b>PACKAGE</b></td>
                                    <td width="6%"><b>PRINCIPAL</b></td>
                                    <td width="3%"><b>ADDITIONAL TEST</b></td>
                                    <td width="6%"><b>VESSEL</b></td>
                                    <td width="6%"><b>LAST MEDICAL</b></td>
                                    <td width="8%"><b>BDAY</b></td>
                                    <td width="6%"><b>BILLED/PAID</b></td>
                                    <td width="6%"><b>REFERRAL NAME</b></td>
                                </tr>
                                @php $count = 1; @endphp
                                @if(count($patients) > 0)
                                    @foreach($patients as $today_patient)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{date_format(new DateTime($today_patient['trans_date']), "F d, Y")}}</td>
                                            <td>{{$today_patient['patientcode']}}</td>
                                            <td>{{$today_patient['agencyname']}}</td>
                                            <td>{{$today_patient['patient_lastname']}}</td>
                                            <td>{{$today_patient['patient_firstname']}}</td>
                                            <td>{{$today_patient['patient_middlename']}}</td>
                                            <td>{{$today_patient['patient_age'] ? $today_patient['patient_age'] : 0}}/{{$today_patient['patient_gender']}}</td>
                                            <td>{{$today_patient['position']}}</td>
                                            <td>{{$today_patient['packagename']}}</td>
                                            <td>{{$today_patient['principal']}}</td>
                                            <td>{{implode(", ",$today_patient['additional_tests'])}}</td>
                                            <td>{{$today_patient['vessel']}}</td>
                                            <td>{{$today_patient['last_medical']}}</td>
                                            <td>{{$today_patient['birthdate']}}</td>
                                            <td>{{$today_patient['payment_type']}}</td>
                                            <td>{{$today_patient['requestor']}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="20" align="center">No Record Found</td>
                                    </tr>
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
            		        let col = cols[j].innerText.replace(/,/g, " ");
            		        row.push(col);

                    }
            		        
            		data.push(row.join(",")); 	
            	}
            	
            // 	return console.log(data);
            
            	downloadCSVFile(data.join("\n"), 'daily_patients');
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