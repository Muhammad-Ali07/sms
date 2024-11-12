@include('includes/header')
@include('datepicker/datepicker')
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
  <div class="pcoded-overlay-box"></div>
  <div class="pcoded-container navbar-wrapper">
<style>
  .add_field_button1_walkin {
    background-color: #029a7a;
    height: 37px;
    border: none;
    font-weight: bold;
  }
</style>
    <!-- include top header -->
    @include('includes/top_header')
    <!-- End include top header -->

    <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
        <!-- include side Bar -->
        @include('includes/side_bar')
        <!-- End include sider Bar -->
        <div class="pcoded-content">

          <!-- include Top Dashboard -->
          @include('includes/top_dashboard')
          <br>
          <div class="container">
            <div class="container-fluid">
              <div class="row">

                <div class="col-sm-12">
                  <!-- Basic Form Inputs card start -->
                  <div class="card">
                    <div class="card-header">
                      <h4>Advance</h4>
                      <div class="text-right">
                        <label class="radio-inline">
                          <input type="checkbox" value="walkin"  name="walkin" class="walkin-check"> Walkin Customer
                        </label>
                      </div>
                    </div>

                    <div class="card-block">

                      @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
          @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
        @if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif

                      <form enctype="multipart/form-data" action="{{ route('createadvancebilty') }}" method="post" class="bg-white post-form-validation topay-normal" id="post-form-validation" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <meta name="csrf-token" content="{{csrf_token()}}">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                         <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Select Language</label>
                          <div class="col-sm-2">
                              <select style="font-size: 11px;" onchange="myFunctionlanguage()"  name="language" id="language" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="eng">English</option>
                                <option value="urd">Urdu</option>
                                </select>
                            </div>
                          </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label" style="margin-top:-5px">Builty Type</label>
                          <div class="col-sm-4">
                            <label class="radio-inline">
                              <input  type="radio" value="ToPay"  name="biltytype" > To Pay
                            </label>
                            <label class="radio-inline">
                              <input type="radio" value="Paid"  name="biltytype" > Paid
                            </label>
                            <label class="radio-inline">
                              <input type="radio" value="advance"  name="biltytype" checked> Advance
                            </label>
                          </div>

                       

                        </div> 

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Computer Number</label>
                          <div class="col-sm-2">
                            <input readonly="true" required type="Number" value={{$id??''}}  id="computer" name="computer"  class="form-control form-control-round" placeholder="Computer No">
                          </div>

                          <label class="col-sm-2 col-form-label">Bilty No</label>
                          <div class="col-sm-2">
                            <input readonly="true" value={{$biltyno??''}}   required type="Number" id="bilty" name="bilty" class="form-control form-control-round" placeholder="Bilty No">
                          </div> 
                          <label class="col-sm-2 col-form-label">Date</label>
                          <div class="col-sm-2">
                            <input value="{{date("d-m-Y")}}"  required type="text" class="form-control form-control-round txtDate"  name="date" readonly="" >
                          </div>     
                        </div> 


                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Sender Name</label>
                          <div class="col-sm-2">
                            <div id="manual_senderd">
                              <select style="font-size: 11px;" onchange="myFunctionsender()"  name="sender_name" id="sender_name" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
                                <option value="">Select Sender Name</option>
                                @foreach($sender as $value)
                                <option value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name}}</option>
                                @endforeach
                               
                              </select>
                            </div>
                            <div id="manual_senderurdu" style="display:none">
                              <select style="font-size: 11px;" onchange="myFunctionsender()"  name="sender_nameurdu" id="sender_name" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
                                <option value="">Select Sender Name</option>
                                @foreach($sendermanual as $value)
                                @if($value->customer_name_urdu!="")
                                <option value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name_urdu}}</option>
                                @endif
                                @endforeach
                               
                              </select>
                            </div>
                            <div id="manual_senderdiv" style="display: none">
                              <input  type="text" id="manual_sender" name="manual_sender" class="form-control form-control-round" placeholder="sender name" disabled="" required="">
                            </div>
                          </div>    

                          <label class="col-sm-2 col-form-label">Sender No</label>
                          <div class="col-sm-2">
                            <div id="manual_sendenod">
                              <select name="sender_no"  id="sender_no" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
                                  
                              </select>
                            </div>
                            <div id="manual_sendenodiv" style="display: none">
                              <input  type="text" id="manual_senderno" name="manual_senderno" class="form-control form-control-round" placeholder="sender no" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" disabled="" required="">
                            </div>
                          </div>


                          <label class="col-sm-2 col-form-label">Karachi To</label>
                          <div class="col-sm-2">

                            <select  required  name="karachi_to" id="karachi_to" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                              <option value="">Select Station Name</option>
                              @foreach($station as $value)
                              <option value="{{$value->id}}" {{!empty(old('karachi_to')) && old('karachi_to')==$value->id?"selected":''}}>{{$value->station_name}}</option>
                              @endforeach

                            </select>
                          </div>  


                        </div> 




                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Receiver Name</label>
                          <div class="col-sm-2">
                            <div id="manual_receiverd">
                              <select style="font-size: 11px;" onchange="myFunctionreceiver()"  name="receiver_name" id="receiver_name" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Receiver Name</option>
                                @foreach($receiver as $value)
                                <option value="{{$value->id}}" {{!empty(old('receiver_name')) && old('receiver_name')==$value->id?"selected":''}}>{{$value->customer_name}}</option>
                                @endforeach
                               
                              </select>
                            </div>
                             <div id="manual_receiverurdu" style="display: none">
                              <select style="font-size: 11px;" onchange="myFunctionreceiver()"  name="receiver_nameurdu" id="receiver_name" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Receiver Name</option>
                                @foreach($receivermanual as $value)
                                @if($value->customer_name_urdu!="")
                                <option value="{{$value->id}}" {{!empty(old('receiver_name')) && old('receiver_name')==$value->id?"selected":''}}>{{$value->customer_name_urdu}}</option>
                                @endif
                                @endforeach
                               
                              </select>
                            </div>
                            <div id="manual_receiverdiv" style="display: none">
                              <input  type="text" id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver name" disabled="" required="">
                            </div>
                          </div>
                          <label class="col-sm-2 col-form-label">Receiver No</label>
                          <div class="col-sm-2">
                            <div id="manual_receivernod">
                              <select  name="receiver_no" id="receiver_no" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                              </select>
                            </div>
                            <div id="manual_receivernodiv" style="display: none">
                              <input  type="text" id="manual_receiver" name="manual_receiverno" class="form-control form-control-round" placeholder="receiver no"  maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                            </div>
                          </div>

                          <label class="col-sm-2 col-form-label">Reference No 1 </label>
                          <div class="col-sm-2">
                            <input   type="Number" id="reference1" name="reference1" class="form-control form-control-round" placeholder="Reference No 2" value="{{ old('reference1') }}">
                          </div>
                        </div> 

                        <div class="form-group row" id="deliveryRow">

                          <label class="col-sm-2 col-form-label">Reference No 2 </label>
                          <div class="col-sm-2">
                            <input   type="Number" id="reference2" name="reference2" class="form-control form-control-round" placeholder="Reference No 2" value="{{ old('reference2') }}">
                          </div>    
                       
                         <label class="col-sm-2 col-form-label">Delivery Mode</label>
                          <div class="col-sm-2">

                            <select onchange="showdeliverybox()"  required  name="delivery_mode" id="deliverydropdown" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                               <option value="good_transport">goodtransport</option>
                               <option value="home_delivery">Home Delivery</option>
                               
                             </select>
                          </div>  
                          <label class="col-sm-2 col-form-label">Delivery Address</label>
                          <div class="col-sm-2">
                            <div id="addressmanual" style="display:none">
                              <textarea name="home_delivery_address" placeholder="Enter Delivery Address" class="form-control-round form-control"></textarea>
                           
                         </div>
                         <div id="addressdynamic" style="display:none">
                           <textarea name="good_transport_address" placeholder="Auto fetch Address" id="stationDeliveryAddress" class="form-control-round form-control"></textarea>
                         </div>
                          </div>  


                         </div>

                         <div class="form-group row">

  
                          <label class="col-sm-2 col-form-label">Note</label>
                          <div class="col-sm-3">
                            <div id="note">
                              <textarea name="note" placeholder="Enter Your Note" class="form-control-round form-control" rows="4" cols="50"></textarea>
                           
                         </div>



                         </div>
                         </div>

                        <div class=" form-group row input_fields_wrap1" style="border:1px solid #dedede">
                          <div class="col-md-12 text-center">
                            <input type="radio" name="calType" value="qty" class="calType" checked="" > By Quantity
                            <input type="radio" name="calType" value="weight" class="calType"> By Weight
                            <input type="radio" name="calType" value="lumpsum" class="calType"> By LumpSum
                          </div>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Quantity</th>
                                  <th>Packing</th>
                                  <th>Goods Description</th>
                                  <th>Brand</th>
                                  <th>Rate</th>
                                  <th>Weight</th>
                                  <th>Actions</th> 
                                </tr>
                              </thead>
                              <tbody class="package">
                                <tr>
                                  <td><input required type="text" id="quantity" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" style="width:110px !important;border-radius:50px;border-radius:50px" data-attr="0"></td>
                                  <td class="packingTd">
                                    <select required style="width:110px" required name="packing[]" id="packing" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary packing" onchange="saveDisable()">
                                      <option value="">Select Package </option>

                                      @foreach($packagemetas as $value)

                                     <option  value="{{$value->id}}" data-description="{{$value->description}}">{{$value->package_name}}</option>


                                      @endforeach

                                    </select>
                                  </td>
                                  <td>
                                        
                                         <select required style="width:110px" required name="good[]" id="good" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary good"  onchange="saveDisable();updateDescRegular($.now());">
                                      <option value="">Select Description </option>

                                      @foreach($packagemetas as $value)


                                          <option  value="{{$value->id}}" data-description="{{$value->description}}">{{$value->package_name}}</option>


                                      @endforeach

                                    </select>
                                    <input  type="text" id="goods" name="goods[]"  class="orm-control goods" style="width:110px !important;border-radius:50px">
                                  </td>
                                  <td><input  type="text" id="brand" name="brand[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
                                  <td><input required type="text" id="rate" name="rate[]"  class="form-control rate" style="width:110px !important;border-radius:50px"></td>
                                  <td><input  type="text" id="weight" name="weight[]"  class="form-control weight" style="width:110px !important;border-radius:50px"></td>
                                  <td ><button style="height: 47px;" class="add_field_button1">Add More </button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Rent</label>
                          <div class="col-sm-2">
                            <input readonly="true" onchange="myamount()" type="hidden" id="rent" name="rent" value="{{ !empty(old('rent'))?old('rent'):0 }}" class="form-control form-control-round" placeholder="Rent" >
                              <!-- This textbox is only for showing above textbox is functional -->
                             <input readonly="true" type="number"  id="rentss" name="rentss"  class="form-control form-control-round" placeholder="xxx " required="">
                          </div>  
                          <label class="col-sm-2 col-form-label">Labour</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="Labour" name="Labour"  class="form-control form-control-round" placeholder="Labour" value="{{ !empty(old('Labour'))?old('Labour'):0 }}">
                          </div>
                          <label class="col-sm-2 col-form-label">TT</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="tt" name="tt" class="form-control form-control-round" placeholder="TT" value="{{ !empty(old('tt'))?old('tt'):0 }}">
                          </div>
                        </div> 

                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Local Charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="local_charges" name="local_charges"  class="form-control form-control-round" placeholder="Local Charges" value="{{ !empty(old('local_charges'))?old('local_charges'):0 }}">
                          </div>
                          <label class="col-sm-2 col-form-label">Lifter Crane charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="lifter" name="lifter" class="form-control form-control-round" placeholder="Lifter Crane charges" value="{{ !empty(old('lifter'))?old('lifter'):0 }}">
                          </div>  
                          <label class="col-sm-2 col-form-label">Home Delivery </label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="home_delivery" name="home_delivery"  class="form-control form-control-round" placeholder="Home Delivery Charges" value="{{ !empty(old('home_delivery'))?old('home_delivery'):0 }}">
                          </div>
                        </div> 


                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Other Charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="other_charges" name="other_charges" class="form-control form-control-round" placeholder="Other Charges" value="{{ !empty(old('other_charges'))?old('other_charges'):0 }}">
                          </div>  
                          <label class="col-sm-2 col-form-label">Total Amount</label>
                          <div class="col-sm-2">
                            <input readonly="true" type="hidden"  id="total_amount" name="total_amount"  class="form-control form-control-round" placeholder="Total Amount " required="">
                               <!-- This textbox is only for showing above textbox is functional -->
                             <input readonly="true" type="number"  id="total_amountss" name="total_amountss"  class="form-control form-control-round" placeholder="xxx " required="">
                            <!-- value="{{ old('total_amount') }}"  -->
                          </div>
                          <label class="col-sm-2 col-form-label">Advance</label>
                          <div class="col-sm-2">
                            <input onchange="myamountadvance()" type="number" id="advance" name="advance" class="form-control form-control-round" placeholder=" Advance" value="{{ old('advance') }}">
                          </div> 
                        </div> 

                        <div class="form-group row"> 
                          <label class="col-sm-2 col-form-label">Balance</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="hidden"  id="balance" name="balance"  class="form-control form-control-round" placeholder="Balance" value="{{ old('balance')??0 }}" required="">
                            <!-- This textbox is only for showing above textbox is functional -->
                             <input readonly="true" type="number"  id="Balancess" name="Balancess"  class="form-control form-control-round" placeholder="xxx " required="">
                            <!-- value="{{ old('total_amount') }}"  -->
                          </div>
                        </div> 

                        <br>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-2">
                            <button type="Reset" style="" class="btns_reset" onclick="window.location.reload()">Reset</button>
                          </div>

                          <!-- <label class="col-sm-2 col-form-label"></label> -->
                          <div class="col-sm-2">
                            <button type="button" id="calculate" class="btns_reset" style="background-color: #029a7a !important;">Calculate</button>
                          </div>

                          <!-- <label class="col-sm-1 col-form-label"></label> -->
                          <div class="col-sm-2">
                            <button type="submit" style="" class="btns_save">Save</button>
                          </div>    

                          <!-- <label class="col-sm-1 col-form-label"></label> -->
                          <div class="col-sm-2">
                            <button type="submit" name="savenprint" value="savenprint" style="" class="btns_save">Save & Print</button>
                          </div>    
                        </div>
                      </form>

                      <form enctype="multipart/form-data" action="{{ route('createadvancebiltywalkin') }}" method="post" class="bg-white post-form-validation topay-walkin" id="post-form-validation" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <meta name="csrf-token" content="{{csrf_token()}}">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label" style="margin-top:-5px">Builty Type</label>
                          <div class="col-sm-4">
                            <label class="radio-inline">
                              <input onclick="getvalue(this)" type="radio" value="ToPay"  name="biltytype" checked> To Pay
                            </label>
                            <label class="radio-inline">
                              <input onclick="getvalue(this)" type="radio" value="Paid"  name="biltytype"> Paid
                            </label>
                            <label class="radio-inline">
                              <input onclick="getvalue(this)" type="radio" value="advance"  name="biltytype"> Advance
                            </label>
                          </div>

                       

                        </div> 

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Computer Number</label>
                          <div class="col-sm-2">
                            <input readonly="true" required type="Number" value={{$id??''}}  id="computer" name="computer"  class="form-control form-control-round" placeholder="Computer No">
                          </div>

                          <label class="col-sm-2 col-form-label">Bilty No</label>
                          <div class="col-sm-2">
                            <input readonly="true" value={{$biltyno??''}}   required type="Number" id="bilty" name="bilty" class="form-control form-control-round" placeholder="Bilty No">
                          </div> 
                          <label class="col-sm-2 col-form-label">Date</label>
                          <div class="col-sm-2">
                            <input value="{{date("d-m-Y")}}"  required type="text" class="form-control form-control-round txtDate"  name="date" readonly="" >
                          </div>     
                        </div> 


                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Sender Name</label>
                          <div class="col-sm-2">
                            <div id="manual_senderdiv">
                              <input type="text" id="manual_sender" name="manual_sender" class="form-control form-control-round" placeholder="sender name" required="">
                            </div>
                          </div>    

                          <label class="col-sm-2 col-form-label">Sender No</label>
                          <div class="col-sm-2">
                            <div id="manual_sendenodiv">
                              <input  type="text" id="manual_senderno" name="manual_senderno" class="form-control form-control-round" placeholder="sender no" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                            </div>
                          </div>


                          <label class="col-sm-2 col-form-label">Karachi To</label>
                          <div class="col-sm-2">

                            <input type="text" id="karachi_to" name="karachi_to" class="form-control form-control-round" placeholder="Station" required="">

                          </div>  

                        </div> 




                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Receiver Name</label>
                          <div class="col-sm-2">
                           
                            <div id="manual_receiverdiv">
                              <input  type="text" id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver name" required="">
                            </div>
                          </div>

                          <label class="col-sm-2 col-form-label">Receiver No</label>
                          <div class="col-sm-2">
                            <div id="manual_receivernodiv">
                              <input  type="text" id="manual_receiver" name="manual_receiverno" class="form-control form-control-round" placeholder="receiver no"  maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                            </div>
                          </div>

                          <label class="col-sm-2 col-form-label">Reference No 1 </label>
                          <div class="col-sm-2">
                            <input   type="Number" id="reference1" name="reference1" class="form-control form-control-round" placeholder="Reference No 2" value="{{ old('reference1') }}">
                          </div>
                        </div> 

                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Reference No 2 </label>
                          <div class="col-sm-2">
                            <input   type="Number" id="reference2" name="reference2" class="form-control form-control-round" placeholder="Reference No 2" value="{{ old('reference2') }}">
                          </div>    
                        </div>


                        <div class=" form-group row input_fields_wrap1" style="border:1px solid #dedede">
                          <div class="table-responsive">
                           <div class="col-md-12 text-center">
                            <input type="radio" name="walkincalType" value="qty" class="walkincalType" checked="" > By Quantity
                            <input type="radio" name="walkincalType" value="weight" class="walkincalType"> By Weight
                            <input type="radio" name="walkincalType" value="lumpsum" class="walkincalType"> By LumpSum
                          </div>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Quantity</th>
                                  <th>Packing</th>
                                  <th>Goods Description</th>
                                  <th>Brand</th>
                                  <th>Rate</th>
                                  <th>Weight</th>
                                  <th>Actions</th>  
                                </tr>
                              </thead>
                              <tbody class="package_walkin">
                                <tr>
                                  <td><input required type="text" id="walkinquantity" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" style="width:110px !important;border-radius:50px;border-radius:50px" data-attr="0"></td>
                                  <td class="packingTd">
                                    <input required type="text" id="walkinpacking" name="packing[]"  class="form-control packing" style="width:200px !important;border-radius:50px">       
                                  </td>
                                   <td>
                                        
                                         <select required style="width:110px" required name="good[]" id="good" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary good"  onchange="saveDisable();updateDescRegular($.now());">
                                      <option value="">Select Description </option>

                                      @foreach($packagemetas as $value)


                                          <option  value="{{$value->id}}" data-description="{{$value->description}}">{{$value->package_name}}</option>


                                      @endforeach

                                    </select>
                                    <input  type="text" id="goods" name="goods[]"  class="orm-control goods" style="width:110px !important;border-radius:50px">
                                  </td>
                                  <td><input required type="text" id="walkinbrand" name="brand[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
                                  <td><input required type="text" id="walkinrate" name="rate[]" class="form-control rate" style="width:110px !important;border-radius:50px"></td>
                                  <td><input required type="text" id="walkinweight" name="weight[]"  class="form-control weight" style="width:110px !important;border-radius:50px"></td>
                                  <td ><button class="add_field_button1_walkin">Add More </button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Rent</label>
                          <div class="col-sm-2" >
                            <input  readonly="true" onchange="myamount()" type="number" value="{{ !empty(old('rent'))?old('rent'):0 }}" id="walkinrent" name="rent" class="form-control form-control-round" placeholder="Rent" >
                          </div>  
                          <label class="col-sm-2 col-form-label">Labour</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="walkinLabour" name="Labour"  class="form-control form-control-round" placeholder="Labour" value="{{ !empty(old('Labour'))?old('Labour'):0 }}">
                          </div>
                          <label class="col-sm-2 col-form-label">TT</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="walkintt" name="tt" class="form-control form-control-round" placeholder="TT" value="{{ !empty(old('tt'))?old('tt'):0 }}">
                          </div>
                        </div> 

                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Local Charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="walkinlocal_charges" name="local_charges"  class="form-control form-control-round" placeholder="Local Charges" value="{{ !empty(old('local_charges'))?old('local_charges'):0 }}">
                          </div>
                          <label class="col-sm-2 col-form-label">Lifter Crane charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="walkinlifter" name="lifter" class="form-control form-control-round" placeholder="Lifter Crane charges" value="{{ !empty(old('lifter'))?old('lifter'):0 }}">
                          </div>  
                          <label class="col-sm-2 col-form-label">Home Delivery </label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="walkinhome_delivery" name="home_delivery"  class="form-control form-control-round" placeholder="Home Delivery Charges" value="{{ !empty(old('home_delivery'))?old('home_delivery'):0 }}">
                          </div>
                        </div> 


                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Other Charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="walkinother_charges" name="other_charges" class="form-control form-control-round" placeholder="Other Charges" value="{{ !empty(old('other_charges'))?old('other_charges'):0 }}">
                          </div>  
                          <label class="col-sm-2 col-form-label">Total Amount</label>
                          <div class="col-sm-2">
                            <input readonly="true" type="number"  id="walkintotal_amount" name="total_amount"  class="form-control form-control-round" placeholder="Total Amount " value="0" value="{{ old('total_amount') }}" required="">
                          </div>
                          <label class="col-sm-2 col-form-label">Advance</label>
                          <div class="col-sm-2">
                            <input onchange="myamountadvance()" type="number" id="walkinadvance" name="advance" class="form-control form-control-round" placeholder=" Advance" value="{{ old('advance') }}">
                          </div> 
                        </div> 

                        <div class="form-group row"> 
                          <label class="col-sm-2 col-form-label">Balance</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="number"  id="walkinbalance" name="balance"  class="form-control form-control-round" placeholder="Balance" value="{{ old('balance')??0 }}" required="">
                          </div>
                        </div> 

                        <br>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-2">
                            <button type="Reset" style="" class="btns_reset" onclick="window.location.reload()">Reset</button>
                          </div>

                          <!-- <label class="col-sm-2 col-form-label"></label> -->
                          <div class="col-sm-2">
                            <button type="button" id="calculatewalkin" class="btns_reset" style="background-color: #029a7a !important;">Calculate</button>
                          </div>

                          <!-- <label class="col-sm-1 col-form-label"></label> -->
                          <div class="col-sm-2">
                            <button type="submit" style="" class="btns_save">Save</button>
                          </div>    

                          <!-- <label class="col-sm-1 col-form-label"></label> -->
                          <div class="col-sm-2">
                            <button type="submit" name="savenprint" value="savenprint" style="" class="btns_save">Save & Print</button>
                          </div>    
                        </div>
                      </form>



                    </div>
                  </div>
                </div>
              </div>

            </div>                       
          </div>
          <div class="container">
            <div class="container-fluid">
              <div class="row">

                <div class="col-sm-12">
                  <!-- Basic Form Inputs card start -->
                  <div class="card">
                    <div class="card-header">
                      <h4>View Paid</h4>
                    </div>
                    <div class="card-block">
                      <div class="card-block table-border-style">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr style="width:100%">
                                <th>Computer No</th>
                                <th>Bilty Number</th>
                                <th>Sender Name</th>
                                <th>Receiver Name</th>
                                <th>Date/Time</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                                <th>Builty Type</th>
                                <th>Charges</th>
                                <th>Amount</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                              <tbody>
                                @if(isset($bilty))
                                @foreach($bilty as $key=>$value)
                                @php
                                $totalquantity = 0;
                                $totalweight = 0;
                                @endphp
                                @foreach ($value->getbiltymeta as $biltymeta) 
                                @php    
                                $totalquantity += $biltymeta->quantity;
                                $totalweight += $biltymeta->weight; 
                                @endphp
                                @endforeach
                                @php
                                $allcharges = $value->labour+$value->tt+$value->local_charges+$value->crane_charges+$value->home_delivery+$value->other_charges;
                                @endphp
                                <tr>
                                  <td>{{$value->id}}</td>
                                  <td>{{$value->bilty_no ??''}}</td>
                                  @if(isset($value->getsender[0]))
                                  @if($value->customer_type=="urd")
                                  <td>{{$value->getsender[0]->customer_name_urdu ??''}}</td>
                                  @else
                                  <td>{{$value->getsender[0]->customer_name ??''}}</td>
                                  @endif
                                  @endif
                                  @if(isset($value->getreceiver[0]))
                                  @if($value->customer_type=="urd")
                                  <td>{{$value->getreceiver[0]->customer_name_urdu ??''}}</td>
                                  @else
                                  <td>{{$value->getreceiver[0]->customer_name ??''}}</td>
                                  @endif
                                  @endif
                                  @if(!isset($value->getsender[0]))
                                  <td>{{$value->sender_name ??''}}</td>
                                  @endif
                                  @if(!isset($value->getreceiver[0]))
                                  <td>{{$value->receiver_name ??''}}</td>
                                  @endif
                                  <td>{{$value->created_at }}</td>
                                  <td>{{$totalquantity }}</td>
                                  <td>{{$totalweight }}</td>
                                  <td>{{$value->bilty_type }}</td>
                                  <td>{{ $allcharges }}</td>
                                  <td>{{$value->total_charges ??''}}</td>

                                <td>
                                  <a href="{{url('/mehmoodgoodemployee/pdf/'.$value->id)}}" target="blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;
                                  <a href="{{url('/mehmoodgoodemployee/viewtopay/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
                                  <a href="{{url('/mehmoodgoodemployee/edittopay/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;

                                  <a id="deletebilty" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                             
                                </td>
                              </tr>
                              @endforeach
                              @endif

                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- Basic Form Inputs card end -->
                </div>
              </div>

            </div>                       
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Warning Section Starts -->
<!-- Warning Section Starts -->
@include('includes/footer')
<script type="text/javascript">
function myFunctionrate()
{
 // form-control rate fill
  let rateamount = 0
  $('.package tr').each(function(){
    rate = $(this).find('.rate').val();
    rateamount +=+parseInt(rate);
    $('#total_amount').val(rateamount); 
    });
 // alert("nothing");
}

  function myFunctionlanguage() {
var language = $('#language').val();

if(language=="eng")
{
  document.getElementById("sender_name").style.display='block';
  document.getElementById("receiver_name").style.display='block';
   document.getElementById("manual_senderurdu").style.display='none';
  document.getElementById("manual_receiverurdu").style.display='none';
}else{
   document.getElementById("manual_senderurdu").style.display='block';
  document.getElementById("manual_receiverurdu").style.display='block';
  document.getElementById("sender_name").style.display='none';
  document.getElementById("receiver_name").style.display='none';
}
 }
  var last_unix_time = '';
 /* function getvalue(t) {
    var type=t.value;
    var sender_dropdown = $("#sender_name");
    $.ajax({
      url:'getsenderdropdown',
      type:'GET',
      async: false,
      data: { type: type },
      success:function(data){

        var optionpackages ='<option value="">Select Sender Name</option>';
        for(var i=0;i<data.length;i++){


          optionpackages += '<option value="'+ data[i].id +'">' +data[i].customer_name + '</option>';
        }

        sender_dropdown.html(optionpackages);
//$('#category_id').selectpicker('refresh');


}
});
  } */

  $(document).ready(function() {

    var max_fields      = 10;
    var wrapper     = $(".input_fields_wrap1"); 
    var add_button      = $(".add_field_button1"); 
    var add_button_walkin = $(".add_field_button1_walkin"); 
    var x = 1; 
    optionpackages = '';
    optionpackages1 = '';

    $(add_button).click(function(e){ 
      last_unix_time_regular = $.now();
      last_unix_time_regulars = $.now();
      e.preventDefault();
      if(x < max_fields){ 
        x++; 

        $.ajax({
            url:'getpackagesdropdown',
            type:'GET',
            async: false,
            data: { id: $('#sender_name').val() },
            success:function(data){

             optionpackages ='<option value="">Select Packages</option>';
              for(var i=0;i<data.length;i++){
                for(var j=0;j<data[i].packages_metas.length;j++){

                  optionpackages += '<option value="'+ data[i].packages_metas[j].id +'">' +data[i].packages_metas[j].package_name + '</option>';
                }
              }
             
            }
        });

         $.ajax({
            url:'getdescriptiondropdown',
            type:'GET',
            async: false,
            data: { id: $('#sender_name').val() },
            success:function(data){
             //  alert(data);
             optionpackages1 ='<option value="">Select Description</option>';
              for(var i=0;i<data.length;i++){

                  optionpackages1 += '<option value="'+ data[i].description +'">' + data[i].description + '</option>';
                }
             
             
            }
        });

    




        $('.package').append('<tr><td ><input type="text" id="quantity[]" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" placeholder="" style="width:110px !important;border-radius:50px" data-attr="0"></td><td class="packingTd"><select style="width:110px"  required name="packing[]" onchange="saveDisable();updateDescRegular('+last_unix_time_regular+');" id="test2" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary packing">'+optionpackages+'</select></td><td ><select style="width:110px"  required name="good[]" onchange="saveDisable();updateDescRegular('+last_unix_time_regulars+');" id="test2" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary good">'+optionpackages1+'</select><input type="text" id="goods" name="goods[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="brand[]" name="brand[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" onchange="myFunctionrate()" id="rate[]" name="rate[]"  class="form-control rate" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="weight[]" name="weight[]"  class="form-control weight" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><button class="remove_field " style=""> Remove</button></tr>');
        // var  packages = $(".packing");
//         $.ajax({
//           url:'getpackagesdropdown',
//           type:'GET',
//           async: false,
//           data: { id: $('#sender_name').val() },
//           success:function(data){

//             var optionpackages ='<option value="">Select Packages</option>';
//             for(var i=0;i<data.length;i++){
//               for(var j=0;j<data[i].packages_metas.length;j++){

//                 optionpackages += '<option value="'+ data[i].packages_metas[j].id +'">' +data[i].packages_metas[j].package_name + '</option>';
//               }
//             }
//             packages.html(optionpackages);
// //$('#category_id').selectpicker('refresh');


// }
// });
      }

    });

    $(add_button_walkin).click(function(e){ 
      last_unix_time = $.now();
      //optionpackages1 = '';
      e.preventDefault();
      if(x < max_fields){ 
        x++; 

        $.ajax({
            url:'getpackagesdropdown',
            type:'GET',
            async: false,
            data: { id: $('#sender_name').val() },
            success:function(data){

             optionpackages1 ='<option value="">Select Packages</option>';
              for(var i=0;i<data.length;i++){
                for(var j=0;j<data[i].packages_metas.length;j++){

                  optionpackages1 += '<option value="'+ data[i].packages_metas[j].package_name +'" data-description="'+ data[i].packages_metas[j].description +'" data-id="'+ last_unix_time +'" >';
                }
              }
              //optionpackages1 += '<option value="others">others</option>';
             
            }
        });

        $('.package_walkin').append('<tr><td ><input type="text" id="walkinquantity" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" placeholder="" style="width:110px !important;border-radius:50px" data-attr="0"></td><td class="packingTd"><input list="browsers" required type="text" onChange="updateDescWalking('+last_unix_time+')" id="walkinpacking" name="packing[]"  class="form-control packing '+last_unix_time+'val'+'" style="width:200px !important;border-radius:50px"><datalist id="browsers">'+optionpackages1+'</datalist></td><td ><input type="text" id="walkindescription" name="good[]"  class="form-control '+last_unix_time+'" placeholder="" style="width:200px !important;border-radius:50px"></td><td ><input type="text" id="walkinbrand" name="brand[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="walkinrate" name="rate[]"  class="form-control rate" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="walkinweight" name="weight[]"  class="form-control weight" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><button class="remove_field " style=""> Remove</button></tr>');
      
      }
    });
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
  e.preventDefault(); $(this).parents('tr').remove(); x--;
})
});


