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
                            @if($patientAdmission->remarks)
                                @php echo nl2br($patientAdmission->remarks) @endphp
                            @else
                                <h5 class="text-center">No Remarks Found</h5>
                            @endif
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
