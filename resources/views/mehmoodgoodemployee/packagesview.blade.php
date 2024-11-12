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
<h4>Edit Packages</h4>
</div>
<div class="card-block">
@foreach($errors->all() as $error)
  <div class="alert alert-danger">{{$error}}</div>
 @endforeach
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('updatepackages') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div style="display: none">
<input  type="text"  name="pkid" id="pkid"  value="{{$packages[0]->id}}"  class="form-control  col-md-7 col-xs-12" >
</div>
@php
$count = -1;
@endphp
 <div class="addMoreDiv">
 @foreach($packages[0]->packages_metas as $key=>$value)
 @php
$count += 1;
@endphp
 <div id="clients-edit-wrapper" class="  input_fields_wrap{{$key}}">
<div class=" form-group row ">
<label class="col-sm-2 col-form-label">Package</label>
<div class="col-sm-4">
 <input  type="text" value="{{$value->package_name ?? ''}}"  name="package"  class="form-control form-control-round" placeholder="Enter Package Name">
 <input  type="hidden" value="{{$value->id ?? ''}}"  name="package_meta_id">
</div>
</div>
@foreach($packages[0]->packages_metas  as $value)
@foreach($value->PackageMetaDescription as $key=>$PackageMetaDescription)
@if($key==0)
<div class="form-group row input_fields_wraps">
        <div class="container">
         <div class=" form-group row input_fields_wrap1">
          <label class="col-sm-2 col-form-label">Package Description {{$key+1}}</label>
           <div class="col-sm-4">
              <textarea required rows="3" value="{{$PackageMetaDescription->description ??''}}"   name="description[]" cols="3" class="form-control form-control-round" placeholder="Description"> {{$PackageMetaDescription->description ??''}}</textarea>
           </div>

              <div class="col-sm-2">
                <button class="add_field_button">Add More </button>
              </div>
           </div>
         </div>
        </div>
  @else
<div class="form-group row input_fields_wraps1">
        <div class="container">
         <div class=" form-group row input_fields_wrap">
          <label class="col-sm-2 col-form-label">Package Description {{$key+1}}</label>
           <div class="col-sm-4">
              <textarea required rows="3" value="{{$PackageMetaDescription->description ??''}}"   name="description[]" cols="3" class="form-control form-control-round" placeholder="Description"> {{$PackageMetaDescription->description ??''}}</textarea>
           </div>

              <div class="col-sm-2">
              <button class="remove_field" style=""> Remove</button>
              </div>
           </div>
         </div>
        </div>
  @endif
        
 @endforeach
 @endforeach      
 @endforeach
</div>
 <input type="hidden" value="{{$count}}" id="count" />
<div class="form-group row">
<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
 <button type="submit" style="margin-left: 100px;" class="btns_save">Update</button>
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
$(document).ready(function(){
        $("#post-form-validation :input").prop("disabled", true);
    });


</script>