<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Notícias</title>
</head>
<?php
    require_once '../models/noticiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $noticiaModel = new noticiaModel();

    $noticias = $noticiaModel->buscarNoticias();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html' ?>
        <h1>Listar notícias</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noticias as $noticia) :?>
                    <tr>
                        <td><?= $noticia->tituloNoticia; ?></td>
                        <td>
                            <a href="editarNoticia.php?idNoticia=<?= $noticia->idNoticia; ?>">Editar</a>
                            <form action="../routers/noticiaRouter.php" method="post">
                                <input type="hidden" name="idNoticia" id="idNoticia" value="<?= $noticia->idNoticia; ?>">
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