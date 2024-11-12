
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
<h4>Bank Ledger</h4>
</div>
<div class="card-block">
<form>

 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Banks</label>
<div class="col-sm-4"> 
<select  name="banks" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="opt1">Select Banks </option>
<option value="opt2">Type 2</option>
<option value="opt3">Type 3</option>
<option value="opt4">Type 4</option>
<option value="opt5">Type 5</option>
<option value="opt6">Type 6</option>
<option value="opt7">Type 7</option>
<option value="opt8">Type 8</option>
</select></div>

</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">From Date</label>
<div class="col-sm-4">
<input type="date" name="from_date" id="dp1565936418798" class="form-control form-control-round" placeholder="Enter From Date">

</div>

<label class="col-sm-2 col-form-label">To Date </label>
<div class="col-sm-4">
<input type="date"  name="to_date" id="dp1565936418799" class="form-control form-control-round" placeholder="Enter Phone Number">
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
<a href="" type="Reset"  name="insertdata"class="btns_generate">Generate Report</a>
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
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Bank Ledger</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>
<tr style="width:100%">
<th>S.No</th>
<th >Date</th>
<th>Bank Name</th>
<th>Description</th>
<th>Debit</th>
<th> Credit</th>
<th>Balance</th>
</tr>
</thead>

<tbody>
@php $count = 1 @endphp

@foreach ($ledger as $value) 
<tr>
<th scope="row">{{ $count }}</th>
<td>{{ $value->created_at }}</td>
<td>{{ $value->bank_account->branch->bank->name }}/{{ $value->bank_account->branch->name }}</td>
<td>{{ $value->description }}</td>
<td>{{ $value->debit }}</td>
<td>{{ $value->credit }}</td>
<td>{{ $value->balance }}</td>
</tr>

@php $count++; @endphp
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
