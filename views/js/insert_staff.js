var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/manage_staff_controller.php?function=addStaff";
var asynchronous = true;


function setUp() {
	onEnterEvent();
}

function onEnterEvent() {
	var name = document.getElementById("staffname");
	var pass = document.getElementById("staffpass");

	name.addEventListener("keyup", function (event) {
        closeNothingNoti();
        closeAddSuccess();
        closeAddError();
		// if (event.keyCode === 13) {
		// 	event.preventDefault();
		// 	document.getElementById("btn").click();
		// }
	});
	pass.addEventListener("keyup", function (event) {
        closeNothingNoti();
        closeAddSuccess();
        closeAddError();
		// if (event.keyCode === 13) {
		// 	event.preventDefault();
		// 	document.getElementById("btn").click();
		// }
	});
}

function closeNothingNoti() {
    document.getElementById("nothing").style.display = "none";
}

function closeAddSuccess() {
    document.getElementById("success").style.display = "none";
}

function closeAddError() {
    document.getElementById("error").style.display = "none";
}

function openNothingNoti() {
    document.getElementById("nothing").style.display = "block";
}

function openAddSuccess() {
    document.getElementById("success").style.display = "block";
}

function openAddError() {
    document.getElementById("error").style.display = "block";
}



function submitForm() {
    closeNothingNoti();
    closeAddSuccess();
    closeAddError();
    var name = document.getElementById("staffname");
    var pass = document.getElementById("staffpass");
    
    if (name.value != "" && pass.value != "") {
        dataStr = "&name=" + name.value + "&pass=" + pass.value;
        addStaff(dataStr);
    } else {
        openNothingNoti();
    }
}


function addStaff(dataStr) {
    console.log(dataStr);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = this.responseText;
            console.log(result);
            if (result == true) {
                openAddSuccess();
                document.getElementById("staffname").value = "";
                document.getElementById("staffpass").value = "";
            } else {
                openAddError();
            }
        }
    }
    ajax.open(method, url + dataStr, asynchronous);
    ajax.send();
}
