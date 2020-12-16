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
                        <h3><?= $findArticle[0]['title']; ?></h3>
                    </div>
                    <div class="about-prea">
                        <?= $findArticle[0]['content']; ?>
                    </div>
                </div>
                <div class="comment-form">
                    <?php
                    if ($findArticle[0]['status'] == 0) {
                    ?>
                        <form class="form-contact comment_form" action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="id" value="<?= $findArticle[0]['id'] ?>" style="display: none;">
                                <button type="submit" name="updateOpen" class="button button-contactForm btn_1 boxed-btn">Phê duyệt</button>
                            </div>
                        </form>
                    <?php
                    } elseif ($findArticle[0]['status'] == 1) {
                    ?>
                        <form class="form-contact comment_form" action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="id" value="<?= $findArticle[0]['id'] ?>" style="display: none;">
                                <button type="submit" name="updateClose" class="button button-contactForm btn_1 boxed-btn">Gỡ bài</button>
                            </div>
                        </form>
                    <?php
                    }
                    ?>

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