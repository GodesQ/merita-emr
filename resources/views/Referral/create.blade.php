@extends('layouts.admin-layout')

@section('content')
    <div class="app-content">
        <div class="container my-4">
            <div class="card">
                <div class="alert alert-danger alert-dismissible mb-2 d-none" id="error" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="error-message"></span>
                </div>
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Add Referral Slip</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        @include('Referral.ReferralForms.create-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
