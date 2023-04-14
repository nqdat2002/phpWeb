<?php

function current_url(){
    $url = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}
$email = $_POST['email'];

require 'admin/connect.php';

$sql = "SELECT id, name from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) === 1){
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "DELETE from forgot_password where customer_id = '$id'";
    mysqli_query($connect, $sql);
    $token = uniqid();
    $sql = "INSERT into forgot_password 
    values('$id', '$token')";
    mysqli_query($connect, $sql);
    $link = current_url(). '/change_new_password.php?token ='.$token;
    require 'mail.php';
    $title = "Change new password";
    $content = "Bấm vào đây để thay đổi mật khẩu <a href = '$link'>Hiệu lực 
    trong 24 guây </a>";
    sendmail($email, $name, $title, $content );
}
else {
    header('location:forgot_password.php?error=không tìm thấy email');
}