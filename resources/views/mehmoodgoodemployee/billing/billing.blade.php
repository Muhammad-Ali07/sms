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
<h4>Billing</h4>
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

@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createbilling') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<input type="hidden" name="chalan_id_array" id="chalan_id_array" value="">
<div class="form-group row">

<label class="col-sm-2 col-form-label">Bill Number</label>
<div class="col-sm-2">
<input value={{$id}} readonly="true" required type="number" id="cb_number" value="" name="cb_number" class="form-control form-control-round" placeholder=" challan Number">
</div>
<label class="col-sm-2 col-form-label">Customer Type</label>
<div class="col-sm-4">
<select  onchange="getcustomertype(this)" id="customer_type" name="customer_type"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Customer Type</option>
<option value="Paid">Paid</option>
<option value="ToPay">ToPay</option>

</select>

  </div> 
</div>
  <div class="form-group row">
<label class="col-sm-2 col-form-label">Customer Name</label>
<div class="col-sm-4">
<select name="customer_id" onchange="mytype()" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" id="customer">
<option value="">Select Customer Name</option>
@foreach($customer as $value)
<option value="{{$value->id}}">{{$value->customer_name}}</option>
@endforeach
</select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Type</label>
<div class="col-sm-4">
<select disabled name="bill_type" id="bill_type" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" id="customer">
<option value="">Select Type</option>
<option value="{{"homedelivery"}}">{{"Home Delivery"}}</option>
<option value="{{"extraweight"}}">{{"Extra Weight"}}</option>
</select>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-4">
<input type="text"  id="fromdate" name="fromdate" class="form-control form-control-round txtDate" placeholder="Enter Date">
</div>


<label class="col-sm-2 col-form-label">To Date</label>
<div class="col-sm-4">
<input type="text"  id="todate" name="todate" class="form-control form-control-round txtDate" placeholder="Enter To Date">
</div>    
</div>




<div class="form-group row">
<div class="col-sm-3">
<button type="button" onclick="myFunction()" style="" class="btns_save">Search Bilty</button>
</div>
</div>

<div class="form-group row" id="myDIV" >
<div class="table-responsive">
<table class="table table-bordered" id="dynamic_field">

</table>
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
<h4>View Bill</h4>
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
<th>Customer Name</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

@foreach($bill as $key=>$value)
<tr>
<?php
$date = date('d-m-Y',strtotime($value->created_at));
?>
<td>{{$key+1}}</td>
<td>{{$date ?? ''}}</td>
<td>{{$value->id??''}}</td>
<td>{{$value->customer[0]->customer_name??''}}</td>

<td>
  
 <a href="{{url('/mehmoodgoodemployee/billing/openpdf/'.$value->id)}}"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;

<a href="{{url('/mehmoodgoodemployee/viewbilling/'.$value->id)}}"><i class="fa fa-eye"></i></a></i></a>&nbsp;|&nbsp;
<a href="{{url('/mehmoodgoodemployee/editbilling/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deletebill" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                             
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

    function getcustomertype(t) 
  {
    var type=t.value;
    


    if(type=="Paid")
    {
     
    
      var sender_dropdown = $("#customer_id");
    $.ajax({
      url:'getsenderdropdown',
      type:'GET',
      async: false,
      data: { type: type },
      success:function(data){

        var optionpackages ='<option value="">Select Customer Name</option>';
        for(var i=0;i<data.length;i++){


          optionpackages += '<option value="'+ data[i].id +'">' +data[i].customer_name + '</option>';
        }

        sender_dropdown.html(optionpackages);
//$('#category_id').selectpicker('refresh');


      }
      }); 
    
      }
    else{
        
           var sender_dropdown = $("#customer_id");
    $.ajax({
      url:'getsenderdropdown',
      type:'GET',
      async: false,
      data: { type: type },
      success:function(data){

        var optionpackages ='<option value="">Select Customer Name</option>';
        for(var i=0;i<data.length;i++){


          optionpackages += '<option value="'+ data[i].id +'">' +data[i].customer_name + '</option>';
        }

        sender_dropdown.html(optionpackages);
//$('#category_id').selectpicker('refresh');


}
});
    } 
   

   } 



  function mytype() {
  var customer = $('#customer_id').val();
  $.ajax({

        type: 'get',

        url: '{!!URL::to('checkcustomername')!!}',

        data: {"customer":customer},

        success:function(data)
        {

        if(data=="true")
        {
          $("#bill_type").prop('disabled', false);
        }  
        else{
         $("#bill_type").prop('disabled', true);
        }  
  
        },

        error:function(){



        }

    });




   }  