function myFunctionsender() {
  var amount = $("#sender_name").val();

  var other_deduction = $("#sender_no");
 // var station = $("#karachi_to");
  var  packages = $("#packing");
  document.getElementById("addressdynamic").style.display='none';

  if(amount=="other")
  {

    document.getElementById("manual_senderdiv").style.display='block';
    document.getElementById("manual_sendenodiv").style.display='block';
    document.getElementById("manual_sender").disabled =false;
    document.getElementById("manual_senderd").style.display='none';
    document.getElementById("manual_sendenod").style.display='none';
  }
  else
  {
    document.getElementById("manual_senderdiv").style.display='none';
    document.getElementById("manual_sendenodiv").style.display='none';
    document.getElementById("manual_sender").disabled = true;
    document.getElementById("manual_senderd").style.display='block';
    document.getElementById("manual_sendenod").style.display='block';
      $.ajax({
      url:'getcategoriesdropdown',
      type:'GET',
      async: false,
      data: { id: $('#sender_name').val() },
      success:function(data){

        var option ='<option  value="">Select Phone</option>';
        for(var i=0;i<data.length;i++){
          
          

                  option += '<option selected value="'+ data[i].id +'">' + data[i].number + '</option>';


            
          
          
        }
        other_deduction.html(option);
      //$('#category_id').selectpicker('refresh');


      }
      });

     

      
  }

}





