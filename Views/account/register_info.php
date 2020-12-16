<?php
if (isset($_SESSION['email'])) {
?>
    <div class="row">
        <div class="col-md-3" style="margin:20px auto;">
            <h3 class="text-center" style="color:red;">ĐĂNG KÝ THÔNG TIN</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5" id="frm-register">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="id" value="<?= $_SESSION['id_acc']; ?>" class="form-control" style="border-radius: 20px; display: none;">
                </div>
                <div class="form-group">
                    <label for="name">Họ tên : </label>
                    <input type="text" name="name" class="form-control" style="border-radius: 20px;" id="name" placeholder="Nhập vào họ tên ...">
                </div>
                <div class="form-group">
                    <label for="avatar">Ảnh đại diện :</label>
                    <input type="file" name="avatar" accept="image/*" capture="camera" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="birthday">Ngày sinh :</label>
                    <input type="date" class="form-control" id="birthday" style="border-radius: 20px;" name="birthday">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại :</label>
                    <input type="number" class="form-control" id="phone" style="border-radius: 20px;" name="phone" placeholder="Nhập số điện thoại ...">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính :</label>
                    <input type="radio" name="gender" id="gender" value="1" style="width: 25px;"> Nam
                    <input type="radio" name="gender" id="gender" value="2" style="width: 25px;"> Nữ
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ :</label>
                    <input type="text" class="form-control" id="address" style="border-radius: 20px;" name="address" placeholder="Nhập địa chỉ ...">
                </div>
                <br>
                <button type="submit" class="btn-danger" name="register_info" style="width: 100px;border-radius: 20px;">Đăng ký</button>
                <button type="reset" class="btn-info" style="width: 100px;border-radius: 20px;">Làm mới</button>
            </form>
        </div>
    </div>
<?php
}else{
    header("Location:index.php");
}
?>