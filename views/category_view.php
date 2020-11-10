<?php include "controllers/category_controller.php"; ?>
<div class="container content">
    <h1 id="category"> Category</h1>
    <div class="container">
      <script src="views/js/category_function.js"></script>
        <div class="row">
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
                          <div class='col-sm-3'>

                          </div>
                          <div class='tab col-sm-3'>
                            <button id=" . $nation . " class='tablinks' onmouseover='openDifficult(event, " . $nation . ", " . $choice . ")'>" . $row["c_name"] . "</button>
                            
                            <div id=" . $choice . " style='display: none;' onmouseleave='closeDifficult(event, " . $nation . ", " . $choice . ")'>
                            <button type='button' onclick='sF(event, " . $nation . ", " . $Elementary . ")' class='tablinks' onmouseover='activeDifficult(event)' onmouseleave='deactiveDifficult(event)' style='display: block;'>Elementary</button>
                            <button type='button' onclick='sF(event, " . $nation . ", " . $Intermediate . ")' class='tablinks' onmouseover='activeDifficult(event)' onmouseleave='deactiveDifficult(event)' style='display: block;'>Intermediate</button>
                            <button type='button' onclick='sF(event, " . $nation . ", " . $Native . ")' class='tablinks' onmouseover='activeDifficult(event)' onmouseleave='deactiveDifficult(event)' style='display: block;'>Native</button>
                            </div>
                          </div> 
                          ";
                  }
                } else {
                  echo "0 results";
                }
            ?>
            
        </div>
    </div>
    
    
</div>

<div class="clearfix"></div>
<!-- <?php
  include "views/js/category_function.php"
?> -->
