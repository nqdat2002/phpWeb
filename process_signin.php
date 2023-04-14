<?php
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
}
else $remember = false;
require 'admin/connect.php';
$sql = "SELECT * from customers
where email = '$email' and password = '$password' ";// câu truy vấn
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if($number_rows == 1){
    
    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    if($remember){
        $token = uniqid('user_', true);// hàm trả về chuỗi random;
        $sql = "UPDATE customers
        set token = '$token' where id = '$id'";
        setcookie('remember', $token, time() + 86400*30);
    }
    else {
        echo "Đăng nhập lỗi";
    }
    header('location:user.php');
    exit;
}
header('location:signin.php?error=Đăng nhập sai');
exit;