@extends('layouts.app')

@section('name')
{{$data['firstname'] . " " . $data['lastname']}}
@endsection

@section('patient_image')
@if($data['patient_image'] != null || $data['patient_image'] != "")
<img src="../../../app-assets/images/profiles/{{$data['patient_image']}}" alt="avatar">
@else
<img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
@endif
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="container">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Documentation</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Patient</a>
                                </li>
                                <li class="breadcrumb-item active">Documentation
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
                                        href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe"></i>
                                        Step by Step Form
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                                        href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-square"></i>
                                        Schedule Appointment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill"
                                        href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info"></i>
                                        Notifications
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill"
                                        href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-file"></i>
                                        Remedical
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill"
                                        href="#account-vertical-connections" aria-expanded="false">
                                        <i class="feather icon-calendar"></i>
                                        Medical Records
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="container-fluid m-1">
                                                                    <h3>FIRST STEP <span class="h6">(PERSONAL INFORMATION)</span></h3>
                                                                    <p>Personal Information contains all of your personal Information for identification.</p>
                                                                    <img src="../../../app-assets/images/patient_documentation/personal_info_step.png" class="img-fluid my-1">
                                                                </div>
                                                                <div class="container-fluid m-1">
                                                                    <h3>SECOND STEP <span class="h6">(AGENCY INFORMATION)</span></h3>
                                                                    <p>Agency Information contains all of the information related to your agency. Check the referral 
                                                                    slip in your email to answer those input filled in the Agency Information Form.</p>
                                                                    <img src="../../../app-assets/images/patient_documentation/agency_info_step.png" class="img-fluid my-1">
                                                                </div>
                                                                <div class="container-fluid m-1">
                                                                    <h3>THIRD STEP <span class="h6">(MEDICAL HISTORY)</span></h3>
                                                                    <p>The Medical History Form contains all medical questions that you need to answer. This Form has a total of 51 Medical questions.</p>
                                                                    <img src="../../../app-assets/images/patient_documentation/medical_step.png" class="img-fluid my-1">
                                                                </div>
                                                                <div class="container-fluid m-1">
                                                                    <h3>FOURTH STEP <span class="h6">(DECLARATION FORM)</span></h3>
                                                                    <p>Declaration Form contains of COVID 19 related questions. This form is required.</p>
                                                                    <img src="../../../app-assets/images/patient_documentation/declaration_step.png" class="img-fluid my-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                                aria-labelledby="account-pill-password" aria-expanded="false">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="container my-1">
                                                            <h3>ADD SCHEDULE</h3>
                                                            <div class="container-fluid m-1">
                                                                <img src="../../../app-assets/images/patient_documentation/add_schedule_button.png" class="img-fluid my-1">
                                                                <p>This button redirects you to the schedule appointment form for adding a schedule.</p>
                                                            </div>
                                                            <div class="container-fluid m-1">
                                                                <img src="../../../app-assets/images/patient_documentation/add_schedule.png" class="img-fluid my-1">
                                                                <p>This the form for scheduling a patient. After you submit this form your account will appear in the reception dashboard of the clinic on the specif date on your submitted form.</p>
                                                            </div>
                                                        </div>
                                                        <div class="container my-1">
                                                            <h3>EDIT SCHEDULE</h3>
                                                            <div class="container-fluid m-1">
                                                                <img src="../../../app-assets/images/patient_documentation/re-schedule.png" class="img-fluid my-1">
                                                                <p>To reschedule an appointment you need to click "Do you want to Re Schedule?" for you  to be  redirected in a rescheduled appointment form.</p>
                                                            </div>
                                                            <div class="container-fluid m-1">
                                                                <img src="../../../app-assets/images/patient_documentation/re-schedule-form.png" class="img-fluid my-1">
                                                                <p>This is Re Schedule Form. The schedule will update once the patient submit Re Schedule Form.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                aria-labelledby="account-pill-info" aria-expanded="false">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>Notifications</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <img src="../../../app-assets/images/patient_documentation/notifications.png" class="img-fluid my-1">
                                                            <p>There are two notifications in the Patient Dashboard. First is the date of your schedule, Second is laboratory result status. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="account-vertical-social" aria-labelledby="account-pill-social" aria-expanded="true">
                                                <div class="card"> 
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>Remedical</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <img src="../../../app-assets/images/patient_documentation/remedical_button.png" class="img-fluid my-1">
                                                            <p>This button will redirect you to the Re Medical Form (This is the same as step by step form).</p>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <img src="../../../app-assets/images/patient_documentation/remedical_form.png" class="img-fluid my-1">
                                                            <p>This form is like a register step-by-step form, but this remedical form is adding a new record of patient for remedical in the clinic. The other input filled in this form is auto generated because of the old record.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="account-vertical-connections" aria-labelledby="account-pill-connections" aria-expanded="true">
                                                <div class="card"> 
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>Medical Records</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <img src="../../../app-assets/images/patient_documentation/medical_records_patient.png" class="img-fluid my-1">
                                                            <p>Medical Records is a list of all dates of his/her records, these dates are clickable to see a record from the date you click. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->
            </div>
        </div>
    </div>
</div>
@endsection