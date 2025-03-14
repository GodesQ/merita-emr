<div class="card">
    <div class="card-header">
        <h2 class="text-bold-500">Edit Admission</h2>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
            </ul>
        </div>
        <div class="card-title">
            <h6>
                PEME Date: {{ $admissionPatient->trans_date }}
            </h6>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
            @if (Session::get('status'))
                <div class="success alert-success p-2 my-2">
                    {{ Session::get('status') }}
                </div>
            @endif
            <form class="form" method="POST" action="/update_admission">
                @csrf
                <input type="hidden" value="{{ $admissionPatient->id }}" name="main_id">
                <div class="d-none">
                    <input type="hidden" name="package_id" value="{{ $patientInfo->medical_package }}">
                    <input type="hidden" name="agency_id" value="{{ $patientInfo->agency_id }}">
                    <input type="hidden" name="vessel" value="{{ $patientInfo->vessel }}">
                    <input type="hidden" name="country_destination" value="{{ $patientInfo->country_destination }}">
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Peme Date</label>
                                <input type="datetime-local" max="2050-12-31" class="form-control"
                                    value="{{ $admissionPatient->trans_date }}" name="trans_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Patient Name</label>
                                <input type="text" id="projectinput1" class="form-control"
                                    value="{{ $patient->lastname }}, {{ $patient->firstname }}" name="fullname"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Patient Code</label>
                                <input type="text" id="projectinput1" class="form-control"
                                    value="{{ $patient->patientcode }}" name="patientcode" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="admission_category">Category</label>
                                <select id="admission_category" onchange="isOtherServices(this)" name="category"
                                    class="form-control">
                                    <option value="none" selected="" disabled="">Select
                                        Category
                                    </option>
                                    <option value="DECK SERVICES"
                                        {{ $admissionPatient->category == 'DECK SERVICES' ? "selected=''" : '' }}>
                                        DECK SERVICES
                                    </option>
                                    <option value="ENGINE SERVICES"
                                        {{ $admissionPatient->category == 'ENGINE SERVICES' ? "selected=''" : '' }}>
                                        ENGINE SERVICES
                                    </option>
                                    <option value="CATERING SERVICES"
                                        {{ $admissionPatient->category == 'CATERING SERVICES' ? "selected=''" : '' }}>
                                        CATERING SERVICES
                                    </option>
                                    <option value="OTHER SERVICES"
                                        {{ $admissionPatient->category == 'OTHER SERVICES' ? "selected=''" : '' }}>
                                        OTHER SERVICES
                                    </option>
                                </select>
                            </div>
                            <div class="form-group other-specify-con">
                                <label class="text-bold-600">Other Specify :</label>
                                <input type="text" name="other_specify" id="other_specify"
                                    value="{{ $admissionPatient->other_specify }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="text-bold-600" for="companyName">Position</label>
                                    <input type="text" id="companyName" class="form-control" placeholder="Position"
                                        name="position" value="{{ $admissionPatient->position }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Employment
                                    Type</label>
                                <div class="container-fluid ">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="employment1"
                                            value="Sea-Based" name="employment"
                                            {{ $admissionPatient->employment == 'Sea-Based' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="employment1">Sea Based</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="employment2"
                                            name="employment" value="Land-Based"
                                            {{ $admissionPatient->employment == 'Land-Based' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="employment2">Land Based</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="employment3"
                                            name="employment" value="Local-Based"
                                            {{ $admissionPatient->employment == 'Local-Based' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="employment3">Local Based</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 my-1">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Employment
                                    Status</label>
                                <div class="container-fluid ">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="emp_status1"
                                            name="emp_status" value="New Crew"
                                            {{ $admissionPatient->emp_status == 'New Crew' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="emp_status1">New Crew</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="emp_status2"
                                            name="emp_status" value="Ex-Crew"
                                            {{ $admissionPatient->emp_status == 'Ex-Crew' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="emp_status2">Ex Crew</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Admission Type</label>
                                <div class="container-fluid ">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="admit_type1"
                                            name="admit_type" value="Normal"
                                            {{ $admissionPatient->admit_type == 'Normal' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="admit_type1">Regular Patient</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="admit_type2"
                                            name="admit_type" value="Rush"
                                            {{ $admissionPatient->admit_type == 'Rush' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="admit_type2">Rush Patient</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Payment Type</label>
                                <div class="container-fluid ">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" name="payment_type"
                                            id="payment_type3" value="Applicant Paid"
                                            {{ $admissionPatient->payment_type == 'Applicant Paid' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="payment_type3">Applicant Paid</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="payment_type4"
                                            name="payment_type" value="Billed"
                                            {{ $admissionPatient->payment_type == 'Billed' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="payment_type4">Billed to
                                            Agency</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Last Medical in Merita</label>
                                <input type="text" id="projectinput1" class="form-control"
                                    value="{{ $admissionPatient->last_medical }}" name="last_medical">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Principal</label>
                                <input type="text" id="projectinput1" class="form-control"
                                    value="{{ $admissionPatient->principal }}" name="principal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">
                                    Referral :
                                </label>
                                <input type="text" class="form-control" name="referral"
                                    value="{{ $admissionPatient->referral }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Have a Panama?</label>
                                <div class="container-fluid">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" name="have_panama"
                                            id="have_panama3" value="1"
                                            {{ $admissionPatient->have_panama ? 'checked' : null }}>
                                        <label class="custom-control-label" for="have_panama3">Yes</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="have_panama4"
                                            name="have_panama" value="0"
                                            {{ !$admissionPatient->have_panama ? 'checked' : null }}>
                                        <label class="custom-control-label" for="have_panama4">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Have a Liberian?</label>
                                <div class="container-fluid">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" name="have_liberian"
                                            id="have_liberian3" value="1"
                                            {{ $admissionPatient->have_liberian ? 'checked' : null }}>
                                        <label class="custom-control-label" for="have_liberian3">Yes</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="have_liberian4"
                                            name="have_liberian" value="0"
                                            {{ !$admissionPatient->have_liberian ? 'checked' : null }}>
                                        <label class="custom-control-label" for="have_liberian4">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Panama Certificate Number</label>
                                <input class="form-control" name="panama_certno" id="panama_certno"
                                    value="{{ $admissionPatient->panama_certno }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput3">Liberian Certificate Number</label>
                                <input class="form-control" name="liberian_certno" id="liberian_certno"
                                    value="{{ $admissionPatient->liberian_certno }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card border my-3">
                        <div class="card-header border bg-success text-white">
                            <h4>Exam List
                            </h4>
                            <h5>Note: All exams in the package cannot be deleted.</h5>
                        </div>
                        <div class="card-body">
                            @if (count($additional_exams) > 0)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row border p-1">
                                            <button type="button" class="btn btn-primary add-item col-md-2">Add
                                                Exam</button>
                                        </div>
                                        <div class="items-form">
                                            <div class="row border p-1">
                                                <div class="col-md-3 font-weight-bold text-center">Exams</div>
                                                <div class="col-md-3 font-weight-bold text-center">Charge</div>
                                                <div class="col-md-3 font-weight-bold text-center">Date</div>
                                                <div class="col-md-3 font-weight-bold text-center">Action</div>
                                            </div>
                                            @foreach ($exam_groups as $key => $exam_group)
                                                <div class="row border p-75 main-exam-row">
                                                    <h4 class="font-weight-bold">
                                                        {{ date_format(new DateTime($key), 'F d, Y') }}</h4>
                                                    @foreach ($exam_group as $key => $exam)
                                                        <div class="col-md-12 border p-1 exam-row" id="{{ $exam['id'] }}">
                                                            <div class="row">
                                                                <div class="col-md-3 text-center">
                                                                    {{ $exam['examname'] }}</div>
                                                                <div class="col-md-3 text-center">
                                                                    {{ $exam['charge'] == 'package' ? 'Billed To Agency' : 'Applicant Paid' }}
                                                                </div>
                                                                <div class="col-md-3 text-center">{{ $exam['date'] }}
                                                                </div>
                                                                <div class="col-md-3 text-center">
                                                                    <button data-exam-id="{{ $exam['id'] }}" type="button" class="btn btn-danger exam-delete-btn"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row border p-1">
                                            <button type="button" class="btn btn-primary add-item col-md-2">Add
                                                Exam</button>
                                        </div>
                                        <div class="items-form">
                                            <div class="row border p-1">
                                                <div class="col-md-3 font-weight-bold text-center">Exams</div>
                                                <div class="col-md-3 font-weight-bold text-center">Charge</div>
                                                <div class="col-md-3 font-weight-bold text-center">Date</div>
                                                <div class="col-md-3 font-weight-bold text-center">Action</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="reset" class="btn btn-warning mr-1">
                        <i class="feather icon-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        $('.exam-delete-btn').click(e => {
            let additional_exam_id = e.target.getAttribute('data-exam-id');
            console.log(additional_exam_id, e.target);
            $.ajax({
                method: "DELETE",
                url: `/admission/additional-exams/delete/${additional_exam_id}`,
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    if (data.status === "success") {
                        const examRow = document.getElementById(additional_exam_id);

                        if (examRow) {
                            // Find the parent main-exam-row
                            const mainExamRow = examRow.closest('.main-exam-row');

                            // Check if the main-exam-row has only one exam-row
                            if (mainExamRow.querySelectorAll('.exam-row').length === 1) {
                                // If only one exam-row, remove the entire main-exam-row
                                mainExamRow.remove();
                            } else {
                                // Otherwise, remove only the specific exam-row
                                examRow.remove();
                            }
                        }
                    }
                }
            })
        })
    });
</script>