var ajax = new XMLHttpRequest();
var method = "GET";
var url = "controllers/category_ptj.php";
var asynchronous = true;
ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		// var data = JSON.parse(this.responseText);
		alert(this.responseText);
	}
};

function activeDifficult(evt) {
	evt.currentTarget.className += " active";
}

function deactiveDifficult(evt) {
	var i, tablinks;
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
  		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
}

function openDifficult(ele) {
	var id = ele.id;
	document.getElementById(id.concat('choice')).style.display = "block";
	document.getElementById(id).style.display = "none";
}

function closeDifficult(ele) {
	var id = ele.id;
	document.getElementById(id).style.display = "none";
	document.getElementById(id.substr(0, id.length-6)).style.display = "block";
}

function sF(ele) {
	//alert(ele.id);
	var category = ele.parentElement.id.substr(0, ele.parentElement.id.length-6);
	var dif = ele.id;
	var form = document.createElement("form");
	var element1 = document.createElement("input");
	var element2 = document.createElement("input");

	form.method = "POST";
	form.action = "hover.php";

	element1.value = category;
	element1.name = "category";
	form.appendChild(element1);

	element2.value = dif;
	element2.name = "dif";
	form.appendChild(element2);

	document.body.appendChild(form);

	form.submit();
	form.parentNode.removeChild(form);
}

function showCategory(str) {
	  var xhttp;  
	  if (str == "") {
	    document.getElementById("txtHint").innerHTML = "";
	    return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("txtHint").innerHTML = this.responseText;
	    }
	  };
	  xhttp.open("GET", "getCategory.php?q="+str, true);
	  xhttp.send();
}

function createCategory(Name) {
    var container    = document.createElement("div");
    var temp    	 = document.createElement("div");
    var category     = document.createElement("button");
    var choice       = document.createElement("div");
    var Elementary   = document.createElement("button");
    var Intermediate = document.createElement("button");
    var Native       = document.createElement("button");

    category.setAttribute("id", Name);
    category.setAttribute("onmouseover", "openDifficult(this)");
    category.innerHTML += Name;

    choice.setAttribute("id", Name.concat('choice'));
    choice.setAttribute("style", "display: none;");
    choice.setAttribute("onmouseleave", "closeDifficult(this)");

    Elementary.setAttribute("id", 'Elementary');
    Elementary.setAttribute("onmouseover", "activeDifficult(event)");
    Elementary.setAttribute("onmouseleave", "deactiveDifficult(event)");
    Elementary.setAttribute("onclick", "sF(this)");
    Elementary.setAttribute("style", "display: block;");
    Elementary.innerHTML += "Elementary";

    Intermediate.setAttribute("id", 'Intermediate');
    Intermediate.setAttribute("onmouseover", "activeDifficult(event)");
    Intermediate.setAttribute("onmouseleave", "deactiveDifficult(event)");
    Intermediate.setAttribute("onclick", "sF(this)");
    Intermediate.setAttribute("style", "display: block;");
    Intermediate.innerHTML += "Intermediate";

    Native.setAttribute("id", 'Native');
    Native.setAttribute("onmouseover", "activeDifficult(event)");
    Native.setAttribute("onmouseleave", "deactiveDifficult(event)");
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
    
    var element = document.getElementById("where");
    element.appendChild(temp);
    element.appendChild(container);
}