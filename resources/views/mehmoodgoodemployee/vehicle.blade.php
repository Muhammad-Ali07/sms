
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
											<h4>Add Vehicle</h4>
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
											<form enctype="multipart/form-data" action="{{ route('createvehicle') }}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
												<input type="hidden" value="{{ csrf_token() }}" name="_token" />
												<meta name="csrf-token" content="{{csrf_token()}}">


												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Driver Name</label>
													<div class="col-sm-4"> 
														<input type="text" required name="owner_name" id="owner" class="form-control form-control-round" value="{{ old('owner_name') }}" placeholder="Enter Driver Name">
													</div>
													<label class="col-sm-2 col-form-label">Broker/Owner Name</label>
													<div class="col-sm-4"> 
														<input type="text" required name="broker_name" id="borker" class="form-control form-control-round" value="{{ old('broker_name') }}" placeholder="Enter Broker Name">
													</div>
												</div> 


												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Truck Number</label>
													<div class="col-sm-4">
														<input type="text" required name="car_number" id="carnumber" class="form-control form-control-round" value="{{ old('car_number') }}" placeholder="Enter Truck Number">

													</div>

													<label class="col-sm-2 col-form-label">Car Type </label>
													<div class="col-sm-4">
														<input type="text" required  name="car_type" id="cartype" class="form-control form-control-round" value="{{ old('car_type') }}" placeholder="Enter Car Type">
													</div>    
												</div>

												<div class=" form-group row input_fields_wrap">
													<div class="container">
													<div class=" form-group row input_fields_wrap88">
													<label class="col-sm-2 col-form-label">Phone Number 1</label>
													<div class="col-sm-4">
														<input maxlength="11" type="tel" required name="phoneno[]"class="form-control form-control-round" value="{{ old('phoneno.0') }}" placeholder="Enter Phone Number" onkeypress="return isNumber(event)" />
													</div>

													<div class="col-sm-2">
														<button class="add_field_button">Add More </button>
													</div>
												</div>
</div>
</div>

												<br>
												<div class="form-group row">
<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
<a href="{{ url('/mehmoodgoodemployee/addvehicle') }}" type="submit" style="padding-top:10px;border:none;" class="btns_reset">Back</a>
</div> 
<div class="col-sm-2">
 <button type="Reset" style="" class="btns_reset" >Reset</button>
</div>    
<div class="col-sm-2">
 <button type="submit" style="" class="btns_save" >Save</button>
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
	$(function () {
		$('#datetimepicker1').datetimepicker();
	});
	function myFunction() {
		alert('abc')
	}

	$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
	e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="container"><div class=" form-group row input_fields_wrap88"><label class="col-sm-2 col-form-label">Phone Number '+x+' </label><div class="col-sm-4"><input maxlength="11" type="tel" name="phoneno[]"class="form-control form-control-round" placeholder="Enter Phone Number" onkeypress="return isNumber(event)"></div><button class="remove_field " style=""> Remove</button></div></div>');}
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


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

