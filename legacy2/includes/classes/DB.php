<?php

// mock db class
class Db
{
    public function __construct()
    {
        // normally connect here, this is just a mock class
    }

    public function query($sql)
    {
        return false;
    }

    public function escape($param)
    {
        return mysql_real_escape_string($param);
    }

    public function select($sql)
    {
        return array(
            'id' => 1,
            'name' => 'Testy McTesterson',
        );
    }
}
