<style type="text/css">
</style>

<?php // file này dùng để xem chi tiết
$id = $_GET['id']; 
require 'admin/connect.php';
$sql = "SELECT * from products 
where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<div id="giua">
     <?php foreach($result as $each): ?>
        
            <h1>
                <?php echo $each['name'] ?>
            </h1>
            <img src="admin/products/photo/" alt=""
            <?php echo $each['photo'] ?> height ='100'>
            <p><?php echo $each['price'] ?></p>
            <p><?php echo $each['description']?></p>
        
    <?php endforeach ?>
</div>