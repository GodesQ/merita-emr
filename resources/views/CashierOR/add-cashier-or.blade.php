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
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Invoice</h3>
                </div>
            </div>
            <div class="content-body">
                <!-- invoice add wrapper -->
                <div class="invoice-add-wrapper">
                    <!-- defining a Bootstrap row -->
                    <div class="row">
                        <!-- defining Bootstrap columns for diffrent screen sizes -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <!-- Bootstrap card component -->
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="GET">
                                        <div class="row">
                                            <div class="col-md-7"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="patientcode" class="form-control" placeholder="Search by Admission ID" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <!-- card header -->
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-12 d-flex justify-content-start align-items-center pl-0">
                                                <h6 class="invoice-text mr-1 font-weight-bold">Invoice# </h6>
                                                <input type="text" name="invoice" class="form-control w-50" value="#000">
                                            </div>
                                            <div class="col-xl-9 col-md-12 d-flex justify-content-xl-end align-items-lg-start align-items-sm-start align-items-xs-start  align-items-center flex-wrap px-0 pt-xl-0 pt-1">
                                                <div class="issue-date d-flex align-items-center justify-content-start mr-2 mb-75 mb-xl-0">
                                                    <h6 class="invoice-text mr-1 font-weight-bold">Date Issue</h6>
                                                    <input type="text" name="date" class="pick-a-date bg-white form-control" value="Select Date">
                                                </div>
                                                <div class="due-date d-flex align-items-center justify-content-start">
                                                    <h6 class="invoice-text mr-1 font-weight-bold">Date Due</h6>
                                                    <input type="text" name="date" class="pick-a-date bg-white form-control" value="Select Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- logo and invoice title -->
                                    <div class="row my-2">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1">
                                            <h4 class="invoice-title text-primary">Invoice</h4>
                                            <input type="text" class="form-control" value="" placeholder="Product Name">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 d-flex justify-content-end align-items-center">
                                            <img src="../../../app-assets/images/logo/logo.jpg" alt="logo" style="object-fit: cover;" width="100px" height="100px">
                                        </div>
                                    </div>
                                    <hr>

 
                                    <!-- bill address section -->
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6 col-xs-12 col-sm-12">
                                            <div class="title-text">Bill To</div>
                                            <div class="row">
                                                <div class="col-12 col-xs-12 mb-1">
                                                    <input type="text" class="form-control" value="" placeholder="Name">
                                                </div>
                                                <div class="col-12 col-xs-12 mb-1">
                                                    <input type="text" class="form-control" value="" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- invoice product details -->
                                    <div class="invoice-product-details">
                                        <button type="button" class="btn btn-primary add-item col-md-2 my-1">Add Item</button>
                                    </div>
                                    <hr>

                                    <!-- invoice bill total -->
                                    <div class="invoice-total">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                                <div class="regarding-payment form-group">
                                                    <input type="text" class="form-control" value="" placeholder="Add payment terms">
                                                </div>
                                                <div class="regarding-discount form-group">
                                                    <input type="text" class="form-control" value="" placeholder="Add client note">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5 offset-xl-2">
                                                <ul class="list-group cost-list">
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Subtotal </span>
                                                        <span class="cost-value">$ 00.00</span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Discount </span>
                                                        <span class="cost-value">-$ 00.00</span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Tax </span>
                                                        <span class="cost-value">0%</span>
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Invoice Total </span>
                                                        <span class="cost-value">$ 00.00</span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Paid To Date </span>
                                                        <span class="cost-value">-$ 00.00</span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Balance (USD) </span>
                                                        <span class="cost-value">$ 00.00</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-12">
                            <div class="action-buttons card">
                                <div class="card-body">
                                    <button onclick="history.back()" class="btn btn-block btn-secondary mb-1"><i class="fa fa-close"></i> Cancel</button>
                                    <button class="btn btn-block btn-primary mb-1"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
const addItem = document.querySelector('.add-item');
const itemForm = document.querySelector('.invoice-product-details');

addItem.addEventListener('click', () => {
  
  const addForm = document.createElement('div');
  addForm.classList.add('item-form-container', 'row', 'p-1');
  addForm.innerHTML = `<div class="item-name-container col-md-3">
                            <input class="form-control" name="item[]" type="text" />
                        </div>
                        <div class="quantity-container col-md-3 text-center">
                            <input class="mx-1" name="charge[]" checked id="charge" type="checkbox" placeholder="Charge" value="package"  />
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
@endsection
