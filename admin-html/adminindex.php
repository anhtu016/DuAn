<?php
include_once 'headeradmin.php';
include_once 'boxadmin.php';
require_once "controllers/UserController.php";

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($variable) {
        case '/listsp':
            listUser();
            break;

        // default:
        //     # code...
        //     break;
    }
} else {
    include 'homeadmin.php';
}

include_once 'footeradmin.php';
?>