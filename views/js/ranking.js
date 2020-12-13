function sortUser(resultList){
    //console.log(resultList)
    var tempName = resultList[0].username;
    var hardScore = 0;
    var mediumScore = 0;
    var easyScore = 0;
    var result = []
    for (i=0; i<resultList.length; i++){
		if (resultList[i].username == tempName){
            if (resultList[i].level == "Easy"){
                easyScore += parseInt(resultList[i].score);
            }
            else if (resultList[i].level == "Medium"){
                mediumScore += parseInt(resultList[i].score);
            }
            else {
                hardScore += parseInt(resultList[i].score);
            }
        }
        else {
            result.push({"username" :tempName,
                        "hardScore": hardScore, 
                        "mediumScore": mediumScore, 
                        "easyScore" : easyScore});
            tempName = resultList[i].username;
            easyScore = 0;
            mediumScore = 0;
            hardScore = 0;
            if (resultList[i].level == "Easy"){
                easyScore += parseInt(resultList[i].score);
            }
            else if (resultList[i].level == "Medium"){
                mediumScore += parseInt(resultList[i].score);
            }
            else {
                hardScore += parseInt(resultList[i].score);
            }
        }
    }
    result.push({"username" :tempName,
                "hardScore": hardScore, 
                "mediumScore": mediumScore, 
                "easyScore" : easyScore});
    return result.sort(function(a,b){return b.hardScore - a.hardScore});
}



function showRanking(resultList) {  // ALL-TIME
	if (resultList == undefined){
		document.getElementById('alltimeHeader').innerHTML = 'No data available';
	}
	else {
		// Header row
        var headTable = document.getElementById("headerResultTable");
        var newRow = headTable.insertRow(-1);
        var rankHeader = newRow.insertCell(0);
		rankHeader.appendChild(document.createTextNode('Rank'));
		var categoryHeader = newRow.insertCell(1);
		categoryHeader.appendChild(document.createTextNode('Username'));
		var levelHeader = newRow.insertCell(2);
		levelHeader.appendChild(document.createTextNode('Hard Level Score'));
		var scoreHeader = newRow.insertCell(3);
		scoreHeader.appendChild(document.createTextNode('Medium Level Score'));
		var timeHeader = newRow.insertCell(4);
		timeHeader.appendChild(document.createTextNode('Easy Level Score'));

        resultList = sortUser(resultList);
        console.log(resultList);
		var table = document.getElementById("rankingTable");
		for (i=0; i<resultList.length; i++){
			// Insert a row at the end of the table
            var newRow1 = table.insertRow(-1);
            
            var category = newRow1.insertCell(0);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(i+1));
			
			var category = newRow1.insertCell(1);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(resultList[i].username));
	
			var level = newRow1.insertCell(2);
			level.style.textAlign = "center";
			level.appendChild(document.createTextNode(resultList[i].hardScore));
	
			var score = newRow1.insertCell(3);
			score.style.textAlign = "center";
			score.appendChild(document.createTextNode(resultList[i].mediumScore));
			
			var time = newRow1.insertCell(4);
			time.style.textAlign = "center";
			time.appendChild(document.createTextNode(resultList[i].easyScore));
		}
	}
}

function showRankingLastMonth(resultList) {  // Last-month
    if (resultList == undefined){
		document.getElementById('monthHeader').innerHTML = 'No data available';
	}
	else {
		// Header row
        var headTable = document.getElementById("headerResultTable2");
        var newRow = headTable.insertRow(-1);
        var rankHeader = newRow.insertCell(0);
		rankHeader.appendChild(document.createTextNode('Rank'));
		var categoryHeader = newRow.insertCell(1);
		categoryHeader.appendChild(document.createTextNode('Username'));
		var levelHeader = newRow.insertCell(2);
		levelHeader.appendChild(document.createTextNode('Hard Level Score'));
		var scoreHeader = newRow.insertCell(3);
		scoreHeader.appendChild(document.createTextNode('Medium Level Score'));
		var timeHeader = newRow.insertCell(4);
		timeHeader.appendChild(document.createTextNode('Easy Level Score'));

        resultList = sortUser(resultList);
        console.log(resultList);
		var table = document.getElementById("rankingTable2");
		for (i=0; i<resultList.length; i++){
			// Insert a row at the end of the table
            var newRow1 = table.insertRow(-1);
            
            var category = newRow1.insertCell(0);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(i+1));
			
			var category = newRow1.insertCell(1);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(resultList[i].username));
	
			var level = newRow1.insertCell(2);
			level.style.textAlign = "center";
			level.appendChild(document.createTextNode(resultList[i].hardScore));
	
			var score = newRow1.insertCell(3);
			score.style.textAlign = "center";
			score.appendChild(document.createTextNode(resultList[i].mediumScore));
			
			var time = newRow1.insertCell(4);
			time.style.textAlign = "center";
			time.appendChild(document.createTextNode(resultList[i].easyScore));
		}
	}
}

