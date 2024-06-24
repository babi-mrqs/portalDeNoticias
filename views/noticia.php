<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícia</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/noticiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true) {
        header('Location: login.php');
        exit();
    }

    $noticiaModel = new noticiaModel();

    $idNoticia = intval($_GET['idNoticia']);
    $noticia = $noticiaModel->buscarNoticiaPorId($idNoticia);
?>
<body>
    <header>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }
            else {
                require_once '../public/html/menuCliente.html';
            }
        ?>
        <h1>Editar notícia</h1>
    </header>
    <main>
        <h1><?= $noticia->tituloNoticia; ?></h1>
        <p><?= $noticia->autor->nomeAutor; ?></p>
        <?php if (!empty($noticia->imagemNoticia)) :?>
            <img src="<?= $noticia->imagemNoticia; ?>">
        <?php endif; ?>
        <p><?= $noticia->conteudoNoticia; ?></p>
    </main>
</body>
</html>