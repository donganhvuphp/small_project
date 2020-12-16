<?php
    include_once 'config/config.php';

    class Article_m extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        protected function checkRegister_m($email)
        {
            $sql = "SELECT * FROM `tbl_account` WHERE email =:email";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":email", $email);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        

        protected function register_m($email, $password)
        {
            $sql = "INSERT INTO `tbl_account`(`email`, `password`) VALUES (:email,:password)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":password", $password);
            $result->execute();
            header("Location:index.php");
        }

        protected function convert_name($str) {
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
            $str = preg_replace("/( )/", '-', $str);
            return $str;
        }
        
        protected function registerInfo_m($id_account,$name,$avatar,$gender,$birthday,$phone,$address)
        {
            $sql ="INSERT INTO `tbl_infoaccount`(`id_account`, `name`, `avatar`, `gender`, `birthday`, `phone`, `address`) VALUES (:id_account,:name,:avatar,:gender,:birthday,:phone,:address)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id_account", $id_account);
            $result->bindParam(":name", $name);
            $result->bindParam(":avatar", $avatar);
            $result->bindParam(":gender", $gender);
            $result->bindParam(":birthday", $birthday);
            $result->bindParam(":phone", $phone);
            $result->bindParam(":address", $address);
            $result->execute();
            session_destroy();
            header("Location:index.php");
        }

        protected function login($email, $password)
        {
            $sql = "SELECT * FROM `tbl_account` WHERE email =:email AND password =:password";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":password", $password);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function infoUser($id)
        {
            $sql = "SELECT * FROM `tbl_infoaccount` WHERE id_account = :id";
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
        
        protected function addArticle_m($id_account, $id_category, $title, $description, $content, $avatar)
        {
            $sql = "INSERT INTO `tbl_article`(`id_account`, `id_category`, `title`, `description`, `content`, `avatar`) VALUES (:id_account, :id_category, :title, :description, :content, :avatar)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id_account", $id_account);
            $result->bindParam(":id_category", $id_category);
            $result->bindParam(":title", $title);
            $result->bindParam(":description", $description);
            $result->bindParam(":content", $content);
            $result->bindParam(":avatar", $avatar);
            $result->execute();
        }

        // article trong danh mục 
        //article fet
        protected function selectTopAticle()
        {
            $sql = "SELECT ar.id , ar.title , ar.description , ar.content , ar.avatar , ar.create_at , ar.status , tbl_infoaccount.name , tbl_category.title as 'cate' , tbl_view.view FROM tbl_article ar, tbl_category , tbl_infoaccount , tbl_view  WHERE ar.id_account = tbl_infoaccount.id_account AND ar.id_category = tbl_category.id AND ar.id = tbl_view.id_article AND ar.status = 1 ORDER BY tbl_view.view DESC LIMIT 5 ";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        protected function listArticle_m()
        {
            $sql = "SELECT ar.id , ar.title , ar.description , ar.content , ar.avatar , ar.create_at , ar.status , tbl_infoaccount.name , tbl_category.title as 'cate' , tbl_view.view FROM tbl_article ar, tbl_category , tbl_infoaccount , tbl_view WHERE ar.id_account = tbl_infoaccount.id_account AND ar.id_category = tbl_category.id AND ar.id = tbl_view.id_article AND ar.status = 1 ORDER BY RAND()";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function detailListArticle_m($id)
        {
            $sql = "SELECT ar.id , ar.title , ar.description , ar.content , ar.avatar , ar.create_at , ar.status , tbl_infoaccount.name , tbl_category.title as 'cate' , tbl_view.view FROM tbl_article ar, tbl_category , tbl_infoaccount , tbl_view WHERE ar.id_account = tbl_infoaccount.id_account AND ar.id_category = tbl_category.id  AND ar.id = tbl_view.id_article  AND ar.status = 1 AND ar.id_category = $id ORDER BY RAND()";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function detailArticle_m($id)
        {
            $sql = "SELECT ar.id , ar.title , ar.description , ar.content , ar.avatar , ar.create_at , ar.status , tbl_infoaccount.name , tbl_category.title as 'cate' FROM tbl_article ar, tbl_category , tbl_infoaccount WHERE ar.id_account = tbl_infoaccount.id_account AND ar.id_category = tbl_category.id AND ar.status = 1 AND ar.id = $id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // comment
        protected function insertComment_m($id_article, $id_account, $content)
        {
            $sql = "INSERT INTO `tbl_comment`(`id_article`, `id_account`, `content`) VALUES (:id_article, :id_account, :content)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id_article", $id_article);
            $result->bindParam(":id_account", $id_account);
            $result->bindParam(":content", $content);
            $result->execute();
        }

        protected function selectComment_m($id)
        {
            $sql = "SELECT cm.id , cm.id_account as 'id_acc' , cm.content , cm.create_at ,tbl_infoaccount.name , tbl_infoaccount.avatar FROM tbl_comment cm, tbl_infoaccount WHERE cm.id_account = tbl_infoaccount.id_account AND cm.id_article = $id";
            $result = $this->conn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // protected function findCmt_m($id,$id_acc)
        // {
        //     $sql = "SELECT * FROM `tbl_comment` WHERE id = $id AND id_account = $id_acc";
        //     $result = $this->conn->prepare($sql);
        //     $result->execute();
        //     return $result->fetchAll(PDO::FETCH_ASSOC);
        // }
        
        protected function deleteCmt_m($id,$id_acc){
            $sql = "DELETE FROM `tbl_comment` WHERE id = $id AND id_account = $id_acc" ;
            $result = $this->conn->prepare($sql);
            $result->execute();
        }

        //xử lý view 
        protected function selectView($id_article){
            $sql = "SELECT * FROM `tbl_view` WHERE `id_article` = $id_article";
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

        protected function updateView($id_article, $view)
        {
            $sql = "UPDATE `tbl_view` SET`view`= :view WHERE `id_article` =:id_article";
            $result = $this->conn->prepare($sql);
            $result->bindParam(":id_article", $id_article);
            $result->bindParam(":view", $view);
            $result->execute();
        }

    }
?>