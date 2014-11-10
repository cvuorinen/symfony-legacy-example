<?php

class User
{
    function User($user_id)
    {
        $this->keyvalue = $user_id;

        if (is_int($this->keyvalue)) {
            $this->loadData();
        }
    }

    function userInfo()
    {
        global $baseUrl;

        $html = '<p><strong>Id:</strong> ' . $this->keyvalue . '</p>';
        $html .= '<p><strong>Name:</strong> ' . $this->firstname . ' ' . $this->lastname . '</p>';
        if (isAdmin()) {
            $html .= '<h3>Actions:</h3>';
            $html .= '<a href="' . $baseUrl . '?action=edit&page=/user.html">Edit</a>';
        }

        return $html;
    }

    function editUser()
    {
        $html = '<form method="post">';

        $html .=  '<p><strong>Id:</strong> ' . $this->id . '</p><input type="hidden" name="id" value="' . $this->id . '">';
        $html .= '<p><strong>Firstname:</strong> <input type="text" name="firstname" value="' . $this->firstname . '"/></p>';
        $html .= '<p><strong>Lastname:</strong> <input type="text" name="lastname" value="' . $this->lastname . '"/></p>';
        $html .= '<input type="submit" value="Submit"><p><br/></p>';

        $html .= '</form>';

        return $html;
    }

    function loadData()
    {
        $sql = "SELECT * FROM user WHERE id=" . (int)$this->keyvalue;
        $result = mysql_fetch_array(mysql_query($sql));

        foreach ($result as $key => $value) {
            $this->$key = $value;
        }
    }
}
 