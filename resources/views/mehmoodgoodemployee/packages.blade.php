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
  <div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/addpackages') }}" type="submit" style="padding-top:10px;border:none;" class="btns_save">Add Packages</a>
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
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<h4>View Add Packages</h4>
</div>
<div class="card-block">
<div class="card-block table-border-style">
<div class="table-responsive">
<table id="DataTable" class="table" style="width:200%" >
<thead>
  
<tr>
<th>S.No</th>
<th>Package Name</th>
<th>Description</th>


<th>Actions</th>
</tr>
</thead>
<tbody>
@if(isset($packages))
@foreach($packages as $key=>$value)
<tr>
<th scope="row">{{$key+1}}</th>
<td>{{$value->packages_metas[0]->package_name ?? ''}}</td>
<td>{{$value->packages_metas[0]->description ?? ''}}</td>

<td>
<a href="{{url('mehmoodgoodemployee/packages/view/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
<a href="{{url('mehmoodgoodemployee/packages/edit/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deletepackages" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                             
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
@include('includes/footer')<div class="container">
@include('datatable/datatable');
<script type="text/javascript">
$(function () {
$('#datetimepicker1').datetimepicker();
});


$(document).on("click","#deletepackages", function(e){ //user click on remove text
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
        url: '{{url('deletepackages')}}',
        data: data,
        date: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
          if (response.status == true) {
            Swal.fire({
              title: 'Deleted!',
              html: '<strong>Your Customer has been deleted.</strong>',
              type: 'success',
              showConfirmButton: false,
              timer: 3000,
            })
              location.reload();
            }
            else if(response.status == false){
              Swal.fire({
              title: 'Error!',
              html: response.error,
              type: 'warning',
              showConfirmButton: true,
            })
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
</div>

