<?php

define("DEFAULT_ROLE", 1);

require_once('models/user_model.php');
class UserController
{
	public function getUser()
	{
		$username = isset($_POST['name']) ? $_POST['name'] : '';
		$password = isset($_POST['pass']) ? $_POST['pass'] : '';
		if ($password != '' && $username != '') {
			$usermodel = new UserModel();
			$user = $usermodel->signup($username, $password);
			if ($user) {
				require_once('views/signup_view.html');
				$_SESSION["username"] = $username;
				$_SESSION["role"] = DEFAULT_ROLE;
				echo "sign up success";
			} else {
				require_once('views/signup_view.html');
				echo "sign up failed";
			}
		} else {
			require_once('views/signup_view.html');
			// echo "invalid";
		}
	}
}
