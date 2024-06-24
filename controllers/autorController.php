<?php
    require_once '../models/autorModel.php';

    class autorController {
        public function cadastrarAutor(string $nome) {
            $autorModel = new autorModel();
            $autor = new autorModel(null, $nome);

            $retorno = $autorModel->cadastrarAutor($autor);

            if ($retorno) {
                header('Location: ../views/cadastrarNoticia.php');
            }
            else {
                header('Location: ../views/cadastrarAutor.php');
            }

            exit();
        }
    }
?>