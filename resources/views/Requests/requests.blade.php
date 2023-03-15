@extends('layouts.admin-layout')

@section('name')
{{$data['employeeFirstname'] . " " . $data['employeeLastname']}}
@endsection

@section('employee_image')
@if($data['employee_image'] != null || $data['employee_image'] != "")
<img src="../../../app-assets/images/employees/{{$data['employee_image']}}" alt="avatar">
@else
<img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
@endif
@endsection

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
    <div class="toaster bg-success "><i class="feather icon-check"></i>{{Session::get('status')}}</div>
    @if(Session::get('status'))
    <script>
    document.querySelector('.toaster').classList.add('toaster-active');
    </script>
    @endif
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        <h2 class="text-bold-600">List Requests</h2>
                    </div>
                    <div class="col-md-1">
                        <a href="/add_request" class="btn btn-solid btn-primary">Add
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>DATE</th>
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

    let table = $('.data-table').DataTable({
        processing: true,
        pageLength: 50,
        responsive: true,
        serverSide: true,
        ajax: '{{route("request_tables")}}',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'created_date',
                name: 'created_date'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
    });

    $(document).on('click', '.delete-request', function(e) {
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
                    url: '{{route("request.delete")}}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        let toaster = document.querySelector('.toaster');
                        toaster.classList.add('toaster-active');
                        toaster.textContent = "Deleted Successfully";
                        Swal.fire(
                            'Deleted!',
                            'Record has been deleted.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                table.draw()
                            }
                        })
                    }
                });
            }
        })
    })

});
</script>
@endpush