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
			$password = isset($_POST['pass'])? $_POST['pass']: '' ;
			if ($password != '' && $username != '' ) {
				$usermodel = new UserModel();
                $user = $usermodel->signup($username , $password);
                if ($user) {
					require_once('views/signup_view.php');
					echo "sign up success";
                } else {
					 require_once('views/signup_view.php');
					 echo "sign up failed";
                }
			} else {
				require_once('views/signup_view.php');
				echo "invalid";
			}
		}
	} 
?>

<script>
    
</script>