<?php require '../check_admin_login.php' ?>
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
    <?php 
    include '../menu.php';
    include '../connect.php';
    $sql = "SELECT * from manufacturers";
    $result = mysqli_query($connect, $sql);
    ?>
    <table border = "1" width = "100%">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($result as $each): ?>
        <tr>
            <td><?php echo $each['id']?></td>
            <td><?php echo $each['name']?></td>
            <td><?php echo $each['address']?></td>
            <td><?php echo $each['phone']?></td>
            <td>
                <img src="<?php echo $each['photo']?>" height = "100">
            </td>
            <td><a href="form_update.php?id=<?php echo $each['id']?>">Edit</a></td>
            <td><a href="form_delete.php?id=<?php echo $each['id']?>"></a>
            </td>    
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>