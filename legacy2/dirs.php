<?php

define('LEGACY2_APP', true);

require_once('includes/header.php');

echo '
  <div class="content">
    <h1>Directory Structure</h1>';

$output = '';
exec("tree " . escapeshellarg(realpath(__DIR__)), $output);

echo '<pre>' . implode('<br>', $output) . '</pre>';

echo '
  </div>';

require_once('includes/footer.php');

?>
 