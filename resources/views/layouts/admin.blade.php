@extends('layouts.app')

@section('content')
<div class="container">
    {{$classification}}
    @if($classification == 'patient')
    <script>
    window.location = "/progress-patient-info";
    </script>
    @endif
</div>
@endsection