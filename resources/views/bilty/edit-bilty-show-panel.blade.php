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
.popup-overlay {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 70%;
    background-color: rgba(0, 0, 0, 0.9);
}

.popup-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #bbb;
}


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

                     <h2 class="font-medium text-base mr-auto">

                        Edit Builty Form

                        <div class="intro-ul">



                        </div>



                     </h2>

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

                        <form id="myForm" method="post" action="{{route('save-edit-walkin-builty')}}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">

                           @csrf

                            <div class="tab-content" id="myTabContent">
                                <!--main div tab starts here-->
                                <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="home-tab">
                                   <div class="classic open_classic">

                                      <div class="mt-2" style="margin-bottom:10px">

                                         <div class="flex-col sm:flex-row mt-2">

                                            <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                               <input type="hidden" name="selfcompany" value="{{session('company')[0]->id}}" />
                                               <input type="hidden" name="builty_form_id" value="{{$id}}" />

                                            <div class="col-span-6">
                                                <label class="radio-switch-1">Customer Type</label> <br/><br/>

                                                <input
                                                    id="radio-switch-1"
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="customerTtype"
                                                    value="Walkin"
                                                    <?php echo $select->cutomer_type === 'Walkin' ? 'checked' : ''; ?>
                                                >
                                                <label class="Walkin form-check-label" for="radio-switch-1">Walkin</label>

                                                <input
                                                    id="radio-switch-3"
                                                    class="Billed form-check-input"
                                                    type="radio"
                                                    name="customerTtype"
                                                    value="Billed"
                                                    <?php echo $select->cutomer_type === 'Billed' ? 'checked' : ''; ?>
                                                >
                                                <label class="form-check-label" for="radio-switch-3">Billed</label>
                                            </div>

                                                <div class="logo_div col-span-6" style="float: right; text-align: right;">
                                                  <!--<label for="regular-form-1" class="form-label">Selected Company</label>-->
                                                  <img class="float-right" width="100" height="100" src="{{ asset('selfcompany_image/' . session('company')[0]->logo) }}" />
                                                </div>


                                            </div>

                                         </div>

                                      </div>

                                      <div class="grid grid-cols-12 gap-2 mt-2 mb-2">

                                         <div id="Billed_customer_div" class="Billed_customer_div col-span-4" style='display:none'>

                                            <label for="regular-form-22" class="form-label">Billed Customer</label>

                                            <select  id="regular-form-1" disabled class="customerbilled form-select sm:mr-2" aria-label="Default select example">

                                               <option value="">Select Customer</option>
                                               @foreach($billedCustomers as $billedCustomer)

                                               <option value="{{$billedCustomer->id}}" {{ $select->customer_id == $billedCustomer->id ? 'selected' : '' }}> {{$billedCustomer->name}} </option>

                                               @endforeach

                                            </select>
                                            <input type="hidden" name="customerbilled" value="{{$select->customer_id}}" id="customer_id" class="customerbilled">

                                         </div>

                                         <div id="walkin_customer_div" class="walkin_customer_div col-span-4">

                                            <label for="regular-form-22" class="form-label">Customer Name</label>

                                            <input id="regular-form-22" type="text" value="{{$select->customer}}" class="walkinCustmer form-control" name="customer">

                                         </div>
                                         <script>
                                             // Check which radio button is checked on page load
                                                if ($('#radio-switch-3').is(':checked')) {
                                                    $('#Billed_customer_div').show(); // Show Billed Customer div
                                                    $('#walkin_customer_div').hide();  // Hide Walkin Customer div
                                                } else {
                                                    $('#Billed_customer_div').hide();   // Hide Billed Customer div
                                                    $('#walkin_customer_div').show();   // Show Walkin Customer div
                                                }
                                         </script>
                                         <div class="col-span-4">
                                            <label class="radio-switch-1">Job Inquiry</label>
                                            <input id="regular-form-22" type="hidden" value="{{isset($select->job_inquiry_id) ? $select->job_inquiry_id : ''}}" class="walkinCustmer form-control" name="job_inquiry_id">
                                            <input id="regular-form-22" type="text" readonly value="{{isset($select->job_inquiry_code) ? $select->job_inquiry_code : ''}}" class="walkinCustmer form-control" name="job_inquiry_code">
                                            <!--<select class="form-select" aria-label="Default select example" name="job_inquiry_id" id="jobInquirySelect" onchange="fetchJobInquiryData()">-->
                                            <!--    <option selected>Select an option</option>-->
                                            <!--    @foreach($job_inquiries as $ji)-->
                                            <!--        <option value="{{$ji->id}}" data-code="{{$ji->code}}">{{$ji->code}}</option>-->
                                            <!--    @endforeach-->
                                            <!--</select>-->
                                        </div>

                                         <div class="show_fields col-span-4">

                                            <label for="regular-form-2" class="form-label">Builty No</label>

                                            <input id="regular-form-2" type="text" value="{{$select->builty_id}}" readonly class="form-control builty_no" name="builty_no">

                                         </div>



                                      </div>
                                        <!--first row-->

                                      <div class="show_fields">

                                         <div class="grid grid-cols-12 gap-2">

                                            <div class="billed_builty_type col-span-4" style="display:none">

                                               <label for="regular-form-1" class="form-label">Builty Type</label>

                                               <select tabindex="-1" readonly required class="changetopay builtyType form-select sm:mr-2" aria-label="Default select example" name="Builtytype">

                                                   <option value=''> Select Builty Type </option>

                                                   <option value="Advance" {{ $select->Builtytype == 'Advance' ? 'selected' : '' }}>Advance</option>

                                                     <option value="To Pay" {{ $select->Builtytype == 'To Pay' ? 'selected' : '' }}>To Pay</option>-->

                                                  <option value="Paid" {{ $select->Builtytype == 'Paid' ? 'selected' : '' }}>Paid</option>
                                               </select>

                                            </div>

                                            <div class="show_fields col-span-4">

                                            <label for="regular-form-2" class="form-label">Job No</label>

                                            <input  type="text" class="job_id form-control" value="{{$select->computerno}}" readonly name="job_id" value="">

                                         </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-2" class="form-label">Date</label>

                                               <input  id="regular-form-2" type="text" readonly readonly required class="form-control" id="builty_date" name="date" value="{{ isset($select->date) ? $select->date : ''}}">

                                            </div>
                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Language</label>

                                               <select  id="regular-form-1" readonly class="form-select sm:mr-2 language" aria-label="Default select language"  name="language">

                                                  <option value="English" {{ $select->Language == 'English' ? 'selected' : '' }} >English</option>

                                                  <option value="Urdu" {{ $select->Language == 'Urdu' ? 'selected' : '' }} >Urdu</option>

                                               </select>

                                            </div>
                                         </div>

                                      </div>

                                        <!--sender phone name-->
                                      <div class="show_fields mt-2">

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Sender Name</label>

                                               <input  id="regular-form-4" readonly required type="text" class="sender form-control" value="{{$select->sendername}}" placeholder="Enter Sender Name" name="sendername">

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Sender Phone</label>

                                               <input  id="regular-form-4" readonly type="text" class="form-control" value="{{$select->senderphone}}" placeholder="Enter Sender Phone" name="senderphone">

                                               <button type="button" class="btn btn-primary mt-5 AddMoreSender"  style="display:none !important">Add More</button>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Receiver Name</label>

                                               <input  id="regular-form-4" readonly required type="text" class="form-control" value="{{$select->receivername}}" placeholder="Enter Receiver Name"   name="receivername">

                                            </div>


                                         </div>

                                      </div>
                                        <!--Receiver name and phone-->
                                      <div class="show_fields mt-2">

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative receiverForm">

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Receiver Phone</label>

                                               <input  id="regular-form-4" type="text" readonly value="{{$select->receiverphone}}" class="form-control" placeholder="Enter Receiver Phone" name="receiverphone">

                                               <button class="btn btn-primary mt-5 AddMoreReceiver"  style="display:none !important" type="button">Add More</button>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Weight</label>

                                               <input  type="text" placeholder="Weight" readonly class="weight form-control" value="{{$select->weight}}"  name="weight">

                                            </div>

                                            <div class="col-span-4" id="supplier_charges_div" >

                                               <label for="regular-form-1" class="form-label">Supplier Charges</label>

                                               <input  type="text" placeholder="Enter Number" readonly class="form-control sm:mr-2" value="{{$select->supplier_charges}}" name="supplier_charges">

                                            </div>

                                         </div>

                                        <div class="show_fields mt-2">

                                             <div class="grid grid-cols-12 gap-2 mt-2 positon-relative">
                                                 <div class="col-span-4" id="supplier_charges_div" >
                                                   <label for="regular-form-1" class="form-label">Credit Days</label>
                                                   <input  type="text" placeholder="Enter days" readonly id="credit_days" value="{{isset($select->credit_days) ? $select->credit_days : ''}}" class="form-control sm:mr-2" name="credit_days">
                                                </div>
                                                <div class="col-span-4" id="supplier_charges_div" >
                                                   <label for="regular-form-1" class="form-label">Payment Date</label>
                                                   <input type="text" readonly class="form-control"  value="{{isset($select->payment_date) ? $select->payment_date : ''}}" id="payment_date" name="payment_date">
                                                </div>
                                                <div class="col-span-4">
                                                   <label for="regular-form-1" class="form-label">Manager</label>
                                                  <input type="hidden" class="form-control" id="manager_id" value="{{isset($select->manager_id) ? $select->manager_id : ''}}" name="manager_id">
                                                   <input type="text" readonly class="form-control" id="manager_name" name="manager_name" value="{{isset($select->manager_name) ? $select->manager_name : ''}}">
                                                </div>
                                             </div>
                                        </div>
                                      </div>
                                        <!--station from to -->
                                      <div class="show_fields">

                                         <div class="grid grid-cols-12 gap-2 mt-2">

                                            <div class="col-span-6">
                                               <label for="regular-form-1" class="form-label">From</label>
                                               <select  id="regular-form-1" class="from form-select sm:mr-2" readonly aria-label="Default select example"  name="from">
                                                   @if(!empty($stations))
                                                       @foreach($stations as $sf)
                                                            <option value="{{$sf->id}}" {{ $sf->id == $select->from ? 'selected' : '' }} >{{$sf->name}}</option>
                                                        @endforeach
                                                    @endif
                                               </select>

                                            </div>

                                            <div class="col-span-6">

                                               <label for="regular-form-1" class="form-label">To</label>

                                               <select id="regular-form-1" class="to form-select sm:mr-2" readonly aria-label="Default select example" name="to">
                                                    @if(!empty($stations))
                                                        @foreach($stations as $st)
                                                            <option value="{{$st->id}}" {{ $st->id == $select->to ? 'selected' : '' }} >{{$st->name}}</option>
                                                        @endforeach
                                                    @endif
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
                                                        <input type="checkbox" id="bl-number"
                                                        {{ !empty($select->bl_number) ? 'checked' : '' }}
                                                        name="number-type" class="form-checkbox" data-label="B.L Number">
                                                        <label for="bl-number" class="ml-4">B.L Number</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" id="container-number"
                                                            {{ !empty($select->container_number) ? 'checked' : '' }}
                                                        name="number-type" class="form-checkbox" data-label="Container Number">
                                                        <label for="container-number" class="ml-4">Container Number</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox"
                                                            {{ !empty($select->lc_number) ? 'checked' : '' }}
                                                        id="lc-number" name="number-type" class="form-checkbox" data-label="L.C Number">
                                                        <label for="lc-number" class="ml-4">L.C Number</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox"
                                                            {{ !empty($select->seal_number) ? 'checked' : '' }}
                                                        id="seal-number" name="number-type" class="form-checkbox" data-label="Seal Number">
                                                        <label for="seal-number" class="ml-4">Seal Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-12" id="dynamic-inputs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                                                    @if(!empty($select->container_number))
                                                        <div id="container-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">Container Number</label>
                                                            <input type="text" value="{{$select->container_number}}" placeholder="Container Number" class="form-control" name="container_number">
                                                        </div>
                                                    @endif

                                                    @if(!empty($select->bl_number))
                                                        <div id="bl-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">B.L Number</label>
                                                            <input type="text" placeholder="B.L Number" readonly value="{{$select->bl_number}}" class="form-control" name="bl_number">
                                                        </div>
                                                    @endif
                                                    @if(!empty($select->lc_number))
                                                        <div id="lc-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">L.C Number</label>
                                                            <input type="text" placeholder="L.C Number" readonly class="form-control" value="{{$select->lc_number}}" name="lc_number">
                                                        </div>
                                                    @endif
                                                    @if(!empty($select->seal_number))
                                                        <div id="seal-number-input" class="input-container col-span-4 mr-4">
                                                            <label class="form-label">Seal Number</label>
                                                            <input type="text" placeholder="Seal Number" readonly class="form-control" value="{{$select->seal_number}}" name="seal_number">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>



                                      </div>
                                        <!--local vehicle no, mobile no-->
                                      <div class="show_fields mt-2">

                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Vehicle No </label>

                                               <input  id="regular-form-4" type="text" class="Local Vehicle form-control"  readonly value="{{$select->local_vehicle_no}}" placeholder="Enter Vehicle Number" name="local_vehicle_no">

                                            </div>
                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Vehicle Mobile No</label>

                                               <input  id="regular-form-4" type="text" class="form-control" readonly placeholder="Enter Vehicle Mobile Number" value="{{$select->local_mobile_no}}" name="local_mobile_no">

                                               <button type="button" class="btn btn-primary mt-5 AddMoreSender"  style="display:none !important">Add More</button>

                                            </div>
                                            <div class="col-span-4">

                                               <label for="regular-form-4" class="form-label">Type of Goods</label>

                                               <input  id="regular-form-4" type="text" class="form-control" readonly value="{{isset($select->type_of_good) ? $select->type_of_good : ''}}" placeholder="Type of Goods..." name="type_of_goods">

                                            </div>

                                         </div>

                                      </div>
                                      <div class="show_fields mt-2">
                                         <div class="grid grid-cols-12 gap-2 mt-2">
                                            @php
                                                $package_id = isset($select->package_id) ? $select->package_id : 2;

                                            @endphp
                                            <div class="col-span-4">
                                                <label for="regular-form-1" class="form-label">Type of packages</label>
                                                <select id="regular-form-1" class="form-select" readonly aria-label="Default select example" name="package_id">
                                                    @foreach($packages as $p)
                                                        <option  {{  $package_id == $p->package_id ? 'selected' : '' }}  value="{{$p->package_id}}">{{$p->packagename}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-span-4">

                                               <label for="regular-form-1" class="form-label">Note</label>

                                               <input  type="text" placeholder="Enter Note" readonly value="{{isset($select->note) ? $select->note : ''}}" class="form-control sm:mr-2"  name="note">

                                            </div>

                                         </div>
                                      </div>

                                      <div class="show_fields">

                                         <div class="grid grid-cols-12 gap-2 mt-2">


                                            <div class="col-span-12">

                                               <label for="regular-form-1" class="form-label" >Delivery Address</label>

                                               <input  type="text" placeholder="Enter Delivery Address" readonly value="{{$select->deliveryaddress}}" class="form-control sm:mr-2" name="deliveryaddress">

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
                                                    <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Fare Rate" value="{{isset($select->fare_rate) ? $select->fare_rate : ''}}" name="fare_rate">
                                                </div>
                                                <div class="col-span-4">
                                                    <label for="regular-form-1" class="form-label">Commission Broker</label>
                                                    <select id="regular-form-1" class="form-select" aria-label="Default select example" name="broker_id">
                                                        @foreach($brokers as $b)
                                                            <option  value="{{$b->broker_id}}" {{  $select->broker_id == $b->broker_id ? 'selected' : '' }} >{{$b->broker_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--<input type="text" placeholder="Enter Commission" class="form-select" name="commission">-->
                                                </div>
                                                <div class="col-span-4">
                                                    <label for="regular-form-1" class="form-label">Commission Status</label>
                                                    @if(!empty($select->comission_status))
                                                    <select id="regular-form-1" class="form-select" aria-label="Default select example" name="comission_status">
                                                        <option {{  $select->comission_status == 'Paid' ? 'selected' : '' }}  value="Paid">Paid</option>
                                                        <option {{  $select->comission_status == 'Unpaid' ? 'selected' : '' }} value="Unpaid">Unpaid</option>
                                                    </select>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                  <div class="show_fields mt-4 col-span-6">
                                        <label class="form-label">Selling Data</label> <br><br>
                                        <div class="show_fields">
                                            <div class="grid grid-cols-12 gap-2 mt-2">
                                                <div class="col-span-4">
                                                    <label for="regular-form-4" class="form-label">Selling Fare Rate</label>
                                                    <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Sellng Fare Rate" value="{{isset($select->selling_fare_rate) ? $select->selling_fare_rate : ''}}" name="selling_fare_rate">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="show_fields mt-2 col-span-12">
                                        <label class="form-label d-inline-block">Expenses</label>
                                        <button type="button" class="btn btn-primary btn-sm float-right" id="add_more_expense">Add More</button>
                                        <br><br>
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
                                        <div id="expense_fields_wrapper">
                                            @php
                                                $totalPurchase = 0;
                                                $totalSelling = 0;
                                            @endphp
                                            @foreach($combinedExpenses as $ce)
                                                <!--@dump($ce['name']);-->
                                                <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_1">
                                                    <div class="col-span-3">
                                                        <label for="buyer_seller_name_1" class="form-label">Expene Name</label>
                                                        <input id="buyer_seller_name_1" type="text" class="form-control" value="{{isset($ce['name']) ? $ce['name'] : ''}}" placeholder="Expense Name" name="buyer_seller_name[]">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="buyer_seller_description_1" class="form-label">Description</label>
                                                        <input id="buyer_seller_description_1" type="text" class="form-control" value="{{isset($ce['description']) ? $ce['description'] : ''}}" placeholder="Enter Description" name="buyer_seller_description[]">
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="buying_rate_1" class="form-label">Purchase Amount</label>
                                                        <input id="buying_rate_1" type="text" class="form-control buying_rate" value="{{isset($ce['purchase_amount']) ? $ce['purchase_amount'] : ''}}" placeholder="Enter Buying Amount" name="buying_rate[]">
                                                    </div>
                                                    <div class="col-span-3 d-flex align-items-center">
                                                        <label for="selling_rate_1" class="form-label">Selling Amount</label>
                                                        <input id="selling_rate_1" type="text" class="form-control selling_rate" value="{{isset($ce['selling_amount']) ? $ce['selling_amount'] : ''}}" placeholder="Enter Selling Amount"  name="selling_rate[]">
                                                        <!--<button type="button" class="btn btn-danger btn-custom-remove ml-2 remove_field">Remove</button>-->
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Total Section -->
                                        <div class="total-section mt-4">
                                            <h5>Total Purchase Amount: <span id="total_purchase"></span></h5>
                                            <h5>Total Selling Amount: <span id="total_selling"></span></h5>
                                        </div>
                                    </div>


                                    @php
                                        $uploadedFiles = DB::table('now_bilty_uploads')->where('bilty_id', $id)->get();
                                    @endphp

                                    <div class="show_fields mt-4 col-span-6">
                                        <label class="form-label">File Upload</label>
                                        <br><br>
                                        <div class="show_fields">
                                            <div id="file_upload_wrapper">
                                                @foreach($uploadedFiles as $index => $file)
                                                    <div class="file_upload grid grid-cols-12 gap-2 mt-2" id="file_upload_{{ $index }}">
                                                        <input type="hidden" name="file_id[]" value="{{ $file->id }}">
                                                        <div class="col-span-4 mr-4">
                                                            <label for="doc_name-{{ $index }}" class="form-label">File Name</label>
                                                            <input id="doc_name-{{ $index }}" type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]" value="{{ $file->name }}">
                                                        </div>
                                                        <div class="col-span-4 mr-4">
                                                            <label for="doc_file-{{ $index }}" class="form-label">File</label>
                                                            <input id="doc_file-{{ $index }}" type="file" class="form-control" name="doc_file[]">
                                                        </div>
                                                        <div class="col-span-2">
                                                            <!-- Display the uploaded image preview if it's an image -->
                                                            @if(in_array(pathinfo($file->path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                                <!--<img src="{{ asset($file->path) }}" alt="{{ $file->name }}" class="img-thumbnail" style="width: 100px; cursor: pointer;" data-toggle="modal" data-target="#imageModal">-->
                                                                <img src="{{ asset($file->path) }}" alt="Document {{ $file->name }}" class="popup-img" style="width: 100px; cursor: pointer;" id="thumbnail-{{ $index }}">

                                                                <!-- Fullscreen Image Popup -->
                                                                <div id="imageModal-{{ $index }}" class="popup-overlay">
                                                                    <span class="close" id="close-{{ $index }}">&times;</span>
                                                                    <img class="popup-content" id="fullImage-{{ $index }}">
                                                                </div>
                                                            @else
                                                                <a href="{{ asset('uploads/'.$file->path) }}" target="_blank">View File</a>
                                                            @endif
                                                        </div>
                                                        <!--<div class="col-span-2 mt-1">-->
                                                        <!--    <button type="button" class="btn btn-danger" onclick="removeFileField({{ $index }})">Remove</button>-->
                                                        <!--</div>-->
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Add More button for new file uploads -->
                                            <button type="button" class="btn btn-primary AddMoreFile mt-6" id="add_more_file">Add More</button>
                                        </div>
                                    </div>

                                    <!--<div class="show_fields mt-4 col-span-6">-->
                                    <!--    <label class="form-label">File Upload</label> -->
                                    <!--    <br><br>-->
                                    <!--    <div class="show_fields">-->
                                    <!--        <div id="file_upload_wrapper">-->
                                    <!--            <div class="file_upload grid grid-cols-12 gap-2 mt-2" id="file_upload_0">-->
                                    <!--                <div class="col-span-4 mr-4">-->
                                    <!--                    <label for="doc_name-0" class="form-label">File Name</label>-->
                                    <!--                    <input id="doc_name-0" type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-span-4 mr-4">-->
                                    <!--                    <label for="doc_file-0" class="form-label">File</label>-->
                                    <!--                    <input id="doc_file-0" type="file" class="form-control" name="doc_file[]">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-span-2 mt-1">-->
                                    <!--                    <button type="button" class="btn btn-primary AddMoreFile mt-6" id="add_more_file">Add More</button>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>
                                    -->
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
                                                // Function to recalculate both purchase and selling totals
                                                function calculateTotals() {
                                                    let totalPurchase = 0;
                                                    let totalSelling = 0;

                                                    // Loop through each buying_rate input field and calculate total purchase
                                                    $('.buying_rate').each(function() {
                                                        let purchaseAmount = parseFloat($(this).val()) || 0; // Default to 0 if empty
                                                        totalPurchase += purchaseAmount;
                                                    });

                                                    // Loop through each selling_rate input field and calculate total selling
                                                    $('.selling_rate').each(function() {
                                                        let sellingAmount = parseFloat($(this).val()) || 0; // Default to 0 if empty
                                                        totalSelling += sellingAmount;
                                                    });

                                                    // Update the totals in the DOM
                                                    $('#total_purchase').text(totalPurchase.toFixed(2)); // Display total purchase with 2 decimal places
                                                    $('#total_selling').text(totalSelling.toFixed(2));   // Display total selling with 2 decimal places
                                                }

                                                // Calculate totals when the page loads
                                                calculateTotals();

                                                // Event listener for keyup in both purchase and selling amount fields
                                                $(document).on('keyup', '.buying_rate, .selling_rate', function() {
                                                    calculateTotals();
                                                });
                                            });
                                        </script>

<script>
    let counter = 2;

    // Function to dynamically add new fields with a Remove button
    $('#add_more').click(function() {
        let newFields = `
            <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${counter}">
                <div class="col-span-4">
                    <label for="buyer_name_${counter}" class="form-label">Name</label>
                    <input id="buyer_name_${counter}" type="text" class="form-control" placeholder="Enter Buyer Name" name="new_buyer_name[]">
                </div>
                <div class="col-span-4">
                    <label for="buyer_description_${counter}" class="form-label">Description</label>
                    <input id="buyer_description_${counter}" type="text" class="form-control" placeholder="Enter Buyer Description" name="new_buyer_description[]">
                </div>
                <div class="col-span-4">
                    <label for="buying_rate_${counter}" class="form-label">Amount</label>
                    <input id="buying_rate_${counter}" type="text" class="form-control" placeholder="Enter Buying Amount" name="new_buying_rate[]">
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

    var fieldCount = 1;

    // Add more expense fields
        $('#add_more_expense').click(function() {
            fieldCount++;
            var newField = `
                <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${fieldCount}">
                    <div class="col-span-3">
                        <label for="buyer_seller_name_${fieldCount}" class="form-label">Expense Name</label>
                        <input id="buyer_seller_name_${fieldCount}" type="text" class="form-control" placeholder="Expense Name" name="buyer_seller_name[]">
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





    let sellingCounter = 1;

    // Function to dynamically add new selling fields with a Remove button
    $('#add_more_exp_selling').click(function() {
        let newSellingField = `
            <div class="grid grid-cols-12 gap-2 mt-2" id="selling_field_${sellingCounter}">
                <div class="col-span-4">
                    <label for="seller_name_${sellingCounter}" class="form-label">Name</label>
                    <input id="seller_name_${sellingCounter}" type="text" class="form-control" placeholder="Enter Seller Name" name="new_seller_name[]">
                </div>
                <div class="col-span-4">
                    <label for="seller_description_${sellingCounter}" class="form-label">Description</label>
                    <input id="seller_description_${sellingCounter}" type="text" class="form-control" placeholder="Enter Seller Description" name="new_seller_description[]">
                </div>
                <div class="col-span-4">
                    <label for="selling_rate_${sellingCounter}" class="form-label">Amount</label>
                    <input id="selling_rate_${sellingCounter}" type="text" class="form-control" placeholder="Enter Selling Amount" name="new_selling_rate[]">
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
                    <label for="doc_name-${fileCounter}" class="form-label">File Name</label>
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
            $('#payment_date').val('');
            // Set the new payment date in an input field (e.g., #payment_date)
            $('#payment_date').val(paymentDate);  // Assuming you have a payment date input field
        }

        // Trigger the payment date calculation when the credit days field changes
        $('#credit_days').on('input', function() {
            calculatePaymentDate();
        });
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
                    <input type="text" placeholder="${labelName}" class="form-control" name="${labelName.toLowerCase().replace(/\s+/g, '_')}">
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

                    // if(data){

                    //   alert('already exist');

                    // }else{


                    // }
                        $('form#myForm').submit();

                 }

                });

    });


$(document).ready(function() {
    // Loop through each image
    $('img.popup-img').each(function(index) {
        var imageId = '#thumbnail-' + index;
        var modalId = '#imageModal-' + index;
        var fullImageId = '#fullImage-' + index;
        var closeId = '#close-' + index;

        // Open the modal when the thumbnail is clicked
        $(imageId).on('click', function() {
            // Set the source of the modal image to the clicked thumbnail's source
            $(fullImageId).attr('src', $(this).attr('src'));

            // Show the modal
            $(modalId).fadeIn();
        });

        // Close the modal when the close button (x) is clicked
        $(closeId).on('click', function() {
            $(modalId).fadeOut();
        });

        // Close the modal if clicking outside the image
        $(modalId).on('click', function(e) {
            if (e.target == this) {
                $(modalId).fadeOut();
            }
        });
    });
});

</script>

@endsection
