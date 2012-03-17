<?php

require dirname(__FILE__) . '/lib/twilio/Services/Twilio.php';

$account_sid = "APb8adad61885a4874881d0f325a0535e2"; // Your Twilio account sid
$auth_token = "8f5541324b03c1a569562606bfd081a4"; // Your Twilio auth token

$client = new Services_Twilio('AC123', '123');
$message = $client->account->sms_messages->create(
  '9991231234', // From a valid Twilio number
  '8881231234', // Text this number
  "Hello monkey!"
);

print $message->sid;
