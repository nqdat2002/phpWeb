<?php
session_start();
if (empty($_SESSION['level'])) { // kiểm tra vừa rỗng hoặc vừa bằng 0 hay không
    header('location:../index.php');
}
