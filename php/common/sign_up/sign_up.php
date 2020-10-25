<!DOCTYPE html>
<?php include('sign_up_process.php')?>
<html lang="en">

<head>
    <title> My web page </title>
    <link rel="stylesheet" href="../css/webpage.css">
    <link href="../css/register_style.css" rel="stylesheet">
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
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
    
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-4 align-items-center">
            <div class="card">
            <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Sign up</h4>
                <hr>
                <form method="post" action="sign_up.php">
                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" class="form-control" placeholder="Username" type="text">
                </div> 
                </div> 
                <?php echo "<p class='text-danger text-center h6'>$nameErr</p>" ?>
                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="pass" class="form-control" placeholder="********" type="password">
                </div> 
                </div> 
                <?php echo "<p class='text-danger text-center h6'>$passErr</p>" ?>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Creat an account  </button>
                </div> 
                </form>
            </article>
            </div>
            </div>
        </div>
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