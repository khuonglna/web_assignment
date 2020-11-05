<?php include "php/component/test/test_process.php"; ?>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: orange;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
  display: none;
}

/* Clear floats after the tab */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>

<div class="container content">
    <h1 id="category"> Category</h1>
    <h2 id="difficulty"> Difficulty</h2>
    <div class="container">
        <div>
            <p>Question</p>
            <?php
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $nation = '"' . $row["c_name"] . '"';
                    $choice = '"choice' . $row["c_name"] . '"';
                    $Elementary = '"Elementary"';
                    $Intermediate = '"Intermediate"';
                    $Native = '"Native"';
                    echo "
                          <div class='tab'>
                            <button id=" . $nation . " class='tablinks' onmouseover='openC(event, " . $nation . ", " . $choice . ")'>" . $row["c_name"] . "</button>
                            
                            <div id=" . $choice . " style='display: none;' onmouseleave='closeC(event, " . $nation . ", " . $choice . ")'>
                            <button type='button' onclick='sF(event, " . $nation . ", " . $Elementary . ")' class='tablinks' onmouseover='openCity(event)' onmouseleave='closeCity(event)' style='display: block;'>Elementary</button>
                            <button type='button' onclick='sF(event, " . $nation . ", " . $Intermediate . ")' class='tablinks' onmouseover='openCity(event)' onmouseleave='closeCity(event)' style='display: block;'>Intermediate</button>
                            <button type='button' onclick='sF(event, " . $nation . ", " . $Native . ")' class='tablinks' onmouseover='openCity(event)' onmouseleave='closeCity(event)' style='display: block;'>Native</button>
                            </div>
                          </div> ";
                  }
                } else {
                  echo "0 results";
                }
            ?>
            
        </div>
    </div>
    
    
</div>

<div class="clearfix"></div>

<script>
function openCity(evt) {
  evt.currentTarget.className += " active";
}
</script>

<script>
function closeCity(evt, cityName) {
  var i, tablinks;
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
}
</script>

<script>
function openC(evt, nation, choice) {
  document.getElementById(choice).style.display = "block";
  document.getElementById(nation).style.display = "none";
}
</script>

<script>
function closeC(evt, nation, choice) {
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

    element1.value=category;
    element1.name="category";
    form.appendChild(element1);  

    element2.value=dif;
    element2.name="dif";
    form.appendChild(element2);

    document.body.appendChild(form);

    form.submit();
}
</script>