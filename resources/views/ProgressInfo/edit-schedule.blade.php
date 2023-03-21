@extends('layouts.app')

@section('name')
{{$data['firstname'] . " " . $data['lastname']}}
@endsection

@section('patient_image')
@if($data['patient_image'] != null || $data['patient_image'] != "")
<img src="../../../app-assets/images/profiles/{{$data['patient_image']}}" alt="avatar">
@else
<img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
@endif
@endsection

@section('remedical')
            <div class="mx-1 my-25">
                <a href="/remedical?patientcode={{session()->get('patientCode')}}" class="text-white btn btn-primary"><i class="fa fa-pencil"></i>
                    Re Medical</a>
            </div>
@endsection

@section('content')

@if(Session::get('success'))
    @push('scripts')
        <script>
            toastr.success('{{ Session::get("success") }}', 'Success');
        </script>
    @endpush
@endif
<div class="app-content content">
    <div class="content-body my-2">
        <section id="basic-form-layouts d-flex">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                @if ($latest_schedule)
                                <h5>Your latest schedule is : <b><u> {{$latest_schedule->date}}</u></b></h5>
                                @else
                                <h5>No records of schedule</h5>
                                @endif
                            </div>
                            @if (count($schedules) != 0)
                            <div class="card-body">
                                <h4>Scheduled List</h4>
                                @foreach ($schedules as $schedule)
                                <ul class="list-group">
                                    <li
                                        class="list-group-item @php echo $schedule->date == $latest_schedule->date ? 'active' : '' @endphp">
                                        {{$schedule->date}}</li>
                                </ul>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Edit Schedule</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="/update_schedule" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="feather icon-user"></i>Schedule</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Schedule Date</label>
                                                            <input type="hidden" name="patient_id" value="{{$latest_schedule->patient_id}}">
                                                            <input type="hidden" name="id" value="{{$latest_schedule->id}}">
                                                            <input type="text" id="date-picker" class="form-control" value="{{$latest_schedule->date}}" name="schedule_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <a href="/patient_info" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$(function() {
    var dateToday = new Date();
    $("#date-picker").datepicker({
        minDate: dateToday,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
});
</script>
@endpush
