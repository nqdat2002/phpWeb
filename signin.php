<?php 
    session_start();      
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        require 'admin/connect.php';
        $sql = "SELECT * from customers where token = '$token' limit 1";
        
        $result = mysqli_query($connect, $sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 1){
            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
        }
        
    }
  
    if(isset($_SESSION['id'])){
        header('location:user.php');
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="process_signin.php">
        Email
        <input type="email" name = "email">
        <br>
        password
        <input type="password" name="password" >
        <br>
        Ghi nhớ đăng nhập  
        <input type="checkbox" name ="remember">
        <br>
        <button>Đăng nhập</button>
        <a href="forgot_password.php">
            Quên mật khẩu
        </a>
    </form>
</body>
</html>