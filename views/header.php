<!DOCTYPE html>
<html>

<head>
    <title>English Test Site</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
        $(function() {
            $("a").click(function() {
                $("a").each(function() {
                    $(this).removeClass("active");
                });
                $(this).addClass("active");
            });
        });
    </script>

    <script type="text/javascript">
        function showStuff(id) {
            var element = document.getElementById("test_navtab");
            element.style.display = "none";
        }
    </script>
</head>

<body style="margin:0;">
<header margin=0>
        <div class="container-fluid">
            <div class="col">
                <div class="row bg-dark d-flex flex-row-reverse">
                    <li style="margin-top: 10px; margin-bottom:10px; margin-right:10px">
                        <a href="index.php?page=sign_up" class="btn btn-primary btn-lg " role="button">
                            <i class="far fa-user-circle" style='font-size:20px;color:white; margin-right: 10px;'></i>
                            Sign Up
                        </a>

                        <a href="index.php?page=login" class="btn btn-primary btn-lg" role="button">
                            <i class="fas fa-sign-in-alt" style='font-size:20px;color:white; margin-right: 10px;'></i>
                            Login
                        </a>
                    </li>
                </div>
                <div class="row">
                    <div class="col"> </div>
                    <div class="col-7">
                        <div class="container-fluid">
                            <a href="index.php?page=home" class="btn" role="button">
                                <img src="assets/images/logo.PNG" class="img-fluid" alt="Responsive image">
                            </a>
                        </div>
                    </div>
                    <div class="col"> </div>
                </div>
                <div class="row" id="nav_row">
                    <div class="col"> </div>
                    <div class="col-7" id="nav_col">
                        <div class="container w-100" id="nav_container">
                            <div class="topnav" id="nav_menu">
                                <a class="active" id="home_navtab" href="index.php?page=home">Home</a>

                                <a id="test_navtab" href="index.php?page=addtest">Add Test</a>

                                <a id="info_navtab" href="#contact">About Us</a>
                            </div>
                        </div>
                        <div class="container" style="margin-top:10px">
                        </div>
                    </div>
                    <div class="col"> </div>
                </div>
            </div>
        </div>
    </header>

    <script src="js/roles.js"></script>