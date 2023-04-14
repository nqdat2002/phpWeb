<style type="text/css">
    .tung_san_pham{
        width: 30%;
        border: 1px solid black;
        height: 250px;
        float: left;
    }
</style>

<?php require 'admin/connect.php';
$sql = "SELECT * from products";
$result = mysqli_query($connect, $sql);
?>
<div id="giua">
     <?php foreach($result as $each): ?>
        <div class="tung_san_pham">
            <h1>
                <?php echo $each['name'] ?>
            </h1>
            <img src="admin/products/photo/" 
            <?php echo $each['photo'] ?> height ='100'>
            <p><?php echo $each['price'] ?></p>
            <a href="product.php?id=<?php echo $each['id'] ?>">
                Xem chi tiết
            </a>
            <br>
            <?php if(!empty($_SESSION['id'])){
                // data-id: truyen id cho attribute cua button
            ?>
                <button data-id='<?php echo $each['id']?>' class = 'btn-add-to-cart'>
                    Thêm vào giỏ hàng
                </button>
            <?php } ?>
        </div>
    <?php endforeach ?>
</div>