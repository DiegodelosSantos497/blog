<?php
require_once("ConnectionDAO.php");

class CategoryDAO
{
    private $table = "category";
    private  $conn;

    public function __construct()
    {
        $this->conn = new ConnectionDAO();
        $this->conn = $this->conn->connect();
    }

    public function validate_duplicate_name($name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE category_name = :category_name ");
            $stmt->bindParam(":category_name", $name, PDO::PARAM_STR);
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

    public function insert($name)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(category_name) VALUES(:category_name)");
            $stmt->bindParam(":category_name", $name, PDO::PARAM_STR);
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
            $stmt = $this->conn->prepare("SELECT * FROM $this->table ORDER BY category_name ASC");
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
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE category_id = :category_id");
            $stmt->bindParam(":category_id", $id, PDO::PARAM_INT);
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
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE category_id = :category_id ");
            $stmt->bindParam(":category_id", $id, PDO::PARAM_INT);
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

    public function update($name, $id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE $this->table SET category_name = :category_name WHERE category_id = :category_id");
            $stmt->bindParam(":category_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":category_id", $id, PDO::PARAM_INT);
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

}
