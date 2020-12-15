function sign_up() {
	username = document.getElementById("name").value;
	password = document.getElementById("pass").value;
	cookie = document.getElementById("cookie");
	var url = "";
	if (cookie.checked) {
		var url = "controllers/signup_controller.php?do=signup&cookie=1";
	} else {
		var url = "controllers/signup_controller.php?do=signup&cookie=0";
	}
	var userInfo = "&usr=" + username + "&pwd=" + password;
	var ajax = new XMLHttpRequest();
	ajax.open("POST", url + userInfo, true);
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			console.log(response);
			if (response == 0) {
				window.location.replace("index.php?page=home");
			}
			if (response == 1) {
				document.getElementById("notification").textContent =
					"Registered username";
			}
			if (response == 2) {
				document.getElementById("notification").textContent =
					"Please input username and password";
			}
			if (response ==3){
				document.getElementById("passwordRule").style.display = 'inline';
			}
		}
	};
}
