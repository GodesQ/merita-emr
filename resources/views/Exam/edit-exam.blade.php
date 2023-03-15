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
                        <h4 class="card-title" id="basic-layout-form">Add Exam</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form id="update_exam" action="/update_exam" method="POST">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-user"></i>Exam</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Exam Name</label>
                                                <input type="text" class="form-control" name='examname'
                                                    value="{{$exam->examname}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="text" class="form-control" name='price'
                                                        value="{{$exam->price}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <input type="text" class="form-control" name='category'
                                                    value="{{$exam->category}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Section</label>
                                                    <select required name="section" id="" class="form-control">
                                                        <option value="" disabled="" selected="">Select Section
                                                        </option>
                                                        @foreach($sections as $section)
                                                        <option {{ $section->id == $exam->section_id ? 'selected' : null }} value="{{$section->id}}">{{$section->sectionname}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Created at</label>
                                                <input class="form-control" type="text" name="created_at" value="@php echo date('Y-m-d');
                                    @endphp" readonly>
                                                <input type="hidden" name="id" value="{{$exam->id}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="/list_exam" type="reset" class="btn btn-warning mr-1">
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
$("#update_exam").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $.ajax({
        url: '/update_exam',
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
                    'Exam Update Successfully!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "/list_exam";
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