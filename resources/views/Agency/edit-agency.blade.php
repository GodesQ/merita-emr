@extends('layouts.admin-layout')

@section('content')
<div class="app-content content">
    <div class="content-body my-2">
        <section id="basic-form-layouts">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Agency</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" id="update_agency" action="#" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$agency->id}}">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-user"></i>Agency</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Agency Code</label>
                                                <input type="text" class="form-control" value="{{$agency->agencycode}}"
                                                    name="agency_code" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Agency Name</label>
                                                <input required type="text" class="form-control" name="agencyname"
                                                    value="{{$agency->agencyname}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" class="form-control" name='address'
                                                        value="{{$agency->address}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Principal</label>
                                                <input type="text" class="form-control" name='principal'
                                                    value="{{$agency->principal}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Telephone No.</label>
                                                    <input type="tel" class="form-control" name="telno"
                                                        value="{{$agency->telno}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Mobile No.</label>
                                                <input type="text" class="form-control" name='faxno'
                                                    value="{{$agency->faxno}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{$agency->email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Remarks</label>
                                                <input type="text" class="form-control" name="remarks"
                                                    value="{{$agency->remarks}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Contact Person</label>
                                                <input type="text" class="form-control" name="contact_person"
                                                    value="{{$agency->contactperson}}">
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
                                                            <input required type="radio" class="custom-control-input"name="arrangement_type" id="radio1"
                                                            value="Cash" {{ $agency->arrangement_type == "Cash" ? "checked" : "" }}>
                                                            <label class="custom-control-label"for="radio1">Cash</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input required type="radio" class="custom-control-input" name="arrangement_type" id="radio2"
                                                            {{ $agency->arrangement_type == "Charge" ? "checked" : "" }} value="Charge">
                                                            <label class="custom-control-label" for="radio2">Charge</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">Commission (%)</label>
                                                <input type="text" class="form-control" name="commission" value="{{$agency->commission}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Registered at</label>
                                                <input class="form-control" type="text" name="updated_at" value="@php echo date('Y-m-d'); @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-body">
                                                <button type='button' class='btn btn-sm p-75 m-50 btn-success reset-password' id='reset-btn'>RESET PASSWORD</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class='card-body'>
                                                <a href="/agencies" type="reset" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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
@push('scripts')
<script>

    $(".reset-password").click(function() {
        console.log(true)
    let id = '{{ $agency->id }}';
    let email = '{{ $agency->email }}';
    let csrf = '{{ csrf_token()}}';
    Swal.fire({
        title: 'Are you sure you want to change it?',
        text: "",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).html(
                "<button type='button' class='btn btn-solid btn-success'><i class='fa fa-refresh spinner'></i>RESET PASSWORD</button>"
            );
            $.ajax({
                url: '/submit_agency_password_form',
                method: 'POST',
                data: {
                    id: id,
                    email: email,
                    _token: csrf
                },
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Record has been updated.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire(
                            'Error Occured!',
                            'Internal Server Error.',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                }
            }).done(function(data) {
                $(this).html(
                    "<button type='button' class='btn btn-sm p-75 m-50 btn-outline-success reset-password' id='reset-btn'>RESET PASSWORD</button>"
                )
            });
        }
    })
});
</script>

<script>
$("#update_agency").submit(function(e) {
    e.preventDefault();
    console.log(true)
    const fd = new FormData(this);
    $.ajax({
        url: '/update_agency',
        method: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.status == 200) {
                Swal.fire(
                    'Update!',
                    'Agency Update Successfully!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "/agencies";
                    }
                })
            } else {
                Swal.fire(
                    'Not Send!',
                    'Chart Account Added Failed!',
                    'warning'
                )
            }
        }
    });
});
</script>
@endpush
