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
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createbilling') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<input type="hidden" name="chalan_id_array" id="chalan_id_array" value="">
<div class="form-group row">

<label class="col-sm-2 col-form-label">Cb Number</label>
<div class="col-sm-2">
<input value={{$id}} readonly="true" required type="number" id="cb_number" value="" name="cb_number" class="form-control form-control-round" placeholder=" challan Number">
</div>

<label class="col-sm-2 col-form-label">Customer Name</label>
<div class="col-sm-4">
<select name="customer_id" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" id="customer">
<option value="">Select Customer Name</option>
@foreach($customer as $value)
<option value="{{$value->id}}">{{$value->customer_name}}</option>
@endforeach
</select>
</div>
</div>

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
<div class="col-sm-2">
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
  
 <a href="{{url('/mehmoodgoodemployee/cb/pdf/'.$value->id)}}"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;

<a href="{{url('/mehmoodgoodemployee/viewbill'.$value->id)}}"><i class="fa fa-eye"></i></a></i></a>&nbsp;|&nbsp;
<a href="{{url('/mehmoodgoodemployee/editbill'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
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

function myFunction() {

//alert('ss');

 //var customerid =$('#customer_id').val();
 var fromdate = $('#fromdate').val();
 var todate =  $('#todate').val();


 


        // console.log(customer_id);
        var trc=""; 

    $.ajax({

        type: 'get',

        url: '{!!URL::to('getbillingbiltytable')!!}',

        data: {"fromdate":fromdate,"todate":todate},

        success:function(data)
        {
          
            
            trc+= '<thead><tr><th>Check</th><th>Bilty Number</th><th>Amount</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
            for(var i=0;i<data.length;i++)
            {
              
            
             
             
             
              
              trc+="<tr><td><input type='checkbox'  name='bilty_id[]' id='bilty_id' class='biltyCheck' value='" + data[i].id + "'/>" + data[i].id + "</td>";

                 trc+='<td>' + data[i].bilty_no + '</td>';
              
              trc+='<td>' + data[i].total_charges + '</td>';
              
               

            
            
              
            
               
            
              trc+='</tr>';
            }
           
            trc+= '</tbody>';
      $('#dynamic_field').html(trc);
        },

        error:function(){



        }

    });




}





</script>

</div>

