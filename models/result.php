<?php
require_once('../models/db_model.php');
class ResultModel extends DbModel
{
    public function getUserResult($username)
    {
        if ($username == '') {
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

    public function getCategory()
    {
        $conn = $this->connect();
        $sql = "SELECT c_name
                FROM category
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getLevelResult($level)
    {
        if ($level == '') {
            return;
        }
        $conn = $this->connect();
        $sql = "SELECT
                    s.username,
                    SUM(s_score) AS total_score
                FROM
                    submission s
                LEFT JOIN users u ON
                    s.username = u.username AND u.role = 1
                WHERE
                    s_level = $level
                GROUP BY
                    username
                ORDER BY
                    SUM(s_score)
                DESC
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getCategoryResult($category)
    {
        if ($category == '') {
            return;
        }
        $conn = $this->connect();
        $sql = "SELECT
                    s.username,
                    SUM((s_level * s_score)) AS total_score
                FROM
                    submission s
                LEFT JOIN users u ON
                    s.username = u.username AND u.role = 1
                JOIN category ON c_id = s_category
                WHERE
                    c_name = '$category'
                GROUP BY
                    username
                ORDER BY
                    total_score
                DESC            
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getResultGroupByUser()
    {
        $conn = $this->connect();
        $sql = "SELECT s.username, s_level, s_score
                FROM submission s
                LEFT JOIN users u ON
                    s.username = u.username AND u.role = 1
                ORDER BY username
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getResultLastMonth()
    {
        $conn = $this->connect();
        $sql = "SELECT s.username, s_level, s_score
                FROM submission s
                LEFT JOIN users u ON
                    s.username = u.username AND u.role = 1
                WHERE YEAR(s_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) 
                    AND MONTH(s_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                ORDER BY username
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public function getResultLastWeek()
    {
        $conn = $this->connect();
        $sql = "SELECT s.username, s_level, s_score
                FROM submission s
                LEFT JOIN users u ON
                    s.username = u.username AND u.role = 1
                WHERE s_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
                    AND s_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
                ORDER BY username
        ";
        $res = mysqli_query($conn, $sql);
        return $res;
    }
}
