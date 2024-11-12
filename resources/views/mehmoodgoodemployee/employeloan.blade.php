@include('includes/header')

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
<h4>Add Loan/Loan Return</h4>
</div>
<div class="card-block">
<form>
<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
  <div class="col-sm-3">
<a href="{{ url('/mehmoodgoodemployee/addemployeloan') }}" type="submit" style="padding-top:10px;border:none;" class="btns_save">Add Loan/Loan Return </a>
</div>
</div>

</div>
<!-- Basic Form Inputs card end -->
</div>


  


<!-- Basic Form Inputs card end -->
</div>
</div>

</div>                       
</div>
</form>
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Employee loan</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table id="table_id" class="table" style="width:200%" >
<thead>
<tr>
<th>S.No</th>
<th>Loan Type</th>
<th>Employee Category</th>
<th>Employee Name</th>
<th>Date</th>
<th>Loan Amount</th>
<th>Payment Method</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

@if(isset($EmployeeLoan))
@foreach($EmployeeLoan as $key=>$value)
<tr>
	<?php
$date = date('d-m-Y',strtotime($value->Date));
?>
<th scope="row">{{$key+1}}</th>
<td>{{$value->LoanType ?? ''}}</td>
<td>{{$value->salaryemployee[0]->employee_type ?? ''}}</td>
<td>{{$value->salaryemployee[0]->employee_name ?? ''}}</td>
<td>{{$date ?? ''}}</td>
<td>{{$value->amount ?? ''}}</td>
<td>{{$value->payment_method ?? ''}}</td>
<td>
<a href="{{url('mehmoodgoodemployee/viewaddemployeloan/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
<a href="{{url('mehmoodgoodemployee/editaddemployeloan/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deleteloan" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                            
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

<!-- Warning Section Starts -->

<script type="text/javascript">

$(document).on("click","#deleteloan", function(e){ //user click on remove text
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
        url: '{{url('deleteloan')}}',
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
</div>

@include('includes/footer')<div class="container">
