///Hover effect
// var ahome = document.getElementById("ahome");
// var aabout = document.getElementById("aabout");
// var aadd = document.getElementById("aadd");

// ahome.classList.remove("active");
// aabout.classList.remove("active");
// aadd.classList.remove("active");

// aadd.classList.add("active");
console.log(aadd);
var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/manage_staff_controller.php?";
var asynchronous = true;
// var numStaff = 0;

function showStaff(staffList) {
    // var index = 0;
    var table = document.getElementById("staffTable");
    for (var index in staffList) {
		var newRow1 = table.insertRow(-1);

		// Insert a cell in the row
		var id = newRow1.insertCell(0);
		id.appendChild(document.createTextNode(parseFloat(index) + 1));

        // Insert a cell in the row
        var col = newRow1.insertCell(1);

		// Insert a cell for staff name
        var name = newRow1.insertCell(2);
		var name_text = document.createElement("textarea");
		name_text.setAttribute("readOnly", "true");
		name_text.setAttribute("class", "form-control text-dark");
		name_text.setAttribute("aria-lable", "With textarea");
		name_text.setAttribute("style", "border: none; resize: none; box-shadow: none; background-color: white;");
		name_text.setAttribute("rows", "1");
		name_text.setAttribute("cols", "30");
		name_text.defaultValue = staffList[index];
		name.appendChild(name_text);


		// Insert a cell for selected button
        var del = newRow1.insertCell(3);
        del.setAttribute("id", staffList[index])
        var delButton = document.createElement("input");
        delButton.setAttribute("class", "form-check-input");
		delButton.setAttribute("type", "checkbox");
		delButton.setAttribute("id", "btn" + parseFloat(index));
		del.appendChild(delButton);
    }
    // console.log(index);
    // numStaff = index + 1;
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
        var table = document.getElementById("staffTable");
        var idx = 0;
        var del = false;
        // console.log(table.length);
        for (idx = table.rows.length - 1; idx >= 0; idx--) {
            var nstaff = document.getElementById("btn" + idx);
            if (nstaff.checked) { 
                del = true;
                var staff = nstaff.parentElement.getAttribute("id");
                var dataStr = "&staff=" + staff;
                nstaff.checked = "false";
                requestDelStaff(dataStr);
                table.deleteRow(idx);
            }
        }
        // console.log(request + " - ");
        if (del == false) {
            openNothingNoti();
        } else {
            resetStaffTable();
        }
    }
}

function resetStaffTable() {
    var table = document.getElementById("staffTable");
    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].cells[0].innerHTML = i + 1;
        table.rows[i].cells[3].children[0].id = "btn" + i;
    }
}

function getStaffList() {
    request = "function=getStaffList";
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = this.responseText;
            // console.log(result);
            if (result.length > 0) {
                var data = JSON.parse(result);
                console.log(data);
                // staffList = data;
                showStaff(data);
            } else {
                openGetError();
            }
        }
    }
    ajax.open(method, url + request, asynchronous);
    ajax.send();
}

function requestDelStaff(dataStr) {
    request = "function=deleteStaff" + dataStr;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            // console.log(data);
            // alert(data);
            if (data == true) {
                openDelSuccess();
                // location.reload();
            } else {
                openDelError();
                getStaffList();
            }
        }
    }
    ajax.open(method, url + request, asynchronous);
    ajax.send();
}