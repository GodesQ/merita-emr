@extends('layouts.admin-layout')

@section('content')
    <style>
        .table th,
        .table td {
            padding: 0.5rem;
        }

        @media screen and (max-width: 1140px) {
            .data-table tbody tr td {
                font-size: 10px;
            }
        }
    </style>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">

                @if (Session::get('fail'))
                    <div class="danger alert-danger p-2 my-2 rounded">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @if (Session::get('success'))
                    @push('scripts')
                        <script>
                            toastr.success('{{ Session::get('success') }}', 'Success');
                        </script>
                    @endpush
                @endif

                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="container mb-1 p-0">
                            <input type="date" max="2050-12-31" name="request_date"
                                value="{{ session()->get('request_date') }}" id="request_date" class="form-control">
                        </div>
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title">Total Numbers of Medical Packages Today</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="data-table">
                                            <thead>
                                                <th>Medical Package</th>
                                                <th>Total</th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="card" data-toggle="modal" data-target="#fit-patients" style="cursor: pointer;" onclick="getFitPatients()">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="primary">{{ str_pad($total_fit, 2, "0", STR_PAD_LEFT) }}</h3>
                                                    <span>Total Fit</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-user primary font-large-2 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade text-left" id="fit-patients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel17">Fit Patients</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="fit-patients-container">
                                                    <div class="fit-patients-header row p-1">
                                                        <div class="col-md-3">Patient Code</div>
                                                        <div class="col-md-3">Patient Name</div>
                                                        <div class="col-md-3">Agency</div>
                                                        <div class="col-md-3">Package</div>
                                                    </div>
                                                    <hr>
                                                    <div class="fit-patients-content row p-1"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="card" data-toggle="modal" data-target="#unfit-patients" onclick="getUnFitPatients()">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="danger">{{ str_pad($total_unfit, 2, "0", STR_PAD_LEFT) }}</h3>
                                                    <span>Total Unfit</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-user danger font-large-2 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade text-left" id="unfit-patients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel17">Unfit Patients</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="unfit-patients-container">
                                                    <div class="unfit-patients-header row p-1">
                                                        <div class="col-md-3">Patient Code</div>
                                                        <div class="col-md-3">Patient Name</div>
                                                        <div class="col-md-3">Agency</div>
                                                        <div class="col-md-3">Package</div>
                                                    </div>
                                                    <hr>
                                                    <div class="unfit-patients-content row p-1"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="card" data-toggle="modal" data-target="#pending-patients" onclick="getPendingPatients()" style="cursor: pointer;">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="warning">{{ str_pad($total_pending, 2, "0", STR_PAD_LEFT) }}</h3>
                                                    <span>Total Pending</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-user warning font-large-2 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade text-left" id="pending-patients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel17">Pending Patients</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="pending-patients-container">
                                                    <div class="pending-patients-header row p-1">
                                                        <div class="col-md-3">Patient Code</div>
                                                        <div class="col-md-3">Patient Name</div>
                                                        <div class="col-md-3">Agency</div>
                                                        <div class="col-md-3">Package</div>
                                                    </div>
                                                    <hr>
                                                    <div class="pending-patients-content row p-1"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Transmittal</div>
                                </div>
                                <div class="card-body">
                                    <section id="basic-form-layouts">
                                        <form action="transmittal_print" method="GET" target="_blank">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="date_from">Date From :</label>
                                                        <input required type="date" max="2050-12-31" name="date_from"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="date_to">Date To :</label>
                                                        <input required type="date" max="2050-12-31" name="date_to"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Agency</label>
                                                        <select name="agency_id" id="agency" class="select2"
                                                            onchange="getAgency(this)">
                                                            <option value="">All</option>
                                                            @foreach ($agencies as $agency)
                                                                <option value="{{ $agency->id }}">
                                                                    {{ $agency->agencyname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Patient Status</label>
                                                        <select name="patientstatus" id="" class="select2">
                                                            <option value="">All</option>
                                                            <option value="Fit">Fit</option>
                                                            <option value="Unfit">Unfit</option>
                                                            <option value="Pending">Pending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Select Additional Columns</label>
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" value="vital_signs"
                                                                    class="custom-control-input"
                                                                    name="additional_columns[]" id="vital_signs">
                                                                <label class="custom-control-label"
                                                                    for="vital_signs">Vital Sign </label>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" value="bmi"
                                                                    class="custom-control-input"
                                                                    name="additional_columns[]" id="bmi">
                                                                <label class="custom-control-label" for="bmi">BMI
                                                                </label>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" value="vessel"
                                                                    class="custom-control-input"
                                                                    name="additional_columns[]" id="vessel">
                                                                <label class="custom-control-label" for="vessel">Vessel
                                                                </label>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" value="emp_status"
                                                                    class="custom-control-input"
                                                                    name="additional_columns[]" id="emp_status">
                                                                <label class="custom-control-label"
                                                                    for="emp_status">Employee Status </label>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" value="medical_package"
                                                                    class="custom-control-input"
                                                                    name="additional_columns[]" id="medical_package">
                                                                <label class="custom-control-label"
                                                                    for="medical_package">Medical Package </label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group bahia-group">
                                                        <label for="">Bahia Vessels <span class="primary"
                                                                style="font-size: 12px; font-style:italic;">(This is for
                                                                Bahia Agency Only)</span></label>
                                                        <select name="bahia_vessel" id="bahia-select-vessels"
                                                            class="select2">
                                                            <option value="">Select Vessel</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group hartmann-group">
                                                        <label for="">Hartmann Principals <span class="primary"
                                                                style="font-size: 12px; font-style:italic;">(This is for
                                                                Hartmann Agency Only)</span></label>
                                                        <select name="hartmann_principal"
                                                            class="select2 hartmann-select-principals">
                                                            <option value="">Select Principal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <input type="submit" name="action" value="Download CSV"
                                                    class="btn btn-primary">
                                                <input type="submit" name="action" value="PRINT"
                                                    class="btn btn-primary">
                                            </div>
                                        </form>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::get('success_support'))
        @push('scripts')
            <script>
                toastr.success('{{ Session::get('success_support') }}', 'Success');
            </script>
        @endpush
    @endif
@endsection

@push('scripts')
    <script>
        let table = $('#data-table').DataTable({
            searching: true,
            processing: true,
            pageLength: 10,
            serverSide: true,
            ajax: {
                url: '/today_medical_packages',
                data: function(d) {
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'packagename',
                    name: 'packagename'
                },
                {
                    data: 'total',
                    name: 'total'
                }
            ],
        })

        $("#request_date").change(function(e) {
            $.ajax({
                url: "/dashboard",
                data: {
                    "request_date": e.target.value
                },
                success: function(result) {
                    console.log(result);
                    location.reload();
                }
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        let vessels_one = ['BLUETERN/BOLDTERN/BRAVETERN'];
        let vessels_two = ['BALMORAL/BOREALIS'];
        let vessel_three = ['BOLETTE/BRAEMAR'];
        let all_vessel = [...vessels_one, ...vessels_two, ...vessel_three];
        let agency_ids = [55, 57, 58, 59, 3];

        $(".hartmann-group").css("display", "none");
        $(".bahia-group").css("display", "none");

        let hartmann_principals = ['DONNELLY TANKER MANAGEMENT LTD', 'INTERNSHIP NAVIGATION CO. LTD', 'HARTMANN GAS CARRIER GERMANY GMBH & CO. KG.', 'SEAGIANT SHIPMANAGEMENT LTD.'];

        let agency = document.querySelector('#agency');

        function getAgency(event) {
                getHartmannPrincipals(event);
                getBahiaVessels(event);
        }

        function getHartmannPrincipals(e) {
            $('.hartmann-select-principals option').remove();
            if(e.value == 9) {
                hartmann_principals.forEach(principal => {
                    $(`<option value='${principal}'>${principal}</option>`).appendTo(
                    '.hartmann-select-principals');
                });
                $(".hartmann-group").css("display", "block");
            } else {
                $(".hartmann-group").css("display", "none");
            }
        }

        function getBahiaVessels(e) {
            $('#bahia-select-vessels option').remove();

            if(e.value == 55) {
                vessel_three.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                            '#bahia-select-vessels');
                });

            }

            if(e.value == 57) {
                vessels_two.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                            '#bahia-select-vessels');
                });

            }

            if(e.value == 58) {
                vessels_one.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                            '#bahia-select-vessels');
                });

            }

            if(e.value == 3) {
                all_vessel.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                            '#bahia-select-vessels');
                });

            }

            if(agency_ids.includes(Number(e.value))) {
                $(".bahia-group").css("display", "block");
            } else {
                $(".bahia-group").css("display", "none");
            }

        }

        function getFitPatients() {
            $.ajax({
                url: "/today_fit_patients",
                success: function(results) {
                    console.log(results);
                    let output = '';

                    if(results.length > 0) {
                        results.forEach(result => {
                            output += `<div class="col-md-3 border-bottom py-75"><a href=/patient_edit?id=${result.patient.id}&patientcode=${result.patient.patientcode}>${result.patient.patientcode}</a></div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.firstname} ${result.patient.lastname}</div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.patientinfo.agency.agencyname}</div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.patientinfo.package.packagename}</div>`;
                        })
                    } else {
                        output += `<div class="col-md-12 py-75 text-center">No Patients Found</div>`;
                    }

                    $('.fit-patients-content').html(output);

                }
            });
        }

        function getUnFitPatients() {
            $.ajax({
                url: "/today_unfit_patients",
                success: function(results) {
                    console.log(results);
                    let output = '';

                    if(results.length > 0) {
                        results.forEach(result => {
                            output += `<div class="col-md-3 border-bottom py-75"><a href=/patient_edit?id=${result.patient.id}&patientcode=${result.patient.patientcode}>${result.patient.patientcode}</a></div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.firstname} ${result.patient.lastname}</div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.patientinfo.agency.agencyname}</div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.patientinfo.package.packagename}</div>`;
                        })
                    } else {
                        output += `<div class="col-md-12 py-75 text-center">No Patients Found</div>`;
                    }

                    $('.unfit-patients-content').html(output);


                }
            });
        }

        function getPendingPatients() {
            $.ajax({
                url: "/today_pending_patients",
                success: function(results) {
                    console.log(results);
                    let output = '';

                    if(results.length > 0) {
                        results.forEach(result => {
                            output += `<div class="col-md-3 border-bottom py-75"><a href=/patient_edit?id=${result.patient.id}&patientcode=${result.patient.patientcode}>${result.patient.patientcode}</a></div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.firstname} ${result.patient.lastname}</div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.patientinfo.agency.agencyname}</div>
                                        <div class="col-md-3 border-bottom py-75">${result.patient.patientinfo.package.packagename}</div>`;
                        })
                    } else {
                        output += `<div class="col-md-12 py-75 text-center">No Patients Found</div>`;
                    }

                    $('.pending-patients-content').html(output);


                }
            });
        }
    </script>
@endpush

