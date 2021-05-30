<?php

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'vendor/autoload.php';
// Create object of PHPMailer class
$mail = new PHPMailer\PHPMailer\PHPMailer();

$output = '';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // Gmail ID which you want to use as SMTP server
    $mail->Username = 'testphp1403@gmail.com';
    // Gmail Password
    $mail->Password = 'test1234.';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email ID from which you want to send the email
    $mail->setFrom('testphp1403@gmail.com');
    // Recipient Email ID where you want to receive emails
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject =  $subject;
    $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

    $mail->send();
    $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us!</h5>
                </div>';
  } catch (Exception $e) {
    $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Material Bootstrap Wizard by Creative Tim</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
  <div class="image-container set-full-height" style="background-image: url('assets/img/wizard-book.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="card border-danger shadow">
            <div class="card-header bg-danger text-light">
              <h3 class="card-title">Contact</h3>
            </div>
            <div class="card-body px-4">
              <form action="#" method="POST">
                <div class="form-group">
                  <?= $output; ?>
                </div>
                
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">email</i>
                    </span>
                    <div class="form-group label-floating">
                      <label class="control-label">Your Email</label>
                      <input name="email" type="email" class="form-control">
                    </div>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">person</i>
                    </span>
                    <div class="form-group label-floating">
                      <label class="control-label">Your Name</label>
                      <input name="name" type="text" class="form-control">
                    </div>
                  </div>

                </div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">tag</i>
                    </span>
                    <div class="form-group label-floating">
                      <label class="control-label">Subject</label>
                      <input name="subject" type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">chat</i>
                    </span>
                    <div class="form-group label-floating">
                      <label class="control-label">Your message</label>
                      <input name="message" type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/material-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js"></script>
</html>