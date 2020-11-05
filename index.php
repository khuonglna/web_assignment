<!DOCTYPE html>
<?php 
    require_once 'views/header.php'; 

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


        
        elseif ($page == "home") {
            include "views/$page.php";
        } 
        elseif ($page == "exam_view") {
            include "view/$page.php";
        } 
        else include "$page.php";
    } 
    require_once 'views/footer.php'; 
?>