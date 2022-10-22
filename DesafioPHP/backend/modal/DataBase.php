<?php

class DataBase {
    private PDO $db;


    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=cadastro", "root", "");
    }

    public function getConn(): PDO
    {
        return $this->db;
    }
}