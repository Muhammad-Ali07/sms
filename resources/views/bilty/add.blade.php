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

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <div class="row w-full">
                            <div class="col-lg-6">
                                <h2 class="font-medium text-base mr-auto">
                                    Bilty Form
                                    <div class="intro-ul"></div>
                                </h2>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">

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
                            <button class="nav-link active btn btn-primary" id="home-tab" data-toggle="tab" data-target="#main" type="button" role="tab" aria-controls="home" aria-selected="true">Main</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-default" id="profile-tab" data-toggle="tab" data-target="#buying" type="button" role="tab" aria-controls="profile" aria-selected="false">Buying</button>
                          </li>
                        </ul>

                        <form id="myForm" method="post" action="{{route('add-bilty-process')}}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">

                           @csrf

                            <div class="tab-content" id="myTabContent">
                                <!--main div tab starts here-->
                                <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="home-tab">
                                   <div class="classic open_classic">

                                      <div class="mt-2" style="margin-bottom:10px">

                                         <div class="flex-col sm:flex-row mt-2">

                                            <div class="grid grid-cols-12 gap-2 mt-2 mb-2">

                                               <input type="hidden" name="selfcompany" value="{{session('company')[0]->id}}" />

                                               <div class="col-span-4">

                                                  <label class="radio-switch-1">Customer Type</label> <br/><br/>

                                                  <input  id="radio-switch-1" checked class="form-check-input" type="radio" name="customerTtype" value="Walkin">

                                                  <label class="Walkin form-check-label" for="radio-switch-1">Walkin</label>

                                                  <input id="radio-switch-3" class="Billed form-check-input" type="radio" name="customerTtype" value="Billed">

                                                  <label class="form-check-label" for="radio-switch-3">Billed</label>

                                               </div>
                                                <div class="col-span-4">
                                                    <label class="radio-switch-1">Job Inquiry</label>
                                                    <select class="form-select" aria-label="Default select example" name="job_inquiry_id" id="jobInquirySelect" onchange="fetchJobInquiryData()">
                                                        <option selected>Select an option</option>
                                                        @foreach($job_inquiries as $ji)
                                                            <option value="{{$ji->id}}" data-code="{{$ji->code}}">{{$ji->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="logo_div col-span-4" style="float: right; text-align: right;">
                                                  <!--<label for="regular-form-1" class="form-label">Selected Company</label>-->
                                                  <img class="float-right" width="100" height="100" src="{{ asset('selfcompany_image/' . session('company')[0]->logo) }}" />
                                                </div>


                                            </div>

                                         </div>

                                      </div>

                                      <div class="grid grid-cols-12 gap-2 mt-2 mb-2">

                                         <div id="Billed_customer_div" class="Billed_customer_div col-span-4" style='display:none'>

                                            <label for="regular-form-22" class="form-label">Billed Customer</label>
                                            <select  id="customer_id" disabled class="customerbilled form-select sm:mr-2" aria-label="Default select example">
                                               <option value="">Select Customer</option>
                                               @foreach($billedCustomers as $billedCustomer)
                                                   <option value="{{$billedCustomer->id}}"> {{$billedCustomer->name}} </option>
                                               @endforeach
                                            </select>
                                            <input type="hidden" name="customerbilled" id="customer_id" class="customerbilled">
                                         </div>

                                         <div id="walkin_customer_div" class="walkin_customer_div col-span-4">

                                            <label for="regular-form-22" class="form-label">Customer Name</label>

                                            <input id="customer_field" readonly type="text" class="walkinCustmer form-control" name="customer">

                                         </div>

                                         <div class="show_fields col-span-4">

                                            <label for="regular-form-2" class="form-label">Builty No</label>

                                            <input id="regular-form-2" type="text" value="{{$builty_no}}" readonly class="form-control builty_no" name="builty_no">

                                         </div>

                                         <div class="show_fields col-span-4">

                                            <label for="regular-form-2" class="form-label">Job No</label>

                                            <input  type="text" class="job_id form-control" readonly id="job_no_no" name="job_id" value="">

                                         </div>

                                      </div>
                                        <!--first row-->
                                      <div class="show_fields">

                                         <div class="grid grid-cols-12 gap-2">

                                            <div class="billed_builty_type col-span-4" style="display:none">

                                               <label for="regular-form-1" class="form-label">Builty Type</label>

                                               <select tabindex="-1" readonly required id="builty_type" class="changetopay builtyType form-select sm:mr-2" aria-label="Default select example" name="Builtytype">

                                                   <option value=''> Select Builty Type </option>

                                                   <option value="Advance">Advance</option>

                                                     <option value="To Pay">To Pay</option>-->

                                                  <option value="Paid">Paid</option>

                                               </select>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-2" class="form-label">Date</label>

                                               <input type="text" readonly class="form-control" id="builty_date" name="date">

                                            </div>
                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Language</label>
                                               <select  id="language" readonly class="form-select sm:mr-2 language" aria-label="Default select language"  name="language">

                                                  <option value="English">English</option>

                                                  <option value="Urdu">Urdu</option>

                                               </select>

                                            </div>
                                         </div>

                                      </div>

                                        <!--sender phone name-->
                                      <div class="show_fields mt-2">

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Sender Name</label>

                                               <input  id="sender_name" readonly type="text" class="sender form-control" placeholder="Enter Sender Name" name="sendername">

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Sender Phone</label>

                                               <input  id="sender_phone" readonly  type="text" class="form-control" placeholder="Enter Sender Phone" name="senderphone">

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Receiver Name</label>

                                               <input  id="receiver_name" readonly  required type="text" class="form-control" placeholder="Enter Receiver Name"   name="receivername">

                                            </div>


                                         </div>

                                      </div>
                                        <!--Receiver name and phone-->
                                      <div class="show_fields mt-2">

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative receiverForm">

                                            <!--<div class="col-span-4">-->

                                            <!--   <label for="regular-form-4" class="form-label">Receiver Name</label>-->

                                            <!--   <input  id="regular-form-4" required type="text" class="form-control" placeholder="Enter Receiver Name"   name="receivername">-->

                                            <!--</div>-->

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Receiver Phone</label>

                                               <input  id="reciever_phone" readonly type="text" class="form-control" placeholder="Enter Receiver Phone" name="receiverphone">

                                               <button class="btn btn-primary mt-5 AddMoreReceiver"  style="display:none !important" type="button">Add More</button>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Weight</label>

                                               <input  type="text" placeholder="Weight" readonly id="weight" class="weight form-control" name="weight">

                                            </div>

                                            <div class="col-span-4" id="supplier_charges_div" >

                                               <label for="regular-form-1" class="form-label">Supplier Charges</label>

                                               <input  type="text" placeholder="Enter Number" id="supplier_charges" readonly class="form-control sm:mr-2" name="supplier_charges">

                                            </div>

                                         </div>

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative">
                                             <div class="col-span-4" id="supplier_charges_div" >
                                               <label for="regular-form-1" class="form-label">Credit Days</label>
                                               <input  type="text" placeholder="Enter days" id="credit_days" class="form-control sm:mr-2" name="credit_days">
                                            </div>
                                             <div class="col-span-4" id="supplier_charges_div" >
                                               <label for="regular-form-1" class="form-label">Payment Date</label>
                                               <input type="text" readonly class="form-control" id="payment_date" name="payment_date">
                                            </div>
                                            <div class="col-span-4">
                                               <label for="regular-form-1" class="form-label">Manager</label>
                                              <input type="hidden" class="form-control" id="manager_id" name="manager_id">
                                               <input type="text" readonly class="form-control" id="manager_name" name="manager_name">
                                            </div>

                                         </div>

                                         <script>


                                         </script>

                                      </div>
                                        <!--station from to -->
                                      <div class="show_fields">

                                         <div class="grid grid-cols-12 gap-2 mt-2">

                                            <div class="col-span-6">

                                               <label for="regular-form-1" class="form-label">From</label>

                                               <select  id="from_station" class="from form-select sm:mr-2" aria-label="Default select example"  name="from">
                                                     @foreach($stations as $s)
                                                        <option value="{{$s->id}}" >{{$s->name}}</option>
                                                    @endforeach
                                               </select>

                                            </div>

                                            <div class="col-span-6">

                                               <label for="regular-form-1" class="form-label">To</label>

                                               <select id="to_station" class="to form-select sm:mr-2" aria-label="Default select example" name="to">
                                                     @foreach($stations as $s)
                                                        <option value="{{$s->id}}" >{{$s->name}}</option>
                                                    @endforeach

                                               </select>

                                            </div>

                                         </div>

                                      </div>
                                        <!--div bl, lc , container no.-->
                                      <div class="show_fields">

                                            <!--<div class="col-span-3" style="display: none;>-->

                                            <!--   <label for="regular-form-1" class="form-label">Delivery Mode</label>-->

                                            <!--   <select  id="regular-form-1" class="form-select sm:mr-2 deliverymode" aria-label="Default select example"  name="deliverymode">-->

                                            <!--      <option>Good Transport</option>-->

                                            <!--   </select>-->

                                            <!--</div>-->

                                            <div class="grid grid-cols-12 gap-2 mt-2" id="bl_lc_container_div">
                                                <div class="col-span-2">
                                                    <div class="flex items-center">
                                                        <input type="checkbox" id="bl-number" name="bl_no" class="form-checkbox" data-label="B.L Number">
                                                        <label for="bl-number" class="ml-4">B.L Number</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" id="container-number" name="ct_no" class="form-checkbox" data-label="Container Number">
                                                        <label for="container-number" class="ml-4">Container Number</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" id="lc-number" name="cl_no" class="form-checkbox" data-label="L.C Number">
                                                        <label for="lc-number" class="ml-4">L.C Number</label>
                                                    </div>
                                                                                                        <div class="flex items-center">
                                                        <input type="checkbox" id="seal-number" name="seal_no" class="form-checkbox" data-label="Seal Number">
                                                        <label for="seal-number" class="ml-4">Seal Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-12" id="dynamic-inputs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;"></div>

                                            </div>



                                      </div>

                                        <!--local vehicle no, mobile no-->
                                      <div class="show_fields mt-2">

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Vehicle No </label>

                                               <input  id="local_vehicle_no" type="text" class="Local Vehicle form-control" placeholder="Enter Local Vehicle Number" name="local_vehicle_no">

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Vehicle Mobile No</label>

                                               <input  id="local_mobile_no" type="text" class="form-control" placeholder="Enter Local Vehicle Mobile Number" name="local_mobile_no">

                                               <button type="button" class="btn btn-primary mt-5 AddMoreSender"  style="display:none !important">Add More</button>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Type of Goods</label>

                                               <input  type="text" placeholder="Enter..." class="form-control sm:mr-2" id="type_of_goods"  name="type_of_goods">

                                            </div>


                                         </div>

                                      </div>

                                      <div class="show_fields mt-2">
                                         <div class="grid grid-cols-12 gap-2 mt-2">

                                            <div class="col-span-4">
                                                <label for="regular-form-1" class="form-label">Type of purchase</label>
                                                <select id="packages" class="form-select" aria-label="Default select example" name="package_id">
                                                    @foreach($packages as $p)
                                                        <option value="{{$p->id}}">{{$p->packagename}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Note</label>

                                               <input  type="text" id="note" placeholder="Enter Note" class="form-control sm:mr-2"  name="note">

                                            </div>

                                         </div>
                                      </div>
                                      <div class="show_fields">

                                         <div class="grid grid-cols-12 gap-2 mt-2">

                                            <div class="col-span-12">

                                               <label for="regular-form-1" class="form-label">Delivery Address</label>

                                               <input  type="text" id="deliveryaddress" placeholder="Enter Delivery Address" class="form-control sm:mr-2" name="deliveryaddress">

                                            </div>


                                         </div>

                                      </div>


                                   </div>
                                </div>

                                <!--buying div tab starts here-->
                                <div class="tab-pane fade" id="buying" role="tabpanel" aria-labelledby="profile-tab">
                                  <div class="show_fields mt-4 col-span-6">
                                        <label class="form-label">Buying Data for the Vehicles</label> <br><br>
                                        <div class="show_fields">
                                            <div class="grid grid-cols-12 gap-2 mt-2">
                                                <div class="col-span-4">
                                                    <label for="regular-form-4" class="form-label">Buying Fare Rate</label>
                                                    <input id="regular-form-4" type="text" class="form-control number-input" placeholder="Enter Fare Rate" name="fare_rate">
                                                </div>
                                                <div class="col-span-4">
                                                    <label for="regular-form-1" class="form-label">Commission Broker</label>
                                                    <select id="regular-form-1" class="form-select" aria-label="Default select example" name="broker_id">
                                                        @foreach($brokers as $b)
                                                            <option value="{{$b->broker_id}}">{{$b->broker_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--<input type="text" placeholder="Enter Commission" class="form-select" name="commission">-->
                                                </div>
                                                <div class="col-span-4">
                                                    <label for="regular-form-1" class="form-label">Commission Status</label>
                                                    <select id="regular-form-1" class="form-select" aria-label="Default select example" name="comission_status">
                                                        <option value="Paid">Paid</option>
                                                        <option value="Unpaid">Unpaid</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                  <div class="show_fields mt-4 col-span-6">
                                        <label class="form-label">Selling Fare</label> <br><br>
                                        <div class="show_fields">
                                            <div class="grid grid-cols-12 gap-2 mt-2">
                                                <div class="col-span-4">
                                                    <label for="regular-form-4" class="form-label">Selling Fare Rate</label>
                                                    <input id="regular-form-4" type="text" class="form-control number-input" placeholder="Enter Selling Fare Rate" name="selling_fare_rate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <style>
                                        .btn-custom-remove {
                                            font-size: 10px;
                                            padding: 2px 6px;
                                            height: 20px;
                                            line-height: 1;
                                            margin-top: -129px;
                                            position: relative;
                                            left: 190px;

                                        }
                                    </style>
                                    <div class="show_fields mt-2 col-span-12">
                                        <label class="form-label d-inline-block">Expenses</label>
                                        <button type="button" class="btn btn-primary btn-sm float-right" id="add_more_expense">Add More</button>
                                        <br><br>
                                        <div id="expense_fields_wrapper">
                                            <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_1">
                                                <div class="col-span-3">
                                                    <label for="buyer_seller_name_1" class="form-label">Expense Name</label>
                                                    <input id="buyer_seller_name_1" type="text" class="form-control" placeholder="Expense Name" name="buyer_seller_name[]">
                                                </div>
                                                <div class="col-span-3">
                                                    <label for="buyer_seller_description_1" class="form-label">Description</label>
                                                    <input id="buyer_seller_description_1" type="text" class="form-control" placeholder="Enter Description" name="buyer_seller_description[]">
                                                </div>
                                                <div class="col-span-3">
                                                    <label for="buying_rate_1" class="form-label">Purchase Amount</label>
                                                    <input id="buying_rate_1" type="text" class="form-control buying_rate number-input" placeholder="Enter Buying Amount" name="buying_rate[]">
                                                </div>
                                                <div class="col-span-3 d-flex align-items-center">
                                                    <label for="selling_rate_1" class="form-label">Selling Amount</label>
                                                    <input id="selling_rate_1" type="text" class="form-control selling_rate number-input" placeholder="Enter Selling Amount" name="selling_rate[]">
                                                    <button type="button" class="btn btn-danger btn-custom-remove ml-2 remove_field" data-id="1">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Total Section -->
                                    <div class="total-section mt-4">
                                        <h5>Total Purchase Amount: <span id="total_purchase" class="number-input">0</span></h5>
                                        <h5>Total Selling Amount: <span id="total_selling" class="number-input">0</span></h5>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                           // Function to calculate the total amounts
                                            function calculateTotals() {
                                                var totalPurchase = 0;
                                                var totalSelling = 0;

                                                // Loop through all purchase and selling inputs
                                                $('.buying_rate').each(function() {
                                                    // var purchaseValue = parseFloat($(this).val());
                                                    var purchaseValue = parseFloat($(this).val().replace(/,/g, ''));

                                                    if (!isNaN(purchaseValue)) {
                                                        totalPurchase += purchaseValue;
                                                    }
                                                });

                                                $('.selling_rate').each(function() {
                                                    // var sellingValue = parseFloat($(this).val());
                                                    var sellingValue = parseFloat($(this).val().replace(/,/g, ''));

                                                    if (!isNaN(sellingValue)) {
                                                        totalSelling += sellingValue;
                                                    }
                                                });

                                                // Update the total values in the respective spans
                                                $('#total_purchase').text(totalPurchase.toFixed(2));
                                                $('#total_selling').text(totalSelling.toFixed(2));
                                            }


                                            var fieldCount = 1;

                                            // Add more expense fields
                                                $('#add_more_expense').click(function() {
                                                    fieldCount++;
                                                    var newField = `
                                                        <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${fieldCount}">
                                                            <div class="col-span-3">
                                                                <label for="buyer_seller_name_${fieldCount}" class="form-label">Name</label>
                                                                <input id="buyer_seller_name_${fieldCount}" type="text" class="form-control" placeholder="Enter Buyer/Seller Name" name="buyer_seller_name[]">
                                                            </div>
                                                            <div class="col-span-3">
                                                                <label for="buyer_seller_description_${fieldCount}" class="form-label">Description</label>
                                                                <input id="buyer_seller_description_${fieldCount}" type="text" class="form-control" placeholder="Enter Description" name="buyer_seller_description[]">
                                                            </div>
                                                            <div class="col-span-3">
                                                                <label for="buying_rate_${fieldCount}" class="form-label">Purchase Amount</label>
                                                                <input id="buying_rate_${fieldCount}" type="text" class="form-control buying_rate" placeholder="Enter Buying Amount" name="buying_rate[]">
                                                            </div>
                                                            <div class="col-span-3 d-flex align-items-center">
                                                                <label for="selling_rate_${fieldCount}" class="form-label">Selling Amount</label>
                                                                <input id="selling_rate_${fieldCount}" type="text" class="form-control selling_rate" placeholder="Enter Selling Amount" name="selling_rate[]">
                                                                <button type="button" class="btn btn-danger btn-custom-remove ml-2 remove_field" data-id="${fieldCount}">Remove</button>
                                                            </div>
                                                        </div>
                                                    `;
                                                    $('#expense_fields_wrapper').append(newField);
                                                });

                                            // Calculate totals whenever the purchase or selling inputs are changed
                                            $(document).on('input', '.buying_rate, .selling_rate', function() {
                                                calculateTotals();
                                            });
                                            $(document).on('click', '.remove_field', function() {
                                                var fieldId = $(this).data('id');
                                                $('#expense_field_' + fieldId).remove();
                                            });
                                        });
                                    </script>

                                    <!--old working of purchase and selling expenses starts-->

                                    <!--<div class="show_fields mt-2 col-span-6">-->
                                    <!--    <label class="form-label d-inline-block">Expense Purchase</label>-->
                                    <!--    <button type="button" class="btn btn-primary float-right" id="add_more">Add More</button>-->
                                    <!--    <br><br>-->
                                    <!--    <div id="expense_fields_wrapper">-->
                                    <!--        <div class="expense_fields grid grid-cols-12 gap-2 mt-2">-->
                                    <!--            <div class="col-span-4">-->
                                    <!--                <label for="buyer_name_1" class="form-label">Name</label>-->
                                    <!--                <input id="buyer_name_1" type="text" class="form-control" placeholder="Enter Buyer Name" name="buyer_name[]">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-span-4">-->
                                    <!--                <label for="buyer_description_1" class="form-label">Description</label>-->
                                    <!--                <input id="buyer_description_1" type="text" class="form-control" placeholder="Enter Buyer Description" name="buyer_description[]">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-span-4">-->
                                    <!--                <label for="buying_rate_1" class="form-label">Amount</label>-->
                                    <!--                <input id="buying_rate_1" type="text" class="form-control" placeholder="Enter Buying Amount" name="buying_rate[]">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="show_fields mt-2 col-span-6">-->
                                    <!--    <label class="form-label d-inline-block">Expense Selling</label>-->
                                    <!--    <button type="button" class="btn btn-primary float-right" id="add_more_exp_selling">Add More</button>-->
                                    <!--    <br><br>-->
                                    <!--    <div id="expense_selling_fields_wrapper">-->
                                    <!--        <div class="grid grid-cols-12 gap-2 mt-2" id="selling_field_0">-->
                                    <!--            <div class="col-span-4">-->
                                    <!--                <label for="seller_name" class="form-label">Name</label>-->
                                    <!--                <input id="seller_name" type="text" class="form-control" placeholder="Enter Seller Name" name="seller_name[]">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-span-4">-->
                                    <!--                <label for="seller_description" class="form-label">Description</label>-->
                                    <!--                <input id="seller_description" type="text" class="form-control" placeholder="Enter Seller Description" name="seller_description[]">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-span-4">-->
                                    <!--                <label for="selling_rate" class="form-label">Amount</label>-->
                                    <!--                <input id="selling_rate" type="text" class="form-control" placeholder="Enter Selling Amount" name="selling_rate[]">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--old working of purchase and selling expenses ends-->


                                    <div class="show_fields mt-4 col-span-6">
                                        <label class="form-label">File Upload</label>
                                        <br><br>
                                        <div class="show_fields">
                                            <div id="file_upload_wrapper">
                                                <div class="file_upload grid grid-cols-12 gap-2 mt-2" id="file_upload_0">
                                                    <div class="col-span-4 mr-4">
                                                        <label for="doc_name-0" class="form-label">File Name</label>
                                                        <input id="doc_name-0" type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]">
                                                    </div>
                                                    <div class="col-span-4 mr-4">
                                                        <label for="doc_file-0" class="form-label">File</label>
                                                        <input id="doc_file-0" type="file" class="form-control" name="doc_file[]">
                                                    </div>
                                                    <div class="col-span-2 mt-1">
                                                        <button type="button" class="btn btn-primary AddMoreFile mt-6" id="add_more_file">Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="show_fields">
                                        <div class="grid grid-cols-12 gap-2 mt-2">
                                        </div>
                                    </div>

                                </div>
                            </div>

                     </div>

                  </div>



                    @if($user_meta->builty == 1)
                        @if($user_meta->insertion == 1)
                          <input type="button" value="Save Billy" class="show_fields addBilty btn btn-primary mt-5">
                        @endif
                    @endif

                  <button class="show_fields btn btn-primary mt-5" id="Reset">Reset</button>

               </div>

               </form>

            </div>

         </div>

         <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        View Builty

                     </h2>

                     <button class="btn btn-primary" onclick="print_multiple_invoice_redirect()" style="float: right;margin: 10px 10px;"> Print Selected </button>

                     <!--<div id="example_filter" class="dataTables_filter Search_Input p-2"><label>Search:<input type="search" id="search" class="border m-1 p-2" placeholder="" aria-controls="example"></label></div>-->

                     </div>

                     <div id="input" class="p-5">

                        <div class="preview articles">

                           <table id="bilty_table" class="table table-hover display nowrap dataTable" style="width:100%">

                              <thead>

                                 <tr>

                                    <th></th>

                                    <th>Builty ID</th>
                                    <th>Job No.</th>

                                    <th>Shipment Status</th>
                                    <th>Payment Status</th>

                                    <th>Customer</th>

                                    <th>Receiver Name</th>

                                    <th>To</th>

                                    <th>Date</th>

                                    <th>Builty Type</th>

                                    <th>Quantity</th>

                                    <th>Local</th>

                                    <th>Action</th>

                                 </tr>

                              </thead>

                              <tbody>


                               @foreach($builties as $builty)

                                    @php
                                        $tracking = DB::table('tracking')->where('builty_id', '=' ,$builty->builty_id)->orderBy('id','desc')->first();
                                        $status = '';
                                        // dd($builty);
                                        // $bill = DB::table('bill')
                                        //     ->select('total', 'r_total')
                                        //     ->whereRaw("JSON_CONTAINS(bilty_no, '[\"$builty->builty_id\"]')")
                                        //     ->first();
                                        $bill = DB::table('bill')
                                            ->select('total', 'r_total')
                                            ->where('bilty_no', 'LIKE', '%"'.$builty->builty_id.'"%')
                                            ->first();

                                        if ($bill) {
                                            // Bilty is already used in a bill, and we have the total and r_total columns
                                            if($bill->r_total == 0){
                                                $status = 'Full Bill Paid';
                                            }else if($bill->r_total < $bill->total){
                                                $status = 'Partially Bill Paid';
                                            }else{
                                                $status = 'Unpaid';
                                            }
                                        } else {
                                            // Bilty is not yet used in a bill
                                                $status = 'Not used in bill';
                                        }
                                        $customer_name = '';
                                        if(!empty($builty->customer_id)){
                                            $customer = Db::table('customer')->where('id','=',$builty->customer_id)->first();
                                            $customer_name = $customer->name;
                                        }else{
                                            $customer_name = $builty->sendername;
                                        }
                                    @endphp
                                    <tr>
                                     <td><input class="tester" type="checkbox" value="{{ $builty->bid }}"/></td>
                                     <td>{{ !empty($builty->builty_id) ? $builty->builty_id : '' }}</td>
                                     <td>{{ !empty($builty->computerno) ? $builty->computerno : '' }}</td>

                                     <td>{{!empty($tracking) ? $tracking->status : ''}}</td>
                                      <td><button class="btn btn-xs btn-primary">{{!empty($status) ? $status : ''}}</button></td>

                                     <!-- Conditional to show Walkin or name -->
                                     <td>{{ isset($customer_name) ? $customer_name : '' }}</td>

                                     <td>{{ $builty->receivername }}</td>

                                     <!-- Display default station name "Kohat" if not available -->
                                     <td>{{ $builty->station ?? 'Kohat' }}</td>

                                     <td>{{ $builty->date }}</td>
                                     <td>{{ $builty->Builtytype }}</td>

                                     <!-- Display default quantity "1" if not available -->
                                     <td>{{ $itmes->quantity ?? '1' }}</td>

                                     <td>{{ !empty($builty->local_freight) ? $builty->local_freight : '' }}</td>

                                     <td>
                                        <a title="generate" class="btn btn-secondary" href="{{ route('generate-bilty', ['id' => $builty->bid]) }}">
                                           <i class="fa fa-eye"></i>
                                        </a>
                                        @if($user_meta->builty == 1)
                                            @if($user_meta->edition == 1)
                                                <a title="edit" class="btn btn-secondary" href="{{ route('edit-walkin-builty', ['id' => $builty->bid]) }}">
                                                   <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                            @if($user_meta->deletion == 1)
                                                <a onclick="return confirm('Are you sure you want to delete this builty?');" title="Delete" class="btn btn-secondary" href="{{ route('delete-walkin-builty', ['id' => $builty->bid]) }}">
                                                   <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                        @endif
                                     </td>
                                  </tr>
                               @endforeach


                              </tbody>

                              <tfoot>

                                 <tr>

                                    <th></th>

                                    <th>Builty ID</th>

                                    <th>Customer</th>

                                    <th>Receiver Name</th>

                                    <th>To</th>

                                    <th>Date</th>

                                    <th>Builty Type</th>

                                    <th>Action</th>

                                 </tr>

                              </tfoot>

                           </table>

                           <!--<span style="float:right"> {{ $builties->appends(request()->except('page'))->links() }} </span>-->

                        </div>

                     </div>

                  </div>

                  <!-- END: Input -->

                  <!-- BEGIN: Input Sizing -->

               </div>

            </div>

         </div>

      </div>

   </div>

</div>

</div>

</div>

@endsection

@section('script')


<script>
       $('#bilty_table').DataTable({

            "pageLength":25,

               dom: 'Bfrtip',

                buttons: [

            { extend: 'print', exportOptions:

                { columns: ':visible' }

            },

            // { extend: 'copy', exportOptions:

            //      { columns: [ 0, ':visible' ] }

            // },

            // { extend: 'excel', exportOptions:

            //      { columns: ':visible' }

            // },

            { extend: 'pdf'//, exportOptions:

                //   { columns: [ 0, 1, 2, 3, 4 ,5,6,7,8] }

            }

           ],

             });



    let counter = 2;

    // Function to dynamically add new fields with a Remove button
    $('#add_more').click(function() {
        let newFields = `
            <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${counter}">
                <div class="col-span-4">
                    <label for="buyer_name_${counter}" class="form-label">Name</label>
                    <input id="buyer_name_${counter}" type="text" class="form-control" placeholder="Enter Buyer Name" name="buyer_name[]">
                </div>
                <div class="col-span-4">
                    <label for="buyer_description_${counter}" class="form-label">Description</label>
                    <input id="buyer_description_${counter}" type="text" class="form-control" placeholder="Enter Buyer Description" name="buyer_description[]">
                </div>
                <div class="col-span-4">
                    <label for="buying_rate_${counter}" class="form-label">Amount</label>
                    <input id="buying_rate_${counter}" type="text" class="form-control number-input" placeholder="Enter Buying Amount" name="buying_rate[]">
                </div>
                <div class="col-span-12 text-right mt-2">
                    <button type="button" class="btn btn-danger remove_field" data-id="${counter}">Remove</button>
                </div>
            </div>
        `;

        // Append the new fields to the wrapper div
        $('#expense_fields_wrapper').append(newFields);
        counter++;
    });



    // Function to handle dynamic remove button click
    $(document).on('click', '.remove_field', function() {
        let id = $(this).data('id'); // Get the id from the data-id attribute
        $('#expense_field_' + id).remove(); // Remove the corresponding div
    });
</script>
<script>
    let sellingCounter = 1;

    // Function to dynamically add new selling fields with a Remove button
    $('#add_more_exp_selling').click(function() {
        let newSellingField = `
            <div class="grid grid-cols-12 gap-2 mt-2" id="selling_field_${sellingCounter}">
                <div class="col-span-4">
                    <label for="seller_name_${sellingCounter}" class="form-label">Name</label>
                    <input id="seller_name_${sellingCounter}" type="text" class="form-control" placeholder="Enter Seller Name" name="seller_name[]">
                </div>
                <div class="col-span-4">
                    <label for="seller_description_${sellingCounter}" class="form-label">Description</label>
                    <input id="seller_description_${sellingCounter}" type="text" class="form-control" placeholder="Enter Seller Description" name="seller_description[]">
                </div>
                <div class="col-span-4">
                    <label for="selling_rate_${sellingCounter}" class="form-label">Amount</label>
                    <input id="selling_rate_${sellingCounter}" type="text" class="form-control number-input" placeholder="Enter Selling Amount" name="selling_rate[]">
                </div>
                <div class="col-span-12 text-right mt-2">
                    <button type="button" class="btn btn-danger remove_selling" data-id="${sellingCounter}">Remove</button>
                </div>
            </div>
        `;

        // Append the new selling fields to the wrapper
        $('#expense_selling_fields_wrapper').append(newSellingField);
        sellingCounter++;
    });

    // Function to handle dynamic remove button click for selling fields
    $(document).on('click', '.remove_selling', function() {
        let id = $(this).data('id'); // Get the id from the data-id attribute
        $('#selling_field_' + id).remove(); // Remove the corresponding div
    });
</script>
<script>
    let fileCounter = 1;

    // Function to dynamically add new file upload fields with a Remove button
    $('#add_more_file').click(function() {
        let newFileUpload = `
            <div class="file_upload grid grid-cols-12 gap-2 mt-2" id="file_upload_${fileCounter}">
                <div class="col-span-4 mr-4">
                    <label for="doc_name-${fileCounter}" class="form-label">File Type</label>
                    <input id="doc_name-${fileCounter}" type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]">
                </div>
                <div class="col-span-4 mr-4">
                    <label for="doc_file-${fileCounter}" class="form-label">File</label>
                    <input id="doc_file-${fileCounter}" type="file" class="form-control" name="doc_file[]">
                </div>
                <div class="col-span-2 mt-1">
                    <button type="button" class="btn btn-danger remove_file mt-6" data-id="${fileCounter}">Remove</button>
                </div>
            </div>
        `;

        // Append the new file upload fields to the wrapper
        $('#file_upload_wrapper').append(newFileUpload);
        fileCounter++;
    });

    // Function to handle dynamic remove button click for file fields
    $(document).on('click', '.remove_file', function() {
        let id = $(this).data('id'); // Get the id from the data-id attribute
        $('#file_upload_' + id).remove(); // Remove the corresponding div
    });
</script>

<script>
    $(document).ready(function() {
        // Function to format date to dd-mm-yyyy
        function formatDateToDDMMYYYY(date) {
            const day = ('0' + date.getDate()).slice(-2);  // Get day and ensure 2 digits
            const month = ('0' + (date.getMonth() + 1)).slice(-2); // Get month (0-indexed) and ensure 2 digits
            const year = date.getFullYear();  // Get year
            return `${day}-${month}-${year}`;  // Return in dd-mm-yyyy format
        }

        // Function to calculate new payment date
        function calculatePaymentDate() {
            // Get the builty date in 'dd-mm-yyyy' format
            const builtyDateStr = $('#builty_date').val();
            // Get credit days from input
            const creditDays = parseInt($('#credit_days').val());

            if (!builtyDateStr || isNaN(creditDays)) {
                return;  // Exit if input is invalid
            }

            // Split the builty date into components (day, month, year)
            const [day, month, year] = builtyDateStr.split('-').map(Number);

            // Create a new Date object from the builty date
            const builtyDate = new Date(year, month - 1, day); // month is 0-indexed

            // Add the credit days to the builty date
            builtyDate.setDate(builtyDate.getDate() + creditDays);

            // Format the new payment date to dd-mm-yyyy
            const paymentDate = formatDateToDDMMYYYY(builtyDate);

            // Set the new payment date in an input field (e.g., #payment_date)
            $('#payment_date').val(paymentDate);  // Assuming you have a payment date input field
        }

        // Trigger the payment date calculation when the credit days field changes
        $('#credit_days').on('input', function() {
            calculatePaymentDate();
        });
    });
$(document).ready(function() {
  // Handle tab switching
  $('.nav-link').on('click', function() {
    // Remove btn-primary class from all tabs
    $('.nav-link').removeClass('btn-primary').addClass('btn-default');

    // Add btn-primary class to the selected tab
    $(this).removeClass('btn-default').addClass('btn-primary');
  });

  // Apply the function to specific inputs (for 5 digits limit)
//   $('#job_no').limitNumericInput(5);
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


$("#buying").on('click',function(){
   $("#supplier_charges_div").hide();
});
$("#main").on('click',function(){
   $("#supplier_charges_div").show();
});

   $(function() {

    //   $("#supplier_charges_div").hide();

       $('body').on('click', '.pagination a', function(e) {

          e.preventDefault();



          $('#load a').css('color', '#dfecf6');

          $('#load').append('<img style="position: absolute; left: 50%; top: 40%; z-index: 100000;" src="{{url("/images/loading.gif")}}" />');

          var url = $(this).attr('href');

          getArticles(url);

          window.history.pushState("", "", url);

       });



       function getArticles(url) {

          $.ajax({

              url : url

          }).done(function (data) {



            $('.articles').html(data);

          }).fail(function () {

              alert('Articles could not be loaded.');

          });

       }

     });



     $(document).on('keyup','#search', function(){

    var current_context = $(this).val();

    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

    });



    $.ajax({

      type:'GET',

      url:"{{url('/add-bilty')}}",

      async: false,

      data: {'search':current_context},

      success: function(data){

        $('.articles').html(data);

      }

    });

   });





     $(document ).ready(function() {

            var returnvalue = "<?php echo $subbmitted ?>";



            if(returnvalue != 0){

               $('.customer_type').show();

                             var logo = '{{asset("selfcompany_image")}}/'+returnvalue;

                             $('.logo_div_1').hide();

                             $(".logo_div").html('<label for="regular-form-1" class="form-label">Selected Company</label><img width="100" height="100" src="' + logo + '" />');



            }

        });





          $(document).on("change","input[name='customerTtype']:checked",function(){



                   if($("input[name='customerTtype']:checked").val() == 'Walkin'){

                     $('#lcl_topay').show();

                     $('.AddMoreGoodCalculation').hide();

                    $('.hidetopay').show();

                    $('.div_paid').hide();

                    $('.billed_builty_type').hide();

                    $('.items').show();

                    $('.charges_div').hide();



                    $('.billed_builty_type > select').removeAttr('name');

                    $('.normal_walkin_builty_type > select').attr('name','Builtytype');



                    // $("#supplier_charges_div").hide();



                    // $('.billed_builty_type > select').attr('required');



                //   $('.normal_walkin_builty_type').show();



                    // $('.lcl_amount_status').hide();

                   }else if($("input[name='customerTtype']:checked").val() == 'Normal'){

                        $('.items').show();

                     $('#lcl_topay').show();

                     $('.AddMoreGoodCalculation').hide();

                    $('.hidetopay').show();

                    $('.div_paid').hide();

                    $('.billed_builty_type').hide();

                    $('.charges_div').hide();





                    $('.billed_builty_type > select').removeAttr('name');

                    $('.normal_walkin_builty_type > select').attr('name','Builtytype');



                    // $("#supplier_charges_div").hide();



                    $('.billed_builty_type > select').attr('required');



                   $('.normal_walkin_builty_type').show();



                    $('.lcl_amount_status').hide();

                   }

                   else{

                    // $("#supplier_charges_div").hide();

                    $('.items').hide();

                    $('.charges_div').show();

                    $('.AddMoreGoodCalculation').show();

                    $('.div_paid').hide();

                    $('#lcl_topay').hide();

                    $('.hidetopay').show();

                    $('.billed_builty_type').show();

                    $('.normal_walkin_builty_type').hide();

                    $('.normal_walkin_builty_type > select').removeAttr('name');

                    $('.billed_builty_type > select').attr('name','Builtytype');

                    $('.normal_walkin_builty_type > select').removeAttr('required');

                   $('.lcl_amount_status').hide();

                   }



           });





        $('.selfcompany').on('change',function(){

           var id  = $(this).val();

             if(id != 0){

                     $.ajax({

                        url:"{{ url('selfcompany-data') }}",

                        type:'GET',

                        data:{id:id},

                        success:function(data){

                                 $('.customer_type').show();

                                 var logo = '{{asset("selfcompany_image")}}/'+data.logo;

                                 $('.logo_div_1').hide();

                                 $(".logo_div").html('<label for="regular-form-1" class="form-label">Selected Company</label><img width="100" height="100" src="' + logo + '" />');

                              }

                         });

                     }

                });





        $(".walkinCustmer").on("change", function(e){



              $.ajax({

                 url:"{{ url('get-customer-station') }}",

                 type:'GET',

                 data:{'type':'walkin'},

                 success:function(data){



                   $('.sender').val($('.walkinCustmer').val());

                    $('.from').html('');

                    $.each(data.station_form, function (i, item) {

                        if(item.name == 'Karachi'){

                        $('.from').append($('<option>', {

                            value: item.id,

                            text : item.name

                           }));

                         }



                       });



                        $('.package_id').html('');



                        $('.package_id').append($('<option>', {

                            value: '',

                            text : 'Select Package'

                           }));



                       $.each(data.packages, function (i, item) {

                        $('.package_id').append($('<option>', {

                            value: item.id,

                            text : item.packagename

                           }));

                       });



                        $('.to').html('');

                       $.each(data.station_to, function (i, item) {

                        $('.to').append($('<option>', {

                            value: item.id,

                            text : item.name

                           }));

                       });



                    }



                });

        });



        $(".normalcustomerdropdown").on("change", function(e){

             var customer_id = $(this).val();



              $.ajax({

                 url:"{{ url('get-customer-station') }}",

                 type:'GET',

                 data:{'type':'normal',customer_id:customer_id},

                 success:function(data){



                   $('.sender').val($('.normalcustomerdropdown').find('option:selected').text());

                     $('.from').html('');

                    $.each(data.station_form, function (i, item) {

                        $('.from').append($('<option>', {

                            value: item.id,

                            text : item.name

                           }));

                       });



                        $('.package_id').html('');



                        $('.package_id').append($('<option>', {

                            value: '',

                            text : 'Select Package'

                           }));



                       $.each(data.packages, function (i, item) {

                        $('.package_id').append($('<option>', {

                           value: item.package_id,

                            text : item.packagename

                           }));

                       });



                        $('.to').html('');

                       $.each(data.station_to, function (i, item) {

                        $('.to').append($('<option>', {

                            value: item.id,

                            text : item.name

                           }));

                       });



                    }



                });

        });





        $(".customerbilled").on("change", function(e){




             var customer_id = $(this).val();

              $.ajax({

                 url:"{{ url('get-customer-station') }}",

                 type:'GET',

                 data:{customer_id:customer_id},

                 success:function(data){



                   $('.sender').val(data.customer_name);

                      $('.from').html('');

                    $.each(data.station_form, function (i, item) {

                        $('.from').append($('<option>', {

                            value: item.id,

                            text : item.name

                           }));

                       });



                       $('.package_id').html('');

                       $('.package_id').append($('<option>', {

                            value: '',

                            text : 'Select Package'

                           }));



                       $.each(data.packages, function (i, item) {

                        $('.package_id').append($('<option>', {

                            value: item.package_id,

                            text : item.packagename

                           }));

                       });



                       $('.to').html('');

                       $.each(data.station_to, function (i, item) {

                        $('.to').append($('<option>', {

                            value: item.id,

                            text : item.name

                           }));

                       });

                      $('.description').val($('.package_id').find('option:selected').text());

                    }



                });

        });







        $("input[name=senderphone]").on("keypress", function(e){

             var myval = $(this).val();



             if(myval.length > 10) {

                  alert("Value must contain 11 characters.");

                  $(this).focus();

                  e.preventDefault();

             }

        });



        $("input[name=receiverphone]").on("keypress", function(e){

             var myval = $(this).val();



             if(myval.length > 10) {

                  alert("Value must contain 11 characters.");

                  $(this).focus();

                  e.preventDefault();

             }

        });



         $(document).on('change','.to', function(){

            if($('.package_id').val != '' && $('.from').val != '' && $('.to').val != ''){



                 $.ajax({

                 url:"{{ url('get-station-rate') }}",

                 type:'GET',

                 data:{station_from:$(".from").val(),station_to:$(".to").val(),sender_id:$(".customerbilled").val(),package_id:$(".package_id").val()},

                 success:function(data){

                    console.log(data);

                 }

                });

              }



            });



        $('#small').keyup(function(){



            var small=$('#small').val();

            var large=$('#large').val();



            if(small == '' && large != ''){

              $('#qty').val(large);

            }else if(small != '' && large == ''){

              $('#qty').val(small);

            }else if(small != '' && large != ''){

              $('#qty').val(parseInt(small) + parseInt(large));

            }

          });



             $('#sendernm').keyup(function() {

               var cslang = $('#sendernm').val();

                $( ".sendernamed" ).val(cslang);

            });



            $('#rcphone').keyup(function() {

           var cslang = $('#rcphone').val();

            $( ".rcphone" ).val(cslang);

            });



            $('input[name="senderphone"]').keyup(function() {

           var cslang = $('input[name="senderphone"]').val();

            $( ".senderphoned" ).val(cslang);

            });



            $('#rcname').keyup(function() {

           var cslang = $('#rcname').val();

            $( ".rcname" ).val(cslang);

            });



            $('input[name="quants"]').keyup(function() {

           var cslang = $('input[name="quants"]').val();

            $( ".quants" ).val(cslang);

            });



            $(".packages").change(function() {

                var cslang = $('input[name="packages"]:checked').val();

                $('.boras').val(cslang);

            });









            $('input[name="weights"]').keyup(function() {

           var cslang = $('input[name="weights"]').val();

            $( ".weights" ).val(cslang);

            });



        $('.deliverymode').change(function() {

            if($(this).val() == "Door To Door"){

                $("#supplier_charges_div").show();

            }else{

                $("#supplier_charges_div").hide();

            }

        });

         $(".languages").change(function() {

            var cslang = $('input[name="Language"]:checked').val();

            $('.langua').val(cslang);

         });



         $(".dt_type").change(function() {

            var cslang = $('input[name="deliverymode"]:checked').val();

            $('.doortodoor').val(cslang);

         });



         $(".ctpe").change(function() {

            var cslang = $('input[name="customerTtype"]:checked').val();

            $('.bccustomer').val(cslang);

         });



         $(".bt_type").change(function() {

            var cslang = $('input[name="Builtytype"]:checked').val();

            $('.bts').val(cslang);

         });





          $('#large').keyup(function(){



            var small=$('#small').val();

            var large=$('#large').val();



            if(small == '' && large != ''){

              $('#qty').val(large);

            }else if(small != '' && large == ''){

              $('#qty').val(small);

            }else if(small != '' && large != ''){

              $('#qty').val(parseInt(small) + parseInt(large));

            }else{

              $('#qty').val('');

            }

          });





          $(document).on("change","input[name='builty_type']:checked",function(){

               if($(this).val() == 'lcl'){

                   if($("input[name='customerTtype']:checked").val() == 'Walkin'){

                      $('.lcl_amount').show();

                   }else{

                       $('.lcl_amount').hide();

                   }

                 $('.fcl_div').show();

                 $('.lcl_div').hide();



              }else if($(this).val() == 'fcl'){

                 $('.lcl_div').show();

                 $('.fcl_div').hide();

              }

           });



           $(document).on('change','.builtyType',function(){

              if($(this).val() == 'Paid'){

                 // $('.div_paid').show();

              }else{

                //  $('.div_paid').hide();

              }

           });



           //$('.show_fields').hide();

          $(document).on("change","input[type='radio']",function(){



              var radioValue = $("input[name='customerTtype']:checked").val();



              if(radioValue == 'Walkin'){


                 document.getElementById("walkin_customer_div").style.display = "block";

                 document.getElementById("Billed_customer_div").style.display = "none";

              }

              else if(radioValue == 'Billed'){

                 document.getElementById("walkin_customer_div").style.display = "none";

                 document.getElementById("Billed_customer_div").style.display = "block";

              }



                $('.show_fields').show();



          });





</script>

<script>

   $(document).ready(function() { var max_fields = 10; var y = 1; var x = 1; var wrapper = $(".GoodCalculation"); var add_button = $(".AddMoreGoodCalculation"); var x = 1; $(add_button).click(function(e){



     if($('.customerbilled').val()){

         var customer_id = $('.customerbilled').val();

         var type = 'billed';

     }else if($('.normalcustomerdropdown').val()){

         var customer_id = $('.normalcustomerdropdown').val();

         var type = 'normal';



     }else{

     var customer_id = 0;

         var type = 'normal';

     }



       e.preventDefault(); $(wrapper).append('<div class="remove_here'+x+' grid grid-cols-12 gap-2 mt-2 positon-relative "><div class=" col-span-2" ><label for="regular-form-1" class="form-label">Packages</label>   <select name="package_id[]" id="regular-form-1" data-id="'+y+'" class="changepackage package_id'+y+' form-select sm:mr-2" aria-label="Default select example"></select></div>  <div class="col-span-2"> <label for="regular-form-1" class="form-label">Desc</label><input  type="text" placeholder="Enter description" class="desc'+y+' form-control"  name="desc[]"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">QTY</label><input  type="text" placeholder="QTY" class="form-control"  name="quantity[]"></div><div class="col-span-2 lcl_amount_status" data-id="'+x+'" style="display:none"><label for="regular-form-1" class="form-label">Amount</label><input  type="text" placeholder="Amount" class="form-control"  name="Amount[]"></div><div class="hidetopay col-span-2" style="display: none"><label for="regular-form-1" class="form-label">Supplier</label><select name="supplier_type" data-id="'+x+'" class="drop suplier_feild'+x+' form-select sm:mr-2" aria-label="Default select example"><option value="">Select option</option><option value="per_carton">Per Carton</option><option value="lump_sum">Lump Sum</option></select></div><div class="lumbsum'+x+' col-span-2" style="display:none"><label for="regular-form-1" class="form-label">Lump sum Amount</label><input  type="text" placeholder="Lumb Sum Amount" class="form-control"  name="lumpsum[]"></div><div class="perCarton'+x+' col-span-2" style="display:none"><label for="regular-form-1" class="form-label">Per Carton Rate </label><input  type="text" placeholder="Per Carton Amount" class="form-control"  name="carton[]"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">Weight</label><input  type="text" placeholder="Enter Weight" class="form-control" name="weight"> </div><div class="col-span-1 charges_div"><label for="regular-form-1" class="form-label">Charges</label><select name="charges[]" data-id="0" class="charges form-select sm:mr-2" aria-label="Default select example"><option value="">Select option</option><option value="per_quantity">Per Quantity</option><option value="per_weight">Per Weight</option></select></div><div class="col-span-1"> <button type="button" class="remove_builty btn btn-danger" data-id='+x+' >Remove</button> </div></div></div>');   x++;



     var f = y;

       $.ajax({

      url:"{{ url('get-customer-station') }}",

      type:'GET',

      data:{customer_id:customer_id,type:type},

      success:function(data){



        $('.sender').val(data.customer_name);



            $('.package_id'+f).html('');



            $('.package_id'+f).append($('<option>', {

                            value: '',

                            text : 'Select Package'

                           }));



            $.each(data.packages, function (i, item) {

             $('.package_id'+f).append($('<option>', {

                 value: item.package_id,

                 text : item.packagename

                }));

            });

         }



     });

       y++;

   });



   });





    $(document).on('click',".remove_builty", function(e) {

            e.preventDefault();



            $('.remove_here'+$(this).attr('data-id')+'').remove();



        });



   $(document).on('change','.drop',function() {

     var id = $(this).attr('data-id');



     var val = $(this).val();



     if(val == 'per_carton'){

         $(".lumbsum"+id).hide();

         $(".perCarton"+id).show();

     }



     if(val == 'lump_sum'){

         $(".lumbsum"+id).show();

         $(".perCarton"+id).hide();

     }



   });





   $(document).on('change','.charges',function() {

        var charges  = $(this).val();



        if(charges == 'per_quantity'){



                var a,b,c,d,e,f ;



               f = $('.qty').val();

               a=Number(document.getElementById("freight").value);

               b=Number(document.getElementById("labour").value);

               c=Number(document.getElementById("localfreight").value)

               d=Number(document.getElementById("other").value)

               e =  (a * f) + b + c +d ;



               document.getElementById("totaltopay").value= e;







        }else if(charges == 'per_weight'){

                var a,b,c,d,e,f ;

               f = $('.weight').val();

               a=Number(document.getElementById("freight").value);

               b=Number(document.getElementById("labour").value);

               c=Number(document.getElementById("localfreight").value)

               d=Number(document.getElementById("other").value)

               e =  (a * f) + b + c +d ;



               document.getElementById("totaltopay").value= e;

        }

   });



</script>

<script>

function calc() {

    return true;

}

   /*function calc() {

   var a,b,c,d,e,f ;



   a=Number(document.getElementById("totaltopay").value);

   b=Number(document.getElementById("labour").value);

   c=Number(document.getElementById("localfreight").value)

   d=Number(document.getElementById("other").value)

   e =  a  + b + c + d ;



   document.getElementById("totaltopay").value= e;



   }*/



     var print_multiple_invoice_arrays = [];

   function print_multiple_invoice_redirect(){

   var sList = "";

   $('.tester').each(function () {

   if (this.checked) {

       id = $(this).val();

      print_multiple_invoice_arrays.push(id)

   }

   });

       window.open("print_multiple_invoice/"+JSON.stringify(print_multiple_invoice_arrays),'_self');

    }



    $(document).on('change','.package_id ',function(){

          if($("input[name='customerTtype']:checked").val() == 'Billed'){

                $('.description').val($(this).find('option:selected').text());

          }



    });



    $(document).on('change','.package_id ',function(){



         var pack_id = $(this).find('option:selected').val();



         if($("input[name='customerTtype']:checked").val() == 'Billed'){

            var cust_id =  $(".customerbilled").find('option:selected').val();

            $("#supplier_charges_div").show();

        }else{

           var cust_id =  $(".normalcustomerdropdown").find('option:selected').val();

           $("#supplier_charges_div").hide();

        }

         var from = $(".from").val();

         var to = $(".to").val();

         $.ajax({

               url:"{{ url('get-station-rate') }}",

               type:'GET',

               data:{

                     station_from:from,

                     station_to:to,

                     sender_id:cust_id,

                     package_id:pack_id

                  },



               success:function(data){

                  $('#freight').val(data.rate);

               }

              });







          if($("input[name='customerTtype']:checked").val() == 'Billed'){

                $('.description').val($(this).find('option:selected').text());

          }



    });



    $(document).on('change','.changepackage',function(){

        var id = $(this).attr('data-id');

        if($("input[name='customerTtype']:checked").val() == 'Billed'){

            $('.desc'+id).val($(this).find('option:selected').text());

            $("#supplier_charges_div").show();

        }else{

            $("#supplier_charges_div").hide();

        }

    });



    $('.addBilty').click(function(){

        var builty_no = $('.builty_no').val();



        $.ajax({

                 url:"{{ url('check-builty-no') }}",

                 type:'POST',

                 data:{_token: '{{csrf_token()}}',builty_no:builty_no},

                 success:function(data){

                    if(data){

                       alert('already exist');

                    }else{

                        $('form#myForm').submit();

                    }

                 }

                });

    });

function fetchJobInquiryData() {
    var selectElement = document.getElementById('jobInquirySelect');
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    var id = selectedOption.value;      // Get selected ID
    var code = selectedOption.getAttribute('data-code');  // Get selected code

    // Check if a valid option is selected
    if (id && code) {
        $.ajax({
            url: '/get-job-inquiry',  // Your route for fetching job inquiry data
            type: 'POST',
            data: {
                id: id,
                code: code,
                _token: '{{ csrf_token() }}' // CSRF token for Laravel
            },
            success: function(response) {
                var jobInquiryData = response.data;
                console.log(jobInquiryData);
                    // Update the customer_field input with data from the response
                    console.log(jobInquiryData.cutomer_type);
                    if (jobInquiryData.cutomer_type == "Billed") {
                        console.log('billed');
                        // If customerTtype is "billed", check the "Billed" radio button
                        $('#radio-switch-3').prop('checked', true);
                        // Show the #Billed_customer_div and .billed_builty_type
                        $('#Billed_customer_div').show();
                        $('.billed_builty_type').show();
                        $('#walkin_customer_div').hide();
                    } else if (jobInquiryData.cutomer_type == "Walkin") {
                        // If customerTtype is "walkin", check the "Walkin" radio button
                        $('#radio-switch-1').prop('checked', true);
                    }




                    var customerValue = jobInquiryData.customer;
                    // Check if the field is empty
                    if (customerValue === "" || customerValue == null) {
                        customerValue = jobInquiryData.customer_id;
                        toastr.success('Customer in under billed tab!!');
                        $('.customerbilled').val(jobInquiryData.customer_id);

                    } else {
                        // Show toastr success message
                        $('#customer_field').val(jobInquiryData.customer);
                    }
                    $('#builty_type').val(jobInquiryData.builty_type);
                     // Function to format date to dd-mm-yyyy
                    function formatDateToDDMMYYYY(dateString) {
                        const date = new Date(dateString); // Convert the date string to a Date object
                        const day = ('0' + date.getDate()).slice(-2);  // Get the day and format to 2 digits
                        const month = ('0' + (date.getMonth() + 1)).slice(-2); // Get the month and format to 2 digits (months are zero-indexed)
                        const year = date.getFullYear(); // Get the year
                        return `${day}-${month}-${year}`; // Return in dd-mm-yyyy format
                    }

                    // Get the date from the database (assuming it's in 'yyyy-mm-dd' format)
                    const dbDate = jobInquiryData.date;  // Example date from the database (replace this with `jobInquiryData.date`)

                    // Format the date to dd-mm-yyyy
                    const formattedDate = formatDateToDDMMYYYY(dbDate);
                    console.log(formattedDate);
                    // Set the formatted date into the input field
                    $('#builty_date').val(formattedDate);

                    $('#job_no_no').val(response.job_no);
                    // console.log(response);
                    $('#language').val(jobInquiryData.Language);
                    $('#sender_name').val(jobInquiryData.sendername);
                    $('#sender_phone').val(jobInquiryData.senderphone);
                    $('#receiver_name').val(jobInquiryData.receivername);
                    $('#reciever_phone').val(jobInquiryData.receiverphone);
                    $('#type_of_goods').val(jobInquiryData.type_of_good);
                    // $('#type_of_goods').val(jobInquiryData.type_of_good);
                    $('#supplier_charges').val(jobInquiryData.supplier_charges);
                    $('#local_vehicle_no').val(jobInquiryData.local_vehicle_no);
                    $('#local_mobile_no').val(jobInquiryData.local_mobile_no);
                    $('#deliveryaddress').val(jobInquiryData.deliveryaddress);
                    $('#weight').val(jobInquiryData.weight);
                    $('#languge').val(jobInquiryData.Language);
                    $('#from_station').val(jobInquiryData.from);
                    $('#to_station').val(jobInquiryData.to);
                    $('#note').val(jobInquiryData.note);
                    $('#customer_field').val(jobInquiryData.customer);
                    $('#manager_id').val(response.manager.id);
                    $('#manager_name').val(response.manager.fullName);

                    $('#packages').val(jobInquiryData.package_id);
                    $('#customer_field').val(jobInquiryData.customer);

                    // Check checkboxes based on data from the database
                    if (jobInquiryData.bl_number) {
                        $('#bl-number').prop('checked', true).trigger('change');
                        // Set the value for the input field
                        $('.bl-number-input').val(jobInquiryData.bl_number);
                    }
                    if (jobInquiryData.container_number) {
                        $('#container-number').prop('checked', true).trigger('change');
                        $('.container-number-input').val(jobInquiryData.container_number);
                    }
                    if (jobInquiryData.lc_number) {
                        $('#lc-number').prop('checked', true).trigger('change');
                        $('.lc-number-input').val(jobInquiryData.lc_number);
                    }
                    if (jobInquiryData.seal_number) {
                        $('#seal-number').prop('checked', true).trigger('change');
                         $('.seal-number-input').val(jobInquiryData.seal_number);
                    }

                    // Show toastr success message
                    toastr.success('Data Loaded...!');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error:', error);
            }
        });
    } else {
        console.error('Invalid selection');
    }
}

function createInputField(labelName) {
    var inputId = labelName.toLowerCase().replace(/\s+/g, '_') + '-input'; // Create a unique input ID
    var newInputDiv = `
        <div id="${inputId}" class="input-container col-span-4 mr-4">
            <label class="form-label">${labelName}</label>
            <input type="text" placeholder="${labelName}" class="form-control ${inputId}" name="${labelName.toLowerCase().replace(/\s+/g, '_')}">
        </div>`;

    // Append the new input field to the container
    $('#dynamic-inputs').append(newInputDiv);
}

</script>

@endsection