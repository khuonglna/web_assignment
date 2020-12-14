<?php
require_once('models/user_model.php');

class UserController
{
    public function logout()
    {
        session_unset();
        // setcookie("user", "", time() - 3600);
        // require_once('views/home.html');
        exit();
    }
}
