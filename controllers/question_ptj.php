<?php
include 'exam_controller.php';

// define("QUESTION_NUMBER", 10);

$res = $_REQUEST['do'];
if ($res == 'getExam') {
    $exam = new ExamController();
    $var =  $exam->getExamQuestionList(2, 2);
    echo json_encode($var);
} elseif ($res == 'submitExam') {
    $exam = new ExamController();
    $questionList = array();
    $userAnswerList = array();
    $userSubmission = array();
    for ($i = 0; $i < QUESTION_NUMBER; $i++) {
        $userSubmission[$_REQUEST['q' . $i]] = $_REQUEST['a' . $i];
    }

    $temp = $exam->calculateScore($userSubmission);
    $tempArray = $temp;
    
    echo json_encode($tempArray);
    // echo json_encode($userSubmission);
}
