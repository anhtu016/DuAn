<?php
require_once 'db.php';
// xây dựng hàm truy vấn để lấy dữ liệu
function getProduct(){
    $sql = "SELECT * FROM products";
    return getData($sql);
}