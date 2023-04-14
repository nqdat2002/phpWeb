<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
require 'admin/connect.php';
$sql = "SELECT count(*) from customers
where email = '$email' ";// câu truy vấn
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
    header('location:signup.php?error=Trùng email rồi. Bạn chắc chứ?'); // tự chuyển hướng
    exit;
}
$sql = "INSERT into customers(name, email, password, phone_number, address)
value ('$name', '$email', '$password','$phone_number', '$address') ";
mysqli_query($connect, $sql);
require 'mail.php';
$title = "Đăng ký thành công";
$content = "Chúc mừng bạn đã đăng ký thành công tài khoản";

sendmail($email, $name, $title, $content);
$sql = "SELECT id from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['name'] = $name;
$_SESSION['id'] = $id;
mysqli_close($connect);

    