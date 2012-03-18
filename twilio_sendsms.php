<?php

require_once('config.php');
require_once(dirname(__FILE__) . '/includes/common.php');

// no post no fun
if (empty($_POST) || empty($_POST['question']) || empty($_POST['phone'])) {
  header('Location: /');
}

require dirname(__FILE__) . '/lib/twilio/Services/Twilio.php';

$account_sid = TWILIO_ACCOUNT_SID;; // Your Twilio account sid
$auth_token = TWILIO_AUTH_TOKEN; // Your Twilio auth token

$client = new Services_Twilio($account_sid, $auth_token);

$question = $_POST['question'];


$results = array();
$data = array();

foreach($_POST['phone'] as $index => $phone) {
  $phone = trim($phone);

  if (empty($phone)) {
    continue;
  }
  
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
      TWILIO_FROM_NUMBER, // From a valid Twilio phone
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

