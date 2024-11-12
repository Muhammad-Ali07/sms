@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')


 @include('includes.mobile-nav')
      <div class="flex">
         @include('includes.side-nav')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css") !!}
	<!-- END PAGE LEVEL STYLES -->

<div class="content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title text-lg font-medium mr-auto">
                {{$pageTitle}}
                </h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="{{route('admin.dashboard.index')}}">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Leave Applications</a>
                            <i class="fa "></i>
                        </li>

                    </ul>

                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                            <div class="row">
                                <div class="col-md-6">

                                </div>

                             </div>

                <div class="row">
                    <div class="col-md-12">

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div id="load">

                          @include('admin.common.error')

                        </div>
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-rocket"></i>Applications
                                </div>
                                <div class="tools">
                                </div>
                            </div>

                            <div class="portlet-body">


                                <table class="table table-striped table-bordered table-hover" id="applications">
                                         <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Leave Type</th>
                                            <th>Reason</th>
                                            <th>Applied on</th>
                                            <th>Status</th>
                                            <th>Action</th>

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

                {{--Leave Application view MODALS--}}
                {!! Form::open(['url'=>'','id'=>'edit_form_application','method'=>'PATCH']) !!}
                <div id="leaveApplicationIndex" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <span class="caption-subject font-red-sunglo bold uppercase">Leave Application</span>
                                    </div>
                                    <div class="modal-body" id="modal-data-application">
                                        {{--Ajax data call for form--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                {!! Form::close() !!}
                {{--Leave Application view MODALS--}}

                			{{--DELETE MODAL CALLING--}}
@include('admin.include.delete-modal')
@include('include.show-modal')
            {{--DELETE MODAL CALLING END--}}

</div>
@stop


@section('script')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!!  HTML::script("assets/global/plugins/select2/select2.min.js") !!}
{!! HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") !!}
{!!  HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js") !!}
{!!  HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") !!}
{!!  HTML::script("assets/admin/pages/scripts/table-managed.js") !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->

<script>
var table = $('#applications').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ URL::route('admin.leave_applications') }}",
            "type": "GET",
            "dataSrc": function(json) {
                console.log(json); // Log the JSON response to the console
                return json.data; // Make sure this is the correct path to your data
            }
        },
        "order": [[ 1, "asc" ]],
        "columns": [
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": true },
            { 'className': 'center', "orderable": false }
        ],
        "lengthMenu": [
            [5, 15, 20, -1],
            [5, 15, 20, "All"]
        ],
        "pagingType": "full_numbers",
        "rowCallback": function(nRow, aData) {
            $(nRow).attr("id", 'row' + aData[0]);
        }
    });  // // Javascript function to update the company info and Bank Info
  function updateLeaveApplication(id){

      var url = "{{ route('admin.leave_applications.update',':id') }}";
      url = url.replace(':id',id);
      $.easyAjax({
          type: 'PUT',
          url: url,
          container: '#edit_form_application',
          data: $('#edit_form_application').serialize(),
          success: function () {
              $('#leaveApplicationIndex').modal('hide');
              table.fnDraw();
          }
      });
  }

  // Show Create Department Modal
  function show_application(id) {
      var url = "{{ route('admin.leave_applications.show',':id') }}";
      url = url.replace(':id',id);
      $.ajaxModal('#leaveApplicationIndex', url);
      $('#leaveApplicationIndex').removeClass('modal').addClass('custom-centered-modal');
            // Remove any existing backdrop if present
            $('.modal-backdrop').remove();

  }
  // Show Delete Modal
  function del(id) {

      $('#deleteModal').modal('show');

      $("#deleteModal").find('#info').html('Are you sure ! You want to delete ?');

      $('#deleteModal').find("#delete").off().click(function () {

          var url = "{{ route('admin.leave_applications.destroy',':id') }}";
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


















