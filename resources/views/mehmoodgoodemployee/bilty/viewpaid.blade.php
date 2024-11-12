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
 <h4>ToPay</h4>
 <div class="text-right">
  <label class="radio-inline">
    @if($bilty->sender_name!="")
  <input checked type="checkbox" value="walkin"  name="walkin" class="walkin-check"> Walkin Customer
    @endif
    @if($bilty->sender_name=="")
  <input type="checkbox" value="walkin"  name="walkin" class="walkin-check"> Walkin Customer
    @endif
  </label>
  </div>
 </div>
<div class="card-block">

@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createtopaybilty') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="form-group row">
<label class="col-sm-2 col-form-label" style="margin-top:-5px">Builty Type</label>
<div class="col-sm-4">
<label class="radio-inline">
@if($bilty->bilty_type=="ToPay")
<input disabled ="true" type="radio" name="biltytype" checked> To Pay
@endif
@if($bilty->bilty_type!="ToPay")
<input disabled ="true" type="radio" name="biltytype"> To Pay
@endif
</label>
<label class="radio-inline">
@if($bilty->bilty_type=="Paid")
<input disabled type="radio" name="biltytype" checked> Paid
@endif
@if($bilty->bilty_type!="Paid")
<input disabled type="radio" name="biltytype"> Paid
@endif
</label>
<label class="radio-inline">
 @if($bilty->bilty_type=="advance")
<input disabled type="radio" name="biltytype" checked> Advance
@endif
@if($bilty->bilty_type!="advance")
<input disabled type="radio" name="biltytype" > Advance
@endif
</label>
</div>

</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Computer Number</label>
<div class="col-sm-2">
<input type="Number" value="{{$bilty->id??''}}"  id="computer" name="computer"  class="form-control form-control-round" placeholder="Computer No">
</div>

<label class="col-sm-2 col-form-label">Bilty No</label>
<div class="col-sm-2">
<input type="Number" value="{{$bilty->bilty_no??''}}" id="bilty" name="bilty" class="form-control form-control-round" placeholder="Bilty No">
</div> 
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-2">
<input type="text" value="{{date("d-m-Y",strtotime($bilty->date))}}"  class="form-control form-control-round"   >
</div>     
</div> 


<div class="form-group row">

<label class="col-sm-2 col-form-label">Sender Name</label>

<div class="col-sm-2">
@if(isset($bilty->getsender[0]))
	<div id="manual_senderd">
<input type="text" value="{{$bilty->getsender[0]->customer_name??''}}"  class="form-control form-control-round txtDate"    >
</div>
@endif
@if(!isset($bilty->getsender[0]))
<div id="manual_senderdiv">
<input value="{{$bilty->sender_name}}"  type="text" id="manual_sender" name="manual_sender" class="form-control form-control-round" placeholder="sender name">
</div>
@endif
</div>    

<label class="col-sm-2 col-form-label">Sender No</label>
<div class="col-sm-2">
@if(isset($bilty->getsender[0]))
<div id="manual_sendenod">
<input type="text" value="{{$bilty->getsenderphone[0]->number??''}}"  class="form-control form-control-round"   >
</div>
@endif
@if(!isset($bilty->getsender[0]))
<div id="manual_sendenodiv">
<input  type="Number" value="{{$bilty->sender_no??''}}" id="manual_senderno" name="manual_senderno" class="form-control form-control-round" placeholder="sender no">
</div>
@endif
</div>


<label class="col-sm-2 col-form-label">Karachi To</label>
<div class="col-sm-2">
@if($bilty->stationdetail!="")
<input type="text" value="{{$bilty->stationdetail->station_name??''}}"  class="form-control form-control-round"   >
@else
<input type="text" value="{{$bilty->station_name??''}}"  class="form-control form-control-round"   >
@endif
</div>  


</div> 




<div class="form-group row">
<label class="col-sm-2 col-form-label">Receiver Name</label>
<div class="col-sm-2">
@if(isset($bilty->getreceiver[0]))
<div id="manual_receiverd">
<input type="text" value="{{$bilty->getreceiver[0]->customer_name??''}}"  class="form-control form-control-round" >
</div>
@endif
@if(!isset($bilty->getreceiver[0]))
<div id="manual_receiverdiv">
<input value="{{$bilty->receiver_name??''}}"  id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver name">
</div>
@endif
</div>
<label class="col-sm-2 col-form-label">Receiver No</label>
<div class="col-sm-2">
@if(isset($bilty->getreceiver[0]))
<div id="manual_receivernod">
<input type="text" value="{{$bilty->getreceiverphone[0]->number??''}}"  class="form-control form-control-round" >
</div>
@endif
@if(!isset($bilty->getreceiver[0]))
<div id="manual_receivernodiv">
<input value="{{$bilty->receiver_no??''}}"  type="Number" id="manual_receiver" name="manual_receiver" class="form-control form-control-round" placeholder="receiver no">
</div>
@endif
</div>

