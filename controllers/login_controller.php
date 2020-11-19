<?php

require_once('models/user_model.php');
class UserController
{
	public function getUser()
	{
		$username = isset($_POST['name']) ? $_POST['name'] : '';
		$password = md5(isset($_POST['pass']) ? $_POST['pass'] : '');
		if ($password != '' && $username != '') {
			$usermodel = new UserModel();
			$user = $usermodel->login($username, $password);
			if ($user) {
				require_once('views/home.html');
				$_SESSION["username"] = $user["username"];
				$_SESSION["role"] = $user["role"];
			} else {
				require_once('views/login_view.html');
				echo '<script language="javascript">';
				echo 'alert("failed")';
				echo '</script>';
			}
		} else {
			// When pressed login again will remove session
			session_unset();
			require_once('views/login_view.html');
		}
	}
}
?>

<script>

</script>