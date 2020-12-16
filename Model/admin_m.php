<?php
    include_once 'config/config.php';

    class Admin_m extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //Đăng nhập
        protected function login_m($email, $password)
        {
            $sql = "SELECT * FROM `tbl_account` WHERE email =:email AND password =:password AND `permission` != 0";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":password", $password);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Quản trị danh mục
        protected function addCate_m($title,$description)
        {
            $sql = "INSERT INTO `tbl_category`(`title`, `description`) VALUES (:title,:description)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":title", $title);
            $result->bindParam(":description", $description);
            $result->execute();
            header("Location:admin.php?page=admin&method=category");
        }

        protected function updateCate_m($id,$title,$description ,$status)
        {
            $sql = "UPDATE `tbl_category` SET `title`=:title,`description`=:description,`status`=:status WHERE id =:id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":title", $title);
            $result->bindParam(":description", $description);
            $result->bindParam(":status", $status);
            $result->bindParam(":id", $id);
            $result->execute();
            header("Location:admin.php?page=admin&method=category");
        }

        protected function selectCate_m($id){
            $sql = "SELECT * FROM `tbl_category` WHERE id = :id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function listCate_m(){
            $sql = "SELECT * FROM `tbl_category`";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function deleteCate_m($id){
            $sql = "DELETE FROM `tbl_category` WHERE id = :id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            header("Location:admin.php?page=admin&method=category");
        }

        // Quản trị bài viết 
        protected function listArticle_m()
        {
            $sql = "SELECT ar.id , ar.title , ar.description , ar.content , ar.avatar , ar.create_at , ar.status , tbl_infoaccount.name , tbl_category.title as 'cate' FROM tbl_article ar, tbl_category , tbl_infoaccount WHERE ar.id_account = tbl_infoaccount.id_account AND ar.id_category = tbl_category.id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function findArticle_m($id)
        {
            $sql = "SELECT ar.id , ar.title , ar.description , ar.content , ar.avatar , ar.create_at , ar.status , tbl_infoaccount.name , tbl_category.title as 'cate' FROM tbl_article ar, tbl_category , tbl_infoaccount WHERE ar.id_account = tbl_infoaccount.id_account AND ar.id_category = tbl_category.id AND ar.id = $id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function updateArticleOpen($id)
        {
            $sql = "UPDATE `tbl_article` SET `status`= 1 WHERE id = $id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function updateArticleClose($id)
        {
            $sql = "UPDATE `tbl_article` SET `status`= 0 WHERE id = $id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function delArticle($id)
        {
            $sql = "DELETE FROM `tbl_article` WHERE id = $id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function insertView($id_article, $view)
        {
            $sql = "INSERT INTO `tbl_view`(`id_article`, `view`) VALUES (:id_article, :view)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id_article", $id_article);
            $result->bindParam(":view", $view);
            $result->execute();
        }


        
        
    }
?>