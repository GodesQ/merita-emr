@extends('layouts.admin-layout')

@section('content')
<div class="app-content content">
    <div class="content-body my-2">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Daily Summary Report</h4>
                </div>
                <div class="card-body">
                    <section id="basic-form-layouts">
                        <form action="/daily-summary-report-print" method="GET">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_from">Date From :</label>
                                        <input required type="date" max="2050-12-31" name="date_from" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_to">Date To :</label>
                                        <input required type="date" max="2050-12-31" name="date_to" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Agency</label>
                                        <select name="agency_id" id="agency" class="select2" onchange="getAgency(this)">
                                            <option value="">All</option>
                                            @foreach ($agencies as $agency)
                                                <option {{ $agency->id == 22 ? 'selected' : null }} value="{{$agency->id}}">{{$agency->agencyname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="action" value="Download CSV" class="btn btn-outline-secondary">
                                <input type="submit" name="action" value="PRINT" class="btn btn-primary">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection