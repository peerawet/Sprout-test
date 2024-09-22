<?php
include_once('Config.php');
class UsersModel extends Config
{
    public function __construct()
    {
        $this->conn = Config::getInstance()->getConnection();
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM users';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function postUser($name, $tel, $id = null)
    {
        if ($id === null) {
            $sql = 'INSERT INTO users(name, tel) VALUES (:name, :tel)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam('name', $name);
            $stmt->bindParam('tel', $tel);
            $stmt->execute();
        } else {
            $sql = 'UPDATE users SET name = :name, tel = :tel WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam('name', $name);
            $stmt->bindParam('tel', $tel);
            $stmt->bindParam('id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
    }
}
