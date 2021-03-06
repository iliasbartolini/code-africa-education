<?php

session_start();
		require('config.php');
if (empty($_SESSION['user']) || $_SESSION['user'] != USERNAME) {
	header("Location:logon.php");	
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
		  <header><h3>Ask a Question</h3></header>
		  
		  <div class="module_content">
				  
				  <form id="send-sms" name="questionForm" class="nice form-wrapper" action="twilio_sendsms.php" method="POST">

				    <div class="w50">
				      <label for="question">Question</label>
					    <textarea required="required" id="question" name="question"></textarea>
					  </div>
				    
				    <div class="w50">
				      <label for="answer">Answer</label>
				      <textarea required="required" id="answer" name="answer"></textarea>
				    </div>
				    
				    <table class="student-answers">
				      <thead> 
        				<tr> 
            				<th class="header">Name</th> 
            				<th class="header">Phone Number</th> 
            				<th class="answer header">Answer</th>
            				<th class="indicator header">Correct?</th>
        				</tr> 
        			</thead>
				    <?php
				    for($row = 0; $row < count($DEFAULT_USERS); ++$row) {
				      ?>
				    <tr class="unanswered">
				      <td>
				        <input required="required" class="input-text" name="name[]" type="text" value="<?php echo( $DEFAULT_USERS[$row]['name']  ); ?>"/>
				      </td>
				      <td>
				        <input required="required" class="input-text" name="phone[]" type="text" value="<?php echo( $DEFAULT_USERS[$row]['phone']  ); ?>" />
				      </td>
				      <td class="answer">
				        -
				      </td>
				      <td class="indicator">
				        -
				      </td>
				    </tr>
				    <?php
			      }
				    ?>
				    <tr class="actions">
				      <td colspan="4">
                <button id="add_student_btn" class="small green button radius">Add Student »</button>
              </td>
            <tr>
				    </table>
				    
				    <input type="submit" name="submitQuestion" class="submit-btn"/>

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
