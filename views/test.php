<?php
        // require_once __DIR__ . '/../controllers/addexam_controller.php';
        $res = $_REQUEST["function"];
        if ($res == "addQuestion") {
                $examController = new ExamController();
                echo json_encode($examController->addQuestion());
        } else {
                echo "guest";
        }
?>