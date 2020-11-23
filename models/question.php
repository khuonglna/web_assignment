<?php
require_once('db_model.php');
require_once('answer.php');

class Question
{
    private $questionId;
    private $questionText;
    private $answerList;

    function __construct($questionId, $questionText)
    {
        $this->questionId = $questionId;
        $this->questionText = $questionText;
    }

    function getCorrectAnswer()
    {
        $answerModel = new AnswerModel();
        $correctAnswer = $answerModel->queryGetCorrectAnswerByQuestionId($this->questionId);
        $correct = -1;
        for ($i = 0; $i < 3; $i++) {
            if ($correctAnswer == $this->answerList[$i]->getAnswerId()) {
                $correct = $i;
            }
        }
        return $correct;
    }

    public function getAnswerList()
    {
        return $this->answerList;
    }

    public function getQuestionId()
    {
        return $this->questionId;
    }

    public function getQuestionText()
    {
        return $this->questionText;
    }

    public function setAnswerList(array $answerList)
    {
        $this->answerList = $answerList;
    }
}

class QuestionModel extends DbModel
{
    public function queryQuestionList($category, $level)
    {
        $questionList = array();
        $conn = $this->connect();
        $sql = "SELECT 
                    *
                FROM 
                    QUESTION
                WHERE 
                    `q_category` = '$category' AND `q_level` = '$level'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $question = new Question($row["q_id"], $row["q_text"]);
                $answerModel = new AnswerModel();
                $answerList = $answerModel->queryListAnswerByQuestionId($row["q_id"]);
                $question->setAnswerList($answerList);
                $questionList[] = $question;
            }
        }
        return $questionList;
    }

    public function queryAddQuestion($category, $level, $questionText, $ansList, $correct)
    {
        $conn = $this->connect();
        $sql = "SELECT 
                    * 
                FROM 
                    QUESTION 
                WHERE 
                    Q_TEXT='$questionText'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
            return false;
        } elseif (mysqli_num_rows($res) > 0) {
            return false;
        }

        $query =    "INSERT INTO 
                        QUESTION (Q_LEVEL, Q_CATEGORY, Q_TEXT) 
                    VALUES
                        ('$level', '$category' , '$questionText')
                    ";
        if (!mysqli_query($conn, $query)) {
            echo mysqli_error($conn);
            return false;
        }

        $qId = $this->queryGetLastID();

        $answermodel = new AnswerModel();
        $result = $answermodel->queryAddAnswers($qId, $ansList, $correct);
        if (!$result) {
            return false;
        }
        return true;
    }

    public function queryGetLastID()
    {
        $conn = $this->connect();
        $sql = "SELECT 
                    MAX(Q_ID) 
                FROM 
                    QUESTION
                ";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
            return false;
        }
        $qId = 1;
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $qId = $row["MAX(Q_ID)"];
            }
        }
        return $qId;
    }

    public function queryDeleteQuestion($questionId)
    {
        $conn = $this->connect();
        $q_id = (int)$questionId;
        $sql = "DELETE FROM 
                    QUESTION
                WHERE 
                    Q_ID='$q_id'";
        if (!mysqli_query($conn, $sql)) {
            echo mysqli_error($conn);
            return false;
        }
        return true;
    }

    public function queryUpdateQuestion($questionId, $questionText)
    {
        $conn = $this->connect();
        $sql = "UPDATE 
                    QUESTION
                SET
                    `q_text` = '$questionText'
                WHERE 
                    `q_id` = '$questionId'
                ";
        if (!mysqli_query($conn, $sql)) {
            echo mysqli_error($conn);
            return false;
        }
        return true;
    }

    public function queryQuestions($category, $level)
    {
        $questionList = array();
        $conn = $this->connect();
        $sql = "SELECT
                    q.q_id,
                    q.q_text,
                    a.a_id,
                    a.a_text,
                    a.a_correct_flag
                FROM
                    question q
                INNER JOIN answer a ON
                    a.q_id = q.q_id
                WHERE
                    q.q_level = $level AND q.q_category = $category
                ";
        $data = array();
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

    public function querygetCorrectAnswer($qId)
    {
        $conn = $this->connect();
        $sql = "SELECT 
                    a.a_id,
                    a.a_correct_flag
                FROM 
                    ANSWER a
                INNER JOIN QUESTION  q ON
                    a.q_id = q.q_id;
                WHERE 
                    q.q_id = $qId AND a.a_correct_flag = 1
                ";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            return $row['a_id'];
        }
        return 0;
    }

    public function queryCategory()
    {
        $conn = $this->connect();
        $sql = "SELECT 
                    *
                FROM
                    CATEGORY
                ORDER BY
                    C_NAME ASC
                ";
        $res =  mysqli_query($conn, $sql);
        $data = array();
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

    public function queryExamQuestionList($category, $level)
    {
        $questionList = array();
        $conn = $this->connect();
        $sql = "SELECT 
                    *
                FROM 
                    QUESTION
                WHERE 
                    Q_CATEGORY = '$category' AND Q_LEVEL = '$level'
                ORDER BY RAND()
                LIMIT 10
                ";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $question = new Question($row["q_id"], $row["q_text"]);
                $answerModel = new AnswerModel();
                $answerList = $answerModel->queryListAnswerByQuestionId($row["q_id"]);
                $question->setAnswerList($answerList);
                $questionList[] = $question;
            }
        }
        return $questionList;
    }
}
