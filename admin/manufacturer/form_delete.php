<?php require '../check_sadmin_login.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Day la giao dien admin 
    <?php if(empty($_GET['id'])) 
        header('location:index.php?error=Phai dien id');?>
    <?php 
    $id = $_GET['id'];
    include '../menu.php';
    include '../connect.php';
    $sql = "delete from manufacturers where id = '$id'";
    mysqli_query($connect, $sql);
    $error = mysqli_error($connect);
    mysqli_close($connect);
    if(empty($error)){
    header('location:index.php?success=xoa thanh cong');}
    ?>
</body>
</html>