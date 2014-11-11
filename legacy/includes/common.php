<?php

function StartSession($name) {
    global $user_id;
    $user_id = 1;

    session_name($name);
    session_start();
}

function get_body($path) {
    global $basePath;
    return '<img src="' . $basePath . 'images/legacy.jpg"/><br>'
        . 'Image by  order_242  <a href="https://www.flickr.com/photos/juanelo242a/15393888991" target="_blank">www.flickr.com/photos/juanelo242a/15393888991</a>';
}

function get_heading($path) {
    return '';
}

function get_menu($path) {
    global $baseUrl;
    $router = $GLOBALS['container']->get('router');

    return '<ul>
        <li><a href="' . $baseUrl . 'home.html">Home</a></li>
        <li><a href="' . $baseUrl . 'user.html">User</a></li>
        <li><a href="' . $baseUrl . 'dirs.html">Dir structure</a></li>
        <li><a href="' . $router->generate('_demo') . '">Demo Home</a></li>
    </ul>';
}

function isAdmin() {
    global $user_id;

    return Info::getUsername($user_id) == 'admin';
}

function noAccess() {
    die('<p style="color: #f00">Access denied</p>');
}
