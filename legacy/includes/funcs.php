<?php

function print_template ($file, $content) {
    $html = file_get_contents($file);
    foreach ($content as $key => $value)
    {
        $html = preg_replace("/##$key##/",$value,$html);
    }
    return $html;
}

function set_path($path_env) {
    $path=explode("/",preg_replace("/\.(html|png)/","",$path_env));
    array_shift($path);
    return $path;
}

function print_page($html) {
    // Output page
    header("Content-Length: " . strlen($html));
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: must-revalidate, no-store");
    header("Pragma: no-cache");

    print $html;
}