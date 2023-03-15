@php 

@endphp

@extends('layouts.admin-layout')
@section('content')
<div class="app-content content">
    <div class="toaster bg-success "><i class="feather icon-check"></i> {{Session::get('success_delete')}}</div>
    @if(Session::get('success_delete'))
    <script>
    document.querySelector('.toaster').classList.add('toaster-active');
    </script>
    @endif
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        <h2 class="text-bold-600">List Admissions</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                @if(Session::get('status'))
                <div class="success alert-success p-2 my-2">
                    {{Session::get('status')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>Adm. No.</th>
                                <th>Patient Code</th>
                                <th>Patient Name</th>
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

    $(document).on('click', '.delete-admission', function(e) {
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
                    url: '{{route("admission.delete")}}',
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
    console.log(history.back());
    $(document).on('click', '.select-admission', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        window.opener.location =`print_panel?&id=${id}`;
        window.close();
    })

    let table = $('.data-table').DataTable({
        processing: true,
        pageLength: 50,
        serverSide: true,
        ajax: '/select_admission',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'patientcode',
                name: 'patientcode'
            },
            {
                data: 'patientname',
                name: 'patientname',
                orderable: true,
                searchable: true
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