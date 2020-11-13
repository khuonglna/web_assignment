function openQuestionList() {
	closeNothingNoti();
	closeDelSuccess();
	closeDelError();
	var cate = document.getElementById("category");
	var lvl = document.getElementById("level");
	if (cate.options[cate.selectedIndex].value != "" && lvl.options[lvl.selectedIndex].value != "") {
		clearQuestionList();
    	getQuestionList();
	} else {
		document.getElementById("questionForm").style.display = "none";
	}
}

function clearQuestionList() {
	document.getElementById("questionForm").style.display = "none";
	var questions = document.getElementById("questionTable");
	for (var i = questions.rows.length - 1; i >= 0; i--) {
		questions.deleteRow(i);
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

function submitForm() {
	deleteQuestions();
	clearQuestionList();
}

function resetDelForm() {
	document.getElementById("deleteForm").reset();
	clearQuestionList();
	document.getElementById("questionForm").style.display = "none";
}

function showQuestionList(questionList) {
	var table = document.getElementById("questionTable");

	for (var index in questionList) {
		// Insert a row at the end of the table
		var newRow1 = table.insertRow(-1);
	
		// Insert a cell in the row 
		var id = newRow1.insertCell(0);
		id.rowSpan = 3;
		id.style.textAlign = "center";
		id.appendChild(document.createTextNode(parseFloat(index)+1));

		// Insert a cell in the row 
		var question = newRow1.insertCell(1);
		question.rowSpan = 3;
		question.appendChild(document.createTextNode(questionList[index].q_text));

		// Insert a cell in the row 
		var ans = newRow1.insertCell(2);
		ans.appendChild(document.createTextNode(questionList[index].ans1));	

		// Insert a cell in the row 
		var del = newRow1.insertCell(3);
		del.rowSpan = 3;
		del.setAttribute("id", questionList[index].q_id);
		del.style.textAlign = "center"; 
		/* create a radio button */
		var delButton = document.createElement("input");
		delButton.setAttribute("type", "checkbox");
		delButton.setAttribute("id", index);
		del.appendChild(delButton);	

		// Insert a row at the end of the table
		var newRow2 = table.insertRow(-1);
		var ans = newRow2.insertCell(0);
		ans.appendChild(document.createTextNode(questionList[index].ans2));

		// Insert a row at the end of the table
		var newRow3 = table.insertRow(-1);
		var ans = newRow3.insertCell(0);
		ans.appendChild(document.createTextNode(questionList[index].ans3));
	}
	document.getElementById("questionForm").style.display = "block";
}

function getQuestionList() {
	var cate = document.getElementById("category").value;
	var lvl = document.getElementById("level").value;

	var dataStr = '&category=' + cate + '&level=' + lvl; 

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_test_controller.php?function=listQuestion";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			// alert(data);
			questionList = JSON.parse(data);
			showQuestionList(questionList);
		}
	}
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}

function deleteQuestions() {
	var dataStr = '&q_id='; 

	var questions = document.getElementById("questionTable");
	
	for (var i = questions.rows.length / 3 - 1; i >= 0; i--) {
		if (document.getElementById(i).checked == true) {
			dataStr = dataStr + questions.rows[3*i].cells[3].id + '-';
		}
	}

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_test_controller.php?function=deleteQuestion";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			// alert(result);
			if (JSON.parse(result == -1)) {
				resetDelForm();
				document.getElementById("nothing").style.display = "block";
			} else if (JSON.parse(result)) {
				resetDelForm();
				document.getElementById("success").style.display = "block";
			} else {
				document.getElementById("error").style.display = "block";
			}
		}
	}
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}