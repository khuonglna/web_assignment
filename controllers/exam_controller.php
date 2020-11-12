<?php
require_once('../models/question.php');
require_once('../models/answer.php');
require_once('../models/exam.php');
class ExamController
{
    function getQuestionList($category, $level) {
        $questionModel = new QuestionModel();
        
    }

    public function getCategoryList() 
    {
        $category = new QuestionModel();
        return $category->queryCategory();
    }

    function calculateScore() {

    }
}
