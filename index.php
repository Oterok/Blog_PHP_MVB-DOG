<?php
    include_once "views/layouts/header.php";
    require_once('connection.php');
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $controller = 'pages';
        $action = 'home';
    }
    require_once('views/layouts/body.php');
    
    include_once "views/layouts/footer.php";
?>