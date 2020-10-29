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

$sql_question = "SELECT Q_ID FROM QUESTION WHERE Q_CATEGORY = 1";
$sql_answer = "SELECT A_TEXT FROM ANSWER INNER JOIN QUESTION ON ANSWER.Q_ID = QUESTION.Q_ID WHERE Q_CATEGORY = 1 AND Q_LEVEL = 2";
$question_res = mysqli_query($conn, $sql_question);
$answer_res = mysqli_query($conn, $sql_answer);
$question = array();
if (mysqli_num_rows($question_res) > 0) {
    while($row = mysqli_fetch_assoc($question_res)) {
       $question[] = $row["Q_ID"];
    }
}
foreach ($question as $i) {
    echo "$i <br>";
}
// $var = "dd";
// $test = array("aa", "bnb", "cc");
// foreach ($test as $i) {
//     echo "$i <br>";
// }
// $test[] = $var;
// foreach ($test as $i) {
//     echo "$i <br>";
// }

mysqli_close($conn);
