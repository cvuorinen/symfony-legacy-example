<?php

class Info
{
    function getUserName($id)
    {
        $sql = "SELECT CONCAT(firstname,' ',lastname) FROM user WHERE id=" . (int)$id;
        $result = mysql_fetch_array(mysql_query($sql));

        return $result[0];
    }
}
 