<?php
include 'exam_controller.php';
$exam = new ExamController();
$var =  $exam->getExamQuestionList(2, 2);
echo json_encode($var);