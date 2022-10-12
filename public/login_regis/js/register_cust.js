jQuery(function ($) {
  "use strict";
  // Chose here which method to send the email, available:
  // Phpmaimer text/html > phpmailer/registration_phpmailer.php
  // Phpmaimer text/html SMPT > phpmailer/registration_phpmailer_smpt.php
  // PHPmailer with html template > phpmailer/registration_phpmailer_template.php
  // PHPmailer with html template SMTP> phpmailer/registration_phpmailer_template_smtp.php
  // Submit loader mask
  $("#").attr("action", "phpmailer/registration_phpmailer_template_smtp.php");
  // Validate
  $("#regis_cust").validate({
    ignore: [],
    rules: {
      nama: {
        required: true,
        minlength: 5,
      },
      username: {
        required: true,
        minlength: 5,
        maxlength: 15,
      },
      email: {
        required: true,
        email: true,
      },
      noHP: {
        required: true,
        number: true,
      },
      password: {
        required: true,
        minlength: 8,
      },
      password2: {
        required: true,
        minlength: 8,
        equalTo: "#password",
      },
    },
  });
  //   $('#regis_cust').on('submit', function() {
  //       var form = $("regis_cust");
  //       form.validate();
  //       if (form.valid()) {
  //           $("#loader_form").fadeIn();
  //       }
  //   });
});
