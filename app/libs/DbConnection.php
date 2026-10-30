<?php
class DBConnection
{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $conn;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;

        try {
            // charset=utf8mb4 để lưu và hiển thị đúng tiếng Việt
            $sqlStr = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
            $this->conn = new PDO($sqlStr, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Không kết nối được CSDL: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

// Folder libs dc ví như bộ đồ nghề tiện ích phục vụ cho cả dự án
// tiêu biểu nhất là công cụ tạo kết nối CSDL PDO.
