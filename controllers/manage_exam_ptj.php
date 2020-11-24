<?php
include 'exam_controller.php';
$res = $_REQUEST['function'];

if ($res == "getCategory") {
    $examController = new ExamController();
    $result = $examController->getCategory();

    echo json_encode($result);
} elseif ($res == "addQuestion") {
    $question = $_REQUEST['question'];
    $category = $_REQUEST['category'];
    $level = $_REQUEST['level'];
    $correct = $_REQUEST['correct'];

    $ansList = array();
    $ansList[0] = $_REQUEST['answer1'];
    $ansList[1] = $_REQUEST['answer2'];
    $ansList[2] = $_REQUEST['answer3'];

    $examController = new ExamController();
    $result = $examController->addQuestion($question, $category, $level, $ansList, $correct);
    
    echo $result;
} elseif ($res == "listQuestion") {
    $category = $_REQUEST['category'];
    $level = $_REQUEST['level'];

    $examController = new ExamController();
    $result = $examController->getQuestionList($category, $level);
    $questionList = array();
    for ($i = 0; $i < sizeof($result); $i++) {
        $q_id = $result[$i]->getQuestionId();
        $q_text = $result[$i]->getQuestionText();
        $answerList = $result[$i]->getAnswerList();
        $correct = $result[$i]->getCorrectAnswer();
        $questionList[$i] = array(
            "q_id" => $q_id,
            "q_text" => $q_text,
            "ans" => array(
                array(
                    "a_id"      => $answerList[0]->getAnswerId(),
                    "a_text"    => $answerList[0]->getAnswerText()
                ),
                array(
                    "a_id"      => $answerList[1]->getAnswerId(),
                    "a_text"    => $answerList[1]->getAnswerText()
                ),
                array(
                    "a_id"      => $answerList[2]->getAnswerId(),
                    "a_text"    => $answerList[2]->getAnswerText()
                )
            ),
            "correct" => $correct
        );
    }
    echo json_encode($questionList);

} elseif ($res == "deleteQuestion") {
    $dataStr = $_REQUEST['q_id'];

    $result = -1;
    if ($dataStr != "") {
        $start = 0;
        $end = 0;
        $pos = 0;
        $char = $dataStr[$pos];
        while ($char != "") {
            if ($char == "-") {
                $end = $pos;
                $q_id = substr($dataStr, $start, ($end - $start));
                $start = $end + 1;
                $examController = new ExamController();
                $result = $examController->deleteQuestions($q_id);
                if ($result == false) {
                    break;
                }
            }
            $pos = $pos + 1;
            $char = $dataStr[$pos];
        }
    }
    echo json_encode($result);
} elseif ($res == "updateQuestionText") {
    $q_id = $_REQUEST['q_id'];
    $q_text = $_REQUEST['q_text'];

    $examController = new ExamController();
    $result = $examController->updateQuestionText($q_id, $q_text);

    echo $result;
} elseif ($res == "updateAnswerText") {
    $a_id = $_REQUEST['a_id'];
    $a_text = $_REQUEST['a_text'];

    $examController = new ExamController();
    $result = $examController->updateAnswerText($a_id, $a_text);

    echo $result;
} elseif ($res == "updateAnswerCorrect") {
    $a_id = $_REQUEST['a_id'];
    $correct = $_REQUEST['correct'];

    $examController = new ExamController();
    $result = $examController->updateAnswerCorrect($a_id, $correct);

    echo $result;
} else {
    // echo "guest";
}
