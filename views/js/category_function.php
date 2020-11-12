<script>
	function activeDifficult(evt) {
		evt.currentTarget.className += " active";
	}
</script>

<script>
	function deactiveDifficult(evt, cityName) {
		var i, tablinks;
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
	}
</script>

<script>
	function openDifficult(evt, nation, choice) {
		document.getElementById(choice).style.display = "block";
		document.getElementById(nation).style.display = "none";
	}
</script>

<script>
	function closeDifficult(evt, nation, choice) {
		document.getElementById(choice).style.display = "none";
		document.getElementById(nation).style.display = "block";
	}
</script>

<script>
	function sF(evt, category, dif) {
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
</script>