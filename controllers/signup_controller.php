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
			$password = $_REQUEST['pwd'];
		}
		
		if ($password != '' && $username != '') {
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

$controller = new UserController();
$controller -> getUser();