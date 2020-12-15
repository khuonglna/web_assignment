<?php
require_once('db_model.php');

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
                    username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return false;
        }
        mysqli_stmt_bind_param($stmt, "s", $username);
        // $res = mysqli_query($conn, $sql);
        if (!mysqli_stmt_execute($stmt)) {
            return false;
        }
        mysqli_stmt_bind_result($stmt, $name, $pass, $role);
        if (mysqli_stmt_fetch($stmt)) {
            return false;
        }

        $sql = "INSERT INTO 
                    USERS (username, password) 
                VALUES 
                    (? , ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return false;
        }
        if (!mysqli_stmt_execute($stmt)) {
            return false;
        }
        $password = md5($password);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        if (!mysqli_stmt_execute($stmt)) {
            return false;
        }
        return true;
    }

    public function login($username, $password)
    {
        // if ($username == '' || $password == '') {
        //     return false;
        // }
        // $conn = $this->connect();
        // $sql = "SELECT 
        //             *
        //         FROM
        //             USERS
        //         WHERE 
        //             `username` = ? AND `password` = ?";
        // $stmt = mysqli_prepare($conn, $sql);
        // if (!$stmt) {
        //     return false;
        // }
        // $password = md5($password);
        // mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        // if (!mysqli_stmt_execute($stmt)) {
        //     return false;
        // }
        // mysqli_stmt_bind_result($stmt, $name, $pass, $role);
        // // $stmt->bind_result($name, $pass, $role);
        // $result = array();
        // // echo "ba";
        // if (!$stmt->fetch()) {
        //     echo "hmm2";
        // }
        // // while (mysqli_stmt_fetch($stmt)) {
        //     echo "Hello" . $name . $role;
        //     $result = array("username" => $name, "role" => $role);
        // // }
        // // echo implode($result);
        // return $result;
        // return false;
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
        if (!mysqli_query($conn, $query)) {
            return false;
        }
        return true;
    }

    public function queryStaffList() {
        $staffList = array();
        $idx = 0;
        $conn = $this->connect();
        $sql = "SELECT 
                    *
                FROM 
                    USERS
                WHERE 
                    role = '2'
                ORDER BY
                    username";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                // $staffList= $staffList.'_'.$row["username"];
                $staffList[] = $row['username'];
            }
        }
        return $staffList;
    }

    public function deleteStaff($username)
    {   
        if ($username == ''){
            return false;
        }
        $conn = $this->connect();
        $sql = "DELETE
                FROM 
                    USERS 
                WHERE 
                    username='$username'";
        if (!mysqli_query($conn, $sql)) return false;
        return true;
    }
}
?>