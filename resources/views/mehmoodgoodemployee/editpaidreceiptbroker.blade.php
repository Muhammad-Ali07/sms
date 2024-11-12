h4>View Paid Receipt Broker</h4>
<div class="col-sm-3 col-sm-push-4">
  <span id="customerbalance"></span>
</div>
</div>
<div class="card-block">
  @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
  @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
  @if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
  @if ($errors->any())
    <div class="alert alert-danger">
     <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </ul>
    </div>
  @endif
<div style="display: none" id="myElem" class="alert alert-info"> {{"Your enter amount is lesser than actual amount therefore your amount will go in balance"}} </div> 

 <form enctype="multipart/form-data" action="{{ route('createpaidreceiptbroker') }}" method="post" class="bg-white post-form-validation topay-normal" id="post-form-validation" enctype="multipart/form-data">
 <input type="hidden" value="{{ csrf_token() }}" name="_token" />
 <meta name="csrf-token" content="{{csrf_token()}}">

<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
  <div class="col-sm-2">
  <input value="{{date("d-m-Y")}}"  required type="text" class="form-control form-control-round txtDate"  name="date"  >
  </div>  
<label class="col-sm-2 col-form-label">Select Customer</label>
<div class="col-sm-4">
 <select value="{{ old('customer_id') }}" onchange="getbrokerbalance(this)"   name="customer_id" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
  <option value="">Select Broker Name</option>
   @foreach($broker as $value)
   @if($value->id==$records->broker_id)
   <option selected value="{{$value->id}}" {{!empty(old('broker_name')) && old('broker_name')==$value->id?"selected":''}}>{{$value->broker_name}}</option>
   @endif
   @endforeach
                               
   </select>
</div>
    
</div>    


<div class="form-group row">
<label class="col-sm-2 col-form-label">Balance Type</label>
<div class="col-sm-4">
 <select value="{{ old('customer_id') }}" onchange="getcustomerbalance(this)"   name="balancetype" id="balancetype" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
  <option value="">Select Balance Type</option>
  @if($records->balance_type=="Payable")
  <option selected value="Payable">Payable</option>
  @endif
   @if($records->balance_type=="Receivable")
  <option selected value="Receivable">Receivable</option>  
   @endif                           
   </select>
</div>
<label class="col-sm-2 col-form-label">Payable</label>
<div class="col-sm-4">
  @if($records->balance_type=="Payable")
 <input value="{{$payable}}" readonly="true" type="text"  id="prevbalance" name="payable" class="form-control form-control-round" placeholder="Enter Balance" >
  @endif
  @if($records->balance_type!="Payable")
  <input value="{{ old('prevbalance') }}" readonly="true" type="text"  id="prevbalance" name="payable" class="form-control form-control-round" placeholder="Enter Balance" >
  @endif
</div>   
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Payment Type</label>
<div class="col-sm-4">
<select value="{{ old('paymenttype') }}" onchange="getpaymenttype(this)"  name="paymenttype" id="paymenttype"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Payment Type</option>
@if($records->payment_type=="Bank")
<option selected value="Bank">Bank</option>
@endif
@if($records->payment_type=="Petty Cash")
<option selected= value="Petty Cash">Petty Cash</option>
@endif
</select></div>

<label class="col-sm-2 col-form-label">Receivable</label>
<div class="col-sm-4">
  @if($records->balance_type=="Receivable") 
  <input value="{{$receivable}}" readonly="true" type="text"  id="receivable" name="receivable" class="form-control form-control-round" placeholder="Enter Balance" >
   @endif 
  @if($records->balance_type!="Receivable")  
  <input value="{{ old('balance') }}" readonly="true" type="text"  id="receivable" name="receivable" class="form-control form-control-round" placeholder="Enter Balance" >
  @endif
</div>    
</div> 
@if($records->payment_type=="Bank")
<div id="bank"  class="form-group row">
@endif
@if($records->payment_type=="Petty Cash")
<div id="bank"  class="form-group row" style="display: none">
@endif
<label class="col-sm-2 col-form-label">Bank</label>
<div class="col-sm-4">
<select value="{{ old('bankid') }}" onchange="getbanktype(this)" name="bankid" id="bankid" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Bank</option>
@foreach($bank_accounts as $value)

     @if($records->branch_id==$value->id)
      <option selected value="{{$value->id}}" data-id="{{ \Crypt::encrypt($value->id) }}">{{$value->branch->bank->name}} | {{$value->branch->name}}</option>
      @endif
    @endforeach

</select></div>

<label class="col-sm-2 col-form-label">Cheque no</label>
<div class="col-sm-4">
 <input value="{{$records->cheque_no ??''}}"  type="text"  id="chequeno" name="chequeno" class="form-control form-control-round" placeholder="Enter Cheque no" >
</div>    
</div> 




<div class="form-group row">
<label class="col-sm-2 col-form-label">Amount</label>
<div class="col-sm-4">
 <input value="{{$records->amount ??''}}" type="text" id="amount" onchange="changeamount()" name="amount"  class="form-control form-control-round" placeholder="Enter Amount">
</div>
   


<label class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-4">
 <input value="{{$records->description ??''}}"  type="text" id="description" name="description"  class="form-control form-control-round" placeholder="Enter Description">
</div> 
</div>
<div class="form-group row">

</div>

<div id="dynamics">
 <table class="table table-bordered" id="dynamic_field" >

</table>
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


<script type="text/javascript">
  
$(document).ready(function()
    {
    $("#post-form-validation :input").prop("disabled", true);
    });
</script>
@endsection
<div class="container">
