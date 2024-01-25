<div class="tab-pane fade" id="account-reschedule" role="tabpanel" aria-labelledby="account-pill-reschedule"
    aria-expanded="false">
    <div class="card">
        <div class="card-body">
            @if ($latest_schedule)
                <form action='/update_schedule' method="POST">
                    @csrf
                    <h4 class="form-section"><i class="feather icon-user"></i>Re Schedule</h4>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="patient_id" value="{{ $latest_schedule->patient_id }}">
                            <input type="hidden" name="patientcode" value="{{ $latest_schedule->patientcode }}">
                            <input type="hidden" name="id" value="{{ $latest_schedule->id }}">
                            <input type="date" max="2050-12-31" class="form-control"
                                value="{{ $latest_schedule->date }}" name="schedule_date">
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save Changes</button>
                    </div>
                    <input type="hidden" name="action" value="admin_update">
                </form>
            @else
                <form action='/store_schedule' method="POST">
                    @csrf
                    <h4 class="form-section"><i class="feather icon-user"></i>Add Schedule
                    </h4>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                            <input type="hidden" name="patientcode" value="{{ $patient->patientcode }}">
                            <input type="date" max="2050-12-31" class="form-control" value=""
                                name="schedule_date">
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                            changes</button>
                    </div>
                    <input type="hidden" name="action" value="admin_store">
                </form>
            @endif
        </div>
    </div>
</div>
