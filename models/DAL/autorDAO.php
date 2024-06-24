<?php
    require_once 'conexao.php';

    class autorDAO {
        public function buscarAutorPorId(int $idAutor) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "SELECT * FROM autor WHERE idAutor = :idAutor;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idAutor', $idAutor);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function buscarAutores() {
            $conexao = (new conexao())->pegarConexao();

            $sql = "SELECT * FROM autor;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function cadastrarAutor(autorModel $autor) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "INSERT INTO autor VALUES(null, :nomeAutor);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nomeAutor', $autor->nomeAutor);
            return $stmt->execute();
        }
    }
?>