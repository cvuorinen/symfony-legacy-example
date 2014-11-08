<?php

define('LEGACY2_APP', true);

require_once('includes/header.php');

echo '
  <div class="content">
    <h1>User</h1>';

if ($request->getMethod() == 'POST') {
    if (check_access() == 1) {
        // update user info
        $update_query  = "UPDATE user SET"
                       . " firstname='" . $db->escape($request->request->get('firstname')) . "'"
                       . ",lastname='" . $db->escape($request->request->get('lastname')) . "'";
        $update_query .= " WHERE id=" . (int)$request->request->get('id');

        if ($db->query($update_query))
        {
            $message = 'User saved.';
        } else {
            $error = 'Save failed.';
        }
    }
}

// output error messages
if ($error) {
    echo '    <div class="error" style="color: #f00;">' . $error . '</div>';
}

// ouput messages
if ($message) {
    echo '    <div class="message">' . $message . '</div>';
}

// if id set, show details
if ($request->query->get('id')) {
    echo '<form method="post">';

    $user = $db->select("SELECT * FROM user WHERE id=" . (int)$request->query->get('id'));

    echo '<p><strong>Id:</strong> ' . $user['id'] . '</p><input type="hidden" name="id" value="' . $user['id'] . '">';
    echo '<p><strong>Firstname:</strong> <input type="text" name="firstname" value="' . $user['firstname'] . '"/></p>';
    echo '<p><strong>Lastname:</strong> <input type="text" name="lastname" value="' . $user['lastname'] . '"/></p>';
    echo '<input type="submit" value="Submit"><p><br/></p>';

    echo '</form>';
}

echo '
  </div>';

require_once('includes/footer.php');

?>