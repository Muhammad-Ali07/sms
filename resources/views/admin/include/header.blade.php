
<style>
.lcl_amount,.lcl_div,.fcl_div,.show_fields,.div_paid,.customer_type{
	display:none;
}
</style>

  <!-- BEGIN HEADER -->

<!-- END HEADER -->




{{--Leave Application view MODALS--}}
{!! Form::open(['url'=>'','id'=>'edit_form_leave','method'=>'PATCH']) !!}
<div id="static_leave_requests" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <span class="caption-subject font-red-sunglo bold uppercase">Leave Application</span>
            </div>
            <div class="modal-body" id="modal-data-leave">
                {{--Ajax data call for form--}}
            </div>
        </div>

    </div>
</div>
</div>
{!! Form::close() !!}
{{--Leave Modal Close--}}

<script>
    function show_application_notification(id) {
        $("#modal-data-leave").html('<div class="text-center">{!! HTML::image('assets/admin/layout/img/loading-spinner-blue.gif') !!}</div>');
        var editUrl = "{{ route('admin.leave_applications.update',[':id']) }}";
        editUrl = editUrl.replace(':id', id);
        $('#edit_form_leave').attr('action', editUrl);

        var url = "{{ route('admin.leave_applications.show',[':id']) }}";
        url = url.replace(':id', id);
        $('#edit_form_leave').attr('action', url);

        $.ajax({
            type: "GET",
            url: url

        }).done(function (response) {
            $('#modal-data-leave').html(response);
//
        });
    }
</script>
