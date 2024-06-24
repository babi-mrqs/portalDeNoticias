<?php
    require_once 'DAL/autorDAO.php';

    class autorModel {
        public ?int $idAutor;
        public ?string $nomeAutor;

        public function __construct(?int $idAutor = null, ?string $nomeAutor = null)
        {
            $this->idAutor = $idAutor;
            $this->nomeAutor = $nomeAutor;
        }

        public function buscarAutorPorId(int $idAutor) {
            $autorDAO = new autorDAO();

            $autor = $autorDAO->buscarAutorPorId($idAutor);

            $autor = new autorModel($autor['idAutor'], $autor['nomeAutor']);

            return $autor;
        }

        public function buscarAutores() {
            $autorDAO = new autorDAO();

            $autores = $autorDAO->buscarAutores();

            foreach ($autores as $chave => $autor) {
                $autores[$chave] = new autorModel($autor['idAutor'], $autor['nomeAutor']);
            }

            return $autores;
        }

        public function cadastrarAutor(autorModel $autor) {
            $autorDAO = new autorDAO();

            return $autorDAO->cadastrarAutor($autor);
        }
    }
?>