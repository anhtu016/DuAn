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
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = getConnect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}




