@extends('layouts.admin-layout')

@section('content')
<div class="app-content content">
    <div class="content-body my-2">
        <section id="basic-form-layouts">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Add Agency</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" action="/store_agency" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="feather icon-user"></i>Agency</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Email Address</label>
                                                    <input required type="email" class="form-control" name="email">
                                                    <span class="danger text-danger">@error('email'){{$message}}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Agency Name</label>
                                                    <input required type="text" class="form-control" name="agencyname">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input required type="text" class="form-control" name='address'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Principal</label>
                                                    <input required type="text" class="form-control" name='principal'>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">Telephone No.</label>
                                                        <input required type="tel" class="form-control" name="telno">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Mobile No.</label>
                                                    <input required type="number" class="form-control" name='faxno'>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Contact Person</label>
                                                    <input required type="text" class="form-control" name="contact_person">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Remarks</label>
                                                    <input required type="text" class="form-control" name="remarks">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Registered at</label>
                                                    <input class="form-control" type="text" name="registered_at" value="@php echo date('Y-m-d'); @endphp" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">Arrangement Type</label><br>
                                                        <div class="my-1">
                                                            <div
                                                                class="d-inline-block custom-control custom-radio mr-1">
                                                                <input required type="radio"
                                                                    class="custom-control-input" name="arrangement_type"
                                                                    id="radio1" value="Cash">
                                                                <label class="custom-control-label"
                                                                    for="radio1">Cash</label>
                                                            </div>
                                                            <div
                                                                class="d-inline-block custom-control custom-radio mr-1">
                                                                <input required type="radio"
                                                                    class="custom-control-input" name="arrangement_type"
                                                                    id="radio2" checked value="Charge">
                                                                <label class="custom-control-label"
                                                                    for="radio2">Charge</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="">Commission (%)</label>
                                                    <input type="number" class="form-control" name="commission">
                                                </div>
                                                <span
                                                    class="danger text-danger">@error('commission'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <a href="/agencies" type="reset" class="btn btn-warning mr-1">
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
