<link rel="stylesheet" href="cadastro.css">
<body>
    <h1 class="h1"><?= $_GET['mensagem']?></h1>

    <?php
        require_once '../backend/controller/UsuarioController.php';

        $usuarioController = new UsuarioController();
        $usuarios = $usuarioController->getUsers();
    ?>
    <table>
        <tr>
        <th>Nome:</th>
        <th>Email:</th>
        <th>Numero:</th>
        <th>Pais:</th>
        <tr>
        <?php foreach($usuarios as $usuario) { ?>
            <tr>
            <td><?php echo $usuario['Nome']?></td>
            <td><?php echo $usuario['Email'] ?></td>
            <td><?php echo $usuario['Telefone']?></td>
            <td><?php echo $usuario['Pais']?></td>
            <tr>
        <?php
            }
        ?>
    </table>

</body>
