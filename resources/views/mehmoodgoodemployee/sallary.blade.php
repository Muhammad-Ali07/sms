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
<h4>Salary</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
  <div class="col-md-2">
<a href="{{ url('/mehmoodgoodemployee/addsalary') }}" type="submit" style="padding-top:10px;border:none;" class="btns_save">Add Salary </a>
</div>
</div>

</div>
<!-- Basic Form Inputs card end -->
</div>

<form enctype="multipart/form-data" action="{{ route('generatereport') }}" method="post" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="form-group row">
<label class="col-sm-2 col-form-label">From Date </label>
<div class="col-sm-4">
<input type="text" class="form-control form-control-round txtDate"   name="from">
</div>

<label class="col-sm-2 col-form-label">To Date </label>
<div class="col-sm-4">
<input type="text" class="form-control form-control-round txtDate"  name="to"  >
</div>    
</div> 
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
<button type="Reset"  name="insertdata"class="btns_reset" >Reset</button>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
<button type="submit" name="insertdata"class="btns_generate"> Generate Report </button>
<!-- <a href="{{--url('mehmoodreports/generate_salary_report')--}}" type="Reset"  name="insertdata"class="btns_generate">Generate Report</a> -->
</div>    
</div>
</form>
<br><h4>Advance Salary Reporting
</h4><hr><br>
<form enctype="multipart/form-data" action="{{ route('mehmoodreports/generate_advance_salary_report') }}" method="post" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">

<div class="form-group row">
<label class="col-sm-2 col-form-label">Employee</label>
<div class="col-sm-4">
<select name="employee_id" id="employee_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
 <option value="">Select Employee Type</option>
@foreach($employeestype as $employees)
<option value="{{$employees->id}}"> {{$employees->employee_name}} </option>
@endforeach
</select></div>
  
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">From Date </label>
<div class="col-sm-4">
	<input type="text" class="form-control form-control-round txtDate" name="from"   >

</div>

<label class="col-sm-2 col-form-label">To Date </label>
<div class="col-sm-4">
<input type="text" class="form-control form-control-round txtDate"   name="to"  >
</div>    
</div>


<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
<button type="Reset" style="" class="btns_reset" >Reset</button>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
<button type="submit"  name="insertdata"class="btns_generate">Generate Report</button>
</div>    
</div>
</form>


<br><h4>Loan Reporting

</h4><hr><br>
<form enctype="multipart/form-data" action="{{ route('mehmoodreports/generate_loan_report') }}" method="post" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}"
<div class="form-group row">
<label class="col-sm-2 col-form-label">Employees</label>
<div class="col-sm-4">
<select name="employee_id" id="employee_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
 <option value="">Select Employee</option>
@foreach($employeestype as $employees)
<option value="{{$employees->id}}"> {{$employees->employee_name}} </option>
@endforeach
</select></div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
<button type="submit"  name="insertdata"class="btns_generate">Generate Report</button>
</div>    
</div>
</form>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
													

<table id="table_id" class="table" style="width:200%" >
<thead>
<tr>
<th>S.No</th>
<th>Employee Category</th>
<th>Date</th>
<th>Employee Name</th>
<th>Other Deduction</th>
<th>Salary</th>
<th>Payment Method</th>
<th>Amount</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

@if(isset($sallary))
@foreach($sallary as $key=>$value)
<tr>
	<?php
$date = date('d-m-Y',strtotime($value->Date));
?>
<th scope="row">{{$key+1}}</th>
<td>{{$value->salaryemployee[0]->employee_type ?? ''}}</td>
<td>{{$date ?? ''}}</td>
<td>{{$value->salaryemployee[0]->employee_name ?? ''}}</td>
<td>{{$value->OtherDeduction ?? ''}}</td>
<td>{{$value->Salary ?? ''}}</td>
<td>{{$value->payment_method ?? ''}}</td>
<td>{{$value->amount ?? ''}}</td>

<td>
<a href="{{url('mehmoodgoodemployee/viewaddsalary/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
<a href="{{url('mehmoodgoodemployee/editaddsalary/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deletesalary" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                            
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

$(document).on("click","#deletesalary", function(e){ //user click on remove text
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
        url: '{{url('deletesalary')}}',
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
</script>