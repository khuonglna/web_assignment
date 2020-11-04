<?php
require_once('./models/question.php');
require_once('./models/answer.php');
require_once('./models/exam.php');
class ExamController
{
    function getQuestionList($category, $level) {
        $questionModel = new QuestionModel();
        $exam = new Exam($questionModel->queryQuestionList($category, $level));
        echo json_encode($questionModel->test($category, $level));
    }

    function calculateScore() {

    }
}