$(document).on("click","#deletebilty", function(e){ //user click on remove text
  var id = $(this).attr('data-deleteId');
  console.log(id);
  var data = {
    id : id,
  }
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) 
    {
      $.ajax({
        type: 'post',
        url: '{{url('deletebilty')}}',
        data: data,
        date: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
          if (response) {
            Swal.fire({
              title: 'Deleted!',
              html: '<strong>Your Customer has been deleted.</strong>',
              type: 'success',
              showConfirmButton: false,
              timer: 3000,
            })
            location.reload();
          }
        },
        error: function () {
        }
      });
    }
  })
})



$(document).on("change","#karachi_to", function(e){ //user click on remove text
  var id = $(this).val();
  console.log(id);
  var data = {
    id : id,
  }
  if(id == null || id == ''){
    document.getElementById("addressmanual").style.display='none';
    document.getElementById("addressdynamic").style.display='none';
    Swal.fire({
      title: 'Station not selected!',
      html: '<strong>Please select your station.</strong>',
      type: 'warning',
      showConfirmButton: false,
      timer: 3000,
    })
  }
  else{

    document.getElementById("addressmanual").style.display='none';
    document.getElementById("addressdynamic").style.display='block';
    $.ajax({
      url:'getstationaddress',
      type:'GET',
      async: false,
      data: { id: id },
      success:function(data){
        // alert(data);
        $('textarea#stationDeliveryAddress').val(data.address_1);
      }
    });
  }
})

