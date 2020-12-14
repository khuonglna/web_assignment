function openQuestionList() {
	closeNothingNoti();
	closeDelSuccess();
	closeDelError();
	closeNumWarning();
	var cate = document.getElementById("category");
	var lvl = document.getElementById("level");
	if (
		cate.options[cate.selectedIndex].value != "" &&
		lvl.options[lvl.selectedIndex].value != ""
	) {
		clearQuestionList();
		getQuestionList();
	} else {
		document.getElementById("questionForm").style.display = "none";
	}
}

//*******************************************************************************************//
function closeNothingNoti() {
	document.getElementById("nothing").style.display = "none";
}

//*******************************************************************************************//
function closeDelSuccess() {
	document.getElementById("success").style.display = "none";
}

//*******************************************************************************************//
function closeDelError() {
	document.getElementById("error").style.display = "none";
}

//*******************************************************************************************//
function closeNumWarning() {
	document.getElementById("warning").style.display = "none";
}

//*******************************************************************************************//
function addCategory(cateList) {
	var category = document.getElementById("category");

	for (var index in cateList) {
		var option = document.createElement("option");
		option.text = cateList[index].c_name;
		option.id = cateList[index].c_id;
		category.add(option);
	}
}

//*******************************************************************************************//
function clearQuestionList() {
	document.getElementById("questionForm").style.display = "none";
	var questions = document.getElementById("questionTable");
	for (var i = questions.rows.length - 1; i >= 0; i--) {
		questions.deleteRow(i);
	}
}

//*******************************************************************************************//
function submitForm() {
	var decision = confirm("ARE YOU SURE?");

	if (decision) {
		closeNothingNoti();
		closeDelSuccess();
		closeDelError();
		closeNumWarning();
		var dataStr = "&q_id=";

		var questions = document.getElementById("questionTable");
		var totalQuestions = questions.rows.length / 3;
		var questionChosen = 0;

		for (var i = totalQuestions - 1; i >= 0; i--) {
			var q_id = questions.rows[3*i].cells[3].getAttribute("id");
			// console.log(q_id + document.getElementById("btn" + q_id).checked);
			if (document.getElementById("btn" + q_id).checked == true) {
				dataStr = dataStr + q_id + '-';
				questionChosen = questionChosen + 1;
			}
		}

		if (totalQuestions - questionChosen < 10) {
			document.getElementById("warning").style.display = "block";
		} else {
			deleteQuestions(dataStr);
		}
	}
}

