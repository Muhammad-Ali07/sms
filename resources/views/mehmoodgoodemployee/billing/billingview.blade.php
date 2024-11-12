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
<style>
.form-control {
font-size: 16px;
font-weight: bold;
color: black;
}

</style>
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
<div disabled class="col-sm-2">
<input value={{$bill[0]->id}} readonly="true" required type="number" id="cb_number" value="" name="cb_number" class="form-control form-control-round" placeholder=" challan Number">
</div>

<label class="col-sm-2 col-form-label">Customer Name</label>
<div class="col-sm-4">
<select disabled name="customer_id" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" id="customer">
<option value="">Select Customer Name</option>
@foreach($customer as $value)
@if($value->id==$bill[0]->customer_id)
<option selected value="{{$value->id}}">{{$value->customer_name}}</option>
@endif
@if($value->id!=$bill[0]->customer_id)
<option value="{{$value->id}}">{{$value->customer_name}}</option>
@endif
@endforeach
</select>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Bill Date</label>
<div class="col-sm-4">
@php
$date = date('d-m-Y',strtotime($bill[0]->created_at));
@endphp
<input disabled readonly="true" type="text" value={{$date}} required id="fromdate" name="fromdate" class="form-control form-control-round txtDate" placeholder="Enter Date">
</div>
</div>







<h4>Bilty Data</h4>
<div class="form-group row" id="myDIV" >
<div class="table-responsive">
<table class="table table-bordered" id="dynamic_field">
<thead>
<tr style="width:100%">
<th>S.No</th>

<th>Bilty Number</th>
<th>Amount</th>

</tr>
</thead>
<tbody>

@foreach($billmeta as $key=>$value)
@foreach($value->getbilty as $keys=>$values)
<tr>

<td>{{$keys+1}}</td>
<td>{{$values->bilty_no ?? ''}}</td>
<td>{{$values->total_charges??''}}</td>

</tr>
@endforeach
@endforeach
                                                                
</td>
</tr>

</tbody>
</table>
</div>
</div>



<br>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ URL::previous() }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">

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

