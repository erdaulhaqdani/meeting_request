jQuery(function($) {
  "use strict";
  // Chose here which method to send the email, available:
  // Phpmaimer text/html > phpmailer/registration_phpmailer.php
  // Phpmaimer text/html SMPT > phpmailer/registration_phpmailer_smpt.php
  // PHPmailer with html template > phpmailer/registration_phpmailer_template.php
  // PHPmailer with html template SMTP> phpmailer/registration_phpmailer_template_smtp.php
  // Submit loader mask
  $('#').attr('action', 'phpmailer/registration_phpmailer_template_smtp.php');
  // Validate
  $('#login_cust').validate({
      ignore: [],
      rules: {
          email: {
              required: true,
              email:true
          },
          password: {
              required: true,
              minlength: 8
          }
      }
  });
//   $('#regis_cust').on('submit', function() {
//       var form = $("regis_cust");
//       form.validate();
//       if (form.valid()) {
//           $("#loader_form").fadeIn();
//       }
//   });
});