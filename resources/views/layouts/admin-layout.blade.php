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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/app-invoice.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('app-assets/css/all.css') }}">
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
    @include('layouts.admin-sidebar')
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
