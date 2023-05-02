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
    .table th,
    .table td {
        padding: 0.5rem;
        font-size: 12px;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            @if(Session::get('fail'))
                <div class="danger alert-danger p-2 my-2 rounded">
                    {{Session::get('fail')}}
                </div>
            @endif
            @if(Session::get('success'))
                @push('scripts')
                    <script>
                        toastr.success('{{ Session::get("success") }}', 'Success');
                    </script>
                @endpush
            @endif

            <div class="row">
                <div class="col-xl-8 col-lg-12">
                        <div class="container mb-1 p-0">
                            <input type="date" max="2050-12-31" name="request_date" value="{{session()->get('request_date')}}" id="request_date" class="form-control">
                        </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card active-users">
                                    <div class="card-header border-0">
                                        <h4 class="card-title">Today's Patients</h4>
                                         <span class="sub-heading">click the patient name or the edit button to edit or view the patient's information.</span>
                                        <a class="heading-elements-toggle"><i
                                                class="fa fa-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="card-content">
                                            <div class="table-responsive">
                                                <table class="table" id="data-table">
                                                    <thead>
                                                        <th>Image</th>
                                                        <th>Patient Code</th>
                                                        <th>Patient Name</th>
                                                        <th>Package</th>
                                                        <th>Agency</th>
                                                        <th>Action</th>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card patient-status">
                        <div class="card-header pb-0">
                            <h5 class="primary"><i class="icon icon-user customize-icon"></i> QUEUE</h5>
                            <span class="sub-heading">PATIENT IS QUEUED IN
                                LOCATION
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table status-table">
                                    <thead>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        @foreach ($queue_patients as $indexKey => $queue_patient)
                                        <tr>
                                            <td>
                                                <!-- @if($queue_patient->patient_image == null ||
                                            $queue_patient->patient_image == "")
                                            <div class="avatar avatar-md mr-1">
                                                <img src="../../../app-assets/images/profiles/profilepic.jpg"
                                                    alt="Profile Picture" class="">
                                            </div>
                                            @else
                                            <img src="../../../app-assets/images/profiles/{{$queue_patient->patient_image}}"
                                                alt="Profile Picture" class="">
                                            @endif -->
                                                {{$indexKey+1}}
                                            </td>
                                            <td  style="text-transform: capitalize;">
                                                <a href="patient_edit?id={{$queue_patient->patient_id}}&patientcode={{$queue_patient->patientcode}}"
                                                    class="primary">{{$queue_patient->patient->lastname . ", " . $queue_patient->patient->firstname}}</a>
                                            </td>
                                            <td>
                                                <span>{{$queue_patient->patient->patientinfo->package ? $queue_patient->patient->patientinfo->package->packagename : null}}</span>
                                            </td>
                                            <td>
                                                <a href="patient_edit?id={{$queue_patient->patient_id}}&patientcode={{$queue_patient->patientcode}}"
                                                    class="btn btn-sm btn-primary"><i
                                                                        class="fa fa-pencil"></i> Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="card patient-status">
                        <div class="card-header pb-0">
                            <h5 class="warning font-bold"><i class="icon icon-user customize-icon"></i> ADMITTED</h5>
                            <span class="sub-heading">PATIENT IS IN THE
                                RECEPTION
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table status-table">
                                    <thead>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        @foreach ($pending_patients as $indexKey => $pending_patient)
                                        <tr>
                                            <td>
                                                {{$indexKey+1}}
                                            </td>
                                            <td  style="text-transform: capitalize;">
                                                <a href="patient_edit?id={{$pending_patient->patient_id}}&patientcode={{$pending_patient->patientcode}}"
                                                    class="warning font-bold">{{$pending_patient->patient->lastname . ", " . $pending_patient->patient->firstname}}</a>
                                            </td>
                                            <td>
                                                <span>{{$pending_patient->patient->patientinfo->package ? $pending_patient->patient->patientinfo->package->packagename : null}}</span>
                                            </td>
                                            <td>
                                                <a href="patient_edit?id={{$pending_patient->patient_id}}&patientcode={{$pending_patient->patientcode}}"
                                                    class="btn btn-sm btn-primary"><i
                                                                        class="fa fa-pencil"></i> Edit</a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="card patient-status">
                        <div class="card-header pb-0">
                            <h5 class="danger"><i class="icon icon-user customize-icon"></i> ON GOING</h5>
                            <span class="sub-heading">PATIENT IS TAKING THE
                                EXAMS</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table status-table">
                                    <thead>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        @foreach ($ongoing_patients as $indexKey => $ongoing_patient)
                                        <tr>
                                            <td>
                                                {{$indexKey+1}}
                                            </td>
                                            <td  style="text-transform: capitalize;">
                                                <a href="patient_edit?id={{$ongoing_patient->patient_id}}&patientcode={{$ongoing_patient->patientcode}}"
                                                    class="danger">{{$ongoing_patient->patient->lastname . ", " . $ongoing_patient->patient->firstname}}</a>
                                            </td>
                                            <td>
                                                <span>{{$ongoing_patient->patient->patientinfo->package ? $ongoing_patient->patient->patientinfo->package->packagename : null}}</span>
                                            </td>
                                            <td>
                                                <a href="patient_edit?id={{$ongoing_patient->patient_id}}&patientcode={{$ongoing_patient->patientcode}}"
                                                    class="btn btn-sm btn-primary"><i
                                                                        class="fa fa-pencil"></i> Edit</a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="card patient-status">
                        <div class="card-header pb-0">
                            <h5 class="success">
                                <i class="icon icon-user customize-icon"></i> MEDICAL DONE
                            </h5>
                            <span class="sub-heading"> PATIENT COMPLETED THE
                                EXAMS</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table status-table">
                                    <thead>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        @foreach ($completed_patients as $indexKey => $completed_patient)
                                        <tr>
                                            <td>
                                                {{$indexKey+1}}
                                            </td>
                                            <td  style="text-transform: capitalize;">
                                                <a href="patient_edit?id={{$completed_patient->patient_id}}&patientcode={{$completed_patient->patientcode}}"
                                                    class="success">{{$completed_patient->patient->lastname . ", " . $completed_patient->patient->firstname}}</a>
                                            </td>
                                            <td>
                                                <span>{{$completed_patient->patient->patientinfo->package ? $completed_patient->patient->patientinfo->package->packagename : null}}</span>
                                            </td>
                                            <td>
                                                <a href="patient_edit?id={{$completed_patient->patient_id}}&patientcode={{$completed_patient->patientcode}}"
                                                    class="btn btn-sm btn-primary"><i
                                                                        class="fa fa-pencil"></i> Edit</a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card patient-status">
                        <div class="card-header pb-0">
                            <h5 class="success">
                                <i class="icon icon-user customize-icon"></i> FIT TO WORK
                            </h5>
                            <span class="sub-heading"> PATIENT COMPLETED THE
                                EXAMS</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table status-table">
                                    <thead>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        @foreach ($fit_patients as $indexKey => $fit_patient)
                                        <tr>
                                            <td>
                                                {{$indexKey+1}}
                                            </td>
                                            <td  style="text-transform: capitalize;">
                                                <a href="patient_edit?id={{$fit_patient->patient_id}}&patientcode={{$fit_patient->patientcode}}"
                                                    class="success">{{$fit_patient->patient->lastname . ", " . $fit_patient->patient->firstname}}</a>
                                            </td>
                                            <td>
                                                <span>{{optional($fit_patient->patient->patientinfo->package)->packagename}}</span>
                                            </td>
                                            <td>
                                                <a href="patient_edit?id={{$fit_patient->patient_id}}&patientcode={{$fit_patient->patientcode}}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::get('success_support'))
    @push('scripts')
    <script>
        toastr.success('{{Session::get("success_support")}}', 'Success');
    </script>
    @endpush
@endif
@endsection


@push('scripts')
<script>
let table = $('#data-table').DataTable({
    searching: true,
    processing: true,
    pageLength: 10,
    serverSide: true,
    ajax: {
        url: "/today_patients",
        data: function (d) {
                d.search = $('input[type="search"]').val()
        }
    },
    columns: [{
            data: 'patient_image',
            name: 'patient_image'
        },
        {
            data: 'patientcode',
            name: 'patientcode',
        },
        {
            data: 'patientname',
            name: 'patientname',
            orderable: true,
            searchable: true
        },
        {
            data: 'package',
            name: 'package',
            orderable: true,
            searchable: true
        },
        {
            data: 'agency',
            name: 'agency',
            orderable: true,
            searchable: true
        },
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },
    ],
});

    $("#request_date").change( function(e){
        $.ajax({
            url: "/dashboard",
            data: {
                "request_date" : e.target.value
            },
            success: function(result){
                console.log(result);
                location.reload();
            }
        });
    });
</script>

@endpush
