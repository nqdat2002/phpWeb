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
    <?php include '../menu.php'?>
    <?php include '../connect.php' ?>
    
    
    <form action='process_insert.php' method = "post">
        Ten 
        <input type="text" name = "name">
        <br>
        Dia chi 
        <textarea name="address" cols="30" rows="3"></textarea>
        <br>
        Dien thoai 
        <input type="text" name = "phone">
        <br>
        Anh
        <input type="text" name = "photo">
        <br>
        <button>Them</button>
    </form>
</body>
</html>