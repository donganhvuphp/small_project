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
    <main>
       <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = "admin";
            }

            switch ($page) {
                case 'admin':
                    include_once 'Controller/admin_c.php';
                    $admin = new Admin_c();
                    $admin->option();
                    break;
                default:
                    break;
            }
       ?>
    </main>
    <?php
    include_once 'layout/script.php';
    ?>
</body>
</html>