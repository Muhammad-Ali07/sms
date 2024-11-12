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
<h4>Paid</h4>
</div>
<div class="card-block">
<form>



<div class="form-group row">
<label class="col-sm-2 col-form-label">Cumputer Number</label>
<div class="col-sm-4">
<input type="Number"  id="computer" name="computer"  class="form-control form-control-round" placeholder="Enter Cumputer Number">
</div>

<label class="col-sm-2 col-form-label">Bilty Number</label>
<div class="col-sm-4">
<input type="Number" id="bilty" name="bilty" class="form-control form-control-round" placeholder="Enter Bilty Number">
</div>    
</div> 

 <div class="form-group row">
<label class="col-sm-2 col-form-label">Sender Name</label>
<div class="col-sm-4">
<input type="text"  id="sender" name="sender"  class="form-control form-control-round" placeholder="Enter Sender Name">
</div>

<label class="col-sm-2 col-form-label">Receiver Name</label>
<div class="col-sm-4">
<input type="text"  id="receiver" name="receiver"  class="form-control form-control-round" placeholder="Enter Receiver Name">

</div>    
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Rate</label>
<div class="col-sm-4">
<input type="text"  id="rate" name="rate"  class="form-control form-control-round" placeholder="Enter Rate">
</div>

<label class="col-sm-2 col-form-label">Karachi To</label>
<div class="col-sm-4">
<input type="text" id="karachi" name="karachi" class="form-control form-control-round" placeholder="Enter Karachi To">
</div>    
</div>

 <div class="form-group row">
<label class="col-sm-2 col-form-label">Phone Number </label>
<div class="col-sm-4">
<input type="text" id="phonenumber" name="phonenumber" class="form-control form-control-round" placeholder="Enter Phone Number">
</div>

<label class="col-sm-2 col-form-label">Reference No 1</label>
<div class="col-sm-4">
<input type="text" id="reference1" name="reference1" class="form-control form-control-round" placeholder="Enter Reference Number 1">
</div>    
</div> <div class="form-group row">
<label class="col-sm-2 col-form-label">Reference No 2</label>
<div class="col-sm-4">
<input type="text"  id="reference2" name="reference2"  class="form-control form-control-round" placeholder="Enter Reference Number 2">
</div>

<label class="col-sm-2 col-form-label">Quantity</label>
<div class="col-sm-4">
<input type="text" id="quantity" name="quantity" class="form-control form-control-round" placeholder="Enter Quantity">
</div>    
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Pack</label>
<div class="col-sm-4">
<input type="Address" id="pack" name="pack" class="form-control form-control-round" placeholder="Pack">
</div>

<label class="col-sm-2 col-form-label">Detail </label>
<div class="col-sm-4">
<input type="text" id="detail" name="detail" class="form-control form-control-round" placeholder="Enter Detail">
</div>    
</div> 



<div class="form-group row">
<label class="col-sm-2 col-form-label">Brand</label>
<div class="col-sm-4">
<input type="Address" id="brand" name="brand" class="form-control form-control-round" placeholder="Brand">
</div>

<label class="col-sm-2 col-form-label">Weight </label>
<div class="col-sm-4">
<input type="text" id="weight" name="weight" class="form-control form-control-round" placeholder="Enter Weight">
</div>    
</div> 



<div class="form-group row">
<label class="col-sm-2 col-form-label">Chargers</label>
<div class="col-sm-4">
<input type="Address" id="charges" name="charges" class="form-control form-control-round" placeholder="Chargers">
</div>

<label class="col-sm-2 col-form-label">Amount </label>
<div class="col-sm-4">
<input type="text" id="amount" name="amount" class="form-control form-control-round" placeholder="Enter Amount">
</div>    
</div> 
<div class="form-group row">
<label class="col-sm-2 col-form-label">Remarks</label>
<div class="col-sm-4">
<textarea rows="3" cols="3" class="form-control form-control-round" placeholder="Remarks"></textarea>
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
<h4>View Paid</h4>
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
<th>Branch Name</th>
<th>Bank Address</th>

<th>Opening Amount</th>



<th>Total Amount</th>





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
