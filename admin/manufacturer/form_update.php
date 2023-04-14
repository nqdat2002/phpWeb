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
    $sql = "select * from manufacturers where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form action='process_update.php' method = "post">
    <input type="hidden" name = "id" value ="<?php echo $each['id'] ?>">
        Ten 
        <input type="text" name = "name" value = "<?php echo $each['name'] ?>">
        <br>
        Dia chi 
        <textarea name="address" cols="30" rows="3"> <?php echo $each['address'] ?></textarea>
        <br>
        Dien thoai 
        <input type="text" name = "phone" value = "<?php echo $each['phone'] ?>">
        <br>
        Anh
        <input type="text" name = "photo" value = "<?php echo $each['photo'] ?>">
        <br>
        <button>Update</button>
    </form>
</body>
</html>