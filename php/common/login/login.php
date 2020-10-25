<!DOCTYPE html>
<?php include('log_in_process.php')?>
<html lang="en">

<head>
    <title> My web page </title>

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
    <!--
    <header>
        <div class="wrap-center">
            <p>This is a header</p>
        </div>
    </header>

    <nav>
        <a>
            <span>
                <div class="wrap-center">
                    <p>Home</p>
                </div>
            </span>
        </a>

        <button class="dropbtn">
            <p>Products <i class="fa fa-caret-down"></i> </p>
            <div class="dropdown-content">
                <a>Product 1</a>
                <a>Product 2</a>
                <a>Product 3</a>
            </div>
        </button>

        <a href="index.php?page=contact">
            <span>
                <div class="wrap-center">
                    <p>Contacts</p>
                </div>
            </span>
        </a>

        <a href="index.php?page=sign_up">
            <span>
                <div class="wrap-center">
                    <p>Sign up</p>
                </div>
            </span>
        </a>

        <a href="index.php?page=log_in">
            <span>
                <div class="wrap-center">
                    <p>Log in</p>
                </div>
            </span>
        </a>
    </nav>
-->
    
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
    
    <!--
    <footer>
        <div class="wrap-center">
            <p>This is a footer</p>
        </div>
    </footer>
-->
</body>

</html>