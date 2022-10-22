<?php
require_once 'UsuarioRepository.php';


class Usuario{
    private $usuarioRepository;

    public function __construct(){
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function insertUser(string $name, string $email,string $password, string $number, string $country){
        if(!$this->validateName($name)){
            throw new Exception("Tamanho de nome maior que o permitido");
        }
        if(!$this->validateEmail($email)){
            throw new Exception("Email inválido");
        }
        
        if(!$this->validateNumber($number)){
            throw new Exception("Número inválido");
        }
        if(!$this->validateCountry($country)){
            throw new Exception("País inválido");
        }

        $password = $this->validatePassword($password);

        $this->usuarioRepository->insertUser($name, $email, $password, $number, $country);
    }

    public function getUsers()
    {
        return $this->usuarioRepository->getUsers();
    }

    private function validateName(string $name):bool
    {
        if(strlen($name)>50){
            return false;
        }
        return true;
    }

    private function validateEmail(string $email):bool
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if(strlen($email) > 50) {
            return false;
        }
        return true;
    }

    private function validatePassword(string $password):string
    {

      return md5($password);
    }

    private function validateNumber(string $number):bool
    {
        if(strlen($number)>15){
            return false;
        }
        return true;
      
    }

    private function validateCountry(string $country):bool
    {
        if(strlen($country)>50){
            return false;
        }
        return true;
    }
}