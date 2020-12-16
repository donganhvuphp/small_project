<div class="header-area">
    <div class="main-header ">
        <div class="header-top black-bg d-none d-md-block">
            <div class="container">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left">
                            <ul>
                                <li><img src="assets/img/icon/header_icon1.png" alt="">Xin chào <?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?> </li>
                                <li><img src="assets/img/icon/header_icon1.png" alt=""><span id="timeCurent"></span>  
                                </li>
                            </ul>
                        </div>
                        <div class="header-info-right">
                            <ul class="header-social">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid d-none d-md-block">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="index.php?page=article&method=home"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="header-banner f-right ">
                            <img src="assets/img/hero/header_card.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                        <!-- sticky -->
                        <div class="sticky-logo">
                            <a href="index.php?page=article&method=home"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-md-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php?page=article&method=home">Trang chủ</a></li>
                                    <li><a href="index.php?page=article&method=category">Danh mục</a></li>
                                    <li><a href="index.php?page=article&method=about">Giới thiệu</a></li>
                                    <li><a href="index.php?page=article&method=contact">Liên hệ</a></li>
                                    <li><a href="#">Tài khoản</a>
                                        <ul class="submenu">
                                            <?php
                                                if(isset($_SESSION['name'])){
                                            ?>
                                                <li><a href="elements.html">Thông tin tài khoản</a></li>
                                                <li><a href="index.php?page=article&method=add_article">Tòa soạn</a></li>
                                            <?php
                                                }elseif(isset($_SESSION['email']) && !isset($_SESSION['name'])){
                                            ?>
                                                 <li><a href="index.php?page=article&method=register_info">Đăng ký thông tin</a></li>
                                            <?php
                                                }
                                                if(!isset($_SESSION['email'])){
                                            ?>
                                                <li><a href="index.php?page=article&method=login">Đăng nhập</a></li>
                                            <?php
                                            }elseif(isset($_SESSION['email'])){
                                            ?>
                                                <li><a href="index.php?page=article&method=logout">Đăng xuất</a></li>
                                            <?php
                                            }  if(!isset($_SESSION['email'])){
                                                ?>
                                                    <li><a href="index.php?page=article&method=register">Đăng ký</a></li>
                                                <?php
                                                }  
                                             ?>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <i class="fas fa-search special-tag"></i>
                            <div class="search-box">
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-md-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->