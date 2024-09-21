
<?php

class DbConnect
{
    private static $instance = null;
    private $username = 'root';
    private $password = '';
    private $conn;

    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=sprout_db;charset=utf8;", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DbConnect;
        }
        return self::$instance->conn; 
    }
}
?>