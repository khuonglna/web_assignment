<?php
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

                include 'addexam_controller.php';
                $examController = new ExamController();
                $result = $examController->addQuestion ($question, $category, $level, $ansList, $correct);
                echo json_encode($result);
        } else {
                echo "guest";
        }
?>