/////////////////////////////////////////////////////////////////////////////

//walkinpacking
/*$(document).on('change','#walkinpacking',function(event){
  //alert('here 1');

  var val = $('#walkinpacking').val()
  alert(val);

  var desc = $('#browsers option').filter(function() {
    return this.value == val;
  }).data('description');

  //alert(desc);
  $('#walkingood').val(desc);

  alert(last_unix_time);
  document.getElementsByClassName(last_unix_time)[0].value = desc;

});*/

function updateDescWalking(id){
  //alert(id);

  var val = document.getElementsByClassName(id+'val')[0].value;

  $.ajax({
    url: "{{ url('/getPackageDesc') }}/"+val,
    type: "get",
      //data: {id : $(this).find(':selected').attr("data-id")}, 
      success: function(result) {
        //alert(result); 
        document.getElementsByClassName(id)[0].value = result;       
      }
       
    });

  //document.getElementsByClassName(id)[0].value = val+id;
}

function updateDescRegular(id){

  var val = $('.'+id).find(":selected").text();
  //alert(selVal);

  $.ajax({
    url: "{{ url('/getPackageDesc') }}/"+val,
    type: "get",
      //data: {id : $(this).find(':selected').attr("data-id")}, 
      success: function(result) {

        //alert(result); 
        document.getElementsByClassName(id+'val')[0].value = result;       
      }
       
    });

  /*
  var val = document.getElementsByClassName(id+'val')[0].value;

  $.ajax({
    url: "{{ url('/getPackageDesc') }}/"+val,
    type: "get",
      //data: {id : $(this).find(':selected').attr("data-id")}, 
      success: function(result) {
        //alert(result); 
        document.getElementsByClassName(id)[0].value = result;       
      }
       
    });

  //document.getElementsByClassName(id)[0].value = val+id;
  */
}


