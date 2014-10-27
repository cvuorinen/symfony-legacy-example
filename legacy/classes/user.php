<?php

class User
{
    function User($user_id)
    {
        $this->keyvalue = $user_id;
    }

    function userInfo()
    {
        global $baseUrl;

        $html = '<p><strong>Id:</strong> ' . $this->keyvalue . '</p>';
        $html .= '<p><strong>Name:</strong> ' . Info::getUserName($this->keyvalue) . '</p>';
        if (isAdmin())
            $html .= '<h3>Actions:</h3>';
            $html .= '<a href="' . $baseUrl . '?action=edit&page=/user.html">Edit</a>';

        return $html;
    }
}
 