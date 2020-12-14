var ajax = new XMLHttpRequest();
var method = "GET";
var url = "controllers/session_ptj.php?logout=0";
var asynchronous = true;
var userType;
var LOGOUT = 0;
var LOGIN = 1;
var state;
var name;
var role;
ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		console.log(this.responseText);
		console.log(window.location.hostname);
		var data = JSON.parse(this.responseText);
		if (!data.username) {
			if (getCookie("user") && getCookie("role")) {
				name = getCookie("user");
				userType = getCookie("role");
			} else {
				state = LOGOUT;
				userType = 0;
				name = "";
			}
		} else {
			state = LOGIN;
			userType = data.role;
			name = "Welcome, " + data.username + "!";
		}
		toggleTopNavbar(state, name);
		switch (userType) {
			case "1":
				var navitem = document.createElement("li");
				var para = document.createElement("a");
				var node = document.createTextNode("Exam");
				navitem.classList.add("nav-item");

				navitem.appendChild(para);
				navitem.classList.add("pl-4");
				// para.style.fontSize = "200%";
				para.appendChild(node);
				para.href = "index.php?page=exam_view";
				para.classList.add("nav-link");
				break;
			case "2":
				var navitem = document.createElement("li");
				var parent = document.createElement("a");
				var container = document.createElement("div");
				var insertNode = document.createElement("a");
				var deleteNode = document.createElement("a");
				var modifyNode = document.createElement("a");
				var insertText = document.createTextNode("Add Question");
				var deleteText = document.createTextNode("Delete Question");
				var modifyText = document.createTextNode("Modify Question");
				var nodeText = document.createTextNode("Manage Exam");
				insertNode.classList.add("dropdown-item");
				deleteNode.classList.add("dropdown-item");
				modifyNode.classList.add("dropdown-item");
				insertNode.href = "index.php?page=add_question";
				deleteNode.href = "index.php?page=delete_question";
				modifyNode.href = "index.php?page=modify_question";
				container.classList.add("dropdown-menu");
				parent.classList.add("nav-link");
				parent.classList.add("dropdown-toggle");
				navitem.classList.add("nav-item");
				navitem.classList.add("pl-4");
				navitem.classList.add("dropdown");
				// navitem.id = "aadd";
				parent.setAttribute("data-toggle", "dropdown");

				insertNode.appendChild(insertText);
				deleteNode.appendChild(deleteText);
				modifyNode.appendChild(modifyText);
				parent.appendChild(nodeText);
				container.appendChild(insertNode);
				container.appendChild(deleteNode);
				container.appendChild(modifyNode);
				navitem.appendChild(parent);
				navitem.appendChild(container);
				break;
			case "3":
				var navitem = document.createElement("li");
				var parent = document.createElement("a");
				var container = document.createElement("div");
				var insertNode = document.createElement("a");
				var deleteNode = document.createElement("a");
				var insertText = document.createTextNode("Insert Staff");
				var deleteText = document.createTextNode("Delete Staff");
				var nodeText = document.createTextNode("Manage Staff");
				insertNode.classList.add("dropdown-item");
				deleteNode.classList.add("dropdown-item");
				insertNode.href = "index.php?page=insert_staff";
				deleteNode.href = "index.php?page=delete_staff";
				container.classList.add("dropdown-menu");
				parent.classList.add("nav-link");
				parent.classList.add("dropdown-toggle");
				navitem.classList.add("nav-item");
				navitem.classList.add("pl-4");
				navitem.classList.add("dropdown");
				parent.setAttribute("data-toggle", "dropdown");
				// navitem.id = "aadd";
				insertNode.appendChild(insertText);
				deleteNode.appendChild(deleteText);
				parent.appendChild(nodeText);
				container.appendChild(insertNode);
				container.appendChild(deleteNode);
				navitem.appendChild(parent);
				navitem.appendChild(container);
				break;
			default:
				var navitem = document.createElement("li");
				var para = document.createElement("a");
				var node = document.createTextNode("Exam");
				navitem.classList.add("nav-item");
				// navitem.id = "aadd";
				navitem.classList.add("pl-4");
				navitem.appendChild(para);
				para.appendChild(node);
				para.href = "index.php?page=exam_view";
				para.classList.add("nav-link");
				break;
		}
		navitem.id = "aadd";
		var element = document.getElementById("nav_menu");
		element.insertBefore(navitem, element.childNodes[2]);

		// var ahome = document.getElementById("ahome");
		// var aabout = document.getElementById("aabout");
		// var aadd = document.getElementById("aadd");

		// ahome.classList.remove("active");
		// aabout.classList.remove("active");
		// aadd.classList.remove("active");

		// aadd.classList.add("active");
	}
};

function toggleTopNavbar(state, name) {
	var login = document.getElementById("login");
	var signup = document.getElementById("signup");
	var username = document.getElementById("username");
	var logout = document.getElementById("logout");
	var usershow = document.getElementById("useroption");
	var footer = document.getElementById("footer-profile");
	if (state == LOGOUT) {
		login.removeAttribute("style");
		signup.removeAttribute("style");
		footer.style.display = "none";
		username.style.display = "none";
		logout.style.display = "none";
		usershow.style.display = "none";
	} else {
		login.style.display = "none";
		signup.style.display = "none";
		footer.removeAttribute("style");
		username.removeAttribute("style");
		logout.removeAttribute("style");
		usershow.removeAttribute("style");
		username.innerHTML = name;
	}
}

function logout() {
	url = "controllers/session_ptj.php?logout=1";
	ajax.open(method, url, asynchronous);
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			if (this.responseText) {
				document.cookie = "user=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
				document.cookie = "role=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
				window.location.replace('index.php?page=home');
			}
		}
	}
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
	  var c = ca[i];
	  while (c.charAt(0) == ' ') {
		c = c.substring(1);
	  }
	  if (c.indexOf(name) == 0) {
		return c.substring(name.length, c.length);
	  }
	}
	return "";
  }