<?php
require_once 'db.php';
// xây dựng hàm truy vấn để lấy dữ liệu
function getProduct()
{
    $sql = "SELECT * FROM product";
    $product = pdo_query($sql);
    return $product;
}

function addProduct($name, $price, $description)
{
    $sql = "INSERT INTO product(product_name,product_price, product_description) VALUES ('$name','$price','$description')";
    pdo_query($sql);
}

function deleteProduct($id)
{
    $sql = "DELETE FROM `product` WHERE id = $id";
    pdo_query($sql);
}

function editProduct($id)
{
    $sql = "SELECT * FROM product WHERE id = $id";
    $sp = pdo_query_one($sql);
    return $sp;
}

function updateProduct($id, $name, $price, $description)
{
    $sql = "UPDATE `product` 
            SET product_name='$name',product_price='$price',product_description='$description' WHERE id = $id";
    pdo_query($sql);
}