<?php
    require_once 'DAL/noticiaDAO.php';
    require_once 'autorModel.php';

    class noticiaModel {
        public ?int $idNoticia;
        public ?int $idAutor;
        public ?string $tituloNoticia;
        public ?string $conteudoNoticia;
        public ?string $imagemNoticia;
        public ?autorModel $autor;

        public function __construct(?int $idNoticia = null, ?int $idAutor = null, ?string $tituloNoticia = null, ?string $conteudoNoticia = null, ?string $imagemNoticia = null, ?autorModel $autor = null)
        {
            $this->idNoticia = $idNoticia;
            $this->idAutor = $idAutor;
            $this->tituloNoticia = $tituloNoticia;
            $this->conteudoNoticia = $conteudoNoticia;
            $this->imagemNoticia = $imagemNoticia;
            $this->autor = $autor;
        }

        public function cadastrarNoticia(noticiaModel $noticia) {
            $noticiaDAO = new noticiaDAO();

            return $noticiaDAO->cadastrarNoticia($noticia);
        }

        public function buscarNoticias() {
            $noticiaDAO = new noticiaDAO();
            $autorModel = new autorModel();

            $noticias = $noticiaDAO->buscarNoticias();
        
            foreach ($noticias as $chave => $noticia) {
                $noticias[$chave] = new noticiaModel(
                    $noticia['idNoticia'],
                    $noticia['idAutor'],
                    $noticia['tituloNoticia'],
                    $noticia['conteudoNoticia'],
                    $noticia['imagemNoticia'],
                    $autorModel->buscarAutorPorId($noticia['idAutor'])
                );
            }

            return $noticias;
        }

        public function buscarNoticiaPorId(int $idNoticia) {
            $noticiaDAO = new noticiaDAO();
            $autorModel = new autorModel();

            $noticia = $noticiaDAO->buscarNoticiaPorId($idNoticia);

            $noticia = new noticiaModel(
                $noticia['idNoticia'],
                $noticia['idAutor'],
                $noticia['tituloNoticia'],
                $noticia['conteudoNoticia'],
                $noticia['imagemNoticia'],
                $autorModel->buscarAutorPorId($noticia['idAutor'])
            );

            return $noticia;
        }

        public function excluirNoticia(int $idNoticia) {
            $noticiaDAO = new noticiaDAO();

            return $noticiaDAO->excluirNoticia($idNoticia);
        }

        public function atualizarNoticia(noticiaModel $noticia) {
            $noticiaDAO = new noticiaDAO();

            return $noticiaDAO->atualizarNoticia($noticia);
        }
    }
?>