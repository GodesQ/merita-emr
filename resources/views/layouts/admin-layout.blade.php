<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="MERITA EMR is a website application from MERITA DIAGNOSTIC CLINIC" <meta
        name="author" content="MERITA">
    <title>Merita EMR - Electronic Medical Record System</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/logo/MeritaApp.png">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('app-assets/vendors/css/calendars/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/calendars/daygrid.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/calendars/timegrid.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/calendars/fullcalendar.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/app-invoice.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-collapsed" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light"
        style="background-color: #16702a">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="/dashboard"
                            style="display: flex; justify-content: center;"><img
                                class="brand-logo logo-sm img-responsive" alt="stack admin"
                                src="../../../app-assets/images/logo/MeritaApp.png">
                            <h2 class="brand-text align-middle" style="color: #156f29; font-weight: bold;">Merita <span
                                    style="color: #29477d;">EMR</span></h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                            data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="feather icon-menu"></i></a>
                        </li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon feather icon-maximize"></i></a>
                        </li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text"
                                    placeholder="Search by Lastname/Firstname/Patientcode..." tabindex="0"
                                    data-search="template-search">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="avatar avatar-online">@yield('employee_image')<i></i></div><span
                                    class="user-name">@yield('name')</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/employee_documentation"><i
                                        class="feather icon-info"></i>Documentation</a>
                                <a class="dropdown-item"
                                    href="/user_profile?id={{ session()->get('employeeId') }}"><i
                                        class="feather icon-user"></i>Edit Profile</a>
                                <a class="dropdown-item" href="/support"><i class="feather icon-info"></i>Support</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="/employee_logout"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span>Main Navigation</span><i class=" feather icon-minus"
                        data-toggle="tooltip" data-placement="right" data-original-title="MAIN NAVIGATION"></i>
                </li>
                <li class="nav-item {{ Request::path() == 'dashboard' ? 'active' : '' }}"><a href="/dashboard"><i
                            class="feather icon-home"></i><span class="menu-title"
                            data-i18n="Dashboard">Dashboard</span></a></li>
                <li class=" nav-item {{ Request::path() == 'patients' ? 'active' : '' }}"><a href="/patients"><i
                            class="feather icon-user-plus"></i><span class="menu-title"
                            data-i18n="Patients">Patients</span></a></li>
                @if (session()->get('dept_id') == '1')
                    <li class=" nav-item {{ Request::path() == 'employees' ? 'active' : '' }}"><a
                            href="/employees"><i class="feather icon-users"></i><span class="menu-title"
                                data-i18n="Employees">Employees</span></a></li>
                @endif
                @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '18' || session()->get('dept_id') == '8')
                    <li class=" nav-item {{ Request::path() == 'agencies' ? 'active' : '' }}"><a href="/agencies"><i
                                class="feather icon-globe"></i><span class="menu-title"
                                data-i18n="Agency">Agency</span></a></li>
                @endif

                <li class=" nav-item {{ Request::path() == 'referral-slips' ? 'active' : '' }}"><a
                        href="/referral-slips"><i class="feather icon-file"></i><span class="menu-title"
                            data-i18n="Referral Slips">Referral Slips</span></a></li>

                <li class=" nav-item {{ Request::path() == 'request-sched-appointments' ? 'active' : '' }}"><a
                        href="/request-sched-appointments"><i class="feather icon-calendar"></i><span class="menu-title"
                            data-i18n="Referral Slips">Request Schedules</span></a></li>

                <li class="nav-item has-sub"><a href="#"><i class="feather icon-folder"></i><span
                            class="menu-title" data-i18n="Master Files">Master Files</span></a>
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
                            <li class="{{ Request::path() == 'list_department' ? 'active' : '' }}"><a
                                    class="menu-item" href="/list_department" data-i18n="Departments">Departments</a>
                            </li>
                        @endif
                        @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '18' || session()->get('dept_id') == 2)
                            <li class="{{ Request::path() == 'list_package' ? 'active' : '' }}"><a class="menu-item"
                                    href="/list_package" data-i18n="Packages">Packages</a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if (session()->get('dept_id') == '2' || session()->get('dept_id') == '1' || session()->get('dept_id') == '17')
                    <li class=" nav-item"><a href="#"><i class="feather icon-edit"></i><span
                                class="menu-title" data-i18n="Transactions">Transactions</span></a>
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
                <li class=" nav-item"><a href="#"><i class="feather icon-bar-chart-2"></i><span
                            class="menu-title" data-i18n="Layouts">Report</span></a>
                    <ul class="menu-content">
                        @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '17')
                            <li><a class="menu-item" href="/transmittal" data-i18n="Transmittal">Transmittal</a></li>
                        @endif
                        @if (session()->get('dept_id') == '1' || session()->get('dept_id') == '8' || session()->get('dept_id') == '17')
                            <li><a class="menu-item" href="/followup_transmittal"
                                    data-i18n="Follow Up Transmittal">Follow Up Transmittal</a></li>
                        @endif
                        <li><a class="menu-item" href="/soa" data-i18n="SOA Report">SOA Report</a></li>
                        <li><a class="menu-item" href="/packages_report" data-i18n="Packages Report">Packages
                                Report</a></li>
                        <li><a class="menu-item" href="/panama" data-i18n="Panama Billing">Panama Billing</a></li>
                        <li><a class="menu-item" href="/liberian_billing" data-i18n="Liberian Billing">Liberian
                                Billing</a></li>
                        <li><a class="menu-item" href="daily_patient_form" data-i18n="Fitness">Daily Patients</a>
                        </li>
                    </ul>
                </li>
                @if (session()->get('dept_id') == '1')
                    <li class=" nav-item"><a href="#"><i class="feather icon-activity"></i><span
                                class="menu-title" data-i18n="Layouts">Utilities</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="/logs" data-i18n="Employee Logs">Employee Logs</a>
                            </li>
                            <li><a class="menu-item" href="/scheduled_patients"
                                    data-i18n="Scheduled Patients">Scheduled
                                    Patients</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022
                <a class="text-bold-800 grey darken-2" href="https://meritaclinic.ph" target="_blank">Merita
                    Diagnostics Clinic, Inc </a>
            </span>
            <span class="float-md-right d-none d-lg-block">Designed & Developed by:
                <a href="https://godesq.com/" target="_blank">GodesQ Digital Marketing Services</a>
            </span>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/ui/scrollable.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/navs/navs.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/daygrid.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/timegrid.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/interactions.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/dropzone.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

    <script>
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        let lastClick = 0;
        radioButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                const thisClick = Date.now();
                if (thisClick - lastClick < 500) {
                    this.checked = false;
                } else {
                    this.checked = true;
                }
                lastClick = thisClick;
            });
        });

        $("#search-input").change(function() {
            let searchValue = $("#search-input").val();
            let csrf = '{{ csrf_token() }}';
            $.ajax({
                url: '{{ route('patient.search') }}',
                method: 'get',
                data: {
                    query: searchValue,
                    _token: csrf
                },
                success: function(response) {
                    response[0].forEach(element => {
                        $('.search-list').append(
                            `<div class="col-md-12 p-1">${element.firstname} ${element.lastname}</div>`
                        );
                    });
                }
            });
        });
        // window.addEventListener('resize', function(event){
        //     if(window.innerWidth <= 1024) {
        //         $('body').classList.remove("menu-expanded");
        //         $('body').classList.add("menu-collapsed");
        //     } else {
        //         $('body').classList.add("menu-expanded");
        //         $('body').classList.remove("menu-collapsed");
        //     }
        // });
    </script>


    @stack('scripts')
</body>
<!-- END: Body-->

</html>
