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
                        <h4 class="card-title" id="basic-layout-form">Edit Request</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" id="update_request" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$request->id}}">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-user"></i>Request</h4>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Request Title</label>
                                                    <input type="text" class="form-control" name='title'
                                                        value="{{$request->title}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Exams</label>
                                                    <select name="exams[]" required class="select2 form-control"
                                                        multiple="multiple">
                                                        @foreach($selected_exams as $selected_exam)
                                                        <option selected value="{{$selected_exam->exam_id}}">
                                                            {{$selected_exam->examname}}
                                                        </option>
                                                        @endforeach
                                                        @foreach($exams as $exam)
                                                        <option value="{{$exam->id}}">{{$exam->examname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="/list_request" type="reset" class="btn btn-warning mr-1">
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
$("#update_request").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $.ajax({
        url: '/update_request',
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
                    'Request Update Successfully!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            } else {
                Swal.fire(
                    'Not Send!',
                    'Request Update Failed!',
                    'warning'
                )
            }
        }
    });
});
</script>
@endpush