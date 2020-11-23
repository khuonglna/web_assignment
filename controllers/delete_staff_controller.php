<?php 
	require_once('../models/user_model.php');

	$res = $_REQUEST['function'];

	if ($res == "getStaffList") {
		$usermodel = new UserModel();
		$data = $usermodel->queryStaffList();
		echo($data);
	}
	else {
		
		$staffList = substr($res, stripos($res, '_') + 1);
		// echo ($staffList);
		while (strlen($staffList) > 0){
			$username = $staffList;
			if (strripos($staffList, '_')){
				$username = substr($staffList, strripos($staffList, '_') + 1);
				$staffList = substr($staffList, 0, strlen($staffList) - strlen($username) - 1);
			}
			else $staffList = '';

			$usermodel = new UserModel();
			if ($usermodel->deleteStaff($username)) 
				echo 'Delete staffs successfully';
			else echo 'Failed to delete staffs';
		}
	}
