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
    document.getElementById("questionForm").style.display = "block";
    getQuestionList();
  } else {
    document.getElementById("questionForm").style.display = "none";
  }
}

function submitForm() {
  
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
          document.getElementById("success").style.display = "block";
          $data = this.responseText;
          alert($data);
          $questionList = JSON.parse($data);
          document.getElementById("demo").innerHTML = $questionList[0].q_id;
          // if (JSON.parse($result)) {
          //   document.getElementById("addForm").reset();
          //   document.getElementById("success").style.display = "block";
          // } else {
          //   document.getElementById("error").style.display = "block";
          // }
      }
  }
  ajax.open(method, url + dataStr, asynchronous);
  ajax.send();
}