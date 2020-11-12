function onEnterEvent() {
  var ques = document.getElementById("question");
  var ans1 = document.getElementById("answer1");
  var ans2 = document.getElementById("answer2");
  var ans3 = document.getElementById("answer3");

  ques.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("btn").click();
    }
  });
  ans1.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("btn").click();
    }
  });
  ans2.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("btn").click();
    }
  });
  ans3.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("btn").click();
    }
  });
}

function openQuestionList() {
	closeMissingError();
	closeAddSuccess();
	closeAddError();
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

function closeMissingError() {
  document.getElementById("missing").style.display = "none";
}

function closeAddSuccess() {
  document.getElementById("success").style.display = "none";
}

function closeAddError() {
  document.getElementById("error").style.display = "none";
}

function submitForm() {
	deleteQuestions();
}

function showQuestionList(questionList) {
	var table = document.getElementById("questionTable");

	for (var index in questionList) {
		// Insert a row at the end of the table
		var newRow = table.insertRow(-1);
	
		// Insert a cell in the row 
		var id = newRow.insertCell(0);
		id.style.textAlign = "center";
		id.appendChild(document.createTextNode(parseFloat(index)+1));

		// Insert a cell in the row 
		var question = newRow.insertCell(1);
		question.appendChild(document.createTextNode(questionList[index].q_text));

		// Insert a cell in the row 
		var del = newRow.insertCell(2);
		del.setAttribute("id", questionList[index].q_id);
		del.style.textAlign = "center"; 
		/* create a radio button */
		var delButton = document.createElement("input");
		delButton.setAttribute("type", "checkbox");
		delButton.setAttribute("id", index);
		del.appendChild(delButton);
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
			//   alert(data);
			questionList = JSON.parse(data);
			showQuestionList(questionList);
		}
	}
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}

function deleteQuestions() {
	var cate = document.getElementById("category").value;
	var lvl = document.getElementById("level").value;

	var dataStr = '&category=' + cate + '&level=' + lvl + '&q_id='; 

	var questions = document.getElementById("questionTable");
	
	for (var i = questions.rows.length - 1; i >= 0; i--) {
		if (document.getElementById(i).checked == true) {
			dataStr = dataStr + '-' + questions.rows[i].cells[2].id;
		}
	}

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_test_controller.php?function=deleteQuestion";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			alert(result);
		}
	}
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}