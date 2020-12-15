<?php
session_start();
require_once('../models/user_model.php');
class UserController
{
	public function getUser()
	{
		$res = $_REQUEST['do'];
		$username = '';
		$password = '';
		if ($res == 'login') {
			$username = $_REQUEST['usr'];
			$username = str_replace(' ', '', $username);
			$password = md5($_REQUEST['pwd']);
		}
		
		if ($password != '' && $username != '') {
			
			$usermodel = new UserModel();
			$user = $usermodel->login($username, $password);
			if ($user != null) {
				$_SESSION["username"] = $user["username"];
				$_SESSION["role"] = $user["role"];
				if($_REQUEST['cookie'] == 1) {
					setcookie("user", $user["username"], time() + 86400 * 30, "/");
					setcookie("role", $user["role"], time() + 86400 * 30, "/");
				}
				echo 0;
			} else {
				echo 1;
			}
		} 
		else {
			// When pressed login again will remove session
			session_unset();
			//require_once('views/login_view.html');
			echo 2;
		}
	}
}
$controller = new UserController();
$controller -> getUser();