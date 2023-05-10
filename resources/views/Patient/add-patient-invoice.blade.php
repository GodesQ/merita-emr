<div class="content-body">
    <form action="/store_cashier_or" id="store_cashier_or" method="POST">
        @csrf
        <div class="row">
            <!-- defining Bootstrap columns for diffrent screen sizes -->
            <div class="col-xl-12 col-md-8 col-12">
                <!-- Bootstrap card component -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-7 col-lg-12">
                                <div class="row">
                                    <div class="col-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label><b>Billed To</b></label> <br>
                                            <button type="button" class="btn btn-outline-primary my-50" id="bill_to_applicant" onclick="updatePayment('applicant_paid')">APPLICANT</button>
                                            <button type="button" class="btn btn-outline-primary my-50" id="bill_to_agency" onclick="updatePayment('package')">AGENCY</button>
                                        </div>
                                    </div>
                                    <div class="col-6 col-xs-12 ">
                                        <label>Payor</label>
                                        <input type="text" class="form-control" name="payor" id="payor" value="{{$patient->firstname}} {{strlen($patient->middlename) > 0 ? $patient->middlename[0] : $patient->middlename}} {{$patient->lastname}}" placeholder="Name" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-xl-12 col-md-12">
                                            <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <label>Payment Type</label> <br>
                                                    <div class="d-inline-block custom-control custom-radio mr-1 package-con">
                                                        <input required type="radio" onchange="selectPaymentType(this)" value="package" class="custom-control-input" name="payment_type" id="radio1">
                                                        <label class="custom-control-label" for="radio1">package</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input required type="radio" onchange="selectPaymentType(this)" value="exams" class="custom-control-input" name="payment_type" id="radio2">
                                                        <label class="custom-control-label" for="radio2">exams</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input required type="radio" onchange="selectPaymentType(this)" value="medicine" class="custom-control-input" name="payment_type" id="radio3">
                                                        <label class="custom-control-label" for="radio3">medicine</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input required type="radio" onchange="selectPaymentType(this)" value="other" class="custom-control-input" name="payment_type" id="radio4">
                                                        <label class="custom-control-label" for="radio4">other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr>

                                <!-- invoice product details -->
                                <div class="invoice-product-details">
                                    <div class="container-fluid m-1 p-1 border {{$patient->patientinfo->payment_type == 'Billed' ? 'package' : 'applicant_paid'}}">
                                        <h3>Package <span class="h6 warning font-weight-bold">(Note: This Package is Billed to {{$patient->patientinfo->payment_type == 'Billed' ? 'Agency' : 'Applicant'}})</span></h3>
                                        @php $total_package = 0; @endphp
                                        <div class="row border p-1">
                                            <div class="col-md-3 text-center">{{$patient_package ? $patient_package->packagename : null}}</div>
                                            <div class="col-md-3 text-center">Package</div>
                                            <div class="col-md-3 text-center"></div>
                                            <div class="col-md-3 text-center"></div>
                                        </div>
                                    </div>
                                    <div class="container-fluid m-1 p-1 border">
                                        <h3>Exams</h3>
                                        @php $total_price_exams = [];  @endphp
                                        @php $total_exams_applicant = 0; @endphp
                                        @php $total_exams_agency = 0; @endphp
                                        @php $exams_applicant = ''; @endphp
                                        @php $exams_agency = ''; @endphp
                                        @forelse($exam_groups as $exam_date => $exam_group)
                                            <div class="row">
                                                <h4 class="font-weight-bold my-1">{{date_format(new DateTime($exam_date), "F d, Y")}}</h4>
                                                @foreach($exam_group as $key => $exam)
                                                    <div class="col-md-12 border p-1 {{$exam['charge']}}">
                                                        <div class="row">
                                                            <div class="col-md-3 text-center">
                                                                {{$exam['examname']}}
                                                                @if($exam['charge'] == 'package')
                                                                    <?php $exams_agency .= $exam['examname'] . '/ ' ?>
                                                                @else
                                                                    <?php $exams_applicant .= $exam['examname'] . '/ ' ?>
                                                                @endif
                                                                </div>
                                                            <div class="col-md-2 text-center">Exams</div>
                                                            <div class="col-md-2 text-center">
                                                                {{$exam['price']}}
                                                                @if($exam['charge'] == 'package')
                                                                    <?php $total_exams_agency += $exam['price'] ?>
                                                                @else
                                                                    <?php $total_exams_applicant += $exam['price'] ?>
                                                                @endif
                                                            </div>
                                                             <div class="col-md-2 text-center"> {{$exam['date'] ? $exam['date'] : $exam_date}}</div>
                                                             <div class="col-md-3 text-center">{{$exam['charge'] == 'package' ? "Billed To Agency" : "Applicant Paid"}}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @empty
                                                <div class="row text-center border p-1">
                                                    No Exam Found
                                                </div>
                                        @endforelse
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-xl-5 col-lg-12">
                                <div class="invoice-total">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                            <div class="regarding-discount form-group">
                                                <label>Particulars</label>
                                                <textarea required type="text" class="form-control" id="particulars" name="particulars" col="8" row="8"></textarea>
                                            </div>
                                            <div class="regarding-discount form-group">
                                                <label>TIN</label>
                                                <input type="number" class="form-control" name="tin_no" id="tin_no" value="" placeholder="Ex.12345">
                                            </div>
                                            <div class="regarding-discount form-group">
                                                <label>Subtotal</label>
                                                <input required type="text" class="form-control" oninput="setSubTotal(this)" name="amount_due" id="sub_total" value="" placeholder="">
                                            </div>
                                            <div class="regarding-payment form-group">
                                                <label>Discount</label>
                                                <input required type="number" class="form-control" name="discount" id="discount" value="" placeholder="Add Discount">
                                            </div>
                                            <div class="regarding-payment form-group">
                                                <label>Payment Status</label> <br>
                                                <div class="d-inline-block custom-control custom-radio mr-1 package-con">
                                                    <input required type="radio" value="paid" class="custom-control-input" name="status" id="status1">
                                                    <label class="custom-control-label" for="status1">Paid</label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1 package-con">
                                                    <input required type="radio" value="partial_paid" class="custom-control-input" name="status" id="status3">
                                                    <label class="custom-control-label" for="status3">Partially Paid</label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input required type="radio" value="unpaid" class="custom-control-input" name="status" id="status2">
                                                    <label class="custom-control-label" for="status2">UnPaid</label>
                                                </div>
                                            </div>
                                            <button type="button" onclick="compute()" class="btn btn-primary mt-1 btn-block">Compute</button>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                            <ul class="list-group cost-list">
                                                <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                    <span class="cost-title mr-2">Subtotal </span>
                                                    <span class="cost-value">₱ <span id="total-sub"></span></span>
                                                </li>
                                                <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                    <span class="cost-title mr-2">Discount </span>
                                                    <span class="cost-value">₱ <span id="total-discount"></span></span>
                                                </li>
                                                <li class="dropdown-divider"></li>
                                                <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                    <span class="cost-title mr-2">Total Amount</span>
                                                    <span class="cost-value">₱ <span id="total-amount"></span></span>
                                                    <input type="hidden" name="amount" id="amount">
                                                </li>
                                            </ul>
                                            <input type="hidden" name="payment_user" id="payment_user" />
                                            <input type="hidden" name="agency_id" value="{{$patientInfo->agency_id}}" />
                                            <input type="hidden" name="admission_id" value="{{$patient->admission_id}}" />
                                            <input type="hidden" name="trans_date" value="{{$patientCode ? $patientCode->trans_date : null}}" />
                                            <button type="submit" class="btn btn-primary mt-1 btn-block">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    let subTotal = document.querySelector('#sub_total');
    let particulars = document.querySelector('#particulars');
    let agency_items = document.querySelectorAll(`.package`);
    let applicant_items = document.querySelectorAll(`.applicant_paid`);

    function selectPaymentType(e) {
        if(e.value == 'package') {
            subTotal.value =  Number('{{$total_package}}').toFixed(2);
            document.querySelector('#total-sub').textContent = subTotal.value;
            particulars.value = '{{$patient_package ? $patient_package->packagename : null}}';
        } else if(e.value == 'exams') {
            let payment_user = document.querySelector('#payment_user');
            particulars.value = '';
            if(payment_user.value == 'agency') {
                subTotal.value =  Number('{{$total_exams_agency}}').toFixed(2);
                document.querySelector('#total-sub').textContent = subTotal.value;
                particulars.value = '{{$exams_agency}}';
            } else {
                subTotal.value = Number('{{$total_exams_applicant}}').toFixed(2);
                document.querySelector('#total-sub').textContent = subTotal.value;
                particulars.value = '{{$exams_applicant}}';
            }
        } else {
            subTotal.value = Number('0').toFixed(2);
            document.querySelector('#total-sub').textContent = subTotal.value;
            particulars.value = '';
        }
    }

    function setSubTotal(e) {
        document.querySelector('#total-sub').textContent = e.value;
    }

    function compute() {
        let tin_no = document.querySelector('#tin_no');
        let discount = document.querySelector('#discount');
        let vat = document.querySelector('#vat');
        let totalDiscount = document.querySelector('#total-discount');
        let totalVat = document.querySelector('#total-vat');
        let totalAmount = document.querySelector('#total-amount');

        let discount_total = discount.value;
        let total = Number(subTotal.value) - Number(discount_total);
        let tvat = Number(total);
        discount.value = Number(discount_total).toFixed(2);
        totalDiscount.textContent = Number(discount_total).toFixed(2);
        totalAmount.textContent = Number(tvat).toFixed(2);
        document.querySelector('#amount').value = Number(tvat).toFixed(2);

    }

    function updatePayment(e) {
            let payment_user = document.querySelector('#payment_user');
            let bill_to_agency_btn = document.querySelector('#bill_to_agency');
            let bill_to_applicant_btn = document.querySelector('#bill_to_applicant');
            let agency = '{{optional($patient->patientinfo->agency)->agencyname}}';
            let applicant = '{{$patient->firstname}} {{strlen($patient->middlename) > 0 ? $patient->middlename[0] : $patient->middlename}} {{$patient->lastname}}';
            let payor = document.querySelector('#payor');
            let packageRadio = document.querySelector('#radio1');
            const radioButtons = document.querySelectorAll('#store_cashier_or input[name="payment_type"]');

            if(e == 'package') {
                setAgencyItems(applicant_items, agency_items, radioButtons);
                bill_to_agency_btn.classList.add('active');
                bill_to_applicant_btn.classList.remove('active');
                payor.value = agency;
                payment_user.value = 'agency';
                if('{{optional($patient->patientinfo)->payment_type}}' == "Applicant Paid") {
                    packageRadio.disabled = true;
                    packageRadio.parentElement.classList.add('d-none');
                    packageRadio.parentElement.classList.remove('d-inline-block');
                    packageRadio.checked = false;
                } else{
                    packageRadio.disabled = false;
                    packageRadio.parentElement.classList.remove('d-none');
                    packageRadio.parentElement.classList.add('d-inline-block');
                }
            } else {
                setApplicantItems(applicant_items, agency_items, radioButtons);
                bill_to_applicant_btn.classList.add('active');
                bill_to_agency_btn.classList.remove('active');
                payor.value = applicant;
                payment_user.value = 'applicant';
                if('{{optional($patient->patientinfo)->payment_type}}' == "Billed") {
                    packageRadio.disabled = true;
                    packageRadio.parentElement.classList.add('d-none');
                    packageRadio.parentElement.classList.remove('d-inline-block');
                    packageRadio.checked = false;
                } else{
                    packageRadio.disabled = false;
                    packageRadio.parentElement.classList.remove('d-none');
                    packageRadio.parentElement.classList.add('d-inline-block');
                }
            }
        }

    function setApplicantItems(applicant_items, agency_items) {
        const radioButtons = document.querySelectorAll('#store_cashier_or input[name="payment_type"]');
        agency_items.forEach(item => {
            item.classList.add('d-none');
            item.classList.remove('d-block');
        });

        applicant_items.forEach(item => {
            item.classList.remove('d-none');
            item.classList.add('d-block');
        });

        for (const radioButton of radioButtons) {
            if (radioButton.checked) {
                let selectedSize = radioButton.value;
                if(selectedSize == 'exams') {
                    particulars.value = '{{$exams_applicant}}';
                    subTotal.value =  Number('{{$total_exams_applicant}}').toFixed(2);
                    document.querySelector('#total-sub').textContent = subTotal.value;
                }
                break;
            }
        }


    }

    function setAgencyItems(applicant_items, agency_items, radioButtons) {
        applicant_items.forEach(item => {
            item.classList.add('d-none');
            item.classList.remove('d-block', 'paid');
        });

        agency_items.forEach(item => {
            item.classList.remove('d-none');
            item.classList.add('d-block', 'paid');
        });

        for (const radioButton of radioButtons) {
            if (radioButton.checked) {
                let selectedSize = radioButton.value;
                if(selectedSize == 'exams') {
                    particulars.value = '{{$exams_agency}}';
                    subTotal.value =  Number('{{$total_exams_agency}}').toFixed(2);
                    document.querySelector('#total-sub').textContent = subTotal.value;
                }
                break;
            }
        }
    }
</script>
