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

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div id="load">

                @if(Session::get('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif

            </div>
            <a href="{{route('admin.employees.create')}}" class="btn green">
                Add New Employee <i class="fa fa-plus"></i>
            </a>

            <hr>
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Employees List
                    </div>
                    <div class="tools" style="  padding: 5px;">
                        <div class="btn-group pull-right">
                            <a href="javascript:exportEmployees()" class="btn yellow">
                                <i class="fa fa-file-excel-o"></i> Export
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_employees">
                        <thead>
                        <tr>
                            <th class="text-center">
                                EmployeeID
                            </th>
                            <th class="text-center">
                                Image
                            </th>
                            <th style="text-align: center">
                                Name
                            </th>
                            <th class="text-center">
                                Dept/Designation
                            </th>
                            <th class="text-center">
                                At Work
                            </th>
                            <th class="text-center">
                                Status
                            </th>
                            <th class="text-center">
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
<!-- Start - Delete Modal -->
<div id="deleteModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="deleteUserModalForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete ?</h4>
            </div>
            <div class="modal-body" id="info">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default dark " data-dismiss="modal" aria-hidden="true">Close</button>
                <button id="delete" class="btn btn-sm red">Delete</button>
            </div>
        </div>
    </div>
</div>
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

        var table = $('#sample_employees').dataTable({
            "cache": true,
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "order": [[0, "desc"]],

            "ajax": "{{ route("admin.employees.ajaxlist") }}",
            "aoColumns": [
                {'sClass': 'center', 'bSortable': true},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false}

            ],

            "fnDrawCallback": function () {
                Metronic.init();
            },
            "sPaginationType": "full_numbers",
            "language": {
                "emptyTable": "No data available"
            },
            "fnInitComplete": function (oSettings, json) {
                Metronic.init();
            }
        });

        // export employees
        function exportEmployees() {
            var searchValue = $('.dataTables_filter input').val();
            window.location.href = 'employees/export?s='+searchValue;
        }

        // Show Delete Modal
        function del(id) {
            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('Are you sure you want to delete');

            $('#deleteModal').find("#delete").off().click(function () {

                var url = "{{ route('admin.employees.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    container: "#deleteModal",
                    success: function (response) {
                        if (response.status == "success") {
                            $('#deleteModal').modal('hide');
                            $('#deleteModal').css('opacity',0);
                            table.fnDraw();
                        }
                    }
                });

            });
        }

    </script>
@stop
