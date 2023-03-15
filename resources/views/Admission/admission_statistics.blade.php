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
    <div class="container mt-2">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <canvas id="myChart" style="width:100%;"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
let count_deck_services = parseInt('{{$count_deck_services}}');
let count_engine_services = parseInt('{{$count_engine_services}}');
let count_catering_services = parseInt('{{$count_catering_services}}');
let count_other_services = parseInt('{{$count_other_services}}');
let count_none_services = parseInt('{{$count_none_services}}');
var xValues = ["DECK SERVICES", "CATERING SERVICES", "ENGINE SERVICES", "OTHER SERVICES", "NONE SERVICES"];
var yValues = [count_deck_services, count_engine_services, count_catering_services, count_other_services,
    count_none_services
];
var barColors = ["lightseagreen", "lightsalmon", "lightcoral", "aquamarine"];

new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    responsive: true,
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: "PATIENT CATEGORY STATISTICS"
        }
    }
});
</script>
@endpush