<?php
session_start();
require_once('../models/user_model.php');
class UserController
{
	public function getUser()
	{
		$res = $_REQUEST['do'];
		if ($res == 'login') {
			$username = $_REQUEST['usr'];
			$password = md5($_REQUEST['pwd']);
		}
		$username = $_REQUEST['usr'];
		$password = md5($_REQUEST['pwd']);
		if ($password != '' && $username != '') {
			$usermodel = new UserModel();
			$user = $usermodel->login($username, $password);
			if ($user != null) {
				$_SESSION["username"] = $user["username"];
				$_SESSION["role"] = $user["role"];
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