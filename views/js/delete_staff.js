var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/delete_staff_controller.php?function=getStaffList";
var asynchronous = true;

ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = this.responseText;
        console.log(data);
        var idx = 
    }
    // else window.alert(1);
}
ajax.open(method, url, asynchronous);
ajax.send();