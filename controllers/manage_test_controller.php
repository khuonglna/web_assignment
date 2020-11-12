<?php
        include 'exam_controller.php';

        $res = $_REQUEST['function'];
        if ($res == "addQuestion") {
                $question = $_REQUEST['question'];
                $category = $_REQUEST['category'];
                $level = $_REQUEST['level'];
                $correct = $_REQUEST['correct'];

                $ansList = array();
                $ansList[0] = $_REQUEST['answer1'];
                $ansList[1] = $_REQUEST['answer2'];
                $ansList[2] = $_REQUEST['answer3'];

                $examController = new ExamController();
                $result = $examController->addQuestion ($question, $category, $level, $ansList, $correct);
                echo json_encode($result);

        } elseif ($res == "listQuestion") {
                $category = $_REQUEST['category'];
                $level = $_REQUEST['level'];
        
                $examController = new ExamController();
                $result = $examController->getQuestionList($category, $level);
                $questionList = array();
                for ($i = 0; $i < sizeof($result); $i++) {
                        $q_id = $result[$i]->getQuestionId();
                        $q_text = $result[$i]->getQuestionText();
                        $questionList[$i] = array("q_id"=>$q_id,"q_text"=>$q_text);
                }
                echo json_encode($questionList);
        } elseif ($res == "deleteQuestion") {
                $category = $_REQUEST['category'];
                $level = $_REQUEST['level'];

                echo json_encode($_REQUEST['q_id']);
        } else {
                echo "guest";
        }
?>