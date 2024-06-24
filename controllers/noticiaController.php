<?php
    require_once '../models/noticiaModel.php';

    class noticiaController {
        public function cadastrarNoticia(int $idAutor, string $tituloNoticia, string $conteudoNoticia, string $imagemNoticia) {
            $noticiaModel = new noticiaModel();

            $noticia = new noticiaModel(null, $idAutor, $tituloNoticia, $conteudoNoticia, $imagemNoticia);

            $retorno = $noticiaModel->cadastrarNoticia($noticia);

            if ($retorno) {
                header('Location: ../views/principal.php');
            }
            else {
                header('Location: ../views/cadastrarNoticia.php');
            }

            exit();
        }

        public function excluirNoticia(int $idNoticia) {
            $noticiaModel = new noticiaModel();

            $noticiaModel->excluirNoticia($idNoticia);

            header('Location: ../views/principal.php');
            exit();
        }

        public function atualizarNoticia(int $idNoticia, int $idAutor, string $titulo, string $conteudo, string $imagem) {
            $noticiaModel = new noticiaModel();

            $noticia = new noticiaModel($idNoticia, $idAutor, $titulo, $conteudo, $imagem);

            $retorno = $noticiaModel->atualizarNoticia($noticia);

            if ($retorno) {
                header('Location: ../views/listarNoticias.php');
            }
            else {
                header("Location: ../views/editarNoticia.php?idNoticia=$idNoticia");
            }

            exit();
        }
    }
?>