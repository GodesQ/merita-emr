@extends('layouts.agency-layout')

@section('content')
    <style>
        .search-list {
            width: 97%;
            background-color: white;
            position: absolute;
            margin-top: 0.5rem;
            padding-left: 0;
            z-index: 100 !important;
            display: none;
            border: 1px solid lightgray;
            border-radius: 5px;
        }

        .search-list li {
            cursor: pointer;
            width: 100%;
            padding: .5rem 1rem;
            background: white;
            border-bottom: 1px solid lightgray;
            z-index: 100 !important;
        }

        .search-list li:hover {
            background: whitesmoke;
        }
    </style>
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
                    <section id="number-tabs">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body position-relative">
                                            <h5 class="mb-2">Search Crew</h5>
                                            <fieldset>
                                                <div class="input-group">
                                                    <input type="text" id="search-bar" class="form-control"
                                                        placeholder="Search your crew here..."
                                                        aria-describedby="button-addon2">
                                                    <div class="input-group-append" id="button-addon2">
                                                        <button class="btn btn-primary" id="search-btn"
                                                            type="button">Search</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <ul class="search-list"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form id="store_referral" method="POST" class="referral-steps wizard-circle">
                                                @csrf
                                                <!-- Crew Information Step -->
                                                @include('Referral.components.crew-information-form')

                                                <!-- Schedule Form Step -->
                                                @include('Referral.components.schedule-form')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>



    <script>
        // For referral steps
        $(".referral-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function(event, currentIndex) {
                if (signaturePad._isEmpty) {
                    return Swal.fire(
                        'Warning!',
                        'Signature is required!',
                        'warning'
                    );
                }

                let signatureData = signaturePad.toDataURL();
                let signatureInput = document.querySelector('.signature-data');
                let referralForm = document.querySelector('#store_referral');

                signatureInput.value = signatureData;
                if (signatureInput.value != "") {
                    const fd = new FormData(referralForm);
                    $(".main-loader").css("display", "block");
                    $.ajax({
                        url: '/referral-slips/store',
                        method: 'POST',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire('Added!', 'Referral Slip Added Successfully!', 'success')
                                    .then((result) => {
                                        // Redirect to list of referral slips
                                        if (result.isConfirmed) location.href =
                                            '/referral-slips';
                                    });
                            }
                        },
                        error: function(response) {
                            let responseJSON = response?.responseJSON;
                            toastr.error(responseJSON?.message, 'Fail');
                            if (response.status == 422) {
                                let errors = responseJSON?.errors;
                                for (const key in errors) {
                                    const element = document.querySelector(
                                        `span[error-name="${key}"]`);
                                    if (element) element.innerText = errors[key];
                                }
                                $(".main-loader").css("display", "none");
                                toastr.error("Invalid Fields.", 'Fail');
                            }
                        }
                    }).done(function(data) {
                        $(".main-loader").css("display", "none");
                    });
                }
            }
        });
    </script>

    <script>
        const canvas = document.querySelector(".signature");
        const signaturePad = new SignaturePad(canvas, {
            penColour: '#fff',
            penWidth: 2,
        });

        document.querySelector('.clear-signature').addEventListener('click', () => {
            signaturePad.clear();
        });

        signaturePad.addEventListener("endStroke", () => {
            let signatureData = signaturePad.toDataURL();
            let signatureInput = document.querySelector('.signature-data');
            signatureInput.value = signatureData;
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

        $('.vessel, #principal').change(function(e) {
            const otherInputId = `other-${$(this).attr('id')}`; // Dynamic other-input id
            $(`#${otherInputId}`).toggleClass('d-none', e.target.value !== 'other');
            if (e.target.value === 'other') {
                $(`#${otherInputId}`).focus();
            }
        });

        $('#search-btn').click(function(e) {
            let query = $('#search-bar').val();

            if (query.length < 3) return $('.search-list').css('display', 'none');

            $('.search-list').css('display', 'block');

            let agency_id = $('#agency_id').val();

            $.ajax({
                method: 'GET',
                url: `/patients/search?agency_id=${agency_id}&query=${query}`,
                success: function(data) {
                    $list = '';

                    if (data[0].length > 0) {
                        data[0].forEach(patient => {
                            $list +=
                                `<li data-id="${patient.id}">${patient.firstname} ${patient.lastname}</li>`
                        });
                    } else {
                        data[0].forEach(patient => {
                            $list += `<li>No Crew Found.</li>`
                        });
                    }

                    $('ul.search-list').html($list);

                    // Add the onclick event to the newly created li elements
                    $('ul.search-list li').on('click', function() {
                        const patientId = $(this).data('id');
                        getPatientInfo(patientId);
                    });
                }
            })
        })

        function getPatientInfo(patientId) {
            $('.search-list').css('display', 'none');

            $.ajax({
                url: `/patients/show/${patientId}`,
                method: 'GET',
                success: function(data) {
                    $('#firstname').val(data.patient.firstname);
                    $('#lastname').val(data.patient.lastname);
                    $('#middlename').val(data.patient.middlename);
                    $('#address').val(data.patient.patientinfo.address);
                    $('#email_employee').val(data.patient.email);
                    $('#birthplace').val(data.patient.patientinfo.birthplace);
                    $('#birthdate').val(data.patient.patientinfo.birthdate);
                    $('#age').val(data.patient.age);
                    $('#passport').val(data.patient.patientinfo.passportno);
                    $('#ssrb').val(data.patient.patientinfo.srbno);
                    $('#nationality').val(data.patient.patientinfo.nationality);
                    $('#civil_status').val(data.patient.patientinfo.maritalstatus);
                    $('#gender').val(data.patient.gender);

                }
            })
        }
    </script>
@endpush
