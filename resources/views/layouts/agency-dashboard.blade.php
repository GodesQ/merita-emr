@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')

<div class="app-content content">
    <div class="container my-2">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><h3>Filter Employee</h3></div>
            </div>
            <hr>
            <div class="card-body">
                <form action="filter_agency_employee">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start-date">Start Date</label>
                                <input class="form-control" id="start-date" name="start_date" value="{{ session()->get('start_date') }}" type="date" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end-date">End Date</label>
                                <input class="form-control" id="end-date" name="end_date" type="date" value="{{ session()->get('end_date') }}" />
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Actions</label><br>
                           <button id="filter_button" name="action" value="filter" class="btn btn-primary btn-solid">Filter</button>
                           <button id="filter_button" name="action" value="clear" class="btn btn-secondary btn-solid">Select All</button>                            
                        </div>
                        <div class="col-md-3 form-group">
                            <label><strong>Status :</strong></label>
                            <select id='status' class="form-control" style="width: 200px">
                                <option value="">All</option>
                                <option value="1">Registered</option>
                                <option value="2">Admitted & Taking Exam</option>
                                <option value="3">Re Assessment</option>
                                <option value="4">Fit to Work</option>
                                <option value="5">Unfit to Work</option>
                                <option value="6">Unfit Temporarily</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row p-1">
            <div class="shadow-sm col-lg-3 bg-white p-1">
                <span class="h6 font-weight-normal">DECK</span> <br>
                <div class="h4 font-bold mt-50">{{$category_count['deck']}} PATIENTS</div>
            </div>
            <div class="shadow-sm col-lg-3 bg-white p-1">
                <span class="h6 font-weight-normal">ENGINE</span> <br>
                <div class="h4 font-bold mt-50">{{$category_count['engine']}} PATIENTS</div>
            </div>
            <div class="shadow-sm col-lg-3 bg-white p-1">
                <span class="h6 font-weight-normal">CATERING</span> <br>
                <div class="h4 font-bold mt-50">{{$category_count['catering']}} PATIENTS</div>
            </div>
            <div class="shadow-sm col-lg-3 bg-white p-1">
                <span class="h6 font-weight-normal">OTHER</span> <br>
                <div class="h4 font-bold mt-50">{{$category_count['other']}} PATIENTS</div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Your Employees Information</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12 table-responsive">
                    <table data-order='[[ 0, "desc" ]]' class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Patient Code</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Category</th>
                                <th>Package</th>
                                <th>Passport No.</th>
                                <th>SSRB No.</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let table = $('.data-table').DataTable({
        processing: true,
        pageLength: 15,
        serverSide: true,
        deferRender: true,
        search: {
            "regex": true
        },
        ajax: {
              url: "/agency_patient_table",
              data: function (d) {
                    d.status = $('#status').val(),
                    d.search = $('input[type="search"]').val()
                }
            },
        columns: [{
                data: 'patientcode',
                name: 'patientcode'
            },
            {
                data: 'lastname',
                name: 'lastname',
                orderable: true,
                searchable: true
            },
            {
                data: 'firstname',
                name: 'firstname',
                orderable: true,
                searchable: true
            },
            {
                data: 'category',
                name: 'category',
                orderable: true,
                searchable: true
            },
            {
                data: 'medical_package',
                name: 'medical_package',
                orderable: true,
                searchable: true
            },
            {
                data: 'passportno',
                name: 'passportno',
                orderable: true,
                searchable: true
            },
            {
                data: 'ssrbno',
                name: 'ssrbno',
                orderable: true,
                searchable: true
            },
            {
                data: 'status',
                name: 'status',
                orderable: true,
                searchable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
    });
    
    
    $('#status').change(function() {
        table.draw();
    });
</script>
@endpush