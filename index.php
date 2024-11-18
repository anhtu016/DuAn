<?php
session_start();
ob_start();
// Kết nối đến database và model tài khoản
include './models/db.php';
include './models/taikhoan.php';

// Include header một lần duy nhất
include "views/header.php";

// Điều hướng theo biến `$act`
$act = isset($_GET['act']) ? $_GET['act'] : '/';

switch ($act) {
    case 'dangky':
        $user_name = "";
        $user_email = "";
        $user_password = "";
        $user_phone = "";
        $user_address = "";
        $user_role = 0; // Default role for a new user
        $user_img = "default.png"; // 
    
    
        if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $user_name = $_POST["user_name"];
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];
            $user_phone = $_POST["user_phone"];
            $user_address = $_POST["user_address"];
    
            $isCheck = true;
       
            if($isCheck) {
               
                if (isset($_FILES['user_img']) && $_FILES['user_img']['error'] == 0) {
                    $user_img = './uploads/' . $_FILES['user_img']['name'];
                    move_uploaded_file($_FILES['user_img']['tmp_name'], $user_img);
                }
                
    
                // Insert account with user_role and user_img
                insert_taikhoan($user_name, $user_email, $user_password, $user_role, $user_img, $user_address, $user_phone);
                header('Location: index.php?act=dangnhap');
            }
        }
        include "views/taikhoan/dangky.php";
        break;
    

    case 'dangnhap':
        $user_name = "";
        $user_password = "";

        if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            $user_name = $_POST["user_name"];
            $user_password = $_POST["user_password"];
            $checkuser = checkuser($user_name, $user_password);
            

            $isCheck = true;

            
            if($isCheck){
                if (is_array($checkuser)) {
                    if ($checkuser['user_role'] == 0) {
                        $_SESSION['user'] = $checkuser;
                        
                        header('Location: index.php');
                    }
                }
            }
        }
        include "views/taikhoan/dangnhap.php";
        break;
        case 'thoat':
            unset($_SESSION['user']); // Xóa toàn bộ thông tin người dùng
            header('Location: index.php'); // Chuyển hướng về trang chủ
            exit(); // Ngăn các mã tiếp theo chạy
            break;
        
    default:
        include "views/main.php";
        break;
}

// Include footer một lần duy nhất
include_once "views/footer.php";
?>
