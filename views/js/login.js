function login() {
	username = document.getElementById('name').value;
	password = document.getElementById('pass').value;
	var userInfo = "&usr=" + username + "&pwd=" + password;
	var ajax = new XMLHttpRequest();
	var url = "controllers/login_controller.php?do=login";
	ajax.open("POST", url + userInfo, true);
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			console.log(response);
			if (response == 0) {
				window.location.replace('index.php?page=home');
			}
			else {
				document.getElementById('notification').textContent = 'Wrong username or password';
				var form = document.getElementById('login_form');
				form.reset();
			}
		}
	};
}