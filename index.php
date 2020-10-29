<!DOCTYPE html>
<?php include 'php/common/header.php' ?>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "login") {
        include "php/common/login/$page.php";
    } elseif ($page == "sign_up") {
        include "php/common/sign_up/$page.php";
    } elseif ($page == "home") {
        include "php/common/$page.php";
    } elseif ($page == "test") {
        include "php/component/$page/$page.php";
    } else include "$page.php";
} else if (isset($_COOKIE["username"])) {
    echo "Welcome back!";
}
?>

<?php include 'php/common/footer.php' ?>