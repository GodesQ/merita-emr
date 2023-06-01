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
    <title>Merita - Register</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/logo/MeritaApp.png">
    <link rel="shortcut icon" type="image/x-icon" href=".../../../app-assets/images/logo/MeritaApp.png">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/login-register.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <style>
        li {
            list-style: decimal !important;
            margin: 1rem 0;
        }
    </style>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay overlaynow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body overlay-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="box-shadow-2 p-0 loginwrapper">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0 loginbox">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="../../../app-assets/images/logo/MeritaEMR_logo2.png" class="img-fluid"
                                            alt="branding logo">
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h2>Register Now</h2>
                                            <form class="form-horizontal" action="/save-register" method="POST">
                                                @if (Session::get('fail'))
                                                    <div class="alert alert-danger">
                                                        {{ Session::get('fail') }}
                                                    </div>
                                                @endif
                                                @if (Session::get('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                @endif
                                                @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="email" name="email" class="form-control"
                                                        id="user-email" placeholder="Your Email Address">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                    <span class="danger text-danger">
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </fieldset>
                                                <div style="line-height: 15px; font-size: 13px;"
                                                    class="text-left danger">*minimum of 8 characters long</div>
                                                <fieldset
                                                    class="form-group position-relative has-icon-right has-icon-left">
                                                    <input type="password" name="password" class="form-control"
                                                        id="user-password" placeholder="Enter Password" />
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <div class="form-control-position"
                                                        style="right: 0 !important; cursor: pointer;">
                                                        <i class="fa fa-eye" id="togglePassword"></i>
                                                    </div>
                                                    <span class="danger text-danger">
                                                        @error('password')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" id=""
                                                        placeholder="Confirm Password">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <span class="danger text-danger">
                                                        @error('password_confirmation')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </fieldset>
                                                <fieldset class="checkbox mb-50">
                                                    <label>
                                                        <input type="checkbox" value="yes"
                                                            name="terms_conditions">
                                                        <a class="secondary" data-toggle="modal"
                                                            data-backdrop="false" data-target="#default">
                                                            I Agree to Terms and Conditions
                                                        </a>
                                                    </label>
                                                </fieldset>
                                                <fieldset class="checkbox mb-50">
                                                    <label>
                                                        <input type="checkbox" value="yes" name="data_privacy">
                                                        <a class="secondary" data-toggle="modal"
                                                            data-backdrop="false" data-target="#large">
                                                            Data Privacy
                                                        </a>
                                                    </label>
                                                </fieldset>
                                                <button type="submit"
                                                    class="btn btn-primary btn-block registerbtn"><i
                                                        class="feather icon-user"></i> Register</button>
                                            </form>
                                            <div class="modal fade text-left" id="default" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel17"
                                                style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel17">Terms and
                                                                Conditions</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5><b><u>Acceptance of the Terms of Use</u></b></h5>
                                                            <p style="line-height: 25px;">These terms of use are
                                                                entered into by and between You and MERITA DIAGNOSTIC
                                                                CLINIC.
                                                                The following terms and conditions, together with any
                                                                documents they expressly incorporate by reference
                                                                (collectively “Terms of Use”) govern your access to and
                                                                use of {{ env('APP_URL') }}
                                                                (collectively the “Website”), including any content,
                                                                functionality, and services offered on
                                                                or through the Website, whether as a guest or a
                                                                registered user.
                                                                Please read the Terms of Use carefully before you start
                                                                to use the Website. incorporated herein by reference.
                                                                If you do not want to agree to these Terms of Use or the
                                                                Privacy Policy, you must not access or use the Website.
                                                                This Website is offered and available to users who are
                                                                20 years of age or older.
                                                                If you do not meet this requirement, you must not access
                                                                or use the Website.</p>
                                                            <hr>
                                                            <h5><b><u>Accessing the Website and Account Security</u></b>
                                                            </h5>
                                                            <p style="line-height: 25px;">We reserve the right to
                                                                withdraw or amend this Website, and any service or
                                                                material we provide on the Website,
                                                                in our sole discretion without notice. We will not be
                                                                liable if for any reason all or any
                                                                part of the Website is unavailable at any time or for
                                                                any period. From time to time, we may
                                                                restrict access to some parts of the Website, or the
                                                                entire Website, to users, including registered users.
                                                                You are responsible for both: (1) Making all
                                                                arrangements necessary for you to have access to the
                                                                Website; and (
                                                                2) Ensuring that all persons who access the Website
                                                                through your internet connection are aware of these
                                                                Terms of Use and comply with them. <br> <br>

                                                                To access the Website or some of the resources it
                                                                offers, you may be asked to provide certain registration
                                                                details or
                                                                other information. It is a condition of your use of the
                                                                Website that all the information you provide on the
                                                                Website is correct, current, and complete.
                                                                You agree that all information you provide to register
                                                                with this Website or otherwise, including, but not
                                                                limited to, through the use of any interactive features
                                                                on the Website,
                                                                is governed by our Privacy Policy, and you consent to
                                                                all actions we take with respect to your information
                                                                consistent with our Privacy Policy, <br><br>
                                                                If you choose, or are provided with, a user name,
                                                                password, or any other piece of information as part of
                                                                our security procedures,
                                                                you must treat such information as confidential, and you
                                                                must not disclose it to any other person or entity.
                                                                You also acknowledge that your account is personal to
                                                                you and agree not to provide any other person with
                                                                access
                                                                to this Website or portions of it using your user name,
                                                                password, or other security information. You agree to
                                                                notify
                                                                us immediately of any unauthorized access to or use of
                                                                your user name or password or any other breach of
                                                                security. You also agree
                                                                to ensure that you exit from your account at the end of
                                                                each session. You should use particular caution when
                                                                accessing your account
                                                                from a public or shared computer so that others are not
                                                                able to view or record your password or other personal
                                                                information.</p>
                                                            <hr>
                                                            <h5><b><u>Trademarks</u></b></h5>
                                                            <p style="line-height: 25px;">The Company name and logo,
                                                                and all related names, logos, product and service names,
                                                                designs,
                                                                and slogans are trademarks of the Company or its
                                                                affiliates or licensors.
                                                                You must not use such marks without the prior written
                                                                permission of the Company.
                                                                All other names, logos, product and service names,
                                                                designs, and slogans on this Website are the trademarks
                                                                of their respective owners.</p>
                                                            <hr>
                                                            <h5><b><u>Monitoring and Enforcement; Termination</u></b>
                                                            </h5>
                                                            <p style="line-height: 25px;">The Company has the right to
                                                                take appropriate legal action, including without
                                                                limitation, referral to law enforcement,
                                                                for any illegal or unauthorized use of the Website,
                                                                and to terminate or suspend your access to all or part
                                                                of the Website for any or no reason, including without
                                                                limitation, any violation of these Terms of Use.</p>
                                                            <hr>
                                                            <h5><b><u>Information About You and Your Visits to the
                                                                        Website</u></b></h5>
                                                            <p style="line-height: 25px;">All information the Company
                                                                collects on this Website is subject to its Privacy
                                                                Policy.
                                                                By using the Website, you consent to all actions taken
                                                                by the
                                                                Company with respect to your information in compliance
                                                                with the Privacy Policy.</p>
                                                            <hr>
                                                            <h5><b><u>Links from the Website</u></b></h5>
                                                            <p style="line-height: 25px;">If the Website contains links
                                                                to other sites and resources provided by third parties,
                                                                these links are provided for your convenience only.
                                                                We have no control over the contents of those sites or
                                                                resources, and accept no responsibility for them or for
                                                                any loss or
                                                                damage that may arise from your use of them.
                                                                If you decide to access any of the third-party websites
                                                                linked to this Website, you do so entirely
                                                                at your own risk and subject to the terms and conditions
                                                                of use for such websites.</p>
                                                            <hr>
                                                            <h5><b><u>Entire Agreement</u></b></h5>
                                                            <p style="line-height: 25px;">The Terms of Use and Privacy
                                                                Policy constitute the sole and entire agreement between
                                                                you and the Company regarding the Website and
                                                                supersede all prior and contemporaneous understandings,
                                                                agreements, representations, and warranties,
                                                                both written and oral, regarding the Website.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn grey btn-outline-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade text-left" id="large" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel17"
                                                style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h4>MERITA DIAGNOSTIC CLINIC INC.</h4>
                                                            <h5 class="mt-3">DATA PRIVACY CONSENT</h5>
                                                            <p class="my-1">In compliance with the Data Privacy Act
                                                                (DPA) of 2012, and its Implementing Rules and
                                                                Regulations (IRR)
                                                                effective since September 8, 2016, I allow The Merita
                                                                Diagnostic Clinic Inc. to process my data for overseas
                                                                employment compliance.</p>
                                                            <p class="my-1">As such, I agree and authorize Merita
                                                                Diagnostic Clinic Inc. to:</p>
                                                            <div class="container">
                                                                <ol>
                                                                    <li>Continue to use my data and my policies'
                                                                        information to process my medical as stated in
                                                                        my policy (ies).</li>
                                                                    <li>Retain my information for a period of five (5)
                                                                        years from the date of termination of my policy,
                                                                        or at such time that I submit to Merita
                                                                        Diagnostic Clinic Inc.,
                                                                        a written cancellation of this consent,
                                                                        whichever is earlier.
                                                                        I agree that my information will be deleted /
                                                                        destroyed after this period.</li>
                                                                    <li>Retain my data in the Medical Information
                                                                        Database shared with other diagnostic clinics if
                                                                        necessary in accordance with the Data Privacy
                                                                        Act Regulations.</li>
                                                                    <li>Share my information to affiliates and necessary
                                                                        third parties for any legitimate medical purpose
                                                                        or transmit data to other countries for the
                                                                        compliance of its own with the request of their
                                                                        employer. I am assured that security systems are
                                                                        employed to protect my information.</li>
                                                                    <li>Inform me of future customer campaigns and base
                                                                        its offer using the personal information I
                                                                        shared with the company.
                                                                        I also acknowledge and warrant that I have
                                                                        acquired the consent from all parties relevant
                                                                        to this consent
                                                                        and hold free and harmless and indemnify Merita
                                                                        Diagnostic Clinic Inc.
                                                                        from any complaint, suit, or damages which any
                                                                        party may file or claim in relation to my
                                                                        consent.</li>
                                                                </ol>
                                                            </div>
                                                            <p>I have read and understand the information provided in
                                                                this Patient Data Protection Consent for Merita
                                                                Diagnostic Clinic Inc.,
                                                                have had any questions about it answered, and hereby
                                                                voluntarily provide my express consent to the
                                                                collection, use, processing, transfer, disclosure and
                                                                Personal Data
                                                                (including medical information and sensitive data) as
                                                                described in this Patient Data Protection Consent for
                                                                Merita Diagnostic Clinic Inc.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn grey btn-outline-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p
                                                class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 mt-3">
                                                <span>Have an account in Merita ?</span>
                                            </p>
                                            <div class="card-body">
                                                <a href="/" class="loginbtn"> Click Here To Login Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#user-password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/form-login-register.js"></script>
    <script src="../../../app-assets/js/scripts/custom.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
