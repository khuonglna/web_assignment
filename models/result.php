<?php
require_once('../models/db_model.php');
class ResultModel extends DbModel 
{
    public function getUserResult($username)
    {
        if ($username == ''){
            return;
        }
        $conn = $this->connect();
        $sql = "SELECT username, c_name, s_level, s_score, s_date
                FROM submission JOIN category
                ON s_category = c_id
                WHERE username = '$username' 
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getLevelResult($level)
    {
        if ($level == ''){
            return;
        }
        $conn = $this->connect();
        $sql = "SELECT *
                FROM submission
                WHERE s_level = '$level'
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getCategoryResult($category)
    {
        if ($category == ''){
            return;
        }
        $conn = $this->connect();
        $sql = "SELECT *
                FROM submission
                WHERE s_category = '$category'
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getResultGroupByUser()
    {
        $conn = $this->connect();
        $sql = "SELECT username, s_level, s_score
                FROM submission
                ORDER BY username
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }
}