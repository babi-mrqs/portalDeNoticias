<?php
    require_once 'DAL/tipoUsuarioDAO.php';

    class tipoUsuarioModel {
        public ?int $idTipoUsuario;
        public ?string $descricaoTipoUsuario;

        public function __construct(?int $idTipoUsuario = null, ?string $descricaoTipoUsuario = null)
        {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->descricaoTipoUsuario = $descricaoTipoUsuario;
        }

        public function cadastrarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            return $tipoUsuarioDAO->cadastrarTipoUsuario($tipoUsuario);
        }

        public function buscarTiposUsuario() {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $tiposUsuario = $tipoUsuarioDAO->buscarTiposUsuario();

            foreach ($tiposUsuario as $chave => $tipoUsuario) {
                $tiposUsuario[$chave] = new tipoUsuarioModel($tipoUsuario['idTipoUsuario'], $tipoUsuario['descricaoTipoUsuario']);
            }

            return $tiposUsuario;
        }

        public function excluirTipoUsuario(int $idTipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            return $tipoUsuarioDAO->excluirTipoUsuario($idTipoUsuario);
        }

        public function buscarTipoUsuarioPorId(int $idTipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $tipoUsuarioArray = $tipoUsuarioDAO->buscarTipoUsuarioPorId($idTipoUsuario);
        
            $tipoUsuario = new tipoUsuarioModel($tipoUsuarioArray['idTipoUsuario'], $tipoUsuarioArray['descricaoTipoUsuario']);

            return $tipoUsuario;
        }

        public function atualizarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            return $tipoUsuarioDAO->atualizarTipoUsuario($tipoUsuario);
        }
    }
?>