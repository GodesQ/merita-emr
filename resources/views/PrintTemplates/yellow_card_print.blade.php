<html>

<head>
    <title>VACCINATION RECORD</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    * {
        font-size: 14px;
        font-family: sans-serif;
    }

    @page {
        size: legal landscape;
        margin: 0;
    }
    </style>
</head>
<body style="background-color: rgb(255,210,24); padding: 1rem 3rem;">
        <table width="100%" cellspacing="0" cellpadding="10">
            <tbody>
                <tr>
                    <td align="center">
                        <table width="100%" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <span style="font-size: 20px; font-weight: 700;">INTERNATIONAL CERTIFICATE OF VACCINATION <br> OR PROPHYLAXIS</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; align-items:flex-end;justify-content:flex-start; margin-top: 1rem;">
                            <div style="font-size: 14px; width: 11%;">This is to certify that</div>
                            <div style="padding-left: 1rem; border-bottom: 1px solid black; font-size: 15px; width:45%;">{{$patient->lastname}}, {{$patient->firstname}} {{$patient->middlename}}</div>
                            <div style="font-size: 14px; width:7%;">Date of Birth</div>
                            <div style="font-size: 14px; width:25%;padding-left: 1rem; border-bottom: 1px solid black;">{{date_format(new DateTime($patient->birthdate), "F d, Y")}}</div>
                            <div style="font-size: 14px; width:3%;">Sex</div>
                            <div style="font-size: 14px; width:10%;padding-left: 1rem; border-bottom: 1px solid black;">{{$patient->gender}}</div>
                        </div>
                        <div style="display: flex; align-items:flex-end;justify-content:flex-start; margin-top: 1rem;">
                            <div style="font-size: 14px; width: 6%;">Nationality</div>
                            <div style="padding-left: 1rem; border-bottom: 1px solid black; font-size: 15px; width:25%;">{{$patient->nationality}}</div>
                            <div style="font-size: 14px; width:25%;">National identification document, if applicable</div>
                            <div style="font-size: 14px; width:45%;padding-left: 1rem; border-bottom: 1px solid black;"></div>
                        </div>
                        <div style="display: flex; align-items:flex-end;justify-content:flex-start; margin-top: 1rem;">
                            <div style="font-size: 14px; width: 14%;">whose signature follows</div>
                            <div style="padding-left: 1rem; border-bottom: 1px solid black; font-size: 15px; width:86%;"></div>
                        </div>
                        <div style="display: flex; align-items:flex-end;justify-content:flex-start; margin-top: 1rem;">
                            <div style="font-size: 14px; width: auto">has on the date indicated been vaccinated or received prophylaxis against</div>
                        </div>
                        <div style="display: flex; align-items:flex-end;justify-content:flex-start; margin-top: 1rem;">
                            <div style="font-size: 14px; width: 17%;">(name of disease or condition)</div>
                            <div style="padding-left: 1rem; border-bottom: 1px solid black; font-size: 15px; width:83%;"></div>
                        </div>
                        <div style="display: flex; align-items:flex-end;justify-content:flex-start; margin-top: 1rem;">
                            <div style="font-size: 14px; width: auto;">In accordance with the International Health Regulations</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing='0' cellpadding="10" class="brdTable">
                            <tbody>
                                <tr>
                                    <td width="17%" style="font-weight: 700;" align="center">Vaccine or <br> prophylaxis</td>
                                    <td width="13%" style="font-weight: 700;" align="center">Date</td>
                                    <td width="15%" style="font-weight: 700;" align="center">Signature and professional status <br> of supervising clinician</td>
                                    <td width="15%" style="font-weight: 700;" align="center">Manufacturer and batch  <br> No. of vaccine or prophylaxis</td>
                                    <td width="20%" style="font-weight: 700;" align="center">Certificate valid <br> from.....  Until......</td>
                                    <td width="20%" style="font-weight: 700;" align="center">Official Stamp of <br> administering centre</td>
                                </tr>
                                @php $count = 1; @endphp
                                @foreach($records as $record)
                                <tr>
                                    <td>{{$count++}}. <b style="text-transform: uppercase;">{{$record->vaccine}}</b></td>
                                    <td>{{$record->date}}</td>
                                    <td></td>
                                    <td>{{$record->manufacturer}}</td>
                                    <td>{{$record->cert_valid}}</td>
                                    <td>{{$record->official_stamp}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="font-size: 15px;">This certificate is valid only if the vaccine or prophylaxis used has been approved by the World Health Organization. <br> <br>
                            This certificate must be signed in the hand of the clinician, who shall be a medical practitioner or other authorized health worker, supervising the administration of
                            the vaccine or <br> prophylaxis. The certificate must also bear the official stamp of the administering center; however, this shall not be an accepted substitute for the signature. <br>
                            <br> Any amendment of this certificate, or erasure, or failure to complete any part of it, may render it invalid. <br> <br>
                            The validity of certificate shall extend until the date indicated for the particular vaccination or prophylaxis. The certificate shall be fully completed in English or in French. The
                            certificate may also be completed in another language on the same document, in addition to either English or French.
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <script>
            window.onload = function () {
                window.print();
            }
        </script>
</body>
</html>