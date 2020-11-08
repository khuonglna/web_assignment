var ajax = new XMLHttpRequest();
var method = "GET";
var url = "sandbox.php";
var asynchronous = true;

var userType = "admin";
ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        // alert(this.responseText);
        userType = this.responseText;
        switch (userType) {
            case 1:
                var para = document.createElement("a");
                var node = document.createTextNode("Exam");
                para.appendChild(node);
                para.href = "#content"
                break;
            case 2:
                var para = document.createElement("a");
                var node = document.createTextNode("Manage Exam");
                para.appendChild(node);
                para.href = "#content"
                break;
            case 3:
                var para = document.createElement("a");
                var node = document.createTextNode("Manage Staff");
                para.appendChild(node);
                para.href = "#content"
                break;
            default:
                var para = document.createElement("a");
                var node = document.createTextNode("Exam");
                para.appendChild(node);
                para.href = "#content"
        }
        var element = document.getElementById("nav_menu");
        var child = document.getElementById("info_navtab");
        element.insertBefore(para, child);;
    }
}


