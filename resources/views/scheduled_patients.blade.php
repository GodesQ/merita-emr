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
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="card">
                <div class="card-body">
                    <div class="fc fc-ltr fc-unthemed" id="fc-default">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let csrf = '{{ csrf_token()}}';
$.ajax({
    url: '/month_scheduled_patients',
    method: 'GET',
    data: {
        _token: csrf
    },
    success: function(response) {
        console.log(response);
        var calendarEl = document.getElementById('fc-default');
        var fcCalendar = new FullCalendar.Calendar(calendarEl, {
            defaultDate: new Date(),
            editable: true,
            plugins: ["dayGrid", "interaction"],
            header: {
                left: 'title',
                center: '',
                right: ''
            },
            eventLimit: true, // allow "more" link when too many events
            events: response
        });

        fcCalendar.render();
    }
})
</script>

@endpush