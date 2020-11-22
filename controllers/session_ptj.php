<?php
session_start();
include 'common_controller.php';
$common = new Common();
$var = $common->checkLogin();
echo json_encode($var);
