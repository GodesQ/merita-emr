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
        <section id="basic-form-layouts d-flex">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Daily Patient List</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="/daily_patient" method="GET" target="_blank">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="feather icon-user"></i>Daily Patient List</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Schedule Date</label>
                                                            <input type="date" required class="form-control"  value="" name="date_from">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Schedule Date</label>
                                                            <input type="date" required class="form-control"  value="" name="date_to">
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <a href="/dashboard" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </a>
                                                <input type="submit" name="action" value="Download CSV" class="btn btn-primary">
                                                <input type="submit" name="action" value="PRINT" class="btn btn-primary">
                                            </div>
                                    </form>
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

@endpush