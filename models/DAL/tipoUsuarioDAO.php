<?php
    require_once 'conexao.php';

    class tipoUsuarioDAO {
        public function cadastrarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->pegarConexao();

            $sql = "INSERT INTO tipo_usuario VALUES (null, :descricaoTipoUsuario);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':descricaoTipoUsuario', $tipoUsuario->descricaoTipoUsuario);

            return $stmt->execute();
        }

        public function buscarTiposUsuario() {
            $conexao = (new conexao)->pegarConexao();

            $sql = "SELECT * FROM tipo_usuario";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function excluirTipoUsuario(int $idTipoUsuario) {
            $conexao = (new conexao)->pegarConexao();

            $sql = "DELETE FROM tipo_usuario WHERE idTipoUsuario = :idTipoUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idTipoUsuario', $idTipoUsuario);

            return $stmt->execute();
        }

        public function buscarTipoUsuarioPorId(int $idTipoUsuario) {
            $conexao = (new conexao)->pegarConexao();

            $sql = "SELECT * FROM tipo_usuario WHERE idTipoUsuario = :idTipoUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idTipoUsuario', $idTipoUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->pegarConexao();

            $sql = "UPDATE tipo_usuario SET descricaoTipoUsuario = :descricaoTipoUsuario WHERE idTipoUsuario = :idTipoUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoUsuario', $tipoUsuario->idTipoUsuario);
            $stmt->bindValue(':descricaoTipoUsuario', $tipoUsuario->descricaoTipoUsuario);

            return $stmt->execute();
        }
    }
?>