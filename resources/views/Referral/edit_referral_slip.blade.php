@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')

<div class="app-content content">
    <div class="main-loader">
        <div class="loader">
            <span class="loader-span"><img src="../../../app-assets/images/icons/output-onlinegiftools.gif"
                    alt="Loading"></span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-1">
                <div class="card">
                    <div class="alert alert-danger alert-dismissible mb-2 d-none" id="error" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="error-message"></span>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Referral Slip</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            @include('Referral.ReferralForms.edit-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../../app-assets/js/scripts/signature_pad-master/js/signature_pad.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

<script>
const canvas = document.querySelector(".signature");
const signaturePad = new SignaturePad(canvas, {
    penColour: '#fff',
    penWidth: 2,
});

document.querySelector('.clear-signature').addEventListener('click', () => {
    signaturePad.clear();
});

document.querySelector('.lastname').onchange = function() {
    let signatureData = signaturePad.toDataURL();
    let signatureInput = document.querySelector('.signature-data');
    signatureInput.value = signatureData;
}

$("#store_refferal").submit(function(e) {
    e.preventDefault();
    if (signaturePad._isEmpty) {
        Swal.fire(
            'Warning!',
            'Signature is required!',
            'warning'
        )
    } else {
        let signatureData = signaturePad.toDataURL();
        let signatureInput = document.querySelector('.signature-data');
        signatureInput.value = signatureData;
        if (signatureInput != "") {
            const fd = new FormData(this);
            $(".main-loader").css("display", "block");
            $.ajax({
                url: '/store_refferal',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'Refferal Slip Added Successfully!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.href = '/refferal_slips';
                            }
                        })
                    } else {
                        console.log(response)
                    }
                },
                error: function(response) {
                    $(".main-loader").css("display", "none");
                    $("#error").removeClass("d-none");
                    $("#error").addClass("d-block");
                    $(".error-message").text(response.responseJSON.errors.email_employee)
                    toastr.error(response.responseJSON.errors.email_employee, 'Fail');
                }
            }).done(function(data) {
                $(".main-loader").css("display", "none");
            });
        }
    }
});

function getAge(e) {
    var today = new Date();
    var birthDate = new Date(e.value);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    const ageInput = document.querySelector("#age");
    ageInput.value = age;
}

// show quantity if certificate has check
let certificateButtons = document.querySelectorAll("input[name='certificate[]']");
console.log(certificateButtons);
for (let index = 0; index < certificateButtons.length; index++) {
    const element = certificateButtons[index];
    element.addEventListener("change", (e) => {
        showQuantity(element.id);
    })
}

function showQuantity(id) {
    if (document.querySelector(`#${id}`).checked) {
        $(`#${id}_qty`).removeClass("d-none");
    } else {
        $(`#${id}_qty`).addClass("d-none");
    }
}
</script>

@endpush