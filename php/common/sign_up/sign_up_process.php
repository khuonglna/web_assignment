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
    } else {
        $name = test_input($_POST["name"]);

        // validate name
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }

        // check name existance
        $sql = "SELECT * FROM USERS WHERE username='$name'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $nameErr = "Username already taken";
        } else {
            $usernameValid = true;
        }
    }
    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
    } else {
        $pass = test_input($_POST["pass"]);
        $passValid = true;
    }
    if ($usernameValid === true && $passValid === true) {
        $query = "INSERT INTO USERS (username, password) 
                        VALUES ('$name','" . md5($pass) . "')";
        $results = mysqli_query($conn, $query);
        //echo 'Saved!';
        exit();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
