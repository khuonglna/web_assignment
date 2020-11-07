<?php 

	require_once('models/user_model.php');
    class UserController
	{
        private function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

		public function getUser() {
			$username = isset($_POST['name'])? $_POST['name']: '' ;
			$password = md5(isset($_POST['pass'])? $_POST['pass']: '');
			if ($password != '' && $username != '' ) {
				$usermodel = new UserModel();
                $user = $usermodel->login($username , $password);
                if ($user) {
					require_once('views/login_view.php');
					$_SESSION["username"] = $user["username"];
					$_SESSION["role"] =$user["role"];
					$_SESSION["test"] = 'hong phai khuong';
					echo $_SESSION["username"];
					echo $_SESSION["role"];
                } else {
					session_unset();
					require_once('views/login_view.php');
					echo '<script language="javascript">';
					echo 'alert("failed")';
					echo '</script>';
                }
			} else {
				// When pressed login again will remove session
				session_unset();
				require_once('views/login_view.php');
			}
		}
	} 
?>

<script>
    
</script>