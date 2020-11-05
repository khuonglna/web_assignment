var ajax = new XMLHttpRequest();
var method = "GET";
var url = "views/exam_view.php"
var asynchronous = true;
var userType = "admin";
ajax.open(method, url, asynchronous);
ajax.send();