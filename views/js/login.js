function login() {
	username = document.getElementById('name').value;
	password = document.getElementById('pass').value;
	cookie = document.getElementById('cookie');
	var url = "";
	var userInfo = "&usr=" + username + "&pwd=" + password;
	var ajax = new XMLHttpRequest();
	if (cookie.checked) {
		url = "controllers/login_controller.php?do=login&cookie=1";
	} else {
		url = "controllers/login_controller.php?do=login&cookie=0";
	}
	console.log(url);
	ajax.open("POST", url + userInfo, true);
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			console.log(response);
			if (response == 0) {
				window.location.replace('index.php?page=home');
			}
			if (response == 1) {
				document.getElementById('notification').textContent = 'Wrong username or password';
				var form = document.getElementById('login_form');
				form.reset();
			}
			if (response == 2) {
				document.getElementById('notification').textContent = 'Please input username and password';
				var form = document.getElementById('login_form');
				form.reset();
			}
		}
	};
}