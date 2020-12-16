<div class="row">
    <div class="col-md-3" style="margin:30px auto;">
        <h3 class="text-center" style="color:red;">Thêm danh mục</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3" id="frm-register">
        <form method="POST">
            <div class="form-group">
                <label for="add">Tên danh mục : </label>
                <input type="text" name="title" class="form-control" style="border-radius: 20px;" placeholder="Tên danh mục...">
            </div>
            <div class="form-group">
                <label for="des">Mô tả :</label>
                <textarea name="description" id="des" class="form-control" cols="30" rows="3" style="border-radius: 20px;"></textarea>
            </div>
            <br>
            <button type="submit" name="add_cate" class="btn-danger" style="width: 100px;border-radius: 20px;">Thêm</button>
        </form>
    </div>
</div>