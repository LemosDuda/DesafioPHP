<?php
require_once 'DataBase.php';
class UsuarioRepository {
    private PDO $conn;

    public function __construct() {
        $db = new DataBase();
        $this->conn = $db->getConn();
    }

    public function updateName(int $id,string $name):bool
    {
        $stmt = $this->conn->prepare("UPDATE Usuario SET Nome = ? WHERE Id = ?");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$id);
        
        return $stmt->execute(); 
    }

    public function insertUser(string $name, string $email,string $password, string $number, string $country):bool{
        $stmt = $this->conn->prepare("INSERT INTO Usuario(Nome, Email, Senha, Telefone, Pais) VALUES(?, ?, ?, ?, ?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$email);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $number);
        $stmt->bindParam(5, $country);
        return $stmt->execute();
    }

    public function getUsers()
    {
        $stmt = $this->conn->prepare("SELECT * FROM Usuario");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}