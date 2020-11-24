<?php
    include 'result_controller.php';
    $controller = new ResultController();
    $var =  $controller->getUserResult();
    echo json_encode($var);
?>