<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?> "></script>
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // updating the view with notifications using ajax
        function load_notification(view = '') {
            $.ajax({
                url: "<?= base_url('Pengaduan_online/getNotif') ?>",
                type: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('#notifItem').html(data.notification);
                    if (data.unread_notification > 0) {
                        $('#notifDot').addClass("noti-dot");
                    }
                }
            });
        }

        function refresh_notification() {
            $.ajax({
                url: "<?= base_url('Pengaduan_online/refreshNotif') ?>",
                type: "POST",
                data: {},
                dataType: "json",
                success: function(data) {}
            });
        }

        load_notification();

        // load new notifications
        $(document).on('click', '#page-header-notifications-dropdown', function() {
            load_notification('yes');
            setTimeout(function() {
                refresh_notification();
            }, 10000);
        });
        setInterval(function() {
            load_notification();
        }, 1000);
    });
</script>