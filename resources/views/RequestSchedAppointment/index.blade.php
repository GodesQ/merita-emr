@extends('layouts.admin-layout')

@section('content')
    <div class="app-content content">
        <div class="container my-1">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover data-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Patient Name</th>
                                    <th>Request Schedule</th>
                                    <th>Reason</th>
                                    <th>Agency</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
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
            serverSide: true,
            ajax: '/request-sched-appointments',
            columns: [{
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'patient',
                    name: 'patient',
                },
                {
                    data: 'schedule_date',
                    name: 'schedule_date',
                },
                {
                    data: 'reason',
                    name: 'reason',
                },
                {
                    data: 'agency_id',
                    name: 'agency_id',
                },
                {
                    data: 'action',
                    name: 'action',
                },
            ]
        });

        $(document).on('click', '#approved-btn', function(e) {
            let appointment_id = $(this).data('id');
            let csrf = '{{ csrf_token() }}';

            Swal.fire({
                title: 'Approve Schedule',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#156f29',
                confirmButtonText: 'Yes, Approve Request'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "/request-sched-appointments/approve",
                        data: {
                            id: appointment_id,
                            _token: csrf
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire(
                                    'Approved!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })
        });

        $(document).on('click', '#decline-btn', function(e) {
            let appointment_id = $(this).data('id');
            let csrf = '{{ csrf_token() }}';

            Swal.fire({
                title: 'Decline Schedule',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#156f29',
                confirmButtonText: 'Yes, Decline Request'
            }).then((result) => {
                $.ajax({
                    method: "POST",
                    url: "/request-sched-appointments/decline",
                    data: {
                        id: appointment_id,
                        _token: csrf
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Declined!',
                                '',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        }
                    }
                })
            })
        });
    </script>
@endpush
