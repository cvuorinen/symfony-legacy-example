<?php

if (!defined('LEGACY2_APP')) {
    die();
}

error_reporting(E_ERROR);
ini_set('display_errors',0);

/* configuration variables */

// number of rows per page shown in listings
$list_rows_per_page = 20;

// title of the site
$site_title = 'Yet Another Example Legacy Application';

// ...

/* eof configuration variables */

// import some more configuration variables
require_once('includes/configuration.php');

// get current file
global $current_file;
$current_file = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// include used classes
require_once('includes/classes/session.php');
require_once('includes/classes/DB.php');

// start session
$sess = new session;
$sess->start();

// instanciate database handling object
$db = new Db();

// include functions
require_once('includes/functions.php');

// define filename constants
define('FILENAME_LOGIN',    'login.php');
define('FILENAME_HOME',     'index.php');
define('FILENAME_USER',     'user.php');
define('FILENAME_DIRS',     'dirs.php');
// ...

// defines which files users are allowed to access
// full_access and limit_access are arrays containing the user levels that have access to that file
global $file_access;
$file_access = array(FILENAME_HOME => array('full_access'  => array(1, 3, 4),
                                            'limit_access' => array(5)),
                     FILENAME_USER => array('full_access'  => array(1, 3, 4),
                                            'limit_access' => array(5)),
                     FILENAME_DIRS => array('full_access'  => array(1, 3, 4),
                                            'limit_access' => array(5)),
);

// construct html header tags
$content_type = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$page_title   = '<title>' . $site_title . '</title>';

// if not in login page check access
if ($current_file != FILENAME_LOGIN) {
    // if not logged in or doesn't have access
    if (!isset($_SESSION['user_level'])
        || (!in_array($_SESSION['user_level'], $file_access[$current_file]['full_access'])
            && !in_array($_SESSION['user_level'], $file_access[$current_file]['limit_access'])))
    {
        redirect(FILENAME_LOGIN);
        die('Unauthorized');
    }
}

// start output buffering
#ob_start('ob_callback');
ob_start();

// output page header
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
' . $content_type . '
' . $page_title . '
<style>
    table.page { width: 700px; min-height: 400px; }
</style>
</head>
<body>
<div class="page" align="center">
<table class="page" border="1" cellpadding="10">
<tr><td class="header" colspan="2">
  <h2 class="title">' . $site_title . '</h2>
</td></tr><tr><td width="20%" valign="top">
    <ul><li><a href="' . FILENAME_HOME . '">Home</a></li>
    <li><a href="' . FILENAME_USER . '?id=' . $sess->getUserId() . '">User</a></li>
    <li><a href="' . FILENAME_DIRS . '">Dirs</a></li></ul>
</td><td class="page">';

?>