/*$(document).on('change','.packing',function(event){
  var pid = $(this).find(':selected').val();
  var desc = $(this).find(':selected').data('description');
  var cid = $('#packing').find(':selected').val();

  //alert(desc);

$('#good').val(desc);
  $(event.target).parent('td').parent('tr').find('.good').val(0);
  $.ajax({
    url: "{{ url('/mehmoodgoodemployee/BiltyRateList') }}/"+cid+"/"+pid,
    type: "get",
      //data: {id : $(this).find(':selected').attr("data-id")}, 
      success: function(result) {
       
        if(result['rate'] > 0){

          
          $(event.target).parent('td').parent('tr').find('.rate').val(result['rate']);
          $(event.target).parent('td').parent('tr').find('.weight').val(result['weight']);
        
          
        }
       
      }
    });
}); */
// $('.packing').change(function(){
//   var qrate = $(this).val()*$('#quantity').val();
//   $('#total_amount').val(qrate);
// });

function myamount()
{
  // let total = 0;
  // total +=+$("#rent").val();
  // total +=+$("#Labour").val();
  // total +=+$("#tt").val();
  // total +=+$("#local_charges").val();
  // total +=+$("#lifter").val(); 
  // total +=+$("#home_delivery").val();
  // total +=+$("#other_charges").val();
  // total +=+$("#total_amount").val();

  // $("#total_amount").val(total);
  // $("#balance").val(total);
}

