<?php
    session_start();
    if (isset($_SESSION["username"])) {
        $var = array(
            "username" => $_SESSION["username"],
            "role" => $_SESSION["role"]
        );
        echo json_encode($var);
    } else {
        echo json_encode(array(
            "username" => "",
            "role" => ""
        ));
    }
?>