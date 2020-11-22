<?php
require_once('db_model.php');

class User
{
    private $username;
    private $userId;
    private $role;
    private $result = array();
}

class UserModel extends DbModel
{
    public function signup($username, $password)
    {
        if ($username == '' || $password == '') {
            return false;
        }
        $conn = $this->connect();
        $sql = "SELECT 
                        *
                    FROM 
                        USERS 
                    WHERE 
                        username='$username'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            return false;
        }
        $query = "INSERT INTO 
                        USERS (username, password) 
                    VALUES 
                        ('$username','" . md5($password) . "')";
        mysqli_query($conn, $query);
        return true;
    }

    public function login($username, $password)
    {
        if ($username == '' || $password == '') {
            return false;
        }
        $conn = $this->connect();
        $sql = 'SELECT 
                        * 
                    FROM 
                        USERS
                    WHERE 
                        username = "' . $username . '" and password = "' . $password . '"';
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            return $row;
        } else {
            return null;
        }
    }

    public function addStaff($username, $password)
    {
        if ($username == '' || $password == '') {
            return false;
        }
        $conn = $this->connect();
        $sql = "SELECT 
                        *
                    FROM 
                        USERS 
                    WHERE 
                        username='$username'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            return false;
        }
        $query = "INSERT INTO 
                        USERS (username, password, role) 
                    VALUES 
                        ('$username','" . md5($password) . "','2')";
        mysqli_query($conn, $query);
        return true;
    }

    public function queryStaffList()
    {
        $staffList = array();
        $conn = $this->connect();
        $sql = "SELECT 
                        *
                    FROM 
                        USERS
                    WHERE 
                        role = '2'
                    ";
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
}
