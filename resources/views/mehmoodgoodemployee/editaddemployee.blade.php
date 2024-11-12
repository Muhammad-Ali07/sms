@include('includes/header')
@include('datepicker/datepicker')

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<style type="text/css">
	
	#errmsg
{
color: red;
}
	#errormsg
{
color: red;
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
<h4>Update Employee</h4>
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
<select required name="employee_type" id="employee_type" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Employee Type</option>
@if($employees[0]->employee_type=="Office Staff")
<option selected="true" value="Office Staff">Office Staff</option>
<option value="Driver">Driver</option>
@endif
@if($employees[0]->employee_type=="Driver")
<option value="Office Staff">Office Staff</option>
<option selected="true" value="Driver">Driver</option>
@endif

</select>



</div>

<label class="col-sm-2 col-form-label">Employee Name</label>
<div class="col-sm-4">
 <input required type="text" name="name" id="name" value="{{$employees[0]->employee_name}}" class="form-control form-control-round" placeholder="Enter Employee Name" >
  	@if ($errors->has('name'))
			<div class="alert alert-danger">{{ $errors->first('name') }}</div>
		@endif
</div>    
</div>    


<div class="form-group row">
<label class="col-sm-2 col-form-label">Employee F.Name</label>
<div class="col-sm-4">
 <input required  type="text" class="form-control form-control-round" value="{{$employees[0]->father_name}}" name="fname" id="fname" placeholder="Enter Employee F.Name" >
  	@if ($errors->has('fname'))
			<div class="alert alert-danger">{{ $errors->first('fname') }}</div>
		@endif
</div>

<label class="col-sm-2 col-form-label">Phone</label>
<div class="col-sm-4">
  <input required maxlength="12" type="text" name="phone" id="phone" value="{{$employees[0]->phone_number}}"  class="form-control form-control-round cell myphoneno" placeholder="Enter Phone" >&nbsp;<span id="errmsg"></span>

  @if ($errors->has('phone'))
			<div class="alert alert-danger">{{ $errors->first('phone') }}</div>
		@endif
</div>    
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Mobile</label>
<div class="col-sm-4">
  <input required maxlength="12" type="text" name="mobile" id="mobile" value="{{$employees[0]->mobile_number}}" class="form-control form-control-round cell myphoneno" placeholder="Enter Mobile" >&nbsp;<span id="errormsg"></span>

  @if ($errors->has('mobile'))
			<div class="alert alert-danger">{{ $errors->first('mobile') }}</div>
		@endif
</div>

<label class="col-sm-2 col-form-label">CNIC</label>
<div class="col-sm-4">
  <input required maxlength="15" type="text" placeholder="XXXXX-XXXXXXX-X" value="{{$employees[0]->cnic}}" name="cnic" id="cnic_format" class="form-control form-control-round "  >

  @if ($errors->has('cnic'))
			<div class="alert alert-danger">{{ $errors->first('cnic') }}</div>
		@endif
</div>    
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Joining Date</label>
<div class="col-sm-4">
 <input required type="text" maxlength="10" name="joiningdate"  value="<?php echo date('d-m-Y',strtotime($employees[0]->joining_date)); ?>"   class="form-control form-control-round txtDate" placeholder="Enter Joining Date" >
 @if ($errors->has('joiningdate'))
			<div class="alert alert-danger">{{ $errors->first('joiningdate') }}</div>
		@endif
</div>

<label class="col-sm-2 col-form-label">Joining Salary</label>
<div class="col-sm-4">
 <input required type="Number" id="salary" step="0.00000001" min="0.00000001" name="salary" value="{{$employees[0]->joining_salary}}" class="form-control form-control-round " placeholder="Enter Joining Salary"  >
  @if ($errors->has('salary'))
			<div class="alert alert-danger">{{ $errors->first('salary') }}</div>
		@endif
</div>    
</div> 



<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
 <input required type="text" maxlength="10" id="current_salary_date" name="date" value="<?php echo date('d-m-Y',strtotime($employees[0]->date)); ?>"  class="form-control form-control-round txtDate" placeholder="Enter Date" >
 @if ($errors->has('date'))
			<div class="alert alert-danger">{{ $errors->first('date') }}</div>
		@endif
</div>

<label class="col-sm-2 col-form-label">Current Salary</label>
<div class="col-sm-4">
 <input required type="Number"  id="current_salary" step="0.00000001" min="0.00000001" name="current_salary"  value="{{$employees[0]->current_salary}}" class="form-control form-control-round" placeholder="Enter  Current Salary" >
  @if ($errors->has('current_salary'))
			<div class="alert alert-danger">{{ $errors->first('current_salary') }}</div>
		@endif
</div>    
</div> 




<div class="form-group row">
<label class="col-sm-2 col-form-label">Scane CNIC</label>
<div class="col-sm-4">
<input type="file" accept="image/x-png,image/gif,image/jpeg" /  class="form-control form-control-round" name="scanefile" value="{{$employees[0]->picture}}" id="imgInp" />
  <div class="form-group"><br>
                                @if(isset($employees[0]->picture))
                                    <img width="100px" src="{{asset('storage/app/'.$employees[0]->picture)}}" alt="{{$employees[0]->picture}}" id="blah">
                                @else
                                    <img width="100px" src="{{asset('storage/app/no_image.jpg')}}" alt="" id="blah">
                                @endif
                                </div>
</div>

    <label class="col-sm-2 col-form-label">Address</label>
<div class="col-sm-4">
<textarea required rows="3" cols="3" name="address" id="address"   class="form-control form-control-round" placeholder="Address">{{$employees[0]->address}}</textarea>
 @if ($errors->has('address'))
			<div class="alert alert-danger">{{ $errors->first('address') }}</div>
		@endif
</div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="make-switch switch-large">
        <label>Status</label><label class="switch">Status
          <input type="checkbox"  name="my-checkbox" <?php if(isset($employees[0]->Status) && $employees[0]->Status == "Active"){ echo 'checked'; }?> data-switchery="true">
  <span class="slider round"></span>
</label>
        </div>
      </div>
    </div>
  </div> 
<br>
<div class="form-group row">
<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/addemployee') }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
</div> 
<div class="col-sm-2">
 <button type="Reset" style="" class="btns_reset" >Reset</button>
</div>    
<div class="col-sm-2">
 <button type="submit" style="" class="btns_save" >Update</button>
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
</div>
</div>
</div>
</div>
</div>

<!-- Warning Section Starts -->

@include('includes/footer')<div class="container">
<script type="text/javascript">
window.onload = function(){
   MaskedInput({
      elm: document.getElementById('cnic_format'), // select only by id
      format: '_____-_______-_',
      separator: '-'
   });
};
(function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));


$('.cell').on('keydown', function (e) {

      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
      return;
    }
    if($(this).val().length == 4)
    {
      $(this).val($(this).val()+'-');
    }

    if($(this).val().length >= 13)
    {
      return false;
    }
  });


$(document).ready(function () {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errormsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});



</script>
