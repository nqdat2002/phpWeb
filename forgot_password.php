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
    $error = $_GET['error'];
    echo $error + ".Vui lòng nhập lại email";
    ?>
    <form action="process_forgot_password.php" method = "post">
        Email 
        <input type="email" name="email">
        <br>
        <button>Gửi email đổi mật khẩu</button>
    </form>
</body>
</html>