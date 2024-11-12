<?php
include_once 'headeradmin.php';
include_once 'boxadmin.php';

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($variable) {
        case '/listsp':
            include "product/list.php";
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