<!DOCTYPE html>
<?php include 'php/common/header.php' ?>
<?php include 'php/common/home.php' ?>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include "$page.php";
} else if (isset($_COOKIE["username"])) {
    echo "Welcome back!";
}
?>

<?php include 'php/common/footer.php' ?>