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
<h4>Challan</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createchallan') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
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
<select readonly="true" onchange="driverchange()" name="driver_id" id="driver_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
  <option value="">Select Driver</option>
@foreach($vehicle as $value)
<option value="{{$value->id}}">{{$value->owner_name}}</option>
@endforeach
</select></div>     
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Loader Name</label>
<div class="col-sm-2">
<input required type="text" id="loader_name"  name="loader_name" class="form-control form-control-round" placeholder="Loader Name">
</div>

<label class="col-sm-2 col-form-label">Dispatch Time</label>
<div class="col-sm-2">
<input readonly="true" required type="time" value="{{ date('H:i') }}" id="dispatch_time"  name="dispatch_time" class="form-control form-control-round" placeholder="Dispatch Time">
</div> 
<label class="col-sm-2 col-form-label">Karachi To </label>
<div class="col-sm-2">
<select name="station_id" id="station_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
  <option value="">Select station</option>
@foreach($station as $value)
<option value="{{$value->id}}">{{$value->station_name}}</option>
@endforeach
</select></div>     
</div> 


<div class="form-group row">
<label class="col-sm-2 col-form-label">Truck number</label>
<div class="col-sm-2">
<select onchange="truckchange(this)" name="truck_num" id="truck_num" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select truck number</option>
@foreach($vehicle as $value)
<option value="{{$value->id}}">{{$value->car_number}}</option>
@endforeach
</select></div>

<label class="col-sm-2 col-form-label">Mobile Number</label>
<div class="col-sm-2">
<select readonly="true" name="mobile_num" id="mobile_num" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select mobile number</option>
@foreach($mobilenumber as $value)
<option value="{{$value->id}}">{{$value->phone_no}}</option>
@endforeach
</select>
</div> 

<label class="col-sm-2 col-form-label">Malik/Broker</label>
<div class="col-sm-2">
<input required readonly="true" type="text" id="malik_bro" value="" name="malik_bro" class="form-control form-control-round" placeholder="Malik/Broker">
</div> 
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Container Number</label>
<div class="col-sm-2">
<input type="text" id="container_num" value="" name="container_num" class="form-control form-control-round " placeholder="Container Number">
</div> 

<label class="col-sm-2 col-form-label">Container seal</label>
<div class="col-sm-2">
<input  type="text" id="container_seal" value="" name="container_seal" class="form-control form-control-round" placeholder="Seal Number">
</div>    
</div>
<div class="form-group row">
<div class="col-sm-2">

<button style="display:none;" type="button" onclick="myFunction()" style="" class="btns_save">Get Bilty</button>

<div style="display:flex;">
  <input placeholder="Enter Computer No" type="number" id="search_com_no" />
  &nbsp;
  <input type="button" onclick="display_computer_no()" value="Search" />
</div>

<script type="text/javascript">
  var enter_com_no = document.getElementById("search_com_no");
  enter_com_no.addEventListener("keydown", function (e) {
      if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
          //
          /*var quantityenter = $(e.target).parent('td').parent('tr').find('td');
          var biltyQty = quantityenter.find(".quantityenter").val();*/
          //
          e.preventDefault();
          display_computer_no();
      }
  });

  function display_computer_no(){
   
   
    var id = document.getElementById('search_com_no').value;
    $('#'+id).show();
    insertTempBilty(id);
   // myamount();
    //for saving in temp table so we can save it
    $.ajax({
    url:'savetemptable',
    type:'GET',
    async: false,
    data: { id: id },
    success:function(data){
    // alert(data);
}
});

  }
</script>

</div>
</div>

<div style="display: " class="form-group row" id="myDIV" >
<div class="table-responsive">
<!--<table  class="table" id="DataTable" width="100%" >-->
<table  class="table" width="100%" >
  <thead>
   <tr>
    <!--<th>Builty No</th>-->
    <th>Computer No</th>
    <th>Sender Name</th>
    <th>Receiver Name</th>
    <th>Total Quantity </th>
    <th style="display:none;">Enter Quantity</th>
    <th>Rent </th>
    <th>Total</th>  
    <th>Advance</th>
    <th>Balance</th>
    <th>Actions</th>
    <!--<th>Part</th>-->
   </tr>
  </thead>

