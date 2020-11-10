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

function openForm() {
  closeMissingError();
  closeAddSuccess();
  closeAddError();
  var cate = document.getElementById("category");
  var lvl = document.getElementById("level");
  if (cate.options[cate.selectedIndex].value != "" && lvl.options[lvl.selectedIndex].value != "") {
    document.getElementById("questionForm").style.display = "block";
  } else {
    document.getElementById("questionForm").style.display = "none";
  }
}

function submitForm() {
  var ques = document.getElementById("question");
  var ans1 = document.getElementById("answer1");
  var ans2 = document.getElementById("answer2");
  var ans3 = document.getElementById("answer3");
  if (ques.value == '' || ans1.value == '' || ans2.value == '' || ans3.value == '') {
    document.getElementById("missing").style.display = "block";
  } else {
    getResult();
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

function getResult() {
  document.getElementById("questionForm").style.display = "none";
  
  var cate = document.getElementById("category").value;
  var lvl = document.getElementById("level").value;
  var ques = document.getElementById("question").value;
  var ans1 = document.getElementById("answer1").value;
  var ans2 = document.getElementById("answer2").value;
  var ans3 = document.getElementById("answer3").value;
  var crt = document.getElementById("correct1").checked ? "1" : 
            document.getElementById("correct2").checked ? "2" : 
            document.getElementById("correct3").checked ? "3" : "";

  var dataStr = '&category=' + cate + '&level=' + lvl + '&question=' + ques + '&answer1=' + ans1 + '&answer2=' + ans2 + '&answer3=' + ans3 + '&correct=' + crt; 

  var ajax = new XMLHttpRequest();
  var method = "POST";
  var url = "controllers/test.php?function=addQuestion";
  var asynchronous = true;

  ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          $result = this.responseText;
          if (JSON.parse($result)) {
            document.getElementById("addForm").reset();
            document.getElementById("success").style.display = "block";
          } else {
            document.getElementById("error").style.display = "block";
          }
      }
  }
  ajax.open(method, url + dataStr, asynchronous);
  ajax.send();
}