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
    <style>
        .card {
            border-radius: 10px;
        }

        .card-header {
            background-color: #244681;
            color: white;
        }

        .table th,
        .table td {
            padding: 0.5rem;
        }

        @media screen and (max-width: 1140px) {
            .data-table tbody tr td {
                font-size: 10px;
            }
        }
    </style>
    <div class="app-content content">
        <div class="toaster bg-success "><i class="feather icon-check"></i> Successfully Deleted</div>
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="text-bold-600">Patients List</h2>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/add_patient" class="btn btn-solid btn-primary">Add Patient</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    @if (Session::get('status'))
                        <div class="success alert-success p-2 my-2">
                            {{ Session::get('status') }}
                        </div>
                        @push('scripts')
                            <script>
                                let toaster = toastr.success("{{ Session::get('status') }}", 'Success');
                            </script>
                        @endpush
                    @endif
                    <div class="table-responsive">
                        <table data-order='[[ 0, "desc" ]]'
                            class="table table-bordered table-hover data-table patients-table">
                            <thead>
                                <tr>
                                    <th>Patient Code</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th width="100px">Agency</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
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
    <script type="text/javascript">
        $(document).ready(function() {

            // delete employee ajax request
            $(document).on('click', '.delete-patient', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure you want to delete this record?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/patient_delete',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                document.querySelector('.toaster').classList.add(
                                    'toaster-active');
                                Swal.fire(
                                    'Deleted!',
                                    'Record has been deleted.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        });
                    }
                })
            });

            let table = $('.data-table').DataTable({
                searching: true,
                processing: true,
                pageLength: 50,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ route('patients.get') }}',
                },
                columns: [{
                        data: 'patientcode',
                        name: 'patientcode',
                        className: 'patientcode'
                    },
                    {
                        data: 'lastname',
                        name: 'lastname',
                        orderable: true,
                        searchable: true,
                        className: 'patientlastname'
                    },
                    {
                        data: 'firstname',
                        name: 'firstname',
                        orderable: true,
                        searchable: true,
                        className: 'patientfirstname'
                    },
                    {
                        data: 'agency',
                        name: 'agency',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'medical_package',
                        name: 'medical_package',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush
