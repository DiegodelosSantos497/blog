<?php
require_once("ConnectionDAO.php");

class PostDAO
{
    private $table = "post";
    private  $conn;

    public function __construct()
    {
        $this->conn = new ConnectionDAO();
        $this->conn = $this->conn->connect();
    }

    public function insert($title, $brief, $body, $image, $created_at, $status, $user, $category)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(post_title, post_brief, post_body, post_image, post_created_at, post_status, post_user, post_category) VALUES(:post_title, :post_brief, :post_body, :post_image, :post_created_at, :post_status, :post_user, :post_category)");
            $stmt->bindParam(":post_title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":post_brief", $brief, PDO::PARAM_STR);
            $stmt->bindParam(":post_body", $body, PDO::PARAM_STR);
            $stmt->bindParam(":post_image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":post_created_at", $created_at, PDO::PARAM_STR);
            $stmt->bindParam(":post_status", $status, PDO::PARAM_INT);
            $stmt->bindParam(":post_user", $user, PDO::PARAM_INT);
            $stmt->bindParam(":post_category", $category, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function getAll()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function load($table_name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $table_name");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE post_id = :post_id");
            $stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function getById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE post_id = :post_id ");
            $stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function update($title, $brief, $body, $image, $created_at, $status, $user, $category, $id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE $this->table SET post_title = :post_title, post_brief = :post_brief, post_body = :post_body, post_image = :post_image, post_created_at = :post_created_at, post_status = :post_status, post_user = :post_user, post_category = :post_category  WHERE post_id = :post_id");
            $stmt->bindParam(":post_title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":post_brief", $brief, PDO::PARAM_STR);
            $stmt->bindParam(":post_body", $body, PDO::PARAM_STR);
            $stmt->bindParam(":post_image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":post_created_at", $created_at, PDO::PARAM_STR);
            $stmt->bindParam(":post_status", $status, PDO::PARAM_INT);
            $stmt->bindParam(":post_user", $user, PDO::PARAM_INT);
            $stmt->bindParam(":post_category", $category, PDO::PARAM_INT);
            $stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function detail($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT post.post_id as id, post.post_title as title, post.post_brief as brief, post.post_body as body, post.post_image as image, post.post_created_at as created_at, post.post_status as status, user.user_name as user, category.category_name as category from post 
            INNER JOIN user on post.post_user = user.user_id
            INNER JOIN category on post.post_category = category.category_id WHERE post_id = :post_id ");
            $stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

   
}
