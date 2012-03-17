<?php

require dirname(__FILE__) . '/lib/twilio/Services/Twilio.php';

$account_sid = "AC8c2a05c841dd43d3b89881ea46f9d361"; // Your Twilio account sid
$auth_token = "8f5541324b03c1a569562606bfd081a4"; // Your Twilio auth token

$client = new Services_Twilio($account_sid, $auth_token);
$message = $client->account->sms_messages->create(
  '+442071838750', // From a valid Twilio number
  '447951432567', // Text this number
  "Hello monkey!"
);

print $message->sid;
