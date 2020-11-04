<?php
require_once('db_model.php');

class Answer
{
    private $answerId;
    private $answerText;

    function __construct($answerId, $answerText)
    {
        $this->answerId = $answerId;
        $this->answerText = $answerText;
    }

    function getAnswerId()
    {
        return $this->answerId;
    }

    function setAnswerId($answerId)
    {
        $this->answerId = $answerId;
    }

    function getAnswerText()
    {
        return $this->answerText;
    }

    function setAnswerText($answerText)
    {
        $this->answerText = $answerText;
    }
}

class AnswerModel extends DbModel
{
    function queryListAnswerByQuestionId($questionId)
    {
        $answerList = array();
        $conn = $this->connect();
        $sql = "SELECT
                        a.a_id,
                        a.a_text,
                    FROM
                        answer a
                    INNER JOIN question q ON
                        a.q_id = q.q_id
                    WHERE 
                        q.q_id = $questionId";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $answer = new Answer($row['a_id'], $row['a_text']);
                $answerList[] = $answer;
            }
        }
        return $answerList;
    }
}
