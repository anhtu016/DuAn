<?php
include './headerdamin.php';
include './boxadmin.php';
require "../controllers/UserController.php";

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'listsp':
            include("product/list.php");
            break;
    }
} else {
    include 'homeadmin.php';
}

include './footeradmin.php';
?>