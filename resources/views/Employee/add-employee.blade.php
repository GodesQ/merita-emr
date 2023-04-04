@extends('layouts.admin-layout')

@section('name')
    {{ $data['employeeFirstname'] . ' ' . $data['employeeLastname'] }}
@endsection

@section('employee_image')
    @if ($data['employee_image'] != null || $data['employee_image'] != '')
        <img src="../../../app-assets/images/employees/{{ $data['employee_image'] }}" alt="avatar">
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
                            <h4 class="card-title" id="basic-layout-form">Add Employee</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <span class="badge-danger rounded">
                                    @error('employee_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <form name="frm" method="POST" action="/store_employees" role="form">
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
                                                        onclick="snapShot()">Save
                                                        changes</button>
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
                                                            class="form-control" value="{{ $employeeCode }}" readonly="">
                                                    </td>
                                                    <td></td>
                                                    <td align="right" valign="top"><button type="button"
                                                            data-toggle="modal" data-target="#defaultSize"
                                                            class="btn-solid btn open-camera" onclick="openCamera()"><img
                                                                src="../../../app-assets/images/profiles/profilepic.jpg"
                                                                class="image-taken" alt="Employee Picture" width="150"
                                                                height="150"
                                                                style="border: 1px solid gray; margin-left: 10px"></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <input type="hidden" name="employee_image" class="patient-image">
                                                    <input type="hidden" name="signature" id="signature_data">
                                                    <td><b>Last Name <span class="danger text-danger">*</span></b></td>
                                                    <td>
                                                        <input name="lastname" id="lastname" type="text"
                                                            class="form-control lastname" value="">
                                                        <span class="text-danger danger">
                                                            @error('lastname')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </td>
                                                    <td><b>First Name <span class="danger text-danger">*</span></b></td>
                                                    <td>
                                                        <input name="firstname" id="firstname" type="text"
                                                            class="form-control" value="">
                                                        <span class="text-danger danger">
                                                            @error('firstname')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Middle Name</b></td>
                                                    <td><input name="middlename" id="middlename" type="text"
                                                            class="form-control" value=""></td>
                                                    <td><b>Email <span class="danger text-danger">*</span></b></td>
                                                    <td><input name="email" id="email" type="text"
                                                            class="form-control" value="">
                                                        <span class="danger text-danger">
                                                            @error('email')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Username <span class="danger text-danger">*</span></b></td>
                                                    <td>
                                                        <div id="uservalid"></div>
                                                        <input name="username" id="username" type="text"
                                                            class="form-control" value="">
                                                        <span class="text-danger danger">
                                                            @error('username')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </td>
                                                    <td><b>Password <span class="danger text-danger">*</span></b></td>
                                                    <td>
                                                        <input name="password" id="password" type="password"
                                                            class="form-control" value="">
                                                        <span class="text-danger danger">
                                                            @error('password')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Title</b></td>
                                                    <td><input name="title" id="title" type="text" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Position <span class="danger text-danger">*</span></b></td>
                                                    <td><input name="position" id="position" type="text" class="form-control" value="">
                                                        <span class="text-danger danger">
                                                            @error('title')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Old Code</b></td>
                                                    <td><input name="oldcode" id="oldcode" type="oldcode"
                                                            class="form-control" value=""></td>
                                                    <td><b>License No./Certificate No./PRC No.</b></td>
                                                    <td><input name="license_no" id="license_no" type="number"
                                                            class="form-control" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Address</b></td>
                                                    <td><input name="address" id="address" type="text"
                                                            class="form-control" value=""></td>
                                                    <td> <b>Contact No.</b></td>
                                                    <td><input name="contactno" id="address" type="text"
                                                            class="form-control" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Other Position</b></td>
                                                    <td><input name="otherposition" id="address" type="text"
                                                            class="form-control" value=""></td>
                                                    <td><b> Religion</b></td>
                                                    <td><input name="religion" id="address" type="text"
                                                            class="form-control" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Gender</b></td>
                                                    <td>
                                                        <select name="gender" id="address" type="text"
                                                            class="form-control" value="">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </td>
                                                    <td><b> Marital Status</b></td>
                                                    <td><select name="maritalstatus" id="address" type="text"
                                                            class="form-control" value="">
                                                            <option value="">Select Civil Status</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Divorced">Divorced</option>
                                                            <option value="Domestic Relationship">Domestic
                                                                Relationship</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Birthdate</b></td>
                                                    <td><input name="birthdate" id="address" type="date"
                                                            max="2050-12-31" class="form-control" value=""></td>
                                                    <td><b>Birthplace</b></td>
                                                    <td><input name="birthplace" id="address" type="text"
                                                            class="form-control" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Signature</b></td>
                                                    <td>
                                                        <div class=" my-2">
                                                            <canvas class="signature" width="320"
                                                                height="95"></canvas> <br>
                                                            <button type='button'
                                                                class="btn btn-solid btn-primary clear-signature">Clear</button>
                                                        </div>
                                                    </td>

                                                    <td><b>Department</b></td>
                                                    <td>
                                                        <select name="dept" id=""
                                                            class="form-control select2">
                                                            <option value="">Select Department</option>
                                                            @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}">
                                                                    {{ $department->dept }}
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
