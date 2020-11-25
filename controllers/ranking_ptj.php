<?php
    include 'result_controller.php';
    $controller = new ResultController();
    $var =  $controller->getRanking();
    echo json_encode($var);
?>