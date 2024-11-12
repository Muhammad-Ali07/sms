@include('includes/header')
@include('datepicker/datepicker')
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
  <div class="pcoded-overlay-box"></div>
  <div class="pcoded-container navbar-wrapper">

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
                      <h4>ToPay</h4>
                      <div class="text-right">
                        <label class="radio-inline">
                          <input type="hidden" name="walkin_value" id="walkin_value" value="{{$bilty->walkin}}">
                          <input type="checkbox" value="walkin" disabled="" name="walkin" class="walkin-check" @if($bilty->walkin == 1) checked @endif> Walkin Customer
                        </label>
                      </div>
                    </div>
                    <div class="card-block">

                      @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
                      @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
                      @if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
                      <form enctype="multipart/form-data" action="{{ route('updatetopaybilty') }}" method="post" class="bg-white post-form-validation topay-normal" id="post-form-validation" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <meta name="csrf-token" content="{{csrf_token()}}">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Select Language</label>
                          <div class="col-sm-2">
                              <select style="font-size: 11px;" onchange="myFunctionlanguage()"  name="language" id="language" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                @if($bilty->customer_type == 'eng')
                                <option selected value="eng">English</option>
                                <option value="urd">Urdu</option>
                                @else
                                <option value="eng">English</option>
                                <option selected value="urd">Urdu</option>
                                @endif
                                </select>
                            </div>
                          </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label" style="margin-top:-5px">Builty Type</label>
                          <div class="col-sm-4">
                            <label class="radio-inline">

                              <input value="ToPay" type="radio" name="biltytype" @if($bilty->bilty_type == 'ToPay') checked @endif> To Pay
                            </label>
                            <label class="radio-inline">
                              <input type="radio" value="Paid" name="biltytype"  @if($bilty->bilty_type == 'Paid') checked @endif> Paid
                            </label>
                            <label class="radio-inline">
                              <input  type="radio" value="Advance" name="biltytype"  @if($bilty->bilty_type == 'advance') checked @endif> Advance
                            </label>
                          </div>

                        </div> 

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Computer Number</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="Number" value="{{$bilty->id??''}}"  id="computer" name="computer"  class="form-control form-control-round" placeholder="Computer No">
                          </div>

                          <label class="col-sm-2 col-form-label">Bilty No</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="Number" value="{{$bilty->bilty_no??''}}" id="bilty" name="bilty" class="form-control form-control-round" placeholder="Bilty No">
                          </div> 
                          <label class="col-sm-2 col-form-label">Date</label>
                          <div class="col-sm-2">
                            <input value="{{date('Y-m-d',strtotime($bilty->date))}}"  type="date"   class="form-control form-control-round" name="date">
                          </div>     
                        </div> 


                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Sender Name</label>
                          <div class="col-sm-2">
                            <div id="manual_senderd" @if(isset($bilty->sender_id)) style="display: block;" @else style="display: none;" @endif>
                              <select onchange="myFunctionsender()"  name="sender_name" id="sender_name" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Sender Name</option>
                                @foreach($sender as $value)
                                @if($bilty->customer_type == 'eng')
                                <option @if($bilty->sender_id==$value->id) selected @endif value="{{$value->id}}">{{$value->customer_name}}</option>
                                @else
                                <option @if($bilty->sender_id==$value->id) selected @endif value="{{$value->id}}">{{$value->customer_name_urdu}}</option>
                                @endif
                                @endforeach
                                <!-- <option value="other">Other</option> -->
                              </select>
                             
                             
                            </div>
                             <div id="manual_senderurdu" style="display:none">
                              <select style="font-size: 11px;" onchange="myFunctionsenderurdu()"  name="sender_nameurdu" id="sender_nameurdu" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
                                <option value="">Select Sender Name</option>
                                @foreach($sender as $value)
                                @if($value->customer_name_urdu!="")
                                <option value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name_urdu}}</option>
                                @endif
                                @endforeach
                               
                              </select>
                            </div>

                            <div id="manual_senderdiv" @if(!isset($bilty->sender_id)) style="display: block;" @else style="display: none" @endif>
                              <input value="{{$bilty->sender_name}}"  type="text" id="manual_sender" name="manual_sender" class="form-control form-control-round" placeholder="sender name">
                            </div>
                          </div>    

                          <label class="col-sm-2 col-form-label">Sender No</label>
                          <div class="col-sm-2">
                            <div id="manual_sendenod" @if(isset($bilty->senderphone_id)) style="display: block;"@endif @if(!isset($bilty->senderphone_id)) style="display: block;" @else style="display: none" @endif>
                              <select  name="sender_no" id="sender_no" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Sender No</option>
                                @foreach($sender as $value)
                                @foreach($value->phoneno as $number)

                                @if($bilty->senderphone_id==$number->id)
                                <option selected value="{{$number->id}}">{{$number->number}}</option>
                                @endif

                                @endforeach
                                @endforeach

                                <!-- <option value="other">Other</option> -->

                              </select>
                            </div>
                            <div id="manual_sendenodiv" @if(isset($bilty->sender_no)) style="display: block;" @else style="display: none" @endif>
                              <input value="{{$bilty->sender_no}}"  type="Number" id="manual_senderno" name="manual_senderno" class="form-control form-control-round" placeholder="sender no">
                            </div>
                          </div>
                          
                         
                          <label class="col-sm-2 col-form-label">Karachi To</label>
                          <div class="col-sm-2">
                            <select  required  name="karachi_to" id="karachi_to" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                              <option value="">Select Station Name</option>
                              
                               @foreach($station as $value)
                                @foreach($value->stationdetail as $stations)

                                  @if($stations->id==$bilty->station_id)
                                  <option selected value="{{$stations->id}}">{{$stations->station_name}}</option>
                                  @else
                                  <option  value="{{$stations->id}}">{{$stations->station_name}}</option>
                                  @endif

                                @endforeach
                              @endforeach

                            </select>
                          </div>  


                        </div> 




                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Receiver Name</label>
                          <div class="col-sm-2">
                            @if($bilty->receiver_id!="0")
                            <div id="manual_receiverd">
                              <select onchange="myFunctionreceiver()" required name="receiver_name" id="receiver_name" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Receiver Name</option>
                                @foreach($sender as $value)
                                @if($bilty->customer_type == 'eng')
                                @if($bilty->receiver_id==$value->id)
                                <option selected value="{{$value->id}}">{{$value->customer_name}}</option>
                                @endif
                                @if($bilty->receiver_id!=$value->id)
                                <option value="{{$value->id}}">{{$value->customer_name}}</option>
                                @endif
                                @endif
                                @if($bilty->customer_type != 'eng')
                                @if($bilty->receiver_id==$value->id)
                                <option selected value="{{$value->id}}">{{$value->customer_name_urdu}}</option>
                                @endif
                                @if($bilty->receiver_id!=$value->id)
                                <option value="{{$value->id}}">{{$value->customer_name_urdu}}</option>
                                @endif
                                @endif
                                @endforeach
                                <option value="other">Other</option>
                              </select>
                            </div>
                             <div id="manual_receiverurdu" style="display: none">
                              <select style="font-size: 11px;" onchange="myFunctionreceiverurdu()"  name="receiver_nameurdu" id="receiver_nameurdu" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Receiver Name</option>
                                @foreach($sender as $value)
                                @if($value->customer_name_urdu!="")
                                <option value="{{$value->id}}" {{!empty(old('receiver_name')) && old('receiver_name')==$value->id?"selected":''}}>{{$value->customer_name_urdu}}</option>
                                @endif
                                @endforeach
                               
                              </select>
                            </div>
                            @endif
                            @if($bilty->receiver_id=="0")
                            <div id="manual_receiverdiv">
                              <input value="{{$bilty->receiver_name}}"  type="text" id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver name">
                            </div>
                            @endif
                          </div>
                          <label class="col-sm-2 col-form-label">Receiver No</label>
                          <div class="col-sm-2">
                            @if($bilty->receiverphone_id!="")
                            <div id="manual_receivernod">
                              <select  name="receiver_no" id="receiver_no" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Sender No</option>
                                @foreach($sender as $value)
                                @foreach($value->phoneno as $number)

                                @if($bilty->receiverphone_id==$number->id)
                                <option selected value="{{$number->id}}">{{$number->number}}</option>
                                @endif

                                @endforeach
                                @endforeach

                                <option value="other">Other</option>
                              </select>
                            </div>
                            @endif
                            @if($bilty->receiverphone_id==""&&$bilty->receiver_no	=="")
                            <div id="manual_receivernod">
                              <select   name="receiver_no" id="receiver_no" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                <option value="">Select Sender No</option>
                                @foreach($sender as $value)
                                @foreach($value->phoneno as $number)

                                @if($bilty->receiverphone_id==$number->id)
                                <option selected value="{{$number->id}}">{{$number->number}}</option>
                                @endif

                                @endforeach
                                @endforeach

                                <option value="other">Other</option>
                              </select>
                            </div>
                            @endif
                            @if($bilty->receiver_no	!="")
                            <div id="manual_receivernodiv">
                              <input value="{{$bilty->receiver_no}}"  type="Number" id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver no">
                            </div>
                            @endif
                          </div>

                          <label class="col-sm-2 col-form-label">Reference No 1 </label>
                          <div class="col-sm-2">
                            <input value="{{$bilty->ref_1??''}}" type="Number" id="reference1" name="reference1" class="form-control form-control-round" placeholder="Reference No 2">
                          </div>
                        </div> 

                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Reference No 2 </label>
                          <div class="col-sm-2">
                            <input value="{{$bilty->ref_2??''}}" type="Number" id="reference2" name="reference2" class="form-control form-control-round" placeholder="Reference No 2">
                          </div> 

                          <label class="col-sm-2 col-form-label">Delivery Mode</label>
                          <div class="col-sm-2">

                            <select onchange="showdeliverybox()"   name="delivery_mode" id="deliverydropdown" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                              <option value="">Select Delivery Mode</option>

                               <option @if($bilty->delivery_mode == 'home_delivery') selected @endif value="home_delivery">Home Delivery</option>
                                <option @if($bilty->delivery_mode == 'good_transport') selected @endif value="good_transport">goodtransport</option>
                             </select>
                          </div>  
                          <label class="col-sm-2 col-form-label">Delivery Address</label>
                          <div class="col-sm-2">
                            
                            <div id="addressmanual" @if($bilty->delivery_mode == 'home_delivery') style="display: block" @else style="display: none" @endif>
                              <textarea name="home_delivery_address" placeholder="Enter Delivery Address" class="form-control-round form-control">{{$bilty->delivery_address ?? ''}}</textarea>
                           
                            </div>
                         <div id="addressdynamic" @if($bilty->delivery_mode == 'good_transport') style="display: block" @else style="display: none" @endif>
                           <textarea name="good_transport_address" placeholder="Auto fetch Address" id="stationDeliveryAddress" class="form-control-round form-control">{{$bilty->delivery_address ?? ''}}</textarea>
                         </div>
                          </div>    
                        </div>


                         <div class="form-group row">

  
                          <label class="col-sm-2 col-form-label">Note</label>
                          <div class="col-sm-3">
                            <div id="note">
                              <textarea name="note" placeholder="Enter Your Note" class="form-control-round form-control" rows="4" cols="50">{{$bilty->note ?? ''}}</textarea>
                           
                         </div>



                         </div>
                         </div>


                        <div class=" form-group row input_fields_wrap1" style="border:1px solid #dedede">
                          <div class="col-md-12 text-center">
                            <input type="radio" name="calType" @if($bilty->by_type == 'qty') checked @endif value="qty" class="calType" > By Quantity
                            <input type="radio" name="calType" @if($bilty->by_type == 'weight') checked @endif value="weight" class="calType"> By Weight
                            <input type="radio" name="calType" @if($bilty->by_type == 'lumpsum') checked @endif value="lumpsum" class="calType"> By LumpSum
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
                                @php $count = 0; @endphp
                                @foreach($biltymeta as $value)
                                <tr>
                                  <td><input type="text" value="{{$value->quantity??''}}" id="quantity" name="quantity[]"  class="form-control quantity" style="width:110px !important;border-radius:50px;border-radius:50px"></td>
                                  <td>
                                    <select style="width:110px"  required name="packing[]" id="packing" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary packing">
                                     <option value="">Select Sender No</option>
                                     @foreach($packages as $pack)
                                       @foreach($pack->packages_metas as $packagemeta)

                                         @if($value->packing_id==$packagemeta->id)
                                         <option selected value="{{$packagemeta->id}}">{{$packagemeta->package_name}}</option>
                                         @endif
                                         
                                         @if($value->packing_id!=$packagemeta->id)
                                         <option  value="{{$packagemeta->id}}">{{$packagemeta->package_name}}</option>
                                         @endif

                                       @endforeach
                                     @endforeach

                                   </select>
                                 </td>
                                 <td><input value="{{$value->description??''}}" type="text" id="good" name="good[]"  class="form-control" style="width:300px !important;border-radius:50px"></td>
                                 <td><input type="text" value="{{$value->brand??''}}" id="brand" name="brand[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
                                 <td><input type="text" value="{{$value->rate??''}}" id="rate" name="rate[]"  class="form-control rate" style="width:110px !important;border-radius:50px;border-radius:50px"></td>
                                 <td><input type="text" value="{{$value->weight??''}}" id="weight" name="weight[]"  class="form-control weight" style="width:110px !important;border-radius:50px"></td>
                                 <td >@if($count == 0)<button style="height: 47px;"  class="add_field_button1">Add More </button>@else <button style="height: 47px;" class="remove_field">Remove </button> @endif
                                 </td>
                               </tr>
                               @php $count++; @endphp
                               @endforeach
                             </tbody>
                           </table>
                         </div>
                       </div>


                       <div class="form-group row" id="lumpsum_amount" style="display: none;">
                          <label class="col-sm-2 col-form-label">LUMPSUM AMOUNT</label>
                          <div class="col-sm-2" >
                            <input type="number" value="{{$bilty->total_charges-$bilty->rent-$bilty->labour-$bilty->tt-$bilty->local_charges-$bilty->crane_charges-$bilty->home_delivery-$bilty->other_charges??''}}"  name="lumpsum_amount" class="form-control form-control-round lumpsum_input" placeholder="Enter LumpSum Amount" >
                          </div>
                        </div>

                       <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Rent</label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" value="{{$bilty->rent??''}}"  type="text" id="rent" name="rent" class="form-control form-control-round" placeholder="Rent">
                        </div>  
                        <label class="col-sm-2 col-form-label">Labour</label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" value="{{$bilty->labour??''}}"  type="text"   id="Labour" name="Labour"  class="form-control form-control-round" placeholder="Labour">
                        </div>
                        <label class="col-sm-2 col-form-label">TT</label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" type="text" value="{{$bilty->tt??''}}" id="tt" name="tt" class="form-control form-control-round" placeholder="TT">
                        </div>
                      </div> 

                      <div class="form-group row">

                        <label class="col-sm-2 col-form-label">Local Charges</label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" type="text" value="{{$bilty->local_charges??''}}"  id="local_charges" name="local_charges"  class="form-control form-control-round" placeholder="Local Charges">
                        </div>
                        <label class="col-sm-2 col-form-label">Lifter Crane charges</label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" type="text" value="{{$bilty->crane_charges??''}}" id="lifter" name="lifter" class="form-control form-control-round" placeholder="Lifter Crane charges">
                        </div>  
                        <label class="col-sm-2 col-form-label">Home Delivery </label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" type="text" value="{{$bilty->home_delivery??''}}"  id="home_delivery" name="home_delivery"  class="form-control form-control-round" placeholder="Home Delivery Charges">
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Other Charges</label>
                        <div class="col-sm-2">
                          <input  onchange="myamount()" type="text" value="{{$bilty->other_charges??''}}"  id="other_charges" name="other_charges" class="form-control form-control-round" placeholder="Other Charges">
                        </div>  
                        <label class="col-sm-2 col-form-label">Total Amount</label>
                        <div class="col-sm-2">
                          <input  readonly="true" type="text" value="{{$bilty->total_charges??''}}"  id="total_amount" name="total_amount"  class="form-control form-control-round" placeholder="Total Amount ">
                        </div>
                        <label class="col-sm-2 col-form-label">Advance</label>
                        <div class="col-sm-2">
                          <input onchange="myamountadvance()"  type="text" value="{{$bilty->advance??''}}" id="advance" name="advance" class="form-control form-control-round" placeholder=" Advance">
                        </div> 
                      </div> 

                      <div class="form-group row"> 
                        <label class="col-sm-2 col-form-label">Balance</label>
                        <div class="col-sm-2">
                          <input  readonly="true" type="text" value="{{$bilty->balance??''}}"  id="balance" name="balance"  class="form-control form-control-round" placeholder="Balance ">
                        </div>
                      </div> 

                      <br>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-2">
                          <button type="Reset" style="" class="btns_reset" >Reset</button>
                        </div>

                        <!-- <label class="col-sm-2 col-form-label"></label> -->
                        <div class="col-sm-2">
                          <button type="button" id="calculate" class="btns_reset" style="background-color: #029a7a !important;">Calculate</button>
                        </div>

                        <div class="col-sm-2">
                          <button type="submit" style="" class="btns_save">Update</button>
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" name="savenprint" value="savenprint" style="" class="btns_save">Update & Print</button>
                        </div>  
                      </div>
                    </form>

                    <form enctype="multipart/form-data" action="{{ route('updatetopaybiltywalkin') }}" method="post" class="bg-white post-form-validation topay-walkin" id="post-form-validation" enctype="multipart/form-data">
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

                              <input value="ToPay" type="radio" name="biltytype" @if($bilty->bilty_type == 'ToPay') checked @endif> To Pay
                            </label>
                            <label class="radio-inline">
                              <input type="radio" value="Paid" name="biltytype"  @if($bilty->bilty_type == 'Paid') checked @endif> Paid
                            </label>
                            <label class="radio-inline">
                              <input  type="radio" value="Advance" name="biltytype"  @if($bilty->bilty_type == 'advance') checked @endif> Advance
                            </label>
                          </div>

                       

                        </div> 

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Computer Number</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="Number" value="{{$bilty->id??''}}"  id="computer" name="computer"  class="form-control form-control-round" placeholder="Computer No">
                          </div>

                          <label class="col-sm-2 col-form-label">Bilty No</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="Number" value="{{$bilty->bilty_no??''}}" id="bilty" name="bilty" class="form-control form-control-round" placeholder="Bilty No">
                          </div> 
                          <label class="col-sm-2 col-form-label">Date</label>
                          <div class="col-sm-2">
                            <input value="{{date('Y-m-d',strtotime($bilty->date))}}"  type="date"   class="form-control form-control-round" name="date">
                          </div>     
                        </div> 


                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Sender Name</label>
                          <div class="col-sm-2">
                            <div id="manual_senderdiv">
                              <input type="text" id="manual_sender" name="manual_sender" class="form-control form-control-round" placeholder="sender name" required="" value="{{$bilty->sender_name}}">
                            </div>
                          </div>    

                          <label class="col-sm-2 col-form-label">Sender No</label>
                          <div class="col-sm-2">
                            <div id="manual_sendenodiv">
                              <input  type="text" id="manual_senderno" name="manual_senderno" class="form-control form-control-round" placeholder="sender no" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="" value="{{$bilty->sender_no}}">
                            </div>
                          </div>


                          <label class="col-sm-2 col-form-label">Karachi To</label>
                          <div class="col-sm-2">

                            <input type="text" id="karachi_to" name="karachi_to" class="form-control form-control-round" placeholder="Station" required="" value="{{$bilty->station_name}}">

                          </div>  

                        </div> 




                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Receiver Name</label>
                          <div class="col-sm-2">
                           
                            <div id="manual_receiverdiv">
                              <input  type="text" id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver name" required="" value="{{$bilty->receiver_name}}">
                            </div>
                          </div>

                          <label class="col-sm-2 col-form-label">Receiver No</label>
                          <div class="col-sm-2">
                            <div id="manual_receivernodiv">
                              <input  type="text" id="manual_receiver" name="manual_receiverno" class="form-control form-control-round" placeholder="receiver no"  maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$bilty->receiver_no}}">
                            </div>
                          </div>

                          <label class="col-sm-2 col-form-label">Reference No 1 </label>
                          <div class="col-sm-2">
                            <input   type="Number" id="reference1" name="reference1" class="form-control form-control-round" placeholder="Reference No 2" value="{{ $bilty->ref_1 }}">
                          </div>
                        </div> 

                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Reference No 2 </label>
                          <div class="col-sm-2">
                            <input   type="Number" id="reference2" name="reference2" class="form-control form-control-round" placeholder="Reference No 2" value="{{ $bilty->ref_2 }}">
                          </div>  
                          
                          <label class="col-sm-2 col-form-label">Note</label>
                          <div class="col-sm-3">
                            <div id="note">
                              <textarea name="note" placeholder="Enter Your Note" class="form-control-round form-control" rows="4" cols="50">{{$bilty->note}}</textarea>
                           
                         </div>



                         </div>  
                        </div>


                        <div class=" form-group row input_fields_wrap1" style="border:1px solid #dedede">
                          <div class="table-responsive">
                           <div class="col-md-12 text-center">
                             <input type="radio" name="walkincalType" @if($bilty->by_type == 'qty') checked @endif value="qty" class="walkincalType" > By Quantity
                            <input type="radio" name="walkincalType" @if($bilty->by_type == 'weight') checked @endif value="weight" class="walkincalType"> By Weight
                            <input type="radio" name="walkincalType" @if($bilty->by_type == 'lumpsum') checked @endif value="lumpsum" class="walkincalType"> By LumpSum

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
                                @php $count = 0; @endphp
                                @foreach($walkinbiltymeta as $value)
                                <tr>
                                  <td><input type="text" value="{{$value->quantity??''}}" id="walkinquantity" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" style="width:110px !important;border-radius:50px;border-radius:50px" data-attr="0"></td>
                                  <td>
                                    <input required type="text" id="walkinpacking" value="{{$value->packing??''}}" name="packing[]"  class="form-control packing" style="width:200px !important;border-radius:50px">
                                 </td>
                                 <td><input value="{{$value->description??''}}" type="text" id="walkingood" name="good[]"  class="form-control" style="width:200px !important;border-radius:50px"></td>
                                 <td><input type="text" value="{{$value->brand??''}}" id="walkinbrand" name="brand[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
                                 <td><input type="text" value="{{$value->rate??''}}" id="walkinrate" name="rate[]" class="form-control rate" style="width:110px !important;border-radius:50px"></td>
                                 <td><input type="text" value="{{$value->weight??''}}" id="walkinweight" name="weight[]"  class="form-control weight" style="width:110px !important;border-radius:50px"></td>
                                 <td >@if($count == 0)<button style="height: 47px;"  class="add_field_button1">Add More </button>@else <button style="height: 47px;" class="remove_field">Remove </button> @endif
                                 </td>
                               </tr>
                               @php $count++; @endphp
                               @endforeach

                              </tbody>
                            </table>
                          </div>
                        </div>


                        <div class="form-group row" id="walkinlumpsum_amount" >
                          <label class="col-sm-2 col-form-label">LUMPSUM AMOUNT</label>
                          <div class="col-sm-2" >
                            <input type="number" value="{{$bilty->total_charges-$bilty->rent-$bilty->labour-$bilty->tt-$bilty->local_charges-$bilty->crane_charges-$bilty->home_delivery-$bilty->other_charges??''}}"  name="walkinlumpsum_amount" class="form-control form-control-round walkinlumpsum_input" placeholder="Enter LumpSum Amount" >
                          </div>
                        </div>



                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Rent</label>
                          <div class="col-sm-2" >
                            <input  onchange="myamount()" type="number" value="{{$bilty->rent??''}}" id="walkinrent" name="rent" class="form-control form-control-round" placeholder="Rent" >
                          </div>  
                          <label class="col-sm-2 col-form-label">Labour</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="walkinLabour" name="Labour"  class="form-control form-control-round" placeholder="Labour" value="{{$bilty->labour??''}}">
                          </div>
                          <label class="col-sm-2 col-form-label">TT</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="walkintt" name="tt" class="form-control form-control-round" placeholder="TT" value="{{$bilty->tt??''}}">
                          </div>
                        </div> 


                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Local Charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="walkinlocal_charges" name="local_charges"  class="form-control form-control-round" placeholder="Local Charges" value="{{$bilty->local_charges??''}}">
                          </div>
                          <label class="col-sm-2 col-form-label">Lifter Crane charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="walkinlifter" name="lifter" class="form-control form-control-round" placeholder="Lifter Crane charges" value="{{$bilty->crane_charges??''}}">
                          </div>  
                          <label class="col-sm-2 col-form-label">Home Delivery </label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number"  id="walkinhome_delivery" name="home_delivery"  class="form-control form-control-round" placeholder="Home Delivery Charges" value="{{$bilty->home_delivery??''}}">
                          </div>
                        </div> 





                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Other Charges</label>
                          <div class="col-sm-2">
                            <input onchange="myamount()" type="number" id="walkinother_charges" name="other_charges" class="form-control form-control-round" placeholder="Other Charges" value="{{$bilty->other_charges??''}}">
                          </div>  
                          <label class="col-sm-2 col-form-label">Total Amount</label>
                          <div class="col-sm-2">
                            <input readonly="true" type="number"  id="walkintotal_amount" name="total_amount"  class="form-control form-control-round" placeholder="Total Amount" value="{{$bilty->total_charges??''}}" required="">
                          </div>
                          <label class="col-sm-2 col-form-label">Advance</label>
                          <div class="col-sm-2">
                            <input onchange="myamountadvance()" type="number" id="walkinadvance" name="advance" class="form-control form-control-round" placeholder=" Advance" value="{{$bilty->advance??''}}">
                          </div> 
                        </div> 

                        <div class="form-group row"> 
                          <label class="col-sm-2 col-form-label">Balance</label>
                          <div class="col-sm-2">
                            <input  readonly="true" type="number"  id="walkinbalance" name="balance"  class="form-control form-control-round" placeholder="Balance" value="{{$bilty->balance??''}}" required="">
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

                  </div>
                  <div class="card-block">
                    <div class="card-block table-border-style">
                      <div class="table-responsive">

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
@include('includes/footer')
<script type="text/javascript">
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
  function getvalue(t) {
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
  }

