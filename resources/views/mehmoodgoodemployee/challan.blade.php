
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
<h4>Challan</h4>
</div>
<div class="card-block">
<form>

 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Challan Number</label>
<div class="col-sm-4">
<input type="text" id="challa" name="challa" class="form-control form-control-round" placeholder="Enter challan Number">
</div>

<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="date" id="date" name="date" class="form-control form-control-round" placeholder="Enter Client Type">
</div>    
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Driver Name</label>
<div class="col-sm-4">
<input type="text" id="drivername" name="drivername" class="form-control form-control-round" placeholder="Enter Driver Name">
</div>

<label class="col-sm-2 col-form-label">Loader Name </label>
<div class="col-sm-4">
<input type="text" id="loadername" name="loadername" class="form-control form-control-round" placeholder="Enter Loader Name">
</div>    
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Dispatch Time</label>
<div class="col-sm-4">
<input type="text" id="dispatch" name="dispatch" class="form-control form-control-round" placeholder="Enter Dispatch Time">
</div>

<label class="col-sm-2 col-form-label">Truck Number</label>
<div class="col-sm-4">
<input type="text" id="truck" name="truck" class="form-control form-control-round" placeholder="Enter ruck Number">
</div>    
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Mobile Number</label>
<div class="col-sm-4">
<input type="text" id="mobile" name="mobile" class="form-control form-control-round" placeholder="Enter Mobile Number">
</div>

<label class="col-sm-2 col-form-label">Broker</label>
<div class="col-sm-4">
<input type="text" id="truck" name="truck" class="form-control form-control-round" placeholder="Enter Broker">
</div>    
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Container Number</label>
<div class="col-sm-4">
<input type="text" id="container" name="container" class="form-control form-control-round" placeholder="Enter Container Number">
</div>

<label class="col-sm-2 col-form-label">Containce S.Number</label>
<div class="col-sm-4">
<input type="text" id="containce" name="containce" class="form-control form-control-round" placeholder="Enter Containce S.Number">
</div>    
</div>

<div class="card-header">
<h4>Filtrations</h4>
</div><br>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="date" id="date1" name="date1" class="form-control form-control-round" placeholder="Enter Date">
</div>

<label class="col-sm-2 col-form-label">To Date</label>
<div class="col-sm-4">
<input type="date" id="todate" name="todate" class="form-control form-control-round" placeholder="Enter To Date">
</div>    
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Bilty Type</label>
<div class="col-sm-4">
<select name="biltytype" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="opt1">Bilty Type</option>
<option value="opt2">With Challan</option>
<option value="opt3">Without Challan</option>
</select>
</div>
</div>

<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Bilty</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>
<tr style="width:100%">
<th>Checked</th>
<th>Bilty Number</th>
<th>Sender Name</th>
<th >Receiver Name</th>
<th>Quantity</th>
<th>Detail</th>
<th>Weight</th>
<th>Rent</th>
<th>Total</th>
<th>Advance</th>
<th>Balance</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row"><input type="checkbox" value="" style="width:30px;height:20px"></th>
<th>3</th>
<td>12</td>
<td>Otto</td>
<td>Otto</td>
<td>Otto</td>
<td>Otto</td>
<td>Otto</td>
<td>Otto</td>
<td>Otto</td>
<td>Otto</td>


</tr>

</tbody>
</table>
</div>
</div>

</div>
</div>
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
<h4>View Challan</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>
<tr style="width:100%">
<th>S.No</th>
<th>Id.No</th>
<th >Bank Name</th>
<th>Date</th>
<th>Description</th>

<th> Amount</th>







<th>Actions</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>12</td>

<td>Otto</td>


<td>Otto</td>
<td>Otto</td>
<td>Otto</td>

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
