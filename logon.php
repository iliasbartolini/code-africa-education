<?php
		require('config.php');
if(session_id() != '') {
  session_destroy();
}

?>

<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>

	<title>Welcome to Code Africa Education</title>
  
	<?php require_once('includes/head.php'); ?>
</head>
<body>
		<div id="header">
		</div>
<!-- 		<div class="row">
			<div>
				<h2>Simple Education System</h2>
			</div>
		</div> -->

			<section id="main" style="width: 100%;" class="column">
		
		<article class="module width_full" style="margin: 50px auto; width: 400px; text-align: center;">
		  <header><h3>Login to continue</h3></header>
		  
		  <div class="module_content">
		  <form id="logon" method="POST" action="index.php">
		  	<input placeholder="Type your username" name="username" id="username" type="text" class="input-text"/>
		  	
		  	<input placeholder="Password" name="password" id="password" type="password" class="input-text"/>
		  	
		  	<button id="btn-submit small white button radius">Log in</button>
		  </form>
		</div>
	</article>
	
		
		<div class="clear"></div>

		<div class="spacer"></div>
	</section>


	</div>
			<div id="footer">
			<?php require_once('includes/footer.php'); ?>
		</div>
	<!-- container -->

	<!-- Included JS Files -->
	<script src="javascripts/modernizr.foundation.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>

</body>
</html>
