<?php

if (!defined('LEGACY2_APP')) {
    die();
}

// return false if user doesn't have access to the file
// and 1 if user has full access and 2 if limited access
function check_access($filename = '')
{
    global $file_access, $current_file;

    if (empty($filename)) {
        $filename = $current_file;
    }

    if (in_array($_SESSION['user_level'], $file_access[$filename]['full_access'])) {
        return 1;
    }
    elseif (in_array($_SESSION['user_level'], $file_access[$filename]['limit_access'])) {
        return 2;
    }
    else {
        return false;
    }
}

// redirect with params
function redirect($url, $params = false) {
    if (is_array($params)) {
        $url .= '?';

        foreach ($params as $name => $value) {
            $url .= $name . '=' . $value . '&';
        }

        $url = substr($url, 0, -1);
    }

    header('Location: ' . $url);
    die();
}
