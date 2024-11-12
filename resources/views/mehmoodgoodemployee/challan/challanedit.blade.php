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
<h4>Edit Challan</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('updatechallan') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<input type="hidden" name="amountarray" id="amountarray">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Challan Number</label>
<div class="col-sm-2">
<input value={{$id}} readonly="true" required type="number" id="challan_number" value="" name="challan_number" class="form-control form-control-round" placeholder=" challan Number">
</div>

<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-2">
<input value="{{date("d-m-Y")}}" type="text" class="form-control form-control-round txtDate"  name="date">
</div> 
<label class="col-sm-2 col-form-label">Driver Name </label>
<div class="col-sm-2">
<select onchange="driverchange()" name="driver_id" id="driver_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
  <option value="">Select Driver</option>
@foreach($vehicle as $value)
<option @if($challan->driver_id == $value->id) selected @endif value="{{$value->id}}">{{$value->owner_name}}</option>
@endforeach
</select></div>     
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Loader Name</label>
<div class="col-sm-2">
<input required type="text" id="loader_name"  name="loader_name" class="form-control form-control-round" placeholder="Loader Name" value="{{$challan->loader_name}}">
</div>

<label class="col-sm-2 col-form-label">Dispatch Time</label>
<div class="col-sm-2">
<input required type="time" value="{{ date('H:i') }}" id="dispatch_time"  name="dispatch_time" class="form-control form-control-round" placeholder="Dispatch Time" value="{{$challan->dispatch_time}}">
</div> 
<label class="col-sm-2 col-form-label">Karachi To </label>
<div class="col-sm-2">
<select name="station_id" id="station_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select station</option>
@foreach($station as $value)
<option @if($challan->station_id == $value->id) selected @endif  value="{{$value->id}}">{{$value->station_name}}</option>
@endforeach
</select></div>     
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Truck number</label>
<div class="col-sm-2">
<select name="truck_num" id="truck_num" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select truck number</option>
@foreach($vehicle as $value)
<option @if($challan->driver_id == $value->id) selected @endif value="{{$value->id}}">{{$value->car_number}}</option>
@endforeach
</select></div>

<label class="col-sm-2 col-form-label">Mobile Number</label>
<div class="col-sm-2">
<select name="mobile_num" id="mobile_num" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required="">
<option value="">Select Mobile Number</option>
@foreach($vehiclephone as $value)
<option @if($challan->mobile_number == $value->id) selected @endif value="{{$value->id}}">{{$value->phone_no}}</option>
@endforeach
</select>
</div> 

<label class="col-sm-2 col-form-label">Malik/Broker</label>
<div class="col-sm-2">
<input required readonly="true" type="text" id="malik_bro" name="malik_bro" class="form-control form-control-round" placeholder="Malik/Broker" value="{{$challan->broker_name}}">
</div> 
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Container Number</label>
<div class="col-sm-2">
<input type="text" id="container_num"  name="container_num" class="form-control form-control-round " placeholder="Container Number" value="{{$challan->cont_number}}">
</div> 

<label class="col-sm-2 col-form-label">Container seal</label>
<div class="col-sm-2">
<input  type="text" id="container_seal"  name="container_seal" class="form-control form-control-round" placeholder="Seal Number" value="{{$challan->cont_seal}}">
</div>    
</div>
<div class="form-group row">
<div class="col-sm-2">

</div>
</div>





<hr>
<div class="form-group row" id="myexistingDIV" >
  <h2>Existing Bilties</h2>
<div class="table-responsive">
<table  class="table" id="DataTable" width="100%" >
  <thead>
   <tr>
    <th>Builty No</th>
    <th>Computer No</th>
    <th>Sender Name</th>
    <th>Receiver Name</th>
    <th>Total Quantity </th>
    <th>Enter Quantity</th>
    <th>Rent </th>
    <th>Total</th>  
    <th>Advance</th>
    <th>Balance</th>
      <th>Part</th>
    </tr>
  </thead>

