@extends('layouts.master')

@section('body')

main

@endsection

@section('main-content')

@include('includes.mobile-nav')

@if(session()->has('success'))

<?php

   $subbmitted = "logo.png"; 
     ?>

@else

<?php

   $subbmitted = 0; 

   ?>

@endif


<style>

   /**/

   /*.lcl_amount,.lcl_div,.fcl_div,.div_paid,.customer_type{*/

   /*display:none;*/

   /*}*/


   li.page-item {

   padding: 17px;

   font-size: 21px;

   }
.nav-item {
  margin-right: 10px; /* Adds gap between tabs */
}

.nav-link {
  transition: background-color 0.3s ease; /* Smooth transition effect */
}
.nav.nav-tabs .active{
    border-color:white !important;
}

#dynamic-inputs {
    display: flex;                /* Use flexbox for horizontal layout */
    flex-wrap: nowrap;           /* Prevent wrapping to the next line */
    overflow-x: auto;            /* Enable horizontal scrolling if necessary */
}

.input-container {
    margin-right: 16px;          /* Add some space between the input fields */
}


</style>

@php
    $csm = $data['csm'];
    $customers = $data['customers'];
    $depositors = $data['depositors'];
    $banks = $data['banks'];

    $user = auth()->user()->id;
    $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
    
@endphp

