<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?> "></script>
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<?php
$url = '';
if (session('Kelompok') == 'APT') {
    $url = 'Pengaduan_online/getNotifPetugas';
} elseif (session('Kelompok') == 'Customer') {
    $url = 'Pengaduan_online/getNotifCustomer';
} elseif (session('Kelompok') == 'LP') {
    $url = 'Pengaduan_online/getNotifLP';
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