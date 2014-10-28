<?php

// mock session class
class session
{
    public function start($session_name  = SESSION_NAME)
    {
        session_name($session_name);
        session_start();

        $_SESSION['user_level'] = 1;
    }

    public function getUserId()
    {
        return 1;
    }
}
