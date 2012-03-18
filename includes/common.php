<?php


// Log any variable to a local tmp file.
function debug($data, $label = NULL) {
  ob_start();
  print_r($data);
  $string = ob_get_clean();
  if ($label) {
    $out = $label .': '. $string;
  }
  else {
    $out = $string;
  }
  $out .= "\n";

  $dir_path = dirname(__FILE__) . '/private';

  if(!file_exists($dir_path)) {
    mkdir($dir_path);
    make_dir_private($dir_path);
  }

  // The temp directory does vary across multiple simpletest instances.
  $file = $dir_path . '/logging.log';
  if (file_put_contents($file, $out, FILE_APPEND) === FALSE) {
    return FALSE;
  }
}

function make_dir_private($dir_path) {
  $htaccess_content =
'# no nasty crackers in here!
order deny,allow
deny from all';

  return file_put_contents($dir_path . '/.htaccess', $htaccess_content);
}

/**
 * Reqturns TRUE if a request has been made from an AJAX
 *
 * @return bool
 */
function request_is_xhr() {
  return !empty($_SERVER[ 'HTTP_X_REQUESTED_WITH' ]) && // avoid PHP notice
    strtolower($_SERVER[ 'HTTP_X_REQUESTED_WITH' ]) === 'xmlhttprequest';
}
