<?php

require_once('config.php');
require_once(dirname(__FILE__) . '/includes/common.php');

// no post no fun
if (empty($_POST)) {
  header('Location: /');
}

if (empty($_POST['question'])) {
  header('Location: /');
}

require dirname(__FILE__) . '/lib/twilio/Services/Twilio.php';

$account_sid = TWILIO_ACCOUNT_SID;; // Your Twilio account sid
$auth_token = TWILIO_AUTH_TOKEN; // Your Twilio auth token

$client = new Services_Twilio($account_sid, $auth_token);

$question = $_POST['question'];
$numbers_lines = explode("\n", $_POST['numbers']);

print_r($numbers_lines);

$pattern = '/^((?P<name>.+?)\s+)?(?P<number>\+?[\d\s]+)/';


$results = array();

foreach($numbers_lines as $line) {
  $line = trim($line);
  if (empty($line)) {
    continue;
  }

  preg_match($pattern, $line, $matches);
  if (empty($matches['number'])) {
    continue;
  }

  $number = $matches['number'];
  $name = $matches['name'];

  $status = $message = NULL;
  // @TODO: validate/format number
  try {
    $message = $client->account->sms_messages->create(
      '+442071838750', // From a valid Twilio number
      $number, // Text this number
      $question
    );

    $status = 1;
    $message = "Message/Question sent to {$name}: {$number} [#{$message->sid}]";
  }
  catch(Exception $e) {
    $status = 0;
    $message = 'Error: ' . $e->getMessage();
  }

  $results[] = array(
    'status' => $status,
    'name' => $name,
    'number' => $number,
    'message' => $message,
  );
}

foreach($results as $result) {
  print "\n<br />" . $result['message'];
}

