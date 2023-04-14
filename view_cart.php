<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    session_start();
    $cart =$_SESSION['cart'];
    $total  = 0;
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
        <?php foreach($cart as $id => $each): ?>
            <tr>
                <td>
                   <img height = "100" src="admin/products/photo/<?php echo $each['photo']?>">
                </td>
                <td> <?php echo $each['name'] ?></td>
                <td> 
                    <span class = "span-price">
                    <?php echo $each['price'] ?>
                    </span>
                </td>
                <td> 
                <button class = "btn-update-quantity"
                    data-id = '<?php echo $id ?>'
                    data-type = 'decre'>-</button>
                    <span class = "span-quantity">
                    <?php echo $each['quantity'] ?>
                    </span> 
                    <button class = "btn-update-quantity"
                    data-id = '<?php echo $id ?>'
                    data-type = 'incre'>+</button>
                </td>
                <td> 
                    <span class = "span-sum">
                        <?php $sum =  $each['quantity'] * $each['price'];
                            $total += $sum;
                            echo $sum;
                        ?>
                    </span>
                </td>
                <td>
                    <button class = "btn-delete" data-id = "<?php echo $id ?>">X</button>    
                
            </tr>
        <?php endforeach ?> 
    </table>
    <h1>
        Tổng tiền hoá đơn
        <span id = "span-total">
            <?php echo $total ?>    
        </span>
        
    </h1>
    <?php
    $id = $_SESSION['id'];
    require 'admin/connect.php';
    $sql = "SELECT * from customers where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form action="process_checkout.php" method = "post">
        Tên người nhận
        <input type="text" name = "name_receiver" value = <?php echo $each['name']?>>
        <br>
        Số điện thoại người nhận 
        <input type="text" name = "phone_receiver" value = <?php echo $each['phone_number']?>>
        <br>
        Địa chỉ người nhận 
        <input type="text" name = "address_receiver" value = <?php echo $each['address']?>>
        <br>
        <button>Đặt hàng</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function () {
            $(".btn-update-quantity").click(function () { 
                let btn = $(this);
                let id = $(this).data('id');
                let type = $(this).data('type');
                $.ajax({
                   type: "GET ",
                   url: "update_quantity_in_cart.php",
                   data: {id, type},
                   //dataType: "dataType",
                   
               })
               .done(function(){
                   let parent_tr = btn.parents('tr');
                   let price = parent_tr.find('.span-price').text();
                   let quantity = parent_tr.find('.span-quantity').text();
                   if(type == "incre"){
                        quantity++;
                   }
                   else{
                       quantity--;
                   }
                   if(quantity ===0 ){
                       parent_tr.remove();
                   }
                   else{
                    parent_tr.find('.span-quantity').text(quantity);
                   let sum = price * quantity;
                   parent_tr.find('.span-sum').text(sum);
                   }
                   getTotal();
                   
               });
               .fail(function(){// chay vao day neu url kh tim thay
                   console.log("error");
               });
            });
            $(".btn-delete").click(function (e) { 
                let btn = $(this);
                let id = $(this).data('id');
                
                $.ajax({
                   type: "GET ",
                   url: "delete_from_cart.php",
                   data: {id},
                   //dataType: "dataType",
                   
               })
               .done(function(){
                   btn.parents('tr').remove();
                   getTotal();
               })
               
                
            });
        });
    function getTotal(){
        let total = 0;
        $(".span-sum").each(function(){
        total += parseFloat($(this).text());
        });
        $("#span-total").text(total);
    }
    </script>
</body>
</html>