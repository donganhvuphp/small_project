<?php
if (isset($_SESSION['error']) && $_SESSION['error'] == 11) {
?>
    <script>
        alert('Bạn không thể để trống bình luận!');
    </script>
<?php
    unset($_SESSION['error']);
} elseif (isset($_SESSION['error']) && $_SESSION['error'] == 10) {
?>
    <script>
        alert('Bạn hãy cập nhật đầy đủ thông tin để sử dụng chức năng này!');
    </script>
<?php
    unset($_SESSION['error']);
} elseif (isset($_SESSION['error']) && $_SESSION['error'] == 12) {
?>
    <script>
        alert('Bạn không thể xóa bình luận của người khác!');
    </script>
<?php
    unset($_SESSION['error']);
}elseif (isset($_SESSION['success']) && $_SESSION['success'] == 12) {
    ?>
        <script>
            alert('Xóa thành công!');
        </script>
    <?php
        unset($_SESSION['success']);
    }
?>
<div class="about-area">
    <div class="container">
        <!-- Hot Aimated News Tittle-->
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-tittle">
                    <strong>Trending now</strong>
                    <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <div class="trending-animated">
                        <ul id="js-news" class="js-hidden">
                            <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                            <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                            <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!-- Trending Tittle -->
                <div class="about-right mb-90">
                    <div class="section-tittle mb-30 pt-30">
                        <h3><?= $detailArticle[0]['title']; ?></h3>
                    </div>
                    <div class="about-prea">
                        <?= $detailArticle[0]['content']; ?>
                    </div>

                    <div class="social-share pt-30">
                        <div class="section-tittle">
                            <h3 class="mr-20">Share:</h3>
                            <ul>
                                <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- From -->
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> <?php if(empty($selectView[0]['view'])){echo "0";}else{ echo $selectView[0]['view'];} ?> lượt xem</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="comments-area">
                    <h4><?= count($selectComment); ?> Comments</h4>
                    <?php
                    foreach ($selectComment as $cmt) {
                    ?>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/upload/avatar/<?= $cmt['avatar']; ?>" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            <?= $cmt['content']; ?>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#"><?= $cmt['name']; ?></a>
                                                </h5>
                                                <p class="date"><?= $cmt['create_at']; ?></p>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="index.php?page=article&method=delCmt&idcmt=<?= $cmt['id']; ?>&id_acc=<?= $cmt['id_acc']; ?>&id_article=<?= $detailArticle[0]['id']; ?>" onclick="return confirm('Bạn có muốn xóa bình luận không ?');" class="btn-reply text-uppercase">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="comment-form">
                    <h4>Bình luận bài viết</h4>
                    <form class="form-contact comment_form" action="" method="POST" id="commentForm">
                        <input type="text" style="display: none;" name="id_article" value="<?= $detailArticle[0]['id']; ?>">
                        <input type="text" style="display: none;" name="id_account" value="<?php if (isset($_SESSION['id_acc'])) echo $_SESSION['id_acc']; ?>">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="comment" class="button button-contactForm btn_1 boxed-btn">Bình luận</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Follow Us</h3>
                </div>
                <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Poster -->
                <div class="news-poster d-none d-lg-block">
                    <img src="assets/img/news/news_card.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>