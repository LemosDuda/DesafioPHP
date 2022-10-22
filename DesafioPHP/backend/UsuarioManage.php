<?php
require_once 'controller/UsuarioController.php';
switch($_POST["action"]) {
    case 'insert': 
        $usuarioController = new UsuarioController();
        $response = $usuarioController->insertUser($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['pais'] );
        $status = $response['Status'];
        $message = $response['Message'];
        header("location: ../frontend/paginaListagem.php?status=$status&mensagem=$message");
    default: 
        return "erro";
}