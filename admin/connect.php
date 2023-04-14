<?php
$connect = mysqli_connect('localhost', 'root', '', 'datnq123');
mysqli_set_charset($connect, 'utf8');
if ($connect->connect_error) {
    die("Connection failed: ");
}
