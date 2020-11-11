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
            $exam = new Exam($questionModel->queryQuestionList($category, $level));
            return $exam;
        }
    
        public function calculateScore() {
    
        }
    }
?>