<!DOCTYPE html>
<?php include('login_process.php')?>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/webpage.css">
    <link href="../css/register_style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div>
        <form method="post" action="log_in.php"> 
            <fieldset>
                <legend>Log In to BKOET</legend>
                <div class="front">
                    <label for="name">Username:</label>
                </div>
                <input type="text" name="name" class="textbox">
                <span> * <br> 
                    <?php echo "<div class='error'> $nameErr</div>"?>
                </span>
                <br><br>

                <div class="front">
                <label for="pass">Password:</label>
                </div>
                <input type="password" name="pass" class="textbox">
                <span> * <br> 
                    <?php echo "<div class='error'> $passErr</div>"?>
                </span>
                <br><br>
                
                <div class="submit">
                    <input type="submit" value="Log in">
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>