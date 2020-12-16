<?php
    include_once 'Model/article_m.php';
    class Article_c extends Article_m
    {
        private $article ;

        function __construct()
        {
            $this->article = new Article_m();
        }

        public function getHome_c()
        {
            $selectTopAticle = $this->article->selectTopAticle();
            include_once 'Views/page/home.php';
        }

        public function getAbout_c()
        {
            include_once 'Views/page/about.php';
        }

        // page danh mục

        public function getCategory_c()
        {   
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $listArticle = $this->article->detailListArticle_m($id);
            }else{
                $listArticle  = $this->article->listArticle_m();
            }
            $listCate = $this->article->listCate_m();
            include_once 'Views/page/category.php';
        }

        public function contact_c()
        {
            include_once 'Views/page/contact.php';
        }

        public function login_c()
        {
            include_once 'Views/account/login.php';
        }

        public function register_c()
        {
            include_once 'Views/account/register.php';
        }
        
        public function registerInfo_c()
        {
            include_once 'Views/account/register_info.php';
        }

        public function addArticle_c()
        {
            $listCate = $this->article->listCate_m();
            include_once 'Views/article/add_article.php';
        }

        public function articleDetail_c()
        {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $selectView = $this->article->selectView($id);
                if(empty($selectView)){
                    $view = 1;
                    $this->article->insertView($id, $view);
                }else{
                    $view = $selectView[0]['view'] + 1;
                    $this->article->updateView($id, $view);
                }
                $selectComment = $this->article->selectComment_m($id);
                $detailArticle = $this->article->detailArticle_m($id);
            }
            include_once 'Views/page/article_detail.php';
        }

        // bình luận 
        public function delCmt_c()
        {
            if(isset($_GET['idcmt']) && isset($_GET['id_acc'])){
                $id_article = $_GET['id_article'];
                $id = $_GET['idcmt'];
                $id_acc = $_GET['id_acc'];
                if(isset($_SESSION['id_acc']) && $_SESSION['id_acc'] == $id_acc || $_SESSION['permission'] == 1){
                    $this->article->deleteCmt_m($id,$id_acc);
                    $_SESSION['success']  = 12;
                    header("Location:index.php?page=article&method=article_detail&id=$id_article");
                }else{
                    $_SESSION['error']  = 12;
                    header("Location:index.php?page=article&method=article_detail&id=$id_article");
                }
            }
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }
            else{
                $method = 'home' ;
            }

            switch ($method) {
                case 'home':
                    $this->getHome_c();
                    break;
                case 'about':
                    $this->getAbout_c();
                    break;
                case 'category':
                    $this->getCategory_c();
                    break;
                case 'article_detail':
                    $this->articleDetail_c();
                    if(isset($_POST['comment'])){
                        $id_article = $_POST['id_article'];
                        $id_account = $_POST['id_account'];
                        $content = $_POST['content'];
                        if(isset($_SESSION['name'])){
                            if(!empty($id_article) && !empty($id_account) && !empty($content)){
                                $this->article->insertComment_m($id_article, $id_account, $content);
                                header("Location:index.php?page=article&method=article_detail&id=$id_article");
                            }else{
                                $_SESSION['error']  = 11;
                                header("Location:index.php?page=article&method=article_detail&id=$id_article");
                            }
                        }else{
                            $_SESSION['error']  = 10;
                            header("Location:index.php?page=article&method=article_detail&id=$id_article");
                        }
                    }
                    break;
                case 'contact':
                    $this->contact_c();
                    break;
                case 'login':
                    $this->login_c();
                    if(isset($_POST['login_acc'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $check = $this->article->login($email, $password);
                        if(!empty($check)){
                            $_SESSION['email'] = $check[0]['email'];
                            $_SESSION['id_acc'] = $check[0]['id'];
                            $_SESSION['permission'] = $check[0]['permission'];
                            $info_acc = $this->article->infoUser($check[0]['id']);
                            $_SESSION['name'] = $info_acc[0]['name'];
                            header('Location:index.php');
                        }elseif(empty($check)){
                    ?>
                        <script>alert('Thông tin tài khoản hoặc mật khẩu không chính xác!');</script>
                    <?php
                        }
                    }
                    break;
                case 'logout':
                    session_destroy();
                    header('Location:index.php');
                    break;
                case 'register':
                    $this->register_c();
                    if(isset($_POST['register_acc'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $check = $this->article->checkRegister_m($email);
                        if(!empty($check)){
                        ?>
                            <script>alert('Tài khoản đã tồn tại!');</script>
                        <?php
                        }elseif(!empty($email) && !empty($password)){
                            $this->article->register_m($email, $password);
                            $_SESSION['success'] = 12 ;
                            header("Location:index.php?page=article&method=login");
                        }
                    }
                    break;
                case 'register_info' :
                    $this->registerInfo_c();
                    if(isset($_POST['register_info'])){
                        $id_account  = $_POST['id'];
                        $name        = $_POST['name'];
                        $gender      = $_POST['gender'];
                        $birthday    = $_POST['birthday'];
                        $phone       = $_POST['phone'];
                        $address     = $_POST['address'];
                        $img         = $_FILES['avatar'];
                        $avatar      = time().$this->article->convert_name($img['name']);
                        $tmp_name    = $img['tmp_name'];
                        move_uploaded_file($tmp_name, "assets/upload/avatar/".$avatar); 
                        $this->article->registerInfo_m($id_account,$name,$avatar,$gender,$birthday,$phone,$address);
                    }
                    break;
                case 'add_article': 
                    $this->addArticle_c();
                    if(isset($_POST['add_article'])){
                        $id_category = $_POST['id_category'];
                        $id_account  = $_POST['id_account'];
                        $title       = $_POST['title'];
                        $img         = $_FILES['avatar'];
                        $description = $_POST['description'];
                        $content     = $_POST['content'];
                        $tmp_name    = $img['tmp_name'];
                        $avatar = time().$this->article->convert_name($img['name']);
                        move_uploaded_file($tmp_name,'assets/img/avatar_article/'.$avatar);
                        $this->article->addArticle_m($id_account, $id_category, $title, $description, $content, $avatar);
                        header('Location:index.php');
                    }
                    break ;
                case 'delCmt' : 
                    $this->delCmt_c();
                    break ;
                default:
                    # code...
                    break;
            }
        }
    }
?>