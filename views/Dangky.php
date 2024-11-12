<?php  
session_start();  
$conn = new mysqli("localhost", "root", "", "data_da1");  

if ($conn->connect_error) {  
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);  
}  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = isset($_POST['user_name']) ? $_POST['user_name'] : '';  
    $password = isset($_POST['user_password']) ? trim($_POST['user_password']) : '';  
    $email = isset($_POST['user_email']) ? $_POST['user_email'] : '';   
    $role = isset($_POST['user_role']) ? $_POST['user_role'] : '';  
    $user_address = isset($_POST['user_address']) ? $_POST['user_address'] : '';  
    $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';  
    
    // Kiểm tra nếu đã tải lên hình ảnh, nếu không, thông báo lỗi.  
    if (isset($_FILES['user_img']) && $_FILES['user_img']['error'] == UPLOAD_ERR_OK) {  
        // Khai báo biến hình ảnh  
        $user_img = $_FILES['user_img']['name'];  
        $target_dir = "uploads/"; // Thư mục nơi lưu trữ ảnh  
        $target_file = $target_dir . basename($user_img);  
        $uploadOk = 1;  

        // Kiểm tra nếu tập tin là hình ảnh thực sự  
        $check = getimagesize($_FILES['user_img']['tmp_name']);  
        if ($check === false) {  
            echo "Tập tin không phải là hình ảnh.";  
            $uploadOk = 0;  
        }  

        // Kiểm tra xem tập tin đã tồn tại chưa  
        if (file_exists($target_file)) {  
            echo "Xin lỗi, hình ảnh đã tồn tại.";  
            $uploadOk = 0;  
        }  

        // Kiểm tra kích thước tập tin  
        if ($_FILES['user_img']['size'] > 500000) { // Giới hạn kích thước 500KB  
            echo "Xin lỗi, hình ảnh của bạn quá lớn.";  
            $uploadOk = 0;  
        }  

        // Chỉ cho phép định dạng hình ảnh  
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));  
        if(!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {  
            echo "Xin lỗi, chỉ cho phép định dạng JPG, JPEG, PNG & GIF.";  
            $uploadOk = 0;  
        }  

        // Nếu tất cả điều kiện đều hợp lệ, cố gắng tải lên hình ảnh  
        if ($uploadOk == 1) {  
            // Kiểm tra tên người dùng đã tồn tại  
            $sql = "SELECT * FROM user WHERE user_name='$username'";  
            $result = $conn->query($sql);  

            if ($result->num_rows > 0) {  
                echo "Người dùng đã tồn tại!";  
            } else {  
                // Băm mật khẩu  
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);  

                // Thực hiện chèn vào bảng user  
                $sql = "INSERT INTO user (user_name, user_password, user_email, user_role, user_img, user_address, user_phone)   
                        VALUES ('$username', '$hashed_password', '$email', '$role', '$user_img', '$user_address', '$user_phone')";  

                if ($conn->query($sql) === TRUE) {  
                    // Tải lên hình ảnh  
                    move_uploaded_file($_FILES['user_img']['tmp_name'], $target_file);  
                    echo "Đăng ký thành công!";  
                } else {  
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;  
                }  
            }  
        } else {  
            echo "Xin lỗi, hình ảnh bạn đã tải lên không hợp lệ.";  
        }  
    } else {  
        echo "Xin lỗi, bạn chưa chọn hình ảnh.";  
    }  
}  
?>  

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container" >
  <h2>Đăng ký tài khoản</h2>  
    <form action="" method="post" enctype="multipart/form-data">  

<div class="mb-3">
        <label for="user_name"class="form-label">Tên người dùng:</label>  
        <input type="text" id="user_name" class="form-control" name="user_name" required>  
</div>
<div class="mb-3">
        <label for="user_password" class="form-label">Mật khẩu:</label>  
        <input type="text" id="user_password" class="form-control" name="user_password" required> 
</div>
<div class="mb-3">
        <label for="user_email" class="form-label">Email:</label>  
        <input type="text" id="user_email" class="form-control" name="user_email" required>  
</div>
<div class="mb-3">
        <label for="user_role" class="form-label">chức vụ:</label>  
        <input type="number" id="user_role" class="form-control" name="user_role" required>
</div>
<div class="mb-3">
        <label for="user_address" class="form-label">Địa chỉ:</label>  
        <input type="text" id="user_address" class="form-control" name="user_address" required>
</div>

<div class="mb-3">
        <label for="user_phone" class="form-label">Số điện thoại:</label>  
        <input type="text" id="user_phone" class="form-control" name="user_phone" required>  
</div>
<div class="mb-3">
        <label for="user_img">Hình ảnh cá nhân:</label>  
        <input type="file" id="user_img"  name="user_img" accept="image/*" required>  
</div>


        <button class="btn btn-success" type="submit" value="Đăng ký">Đăng ký</button>  
    </form>  
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


<?php  
$conn->close();  
?>