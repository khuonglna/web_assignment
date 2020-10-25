<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="margin:0;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <form class="form-inline" action="index.php?page=login">
                <!--REPLACE ACTION_PAGE.PHP-->
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" style="position:relative; height:50px">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a href="http://facebook.com" class="btn btn-primary btn-lg" role="button">
                        <i class="far fa-user-circle" style='font-size:20px;color:white; margin-right: 10px;'></i>
                        Sign Up
                    </a>

                    <a href="http://facebook.com" class="btn btn-primary btn-lg" role="button">
                        <i class="fas fa-sign-in-alt" style='font-size:20px;color:white; margin-right: 10px;' ></i>
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <header style="margin-top: 0px; margin-left:10%; margin-right:10%; text-align:left; display:flex;">
        <div class="container">
            <img width="150px" height="150px" src="https://d3av3o1z276gfa.cloudfront.net/images/place/E4VUSvgU7jj78OxlCe2aUr7AojaXmrf7.jpeg" alt="">
            <a style="float:top;">Banner</a>
        </div>
    </header>

    <nav style="margin-left:20%;margin-right:20%; margin-bottom:0px" class="navbar navbar-expand-sm bg-white navbar-white">
        <a class="navbar-brand" href="#">Home</a>
        <ul class="navbar-nav">
            <!-- Test -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle;" href="#" id="navbardrop" data-toggle="dropdown">Test</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
        </ul>
    </nav>