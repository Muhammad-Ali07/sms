@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<style>
   .lcl_amount,.lcl_div,.fcl_div,.show_fields,.div_paid{
   display:none;
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
         <div class="intro-y flex items-center mt-12">
            <h2 class="text-lg font-medium mr-auto">
               Builty Form
            </h2>
         </div>
         <form method="post" action="{{route('save-edit-walkin-builty')}}">
            @csrf    
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                           Builty Edit
                           <div class="intro-ul">
                              <!--<ul>-->
                              <!--   <li>Walkin Customer</li>-->
                              <!--</ul>-->
                           </div>
                           <!-- intro-ul close -->
                        </h2>
                     </div>
                     <div id="input" class="p-5">
                        <div class="classic open_classic">
                           <div class="mt-2" style="margin-bottom:10px">
                              <div class="flex flex-col sm:flex-row mt-2">
                                 <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                                    <div class="logo_div col-span-6"><label for="regular-form-1" class="form-label">Selected Company</label>
                                       <img width="100" height="100" src="{{asset('selfcompany_image/'.$select->logo )}}">
                                    </div>
                                   <!-- <div class="customer_type col-span-6">
                                       <label class="radio-switch-1">Customer Type</label> <br><br>
                                       <input id="radio-switch-1" @if($select->cutomer_type == 'Walkin' OR $select->cutomer_type == 'Normal') {{'checked'}} @endif @if($select->cutomer_type != 'Walkin') {{'disabled'}} @endif class="form-check-input" type="radio" name="customerTtype" value="Walkin">
                                       <label class="Walkin form-check-label" for="radio-switch-1">Walkin/Normal</label>
                                       <!--<input id="radio-switch-2" @if($select->cutomer_type == 'Normal') {{'checked'}} @endif @if($select->cutomer_type != 'Normal') {{'disabled'}} @endif class="Normal form-check-input" type="radio" name="customerTtype" value="Normal">
                                          <label class="Normal form-check-label"  for="radio-switch-2">Normal</label>-->
                                      <!-- <input id="radio-switch-3" @if($select->cutomer_type == 'Billed') {{'checked'}} @endif @if($select->cutomer_type != 'Billed') {{'disabled'}} @endif class="Billed form-check-input" type="radio" name="customerTtype" value="Billed">
                                       <label class="form-check-label"  for="radio-switch-3">Billed</label>
                                    </div>-->
                                    
                                    <div class="col-span-6" style='margin:0px 0px 0px 30px;padding '>
                                          <label class="radio-switch-1">Customer Type</label> <br/><br/>
                                          <input  id="radio-switch-1" class="form-check-input" type="radio" name="customerTtype" value="Walkin" @if($select->cutomer_type == 'Walkin') {{'checked'}} @endif >
                                          <label class="Walkin form-check-label" for="radio-switch-1">Walkin</label>
                                          <input id="radio-switch-2" class="Normal form-check-input" type="radio" name="customerTtype" value="Normal" @if($select->cutomer_type == 'Normal') {{'checked'}} @endif>
                                          <label class="Normal form-check-label" for="radio-switch-2">Normal</label>
                                          <input id="radio-switch-3" class="Billed form-check-input" type="radio" name="customerTtype" value="Billed" @if($select->cutomer_type == 'Billed') {{'checked'}} @endif>
                                          <label class="form-check-label" for="radio-switch-3">Billed</label>
                                       </div>
                                       
                                       
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
                           <div id="walkin_customer_div" class="walkin_customer_div col-span-4" style="display: block;">
                              <label for="regular-form-22" class="form-label">Customer Name</label>
                              @if($select->cutomer_type == 'Walkin')
                              <input id="regular-form-22" value="{{$select->customer}}" type="text" class="normalcustomerdropdown form-control" name="customer">
                              @else
                              <?php
                                 $customerName =  DB::table('customer')
                                 ->select('name')
                                 ->where('id',$select->customer)->first();
                                 
                                 ?>
                              <select id="regular-form-1" class="customerbilled form-select sm:mr-2" aria-label="Default select example" name="customerCode">
                              @foreach($all_customers as $all_customer)
                              <option value="{{$all_customer->id}}" @if($select->customer == $all_customer->id) {{'Selected'}} @endif >{{$all_customer->name}}</option>
                              @endforeach
                              </select>
                              <!--<input id="regular-form-22" readonly  value="{{-- $customerName->name --}}" type="text" class="normalcustomer form-control" name="customer">-->
                              <!--<input id="regular-form-22" readonly  value="{{-- $select->customer --}}" type="hidden" class="normalcustomer form-control" name="customerCode">-->
                              @endif  
                              <?php
                                 ?>
                           </div>
                           <div class="show_fields col-span-4" style="display: block;">
                              <label for="regular-form-2" class="form-label">Computer No</label>
                              <input id="regular-form-2" type="text" class="form-control" placeholder="01" readonly value="{{$select->computerno}}"  name="computerno">
                           </div>
                           <div class="show_fields col-span-4" style="display: block;">
                              <label for="regular-form-2" class="form-label">Builty No</label>
                              <input id="regular-form-2" type="text" class="form-control" placeholder="Builty Number" readonly name="builty_no" value="{{$select->builty_id}}">
                              <input type="hidden" name="builtyid" value="{{$id}}">
                           </div>
                        </div>
                        <div class="show_fields" style="display: block;">
                           <div class="grid grid-cols-12 gap-2">
                              <!-- <div class="col-span-4">
                                 <label for="regular-form-1" class="form-label">Language</label>
                                 <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example" name="Language">
                                    <option>Select</option>
                                    <option @if($select->Language == 'English') {{'selected'}} @endif>English</option>
                                    <option @if($select->Language == 'Urdu') {{'selected'}} @endif>Urdu</option>
                                 </select>
                                 </div> -->
                              <div class="col-span-4">
                                 <label for="regular-form-1" class="form-label">Bilty Type</label>
                                 <input type="text"  readonly="" class="builtyType form-select" name="Builtytype" value="{{$select->Builtytype}}" />
                              </div>
                              <div class="col-span-4">
                                 <label for="regular-form-2" class="form-label">Date</label>
                                 <input value="{{date('Y-m-d',strtotime($select->date))}}" id="regular-form-2" type="date" class="form-control" name="date">
                              </div>
                           </div>
                        </div>
                        <div class="show_fields grid grid-cols-12 gap-2 mt-2 positon-relative receiverForm" style="display: block;">
                           <div class="col-span-6">
                           </div>
                        </div>
                        <div class="show_fields mt-2" style="display: block;">
                           <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                              <div class="col-span-6">
                                 <label for="regular-form-4" class="form-label">Sender Name</label>
                                 <input id="regular-form-4" type="text" value="{{$select->sendername}}" class="sendername form-control" placeholder="Enter Sender Name" name="sendername">
                              </div>
                              <div class="col-span-6">
                                 <label for="regular-form-4" class="form-label">Sender Phone</label>
                                 <input id="regular-form-4" type="text" value="{{$select->senderphone}}" class="form-control" placeholder="Enter Sender Phone" name="senderphone">
                                 <button class="btn btn-primary mt-5 AddMoreSender" style="display:none !important">Add More</button>
                              </div>
                           </div>
                        </div>
                        <div class="show_fields mt-2" style="display: block;">
                           <div class="grid grid-cols-12 gap-2 mt-2 positon-relative receiverForm">
                              <div class="col-span-4" style="display:none !important">
                                 <label for="regular-form-1" class="form-label">Receiver</label>
                                 <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example">
                                    <option>Receiver 1</option>
                                    <option>Receiver 2</option>
                                    <option>Receiver 3</option>
                                 </select>
                              </div>
                              <div class="col-span-6">
                                 <label for="regular-form-4" class="form-label">Receiver Name</label>
                                 <input id="regular-form-4" type="text" value="{{$select->receivername}}" class="form-control" placeholder="Enter Receiver Name" name="receivername">
                              </div>
                              <div class="col-span-6">
                                 <label for="regular-form-4" class="form-label">Receiver Phone</label>
                                 <input id="regular-form-4" type="text" value="{{$select->receiverphone}}" class="form-control" placeholder="Enter Receiver Phone" name="receiverphone">
                                 <button class="btn btn-primary mt-5 AddMoreReceiver" style="display:none !important">Add More</button>
                              </div>
                           </div>
                        </div>
                        <div class="show_fields" style="display: block;">
                           <div class="grid grid-cols-12 gap-2 mt-2">
                              <div class="col-span-6">
                                 <label for="regular-form-1" class="form-label">From</label>
                                 <select id="regular-form-1" class="from form-select sm:mr-2" aria-label="Default select example" name="from">    
                                 @if(!empty($stationsFrom))
                                 @foreach($stationsFrom as $stationsF)
                                 <option value="{{$stationsF->id}}" @if($select->from ==$stationsF->id ) {{'selected'}} @endif   >{{$stationsF->name}} </option>
                                 @endforeach
                                 @endif
                                 </select>
                              </div>
                              <div class="col-span-6">
                                 <label for="regular-form-1" class="form-label">To</label>
                                 <select id="regular-form-1" class="to form-select sm:mr-2" aria-label="Default select example" name="to">
                                 @if(!empty($stationsTo))
                                 @foreach($stationsTo as $stationsT)
                                 <option value="{{$stationsT->id}}" @if($select->to ==$stationsT->id ) {{'selected'}} @endif  >{{$stationsT->name}} </option>
                                 @endforeach
                                 @endif
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="show_fields" style="display: block;">
                           <div class="grid grid-cols-12 gap-2 mt-2">
                              <div class="col-span-6">
                                 <label for="regular-form-1" class="form-label">Reference No</label>
                                 <input type="text" value="{{$select->refno}}" placeholder="Enter Number" class="form-select sm:mr-2" name="refno">
                              </div>
                              <div class="col-span-4">
                                 <label for="regular-form-1" class="form-label">Delivery Mode</label>
                                 <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example" name="deliverymode">
                                    <option>Select</option>
                                    <option @if($select->deliverymode == 'Good Transport') {{'selected'}} @endif >Good Transport</option>
                                    <option @if($select->deliverymode == 'Door To Door') {{'selected'}} @endif >Door To Door</option>
                                 </select>
                              </div>
                              <div class="col-span-2" id="supplier_charges_div" {{ $select->cutomer_type == 'Billed' ? 'style=display:block' : 'style=display:none'}}>
                                       <label for="regular-form-1" class="form-label">Supplier Charges</label>
                                       <input  type="text" placeholder="Enter Number" class="form-control sm:mr-2" name="supplier_charges" value="{{$select->supplier_charges}}">
                                    </div>
                           </div>
                        </div>
                        <div class="show_fields" style="display: block;">
                           <div class="grid grid-cols-12 gap-2 mt-2">
                              <div class="col-span-6">
                                 <label for="regular-form-1" class="form-label">Note</label>
                                 <input type="text" value="{{$select->note}}" placeholder="Enter Note" class="form-control sm:mr-2" name="note">
                              </div>
                           </div>
                        </div>
                        @if(!empty($nowbiltyitems) && count($nowbiltyitems) > 0)
                        @dd($nowbiltyitems)
                            @foreach($nowbiltyitems as $rownowbilties)
                                @php
                                    $perweight =  $rownowbilties->rate * $rownowbilties->weight ;
                                    $perqty =  $rownowbilties->rate * $rownowbilties->quantity ;
                                @endphp
                            
                                    @if($select->cutomer_type != 'Walkin')
                                
                                        <div class="fcl_div" style="display: block;">
                                            <div class="grid grid-cols-12 gap-2 mt-2 positon-relative GoodCalculation">
                                              <div class="col-span-3">
                                                 <input type="hidden" value="{{$rownowbilties->itemid}}" name="itmeid[]">
                                                 <label for="regular-form-1" class="form-label">Packages</label>
                                                 <select name="package_id[]" id="regular-form-1" class="package_id form-select sm:mr-2" aria-label="Default select example">
                                                     @if(!empty($packages))
                                                         @foreach($packages as $packagesrow)   
                                                         <option value="{{$packagesrow->package_id}}" @if($packagesrow->package_id == $rownowbilties->package_id) {{'selected'}}  @endif > {{$packagesrow->packagename}} </option>
                                                         @endforeach
                                                     @endif
                                                 </select>
                                              </div>
                                              <div class="col-span-3">
                                                 <label for="regular-form-1" class="form-label">Desc</label>
                                                 <input type="text" value="{{$rownowbilties->brand}}" placeholder="Enter description" class="form-control" name="desc[]">
                                              </div>
                                              <div class="col-span-1">
                                                 <label for="regular-form-1" class="form-label">Quantity</label>
                                                 <input type="text" value="{{$rownowbilties->quantity}}" placeholder="Enter Quantity" class="qty form-control" name="quantity[]">
                                              </div>
                                              <div class="col-span-1">
                                                 <label for="regular-form-1" class="form-label">Weight</label>
                                                 <input type="text" value="{{$rownowbilties->weight}}" placeholder="Enter Weight" class="weight form-control" name="weight[]">
                                              </div>
                                              
                                              <div class="col-span-1">
                                                 <label for="regular-form-1" class="form-label">Rate</label>
                                                 <input type="text" value="{{$rownowbilties->rate}}" placeholder="Enter Weight" class="form-control"  readonly="" name="rate[]">
                                              </div>
                                              <div class="col-span-2">
                                                 <label for="regular-form-1" class="form-label">Charges</label>
                                                 <select data-id="0" name='charges[]' class="charges form-select sm:mr-2" aria-label="Default select example">
                                                    <option value=''>Select option</option>
                                                    <option  value="per_quantity" @if($perqty == $rownowbilties->total) {{'selected'}} @endif>Per Quantity</option>
                                                    <option value="per_weight"  @if($perweight == $rownowbilties->total) {{'selected'}} @endif >Per Weight</option>
                                                 </select>
                                              </div>
                                              <div class="col-span-1">
                                                 <label for="regular-form-1" class="form-label">Rate</label>
                                                 <input type="text" value="{{$rownowbilties->total}}" class="form-control"  readonly="" name="total[]">
                                              </div>
                                            </div>
                                        </div>
                                     @else
                                         <div class="grid grid-cols-12 gap-2 mt-2 positon-relative GoodCalculation">
                                            <div class="col-span-3">
                                             <input type="hidden" value="{{$rownowbilties->itemid}}" name="itmeid[]">
                                             <label for="regular-form-1" class="form-label">Packages</label>
                                             <select name="package_id[]" id="regular-form-1" class="package_id form-select sm:mr-2" aria-label="Default select example">
                                                @if(!empty($packages))
                                                     @foreach($packages as $packagesrow)   
                                                     <option value="{{$packagesrow->package_id}}" @if($packagesrow->package_id == $rownowbilties->package_id) {{'selected'}}  @endif > {{$packagesrow->packagename}} </option>
                                                     @endforeach
                                                @endif
                                             </select>
                                            </div>
                                          <div class="col-span-3">
                                             <label for="regular-form-1" class="form-label">Desc</label>
                                             <input type="text" value="{{$rownowbilties->brand}}" placeholder="Enter description" class="form-control" name="desc[]">
                                          </div>
                                          <div class="col-span-3">
                                             <label for="regular-form-1" class="form-label">Quantity</label>
                                             <input type="text" value="{{$rownowbilties->quantity}}" placeholder="Enter Quantity" class="qty form-control" name="quantity[]">
                                          </div>
                                          <div class="col-span-3">
                                             <label for="regular-form-1" class="form-label">Weight</label>
                                             <input type="text" value="{{$rownowbilties->weight}}" placeholder="Enter Weight" class="weight form-control" name="weight[]">
                                          </div>
                                         </div>
                                   
                                    @endif
                            
                              @endforeach
                        @else
                            No record found!
                        @endif
                         @if($select->cutomer_type == 'Walkin')
                            <div id="lcl_topay" class="grid grid-cols-12 gap-2 mt-2 positon-relative GoodCalculation">
                               <div class="col-span-2">
                                  <label for="regular-form-1" class="form-label">Freight</label>
                                  <input  type="text" onchange="calc()" value="{{$select->freight}}" id="freight" placeholder="Enter Freight" class="form-control"  name="freight">
                               </div>
                               <div class="col-span-2">
                                  <label for="regular-form-1" class="form-label">Labour</label>
                                  <input  type="text" onchange="calc()" value="{{$select->labour}}" id="labour" placeholder="Enter Labour" class="form-control"  name="labour">
                               </div>
                               <div class="col-span-2">
                                  <label for="regular-form-1" class="form-label">Local Freight</label>
                                  <input  type="text" onchange="calc()" value="{{$select->local_freight}}" id="localfreight" placeholder="Enter Local Freight" class="form-control"  name="localfreight">
                               </div>
                               <div class="col-span-2">
                                  <label for="regular-form-1" class="form-label">Other</label>
                                  <input  type="text" onchange="calc()" value="{{$select->other}}" id="other" placeholder="Enter Other" class="form-control"  name="other">
                               </div>
                               
                               <div class="col-span-2">
                                     <label for="regular-form-1" class="form-label">Charges</label>
                                     <select data-id="0" name='charges[]' class="charges form-select sm:mr-2" aria-label="Default select example">
                                        <option value=''>Select option</option>
                                        <option  value="per_quantity" @if($perqty == $rownowbilties->total) {{'selected'}} @endif>Per Quantity</option>
                                        <option value="per_weight"  @if($perweight == $rownowbilties->total) {{'selected'}} @endif >Per Weight</option>
                                     </select>
                                  </div>
                                  
                               <div class="col-span-2">
                                  <label for="regular-form-1" class="form-label">Total</label>
                                  <input  type="text" id="totaltopay" value="{{$select->total}}" placeholder="Total" class="form-control"  name="totaltopay">
                               </div>
                            </div>
                    
                         @endif
                        <input type="submit" value="Save Changes" class="show_fields btn btn-primary mt-5" style="display: inline-block;">
                        <button class="show_fields btn btn-primary mt-5" id="Reset" style="display: inline-block;">Reset</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
</div>
<script>
   $('.normalcustomer').keyup(function(){
       $('.sendername').val($(this).val());
   });
   
   $('#changetopay').on('change',function(){
    
     var id  = $(this).val();
     if(id=='To Pay'){
     $('#lcl_topay').show();
     $('.hidetopay').hide();
     }
     if(id=='Paid'){
     $('#lcl_topay').hide();
     $('.hidetopay').show();
     }
     if(id=='Advance'){
     $('#lcl_topay').hide();
     $('.hidetopay').show();
     }
      });
      
</script>
<script>
   function calc() {
   var a,b,c,d,e ;
   a=Number(document.getElementById("freight").value);
   b=Number(document.getElementById("labour").value);
   c=Number(document.getElementById("localfreight").value)
   d=Number(document.getElementById("other").value)
   e= a + b + c +d ;
   document.getElementById("totaltopay").value= e;
   
   }
   
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
               
                   $('.sendername').val(data.customer_name);
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
        
   
</script>
@endsection