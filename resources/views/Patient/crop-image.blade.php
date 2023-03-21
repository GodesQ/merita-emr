@extends('layouts.admin-layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
@section('name')
    {{ $data['employeeFirstname'] . ' ' . $data['employeeLastname'] }}
@endsection

@section('employee_image')
    @if ($data['employee_image'] != null || $data['employee_image'] != '')
        <img src="../../../app-assets/images/employees/{{ $data['employee_image'] }}" alt="avatar">
    @else
        <img src="../../../app-assets/images/profiles/profilepic.jpg" alt="default avatar">
    @endif
@endsection

@section('content')
    <style>
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 100%;
            height: 160px;
            margin: 10px;
            border: 1px solid rgb(0, 0, 0);
        }
    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title">CROP SIGNATURE</div>
                                <button class="btn btn-primary" id="return_signature_btn" type="btn">Return to Default
                                    Signature</button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Patient Code</label>
                                        <input type="text" value="{{ $patient->patientcode }}" name="patientcode"
                                            readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Patient Code</label>
                                        <input type="text" value="{{ $patient->firstname . ' ' . $patient->lastname }}"
                                            name="patientcode" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-6">
                                    @if ($patient->patient_signature)
                                        <img class="crop-image"
                                            src="@php echo base64_decode($patient->patient_signature) @endphp"
                                            style="width: 100%;" />
                                    @elseif ($patient->signature)
                                        <img class="crop-image" src="data:image/jpeg;base64,{{ $patient->signature }}" />
                                    @else
                                        <div style="width: 150px;height: 40px;" class="bg-white rounded"></div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="preview"></div>
                                    {{-- <button class="btn btn-primary mx-1">Confirm</button>
                                <div class="filters m-1">
                                    <h3>Filters</h3>
                                    <label for="contrast">Contrast</label>
                                    <br>
                                    <input type="range" name="contrast" id="" min="0" max="100" value="0" onchange="applyFilter()" data-filter="contrast" data-scale="%">
                                    <br>
                                    <label for="blur">Blur</label>
                                    <br>
                                    <input type="range" name="blur" id="" min="0" max="100" value="0" onchange="applyFilter()" data-filter="blur" data-scale="px">
                                </div> --}}
                                </div>
                            </div>
                            <div class="form-footer float-right">
                                <button class="btn btn-secondary" onclick="history.back()">Back</button>
                                <button class="btn btn-primary crop-btn">Crop</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <script>
        const image = document.querySelector('.crop-image');
        const cropper = new Cropper(image, {
            aspectRatio: 0,
            viewMode: 16 / 9,
            preview: '.preview',
        });

        $(".crop-btn").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    let csrf = '{{ csrf_token() }}';
                    Swal.fire({
                        title: 'Are you sure you want to save it?',
                        text: "",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, save it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "{{ route('patient.crop.save') }}",
                                data: {
                                    _token: csrf,
                                    image: base64data,
                                    id: '{{ $patient->id }}'
                                },
                                success: function(response) {
                                    if (response.status == 201) {
                                        Swal.fire(
                                            'Saved!',
                                            'Record has been saved.',
                                            'success'
                                        ).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href =
                                                    response.redirect_url;
                                            }
                                        })
                                    } else {
                                        Swal.fire(
                                            'Error Occured!',
                                            'Internal Server Error.',
                                            'error'
                                        ).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        })
                                    }
                                }
                            });
                        }
                    })

                };
            });
        });


        $('#return_signature_btn').click(function() {
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure you want to return signature?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#000',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('patient.return_default_signature') }}",
                        data: {
                            _token: csrf,
                            id: '{{ $patient->id }}'
                        },
                        success: function(response) {
                            if (response.status == 201) {
                                Swal.fire(
                                    'Saved!',
                                    'Signature has been returned.',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            }
                        }
                    });
                }
            })
        })
    </script>
@endpush
