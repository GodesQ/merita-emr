@extends('layouts.agency-layout')

@section('content')
    <style>
        .card {
            border-radius: 10px;
        }

        .card-header {
            background-color: #244681;
            color: white;
        }

        .table th,
        .table td {
            padding: 0.5rem;
        }

        .search-loading {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
        }
    </style>
    <div class="app-content content">
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="text-bold-600">Referrals List</h2>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/referrals/create" class="btn btn-solid btn-primary">Add Referral</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Agency</th>
                                <th>Package</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Position Applied</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sync Modal -->
        <div class="modal fade text-left" id="sync-modal" tabindex="-1" role="dialog" aria-labelledby="sync-modal-label"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="sync-modal-label">Sync Referral</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row p-2 justify-content-center align-items-center" id="referral-record">

                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row p-2 justify-content-center" id="synced-records">

                                </div>
                            </div>
                        </div>
                        <div class="search-loading">
                            <img src="{{ URL::asset('app-assets/images/icons/loading.gif') }}" alt="">
                            <h3>Searching for same record...</h3>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
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
            pageLength: 25,
            responsive: true,
            serverSide: true,
            ajax: '/referral-slips',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'agencyname',
                    name: 'agencyname'
                },
                {
                    data: 'packagename',
                    name: 'packagename',
                },

                {
                    data: 'lastname',
                    name: 'lastname'
                },
                {
                    data: 'firstname',
                    name: 'firstname'
                },
                {
                    data: 'position_applied',
                    name: 'position_applied'
                },
                {
                    data: 'is_hold',
                    name: 'is_hold'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            order: [
                [0, 'desc'] // Sort by the first column (index 0) in descending order
            ]
        })

        $(document).on("click", "#sync-btn", function(e) {
            $('#synced-records').html('');
            $('.search-loading').css('display', 'flex');
            let referral_id = $(this).data('id');
            $.ajax({
                url: `/patients/search?search-referral=true&referral_id=${referral_id}`,
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        displayReferralRecord(response.referral);
                        displayUsers(response.users, referral_id);
                        $('.search-loading').css('display', 'none');
                    }
                }
            })
        })

        function displayReferralRecord(referral) {
            let registered_date = new Date(referral.created_date);
            registered_date = dateToWords(registered_date);
            let referralRecord = document.querySelector('#referral-record');
            let output = `<div class="col-lg-12 border p-2 rounded">
                                    <h3 class="text-center fw-bold">Referral Record</h3>
                                    <h6 class="my-1"><span class="fw-bold">Name: </span> ${referral.firstname} ${referral.middlename} ${referral.lastname}</h6>
                                    <h6 class="my-1"><span class="fw-bold">Email: </span> ${referral.email_employee}</h6>
                                    <h6 class="my-1"><span class="fw-bold">SIRB: </span> ${referral.ssrb}</h6>
                                    <h6 class="my-1"><span class="fw-bold">Passport: </span> ${referral.passport}</h6>
                                    <h6 class="my-1"><span class="fw-bold">Position: </span> ${referral.position_applied}</h6>
                                    <h6 class="my-1"><span class="fw-bold">Registered Date: </span> ${registered_date}</h6>
                            </div>`;
            referralRecord.innerHTML = output;
        }

        function displayUsers(users, referral_id) {
            let syncedRecordsContainer = document.querySelector('#synced-records');

            let output = '';
            if (users.length > 0) {
                users.forEach(user => {
                    let registered_date = new Date(user.created_date);
                    registered_date = dateToWords(registered_date);
                    output += `<div class="col-lg-12 border p-2 rounded">
                                        <h6 class="my-1"><span class="fw-bold">Name: </span> ${user.firstname} ${user.middlename} ${user.lastname}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Email: </span> ${user.email}</h6>
                                        <h6 class="my-1"><span class="fw-bold">SIRB: </span> ${user.patientinfo?.srbno}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Passport: </span> ${user.patientinfo?.passportno}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Position: </span> ${user.position_applied}</h6>
                                        <h6 class="my-1"><span class="fw-bold">Registered Date: </span> ${registered_date}</h6>
                                        <div class="border-top py-50"></div>
                                        <button onclick="handleSyncRecord(${user.id}, ${referral_id})" class="btn btn-primary btn-block">SYNC TO THIS RECORD</button>
                                </div>`;
                });
                syncedRecordsContainer.innerHTML = output;
            } else {
                output += `<div class="col-lg-5 text-center border p-2 m-1 rounded">
                                    No Record Found
                            </div>`;
                syncedRecordsContainer.innerHTML = output;
            }
        }

        function handleSyncRecord(user_id, referral_id) {
            Swal.fire({
                title: 'Are you sure you want to sync the selected referral on this record?',
                html: "The referral record will be changed based on the record that you selected. You cannot revert it.",
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
