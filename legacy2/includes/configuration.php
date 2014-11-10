<?php

if (!defined('LEGACY2_APP')) {
    die();
}

// database config
define('CONF_DB_HOSTS', $container->getParameter('database_host'));
define('CONF_DB_USER', $container->getParameter('database_user'));
define('CONF_DB_PW', $container->getParameter('database_password'));
define('CONF_DB_NAME', $container->getParameter('database_name'));

// session config
define('SESSION_NAME', $container->getParameter('legacy.session.name'));
