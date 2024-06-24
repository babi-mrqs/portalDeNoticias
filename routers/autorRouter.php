<?php
    require_once '../controllers/autorController.php';

    $autorController = new autorController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "cadastrar":
            $nome = $_POST['nome'];

            $autorController->cadastrarAutor($nome);

            break;
    }
?>