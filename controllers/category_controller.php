<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_assignment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT 
            c_name 
        FROM 
            category
        ORDER BY 
            c_name ASC";
$result = $conn->query($sql);


mysqli_close($conn);
