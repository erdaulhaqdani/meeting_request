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
                    // if (data.unread_notification > 0) {
                    //     $('.count').html(data.unread_notification);
                    // }
                }
            });
        }

        load_notification();

        // submit form and get new records
        // $('#notifDiKlik').on('click', function(event) {
        //     let id = e.currentTarget.dataset.id;
        //     show_loading();
        //     xhr = $.ajax({
        //         url: "",
        //         type: "POST",
        //         data: 'id=' + id,
        //         success: function(data) {
        //             $('.notifikasi').html(data);
        //             $('.rounded-circle').remove;
        //             hide_loading();
        //         }
        //     });
        // });
        // submit form and get new records
        // $('#comment_form').on('submit', function(event) {
        //     event.preventDefault();
        //     if ($('#subject').val() != '' && $('#comment').val() != '') {
        //         var form_data = $(this).serialize();
        //         $.ajax({
        //             url: "insert.php",
        //             type: "POST",
        //             data: form_data,
        //             success: function(data) {
        //                 $('#comment_form')[0].reset();
        //                 load_notification();
        //             }
        //         });
        //     } else {
        //         alert("Subject & Comments Harus Diisi");
        //     }
        // });
        // load new notifications
        $(document).on('click', '#page-header-notifications-dropdown', function() {
            // $('.count').html('');
            load_notification('yes');
        });
        setInterval(function() {
            load_notification();
        }, 5000);
    });
</script>