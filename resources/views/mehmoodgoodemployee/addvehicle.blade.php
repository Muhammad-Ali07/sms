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

@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
  <div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/vehicle') }}" type="submit" style="padding-top:10px;border:none;" class="btns_save">Add Vehicle </a>
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
											<h4>View Add Vehicle</h4>
										</div>
										<div class="card-block">
											<div class="card-block table-border-style">
												<div class="table-responsive">
                                                <table class="table" id="DataTable" width="100%">
														<thead>
															<tr style="width:100%">
																<th>S.No</th>
																<th>Owner Name</th>
																<th >Broker Name</th>
																<th>Car Number</th>
																<th>Car Type</th>
																<th>Phone Number</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@if(isset($addvehicle))
															@foreach($addvehicle as $key=>$value)
															<tr>
																<th scope="row">{{$key+1}}</th>
																<td>{{$value->owner_name ?? ''}}</td>
																<td>{{$value->broker_name ?? ''}}</td>
																<td>{{$value->car_number ?? ''}}</td>
																<td>{{$value->car_type ?? ''}}</td>
																<td>{{$value->vehicle_phoneno[0]->phone_no ?? ''}}</td>
																<td>
																	<a href="{{url('mehmoodgoodemployee/viewaddvehicle/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
																	<a href="{{url('mehmoodgoodemployee/editaddvehicle/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
<a id="deletevehicle" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>                                                             
																</td>
															</tr>
															@endforeach
														@endif</tr>

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
@include('includes/footer')
@include('datatable/datatable');
<script type="text/javascript">
	$(document).ready(function() {
    $('#DataTable').DataTable();
} );


	$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
	e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="container"><div class=" form-group row input_fields_wrap"><label class="col-sm-2 col-form-label">Phone Number</label><div class="col-sm-4"><input type="text" name="phoneno[]"class="form-control form-control-round" placeholder="Enter Phone Number"></div><button class="remove_field " style=""> Remove</button></div></div>');}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	e.preventDefault(); $(this).parent('div').remove(); x--;
})
});


	$(document).on("click","#deletevehicle", function(e){ //user click on remove text
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
        url: '{{url('deletevehicle')}}',
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

