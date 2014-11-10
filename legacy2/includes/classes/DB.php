<?php

class Db
{
    public function __construct()
    {
        mysql_connect(CONF_DB_HOSTS, CONF_DB_USER, CONF_DB_PW);
        mysql_select_db(CONF_DB_NAME);
    }

    public function query($sql)
    {
        return mysql_query($sql);
    }

    public function escape($param)
    {
        return mysql_real_escape_string($param);
    }

    public function select($sql)
    {
        return mysql_fetch_array(mysql_query($sql));
    }
}
