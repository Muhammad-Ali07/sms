@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
      <div class="flex">
         @include('includes.side-nav')
 {!! HTML::style('assets/global/css/components.css') !!}
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
    {!! HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
    <!-- BEGIN PAGE HEADER-->
         
         
             <div class="content">
            <!-- BEGIN: Top Bar -->
			<h3 class="page-title text-lg font-medium mr-auto">
			{{$pageTitle}}
			</h3>
          
            <!-- END: Top Bar -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="load">

                     {{--INLCUDE ERROR MESSAGE BOX--}}
                      @include('admin.common.error')
                     {{--END ERROR MESSAGE BOX--}}

                    </div>

					<a href="{{ route('admin.expenses.create')}}" class="btn green">
                                    Add New expense Item <i class="fa fa-plus"></i>
                      </a>
                    <hr>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-database"></i>Expense List
							</div>

						</div>

						<div class="portlet-body">

							<table class="table table-striped table-bordered table-hover" id="expenses">
								<thead>
								<tr>
									<th>
										 ID.
									</th>
									<th>
										 Item Name
									</th>
									<th>
										 Purchase From
									</th>
									<th>
										 Purchase Date
									</th>
									<th>
										 Price ( <span class="fa {{-- $setting->currency_icon --}}"> {{-- $setting->currency_icon --}} </span> )
									</th>
									<th>
										 Action
									</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->

			{{--DELETE MODAL CALLING--}}
			@include('admin.include.delete-modal')
            {{--DELETE MODAL CALLING END--}}
@stop

@section('script')

<!-- BEGIN PAGE LEVEL PLUGINS -->
	{!!  HTML::script("assets/global/plugins/select2/select2.min.js") !!}
    	{!!  HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js") !!}
    	{!!  HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") !!}

<!-- END PAGE LEVEL PLUGINS -->

	<script>


    	var table = $('#expenses').dataTable( {
					"cache": true,
					"bProcessing": true,
					"bServerSide": true,
					"bDestroy": true,
					"order": [[1, "desc"]],
					"ajax": "{{ URL::route("admin.ajax_expenses") }}",
                    "aoColumns": [
                        { 'sClass': 'center', "bSortable": true  },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": false }
                    ],
					"lengthMenu": [
									[5, 15, 20, -1],
									[5, 15, 20, "All"] // change per page values here
								],
                    "sPaginationType": "full_numbers",
                    "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                        var row = $(nRow);
                        row.attr("id", 'row'+aData['0']);
                    }

         });

		// Show Delete Modal
		function del(id,name) {

			$('#deleteModal').modal('show');

			$("#deleteModal").find('#info').html('Are you sure ! You want to delete <strong>'+name+'</strong> ?');

			$('#deleteModal').find("#delete").off().click(function () {

				var url = "{{ route('admin.expenses.destroy',':id') }}";
				url = url.replace(':id',id);

				var token = "{{ csrf_token() }}";

				$.easyAjax({
					type: 'DELETE',
					url: url,
					data: {'_token': token},
					container: "#deleteModal",
					success: function (response) {
						if (response.status == "success") {
							$('#deleteModal').modal('hide');
							table.fnDraw();
						}
					}
				});

			});
		}
</script>
@stop
	