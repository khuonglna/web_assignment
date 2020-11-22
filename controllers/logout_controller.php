<?php
require_once('models/user_model.php');

class UserController
{
    public function logout()
    {
        session_unset();
        require_once('views/home.html');
    }
}