<div class="flex">

   <!-- BEGIN: Side Menu -->

   @include('includes.side-nav')

   <div class="content">

      <!-- BEGIN: Top Bar -->

      @include('includes.top-bar')

      <!-- END: Top Bar -->

      <div class="grid">

         <div class="grid grid-cols-12 gap-6 mt-5">


            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                    <div class="flex flex-col sm:flex-row items-center justify-between p-5 border-b border-gray-200 dark:border-dark-5">
                        <div class="row w-full">
                            <div class="col-lg-6">
                                <h2 class="font-medium text-base mr-auto">
                                    Refund/Detention
                                    <div class="intro-ul"></div>
                                </h2>
                            </div>
                        </div>
                    </div>


                  <div id="input" class="p-5">

                     <div class="preview">

                        @if (count($errors) > 0)

                        <div>

                           <ul>

                              @foreach ($errors->all() as $error)

                              <li style='color:red'>{{ $error }}</li>

                              @endforeach

                           </ul>

                        </div>

                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active btn btn-primary" id="csm-tab" data-toggle="tab" data-target="#csm" type="button" role="tab" aria-controls="csm" aria-selected="true">CDO</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-default" id="refund-amount-tab" data-toggle="tab" data-target="#refund" type="button" role="tab" aria-controls="refund" aria-selected="false">Refund Amount</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-default" id="status-tab" data-toggle="tab" data-target="#status" type="button" role="tab" aria-controls="status" aria-selected="false">Status</button>
                          </li>
                        </ul>
                        <form id="myForm" method="post" action="{{route('save-refund-detention')}}" onkeydown="return event.key != 'Enter';">

                           @csrf
                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Content -->
                                
                                  <div class="tab-pane fade show active" id="csm" role="tabpanel" aria-labelledby="csm-tab">
                                    <!-- Main tab content -->
                                    <div class="classic open_classic">
                                        <div class="mt-2" style="margin-bottom:10px">
        
                                             <div class="flex-col sm:flex-row mt-2">
            
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
            
                                                   <input type="hidden" name="selfcompany" value="{{session('company')[0]->id}}" />
            
                                                    <div class="col-span-4">
                                                        <label class="radio-switch-1">CDO NO.</label>
                                                        <select class="form-select" aria-label="Default select example" name="cdo_no" id="cdoSelect" onchange="fetchCsmData()">
                                                            <option selected>Select an option</option>
                                                            @foreach($csm as $c)
                                                                <option value="{{$c->csm_no}}" data-code="{{$c->csm_no}}">{{$c->csm_no}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--bl_no, mobile no-->
                                                    <div class="col-span-4">
                
                                                       <label for="regular-form-4" class="form-label">Bl No </label>
                
                                                       <input  id="bl_no" type="text" readonly class="bl_no form-control" placeholder="BL Number" name="bl_no">
                
                                                    </div>
    
                                                    <!--<div class="col-span-4">-->
                                                    <!--   <label for="regular-form-4" class="form-label">No. of Container</label>-->
                                                    <!--   <input  id="container_no" type="text" readonly class="container_no form-control" placeholder="no_of_containers" name="no_of_containers">-->
                                                    <!--</div>-->
                                                </div>
            
                                             </div>
                                             <div class="flex-col sm:flex-row mt-2">
                                                    <div class="show_fields mt-2 col-span-12">
                                                        <label class="form-label d-inline-block">CDO Detail</label>
                                                        <!--<button type="button" class="btn btn-primary btn-sm float-right"-->
                                                        <!--    id="add_more_container">Add More</button>-->
                                                        <!--<br><br>-->
                                                        <div id="cdo_dtl_fields_wrapper">
    
                                                        </div>
                                                    </div>
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                                    

                                                </div>
                                             </div>
                                             <div class="flex-col sm:flex-row mt-2">
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                                    <div class="col-span-4">
                                                        <label for="regular-form-1" class="form-label">Deposit By</label>
                                                        <select id="payment_by" class="form-select" readonly aria-label="Default select example" name="payment_by">
                                                                <option value="">--select--</option>
        
                                                                <option value="client">Client</option>
                                                                <option value="depositor">Depositor</option>
                                                        </select>                                                    
                                                    </div>
                                                    <!-- Customer Dropdown (hidden initially) -->
                                                    <div id="customerDropdownContainer" class="col-span-4" style="display: none;">
                                                        <label for="customer_id" class="form-label">Select Customer</label>
                                                        <select id="customer_id" readonly name="customer_id" class="form-select">
                                                            <option value="">Select Customer</option>
                                                            <!-- Assuming you're looping through customers fetched from the DB -->
                                                            @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <!-- Depositor Dropdown (hidden initially) -->
                                                    <div id="depositorDropdownContainer" class="col-span-4" style="display: none;">
                                                        <label for="depositor_id" class="form-label">Select Depositor</label>
                                                        <select id="depositor_id" readonly name="depositor_id" class="form-select">
                                                            <option value="">Select Depositor</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($depositors as $depositor)
                                                                <option value="{{ $depositor->id }}">{{ $depositor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-span-4">
                
                                                       <label for="regular-form-2" class="form-label">Payment to Depositor Date</label>
                
                                                       <input type="date" class="form-control" id="payment_to_depositor_date" name="payment_to_depositor_date" value="{{date('Y-m-d')}}">
                
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--<div class="flex-col sm:flex-row mt-2">-->
                                            <!--    <div class="grid grid-cols-12 gap-2 mt-2 mb-2">-->
                                            <!--        <div class="col-span-4">-->
                                            <!--           <label for="regular-form-4" class="form-label">Deposit Amount</label>-->
                                            <!--           <input  id="deposit_amount" type="text" readonly class="deposit_amount form-control" placeholder="deposit_amount" name="deposit_amount">-->
                                            <!--        </div>-->
                                            <!--        <div class="col-span-4">-->
                                            <!--           <label for="regular-form-4" class="form-label">Detention</label>-->
                                            <!--           <input  id="detention" type="text" class="detention form-control" placeholder="Detention" name="detention_charges">-->
                                            <!--        </div>-->
                                            <!--        <div class="col-span-4">-->
                                            <!--           <label for="regular-form-4" class="form-label">Refund Amount</label>-->
                                            <!--           <input  id="refund_amount" type="text" class="refund_amount form-control" placeholder="Refund Amount" name="refund_amount">-->
                                            <!--        </div>-->

                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="grid grid-cols-12 gap-2 mt-2" id="checkbox_container_div">
                                                    <div class="col-span-2">
                                                        <div class="flex items-center">
                                                            <input type="checkbox" id="lolo" name="lolo" class="form-checkbox" data-label="LOLO">
                                                            <label for="lolo" class="ml-4">LOLO</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input type="checkbox" id="advance_tax" name="advance_tax" class="form-checkbox" data-label="Advance tax">
                                                            <label for="Advance tax" class="ml-4">Advance Tax</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input type="checkbox" id="late_do" name="late_do" class="form-checkbox" data-label="Late DO">
                                                            <label for="Late DO" class="ml-4">Late DO</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12" id="dynamic-inputs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;"></div>
                                                    <!-- Display the total sum -->
                                                    <div class="total-section mt-4">
                                                        <h5>Total Sum: <span id="total_sum">0.00</span></h5>
                                                    </div>
                                            </div>
                                            <script>
                                                // Function to calculate and update the total sum
                                                function updateTotal() {
                                                    let total = 0;
                                                    // Loop through all dynamically created input fields with the class 'form-control'
                                                    $('#dynamic-inputs .form-control').each(function() {
                                                        let inputValue = $(this).val();
                                                        // Check if the input value is a valid number before summing
                                                        if ($.isNumeric(inputValue)) {
                                                            total += parseFloat(inputValue);
                                                        }
                                                    });
                                                    // Display the total sum
                                                    $('#total_sum').text(total.toFixed(2)); // Showing total sum with 2 decimal places
                                                }
    
                                            </script>
                                        </div>
                                    </div>
                                  </div>
                                
                                  <div class="tab-pane fade" id="refund" role="tabpanel" aria-labelledby="refund-amount-tab">
                                    <!-- Buying tab content -->
                                     <div class="classic open_classic">
                                        <div class="mt-2" style="margin-bottom:10px">
                                             <div class="flex-col sm:flex-row mt-2">
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                                    <div class="col-span-4">
                                                       <label for="regular-form-4" class="form-label">Total Refund Amount </label>
                                                       <input  id="refund_amount" type="text" class="refund_amount form-control" placeholder="Enter Refund Amount..." name="refund_amount">
                                                    </div>
                                                    <div class="col-span-4">
                                                       <label for="regular-form-4" class="form-label">Deduction/Detention </label>
                                                       <input  id="deduction_detention" type="text" class="refund_amount form-control" placeholder="Enter Deduction/Detention..." name="deduction_detention">
                                                    </div>
                                                </div>
                                             </div>
                                             
                                             <!-- Client Receiving Section -->
                                            <div class="flex-col sm:flex-row mt-2">
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                                    <div class="col-span-12">
                                                        <h5>Client Receiving</h5>
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_receiving_date" class="form-label">Receiving Date</label>
                                                        <input type="date" id="client_receiving_date" class="form-control" name="client_receiving_date">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_amount" class="form-label">Amount</label>
                                                        <input type="number" id="client_amount" class="form-control" name="client_amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_bank_name" class="form-label">Bank Name</label>
                                                        <select id="client_bank_id" name="client_bank_id" class="form-select">
                                                            <option value="">Select Bank</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($banks as $b)
                                                                <option value="{{ $b->id }}">{{ $b->bank_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<input type="text" id="client_bank_name" class="form-control" name="client_bank_name" placeholder="Enter Bank Name">-->

                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_cheque_number" class="form-label">Cheque Number</label>
                                                        <input type="text" id="client_cheque_number" class="form-control" name="client_cheque_number" placeholder="Enter Cheque Number">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <!-- SMS Logistic Section -->
                                            <div class="flex-col sm:flex-row mt-2">
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                                    <div class="col-span-12">
                                                        <h5>SMS Logistic</h5>
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_receiving_date" class="form-label">Receiving Date</label>
                                                        <input type="date" id="sms_logistic_receiving_date" class="form-control" name="sms_logistic_receiving_date">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_amount" class="form-label">Amount</label>
                                                        <input type="number" id="sms_logistic_amount" class="form-control" name="sms_logistic_amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_bank_name" class="form-label">Bank Name</label>
                                                        <select id="sms_bank_id" name="sms_logistic_bank_id" class="form-select">
                                                            <option value="">Select Bank</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($banks as $b)
                                                                <option value="{{ $b->id }}">{{ $b->bank_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<input type="text" id="sms_logistic_bank_name" class="form-control" name="sms_logistic_bank_name" placeholder="Enter Bank Name">-->
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_cheque_number" class="form-label">Cheque Number</label>
                                                        <input type="text" id="sms_logistic_cheque_number" class="form-control" name="sms_logistic_cheque_number" placeholder="Enter Cheque Number">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <!-- Investor Section -->
                                            <div class="flex-col sm:flex-row mt-2">
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                                    <div class="col-span-12">
                                                        <h5>Investor</h5>
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_paid_date" class="form-label">Paid Date</label>
                                                        <input type="date" id="investor_paid_date" class="form-control" name="investor_paid_date">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_amount" class="form-label">Amount</label>
                                                        <input type="number" id="investor_amount" class="form-control" name="investor_amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_bank_name" class="form-label">Bank Name</label>
                                                        <select id="investor_bank__id" name="investor_bank_id" class="form-select">
                                                            <option value="">Select Bank</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($banks as $b)
                                                                <option value="{{ $b->id }}">{{ $b->bank_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<input type="text" id="investor_bank_name" class="form-control" name="investor_bank_name" placeholder="Enter Bank Name">-->
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_cheque_number" class="form-label">Cheque Number</label>
                                                        <input type="text" id="investor_cheque_number" class="form-control" name="investor_cheque_number" placeholder="Enter Cheque Number">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                                    <!-- Status tab content -->
                                    <p>Status tab content</p>
                                  </div>
                                
                            </div>
                            @if($user_meta->container_deposit == 1)
                                @if($user_meta->insertion == 1)
                                  <input type="submit" value="Save" class="show_fields btn btn-primary mt-5">
                                @endif
                            @endif
        
                          <button class="show_fields btn btn-primary mt-5" id="Reset">Reset</button>
                     </div>

                  </div>

               </div>

               </form>

            </div>

         </div>

         <!--grid table-->

         </div>

      </div>

   </div>

</div>

</div>

</div>

@endsection

@section('script')

<script>
    $(document).ready(function() {
        // Handle the tab shown event
        $('#myTab button').on('click', function() {
            // Remove btn-primary class from all buttons
            $('#myTab button').removeClass('btn-primary').addClass('btn-default');
            
            // Add btn-primary class to the clicked button
            $(this).removeClass('btn-default').addClass('btn-primary');
        });
    });


    function fetchCsmData() {
        var cdoNo = $('#cdoSelect').val();  // Get the selected value from the dropdown

        if (cdoNo) {
            $.ajax({
                url: '/fetch-csm-data',  // Your Laravel route to handle the request
                method: 'GET',           // Use GET or POST depending on your route configuration
                data: {
                    cdo_no: cdoNo       // Pass the selected value as a parameter
                },
                success: function(response) {
                    // Assuming the response contains the fetched data
                    
                    console.log(response.cdo_dtl);
                    // Assuming response.cdo_dtl is an array of records
                    let expenseFieldsHtml = [];
                    
                    response.cdo_dtl.forEach(function(record, index) {
                        console.log(record); // Log the record to the console for debugging
                    
                        // Use index to ensure unique IDs for each set of fields
                        expenseFieldsHtml.push(`
                            <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${index + 1}">
                                <div class="col-span-12">
                                    <h5 class="font-bold mb-2">Record ${index + 1}</h5>
                                </div>
                                <div class="col-span-3">
                                    <label for="job_no_${index + 1}" class="form-label">Job No.</label>
                                    <input id="job_no_${index + 1}" disabled type="text" class="form-control" placeholder="Container No." name="job_no[]" value="${record.job_no}">
                                </div>
                                <div class="col-span-3">
                                    <label for="container_no_${index + 1}" class="form-label">Container No.</label>
                                    <input id="container_no_${index + 1}" disabled type="text" class="form-control" placeholder="Container No." name="container_no[]" value="${record.container_no}">
                                </div>
                                <div class="col-span-3 d-flex align-items-center">
                                    <label for="pick_point_${index + 1}" class="form-label">PickPoint</label>
                                    <input id="pick_point_${index + 1}" type="text" disabled class="form-control" placeholder="Pick Point" name="pick_point[]" value="${record.pick_point_name}">
                                </div>
                                <div class="col-span-3 d-flex align-items-center">
                                    <label for="yard_${index + 1}" class="form-label">Yard</label>
                                    <input id="yard_${index + 1}" type="text" class="form-control" disabled placeholder="Yard" name="yard[]" value="${record.yard_name}">
                                </div>
                                <div class="col-span-3">
                                    <label for="placement_date_${index + 1}" class="form-label">Placement Date</label>
                                    <input id="placement_date_${index + 1}" type="date" class="form-control" disabled value="${record.placement_date}" name="placement_date[]">
                                </div>
                                <div class="col-span-3">
                                    <label for="eir_date_${index + 1}" class="form-label">EIR Date</label>
                                    <input id="eir_date_${index + 1}" type="date" class="form-control" disabled value="${record.eir_date}" name="eir_date[]">
                                </div>
                                <div class="col-span-3 d-flex align-items-center">
                                    <label for="eir_status_${index + 1}" class="form-label">EIR Status ${record.eir_status === 'received' ? '<a href="#" class="ml-8 open-modal" data-index="${index + 1}" data-image="${record.eir_upload}">Click Here</a>' : ''}</label>
                                    <input id="eir_status_${index + 1}" type="text" class="form-control" disabled value="${record.eir_status}" name="eir_status[]">
                                </div>
                                <input type="hidden" name="eir_upload[]" value="">
                                <div id="imageDiv_${index + 1}" class="col-span-3" style="display: none;">
                                    <div class="flex flex-row mt-2 items-center">
                                        <div class="flex flex-col mr-4" style="width:60%; margin-right:0px;">
                                            <label for="eir_document_${index + 1}" class="mb-2">Upload Document</label>
                                            <input type="file" id="eir_document_${index + 1}" name="eir_document[]" disabled value="${record.eir_upload}" class="form-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label for="receiving_date_${index + 1}" class="form-label">Receiving Date</label>
                                    <input id="receiving_date_${index + 1}" disabled type="date" class="form-control" value="${record.receiving_date}" name="receiving_date[]">
                                </div>
                            </div>
                             <hr class="col-span-12 mt-5 mb-5">
                        `);
                    });
                    
                    // Append the fields to the wrapper
                    $('#cdo_dtl_fields_wrapper').append(expenseFieldsHtml.join(''));
                    
                    
                    $('#imagePreview').attr('src', '').hide(); // Clear the image source
                    console.log(response);
                    var data = response.data;
                    // Show success toaster
                    toastr.success('Data fetched successfully!');
                    
                    var bl_no = data.bl_no;
                    var container_no = data.container_no;
                    var expiry_date = data.expiry_date;
                    var paymentByValue = data.payment_by; // e.g., "client"
                    var paymentByDetail = data.payment_by_dtl; // e.g., "client"
                    var payment_date = data.payment_date; // e.g., "client"
                    var eir_status = data.eir; // e.g., "client"
                    
                    var total_amount = parseInt(data.deposit_amount) + parseInt(data.supplier_charges);

                    
                    $('#bl_no').val(bl_no);
                    $('#container_no').val(container_no);
                    $('#date').val(expiry_date);
                    // Set the selected option based on the retrieved value
                    $('#payment_by').val(paymentByValue);
                    // $('#deposit_amount').val(total_amount);

                    // Show the appropriate dropdown based on paymentByValue
                    if (paymentByValue === 'client') {
                        $('#customerDropdownContainer').show();
                        $('#customer_id').val(paymentByDetail).change(); // Set selected value
                    } else if (paymentByValue === 'depositor') {
                        $('#depositorDropdownContainer').show();
                        $('#depositor_id').val(paymentByDetail).change();
                    }
                    $('#payment_date').val(payment_date);
                    // Set the selected option based on the eir status from the database
                    
                    if (data.eir) {
                        $('#eir_status').val(data.eir); // Set the select value
                    }
            
                    // Function to toggle the visibility of the imageDiv
                    function toggleImageDiv() {
                        if ($('#eir_status').val() == 'received') {
                            $('#imageDiv').show(); // Show the image div
                            if (data.eir_upload) {
                                $('#imagePreview').attr('src', data.eir_upload); // Set the image source
                                $('#imagePreview').show(); // Display the image
                            }
                        } else {
                            $('#imageDiv').hide(); // Hide the image div
                            $('#imagePreview').hide(); // Hide the image preview
                            $('#imagePreview').attr('src', ''); // Clear the image source
                        }
                    }
            
                    // Call the function to set the visibility based on the initial selection
                    toggleImageDiv();
                                        
                     // Event listener for changes in the Eir Status dropdown
        $('#eir_status').on('change', function () {
            toggleImageDiv(); // Show/hide based on the selected value
        });
                    
                    // Check if `eir` is `yes` and update the checkbox
                    // if (response.eir === 'yes') {
                    //     $('#eir').prop('checked', true);
    
                    //     // Show the image container and set the image source (assuming image path is in response)
                    //     $('#eir-image-container').show();
                    //     $('#eir-image').attr('src', response.eir_image);  // Assuming `eir_image` is the URL of the image
                    // } else {
                    //     $('#eir').prop('checked', false);
    
                    //     // Hide the image container
                    //     $('#eir-image-container').hide();
                    // }
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    console.error(error);

                    // Show error toaster
                    toastr.error('An error occurred while fetching the data.');
                }
            });
        } else {
            toastr.warning('Please select a valid option.');
        }
    }
    
    
    $('#payment_by').on('change', function() {
        var selectedValue = $(this).val();
        
        // Hide both dropdowns initially
        $('#customerDropdownContainer').hide();
        $('#depositorDropdownContainer').hide();

        // Show the appropriate dropdown based on selected value
        if (selectedValue === 'client') {
            $('#customerDropdownContainer').show();
        } else if (selectedValue === 'depositor') {
            $('#depositorDropdownContainer').show();
        }
    });
    
    $(document).ready(function() {
        // Event listener for checkboxes
        $('.form-checkbox').on('change', function() {
            var labelName = $(this).data('label');  // Get the label from data attribute
            var inputId = $(this).attr('id') + '-input'; // Create a unique input ID
            
            if ($(this).is(':checked')) {
                // Create the input field when checkbox is checked
                var newInputDiv = `
                    <div id="${inputId}" class="input-container col-span-4 mr-4">
                        <label class="form-label">${labelName}</label>
                        <input type="text" placeholder="${labelName}" class="form-control ${inputId}" name="${labelName.toLowerCase().replace(/\s+/g, '_')}">
                    </div>`;
                
                // Append the new input field to the container
                $('#dynamic-inputs').append(newInputDiv);
                
                // Add a keyup listener to the new input field to update the total sum
                $('.' + inputId).on('keyup', function() {
                    updateTotal();
                });
                
            } else {
                // Remove the input field if checkbox is unchecked
                $('#' + inputId).remove();
            }
        });
    });

</script>
@endsection