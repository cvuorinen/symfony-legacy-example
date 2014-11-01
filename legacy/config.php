<?php

$DEBUG=0;

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'legacy_db';

$session_name = 'legacy_sess';

$basePath = dirname($_SERVER['PHP_SELF']);
if (substr($basePath, -9) == 'index.php') {
    $basePath = substr($basePath, 0, -9);
}
$basePath .= (substr($basePath, -1) != '/') ? '/' : '';

$baseUrl = $basePath . 'index.php/';

// ...
