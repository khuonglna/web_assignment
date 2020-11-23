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
                    a.a_id
                    , a.a_text
                    , a.a_correct_flag
                FROM
                    answer a
                INNER JOIN question q ON
                    a.q_id = q.q_id
                WHERE 
                    q.q_id = $questionId
                ORDER BY RAND();
                ";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $answer = new Answer($row['a_id'], $row['a_text']);
                $answerList[] = $answer;
            }
        }
        return $answerList;
    }

    public function queryGetCorrectAnswerByQuestionId($questionId)
    {
        $conn = $this->connect();
        $sql = "SELECT 
                    `a_id`
                FROM 
                    ANSWER
                WHERE 
                    `q_id` = '$questionId' AND `a_correct_flag` = 1
                ";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
            return false;
        }
        $result = "";
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $result = $row["a_id"];
            }
        }
        return $result;
    }

    public function queryAddAnswers($qId, $ansText, $correctAns)
    {
        $conn = $this->connect();

        for ($i = 0; $i < 3; $i++) {
            $correctFlag = ((int)$correctAns == $i + 1) ? 1 : 0;
            $query =    "INSERT INTO 
                            ANSWER (`q_id`, `a_text`, `a_correct_flag`) 
                        VALUES 
                            ('$qId', '$ansText[$i]' , '$correctFlag')";
            if (!mysqli_query($conn, $query)) {
                echo mysqli_error($conn);
                return false;
            }
        }
        return true;
    }

    public function queryDeleteAnswerByQuestionId($questionId)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM 
                    ANSWER
                WHERE 
                    Q_ID='$questionId'";
        $res = mysqli_query($conn, $sql);
        if (!mysqli_query($conn, $sql)) {
            echo mysqli_error($conn);
            return false;
        }
        return true;
    }

    public function queryUpdateAnswerText($answerId, $answerText)
    {
        $conn = $this->connect();
        $sql = "UPDATE 
                    ANSWER
                SET
                    `a_text` = '$answerText'
                WHERE 
                    `a_id` = '$answerId'
                ";
        if (!mysqli_query($conn, $sql)) {
            echo mysqli_error($conn);
            return false;
        }
        return true;
    }

    public function queryUpdateAnswerCorrect($answerId, $correct)
    {
        $conn = $this->connect();
        $sql = "UPDATE 
                    ANSWER
                SET
                    `a_correct_flag` = '$correct'
                WHERE 
                    `a_id` = '$answerId'
                ";
        if (!mysqli_query($conn, $sql)) {
            echo mysqli_error($conn);
            return false;
        }
        return true;
    }
}
