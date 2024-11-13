<?php  
session_start();
$conn = new mysqli("localhost", "root", "", "data_da1");  

if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = $_POST['user_name'];  
    $password = trim($_POST['user_password']);  

    $sql = "SELECT * FROM user WHERE user_name='$username'";  
    $result = $conn->query($sql);  

    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();  
        if ($password === $row['user_password']) {  
            $_SESSION['user_name'] = $username;  
            echo "Đăng nhập thành công!";  
            header("Location: trangchu.html");  
        } else {  
            echo "Mật khẩu không chính xác!";  
        } 
    } else {  
        echo "Người dùng không tồn tại!";  
    }  
}  

$conn->close();  
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
        <h2>Đăng Nhập</h2>  
    <form method="POST" action="">  
<div class="mb-3">
  <label for="user_name" class="form-label">Tài khoản</label>
  <input type="text" class="form-control" name="user_name"></input>
</div>
<div class="mb-3">
  <label for="user_password" class="form-label">Mật khẩu</label>
  <input type="text" class="form-control" name="user_password"></input>
</div>
<button class="btn btn-success" type="submit">Đăng nhập</button>
<a href="index.php?act=Dangky.php"></a><button class="btn btn-success">Đăng ký</button></a>
    </form>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>