<?php
    if(isset($_SESSION['success']) && $_SESSION['success'] == 12){
?>
    <script>alert('Đăng ký thành công!');</script>
<?php
    unset($_SESSION['success']);}
?>
<div class="row">
    <div class="col-md-3" style="margin:30px auto;">
        <h3 class="text-center" style="color:red;">ĐĂNG NHẬP</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3" id="frm-register">
        <form method="POST">
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" name="email" class="form-control" style="border-radius: 20px;" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" style="border-radius: 20px;" placeholder="Password" name="password">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="exampleCheck1"><a href="" style="color:red;">Quên mật khẩu ?</a></label>
            </div>
            <br>
            <button type="submit" name="login_acc" class="btn-danger" style="width: 100px;border-radius: 20px;">Đăng nhập</button>
            <a href="index.php?page=article&method=register" class="btn-info" style="width: 100px;border-radius: 20px; padding :5px;">Đăng ký</a>
        </form>
        <div id="retype" style="width :20px;">
            <i class="fa fa-unlock" aria-hidden="true" style="width :100%;"></i>
        </div>
    </div>
</div>