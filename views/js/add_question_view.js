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
    document.getElementById("success").style.display = "block";
    document.getElementById("addForm").submit();
  }
}