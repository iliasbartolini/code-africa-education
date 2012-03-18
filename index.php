<?php
		require('config.php');
		require('auth.php');
		
		if (!isset($_SESSION['user'])) {
			header("location:logon.php");
		}

?>

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

	<title>Welcome to Code Africa Education</title>

	<?php require_once('includes/head.php'); ?>
</head>
<body>
		<div id="header">
			<?php require_once('includes/header.php'); ?>
		</div>
<!-- 		<div class="row">
			<div class="twelve columns">
				<h2>Simple Education System</h2>
			</div>
		</div> -->
<?php require_once('includes/sidebar.php'); ?>

			<section id="main" class="column">
		
		<article class="module width_full">
			<header><h3 style="">Today&nbsp; |&nbsp; Week &nbsp;|&nbsp; Month &nbsp;|&nbsp; Year</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<img src="images/chart.png" alt="" />
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		

		
		<div class="clear"></div>
		
		<div class="spacer"></div>
	</section>


	</div>
			<div id="footer">
			<?php require_once('includes/footer.php'); ?>
		</div>
	<!-- container -->

	<!-- Included JS Files -->
	<script src="javascripts/app.js"></script>
	
	<script>
	 var PUSHER_APP_KEY = "<?php echo(PUSHER_APP_KEY); ?>";
	</script>
	<script src="http://js.pusher.com/1.11/pusher.min.js"></script>
	<script src="javascripts/pusher.js"></script>	
	
	<!-- do not include in production -->
	<script src="javascripts/_pusher_tests.js"></script>

</body>
</html>
