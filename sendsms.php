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
				<div class="column five">
					<form class="nice" id="send-sms">
					

					<label for="phone-number01">Enter student <span class="std-index">1</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

					<label for="phone-number01">Enter student <span class="std-index">2</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">
					
					<label for="phone-number01">Enter student <span class="std-index">3</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">4</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">5</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">6</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">7</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">8</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">9</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

										<label for="phone-number01">Enter student <span class="std-index">10</span> mobile number</label>
					<input id="phone-number01" class="expand input-text" type="text">

					<a class="large green nice button radius" href="#">Send SMS</a>

					</form>
				</div>
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
