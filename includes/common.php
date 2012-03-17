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

  // The temp directory does vary across multiple simpletest instances.
  $file = '/tmp/codeafrica.txt';
  if (file_put_contents($file, $out, FILE_APPEND) === FALSE) {
    return FALSE;
  }
}
