<div id="tren">
            <ol>
                <li><a href="index.php">Trang chủ</a></li>
                <?php if(empty($_SESSION['id'])){ ?>
                    <li><a href="signin.php">Đăng nhập</a></li>
                    <li>
                        <button type="button"  data-toggle="modal" data-target="#modal-signup">Đăng ký</button>
                    </li>
                    <?php include 'signup.php' ?>
                <?php } else { ?> 
                    <li>
                        Chào <?php echo $_SESSION['name']; ?>
                        <a href="signout.php">Đăng xuất</a>
                    </li>
                    <li>
                        <a href="view_cart.php">Xem giỏ hàng</a>
                    </li>
                <?php } ?> 
                
            </ol>
        </div>