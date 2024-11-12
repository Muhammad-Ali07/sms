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
<h4>Employee Salary</h4>
<div class="text-right">
	<h4 id="balance"></h4>
</div>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createemployeesalary') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div id="otherdeduction" style="display: none" class="alert alert-danger" role="alert">
Other Deduction Amount Is Greater Than Salary Amount
</div>
<div >
<input  type="hidden"  name="Pid" id="Pid"  class="form-control  col-md-7 col-xs-12" >
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Employee Category</label>
<div class="col-sm-4">
<select name="employeecategory" id="employeecategory"  class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required>
<option value="">Select Employee Category</option>
@foreach($employeestype as $value)
<option value="{{$value->id}}" data-type="{{$value->employee_type}}">{{$value->employee_type}}</option>
@endforeach



</select></div>

<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="text" class="form-control form-control-round txtDate" id="date" name="date" required autocomplete="off" style="display: none;">
</div>    
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Select Employee</label>
<div class="col-sm-4">
<select name="employee" id="employee" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required  style="display: none;">
<option value="">Select Employee category First</option>

</select>
</div>
</div>

<section class="errorPaidSalary" style="display: none;" > 
	<div class="alert alert-danger" role="alert">
		Salary of this employee for current month already paid
	</div>
</section>

<section class="dependOnEmployee" style="display: none;"> 
<div class="form-group row">
<label class="col-sm-2 col-form-label">Other Deduction</label>
<div class="col-sm-4">
<input onchange="myFunction3()" type="text" name="other_deduction" id="other_deduction" class="form-control form-control-round empty"  placeholder="Enter  Other Deduction" data-employeeId="">
</div>    
</div> 


<div class="form-group row">

<label class="col-sm-2 col-form-label">Salary</label>
<div class="col-sm-4">
<input type="text" readonly class="form-control form-control-round empty" name="Salary" id="Salary">
</div>



<label class="col-sm-2 col-form-label">Advance Salary</label>
<div class="col-sm-4">
<input type="text" readonly class="form-control form-control-round empty" name="AdvanceSalary" id="AdvanceSalary">
</div>

  
</div> 


<div class="row " style="display:block;">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Payment Method</label>
<div class="col-sm-4">
<select  name="payment_method" id="payment_method" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" onchange="account(this.value)" required>
<option value="">Payment Method</option>
<option value="Cash">Cash</option>
<option value="Bank">Bank</option>
</select></div>

<label class="col-sm-2 col-form-label">Amount</label>
<div class="col-sm-4">
<input type="text" readonly  class="form-control form-control-round empty" name="amount" id="amount">
</div>
 </div>
<div class="form-group row">


<label class="col-sm-2 col-form-label hide_area" style="display:none" >Banks</label>
<div class="col-sm-4 hide_area" style="display:none">
<select  id="bank_id" name="bank_id" class="form-control" style="margin-left:-5px;margin-top:-10px">
<option value="">Select Banks</option>
@foreach($Bank_accounts as $value)
<option value="{{$value->branch_id}}" data-id="{{ \Crypt::encrypt($value->id) }}">{{$value->branch->bank->name}}/{{$value->branch->name}}</option>
@endforeach
</select></div>


 

</div>
</div> 

</section>

<br>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
 <button type="Reset" style="" class="btns_reset" >Reset</button>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
 <button type="submit" style="" id="submit" class="btns_save" >Save</button>
</div>    
</div>


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


</div>


@include('includes/footer')<div class="container">
<script type="text/javascript">
$(document).on("change","#employeecategory",function(){
	$('.empty').val('');

// document.getElementById("employee").disabled = false;
// document.getElementById("employee").disabled = false;
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
	$('#employee').show();
	$('#date').show();
var option ='<option value="">Select Employee</option>';
for(var i=0;i<data.length;i++){
option += '<option value="'+ data[i].id +'">' + data[i].employee_name + ' </option>';
}
// document.getElementByClass("dependOnEmployee").reset();

	// $('.dependOnEmployee').reset();
}else{
	$('#employee').hide();
	$('#date').hide();
	$('.dependOnEmployee').hide();
	$('.errorPaidSalary').hide();
// var option ='<option value="">No Any Employee</option>';
}
other_deduction.html(option);
}
});
});
	

