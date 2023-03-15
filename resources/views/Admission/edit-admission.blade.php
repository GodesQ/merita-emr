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
.entry:not(:first-of-type) {
    margin-top: 10px;
}

.glyphicon {
    font-size: 12px;
}
</style>
<div class="app-content content">
    <section id="basic-form-layouts">
        <div class="container my-2">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-bold-500">Edit Admission</h2>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-title">
                                <h6>
                                    PEME Date: <?php echo date('Y-m-d'); ?>
                                </h6>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @if(Session::get('status'))
                                <div class="success alert-success p-2 my-2">
                                    {{Session::get('status')}}
                                </div>
                                @endif
                                <form class="form" method="POST" action="/update_admission">
                                    @csrf
                                    <input type="hidden" value="{{$admission->id}}" name="main_id">
                                    <div class="d-none">
                                        <input type="date" max="2050-12-31" name="trans_date" id="" hidden value="<?php echo date(
                                            'Y-m-d'
                                        ); ?>">
                                        <input type="hidden" name="package_id"
                                            value="{{$patientInfo->medical_package}}">
                                        <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                                        <input type="hidden" name="vessel" value="{{$patientInfo->vessel}}">
                                        <input type="hidden" name="country_destination"
                                            value="{{$patientInfo->country_destination}}">
                                    </div>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput1">Patient
                                                        Name</label>
                                                    <input type="text" id="projectinput1" class="form-control"
                                                        value="{{$patient->lastname}}, {{$patient->firstname}}"
                                                        name="fullname" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput1">Patient
                                                        Code</label>
                                                    <input type="text" id="projectinput1" class="form-control"
                                                        value="{{$patient->patientcode}}" name="patientcode" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput5">Category</label>
                                                    <select id="projectinput5" name="category" class="form-control">
                                                        <option value="none" selected="" disabled="">Select Category
                                                        </option>
                                                        <option value="DECK SERVICES" @php echo $admission->category ==
                                                            "DECK SERVICES" ? "selected=''" : "" @endphp>DECK SERVICES
                                                        </option>
                                                        <option value="ENGINE SERVICES" @php echo $admission->category
                                                            == "ENGINE SERVICES" ? "selected=''" : "" @endphp>ENGINE
                                                            SERVICES</option>
                                                        <option value="CATERING SERVICES" @php echo $admission->category
                                                            == "CATERING SERVICES" ? "selected=''" : "" @endphp>CATERING
                                                            SERVICES</option>
                                                        <option value="OTHER SERVICES" @php echo $admission->category ==
                                                            "OTHER SERVICES" ? "selected=''" : "" @endphp>OTHER SERVICES
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="text-bold-600" for="companyName">Position</label>
                                                        <input type="text" id="companyName" class="form-control"
                                                            placeholder="Position" name="position"
                                                            value="{{$admission->position}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput2">Employment
                                                        Type</label>
                                                    <div class="container-fluid ">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="employment1" value="Sea-Based" name="employment"
                                                                @php echo $admission->employment == "Sea-Based" ?
                                                            "checked" : "" @endphp>
                                                            <label class="custom-control-label" for="employment1">Sea
                                                                Based</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="employment2" name="employment" value="Land-Based"
                                                                @php echo $admission->employment == "Land-Based" ?
                                                            "checked" : "" @endphp>
                                                            <label class="custom-control-label" for="employment2">Land
                                                                Based
                                                            </label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="employment3" name="employment" value="Local-Based"
                                                                @php echo $admission->employment == "Local-Based" ?
                                                            "checked" : "" @endphp>
                                                            <label class="custom-control-label" for="employment3">Local
                                                                Based
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput2">Employment
                                                        Status</label>
                                                    <div class="container-fluid ">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="emp_status1" name="emp_status" value="New Crew" @php
                                                                echo $admission->emp_status == "New Crew" ? "checked" :
                                                            "" @endphp>
                                                            <label class="custom-control-label" for="emp_status1">New
                                                                Crew</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="emp_status2" name="emp_status" value="Ex-Crew" @php
                                                                echo $admission->emp_status == "Ex-Crew" ? "checked" :
                                                            "" @endphp>
                                                            <label class="custom-control-label" for="emp_status2">Ex
                                                                Crew</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput2">Admission
                                                        Type</label>
                                                    <div class="container-fluid ">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="admit_type1" name="admit_type" value="Normal" @php
                                                                echo $admission->admit_type == "Normal" ? "checked" : ""
                                                            @endphp>
                                                            <label class="custom-control-label"
                                                                for="admit_type1">Regular
                                                                Patient</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="admit_type2" name="admit_type" value="Rush" @php
                                                                echo $admission->admit_type == "Rush" ? "checked" : ""
                                                            @endphp>
                                                            <label class="custom-control-label" for="admit_type2">Rush
                                                                Patient</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-bold-600" for="projectinput2">Payment
                                                        Type</label>
                                                    <div class="container-fluid ">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                name="payment_type" id="payment_type1" value="Cash" @php
                                                                echo $admission->payment_type == "Cash" ? "checked" : ""
                                                            @endphp>
                                                            <label class="custom-control-label" for="payment_type1">Cash
                                                                Paid
                                                            </label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="payment_type2" name="payment_type" value="Charge"
                                                                @php echo $admission->payment_type == "Billed" ?
                                                            "checked" : "" @endphp>
                                                            <label class="custom-control-label"
                                                                for="payment_type2">Charge</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border my-3">
                                            <div class="card-header border bg-success text-white">
                                                <h4>Exam List
                                                </h4>
                                                <h5>Note: All exams in the package cannot be deleted.</h5>
                                            </div>
                                            <div class="card-body">
                                                @if (count($admission_exams) != 0)
                                                <div id="myRepeatingFields">
                                                    @foreach ($admission_exams as $admission_exam)
                                                    <div class="entry input-group row">
                                                        <div class="row">
                                                            <table class="table">
                                                                <thead>
                                                                    <th>Exam</th>
                                                                    <th>Charge</th>
                                                                    <th></th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <select name="exam[]" id=""
                                                                                class="form-control select2">
                                                                                <optgroup label="Exams">
                                                                                    <option
                                                                                    value="{{$admission_exam->exam_id}}">
                                                                                    {{$admission_exam->examname}}
                                                                                    </option>
                                                                                    <option value="">Select Exam</option>
                                                                                    @foreach ($exams as $exam)
                                                                                    <option value="{{$exam->id}}">
                                                                                        {{$exam->examname}}</option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input class="mx-1" name="charge[]"
                                                                                id="charge" type="checkbox"
                                                                                placeholder="Charge" value="package"
                                                                                @php echo $admission_exam->charge ==
                                                                            "package" ? "checked" : "" @endphp/>
                                                                        </td>
                                                                        <td>
                                                                            <span class="input-group-btn">
                                                                                <button type="button"
                                                                                    class="btn btn-success btn-add">
                                                                                    <span class="fa fa-plus"
                                                                                        aria-hidden="true"></span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @else
                                                <div id="myRepeatingFields">
                                                    <div class="entry input-group row">
                                                        <div class="row">
                                                            <table class="table">
                                                                <thead>
                                                                    <th>Exam</th>
                                                                    <th>Charge</th>
                                                                    <th></th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <select name="exam[]" id=""
                                                                                class="form-control select2">
                                                                                <optgroup label="Exams">
                                                                                    <option value="">Select Exam</option>
                                                                                    @foreach ($exams as $exam)
                                                                                    <option value="{{$exam->id}}">
                                                                                        {{$exam->examname}}</option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input class="mx-1" name="charge[]"
                                                                                type="checkbox" placeholder="Charge"
                                                                                value="package" />
                                                                        </td>
                                                                        <td>
                                                                            <span class="input-group-btn">
                                                                                <button type="button"
                                                                                    class="btn btn-success btn-add">
                                                                                    <span class="fa fa-plus"
                                                                                        aria-hidden="true"></span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                {{-- <div id="myRepeatingFields">
                                                    <div class="entry input-group m-1">
                                                        <input class="form-control" name="fields[]" type="text" placeholder="Placeholder" />
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-success btn-add">
                                                                    <span class="fa fa-plus" aria-hidden="true"></span>
                                                                </button>
                                                            </span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="reset" class="btn btn-warning mr-1">
                                            <i class="feather icon-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection


@push('scripts')
<script>
$(function() {
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        var controlForm = $('#myRepeatingFields:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('.charge').val('package');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-trash"></i>');
    }).on('click', '.btn-remove', function(e) {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        return false;
    });
});

// if the lab status is pending
if (`{{$admission->lab_status}}` == "Pending") {
    $(".pending-textarea").show()
    $(".done-textarea").hide();
}

// if the lab status is done
if (`{{$admission->lab_status}}` == "Medical Done") {
    $(".pending-textarea").hide()
    $(".done-textarea").show();
}


$(document).on('click', '#pending-btn', function(e) {
    $('#lab_status').val('Pending');
    $(".pending-textarea").show();
    $(".done-textarea").hide();
})

$(document).on('click', '#done-btn', function(e) {
    $('#lab_status').val('Medical Done');
    $(".done-textarea").show();
    $(".pending-textarea").hide();
})
</script>
@endpush