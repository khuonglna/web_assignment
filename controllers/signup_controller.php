<?php
session_start();
define("DEFAULT_ROLE", 1);
require_once('../models/user_model.php');
class UserController
{
	public function getUser()
	{
		$res = $_REQUEST['do'];
		$username = '';
		$password = '';
		if ($res == 'signup') {
			$username = $_REQUEST['usr'];
			$username = str_replace(' ', '', $username);
			$password = $_REQUEST['pwd'];
		}
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			echo 3;
		}
		else {
			if ($password != '' && $username != '') {
				if ($_REQUEST['cookie'] == 1) {
					setcookie("user", $username, time() + 86400 * 30, "/");
				}
				$usermodel = new UserModel();
				$user = $usermodel->signup($username, $password);
				if ($user != null) {
					$_SESSION["username"] = $username;
					$_SESSION["role"] = DEFAULT_ROLE;
					echo 0;
				} else {
					echo 1;
				}
			} else {
				//require_once('views/signup_view.html');
				echo 2;
			}
		}
	}
}

$controller = new UserController();
$controller -> getUser();