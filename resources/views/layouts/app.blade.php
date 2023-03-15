<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="MERITA EMR is a website application from MERITA DIAGNOSTIC CLINIC">
    <meta name="author" content="MERITA">
    <title>Merita EMR - Electronic Medical Record System </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/logo/MeritaApp.png">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
    <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/all.css') }}" <!-- END: Page CSS-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-light navbar-border bg-white">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item"><a class="navbar-brand"
                            href="../../../html/ltr/horizontal-menu-template/index.html">
                            <img class="brand-logo" alt="stack admin logo"
                                src="../../../app-assets/images/logo/MeritaEMR_logo2.png" width="150">
                        </a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container d-lg-none"
                            data-toggle="collapse" data-target="#navbar-mobile"><i class="feather icon-menu"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none "><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="feather icon-menu"></i></a></li>
                        <li class="nav-item d-none"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online avatar-md">@yield('patient_image')<i></i></div><span
                                    class="user-name">@yield('name')</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/documentation"><i class="feather icon-file"></i>Documentation</a>
                                <a class="dropdown-item" href="/patient_info"><i class="feather icon-user"></i>Profile</a>
                                <a class="dropdown-item" href="/support"><i class="feather icon-user"></i>Support</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @if(session()->get('firstname') != null)
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <div class="mx-1 my-25">
                    <a href="/patient_info" class="text-white btn btn-primary"><i class="fa fa-home"></i> Home</a>
                </div>
                <div class="mx-1 my-25">
                    <a href="/schedule_appointment" class="text-white btn btn-primary"><i class="fa fa-calendar"></i>
                        Scheduled Appointment</a>
                </div>
                @yield('remedical')
                <div class="mx-1 my-25">
                    <a href="/laboratory_result" class="text-white btn btn-primary"><i class="fa fa-file"></i>
                        Laboratory Result Status</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- END: Main Menu-->

    <button type="button" class="btn btn-outline-success block btn-lg d-none" id="open-instruction" data-toggle="modal"
        data-target="#large">Open Instruction</button>
    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Instruction</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container border p-1 my-1">
                        <h6 class="primary float-right">(Screenshot this as proof of schedule)</h6>
                        <h6>You are now scheduled on : <b>@yield('latest_schedule')</b></h6>
                        @yield('patient_info')
                    </div>
                    <h5>Step 1</h5>
                    <p>Kindly take a screenshot of this prompt message or print one copy for your reference.</p>
                    <hr>
                    <h5>Step 2</h5>
                    <p>You are now scheduled.</p>
                    <p>-(FASTING) NO INTAKE OF FOOD OR DRINKS FOR 8-10 HOURS BEFORE GOING.</p>
                    <p>-Bring 3 copies of 1x1 picture.</p>
                    <p>-Wear appropriate clothing. (No shorts and slippers)</p>
                    <hr>
                    <h5>Step 3</h5>
                    <p>Check your provided and registered email address for the updates about your medical request.</p>
                    <hr>
                    <h5>Step 4</h5>
                    <p>Come on your respective schedule and on time. Merita Diagnostic Clinic is open from 7:30AM – 4:30 PM.</p>
                    <hr>
                    <h5>Step 5</h5>
                    <p>Upon your scheduled medical exam, present a valid ID at the receptionist/reception area, and confirm all the information gathered if it matches based on your records.</p>
                    <hr>
                    <h5>Step 6</h5>
                    <p>Once confirmed and validated at the reception area, the receptionist will print a copy of your routing slip and you may now proceed with the medical exams as stated on your referral slip.</p>
                    <hr>
                    <h5>Step 7</h5>
                    <p>Upon completion of all medical exams, submit the routing slip to the processing area.</p>
                    <hr>
                    <h5>Step 8</h5>
                    <p>Check your provided and registered email address for the updates about your medical examination.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
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
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/jquery.knob.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/knob.js"></script>
    <script src="../../../app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"></script>
    <script src="../../../app-assets/data/jvector/visitor-data.js"></script>
    <script src="../../../app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: custom JS-->
    <script src="../../../assets/js/scripts.js"></script>
    <!-- END: custom JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
    <script src="../../../app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="../../../app-assets/js/scripts/forms/wizard-steps.js"></script>
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="../../../app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- END: Page JS-->
    @stack('scripts')

</body>
<!-- END: Body-->

</html>