<tbody>

  
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
  <tr id="{{$value->id ??''}}" style="display:none;">
    <td style="display:none;"><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
     @if($value->customer_type=="urd")
     <td>{{$value->getsender[0]->customer_name_urdu ??''}}</td>
     @else
     <td>{{$value->getsender[0]->customer_name ??''}}</td>
     @endif
      @endif
       @if(!isset($value->getsender[0]))
        <td></td>
      @endif
       @if(isset($value->getreceiver[0]))
       @if($value->customer_type=="urd")
       <td>{{$value->getreceiver[0]->customer_name_urdu ??''}}</td>
       @else
       <td>{{$value->getreceiver[0]->customer_name ??''}}</td>
       @endif
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
      @if($value->bilty_type=="ToPay")
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
      <td>{{$value->balance ??''}}</td>
      <td><a id="deletebiltychallan" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>  </td>
      @else
       <td></td>
      <td></td>
      <td></td>
      <td></td>
       <td><a id="deletebiltychallan" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>  </td>
      @endif
        <!--<td><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>-->
              
              
               
            
              </tr>
              @endif
              @if($check!="")
              @if($check->bilty_part!="no")

  <tr id="{{$value->id ??''}}" style="display:none;">
    <td style="display:none;"><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
     @if($value->customer_type=="urd")
     <td>{{$value->getsender[0]->customer_name_urdu ??''}}</td>
     @else
     <td>{{$value->getsender[0]->customer_name ??''}}</td>
     @endif
      @endif
       @if(!isset($value->getsender[0]))
        <td></td>
      @endif
       @if(isset($value->getreceiver[0]))
       @if($value->customer_type=="urd")
                                <td>{{$value->getreceiver[0]->customer_name_urdu ??''}}</td>
                                @else
                                <td>{{$value->getreceiver[0]->customer_name ??''}}</td>
                                @endif
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
      
       @if($value->bilty_type=="ToPay")
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
      <td>{{$value->balance ??''}}</td>
       <td><a id="deletebiltychallan" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>  </td>
      @else
      <td></td>
      <td></td>
      <td></td>
       <td><a id="deletebiltychallan" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>  </td>
      <td></td>
      @endif
        <!--<td><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>-->
              
              
               
            
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
  <tr id="{{$value->id ??''}}" style="display:none;">
    <td style="display:none;"><input type='checkbox' onchange="doalert(this)"  name='bilty_id[]' id='bilty_id' class='biltyCheck' 
      value="{{$value->id}}">{{$value->bilty_no ??''}}
    </td>
    <td class="pkid">{{$value->id ??''}}</td>
    
      <td>{{$value->sender_name}}</td>
      <td>{{$value->receiver_name}}</td>
     
      
       <td class="total_quantity">{{ $count}}</td>
   
       @if($value->bilty_type=="ToPay")
      <td>{{$value->rent ??''}}</td>
      <td>{{$value->total_charges ??''}}</td>
      <td >{{$value->advance ??''}}</td>
      <td>{{$value->balance ??''}}</td>
      @else
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      @endif
        <!--<td class="part_biltys"><input type='checkbox' onchange="doadjust(this)"  name='part_bilty[]' id='part_bilty' class='part_bilty' 
      value="{{$value->id}}">
    </td>-->
              
              
               
            
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
<input onchange="myamount()" required type="number" id="delivery" value="{{7}}" name="delivery" class="form-control form-control-round" placeholder="Delivery commission">
</div>
<label class="col-sm-2 col-form-label">Other charges</label>
<div class="col-sm-2">
<input onchange="myamount()" required type="number" id="other_charges" value="" name="other_charges" class="form-control form-control-round" placeholder="Other charges">
</div>
 <label class="col-sm-2 col-form-label">Next Rent</label>
<div class="col-sm-2">
<input onchange="myamount()"  type="number" id="next_rent" value="" name="next_rent" class="form-control form-control-round" placeholder="Next Rent">
</div>
</div> 

