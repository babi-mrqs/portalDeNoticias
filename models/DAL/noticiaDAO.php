<?php
    require_once 'conexao.php';

    class noticiaDAO {
        public function cadastrarNoticia(noticiaModel $noticia) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "INSERT INTO noticia VALUES(null, :idAutor, :tituloNoticia, :conteudoNoticia, :imagemNoticia);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idAutor', $noticia->idAutor);
            $stmt->bindParam(':tituloNoticia', $noticia->tituloNoticia);
            $stmt->bindParam(':conteudoNoticia', $noticia->conteudoNoticia);
            $stmt->bindParam(':imagemNoticia', $noticia->imagemNoticia);
            return $stmt->execute();
        }

        public function buscarNoticias() {
            $conexao = (new conexao())->pegarConexao();

            $sql = "SELECT * FROM noticia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarNoticiaPorId(int $idNoticia) {
            $conexao = (new conexao)->pegarConexao();

            $sql = "SELECT * FROM noticia WHERE idNoticia = :idNoticia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idNoticia', $idNoticia);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirNoticia(int $idNoticia) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "DELETE FROM noticia WHERE idNoticia = :idNoticia";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idNoticia', $idNoticia);
            return  $stmt->execute();
        }

        public function atualizarNoticia(noticiaModel $noticia) {
            $conexao = (new conexao())->pegarConexao();

            $sql = "UPDATE noticia SET idAutor = :idAutor, tituloNoticia = :tituloNoticia, conteudoNoticia = :conteudoNoticia, imagemNoticia = :imagemNoticia WHERE idNoticia = :idNoticia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idAutor', $noticia->idAutor);
            $stmt->bindValue(':tituloNoticia', $noticia->tituloNoticia);
            $stmt->bindValue(':conteudoNoticia', $noticia->conteudoNoticia);
            $stmt->bindValue(':imagemNoticia', $noticia->imagemNoticia);
            $stmt->bindValue(':idNoticia', $noticia->idNoticia);

            return $stmt->execute();
        }
    }
?>