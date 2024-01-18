<ul class="nav nav-pills flex-column mt-md-0 mt-1">
    <li class="nav-item">
        <a class="nav-link d-flex text-white active" id="account-pill-general" data-toggle="pill" href="#account-general"
            aria-expanded="true">
            <i class="feather icon-globe"></i>
            General Info
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex text-white" id="account-pill-referral" data-toggle="pill" href="#account-referral"
            aria-expanded="false">
            <i class="feather icon-file"></i>
            Referral Info
        </a>
    </li>
    @if ($admissionPatient)
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-invoice" data-toggle="pill" href="#account-invoice"
                aria-expanded="false">
                <i class="fa fa-money"></i>
                {{ $patient_or ? 'Edit Payment' : 'Generate Payment' }}
            </a>
        </li>
    @endif
    @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '17')
        @if ($latest_schedule)
            <li class="nav-item">
                <a class="nav-link d-flex text-white" id="account-pill-reschedule" data-toggle="pill"
                    href="#account-reschedule" aria-expanded="false">
                    <i class="feather icon-calendar"></i>
                    Re Schedule
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link d-flex text-white" id="account-pill-reschedule" data-toggle="pill"
                    href="#account-reschedule" aria-expanded="false">
                    <i class="feather icon-calendar"></i>
                    Add Schedule
                </a>
            </li>
        @endif
    @endif
    @if ($admissionPatient)
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-admission" data-toggle="pill" aria-expanded="false"
                href="#account-admission">
                <i class="feather icon-edit"></i>
                Edit Admission
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-admission" data-toggle="pill" aria-expanded="false"
                href="#account-admission">
                <i class="feather icon-edit"></i>
                Add Admission
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link d-flex text-white" id="account-vaccination-record" data-toggle="pill" aria-expanded="false"
            href="#account-vaccination-record">
            <i class="feather icon-edit"></i>
            Yellow Card
        </a>
    </li>
    @if ($admissionPatient)
        @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '7')
            <li class="nav-item">
                <a class="nav-link d-flex text-white" id="account-pill-followup" data-toggle="pill"
                    href="#account-followup" aria-expanded="false">
                    <i class="fa fa-arrow-circle-left"></i>
                    Follow Up Form
                </a>
            </li>
        @endif
    @endif
    @if ($admissionPatient)
        @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '17')
            <li class="nav-item">
                <a class="nav-link d-flex text-white" id="account-pill-print-panel" data-toggle="pill"
                    href="#account-print-panel" aria-expanded="false">
                    <i class="fa fa-print"></i>
                    Print Panel
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-connections" data-toggle="pill"
                onclick="window.open('/admission_print?id={{ $admissionPatient->id }}').print()" aria-expanded="false">
                <i class="fa fa-print"></i>
                Print Routing Slip
            </a>
        </li>
    @endif
    @if (session()->get('dept_id') == '1')
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-connections" data-toggle="pill"
                onclick="window.open('/referral_pdf?email={{ $patient->email }}').print()" aria-expanded="false">
                <i class="fa fa-print"></i>
                Print Referral Slip
            </a>
        </li>
    @endif
    @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '17' || session()->get('dept_id') == '8')
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-connections" data-toggle="pill"
                onclick="window.open('/requests_print?id={{ $patientInfo->medical_package }}&patient_id={{ $patient->id }}').print()"
                aria-expanded="false">
                <i class="fa fa-print"></i>
                Print Requests
            </a>
        </li>
    @endif
    @if (
        ($admissionPatient && session()->get('dept_id') == '1') ||
            session()->get('dept_id') == '3' ||
            session()->get('dept_id') == '8')
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-connections" data-toggle="pill"
                onclick="window.open('/lab_result?id={{ $admissionPatient ? $admissionPatient->id : 0 }}','wp','width=1000,height=800').print();"
                aria-expanded="false">
                <i class="fa fa-print"></i>
                Print Lab Result
            </a>
        </li>
    @endif

    @if ($admissionPatient)
        <li class="nav-item">
            <a class="nav-link d-flex text-white" id="account-pill-connections" data-toggle="pill"
                onclick="window.open('/medical_record?id={{ $admissionPatient ? $admissionPatient->id : 0 }}&patient_id={{ $patient->id }}','wp','width=1000,height=800').print();"
                aria-expanded="false">
                <i class="fa fa-print"></i>
                Print Medical History
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link d-flex text-white" id="account-pill-connections" data-toggle="pill"
            onclick="window.open('/data_privacy_print?id={{ $patient->id }}').print()" aria-expanded="false">
            <i class="fa fa-print"></i>
            Print Data Privacy Form
        </a>
    </li>
</ul>
