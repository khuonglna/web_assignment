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
        // alert(this.responseText);
        var data = JSON.parse(this.responseText);
        if (!data) {
            state = LOGOUT;
            userType = 0;
            name = "";
        } else {
            state = LOGIN;
            userType = data.role;
            name = data.username;
        }
        toggleTopNavbar(state, name);
        switch (userType) {
            case "1":
                var para = document.createElement("a");
                var node = document.createTextNode("Exam");
                para.appendChild(node);
                para.href = "index.php?page=exam_view"
                break;
            case "2":
                var para = document.createElement("a");
                var node = document.createTextNode("Manage Exam");
                para.appendChild(node);
                para.href = "index.php?page=add_test"
                break;
            case "3":
                var para = document.createElement("a");
                var node = document.createTextNode("Manage Staff");
                para.appendChild(node);
                para.href = "#content"
                break;
            default:
                var para = document.createElement("a");
                var node = document.createTextNode("Exam");
                para.appendChild(node);
                para.href = "index.php?page=exam_view"
                break;
        }
        var element = document.getElementById("nav_menu");
        var child = document.getElementById("info_navtab");
        element.insertBefore(para, child);;
    }
}

function toggleTopNavbar(state, name) {
    var login = document.getElementById("login");
    var signup = document.getElementById("signup");
    var username = document.getElementById("username");
    var logout = document.getElementById("logout");
    if (state == LOGOUT) {
        login.removeAttribute("style");
        signup.removeAttribute("style");
        username.style.display = "none";
        logout.style.display = "none";
    } else {
        login.style.display = "none";
        signup.style.display = "none";
        username.removeAttribute("style");
        logout.removeAttribute("style");
        username.innerHTML = name;
    }
}
