@include('includes/header')

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

<h4>Advance Salary</h4>
<div class="text-right">
	<h4 id="balance"></h4>
</div>
<div class="text-left">
	<h4 id="previousadvancesalary"></h4>
</div>
</div>
<div class="card-block">

@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createloanadvance') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div >
<input  type="hidden"  name="Pid" id="Pid"  class="form-control  col-md-7 col-xs-12" >
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Select Employee Type</label>
<div class="col-sm-4">
<select name="employeecategory" id="employeecategory"  class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
<option value="">Select Employee Category</option>
@foreach($employeestype as $value)
<option value="{{$value->id}}" data-type="{{$value->employee_type}}">{{$value->employee_type}}</option>
@endforeach

</select>
@if ($errors->has('employeecategory'))
		<div class="alert alert-danger">{{ $errors->first('employeecategory') }}</div>
	@endif


</div>

<label class="col-sm-2 col-form-label">Select A employee</label>
<div class="col-sm-4">
<select name="employee" id="employee" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
<option value="">Select A employee</option>
@foreach($employees as $value)
<option value="{{$value->id}}">{{$value->employee_name}}</option>
@endforeach
</select>
@if ($errors->has('employee'))
		<div class="alert alert-danger">{{ $errors->first('employee') }}</div>
	@endif
</div>    
</div>    


<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="text" class="form-control form-control-round txtDate"   name="date" >
@if ($errors->has('date'))
		<div class="alert alert-danger">{{ $errors->first('date') }}</div>
	@endif
</div>

<label class="col-sm-2 col-form-label">Salary</label>
<div class="col-sm-4">
<input type="text" readonly class="form-control form-control-round" name="Salary" id="Salary">
</div> 
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-4">
 <input type="text" name="Description" id="Description" class="form-control form-control-round" placeholder="Enter Description">
 @if ($errors->has('Description'))
		<div class="alert alert-danger">{{ $errors->first('Description') }}</div>
	@endif
</div>


<label class="col-sm-2 col-form-label">Select Type</label>
<div class="col-sm-4">
<select name="payment_method" id="payment_method" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" onchange="account(this.value)">
<option value="opt1">Payment Method</option>
<option value="Cash">Cash</option>
<option value="Bank">Bank</option>
</select>
 @if ($errors->has('payment_method'))
		<div class="alert alert-danger">{{ $errors->first('payment_method') }}</div>
	@endif
</div>     
</div> 
<div class="row " style="display:block;">
<div class="form-group row">

<label class="col-sm-2 col-form-label">Amount</label>
<div class="col-sm-4">
 <input type="Number" name="amount" id="amount" class="form-control form-control-round" placeholder="Enter Amount">
 @if ($errors->has('amount'))
		<div class="alert alert-danger">{{ $errors->first('amount') }}</div>
	@endif
</div>  


<label class="col-sm-2 col-form-label hide_area" style="display:none" >Banks</label>
<div class="col-sm-4 hide_area" style="display:none">
<select id="bank_id" name="bank_id" class="form-control" style="margin-left:-5px;margin-top:-10px" >
<option value="">Select Banks</option>
@foreach($Bank_accounts as $value)
<option value="{{$value->id}}" data-id="{{ \Crypt::encrypt($value->id) }}">{{$value->branch->bank->name}}/{{$value->branch->name}}</option>
@endforeach
</select></div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"></label>
<div class="col-sm-2">
 <button type="submit" style="" class="btns_save">Save</button>
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
$(document).on("change","#employeecategory",function(){
document.getElementById("employee").disabled = false;
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#employee').find('option').remove().end();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
// alert($('#employeecategory').val());
var other_deduction = $("#employee");
$.ajax({
url:'getemployee',
type:'get',
async: false,
data: { employeecategory: $('#employeecategory').find(':selected').attr('data-type') },

success:function(data){
if(data.length > 0){
var option ='<option value="">Select Employee</option>';
for(var i=0;i<data.length;i++){
option += '<option value="'+ data[i].id +'">' + data[i].employee_name + ' </option>';
}
}else{
var option ='<option value="">No Any Employee</option>';
}
other_deduction.html(option);
}
});
});
	



	$("#bank_id").change(function(){
	var id = $(this).find(':selected').attr('data-id');
		$.ajax({
			url: "{{ url('bank-account-amount') }}/"+id,
			type: "GET",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		$('#balance').text("Balance: "+result);
	  		}
		});
	});

function account(v){
if(v=='Bank'){
$('.hide_area').css('display','block');
}else{
$('.hide_area').css('display','none');
}

};



$("#employee").change(function(){
	var id = $(this).find(':selected').val();
	// alert()
		$.ajax({
			url: "{{ url('/mehmoodgoodemployee/EmployeeCurrentSalary') }}/"+id,
			type: "get",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		$('#Salary').val(result['current_salary']);
	  		}
		});
	});




$("#employee").change(function(){
	var id = $(this).find(':selected').val();
	//alert(id);
		$.ajax({
			url: "{{ url('/mehmoodgoodemployee/previousadvancesalary') }}/"+id,
			type: "GET",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		if(result>0){
	    		$('#previousadvancesalary').text("Previous Advance Salary: "+result);
	  		}
	  		 else{$('#previousadvancesalary').text("No Any Advance Salary");
	  		}
	  	}
		});
	
		
	});
</script>
</div>
@include('datepicker/datepicker')

@include('includes/footer')<div class="container">
