<html>

<head>
    <title>VANUATU</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
        body,
        table,
        tr,
        td {
            font-family: sans-serif;
            font-size: 12px;
        }

        .fontBoldLrg {
            font: bold 15px constantia;
        }

        .fontMed {
            font: normal 12px constantia;
        }

        #section-one-and-two-table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 2px;
            text-align: left;
        }

        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 15px;
        }

        input[type="checkbox"] {
            accent-color: black;
        }

        @media print {
            #page-one {
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <center>
        <div id="page-one">
            <table class="brdAll" width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td width="46%">
                            <div style="text-align: center; font-weight: bold;">
                                <div style="">Form Med1 B</div>
                                <br>
                                <div style="font-size: 18px;">PHYSICAL EXAMINATION REPORT / <br> CERTIFICATE</div>
                            </div>
                        </td>
                        <td width="7%">
                            <img src="{{ URL::asset('app-assets/images/logo/vanuatu-logo-sm.png') }}" width="100%"
                                alt="">
                        </td>
                        <td width="46%">
                            <div style="text-align: center; font-weight: bold;">
                                <div style="font-size: 18px;">REPUBLIC OF VANUATU</div>
                                <div style="font-size: 18px;">PORT VILA, VANUATU</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td>
                            <div style="font-size: 15px; font-weight: bold;">INSTRUCTIONS</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border: 1px solid black; width: 100%; padding: 3px 5px;">
                                <div>All applicants for a Vanuatu License or Seaman Identification Book shall be
                                    required to
                                    have
                                    a
                                    physical examination reported on the Vanuatu Medical Form MED1 by a licensed
                                    physician.
                                    The
                                    completed medical form must accompany the application for a License or Seaman’s
                                    Identity
                                    document. The physical examination must be carried out not more than one year prior
                                    to
                                    the
                                    date
                                    of making application. Such proof of examination must establish that the applicant
                                    is in
                                    satisfactory physical condition for the specific duty assignment undertaken and is
                                    generally
                                    in
                                    possession of all body faculties necessary in fulfilling the requirements of the
                                    seafaring
                                    profession. In addition, the following minimum requirements shall apply:</div>
                                <ol style="margin-left: -25px;">
                                    <li>All applicants must have hearing unimpaired for normal sounds.</li>
                                    <li>All applicants must have average blood pressure, taking age into consideration.
                                    </li>
                                    <li> Applicants afflicted with or having medical histories, including the following
                                        shall be
                                        disqualified for a license: <br>
                                        Epilepsy, insanity, senility, acute alcoholism, tuberculosis, acute venereal
                                        disease
                                        or neurosyphilis and/or use of narcotics.
                                    </li>
                                    <li>
                                        The undersigned consents to the release of all medical information and results
                                        of
                                        drug
                                        testing including any results obtained by the company Medical Review Officer or
                                        Manning
                                        Agency Medical Review Officer in any company-sponsored Drug Testing Consortium
                                        program
                                        pursuant to Vanuatu Maritime Bulletin No. 115 dated 1 June 2013 and any
                                        amendments
                                        thereto to Vanuatu Maritime Services, Ltd.
                                    </li>
                                </ol>
                                <div style="font-weight: bold;">
                                    THIS CERTIFICATE ISSUED BY THE AUTHORITY OF THE DEPUTY COMMISSIONER OF MARITIME
                                    AFFAIRS,
                                    THE REPUBLIC OF VANUATU AND IN COMPLIANCE WITH THE REQUIREMENTS OF THE MARITIME
                                    LABOR
                                    CONVENTION, 2006 FOR THE MEDICAL EXAMINATION OF SEAFARERS. THE MEDICAL CERTIFICATE
                                    SHALL
                                    BE VALID FOR NO MORE THAN TWO (2) YEARS FROM THE DATE OF THE EXAMINATION FOR THOSE
                                    OVER
                                    18 YEARS OF AGE AND FOR NO MORE THAN ONE (1) YEAR FOR THOSE UNDER 18 YEARS OF AGE.
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800" style="margin-bottom: 20px; border: none !important;" border="0">
                <tbody>
                    <tr>
                        <td style="padding: 0px !important;">
                            <div class="section-title">
                                <div>I. Particulars of the Applicant</div>
                            </div>
                            <table id="section-one-and-two-table" class="brdTable">
                                <tr>
                                    <td>Examination for Duty as (check one):
                                    </td>
                                    <td colspan="2"><input type="checkbox"> Master
                                        <input type="checkbox"> Navigating Officer
                                        <input type="checkbox"> Engineer
                                        <input type="checkbox"> Radio Officer
                                        <input type="checkbox" checked> Seaman
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Last / Family / Surname Name:
                                        <br>
                                        <b>{{ $admission->patient->lastname }}</b>
                                    </td>
                                    <td>
                                        First / Given Name:
                                        <br>
                                        <b>{{ $admission->patient->firstname }}</b>
                                    </td>
                                    <td>
                                        Middle Name:
                                        <br>
                                        <b>{{ $admission->patient->middlename }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Birth Date (MM/DD/YY):
                                        <br>
                                        <b>{{ \Carbon\Carbon::parse($admission->patient->patientinfo->birthdate)->format('Y-m-d') }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td colspan="2">Place of Birth (City & Country):
                                        <br>
                                        <b>{{ $admission->patient->patientinfo->birthplace ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </table>

                            <br>
                            <div class="section-title">
                                <div>II. General Medical Condition</div>
                            </div>
                            <table id="section-one-and-two-table" class="brdTable">
                                <tr>
                                    <td>
                                        Height:
                                        <br>
                                        <b>{{ $admission->exam_physical->height ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        Weight:
                                        <br>
                                        <b>{{ $admission->exam_physical->weight ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        Blood Pressure:
                                        <br>
                                        <b>{{ $admission->exam_physical->systollic ?? '' }} /
                                            {{ $admission->exam_physical->diastollic ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        Pulse:
                                        <br>
                                        <b>{{ $admission->exam_physical->pulse ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        Respiration:
                                        <br>
                                        <b>{{ $admission->exam_physical->respiration ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td colspan="2">
                                        General Appearance:
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" width="50%">Is the applicant suffering from any disease likely
                                        to
                                        be aggravated
                                        by or render him unfit for service at sea or endanger others on board?<br>
                                    </td>
                                    <td colspan="4"><input type="checkbox" checked> NO <input type="checkbox"> YES
                                        (If YES,
                                        enter
                                        details below)
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3" width="8%" valign="center">
                                        <h4 style="text-align: center;">Vision</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">
                                        Without Glasses <br> (Uncorrected)
                                    </td>
                                    <td width="15%">
                                        Right Eye
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td width="15%">
                                        Left Eye
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td width="15%">
                                        Without Glasses <br> (Corrected)
                                    </td>
                                    <td>
                                        Right Eye
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        Left Eye
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>

                                <tr>
                                    <td>Test Type:
                                    </td>
                                    <td colspan="10">
                                        <input type="checkbox" checked> Book
                                        <input type="checkbox"> Lantern Color
                                        Red <input type="checkbox"> Green <input type="checkbox"> Blue
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">HEARING </td>
                                    <td colspan="2">
                                        Right Ear:
                                        <br>
                                        {{ $admission->exam_audio->right_ear_result ?? '' }}
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td colspan="3">
                                        Left Ear:
                                        <br>
                                        {{ $admission->exam_audio->left_ear_result ?? '' }}
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">HEAD AND NECK:</td>
                                    <td colspan="5">
                                        <br>
                                        <b>{{ $admission->exam_physical->a2_findings ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">HEART (Cardiovascular):</td>
                                    <td colspan="5">
                                        <br>
                                        <b>{{ $admission->exam_physical->b5_findings ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">LUNGS:</td>
                                    <td colspan="5">
                                        <br>
                                        <b>{{ $admission->exam_physical->b4_findings ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">Speech (Radio Telephone/GMDSS Operators only): <br> Is speech
                                        unimpaired
                                        for normal voice communication?

                                    </td>
                                    <td colspan="2">
                                        <input type="checkbox"> YES <input type="checkbox" checked> NO
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        Upper Extremities:
                                        <br>
                                        <b>{{ $admission->exam_physical->c4_findings ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td colspan="3">
                                        Lower Extremities:
                                        <br>
                                        <b>{{ $admission->exam_physical->c4_findings ?? '' }}</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800">
                <tbody>
                    <tr>
                        <td width="40%">Form MED1-B 2014</td>
                        <td>Page 1 of 2</td>
                        <td width="40%">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="page-two">
            <table class="brdTable" width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td width="46%">
                            Last Name <br> <b>{{ $admission->patient->lastname }}</b>
                        </td>
                        <td width="46%">
                            First Name <br> <b>{{ $admission->patient->firstname }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td>
                            <div class="section-title">
                                <div>III. DRUG TESTING <small>(May be waived with proof of valid drug test within 1
                                        year)</small></div>
                            </div>
                            <table width="100%" id="section-one-and-two-table" class="brdTable">
                                <tbody>
                                    <tr>
                                        <td>
                                            TESTS TO BE PERFORMED
                                        </td>
                                        <td>
                                            @if ($admission->exam_drug)
                                                <input type="checkbox"
                                                    {{ $admission->exam_drug->tetrahydrocannabinol ? 'checked' : null }}>
                                                THC
                                                <input type="checkbox"
                                                    {{ $admission->exam_drug->cocaine ? 'checked' : null }} />
                                                Cocaine
                                                <input type="checkbox"
                                                    {{ $admission->exam_drug->phencyclidine ? 'checked' : null }}> PCP
                                                <input type="checkbox"
                                                    {{ $admission->exam_drug->morphine ? 'checked' : null }}>
                                                Oplates
                                                <input type="checkbox"
                                                    {{ $admission->exam_drug->amphetamines ? 'checked' : null }}>
                                                Amphetamines
                                            @else
                                                <input type="checkbox"> THC
                                                <input type="checkbox"> Cocaine
                                                <input type="checkbox"> PCP
                                                <input type="checkbox"> Oplates
                                                <input type="checkbox"> Amphetamines
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" rowspan="2">
                                            Result
                                        </td>
                                        <td>
                                            <table id="brdNone" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="brdRight" width="75%">
                                                        </td>
                                                        <td class="brdRight">NEGATIVE
                                                        </td>
                                                        <td>POSITIVE</td>
                                                    </tr>
                                                    @php
                                                        $tests = [
                                                            'CANNABINOIDS as Carboxy - THC' => optional(
                                                                $admission->exam_drug,
                                                            )->tetrahydrocannabinol,
                                                            'COCAINE METABOLITES as Benzoylecgonine' => optional(
                                                                $admission->exam_drug,
                                                            )->cocaine,
                                                            'PHENCYCLIDINE' => optional($admission->exam_drug)
                                                                ->phencyclidine,
                                                            'OPIATES' => null,
                                                            'Codeine' => optional($admission->exam_drug)->morphine, // Placeholder for checkbox
                                                            'Methamphetamine' => optional($admission->exam_drug)
                                                                ->methamphetamine, // Placeholder for checkbox
                                                            'OTHERS (please specify)' => null,
                                                        ];
                                                    @endphp

                                                    @foreach ($tests as $test => $result)
                                                        <tr>
                                                            @if ($test === 'Codeine' || $test === 'Methamphetamine')
                                                                <!-- Custom checkboxes for Codeine and Methamphetamine -->
                                                                <td class="brdRight">
                                                                    <input type="checkbox"
                                                                        name="{{ strtolower($test) }}" value="1"
                                                                        {{ optional($admission->exam_drug)->{strtolower($test)} ? 'checked' : '' }}>
                                                                    {{ $test }}
                                                                </td>
                                                                <td class="brdRight">
                                                                    <input type="checkbox"
                                                                        {{ $result === 'Negative' ? 'checked' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        {{ $result === 'Positive' ? 'checked' : '' }}>
                                                                </td>
                                                            @else
                                                                <!-- Regular Drug Test Entries -->
                                                                <td class="brdRight">{{ $test }}</td>
                                                                @if ($test != 'OPIATES')
                                                                    <td class="brdRight">
                                                                        <input type="checkbox"
                                                                            {{ $result === 'Negative' ? 'checked' : '' }}>
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox"
                                                                            {{ $result === 'Positive' ? 'checked' : '' }}>
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        </tr>
                                                    @endforeach

                                                    {{-- @if ($admission->exam_drug)
                                                        <tr>
                                                            <td class="brdRight">
                                                                CANNABINOIDS as Carboxy - THC</td>
                                                            <td class="brdRight">
                                                                <input type="checkbox"
                                                                    {{ $admission->exam_drug->tetrahydrocannabinol == 'Negative' ? 'checked' : null }}>
                                                            </td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">COCAINE
                                                                METABOLITES as Benzoylecgonine</td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                PHENCYCLIDINE</td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                OPIATES
                                                            </td>
                                                            <td class="brdRight"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                <input type="checkbox"> codeine
                                                            </td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                <input type="checkbox"> methamphetamine
                                                            </td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                OTHERS (please specify)
                                                            </td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td class="brdRight">
                                                                CANNABINOIDS as Carboxy - THC</td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">COCAINE
                                                                METABOLITES as Benzoylecgonine</td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                PHENCYCLIDINE</td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                OPIATES
                                                            </td>
                                                            <td class="brdRight"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                <input type="checkbox"> codeine
                                                            </td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                <input type="checkbox"> methamphetamine
                                                            </td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brdRight">
                                                                OTHERS (please specify)
                                                            </td>
                                                            <td class="brdRight"><input type="checkbox"></td>
                                                            <td><input type="checkbox"></td>
                                                        </tr>
                                                    @endif --}}
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Remarks
                                            <div style="height: 35px"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td>
                            <div class="section-title">
                                <div>IV. PHYSICIAN'S FURTHER COMMENTS</div>
                            </div>
                            <div style="height: 100px; border: 1px solid black;">
                                <div style="font-size: 12px; font-weight: bold;">REMARKS</div>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
            <table width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td>
                            <div class="section-title">
                                <div>V. STATEMENT REGARDING APPLICANT'S FITNESS FOR DUTY</div>
                            </div>
                            <table class="brdTable" width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2">I certify that I gave a physical examination to the
                                            applicant on
                                            <input type="text"
                                                value="{{ Carbon\Carbon::parse($admission->exam_physical->date_examination)->format('Y-m-d') }}"
                                                style="width: 350px; border: none; border-bottom: 1px solid black; font-weight: bold;">
                                            and he/she is <br>
                                            <span>
                                                @if ($admission->exam_physical)
                                                    <input type="checkbox"
                                                        {{ $admission->exam_physical->fit == 'Fit' ? 'checked' : null }} />
                                                    FIT
                                                    <span>/</span>
                                                    <input type="checkbox"
                                                        {{ $admission->exam_physical->fit == 'Unfit' ? 'checked' : null }} />
                                                    NOT FIT
                                                @else
                                                    <input type="checkbox" />
                                                    FIT
                                                    <span>/</span>
                                                    <input type="checkbox"> NOT FIT
                                                @endif
                                                for Sea Duty as:
                                            </span>
                                            <span>
                                                <input type="checkbox"> MASTER
                                                <input type="checkbox"> MATE
                                                <input type="checkbox"> ENGINEER
                                                <input type="checkbox"> RADIO OFFICER
                                                <input type="checkbox"> SEAMAN
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Name and Address of Physician
                                            <br>
                                            <b>Teresita F. Gonzales, M.D.</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Qualifications of Physician
                                            <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            Physician's Licensing Authority
                                            <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            Expiration date of current Practioner's Certificate or License
                                            <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800" style="margin-bottom: 20px;">
                <tbody>
                    <tr>
                        <td width="60%" valign="bottom">
                            <div>
                                <img style="width: 250px; transform: translate(100px, 60px); margin-top: -100px !important;"
                                    src="{{ URL::asset('app-assets/images/signatures/md_gonzales_sig.png') }}"
                                    alt="">
                            </div>
                            <div style="border-top: 1px solid black !important;">Physician's Signature</div>
                        </td>
                        <td valign="bottom">
                            <div style="text-align: center;">
                                {{ Carbon\Carbon::parse($admission->exam_physical->date_examination)->format('Y-m-d') }}
                            </div>
                            <div style="border-top:
                            1px solid black !important;">Date
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="800">
                <tbody>
                    <tr>
                        <td width="40%">Form MED1-B 2014</td>
                        <td>Page 2 of 2</td>
                        <td width="40%">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</body>
