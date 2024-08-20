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
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" role="tab" aria-selected="true">
                                        Default Report
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div class="tab-pane active" id="tab1" role="tabpanel" aria-labelledby="base-tab1">
                                    <section id="basic-form-layouts">
                                        <form action="packages_report_print" method="GET" target="_blank">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="from_date" class="form-label">From Date</label>
                                                        <input type="date" name="from_date" id="from_date" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="to_date" class="form-label">To Date</label>
                                                        <input type="date" name="to_date" id="to_date" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="agency-field" class="form-label">Agency</label>
                                                        <select name="agency_id" id="agency-field" class="select2">
                                                            @foreach ($agencies as $agency)
                                                                <option value="{{ $agency->id }}">{{ $agency->agencyname }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="package-field" class="form-label">Package</label>
                                                        <select name="package" id="package-field" class="select2 form-select">
                                                            <option value="">--- SELECT PACKAGES ---</option>
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
                                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="base-tab2">
                                    <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie pastry cotton candy oat cake fruitcake jelly chupa chups. Pudding caramels pastry powder cake soufflé wafer caramels. Jelly-o pie cupcake.</p>
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
        $("#agency-field").change(function(e) {
            let agency_id = e.target.value;
            
            getAgencyMedicalPackages(agency_id, function(packages) {
                let medical_packages_select = document.querySelector('#package-field');
                
                // Clear existing options
                medical_packages_select.innerHTML = '';

                packages.forEach(package => {
                    let option = document.createElement('option');
                    option.value = package.id;
                    option.innerHTML = package.packagename;
                    medical_packages_select.appendChild(option);
                });
            });
        });

        function getAgencyMedicalPackages(agency_id, callback) {
            $.ajax({
                method: "GET",
                url: `/packages/agency/${agency_id}`,
                success: function(response) {
                    callback(response.packages);
                }
            });
        }
    </script>
@endpush
