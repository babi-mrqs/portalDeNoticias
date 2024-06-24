<?php
    require_once 'conexao.php';

    class usuarioDAO {
        public function buscarUsuarioPorEmailESenha(string $email, string $senha) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "SELECT * FROM usuario WHERE emailUsuario = :email AND senhaUsuario = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;
        }

        public function inserirUsuario(string $nome, string $email, string $senha) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "INSERT INTO usuario VALUES(null, :idTipoUsuario, :nome, :email, :senha);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoUsuario', 2);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $retorno = $stmt->execute();

           return $retorno;
        }
    }
?>