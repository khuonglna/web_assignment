
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "views/test.php"
var asynchronous = true;
var userType = "admin";
ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        // alert(this.responseText);
        userType = this.responseText;
        switch (userType) {
            case "guest":
                var para = document.createElement("a");
                var node = document.createTextNode("Exam");
                para.appendChild(node);
                para.href = "#content"
                break;
            case "staff":
                var para = document.createElement("a");
                var node = document.createTextNode("Manage");
                para.appendChild(node);
                para.href = "#content"
                break;
            case 3:
                // code block
                break;
            default:
                var para = document.createElement("a");
                var node = document.createTextNode("Test");
                para.appendChild(node);
                para.href = "#content"
        }
        var element = document.getElementById("nav_menu");
        var child = document.getElementById("info_navtab");
        element.insertBefore(para, child);;
    }
}


