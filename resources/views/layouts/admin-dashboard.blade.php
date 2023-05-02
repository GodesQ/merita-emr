@extends('layouts.admin-layout')

@section('content')
<style>
    .table th,
    .table td {
        padding: 0.5rem;
    }

    @media screen and (max-width: 1140px) {
        .data-table tbody tr td {
            font-size: 10px;
        }
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            @if(Session::get('fail'))
                <div class="danger alert-danger p-2 my-2 rounded">
                    {{Session::get('fail')}}
                </div>
            @endif

            @if(Session::get('success'))
                @push('scripts')
                    <script>
                        toastr.success('{{ Session::get("success") }}', 'Success');
                    </script>
                @endpush
            @endif

            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="container mb-1 p-0">
                        <input type="date" max="2050-12-31" name="request_date" value="{{session()->get('request_date')}}" id="request_date" class="form-control">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Total Numbers of Medical Packages Today</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data-table">
                                        <thead>
                                            <th>Medical Package</th>
                                            <th>Total</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xl-12">

                </div>
            </div>
        </div>
    </div>
</div>

@if(Session::get('success_support'))
    @push('scripts')
    <script>
        toastr.success('{{Session::get("success_support")}}', 'Success');
    </script>
    @endpush
@endif

@endsection

@push('scripts')
    <script>
        let table = $('#data-table').DataTable({
            searching: true,
            processing: true,
            pageLength: 10,
            serverSide: true,
            ajax: {
                url: '/today_medical_packages',
                data: function (d) {
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'packagename',
                    name: 'packagename'
                },
                {
                    data: 'total',
                    name: 'total'
                }
            ],
        })

        $("#request_date").change( function(e){
            $.ajax({
                url: "/dashboard",
                data: {
                    "request_date" : e.target.value
                },
                success: function(result){
                    console.log(result);
                    location.reload();
                }
            });
        });
    </script>
@endpush
