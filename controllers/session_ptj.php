<?php
    session_start();
    include "common_controller.php";
    $common = new Common();
    if ($_REQUEST['logout'] == 1) {
        session_unset();
        echo 1;
    } else {
        echo json_encode($common->checkLogin());  
    }
?>