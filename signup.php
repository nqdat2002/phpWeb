
    <?php 
    if(isset($_GET['error'])){
        echo $_GET['error'];}// hiển thị thông báo lỗi 
    ?>
    <div id = "modal-signup" class = "modal fade">
    <div class="modal-dialog">
    
      <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
            <h1>Form đăng ký</h1>   
            <div class="alert alert-danger" style = "display: none" id = "div-error">
            </div>  
        </div>
        <div class="modal-body">
            <form method = "post" id = "form-signup">
            
            Tên 
            <input type="text" name = "name">
            <br>
            Email
            <input type="email" name = "email">
            <br>
            Mật khẩu
            <input type="password" name = "password">
            <br>
            Số điện thoại 
            <input type="text" name = "phone_number">
            <br>
             Địa chỉ
            <input type="text" name = "address">
            <br>
             <button>Đăng ký</button>
            </form>
        </div>
   
    </div>
    </div>
    </div>
<script type = "text/javascript">
    $(document).ready(function () {
        $("#form-signup").submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "process_signup.php",
                data: $(this).serializeArray(),// ham lay toan bo thong tin trong form 
                dataType: "html",
                success: function (response) {
                     if(response !== '1'){
                         $('#div-error').text(response);
                         $('#div-error').show();
                     }
                     else{
                        $("#modal-signup").toggle();
                        $(".modal-backdrop").hide();
                     }
                }
            });
        });
    });
</script>
    