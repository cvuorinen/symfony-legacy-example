<?php

$DEBUG=0;

$db_host = $container->getParameter('database_host');
$db_user = $container->getParameter('database_user');
$db_pass = $container->getParameter('database_password');
$db_name = $container->getParameter('database_name');

$session_name = $container->getParameter('legacy.session.name');

$basePath = dirname($_SERVER['PHP_SELF']);
if (substr($basePath, -9) == 'index.php') {
    $basePath = substr($basePath, 0, -9);
}
$basePath .= (substr($basePath, -1) != '/') ? '/' : '';

$baseUrl = $basePath . 'index.php/';

// ...
