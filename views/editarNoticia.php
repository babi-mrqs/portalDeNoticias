<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar notícia</title>
</head>
<?php
    require_once '../models/noticiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $noticiaModel = new noticiaModel();
    $autorModel = new autorModel();

    $idNoticia = intval($_GET['idNoticia']);

    $noticia = $noticiaModel->buscarNoticiaPorId($idNoticia);
    $autores = $autorModel->buscarAutores();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar notícia</h1>
    </header>
    <main>
    <form action="../routers/noticiaRouter.php" method="post" onsubmit="return validarCamposCadastrarNoticia(event);">
            <label for="idAutor">Autor</label>
            <br>
            <select name="idAutor" id="idAutor">
                <option value="0">Selecione</option>
                <?php foreach ($autores as $autor) :?>
                    <?php if ($autor->idAutor == $noticia->idAutor) :?>
                        <option value="<?= $autor->idAutor; ?>" selected><?= $autor->nomeAutor; ?></option>
                    <?php else :?>
                        <option value="<?= $autor->idAutor; ?>"><?= $autor->nomeAutor; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="titulo">Título</label>
            <br>
            <input type="text" name="titulo" id="titulo" value="<?= $noticia->tituloNoticia; ?>" required>
            <br>
            <label for="conteudo">Conteúdo</label>
            <br>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" required><?= $noticia->conteudoNoticia; ?></textarea>
            <br>
            <label for="imagem">Imagem</label>
            <br>
            <input type="text" name="imagem" id="imagem" value="<?= $noticia->imagemNoticia; ?>">
            <br>
            <br>
            <input type="hidden" name="idNoticia" id="idNoticia" value="<?= $idNoticia; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>