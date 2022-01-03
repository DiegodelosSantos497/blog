<?php
class ConnectionDAO
{
    private $host = "localhost";
    private $dbname = "blog";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8";
    private $conn;

    public function connect()
    {
        if (!isset($this->conn)) {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            try {
                $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
                //echo "successfully connection ";
            } catch (PDOException $e) {
                print($e->getMessage());
                die();
            }
        }
       return $this->conn;
    }
}

//$obj = new ConnectionDAO();
//$obj->connect();