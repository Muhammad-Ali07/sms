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
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('assets/global/plugins/select2/select2.css') !!}
    {!! HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') !!}
    <!-- END PAGE LEVEL STYLES -->


    <div class="content">


        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title text-lg font-medium mr-auto">
            {{ $pageTitle }}</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ route('admin.dashboard.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.attendances.index') }}">Attendance</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">attendance</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->

        <div id="load">
            {{-- INLCUDE ERROR MESSAGE BOX --}}
            @include('admin.common.error')
            {{-- END ERROR MESSAGE BOX --}}
        </div>

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->


                <a class="btn green" onclick="showAdd();">
                    Add New Department
                    <i class="fa fa-plus"></i> </a>

                <hr>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-briefcase"></i>Department List
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="departmentTable">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Department Name
                                    </th>
                                    <th>
                                        Designations
                                    </th>
                                    <th>
                                        Designations
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

        {{-- MODALS --}}

        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"><strong><i class="fa fa-plus"></i> New Department</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="portlet-body form">

                            <!-- BEGIN FORM-->

                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>

            </div>
        </div>

        {{-- ----------------------END EDIT MODALS------------------- --}}

    </div>



    {{-- DELETE MODAL CALLING --}}
    @include('admin.include.delete-modal')
    @include('include.show-modal')
    {{-- DELETE MODAL CALLING END --}}


<!-- Start - Delete Modal -->
{{-- <div id="deleteModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
</div> --}}
    {{--DELETE MODAL CALLING--}}
    @include('admin.include.delete-modal')
    {{--DELETE MODAL CALLING END--}}

@stop
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@section('scripts')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{-- {!!  HTML::script("assets/global/plugins/select2/select2.min.js") !!}
    {!!  HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js") !!}
    {!!  HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") !!} --}}
    <!-- END PAGE LEVEL PLUGINS -->
    {!! HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') !!}
    {!! HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') !!}

    <script>
        var table = $('#departmentTable');
        // For Add more destination field for edit
        var $dj = 0;

        function addEditDestination() {
            $dj = $dj + 1;
            $('#editDestinationDiv').append(
                ' <div class="form-group" id="edit_field"> <div class="col-md-12"><input class="form-control form-control-inline input-medium"  name="designation[' +
                $dj + ']" type="text"  placeholder="Designation #' + ($dj + 1) + '"/></div></div>');
        }
        // For Add more destination field for add
        var $di = 0;

        function addDestinations() {
            $di = $di + 1;
            $('#AddedDestinations').append(
                ' <div class="form-group"> <div class="col-md-12"><input class="form-control form-control-inline input-medium"  name="designation[' +
                $di + ']" type="text"  placeholder="Designation #' + ($di + 1) + '"/></div></div>');
        }

        var tableData = table.dataTable({
            "cache": true,
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "order": [
                [0, "desc"]
            ],
            "fnDrawCallback": function() {
                Metronic.init();
            },
            "ajax": "{{ route('admin.departments.ajax_department') }}",
            "aoColumns": [{
                    'sClass': 'center',
                    'bSortable': true
                },
                {
                    'sClass': 'center',
                    'bSortable': false
                },
                {
                    'sClass': 'center',
                    'bSortable': false,
                    "visible": false
                },
                {
                    'sClass': 'center',
                    'bSortable': false
                },
                {
                    'sClass': 'center',
                    'bSortable': false
                },
            ],
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                var row = $(nRow);
                row.attr("id", 'row' + aData['0']);
            },

            "sPaginationType": "full_numbers",
            "language": {
                "emptyTable": "No data available"
            },
            "fnInitComplete": function(oSettings, json) {
                Metronic.init();
            },
        });


        // Show Delete Modal
        function del(id, dept) {

            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('Are you sure ! You want to delete <strong>' + dept +
                '</strong> department?<br>' +
                '<br><div class="note note-warning">' +
                '{!! Lang::get('messages.deleteNoteDepartment') !!}' +
                '</div>');

            $('#deleteModal').find("#delete").off().click(function() {

                var url = "{{ route('admin.departments.destroy', ':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {
                        '_token': token
                    },
                    container: "#deleteModal",
                    success: function(response) {
                        if (response.status == "success") {
                            $('#deleteModal').modal('hide');
                            tableData.fnDraw();
                        }
                    }
                });

            });
        }
        // Javascript function to update the company info and Bank Info
        function UpdateDepartments(id) {

            var url = "{{ route('admin.departments.update', ':id') }}";
            url = url.replace(':id', id);
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '#edit_department_form',
                data: $('#edit_department_form').serialize(),
                success: function() {
                    $('#showModal').modal('hide');
                    tableData.fnDraw();
                }
            });
        }
        // Javascript function to update the company info and Bank Info
        function storeDepartments() {

            var url = "{{ route('admin.departments.store') }}";
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '#add_department_form',
                data: $('#add_department_form').serialize(),
                success: function() {
                    $('#showModal').modal('hide');
                    tableData.fnDraw();
                }
            });
        }

        // Show Create Department Modal
        function showAdd() {
            var url = "{{ route('admin.departments.create') }}";
            $.ajaxModal('#showModal', url);
            $('#showModal').removeClass('modal').addClass('custom-centered-modal');
            // Remove any existing backdrop if present
            $('.modal-backdrop').remove();

        }
        // Show Edit Depart Modal
        function showEdit(id) {
            var url = "{{ route('admin.departments.edit', [':id']) }}";
            url = url.replace(':id', id);
            $.ajaxModal('#showModal', url);
            $('#showModal').removeClass('modal').addClass('custom-centered-modal');
            // Remove any existing backdrop if present
            $('.modal-backdrop').remove();

        }
    </script>
@stop

