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
<h4>Commission Book</h4>
</div>
<div class="card-block">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createcb') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<input type="hidden" name="chalan_id_array" id="chalan_id_array" value="">
<div class="form-group row">

<label class="col-sm-2 col-form-label">Cb Number</label>
<div class="col-sm-2">
<input value={{$id}} readonly="true" required type="number" id="cb_number" value="" name="cb_number" class="form-control form-control-round" placeholder=" challan Number">
</div>
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-2">
<input value="{{date("d-m-Y")}}"type="text" class="form-control form-control-round txtDate"  name="date" id="date">
</div> 


<label class="col-sm-2 col-form-label">Vehicle number</label>
<div class="col-sm-2">
<select name="truck_num" id="truck_num" value="{{ old('truck_num') }}" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select truck number</option>

@foreach($vehicle as $value)
<option value="{{$value->id}}">{{$value->car_number}}</option>
@endforeach
</select></div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('truck_num') }}</span>
@endif  
</div>

<div class="form-group row">
<div class="col-sm-2">
<button type="button" onclick="myFunction()" style="" class="btns_save">Search Challan</button>
</div>
</div>


<div class="form-group row" id="myDIV" >
<div class="table-responsive">
<table class="table table-bordered" id="dynamic_field" >

</table>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Voucher Amount</label>
<div class="col-sm-2">
<input readonly="true"  required type="number" id="totalreceiving" value="" name="totalreceiving" value="{{ old('totalreceiving') }}" class="form-control form-control-round" placeholder="Voucher Amount">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('totalreceiving') }}</span>
@endif  
<label class="col-sm-2 col-form-label">Truck Freight</label>
<div class="col-sm-2">
<input  onchange="myrent(this)" required type="number" id="fixrent"  value="" name="fixrent" value="{{ old('fixrent') }}" class="form-control form-control-round" placeholder="Truck Freight">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('fixrent') }}</span>
@endif 
 <label class="col-sm-2 col-form-label">Commission</label>
<div class="col-sm-2">
<input readonly="true"  required type="number" id="cash_receiving" value="{{ old('cash_receiving') }}" name="cash_receiving" class="form-control form-control-round" placeholder="Commission">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('cash_receiving') }}</span>
@endif 
</div> 

<div class="form-group row">

 @if($errors->any())
<span class="error_span"> {{ $errors->first('commission') }}</span>
@endif
<label class="col-sm-2 col-form-label">Remaining Commission</label>
<div class="col-sm-2">
<input readonly="true"  type="text" value="{{ old('remaining_commission') }}" id="remaining_commission" value="" name="remaining_commission" class="form-control form-control-round" placeholder="Remaining Commission">
</div>
@if($errors->any())
<span class="error_span"> {{ $errors->first('remaining_commission') }}</span>
@endif
<label class="col-sm-2 col-form-label">Total Weight</label>
<div class="col-sm-2">
<input readonly="true"  required type="text" id="total_weight"  name="total_weight" value="{{ old('total_weight') }}" class="form-control form-control-round" placeholder="Total Weight">
</div>
@if($errors->any())
<span class="error_span"> {{ $errors->first('total_weight') }}</span>
@endif
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
<small id="message"></small>
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
<h4>View Commission Book</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table" id="DataTable2" width="100%">
<thead>
<tr style="width:100%">
<th>S.No</th>
<th>Date</th>
<th>Cb Number</th>
<th>Vehicle number</th>
<th>Fix Rent</th>
<th>Receivable</th>
<th>Total Weight</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

@foreach($commissionbook as $key=>$value)
<tr>
<?php
$date = date('d-m-Y',strtotime($value->date));
?>
<td>{{$key+1}}</td>
<td>{{$date ?? ''}}</td>
<td>{{$value->cb_number??''}}</td>
<td>{{$value->vehicle_id??''}}</td>
<td>{{$value->fixrent??''}}</td>
<td>{{$value->totalreceiving??''}}</td>
<td>{{$value->total_weight??''}}</td>

<td>
  
 <a href="{{url('/mehmoodgoodemployee/cb/pdf/'.$value->id)}}"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;

<a href="{{url('/mehmoodgoodemployee/viewcb'.$value->id)}}"><i class="fa fa-eye"></i></a></i></a>&nbsp;|&nbsp;
<a href="{{url('/mehmoodgoodemployee/editcb'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deletecb" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                             
</td>
</tr>
@endforeach
                                                                
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
</div>
</div>

<!-- Warning Section Starts -->


@include('includes/footer')
<div class="container">

