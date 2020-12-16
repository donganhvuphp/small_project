<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-tittle">
                    <strong>Trending now</strong>
                    <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <div class="trending-animated">
                        <ul id="js-news" class="js-hidden">
                            <li class="news-item">Chào mừng các bạn đã ghé thăm website của chúng tôi.</li>
                            <li class="news-item">Chúc các bạn có một ngày tốt lành.</li>
                            <li class="news-item">Chúng tôi trân trọng sự ủng hộ của các bạn. Thanks !!!.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <h1>Thêm bài viết mới</h1>
                </div>
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 30px;">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="cate">Gửi đến :</label>
                                    <br>
                                    <select name="id_category" class="form-control" id="cate">
                                        <?php
                                        foreach ($listCate as $cate) {
                                        ?>
                                            <option value="<?= $cate['id'] ?>">Ban <?= $cate['title'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">Tiêu đề :</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Tiêu đề ...">
                                    <input type="text" name="id_account" style="display: none;" value="<?=$_SESSION['id_acc'];?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" name="avatar" accept="image/*" class="form-control-file" id="avatar">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Mô tả :</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="content">Nội dung :</label>
                                    <textarea name="content" id="ckeditor" class="form-control ckeditor" cols="30" rows="50"></textarea>
                                </div>
                                <button type="submit" name="add_article" class="btn btn-danger">Đề xuất</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>