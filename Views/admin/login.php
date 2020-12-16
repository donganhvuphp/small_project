<div class="row">
    <div class="col-md-3" style="margin:30px auto;">
        <h3 class="text-center" style="color:red;">ADMIN</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3" id="frm-register">
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email : </label>
                <input type="text" name="email" class="form-control" style="border-radius: 20px;" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password :</label>
                <input type="password" class="form-control" id="password" style="border-radius: 20px;" placeholder="Password" name="password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkTerm">
                <label class="form-check-label" for="exampleCheck1">Lưu mật khẩu</label>
            </div>
            <br>
            <button type="submit" name="login" class="btn-danger" style="width: 100px;border-radius: 20px;">Đăng nhập</button>
        </form>
        <div id="retype" style="width :20px;">
            <i class="fa fa-unlock" aria-hidden="true" style="width :100%;"></i>
        </div>
    </div>
</div>