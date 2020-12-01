var QUESTION_NUMBER = 10;
var ANSWER_NUMBER = 3;
var METHOD = "POST";
var ASYN = true;
var ELEMENTARY = 1;
var INTERMEDIATE = 2;
var NATIVE = 3;
function showExam(questionList) {
	var exam = document.getElementById("examForm");

	for (i = 0; i < QUESTION_NUMBER; i++) {
		var outerCtn = document.createElement("div");
		var questionCtn = document.createElement("div");
		var answerCtn = document.createElement("div");
		var pbreak = document.createElement("br");
		var questionNumber = document.createElement("span");
		var hidden = document.createElement("input");
		var questionElement = document.createElement("p");
		var questionText = document.createTextNode(questionList[i].q_text);
		questionNumber.classList.add("questionNumber");
		outerCtn.classList.add("container");
		questionCtn.classList.add("container");
		// answerCtn.classList.add("container");
		answerCtn.id = "answerCtn";
		questionNumber.textContent = i + 1;
		hidden.id = "hidden_q" + i;
		hidden.setAttribute("type", "hidden");
		hidden.setAttribute("value", questionList[i].q_id);
		questionElement.appendChild(questionText);
		questionElement.setAttribute(
			"style",
			"display: inline-block; padding-left: 10px"
		);
		questionCtn.appendChild(hidden);
		questionCtn.appendChild(questionNumber);
		questionCtn.appendChild(questionElement);
		for (j = 0; j < ANSWER_NUMBER; j++) {
			var customInpLbl = document.createElement("div");
			var pbreak = document.createElement("br");
			var answerInput = document.createElement("input");
			var answerLabel = document.createElement("label");
			var answerLabelText = document.createTextNode(
				questionList[i].ans[j].a_text
			);
			// answerLabel.setAttribute("style", "color: red");
			customInpLbl.classList.add("custom-control");
			customInpLbl.classList.add("custom-radio");
			// customInpLbl.classList.add("custom-control-inline");
			answerLabel.id = questionList[i].ans[j].a_id;
			answerLabel.classList.add("custom-control-label");
			answerLabel.setAttribute("for", "answer" + i + j);
			answerInput.setAttribute("type", "radio");
			answerInput.id = "answer" + i + j;
			answerInput.setAttribute("name", "a" + i);
			answerInput.setAttribute("class", "custom-control-input");
			answerInput.setAttribute("value", questionList[i].ans[j].a_id);
			// if (j%3 == 0) {
			// 	answerInput.checked = true;
			// }
			answerLabel.appendChild(answerLabelText);
			customInpLbl.appendChild(answerInput);
			customInpLbl.appendChild(answerLabel);
			answerCtn.appendChild(customInpLbl);
			// answerCtn.appendChild(pbreak);
		}
		outerCtn.appendChild(questionCtn);
		outerCtn.appendChild(answerCtn);
		exam.appendChild(outerCtn);
		exam.appendChild(pbreak);
	}
	document.getElementById("submitBtn").removeAttribute("style");
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
	var inputList = document.getElementsByClassName("custom-control-input");
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
	var answer = document.getElementsByClassName("custom-control-input");
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
	document
		.getElementById("score")
		.appendChild(document.createTextNode("Congratulation, you got " + result.score + "/100"));
	// document.getElementById("congratulation").removeAttribute("style");
	window.scrollTo({top: 0, behavior: 'smooth'});
}

function retry() {
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
				// console.log(data);
				// console.log(JSON.parse(data));
				result = JSON.parse(data);
				// console.log(result);
				// console.log(result.score);
				showResult(result);
			}
		};
		ajax.open(METHOD, url + submissionData, ASYN);
		ajax.send();
	}
}

function activeDifficult(evt) {
	evt.currentTarget.className += " active";
}

function deactiveDifficult() {
	var i, tablinks;
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
}

function openDifficult(ele) {
	var id = ele.id;
	document.getElementById(id.concat("choice")).style.display = "block";
	document.getElementById(id).style.display = "none";
}

