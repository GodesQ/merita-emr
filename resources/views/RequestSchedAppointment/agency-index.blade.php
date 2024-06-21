@extends('layouts.agency-layout')

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

        $(document).ready(function() {
            const csrfToken = '{{ csrf_token() }}';

            function handleButtonClick(action, title, successMessage, url) {
                return function(e) {
                    let appointmentId = $(this).data('id');

                    Swal.fire({
                        title: title,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#156f29',
                        confirmButtonText: `Yes, ${action} Request`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                method: "POST",
                                url: url,
                                data: {
                                    id: appointmentId,
                                    _token: csrfToken
                                },
                                success: function(data) {
                                    if (data.status === 'success') {
                                        Swal.fire(successMessage, '', 'success').then((
                                            result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    });
                };
            }

            $(document).on('click', '#approved-btn', handleButtonClick('Approve', 'Approve Schedule', 'Approved!',
                '/request-sched-appointments/approve'));
            $(document).on('click', '#decline-btn', handleButtonClick('Decline', 'Decline Schedule', 'Declined!',
                '/request-sched-appointments/decline'));
        });
    </script>
@endpush
