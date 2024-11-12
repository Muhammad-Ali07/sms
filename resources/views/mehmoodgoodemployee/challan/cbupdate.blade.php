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
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('updatecb') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">

<div class="form-group row">

<label class="col-sm-2 col-form-label">Cb Number</label>
<div class="col-sm-2">
<input value="{{$commission[0]->id ??''}}" readonly="true" required type="number" id="cb_number" value="" name="cb_number" class="form-control form-control-round" placeholder=" challan Number">
</div>
<label class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-2">
<input value="{{date("d-m-Y")}}" type="text" class="form-control form-control-round txtDate"  name="date" id="date">
</div> 


<label class="col-sm-2 col-form-label">Vehicle number</label>
<div class="col-sm-2">
<select  name="truck_num" id="truck_num" value="{{ old('truck_num') }}" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select truck number</option>
<option value="all">All</option>
@foreach($vehicle as $value)

@if($commission[0]->vehicle_id==$value->id)
<option selected value="{{$value->id}}">{{$value->car_number}}</option>
@endif
@if($commission[0]->vehicle_id!=$value->id)
<option value="{{$value->id}}">{{$value->car_number}}</option>
@endif

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
<table class="table table-bordered" id="dynamic_field">

</table>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Total Receiving</label>
<div class="col-sm-2">
<input readonly="true"  required type="number" id="totalreceiving"  name="totalreceiving" value="{{$commission[0]->totalreceiving ??''}}" class="form-control form-control-round" placeholder="Total Receiving">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('totalreceiving') }}</span>
@endif  
<label class="col-sm-2 col-form-label">Fix Rent</label>
<div class="col-sm-2">
<input  required type="number" id="fixrent" name="fixrent" value="{{$commission[0]->fixrent ??''}}" class="form-control form-control-round" placeholder="Fix Rent">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('fixrent') }}</span>
@endif 
 <label class="col-sm-2 col-form-label">Cash Receiving</label>
<div class="col-sm-2">
<input  required type="number" id="cash_receiving" value="{{$commission[0]->cash_receiving ??''}}" name="cash_receiving" class="form-control form-control-round" placeholder="Cash Receiving">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('cash_receiving') }}</span>
@endif 
</div> 

<div class="form-group row">
<label class="col-sm-2 col-form-label">Commission </label>
<div class="col-sm-2">
<input  required type="text" value="{{$commission[0]->commission ??''}}" id="commission"  name="commission" class="form-control form-control-round" placeholder="Commission">
</div>
 @if($errors->any())
<span class="error_span"> {{ $errors->first('commission') }}</span>
@endif
<label class="col-sm-2 col-form-label">Remaining Commission</label>
<div class="col-sm-2">
<input required type="text" value="{{$commission[0]->remaining_commission ??''}}" id="remaining_commission" value="" name="remaining_commission" class="form-control form-control-round" placeholder="Remaining Commission">
</div>
@if($errors->any())
<span class="error_span"> {{ $errors->first('remaining_commission') }}</span>
@endif
<label class="col-sm-2 col-form-label">Total Weight</label>
<div class="col-sm-2">
<input readonly="true"  required type="text" id="total_weight"  name="total_weight" value="{{$commission[0]->total_weight ??''}}" class="form-control form-control-round" placeholder="Total Weight">
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
<button type="submit" style="" class="btns_save">Update</button>
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
<table class="table">
<thead>
<tr style="width:100%">
<th>S.No</th>
<th>Date</th>
<th>Cb Number</th>
<th>Vehicle number</th>
<th>Fix Rent</th>
<th>Total Receiving</th>
<th>Total Weight</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

@foreach($commissionbook as $key=>$value)
<tr>
<td>{{$key+1}}</td>
<td>{{$value->date??''}}</td>
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
  
   $(document).on('change', '.biltyCheck', function(event) {

        if(this.checked) {
        
          var a= $(event.target).parent('td').parent('tr').find('td .Description').prop('disabled', false);
            // var returnVal = confirm("Are you sure?");
            console.log(a);
            // $(this).prop("checked", returnVal);
        }
    });


    $(document).on('change', '.biltyCheck', function(event) {
       var arr = [];
     $(".biltyCheck:checked").each(function () {
   
    arr.push($(this).val());
  
   $.ajax({
    url:'getchallancbbalance',
    type:'GET',
    async: false,
    data: { id:arr },
    success:function(data){

     $("#totalreceiving").val(data);
    
//$('#category_id').selectpicker('refresh');


}
});
   $.ajax({
    url:'getchallancbweight',
    type:'GET',
    async: false,
    data: { id:arr },
    success:function(data){
     $("#total_weight").val(data);
    
//$('#category_id').selectpicker('refresh');


}
});


});

    });



function myFunction() {

//alert('ss');

 var truck_num=$('#truck_num').val();
 var id=$('#cb_number').val();



        // console.log(customer_id);
        var trc=""; 

    $.ajax({

        type: 'get',

        url: '{!!URL::to('updategetcbchallantable')!!}',

        data: {"truck_num":truck_num,"id":id},

        success:function(data)
        {
           
            
            trc+= '<thead><tr><th>Sr No</th><th>Challan Number</th><th>Challan Amount</th><th>Description</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
             
            for(var i=0;i<data[1].length;i++)
            {
              
           
                
             
              trc+="<tr><td><input checked  type='checkbox'  name='challan_id[]' id='challan_id' class='biltyCheck' value='" + data[1][i].id + "'/>" + data[1][i].id + "</td>";

                 trc+='<td>' + data[1][i].id + '</td>';
              
              trc+='<td>' + data[1][i].total_amount + '</td>';
                
                 trc+="<td><input type='text' placeholder='Enter Description'  name='description[]' class='Description' id='description' value='" + data[1][i].getbookmetas[0].description + "' />"+"</td>";
               

                
            
              
            
               
            
              trc+='</tr>';
           
            
          }
          for(var j=0;j<data[0].length;j++)
            {
              
           
           // $data[1][0]->getbookmetas[0]->description
               if(data[0][j])
               {
              trc+="<tr><td><input  type='checkbox'  name='challan_id[]' id='challan_id' class='biltyCheck' value='" + data[0][j].id + "'/>" + data[0][j].id + "</td>";

                 trc+='<td>' + data[0][j].id + '</td>';
              
              trc+='<td>' + data[0][j].total_amount + '</td>';
          
               
                     trc+="<td><input type='text' placeholder='Enter Description'  name='description[]' class='Description' id='description' disabled />"+"</td>";
                
               
              
            
               
            
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




</script>

</div>

