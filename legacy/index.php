<?php

//if (!$DEBUG)
     error_reporting(E_ERROR);
     ini_set('display_errors',0);

// Make Symfony Container and Request global so they can be used in other functions & classes
/** @var \Symfony\Component\DependencyInjection\ContainerInterface $container */
$GLOBALS['container'] = $container;

/** @var Symfony\Component\HttpFoundation\Request $request */
$GLOBALS['request'] = $request;

// Load configuration
require_once ("config.php");
require_once ("includes/funcs.php");
require_once ("includes/common.php");

// Load classes
require_once ("classes/info.php");
require_once ("classes/user.php");
require_once ("classes/dir.php");
// ...

// Environment
$path = set_path($request->getRequestUri());
$page = $path[count($path)-1];

$id = $request->query->get('id', null);
$action = $request->query->get('action');

# Connect to database
$dbh=mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_name,$dbh);

$info = new Info();

global $user_id;
global $session;
global $USERINFO;
$user_id = null;
$session = null;
$USERINFO = null;

// Start session and login
StartSession($session_name);

// logout
if ($action=='logout')
    $session->logout();

switch ($page) {
    case "user":
        $user = new User($user_id);
        $heading = "User";

        if ($action == 'edit') {
            if (!isAdmin())
                noAccess();

            $body = $user->editUser();
        } else {
            $body = $user->userInfo();
        }
        break;
    case "dirs":
        $dir = new Dir(__DIR__);
        $heading = "Directory Structure";
        $body = $dir->printTree();
        break;
    case "menu":
        $html = get_menu($path);
        break;
    // ...

    default:
        $body = get_body($path);
}

$content["sitetitle"] = "Example legacy application";
$content["basepath"]  = $basePath;
$content["heading"]   = $heading ? $heading : get_heading($path);
$content["body"]      = $body;
$content["sidebody"]  = $sidebody ? $sidebody : get_menu($path);

if (!isset($html)) {
    $html = print_template("templates/main.html", $content);
}

// Output page and headers
print_page($html);

# Close database connection
mysql_close($dbh);
