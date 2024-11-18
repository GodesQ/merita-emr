<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Main Navigation</span><i class=" feather icon-minus" data-toggle="tooltip"
                    data-placement="right" data-original-title="MAIN NAVIGATION"></i>
            </li>
            <li class="nav-item {{ Request::path() == 'dashboard' ? 'active' : '' }}"><a href="/dashboard"><i
                        class="feather icon-home"></i><span class="menu-title"
                        data-i18n="Dashboard">Dashboard</span></a></li>
            <li class=" nav-item {{ Request::path() == 'patients' ? 'active' : '' }}"><a href="/patients"><i
                        class="feather icon-user-plus"></i><span class="menu-title"
                        data-i18n="Patients">Patients</span></a></li>
            @if (session()->get('dept_id') == '1')
                <li class=" nav-item {{ Request::path() == 'employees' ? 'active' : '' }}"><a href="/employees"><i
                            class="feather icon-users"></i><span class="menu-title"
                            data-i18n="Employees">Employees</span></a></li>
            @endif
            @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '18' || session()->get('dept_id') == '8')
                <li class=" nav-item {{ Request::path() == 'agencies' ? 'active' : '' }}"><a href="/agencies"><i
                            class="feather icon-globe"></i><span class="menu-title" data-i18n="Agency">Agency</span></a>
                </li>
            @endif

            {{-- <li class=" nav-item {{ Request::path() == 'referral-slips' ? 'active' : '' }}"><a
                    href="/referral-slips"><i class="feather icon-file"></i><span class="menu-title"
                        data-i18n="Referral Slips">Referral Slips</span></a></li>

            <li class=" nav-item {{ Request::path() == 'request-sched-appointments' ? 'active' : '' }}"><a
                    href="/request-sched-appointments"><i class="feather icon-calendar"></i><span class="menu-title"
                        data-i18n="Referral Slips">Request Schedules</span></a></li> --}}

            <li class="nav-item has-sub"><a href="#"><i class="feather icon-folder"></i><span class="menu-title"
                        data-i18n="Master Files">Master Files</span></a>
                <ul class="menu-content">
                    @if (session()->get('dept_id') == 1 || session()->get('dept_id') == 2)
                        <li class="{{ Request::path() == 'list_exam' ? 'active' : '' }}"><a class="menu-item"
                                href="/list_exam" data-i18n="Exams">Exams</a>
                        </li>
                    @endif
                    @if (session()->get('dept_id') == '1')
                        <li class="{{ Request::path() == 'list_section' ? 'active' : '' }}"><a class="menu-item"
                                href="/list_section" data-i18n="Floors">Floors</a>
                        </li>
                        <li class="{{ Request::path() == 'list_request' ? 'active' : '' }}"><a class="menu-item"
                                href="/list_request" data-i18n="Requests">Requests</a>
                        </li>
                        <li class="{{ Request::path() == 'list_department' ? 'active' : '' }}"><a class="menu-item"
                                href="/list_department" data-i18n="Departments">Departments</a>
                        </li>
                    @endif
                    @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '18' || session()->get('dept_id') == 2)
                        <li class="{{ Request::path() == 'list_package' ? 'active' : '' }}"><a class="menu-item"
                                href="/list_package" data-i18n="Packages">Packages</a>
                        </li>
                    @endif
                    @if (session()->get('dept_id') == '1' && session()->get('employeeId') == 103)
                        <li class="{{ Request::path() == 'default-packages' ? 'active' : '' }}"><a class="menu-item"
                                href="/default-packages" data-i18n="Default Packages">Default
                                Packages</a>
                        </li>
                    @endif
                </ul>
            </li>
            @if (session()->get('dept_id') == '2' || session()->get('dept_id') == '1' || session()->get('dept_id') == '17')
                <li class=" nav-item"><a href="#"><i class="feather icon-edit"></i><span class="menu-title"
                            data-i18n="Transactions">Transactions</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::path() == 'admissions' ? 'active' : '' }}">
                            <a class="menu-item " href="/admissions" data-i18n="Admission">Admission</a>
                        </li>
                        <li class="{{ Request::path() == 'cashier_or' ? 'active' : '' }}">
                            <a class="menu-item" href="/cashier_or" data-i18n="Cashier-OR">Cashier-OR</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class=" nav-item"><a href="#"><i class="feather icon-bar-chart-2"></i><span class="menu-title"
                        data-i18n="Layouts">Report</span></a>
                <ul class="menu-content">
                    @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '17')
                        <li><a class="menu-item" href="/transmittal" data-i18n="Transmittal">Transmittal</a></li>
                    @endif
                    @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '17')
                        <li><a class="menu-item" href="/followup_transmittal" data-i18n="Follow Up Transmittal">Follow
                                Up Transmittal</a></li>
                    @endif
                    <li><a class="menu-item" href="/soa" data-i18n="SOA Report">SOA Report</a></li>
                    <li><a class="menu-item" href="/packages_report" data-i18n="Packages Report">Packages
                            Report</a></li>
                    <li><a class="menu-item" href="/panama" data-i18n="Panama Billing">Panama Billing</a></li>
                    <li><a class="menu-item" href="/liberian_billing" data-i18n="Liberian Billing">Liberian
                            Billing</a></li>
                    <li><a class="menu-item" href="daily_patient_form" data-i18n="Fitness">Daily Patients</a>
                    </li>
                    <li><a class="menu-item" href="/daily-summary-report" data-i18n="Daily Summary Report">Daily
                            Summary Report</a>
                    </li>
                </ul>
            </li>
            @if (session()->get('dept_id') == '1')
                <li class=" nav-item"><a href="#"><i class="feather icon-activity"></i><span
                            class="menu-title" data-i18n="Layouts">Utilities</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="/logs" data-i18n="Employee Logs">Employee Logs</a>
                        </li>
                        <li><a class="menu-item" href="/scheduled_patients" data-i18n="Scheduled Patients">Scheduled
                                Patients</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
