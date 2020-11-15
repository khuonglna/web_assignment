<?php
    require_once('../models/question.php');
    require_once('../models/answer.php');
    require_once('../models/exam.php');

    class ExamController {

        private function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function getCategory() {
            $questionModel = new QuestionModel();
            $categoryList = $questionModel->queryCategory();
            return $categoryList;
        }

        public function addQuestion($question, $category, $level, $ansList, $correct) {
            $category = $this->test_input($category);
            $result = false;

            if ($category == '' || $level == '' || $question == '' || $ansList[0] == '' || $ansList[1] == '' || $ansList[2] == '' || $correct == '') {   

            } else {
                $questionmodel = new QuestionModel();
                $result = $questionmodel->queryAddQuestion($category, $level, $question, $ansList, $correct); 
            }
            return $result;
        }


        public function getQuestionList($category, $level) {
            $questionModel = new QuestionModel();
            $questionList = $questionModel->queryQuestionList($category, $level);
            return $questionList;
        }
    
        public function deleteQuestions($questionId) {
            $answerModel = new AnswerModel();
            $resultAnswer = $answerModel->queryDeleteAnswerByQuestionId($questionId);
            $questionModel = new QuestionModel();
            $resultQuestion = $questionModel->querydeleteQuestion($questionId);

            $result = 0;
            if ($resultQuestion == true && $resultAnswer == true) {
                $result = 1;
            }
            return $result;
        }

        public function calculateScore() {
    
        }
    }
?>