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
    <div class="toaster bg-success "><i class="feather icon-check"></i> Successfully Deleted</div>
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        <h2 class="text-bold-600">Employee Logs</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>Employee Code</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Action</th>
                            <th>Log Date</th>
                        </thead>
                        <tbody>                       
                        </tbody>
                    </table>           
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
         let table = $('.data-table').DataTable({
        processing: true,
        pageLength: 50,
        responsive: true,
        order: [[4, 'desc']],
        serverSide: true,
        ajax: '/logs_table',
        columns: [{
                data: 'employeecode',
                name: 'employeecode'
            },
            {
                data: 'employeename',
                name: 'employeename'
            },
            {
                data: 'department',
                name: 'department'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'date',
                name: 'date'
            },
        ],
    });
    </script>
@endpush