<?php
    require_once('models/question.php');

    class ExamController {
        private function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function addQuestion() {
            $category = isset($_POST['category']) ? $this->test_input($_POST['category']) : '';
            $level = isset($_POST['level']) ? $this->test_input($_POST['level']) : '';
            $question = isset($_POST['question']) ? $this->test_input($_POST['question']) : '';

            $ansList = array();
            $ansList[] = isset($_POST['answer1']) ? $this->test_input($_POST['answer1']) : '';
            $ansList[] = isset($_POST['answer2']) ? $this->test_input($_POST['answer2']) : '';
            $ansList[] = isset($_POST['answer3']) ? $this->test_input($_POST['answer3']) : '';
            
            $correct = isset($_POST['correct']) ? $this->test_input($_POST['correct']) : '';

            $result = false;

            if ($category == '' || $level == '' || $question == '' || $ansList[0] == '' || $ansList[1] == '' || $ansList[2] == '' || $correct == '') {   
                // require_once __DIR__ . '/../views/add_question.php';
                // require_once('views/add_question.php');
                // echo json_encode($result);
            } else {
                $questionmodel = new QuestionModel();
                $result = $questionmodel->queryAddQuestion($category, $level, $question, $ansList, $correct);
                if ($result) {
                    // require_once __DIR__ . '/../views/add_question.php';
                    // require_once('views/add_question.php');
                    // echo json_encode($result);
                }
                // require_once __DIR__ . '/../views/add_question.php';
                // require_once('views/add_question.php');
                // echo json_encode($result);
            }
            require_once("views/add_question.php");
            return $result;
		}
    }
?>