<label class="col-sm-2 col-form-label">Reference No 1 </label>
<div class="col-sm-2">
<input value="{{$bilty->ref_1??''}}" type="Number" id="reference1" name="reference1" class="form-control form-control-round" placeholder="Reference No 2">
</div>
</div> 

<div class="form-group row">
 
<label class="col-sm-2 col-form-label">Reference No 2 </label>
<div class="col-sm-2">
<input value="{{$bilty->ref_2??''}}" type="Number" id="reference2" name="reference2" class="form-control form-control-round" placeholder="Reference No 2">
</div>    
</div>


<div class=" form-group row input_fields_wrap1" style="border:1px solid #dedede">
<div class="table-responsive">
  
  <div class="col-md-12 text-center">
   @if($bilty->by_type=="weight")
  <input type="radio" name="walkincalType" value="qty" class="walkincalType"  > By Quantity
  <input type="radio" name="walkincalType" value="weight" class="walkincalType" checked=""> By Weight
  <input type="radio" name="walkincalType" value="lumpsum" class="walkincalType"> By LumpSum
   @endif
   @if($bilty->by_type=="qty")
  <input type="radio" name="walkincalType" value="qty" class="walkincalType"  checked=""> By Quantity
  <input type="radio" name="walkincalType" value="weight" class="walkincalType" > By Weight
  <input type="radio" name="walkincalType" value="lumpsum" class="walkincalType"> By LumpSum
   @endif
  @if($bilty->by_type=="lumpsum")
  <input type="radio" name="walkincalType" value="qty" class="walkincalType"  > By Quantity
  <input type="radio" name="walkincalType" value="weight" class="walkincalType" > By Weight
  <input type="radio" name="walkincalType" value="lumpsum" class="walkincalType" checked=""> By LumpSum
   @endif
  </div>
<table class="table">
<thead>

<tr>
<th>Quantity</th>
<th>Packing</th>
<th>Goods Description</th>
<th>Brand</th>
<th>Rate</th>
<th>Weight</th>
<th>Actions</th>	
</tr>
</thead>
<tbody>
@foreach($biltymeta as $value)
<tr>
<td><input type="text" value="{{$value->quantity??''}}" id="quantity" name="quantity[]"  class="form-control" style="width:110px !important;border-radius:50px;border-radius:50px"></td>
<td>
<input type="text" value="{{$value->getpackagedata[0]->package_name ??''}}" id="quantity" name="quantity[]"  class="form-control" style="width:110px !important;border-radius:50px;border-radius:50px">
</td>
<td><input value="{{$value->description??''}}" type="text" id="good" name="good[]"  class="form-control" style="width:300px !important;border-radius:50px"></td>
<td><input type="text" value="{{$value->brand??''}}" id="brand" name="brand[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
<td><input type="text" value="{{$value->rate??''}}" id="rate" name="rate[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
<td><input type="text" value="{{$value->weight??''}}" id="weight" name="weight[]"  class="form-control" style="width:110px !important;border-radius:50px"></td>
<td ><button style="height: 47px;" disabled class="add_field_button1">Add More </button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>


<div class="form-group row">

<label class="col-sm-2 col-form-label">Rent</label>
<div class="col-sm-2">
<input readonly="true" onchange="myamount()" type="number" id="rent" name="rent" value="{{$bilty->rent??''}}" class="form-control form-control-round" placeholder="Rent" >
</div>  

<label class="col-sm-2 col-form-label">Labour</label>
<div class="col-sm-2">
<input value="{{$bilty->labour??''}}"  type="text"   id="Labour" name="Labour"  class="form-control form-control-round" placeholder="Labour">
</div>
<label class="col-sm-2 col-form-label">TT</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->tt??''}}" id="tt" name="tt" class="form-control form-control-round" placeholder="TT">
</div>
</div> 

<div class="form-group row">
  
<label class="col-sm-2 col-form-label">Local Charges</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->local_charges??''}}"  id="local_charges" name="local_charges"  class="form-control form-control-round" placeholder="Local Charges">
</div>
<label class="col-sm-2 col-form-label">Lifter Crane charges</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->crane_charges??''}}" id="lifter" name="lifter" class="form-control form-control-round" placeholder="Lifter Crane charges">
</div>  
<label class="col-sm-2 col-form-label">Home Delivery </label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->home_delivery??''}}"  id="home_delivery" name="home_delivery"  class="form-control form-control-round" placeholder="Home Delivery Charges">
</div>
</div> 
 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Other Charges</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->other_charges??''}}"  id="other_charges" name="other_charges" class="form-control form-control-round" placeholder="Other Charges">
</div>  
<label class="col-sm-2 col-form-label">Total Amount</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->total_charges??''}}"  id="total_amount" name="total_amount"  class="form-control form-control-round" placeholder="Total Amount ">
</div>
<label class="col-sm-2 col-form-label">Advance</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->advance??''}}" id="advance" name="advance" class="form-control form-control-round" placeholder=" Advance">
</div> 
</div> 

