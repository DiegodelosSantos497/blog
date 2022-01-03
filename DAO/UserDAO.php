<?php
require_once("ConnectionDAO.php");

class UserDAO
{
    private $table = "user";
    private  $conn;

    public function __construct()
    {
        $this->conn = new ConnectionDAO();
        $this->conn = $this->conn->connect();
    }

    public function validate_duplicate_email($email)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_email = :user_email ");
            $stmt->bindParam(":user_email", $email, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function insert($name, $email, $password, $image, $status, $created_at)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(user_name, user_email, user_password, user_image, user_status, user_created_at) VALUES(:user_name, :user_email, :user_password, :user_image, :user_status, :user_created_at)");
            $stmt->bindParam(":user_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":user_email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":user_password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":user_image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":user_status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":user_created_at", $created_at, PDO::PARAM_STR);
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

    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE user_id = :user_id");
            $stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
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
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_id = :user_id ");
            $stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
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

    public function update($name, $email, $password, $image, $status, $created_at, $id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE $this->table SET user_name = :user_name, user_email = :user_email, user_password = :user_password, user_image = :user_image,user_status = :user_status, user_created_at = :user_created_at WHERE user_id = :user_id");
            $stmt->bindParam(":user_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":user_email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":user_password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":user_image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":user_status", $status, PDO::PARAM_INT);
            $stmt->bindParam(":user_created_at", $created_at, PDO::PARAM_STR);
            $stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
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

    public function login($email, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_email = :user_email and user_password = :user_password");
            $stmt->bindParam(":user_email",  $email, PDO::PARAM_STR);
            $stmt->bindParam(":user_password", $password, PDO::PARAM_STR);
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
