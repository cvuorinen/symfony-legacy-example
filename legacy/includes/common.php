<?php

function StartSession($name) {
    global $user_id;
    $user_id = 1;

    session_name($name);
    session_start();
}

function get_body($path) {
    return 'Page content';
}

function get_heading($path) {
    return 'Page heading';
}

function get_menu($path) {
    global $baseUrl;
    return '<ul><li><a href="' . $baseUrl . '/user.html">User</a></li></ul>';
}

function isAdmin() {
    return false;
}

function noAccess() {
    die('<p style="color: #f00">Access denied</p>');
}