<div class="form-group row"> 
<label class="col-sm-2 col-form-label">Balance</label>
<div class="col-sm-2">
<input type="text" value="{{$bilty->balance??''}}"  id="balance" name="balance"  class="form-control form-control-round" placeholder="Balance ">
</div>
</div> 

<br>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ URL::previous() }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
</div>

<label class="col-sm-1 col-form-label"></label>

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


<!-- Warning Section Starts -->
@include('includes/footer')
<script type="text/javascript">
$(document).ready(function() {
var max_fields      = 10;
var wrapper   		= $(".input_fields_wrap1"); 
var add_button      = $(".add_field_button1"); 
var x = 1; 
$(add_button).click(function(e){ 
e.preventDefault();
if(x < max_fields){ 
x++; 
$(wrapper).append('<div class="container"><div class=" form-group row input_fields_wrap1 table_div"><div class="table-responsive"><table class="table">	<tbody><tr><td ><input type="text" id="quantity[]" name="quantity[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="packing[]" name="packing[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="description[]" name="description[]"  class="form-control" placeholder="" style="width:300px !important;border-radius:50px"></td><td ><input type="text" id="brand[]" name="brand[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><input type="text" id="weight[]" name="weight[]"  class="form-control" placeholder="" style="width:110px !important;border-radius:50px"></td><td ><button class="remove_field " style=""> Remove</button></tr></tbody></table></div></div></div>');}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parents('div.table_div').remove(); x--;
})
});


function myFunctionsender() {
    var amount = $("#sender_name").val();
     
     var other_deduction = $("#sender_no");
     var station = $("#karachi_to");
     var  packages = $("#packing");
     
      if(amount=="other")
      {
      //	alert("nothing");
       
       document.getElementById("manual_senderdiv").style.display='block';
       document.getElementById("manual_sendenodiv").style.display='block';
       document.getElementById("manual_senderd").style.display='none';
       document.getElementById("manual_sendenod").style.display='none';
      }
      else
      {
      document.getElementById("manual_senderdiv").style.display='none';
       document.getElementById("manual_sendenodiv").style.display='none';
       document.getElementById("manual_senderd").style.display='block';
       document.getElementById("manual_sendenod").style.display='block';
      $.ajax({
        url:'getcategoriesdropdown',
        type:'GET',
        async: false,
        data: { id: $('#sender_name').val() },
        success:function(data){

            var option ='<option value="">Select Phone</option>';
            for(var i=0;i<data.length;i++){
                option += '<option value="'+ data[i].id +'">' + data[i].number + '</option>';
            }
            other_deduction.html(option);
            //$('#category_id').selectpicker('refresh');


        }
    });
      $.ajax({
        url:'getstationdropdown',
        type:'GET',
        async: false,
        data: { id: $('#sender_name').val() },
        success:function(data){

            var optionstation ='<option value="">Select Station</option>';
            for(var i=0;i<data.length;i++){
              for(var j=0;j<data[i].stationdetail.length;j++){
               
                optionstation += '<option value="'+ data[i].stationdetail[j].id +'">' +data[i].stationdetail[j].station_name + '</option>';
            }
           }
            station.html(optionstation);
            //$('#category_id').selectpicker('refresh');


        }
    });
    $.ajax({
        url:'getpackagesdropdown',
        type:'GET',
        async: false,
        data: { id: $('#sender_name').val() },
        success:function(data){

            var optionpackages ='<option value="">Select Packages</option>';
            for(var i=0;i<data.length;i++){
              for(var j=0;j<data[i].packages_metas.length;j++){
                 
                optionpackages += '<option value="'+ data[i].packages_metas[j].id +'">' +data[i].packages_metas[j].package_name + '</option>';
            }
          }
            packages.html(optionpackages);
            //$('#category_id').selectpicker('refresh');


        }
    });


  }

}

function myFunctionreceiver() {
    var amount = $("#receiver_name").val();
     
     var other_deduction = $("#receiver_no");
      if(amount=="other")
      {
       document.getElementById("manual_receiverdiv").style.display='block';
       document.getElementById("manual_receivernodiv").style.display='block';
       document.getElementById("manual_receiverd").style.display='none';
       document.getElementById("manual_receivernod").style.display='none';
      }
      else
      {
      document.getElementById("manual_receiverdiv").style.display='none';
      document.getElementById("manual_receivernodiv").style.display='none';
      document.getElementById("manual_receiverd").style.display='block';
      document.getElementById("manual_receivernod").style.display='block';	
      $.ajax({
        url:'getcategoriesdropdown',
        type:'GET',
        async: false,
        data: { id: $('#receiver_name').val() },
        success:function(data){

            var option ='<option value="">Select Phone</option>';
            for(var i=0;i<data.length;i++){
                option += '<option value="'+ data[i].id +'">' + data[i].number + '</option>';
            }
            other_deduction.html(option);
            //$('#category_id').selectpicker('refresh');


        }
    	});
       }

}


 $(document).on("click","#deletebilty", function(e){ //user click on remove text
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
        url: '{{url('deletebilty')}}',
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
 $('#post-form-validation *').prop('readonly', true);

</script>