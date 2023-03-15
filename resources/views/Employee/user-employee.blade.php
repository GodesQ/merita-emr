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
<style>
    .signature {
        width: 430px !important;
        height: 150px;
        border: 1px solid black;
    }
</style>
<div class="app-content content">
    @if(Session::get('success'))
        @push('scripts')
            <script>
                toastr.success('{{ Session::get("success")}}', 'Success');
            </script>
        @endpush
    @endif
    <div class="container">
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="password-tab" data-toggle="tab" href="#password" aria-controls="password" role="tab" aria-selected="false">
                                    <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">Password Settings</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="media mb-2">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$employee->firstname}} {{$employee->lastname}}</h4>
                                                <div class="col-12 px-0 d-flex">
                                                    <button href="#" class="btn btn-sm btn-primary mr-25 p-75" onclick="openCamera()" data-toggle="modal" data-target="#defaultSize">Change Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel18" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel18"><i class="fa fa-camera"></i>
                                                    Take
                                                    Picture
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center align-items-center">
                                                <div class="camera"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-outline-primary"
                                                    onclick="snapShot()">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-2">
                                        @if($employee->employee_image == null || $employee->employee_image == " ")
                                            <img src="../../../app-assets/images/profiles/profilepic.jpg" alt="Profile Picture" class="users-avatar-shadow rounded open-camera image-taken" height="64" width="64">
                                        @else
                                                <img src="../../../app-assets/images/employees/{{$employee->employee_image}}" class="users-avatar-shadow open-camera image-taken" height="64" width="64">
                                        @endif
                                        <img src="@php echo $employee->signature @endphp" alt="" class="signature-taken">
                                    </div>
                                </div>
                                <form id="update_profile" role="form" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$employee->id}}">
                                        <input type="hidden" name="old_image"
                                                    value="{{$employee->employee_image}}">
                                        <input type="hidden" name="employee_image" class="patient-image"
                                                    value="{{$employee->employee_image}}">
                                        <input type="hidden" name="signature" id="signature_data" value="">
                                        <input type="hidden" name="old_signature" id="old_signature"
                                            value="{{$employee->signature}}">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group d-none">
                                                <label for="">Employee Code</label>
                                                <input name="employeecode" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->employeecode}}"
                                                            readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Firstname</label>
                                                <input name="firstname" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->firstname}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Lastname</label>
                                                <input name="lastname" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->lastname}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Middle Name</label>
                                                <input name="middlename" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->middlename}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">User Name</label>
                                                <input name="username" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->username}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input name="email" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input name="address" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <select class="form-control" name="gender" id="">
                                                    <option value="" {{$employee->gender == "" ?  "selected" : null}}>SELECT</option>
                                                    <option value="Male" {{$employee->gender == "Male" ?  "selected" : null}}>Male</option>
                                                    <option value="Female" {{$employee->gender == "Female" ?  "selected" : null}}>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input name="title" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->title}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="">Religion</label>
                                                <input name="religion" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->religion}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Marital Status</label>
                                                <select required name="maritalstatus" id="address" type="text"
                                                        class="form-control">
                                                        <option value="">Select Civil Status</option>
                                                        <option value="Single" @php echo $employee->maritalstatus ==
                                                            "Single" ? "selected=''" : "" @endphp >Single</option>
                                                        <option value="Married" @php echo $employee->maritalstatus ==
                                                            "Married" ? "selected=''" : "" @endphp >Married</option>
                                                        <option value="Widowed" @php echo $employee->maritalstatus ==
                                                            "Widowed" ? "selected=''" : "" @endphp >Widowed</option>
                                                        <option value="Divorced" @php echo $employee->maritalstatus ==
                                                            "Divorced" ? "selected=''" : "" @endphp >Divorced</option>
                                                        <option value="Domestic Relationship" @php echo $employee->
                                                            maritalstatus == "Domestic Relationship" ? "selected=''" :
                                                            "" @endphp >Domestic
                                                            Relationship</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Birth Date</label>
                                                <input name="birthdate" id="employeecode" type="date" max="2050-12-31"
                                                            class="form-control" value="{{$employee->birthdate}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Birth Place</label>
                                                <input name="birthplace" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->birthplace}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Position</label>
                                                <input name="position" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->position}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input name="address" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">License No./Certificate No./PRC No.</label>
                                                <input name="license_no" id="employeecode" type="text"
                                                            class="form-control" value="{{$employee->license_no}}">
                                            </div>
                                            <div class="form-group">
                                                <div class=" my-2">
                                                    <canvas class="signature" width="320" height="95"></canvas> <br>
                                                    <button type='button' class="btn btn-solid btn-primary clear-signature">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                changes</button>
                                            <button onclick="history.back()" type="button" class="btn btn-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit Info form ends -->
                            </div>
                            <div class="tab-pane" id="password" aria-labelledby="password-tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="employee_change_password" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$employee->id}}"/>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control" />
                                                <span class="danger text-danger">@error('password'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" />
                                                <span class="danger text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                                            </div>
                                            <button class="btn btn-primary btn-solid">Submit</button>
                                        </form>
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
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../../app-assets/js/scripts/signature_pad-master/js/signature_pad.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script src="../../../app-assets/js/scripts/custom.js"></script>
@endpush