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
    <script src='views/js/roles.js'></script>
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

</head>

<body style="margin:0;">
    <header margin=0>
        <div class="container-fluid p-0">
            <div class="col p-0">
                <!-- <div class="navbar navbar-expand-md navbar-dark bg-dark p-0">
                    <a id="signup" href="index.php?page=sign_up" class="nav-item ml-0 p-3 text-white">
                        <i class="far fa-user-circle" style='font-size:20px;color:white; margin-right: 10px;'>Sign up</i>
                    </a>

                    <a id="login" href="index.php?page=login" class="nav-item mr-0 p-3 text-white">
                        <i class="fas fa-sign-in-alt" style='font-size:20px;color:white; margin-right: 10px;'>Login</i>
                    </a>

                    <div class="nav-item dropdown show ml-auto">
                        <a id="username" href="" style="display: none;" class="nav-link dropdown-toggle p-3 text-white" data-toggle="dropdown" aria-expanded="true"></a>
                        <div class="dropdown-menu" style="display: none;" id="useroption">
                            <a class="dropdown-item" href="index.php?page=insert_staff">Profiles</a>
                            <a class="dropdown-item" id="logout" href="index.php?page=logout" name="logout">Logout</a>
                        </div>
                    </div>
                    </a>
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
                </div> -->
                <nav class="shadow-sm navbar navbar-fixed-top navbar-expand-lg navbar-light bg-lightstatic-top">
                    <div class="container">
                        <a class="navbar-brand" href="index.php?page=home">
                             <img class="img-fluid" src="assets/images/logoEng.PNG" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav" id="nav_menu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php?page=home">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="info_navtab">About</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto" id="nav_menu">
                                <a class="dropdown-item text-primary " id="signup" href="index.php?page=sign_up">Sign Up</a>
                                <a class="dropdown-item text-white bg-primary " id="login" href="index.php?page=login">Sign In</a>
                                <li class="nav-item dropdown">
                                    <div class="nav-item dropdown show">
                                        <a id="username" href="" style="display: none;" class="nav-link dropdown-toggle p-3 text-primary" data-toggle="dropdown" aria-expanded="true"></a>
                                        <div class="dropdown-menu" style="display: none;" id="useroption">
                                            <a class="dropdown-item" href="index.php?page=insert_staff">Profiles</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" id="logout" href="index.php?page=logout" name="logout">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container" style="margin-top:10px">
                </div>
            </div>
        </div>
    </header>