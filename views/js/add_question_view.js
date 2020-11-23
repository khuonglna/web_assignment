function setUp() {
	getCategory();
	onEnterEvent();
}

function onEnterEvent() {
	var ques = document.getElementById("question");
	var ans1 = document.getElementById("answer1");
	var ans2 = document.getElementById("answer2");
	var ans3 = document.getElementById("answer3");

	ques.addEventListener("keyup", function (event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("btn").click();
		}
	});
	ans1.addEventListener("keyup", function (event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("btn").click();
		}
	});
	ans2.addEventListener("keyup", function (event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("btn").click();
		}
	});
	ans3.addEventListener("keyup", function (event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("btn").click();
		}
	});
}

function openForm() {
	closeMissingError();
	closeAddSuccess();
	closeAddError();
	var cate = document.getElementById("category");
	var lvl = document.getElementById("level");
	if (
		cate.options[cate.selectedIndex].value != "" &&
		lvl.options[lvl.selectedIndex].value != ""
	) {
		document.getElementById("questionForm").style.display = "block";
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

function submitForm() {
	var decision = confirm("ARE YOU SURE?");

	if (decision) {
		closeMissingError();
		closeAddSuccess();
		closeAddError();
		var ques = document.getElementById("question");
		var ans1 = document.getElementById("answer1");
		var ans2 = document.getElementById("answer2");
		var ans3 = document.getElementById("answer3");
		if (
			ques.value == "" ||
			ans1.value == "" ||
			ans2.value == "" ||
			ans3.value == ""
		) {
			document.getElementById("missing").style.display = "block";
		} else {
			addQuestion();
		}
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

function addQuestion() {
	var cate = document.getElementById("category").options[
		document.getElementById("category").selectedIndex
	].id;
	var lvl = document.getElementById("level").value;
	var ques = document.getElementById("question").value;
	var ans1 = document.getElementById("answer1").value;
	var ans2 = document.getElementById("answer2").value;
	var ans3 = document.getElementById("answer3").value;
	var crt = document.getElementById("correct1").checked
		? "1"
		: document.getElementById("correct2").checked
		? "2"
		: document.getElementById("correct3").checked
		? "3"
		: "";

	var dataStr =
		"&category=" +
		cate +
		"&level=" +
		lvl +
		"&question=" +
		ques +
		"&answer1=" +
		ans1 +
		"&answer2=" +
		ans2 +
		"&answer3=" +
		ans3 +
		"&correct=" +
		crt;

	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_ptj.php?function=addQuestion";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			// console.log(result);
			if (result == true) {
				document.getElementById("questionForm").style.display = "none";
				document.getElementById("addForm").reset();
				document.getElementById("success").style.display = "block";
			} else {
				document.getElementById("error").style.display = "block";
			}
		}
	};
	ajax.open(method, url + dataStr, asynchronous);
	ajax.send();
}

function getCategory() {
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/manage_exam_ptj.php?function=getCategory";
	var asynchronous = true;

	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.responseText;
			var cateList = JSON.parse(data);
			addCategory(cateList);
		}
	};
	ajax.open(method, url, asynchronous);
	ajax.send();
}
