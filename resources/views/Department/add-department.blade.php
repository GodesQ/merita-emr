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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Add Department</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="/store_department" method="POST">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="feather icon-user"></i>Department</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Department Name</label>
                                                        <input type="text" class="form-control" value=""
                                                            name="dept">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="/list_department" class="btn btn-warning mr-1">
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
            </section>
        </div>
    </div>
@endsection
