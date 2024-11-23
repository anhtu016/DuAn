<?php
require_once 'db.php';
// xây dựng hàm truy vấn để lấy dữ liệu
function getProduct($category_id)
{
    $sql = "SELECT product.id, product.product_name, product.product_img, product.category_id, product.product_price, product.product_description, product_category.product_category_name AS product_category_name
    FROM product
    JOIN product_category ON product.id = product_category.id";
    if ($category_id > 0) {
        $sql .= "AND product.category_id = " . $category_id;
    }
    $product = pdo_query($sql);
    return $product;
}

function addProduct($name, $categoryId, $price, $description)
{
    $sql = "INSERT INTO `product`(`product_name`, `category_id`, `product_price`, `product_description`) 
            VALUES ('$name','$categoryId','$price','$description')";
    pdo_query($sql);
}

function deleteProduct($id)
{
    $sql = "DELETE FROM `product` WHERE id = $id";
    pdo_query($sql);
}

function selectProduct($id)
{
    $sql = "SELECT product.id, product.product_name, product.product_img, product.category_id, product.product_price, product.product_description, product_category.product_category_name AS product_category_name
    FROM product
    JOIN product_category ON product.id = product_category.id
    WHERE product.id = $id";

    $sp = pdo_query_one($sql);
    return $sp;
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