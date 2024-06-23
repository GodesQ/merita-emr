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

        .table th,
        .table td {
            padding: 0.5rem;
        }
    </style>
    <div class="app-content content">
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="text-bold-600">Referrals List</h2>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/referrals/create" class="btn btn-solid btn-primary">Add Referral</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Agency</th>
                                <th>Package</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Position Applied</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let table = $('.data-table').DataTable({
            processing: true,
            pageLength: 25,
            responsive: true,
            serverSide: true,
            ajax: '/referral-slips',
            columns: [{
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'agencyname',
                    name: 'agencyname'
                },
                {
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
                    data: 'is_hold',
                    name: 'is_hold'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            order: [
                [0, 'desc'] // Sort by the first column (index 0) in descending order
            ]
        })
    </script>
@endpush