// $('.quantity').change(function(){
//  var oldrate = parseFloat($(event.target).parent('td').parent('tr').find('.quantity').data('attr'));
//   var qrate = parseFloat($(event.target).parent('td').parent('tr').find('.quantity').val()*$('.rate:eq('+$(this).index()+')').val());
//   let total = parseFloat($('#total_amount').val());
//   $('#total_amount').val((qrate+total)-oldrate);
//   $(event.target).parent('td').parent('tr').find('.quantity').data('attr',(qrate+total));
// });

//For Rate

//goods

$(document).on('change','.good',function(event){
 var pid = $(this).find(':selected').val();
 if(pid=="other")
 {
  $(this).css('display','none');
 var abc = $(event.target).parent('td').parent('tr').find('.goods').css('display','block');
  //alert(abc);
 // $(this).css('display','none');
 }
 else{
   $(this).css('display','block');
    $(event.target).parent('td').parent('tr').find('.goods').css('display','none');
 }


});


$(document).on('change','.packing',function(event){

  var pid = $(this).find(':selected').val();
  var cid = $('#sender_name').find(':selected').val();
  var sid = $('#karachi_to').find(':selected').val();
   var desc = $(this).find(':selected').data('good');
  // alert(desc);
      //$('#good').val(desc);
 var other_deduction = $(event.target).parent('td').parent('tr').find('.good');
 //alert(other_deduction);
  $(event.target).parent('td').parent('tr').find('.rate').val(0);
  $.ajax({
    url: "{{ url('/mehmoodgoodemployee/BiltyRateList') }}/"+cid+"/"+sid+"/"+pid,
    type: "get",
      //data: {id : $(this).find(':selected').attr("data-id")}, 
      success: function(result) {
       
        if(result['rate'] > 0){

          
          $(event.target).parent('td').parent('tr').find('.rate').val(result['rate']);
          $(event.target).parent('td').parent('tr').find('.weight').val(result['weight']);
        
          // var qrate = parseFloat($(event.target).parent('td').parent('tr').find('.quantity').val()*result['rate']);
          // let total = parseFloat($('#total_amount').val());

          // console.log(qrate);
          // console.log(total);
          // $('#total_amount').val(qrate+total);

          // $(event.target).parent('td').parent('tr').find('.quantity').data('attr',(qrate+total));
        }
       // $(this).parent('tr').find('.rate').val(result['rate']);
      }
    });

  $.ajax({
     url: "{{ url('/getPackageDesc') }}/"+pid,
      type:'GET',
      async: false,
     // data: { id: pid },
      success:function(data){

        var option ='<option value="">Select Description</option>';
        for(var i=0;i<data.length;i++){
          option += '<option value="'+ data[i].description +'">' + data[i].description + '</option>';
        }
        option += '<option value="other">Other</option>';
       // alert(option);
        other_deduction.html(option); 
      }
      });
});

