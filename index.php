<?php
    session_start();
    ob_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <?php
        include_once 'layout/head.php'; 
    ?>
</head>
<body>
    <header>
        <?php
            if(!isset($_GET['method'])){
                include_once 'layout/header.php';
            }elseif(isset($_GET['method']) && $_GET['method'] != 'register' && $_GET['method'] != 'login' && $_GET['method'] != 'register_info'){
                include_once 'layout/header.php';
            }
        ?>
    </header>

    <main>
       <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = "article";
            }

            switch ($page) {
                case 'article':
                    include_once 'Controller/article_c.php';
                    $article = new Article_c();
                    $article->option();
                    break;
                default:
                    # code...
                    break;
            }
       ?>
    </main>
    
    <footer>
        <?php
            if(!isset($_GET['method'])){
                include_once 'layout/footer.php';
            }elseif(isset($_GET['method']) && $_GET['method'] != 'register' && $_GET['method'] != 'login' && $_GET['method'] != 'register_info'){
                include_once 'layout/footer.php';
            }
        ?>
    </footer>
    <?php
    include_once 'layout/script.php';
    ?>
</body>
</html>