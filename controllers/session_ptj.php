<!-- <?php
session_start();
include 'common_controller.php';
$common = new Common();
$var = $common->checkLogin();
echo json_encode($var);

?> -->

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