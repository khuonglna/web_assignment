<?php
require_once('models/user_model.php');
class StaffController
{
	public function insertStaff()
	{
		$username = isset($_POST['staffname']) ? $_POST['staffname'] : '';
		$password = isset($_POST['staffpass']) ? $_POST['staffpass'] : '';
		if ($password != '' && $username != '') {
			$usermodel = new UserModel();
			$user = $usermodel->addStaff($username, $password);
			if ($user) {
				require_once('views/delete_staff_view.php');
				echo "Delete staff success";
			} else {
				require_once('views/delete_staff_view.php');
				echo "delete staff failed";
			}
		} else {
			require_once('views/delete_staff_view.php');
			// echo "invalid";
		}
	}
}
?>

<script>

</script>