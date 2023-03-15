@extends('layouts.admin-layout')

@section('content')
<style>
    .card {
        border-radius: 10px;
    }
    .card-header {
        background-color: #244681;
        color: white;
    }
</style>
<div class="app-content content">
    <div class="toaster bg-success "><i class="feather icon-check"></i> Successfully Deleted</div>
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        <h2 class="text-bold-600">Cashier Official Recipt</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>OR No.</th>
                                <th>Paying Type</th>
                                <th>OR Date</th>
                                <th>Payor</th>
                                <th>Amount</th>
                                <th width="100px">Action</th>
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

    $(document).on('click', '.delete-cashier-or', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{route("cashier_or.delete")}}',
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
    })

    let table = $('.data-table').DataTable({
        processing: true,
        pageLength: 50,
        responsive: true,
        serverSide: true,
        ajax: '{{route("cashier_or.get")}}',
        columns: [{
                data: 'serial_no',
                name: 'serial_no'
            },
            {
                data: 'trans_no',
                name: 'trans_no'
            },
            {
                data: 'paying_type',
                name: 'paying_type'
            },
            {
                data: 'trans_date',
                name: 'trans_date'
            },
            {
                data: 'payor',
                name: 'payor'
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
    });

});
</script>
@endpush