
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
<style>
.form-control {
font-size: 16px;
font-weight: bold;
color: black;
}

</style>
<br>
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>Paid Receipt</h4>
<div class="col-sm-3 col-sm-push-4">
  <span id="customerbalance"></span>
</div>
</div>
<div class="card-block">
<div style="display: none" id="myElem" class="alert alert-info"> {{"Your enter amount is lesser than actual amount"}} </div> 
 @if(Session::has('message'))  @endif
 @if(Session::has('error')) <div class="alert alert-danger"> 
{{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> 
  @endif
 <form enctype="multipart/form-data" action="{{ route('createpaidreceipt') }}" method="post" class="bg-white post-form-validation topay-normal" id="post-form-validation" enctype="multipart/form-data">
 <input type="hidden" value="{{ csrf_token() }}" name="_token" />
 <meta name="csrf-token" content="{{csrf_token()}}">

<div class="form-group row">

<label class="col-sm-2 col-form-label">Customer Type</label>
<div class="col-sm-4">
<select onchange="getcustomertype(this)" id="customer_type" name="customer_type"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Customer Type</option>
@if($records[0]->getcustomer[0]->customer_type=="Paid")
<option selected value="Paid">Paid</option>
<option value="ToPay">ToPay</option>
@endif
@if($records[0]->getcustomer[0]->customer_type=="ToPay")
<option selected  value="Paid">Paid</option>
<option value="ToPay">ToPay</option>
@endif

</select>

  </div>  
   <label class="col-sm-2 col-form-label">Date</label>
  <div class="col-sm-2">
  <input value="{{$records[0]->date}}"  required type="text" class="form-control form-control-round txtDate"  name="date"  >
  </div>   
</div>    


<div class="form-group row">
<label class="col-sm-2 col-form-label">Select Customer</label>
<div class="col-sm-4">
 <select onchange="getcustomerbalance(this)"   name="customer_id" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
  <option value="">Select Customer Name</option>
   @foreach($customer as $value)
   @if($records[0]->getcustomer[0]->id==$value->id)
  <option selected value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name}}</option>
   @endif
    @if($records[0]->getcustomer[0]->id!=$value->id)
   <option value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name}}</option>
   @endif
   @endforeach
                               
   </select>
</div>
<label class="col-sm-2 col-form-label">Previous Balance</label>
<div class="col-sm-4">
 <input readonly="true" type="text"  id="prevbalance" name="prevbalance" class="form-control form-control-round" placeholder="Enter Balance" >
</div>   
     
  </div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Payment Type</label>
<div class="col-sm-4">
<select onchange="getpaymenttype(this)"  name="paymenttype" id="paymenttype"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Payment Type</option>
@foreach($paymenttype as $value)
@if($records[0]->payment_id==$value->id)
<option selected value="{{$value->id}}">{{$value->name}}</option>
@endif
@if($records[0]->payment_id!=$value->id)
<option value="{{$value->id}}">{{$value->name}}</option>
@endif
@endforeach
</select></div>

<label class="col-sm-2 col-form-label">Balance</label>
<div class="col-sm-4">
 <input readonly="true" type="text"  id="balance" name="balance" class="form-control form-control-round" placeholder="Enter Balance" >
</div>    
</div> 
@if($records[0]->payment_id==2)
<div id="bank"  class="form-group row">
<label class="col-sm-2 col-form-label">Bank</label>
<div class="col-sm-4">
<select name="bankid" id="bankid" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Bank</option>
@foreach($bank as $value)
@if($records[0]->bank_id==$value->id)
<option selected value="{{$value->id}}">{{$value->name}}</option>
@endif
@if($records[0]->bank_id!=$value->id)
<option value="{{$value->id}}">{{$value->name}}</option>
@endif
@endforeach
</select></div>

<label class="col-sm-2 col-form-label">Cheque no</label>
<div class="col-sm-4">
 <input  type="text" value="{{$records[0]->cheque_no ??''}}"  id="chequeno" name="chequeno" class="form-control form-control-round" placeholder="Enter Cheque no" >
</div>    
</div> 
@endif




<div class="form-group row">
<label class="col-sm-2 col-form-label">Amount</label>
<div class="col-sm-4">
 <input type="text" value="{{$records[0]->enter_amount ??''}}" id="amount" onchange="changeamount()" name="amount"  class="form-control form-control-round" placeholder="Enter Amount">
</div>
   


<label class="col-sm-2 col-form-label">Total amount</label>
<div class="col-sm-4">
 <input readonly="true" value="{{$records[0]->total_amount ??''}}" type="text" id="billamount" name="billamount"  class="form-control form-control-round" placeholder="Enter Amount">
</div> 
</div>
 <table class="table table-bordered" id="dynamic_field" >

</table>
</div>

<div class="form-group row">
<div class="col-sm-2">
<button id="showbill" type="button" onclick="myFunction()" style="" class="btns_save">Show Bills</button>
</div>
</div>


<br>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
 <button type="Reset" style="" class="btns_reset" >Reset</button>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
 <button id="savebutton" type="submit" style="" class="btns_save">Save</button>
</div>    
</div>
<!-- 
<div class="form-group row">
<div class="col-sm-2 col-md-pull-9"></div>
<div class="col-sm-2 col-md-pull-9">
 <button type="Reset" style="" class="btns_reset">Reset</button>
</div>
<div class="col-sm-1 col-md-pull-9"></div>

<div class="col-sm-2">
 <button type="button" style="" class="btns_save">Save</button>
</div>     
</div>
 -->

</form>


</div>
</div>
<!-- Basic Form Inputs card end -->


<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Paid Receipt</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>

<tr>
<th>S.No</th>


<th>Customer Name</th>
<th>Date</th>

<th>Enter Amount</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
  @if(isset($records))
@foreach($records as $key=>$value)
<tr>

<td>{{$key+1}}</td>
<td>{{$value->date ??''}}</td>
<td>{{$value->getcustomer[0]->customer_name ??''}}</td>
<td>{{$value->enter_amount ??''}}</td>
<td>
 <a href="{{url('/mehmoodgoodemployee/pdf/'.$value->id)}}" target="blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;
 <a href="{{url('/mehmoodgoodemployee/viewpaidreceipt/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
 <a id="deletepaidcustomer" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>
  <a href="{{url('/mehmoodgoodemployee/editpaidreceipt/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
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

@section('script')

</div>
@endsection
<script type="text/javascript">
$(document).ready(function()
    {
    $("#post-form-validation :input").prop("disabled", true);
    });
</script>
@include('includes/footer')<div class="container">
