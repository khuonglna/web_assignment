<?php
require_once('db_model.php');
require_once('question.php');
require_once('answer.php');


class Exam
{
    private $score;
    private $questionList;

    public function __construct(array $questionList)
    {
        $this->questionList = $questionList;
    }
}

class ExamModel extends DbModel
{
    public function queryCorrectAnswerList($questionList)
    {
        $questionList = implode("," ,$questionList);
        $answerList = array();
        $conn = $this->connect();
        $sql = "SELECT
                    q_id
                    , a_id
                FROM
                    ANSWER
                WHERE
                    q_id IN ($questionList) AND a_correct_flag = 1
                ";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $answerList[$row["q_id"]] = $row["a_id"];
        }
        return $answerList;
    }

    // public function queryAddUserSubmission($) {

    // }
}
