@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')

<div class="app-content content">
    <div class="main-loader">
        <div class="loader">
            <span class="loader-span"><img src="../../../app-assets/images/icons/output-onlinegiftools.gif"
                    alt="Loading"></span>
        </div>
    </div>
    <div class="toaster bg-success"><i class="feather icon-check"></i></div>
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        <h2 class="text-bold-600">Referral Slips</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Package</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Position Applied</th>
                                <th>Vessel</th>
                                <th>SSRB</th>
                                <th>Status</th>
                                <th>Status</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    let table = $('.data-table').DataTable({
        processing: true,
        pageLength: 50,
        responsive: true,
        serverSide: true,
        ajax: '/referral_slips_list',
        columns: [{
                data: 'packagename',
                name: 'packagename'
            },
            {
                data: 'lastname',
                name: 'lastname'
            },
            {
                data: 'firstname',
                name: 'firstname'
            },
            {
                data: 'position_applied',
                name: 'position_applied'
            },
            {
                data: 'vessel',
                name: 'vessel'
            },
            {
                data: 'ssrb',
                name: 'ssrb'
            },
            {
                data: 'is_hold',
                name: 'is_hold'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
        createdRow: function(row, data, dataIndex) {
            if (data.is_hold == 1) {
                $(row).css("background-color", "lightgray");
            }
        },

    });

    $(document).on('click', '.hold-btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
            title: 'Are you sure you want to hold this employee?',
            text: "Please Confirm!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hold it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(".main-loader").css("display", "block");
                $.ajax({
                    url: '{{route("hold_employee")}}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        if(response.status == 200) {
                            toastr.success('Referral Slip hold successful.', 'Success');
                            let draw = table.draw();
                        } else {
                            Swal.fire(
                                'Error!',
                                'Error Occured. Please Try Again Later',
                                'error'
                            )
                        }
                    }
                }).done(function(data) {
                    $(".main-loader").css("display", "none");
                });
            }
        })
    })

    $(document).on('click', '.activate-btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
            title: 'Are you sure you want to activate this employee?',
            text: "Please Confirm!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, activate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(".main-loader").css("display", "block");
                $.ajax({
                    url: '{{route("activate_employee")}}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        if(response.status == 200) {
                            toastr.success('Referral Slip activated.', 'Success');
                            let draw = table.draw();
                        } else {
                            Swal.fire(
                                'Error!',
                                'Error Occured. Please Try Again Later',
                                'error'
                            )
                        }
                    }
                }).done(function(data) {
                    $(".main-loader").css("display", "none");
                });;
            }
        })
    })


});
</script>
@endpush