<tbody>
   

  @if(isset($existingBiltys))
  @foreach($existingBiltys as $value)
  @php
  $count = DB::table('bilty_metas')->where('bilty_id',$value->id)
  ->sum('quantity');
  @endphp
   @php
   $metas= DB::table('challan_metas')->where(['challan_id'=>$id,'bilty_id'=>$value->id])->first();
       $biltyquantity =  $metas->bilty_quantity;
     

    @endphp
  <tr>
    <td><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck existingBiltyCheck' 
      value="{{$value->id}}" checked>{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
      <td>{{$value->getsender[0]->customer_name}}</td>
      @endif
       @if(!isset($value->getsender[0]))
        <td></td>
      @endif
       @if(isset($value->getreceiver[0]))
       <td>{{$value->getreceiver[0]->customer_name}}</td>
       @endif
         @if(!isset($value->getreceiver[0]))
       <td></td>
       @endif
       @if(isset($value->getbiltyadjust[0]))
       <td class="total_quantity" >{{$value->getbiltyadjust[0]->total_quantity+$biltyquantity ??''}}</td>
       @endif
       @if(!isset($value->getbiltyadjust[0]))
        <td class="total_quantity">{{$value->getbiltymeta[0]->quantity ??''}}</td>
       @endif
      
      <td class="enter_quantity"><input type="number" placeholder="enter quantity" name="quantityenter[]" class="quantityenter" id="quantityenter" disabled value="{{ $biltyquantity }}"></td>
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
       <td>{{$value->balance ??''}}</td>
        <td><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>
              
              
               
            
              </tr>
              @endforeach  
        @endif 

  
</tbody>
</table>
</div>
</div>





<hr>







<div class="form-group row" id="myDIV" >
  <h2>New Bilties</h2>
<div class="table-responsive">
<table  class="table" id="DataTable" width="100%" >
  <thead>
   <tr>
    <th>Builty No</th>
    <th>Computer No</th>
    <th>Sender Name</th>
    <th>Receiver Name</th>
    <th>Total Quantity </th>
    <th>Enter Quantity</th>
    <th>Rent </th>
    <th>Total</th>  
    <th>Advance</th>
    <th>Balance</th>
      <th>Part</th>
    </tr>
  </thead>

<tbody>

   @if(isset($biltyadjust))
  
  @foreach($biltyadjust as $value)

  @if($value->getbiltyadjust[0]->total_quantity!=0)
   @php
   $biltychk = DB::table('challan_metas')->where('bilty_id',$value->id)
   ->orderBy('id','desc')->first();

   @endphp
   @if($biltychk->bilty_part!="no")

  <tr>
    <td><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
      <td>{{$value->getsender[0]->customer_name}}</td>
      @endif
       @if(!isset($value->getsender[0]))
        <td></td>
      @endif
       @if(isset($value->getreceiver[0]))
       <td>{{$value->getreceiver[0]->customer_name}}</td>
       @endif
         @if(!isset($value->getreceiver[0]))
       <td></td>
       @endif
       @if(isset($value->getbiltyadjust[0]))
       <td class="total_quantity" >{{$value->getbiltyadjust[0]->total_quantity ??''}}</td>
       @endif
       @if(!isset($value->getbiltyadjust[0]))
        <td class="total_quantity">{{$value->getbiltymeta[0]->quantity ??''}}</td>
       @endif
      <td class="enter_quantity"><input type="number" placeholder="enter quantity" name="quantityenter[]" class="quantityenter" id="quantityenter" disabled></td>
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
       <td>{{$value->balance ??''}}</td>
        <td><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>
              
              
               
            
              </tr>
       @endif       
         @endif  
        @endforeach  
        @endif    

  @if(isset($biltytable))
  @foreach($biltytable as $value)
  @php
  $count = DB::table('bilty_metas')->where('bilty_id',$value->id)
  ->sum('quantity');
   $check = DB::table('challan_metas')->where(['bilty_id'=>$value->id])
   ->orderBy('id', 'desc')
  ->first();
  @endphp
  @if($check=="")
  <tr>
    <td><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
      <td>{{$value->getsender[0]->customer_name}}</td>
      @endif
       @if(!isset($value->getsender[0]))
        <td></td>
      @endif
       @if(isset($value->getreceiver[0]))
       <td>{{$value->getreceiver[0]->customer_name}}</td>
       @endif
         @if(!isset($value->getreceiver[0]))
       <td></td>
       @endif
       @if(isset($value->getbiltyadjust[0]))
     <td class="total_quantity">{{ $count ??''}}</td>
       @endif
       @if(!isset($value->getbiltyadjust[0]))
        <td class="total_quantity">{{$count ??''}}</td>
       @endif
      <td class="enter_quantity"><input type="number" placeholder="enter quantity" name="quantityenter[]" class="quantityenter" id="quantityenter" disabled></td>
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
       <td>{{$value->balance ??''}}</td>
        <td><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>
              
              
               
            
              </tr>
              @endif
              @if($check!="")
              @if($check->bilty_part!="no")

  <tr>
    <td><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
      <td>{{$value->getsender[0]->customer_name}}</td>
      @endif
       @if(!isset($value->getsender[0]))
        <td></td>
      @endif
       @if(isset($value->getreceiver[0]))
       <td>{{$value->getreceiver[0]->customer_name}}</td>
       @endif
         @if(!isset($value->getreceiver[0]))
       <td></td>
       @endif
       @if(isset($value->getbiltyadjust[0]))
     <td class="total_quantity">{{ $count ??''}}</td>
       @endif
       @if(!isset($value->getbiltyadjust[0]))
        <td class="total_quantity">{{$count ??''}}</td>
       @endif
      <td class="enter_quantity"><input type="number" placeholder="enter quantity" name="quantityenter[]" class="quantityenter" id="quantityenter" disabled></td>
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
       <td>{{$value->balance ??''}}</td>
        <td><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>
              
              
               
            
              </tr>
              @endif
              @endif
        @endforeach  
        @endif    

      @if(isset($walkinbiltytable))
      
  @foreach($walkinbiltytable as $value)
   @php
  $count = DB::table('walkinbilty_metas')->where('bilty_id',$value->id)
  ->sum('quantity');

  @endphp
  <tr>
    <td><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
    
      <td>{{$value->sender_name}}</td>
      <td>{{$value->receiver_name}}</td>
     
      
       <td class="total_quantity">{{ $count}}</td>
     <td class="enter_quantity"><input class="quantityenter" id="quantityenter" type="number" placeholder="enter quantity" name="quantityenter[]" disabled></td>
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td>{{$value->advance ??''}}</td>
       <td>{{$value->balance ??''}}</td>
        <td class="part_biltys"><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>
              
              
               
            
              </tr>

        @endforeach  
        @endif    

  
</tbody>
</table>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Delivery commission</label>
<div class="col-sm-2">
<input onchange="myamount()" required type="number" id="delivery" value="{{$challan->delivery_commission}}" name="delivery" class="form-control form-control-round" placeholder="Delivery commission">
</div>
<label class="col-sm-2 col-form-label">Other charges</label>
<div class="col-sm-2">
<input onchange="myamount()" required type="number" id="other_charges" value="{{$challan->other_charges}}" name="other_charges" class="form-control form-control-round" placeholder="Other charges">
</div>
 <label class="col-sm-2 col-form-label">Next Rent</label>
<div class="col-sm-2">
<input onchange="myamount()"  type="number" id="next_rent" value="{{$challan->next_rent}}" name="next_rent" class="form-control form-control-round" placeholder="Next Rent">
</div>
</div> 

<div class="form-group row">
  <label class="col-sm-2 col-form-label">Total Bilty amount</label>
<div class="col-sm-2">
<input  readonly="true" required type="text" id="total_biltyamounts" value="{{$totalamount}}"  class="form-control form-control-round" placeholder="Total bilty amount">
</div>
<label class="col-sm-2 col-form-label">Total amount</label>
<div class="col-sm-2">
<input  readonly="true" required type="text" id="total_amounts" value="{{$challan->total_amount}}" name="total_amount" class="form-control form-control-round" placeholder="Total amount">
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
<button type="submit" style="" class="btns_save">Update</button>
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

<!-- Warning Section Starts -->


@include('includes/footer')
<div class="container">

<script>
  $(document).ready(function() {
    $('#DataTable').DataTable();
} );
   $(document).ready(function() {
    $('#DataTable2').DataTable();
} );
   
 $(document).on('change', '.biltyCheck', function(event) {
        if(this.checked) {
         
          var a= $(event.target).parent('td').parent('tr').find('td .quantityenter').prop('disabled', false);
            // var returnVal = confirm("Are you sure?");
            console.log(a);
            // $(this).prop("checked", returnVal);
        }
    });
   


function myamount()
    {

     var total = 0;
     var commission = 0;
     var caculate  = 0;
     var totalamount = 0;
    total  +=+  $("#total_biltyamounts").val();
     
    
    // total -=-$("#delivery").val();
     comission = $("#delivery").val();
   
     total +=+$("#other_charges").val();
     total +=+$("#next_rent").val();
    
     caculate = (total*comission)/100;
     
     totalamount =  total-caculate;
     var round = Math.round(totalamount); 
     
     $("#total_amounts").val(round);
     
     
    }
    
  function driverchange()
    {
   
  
     var number = $("#mobile_num");
  
  $.ajax({
    url:'getdriverphone',
    type:'GET',
    async: false,
    data: { id: $('#driver_id').val() },
    success:function(data){

      var optionpackages ='<option value="">Select Driver Phone</option>';
      for(var i=0;i<data.length;i++){
      

          optionpackages += '<option value="'+ data[i].id +'">' +data[i].phone_no  + '</option>';
       
      }
      number.html(optionpackages);
//$('#category_id').selectpicker('refresh');


}
});



  $.ajax({
    url:'getdriverbrokername',
    type:'GET',
    async: false,
    data: { id: $('#driver_id').val() },
    success:function(data){
    
     $('#malik_bro').val(data)
       
      }
    
});


}


     
    



$('.numeric').on('input', function (event) { 

    this.value = this.value.replace(/[^0-9]/g, '');
});

   

function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
var biltyamount = parseInt($('#total_biltyamounts').val());
var amount = parseInt($('#total_amounts').val());
function doalert(checkboxElem) {
  // myamount();
  // console.log(checkboxElem);
  // alert(checkboxElem.checked);
 
   //if checkbox is check then it will add amount on the basis of selected value
  if (checkboxElem.checked) {
    var arr = checkboxElem.value;
      var totalquantity= $(event.target).parent('td').parent('tr').find('td.total_quantity').text();
      // alert(totalquantity);
      // alert(amount);
      var part = "no";

      // alert(arr);
     
    // arr.push(checkboxElem);
    
    $.ajax({
    url:'{{URL::to('mehmoodgoodemployee/getchallanbalance')}}',
    type:'GET',
    async: false,
    data: { id:arr,total_quantity:totalquantity,part:part },
    success:function(data){
// console.log(data);
// alert(data);
      amount +=+ data;
// alert(amount);
      biltyamount +=+ data;
      
      // $('#total_amount').val('');
     $("#total_amounts").val(amount);
    $("#total_biltyamounts").val(biltyamount);
//$('#category_id').selectpicker('refresh');
myamount();

}
});

    
  } 
  //if checkbox is uncheck then it will deduct from previous account
  else {
   // alert("In");
    var deduction = 0;
    var biltydeduction = 0;
    var finalamount = 0;
   var arr = checkboxElem.value;
   
    // arr.push(checkboxElem);
    // alert(arr);
    $.ajax({
    url:'{{URL::to('mehmoodgoodemployee/getchallanbalance')}}',
    type:'GET',
    async: false,
    data: { id:arr },
    success:function(data){
      // alert(data);
      // alert(amount);
     deduction += amount-data;
     biltydeduction += biltyamount-data;
    // alert(deduction);
//$('#category_id').selectpicker('refresh');


}
});
    // var adjustamount = $("#total_amounts").val();
    // finalamount = adjustamount-deduction;

    amount = deduction;
    biltyamount = biltydeduction;
    
    $("#total_amounts").val(deduction);
    $("#total_biltyamounts").val(biltydeduction);

    myamount();

    var biltyid = $(event.target).parent('td').parent('tr').find('td.pkid').text();
    var challanid =  $("#challan_number").val();
   
    $.ajax({
    url:'{{URL::to('mehmoodgoodemployee/deleteentries')}}',
    type:'GET',
    async: false,
    data: { challanid:challanid,biltyid:biltyid },
    success:function(data){
      
     }
   });

  }
}


$(document).on('click', '.existingBiltyCheck', function(){
  
  // alert("In");
})


function doadjust(checkboxElem) {
    //alert(checkboxElem);
   //var v = $(checkboxElem).closest('td').siblings('td.quantityenter').text();
   var a= $(checkboxElem.target).parent('td').parent('tr').find('td .quantityenter').prop('disabled',false);
   
   //if checkbox is check then it will add amount on the basis of selected value

}

$(document).on('change', '.part_bilty', function(event) {
        if(this.checked) {
           var id= $(event.target).parent('td').parent('tr').find('td.pkid').text();
          var totalquantity= $(event.target).parent('td').parent('tr').find('td.total_quantity').text();
          var quantityenter = $(event.target).parent('td').parent('tr').find('td');
          var $txtValue = quantityenter.find(".quantityenter").val();   //access the 
             var a= $(event.target).parent('td').parent('tr').find('td .quantityenter').prop('disabled',true);
             var part = "yes";
       
    $.ajax({
    url:'{{URL::to('mehmoodgoodemployee/insertchallanquantity')}}',
    type:'GET',
    async: false,
    data: { id:id,quantityenter:$txtValue,totalquantity:totalquantity,part:part },
    success:function(data){
   

    }
        });    
          
         
          
            // var returnVal = confirm("Are you sure?");
          
            // $(this).prop("checked", returnVal);
        }

    });



var $rows = $('#DataTable tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});



$(document).on("click","#deletechallan", function(e){ //user click on remove text
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
        type: 'get',
        url: '{{url('deletechallan')}}',
        data: data,
        date: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
            if (response) {
                Swal.fire({
                  title: 'Deleted!',
            html: '<strong>Your Challan has been deleted.</strong>',
            type: 'success',
            showConfirmButton: false,
            timer: 6000,
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

</script>

</div>

