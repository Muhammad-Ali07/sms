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
<h4>Commission Book</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createcb') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">

<div class="form-group row">

<label class="col-sm-2 col-form-label">Cb Number</label>
<div class="col-sm-2">
<input value="{{$commission[0]->id ??''}}" readonly="true" required type="number" id="cb_number" value="" name="cb_number" class="form-control form-control-round" placeholder=" challan Number">
</div>
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-2">
<input value="{{$commission[0]->date ??''}}" type="text" class="form-control form-control-round txtDate"  name="date" id="date">
</div> 


<label class="col-sm-2 col-form-label">Vehicle number</label>
<div class="col-sm-2">
<select readonly="true" name="truck_num" id="truck_num" value="{{ old('truck_num') }}" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select truck number</option>
@foreach($vehicle as $value)
@if($commission[0]->vehicle_id==$value->id)
<option selected value="{{$value->id}}">{{$value->car_number}}</option>
@endif
@if($commission[0]->vehicle_id!=$value->id)
<option value="{{$value->id}}">{{$value->car_number}}</option>
@endif

@endforeach
</select></div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('truck_num') }}</span>
@endif  
</div>




<div class="form-group row" id="myDIV" >
<div class="table-responsive">
<table class="table">
<thead>
<tr style="width:100%">
<th>S.No</th>
<th>Challan Number</th>
<th>Challan Amount</th>
<th>Description</th>
</tr>
</thead>
<tbody>

@foreach($commissionmetas as $key=>$value)
<tr>
<td>{{$key+1}}</td>
<td>{{$value->getchallanmetas[0]->id??''}}</td>
<td>{{$value->getchallanmetas[0]->total_amount??''}}</td>
<td>{{$value->description??''}}</td>


</tr>
@endforeach
                                                                
</td>
</tr>

</tbody>
</table>

</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Total Receiving</label>
<div class="col-sm-2">
<input readonly="true"  required type="number" id="totalreceiving"  name="totalreceiving" value="{{$commission[0]->totalreceiving ??''}}" class="form-control form-control-round" placeholder="Total Receiving">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('totalreceiving') }}</span>
@endif  
<label class="col-sm-2 col-form-label">Fix Rent</label>
<div class="col-sm-2">
<input  required type="number" id="fixrent"   name="fixrent" value="{{$commission[0]->fixrent ??''}}" class="form-control form-control-round" placeholder="Fix Rent">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('fixrent') }}</span>
@endif 
 <label class="col-sm-2 col-form-label">Cash Receiving</label>
<div class="col-sm-2">
<input  required type="number" id="cash_receiving" value="{{$commission[0]->cash_receiving ??''}}" name="cash_receiving" class="form-control form-control-round" placeholder="Cash Receiving">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('cash_receiving') }}</span>
@endif 
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Commission </label>
<div class="col-sm-2">
<input  required type="text" value="{{$commission[0]->commission ??''}}" id="commission" value="" name="commission" class="form-control form-control-round" placeholder="Commission">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('commission') }}</span>
@endif
<label class="col-sm-2 col-form-label">Remaining Commission</label>
<div class="col-sm-2">
<input required type="text" value="{{$commission[0]->remaining_commission ??''}}" id="remaining_commission" value="" name="remaining_commission" class="form-control form-control-round" placeholder="Remaining Commission">
</div>
@if($errors->any())
<span class="error_span"> {{ $errors->first('remaining_commission') }}</span>
@endif
<label class="col-sm-2 col-form-label">Total Weight</label>
<div class="col-sm-2">
<input readonly="true"  required type="text" id="total_weight"  name="total_weight" value="{{$commission[0]->total_weight ??''}}" class="form-control form-control-round" placeholder="Total Weight">
</div>
@if($errors->any())
<span class="error_span"> {{ $errors->first('total_weight') }}</span>
@endif
</div> 

<br>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ URL::previous() }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
</div>

<label class="col-sm-1 col-form-label"></label>
 
</div>


</form>


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
</div>
</div>

<!-- Warning Section Starts -->


@include('includes/footer')
<div class="container">

<script>
  $("#post-form-validation :input").prop('readonly', true);
 
</script>

</div>

