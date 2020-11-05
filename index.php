<!DOCTYPE html>
<?php 
    include 'views/header.php'; 

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "login") {
            include "php/common/login/$page.php";
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
        elseif ($page == "addtest") {
            include "views/add_question.php";
            $controller = isset($_GET['controller'])? $_GET['controller'].'Controller' : 'ExamController' ;
            $action = isset($_GET['action'])?$_GET['action']: 'addQuestion' ;

            require_once('controllers/addexam_controller.php');
            $examController = new $controller();
            $examController->$action();
        } 
        else include "$page.php";
    } 
    include 'views/footer.php'; 
?>