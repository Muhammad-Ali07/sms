	
@include('includes/header')
@include('datatable/datatable')
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
<h4>Salary Ledger Reporting</h4>
</div>
<div class="card-block">

<form action="{{url('mehmoodreports/generate_salary_ledger')}}" method="POST">
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="form-group row">
<label class="col-sm-2 col-form-label">Employee</label>
<div class="col-sm-4">
<select  name="employee" id="employee" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Employee Type</option>
@foreach($employees as $employee)
<option value="{{$employee->id}}"> {{$employee->employee_name}} </option>
@endforeach
</select>



</div>
   
</div>    


<div class="form-group row">
<label class="col-sm-2 col-form-label">From Date :</label>
<div class="col-sm-4">
 <input  type="date" class="form-control form-control-round" id="datepicker" name="from" placeholder="Enter Customer Name">
</div>

<label class="col-sm-2 col-form-label">To Date </label>
<div class="col-sm-4">
 <input  type="date" class="form-control form-control-round" id="datepicker1" name="to" placeholder="Enter Customer Name"></div>    
</div> 

<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
 <button type="Reset" style="" class="btns_reset" >Reset</button>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
<button type="submit" name="insertdata"class="btns_generate"> Generate Report </submit>
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
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Salary Ledger </h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">

<table id="DataTable" class="table" style="width:200%" >
			<thead>
<tr> 
                          <th>Employee Type</th>
                          <th>Employee Name </th>
                          <th>Father Name</th>
                          <th>Mobile Number</th>
                          <th>CNIC</th>
                          <th>Payment Method </th>
                          <th>Salary Date </th>
                          <th>Employee salary</th> 
                          <th> OtherDeductione </th>
                          <th>Amount </th>
</tr>                        
</thead>

<tbody>
@foreach($all_employee_salaries as $alary)
<tr>
<td> {{$alary->employee_type}} </td>
<td> {{$alary->employee_name}}  </td>
<td> {{$alary->father_name}}  </td>
<td> {{$alary->mobile_number}}  </td>
<td> {{$alary->cnic}}  </td>
<td> {{$alary->payment_method}}  </td>
<td> {{$alary->Date}}  </td>
<td> {{$alary->Salary}}  </td>
<td> {{$alary->OtherDeduction}}  </td>
<td> {{$alary->amount}}  </td>

</tr>
@endforeach
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
<script type="text/javascript">
$(function () {
$('#datetimepicker1').datetimepicker();
});
</script>
</div>
@endsection

@include('includes/footer')<div class="container">
