<?php


require_once(dirname(__FILE__) . '/includes/common.php');

print_r($_POST);
die();

// no post no fun
if (empty($_POST) || empty($_POST['question']) || empty($_POST['phone'])) {
  header('Location: /');
}

require dirname(__FILE__) . '/lib/twilio/Services/Twilio.php';

$account_sid = "AC8c2a05c841dd43d3b89881ea46f9d361"; // Your Twilio account sid
$auth_token = "8f5541324b03c1a569562606bfd081a4"; // Your Twilio auth token

$client = new Services_Twilio($account_sid, $auth_token);

$question = $_POST['question'];


$results = array();
$data = array();

foreach($_POST['phone'] as $index => $phone) {
  $data[] = array(
    'phone' => $phone,
    'name' => !empty($_POST['name'][$index]) ? $_POST['name'][$index] : '',
  );
}

foreach($data as $record) {
  $status = $message = NULL;
  $phone = $record['phone'];
  $name = $record['name'];

  // @TODO: validate/format phone
  try {
    $message = $client->account->sms_messages->create(
      '+442071838750', // From a valid Twilio phone
      $phone, // Text this phone
      $question
    );

    $status = 1;
    $message = "Message/Question sent to {$name}: {$phone} [#{$message->sid}]";
  }
  catch(Exception $e) {
    $status = 0;
    $message = 'Error: ' . $e->getMessage();
  }

  $results[] = array(
    'status' => $status,
    'name' => $name,
    'phone' => $phone,
    'message' => $message,
  );
}

foreach($results as $result) {
  print "\n<br />" . $result['message'];
}