function myamountadvance()
{
  // } else {
    total+=+$("#advance").val();
    $("#balance").val(total);
  // }
}
$(document).ready(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
})

$('#calculate').click(function(){
  pckgRate = 0;
 
  if($('input[name="calType"]:checked').val() == "qty"){
    
    $('#total_amount').prop('readonly', true);
    $('.package tr').each(function(){
      qty = $(this).find('.quantity').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(qty*rate);
       $('#rent').val(pckgRate);
      
    });
  
  } else if($('input[name="calType"]:checked').val() == "weight"){
    
    $('#total_amount').prop('readonly', true);
    $('.package tr').each(function(){
      weight = $(this).find('.weight').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(weight*rate);
      $('#rent').val(pckgRate);
    
      
    });

  } else if($('input[name="calType"]:checked').val() == "lumpsum"){
    
    $('#total_amount').prop('readonly', false);
    $('#rent').prop('readonly', false);
    
  }

  $('#total_amount').change(function(){
    saveDisable();
  });

  $('.btns_save').attr('disabled',false);
  $('.btns_save').css('opacity','1');
  

   
    labour = parseFloat($('#Labour').val()) || 0;
    local_charges = parseFloat($('#local_charges').val()) || 0;
    lifter = parseFloat($('#lifter').val()) || 0;
    home_delivery = parseFloat($('#home_delivery').val()) || 0;
    other_charges = parseFloat($('#other_charges').val()) || 0;
    tt = parseFloat($('#tt').val()) || 0;

    
    if($('input[name="calType"]:checked').val() == "lumpsum"){
      
      sum = parseFloat(parseInt($('#total_amount').val())+labour+local_charges+lifter+home_delivery+other_charges+tt);
     // alert(sum);
      
      $('#total_amount').val(sum);
      

    }else{
      sum = parseFloat(pckgRate+labour+local_charges+lifter+home_delivery+other_charges+tt);
      
      $('#total_amount').val(sum);
      
     

    }
    advance = parseFloat($('#advance').val());
    var balance = parseFloat(sum-advance) || 0;

   
    $('#balance').val(balance);

});

