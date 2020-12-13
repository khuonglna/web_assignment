var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/delete_staff_controller.php?function=getStaffList";
var asynchronous = true;
var numStaff = 0;
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = this.responseText;
        var beginStr = 0;
        var endStr = 0;
        var user = "";
        var index = 1;
        data = data.substr(4, data.length - 1);
        console.log(data);
        while (data.length > 0) {
            numStaff = index;
            beginStr = 0;
            endStr = data.length;
            if (data.indexOf("_") > 0)
                endStr = data.indexOf("_");
            user = data.substr(beginStr, endStr);
            data = data.substr(endStr + 1, data.length - 1);
            ///INSERT NEW ROW
            var nrow = document.createElement("tr");
            var idx = document.createElement("th");
            var username = document.createElement("td");
            var box = document.createElement("td");
            var idxVal = document.createTextNode(index);
            var userVal = document.createTextNode(user);

            nrow.appendChild(idx);
            nrow.appendChild(username);
            nrow.appendChild(box);

            var fcheck = document.createElement("div");
            var lbel = document.createElement("label");
            var iput = document.createElement("input");

            idx.appendChild(idxVal);
            username.appendChild(userVal);
            username.id = "username" + index;

            box.appendChild(fcheck);
            fcheck.appendChild(lbel);
            lbel.appendChild(iput);

            idx.scope = "row";
            box.classList.add("p-0");
            fcheck.classList.add("form-check");
            lbel.classList.add("form-check-label");
            iput.type = "checkbox";
            iput.classList.add("form-check-input");
            iput.id = "staff" + index;

            var tble = document.getElementById("del_staff_table");
            tble.appendChild(nrow);
            index = index + 1;
        }

    }
}
ajax.open(method, url, asynchronous);
ajax.send();

function closeNothingNoti() {
	document.getElementById("nothing").style.display = "none";
}

function closeDelSuccess() {
	document.getElementById("success").style.display = "none";
}

function closeDelError() {
	document.getElementById("error").style.display = "none";
}

function confirmDeleteStaff() {
    var decision = confirm("ARE YOU SURE?");

	if (decision) {
		closeNothingNoti();
		closeDelSuccess();
        closeDelError();
        var idx = 0;
        var request = "";
        var nstaff;
        var usernameStaff;
        for (idx = 1; idx <= numStaff; idx++){
            nstaff = document.getElementById("staff" + idx);
            if (nstaff.checked){ 
                usernameStaff = document.getElementById("username" + idx);
                request = request + "_" + usernameStaff.textContent;
            }
        }

        console.log(request + " - ");

        if (request == "") {
            document.getElementById("nothing").style.display = "block";
        } else {
            requestDelStaff(request);
        }
    }
}

function requestDelStaff(staffList) {
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/delete_staff_controller.php?function=deleteStaffList";
    var asynchronous = true;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
            // alert(data);
            if (data == true) {
                document.getElementById("success").style.display = "block";
                // location.reload();
            } else {
                document.getElementById("error").style.display = "block";
            }
        }
    }
    ajax.open(method, url + staffList, asynchronous);
    ajax.send();
    
}