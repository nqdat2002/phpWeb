<?php session_start();
    if(empty($_SESSION['id'])){
        header('location:signin.php?error=Đăng nhập đi');
    }
    // cái này nên để đầu trang 
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
    Đăng nhập thành công. Xin chào bạn
    <?php 
    echo $_SESSION['name']; 
    ?>
    <a href="signout.php">
        Đăng xuất
    </a>
    <br>
    <a href="index.php">Chuyển đến trang chủ</a>
</body>

</html>