function closeDifficult(ele) {
	var id = ele.id;
	document.getElementById(id).style.display = "none";
	document.getElementById(id.substr(0, id.length - 6)).style.display =
		"block";
}

function sF(ele) {
	//alert(ele.id);

	var category = ele.parentElement.id.substr(
		0,
		ele.parentElement.id.length - 6
	);
	var dif = ele.id.substr(0, 1);
	var categoryNode = document.getElementById(category);
	var categoryText = categoryNode.textContent;
	var levelNode = document.getElementById(dif);
	var levelText = levelNode.textContent;
	var categoryTextNode = document.createTextNode(categoryText);
	var levelTextNode = document.createTextNode(levelText);
	document.getElementById("examCategory").appendChild(categoryTextNode);
	document.getElementById("examLevel").appendChild(levelTextNode);
	var data = "&category=" + category + "&dif=" + dif;
	// console.log(data);
	var ajax = new XMLHttpRequest();
	var url = "controllers/question_ptj.php?do=getExam";
	document.getElementById("categorySelectionCtn").remove();
	document.getElementById("examForm").removeAttribute("style");
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			questionList = JSON.parse(data);
			showExam(questionList);
		}
	};
	ajax.open(METHOD, url + data, ASYN);
	ajax.send();
}

function showCategory() {
	url = "controllers/category_ptj.php";
	ajax = new XMLHttpRequest();
	ajax.open(METHOD, url, ASYN);
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			// console.log(data);
			data = JSON.parse(this.responseText);
			for (x of data) {
				createCategory(x.name, x.id + "category");
			}
		}
	};
}

function createCategory(name, id) {
	var container = document.createElement("div");
	var temp = document.createElement("div");
	var category = document.createElement("button");
	var choice = document.createElement("div");
	var Elementary = document.createElement("button");
	var Intermediate = document.createElement("button");
	var Native = document.createElement("button");
	var pbreak = document.createElement("br");

	category.setAttribute("id", id);
	category.setAttribute("onmouseover", "openDifficult(this)");
	category.innerHTML += name;

	choice.setAttribute("id", id.concat("choice"));
	choice.setAttribute("style", "display: none;");
	choice.setAttribute("onmouseleave", "closeDifficult(this)");

	Elementary.setAttribute("id", ELEMENTARY);
	Elementary.setAttribute("onmouseover", "activeDifficult(event)");
	Elementary.setAttribute("onmouseleave", "deactiveDifficult()");
	Elementary.setAttribute("onclick", "sF(this)");
	Elementary.setAttribute("style", "display: block;");
	Elementary.innerHTML += "Elementary";

	Intermediate.setAttribute("id", INTERMEDIATE);
	Intermediate.setAttribute("onmouseover", "activeDifficult(event)");
	Intermediate.setAttribute("onmouseleave", "deactiveDifficult()");
	Intermediate.setAttribute("onclick", "sF(this)");
	Intermediate.setAttribute("style", "display: block;");
	Intermediate.innerHTML += "Intermediate";

	Native.setAttribute("id", NATIVE);
	Native.setAttribute("onmouseover", "activeDifficult(event)");
	Native.setAttribute("onmouseleave", "deactiveDifficult()");
	Native.setAttribute("onclick", "sF(this)");
	Native.setAttribute("style", "display: block;");
	Native.innerHTML += "Native";

	container.classList.add("tab");
	container.classList.add("col-sm-3");
	temp.classList.add("col-sm-3");
	category.classList.add("tablinks");
	Elementary.classList.add("tablinks");
	Intermediate.classList.add("tablinks");
	Native.classList.add("tablinks");

	choice.appendChild(Elementary);
	choice.appendChild(Intermediate);
	choice.appendChild(Native);

	container.appendChild(category);
	container.appendChild(choice);
	container.appendChild(pbreak);
	var element = document.getElementById("where");
	element.appendChild(temp);
	element.appendChild(container);
}
