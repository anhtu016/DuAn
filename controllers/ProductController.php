<?php
require_once "models/Product.php";
// tạo ra 1 biến để hứng dữ liệu từ models đổ sang
function listProduct(){
    $products = getProduct();
//    echo "<pre>";
//    var_dump($products);
//    die();
    include 'views/List.php';
}