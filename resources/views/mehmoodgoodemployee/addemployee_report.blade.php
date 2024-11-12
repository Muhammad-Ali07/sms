
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
<form  target="_blank" enctype="multipart/form-data" action="{{url('/')}}/generateemployeepdf" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">

									<div class="card">
										<div class="card-header">
											<h4>Employee Report</h4>
										</div>
										<div class="card-block">


												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Employee </label>
													<div class="col-sm-4">
														<select name="employee" id="employee" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" required>
                                                      <option value="">Select A employee</option>
                                                       @foreach($employees as $value)
                                                       <option value="{{$value->id}}">{{$value->employee_name}}</option>
                                                       @endforeach 
                                                        </select>


													</div>

													<label class="col-sm-2 col-form-label">	
<button type="submit"  style="margin-left: 180px;" class="btns_save">Generate Report</button>

													</label>  
												</div>    





												<br>


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

<!-- Warning Section Starts -->

@section('script')
<script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker();
	});
</script>
</div>
@endsection

@include('includes/footer')<div class="container">
