<?php
include "header.php";
include "../models/Product.php";
include "../models/category.php";

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'listsp':
            $product = getProduct();
            include("product/list.php");
            break;
        case 'addsp':
            if (isset($_POST['themMoi'])) {
                $name = $_POST['nameSP'];
                $price = $_POST['priceSP'];
                $description = $_POST['description'];
                addProduct($name, $price, $description);
                $thongbao = "Thêm thành công";
            }
            include "product/add.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET["id"] > 0)) {
                $id = $_GET['id'];
                deleteProduct($id);
            }
            $product = getProduct();
            include "product/list.php";
            break;
        case 'editsp':
            if (isset($_GET['id']) && ($_GET["id"] > 0)) {
                $id = $_GET['id'];
                $sp = editProduct($id);
            }
            include "product/edit.php";
            break;
        case 'updatesp':
            if (isset($_POST['update'])) {
                $id = $_POST["id"];
                $name = $_POST['nameSP'];
                $price = $_POST['priceSP'];
                $description = $_POST['description'];
                updateProduct($id, $name, $price, $description);
                $thongbao = "Sửa thành công";
            }
            $product = getProduct();
            include "product/list.php";
            break;
        case 'listdm':
            $category = getCategory();
            include "category/list.php";
            break;
        case 'adddm':
            if (isset($_POST['themMoi'])) {
                $name = $_POST['nameDM'];
                addCategory($name);
                $thongbao = "Thêm thành công";
            }
            include "category/add.php";
            break;
        case 'xoadm':
            if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                deleteCategory($id);
            }
            $category = getCategory();
            include "category/list.php";
            break;
        case 'editdm':
            if (isset($_GET['id']) && ($_GET["id"] > 0)) {
                $id = $_GET['id'];
                $dm = editCategory($id);
            }
            include "category/edit.php";
            break;
        case 'updatedm':
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['nameDM'];
                updateCategory($id, $name);
                $thongbao = "Sửa thành công";
            }
            $category = getCategory();
            include "category/list.php";
            break;
    }
} else {
    include 'home.php';
}

include 'footer.php';


?>