var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/manage_staff_controller.php?function=getStaffList";
var asynchronous = true;
var numStaff = 0;
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var result = this.responseText;
        // console.log(result);

        if (result.length > 0) {
            var data = JSON.parse(result);
            console.log(data);
            showStaff(data);
        } else {
            openGetError();
        }
    }
}
ajax.open(method, url, asynchronous);
ajax.send();

function showStaff(staffList) {
    for (index in staffList) {
        ///INSERT NEW ROW
        var nrow = document.createElement("tr");
        var idx = document.createElement("th");
        var username = document.createElement("td");
        var box = document.createElement("td");
        var idxVal = document.createTextNode(index);
        var userVal = document.createTextNode(staffList[index]);

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

function closeNothingNoti() {
	document.getElementById("nothing").style.display = "none";
}

function closeDelSuccess() {
	document.getElementById("success").style.display = "none";
}

function closeDelError() {
	document.getElementById("error").style.display = "none";
}

function closeGetError() {
	document.getElementById("get").style.display = "none";
}

function openNothingNoti() {
	document.getElementById("nothing").style.display = "block";
}

function openDelSuccess() {
	document.getElementById("success").style.display = "block";
}

function openDelError() {
	document.getElementById("error").style.display = "block";
}

function openGetError() {
	document.getElementById("get").style.display = "block";
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
            openNothingNoti();
        } else {
            requestDelStaff(request);
        }
    }
}

function requestDelStaff(staffList) {
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/delete_staff_controller.php?function=deleteStaff";
    var asynchronous = true;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
            // alert(data);
            if (data == true) {
                openDelSuccess();
                // location.reload();
            } else {
                openDelError();
            }
        }
    }
    ajax.open(method, url + staffList, asynchronous);
    ajax.send();
    
}