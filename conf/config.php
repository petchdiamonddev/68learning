<?php

class Database
{
    private $host = "localhost";
    private $db = "68learning";
    private $user = "root";
    private $pass = "";
    private $conn;

    public function getConnetction()
    {
        if ($this->conn == null) {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "ok";     
            } catch (PDOException $e) {
                die("เชื่อไม่ได้" . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
