<?php
require_once('db_model.php');
require_once('exam.php');

class Question
{
    private $questionId;
    private $questionText;
    private $answerList;

    function getCorrectAnswer()
    {
    }

    function getQuestionId()
    {
        return $this->questionId;
    }

    function setAnswerList(array $answerList)
    {
        $this->answerList = $answerList;
    }
}

class QuestionModel extends DbModel
{
    function queryQuestionList($category, $difficulty)
    {
        $questionList = array();
        $conn = $this->connect();
        $sql = "SELECT 
                        *
                    FROM 
                        QUESTION
                    WHERE 
                        _LEVEL = $ category AND Q_CATEGORY = $ difficulty";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_row($res)) {
                $question = new Question();
                $answerModel = new AnswerModel();
                $question->setAnswerList($answerModel->queryListAnswerByQuestionId($row["q_id"]));
                $questionList[] = $question;
            }
        }
        return $questionList;
    }
}