<div class="form-group row">
  <label class="col-sm-2 col-form-label">Total Bilty amount</label>
<div class="col-sm-2">
<input  readonly="true" required type="text" id="total_biltyamounts" value=""  class="form-control form-control-round" placeholder="Total bilty amount">
</div>
<label class="col-sm-2 col-form-label">Total amount</label>
<div class="col-sm-2">
<input  readonly="true" required type="text" id="total_amounts" value="" name="total_amount" class="form-control form-control-round" placeholder="Total amount">
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
<button type="submit" style="" class="btns_save">Save</button>
</div> 
<div class="col-sm-2">
  <button type="submit" name="savenprint" value="savenprint" style="" class="btns_save">Save & Print</button>
</div>   
</div>



</form>


</div>
</div>
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
<table class="table" id="DataTable2" width="100%">
<thead>
<tr style="width:100%">
<th>S.No</th>
<th>Challan Number</th>
<th>Other Charges</th>
<th>Next Rent</th>
<th>Total Amount</th>

<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($challan as $key=>$value)
<tr>
<td>{{$key+1}}</td>
<td>{{$value->id??''}}</td>
<td>{{$value->other_charges??''}}</td>
<td>{{$value->next_rent??''}}</td>
<td>{{$value->total_amount??''}}</td>

<td>
   <a href="{{url('/mehmoodgoodemployee/challan/pdf/'.$value->id)}}"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;

<a href="{{url('/mehmoodgoodemployee/viewchallan'.$value->id)}}"><i class="fa fa-eye"></i></a></i></a>&nbsp;|&nbsp;
<a href="{{url('/mehmoodgoodemployee/editchallan/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deletechallan" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                             
</td>
</tr>
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
</div>
</div>

<!-- Warning Section Starts -->


@include('includes/footer')
<div class="container">
  @if(Session::has('print'))
  <script>window.open("{{url('/mehmoodgoodemployee/challan/pdf')}}/{{Session::get('print')}}",'_blank');</script>
 
  @endif
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
     
    
    //total-=-$("#delivery").val();
     comission = $("#delivery").val();
   
     
     total +=+$("#next_rent").val();
      total +=+$("#other_charges").val();
    
     caculate = (total*comission)/100;
   //  let othercharges=$("#other_charges").val();
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
      

          optionpackages += '<option value="'+ data[i].phone_no +'">' +data[i].phone_no  + '</option>';
       
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


