function openQuestionList() {
	closeNothingNoti();
	closeDelSuccess();
	closeDelError();
	closeNumWarning();
	var cate = document.getElementById("category");
	var lvl = document.getElementById("level");
	if (cate.options[cate.selectedIndex].value != "" && lvl.options[lvl.selectedIndex].value != "") {
		clearQuestionList();
    	getQuestionList();
	} else {
		document.getElementById("questionForm").style.display = "none";
	}
}

function addCategory(cateList) {
	var category = document.getElementById("category");

	for (var index in cateList) {
		var option = document.createElement("option");
		option.text = cateList[index].c_name;
		option.id = cateList[index].c_id;
		category.add(option);
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

function closeNumWarning() {
	document.getElementById("warning").style.display = "none";
  }

function submitForm() {
	// deleteQuestions();
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
		id.setAttribute("id", "id" + index);
		id.appendChild(document.createTextNode(parseFloat(index)+1));

		// Insert a cell in the row 
		var question = newRow1.insertCell(1);
		question.rowSpan = 3;
		var ques_text = document.createElement("input");
		ques_text.defaultValue = questionList[index].q_text;
		ques_text.style.border = "none";
		ques_text.style.width = ques_text.value.length + "ch";
		question.appendChild(ques_text);

		// Insert a cell in the row 
		var ans = newRow1.insertCell(2);
		var ans1 = document.createElement("input");
		ans1.value = questionList[index].ans1;
		ans1.style.border = "none";
		ans1.style.width = ans1.value.length + "ch";
		ans.appendChild(ans1);	

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
		var ans2 = document.createElement("input");
		ans2.value = questionList[index].ans2;
		ans2.style.border = "none";
		ans2.style.width = ans2.value.length + "ch";
		ans.appendChild(ans2);

		// Insert a row at the end of the table
		var newRow3 = table.insertRow(-1);
		var ans = newRow3.insertCell(0);
		var ans3 = document.createElement("input");
		ans3.value = questionList[index].ans3;
		ans3.style.border = "none";
		ans3.style.width = ans3.value.length + "ch";
		ans.appendChild(ans3);
	}
	document.getElementById("questionForm").style.display = "block";
}

function checkNumber() {
	var questions = document.getElementById("questionTable");
	var totalQuestions = questions.rows.length / 3 - 1;
	var questionChosen = 0;

	for (var i = questions.rows.length / 3 - 1; i >= 0; i--) {
		if (document.getElementById(i).checked == true) {
			questionChosen = questionChosen + 1;
		}
	}
	return ((totalQuestions - questionChosen) >= 10 ? true : false);
}

function getCategory() {
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_controller.php?function=getCategory";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			var cateList = JSON.parse(data);
			// console.log(result);
			addCategory(cateList);
		}
	}
	ajax.open(method, url, asynchronous);
	ajax.send();
}

function getQuestionList() {
	var cate = document.getElementById("category").options[document.getElementById("category").selectedIndex].id;
	var lvl = document.getElementById("level").value;

	var dataStr = '&category=' + cate + '&level=' + lvl; 

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_controller.php?function=listQuestion";
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
	closeNothingNoti();
	closeDelSuccess();
	closeDelError();
	closeNumWarning();
	var dataStr = '&q_id='; 

	var questions = document.getElementById("questionTable");
	var totalQuestions = questions.rows.length / 3;
	var questionChosen = 0;
	
	for (var i = totalQuestions - 1; i >= 0; i--) {
		if (document.getElementById(i).checked == true) {
			dataStr = dataStr + questions.rows[3*i].cells[3].id + '-';
			questionChosen = questionChosen + 1;
		}
	}

	if (totalQuestions - questionChosen < 10) {
		document.getElementById("warning").style.display = "block";
	} else {
		var ajax = new XMLHttpRequest();
		var method = "POST";
		var url = "controllers/manage_test_controller.php?function=deleteQuestion";
		var asynchronous = true;

		ajax.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var result = this.responseText;
				console.log(this.responseText);
				// console.log(JSON.parse(this.responseText));
				// alert(dataStr);
				if (result == -1) {
					document.getElementById("nothing").style.display = "block";
				} else if (result) {
					resetDelForm();
					document.getElementById("success").style.display = "block";
				} else {
					resetDelForm();
					document.getElementById("error").style.display = "block";
				}
			}
		}
		ajax.open(method, url + dataStr, asynchronous);
		ajax.send();
	}
}