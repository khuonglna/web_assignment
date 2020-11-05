<?php
require_once('db_model.php');
require_once('exam.php');
require_once('answer.php');

class Question {
    private $questionId;
    private $questionText;
    private $answerList;

    function getCorrectAnswer() {
    }

    function getQuestionId() {
        return $this->questionId;
    }

    function setAnswerList(array $answerList) {
        $this->answerList = $answerList;
    }
}

<<<<<<< HEAD
class QuestionModel extends DbModel {
    public function queryQuestionList($category, $difficulty) {
        $questionList = array();
        $conn = $this->connect();
        $sql = "SELECT 
                        *
                    FROM 
                        QUESTION
                    WHERE 
                        Q_LEVEL = '$category' AND Q_CATEGORY = '$difficulty'";
=======
class QuestionModel extends DbModel
{
    function queryQuestionList($category, $level)
    {
        $questionList = array();
        $conn = $this->connect();
        $sql = "SELECT 
                    Q_ID,
                    Q_TEXT
                FROM 
                    QUESTION
                WHERE 
                    Q_LEVEL = $category AND Q_CATEGORY = $level";
>>>>>>> upstream/main
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $question = new Question();
                $answerModel = new AnswerModel();
                $temp = $row["Q_ID"];
                $temp2 = $answerModel->queryListAnswerByQuestionId($temp);
                $question->setAnswerList($temp2);
                $questionList[] = $question;
            }
        }
        return $questionList;
    }

<<<<<<< HEAD
    public function queryAddQuestion($category , $level, $questionText, $ansList, $correct) {   
        $conn = $this->connect();
        $sql = "SELECT * FROM QUESTION WHERE `q_text`='$questionText'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
            return false;
        } elseif (mysqli_num_rows($res) > 0) {
            return false;
        }

        $sql = "SELECT `q_id` FROM QUESTION";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
            return false;
        }

        $qId = mysqli_num_rows($res) + 1;
        $query = "INSERT INTO QUESTION (`q_id`, `q_level`, `q_category`, `q_text`) VALUES ('$qId' , '$level', '$category' , '$questionText')";
        if (!mysqli_query($conn, $query)) {
            echo mysqli_error($conn);
            return false;
        }
  
        $answermodel = new AnswerModel();
        $result = $answermodel->queryAddAnswers($qId, $ansList, $correct);
        if (!$result) {
            return false;
        }
        return true;
    }
=======
    function test ($category, $level) {
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
                    q.q_level = $level AND q.q_category = $category";
        $data =array();
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

>>>>>>> upstream/main
}
