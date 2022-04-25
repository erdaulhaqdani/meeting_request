jQuery(function($) {
    "use strict";
    // Chose here which method to send the email, available:
    // Phpmaimer text/html > phpmailer/file_attachment_phpmailer.php
    // Phpmaimer text/html SMPT > phpmailer/file_attachment_phpmailer_smpt.php
    // Submit loader mask
    $('form').attr('action', 'phpmailer/file_attachment_phpmailer_smtp.php');
    // Validate
    $('form').validate({
        ignore: [],
        rules: {
            website: {
                maxlength: 0
            },
            fileupload: {
                fileType: {
                    types: ["jpg", "jpeg", "gif", "png", "pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"]
                },
                maxFileSize: {
                    "unit": "KB", /* File upload validate size and file type - For details: https://github.com/snyderp/jquery.validate.file*/
                    "size": 150
                },
                minFileSize: {
                    "unit": "KB",
                    "size": "2"
                }
            }
        }
    });
    $('form').on('submit', function() {
        var form = $("form");
        form.validate();
        if (form.valid()) {
            $("#loader_form").fadeIn();
        }
    });
});