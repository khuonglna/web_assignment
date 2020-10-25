<?php
$severname = "localhost";
$password = "";
$username = "root";
$db = "web_assignment";
$conn = mysqli_connect($severname, $username, $password, $db);
if ($conn === false) {
    echo "Could not connect to database";
    die;
}

$name = $pass = "";
$nameErr = $passErr = "";
$usernameValid = $passValid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }
    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
    } else {
        $name = $_POST["name"];

        // check name existance
        $sql = "SELECT * FROM USERS WHERE username='$name'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) === 0) {
            $nameErr = "Unregistered username";
        } else {
            $pass = $_POST["pass"];
            $row = mysqli_fetch_array($res);
            if ($row['password'] == md5($pass)) {
                $passErr = "OK";;
            } else {
                $passErr = "Wrong password";
            }
        }
    }
}
