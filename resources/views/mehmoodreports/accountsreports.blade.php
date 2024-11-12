

<style type="text/css">
	.btns_reset{
		background:#ff5252!important;width:100%;height:40px;
		text-align: center;font-size:px;color:white;font-weight:bold;border-radius:5px;border:none;
	}
	.btns_save{
		background:#448aff!important;width:100%;height:40px;
		text-align: center;font-size:px;color:white;font-weight:bold;border-radius:5px;border:none;
	}




</style>
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
<center><h3 class="form_toheader"><u>All Account Reports</u></h3></center>
</div>
										<div class="container"><br><br>
											<div class="row">
												<div class="col-md-6">
													<a href="{{url('mehmoodreports/bankservicescharereports')}}">		
														<div class="card mat-clr-stat-card text-white green ">
															<div class="card-block">
																<div class="row">
																	<div class="col-3 text-center bg-c-green">
																		<i class="fa fa-file mat-icon f-24"></i>
																	</div>
																	<div class="col-9 cst-cont">
																		<h4>Bank Services Charges Report</h4>
																	</div>
																</div>
															</div>
														</div></a>
													</div>
													<div class="col-md-6">
														<a href="{{url('mehmoodreports/banktransferreport')}}">
															<div class="card mat-clr-stat-card text-white green ">
																<div class="card-block">
																	<div class="row">
																		<div class="col-3 text-center bg-c-green">

																		<i class="fa fa-file mat-icon f-24"></i>

																		</div>
																		<div class="col-9 cst-cont">
																			<h4>Bank Transfer Reports </h4>
																		</div>
																	</div>
																</div>
															</div>
														</a>
													</div>
												</div>


												<div class="row">
													<div class="col-md-6">
														<a href="{{url('mehmoodreports/depositwithdrwalreport')}}">

															<div class="card mat-clr-stat-card text-white green ">
																<div class="card-block">
																	<div class="row">
																		<div class="col-3 text-center bg-c-green">
																		<i class="fa fa-file mat-icon f-24"></i>
																		</div>
																		<div class="col-9 cst-cont">
																			<h4>Deposit WithDrawl Reports</h4>
																		</div>
																	</div>
																</div>
															</div></a>
														</div>
														<div class="col-md-6">
														<a href="{{url('mehmoodreports/bankledgerreports')}}">

																<div class="card mat-clr-stat-card text-white green ">
																	<div class="card-block">
																		<div class="row">
																			<div class="col-3 text-center bg-c-green">

																		<i class="fa fa-file mat-icon f-24"></i>

																			</div>
																			<div class="col-9 cst-cont">
																				<h4>Bank Ledger Report</h4>
																			</div>
																		</div>
																	</div>
																</div>
															</a>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<a href="{{url('mehmoodreports/pettycashledgerreport')}}">

																<div class="card mat-clr-stat-card text-white green ">
																	<div class="card-block">
																		<div class="row">
																			<div class="col-3 text-center bg-c-green">
																		<i class="fa fa-file mat-icon f-24"></i>
																			</div>
																			<div class="col-9 cst-cont">
																				<h4>Petty Cash Ledger Report</h4>
																			</div>
																		</div>
																	</div>
																</div></a>
															</div>
															<div class="col-md-6">
										<a href="{{url('mehmoodreports/banktopettycashtransferreports')}}">

																	<div class="card mat-clr-stat-card text-white green ">
																		<div class="card-block">
																			<div class="row">
																				<div class="col-3 text-center bg-c-green">

																		<i class="fa fa-file mat-icon f-24"></i>

																				</div>
																				<div class="col-9 cst-cont">
																					<h4>Bank To PertyCasht Transfer Report</h4>
																				</div>
																			</div>
																		</div>
																	</div>
																</a>
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

			@section('script')
			<script type="text/javascript">
				$(function () {
					$('#datetimepicker1').datetimepicker();
				});
			</script>
		</div>
		@endsection

		@include('includes/footer')<div class="container">
