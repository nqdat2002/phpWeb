    <ul>
        <li>
            <a href="../manufacturer">
                Quan ly nha san xuat
            </a>
        </li>
        <li>
            <a href="../products">
                Quan ly san pham
            </a>
        </li>
        <li>
            <a href="../orders">
                Quan ly đơn hàng
            </a>
        </li>
    </ul>
    <?php if (isset($_GET['error'])) {
    ?>
        <span style="color:red">
            <?php echo $_GET['error'] ?>
        </span>
    <?php } ?>
    <?php if (isset($_GET['success'])) {
    ?>
        <span style="color:blue">
            <?php echo $_GET['success'] ?>
        </span>
    <?php } ?>