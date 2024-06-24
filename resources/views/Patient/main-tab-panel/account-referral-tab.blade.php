<div role="tabpanel" class="tab-pane false" id="account-referral" aria-labelledby="account-pill-referral"
    aria-expanded="false">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Edit Referral Slip</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                @if ($referral)
                    @include('Referral.ReferralForms.edit-form')
                @else
                    <div class="d-flex justify-content-center align-items-center flex-column gap-2">
                        <div class="h4 text-center">No Referral Slip Found</div>
                        <button class="btn btn-primary text-center" id="generate-modal-referral-btn" data-toggle="modal"
                            data-target="#genereate-referral">Generate Referral Slip</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Search Modal --}}
    <div class="modal fade text-left" id="genereate-referral" tabindex="-1" role="dialog"
        aria-labelledby="generateReferralLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="generateReferralLabel">Basic Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 border-right p-2">
                            <h4>Same Records</h4>
                            <div class="row gap-2 same-records-container">
                                <div class="search-loading">
                                    <img src="{{ URL::asset('app-assets/images/icons/loading.gif') }}" alt="">
                                    <h3>Searching for same record...</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-center align-items-start">
                            <button class="btn btn-primary" id="generate-new-referral-btn">Generate New
                                Referral</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).on("click", "#generate-modal-referral-btn", function(e) {
            let patient_id = "{{ $patient->id }}";
            let url = `/referral-slips/search?search-patient=true&patient_id=${patient_id}`;
            $('.same-records-container').html('');
            $('.search-loading').css('display', 'flex');
            $.ajax({
                url,
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        displayReferrals(response.referrals, patient_id);
                        $('.search-loading').css('display', 'none');
                    }
                }
            })
        })

        $(document).on("click", "#generate-new-referral-btn", function(e) {
            let patient_id = "{{ $patient->id }}";
            Swal.fire({
                title: 'Are you sure you want to generate referral for this record?',
                html: "The referral record will be synced with the patient record. You cannot revert it.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#156f29',
                confirmButtonText: 'Yes, generate!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            url: "/referral-slips/generate-with-patient",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                patient_id: patient_id,
                            },
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire('Synced!', response.message, 'success').then(
                                        result => {
                                            if (result.isConfirmed) {
                                                toastr.success(response.message, 'Success');
                                                location.reload();
                                            }
                                        })
                                }
                            },
                        })
                        .fail(function(errorObj, textStatus, error) {
                            let response = errorObj.responseJSON;
                            if (response) {
                                Swal.fire('Failed!', response.message, 'error').then(
                                    result => {
                                        if (result.isConfirmed) {
                                            toastr.error(response.message, 'Error');
                                            location.reload();
                                        }
                                    })
                            }
                        })
                }
            })
        })

        function displayReferrals(referrals, patientId) {
            let sameRecordContainer = document.querySelector('.same-records-container');

            let output = '';
            if (referrals.length > 0) {
                referrals.forEach(referral => {
                    let registered_date = new Date(referral.created_date);
                    registered_date = dateToWords(registered_date);
                    output += `<div class="col-lg-12 border p-2 rounded">
                                        <h6 class="my-1"><span class="fw-bold">Name: </span> ${referral.firstname} ${referral.middlename} ${referral.lastname}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Email: </span> ${referral.email_employee}</h6>
                                        <h6 class="my-1"><span class="fw-bold">SIRB: </span> ${referral.ssrb}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Passport: </span> ${referral.passport}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Position: </span> ${referral.position_applied}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Registered Date: </span> ${registered_date}</h6>
                                        <div class="border-top py-50"></div>
                                        <button onclick="handleSyncRecord(${patientId}, ${referral.id})" class="btn btn-primary btn-block">SYNC TO THIS RECORD</button>
                                </div>`;
                });
                sameRecordContainer.innerHTML = output;
            } else {
                output += `<div class="col-lg-5 text-center border p-2 m-1 rounded">
                                    No Record Found
                            </div>`;
                sameRecordContainer.innerHTML = output;
            }
        }

        function handleSyncRecord(user_id, referral_id) {
            Swal.fire({
                title: 'Are you sure you want to sync the selected referral with this record?',
                html: "The referral record will be changed based in the record that you selected. You cannot revert it.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#156f29',
                confirmButtonText: 'Yes, sync it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/referral-slips/update-with-patient",
                        method: "PUT",
                        data: {
                            _token: "{{ csrf_token() }}",
                            user_id: user_id,
                            referral_id: referral_id,
                        },
                        success: function(response) {
                            if (response.status) {
                                Swal.fire('Synced!', response.message, 'success').then(
                                    result => {
                                        if (result.isConfirmed) {
                                            toastr.success(response.message, 'Success');
                                            location.reload();
                                        }
                                    })
                            }
                        }
                    })
                }
            })
        }

        function dateToWords(date) {
            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            const daySuffixes = ["th", "st", "nd", "rd"];

            function getDaySuffix(day) {
                if (day % 10 === 1 && day % 100 !== 11) {
                    return daySuffixes[1];
                } else if (day % 10 === 2 && day % 100 !== 12) {
                    return daySuffixes[2];
                } else if (day % 10 === 3 && day % 100 !== 13) {
                    return daySuffixes[3];
                } else {
                    return daySuffixes[0];
                }
            }

            function formatTime(hours, minutes) {
                const period = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12 || 12; // Convert to 12-hour format
                minutes = minutes.toString().padStart(2, '0'); // Ensure two-digit minutes
                return `${hours}:${minutes} ${period}`;
            }

            const year = date.getFullYear();
            const month = months[date.getMonth()];
            const day = date.getDate();
            const daySuffix = getDaySuffix(day);
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const time = formatTime(hours, minutes);

            return `${month} ${day}${daySuffix}, ${year} ${time}`;
        }
    </script>
@endpush
