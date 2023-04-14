<?php require '../check_admin_login.php' ?>
<?php
 $name = $_POST['name'];
 $photo_new = $_FILES['photo_new'];
 if($photo_new['size'] > 0){
    $folder = 'photo/';
    $file_extension = explode('.', $photo['name'])[1];
    $file_name = time().'.'.$file_extension;
    $target_file = $folder . $file_name;
    move_uploaded_file($photo["tmp_name"], $target_file);
 }else{
    $file_name = $_POST['photo_old'];
 }

 $price = $_POST['price'];
 $description = $_POST['manufacturer_id'];
 $manufacturer_id = $_POST['manufacturer_id'];
 
 

 
 require '../connect.php';
 $sql = "update products 
 set 
 name = '$name',
 photo = '$file_name',
 price = '$price',
 description = '$description', 
 manufacturer_id = '$manufacturer_id'
 where id = '$id'
 ";

 mysqli_query($connect, $sql);
 mysqli_close($connect); 