//   $(document).ready(function() {
//     var max_fields      = 10;
//     var wrapper       = $(".input_fields_wrap1"); 
//     var add_button      = $(".add_field_button1"); 
//     var x = 1; 
//     $(add_button).click(function(e){ 
//       e.preventDefault();
//       if(x < max_fields){ 
//         x++; 

//         $('.package').append('<tr><td ><input type="text" id="quantity[]" name="quantity[]"  class="form-control quantity" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><select style="width:110px"  required name="packing[]" id="packing" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary packing"></select></td><td ><input type="text" id="description[]" name="good[]"  class="form-control" placeholder="" style="width:300px !important;border-radius:50px"></td><td ><input type="text" id="brand[]" name="brand[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td><input type="text" readonly="" id="rate" name="rate[]"  class="form-control rate" style="width:110px !important;border-radius:50px;border-radius:50px"></td><td ><input type="text" id="weight[]" name="weight[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><button class="remove_field " style=""> Remove</button></tr>');
//         var  packages = $(".packing");
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
//             //$('#category_id').selectpicker('refresh');


//           }
//         });
//       }
//     });
// $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
//   e.preventDefault(); $(this).parents('tr').remove(); x--;
// })
// });

  $(document).ready(function() {
    var max_fields      = 10;
    var wrapper       = $(".input_fields_wrap1"); 
    var add_button      = $(".add_field_button1"); 
    var add_button_walkin = $(".add_field_button1_walkin");
    var x = 1; 
    optionpackages = '';
    $(add_button).click(function(e){ 
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
              // packages.html(optionpackages);
              //$('#category_id').selectpicker('refresh');
            }
        });

        $('.package').append('<tr><td ><input type="text" id="quantity[]" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" placeholder="" style="width:110px !important;border-radius:50px" data-attr="0"></td><td class="packingTd"><select style="width:110px"  required name="packing[]" onchange="saveDisable()" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary packing">'+optionpackages+'</select></td><td ><input type="text" id="description[]" name="good[]"  class="form-control" placeholder="" style="width:300px !important;border-radius:50px"></td><td ><input type="text" id="brand[]" name="brand[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="rate[]" name="rate[]"  class="form-control rate" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="weight[]" name="weight[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><button class="remove_field " style=""> Remove</button></tr>');
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
      e.preventDefault();
      if(x < max_fields){ 
        x++; 

        $('.package_walkin').append('<tr><td ><input type="text" id="walkinquantity" onchange="saveDisable()" name="quantity[]"  class="form-control quantity" placeholder="" style="width:110px !important;border-radius:50px" data-attr="0"></td><td class="packingTd"><input required type="text" id="walkinpacking" name="packing[]"  class="form-control packing" style="width:200px !important;border-radius:50px"></td><td ><input type="text" id="walkindescription" name="good[]"  class="form-control" placeholder="" style="width:200px !important;border-radius:50px"></td><td ><input type="text" id="walkinbrand" name="brand[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="walkinrate" name="rate[]"  class="form-control rate" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="walkinweight" name="weight[]"  class="form-control weight" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><button class="remove_field " style=""> Remove</button></tr>');
      
      }
    });
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
  e.preventDefault(); $(this).parents('tr').remove(); x--;
})
});


  function myFunctionsender() {
    var amount = $("#sender_name").val();

    var other_deduction = $("#sender_no");
    var station = $("#karachi_to");
    var  packages = $(".packing");
  // document.getElementById("addressdynamic").style.display='none';
  // document.getElementById("addressmanual").style.display='none';
    // console.log(amount);

    if(amount=="other")
    {
      //  alert("nothing");

      document.getElementById("manual_senderdiv").style.display='block';
      document.getElementById("manual_sendenodiv").style.display='block';
      document.getElementById("manual_senderd").style.display='none';
      document.getElementById("manual_sendenod").style.display='none';
    }
    else
    {
      // alert('Hit ajazx');

      document.getElementById("manual_senderdiv").style.display='none';
      document.getElementById("manual_sendenodiv").style.display='none';
      document.getElementById("manual_senderd").style.display='block';
      document.getElementById("manual_sendenod").style.display='block';
     
      $.ajax({
        url:'{{URL::to('mehmoodgoodemployee/getcategoriesdropdown')}}',
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
       
    /* $.ajax({
        url:'{{URL::to('mehmoodgoodemployee/getstationdropdown')}}',
        type:'GET',
        async: false,
        data: { id: $('#sender_name').val() },
        success:function(data){
       
          var optionstation ='<option value="">Select Station</option>';
          for(var i=0;i<data.length;i++){
            for(var j=0;j<data[i].stationdetail.length;j++){

              optionstation += '<option value="'+ data[i].stationdetail[j].id +'">' +data[i].stationdetail[j].station_name + '</option>';
            }
          }
          station.html(optionstation);
            //$('#category_id').selectpicker('refresh');


          }
        }); */
     


    }

  }

  function myFunctionreceiver() {
    var amount = $("#receiver_name").val();
    // alert(amount);

    var other_deduction = $("#receiver_no");
    if(amount!==null)
    {

    $.ajax({
      url:'{{URL::to('mehmoodgoodemployee/getcategoriesdropdown')}}',
      type:'GET',
      async: false,
      data: { id: $('#receiver_name').val() },
      success:function(data){

        var option ='<option value="">Select Phone</option>';
        for(var i=0;i<data.length;i++){
          option += '<option value="'+ data[i].id +'">' + data[i].number + '</option>';
        }
        other_deduction.html(option);
            //$('#category_id').selectpicker('refresh');


          }
        });
    }
    else{
      Swal.fire({
      title: 'Sorry!',
      html: '<strong>Reciever not Found!</strong>',
      type: 'warning',
      showConfirmButton: false,
      timer: 3000,
    })
    }

  }


  $(document).on("change","#karachi_to", function(e){ //user click on remove text
  var id = $(this).val();
  // console.log(id);
  var data = {
    id : id,
  }
  // console.log(id);
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
    // console.log('in');
    document.getElementById("addressmanual").style.display='none';
    document.getElementById("addressdynamic").style.display='block';
    $.ajax({
      url:'{{URL::to('mehmoodgoodemployee/getstationaddress')}}',
      type:'GET',
      async: false,
      data: { id: id },
      success:function(data){
        var dropdown = $("#deliverydropdown").val();
        // console.log(dropdown);
        if(dropdown=="home_delivery"){
          document.getElementById("addressmanual").style.display='block';
          document.getElementById("addressdynamic").style.display='none';
        }
        else if(dropdown=="good_transport"){
          var sid = $('#karachi_to').find(':selected').val();
          if(sid == null || sid == ''){
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
            $.ajax({
              url:'{{URL::to('mehmoodgoodemployee/getstationaddress')}}',
              type:'GET',
              async: false,
              data: { id: sid },
              success:function(data){
                $('textarea#stationDeliveryAddress').val(data.address_1);
              }
            });
            document.getElementById("addressmanual").style.display='none';
            document.getElementById("addressdynamic").style.display='block';
          }
        }

        else{
          document.getElementById("addressmanual").style.display='none';
          document.getElementById("addressdynamic").style.display='none';
        }
        // alert(data);
        $('textarea#stationDeliveryAddress').val(data.address_1);
      }
    });
  }
})




function showdeliverybox() {
  var dropdown = $("#deliverydropdown").val();
  var stationid = $("#karachi_to").val();
  if(dropdown=="home_delivery"){
    document.getElementById("addressmanual").style.display='block';
    document.getElementById("addressdynamic").style.display='none';
  }
  else if(dropdown=="good_transport"){
    var sid = $('#karachi_to').find(':selected').val();
    if(sid == null || sid == ''){
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
      $.ajax({
        url:'{{URL::to('mehmoodgoodemployee/getstationaddress')}}',
        type:'GET',
        async: false,
        data: { id: sid },
        success:function(data){
          // console.log(data);
          $('textarea#stationDeliveryAddress').val(data.address_1);
        }
      });
      document.getElementById("addressmanual").style.display='none';
      document.getElementById("addressdynamic").style.display='block';
    }
  }
  else{
    document.getElementById("addressmanual").style.display='none';
    document.getElementById("addressdynamic").style.display='none';
  }
}


 $(document).on("click","#deletebilty", function(e){ //user click on remove text
  var id = $(this).attr('data-deleteId');
  // console.log(id);
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
 //for onchange on all amount accept advance
 // var total = 0;
 function myamount()
 {

     // total +=+$("#rent").val();
     // total +=+$("#Labour").val();
     // total +=+$("#tt").val();
     // total +=+$("#local_charges").val();
     // total +=+$("#lifter").val(); 
     // total +=+$("#home_delivery").val();
     // total +=+$("#other_charges").val();
     
     // $("#total_amount").val(total);
     // $("#balance").val(total);
     
     
   }
    //for onchange on advance
    function myamountadvance()
    {
     total+=+$("#advance").val();
     $("#balance").val(total);    
   }

    //For Rate
    $(document).on('change', '.packing', function(event){

      var pid = $(this).find(':selected').val();
      var cid = $('#sender_name').find(':selected').val();
      var sid = $('#karachi_to').find(':selected').val();
      $(event.target).parent('td').parent('tr').find('.rate').val(0);
      $.ajax({
        url: "{{ url('/mehmoodgoodemployee/BiltyRateList') }}/"+cid+"/"+sid+"/"+pid,
        type: "get",
      //data: {id : $(this).find(':selected').attr("data-id")}, 
      success: function(result) {

        // $("#div1").html(result);
        if(result['rate'] > 0){


          $(event.target).parent('td').parent('tr').find('.rate').val(result['rate']);

          // var qrate = parseFloat($(event.target).parent('td').parent('tr').find('.quantity').val()*result['rate']);
          // let total = parseFloat($('#total_amount').val());

          // console.log(qrate);
          // console.log(total);
          // $('#total_amount').val(qrate+total);

          // $(event.target).parent('td').parent('tr').find('.quantity').data('attr',(qrate+total));
        }else{
          $(event.target).parent('td').parent('tr').find('.rate').val(0);
        }
       // $(this).parent('tr').find('.rate').val(result['rate']);
     }
   });
    });
//for onchange on all amount accept advance


//for onchange on advance
function myamountadvance()
{
  total+=+$("#advance").val();
  $("#balance").val(total);
}
$(document).ready(function(){
  $('.btns_save').attr('disabled',false);
 
})

$('#calculate').click(function(){
 // $('.btns_save').attr('disabled',false);
  $('.btns_save').css('opacity','1');
  pckgRate = 0;

//   $('.package tr').each(function(){
//     qty = $(this).find('.quantity').val();
//     rate = $(this).find('.rate').val();
// // console.log(qty);
// // console.log(rate);

//     pckgRate += parseFloat(qty*rate);
// // console.log(pckgRate);
    
//   });

  if($('input[name="calType"]:checked').val() == "qty"){
    $('#rent').prop('readonly', true);
    
    $('#total_amount').prop('readonly', true);
    $('.package tr').each(function(){
      qty = $(this).find('.quantity').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(qty*rate);
       $('#rent').val(pckgRate);
      
    });
  
  } else if($('input[name="calType"]:checked').val() == "weight"){
    // alert('in');
    $('#rent').prop('readonly', true);

    $('#total_amount').prop('readonly', true);
    $('.package tr').each(function(){
      weight = $(this).find('.weight').val();
      rate = $(this).find('.rate').val();
      // alert(weight);
      // alert(rate);s
      pckgRate += parseFloat(weight*rate);
      $('#rent').val(pckgRate);
    
      
    });

  } else if($('input[name="calType"]:checked').val() == "lumpsum"){
    
    $('#total_amount').prop('readonly', true);
    $('#rent').prop('readonly', false);
    
  }
// console.log(pckgRate);
  rent = parseFloat($('#rent').val()) || 0;
  labour = parseFloat($('#Labour').val()) || 0;
  local_charges = parseFloat($('#local_charges').val()) || 0;
  lifter = parseFloat($('#lifter').val()) || 0;
  home_delivery = parseFloat($('#home_delivery').val()) || 0;
  other_charges = parseFloat($('#other_charges').val()) || 0;
  tt = parseFloat($('#tt').val()) || 0;
// console.log(pckgRate);
  
    if($('input[name="calType"]:checked').val() == "lumpsum"){

      sum = parseFloat(parseInt($('.lumpsum_input').val())+labour+local_charges+lifter+home_delivery+other_charges+tt);
      $('#total_amount').val(sum);
    }else{
      sum = parseFloat(pckgRate+labour+local_charges+lifter+home_delivery+other_charges+tt);
      $('#total_amount').val(sum);
    }

  // sum = parseFloat(pckgRate+rent+labour+local_charges+lifter+home_delivery+other_charges+tt);
  // $('#total_amount').val(sum);

  advance = parseFloat($('#advance').val());
// console.log(sum);
// console.log(advance);
    var balance = parseFloat(sum-advance) || 0;

  $('#balance').val(balance);
  $('.btns_save').prop('disabled', false);
});


$('#calculatewalkin').click(function(){
  pckgRate = 0;

  if($('input[name="walkincalType"]:checked').val() == "qty"){
     $('#walkinrent').prop('readonly', true);
    
    $('#walkintotal_amount').prop('readonly', true);
    $('.package_walkin tr').each(function(){
      qty = $(this).find('.quantity').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(qty*rate);
     // alert(pckgRate);
      $('#walkinrent').val(pckgRate);
      
    });
  
  } else if($('input[name="walkincalType"]:checked').val() == "weight"){
     $('#walkinrent').prop('readonly', true);
    
    $('#walkintotal_amount').prop('readonly', true);
    $('.package_walkin tr').each(function(){
      weight = $(this).find('.weight').val();
      rate = $(this).find('.rate').val();

      pckgRate += parseFloat(weight*rate);
       $('#walkinrent').val(pckgRate);
      
    });

  } else if($('input[name="walkincalType"]:checked').val() == "lumpsum"){
     $('#walkinrent').prop('readonly', false);
    $('#walkintotal_amount').prop('readonly', true);
  
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
      
      sum = parseFloat(parseInt($('.walkinlumpsum_input').val())+labour+local_charges+lifter+home_delivery+other_charges+tt);
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
 // $('.btns_save').attr('disabled',true);
  $('.btns_save').css('opacity','0.5');
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

$(document).ready(function(){
  var walkin_value = $('#walkin_value').val();
  if(walkin_value == 1){
    $('.topay-walkin').show();
    $('.topay-normal').hide();
  }
  else{
    $('.topay-walkin').hide();
    $('.topay-normal').show();
  }
});


$('input[type=radio][name=calType]').change(function() {
    if (this.value == 'lumpsum') {
      $('#lumpsum_amount').show();
    }
    else {
      $('#lumpsum_amount').hide();
    }
});
$('input[type=radio][name=walkincalType]').change(function() {
    if (this.value == 'lumpsum') {
      $('#walkinlumpsum_amount').show();
    }
    else {
      $('#walkinlumpsum_amount').hide();
    }
});

</script>