var QUESTION_NUMBER = 10;
var ANSWER_NUMBER = 3;
function showExam(questionList) {
	var exam = document.getElementById("examForm");

	for (i = 0; i < QUESTION_NUMBER; i++) {
        // document.getElementById("submitBtn")
        var pbreak = document.createElement("br");
        exam.appendChild(pbreak);
		console.log(questionList[i].ans1);
		var questionElement = document.createElement("p");
		var questionText = document.createTextNode(
			i + 1 + "." + questionList[i].q_text
		);
		questionElement.id = questionList[i].q_id;
		questionElement.setAttribute("name", "question" + (i + 1));
		questionElement.appendChild(questionText);
		exam.appendChild(questionElement);
		for (j = 0; j < ANSWER_NUMBER; j++) {
			var answerInput = document.createElement("input");
			var answerLabel = document.createElement("label");
			var answerLabelText = document.createTextNode(
				questionList[i].ans[j].a_text
            );
            answerInput.id = questionList[i].ans[j].a_id;
			answerInput.setAttribute("class", "form-check-input");
			answerInput.setAttribute("type", "radio");
			answerInput.setAttribute("name", "ans" + (i + 1));
			answerInput.setAttribute("value", questionList[i].ans[j].a_id);
			answerLabel.appendChild(answerLabelText);
			exam.appendChild(answerInput);
            exam.appendChild(answerLabel);
            var pbreak = document.createElement("br");
            exam.appendChild(pbreak);
		}
	}
}

// function getExam() {
var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/question_ptj.php";
var asynchronous = true;

ajax.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		var data = this.responseText;
		console.log(data);
		questionList = JSON.parse(data);
		showExam(questionList);
	}
};
ajax.open(method, url, asynchronous);
ajax.send();
// }

function submitForm() {
    document.getE
}