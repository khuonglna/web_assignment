<?php include "php/component/test/test_process.php"; ?>
<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="container content">
    <h1 id="category"> Category</h1>
    <h2 id="difficulty"> Difficulty</h2>
    <div class="container">
        <p>Question</p>
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
<?php
  include "category_function.php"
?>