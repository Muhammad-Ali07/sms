
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
<h4>Bill</h4>
</div>
<div class="card-block">

<form>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Bill Number</label>
<div class="col-sm-4">
 <input type="Number"   id="amount" name="amount" class="form-control form-control-round" placeholder="Enter Bill Number" >




</div>
   
</div>    

<div class="form-group row">
<label class="col-sm-2 col-form-label">Bill Number</label>
<div class="col-sm-4">
 <input type="Number"   id="amount" name="amount" class="form-control form-control-round" placeholder="Enter Bill Number" >




</div>

<label class="col-sm-2 col-form-label">Company Name</label>
<div class="col-sm-4">
 <input type="text"   id="amount" name="amount" class="form-control form-control-round" placeholder="Enter Company Name" >
</div>    
</div> 


<div class="form-group row">


<label class="col-sm-2 col-form-label">Date To</label>
<div class="col-sm-4">
 <input type="date"   id="Date To" name="amount" class="form-control form-control-round" placeholder="Enter Amount" >
</div> 
<label class="col-sm-2 col-form-label">Date From</label>
<div class="col-sm-4">
 <input type="date"   id="Date To" name="amount" class="form-control form-control-round" placeholder="Enter Amount" >
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
 <button type="button" style="" class="btns_save">Save</button>
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
<h4>View Bill</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>S.No</th>

<th>Broker Name</th>
<th>Total Balance</th>
<th>Date</th>
<th>Payment/Receipt</th>
<th>Bank Name</th>
<th>Amount </th>
<th>Cheque No</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>Otto</td>
<td>@mdo</td>
<td>@mdo</td>
<td>@mdo</td>
<td>@mdo</td>
<td>@mdo</td>
<td>@mdo</td>
<td>
<a href=""><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
<a href=""><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a href=""><i class="fa fa-trash"></i></a>                                                               
 </td>
</tr>

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
