<html>

<head>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    .lbl {
        font-weight: bold;
        font-size: 12px;
    }

    .val {
        font-size: 16px;
        margin-left: 5px;
    }

    .valSmall {
        font-size: 15px;
        margin-left: 5px;
    }

    table {
        font-family: times new roman;
        font-size: 9px;
    }

    .page {
        width: 100%;
        height: 300px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-row-gap: 20px;
    }

    .grid-item {
        padding: 0.8rem;
        border: 0.5px solid lightgray;
        height: 473px;
    }
    </style>
</head>

<body>
    <div class="grid-container">
        @if ($requests)
        @foreach ($requests as $request)
        <div class="grid-item">
            <table cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                    <tr>
                        <td>
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <h2 style="line-height: 5px">MERITA DIAGNOSTIC CLINIC INC.</h2>
                                            <h4 style="line-height: 5px">6th Flr Jettac Bldg. 920 Pres. Quirino Ave
                                            </h4>
                                            <h4 style="line-height: 5px">Malate, Manila, Phils</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="margin-top: 1rem;" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="60%"></td>
                                        <td width="40%">DATE: <span
                                                style="margin-left: 0.5rem; border-bottom: 1px solid black; padding-right: 1rem;">{{date("Y-m-d")}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellspacing="0" cellpadding="5">
                                <tbody>
                                    <tr>
                                        <td width="55%">NAME: <span
                                                style="border-bottom: 1px solid black; padding-right: 2rem;">{{$patient->firstname}}
                                                {{$patient->lastname}}</span>
                                        </td>
                                        <td width="20%">AGE: <span
                                                style="border-bottom: 1px solid black; padding-right: 1rem;">{{$patient->age}}</span>
                                        </td>
                                        <td width="25%">SEX: <span
                                                style="border-bottom: 1px solid black; padding-right: 1rem;">{{$patient->gender}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            AGENCY <span
                                                style="border-bottom: 1px solid black; padding-right: 2rem;">{{$patientInfo->agencyname}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h2 style="margin-top: 1rem;">{{$request["title"]}}</h2>
                                <div>
                                    @foreach ($request["exams"] as $exam)
                                    <h4 style="margin: 0.3rem; font-weight: 400;">{{$exam->examname}}</h4>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
        @else
        <div class=""><b>NO REQUESTS FOUND</b></div>
        @endif
    </div>
</body>

</html>