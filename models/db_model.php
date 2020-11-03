<?php 
	class DbModel 
	{
        private $severname = "localhost";
        private $password = "";
        private $username = "root";
        private $db = "web_assignment"; 
		public function connect(){
            $conn= mysqli_connect($this->severname, $this->username, $this->password, $this->db);
			if($conn === false){
                echo "Could not connect to database";
                die;
            }
			return $conn ;
		}
	}
?>