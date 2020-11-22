<?php
include 'exam_controller.php';
$category = new ExamController();
$var = $category->getCategoryList();
echo json_encode($var);
