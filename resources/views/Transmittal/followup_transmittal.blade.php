@extends('layouts.admin-layout')

@section('content')
    <div class="app-content content">
        <div class="content-body my-2">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2>Follow Up Transmittal</h2>
                    </div>
                    <div class="card-content">
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
                                                        <option value="{{ $agency->id }}">{{ $agency->agencyname }}
                                                        </option>
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
                                                            class="custom-control-input" name="additional_columns[]"
                                                            id="vital_signs">
                                                        <label class="custom-control-label" for="vital_signs">Vital Sign
                                                        </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="bmi" class="custom-control-input"
                                                            name="additional_columns[]" id="bmi">
                                                        <label class="custom-control-label" for="bmi">BMI </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="vessel" class="custom-control-input"
                                                            name="additional_columns[]" id="vessel">
                                                        <label class="custom-control-label" for="vessel">Vessel </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="emp_status"
                                                            class="custom-control-input" name="additional_columns[]"
                                                            id="emp_status">
                                                        <label class="custom-control-label" for="emp_status">Employee Status
                                                        </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="medical_package"
                                                            class="custom-control-input" name="additional_columns[]"
                                                            id="medical_package">
                                                        <label class="custom-control-label" for="medical_package">Medical
                                                            Package </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group bahia-group">
                                                <label for="">Bahia Vessels <span class="primary"
                                                        style="font-size: 12px; font-style:italic;">(This is for Bahia
                                                        Agency Only)</span></label>
                                                <select name="bahia_vessel" id="bahia-select-vessels" class="select2">
                                                    <option value="">Select Vessel</option>
                                                </select>
                                            </div>
                                            <div class="form-group hartmann-group">
                                                <label for="">Hartmann Principals <span class="primary"
                                                        style="font-size: 12px; font-style:italic;">(This is for Hartmann
                                                        Agency Only)</span></label>
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

@push('scripts')
    <script>
        let vessels_one = ['BLUETERN/BOLDTERN/BRAVETERN'];
        let vessels_two = ['BALMORAL/BOREALIS'];
        let vessel_three = ['BOLETTE/BRAEMAR'];
        let all_vessel = [...vessels_one, ...vessels_two, ...vessel_three];
        let agency_ids = [55, 57, 58, 59, 3];

        $(".hartmann-group").css("display", "none");
        $(".bahia-group").css("display", "none");

        let hartmann_principals = ['DONNELLY TANKER MANAGEMENT LTD', 'INTERNSHIP NAVIGATION CO. LTD',
            'HARTMANN GAS CARRIER GERMANY GMBH & CO. KG.', 'SEAGIANT SHIPMANAGEMENT LTD.'
        ];

        let agency = document.querySelector('#agency');

        function getAgency(event) {
            getHartmannPrincipals(event);
            getBahiaVessels(event);
        }

        function getHartmannPrincipals(e) {
            $('.hartmann-select-principals option').remove();
            if (e.value == 9) {
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

            if (e.value == 55) {
                vessel_three.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '#bahia-select-vessels');
                });

            }

            if (e.value == 57) {
                vessels_two.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '#bahia-select-vessels');
                });

            }

            if (e.value == 58) {
                vessels_one.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '#bahia-select-vessels');
                });

            }

            if (e.value == 3) {
                all_vessel.forEach(vessel => {
                    $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '#bahia-select-vessels');
                });

            }

            if (agency_ids.includes(Number(e.value))) {
                $(".bahia-group").css("display", "block");
            } else {
                $(".bahia-group").css("display", "none");
            }

        }
    </script>
@endpush
