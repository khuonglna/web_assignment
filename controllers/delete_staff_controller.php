<?php 
	require_once('../models/user_model.php');

	$res = $_REQUEST['function'];

	if ($res == "getStaffList") {
		$usermodel = new UserModel();
		$data = $usermodel->queryStaffList();
		echo($data);
	}
	else {
		
		echo "here";
	}
	
?>
