<?php

class Info
{
    function getUsername($id)
    {
        $sql = "SELECT username FROM user WHERE id=" . (int)$id;
        $result = mysql_fetch_array(mysql_query($sql));

        return $result[0];
    }
}
 