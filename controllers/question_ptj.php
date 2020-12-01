<?php
session_start();
include 'exam_controller.php';
$res = $_REQUEST['do'];
if ($res == 'getExam') {
    $exam = new ExamController();
    $category = $_REQUEST['category'];
    $level = $_REQUEST['dif'];
    $_SESSION['category'] = $category;
    $_SESSION['level'] = $level;
    $var =  $exam->getExamQuestionList($category, $level);
    echo json_encode($var);
} elseif ($res == 'submitExam') {
    $exam = new ExamController();
    $questionList = array();
    $userAnswerList = array();
    $userSubmission = array();
    for ($i = 0; $i < QUESTION_NUMBER; $i++) {
        $userSubmission[$_REQUEST['q' . $i]] = $_REQUEST['a' . $i];
    }

    $result = $exam->calculateScore($userSubmission);
    // $result = $userSubmission;
    echo json_encode($result);
}
