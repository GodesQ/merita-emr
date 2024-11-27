@extends('layouts.admin-layout')

@section('content')
    <div class="app-content content">
        <div class="content-body my-2">
            <section id="basic-form-layouts">
                <div class="container-fluid">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="base-agency-info" data-toggle="tab" aria-controls="agency-info-tab"
                                href="#agency-info-tab" role="tab" aria-selected="true">Agency Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="base-agency-vessel" data-toggle="tab" aria-controls="agency-vessel-tab"
                                href="#agency-vessel-tab" role="tab" aria-selected="false">Vessels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="base-agency-principal" data-toggle="tab"
                                aria-controls="agency-principal-tab" href="#agency-principal-tab" role="tab"
                                aria-selected="false">
                                Principals
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active" id="agency-info-tab" role="tabpanel"
                            aria-labelledby="base-agency-info">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Edit Agency</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @include('Agency.agency-forms.edit-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="agency-vessel-tab" role="tabpanel" aria-labelledby="base-agency-vessel">
                            <div class="my-2 text-right">
                                <button class="btn btn-primary text-right add-vessel">Add Vessel <i
                                        class="fa fa-plus"></i></button>
                            </div>
                            @include('Agency.agency-vessel.agency-vessel-form')
                            @include('Agency.agency-vessel.list-agency-vessel')
                        </div>
                        <div class="tab-pane" id="agency-principal-tab" role="tabpanel"
                            aria-labelledby="base-agency-principal">
                            <div class="my-2 text-right">
                                <button class="btn btn-primary text-right add-principal">Add Principal <i
                                        class="fa fa-plus"></i></button>
                            </div>
                            @include('Agency.agency-principal.agency-principal-form')
                            @include('Agency.agency-principal.list-agency-principal')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script></script>

    <script>
        // Reset Password Button
        $(".reset-password").click(function() {
            let id = $('#agency_id').val();
            let email = $('#email').val();
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure you want to reset password?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
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
                                Swal.fire('Updated!', 'Record has been updated.', 'success')
                                    .then((result) => {
                                        if (result.isConfirmed) location.reload()
                                    });
                            } else {
                                Swal.fire('Error Occured!', 'Internal Server Error.', 'error')
                                    .then((result) => {
                                        if (result.isConfirmed) location.reload()
                                    });
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

        $('#default-password-btn').click((e) => {
            let id = $('#agency_id').val();
            let email = $('#email').val();
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure want to send default password?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).html(
                        "<button type='button' class='btn btn-solid btn-success'><i class='fa fa-refresh spinner'></i>DEFAULT PASSWORD</button>"
                    );
                    $.ajax({
                        url: '/agency/default-password',
                        method: 'POST',
                        data: {
                            id: id,
                            email: email,
                            _token: csrf,
                        },
                        success: function(response) {
                            if (response.status) {
                                Swal.fire('Updated!',
                                    'The default password was successfully sent.', 'success'
                                ).then((result) => {
                                    if (result.isConfirmed) location.reload()
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            let errorMessage =
                                'An error occurred while processing your request.';

                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON
                                    .message; // Extract server-side error message if available
                            }

                            Swal.fire('Error', errorMessage, 'error');
                        }
                    })
                }
            })
        })

        // Updating Agency
        $("#update_agency").submit(function(e) {
            e.preventDefault();
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
                        Swal.fire('Update!', 'Agency Update Successfully!', 'success').then((
                            result) => {
                            if (result.isConfirmed) location.reload()
                        });
                    } else {
                        Swal.fire('Not Send!', 'Chart Account Added Failed!', 'warning');
                    }
                }
            });
        });
    </script>
@endpush
