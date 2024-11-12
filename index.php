<?php
require_once "controllers/ProductController.php";
$url = isset($_GET['url']) ? $_GET['url'] : '/';
switch ($url){
    case '/':
        listProduct();
        break;
    case '/admin';
        include 'admim/admin-html/index.html';
        break;
}