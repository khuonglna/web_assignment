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


function showRanking(resultList) {
    console.log(resultList);
	if (resultList.length > 0) {
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
	else {
		document.getElementById("noti").innerHTML = "No taken exams!";
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
			//console.log(data);
			var resultList = JSON.parse(data);
			showRanking(resultList);
		}
	};
}