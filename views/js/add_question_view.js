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
    document.getElementById("error").style.display = "block";
  } else {
    document.getElementById("addForm").submit();
    getResult();
  }
}

function closeError() {
  document.getElementById("error").style.display = "none";
}

function getResult() {
  var ajax = new XMLHttpRequest();
  var method = "GET";
  var url = "controllers/test.php?function=addQuestion"
  var asynchronous = true;

  ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText);
          // var result = JSON.parse(this.responseText);
          // console.log(result);
          // document.getElementById("success").style.display = "block";
          // document.getElementById("demo").innerHTML = "hello";
      }
  }
  ajax.open(method, url, asynchronous);
  ajax.send();
}