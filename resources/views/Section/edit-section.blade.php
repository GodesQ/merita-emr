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
    <div class="content-body my-2">
        <section id="basic-form-layouts">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Section</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" id="update_section" method="POST">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-user"></i>Section</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Section Name</label>
                                                <input type="text" class="form-control" name='sectionname'
                                                    value="{{$section->sectionname}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sections">Floor</label>
                                                <select id="sections" name="floor" class="form-control">
                                                    <option value="{{$section->floor}}" selected="" disabled="">
                                                        {{$section->floor}}</option>
                                                    <option value="1ST">1ST</option>
                                                    <option value="2ND">2ND</option>
                                                    <option value="3RD">3RD</option>
                                                    <option value="4TH">4TH</option>
                                                    <option value="5TH">5TH</option>
                                                    <option value="6TH">6TH</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Updated at</label>
                                                <input class="form-control" type="text" name="updated_at" value="@php echo date('Y-m-d');
                                    @endphp" readonly>
                                                <input type="hidden" name="id" value="{{$section->id}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="/list_section" type="reset" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
<script>
$("#update_section").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $.ajax({
        url: '/update_section',
        method: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.status == 200) {
                Swal.fire(
                    'Update!',
                    'Section Update Successfully!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "/list_section";
                    }
                })
            } else {
                Swal.fire(
                    'Not Send!',
                    'Chart Account Added Failed!',
                    'warning'
                )
            }
        }
    });
});
</script>
@endpush