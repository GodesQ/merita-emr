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
    <section id="basic-form-layouts">
        <div class="container my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Add Chart Account</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" action="#" id="add_coa_form" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="card  border border-success">
                                        <div class="card-header bg-success text-white text-center border-success">
                                            <h4 class="text-bold-500">Legend</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"> Current
                                                            Assets(10000-19999)</li>
                                                        <li class="list-group-item"> Non-Current Assets(20000-29999)
                                                        </li>
                                                        <li class="list-group-item"> LIABILITIES (30000-39999)</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"> EQUITY(40000-49999)</li>
                                                        <li class="list-group-item"> INCOME(50000-59999)
                                                        </li>
                                                        <li class="list-group-item"> EXPENSE(60000-69999)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Account Code</label>
                                                <input readonly value="{{$latestCoa}}" type="text" id="projectinput1"
                                                    class="form-control validate" placeholder="First Name"
                                                    name="account_code" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput2">Account Title </label>
                                                <input type="text" id="projectinput2" class="form-control validate"
                                                    placeholder="Account Title" name="account_title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput3">Parent Code</label>
                                                <select required name="parent_code" id=""
                                                    class="form-control validate select2">
                                                    <option value=" " readonly>Select Parent Code</option>
                                                    @foreach($coa as $co)
                                                    <option value="{{$co->account_code}}">{{$co->account_title}} /
                                                        ({{$co->account_code}})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <a href="/actgmast_coa" class="btn btn-warning mr-1">
                                            <i class="feather icon-x"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o" id="add_coa_button"></i> Save
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $("#add_coa_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
            url: '/store_coa',
            method: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.status == 200) {
                    Swal.fire(
                        'Added!',
                        'Chart Account Added Successfully!',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.href = '/actgmast_coa';
                        }
                    })
                } else {
                    Swal.fire(
                        'Not Send!',
                        'Chart Account Added Failed!',
                        'warning'
                    )
                }
            }
        });
    });
});
</script>
@endpush