<?php
require_once('db_model.php');
require_once('exam.php');
require_once('answer.php');

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
    // function queryQuestionList($category, $level)
    // {
    //     $questionList = array();
    //     $conn = $this->connect();
    //     $sql = "SELECT 
    //                 Q_ID,
    //                 Q_TEXT
    //             FROM 
    //                 QUESTION
    //             WHERE 
    //                 Q_LEVEL = $category AND Q_CATEGORY = $level";
    //     $res = mysqli_query($conn, $sql);
    //     if (mysqli_num_rows($res) > 0) {
    //         while ($row = mysqli_fetch_assoc($res)) {
    //             $question = new Question();
    //             $answerModel = new AnswerModel();
    //             $temp = $row["Q_ID"];
    //             $temp2 = $answerModel->queryListAnswerByQuestionId($temp);
    //             $question->setAnswerList($temp2);
    //             $questionList[] = $question;
    //         }
    //     }
    //     return $questionList;
    // }

    function queryQuestionList ($category, $level) {
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
}
