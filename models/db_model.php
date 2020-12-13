<?php 
	class DbModel {
        private $servername = "localhost";
        private $username = "root";
        private $password = "12345678";     
        private $db = "web_assignment"; 
		public function connect(){
            $conn= mysqli_connect($this->servername, $this->username, $this->password, $this->db);
			if($conn === false){
                echo "Could not connect to database";
                die;
            }
			return $conn ;
		}
	}
?> 
