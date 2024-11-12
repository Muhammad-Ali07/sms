@include('includes/header')

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<!-- include top header -->
@include('includes/top_header')
<!-- End include top header -->
<style type="text/css">
	.form-control {
font-size: 16px;
font-weight: bold;
color: black;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
<h4>View Employee</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('updateemployee') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div style="display: none">
<input  type="text"  name="pkid" id="pkid"  value="{{$employees[0]->id}}"  class="form-control  col-md-7 col-xs-12" >
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Employee Type</label>
<div class="col-sm-4">
<select name="employee_type" id="employee_type" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Employee Type</option>
@if($employees[0]->employee_type=="Office Staff")
<option selected="true" value="Office Staff">Office Staff</option>
<option value="Driver">Driver</option>
@endif
@if($employees[0]->employee_type!="Office Staff")
<option  value="Driver">Driver</option>
<option selected="true" value="Driver">Driver</option>

@endif
</select>



</div>

<label class="col-sm-2 col-form-label">Employee Name</label>
<div class="col-sm-4">
 <input type="text" name="name" id="name" value="{{$employees[0]->employee_name}}" class="form-control form-control-round" placeholder="Enter Employee Name">
</div>    
</div>    


<div class="form-group row">
<label class="col-sm-2 col-form-label">Employee F.Name</label>
<div class="col-sm-4">
 <input  type="text" class="form-control form-control-round" value="{{$employees[0]->father_name}}" name="fname" id="fname" placeholder="Enter Employee F.Name">
</div>

<label class="col-sm-2 col-form-label">Phone</label>
<div class="col-sm-4">
  <input required maxlength="12" type="text" name="phone" id="phone" value="{{$employees[0]->phone_number}}"  class="form-control form-control-round cell myphoneno" placeholder="Enter Phone" >
</div>    
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Mobile</label>
<div class="col-sm-4">
  <input required maxlength="12" type="text" name="mobile" id="mobile" value="{{$employees[0]->mobile_number}}" class="form-control form-control-round cell myphoneno" placeholder="Enter Mobile" >
</div>

<label class="col-sm-2 col-form-label">CNIC</label>
<div class="col-sm-4">
  <input required maxlength="15" type="text" placeholder="XXXXX-XXXXXXX-X" value="{{$employees[0]->cnic}}" name="cnic" id="cnic_format" class="form-control form-control-round "  >
</div>    
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Joining Date</label>
<div class="col-sm-4">
 <input required type="text" name="joiningdate"  value="<?php echo date('d-m-Y',strtotime($employees[0]->joining_date)); ?>"   class="form-control form-control-round txtDate" placeholder="Enter Joining Date" >
</div>

<label class="col-sm-2 col-form-label">Joining Salary</label>
<div class="col-sm-4">
 <input type="Number" id="salary" name="salary" value="{{$employees[0]->joining_salary}}" class="form-control form-control-round" placeholder="Enter Joining Salary">
</div>    
</div> 



<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
 <input required type="text"  id="current_salary_date" name="date" value="<?php echo date('d-m-Y',strtotime($employees[0]->date)); ?>"  class="form-control form-control-round txtDate" placeholder="Enter Date" >
</div>

<label class="col-sm-2 col-form-label">Current Salary</label>
<div class="col-sm-4">
 <input type="Number"  id="current_salary"  name="current_salary"  value="{{$employees[0]->current_salary}}" class="form-control form-control-round" placeholder="Enter  Current Salary">
</div>    
</div> 




<div class="form-group row">

    <label class="col-sm-2 col-form-label">Address</label>
<div class="col-sm-4">
<textarea rows="3" cols="3" name="address" id="address"   class="form-control form-control-round" placeholder="Address">{{$employees[0]->address}}</textarea>
</div>
</div>



@if(count($employees[0]->cnic_images))
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Scan CNIC</label>
    <div class="col-sm-10">
      @foreach($employees[0]->cnic_images as $images)
        <img class="col-sm-2" src="{{url('public/cnic_images/'.$images->image)}}" width="160px" height="100px" alt="{{$images->image}}" style="margin: 10px;">
      @endforeach
    </div>
  </div>
@endif
  


  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="make-switch switch-large">
        <label>Status</label><label class="switch">
          <input type="checkbox" disabled name="my-checkbox" <?php if(isset($employees[0]->Status) && $employees[0]->Status == "Active"){ echo 'checked'; }?> data-switchery="true">
  <span class="slider round"></span>
</label>
        </div>
      </div>
    </div>
  </div>
<br>
<div class="form-group row">


<label class="col-sm-2 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/addemployee') }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
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

@section('script')
<script type="text/javascript">
$(function () {
$('#datetimepicker1').datetimepicker();
});
</script>
</div>
@endsection

@include('includes/footer')<div class="container">
@include('datatable/datatable');
<script>

	
$(document).ready(function(){
        $("#post-form-validation :input").prop("disabled", true);
    });

</script>
