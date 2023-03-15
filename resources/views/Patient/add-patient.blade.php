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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Add Patient</h2>
            </div>
            <hr>
            <div class="card-body">
                @foreach ($errors->all() as $error)
                @push('scripts')
                <script>
                let toaster = toastr.error('{{$error}}', 'Error');
                </script>
                @endpush
                @endforeach
                <form action="/store_patient" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link primary active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" role="tab" aria-selected="true">Personal Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link primary" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" role="tab" aria-selected="false">Agency Info</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active" id="tab1" role="tabpanel" aria-labelledby="base-tab1">
                            <div class="row my-1">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <!-- <img src="../../../app-assets/images/profiles/profilepic.jpg" class="image-taken"> -->
                                        <input required type="file" class="form-control" id="patient_image" name="patient_image" readonly> 
                                        <div class="my-75">
                                            <!-- <button type="button" class="btn btn-solid btn-primary"><i class="fa fa-camera"></i> Take Picture</button> -->
                                            <button type="button" onclick="document.querySelector('#patient_image').click()" class="btn btn-solid btn-primary"><i class="fa fa-upload"></i> Upload Image</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Firstname</label>
                                        <input  type="text" name="firstname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Lastname</label>
                                        <input  type="text" name="lastname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Middlename <span class="primary mx-50">(If not applicable, please write N/A)</span></label>
                                        <input  type="text" name="middlename" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select name="gender" id="gender" class="select2">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Birthdate</label>
                                        <input  type="date" onchange="getAge(this)" max="3333-12-31" name="birthdate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input  type="number" readonly name="age" id="age" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Birth Place</label>
                                        <input  type="text" name="birthplace" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input  type="text" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Occupation</label>
                                        <input  type="text" name="occupation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Religion</label>
                                        <input  type="text" name="religion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input  type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nationality</label>
                                        <input  type="text" name="nationality" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Civil Status</label>
                                        <select  name="maritalstatus" class="form-control" name="civilStatus" aria-invalid="false">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Domestic Relationship">Domestic
                                                Relationship</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact NO.</label>
                                        <input  type="tel" name="contactno" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="base-tab2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Agency</label>
                                        <select onchange="getPackages(this)" name="agency" id="agency" class="select2">
                                            <option value="">Select Agency</option>
                                            @foreach($agencies as $agency)
                                                <option value="{{$agency->id}}">{{$agency->agencyname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Country of Destination</label>
                                        <input type="text" class="form-control" name="country_destination">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Passport No.</label>
                                        <input type="text" class="form-control" name="passportno">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Passport Exp Date</label>
                                        <input type="date" class="form-control" name="passport_expdate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">SRB No</label>
                                        <input type="text" class="form-control" name="srbno">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">SRB Exp Date</label>
                                        <input type="date" class="form-control" name="srb_expdate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Vessel</label>
                                        <input type="text" class="form-control" name="vessel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Position Applied</label>
                                        <input type="text" class="form-control" name="position_applied">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Medical Package</label>
                                        <select name="medical_package" id="packages" class="select2">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <a href="/patients" class="btn btn-warning mr-1">
                            <i class="feather icon-x"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function getAge(e) {
    var today = new Date();
    var birthDate = new Date(e.value);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    const ageInput = document.querySelector("#age");
    ageInput.value = age;
}

function getPackages(e) {
    let csrf = '{{ csrf_token() }}';
    $.ajax({
        url: '{{route("agencies.select")}}',
        method: 'post',
        data: {
            id: e.value,
            _token: csrf
        },
        success: function(response) {
            $('#packages option').remove();
            response[0].forEach(element => {
                $(`<option value=${element.id}>${element.packagename}</option>`).appendTo(
                    '#packages');
            });
        }
    });
}
</script>
@endpush