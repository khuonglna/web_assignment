<?php
session_start();
include 'views/header.html';

define('STAFF', '2');
define('ADMIN', '3');

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = '';
}
$role = $_SESSION['role'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "") {
        include "views/exception.html";
    } 
    elseif ($page == "login") {
        $controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'UserController';
        $action = isset($_GET['action']) ? $_GET['action'] : 'getUser';

        require_once('controllers/login_controller.php');
        $usercontroller = new $controller();
        $usercontroller->$action();
    } 
    elseif ($page == "sign_up") {
        $controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'UserController';
        $action = isset($_GET['action']) ? $_GET['action'] : 'getUser';

        require_once('controllers/signup_controller.php');
        $usercontroller = new $controller();
        $usercontroller->$action();
    } 
    elseif ($page == "logout") {
        $controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'UserController';
        $action = isset($_GET['action']) ? $_GET['action'] : 'logout';

        require_once('controllers/logout_controller.php');
        $usercontroller = new $controller();
        $usercontroller->$action();
    } 
    elseif ($page == "home") {
        include "views/$page.html";
    } 
    elseif ($page == "modify_question" && $role == STAFF) {
        include "views/modify_question_view.html";
    }
    elseif ($page == "add_question" && $role == STAFF) {
        include "views/add_question_view.html";
    } 
    elseif ($page == "delete_question" && $role == STAFF) {
        include "views/delete_question_view.html";
    } 
    elseif ($page == "insert_staff" && $role == ADMIN) {
        $controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'StaffController';
        $action = isset($_GET['action']) ? $_GET['action'] : 'insertStaff';

        require_once('controllers/insert_staff_controller.php');
        $usercontroller = new $controller();
        $usercontroller->$action();
    } 
    elseif ($page == "delete_staff" && $role == ADMIN) {
        include "views/delete_staff_view.html";
    }
    elseif ($page == "exam_view") {
        include "views/exam_view.html";
    } 
    elseif ($page == "result") {
        include "views/result.html";
    } 
    elseif ($page == "ranking") {
        include "views/ranking.html";
    } 
    else {
        include "views/home.html";
    }
}
else include "views/home.html";
require_once 'views/footer.html';
