<div class="card">
    <div class="card-header">
        <h2 class="text-bold-500">Add Admission</h2>
        <a class="heading-elements-toggle"><i
                class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                PEME Date: <?php echo date('Y-m-d'); ?>
            </h6>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
            <form class="form" method="POST" action="/store_admission">
                @csrf
                <input type="hidden" name="patient_id" value="{{$patient->id}}">
                <div class="d-none">
                    <input type="date" max="2050-12-31" name="trans_date" id="" hidden value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="package_id" value="{{$patientInfo->medical_package}}">
                    <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}">
                    <input type="hidden" name="vessel" value="{{$patientInfo->vessel}}">
                    <input type="hidden" name="country_destination" value="{{$patientInfo->country_destination}}">
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Patient Name</label>
                                <input type="text" id="projectinput1" class="form-control"
                                    value="{{$patient->lastname}}, {{$patient->firstname}}"
                                    name="fullname" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Patient
                                    Code</label>
                                <input type="text" id="projectinput1" class="form-control"
                                    value="{{$patient->patientcode}}" name="patientcode"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600"for="admission_category">Category</label>
                                <select id="admission_category" onchange="isOtherServices(this)" name="category"
                                    class="form-control">
                                    <option value="none" selected="" disabled="">Select
                                        Category
                                    </option>
                                    <option value="DECK SERVICES" {{ $patientInfo->category == "DECK SERVICES" ? "selected" : null }}>DECK SERVICES</option>
                                    <option value="ENGINE SERVICES" {{ $patientInfo->category == "ENGINE SERVICES" ? "selected" : null }}>ENGINE SERVICES</option>
                                    <option value="CATERING SERVICES" {{ $patientInfo->category == "CATERING SERVICES" ? "selected" : null }}>CATERING SERVICES</option>
                                    <option value="OTHER SERVICES" {{ $patientInfo->category == "OTHER SERVICES" ? "selected" : null }}>OTHER SERVICES</option>
                                </select>
                            </div>
                            <div class="form-group other-specify-con">
                                <label class="text-bold-600">Other Specify :</label>
                                <input type="text" name="other_specify" id="other_specify" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="text-bold-600" for="position">Position</label>
                                    <input type="text" value="{{$patient->position_applied}}" id="position" class="form-control" placeholder="Position" name="position">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Employment Type</label>
                                <div class="container-fluid ">
                                    <div
                                        class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="employment1" value="Sea-Based" name="employment">
                                        <label class="custom-control-label" for="employment1">Sea Based</label>
                                    </div>
                                    <div
                                        class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="employment2" name="employment" value="Land-Based">
                                        <label class="custom-control-label" for="employment2">Land Based</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="employment3" name="employment" value="Local-Based">
                                        <label class="custom-control-label" for="employment3">Local Based</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Employment Status</label>
                                <div class="container-fluid">
                                    <div
                                        class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="emp_status1" name="emp_status" value="New Crew">
                                        <label class="custom-control-label" for="emp_status1">New Crew</label>
                                    </div>
                                    <div
                                        class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="emp_status2" name="emp_status" value="Ex-Crew">
                                        <label class="custom-control-label" for="emp_status2">Ex Crew</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Admission
                                    Type</label>
                                <div class="container-fluid ">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="admit_type1" name="admit_type"
                                         value="Normal" {{ $patientInfo->admission_type == "Normal" ? "checked" : "" }}>
                                        <label class="custom-control-label" for="admit_type1">Regular Patient</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="admit_type2" name="admit_type"
                                        value="Rush" {{ $patientInfo->admission_type == "Rush" ? "checked" : "" }}>
                                        <label class="custom-control-label" for="admit_type2">Rush Patient</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Payment Type</label>
                                <div class="container-fluid">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" name="payment_type" id="payment_type3"
                                        value="Applicant Paid" {{ $patientInfo->payment_type == "Applicant Paid" ? "checked" : "" }}>
                                        <label class="custom-control-label"for="payment_type3">Applicant Paid</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="payment_type4" name="payment_type"
                                        value="Billed" {{ $patientInfo->payment_type == "Billed" ? "checked" : "" }}>
                                        <label class="custom-control-label" for="payment_type4">Billed to Agency</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-1">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Last Medical in Merita</label>
                                <input type="text" id="projectinput1" class="form-control" value="" name="last_medical">
                            </div>
                        </div>
                        <div class="col-md-6 my-1">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput1">Principal</label>
                                <input type="text" id="projectinput1" class="form-control" value="{{$patientInfo->principal}}" name="principal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">
                                    Referral :
                                    <span class="primary h6">(If not applicable, please
                                        write N/A)</span>
                                </label>
                                <input type="text" class="form-control"
                                    name="referral" value="{{$patientInfo->referral}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Have a Panama?</label>
                                <div class="container-fluid">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" name="have_panama" id="have_panama3" value="1">
                                        <label class="custom-control-label" for="have_panama3">Yes</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="have_panama4" name="have_panama" value="0">
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
                                        <input type="radio" class="custom-control-input" name="have_liberian" id="have_liberian3" value="1">
                                        <label class="custom-control-label" for="have_liberian3">Yes</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input" id="have_liberian4" name="have_liberian" value="0">
                                        <label class="custom-control-label" for="have_liberian4">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput2">Panama Certificate Number</label>
                                <input class="form-control" name="panama_certno" id="panama_certno" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold-600" for="projectinput3">Liberian Certificate Number</label>
                                <input class="form-control" name="liberian_certno" id="liberian_certno" />
                            </div>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-header border bg-success text-white">
                            <h4>Exam List
                            </h4>
                            <h5>Note: All exams in the package cannot be deleted.</h5>
                        </div>
                        <div class="card-body">
                            <div class="row border p-1">
                                <button type="button" class="btn btn-primary add-item col-md-2">Add Exam</button>
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
                <div class="form-actions">
                    <button type="reset" class="btn btn-warning mr-1">
                        <i class="feather icon-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
        </div>
    </div>
    </form>

    </div>
</div>

<script>
    // add Item Table
const addItem = document.querySelector('.add-item');
const itemForm = document.querySelector('.items-form');
let count1 = 0;
let count2 = 20;
addItem.addEventListener('click', () => {

  const addForm = document.createElement('div');
  addForm.classList.add('item-form-container', 'row', 'border', 'p-1');
  addForm.innerHTML = `<div class="item-name-container col-md-3">
                            <select name="exam[]" class="select2 form-control">
                                <optgroup label="Exams">
                                    <option value="">Select Exam</option>
                                    @foreach ($list_exams as $exam)
                                    <option value="{{$exam->id}}">
                                        {{$exam->examname}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="quantity-container col-md-3 text-center">
                            <input class="mx-1" name="charge[${count1++}]" checked id="charge" type="checkbox" placeholder="Charge" value="package" />
                        </div>
                        <div class="col-md-3 text-center">
                            {{date('Y-m-d')}}
                        </div>
                        <div class="col-md-3 text-center">
                            <button type="button" onclick="onDeleteItem(this)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>`;
  itemForm.appendChild(addForm);
  $('.select2').select2();
})

function onDeleteItem(e){
  return e.parentElement.parentElement.remove();
}
</script>
