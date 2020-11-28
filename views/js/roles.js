var ajax = new XMLHttpRequest();
var method = "GET";
var url = "controllers/session_ptj.php";
var asynchronous = true;
var userType;
var LOGOUT = 0;
var LOGIN = 1;
var state;
var name;
ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		var data = JSON.parse(this.responseText);
		if (!data) {
			state = LOGOUT;
			userType = 0;
			name = "";
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
				navitem.classList.add("dropdown");
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
				navitem.classList.add("dropdown");
				parent.setAttribute("data-toggle", "dropdown");

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
				navitem.appendChild(para);
				para.appendChild(node);
				para.href = "index.php?page=exam_view";
				para.classList.add("nav-link");
				break;
		}
		var element = document.getElementById("nav_menu");
		element.insertBefore(navitem, element.childNodes[2]);
	}
};

function toggleTopNavbar(state, name) {
	var login = document.getElementById("login");
	var signup = document.getElementById("signup");
	var username = document.getElementById("username");
	var logout = document.getElementById("logout");
	var usershow = document.getElementById("useroption");
	if (state == LOGOUT) {
		login.removeAttribute("style");
		signup.removeAttribute("style");
		username.style.display = "none";
		logout.style.display = "none";
		usershow.style.display = "none";
	} else {
		login.style.display = "none";
		signup.style.display = "none";
		username.removeAttribute("style");
		logout.removeAttribute("style");
		usershow.removeAttribute("style");
		username.innerHTML = name;
	}
}
