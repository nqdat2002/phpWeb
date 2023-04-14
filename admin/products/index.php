<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require '../menu.php';
    require '../connect.php';
    $sql = "SELECT products.*,
    manufacturers.name AS manufacturer_name FROM products join manufacturers ON products.manufacturer_id = manufacturers.id";
    $result = mysqli_query($connect, $sql);
    ?>
    <h1>Quan ly san pham</h1>
    <a href="form_insert.php">Them san pham</a>
    <table border = "1" width = "100%">
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Tên nhà sản xuất</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
        <?php foreach($result as $each): ?>
        <tr>
            <td><?php echo $each['id']?></td>
            <td><?php echo $each['name']?></td>
            <td>
                <img src="photo/<?php echo $each['photo'] ?>" alt="error" height = "200">
            </td>
            <td><?php echo $each['price']?></td>
            <td>
                <?php echo $each['manufacturer_name'] ?>
            </td>
            <td><a href="form_update.php?id=<?php echo $each['id']?>">
                Sửa
            </a></td>
            <td><a href="delete.php?id=<?php echo $each['id'] ?>">
                Xoá
            </a></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>