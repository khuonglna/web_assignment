var QUESTION_NUMBER = 10;
var ANSWER_NUMBER = 3;
var METHOD = "POST";
var ASYN = true;
function showExam(questionList) {
	var exam = document.getElementById("examForm");

	for (i = 0; i < QUESTION_NUMBER; i++) {
		// document.getElementById("submitBtn")
		var pbreak = document.createElement("br");
		exam.appendChild(pbreak);
		var hidden = document.createElement("input");
		var questionElement = document.createElement("p");
		var questionText = document.createTextNode(
			i + 1 + "." + questionList[i].q_text
		);
		hidden.id = "hidden_q" + i;
		hidden.setAttribute("type", "hidden");
		hidden.setAttribute("value", questionList[i].q_id);
		// questionElement.setAttribute("name", "q" + i);
		questionElement.appendChild(questionText);
		exam.appendChild(hidden);
		exam.appendChild(questionElement);
		for (j = 0; j < ANSWER_NUMBER; j++) {
			var answerInput = document.createElement("input");
			var answerLabel = document.createElement("label");
			var answerLabelText = document.createTextNode(
				questionList[i].ans[j].a_text
			);
			// answerLabel.setAttribute("style", "color: red");
			answerLabel.id = questionList[i].ans[j].a_id;
			answerInput.setAttribute("class", "form-check-input");
			answerInput.setAttribute("type", "radio");
			answerInput.setAttribute("name", "a" + i);
			answerInput.setAttribute("value", questionList[i].ans[j].a_id);
			answerLabel.appendChild(answerLabelText);
			exam.appendChild(answerInput);
			exam.appendChild(answerLabel);
			var pbreak = document.createElement("br");
			exam.appendChild(pbreak);
		}
	}
}

function getExamForm() {
	var ajax = new XMLHttpRequest();
	var url = "controllers/question_ptj.php?do=getExam";
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			// console.log(this.responseText);
			questionList = JSON.parse(data);
			showExam(questionList);
		}
	};
	ajax.open(METHOD, url, ASYN);
	ajax.send();
}

function checkAllRadio() {
	var counter = 0;
	var inputList = document.getElementsByClassName("form-check-input");
	for (i of inputList) {
		if (i.checked) {
			counter++;
		}
	}
	// console.log(counter);
	return counter;
}

function getSubmission() {
	var data = "";
	var answerList = new Array();
	var answer = document.getElementsByClassName("form-check-input");
	for (i of answer) {
		if (i.checked) {
			answerList.push(i.value);
		} else {
			i.disabled = true;
		}
	}
	// console.log(answerList);

	for (i = 0; i < QUESTION_NUMBER; i++) {
		data +=
			"&q" +
			i +
			"=" +
			document.getElementById("hidden_q" + i).value +
			"&a" +
			i +
			"=" +
			answerList[i];
	}

	submitBtn = document.getElementById("submitBtn");
	submitBtn.textContent = "Retry";
	submitBtn.setAttribute("onclick", "retry()");

	// console.log(data);
	return data;
}

function showResult(result) {
	for (i of result.green) {
		document.getElementById(i).setAttribute("style", "color: green");
	}
	for (i of result.red) {
		document.getElementById(i).setAttribute("style", "color: red");
	}
	document.getElementById("score").appendChild(document.createTextNode(result.score + "/100"));
}

function retry() {
	console.log("RETRY");
	location.reload();
}

function submitForm() {
	var ajax = new XMLHttpRequest();
	var checkSelecting = checkAllRadio();
	var decision;
	var url = "controllers/question_ptj.php?do=submitExam";
	if (checkSelecting < QUESTION_NUMBER) {
		alert(
			"YOU STILL HAVE " +
				(QUESTION_NUMBER - checkSelecting) +
				" QUESTION LEFT"
		);
	} else {
		decision = confirm("ARE YOU SURE?");
	}
	if (decision) {
		var submissionData = getSubmission();
		var data;
		var result;
		// console.log(submissionData);
		ajax.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				data = this.responseText;
				result = JSON.parse(data);
				// console.log(data);
				console.log(result);
				console.log(result.score);
				showResult(result);
			}
		};
		ajax.open(METHOD, url + submissionData, ASYN);
		ajax.send();
	}
}
