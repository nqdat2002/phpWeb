<?php
require '../check_admin_login.php' ;
$id = $_GET['id'];

require '../connect.php';
$sql = "DELETE from products where id = '$id' ";

mysqli_query($connect, $sql);
mysqli_close($connect);