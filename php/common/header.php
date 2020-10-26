<!DOCTYPE html>
<html>

<head>
    <title>English Test Site</title>
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

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" style="position:relative; height:50px">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a href="index.php?page=sign_up" class="btn btn-primary btn-lg" role="button">
                        <i class="far fa-user-circle" style='font-size:20px;color:white; margin-right: 10px;'></i>
                        Sign Up
                    </a>

                    <a href="index.php?page=login" class="btn btn-primary btn-lg" role="button">
                        <i class="fas fa-sign-in-alt" style='font-size:20px;color:white; margin-right: 10px;'></i>
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
    <div class="container">
        <div class="topnav">
            <a class="active" href="index.php?page=home">Home</a>
            <a href="#news">Test</a>
            <a href="#contact">About Us</a>
        </div>
    </div>
    <div class="container" style="margin-top:10px">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://artsci.inl.gov/Slider%20Images/2W-5.color2small1300x400.jpg" alt="Los Angeles" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="https://artsci.inl.gov/Slider%20Images/MC13-7R-6colorbsmall1300x400.jpg" alt="Chicago" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="https://artsci.inl.gov/Slider%20Images/TO-651-S6_FSE_whole-sample1300x400.jpg" alt="New York" width="1100" height="500">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <div class="container" style="margin-top:30px">
        </div>
    </div>