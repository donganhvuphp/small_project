<div class="container" style="box-shadow: 0 1px 6px 0 grey;border-radius: 20px;padding: 20px; margin-top:20px">
    <div class="row">
        <div class="col-md-5" style="margin:30px auto;">
            <h1 class="text-center" style="color:red; font-weight: bold;">ADMIN</h1>
            <h3 class="text-center" style="color:red; font-weight: bold;">Quyền hạn (<?php
                if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
                    echo "root";
                }elseif(isset($_SESSION['permission']) && $_SESSION['permission'] == 2){
                    echo "Quản tri người dùng";
                }
                elseif(isset($_SESSION['permission']) && $_SESSION['permission'] == 3){
                    echo "Quản tri bài viết";
                }
                elseif(isset($_SESSION['permission']) && $_SESSION['permission'] == 4){
                    echo "Quản tri danh mục";
                }
            ?>)</h3>
        </div>
    </div>
    <div class="row">
    <?php
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1 || $_SESSION['permission'] == 3){
        ?>
            <div class="col-md-3">
            <a href="admin.php?page=admin&method=listArticle" class="btn btn-danger">BÀI VIẾT</a>
            </div>  
        <?php
        }
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1 || $_SESSION['permission'] == 2){
        ?>
        <div class="col-md-3">
            <a href="" class="btn btn-danger">NGƯỜI DÙNG</a>
        </div>
        <?php
        }
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1 || $_SESSION['permission'] == 4){
        ?>
        <div class="col-md-3">
            <a href="admin.php?page=admin&method=category" class="btn btn-danger">DANH MỤC</a>
        </div>
        <?php
        }
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
        ?>
        <div class="col-md-3">
            <a href="" class="btn btn-danger">QUẢN TRỊ ADMIN</a>
        </div>
        <?php
        }
    ?>
    </div>
    <div class="row">
        <div class="col-md-3" style="margin-top : 100px;">
            <a href="admin.php?page=admin&method=logout" style="color:green; font-size : 15px; border : 1px solid red ; background : pink; padding : 10px;">Đăng xuất</a>
        </div>
    </div>
</div>