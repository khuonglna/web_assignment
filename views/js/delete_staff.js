var ajax = new XMLHttpRequest();
var method = "GET";
var url = "controllers/delete_staff_controller.php?function=getStaffList";
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
    
        
    }
}
