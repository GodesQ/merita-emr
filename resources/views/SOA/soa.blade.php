@extends('layouts.admin-layout')

@section('content')
<style>
    .selected {
        background: white;
        color: black;
        border: 1.2px solid black;
    }
</style>
    <div class="app-content content">
        <div class="content-body my-2">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2>SOA REPORT</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <section id="basic-form-layouts">
                                <form action="/soa_print" method="GET" target="_blank">
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
                                                <select onchange="getPackages(this)" required class="form-control select2" name="agency_id">
                                                    <option value="">Select Agency</option>
                                                    @foreach($agencies as $row)
                                                        <option value="{{$row->id}}"> {{ $row->agencyname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group bahia-group" style="display: none;">
                                                <label for="">Bahia Vessels <span class="primary" style="font-size: 12px; font-style:italic;">(This is for Bahia Agency Only)</span></label>
                                                <select name="bahia_vessel" id="bahia-select-vessels" class="select2">
                                                    <option value="">Select Vessel</option>
                                                </select>
                                            </div>
                                            <fieldset class="my-1 tax-group" style="display: none;">
                                                <label for="">Tax Percentage</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Tax" name="tax" id="tax" aria-describedby="sizing-addon2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="sizing-addon2">%</span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for=""></label>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="include_package" class="custom-control-input" name="include[]" id="include_package" checked>
                                                            <label class="custom-control-label" for="include_package">Include Package </label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="include_additional_exams" class="custom-control-input" name="include[]" id="include_additional_exams">
                                                            <label class="custom-control-label" for="include_additional_exams">Include Additional Exams </label>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Medical Package</label>
                                                        <select name="package_id" id="packages" required class="form-control select2">
                                                            <option value="">Select Packages</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Currency</label> <br>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input" id="currency1" value="Dollar" name="currency">
                                                    <label class="custom-control-label" for="currency1">Dollar</label>
                                                </div>
                                                <div
                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input" id="currency2" name="currency" value="Pesos">
                                                    <label class="custom-control-label" for="currency2">Pesos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Exchange Rate</label>
                                                <input type="text" name="exchange_rate" id="exchange_rate" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Invoice Number</label>
                                                        <input type="text" class="form-control" readonly value="{{ date('Ym') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" style="font-size: 12px;">(Input your Last Invoice Number here)</label>
                                                        <input type="text" name="invoice_number" class="form-control" value="" placeholder="e.g. 0001">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">SOA Date</label>
                                                <input type="date" name="soa_date" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Terms Date: </label>
                                                <input type="date" name="terms_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="print-con">
                                                        <img src="../../../app-assets/images/gallery/template_soa1.png" alt="">
                                                        <div class="print-btn-div">
                                                            <button type="button" class="btn-print selected" onclick="selectTemplateHandler(this, 'Selected Template 1', 'Template 1')">Select Template 1</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="print-con">
                                                        <img src="../../../app-assets/images/gallery/template_soa2.png" alt="">
                                                        <div class="print-btn-div">
                                                            <button type="button" class="btn-print" onclick="selectTemplateHandler(this, 'Selected Template 2', 'Template 2')">Select Template 2</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="template" type="hidden" id="template_input" value="Template 1" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Prepared By: </label>
                                                <input type="text" name="prepared_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Approved By: </label>
                                                <input type="text" name="approved_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Additional Columns</label>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="position"
                                                            class="custom-control-input"
                                                            name="additional_columns[]"
                                                            id="position">
                                                        <label class="custom-control-label"
                                                            for="position">Position </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="age"
                                                            class="custom-control-input"
                                                            name="additional_columns[]"
                                                            id="age">
                                                        <label class="custom-control-label"
                                                            for="age">Age </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="referral"
                                                            class="custom-control-input"
                                                            name="additional_columns[]"
                                                            id="referral">
                                                        <label class="custom-control-label"
                                                            for="referral">Referral's Name </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="vessel"
                                                            class="custom-control-input"
                                                            name="additional_columns[]"
                                                            id="vessel">
                                                        <label class="custom-control-label"
                                                            for="vessel">Vessel </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Arrange By:</label>
                                                <select name="arrange_by" id="arrange_by" required class="form-control select2">
                                                    <option value="name">Name</option>
                                                    <option value="date">Date</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="action" value="Download CSV" class="btn btn-primary">
                                        <input type="submit" name="action" value="Download Excel" class="btn btn-primary">
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
    <script>
        function selectTemplateHandler(e, message, value) {
            const activeBtn = document.querySelector('.selected');
            activeBtn.classList.remove('selected');
            e.classList.add('selected');
            document.querySelector('#template_input').value = value;
        }
    </script>
@endsection

@push('scripts')
<script>

    let vessel_one = ['BLUETERN'];
    let vessel_two = ['BOLDTERN'];
    let vessel_three = ['BRAVETERN'];
    let vessel_four = ['BALMORAL'];
    let vessel_five = ['BOREALIS'];
    let vessel_six = ['BOLETTE'];
    let vessel_seven = ['BRAEMAR'];
    let all_vessel = [...['ALL VESSELS'], ...vessel_one, ...vessel_two, ...vessel_three, ...vessel_four, ...vessel_five, ...vessel_six, ...vessel_seven];

    let agency_ids = [55, 57, 58, 59, 3];

    function getPackages(e) {
        getBahiaVessels(e);
        let csrf = '{{ csrf_token() }}';
        $.ajax({
            url: '{{ route("agencies.select") }}',
            method: 'post',
            data: {
                id: e.value,
                _token: csrf
            },
            success: function(response) {
                $('#address_of_agency').val(response[1].address);
                $('#packages option').remove();
                let allOptions = [{
                        id: 'all',
                        packagename: 'All'
                    }].concat(response[0]);

                allOptions.forEach(element => {
                    $(`<option value=${element.id}>${element.packagename}</option>`).appendTo('#packages');
                });
            }
        });

        // if(e.value == 15) {
        //      $(".tax-group").css("display", "block");
        // } else {
        //      $(".tax-group").css("display", "none");
        // }
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
            vessel_two.forEach(vessel => {
                $(`<option value='${vessel}'>${vessel}</option>`).appendTo(
                        '#bahia-select-vessels');
            });
        }

        if(e.value == 58) {
            vessel_one.forEach(vessel => {
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
</script>
@endpush
