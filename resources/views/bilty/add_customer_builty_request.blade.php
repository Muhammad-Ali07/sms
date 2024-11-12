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

   .lcl_amount,.lcl_div,.fcl_div,.show_fields,.div_paid,.customer_type{

   display:none;

   }

   li.page-item {

   padding: 17px;

   font-size: 21px;

   }

</style>

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
          <?php if(auth()->user()->role_id==2){?>     

               <div class="intro-y box">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        Customer Builty Requests

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

                        <div class="viewchange">

                           <label class="switcher" title="Wizard View">

                              <input type="checkbox" id="switcher" />

                              <!--<input type="checkbox">-->

                              <span class="slider_new"></span>

                           </label>

                        </div>
                  
                      

                        <form id="myForm" method="post" action="{{route('add-customer-bilty-request-process')}}" onkeydown="return event.key != 'Enter';">

                           @csrf

                           <div class="classic open_classic">

                              <div class="mt-2" style="margin-bottom:10px">

                                 <div class="flex flex-col sm:flex-row mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 mb-2">

                                       <input type="hidden" name="selfcompany" value="{{session('company')[0]->id}}" />

                                       <div class="logo_div col-span-6">

                                          <label for="regular-form-1" class="form-label">Selected Company</label><img width="100" height="100" src="{{asset('selfcompany_image/'.session('company')[0]->logo)}}" />

                                       </div>

                                       <div class="col-span-6" style='margin:0px 0px 0px 30px;padding '>

                                          <label class="radio-switch-1">Customer Type</label> <br/><br/>

                                          <?php if($customer_builty_type=='To Pay'){?>

                                          <input id="radio-switch-2" class="Normal form-check-input" type="radio" name="customerTtype" value="Normal">

                                          <label class="Normal form-check-label" for="radio-switch-2">Normal</label>

                                          <?php } else if($customer_builty_type=='Billed') {?>

                                          <input id="radio-switch-3" class="Billed form-check-input" type="radio" name="customerTtype" value="Billed">

                                          <label class="form-check-label" for="radio-switch-3">Billed</label>

                                          <?php } ?>

                                       </div>

                                    </div>

                                 </div>

                              </div>

                              <div class="grid grid-cols-12 gap-2 mt-2 mb-2">

                                 <div id="normal_customer_div" class="normal_customer_div col-span-4" style='display:none'>

                                    <label for="regular-form-1" class="form-label"> Normal Customer </label>

                                    <select  id="regular-form-1" class="normalcustomerdropdown form-select sm:mr-2" aria-label="Default select example"  name="normalcustomer">

                                    <option value=""">Select Customer</option>
                                    
                                    <option value="<?php echo $tbl->id;?>"><?php echo $tbl->name;?></option>

                                      

                                    </select>

                                 </div>

                                 <div id="Billed_customer_div" class="Billed_customer_div col-span-4" style='display:none'>

                                    <label for="regular-form-22" class="form-label">Billed Customer</label>

                                    <select  id="regular-form-1" class="customerbilled form-select sm:mr-2" aria-label="Default select example" name="customerbilled">

                                    <option value=""">Select Customer</option>

                                    <option value="<?php echo $tbl->id;?>"><?php echo $tbl->name;?></option>

                                      

                                    </select>

                                 </div>

                                 <div id="walkin_customer_div" class="walkin_customer_div col-span-4" style='display:none'>

                                    <label for="regular-form-22" class="form-label">Customer Name</label>

                                    <input id="regular-form-22" type="text" class="walkinCustmer form-control" name="customer">

                                 </div>

                                 <div class="show_fields col-span-4">

                                    <label for="regular-form-2" class="form-label">Computer No</label>

                                    <?php

                                    $countBuilty = DB::table('now_builty')->where('customer',auth()->user()->id)->count()+1;

                                    ?>

                                    <input id="regular-form-2" type="text" value="<?=auth()->user()->prefix.'-'//.sprintf('%05d', $countBuilty)?>" readonly class="form-control" placeholder="01" name="computerno">

                                 </div>

                                 <div class="show_fields col-span-4">

                                    <label for="regular-form-2" class="form-label">Builty No</label>

                                    <input id="regular-form-2" type="text" class="builty_no form-control" placeholder="01"  name="builty_id" value="{{ sprintf('%05d', $countBuilty) }}"> <?php //Auth::user()->id.$newupdate?>

                                 </div>

                              </div>

                              <div class="show_fields">

                                 <div class="grid grid-cols-12 gap-2">

                                 

                                    <div class="billed_builty_type col-span-4" style="display:none">

                                       <label for="regular-form-1" class="form-label">Builty Type</label>

                                       <select tabindex="-1" readonly required class="changetopay builtyType form-select sm:mr-2" aria-label="Default select example" name="Builtytype">

                                          <!-- <option value=''> Select Builty Type </option> -->

                                          <!-- <option>Advance</option>

                                             <option>To Pay</option>-->

                                          <option>Paid</option>

                                       </select>

                                    </div>

                                    <div class="normal_walkin_builty_type col-span-4" style="display:none">

                                       <label for="regular-form-1" class="form-label">Builty Type</label>

                                       <select tabindex="-1" required class="changetopay builtyType form-select sm:mr-2" aria-label="Default select example" name="Builtytype">

                                          <!-- <option value=''> Select Builty Type </option> -->

                                          <!--<option>Advance</option>-->

                                          <option>To Pay</option>

                                          <option>Paid</option>

                                       </select>

                                    </div>

                                    <div class="col-span-4">

                                       <label for="regular-form-2" class="form-label">Date</label>

                                       <input  id="regular-form-2" type="date" required class="form-control" id="date" name="date" value="{{date('Y-m-d')}}">

                                    </div>

                                 </div>

                              </div>

                              <div class="show_fields grid grid-cols-12 gap-2 mt-2 positon-relative receiverForm">

                                 <div class="col-span-6">

                                 </div>

                              </div>

                              <div class="show_fields mt-2">

                                 <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                    <div class="col-span-6">

                                       <label for="regular-form-4" class="form-label">Sender Name</label>

                                       <input  id="regular-form-4" required type="text" class="sender form-control" placeholder="Enter Sender Name" name="sendername">

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-4" class="form-label">Sender Phone</label>

                                       <input  id="regular-form-4" type="text" class="form-control" placeholder="Enter Sender Phone" name="senderphone">

                                       <button type="button" class="btn btn-primary mt-5 AddMoreSender"  style="display:none !important">Add More</button>

                                    </div>

                                 </div>

                              </div>

                              <div class="show_fields mt-2">

                                 <div class="grid grid-cols-12 gap-2 mt-2 positon-relative receiverForm">

                                    <div class="col-span-6">

                                       <label for="regular-form-4" class="form-label">Receiver Name</label>

                                       <input  id="regular-form-4" required type="text" class="form-control" placeholder="Enter Receiver Name"   name="receivername">

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-4" class="form-label">Receiver Phone</label>

                                       <input  id="regular-form-4" type="text" class="form-control" placeholder="Enter Receiver Phone" name="receiverphone">

                                       <button class="btn btn-primary mt-5 AddMoreReceiver"  style="display:none !important" type="button">Add More</button>

                                    </div>

                                 </div>

                              </div>

                              <div class="show_fields">

                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">From</label>

                                       <select  id="regular-form-1" class="from form-select sm:mr-2" aria-label="Default select example"  name="from">

                                       </select>

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">To</label>

                                       <select id="regular-form-1" class="to form-select sm:mr-2" aria-label="Default select example" name="to">

                                       </select>

                                    </div>

                                 </div>

                              </div>

                              <div class="show_fields">

                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Document No</label>

                                       <input  type="text" placeholder="Enter Number" class="form-select sm:mr-2" name="refno">

                                    </div>

                                    <div class="col-span-4">

                                       <label for="regular-form-1" class="form-label">Delivery Mode</label>

                                       <select  id="regular-form-1" class="form-select sm:mr-2 deliverymode" aria-label="Default select example"  name="deliverymode">

                                          <option>Good Transport</option>

                                          <option>Door To Door</option>

                                       </select>

                                    </div>

                                    <div class="col-span-2" id="supplier_charges_div">

                                       <label for="regular-form-1" class="form-label">Supplier Charges</label>

                                       <input  type="text" placeholder="Enter Number" class="form-control sm:mr-2" name="supplier_charges">

                                    </div>

                                    

                                 </div>

                              </div>

                              <div class="show_fields">

                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Delivery Address</label>

                                       <input  type="text" placeholder="Enter Delivery Address" class="form-control sm:mr-2" name="deliveryaddress">

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Note</label>

                                       <input  type="text" placeholder="Enter Note" class="form-control sm:mr-2"  name="note">

                                    </div>

                                 </div>

                              </div>

                              <div class="show_fields mt-2">

                                 <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                    <div class="col-span-6">

                                       <label for="regular-form-4" class="form-label">Local Vehicle No </label>

                                       <input  id="regular-form-4" type="text" class="Local Vehicle form-control" placeholder="Enter Local Vehicle Number" name="local_vehicle_no">

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-4" class="form-label">Local Vehicle Mobile No</label>

                                       <input  id="regular-form-4" type="text" class="form-control" placeholder="Enter Local Vehicle Mobile Number" name="local_mobile_no">

                                       <button type="button" class="btn btn-primary mt-5 AddMoreSender"  style="display:none !important">Add More</button>

                                    </div>

                                 </div>

                              </div>

                              <div class="show_fields">

                                 <div class="mt-2 grid grid-cols-12 gap-2 positon-relative-textarea">

                                 </div>

                              </div>

                              <div class="show_fields mt-2 col-span-6">

                                 <label class="form-label">Builty Type</label> <br><br>

                                 <input  id="radio-switch-41" class="builty_type form-check-input" type="radio" name="builty_type" value="lcl">

                                 <label class="form-check-label" for="radio-switch-41" style="font-size:18px">LCL</label>

                                 <input id="radio-switch-42" class="builty_type form-check-input" type="radio" name="builty_type" value="fcl">

                                 <label class="form-check-label" for="radio-switch-42" style="font-size:18px">FCL</label>

                              </div>

                              <div class="fcl_div">

                                   <div class="grid grid-cols-12 gap-2 mt-2 positon-relative">

                                    <div class="col-span-2">

                                       <label for="regular-form-1" class="form-label">Packages</label>

                                       <select name="package_id[]" id="regular-form-1" class="package_id form-select sm:mr-2" aria-label="Default select example">

                                       </select>

                                    </div>

                                    

                                     <div class="items col-span-2">

                                       <label for="regular-form-1" class="form-label">Desc</label>

                                       <select class="items form-control"  name="items[]">

                                           <option value=""> Please Choose </option>

                                           @foreach($descriptons as $descripton)

                                           

                                           <option value="{{$descripton->name}}"> {{$descripton->name}} </option>

                                           

                                           @endforeach

                                       </select>

                                    </div>

                                    

                                    

                                    <div class="col-span-2">

                                       <label for="regular-form-1" class="form-label">Desc</label>

                                       <input required type="text" placeholder="Enter description" class="description form-control"  name="desc[]">

                                    </div>

                                    

                                   

                                    <div class="col-span-1">

                                       <label for="regular-form-1" class="form-label">Quantity</label>

                                       <input required type="text" placeholder="QTY" class="qty form-control"  name="quantity[]">

                                    </div>

                                    <!--<div class="hidetopay col-span-1 lcl_amount_status" style="display:none"><label for="regular-form-1" class="form-label">Amount</label><input  type="text" placeholder="Amount" class="form-control"  name="Amount[]"></div>-->

                                    <div class="hidetopay col-span-2" style="display:none">

                                       <label for="regular-form-1" class="form-label">Supplier</label>

                                       <select name="supplier_type" data-id="1" class="drop suplier_feild1 form-select sm:mr-2" aria-label="Default select example">

                                          <option value=''>Select option</option>

                                          <option value="per_carton">Per Carton</option>

                                          <option value="lump_sum">Lump Sum</option>

                                       </select>

                                    </div>

                                    <div  class="lumbsum1 col-span-2" style="display:none">

                                       <label for="regular-form-1" class="form-label">Lump sum Amount</label>

                                       <input  type="text" placeholder="Lumb Sum Amount" class="form-control"  name="lumpsum[]">

                                    </div>

                                    <div class="perCarton1 col-span-2" style="display:none">

                                       <label for="regular-form-1" class="form-label">Per Carton Rate </label>

                                       <input  type="text" placeholder="Per Carton Amount" class="form-control"  name="carton[]">

                                    </div>

                                    <div class="col-span-1">

                                       <label for="regular-form-1" class="form-label">Weight</label>

                                       <input  type="text" placeholder="Weight" class="weight form-control" name="weight[]">

                                       <button class="btn btn-primary mt-5 AddMoreGoodCalculation" type="button">Add More</button>

                                    </div>

                                    

                                    

                                    <div class="col-span-1 charges_div">

                                           <label for="regular-form-1" class="form-label">Charges</label>

                                           <select name="charges[]" data-id="0" class="charges form-select sm:mr-2" aria-label="Default select example">

                                              <option value=''>Select option</option>

                                              <option value="per_quantity">Per Quantity</option>

                                              <option value="per_weight">Per Weight</option>

                                           </select>

                                        </div>

                                        





                                    <!-- <div  class="lumbsum0 col-span-1" style="display:none">

                                       <label for="regular-form-1" class="form-label">Rate</label>

                                       <input  type="text" placeholder="Per Weight Amount" class="rate0 form-control"  name="lumpsum[]">

                                    </div> -->



                                    <!--<div class="perCarton0 col-span-1" style="display:none">

                                       <label for="regular-form-1" class="form-label">Rate</label>

                                       <input  type="text" placeholder="Rate" class="rate0 form-control"  name="carton[]">

                                    </div>-->



                                    <!--<div class="col-span-1">

                                       <label for="regular-form-1" class="total0 form-label">Total</label>

                                       <input  type="text" placeholder="Total Amount" class="total0 form-control" name="total[]" readonly> 

                                       <button class="btn btn-primary mt-5 AddMoreGoodCalculation" type="button">Add More</button>

                                    </div>-->



                                 </div>

                                 

                                 <div  id="lcl_topay" style="display: none;POSITION: relative;">

                                    

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative">

                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Freight</label>

                                          <input  type="text" onchange="calc()" value="" id="freight" placeholder="Enter Freight" class="form-control"  name="freight">

                                       </div>

                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Labour</label>

                                          <input  type="text" onchange="calc()" value="" id="labour" placeholder="Enter Labour" class="form-control"  name="labour">

                                       </div>

                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Local Freight</label>

                                          <input  type="text" onchange="calc()" value="" id="localfreight" placeholder="Enter Local Freight" class="form-control"  name="localfreight">

                                       </div>

                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Other</label>

                                          <input  type="text" onchange="calc()" value="" id="other" placeholder="Enter Other" class="form-control"  name="other">

                                       </div>

                                       

                                        <div class="col-span-1">

                                           <label for="regular-form-1" class="form-label">Charges</label>

                                           <select data-id="0" class="charges form-select sm:mr-2" aria-label="Default select example">

                                              <option value=''>Select option</option>

                                              <option value="per_quantity">Per Quantity</option>

                                              <option value="per_weight">Per Weight</option>

                                           </select>

                                        </div>

                                    

                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Total</label>

                                          <input  type="text" id="totaltopay" placeholder="Total" class="form-control" readonly=""  name="totaltopay">

                                       </div>

                                    </div>

                                 </div>

                                 

                              </div>

                              <div class="GoodCalculation"></div>

                           </div>

                     </div>

                  </div>

                  <div class="lcl_div">

                  <div class="grid grid-cols-12 gap-2 mt-2 positon-relative">

                  <div class="col-span-3">

                  <label for="regular-form-1" class="form-label">Packages</label>

                  <select name="package_id[]" id="regular-form-1" class="package_id package_idlcl form-select sm:mr-2" aria-label="Default select example">

                  <option value=""> Select option </option>

                  @foreach($lcl_packeges as $lcl_pkg)

                  <option value="{{$lcl_pkg->id}}">{{$lcl_pkg->packagename}}</option>

                  @endforeach

                  </select>

                  </div> 

                  <div class="col-span-3">

                  <label for="regular-form-1" class="form-label">Desc</label>

                  <input  type="text" placeholder="Enter description" class="form-control"  name="desc[]">

                  </div> 

                  <div class="col-span-2">

                  <label for="regular-form-1" class="form-label">Quantity</label>

                  <input  type="text" placeholder="QTY" class="form-control"  name="quantity[]">

                  </div>

                  <div class="col-span-2">

                  <label for="regular-form-1" class="form-label">Weight</label>

                  <input  type="text" placeholder="Enter Weight" class="form-control" name="weight[]" onchange="calc()"> 

                  </div>

                  <div class="col-span-2">

                  <label for="regular-form-1" class="form-label">Amount</label>

                  <input  type="text" placeholder="Enter Amount" class="form-control" name="amount[]" > 

                  </div> 

                  

                  </div>

                  </div>

                  <input type="button" value="Save Billy" class="show_fields addBilty btn btn-primary mt-5">

                  <button class="show_fields btn btn-primary mt-5" id="Reset">Reset</button>

               </div>

               <?php }?> 

               </form>

                  

               

            </div>

         </div>

        

         <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        View Customer Builty Requests

                     </h2>

                    
                     <div id="example_filter" class="dataTables_filter Search_Input p-2"><label>Search:<input type="search" id="search" class="border m-1 p-2" placeholder="" aria-controls="example"></label></div>

                     </div>

                     <div id="input" class="p-5">

                     <div class="preview articles">

                        @include('bilty.customer_builty_request_table_view')

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

   $(function() {

       $("#supplier_charges_div").hide();

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

     

     $("#supplier_charges_div").hide();

     

                    $('.billed_builty_type > select').attr('required');

     

                   $('.normal_walkin_builty_type').show();

                

                    $('.lcl_amount_status').hide();

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

     

     $("#supplier_charges_div").hide();

     

                    $('.billed_builty_type > select').attr('required');

     

                   $('.normal_walkin_builty_type').show();

                

                    $('.lcl_amount_status').hide();

                   }

                   else{

                    $("#supplier_charges_div").hide();

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

                  

                  if(radioValue == 'Walkin'){

                  $('.lcl_amount').show();

                }else{

                    $('.lcl_amount').hide();

                }

                   

                 document.getElementById("walkin_customer_div").style.display = "block";

                 document.getElementById("normal_customer_div").style.display = "none";

                 document.getElementById("Billed_customer_div").style.display = "none";

              }

              else if(radioValue == 'Normal'){

                

                if(radioValue == 'Walkin'){

                   $('.lcl_amount').show();

                }else{

                   $('.lcl_amount').hide();

                }

                

                 document.getElementById("walkin_customer_div").style.display = "none";

                 document.getElementById("normal_customer_div").style.display = "block";

                 document.getElementById("Billed_customer_div").style.display = "none";

              }

              else if(radioValue == 'Billed'){

                  

                  if(radioValue == 'Walkin'){

                      $('.lcl_amount').show();

                }else{

                    $('.lcl_amount').hide();

                }

                

                 document.getElementById("walkin_customer_div").style.display = "none";

                 document.getElementById("normal_customer_div").style.display = "none";

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

      

       e.preventDefault(); $(wrapper).append('<div class="remove_here'+x+' grid grid-cols-12 gap-2 mt-2 positon-relative "><div class=" col-span-2" ><label for="regular-form-1" class="form-label">Packages</label>   <select name="package_id[]" id="regular-form-1" data-id="'+y+'" class="changepackage package_id'+y+' form-select sm:mr-2" aria-label="Default select example"></select></div>  <div class="col-span-2"> <label for="regular-form-1" class="form-label">Desc</label><input  type="text" placeholder="Enter description" class="desc'+y+' form-control"  name="desc[]"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">QTY</label><input  type="text" placeholder="QTY" class="form-control"  name="quantity[]"></div><div class="col-span-2 lcl_amount_status" data-id="'+x+'" style="display:none"><label for="regular-form-1" class="form-label">Amount</label><input  type="text" placeholder="Amount" class="form-control"  name="Amount[]"></div><div class="hidetopay col-span-2" style="display: none"><label for="regular-form-1" class="form-label">Supplier</label><select name="supplier_type" data-id="'+x+'" class="drop suplier_feild'+x+' form-select sm:mr-2" aria-label="Default select example"><option value="">Select option</option><option value="per_carton">Per Carton</option><option value="lump_sum">Lump Sum</option></select></div><div class="lumbsum'+x+' col-span-2" style="display:none"><label for="regular-form-1" class="form-label">Lump sum Amount</label><input  type="text" placeholder="Lumb Sum Amount" class="form-control"  name="lumpsum[]"></div><div class="perCarton'+x+' col-span-2" style="display:none"><label for="regular-form-1" class="form-label">Per Carton Rate </label><input  type="text" placeholder="Per Carton Amount" class="form-control"  name="carton[]"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">Weight</label><input  type="text" placeholder="Enter Weight" class="form-control" name="weight[]"> </div><div class="col-span-1 charges_div"><label for="regular-form-1" class="form-label">Charges</label><select name="charges[]" data-id="0" class="charges form-select sm:mr-2" aria-label="Default select example"><option value="">Select option</option><option value="per_quantity">Per Quantity</option><option value="per_weight">Per Weight</option></select></div><div class="col-span-1"> <button type="button" class="remove_builty btn btn-danger" data-id='+x+' >Remove</button> </div></div></div>');   x++;

   

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

    

</script>

@endsection