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
<h4>Employee Loan/Loan Return</h4>
<div class="text-left">
	<h4 id="previousloan"></h4>
</div>
<div class="text-left">
	<h4 id="previousloanreturn"></h4>
</div>
<div class="text-right">
	<h4 id="balance"></h4>
</div>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createlaon') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">


<div class="form-group row">
<label class="col-sm-2 col-form-label">Loan Type</label>
<div class="col-sm-4">
<select name="loantype" id="loantype"  class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required>
<option value="">Select Loan Type</option>
<option value="Loan">Loan</option>
<option value="Loan Return">Loan Return</option>
</select></div>

<label class="col-sm-2 col-form-label">Employee Category</label>
<div class="col-sm-4">
<select name="employeecategory" id="employeecategory"  class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required>
<option value="">Select Employee Category</option>
@foreach($employeestype as $value)
<option value="{{$value->id}}" data-type="{{$value->employee_type}}">{{$value->employee_type}}</option>
@endforeach



</select></div>   
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Select A employee</label>
<div class="col-sm-4">
<select name="employee" id="employee" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required>
<option value="">Select A employee</option>
@foreach($employees as $value)
<option value="{{$value->id}}">{{$value->employee_name}}</option>
@endforeach
</select></div>

<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="text" name="date" required id="date" class="form-control form-control-round txtDate">
</div>    
</div> 

<div class="row " style="display:block;">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Payment Method</label>
<div class="col-sm-4">
<select required name="payment_method" id="payment_method" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" onchange="account(this.value)">
<option value="">Payment Method</option>
<option value="Cash">Cash</option>
<option value="Bank">Bank</option>
</select></div>

<label class="col-sm-2 col-form-label">Loan Amount</label>
<div class="col-sm-4">
<input type="text" required  class="form-control form-control-round" name="amount" id="amount">
</div>
 </div>
<div class="form-group row">


<label class="col-sm-2 col-form-label hide_area" style="display:none" >Banks</label>
<div class="col-sm-4 hide_area" style="display:none">
<select id="bank_id" name="bank_id" class="form-control" style="margin-left:-5px;margin-top:-10px">
<option value="">Select Banks</option>
@foreach($Bank_accounts as $value)
<option value="{{$value->id}}" data-id="{{ \Crypt::encrypt($value->id) }}">{{$value->branch->bank->name}}/{{$value->branch->name}}</option>
@endforeach
</select></div>


 

</div>
</div> 


<br>
<div class="form-group row">
<label class="col-sm-2 col-form-label"></label>
<div class="col-sm-2">
<button type="submit" style="" class="btns_save">Save</button>
</div>    
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
</div>
</div>
</div>

<!-- Warning Section Starts -->


</div>


@include('includes/footer')<div class="container">
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


$("#employee").change(function(){
	var id = $(this).find(':selected').val();
	//alert(id);
	if($('#loantype').find(':selected').val() == 'Loan'){
		$.ajax({
			url: "{{ url('/mehmoodgoodemployee/previousloan') }}/"+id,
			type: "GET",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		if(result>0){
	    		$('#previousloan').text("Previous Loan: "+result);
	  		}
	  		 else{$('#previousloan').text("No Any Loan");
	  		}
	  	}
		});
	}
		
	});



$("#employee").change(function(){
	var id = $(this).find(':selected').val();
	//alert(id);
	if($('#loantype').find(':selected').val() == 'Loan Return'){
		$.ajax({
			url: "{{ url('/mehmoodgoodemployee/previousloanreturn') }}/"+id,
			type: "GET",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		if(result>0){
	    		$('#previousloanreturn').text("Previous Loan Return: "+result);
	  		}
	  		else{
	  		$('#previousloanreturn').text("No Any Loan");

	  		}
	  	}
		});
	}
		
	});

function account(v){
if(v=='Bank'){
$('.hide_area').css('display','block');
}else{
$('.hide_area').css('display','none');
}

};

</script>