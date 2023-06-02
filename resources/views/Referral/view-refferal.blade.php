

@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection


@section('content')

@if(Session::get('fail'))
    @push('scripts')
        <script>
            toastr.error('{{ Session::get("fail") }}', 'Fail');
        </script>
    @endpush
@endif

<div class="app-content content">
    <div class="container my-1">
        <div class="my-2">
            @foreach($crew_referrals as $referral)
                <a class="btn btn-primary" href="/referral?id={{ $referral->id }}">{{ date_format(new DateTime($referral->created_date), 'F d, Y') }}</a>
            @endforeach
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    <h2>Refferal Slip</h2>
                </div>
                <div>
                    <!--<button class="btn btn-primary">Edit <i class="fa fa-pencil"></i></button>-->
                    <!--<button class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>-->
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Firstname :</td>
                                    <td class="col-6">
                                        {{$referral->firstname}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Lastname :</td>
                                    <td class="col-6">
                                        {{$referral->lastname}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Middlename :</td>
                                    <td class="col-6">
                                        {{$referral->middlename}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Package :</td>
                                    <td class="col-6">
                                        {{$referral->package->packagename}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Email :</td>
                                    <td class="col-6">{{$referral->email_employee}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Passport :</td>
                                    <td class="col-6">{{$referral->passport ? $referral->passport : 'No Passport Found' }}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">SSRB :</td>
                                    <td class="col-6">{{$referral->ssrb ? $referral->ssrb : 'No SSRB Found' }}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Printable Certificates :</td>
                                    <td class="col-6">
                                        {{$referral->certificate}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Position Applied :</td>
                                    <td class="col-6">
                                        {{$referral->position_applied}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Country Destination :</td>
                                    <td class="col-6">
                                        {{$referral->country_destination}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Vessel :</td>
                                    <td class="col-6">
                                        {{$referral->vessel}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Custom Request :</td>
                                    <td class="col-6">
                                        {{$referral->custom_request ? $referral->custom_request : 'No Request Found' }}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Payment Type :</td>
                                    <td class="col-6">
                                        {{$referral->payment_type}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Passport Expiry Date :</td>
                                    <td class="col-6">{{$referral->passport_expdate ? $referral->passport_expdate : 'No Passport Expiry Date Found' }}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">SSRB Expiry Date :</td>
                                    <td class="col-6">{{$referral->ssrb_expdate ? $referral->ssrb_expdate : 'No SSRB Expiry Date Found' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
