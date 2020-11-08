<?php
        // require_once __DIR__ . '/../controllers/addexam_controller.php';
        include 'addexam_controller.php';
        $res = $_REQUEST["function"];
        if ($res == "addQuestion") {
                $examController = new ExamController();
                $result = $examController->addQuestion();
                echo json_encode($result);
        } else {
                echo "guest";
        }
?>