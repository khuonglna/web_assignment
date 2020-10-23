<!DOCTYPE html>
<?php include 'header.php' ?>

<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include "$page.php";
}
else if (isset($_COOKIE["username"])){
    echo "Welcome back!";
}
?>

<?php include 'footer.php' ?>