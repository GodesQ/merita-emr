@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')
<div class="app-content content">
    <div class="container my-1">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            @if($patient->patient_image)
                                <img class="rounded" src="../../../app-assets/images/profiles/{{ $patient->patient_image }}" style="width: 120px; height: 120px; object-fit: cover;" />
                            @else
                                <img src="../../../app-assets/images/profiles/profilepic.jpg" style="width: 120px; height: 120px; object-fit: cover;" />
                            @endif
                            <div class="text-center my-1">
                                <h5>{{ $patient->firstname }} {{$patient->lastname}}</h5>
                                <h6>{{ $patient->gender}}, {{ $patient->age}} Yrs. old</h6>
                                @if(optional($patient->admission)->lab_status == 1)
                                    <div class="badge" style="background: #006a6c">Re Assessment</div>
                                @elseif (optional($patient->admission)->lab_status == 2)
                                    <div class="badge badge-success">Fit to Work</div>
                                @elseif (optional($patient->admission)->lab_status == 3)
                                    <div class="badge badge-primary">Unfit to Work</div>
                                @endif
                            </div>
                            <div class="w-100 border-top">
                                <div class="d-flex align-items-center justify-content-between my-1">
                                    <div class="w-50"><b>Registered Date :</b></div>
                                    <div>{{ date_format( new DateTime($patient->created_date), 'F d, Y') }}</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-1">
                                    <div class="w-50"><b>Admission Date :</b></div>
                                    <div>{{ date_format( new DateTime(optional($patient->admission)->trans_date), 'F d, Y') }}</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-1">
                                    <div class="w-50"><b>Medical Done Date :</b></div>
                                    <div>{{ $patient->medical_done_date ? date_format( new DateTime($patient->medical_done_date), 'F d, Y') : 'No Date Found' }}</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-1">
                                    <div class="w-50"><b>Fit to Work Date :</b></div>
                                    <div>{{ $patient->fit_to_work_date ? date_format( new DateTime($patient->fit_to_work_date), 'F d, Y') : 'No Date Found' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-1">Crew Info</h3>
                        <div class="row border-top">
                            <div class="col-lg-4 my-50">
                                <label for="firstname" class="form-label font-weight-bold">First Name</label>
                                <h6>{{ $patient->firstname }}</h6>
                            </div>
                            <div class="col-lg-4 my-50">
                                <label for="middlename" class="form-label font-weight-bold">Middle Name</label>
                                <h6>{{ $patient->middlename }}</h6>
                            </div>
                            <div class="col-lg-4 my-50">
                                <label for="lastname" class="form-label font-weight-bold">Last Name</label>
                                <h6>{{ $patient->lastname }}</h6>
                            </div>
                            <div class="col-lg-6 col-xl-4 my-50">
                                <label for="email" class="form-label font-weight-bold">Email</label>
                                <h6>{{ $patient->email }}</h6>
                            </div>
                            <div class="col-lg-6 col-xl-4 my-50">
                                <label for="address" class="form-label font-weight-bold">Address</label>
                                <h6>{{ $patient->patientinfo->address ?? null }}</h6>
                            </div>
                            <div class="col-lg-6 col-xl-4 my-50">
                                <label for="address" class="form-label font-weight-bold">Contact Number</label>
                                <h6>{{ $patient->patientinfo->contactno ?? null }}</h6>
                            </div>
                            <div class="col-lg-6 col-xl-4 my-50">
                                <label for="address" class="form-label font-weight-bold">Civil Status</label>
                                <h6>{{ $patient->patientinfo->maritalstatus ?? null }}</h6>
                            </div>
                            <div class="col-lg-6 col-xl-4 my-50">
                                <label for="address" class="form-label font-weight-bold">Nationality</label>
                                <h6>{{ $patient->patientinfo->nationality ?? null }}</h6>
                            </div>
                            <div class="col-lg-6 col-xl-4 my-50">
                                <label for="address" class="form-label font-weight-bold">Birthdate</label>
                                <h6>{{ optional($patient->patientinfo)->birthdate ? date_format( new DateTime($patient->patientinfo->birthdate), 'F d, Y') : 'No Date Found' }}</h6>
                            </div>
                        </div>
                        <h3 class="my-1">Agency Info</h3>
                        <div class="row border-top">
                            <div class="col-lg-4 my-1">
                                <label for="address" class="form-label font-weight-bold">Package</label>
                                <h6>{{ $patient->patientinfo->package->packagename ?? null }}</h6>
                            </div>
                            <div class="col-lg-4 my-1">
                                <label for="address" class="form-label font-weight-bold">Country of Destination</label>
                                <h6>{{ $patient->patientinfo->country_destination ?? null }}</h6>
                            </div>
                            <div class="col-lg-4 my-1">
                                <label for="address" class="form-label font-weight-bold">Position Applied</label>
                                <h6>{{ $patient->position_applied ?? null }}</h6>
                            </div>
                            <div class="col-lg-4 my-1">
                                <label for="address" class="form-label font-weight-bold">Vessel</label>
                                <h6>{{ $patient->patientinfo->vessel ?? 'Vessel Not Found' }}</h6>
                            </div>
                            <div class="col-lg-4 my-1">
                                <label for="address" class="form-label font-weight-bold">Passport #</label>
                                <h6>{{ $patient->patientinfo->passportno ?? null }}</h6>
                            </div>
                            <div class="col-lg-4 my-1">
                                <label for="address" class="form-label font-weight-bold">SSRB #</label>
                                <h6>{{ $patient->patientinfo->srbno ?? null }}</h6>
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
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Remarks</h4>
                        {{-- <div>@php echo nl2br($patient->admission->remarks) @endphp</div> --}}
                        <div class="container-fluid border-bottom">
                            <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                <div class="card accordion">
                                    @if(optional($patient->admission)->medical_results)
                                        @forelse (optional($patient->admission)->medical_results as $medical_result)
                                            <div id="heading{{ $medical_result->id }}" class="card-header d-flex justify-content-between align-items-center" style="padding: 10px 20px !important;" role="tab" data-toggle="collapse" href="#accordion{{ $medical_result->id }}" aria-expanded="false" aria-controls="accordion{{ $medical_result->id }}">
                                                <a class="card-title lead" href="javascript:void(0)">{{ date_format( new DateTime($medical_result->generate_at), 'F d, Y') }}</a>
                                                @if($medical_result->status == 1)
                                                    <div class="badge" style="background: #006a6c">Re Assessment</div>
                                                @elseif ($medical_result->status == 2)
                                                    <div class="badge badge-success">Fit to Work</div>
                                                @elseif ($medical_result->status == 3)
                                                    <div class="badge badge-primary">Unfit to Work</div>
                                                @elseif ($medical_result->status == 4)
                                                    <div class="badge badge-primary">Unfit Temporarily</div>
                                                @endif
                                            </div>
                                            <div id="accordion{{ $medical_result->id }}" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading{{ $medical_result->id }}" class="collapse show">
                                                <div class="card-content">
                                                    <div class="card-body" style="padding: 10px 20px !important;">
                                                        <?php echo nl2br($medical_result->remarks) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center">No Remarks Found</div>
                                        @endforelse
                                    @else
                                        <div class="text-center">No Remarks Found</div>   
                                    @endif
                                </div>
                            </div>
                        </div>
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
