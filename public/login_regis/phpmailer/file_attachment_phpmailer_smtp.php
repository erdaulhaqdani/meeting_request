<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title></title>

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">
    
    <script type="text/javascript">
    function delayedRedirect(){
        window.location = "../file-attachment-1-working-mail-form.html"
    }
    </script>

</head>
<body style="background-color:#fff;" onLoad="setTimeout('delayedRedirect()', 5000)">
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtpserver';                           // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'username';                             // SMTP username
    $mail->Password   = 'password';                             // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients - main edits
    $mail->setFrom('info@betler.com', 'Message from Betler');                   // Email Address and Name FROM
    $mail->addAddress('jhon@betler.com', 'Jhon Doe');                           // Email Address and Name TO - Name is optional
    $mail->addReplyTo('noreply@betler.com', 'Message from Betler');             // Email Address and Name NOREPLY
    $mail->isHTML(true);                                                       
    $mail->Subject = 'Message from Betler';                                     // Email Subject

    //The email body message
    $message = "Full Name: " . $_POST['full_name'] . "<br />";
    $message .= "Email Address: " . $_POST['email_address'] . "<br />";
    $message .= "Message: " . $_POST['message_field'] . "<br />";          
    
    /* FILE ATTACHMENT */
    if(isset($_FILES['fileupload'])){
    $errors= array();
    $file_name = $_FILES['fileupload']['name'];
    $file_size =$_FILES['fileupload']['size'];
    $file_type=$_FILES['fileupload']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['fileupload']['name'])));
    $expensions= array("jpeg","jpg","png","pdf","doc","docx");// Define with files are accepted
    $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['fileupload']['tmp_name']));

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="Extension not allowed, please choose a .pdf, .doc, .docx file.";
        }
        // Set the files size limit in bytes. Use this tool to convert the file size param https://www.thecalculator.co/others/File-Size-Converter-69.html
        if($file_size > 153600){
            $errors[]='File size must be max 150Kb';
        }
        if(empty($errors)==true){
            move_uploaded_file($_FILES['fileupload']['name'], $uploadfile);
            $mail->AddAttachment($_FILES['fileupload']['tmp_name'], $_FILES['fileupload']['name']);
        }else{
            $message .= "<br />File name: no files uploaded";
            }
        };
    /* end FILE ATTACHMENT */

    $mail->Body = "" . $message . "";

    $mail->send();

    // Confirmation/autoreplay email send to who fill the form
    $mail->ClearAddresses();
    $mail->isSMTP();
    $mail->addAddress($_POST['email_address']); // Email address entered on form
    $mail->isHTML(true);
    $mail->Subject    = 'Confirmation'; // Custom subject
    $mail->Body = "" . $message . "";

    $mail->Send();

    echo '<div id="success">
            <div class="icon icon--order-success svg">
                 <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                  <g fill="none" stroke="#8EC343" stroke-width="2">
                     <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                     <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                  </g>
                 </svg>
             </div>
            <h4><span>Request successfully sent!</span>Thank you for your time</h4>
            <small>You will be redirect back in 5 seconds.</small>
        </div>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
?>
<!-- END SEND MAIL SCRIPT -->   

</body>
</html>