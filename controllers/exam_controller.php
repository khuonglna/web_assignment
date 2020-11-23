<?php
require_once('../models/question.php');
require_once('../models/answer.php');
require_once('../models/exam.php');

define('MAX_SCORE', 100);
define('INCORRECT', 10);
define("QUESTION_NUMBER", 10);

// session_start();
class ExamController
{
    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "''", $data);
        return $data;
    }

    public function getCategory()
    {
        $questionModel = new QuestionModel();
        $categoryList = $questionModel->queryCategory();
        return $categoryList;
    }

    public function addQuestion($question, $category, $level, $ansList, $correct)
    {
        $category = $this->test_input($category);
        $result = false;

        if ($category != '' && $level != '' && $question != '' && $ansList[0] != '' && $ansList[1] != '' && $ansList[2] != '' && $correct != '') {
            $questionmodel = new QuestionModel();
            $result = $questionmodel->queryAddQuestion($category, $level, $question, $ansList, $correct);
        }
        return $result;
    }

    public function getExamQuestionList($category, $level)
    {
        $questionModel = new QuestionModel();
        $data = $questionModel->queryExamQuestionList($category, $level);
        $questionList = array();
        for ($i = 0; $i < sizeof($data); $i++) {
            $q_id = $data[$i]->getQuestionId();
            $q_text = $data[$i]->getQuestionText();
            $answerList = $data[$i]->getAnswerList();
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
                )
            );
        }
        return $questionList;
    }

    public function getQuestionList($category, $level)
    {
        $questionModel = new QuestionModel();
        $questionList = $questionModel->queryQuestionList($category, $level);
        return $questionList;
    }

    public function deleteQuestions($questionId)
    {
        $answerModel = new AnswerModel();
        $resultAnswer = $answerModel->queryDeleteAnswerByQuestionId($questionId);
        $questionModel = new QuestionModel();
        $resultQuestion = $questionModel->querydeleteQuestion($questionId);
        if ($resultQuestion == true && $resultAnswer == true) {
            $result = 1;
        } else {
            $result = 0;
        }
        return $result;
    }

    public function updateQuestionText($questionId, $questionText)
    {
        $questionModel = new QuestionModel();
        $result = $questionModel->queryUpdateQuestion($this->test_input($questionId), $this->test_input($questionText));
        return $result;
    }

    public function updateAnswerText($answerId, $answerText)
    {
        $answerModel = new AnswerModel();
        $result = $answerModel->queryUpdateAnswerText($this->test_input($answerId), $this->test_input($answerText));
        return $result;
    }

    public function updateAnswerCorrect($answerId, $correct)
    {
        $answerModel = new AnswerModel();
        $result = $answerModel->queryUpdateAnswerCorrect($this->test_input($answerId), $this->test_input($correct));
        return $result;
    }

    public function calculateScore($userSubmission)
    {
        $exam = new ExamModel();
        $submission = new ExamController();
        $score = MAX_SCORE;
        $questionList = array_keys($userSubmission);
        $correctAns = $exam->queryCorrectAnswerList($questionList);
        $incorrectList = array();
        foreach ($questionList as $q) {
            if ($correctAns[$q] != $userSubmission[$q]) {
                $incorrectList[] = $userSubmission[$q];
                $score -= INCORRECT;
            }
        }
        if(isset($_SESSION['username'])) {
            $temp = $submission->saveSubmissionResult($score);
        }
        $result = array(
            "score" => $score,
            "red" => $incorrectList,
            "green" => array_values($correctAns),
            "test" => $temp
        );
        
        
        return $result;
    }

    private function saveSubmissionResult($score) 
    {
        $username = $_SESSION['username'];
        $category = $_SESSION['category'];
        preg_match_all('!\d+!', $category, $matches);
        $level = $_SESSION['level'];
        $exam = new ExamModel();
        $exam->queryAddSubmission($username, $category, $level, $score);
        return $matches;
    }

    public function getCategoryList()
    {
        $exam = new ExamModel();
        $categoryList = $exam->queryCategory();
        return $categoryList;
    }
}