function showRankingLastWeek(resultList) {  // Last-week
	console.log(resultList);
	if (resultList == undefined){
		document.getElementById('weekHeader').innerHTML = 'No data available';
	}
	else {
		// Header row
        var headTable = document.getElementById("headerResultTable3");
        var newRow = headTable.insertRow(-1);
        var rankHeader = newRow.insertCell(0);
		rankHeader.appendChild(document.createTextNode('Rank'));
		var categoryHeader = newRow.insertCell(1);
		categoryHeader.appendChild(document.createTextNode('Username'));
		var levelHeader = newRow.insertCell(2);
		levelHeader.appendChild(document.createTextNode('Hard Level Score'));
		var scoreHeader = newRow.insertCell(3);
		scoreHeader.appendChild(document.createTextNode('Medium Level Score'));
		var timeHeader = newRow.insertCell(4);
		timeHeader.appendChild(document.createTextNode('Easy Level Score'));

        resultList = sortUser(resultList);
        console.log(resultList);
		var table = document.getElementById("rankingTable3");
		for (i=0; i<resultList.length; i++){
			// Insert a row at the end of the table
            var newRow1 = table.insertRow(-1);
            
            var category = newRow1.insertCell(0);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(i+1));
			
			var category = newRow1.insertCell(1);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(resultList[i].username));
	
			var level = newRow1.insertCell(2);
			level.style.textAlign = "center";
			level.appendChild(document.createTextNode(resultList[i].hardScore));
	
			var score = newRow1.insertCell(3);
			score.style.textAlign = "center";
			score.appendChild(document.createTextNode(resultList[i].mediumScore));
			
			var time = newRow1.insertCell(4);
			time.style.textAlign = "center";
			time.appendChild(document.createTextNode(resultList[i].easyScore));
		}
	}
}

function showRankingLevel(resultList, level) {  // Level
    if (resultList == undefined){
		document.getElementById(level + 'Header').innerHTML = 'No data available';
	}
	else {
		// Header row
        var headTable = document.getElementById("headerResultTable_" + level);
        var newRow = headTable.insertRow(-1);
        var rankHeader = newRow.insertCell(0);
		rankHeader.appendChild(document.createTextNode('Rank'));
		var categoryHeader = newRow.insertCell(1);
		categoryHeader.appendChild(document.createTextNode('Username'));
		var levelHeader = newRow.insertCell(2);
		levelHeader.appendChild(document.createTextNode('Total Score'));

		var table = document.getElementById("rankingTable_"+ level);
		for (i=0; i<resultList.length; i++){
			// Insert a row at the end of the table
            var newRow1 = table.insertRow(-1);
            
            var category = newRow1.insertCell(0);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(i+1));
			
			var category = newRow1.insertCell(1);
			category.style.textAlign = "center";
			category.appendChild(document.createTextNode(resultList[i].username));
	
			var level = newRow1.insertCell(2);
			level.style.textAlign = "center";
			level.appendChild(document.createTextNode(resultList[i].score));
		}
	}
}

function changeFunc() {
	var selectBox = document.getElementById("option");
	var alltime = document.getElementById('alltime');
	alltime.style.display = 'none';
	var lastmonth = document.getElementById('lastmonth');
	lastmonth.style.display = 'none';
	var lastweek = document.getElementById('lastweek');
	lastweek.style.display = 'none';

	var hard = document.getElementById('hard');
	hard.style.display = 'none';
	var medium = document.getElementById('medium');
	medium.style.display = 'none';
	var easy = document.getElementById('easy');
	easy.style.display = 'none';

	var animal = document.getElementById('animal');
	animal.style.display = 'none';
	var family = document.getElementById('family');
	family.style.display = 'none';
	var tense = document.getElementById('tense');
	tense.style.display = 'none';
	var country = document.getElementById('country');
	country.style.display = 'none';
	var science = document.getElementById('science');
	science.style.display = 'none';

	var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	console.log(selectedValue);
	if (selectedValue == 'alltime'){
		alltime.style.display = 'inline';
	}
	if (selectedValue == 'lastmonth'){
		lastmonth.style.display = 'inline';
	}
	if (selectedValue == 'lastweek'){
		lastweek.style.display = 'inline';
	}

	if (selectedValue == 'hard'){
		hard.style.display = 'inline';
	}
	if (selectedValue == 'medium'){
		medium.style.display = 'inline';
	}
	if (selectedValue == 'easy'){
		easy.style.display = 'inline';
	}

	if (selectedValue == 'animal'){
		animal.style.display = 'inline';
	}
	if (selectedValue == 'family'){
		family.style.display = 'inline';
	}
	if (selectedValue == 'tense'){
		tense.style.display = 'inline';
	}if (selectedValue == 'country'){
		country.style.display = 'inline';
	}if (selectedValue == 'science'){
		science.style.display = 'inline';
	}
}

function getRanking() {
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "controllers/ranking_ptj.php";
	var asynchronous = true;
	ajax.open(method, url, asynchronous);
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
			console.log(data);
			var resultList = JSON.parse(data);
            showRanking(resultList['all_time']);
            showRankingLastMonth(resultList['last_month']);
            showRankingLastWeek(resultList['last_week']);

            showRankingLevel(resultList['hard'], 3)
            showRankingLevel(resultList['medium'], 2)
            showRankingLevel(resultList['easy'], 1)

            showRankingLevel(resultList['Family'], 'Family')
            showRankingLevel(resultList['Tense'], 'Tense')
            showRankingLevel(resultList['Animal'], 'Animal')
            showRankingLevel(resultList['Country'], 'Country')
            showRankingLevel(resultList['Science'], 'Science')
		}
	};


	///Hover effect
	var ahome = document.getElementById("ahome");
	var aabout = document.getElementById("aabout");
	var aadd = document.getElementById("aadd");

	ahome.classList.remove("active");
	aabout.classList.remove("active");
	aadd.classList.remove("active");

	ahome.classList.add("active");



}