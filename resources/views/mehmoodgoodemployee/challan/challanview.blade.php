
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
<h4>Challan View</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createchallan') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">

<div class="form-group row">
<label class="col-sm-2 col-form-label">Challan Number</label>
<div class="col-sm-2">
<input value="{{$challan[0]->id ??''}}" readonly="true" required type="number" id="challan_number" value="" name="challan_number" class="form-control form-control-round" placeholder=" challan Number">
</div>

<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-2">
<input value="{{date("d-m-Y")}}" type="text" class="form-control form-control-round txtDate"  name="date">
</div> 
<label class="col-sm-2 col-form-label">Driver Name </label>
<div class="col-sm-2">

@foreach($vehicle as $value)
@if($challan[0]->driver_id==$value->id)

<input value="{{$value->owner_name}}"  required type="text" id="loader_name"  name="loader_name" class="form-control form-control-round" placeholder="Loader Name">

@endif
@endforeach
</select></div>     
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Loader Name</label>
<div class="col-sm-2">
<input value="{{$challan[0]->loader_name??''}}"  required type="text" id="loader_name"  name="loader_name" class="form-control form-control-round" placeholder="Loader Name">
</div>

<label class="col-sm-2 col-form-label">Dispatch Time</label>
<div class="col-sm-2">
<input value="{{$challan[0]->dispatch_time??''}}" required type="time" id="dispatch_time"  name="dispatch_time" class="form-control form-control-round" placeholder="Dispatch Time">
</div> 
<label class="col-sm-2 col-form-label">Karachi To </label>
<div class="col-sm-2">

@foreach($station as $value)
@if($challan[0]->station_id==$value->id)

<input value="{{$value->station_name}}"  required type="text" id="loader_name"  name="loader_name" class="form-control form-control-round" placeholder="Loader Name">

@endif
@endforeach
</select></div>     
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Truck number</label>
<div class="col-sm-2">

@foreach($vehicle as $value)
@if($challan[0]->driver_id==$value->id)

<input value="{{$value->car_number}}"  required type="text" id="loader_name"  name="loader_name" class="form-control form-control-round" placeholder="Loader Name">

@endif
@endforeach
</select></div>

<label class="col-sm-2 col-form-label">Mobile Number</label>
<div class="col-sm-2">
<input value="{{$challan[0]->mobile_number}}" required type="number" id="mobile_num" value="" name="mobile_num" class="form-control form-control-round" placeholder="Mobile Number">
</div> 

<label class="col-sm-2 col-form-label">Malik/Broker</label>
<div class="col-sm-2">
<input value="{{$challan[0]->broker_name}}" type="text" id="malik_bro" value="" name="malik_bro" class="form-control form-control-round" placeholder="Malik/Broker">
</div> 
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Container Number</label>
<div class="col-sm-2">
<input value="{{$challan[0]->cont_number}}" type="text" id="container_num" value="" name="container_num" class="form-control form-control-round" placeholder="Container Number">
</div> 

<label class="col-sm-2 col-form-label">Container seal</label>
<div class="col-sm-2">
<input value="{{$challan[0]->cont_seal}}" type="text" id="container_seal" value="" name="container_seal" class="form-control form-control-round" placeholder=" seal Number">
</div>    
</div>




<div class="form-group row" id="myDIV" >
<div class="table-responsive">
<table class="table table-bordered" id="dynamic_field">
<thead>

  <tr>
    <th>Builty No</th>
    <th>Sender Name</th>
    <th>Receiver Name</th>
    <th>Quantity </th>
    <th>Detail </th>
    <th>Weight </th>
    <th>Rent </th>
    <th>Total</th>  
    <th>Advance</th>
    <th>Balance</th>
    
  </tr>
  </thead>
<tbody>
 @foreach($challanmeta as $value)

 @foreach($value->getbiltydata as $biltyvalue)
 @php
 //for taking sender name and receiver name instead of id
 $sendername = DB::table('customer')->where('id',$biltyvalue->sender_id)->first();
 $receivername = DB::table('customer')->where('id',$biltyvalue->receiver_id)->first();
 @endphp
 <tr>
  <td>{{$biltyvalue->id??''}}</td>
  @if($sendername!="")
  <td>{{$sendername->customer_name??''}}</td>
  @endif
  @if($sendername=="")
  <td>{{$biltyvalue->sender_name}}</td>
  @endif
  @if($receivername!="")
  <td>{{$receivername->customer_name??''}}</td>
  @endif
  @if($receivername=="")
  <td>{{$biltyvalue->receiver_name??''}}</td>
  @endif
  <td>{{$value->bilty_quantity??''}}</td>
  <td>{{$value->getbiltymetadata[0]->description??''}}</td>
  <td>{{$value->getbiltymetadata[0]->weight??''}}</td>
  <td>{{$biltyvalue->rent??''}}</td>
  <td>{{$biltyvalue->total_charges??''}}</td>
  <td>{{$biltyvalue->advance??''}}</td>
  <td>{{$biltyvalue->balance??''}}</td>
 </tr>
 @endforeach
 @endforeach 
</tbody>
</table>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Delivery commission</label>
<div class="col-sm-2">
<input value="{{$challan[0]->delivery_commission}}" type="number" id="delivery" value="" name="delivery" class="form-control form-control-round" placeholder="Delivery commission">
</div>
<label class="col-sm-2 col-form-label">Other charges</label>
<div class="col-sm-2">
<input value="{{$challan[0]->other_charges}}" type="number" id="other_charges" value="" name="other_charges" class="form-control form-control-round" placeholder="Other charges">
</div>
 <label class="col-sm-2 col-form-label">Next Rent</label>
<div class="col-sm-2">
<input value="{{$challan[0]->next_rent}}" type="number" id="next_rent" value="" name="next_rent" class="form-control form-control-round" placeholder="Next Rent">
</div>
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Total amount</label>
<div class="col-sm-2">
<input value="{{$challan[0]->total_amount}}" type="text" id="total_amount" value="" name="total_amount" class="form-control form-control-round" placeholder="Total amount">
</div>

</div> 

<br>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ URL::previous() }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">

</div>    
</div>


</form>


</div>
</div>
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->

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
</div>
</div>

<!-- Warning Section Starts -->

@section('script')
@endsection

@include('includes/footer')<div class="container">
<script type="text/javascript">
$(function () {
$('#datetimepicker1').datetimepicker();
});


</script>
<script>
 $('#post-form-validation *').prop('readonly', true);
 
</script>
</div>

