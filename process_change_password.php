<?php

function current_url(){
    $url = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}
$token = $_POST['token'];
$password = $_POST['password'];

require 'admin/connect.php';

$sql = "SELECT customer_id from forgot_password
where token = '$token'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) === 0){
    header('location:index.php');
}
$customer_id = mysqli_fetch_array($result)['customer_id'];
$sql = "UPDATE customers set
password = '$password' 
where 
id = '$customer_id'";
mysqli_query($connect, $sql);

$sql = "DELETE from forgot_password where token = '$token'";
mysqli_query($connect, $sql);