$('#calculatewalkin').click(function(){
  pckgRate = 0;

  if($('input[name="walkincalType"]:checked').val() == "qty"){
    
    $('#walkintotal_amount').prop('readonly', true);
    $('.package_walkin tr').each(function(){
      qty = $(this).find('.quantity').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(qty*rate);
     // alert(pckgRate);
      $('#walkinrent').val(pckgRate);
      
    });
  
  } else if($('input[name="walkincalType"]:checked').val() == "weight"){
    
    $('#walkintotal_amount').prop('readonly', true);
    $('.package_walkin tr').each(function(){
      weight = $(this).find('.weight').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(weight*rate);
       $('#walkinrent').val(pckgRate);
      
    });

  } else if($('input[name="walkincalType"]:checked').val() == "lumpsum"){
     $('#walkinrent').prop('readonly', false);
    $('#walkintotal_amount').prop('readonly', false);
  
  }

  $('#walkintotal_amount').change(function(){
    saveDisable();
  });

  $('.btns_save').attr('disabled',false);
  $('.btns_save').css('opacity','1');
  // $('.package_walkin tr').each(function(){
  //   qty = $(this).find('.quantity').val();
  //   rate = $(this).find('.rate').val();

  //   pckgRate += parseFloat(qty*rate);
    
  // });

   // rent = parseFloat($('#rent').val()) || 0;
    labour = parseFloat($('#walkinLabour').val()) || 0;
    local_charges = parseFloat($('#walkinlocal_charges').val()) || 0;
    lifter = parseFloat($('#walkinlifter').val()) || 0;
    home_delivery = parseFloat($('#walkinhome_delivery').val()) || 0;
    other_charges = parseFloat($('#walkinother_charges').val()) || 0;
    tt = parseFloat($('#walkintt').val()) || 0;

    // sum = parseFloat(pckgRate+rent+labour+local_charges+lifter+home_delivery+other_charges+tt);
    // $('#walkintotal_amount').val(sum);

    if($('input[name="walkincalType"]:checked').val() == "lumpsum"){
      
      sum = parseFloat(parseInt($('#walkintotal_amount').val())+labour+local_charges+lifter+home_delivery+other_charges+tt);
      $('#walkintotal_amount').val(sum);

    }else{
      sum = parseFloat(pckgRate+labour+local_charges+lifter+home_delivery+other_charges+tt);
      $('#walkintotal_amount').val(sum);
    }

    advance = parseFloat($('#walkinadvance').val());
    var balance = parseFloat(sum-advance) || 0;

   
    $('#walkinbalance').val(balance);

});

function saveDisable(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
}

function checkWalkingCustomerOthers(){
  //alert('here');
  //$('#walkinpacking_input').show();

  var selectValue = $('#walkinpacking_select').find(":selected").text();
  //alert(selectValue);

  if(selectValue=='others'){
    $('#walkinpacking').show();
    $('#walkinpacking_select').hide();
    document.getElementById('walkinpacking').value = "";
  }else{
    $('#walkinpacking_select').show();
    $('#walkinpacking').hide();
    //$('#walkinpacking').show();
    document.getElementById('walkinpacking').value = selectValue;
  }

  //document.getElementById('walkinpacking').value = selectValue;
}

function checkWalkingCustomerDd(){
  //alert('here 1');
  var selectValue = $('#karachi_to_select_walking').find(":selected").text();
  //alert(selectValue);

  //$('#walkinpacking_input').show();
  
  //var selectValue = $('#walkinpacking_select').find(":selected").text();
  //alert(selectValue);

  /*if(selectValue=='others'){
    $('#walkinpacking').show();
    document.getElementById('walkinpacking').value = "";
  }else{
    $('#walkinpacking').hide();
    //$('#walkinpacking').show();
    document.getElementById('walkinpacking').value = selectValue;
  }*/

  document.getElementsByClassName('karachi_to')[0].value = selectValue;
  
}

$('#rent').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#Labour').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#local_charges').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#lifter').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#home_delivery').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#other_charges').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#tt').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});
$('#advance').change(function(){
  $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
});

$(document).ready(function() {
    $('.table').DataTable();
} );

$(document).ready(function(){
  var amount = $("#sender_name").val();

  var other_deduction = $("#sender_no");
  // var station = $("#karachi_to");
  // var  packages = $("#packing");
  $.ajax({
      url:'getcategoriesdropdown',
      type:'GET',
      async: false,
      data: { id: $('#sender_name').val() },
      success:function(data){

        var option ='<option value="">Select Phone</option>';
        for(var i=0;i<data.length;i++){
          option += '<option value="'+ data[i].id +'">' + data[i].number + '</option>';
        }
        other_deduction.html(option);
      //$('#category_id').selectpicker('refresh');


      }
      });
    });
$('.walkin-check').change(function(){
  if($(this).is(':checked')){
    $('.topay-normal').hide();
    $('.topay-walkin').show();
  }
  else{
    $('.topay-normal').show();
    $('.topay-walkin').hide();
  }
});

$(document).ready(function(){
  $('.topay-walkin').hide();
});
</script>
@if(Session::has('print'))
<script>window.open("{{url('/mehmoodgoodemployee/pdf')}}/{{Session::get('print')}}",'_blank');</script>
<script type="text/javascript">
  

  $("#sender_no").on("change", function() {
    $("#sender_no").val($("#sender_no option:first").val());
});

</script>

@endif