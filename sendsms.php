<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Send SMS - Code Africa Education</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="stylesheets/foundation.css">
	<link rel="stylesheet" href="stylesheets/app.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php require_once('includes/head.php'); ?>
</head>
<body>

	<!-- container -->
	<div class="container">
		<div id="header">
			<?php require_once('includes/header.php'); ?>
		</div>
		<div class="row">
			<div class="twelve columns">
				<h2>Send SMS</h2>
				<p><h4>Use this form to send SMS to participant students.</h4></p>
			</div>
		</div>

		<div class="row">
				<div class="column seven">
					<form method="post" action="twilio_sendsms.php" class="nice" id="send-sms">
					
<textarea rows="30" class="textarea-style1" id="MessageBody" placeholder="Please enter the SMS mesage body here"></textarea>

<textarea rows="30" class="textarea-style1" id="PhoneNumberList" placeholder="Please enter the phone numbers here with each number on a different line"></textarea>

<a class="large green nice button radius submit-btn" href="#">Send »</a>

					</form>
				</div>
		</div>
		<div id="footer">
			<?php require_once('includes/footer.php'); ?>
		</div>
	</div>
	<!-- container -->




	<!-- Included JS Files -->
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/modernizr.foundation.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>

</body>
</html>
