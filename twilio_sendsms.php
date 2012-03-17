<?php


require_once(dirname(__FILE__) . '/includes/common.php');

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

