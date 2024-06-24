<?php
    require_once '../controllers/noticiaController.php';

    $noticiaController = new noticiaController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "cadastrar":
            $idAutor = $_POST['idAutor'];
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $imagem = $_POST['imagem'];

            $noticiaController->cadastrarNoticia($idAutor, $titulo, $conteudo, $imagem);

            break;
        case "excluir":
            $idNoticia = intval($_POST['idNoticia']);

            $noticiaController->excluirNoticia($idNoticia);

            break;
        case "salvar":
            $idNoticia = $_POST['idNoticia'];
            $idAutor = $_POST['idAutor'];
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $imagem = $_POST['imagem'];

            $noticiaController->atualizarNoticia($idNoticia, $idAutor, $titulo, $conteudo, $imagem);

            break;
    }
?>