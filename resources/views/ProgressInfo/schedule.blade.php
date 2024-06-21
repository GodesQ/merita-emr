@extends('layouts.app')

@section('content')
    <style>
        .schedule-date {
            padding: 15px;
            background: #f5f7fa;
            border-radius: 5px;
            font-size: 30px;
        }
    </style>
    <div class="app-content content">
        <div class="content-body my-2">
            <section id="basic-form-layouts d-flex">
                <div class="container">
                    @if ($latest_schedule)
                        <div class="row d-flex justify-content-center align-items-start">
                            @if ($request_schedule)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">Request Re-Schedule</h3>
                                        </div>
                                        <div class="card-body">
                                            <h5>You request to move the schedule date to <span
                                                    class="font-bold">{{ Carbon::parse($request_schedule->schedule_date)->format('F d, Y') }}</span>
                                            </h5>
                                            @if ($request_schedule->status == 'approved')
                                                <div class="badge badge-success">Approved</div>
                                            @elseif ($request_schedule->status == 'declined')
                                                <div class="badge badge-danger">Declined</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-5 col-sm-12">
                                <div class="bs-callout-primary callout-border-left callout-bordered p-1 mb-2">
                                    <h4 class="primary">Hi,
                                        {{ session()->get('firstname') . ' ' . session()->get('lastname') }}</h4>
                                    <p class="lh-lg">To update your schedule, you can contact your agency directly using
                                        their provided
                                        phone number to update the scheduled date in their dashboard. If you are already at
                                        the clinic, please verify your schedule with the
                                        reception. Alternatively, to request an update via email, please click the
                                        <b>"Request Re-Schedule"</b> button below and complete the required fields in the
                                        form.
                                    </p>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <div class="schedule-detail-header">
                                                <h4>You are scheduled on</h4>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center mt-1">
                                                <div class="schedule-date mr-1">
                                                    {{ Carbon::parse($latest_schedule->date)->format('d') }}</div>
                                                <div class="schedule-date mr-1">
                                                    {{ Carbon::parse($latest_schedule->date)->format('M') }}</div>
                                                <div class="schedule-date mr-1">
                                                    {{ Carbon::parse($latest_schedule->date)->format('Y') }}</div>
                                            </div>
                                        </div>
                                        <button class="btn btn-secondary btn-block btn-lg text-uppercase mt-2"
                                            data-toggle="modal" id="request-schedule-btn"
                                            data-target="#request-schedule-form">Request
                                            Re-Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade text-left" id="request-schedule-form" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="/request-sched-appointments/upsert" method="post">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">Request Re-Schedule</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="schedule_date" class="form-label">Schedule Date</label>
                                                <input type="date" name="schedule_date" id="schedule_date"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="reason" class="form-label">Reason</label>
                                                <textarea name="reason" required id="reason" cols="30" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn grey btn-outline-secondary"
                                                data-dismiss="modal">Close <i class="fa fa-close"></i></button>
                                            <button class="btn btn-primary">Request <i class="fa fa-send"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h2 class="card-title" id="basic-layout-form"><i class="fa fa-calendar mr-50"></i> Schedule
                                </h2>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="/store_schedule" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="feather icon-user"></i>Schedule</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Schedule Date</label>
                                                            <input readonly type="text" required class="form-control"
                                                                id="date-picker" value="" name="schedule_date"
                                                                {{ count($scheduled_patients) == 40 ? 'disabled' : null }}>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <a href="/patient_info" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary"
                                                    {{ count($scheduled_patients) == 40 ? 'disabled' : null }}>
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var dateToday = new Date();
            $("#date-picker").datepicker({
                minDate: dateToday,
                maxDate: '+2M',
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });

        $('#request-schedule-btn').on('click', function() {
            $("#schedule_date").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endpush