$("#date").change(function(){
	var id = $('#employee').find(':selected').val();
	var date = $(this).val();
	var employee = $('#employee').val();
	 // alert(AdvanceSalary);
	 if(employee !== ''){

	 	$.ajax({
			url: "{{ url('/mehmoodgoodemployee/EmployeePaidSalaries') }}/"+id,
			type: "get",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		if (typeof result != "undefined" && result != null && result.length != null && result.length > 0) {
		    		var splitDate = date.split('-');

		    		var onemonth = splitDate[1];
					var oneyear = splitDate[2];
		    		for (var i = 0; i < result.length; i++) {
		    			// result[i]
		    			var paidSplitDate = result[i].Date.split('-');

						var twomonth = paidSplitDate[1];
						var twoyear = paidSplitDate[0];
		    		// console.log(onemonth);
		    		// console.log(twomonth);
		    		// console.log(oneyear);
		    		// console.log(twoyear);

			    		if(onemonth == twomonth && oneyear == twoyear){

			    			$('.dependOnEmployee').hide();
			    			$('.errorPaidSalary').show();
			    		}
			    		else{
			    			// alert("unpaid");
			    			$('.errorPaidSalary').hide();
			    			$('.dependOnEmployee').show();
			    		}
		    		}
		    	}
		    	else{
		    		$('.errorPaidSalary').hide();
	    			$('.dependOnEmployee').show();
		    	}
	    		// $('#Salary').val(result['current_salary']);
	  		}
		});
	}
});


$("#employee").change(function(){
	var id = $(this).find(':selected').val();
	var date = $('.txtDate').val();
	 // alert(AdvanceSalary);

 	$.ajax({
		url: "{{ url('/mehmoodgoodemployee/EmployeePaidSalaries') }}/"+id,
		type: "get",
  		//data: {id : $(this).find(':selected').attr("data-id")}, 
		success: function(result) {
			console.log(result);
    		// $("#div1").html(result);
    		if (typeof result != "undefined" && result != null && result.length != null && result.length > 0) {
    // array exists and is not empty

	    		var splitDate = date.split('-');

	    		var onemonth = splitDate[1];
				var oneyear = splitDate[2];
	    		for (var i = 0; i < result.length; i++) {
	    			// result[i]
	    			var paidSplitDate = result[i].Date.split('-');

					var twomonth = paidSplitDate[1];
					var twoyear = paidSplitDate[0];
	    		// console.log(onemonth);
	    		// console.log(twomonth);
	    		// console.log(oneyear);
	    		// console.log(twoyear);

		    		if(onemonth == twomonth && oneyear == twoyear){

		    			$('.dependOnEmployee').hide();
		    			$('.errorPaidSalary').show();
		    		}
		    		else{
		    			// alert("unpaid");
		    			$('.errorPaidSalary').hide();
		    			$('.dependOnEmployee').show();
		    		}
	    		}
    		}
    		else{
		    			$('.dependOnEmployee').show();
		    			$('.errorPaidSalary').hide();

    		}
    		$.ajax({
			url: "{{ url('/mehmoodgoodemployee/EmployeeCurrentSalary') }}/"+id,
			type: "get",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		$('#Salary').val(result['current_salary']);
	  		}
		});
        $.ajax({
			url: "{{ url('/mehmoodgoodemployee/AdvanceSalary') }}/"+id+"/"+date,
			type: "get",
			success: function(result) {
	    		$('#AdvanceSalary').val(result);
	    	    $('#Pid').val(result['id']);

	  		}
		});
    		// $('#Salary').val(result['current_salary']);
  		}
	});


		$.ajax({
			url: "{{ url('/mehmoodgoodemployee/EmployeeCurrentSalary') }}/"+id,
			type: "get",
	  		//data: {id : $(this).find(':selected').attr("data-id")}, 
			success: function(result) {
	    		// $("#div1").html(result);
	    		$('#Salary').val(result['current_salary']);
	  		}
		});
        $.ajax({
			url: "{{ url('/mehmoodgoodemployee/AdvanceSalary') }}/"+id+"/"+date,
			type: "get",
			success: function(result) {
	    		$('#AdvanceSalary').val(result);
	    	    $('#Pid').val(result['id']);

	  		}
		});

	});



$('#employee').change(function() {
	$('#amount').val('');

	// $('.dependOnEmployee').show();
	  // document.getElementById("create-course-form").reset();



});


	// $('#other_deduction').focusout(function(){
		


	// });

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




function myFunction3() {
               // alert('sss');
              $.ajax({
                url: 'checkotherdeductiontosalary',
                type: 'get',
                async: false,
                data: {other_deduction: $('#other_deduction').val(), advance_salary: $('#AdvanceSalary').val(), employee_id: $('#employee').val()},
                success: function (data) {
                  // alert(data);
                  if (data == "0") {
                  	document.getElementById('other_deduction').value = '';
                  	document.getElementById('amount').value = '';
                    $("#otherdeduction").show();
                    setTimeout(function () {
                      $("#otherdeduction").hide();
                    }, 4000);
                  } else {
                  	var d_amount = $('#other_deduction').val();
					var salary = $('#Salary').val();
				    var advsalary = $('#AdvanceSalary').val();

					$('#amount').val(salary-advsalary-d_amount);
                    //  alert("nothing");
                    
                  }


                }
              });
//}
            }





</script>