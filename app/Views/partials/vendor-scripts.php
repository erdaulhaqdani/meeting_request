<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?> "></script>
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>
<?php
$url = '';
if (session('idLevel') == 6 || session('idLevel') == 7) {
    $url = 'Meeting_request/getNotifPetugasMR';
} elseif (session('Kelompok') == 'APT') {
    $url = 'Pengaduan_online/getNotifPetugas';
} elseif (session('Kelompok') == 'Customer') {
    $url = 'Pengaduan_online/getNotifCustomer';
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        // updating the view with notifications using ajax
        function load_notification(view = '') {
            $.ajax({
                url: "<?= base_url($url) ?>",
                type: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('#notifItem').html(data.notification);
                    if (data.unread_notification > 0) {
                        $('#notifDot').addClass("noti-dot");
                    } else {
                        $('#notifDot').removeClass("noti-dot");
                    }
                }
            });
        }
        load_notification();

        // load new notifications
        $(document).on('click', '#page-header-notifications-dropdown', function() {
            load_notification('yes');
        });
        setInterval(function() {
            load_notification();
        }, 5000);
    });
</script>