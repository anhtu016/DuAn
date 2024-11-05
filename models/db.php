<?php
// tạo kết nối project php sang mysql
require_once 'env.php';
function getConnect(){
    $connect = new PDO("mysql:host=".DBHOST
    .";dbname=".DBNAME.";charset=".DBCHARSET,
    DBUSER,
    DBPASS
    );
    return $connect;
}

// nếu như dùng để lấy danh sách thì sẽ truyền vào tham số true
// ngược sẽ là false để thêm, sửa, xóa
function getData($query, $getAll = true){
    $conn = getConnect();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if($getAll){
        return $stmt->fetchAll();
    }
    return $stmt->fetch();
}