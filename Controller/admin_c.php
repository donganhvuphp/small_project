<?php
    include_once 'Model/admin_m.php';
    class Admin_c extends Admin_m
    {
        private $admin;

        function __construct()
        {
            $this->admin = new Admin_m();
        }

        public function login_c(){
            include_once 'Views/admin/login.php';
        }

        public function administrator_c(){
            include_once 'Views/admin/option.php';
        }

        // Quản trị danh mục
        public function category_c(){
            $listCate = $this->admin->listCate_m();
            include_once 'Views/admin/category/category.php';
        }

        public function addCate_c(){
            include_once 'Views/admin/category/add_cate.php';
        }

        public function updateCate_c(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $Cate = $this->admin->selectCate_m($id);
            }
            include_once 'Views/admin/category/update_cate.php';
        }

        public function deleteCate_c()
        {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $this->admin->deleteCate_m($id);
            }
            include_once 'Views/admin/category/delete_cate.php';
        }

        // Quản trị bài biết
        public function listArticle_()
        {
            $listArticle = $this->admin->listArticle_m();
            include_once 'Views/admin/article/listArticle.php';
        }

        public function updateArticle()
        {   
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $findArticle = $this->admin->findArticle_m($id);
            }
            include_once 'Views/admin/article/update_article.php';
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }
            else{
                $method = 'login' ;
            }

            switch ($method) {
                case 'login':
                    $this->login_c();
                    if(isset($_POST['login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $check = $this->admin->login_m($email, $password);
                        if(!empty($check)){
                            $_SESSION['email'] = $check[0]['email'];
                            $_SESSION['id_acc'] = $check[0]['id'];
                            $_SESSION['permission'] = $check[0]['permission'];
                            header('Location:admin.php?page=admin&method=administrator');
                        }elseif(empty($check)){
                    ?>
                        <script>alert('Thông tin tài khoản hoặc mật khẩu không chính xác!');</script>
                    <?php
                        }
                    }
                    break;
                case 'logout' :
                    session_destroy();
                    header('Location:admin.php'); 
                    break ;
                case 'administrator':
                    $this->administrator_c();
                    break;
                case 'category' :
                    $this->category_c();
                    break;
                case 'add_cate' :
                    $this->addCate_c();
                    if(isset($_POST['add_cate'])){
                        $title       = $_POST['title'];
                        $description = $_POST['description'];
                        $this->admin->addCate_m($title,$description);
                    }
                    break;
                case 'update_cate' :
                    $this->updateCate_c();
                    if(isset($_POST['update_cate'])){
                        $id       = $_POST['id'];
                        $status       = $_POST['status'];
                        $title       = $_POST['title'];
                        $description = $_POST['description'];
                        $this->admin->updateCate_m($id,$title,$description ,$status);
                    }
                    break;
                case 'delete_cate' :
                    $this->deleteCate_c();
                    break;
                case 'listArticle':
                    $this->listArticle_();
                    break;
                case 'update_article' : 
                    $this->updateArticle();
                    if(isset($_POST['updateOpen'])){
                        $id = $_POST['id']; 
                        $view = 0 ;
                        $this->admin->insertView($id, $view);
                        $this->admin->updateArticleOpen($id);
                        header('Location:admin.php?page=admin&method=listArticle');
                    }elseif(isset($_POST['updateClose'])){
                        $id = $_POST['id']; 
                        $this->admin->updateArticleClose($id);
                        header('Location:admin.php?page=admin&method=listArticle');
                    }
                    break ;
                case 'delete_article': 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $article = $this->admin->findArticle_m($id);
                        $avatar = $article[0]['avatar'];
                        unlink("assets/img/avatar_article/$avatar");
                        $this->admin->delArticle($id);
                        header('Location:admin.php?page=admin&method=listArticle');
                    }
                    break ;
                default:
                    # code...
                    break;
            }
        }
    }
?>