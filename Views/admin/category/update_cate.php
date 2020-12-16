<div class="row">
    <div class="col-md-3" style="margin:30px auto;">
        <h3 class="text-center" style="color:red;">Sửa danh mục</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3" id="frm-register">
        <form method="POST">
            <div class="form-group">
                <input type="text" name="id" class="form-control" value="<?= $Cate[0]['id'] ?>" style="border-radius: 20px; display: none;">
            </div>
            <div class="form-group">
                <label for="title">Tên danh mục : </label>
                <input type="text" name="title" class="form-control" value="<?= $Cate[0]['title'] ?>" style="border-radius: 20px;">
            </div>
            <div class="form-group">
                <label for="des">Mô tả :</label>
                <textarea name="description" id="des" class="form-control" cols="30" rows="3" style="border-radius: 20px;"><?= $Cate[0]['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Trang thái:</label><br>
                <select name="status" class="form-control" id="status">
                    <option value="1" <?php if ($Cate[0]['status'] == 1) {
                                            echo "selected";
                                        } ?>>Hoạt đông</option>
                    <option value="0" <?php if ($Cate[0]['status'] == 0) {
                                            echo "selected";
                                        } ?>>Ngưng hoạt đông</option>
                </select>
                <br>
            </div>
            <br>
            <button type="submit" name="update_cate" class="btn-danger" style="width: 100px;border-radius: 20px;">Sửa</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-3" style="margin-top : 100px;">
        <a href="admin.php?page=admin&method=administrator" style="color:green; font-size : 15px; border : 1px solid red ; background : pink; padding : 10px;">Quay lại</a>
    </div>
</div>