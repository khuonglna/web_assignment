<?php

class Common
{
    function checkLogin()
    {
        if (isset($_SESSION["username"])) {
            $var = array(
                "username" => $_SESSION["username"],
                "role" => $_SESSION["role"]
            );
            return $var;
        }
    }
}
