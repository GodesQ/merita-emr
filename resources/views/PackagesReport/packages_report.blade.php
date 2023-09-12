@extends('layouts.admin-layout')

@section('title', 'Packages Report')

@section('content')
<div class="app-content content">
    <div class="content-body my-2">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Packages Report</h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <section id="basic-form-layouts">
                            <form action="packages_report_print" method="GET" target="_blank">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="from_date" class="form-label">From Date</label>
                                            <input type="date" name="from_date" id="from_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="to_date" class="form-label">To Date</label>
                                            <input type="date" name="to_date" id="to_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="package" class="form-label">Package</label>
                                            <select name="package" id="package" class="select2 form-control">
                                                @foreach ($packages as $package)
                                                    <option {{ $package->packagename == 'SKULD PACKAGE' ? 'selected' : null }} value="{{ $package->packagename }}">{{ $package->packagename }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" name="action" value="Download CSV" class="btn btn-primary">
                                    <input type="submit" name="action" value="PRINT" class="btn btn-primary">
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
