@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')
<style>
.nav-link {
    color: #009c9f;
}

.nav-link:hover {
    color: #009c9f;
}
</style>
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
                                <li class="breadcrumb-item"><a href="agency_dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Users</a>
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
                                        Status of Employee
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                                        href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-square"></i>
                                        Hold / Activate Referral Slip
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill"
                                        href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info"></i>
                                        How to Add Referral Slip
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
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-info">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i class="icon-question white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>REGISTERED</h2>
                                                                                    <h6> Patient has already registered (but not yet admitted).</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-danger">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-info  white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>NO EXAMS</h2>
                                                                                    <h6>Patient does not have any registered exam.</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-warning">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-pin white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>ADMITTED</h2>
                                                                                    <h6>Patient is currently admitted at the clinic to undergo medical examinations</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-secondary">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-docs  white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>TAKING EXAMS</h2>
                                                                                    <h6>Patient is currently taking medical exams.</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-primary bg-darken-3">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-check white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>MEDICAL DONE</h2>
                                                                                    <h6>Patient has completed the medical examinations (but no result yet).</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-primary bg-darken-3">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-check white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>RE ASSESSMENT</h2>
                                                                                    <h6>Patient has completed the medical examinations but needs reassessment.</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-sm-12 col-12">
                                                                <div class="card bg-success">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-check white font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="media-body white text-right">
                                                                                    <h2>FIT TO WORK</h2>
                                                                                    <h6>PATIENT COMPLETED THE EXAMS AND DONT NEED A RE-ASSESSMENT</h6>
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
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                                aria-labelledby="account-pill-password" aria-expanded="false">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>Hold/Activate Referral Slip</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <h3>HOLD REFERRRAL SLIP</h3>
                                                            <div class="container-fluid my-1">
                                                                <img class="img-fluid" src="../../../app-assets/images/gallery/hold_button.png"  alt="hold button" />
                                                                <ul>
                                                                    <li>
                                                                        <b>HOLD REFERRAL SLIP =></b>  It means that a referral slip of an employee has an issue or problem, so that the patient is not eligible to register in MERITA EMR.
                                                                    </li>
                                                                    <li>
                                                                        Once you click hold referral slip, The Patient that you click hold button and Merita will be emailed that this referral slip is hold,
                                                                        and also the specific row of patient will be grayed out.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <h3>ACTIVATE REFERRRAL SLIP</h3>
                                                            <div class="container-fluid my-1">
                                                                <img class="img-fluid" src="../../../app-assets/images/gallery/activate_button.png"  alt="hold button" />
                                                                <ul>
                                                                    <li>
                                                                        <b>ACTIVATE REFERRAL SLIP =></b>  It means that a referral slip of employees is acceptable, so that patient is now applicable to register in MERITA EMR.
                                                                    </li>
                                                                    <li>
                                                                        Once you click activate referral slip, The patient that you click activate button and Merita Clinic will be emailed that a specified referral slip of patient is activated,
                                                                        and the specific row of patient will back into a normal row.
                                                                    </li>
                                                                </ul>
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
                                                            <h2>Add Referral Slip</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p>To Add Referral Slip click <b>ADD REFERRAL SLIP</b> button in the header of dashboard, this button will redirect a user to a referral form.</p>
                                                                    <img class="img-fluid" src="../../../app-assets/images/gallery/referral _form_button.png"  alt="add refferral button" />
                                                                </div>
                                                                <div class="col-md-12 my-1">
                                                                    <p>The image below is the form of a referral slip.</p>
                                                                    <img class="img-fluid" src="../../../app-assets/images/gallery/referral_form.png"  alt="hold button" />
                                                                    <p>After the requestor fills out all required inputs, click Save Button to save and send an email with an information of all data, based on the form submitted by the requestor and an attachment of a Printable PDF of Referral Slip to MERITA email and the Employee email. </p>
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
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->
            </div>
        </div>
    </div>
</div>
@endsection
