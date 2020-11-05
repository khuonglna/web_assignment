<?php 
    require_once('db_model.php');
    
    class User {
        private $username;
        private $userId;
        private $role;
        private $result = array();
    }

	class UserModel extends DbModel
	{
        public function signup($username , $password)
		{   
            if ($username == '' || $password == ''){
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
                        ('$username','".md5($password)."')";
            mysqli_query($conn, $query);
        }
        
        public function login($username , $password){
            if ($username == '' || $password == ''){
                return false;
            }
			$conn = $this->connect();
			$sql = 'SELECT 
                        * 
                    FROM 
                        USERS
                    WHERE 
                        username = "'.$username.'" and password = "'.$password.'"';
            $res = mysqli_query($conn, $sql);
			if (mysqli_num_rows($res) > 0) {
                return $res;
            }
            else {
                return null;
            }
        }
	}
?>