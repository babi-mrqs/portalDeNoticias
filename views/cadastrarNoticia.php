<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar noticia</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/autorModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
        exit();
    }

    $autorModel = new autorModel();

    $autores = $autorModel->buscarAutores();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Cadastrar notícia</h1>
    </header>
    <main>
        <form action="../routers/noticiaRouter.php" method="post" onsubmit="return validarCamposCadastrarNoticia(event);">
            <label for="idAutor">Autor</label>
            <br>
            <select name="idAutor" id="idAutor">
                <option value="0">Selecione</option>
                <?php foreach ($autores as $autor) :?>
                    <option value="<?= $autor->idAutor; ?>"><?= $autor->nomeAutor; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="titulo">Título</label>
            <br>
            <input type="text" name="titulo" id="titulo" required>
            <br>
            <label for="conteudo">Conteúdo</label>
            <br>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" required></textarea>
            <br>
            <label for="imagem">Imagem</label>
            <br>
            <input type="text" name="imagem" id="imagem">
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>