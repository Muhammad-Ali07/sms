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

@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form  target="_blank" enctype="multipart/form-data" action="{{ route('generatechallanpdf') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">

  <div class="card-header">
<h4>Challan Report</h4>
</div><br>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="text" required id="fromdate" name="fromdate" class="form-control form-control-round txtDate" placeholder="Enter Date">
</div>

<label class="col-sm-2 col-form-label">To Date</label>
<div class="col-sm-4">
<input type="text" required id="todate" name="todate" class="form-control form-control-round txtDate" placeholder="Enter To Date">
</div>    
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Bilty Type</label>
<div class="col-sm-4">
<select onchange="mydrop()" name="bilty" id="biltytype" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option selected value="All">All</option>
<option value="withchallan">With Challan</option>
<option  value="withoutchallan">Without Challan</option>
</select>
</div>
<label class="col-sm-2 col-form-label">Vehicle Name </label>
<div class="col-sm-4">
<select name="vehicle" id="vehicle" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
  <option value="">Select Vehicle</option>
@foreach($vehicle as $value)
<option value="{{$value->id}}">{{$value->car_number }}</option>
@endforeach
</select></div>     
</div> 

<div class="clearfix"></div>
<div class="form-group row">
<div class="col-sm-3 col-sm-push-3">
<button type="submit"  style="margin-left: 180px;" class="btns_save">Generate Report</button>
</div>
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


</form>


@include('includes/footer')
<script>
function mydrop() {

  var x = document.getElementById("biltytype").value;
  if(x=="withoutchallan")
  {
  document.getElementById("vehicle").disabled=true;
  }
  else{
   document.getElementById("vehicle").disabled=false;
  }

}
</script>