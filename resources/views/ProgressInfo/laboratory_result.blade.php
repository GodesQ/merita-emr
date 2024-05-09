@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-body">
        <div class="container my-1">
            @if($patientAdmission)
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="float-left">
                            <h5>Status:
                                @if ($patientAdmission->lab_status == 2)
                                <b class="success"><u>FIT TO WORK</u></b>
                                @elseif ($patientAdmission->lab_status == 1)
                                <b class="info"><u>NEED REASSESSMENT</u></b>
                                @elseif ($patientAdmission->lab_status == 3)
                                <b class="warning"><u>UNFIT TO WORK</u></b>
                                @elseif ($patientAdmission->lab_status == 4)
                                <b class="warning"><u>UNFIT TEMPORARILY TO WORK</u></b>
                                @else
                                <b class="primary"><u>MEDICAL DONE </u></b><span>(WAITING FOR RESULT)</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col">
                        <h3>Recommendations/Remarks</h3>
                        <div class="border container p-1">
                            <div class="card accordion">
                                @if($patientAdmission->medical_results)
                                    @forelse ($patientAdmission->medical_results as $medical_result)
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
                            {{-- @if($patientAdmission->remarks)
                                @php echo nl2br($patientAdmission->remarks) @endphp
                            @else
                                <h5 class="text-center">No Remarks Found</h5>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="text-center">You are not admitted</h5>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
