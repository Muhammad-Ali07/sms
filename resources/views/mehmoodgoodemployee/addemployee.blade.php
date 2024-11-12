@include('includes/header')

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
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
<h4>Add Employee</h4>
</div>
<div class="card-block">
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{ route('createcustomer') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<br>
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
  <div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/employee') }}" type="submit" style="padding-top:10px;border:none;" class="btns_save">Add Employee</a>
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
<h4>View Employee</h4>
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
<th>Mobile Number</th>
<th>CNIC</th>
<th>Joining Date</th>
<th>Joining Salary</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@if(isset($employees))
@foreach($employees as $key=>$value)
<tr>
<?php
$date = date('d-m-Y',strtotime($value->joining_date));
?>
<th scope="row">{{$key+1}}</th>
<td>{{$value->employee_type ?? ''}}</td>
<td>{{$value->employee_name ?? ''}}</td>
<td>{{$value->mobile_number ?? ''}}</td>
<td>{{$value->cnic ?? ''}}</td>
<td>{{$date ?? ''}}</td>
<td>{{$value->joining_salary ?? ''}}</td>
<td>
<a href="{{url('mehmoodgoodemployee/viewaddemployee/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
<a href="{{url('mehmoodgoodemployee/editaddemployee/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<!-- <a id="deleteemployee" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                              -->
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


$(document).on("click","#deleteemployee", function(e){ //user click on remove text
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
        url: '{{url('deleteemployee')}}',
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


$(document).ready(function() {
    $('#DataTable').DataTable();
} );

</script>
