<?php

// no post no fun
if (empty($_POST)) {
  header('Location: /');
}

if (empty($_POST['question'])) {
  header('Location: /');
}

require dirname(__FILE__) . '/lib/twilio/Services/Twilio.php';

$account_sid = "AC8c2a05c841dd43d3b89881ea46f9d361"; // Your Twilio account sid
$auth_token = "8f5541324b03c1a569562606bfd081a4"; // Your Twilio auth token

$client = new Services_Twilio($account_sid, $auth_token);

$question = $_POST['question'];
$names = $_POST['name'];
$numbers = $_POST['phone'];

foreach($names as $index => $name) {
  if (empty($name) || empty($numbers[$index])) {
    continue;
  }

  $number = $numbers[$index];

  // @TODO: validate/format number
  try {
    $message = $client->account->sms_messages->create(
      '+442071838750', // From a valid Twilio number
      $number, // Text this number
      $question
    );

    print "Message/Question sent to {$name}: {$number} [#{$message->sid}]";
  }
  catch(Exception $e) {
    print("\n<br /> Error: " . $e->getMessage());
  }
}

print "\n<br />DONE";
