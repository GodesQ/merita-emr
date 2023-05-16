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
<div class="app-content content">
    <div class="content-body my-2">
        <section id="basic-form-layouts">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Employee</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">

                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2 rounded">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @if(Session::get('success'))
                                @push('scripts')
                                    <script>
                                        toastr.success('{{ Session::get("success")}}', 'Success');
                                    </script>
                                @endpush
                            @endif
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" role="tab" aria-selected="true">Edit Employee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" role="tab" aria-selected="false">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div class="tab-pane active" id="tab1" role="tabpanel" aria-labelledby="base-tab1">
                                    <form name="frm" method="POST" action="{{ route('employee.update') }}" id="update_employee" role="form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel18" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel18"><i class="fa fa-camera"></i>
                                                            Take Picture
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
                                                            onclick="snapShot()">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="0"
                                                class="table table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Employee Code</b></td>
                                                        <td><input name="employeecode" id="employeecode" type="text"
                                                                class="form-control" value="{{$employee->employeecode}}"
                                                                readonly=""></td>
                                                        <td></td>
                                                        <td align="right" valign="top">
                                                            <img src="@php echo $employee->signature @endphp" alt=""
                                                                class="signature-taken mt-4">
                                                            @if($employee->employee_image == null || $employee->employee_image == " ")
                                                            <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                                alt="Profile Picture" data-toggle="modal"
                                                                data-target="#defaultSize"
                                                                class="users-avatar-shadow rounded open-camera image-taken"
                                                                onclick="openCamera()" height="64" width="64">
                                                            @else
                                                            <img src="../../../app-assets/images/employees/{{$employee->employee_image}}"
                                                                data-toggle="modal" data-target="#defaultSize"
                                                                alt="Profile Picture"
                                                                class="users-avatar-shadow open-camera image-taken"
                                                                onclick="openCamera()" height="64" width="64">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" name="id" value="{{$employee->id}}">
                                                        <input type="hidden" name="old_image"
                                                            value="{{$employee->employee_image}}">
                                                        <input type="hidden" name="employee_image" class="patient-image"
                                                            value="{{$employee->employee_image}}">
                                                        <input type="hidden" name="signature" id="signature_data" value="">
                                                        <input type="hidden" name="old_signature" id="old_signature"
                                                            value="{{$employee->signature}}">
                                                        <td><b>Last Name</b></td>
                                                        <td>
                                                            <input name="lastname" id="lastname" type="text"
                                                                class="form-control lastname" value="{{$employee->lastname}}">
                                                        </td>
                                                        <td><b>First Name</b></td>
                                                        <td><input name="firstname" id="firstname" type="text"
                                                                class="form-control" value="{{$employee->firstname}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Middle Name</b></td>
                                                        <td><input name="middlename" id="middlename" type="text"
                                                                class="form-control" value="{{$employee->middlename}}"></td>
                                                        <td><b>Email</b></td>
                                                        <td><input name="email" id="email" type="text" class="form-control"
                                                                value="{{$employee->email}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Username</b></td>
                                                        <td>
                                                            <div id="uservalid"></div>
                                                            <input name="username" id="username" type="text"
                                                                class="form-control" value="{{$employee->username}}">
                                                        </td>
                                                        <td>
                                                            <b>Title</b>
                                                        </td>
                                                        <td><input name="title" id="title" type="text" class="form-control"
                                                                value="{{$employee->title}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Position</b></td>
                                                        <td><input name="position" id="position" type="text"
                                                                class="form-control" value="{{$employee->position}}"></td>
                                                        <td><b>License No./Certificate No./PRC No.</b></td>
                                                        <td><input name="license_no" id="license_no" type="text"
                                                                class="form-control" value="{{$employee->license_no}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Address</b></td>
                                                        <td><input name="address" id="address" type="text" class="form-control"
                                                                value="{{$employee->address}}"></td>
                                                        <td> <b>Contact No.</b></td>
                                                        <td><input name="contactno" id="address" type="text"
                                                                class="form-control" value="{{$employee->contactno}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Other Position</b></td>
                                                        <td><input name="otherposition" id="address" type="text"
                                                                class="form-control" value="{{$employee->otherposition}}"></td>
                                                        <td><b> Religion</b></td>
                                                        <td><input name="religion" id="address" type="text" class="form-control"
                                                                value="{{$employee->religion}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gender</b></td>
                                                        <td>
                                                            <select name="gender" id="address" type="text" class="form-control">
                                                                <option value="Male" {{$employee->gender == "Male" ? "selected" : null}}>Male</option>
                                                                <option value="Female" {{$employee->gender == "Female" ? "selected" : null}}>Female</option>
                                                            </select>
                                                        </td>
                                                        <td><b> Marital Status</b></td>
                                                        <td><select name="maritalstatus" id="address" type="text"
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Birthdate</b></td>
                                                        <td><input name="birthdate" id="address" type="date" max="2050-12-31"
                                                                class="form-control" value="{{ $employee->birthdate }}"></td>
                                                        <td><b>Birthplace</b></td>
                                                        <td><input name="birthplace" id="address" type="text"
                                                                class="form-control" value="{{ $employee->birthplace }}"></td>
                                                    </tr>
                                                    <!--<tr>-->
                                                    <!--    <td><b>Password</b></td>-->
                                                    <!--    <td><input name="password" id="password" type="password"-->
                                                    <!--            class="form-control" value="{{ $employee->password }}"></td>-->
                                                    <!--</tr>-->
                                                    <tr>
                                                        <td valign="top"><b>Signature</b></td>
                                                        <td>
                                                            <div class=" my-2">
                                                                <canvas class="signature" width="320" height="95"></canvas> <br>
                                                                <button type='button' class="btn btn-solid btn-primary clear-signature">Clear</button>
                                                            </div>
                                                        </td>

                                                        <td><b>Department</b></td>
                                                        <td>
                                                            <select name="dept" id="" class="form-control select2">
                                                                <option value="{{$employee->dept_id}}">{{$employee->dept_name}}
                                                                </option>
                                                                @foreach ($departments as $department)
                                                                <option value="{{$department->id}}">{{$department->dept}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="box-footer">
                                            <button name="action" value="save" type="submit" onclick=""
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="base-tab2">
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
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../app-assets/js/scripts/signature_pad-master/js/signature_pad.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script type="text/javascript" src="https://www.sigplusweb.com/SigWebTablet.js"></script>
    <script src="../../../app-assets/js/scripts/custom.js"></script>
@endpush
