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
    @php
        $user = auth()->user()->id;
        $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
    @endphp


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
    $rd = $data['refund_detention'];
    $cdo = $data['cdo'];
    $customers = $data['customers'];
    $depositors = $data['depositors'];
    $banks = $data['banks'];

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
                            <button class="nav-link active btn btn-primary" id="csm-tab" data-toggle="tab" data-target="#csm" type="button" role="tab" aria-controls="csm" aria-selected="true">CSM</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-default" id="refund-amount-tab" data-toggle="tab" data-target="#refund" type="button" role="tab" aria-controls="refund" aria-selected="false">Refund Amount</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-default" id="status-tab" data-toggle="tab" data-target="#status" type="button" role="tab" aria-controls="status" aria-selected="false">Status</button>
                          </li>
                        </ul>
                        <form id="myForm" method="post" action="{{route('update-refund-detention')}}" onkeydown="return event.key != 'Enter';">

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
                                                   <input type="hidden" name="id" value="{{ $rd->id}}" />
            
                                                    <div class="col-span-4">
                                                        <label class="radio-switch-1">CDO NO.</label>
                                                        <input type="hidden" value="{{$rd->cdo_no}}" name="cdo_no">
                                                        <input type="text" id="cdo_no" class="form-control" value="{{$rd->cdo_no}}" disabled placeholder="CDO#">
                                                    </div>
                                                    <!--bl_no, mobile no-->
                                                    <div class="col-span-4">
                
                                                       <label for="regular-form-4" class="form-label">Bl No </label>
    
                                                       <input  id="bl_no" type="text" class="bl_no form-control" value="{{$rd->bl_no}}" placeholder="BL Number" name="bl_no">
                
                                                    </div>
                                                </div>
            
                                             </div>
                                             <div class="flex-col sm:flex-row mt-2">
                                                 @php $sr = 1; @endphp
                                                @foreach($cdo as $c)
                                                    <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_1">
                                                        <div class="col-span-12">
                                                            <h5 class="font-bold mb-2">Record {{$sr}}</h5>
                                                        </div>
                                                        <div class="col-span-3">
                                                            <label for="job_no_1" class="form-label">Job No.</label>
                                                            <input id="job_no_1" disabled type="text" class="form-control" placeholder="Container No." name="job_no[]" value="{{$c->job_no}}">
                                                        </div>
                                                        <div class="col-span-3">
                                                            <label for="container_no_1" class="form-label">Container No.</label>
                                                            <input id="container_no_1" disabled type="text" class="form-control" placeholder="Container No." name="container_no[]" value="{{$c->container_no}}">
                                                        </div>
                                                        <div class="col-span-3 d-flex align-items-center">
                                                            <label for="pick_point_1" class="form-label">PickPoint</label>
                                                            <input id="pick_point_1" type="text" disabled class="form-control" placeholder="Pick Point" name="pick_point[]" value="{{$c->pick_point_name}}">
                                                        </div>
                                                        <div class="col-span-3 d-flex align-items-center">
                                                            <label for="yard_1" class="form-label">Yard</label>
                                                            <input id="yard_1" type="text" class="form-control" disabled placeholder="Yard" name="yard[]" value="{{$c->yard_name}}">
                                                        </div>
                                                        <div class="col-span-3">
                                                            <label for="placement_date_1" class="form-label">Placement Date</label>
                                                            <input id="placement_date_1" type="date" class="form-control" disabled value="{{$c->placement_date}}" name="placement_date[]">
                                                        </div>
                                                        <div class="col-span-3">
                                                            <label for="eir_date_1" class="form-label">EIR Date</label>
                                                            <input id="eir_date_1" type="date" class="form-control" disabled value="{{$c->eir_date}}" name="eir_date[]">
                                                        </div>
                                                        <div class="col-span-3 d-flex align-items-center">
                                                            <label for="eir_status_1" class="form-label">
                                                                EIR Status 
                                                                <!--<a href="#" class="ml-8 open-modal" data-index="1" data-image="/path/to/image.jpg">Click Here</a>-->
                                                            </label>
                                                            <input id="eir_status_1" type="text" class="form-control" disabled value="{{$c->eir_status}}" name="eir_status[]">
                                                        </div>
                                                        <div class="col-span-3">
                                                            <label for="receiving_date_1" class="form-label">Receiving Date</label>
                                                            <input id="receiving_date_1" disabled type="date" class="form-control" value="{{$c->receiving_date}}" name="receiving_date[]">
                                                        </div>
                                                        <hr class="col-span-12 mt-5 mb-5">
                                                    </div>
                                                    @php $sr++; @endphp
                                                @endforeach
                                             </div>
                                             <div class="flex-col sm:flex-row mt-2">
                                                <div class="grid grid-cols-12 gap-2 mt-2 mb-2">

                                                </div>
                                            </div>                                         
                                             <div class="grid grid-cols-12 gap-2 mt-2" id="checkbox_container_div">
                                                    <div class="col-span-2">
                                                        <div class="flex items-center">
                                                            <input type="checkbox"
                                                                {{ isset($rd->lolo) ? 'checked' : '' }}
                                                            id="lolo" name="lolo" class="form-checkbox" data-label="LOLO">
                                                            <label for="lolo" class="ml-4">LOLO</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input 
                                                            {{ isset($rd->advance_tax) ? 'checked' : '' }}

                                                            type="checkbox" id="advance_tax" name="advance_tax" class="form-checkbox" data-label="Advance tax">
                                                            <label for="Advance tax" class="ml-4">Advance Tax</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input 
                                                            {{ isset($rd->late_do) ? 'checked' : '' }}
                                                            
                                                            type="checkbox" id="late_do" name="late_do" class="form-checkbox" data-label="Late DO">
                                                            <label for="Late DO" class="ml-4">Late DO</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12" id="dynamic-inputs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;"></div>
    
                                                </div>
                                                
                                                <div class="col-span-12" id="dynamic-inputs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                                                    @if(!empty($rd->lolo))
                                                        <div id="lolo-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">LOLO</label>
                                                            <input type="text" value="{{$rd->lolo}}" placeholder="Lolo number" class="form-control" name="lolo">
                                                        </div>
                                                    @endif

                                                    @if(!empty($rd->advance_tax))
                                                        <div id="advance-tax-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">Advance tax</label>
                                                            <input type="text" value="{{$rd->advance_tax}}" placeholder="Advance Tax Number" class="form-control" name="advance_tax">
                                                        </div>
                                                    @endif

                                                    @if(!empty($rd->late_do))
                                                        <div id="late-do-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">Late DO</label>
                                                            <input type="text" value="{{$rd->late_do}}" placeholder="Late DO Number" class="form-control" name="late_do">
                                                        </div>
                                                    @endif
                                                    
                                                </div>
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
                                                       <input  id="refund_amount" type="text" value="{{isset($rd->refund_amount) ? $rd->refund_amount : ''}}" class="refund_amount form-control" placeholder="Enter Refund Amount..." name="refund_amount">
                                                    </div>
                                                    <div class="col-span-4">
                                                       <label for="regular-form-4" class="form-label">Deduction/Detention </label>
                                                       <input  id="deduction_detention" type="text" value="{{isset($rd->deduction_detention) ? $rd->deduction_detention : ''}}" class="refund_amount form-control" placeholder="Enter Deduction/Detention..." name="deduction_detention">
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
                                                        <input type="date" id="client_receiving_date" value="{{isset($rd->client_receiving_date) ? $rd->client_receiving_date : ''}}" class="form-control" name="client_receiving_date">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_amount" class="form-label">Amount</label>
                                                        <input type="number" id="client_amount" class="form-control" value="{{isset($rd->client_amount) ? $rd->client_amount : ''}}" name="client_amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_bank_name" class="form-label">Bank Name</label>
                                                        <select id="client_bank_id" name="client_bank_id" class="form-select">
                                                            <option value="">Select Bank</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($banks as $b)
                                                                <option {{ $b->id == $rd->client_bank_id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->bank_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<input type="text" id="client_bank_name" class="form-control" name="client_bank_name"  placeholder="Enter Bank Name">-->
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="client_cheque_number" class="form-label">Cheque Number</label>
                                                        <input type="text" id="client_cheque_number" class="form-control" name="client_cheque_number" value="{{isset($rd->client_cheque_no) ? $rd->client_cheque_no : ''}}" placeholder="Enter Cheque Number">
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
                                                        <input type="date" id="sms_logistic_receiving_date" value="{{isset($rd->sms_logistic_receiving_date) ? $rd->sms_logistic_receiving_date : ''}}" class="form-control" name="sms_logistic_receiving_date">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_amount" class="form-label">Amount</label>
                                                        <input type="number" id="sms_logistic_amount" class="form-control" value="{{isset($rd->sms_logistic_amount) ? $rd->sms_logistic_amount : ''}}" name="sms_logistic_amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_bank_name" class="form-label">Bank Name</label>
                                                        <select id="sms_logistic_bank_id" name="sms_logistic_bank_id" class="form-select">
                                                            <option value="">Select Bank</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($banks as $b)
                                                                <option {{ $b->id == $rd->sms_logistic_bank_id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->bank_name }}</option>
                                                            @endforeach
                                                        </select>

                                                        <!--<input type="text" id="sms_logistic_bank_name" class="form-control" name="sms_logistic_bank_name" placeholder="Enter Bank Name">-->
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="sms_logistic_cheque_number" class="form-label">Cheque Number</label>
                                                        <input type="text" id="sms_logistic_cheque_number" class="form-control" value="{{isset($rd->sms_logistic_cheque_number) ? $rd->sms_logistic_cheque_number : ''}}" name="sms_logistic_cheque_number" placeholder="Enter Cheque Number">
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
                                                        <input type="date" id="investor_paid_date" class="form-control" value="{{isset($rd->investor_paid_date) ? $rd->investor_paid_date : ''}}" name="investor_paid_date">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_amount" class="form-label">Amount</label>
                                                        <input type="number" id="investor_amount" class="form-control" value="{{isset($rd->investor_amount) ? $rd->investor_amount : ''}}" name="investor_amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_bank_name" class="form-label">Bank Name</label>
                                                        <select id="investor_bank_id" name="investor_bank_id" class="form-select">
                                                            <option value="">Select Bank</option>
                                                            <!-- Assuming you're looping through depositors fetched from the DB -->
                                                            @foreach($banks as $b)
                                                                <option {{ $b->id == $rd->investor_bank_id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->bank_name }}</option>
                                                            @endforeach
                                                        </select>

                                                        <!--<input type="text" id="investor_bank_name" class="form-control" name="investor_bank_name" placeholder="Enter Bank Name">-->
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="investor_cheque_number" class="form-label">Cheque Number</label>
                                                        <input type="text" id="investor_cheque_number" class="form-control"  value="{{isset($rd->investor_cheque_number) ? $rd->investor_cheque_number : ''}}" name="investor_cheque_number" placeholder="Enter Cheque Number">
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
                                @if($user_meta->edition)
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
        var csmNo = $('#csmSelect').val();  // Get the selected value from the dropdown

        if (csmNo) {
            $.ajax({
                url: '/fetch-csm-data',  // Your Laravel route to handle the request
                method: 'GET',           // Use GET or POST depending on your route configuration
                data: {
                    csm_no: csmNo       // Pass the selected value as a parameter
                },
                success: function(response) {
                    // Assuming the response contains the fetched data
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


                    
                    $('#bl_no').val(bl_no);
                    $('#container_no').val(container_no);
                    $('#date').val(expiry_date);
                    // Set the selected option based on the retrieved value
                    $('#payment_by').val(paymentByValue);
                    // Show the appropriate dropdown based on paymentByValue
                    if (paymentByValue === 'client') {
                        $('#customerDropdownContainer').show();
                        $('#customer_id').val(paymentByDetail).change(); // Set selected value
                    } else if (paymentByValue === 'depositor') {
                        $('#depositorDropdownContainer').show();
                        $('#depositor_id').val(paymentByDetail).change();
                    }
                    $('#payment_date').val(payment_date);
                                        
                    
                    
                    // Check if `eir` is `yes` and update the checkbox
                    if (response.eir === 'yes') {
                        $('#eir').prop('checked', true);
    
                        // Show the image container and set the image source (assuming image path is in response)
                        $('#eir-image-container').show();
                        $('#eir-image').attr('src', response.eir_image);  // Assuming `eir_image` is the URL of the image
                    } else {
                        $('#eir').prop('checked', false);
    
                        // Hide the image container
                        $('#eir-image-container').hide();
                    }
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
            } else {
                // Remove the input field if checkbox is unchecked
                $('#' + inputId).remove();
            }
        });
    });

</script>
@endsection