//*******************************************************************************************//
function showQuestionList(questionList) {
	var table = document.getElementById("questionTable");

	for (var index in questionList) {
		// Get correct answer
		var correctAns = parseFloat(questionList[index].correct);

		// Insert a row at the end of the table
		var newRow1 = table.insertRow(-1);

		// Insert a cell in the row
		var id = newRow1.insertCell(0);
		id.rowSpan = 3;
		id.style.textAlign = "center";
		id.appendChild(document.createTextNode(parseFloat(index) + 1));


		// Insert a cell fo question text 
		var question = newRow1.insertCell(1);
		question.rowSpan = 3;
		var ques_text = document.createElement("textarea");
		ques_text.setAttribute("readOnly", "true");
		ques_text.setAttribute("class", "form-control text-dark");
		ques_text.setAttribute("aria-lable", "With textarea");
		ques_text.setAttribute("style", "border: none; resize: none; box-shadow: none; background-color: white;");
		ques_text.setAttribute("rows", "6");
		ques_text.setAttribute("cols", "30");
		ques_text.defaultValue = questionList[index].q_text;
		question.appendChild(ques_text);


		// Insert a cell for first answer 
		var ans1 = newRow1.insertCell(2);
		var ans1_text = document.createElement("textarea");
		ans1_text.setAttribute("readOnly", "true");
		ans1_text.setAttribute("aria-lable", "With textarea");
		ans1_text.setAttribute("style", "border: none; resize: none; box-shadow: none; background-color: white;");
		ans1_text.setAttribute("rows", "1");
		ans1_text.setAttribute("cols", "15");
		ans1_text.classList.add("form-control");
		ans1_text.defaultValue = questionList[index].ans[0].a_text;
		if (correctAns == 0) {
			ans1_text.classList.add("font-weight-bold");
			ans1_text.classList.add("text-primary");
			// ans1.setAttribute("style", "color: blue;");
		} else {
			ans1_text.classList.add("text-dark");
		}
		ans1.appendChild(ans1_text);


		// Insert a cell for selected button
		var del = newRow1.insertCell(3);
		del.rowSpan = 3;
		del.setAttribute("id", questionList[index].q_id);
		del.setAttribute("style", "width: 100px; text-align: center;");
		/* create a checkbox */
		var delButton = document.createElement("input");
		delButton.setAttribute("type", "checkbox");
		delButton.setAttribute("id", "btn" + questionList[index].q_id);
		del.appendChild(delButton);


		// Insert a row for second answer
		var newRow2 = table.insertRow(-1);
		var ans2 = newRow2.insertCell(0);
		var ans2_text = document.createElement("textarea");
		ans2_text.setAttribute("readOnly", "true");
		ans2_text.setAttribute("aria-lable", "With textarea");
		ans2_text.setAttribute("style", "border: none; resize: none; box-shadow: none; background-color: white;");
		ans2_text.setAttribute("rows", "1");
		ans2_text.setAttribute("cols", "15");
		ans2_text.classList.add("form-control");
		ans2_text.defaultValue = questionList[index].ans[1].a_text;
		if (correctAns == 1) {
			ans2_text.classList.add("font-weight-bold");
			ans2_text.classList.add("text-primary");
			// ans1.setAttribute("style", "color: blue;");
		} else {
			ans2_text.classList.add("text-dark");
		}
		ans2.appendChild(ans2_text);


		// Insert a row for third answer
		var newRow3 = table.insertRow(-1);
		var ans3 = newRow3.insertCell(0);
		var ans3_text = document.createElement("textarea");
		ans3_text.setAttribute("readOnly", "true");
		ans3_text.setAttribute("aria-lable", "With textarea");
		ans3_text.setAttribute("style", "border:none; resize:none; box-shadow:none; background-color:white;");
		ans3_text.setAttribute("rows", "1");
		ans3_text.setAttribute("cols", "15");
		ans3_text.classList.add("form-control");
		ans3_text.defaultValue = questionList[index].ans[2].a_text;
		if (correctAns == 2) {
			ans3_text.classList.add("font-weight-bold");
			ans3_text.classList.add("text-primary");
			// ans1.setAttribute("style", "color: blue;");
		} else {
			ans3_text.classList.add("text-dark");
		}
		ans3.appendChild(ans3_text);
	}
	document.getElementById("questionForm").style.display = "block";
}

//*******************************************************************************************//
function resetDelForm() {
	removeDelRow();
	var questions = document.getElementById("questionTable");
	totalQuestions = questions.rows.length / 3;

	for (var i = totalQuestions - 1; i >= 0; i--) {
		var oldChild = questions.rows[3*i].cells[0].firstChild;
		var root = questions.rows[3*i].cells[0];
		root.replaceChild(document.createTextNode(i+1), oldChild);
	}
}

//*******************************************************************************************//
function removeDelRow () {
	var questions = document.getElementById("questionTable");
	var totalQuestions = questions.rows.length / 3;

	for (var i = totalQuestions - 1; i >= 0; i--) {
		var q_id = questions.rows[3*i].cells[3].getAttribute("id");
		if (document.getElementById("btn" + q_id).checked == true) {
			for (var j = 0; j < 3; j++) {
				questions.deleteRow(3*i);
			}
		}
	}
}

//*******************************************************************************************//
function getCategory() {
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_ptj.php?function=getCategory";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			// console.log(data);
			var cateList = JSON.parse(data);
			addCategory(cateList);
		}
	};
	ajax.open(method, url, asynchronous);
	ajax.send();
}

//*******************************************************************************************//
function getQuestionList() {
	var cate = document.getElementById("category").options[
		document.getElementById("category").selectedIndex
	].id;
	var lvl = document.getElementById("level").value;

	var dataStr = "&category=" + cate + "&level=" + lvl;

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_ptj.php?function=listQuestion";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			// console.log(data);
			questionList = JSON.parse(data);
			showQuestionList(questionList);
		}
	};
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}

//*******************************************************************************************//
function deleteQuestions(dataStr) {
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_ptj.php?function=deleteQuestion";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			// console.log(this.responseText);
			// console.log(dataStr);
			if (result == -1) {
				document.getElementById("nothing").style.display = "block";
			} else if (result) {
				resetDelForm();
				document.getElementById("success").style.display = "block";
			} else {
				document.getElementById("error").style.display = "block";
			}
		}
	};
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}
