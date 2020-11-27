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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
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
                <nav class="shadow-sm navbar fixed-top navbar-expand-sm navbar-light bg-light">
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
                <div class="container" style="margin-top:100px">
                </div>
            </div>
        </div>
    </header>