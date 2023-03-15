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

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
    <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/all.css') }}" <!-- END: Page CSS-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">
 <div class="app-content content">
        <div class="container my-2" style="width: 60%;">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <h4 class="card-title" id="basic-layout-colored-form-control">Support</h4>
                        <div class="card-text my-1">Please fill up the form below for us to further investigate your concern. We will attend to your concern from Monday to Friday (8AM - 5PM PHT) or call us at 09458426538.</div>
                        <form class="form" action="/store_support" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="userinput1">Role</label>
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="Role"  name="role" value="{{session()->get('classification')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="userinput1">Name</label>
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="userinput1">Subject</label>
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="userinput1">Email</label>
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="userinput1">Issue</label>
                                            <textarea name="issue" id="" cols="30" rows="8" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="userinput1">Screenshot of an issue. (Include url) (maximum file size: 2MB)</label>
                                            <input type="file" id="userinput1" class="form-control border-primary" placeholder="Screenshot" name="ss_issue">
                                        </div>
                                        <span class="danger">@error('ss_issue'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions right">
                                <button class="btn btn-secondary" type="button" onclick="history.back()">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout"><span
                class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a
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
    <script src="../../../app-assets/js/scripts/ui/scrollable.js"></script>
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/checkbox-radio.js"></script>
    <script src="../../../app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="../../../app-assets/js/scripts/navs/navs.js"></script>
    <!-- END: Page JS-->
    <script src="../../../app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../../app-assets/js/scripts/pages/app-invoice.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/daygrid.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/timegrid.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/interactions.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/dropzone.js"></script>
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

    <!-- END: Page JS-->
    @stack('scripts')
    @if(Session::get('success'))
    <script>
        toastr.success('{{Session::get("success")}}', 'Success');
    </script>
    @endif
</body>
<!-- END: Body-->

</html>
