<?php
include '../config.php';
?>
<html>
<body>
<form action="../twilio_sms_webhook.php" method="post">
  <input type="text" name="AccountSid" value="<?php echo(TWILIO_ACCOUNT_SID); ?>" />
  <input type="text" name="Body" value="#codeafrica test" />
  <input type="text" name="ToZip" value="75201" />
  <!--input type="text" name="FromState" value="" /-->
  <input type="text" name="ToCity" value="DALLAS" />
  <input type="text" name="SmsSid" value="SM3447df379976d59ced8b00f44e6395e6" />
  <input type="text" name="ToState" value="TX" />
  <input type="text" name="To" value="+12147363818" />
  <input type="text" name="ToCountry" value="US" />
  <input type="text" name="FromCountry" value="GB" />
  <input type="text" name="SmsMessageSid" value="SM3447df379976d59ced8b00f44e6395e6" />
  <input type="text" name="ApiVersion" value="2010-04-01" />
  <!--input type="text" name="FromCity" value="" /-->
  <input type="text" name="SmsStatus" value="received" />
  <input type="text" name="From" value="<?php echo($DEFAULT_USERS[0]['phone']); ?>" />
  
  <input type="submit" value="submit" />
</form>
</body>
</html>