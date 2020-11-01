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

$sql_question_id = "SELECT Q_ID FROM QUESTION WHERE Q_CATEGORY = 1";
$sql_answer = "SELECT A_TEXT FROM ANSWER INNER JOIN QUESTION ON ANSWER.Q_ID = QUESTION.Q_ID WHERE Q_CATEGORY = 1 AND Q_LEVEL = 2";
$question_res = mysqli_query($conn, $sql_question_id);
$answer_res = mysqli_query($conn, $sql_answer);
$question = array();
$answer = array();
$temp = array();
if (mysqli_num_rows($question_res) > 0) {
    while($row_question = mysqli_fetch_assoc($question_res)) {
       $question[] = $row_question["Q_ID"];
    }
}

foreach ($question as $i) {
    $sql_question_txt = "SELECT Q_TEXT, Q_ID FROM QUESTION WHERE Q_ID = $i";
    $q_text_res = mysqli_query($conn, $sql_question_txt);
    $aaaaa =  mysqli_fetch_assoc($q_text_res);
    echo  " Question:  " . $aaaaa["Q_TEXT"] ." <br>";
    $sql_answer_txt = "SELECT A_ID, A_TEXT FROM ANSWER INNER JOIN QUESTION ON ANSWER.Q_ID = QUESTION.Q_ID WHERE QUESTION.Q_ID = $i";
    $a_text_res = mysqli_query($conn, $sql_answer_txt);
    while($row_answer = mysqli_fetch_assoc($a_text_res)) {
        echo "Answer: ". $row_answer["A_TEXT"] ."  <br>";
    }
}


mysqli_close($conn);
