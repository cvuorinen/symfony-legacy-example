<?php

class Dir
{
    function Dir($path)
    {
        $this->path = $path;
    }

    function printTree()
    {
        $output = '';
        exec("tree " . escapeshellarg(realpath($this->path)), $output);

        return '<pre>' . implode('<br>', $output) . '</pre>';
    }
}
 