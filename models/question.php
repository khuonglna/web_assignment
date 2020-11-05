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
}
