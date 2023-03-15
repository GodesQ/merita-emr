@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')
<div class="app-content content">
    <div class="container my-1">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    <h2>Employee Details</h2>
                </div>
                <div>
                    @if($patient->patient_image)
                        <img src="../../../app-assets/images/profiles/{{ $patient->patient_image }}" style="width: 85px; height: 85px; object-fit: cover;" />
                    @else   
                        <img src="../../../app-assets/images/profiles/profilepic.jpg" style="width: 85px; height: 85px; object-fit: cover;" />
                    @endif
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
                                        {{$patient->firstname}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Lastname :</td>
                                    <td class="col-6">
                                        {{$patient->lastname}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Middlename :</td>
                                    <td class="col-6">
                                        {{$patient->middlename}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Package :</td>
                                    <td class="col-6">
                                        {{$patient->patientinfo->package->packagename}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Email :</td>
                                    <td class="col-6">{{$patient->email}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Address :</td>
                                    <td class="col-6">
                                        {{$patient->patientinfo->address}}</td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Remarks :</td>
                                    <td class="col-6">
                                        @php echo nl2br(optional($patient->admission)->remarks) @endphp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Age :</td>
                                    <td class="col-6">{{$patient->age}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Position Applied :</td>
                                    <td class="col-6">
                                        {{$patient->position_applied}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Country Destination :</td>
                                    <td class="col-6">
                                        {{$patient->patientinfo->country_destination}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Vessel :</td>
                                    <td class="col-6">
                                        {{$patient->patientinfo->vessel}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">Passport :</td>
                                    <td class="col-6">
                                        {{$patient->patientinfo->passportno}}
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6 font-weight-bold">SSRB :</td>
                                    <td class="col-6">
                                        {{$patient->patientinfo->srbno}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6">
                       <h6><b>Remarks for Passport Expiration Date ({{$patient->patientinfo->passport_expdate ? date_format( new DateTime($patient->patientinfo->passport_expdate), 'F d, Y') : "No Record"}})</b></h6>  
                       <p id="remarks-passport"></p>
                    </div>
                    <div class="col-md-6">
                       <h6><b>Remarks for SSRB Expiration Date ({{$patient->patientinfo->srb_expdate ? date_format( new DateTime($patient->patientinfo->srb_expdate), 'F d, Y') : "No Record"}})</b></h6>  
                       <p id="remarks-srb"></p>
                    </div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <h6><b>Registered Date :</b> <span>{{ date_format( new DateTime($patient->created_date), 'F d, Y H:i A') }}</span></h6>
                    </div>
                    <div class="col-md-4">
                        <h6><b>Admission Date :</b> <span>{{ date_format( new DateTime(optional($patient->admission)->trans_date), 'F d, Y H:i A') }}</span></h6>
                    </div>
                    <div class="col-md-4">
                        <h6><b>Medical Done Date :</b> <span>{{$patient->medical_done_date}}</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        const getRemarksPassport = () => {
            let months;
            let d1 = new Date('{{$patient->patientinfo->passport_expdate}}');
            let d2 = new Date();
            let remarksPassport = document.querySelector("#remarks-passport");
            months = (d1.getFullYear() - d2.getFullYear()) * 12;

            months -= d2.getMonth();
            months += d1.getMonth();

            if (months < 0) {
                console.log(months);
            }

            if(months < 0) {
                remarksPassport.textContent = "Passport is already expired.";
                remarksPassport.classList.add('danger');
            } else if(d1 == 'Invalid Date') {
                remarksPassport.textContent = "No Record";
                remarksPassport.classList.add('warning');
            } else if(months < 6) {
                remarksPassport.textContent = "Passport will expire in less than six (6) months";
                remarksPassport.classList.add('warning');
            } else {
                remarksPassport.textContent = "Passport will not expire within six (6) months.";
                remarksPassport.classList.add('success');
            }

        }

        const getRemarksSRB = () => {
            let months;
            let d1 = new Date('{{$patient->patientinfo->srb_expdate}}');
            let d2 = new Date();
            let remarksSRB = document.querySelector("#remarks-srb");
            months = (d1.getFullYear() - d2.getFullYear()) * 12;

            months -= d2.getMonth();
            months += d1.getMonth();

            if(months < 0) {
                remarksSRB.textContent = "SSRB is already expired.";
                remarksSRB.classList.add('danger');
            } else if(d1 == 'Invalid Date') {
                remarksSRB.textContent = "No Record";
                remarksSRB.classList.add('warning');
            } else if(months < 6) {
                remarksSRB.textContent = "SSRB will expire in less than six (6) months";
                remarksSRB.classList.add('warning');
            } else {
                remarksSRB.textContent = "SSRB will not expire within six (6) months.";
                remarksSRB.classList.add('success');
            }
        }

        getRemarksPassport();
        getRemarksSRB();
    </script>
@endpush