function truckchange(selectObject)
 {
  var id = selectObject.value;  
  //alert(id);
  
  $.ajax({
    url:'gettruckinfo',
    type:'GET',
    async: false,
    data: { id: id },
    success:function(data){
      $('#malik_bro').val(data.broker_name);
      $('#driver_id').val(data.id);
      $('#mobile_num').val(data.vehicle_phoneno[0].id);
    /*  var optionpackages ='<option value="">Select Driver Phone</option>';
      for(var i=0;i<data.length;i++){
      

          optionpackages += '<option value="'+ data[i].phone_no +'">' +data[i].phone_no  + '</option>';
       
      } 
      number.html(optionpackages); */
//$('#category_id').selectpicker('refresh')


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
var amount= 0;

// s --
function insertTempBilty(id) {
    //console.log(biltyQty);
    /*var arr = checkboxElem.value;
    var totalquantity= $(event.target).parent('td').parent('tr').find('td.total_quantity').text();*/
    var part = "no";
    var arr = id;
    var totalquantity = 0;
    
    $.ajax({
    url:'getchallanbalance',
    type:'GET',
    async: false,
    data: { id:arr,total_quantity:totalquantity,part:part },
      success:function(data){
        amount +=+ data;
        console.log(amount)
        // comission = $("#delivery").val();
        let total = (amount * 0.07);
        total = Math.round(amount - total)
        // total = Math.round(total)
        $("#total_amounts").val(total);
        $("#total_biltyamounts").val(amount);
      }
    });

}
// e --

function doalert(checkboxElem) {
  
 
   //if checkbox is check then it will add amount on the basis of selected value
  if (checkboxElem.checked) {
    var arr = checkboxElem.value;
      var totalquantity= $(event.target).parent('td').parent('tr').find('td.total_quantity').text();
      var part = "no";
     
    // arr.push(checkboxElem);
    
    $.ajax({
    url:'getchallanbalance',
    type:'GET',
    async: false,
    data: { id:arr,total_quantity:totalquantity,part:part },
    success:function(data){

      amount +=+ data;
   
      // $('#total_amount').val('');
     $("#total_amounts").val(amount);
    $("#total_biltyamounts").val(amount);
//$('#category_id').selectpicker('refresh');


}
});

    
  } 
  //if checkbox is uncheck then it will deduct from previous account
  else {
   
    var deduction = 0;
    
    var finalamount = 0;
   var arr = checkboxElem.value;
   
    // arr.push(checkboxElem);
    
    $.ajax({
    url:'getchallanbalance',
    type:'GET',
    async: false,
    data: { id:arr },
    success:function(data){
    deduction += amount-data;

    
//$('#category_id').selectpicker('refresh');


}
});
    
    amount =deduction;
    
    $("#total_amounts").val(deduction);
    $("#total_biltyamounts").val(deduction);
     myamount();
  }
}


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
          var txtValue = quantityenter.find(".quantityenter").val();   //access the 
        //     var a= $(event.target).parent('td').parent('tr').find('td .quantityenter').prop('disabled',true);
          // alert($abc);
             var part = "yes";
           //quantity is greate than it will disabled both the checkboxes and tempbilties table will delete entry

          if(txtValue<=totalquantity)
          {
             
          $abc =  $(event.target).parent('td').parent('tr').find('td .quantityenter').val('');
          $disabled = $(event.target).parent('td').parent('tr').find('td .quantityenter').prop('disabled',true);
          $uncheckbox1 = $(event.target).parent('td').parent('tr').find('td .biltyCheck').prop('checked',false);
          $uncheckbox2 = $(event.target).parent('td').parent('tr').find('td .part_bilty').prop('checked',false);
          Swal.fire({
             title: 'Your enter quantity is greater therefore it will not save',
           showClass: {
                popup: 'animated fadeInDown faster'
                   },
           hideClass: {
               popup: 'animated fadeOutUp faster'
                   }
                 })
             //alert("greater");
          }
          //otherwise it will save with enter quantity and disable textbox
          else{
             $disabled = $(event.target).parent('td').parent('tr').find('td .quantityenter').prop('disabled',true);
          //  alert("not greater");
          }
       
    $.ajax({
      url:'insertchallanquantity',
      type:'GET',
      async: false,
      data: { id:id,quantityenter:txtValue,totalquantity:totalquantity,part:part },
      success:function(data){
   

       }
        });    
          
        }
    });



var $rows = $('#DataTable tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  amount
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

$(document).on("click","#deletebiltychallan", function(e){ //user click on remove text
    var id = $(this).attr('data-deleteId');
    console.log(id);
   // var removeid = document.getElementById('search_com_no').value;
    $('#'+id).hide();
    //alert(amount);
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
        url: '{{url('deletetempchallan')}}',
        data: data,
        date: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
            if (response) {
                Swal.fire({
                  title: 'Deleted!',
            html: '<strong>Your Bilty has been deleted.</strong>',
            type: 'success',
            showConfirmButton: false,
            timer: 1000,
                })
              //  location.reload();
            }
        },
        error: function () {
        }
    });
  }
})

   
    
    $.ajax({
    url:'getchallanbalance',
    type:'GET',
    async: false,
    data: { id:id },
      success:function(data){
      //  alert(data);
        amount +=- data;
        $("#total_amounts").val(amount);
        $("#total_biltyamounts").val(amount);

      }
    });
   
  })
</script>
@if(Session::has('print'))
<script>window.open("{{url('/mehmoodgoodemployee/pdf')}}/{{Session::get('print')}}",'_blank');</script>
<script type="text/javascript">
  

  $("#sender_no").on("change", function() {
    $("#sender_no").val($("#sender_no option:first").val());
});

</script>

@endif

</div>