function myFunction() {

//alert('ss');

 //var customerid =$('#customer_id').val();
 var fromdate = $('#fromdate').val();
 var todate =  $('#todate').val();
 var customer = $('#customer_id').val();
 var type =     $('#bill_type').val();
  

 


        
        var trc=""; 

    $.ajax({

        type: 'get',

        url: '{!!URL::to('getbillingbiltytable')!!}',

        data: {"fromdate":fromdate,"todate":todate,"customer":customer},

        success:function(data)
        {
          
              if(type=="extraweight")
                { 
            trc+= '<thead><tr><th>Check</th><th>Bilty Number</th><th>Amount</th><th>Weight Kg</th><th>Extra Weight</th><th>Detention</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
              }
              if(type=="homedelivery")
              {
                  trc+= '<thead><tr><th>Check</th><th>Bilty Number</th><th>Amount</th><th>Home Delivery</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
              }
              if(type!="homedelivery" && type!="extraweight"){
                trc+= '<thead><tr><th>Check</th><th>Bilty Number</th><th>Amount</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
              }
           
              for(var i=0;i<data[0].length;i++)
              {
              
            
             
             
             
                 if(data[1][i]=="t")
                 {
                if(type=="extraweight")
                {
                trc+="<tr><td><input type='checkbox'  name='bilty_id[]' id='bilty_id' class='biltyCheck' value='" + data[0][i].id + "'/>" + data[0][i].id + "</td>";

                 trc+='<td>' + data[0][i].bilty_no + '</td>';
              
                 trc+='<td>' + data[0][i].total_charges + '</td>';
                 
                  
                 trc+="<td><input type='text'  name='weight[]' id='weight' class='weight' value='"  + "'/>"  + "</td>";
                
                 trc+="<td><input type='text'  name='extra_weight[]' id='extra_weight' class='extra_weight' value='" + "'/>"  + "</td>";
                
                 
                  trc+="<td><input type='text'  name='detention[]' id='detention' class='detention' value='" + "'/>"  + "</td>";
                   
                 
              
            
               
            
                trc+='</tr>';
                 }
               if(type=="homedelivery")
                {
                trc+="<tr><td><input type='checkbox'  name='bilty_id[]' id='bilty_id' class='biltyCheck' value='" + data[0][i].id + "'/>" + data[0][i].id + "</td>";

                 trc+='<td>' + data[0][i].bilty_no + '</td>';
              
                 trc+='<td>' + data[0][i].total_charges + '</td>';
                 
                  
                 trc+="<td><input type='text'  name='homedelivery[]' id='homedelivery' class='homedelivery' value='"  + "'/>"  + "</td>";
                
  
                   
                 
              
            
               
            
              trc+='</tr>';
               }
               }
               else{
                 trc+="<tr><td><input type='checkbox'  name='bilty_id[]' id='bilty_id' class='biltyCheck' value='" + data[0][i].id + "'/>" + data[0][i].id + "</td>";

                 trc+='<td>' + data[0][i].bilty_no + '</td>';
              
                 trc+='<td>' + data[0][i].total_charges + '</td>';
                 
                  trc+='</tr>';
               }
            }
           
            trc+= '</tbody>';
      $('#dynamic_field').html(trc);
        },

        error:function(){



        }

    });




}

$(document).on("click","#deletebill", function(e){ //user click on remove text
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
        url: '{{url('deletebill')}}',
        data: data,
        date: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
            if (response) {
                Swal.fire({
                  title: 'Deleted!',
            html: '<strong>Your Bill has been deleted.</strong>',
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

