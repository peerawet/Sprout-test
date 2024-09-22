<?php
class Config
{
    private $hostname = 'localhost';
    private $dbname = 'sprout_db';
    private $username = 'root';
    private $password = '';
    protected $conn;

    private static $instance = null;

    private function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->hostname; dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //sigleton
    public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Config;
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
