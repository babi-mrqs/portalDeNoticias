<?php
    class conexao {
        public function pegarConexao() {
            $conexao = new PDO('mysql:host=localhost;dbname=db_noticias', 'root', '');
            return $conexao;
        }
    }
?>