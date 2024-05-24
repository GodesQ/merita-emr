<form class="form" id="update_agency" action="#" method="POST">
    @csrf
    <input type="hidden" name="id" id="agency_id" value="{{ $agency->id }}">
    <div class="form-body">
        <h4 class="form-section"><i class="feather icon-user"></i>Agency</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Agency Code</label>
                    <input type="text" class="form-control" value="{{ $agency->agencycode }}" name="agency_code"
                        readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Agency Name</label>
                    <input required type="text" class="form-control" name="agencyname"
                        value="{{ $agency->agencyname }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name='address' value="{{ $agency->address }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Principal</label>
                    <input type="text" class="form-control" name='principal' value="{{ $agency->principal }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Telephone No.</label>
                        <input type="tel" class="form-control" name="telno" value="{{ $agency->telno }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Mobile No.</label>
                    <input type="text" class="form-control" name='faxno' value="{{ $agency->faxno }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $agency->email }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Remarks</label>
                    <input type="text" class="form-control" name="remarks" value="{{ $agency->remarks }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Contact Person</label>
                    <input type="text" class="form-control" name="contact_person"
                        value="{{ $agency->contactperson }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Arrangement Type</label><br>
                        <div class="my-1">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required type="radio" class="custom-control-input"name="arrangement_type"
                                    id="radio1" value="Cash"
                                    {{ $agency->arrangement_type == 'Cash' ? 'checked' : '' }}>
                                <label class="custom-control-label"for="radio1">Cash</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required type="radio" class="custom-control-input" name="arrangement_type"
                                    id="radio2" {{ $agency->arrangement_type == 'Charge' ? 'checked' : '' }}
                                    value="Charge">
                                <label class="custom-control-label" for="radio2">Charge</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="">Commission (%)</label>
                    <input type="text" class="form-control" name="commission" value="{{ $agency->commission }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Registered at</label>
                    <input class="form-control" type="text" name="updated_at"
                        value="@php echo date('Y-m-d'); @endphp" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <div class="card-body">
                    <div class="btn-group">
                        <button type='button' class='btn btn-sm p-75 btn-success reset-password'
                            id='reset-btn'>RESET PASSWORD</button>
                        <button type='button' class='btn btn-sm p-75 btn-primary default-password'
                            id='default-password-btn'>SEND DEFAULT PASSWORD</button>
                    </div>

                </div>
            </div>
            <div>
                <div class='card-body'>
                    <div class="btn-group">
                        <a href="/agencies" type="reset" class="btn btn-warning">
                            <i class="feather icon-x"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
