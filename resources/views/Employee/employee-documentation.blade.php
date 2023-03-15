@extends('layouts.admin-layout')

@section('name')
{{$data['employeeFirstname'] . " " . $data['employeeLastname']}}
@endsection

@section('employee_image')
@if($data['employee_image'] != null || $data['employee_image'] != "")
<img src="../../../app-assets/images/employees/{{$data['employee_image']}}" alt="avatar">
@else
<img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
@endif
@endsection

@section('content')
 <div class="app-content">
     <div class="content-body">
         <div class="container my-2">
             <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i class="feather icon-globe"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock"></i>
                                    Access of all Departments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-payment" data-toggle="pill" href="#account-vertical-payment" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Cashier Payment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Patient Panel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Employee
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-agency" data-toggle="pill" href="#account-vertical-agency" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Agency
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-package" data-toggle="pill" href="#account-vertical-package" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Package
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-department" data-toggle="pill" href="#account-vertical-department" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Departments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-request" data-toggle="pill" href="#account-vertical-request" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Requests
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-exam" data-toggle="pill" href="#account-vertical-exam" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Exams
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-floor" data-toggle="pill" href="#account-vertical-floor" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Floors
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-coa" data-toggle="pill" href="#account-vertical-coa" aria-expanded="false">
                                    <i class="feather icon-user"></i>
                                    Chart of Accounts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                    <i class="fa fa-print"></i>
                                    Print Panel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                    <i class="fa fa-print"></i>
                                    Print Transmittal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-daily" data-toggle="pill" href="#account-vertical-daily" aria-expanded="false">
                                    <i class="fa fa-print"></i>
                                    Print Daily Patients
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
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="container-fluid m-1">
                                                                <img class="img-thumbnail my-1" src="../../../app-assets/images/employee_documentation/dashboard.png">
                                                                <h3><b>All Features/Functionalities of Employee Dashboard</b></h3>
                                                                <p>1. Here you will find all the patients scheduled for today.</p>
                                                                <p>2. You can change the date where the different patients who scheduled on the date you entered will be visible.</p>
                                                                <p>3. It also shows the status of the patients who were scheduled today.</p>
                                                            </div>
                                                            <div class="container-fluid my-4 mx-1">
                                                                <h3><b>Status of Patient In Employee Dashboard</b></h3>
                                                                <p>1. <b>QUEUE -</b> Patients who have not yet been to the clinic.</p>
                                                                <p>2. <b>ADMITTED -</b> Patients who have already been in the reception of the clinic and have a copy of routing slip.</p>
                                                                <p>3. <b>TAKING EXAMS -</b> Patients who have taken exams at the clinic.</p>
                                                                <p>4. <b>MEDICAL DONE -</b> Patients who have already taken all the exams in his package.</p>
                                                                <p>5. <b>FIT TO WORK -</b> Patients who have taken all the exams in his package and does not have a findings in their exams.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>ADMINISTRATOR</h3>
                                                                <p class="mx-1">ALL ACTION IN SYSTEM (THIS DEPARTMENT CAN CREATE, READ, EDIT and DELETE, PRINT CERTIFICATES, EXAMS)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>ACCOUNTING</h3>
                                                                <p class="mx-1">ALL ACTION IN ADMISSION & CASHIER OR (THIS DEPARTMENT CAN CREATE, READ, EDIT, and DELETE)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>LABORATORY</h3>
                                                                <p class="mx-1">All ACTION IN LABORATORY EXAMS (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>RADIOLOGY</h3>
                                                                <p class="mx-1">ALL ACTION IN  XRAY AND ULTRASOUND EXAMS (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>PSYCHOLOGY</h3>
                                                                <p class="mx-1">ALL ACTION IN  PSYCHOLOGICAL AND PSYCHO BPI EXAMS (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>PHYSICIANS</h3>
                                                                <p class="mx-1">ALL ACTION IN  PHYSICAL EXAM (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>DENTAL</h3>
                                                                <p class="mx-1">ALL ACTION IN  DENTAL EXAM (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>OPTHALMOLOGY</h3>
                                                                <p class="mx-1">ALL ACTION IN  VISUAL ACUITY AND ISHIHARA EXAM (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>AUDIOMETRY</h3>
                                                                <p class="mx-1">ALL ACTION IN  AUDIOMETRY EXAM (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>HEART STATION</h3>
                                                                <p class="mx-1">ALL ACTION IN ECHO DOPPLER, ECHO PLAIN, STRESS ECHO, STRESS TEST, CRF, AND CARDIOVASCULAR EXAMS (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>NURSE SECTION</h3>
                                                                <p class="mx-1">ALL ACTION IN AUDIOMETRY, VISUAL ACUITY, ISHIHARA, PHYSICAL, CRF, AND CARDIOVASCULAR EXAMS (THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAM)</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>PROCESSING</h3>
                                                                <p class="mx-1">ALL ACTION IN ALL EXAMS(THIS DEPARTMENT CAN CREATE, READ, EDIT, PRINT EXAMS), THIS DEPARTMENT CAN ALSO PRINT ALL CERTIFICATES, PRINT TRANSMITTAL AND PRINT DAILY PATIENTS.</p>
                                                            </div>
                                                            <div class="container-fluid mx-1 my-3">
                                                                <h3>RECEPTION</h3>
                                                                <p class="mx-1">ALL ACTION IN ADMISSION AND ALL FORMS OF PATIENT(THIS DEPARTMENT CAN CREATE, READ, EDIT, AND PRINT ROUTING SLIPS.)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-payment" role="tabpanel" aria-labelledby="account-pill-payment" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/generate_payment_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Billed To</b></h3>
                                                        <p>In the Cashier Tab of the Patient Panel, the cashier needs to choose between applicant paid or billed to 
                                                            the agency, then once the cashier chose one of them, he or she need to click the button to select a biller.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Payment Type</b></h3>
                                                        <p>In Payment Type, the cashier needs to choose a payment type between exams, packages, medicine, and others. then once the cashier chose one of them, he or she needs to click the button to select a payment type.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Package</b></h3>
                                                        <p>If the Payment type of patient in admission is Billed to Agency, then it will only show the package if the cashier has chose the Billed to Agency Button in Cashier. 
                                                            If the Payment type of patient in admission is Applicant Paid, then it will only show the package if the cashier has chose the Applicant Paid Button in Cashier. </p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Exams</b></h3>
                                                        <p>In Exams, If the payment charge of exams is Billed to Agency, then it will only show the exams if the cashier has chosen the Billed to Agency Button in Cashier, 
                                                        then if the payment charge of exams is  Applicant Paid, then it will only show the exams if the cashier has chosen the Applicant Paid Button in Cashier</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Particulars</b></h3>
                                                        <p>---</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>TIN</b></h3>
                                                        <p>TIN input field is for the discount to reduce the payment, but this only works if the length of numbers is five (5).</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Sub Total</b></h3>
                                                        <p>The result of adding packages or exams. The discount and tax are not included in sub total.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Senior</b></h3>
                                                        <p>Senior is auto-generated when the TIN input field has a value and correct format. The value of the Senior is 12% of the subtotal. The Senior value will reduce to the total amount of payment.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>VAT</b></h3>
                                                        <p>VAT is auto-generated when the Compute button has clicked. The value of the VAT input field is 12% of the Sub Total. The VAT value will be added to the total amount of payment.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Cashier Print</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/cashier_print.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2><b>Medical Records</b></h2>
                                                        <p>Here you will find the medical record dates and you can click on it to find out the patient's past record.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2><b>RIGHT SIDEBAR</b></h2>
                                                        <p>Here you can see differrent functionalities of this sidebar.</p>
                                                        <ol>
                                                            <li style="list-style: square !important;">Patient Image</li>
                                                            <li style="list-style: square !important;">Patient Signature</li>
                                                            <li style="list-style: square !important;">Patient Name</li>
                                                            <li style="list-style: square !important;">Different Tabs Button</li>
                                                            <li style="list-style: square !important;">Medical Status</li>
                                                            <li style="list-style: square !important;">Medical Status Buttons</li>
                                                            <li style="list-style: square !important;">Completed Exams</li>
                                                            <li style="list-style: square !important;">On Going Exams</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2><b>Different Tabs/Button in Side Bar</b></h2>
                                                        <ol>
                                                            <li style="list-style: square !important;" class="my-1">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/patient_panel.png">
                                                                <b>Genaral Info</b> - This Tab is for all of the information of a patient including exams and medical record.
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-1">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/generate_payment_form.png">
                                                                <b>Generate/Edit Payment</b> - This tab is for cashier, It will generate and edit a patient payment after submitting a form inside of this tab.
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-1">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/re_schedule_form.png">
                                                                <b>Re-Schedule Appointment</b> - This tab will allow employee to re-schedule appointment, inside this tab you can see a input field and button for rescheduling appointment.
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-1">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/admission_form.png">
                                                                <b>Add/Edit Admission</b> - This tab will allow user to add and edit admission of patinet, After submitting a form inside this tab, the patient
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-1">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/yellow_card_form.png">
                                                                <b>Yellow Card</b> - This is for immunization records, This form is for editing or adding records of vaccination and printing yellow form.
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-1">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/print_panel_2.png">
                                                                <b>Print Panel</b> - This tab shows all certificates that can be printed and also possible to upload images or pdf certificates.
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-1"><b>Print Routing Slip</b> -  This tab is for printing routing slip</li>
                                                            <li style="list-style: square !important;" class="my-1"><b>Print Referral Slip</b> - This tab is for printing referral slip</li>
                                                            <li style="list-style: square !important;" class="my-1"><b>Print Requests</b> - This tab is for printing requests slip</li>
                                                            <li style="list-style: square !important;" class="my-1"><b>Print Data Privacy Form</b> - This tab is for printing data privacy form.</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2><b>Different Tabs in General Info</b></h2>
                                                        <ol>
                                                            <li style="list-style: square !important;" class="my-2">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/patient_panel.png">
                                                                <b>Personal Info</b> - This tab is for editing patient information of a patient
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-2">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/agency_info_form.png">
                                                                <b>Agency Info</b> - This tab is for editing agency information of a patient
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-2">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/medical_history_form.png">
                                                                <b>Medical History</b> - This is for editing medical history information of a patient
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-2">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/declaration_form.png">
                                                                <b>Declaration Form</b> - This is for editing COVID 19 DECLARATION FORM of a patient
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-2">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/basic_exams.png">
                                                                <b>Basic/Special Exams</b> - This tab is for all exams that included in basic and special exams
                                                            </li>
                                                            <li style="list-style: square !important;" class="my-2">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/lab_exams.png">
                                                                <b>Laboratory Exams</b> - This tab is for all exams that included in laboratory exams
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2><b>Medical Status</b></h2>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/medical_status_buttons.png">
                                                        <p>In the profile of a patient, In right sidebar there are four buttons for medical status, and these buttons have different functions.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h4><b>RE-ASSESSMENT BUTTON</b></h4>
                                                        <p>This button will show a modal to see the findings of the patient, and the form for submitting data for reassessment, and also 
                                                        this button will send an email to 3 different email addresses, Agency, Patient, and Merita Clinic email address.</p>
                                                        <h6>The following input fields are the data submitted to the patient:</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Remarks/Recommendations</li>
                                                            <li style="list-style: square !important;">Impression</li>
                                                            <li style="list-style: square !important;">Next Schedule Appointment</li>
                                                            <li style="list-style: square !important;">Doctor Prescription</li>
                                                            <li style="list-style: square !important;">Prescription</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h4><b>UNFIT TO WORK BUTTON</b></h4>
                                                        <p>This button will show a modal for remarks/recommendation input field required for submitting an UNFIT TO WORK FORM. 
                                                        Then after submitting this form, it will send an email to 3 different email addresses, Agency, Patient, and Merita Clinic email address.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h4><b>UNFIT TEMPORARILY BUTTON</b></h4>
                                                        <p>This button will show a modal for remarks/recommendation input field required for submitting an UNFIT TEMPORARILY TO WORK FORM. After submitting 
                                                        this form, the status of the patient will update and it will send an email to 3 different email addresses, Agency, Patient, and Merita Clinic email address.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h4><b>FIT TO WORK BUTTON</b></h4>
                                                        <p>This button will update the status of a patient and it will send an email to 3 different email addresses, Agency, Patient, and Merita Clinic email address. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/employee_list.png">
                                                        <p>To navigate in employee list, you need to click Employees in sidebar to redirect in employees list</p>
                                                        <h6>All Action Button in Employee List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Employee</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_employee_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Employee</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_employee_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-agency" role="tabpanel" aria-labelledby="account-pill-agency" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/agency_list.png">
                                                        <p>To navigate in agency list, you need to click Agency in sidebar to redirect in agency list</p>
                                                        <h6>All Action Button in Agency List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Agency</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_agency_form.png">
                                                        <p>After submitting a form when adding agency, it will send an random password email to the submitted email of agency.</p>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Agency</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_agency_form.png">
                                                        <p>In the edit form of the agency, the user can also submit a reset password email that contains a button for redirecting to the reset password form by clicking the "Reset Password Button" 
                                                        when you click this button, it will send an email to the agency to reset their password.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-package" role="tabpanel" aria-labelledby="account-pill-package" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/package_list.png">
                                                        <p>To navigate in package list, you need to click Packages in sidebar to redirect in package list</p>
                                                        <h6>All Action Button in Package List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Package</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_package_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Package</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_package_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-department" role="tabpanel" aria-labelledby="account-pill-department" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/department_list.png">
                                                        <p>To navigate in department list, you need to click Departments in sidebar to redirect in department list</p>
                                                        <h6>All Action Button in Department List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Department</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_department_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Department</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_department_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-request" role="tabpanel" aria-labelledby="account-pill-request" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/request_list.png">
                                                        <p>To navigate in request list, you need to click Requests in sidebar to redirect in request list</p>
                                                        <h6>All Action Button in Request List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Request</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_request_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Request</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_request_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-exam" role="tabpanel" aria-labelledby="account-pill-exam" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/exam_list.png">
                                                        <p>To navigate in exam list, you need to click Exams in sidebar to redirect in exam list</p>
                                                        <h6>All Action Button in Exam List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Exam</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_exam_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Exam</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_exam_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-floor" role="tabpanel" aria-labelledby="account-pill-floor" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/floor_list.png">
                                                        <p>To navigate in floor list, you need to click Floors in sidebar to redirect in floor list</p>
                                                        <h6>All Action Button in Floor List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Floor</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_floor_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Floor</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_floor_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-coa" role="tabpanel" aria-labelledby="account-pill-coa" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/coa_list.png">
                                                        <p>To navigate in floor list, you need to click Chart of Accounts in sidebar to redirect in floor list</p>
                                                        <h6>All Action Button in Chart of Accounts List</h6>
                                                        <ol>
                                                            <li style="list-style: square !important;">Add Button for new record</li>
                                                            <li style="list-style: square !important;">Edit Button for updating a record</li>
                                                            <li style="list-style: square !important;">Delete Button for deleting a record</li>
                                                        </ol>
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Add Chart of Accounts</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/add_coa_form.png">
                                                    </div>
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h3><b>Edit Chart of Accounts</b></h3>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/edit_coa_form.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/print_panel_1.png">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/print_panel_2.png">
                                                            </div>
                                                        </div>
                                                        <p>To navigate to Print Panel you need to click Report in the sidebar then inside of Report click Print Panel to redirect to the Print Panel page. The other option to navigate in Print Panel Section you need to go to Patient List and click the specific patient edit button to redirect to Patient Panel, then once you are in the Edit Patient Dashboard, you need to click Print Panel Tab to show a section of Print Panel.</p>
                                                        <h5>Certificates in Print Panel</h5>
                                                        <ol>
                                                            <li style="list-style: square !important;">MLC CERTIFICATE</li>
                                                            <li style="list-style: square !important;">MER CERTIFICATE</li>
                                                            <li style="list-style: square !important;">SKULD CERTIFICATE</li>
                                                            <li style="list-style: square !important;">WEST OF ENGLAND CERTIFICATE</li>
                                                            <li style="list-style: square !important;">CAYMAN CERTIFICATE</li>
                                                            <li style="list-style: square !important;">CROATIAN CERTIFICATE</li>
                                                            <li style="list-style: square !important;">DANISH CERTIFICATE</li>
                                                            <li style="list-style: square !important;">DIAMLEMOS CERTIFICATE</li>
                                                            <li style="list-style: square !important;">MARSHALL CERTIFICATE</li>
                                                            <li style="list-style: square !important;">MALTA CERTIFICATE</li>
                                                            <li style="list-style: square !important;">DOMINICAN CERTIFICATE</li>
                                                            <li style="list-style: square !important;">BAHAMAS CERTIFICATE</li>
                                                            <li style="list-style: square !important;">BERMUDA CERTIFICATE</li>
                                                            <li style="list-style: square !important;">SINGAPORE CERTIFICATE</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2>Transmittal</h2>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/transmittal_form.png">
                                                        <p>To navigate in Transmittal you need to click Report in sidebar then inside of Report click Transmittal to redirect in Transmittal Page.</p>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/transmittal_print.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-daily" role="tabpanel" aria-labelledby="account-pill-daily" aria-expanded="false">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid mx-1 my-2">
                                                        <h2>Daily Patients</h2>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/daily_patient_form.png">
                                                        <p>To navigate in Daily Patient Form you need to click Report in sidebar then inside of Report click  Daily Patient to redirect in  Daily Patient Page.</p>
                                                        <img class="img-thumbnail" src="../../../app-assets/images/employee_documentation/daily_patient_print.png">
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
         </div>
     </div>
 </div>
@endsection