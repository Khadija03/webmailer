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
<!doctype html>
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




		<!--   Big container   -->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<!--      Wizard container        -->
					<div class="wizard-container">
						<div class="card wizard-card" data-color="red" id="wizard">
							<form action="#" method="POST">
								<!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

								<div class="wizard-header">
									<h3 class="wizard-title">
										Contact !
									</h3>
									<h5>This is an easy way to send emails !</h5>
								</div>
								<div class="wizard-navigation">
									<ul>
										<li><a href="#captain" data-toggle="tab">Relation</a></li>
										<li><a href="#details" data-toggle="tab">Message</a></li>
										
										
									</ul>
								</div>

								<div class="tab-content">
									<div class="tab-pane" id="details">
										<div class="row">
											
												<div class="col-sm-12">
													<h4 class="info-text"> Please type the details needed.</h4>
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
												<div class="wizard-footer">
												<div class="pull-right">
												<div class="input-group">
													<input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
												</div>
												</div>
												</div>

										</div>
							</form>
						</div>
						<div class="tab-pane" id="captain">
							<h4 class="info-text">This person is?</h4>
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1">
									<div class="col-sm-4">
										<div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select This if this is a friend">
											<input type="radio" name="job" value="Design">
											<div class="icon">
												<i class="material-icons">weekend</i>
											</div>
											<h6>Friend</h6>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select This if this is a family member.">
											<input type="radio" name="job" value="Code">
											<div class="icon">
												<i class="material-icons">home</i>
											</div>
											<h6>Family</h6>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select This if this is a colleague">
											<input type="radio" name="job" value="Code">
											<div class="icon">
												<i class="material-icons">business</i>
											</div>
											<h6>Colleague</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="wizard-footer">
						<div class="pull-right">
							<input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
							
						</div>
						<div class="pull-left">
							<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

							<div class="footer-checkbox">
								<div class="col-sm-12">

								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					</form>
				</div>
			</div> <!-- wizard container -->
		</div>
	</div> <!-- row -->
	</div> <!--  big container -->

	<div class="footer">
		<div class="container text-center">

		</div>
	</div>
	</div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/material-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js"></script>

</html>