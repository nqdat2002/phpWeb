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
    <?php 
    require '../connect.php';
    $order_id = $_GET['id'];
    $sql = "SELECT * from order_product join products on
    order_product.product_id = products.id where order_id = '$order_id' ";
    $result = mysqli_query($connect, $sql);
    $sum = 0; 
    ?>
    <table>
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền </th>
            <th>Xoá</th>
        </tr>
        <?php foreach($result as $each): ?>
            <tr>
                <td>
                   <img height = "100" src="../ admin/products/photo/<?php echo $each['photo']?>">
                </td>
                <td> <?php echo $each['name'] ?></td>
                <td> <?php echo $each['price'] ?></td>
                <td> 
                    <?php echo $each['quantity'] ?>
                </td>
                <td> <?php
                $product_price = $each['price']*$each['quantity'];
                echo $product_price;
                $sum += $product_price;
                ?></td>
                <td><a href="delete_from_cart.php?<?php echo $id ?>"></a>X</td>
            </tr>
        <?php endforeach ?> 
    </table>
    <h1>tổng tiền đơn này <?php echo $sum ?></h1>
</body>
</html>