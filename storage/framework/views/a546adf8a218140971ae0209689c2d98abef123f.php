<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>

<?php echo HTML::script("assets/global/plugins/respond.min.js"); ?>

<?php echo HTML::script("assets/global/plugins/excanvas.min.js"); ?>


<![endif]-->

<?php echo HTML::script("assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"); ?>

<?php echo HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js"); ?>

<?php echo HTML::script("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"); ?>

<?php echo HTML::script("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"); ?>

<?php echo HTML::script('assets/global/plugins/froiden-helper/helper.js'); ?>


<?php echo HTML::script("assets/global/scripts/metronic.js"); ?>

<?php echo HTML::script("assets/admin/layout/scripts/layout.js"); ?>



<!-- END PAGE LEVEL SCRIPTS -->
<script>
    /*jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.demo-loading-btn')
            .click(function () {
                var btn = $(this)
                btn.button('loading')
                setTimeout(function () {
                    btn.button('reset')
                }, 8000)
            });
        $('.demo-loading-btn-ajax')
            .click(function () {
                var btn = $(this)
                btn.button('loading')
                setTimeout(function () {
                    btn.button('reset')
                }, 500)
            });


    });*/

    /*function ToggleEmailNotification(type) {
        if ($('[name=' + type + ']').is(':checked')) {
            var value = 1;
        }
        else {
            var value = 0;
        }
        <!--$('#load_notification').html('<img src="" height="30px" width="117px" />');-->

        var url = "<?php echo e(route('admin.ajax_update_notification')); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            container: '#load_notification',
            data: {'value': value, 'id': '', 'type': type},
            success: function (response) {
                if (response.success == 'success') {
                    $('#load_notification').html('');
                }
            }
        });

    }*/

    function updateLeaveApplication(id) {

        var url = "<?php echo e(route('admin.leave_applications.update',':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'PUT',
            url: url,
            container: '#edit_form_leave',
            data: $('#edit_form_leave').serialize(),
            success: function () {
                window.location.reload();
            }
        });

    }
</script>

<?php echo $__env->yieldContent('footerjs'); ?>
<?php /**PATH H:\xamp_7.2.5\htdocs\projects\software2\sms\resources\views/admin/include/footerjs.blade.php ENDPATH**/ ?>