<script>
    $(document).ready(function() {
    $('.DataTable').DataTable();
    $('#DataTable2').DataTable();
    
} );





function myFunction() {

//alert('ss');

 var truck_num=$('#truck_num').val();



        // console.log(customer_id);
        var trc=""; 

    $.ajax({

        type: 'get',

        url: '{!!URL::to('getcbchallantable')!!}',

        data: {"truck_num":truck_num},

        success:function(data)
        {
           
            
            trc+= '<thead><tr><th>Sr No</th><th>Challan Number</th><th>Challan Amount</th><th>Description</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
            for(var i=0;i<data.length;i++)
            {
              
            
             
             
             
              
              trc+="<tr><td><input type='checkbox' onchange='doalert(this)'  name='challan_id[]' id='challan_id' class='biltyCheck' value='" + data[i].id + "'/>" + data[i].id + "</td>";

                 trc+='<td>' + data[i].id + '</td>';
              
              trc+='<td>' + data[i].total_amount + '</td>';
                trc+="<td><textarea name='description[]' class='Description form-control' id='description' placeholder='Enter Description' disabled></textarea>"+"</td>";
               

            
            
              
            
               
            
              trc+='</tr>';
            }
           
            trc+= '</tbody>';
      $('#dynamic_field').html(trc);
        table = $('#dynamic_field').DataTable();
table.destroy(); 
$('#dynamic_field').DataTable({
    "retrieve": true,
        "paging": false,
        "scrollY":"500px",
        "scrollCollapse": true,

      });
        },

        error:function(){



        }

    });




}


   var arr1 = [];
function doalert(checkboxElem) {

   //if checkbox is check then it will add amount on the basis of selected value
  if (checkboxElem.checked) { 

    var a= $(event.target).parent('td').parent('tr').find('td .Description').prop('disabled', false);

    var arr = checkboxElem.value;

    // console.log(arr);
    arr1.push(arr);

    // alert(arr1);
    $.ajax({
      url:'getchallancbbalance',
      type:'GET',
      data: { "id":arr1 },
      success:function(data){
        console.log(data);
        $("#totalreceiving").val(data);
      }
    });

    $.ajax({
      url:'getchallancbweight',
      type:'GET',
      data: { "id":arr1 },
      success:function(data){
       
        $("#total_weight").val(data);
      }
    });

        // $("#chalan_id_array").val(arr1);


  }

  //if checkbox is uncheck then it will deduct from previous account
  else {
    var a= $(event.target).parent('td').parent('tr').find('td .Description').prop('disabled', true);
   
    var arr = checkboxElem.value;


    var index = arr1.indexOf(arr);

    if (index !== -1){
      arr1.splice(index,1);
    } 
    console.log(arr1);

    $.ajax({
      url:'getchallancbbalance',
      type:'GET',
      data: { "id":arr1 },
      success:function(data){
       $("#totalreceiving").val(data);
      }
    });

    $.ajax({
      url:'getchallancbweight',
      type:'GET',
      data: { "id":arr1 },
      success:function(data){
        $("#total_weight").val(data);
      }
    });

        // $("#chalan_id_array").val(arr1);


  }

}



$(document).on('focusin' , 'input[type=search]', function() {
  $('.btns_save').prop('disabled', true);
  $('.btns_save').css('opacity', '0.6');
  $('#message').text("Clear Search Bar First");
});
$(document).on('focusout' , 'input[type=search]', function() {
  var $this = $(this).val();
  if($this == "" || $this == null){
    $('.btns_save').prop('disabled', false);
    $('.btns_save').css('opacity', '1');
    $('#message').text("");
  }
});
// $('input[type=search]').focusout( function() {
//   alert('focusOut');
//   // $(this).css("background-color", "#FFFFFF");
// });
$(document).on("click","#deletecb", function(e){ //user click on remove text
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
        url: '{{url('deletecb')}}',
        data: data,
        date: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
            if (response) {
                Swal.fire({
                  title: 'Deleted!',
            html: '<strong>Your Cb has been deleted.</strong>',
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

function myrent(selectObject) {
  var value = selectObject.value;
  var  receiving = $('#totalreceiving').val();
  var newvalue = 0;
  if(parseInt(receiving)>parseInt(value))
  {
    newvalue = receiving-value;
    $('#cash_receiving').val(newvalue);
    $('input[name=remaining_commission').val('');
  }
  else
  {
   newvalue = value-receiving;
   $('#remaining_commission').val(newvalue);
   $('input[name=cash_receiving').val('');
  }
 
}
</script>

</div>

