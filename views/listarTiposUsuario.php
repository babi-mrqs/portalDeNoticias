<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar tipos usuário</title>
</head>
<?php
    require_once '../models/tipoUsuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $tipoUsuarioModel = new tipoUsuarioModel();

    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Listar tipos usuário</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tiposUsuario as $tipoUsuario) :?>
                    <tr>
                        <td><?= $tipoUsuario->descricaoTipoUsuario; ?></td>
                        <td>
                            <a href="editarTipoUsuario.php?idTipoUsuario=<?= $tipoUsuario->idTipoUsuario; ?>">Editar</a>
                            <form action="../routers/tipoUsuarioRouter.php" method="post">
                                <input type="hidden" name="idTipoUsuario" id="idTipoUsuario" value="<?= $tipoUsuario->idTipoUsuario; ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>