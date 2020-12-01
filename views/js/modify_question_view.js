function openQuestionList() {
	closeNothingNoti();
	closeDelSuccess();
	closeDelError();
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
function submitForm() {
	var decision = confirm("ARE YOU SURE?");

	if (decision) {
		closeNothingNoti();
		closeDelSuccess();
		closeDelError();
		var questions = document.getElementById("questionTable");
		var totalQuestions = questions.rows.length / 3;
		var changed = false;

		for (var i = totalQuestions - 1; i >= 0; i--) {
			// if question is modified
			if (
				questions.rows[3 * i].cells[1].firstChild.value !=
				questions.rows[3 * i].cells[1].firstChild.defaultValue
			) {
				changed = true;
				var newQuestion = questions.rows[3 * i].cells[1].firstChild.value;
				var questionId = questions.rows[3 * i].cells[1].firstChild.id;
				updateQuestion(questionId, newQuestion);
				questions.rows[
					3 * i
				].cells[1].firstChild.defaultValue = newQuestion;
			}

			// if answer is modified
			for (var j = 0; j < 3; j++) {
				var cell = j == 0 ? 2 : 0;
				if (
					questions.rows[3 * i + j].cells[cell].firstChild.value !=
					questions.rows[3 * i + j].cells[cell].firstChild.defaultValue
				) {
					changed = true;
					var newAnswer =
						questions.rows[3 * i + j].cells[cell].firstChild.value;
					var answerId =
						questions.rows[3 * i + j].cells[cell].firstChild.id;
					updateAnswer(answerId, newAnswer, 1);
					questions.rows[3 * i + j].cells[
						cell
					].firstChild.defaultValue = newAnswer;
				}
			}

			// if chosen correct answer is changed
			var optionName = questions.rows[3 * i].cells[3].firstChild.getAttribute(
				"name"
			);
			var option = document.getElementsByName(optionName);
			for (var j = 0; j < 3; j++) {
				var cell = j == 0 ? 2 : 0;
				var answerId = questions.rows[3 * i + j].cells[cell].firstChild.id;
				if (option[j].checked != option[j].defaultChecked) {
					changed = true;
					updateAnswer(answerId, option[j].checked, 0);
				}
			}
		}

		if (changed == false) {
			document.getElementById("nothing").style.display = "block";
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

		// Insert a cell for numbering question in the row
		var id = newRow1.insertCell(0);
		id.rowSpan = 3;
		id.style.textAlign = "center";
		id.setAttribute("id", "id" + index);
		id.appendChild(document.createTextNode(parseFloat(index) + 1));

		// Insert a cell for question text in the row
		var question = newRow1.insertCell(1);
		question.rowSpan = 3;
		var ques_text = document.createElement("textarea");
		ques_text.setAttribute("id", questionList[index].q_id);
		ques_text.setAttribute("class", "form-control text-dark");
		ques_text.setAttribute("aria-lable", "With textarea");
		ques_text.setAttribute("style", "border:none; resize:none; box-shadow:none;");
		ques_text.setAttribute("rows", "6");
		ques_text.setAttribute("cols", "30");
		ques_text.defaultValue = questionList[index].q_text;
		question.appendChild(ques_text);

		
		// Setup for the fisrt answer
		var ans = newRow1.insertCell(2);
		var ans1 = document.createElement("textarea");
		ans1.setAttribute("id", questionList[index].ans[0].a_id);
		ans1.setAttribute("class", "form-control text-dark");
		ans1.setAttribute("aria-lable", "With textarea");
		ans1.setAttribute("style", "border:none; resize:none; box-shadow:none;");
		ans1.setAttribute("rows", "1");
		ans1.setAttribute("cols", "15");
		ans1.defaultValue = questionList[index].ans[0].a_text;
		ans.appendChild(ans1);

		var correct = newRow1.insertCell(3);
		correct.style.textAlign = "center";
		/* create a radio button */
		var correctButton = document.createElement("input");
		correctButton.setAttribute("type", "radio");
		correctButton.setAttribute("name", "ans" + questionList[index].q_id);
		correctButton.setAttribute("value", "1");
		if (correctAns == 0) {
			correctButton.setAttribute("checked", "checked");
		}
		correct.appendChild(correctButton);


		// Setup for the second answer
		var newRow2 = table.insertRow(-1);
		var ans = newRow2.insertCell(0);
		var ans2 = document.createElement("textarea");
		ans2.setAttribute("value", questionList[index].ans[1].a_text);
		ans2.setAttribute("id", questionList[index].ans[1].a_id);
		ans2.setAttribute("class", "form-control text-dark");
		ans2.setAttribute("aria-lable", "With textarea");
		ans2.setAttribute("style", "border:none; resize:none; box-shadow:none;");
		ans2.setAttribute("rows", "1");
		ans2.setAttribute("cols", "15");
		ans2.defaultValue = questionList[index].ans[1].a_text;
		ans.appendChild(ans2);

		var correct = newRow2.insertCell(1);
		correct.style.textAlign = "center";
		/* create a radio button */
		var correctButton = document.createElement("input");
		correctButton.setAttribute("type", "radio");
		correctButton.setAttribute("name", "ans" + questionList[index].q_id);
		correctButton.setAttribute("value", "2");
		if (correctAns == 1) {
			correctButton.setAttribute("checked", "checked");
		}
		correct.appendChild(correctButton);


		// Setup for the third answer
		var newRow3 = table.insertRow(-1);
		var ans = newRow3.insertCell(0);
		var ans3 = document.createElement("textarea");
		ans3.setAttribute("value", questionList[index].ans[2].a_text);
		ans3.setAttribute("id", questionList[index].ans[2].a_id);
		ans3.setAttribute("class", "form-control text-dark");
		ans3.setAttribute("aria-lable", "With textarea");
		ans3.setAttribute("style", "border:none; resize:none; box-shadow:none;");
		ans3.setAttribute("rows", "1");
		ans3.setAttribute("cols", "15");
		ans3.defaultValue = questionList[index].ans[2].a_text;
		ans.appendChild(ans3);

		var correct = newRow3.insertCell(1);
		correct.style.textAlign = "center";
		/* create a radio button */
		var correctButton = document.createElement("input");
		correctButton.setAttribute("type", "radio");
		correctButton.setAttribute("name", "ans" + questionList[index].q_id);
		correctButton.setAttribute("value", "3");
		if (correctAns == 2) {
			correctButton.setAttribute("checked", "checked");
		}
		correct.appendChild(correctButton);
	}
	document.getElementById("questionForm").style.display = "block";
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
			var cateList = JSON.parse(data);
			// console.log(result);
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
function updateQuestion(questionId, newQuestion) {
	var dataStr = "&q_id=" + questionId + "&q_text=" + newQuestion;

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_ptj.php?function=updateQuestionText";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			// console.log(result);
			if (result) {
				document.getElementById("success").style.display = "block";
			} else {
				document.getElementById("error").style.display = "block";
			}
		}
	};
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}

//*******************************************************************************************//
function updateAnswer(answerId, data, option) {
	if (option == 0) {
		data = data == true ? 1 : 0;
		var dataStr = "&a_id=" + answerId + "&correct=" + data;

		var ajax = new XMLHttpRequest();
		var method = "POST";
		var url = "controllers/manage_exam_ptj.php?function=updateAnswerCorrect";
		var asynchronous = true;

		ajax.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var result = this.responseText;
				// console.log(result);
				if (result == true) {
					document.getElementById("success").style.display = "block";
				} else {
					document.getElementById("error").style.display = "block";
				}
			}
		};
		ajax.open(method, url + dataStr, asynchronous);
		ajax.send();
	} else if (option == 1) {
		var dataStr = "&a_id=" + answerId + "&a_text=" + data;

		var ajax = new XMLHttpRequest();
		var method = "POST";
		var url = "controllers/manage_exam_ptj.php?function=updateAnswerText";
		var asynchronous = true;

		ajax.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var result = this.responseText;
				// console.log(result);
				if (result == true) {
					document.getElementById("success").style.display = "block";
				} else {
					document.getElementById("error").style.display = "block";
				}
			}
		};
		ajax.open(method, url + dataStr, asynchronous);
		ajax.send();
	}
}
