<?php
require_once __DIR__ . '/../modal/Usuario.php';

class UsuarioController{
    private $usuario;

    public function __construct(){
        $this->usuario = new Usuario();
    }

    public function insertUser(string $name, string $email,string $password, string $number, string $country):array{
        try{
            $this->usuario->insertUser($name, $email, $password, $number, $country);
        }catch(Exception $e){
            return ["Status" => "fail",
                    "Message" => $e->getMessage()];
        }
        return ["Status" => "ok",
                "Message" => "Usuário inserido com sucesso"];
    }

    public function getUsers()
    {
        return $this->usuario->getUsers();
    }

}