<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Merita EMR - Electronic Medical Record System </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/logo/MeritaApp.png">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('app-assets/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

    <style>
    .avatar-letter {
        padding: 0.6rem 1rem;
        margin-right: 0.4rem;
        border-radius: 5px;
        background: #29477d;
        color: white;
        font-weight: 700;
    }
    </style>
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-container container center-layout">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <div class="">
                            <ul class="nav navbar-nav flex-row">
                                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                            class="feather icon-menu font-large-1"></i></a></li>
                                <li class="nav-item">
                                    <a class="navbar-brand" href="/agency_dashboard">
                                        <img class="brand-logo" alt="stack admin logo" src="../../../app-assets/images/logo/MeritaEMR_logo2.png" width="200">
                                    </a>
                                </li>
                                <li class="nav-item d-md-none">
                                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar-letter">@php echo Session::get('agencyName')[0] @endphp</span><span
                                    class="user-name">@yield('name')</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!--<a class="dropdown-item" href="/change_password"><i class="feather icon-lock"></i>Change Password</a>-->
                                <a class="dropdown-item" href="/agency_documentation"><i class="feather icon-folder"></i>Documentation</a>
                                <a class="dropdown-item" href="/support"><i class="feather icon-user"></i>Support</a>
                                <a class="dropdown-item" href="/agency_logout"><i class="feather icon-power"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu -->
    <div class="card">
        <div class="card-body">
            <div class="navbar-container main-menu-content container center-layout d-flex align-items-center justify-content-center" data-menu="menu-container">
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <a class="btn btn-solid white" style="background-color: #156f29;" href="/agency_dashboard"><i class=" feather icon-home"></i>
                        <span data-i18n="Add Slip">Home</span>
                    </a>
                    @if(!in_array(Session::get('agencyId'), [59, 58, 57, 55, 68]))
                        <a class="btn btn-solid white" style="background-color: #156f29;" href="/referral-slips/create"><i class=" feather icon-file"></i>
                            <span data-i18n="Add Slip">Add Referral Slip</span>
                        </a>
                    @endif
                    @if(!in_array(Session::get('agencyId'), [59, 58, 57, 55, 68]))
                        <a class="btn btn-solid white" style="background-color: #156f29;" href="/referral-slips"><i class=" feather icon-file-text"></i>
                            <span data-i18n="Referral Slips">Referral Slips</span>
                        </a>
                    @endif
                    <a class="btn btn-solid white" style="background-color: #156f29;" href="/request-sched-appointments"><i class=" feather icon-calendar"></i>
                        <span data-i18n="Request Schedules">Request Schedules</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout"><span
                class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a
                    class="text-bold-800 grey darken-2" href="https://meritaclinicph.com/" target="_blank">Merita
                    Diagnostics Clinic, Inc </a></span><span class="float-md-right d-none d-lg-block">Designed &
                Developed by: <a href="https://godesq.com/" target="_blank">GodesQ Digital Marketing Services</a></span>
        </p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ URL::asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ URL::asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/extensions/jquery.knob.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/extensions/knob.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ URL::asset('app-assets/data/jvector/visitor-data.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/extensions/unslider-min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: custom JS-->
    <script src="{{ URL::asset('assets/js/scripts.js') }}"></script>
    <!-- END: custom JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ URL::asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ URL::asset('app-assets/js/scripts/ui/breadcrumbs-with-stats.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <!-- END: Page JS-->
    @stack('scripts')

</body>
<!-- END: Body-->

</html>
