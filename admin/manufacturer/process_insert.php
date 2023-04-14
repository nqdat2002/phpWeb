<?php
if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || 
empty($_POST['photo'])){
    header('location:form_insert.php?error=dien du thong tin');
}
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require '../connect.php';
$sql = "INSERT INTO `manufacture`(`name`, `address`, `phone`, `photo`)
VALUES('$name', '$address', '$phone', '$photo')";

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success=them thanh cong');