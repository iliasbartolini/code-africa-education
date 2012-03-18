<?php

require_once('config.php');
require_once(dirname(__FILE__) . '/includes/common.php');
require_once('lib/squeeks-Pusher-PHP-045d42d/lib/Pusher.php');

debug('-------- received webhook callback:');
debug($_POST);

debug('> ' . TWILIO_ACCOUNT_SID);
if( $_POST['AccountSid'] !== TWILIO_ACCOUNT_SID ) {
  exit('unauthorised access');
}

$data = array_merge($_POST, array());
unset($data['AccountSid']);

$pusher = new Pusher(PUSHER_APP_KEY, PUSHER_APP_SECRET, PUSHER_APP_ID);
$pusher->trigger('prototype-answers', 'new_answer', $data);
?>