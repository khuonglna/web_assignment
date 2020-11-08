<?php 
    session_start();
    include 'views/header.php';
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "login") {
            $controller = isset($_GET['controller'])? $_GET['controller'].'Controller' : 'UserController' ;
            $action = isset($_GET['action'])?$_GET['action']: 'getUser' ;
            
            require_once('controllers/login_controller.php');
            $usercontroller = new $controller();
            $usercontroller-> $action();
        } 
        elseif ($page == "sign_up") {
            $controller = isset($_GET['controller'])? $_GET['controller'].'Controller' : 'UserController' ;
            $action = isset($_GET['action'])?$_GET['action']: 'getUser' ;

            require_once('controllers/signup_controller.php');
            $usercontroller = new $controller();
            $usercontroller-> $action();
        } 

        elseif ($page == "logout") {
            $controller = isset($_GET['controller'])? $_GET['controller'].'Controller' : 'UserController' ;
            $action = isset($_GET['action'])?$_GET['action']: 'logout' ;

            require_once('controllers/logout_controller.php');
            $usercontroller = new $controller();
            $usercontroller-> $action();
        } 
        
        elseif ($page == "home") {
            include "views/$page.php";
        } 
        elseif ($page == "add_test") {
            include "views/add_question.php";
            // $controller = isset($_GET['controller']) ? $_GET['controller'].'Controller' : 'ExamController' ;
            // $action = isset($_GET['action']) ? $_GET['action'] : 'addQuestion';

            // require_once('controllers/addexam_controller.php');
            // $examController = new $controller();
            // $examController->$action();
        } elseif ($page == "exam_view") {
            include "view/$page.php";
        } 

        // if (isset($_SESSION['role']) && isset($_SESSION['username'])) {
        //     $var = $_SESSION['username'];
        //     echo "current section is " . $var . ".<br>";
        //     echo "current section is " . $_SESSION['role'] . ".<br>";
        // }
    } 
    require_once 'views/footer.php'; 
?>