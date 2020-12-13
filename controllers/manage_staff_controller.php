<?php 
	require_once('../models/user_model.php');
	$res = $_REQUEST['function'];

	if ($res == "getStaffList") {
		$usermodel = new UserModel();
		$data = $usermodel->queryStaffList();
		echo json_encode($data);
	} else if ($res == "addStaff") {
		$usermodel = new UserModel();
		$result = $usermodel->addStaff($_REQUEST['name'], $_REQUEST['pass']);
		echo $result;
	} else if ($res == "deleteStaff") {
		$usermodel = new UserModel();
		$result = $usermodel->deleteStaff($_REQUEST['staff']);

		echo $result;
	} else {
		echo false;
	}
