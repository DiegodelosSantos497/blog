<?php
require_once("ConnectionDAO.php");

class CommentDAO
{
    private $table = "comment";
    private  $conn;

    public function __construct()
    {
        $this->conn = new ConnectionDAO();
        $this->conn = $this->conn->connect();
    }

    public function insert($name, $email, $content, $post, $created_at)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(comment_name, comment_email, comment_content, comment_post, comment_created_at) VALUES(:comment_name, :comment_email, :comment_content, :comment_post, :comment_created_at)");
            $stmt->bindParam(":comment_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":comment_email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":comment_content", $content, PDO::PARAM_STR);
            $stmt->bindParam(":comment_post", $post, PDO::PARAM_INT);
            $stmt->bindParam(":comment_created_at", $created_at, PDO::PARAM_STR);
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
            $stmt = $this->conn->prepare("SELECT comment.comment_id AS id, post.post_title AS title, post.post_id AS post_id, COUNT(comment.comment_post) AS total  FROM comment 
            INNER JOIN post on comment.comment_post = post.post_id GROUP BY post.post_title");
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
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE comment_id = :comment_id");
            $stmt->bindParam(":comment_id", $id, PDO::PARAM_INT);
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
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE comment_id = :comment_id ");
            $stmt->bindParam(":comment_id", $id, PDO::PARAM_INT);
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

    /* public function detail($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT post.comment_id as id, post.comment_title as title, post.comment_brief as brief, post.comment_body as body, post.comment_image as image, post.comment_created_at as created_at, post.comment_status as status, user.user_name as user, category.category_name as category from post 
            INNER JOIN user on post.comment_user = user.user_id
            INNER JOIN category on post.comment_category = category.category_id WHERE comment_id = :comment_id ");
            $stmt->bindParam(":comment_id", $id, PDO::PARAM_INT);
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
    } */

    public function getCommentsById($comment_post)
    {
        try {
            /* SELECT comment.comment_id AS id, comment.comment_name AS name, comment.comment_email AS email, comment.comment_content AS content, comment.comment_created_at AS created_at FROM comment WHERE comment_post = :comment_post */
            $stmt = $this->conn->prepare("SELECT comment.comment_id AS id, comment.comment_name AS name, comment.comment_email AS email, comment.comment_content AS content, comment.comment_created_at AS created_at FROM comment WHERE comment_post = :comment_post");
            $stmt->bindParam(":comment_post", $comment_post, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }
}
