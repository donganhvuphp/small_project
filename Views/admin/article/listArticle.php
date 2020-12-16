<div class="container" style="box-shadow: 0 1px 6px 0 grey;border-radius: 20px;padding: 20px; margin-top:20px">
    <div class="row">
        <div class="col-md-5" style="margin:30px auto;">
            <h1 class="text-center" style="color:red; font-weight: bold;">QUẢN TRỊ BÀI VIẾT</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" style="margin : 20px auto;">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" style="width: 80%;" type="search" placeholder="Search" aria-label="Search">
                <button class="btn-success my-2 my-sm-0" style="padding: 5px;border-radius: 20px ;" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row" style="box-shadow: 0 1px 6px 0 grey;border-radius: 20px;padding: 20px; margin:40px">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Người gửi</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày gửi</th>
                    <th scope="col" colspan="2">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    foreach ($listArticle as $ar) {
                 ?>
                    <tr>
                        <td><?=$count++;?></td>
                        <td><?=$ar['name']?></td>
                        <td><?=$ar['cate']?></td>
                        <td><img src="assets/img/avatar_article/<?=$ar['avatar']?>" width="100px" alt=""></td>
                        <td style="width: 200px; overflow: hidden;"><?=$ar['title']?></td>
                        <td style="color:red"><?php if($ar['status'] == 0){echo "Chờ duyệt";}else{echo "Đang hđ";}?></td>
                        <td><?=$ar['create_at']?></td>
                        <td><a href="admin.php?page=admin&method=update_article&id=<?=$ar['id']?>" style="padding: 5px;border-radius: 20px ;" class="btn-danger">Chi tiết</a></td>
                        <td><a href="admin.php?page=admin&method=delete_article&id=<?=$ar['id']?>" style="padding: 5px;border-radius: 20px ;" class="btn-warning" onclick="return confirm('Bạn có muốn xóa bài viết không ?');">Xóa</a></td>
                   </tr>
                 <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-3" style="margin-top : 100px;">
            <a href="admin.php?page=admin&method=administrator" style="color:green; font-size : 15px; border : 1px solid red ; background : pink; padding : 10px;">Quay lại</a>
        </div>
    </div>
</div>