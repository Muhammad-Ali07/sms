@include('includes/header')
@include('datatable/datatable')
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
    @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
  <div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/addloanadvance') }}" type="submit" style="padding-top:10px;border:none;" class="btns_save">Add Advance Salary</a>
</div>
</div>

</div>
<!-- Basic Form Inputs card end -->
</div>
</div>

</div>                       
</div>
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Loan Advance</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table id="DataTable" class="table" style="width:200%" >
<thead>
<tr>
<th>S.No</th>
<th>Emp Type</th>
<th>Emp Name</th>
<th>Date</th>
<th>Payment Type</th>
<th>Description</th>
<th>Advance Amount</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

@if(isset($LoanAddvance))
@foreach($LoanAddvance as $key=>$value)
<tr>
  <?php
$date = date('d-m-Y',strtotime($value->Date));
?>
<th scope="row">{{$key+1}}</th>
<td>{{$value->Loanaddvance[0]->employee_type ?? ''}}</td>
<td>{{$value->Loanaddvance[0]->employee_name ?? ''}}</td>
<td>{{$date ?? ''}}</td>
<td>{{$value->Type ?? ''}}</td>
<td>{{$value->description ?? ''}}</td>
<td>{{$value->amount ?? ''}}</td>

<td>
<a href="{{url('mehmoodgoodemployee/viewaddloanadvance/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
<a href="{{url('mehmoodgoodemployee/editaddloanadvance/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deleteloanadvance" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                            
 </td>
</tr>

@endforeach
@endif
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

<!-- Warning Section Starts -->



@include('includes/footer')<div class="container">
<script type="text/javascript">

$(document).ready(function() {
    $('#DataTable').DataTable();
} );
  
$(document).on("click","#deleteloanadvance", function(e){ //user click on remove text
        var id = $(this).attr('data-deleteId');
        var data = {
                id : id,
            }
        // console.log(data);
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
        url: '{{url('deleteloanadvance')}}',
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
</script>
