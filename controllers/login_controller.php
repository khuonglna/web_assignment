<?php 
	require_once('models/user_model.php');
    class UserController
	{
		public function getUser() {
			$username = isset($_POST['name'])? $_POST['name']: '' ;
			$password = md5(isset($_POST['pass'])? $_POST['pass']: '');
			if ($password != '' && $username != '' ) {
				$usermodel = new UserModel();
                $user = $usermodel->login($username , $password);
                if ($user) {
					require_once('views/login_view.php');
					$_SESSION["role"] = mysqli_fetch_assoc($user)["role"];
					echo $_SESSION["role"];
                } else {
				 	require_once('views/login_view.php');
                }
			} else {
				require_once('views/login_view.php');
			}
		}
	} 
?>

<script>
    
</script>